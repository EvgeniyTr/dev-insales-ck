<?php 

namespace App\Services;	

use App\Services\User;

class InstallApp extends User
{

	private $appSecret;

	public function __construct($insalesId)
	{
		parent::__construct($insalesId);
		$this->appSecret = config()->get('local.secret');
	}

	public function setPassFromToken($token) {
		$this->setPass(md5($token.$this->appSecret));
	}

}