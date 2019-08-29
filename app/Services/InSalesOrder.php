<?php 

namespace App\Services;	

use App\Models\Users;

class InSalesOrder extends InSalesApi
{

	private $path;

	function __construct($insalesId, $orderId) 
	{
		parent::__construct($insalesId);
		$this->path = "orders/".$orderId;
	}

	public function setStatusTryApply(){
		$this->updateOrder('try_apply');
	}

	public function setStatusTryRefund(){
		$this->updateOrder('try_refund');
	}

	private function updateOrder($val) {
		$this->put($this->path, 
			[
				"order" =>[
					"fields_values_attributes" => [
						[
							"handle" => config()->get('local.handleFieldStatusBill'),
							"value" => $val
						]
					]
				]
			]
		);
	}
}