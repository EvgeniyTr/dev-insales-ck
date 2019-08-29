<?php

namespace App\Http\Controllers;

use App\Services\User;
use App\Services\InSalesApi;
use Illuminate\Http\Request;

class Settings extends Controller
{
    public function get(Request $request) {
	    if (auth()->user()) {
		    $request->request->add(['insales_id' => auth()->user()->insalesId ?? $request->input('insales_id')]);
		    return $this->catchException(['insales_id'], $request,
			    function($request)
			    {
				    $user = new User($request->input('insales_id'));
				    $values = $user->translate('Settings');
				    $values['backOfficeUrl'] = $user->getUrlShop();
				    $values['publicId'] = $user->getPublicId();
				    $values['apiSecret'] = $user->getApiSecret();
				    $values['userInn'] = $user->getInn();
				    $values['vatId'] = $user->getNDS();
				    $values['userTaxationSystem'] = $user->getTaxationSystem();
				    $values = array_merge($values, $user->translate('FirstTimeSetup'));

				    $insales_api = new InSalesApi($request->input('insales_id'));
				    $gateways = $insales_api->showPaymentGateWays();
				    $values['gateways'] = $gateways;
				    $values = array_merge($values, $user->getGatewayExceptions());

				    return view('Settings.main',
					    array_merge($values, config()->get('firstTimeSetup'))
				    )->render();
			    }
		    );
	    }
    }

    public function getJS(Request $request) {
        //$user = new User($request->input('insales_id'));
        //$values = $user->translate('FirstTimeInit');
        return view('Settings.js', config()->get('firstTimeSetup'))->render();
    }
}
