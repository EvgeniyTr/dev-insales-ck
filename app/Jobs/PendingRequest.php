<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\ParserResponse;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Client;

class PendingRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, ParserResponse;

    private $link;
    private $data;
    private $time;
    private $type;

    public function __construct($link, $data, $time, $type = 'PUT')
    {
        $this->link = $link;
        $this->data = $data;
        $this->time = array_shift($time)+1;
        $this->type = $type;
    }

    public function handle()
    {
        switch ($this->type) {
            case 'PUT':
                $this->put();
                break;
            case 'POST':
                $this->post();
                break;
            case 'GET':
                $this->get();
                break;
        }
    }

    private function post()
    {
        $this->sendReq(function($client){
            return $client->request('POST', $this->link, $this->data );
        }); 
    }

    private function get()
    {
        $this->sendReq(function($client){
            return $client->get($this->link);
        }); 
    }

    private function put()
    {
        $this->sendReq(function($client){
            return $client->request('PUT', $this->link,
                array(
                    'headers' => array(
                        'Content-Type'=>'application/json'
                    ),
                    'json' => $this->data
                )
            );
        });               
    }

    private function sendReq($send)
    {
        try{
            sleep($this->time);
            $tryAgain = TRUE;
            do {
                try {
                    $client = new Client();
                    $res = $send($client);
                    $res = $this->parseResponce($res);
                    if($res->status == 200) {
                        $tryAgain = False;
                    }
                }
                catch (ServerException|ClientException $e) 
                {
                    if($e->getResponse()->getStatusCode() == 503) 
                    {
                        sleep($e->getResponse()->getHeader('retry-after')[0]+1);
                        Log::info("Warning err request. App auto unlock via ".$this->time." sec");
                    }
                    else
                    {
                        $tryAgain = False;
                        throw new \Exception($e->getResponse()->getStatusCode());
                    }
                }
            } while ($tryAgain);
        }
        catch (\Exception $e) 
        {
            Log::error($e->getMessage()." Error on pending request. Error url ".$this->link);
        } 
    }
}
