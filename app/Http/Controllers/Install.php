<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InstallApp;

class Install extends Controller
{
    public function get(Request $request) {
    	$parametersForValidation = ['shop', 'token'];
        return $this->catchException($parametersForValidation, $request,
            function($request)
            {
            	$app_installation_service = new InstallApp($request->input('insales_id'));
            	$app_installation_service->setInsalesId();
            	$app_installation_service->setUrlShop($request->input('shop'));
	            $app_installation_service->setLocale('ru');
	            $app_installation_service->setPassFromToken($request->input('token'));
            }
        );
    }
}
