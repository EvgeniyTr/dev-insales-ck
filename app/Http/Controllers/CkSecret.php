<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CloudKassirApi;
use App\Services\User;

class CkSecret extends Controller
{
    public function save(Request $request) {
        return $this->catchException(['insales_id', 'public_id', 'api_secret'], $request,
            function($request)
            {
				$ck = new CloudKassirApi($request->input('insales_id'));
				$resp = $ck->test($request->input('public_id'), $request->input('api_secret'));
				if(!$resp)
					$out['messerr'] = 'invalidPar';
				else {
					$user = new User($request->input('insales_id'));
					$user->setFieldApiSecret($request->input('api_secret'));
					$user->setFieldPublicId($request->input('public_id'));
				}

				$out['status'] = $resp;
    			return response()->json($out)->setCallback($request->input('callback'));
            }
        );
    }
}
