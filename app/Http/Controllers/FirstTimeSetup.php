<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\User;

class FirstTimeSetup extends Controller
{
    public function get(Request $request) {
    	if (auth()->user()) {
		    $request->request->add(['insales_id' => auth()->user()->insalesId ?? $request->input('insales_id')]);
		    return $this->catchException(['insales_id'], $request,
			    function($request)
			    {
				    $user = new User($request->input('insales_id'));
				    $values = $user->translate('FirstTimeSetup');
				    $values['backOfficeUrl'] = $user->getUrlShop();
				    return view('FirstTimeSetup.main',
					    array_merge($values, config()->get('firstTimeSetup'))
				    )->render();
			    }
		    );
	    }
    }

    public function getJS(Request $request) {
        //$user = new User($request->input('insales_id'));
        //$values = $user->translate('FirstTimeInit');
        return view('FirstTimeSetup.js', config()->get('firstTimeSetup'))->render();
    }
}
