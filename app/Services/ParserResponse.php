<?php 

namespace App\Services;	

trait ParserResponse
{
	protected function getEmptyObj() {
		$obj = new \stdClass;
		$obj->status = null;
		$obj->apiUsageLimit = null;
		$obj->bodyContents = null;
		return $obj;
	}

	private function isValid($var){
		return $var;
	}

	protected function parseResponce($res) 
	{
		$obj = new \stdClass;
		$obj->status = $this->isValid($res->getStatusCode());
		$obj->apiUsageLimit = $this->isValid($res->getHeader('api-usage-limit'));
		$obj->bodyContents = $this->isValid(json_decode($res->getBody()->getContents()));
		return $obj;
	}
}