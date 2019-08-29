<?php 

namespace App\Services;	

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Log;

class CloudKassirApi extends User
{
	private $link;
	private $orderId;
	private $listItems;
	private $email;
	private $phone;

	function __construct($insalesId, $orderId=NULL, $listItems=NULL, $email=NULL, $phone=NULL) 
	{
		parent::__construct($insalesId);
		$this->orderId = $orderId;
		$this->listItems = $listItems;
		$this->email = $email;
		$this->phone = $phone;
		$this->guzzle = new \GuzzleHttp\Client();
		$this->link = config()->get('local.kktReceipt');
	}

	public function sendApply() {
		return $this->sendBill('Income');
	}

	public function test($publicId, $apiSecret) {
		$this->link = config()->get('local.ckTestApi');
		return $this->sendToCK(
			[],
			function($res){
				$content = json_decode($res->getBody()->getContents());
				if($content->Success==TRUE)
					return $content->Success==TRUE;
				else
					return FALSE;
			}, 
			'POST',
			$publicId,
			$apiSecret
		);
	}

	public function sendRefund() {
		return $this->sendBill('IncomeReturn');
	}

	private function sendBill($type)
	{
		return $this->sendToCK(
			[
				'Inn' => $this->getInn(),
				'InvoiceId' => $this->orderId, 
				'AccountId' => $this->insalesId, 
				'Type' => $type,
				'CustomerReceipt' => [
					'Items' => $this->convertItems()
				] ,
				'taxationSystem' => $this->getTaxationSystem(),
				'email' => $this->email,
				'phone' => $this->phone,
			],
			function($res){
				$content = json_decode($res->getBody()->getContents());
				if($content->Success==TRUE)
					return $content->Success==TRUE;
				else
					return $content;
			}
		);
	}

	private function convertItems() {
		return $this->listItems;
	}

	private function sendToCK($data, $valid, $type='POST', $publicId = NULL, $apiSecret = NULL)
	{
		if(is_null($publicId))
			$publicId = $this->getPublicId();
		if(is_null($apiSecret))
			$apiSecret = $this->getApiSecret();
		try {
			$req = [	
				'header' => [
					'Content-Type' => 'application/json'
				],
				'auth' => [
					$publicId,
					$apiSecret
				],
				'json' => $data,
			];
			switch ($type) {
				case 'POST':
					$link = $this->link;
					break;

				default:
					$link = $this->link;
				break;
			}
			$res = $this->guzzle->request(
				$type,
				$link,
				$req
			);
			return $valid($res);
		}
		catch (ServerException|ClientException $e) 
		{
			Log::error('Err sending bill '.json_encode($e->getResponse()->getBody()->getContents()));
			return FALSE;
		}
	}
}