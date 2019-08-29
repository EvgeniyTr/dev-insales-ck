<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\User;

class CKGatewayExceptions extends Controller
{
    public function save(Request $request) {
        return $this->catchException(['insales_id', 'gateway-exception-1', 'gateway-exception-2','gateway-exception-3'], $request,
            function($request)
            {
	            $user = new User($request->input('insales_id'));
	            $user->getUser()->gatewayException1 = (int) $request->input('gateway-exception-1');
                $user->getUser()->gatewayException2 = (int) $request->input('gateway-exception-2');
                $user->getUser()->gatewayException3 = (int) $request->input('gateway-exception-3');
	            $user->getUser()->save();

	            return response()->json(true)->setCallback($request->input('callback'));
            }
        );
    }
}
