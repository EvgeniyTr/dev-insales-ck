<?php

//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Credentials: true');

Route::name('receipt.')->group(function() {
	Route::post('webhooks/{user}/orders/update', 'ReceiptGeneratorController@generateIncomeReceiptFromWebhook')
	     ->name('income-webhook');
	Route::post('widget/{user}/generate-income-receipt', 'ReceiptGeneratorController@generateIncomeReceipt')
	     ->name('income')
	     ->middleware(['cors']);
	Route::post('widget/{user}/generate-income-return-receipt', 'ReceiptGeneratorController@generateIncomeReturnReceipt')
	     ->name('income-return')
	     ->middleware(['cors']);
});
