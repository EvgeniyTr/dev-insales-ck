<?php 

namespace App\Services;	

use App\Models\Users;

class OfficeWidget extends InSalesApi
{

	private $pathForAddWidget;
	private $heightOfficeWidget;
	private $page_typeOfficeWidget;

	function __construct($insalesId) 
	{
		parent::__construct($insalesId);
		$this->pathForAddWidget = 'application_widgets';
		$this->heightOfficeWidget = 100;
		$this->page_typeOfficeWidget = 'order';
	}

	public function addOfficeWidget() {
		logger()->debug('addOfficeWidget');
		$widgetId = $this->add(
			$this->user->getWidgetId(),
			$this->pathForAddWidget,
			function($id, $bodyResp) {
				logger()->debug('1');
				if(!empty($bodyResp))
					return $bodyResp->id == $id;
				else
					return FALSE;
			},
			[
				'application_widget' => [
					'code' => $this->getWidgetCode(),
					'height' => $this->heightOfficeWidget,
					'page_type' => $this->page_typeOfficeWidget
				]
			],
			function($bodyResp){
				logger()->debug('2 ' . $bodyResp);
				if(!empty($bodyResp))
					return $bodyResp->id;
				else
					return null;
			}
		);
		logger()->debug('widgetId');
		$this->setWidgetId($widgetId);
		logger()->debug('finished addOfficeWidget');
	}

	private function getWidgetCode() {
		return view(
			'OfficeWidget.Code',
			[
				'labelBillSuccessApplied' => $this->user->translate('OfficeWidget.labelBillSuccessApplied'),
				'labelBillSuccessRefunded' => $this->user->translate('OfficeWidget.labelBillSuccessRefunded'),
				'labelSendBillApplied' => $this->user->translate('OfficeWidget.labelSendBillApplied'),
				'labelSendBillRefunded' => $this->user->translate('OfficeWidget.labelSendBillRefunded'),
				'buttonApplyBill' => $this->user->translate('OfficeWidget.buttonApplyBill'),
				'buttonApplyAgainBill' => $this->user->translate('OfficeWidget.buttonApplyAgainBill'),
				'buttonRefundBill' => $this->user->translate('OfficeWidget.buttonRefundBill'),
				'buttonRefundAgainBill' => $this->user->translate('OfficeWidget.buttonRefundAgainBill'),
				'unknownErr' => $this->user->translate('OfficeWidget.unknownErr'),
				'handleFieldBillStatus' => config()->get('local.handleFieldStatusBill'),
				'listBillStatuses' => config()->get('local.listStatusesBill'),
				'JQuerry' => config()->get('local.JQuerry'),
				'loadImage' => config()->get('local.path').config()->get('local.loadImage'),
				'applyBill' => config()->get('local.path').config()->get('local.applyBill'),
				'refundBill' => config()->get('local.path').config()->get('local.refundBill'),
				'listNDSVal' => config()->get('local.listNDSVal'),
				'titleNDSNull' => $this->user->translate('OfficeWidget.titleNDSNull'),
				'titleNDS0' => $this->user->translate('OfficeWidget.titleNDS0'),
				'titleNDS10' => $this->user->translate('OfficeWidget.titleNDS10'),
				'titleNDS18' => $this->user->translate('OfficeWidget.titleNDS18'),
				'titleNDS110' => $this->user->translate('OfficeWidget.titleNDS110'),
				'titleNDS118' => $this->user->translate('OfficeWidget.titleNDS118'),
				'buttonGenBill' => $this->user->translate('OfficeWidget.buttonGenBill'),
				'labelSendBillOnEmail' => $this->user->translate('OfficeWidget.labelSendBillOnEmail'),
				'labelSendBillOnSMS' => $this->user->translate('OfficeWidget.labelSendBillOnSMS'),
				'titleItemsColomn' => $this->user->translate('OfficeWidget.titleItemsColomn'),
				'titleNDSColomn' => $this->user->translate('OfficeWidget.titleNDSColomn'),
				'oneNDS' => $this->user->getNDS(),
			]				
		)->render();
	}
}