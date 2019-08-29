<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\User;

class CkSett extends Controller
{
    public function save(Request $request) {
        return $this->catchException(['insales_id', 'inn', 'taxation-system'], $request,
            function($request)
            {
            	$status = True;
            	$user = new User($request->input('insales_id'));
            	$user->setFieldInn($request->input('inn'));
            	$taxation = $request->input('taxation-system');
            	if($taxation == 0 or $taxation == 1 or $taxation == 2 or $taxation == 3 or $taxation == 4 or $taxation == 5) {
		            $user->setFieldTaxationSystem($taxation);
	            } else {
		            $status = False;
	            }
            	/*$nds = $request->input('nds');
            	if($request->input('all-nds'))
            		if($nds == -1 or $nds == 0 or $nds == 10 or $nds == 18 or $nds == 110 or $nds == 118)
            			$user->setNDS($request->input('nds'));
            		else
            			$status = False;
                */
    			return response()->json($status)->setCallback($request->input('callback'));
            }
        );
    }
}

