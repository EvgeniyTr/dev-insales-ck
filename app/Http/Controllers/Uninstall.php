<?php

namespace App\Http\Controllers;

use App\Jobs\Removal\RemoveFieldFromOrders;
use Illuminate\Http\Request;
use App\Services\DeleteApp;
use App\Models\Users;

class Uninstall extends Controller
{
    public function get(Request $request) {
        $parametersForValidation = ['insales_id'];
        return  $this->catchException($parametersForValidation, $request,
            function($request)
            {
            	try {
		            $user = Users::where('insalesId', '=', $request->insales_id)->first();
		            dispatch(new RemoveFieldFromOrders($user, $user->fieldIncomeId));
		            dispatch(new RemoveFieldFromOrders($user, $user->fieldIncomeReturnId));
	            } catch (Exception $e) {
            		logger()->alert('Error in process of dispatching jobs');
	            } finally {
		            $user = new DeleteApp($request->input('insales_id'));
//                $user->deleteFields();
		            $user->cleanUser();
		            $user->deleteUser();
	            }
            }
        );
    }
}
