<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\User;

class CkVAT extends Controller
{
	//TODO: Поправить НДС, должно сохраняться как int
    public function save(Request $request) {
        return $this->catchException(['insales_id', 'vat'], $request,
            function($request)
            {
            	$status = True;
            	$user = new User($request->input('insales_id'));
            	$nds = $request->input('vat');
        		if ($nds == -1 or $nds == 0 or $nds == 10 or $nds == 18) {
                    if($nds == -1) {
                    	$user->setNDS(NULL);
                    } else {
                    	$user->setNDS($request->input('vat'));
                    }
                } else {
        			$status = False;
		        }
    			return response()->json($status)->setCallback($request->input('callback'));
            }
        );
    }
}
