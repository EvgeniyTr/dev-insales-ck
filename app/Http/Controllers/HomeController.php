<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showInstruction()
    {
    	return view('Administration.instruction', [
		    'path'  => config('local.path'),
		    'srcLaravelCss' => asset('css/app.css'),
		    'srcCssAdminPanel' => asset('css/admin.css'),
		    'urlJQuerry' => config('local.JQuerry'),
		    'srcJsSettings' => asset('settings-js'),
		    'urlLibPopUpJs' => 'https://insales.cloudkassir.ru/js/sweetalert2min.js',
		    'titleLinkOnCPSite' => 'О сервисе',
		    'supportEmail' => 'Помощь',
		    'titleLinkSupportEmail' => 'support@cloudpayments.ru',
		    'insalesPhone' => '+7 (495) 374-78-60',
		    'insalesEmail' => 'sales@cloudpayments.ru',
	    ]);
    }
}
