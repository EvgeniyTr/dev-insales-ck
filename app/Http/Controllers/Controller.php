<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function catchException($parametersForValidation, $request,  $func, $langConst=null, $go=null) {
        try {
            if(!empty($langConst))
                $parametersForValidation[] = 'insales_id';
            if($this->isValidRequest($request->input(), $parametersForValidation)) {
                if(!empty($langConst)) {
                    $updateLangConst = $this->applyLang($langConst, $request->input('insales_id')); 
                    if(is_null($go)) {
                    	return $func($request, $updateLangConst);
                    } else {
	                    return $func($request, $updateLangConst, $go);
                    }
                } else {
	                if(is_null($go)) {
		                return $func($request);
	                } else {
	                	return $func($request, $go);
	                }
                }
            }
            else {
            	throw new \Exception('Invalid request.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage().' Request data: '.json_encode($request->input()));
            abort(500);
        }
    }

    private function applyLang($langCons, $InSalesId)
    {
        $user = Users::where('inSalesId', $InSalesId)->first();
        if ($user) {
            app()->setLocale($user->lang);
            foreach ($langCons as $key => $value) {
                $langCons[$key] = __($value);
            }
            return $langCons;
        }
        else {
        	abort(404, 'bad request');
        }
    }

    private function isValidRequest($request, $fields) 
    {
        if(!empty($fields)) {
            foreach ($fields as $key => $field) {
                if(!isset($request[$field])){
                    return FALSE;
                } else {
                    if(!is_string($field)) {
                       if(!isset($field->$key)){
                            return FALSE;
                        } 
                    }
                }
            }
        } else {
            return FALSE;
        }

        return TRUE;
    }
}
