<?php

namespace App\Jobs\Installation;

use Exception;
use App\Models\Users;
use InSales\API\ApiClient;
use App\Repositories\InsalesUserRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class AddWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	public const ORDERS_UPDATE = 'orders/update';

    private $user;

	/**
     * Create a new job instance.
     *
	 * @param  \App\Models\Users  $user
     */
    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Client $client)
    {
	    info("Beginning Webhook installation job for User {$this->user->insalesId}");

	    $webhook_uri = 'https://' . config('local.addId') . ':' .
	                          $this->user->pass . '@' .
	                          $this->user->urlShop . '/admin/webhooks.json';

	    $webhook_request = [
		    'headers'          => [
			    'Content-Type' => 'application/json; charset=utf-8',
		    ],
		    'json' => $this->generateWebhookCode(self::ORDERS_UPDATE)
	    ];

	    $response = $client->post($webhook_uri, $webhook_request);
	    $webhook_data = json_decode($response->getBody(), true, JSON_UNESCAPED_UNICODE);

	    if ($response->getStatusCode() === 201) {
		    $this->user->onUpdateWebhookId = $webhook_data['id'];
		    $this->user->save();
	    }

	    info("Webhook installation job assigned for User {$this->user->insalesId} successfully finished.", $webhook_data);
    }

    public function generateWebhookCode(string $topic) : array
    {
	    return [
		    'webhook' => [
			    'address' => config('local.path') . '/webhooks/' . $this->user->id . '/' . $topic,
			    'topic' => $topic,
			    'format_type' => 'json'
		    ]
	    ];
    }

	public function failed(Exception $exception)
	{
		if ($exception instanceof ClientException) {
			logger()->critical(__CLASS__ . (string) $exception->getResponse()->getBody());
		} elseif ($exception instanceof ServerException) {
			$response = $exception->getResponse();
			$retry_after_period = $response->getHeader('Retry-After');
			if (isset($retry_after_period) && $response->getStatusCode() === 503) {
				self::dispatch($this->user)->delay(now()->addMinutes(round($retry_after_period/60, 0, PHP_ROUND_HALF_UP) + 1));
			}
		} else {
			logger()->critical(__CLASS__ . " job assigned for User {$this->user->insalesId} finished with error: {$exception->getMessage()}", $exception->getTrace());
		}
	}
}
