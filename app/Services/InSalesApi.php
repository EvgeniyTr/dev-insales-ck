<?php 

namespace App\Services;	

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use App\Jobs\PendingRequest;
use App\Services\ParserResponse;

class InSalesApi extends User
{
	use ParserResponse;

	protected $link;
	protected $guzzle;
	protected $user;

	function __construct($insalesId) 
	{
		parent::__construct($insalesId);
		$this->user = new User($insalesId);
		$this->guzzle = new \GuzzleHttp\Client();
		if(!empty($this->user->getPass()) && !empty($this->user->getUrlShop()))
			$this->link = 'http://'.config()->get('local.addId').':'.$this->user->getPass().'@'.$this->user->getUrlShop().'/admin/';
		else
			throw new \Exception('User with InSalesId='.$insalesId.' isn\'t found in databases');
	}

	private function send($linkStr, $data, $type = 'GET', $on422 = null) 
	{
		$link = $this->link.$linkStr.'.json';
		$data = array_merge( 
			[
            	'headers' =>[
                	'Content-Type'=>'application/json'
            	],
        	],
        	$data //['json' => []]
		);

		try
		{
			$resp = $this->parseResponce(
				$this->guzzle->request($type, $link, $data)
			);
		}
	    catch (ServerException|ClientException $e) 
	    {
	    	$resp = $this->getEmptyObj();
	    	switch ($e->getResponse()->getStatusCode()) {
	    		case '404':
	    			break;
	    		case '422':
	    			if($on422 !== null) {
		    			$resp = $this->get($linkStr);
						foreach ($resp->bodyContents as $field) 
						{	
							if($on422($field)){
								$resp = $on422($field);
								break;
							}
						}
					}
	    			break;
	    		default:
	    			dispatch(new PendingRequest($link, $data, $e->getResponse()->getHeader('retry-after'), $type));
	    			break;
	    	}
	    }
		return $resp;
	}

	public function delete($link) {
		return $this->send($link, [], 'DELETE');
	}

	protected function post($link, $data, $on422 = null) {
		return $this->send($link, ['json' => $data], 'POST', $on422);
	}

	protected function put($link, $data, $on422 = null) {
		return $this->send($link, ['json' => $data], 'PUT', $on422);
	}

	protected function get($link) {
		return $this->send($link, [], 'GET');
	}
	
	protected function add($id, $link, $equal, $data, $parse, $on422=null)
	{
		if(!$this->idIsTrue($id, $link, $equal))
		{		
			$res = $this->post($link, $data, $on422);
			$id = $parse($res->bodyContents);
		}
		return $id;
	}

	private function idIsTrue($id, $link, $equal)
	{
		if(!empty($id)) 
		{
			$res = $this->get($link.'/'.$id);
			return $equal($id, $res->bodyContents);
		}
		else
			return FALSE;
	}

	public function showPaymentGateWays()
	{
		$order_uri = $this->user->getInsalesUriAttribute() . '/admin/payment_gateways.json';
		$response = $this->guzzle->get($order_uri);

		return json_decode($response->getBody(), true, JSON_UNESCAPED_UNICODE);
	}
}