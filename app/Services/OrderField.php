<?php 

namespace App\Services;	

use App\Models\Users;

//TODO: Удалить устаревший класс по завершении работ
class OrderField extends InSalesApi
{

	private $pathForAddField;
	private $handlefieldStatus;
	private $officeTitleFieldStatus;

	function __construct($insalesId) 
	{
		parent::__construct($insalesId);
		$this->pathForAddField = 'fields';
		$this->officeTitleFieldStatus = $this->user->translate('main.titleFieldStatus');
		$this->handlefieldStatus = config()->get('local.handleFieldStatusBill');
	}

	public function addFieldStatusForWidget() {
		$fieldStatusId = $this->add(
			$this->user->getFieldStatusId(),
			$this->pathForAddField,
			function($id, $bodyResp) {
				if(!empty($bodyResp))
					return $bodyResp->id == $id;
				else
					return FALSE;
			},
			$this->getBodyReq(),
			function($bodyResp){
				if(!empty($bodyResp))
					return $bodyResp->id;
				else
					return null;
			},
			function($field) {
				$resp = $this->getEmptyObj();
				if(!empty($field))
					if($field->handle == $this->handlefieldStatus){
						$resp->bodyContents = $field;
						return $resp;
					}
				return FALSE;
			}
		);
		$this->setFieldStatusId($fieldStatusId);
	}

	private function getBodyReq() {
		return [				
			'field' => [
				'type' => 'Field::TextField',
				'office_title' => $this->officeTitleFieldStatus,
				'destiny' => 3,
				'handle' => $this->handlefieldStatus,
				'active' => FALSE,
				'for_buyer' => FALSE,
				'show_in_result' => FALSE,
				'show_in_checkout' => FALSE,
				'is_indexed' => FALSE,
				'hide_in_backoffice' => FALSE,
				'active' => TRUE
			]
		];
	}
}