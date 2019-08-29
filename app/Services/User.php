<?php 

namespace App\Services;	

use App\Models\Users;

class User 
{
	private $user;
	protected $insalesId;

	public function __construct($insalesId)
	{
		$this->insalesId = $insalesId;
		$user = Users::onlyTrashed()->where('inSalesId', $insalesId)->first();
        if(is_null($user)){
            $user = Users::where('inSalesId', $insalesId)->first();
            if(is_null($user)) 
                $user = new Users;
        } else {
	        $user->restore();
        }

		$this->user = &$user;
	}

	public function setInsalesId() {
		$this->save($this->insalesId, function($val){$this->user->insalesId = $val;});
	}

	public function setUrlShop($urlShop) {
		$this->save($urlShop, function($val){$this->user->urlShop = $val;});
	}

	public function getUrlShop() {
		return $this->user->urlShop;
	}

	public function setPass($pass) {
		$this->save($pass, function($val){$this->user->pass = $val;});
	}

	public function getPass() {
		return $this->user->pass;
	}

	public function getWidgetId() {
		return $this->user->widgetId;
	}

	//TODO: Удалить
//	public function getFieldStatusId() {
//		return $this->user->fieldStatusId;
//	}

	public function getLocale() {
		return $this->user->lang;
	}
	
	public function getApiSecret() {
		return $this->user->apiSecret;
	}

	public function setLocale($lang) {
		$this->save($lang, function($val){$this->user->lang = $val;});
	}
	public function setFieldApiSecret($apiSecret) {
		$this->save($apiSecret, function($val){$this->user->apiSecret = $val;});
	}

	public function getPublicId() {
		return $this->user->publicId;
	}

	public function getInn() {
		return $this->user->inn;
	}

	public function getNDS() {
		return $this->user->nds;
	}

	public function setNDS($nds) {
		$this->user->nds = $nds;
		$this->user->save();
	}

	public function getTaxationSystem() {
		return $this->user->taxationSystem;
	}

	public function getFirstTimeSetup() {
		return $this->user->firstTimeSetup;
	}

	public function getInsalesUriAttribute() {
		return $this->user->getInsalesUriAttribute();
	}

	public function getGatewayExceptions() : array {
		return [
			'gatewayException1' => $this->user->gatewayException1,
			'gatewayException2' => $this->user->gatewayException2,
			'gatewayException3' => $this->user->gatewayException3,
			'gatewayException4' => $this->user->gatewayException4,
		];
	}

	public function getUser() {
		return $this->user;
	}

	public function setFieldPublicId($fieldPublicId) {
		$this->save($fieldPublicId, function($val){$this->user->publicId = $val;});
	}

	public function setFieldStatusId($fieldStatusId) {
		$this->save($fieldStatusId, function($val){$this->user->fieldStatusId = $val;});
	}

	public function setFieldFirstTimeSetup($fieldFirstTimeSetup) {
		$this->save($fieldFirstTimeSetup, function($val){$this->user->firstTimeSetup = $val;});
	}

	public function setWidgetId($widgetId) {
		$this->save($widgetId, function($val){$this->user->widgetId = $val;});
	}

	public function setFieldInn($inn) {
		$this->save($inn, function($val){$this->user->inn = $val;});
	}

	public function setFieldTaxationSystem($taxationSystem) {
		$this->save($taxationSystem, function($val){$this->user->taxationSystem = $val;});
	}


	private function isValid($val) {
		return !empty($val) || $val === 0 || $val === '0';
	}

	private function save($val, $setVal) {
		if($this->isValid($val)) {
			$setVal($val);
			$this->user->save();
		}
	}

	public function translate($var) {
		$locale = $this->getLocale();
		if(!empty($locale))
        	return __($var, [], $locale);
        else
        	return __($var);
	}

	public function deleteUser() {
		$this->user->delete();
	}

	public function cleanUser(){
		$u =& $this->user;
		$u->pass = $this->clear();
		$u->inn = $this->clear();
		$u->taxationSystem = $this->clear();
		$u->nds = $this->clear();
		$u->apiSecret = $this->clear();
		$u->widgetId = $this->clear();
		$u->publicId = $this->clear();
		$u->fieldStatusId = $this->clear();
		$u->firstTimeSetup = $this->clear();
		$u->save();
	}

	private function clear(){
		return null;
	}
}