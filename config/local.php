<?php

return [
	'secret'                => env('INSALES_APP_TOKEN'),
	'addId'                 => env('INSALES_APP_NAME', 'cloudkassir'),
	'path'                  => env('APP_URL', 'https://insales.cloudkassir.ru/'),
	'handleFieldStatusBill' => 'CloudKassirStatus',
//	'listStatusesBill'      => '["applyed","refunded", "try_refund", "try_apply", "all"]',
	'JQuerry'               => 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
	'loadImage'             => 'images/loadPicture.gif',
	'applyBill'             => 'apply-bill',
	'refundBill'            => 'refund-bill',
	'kktReceipt'            => 'https://api.cloudpayments.ru/kkt/receipt',
	'listNDSVal'            => '[null, 10, 18, 0]',
	'ckTestApi'             => 'https://api.cloudpayments.ru/test',
];