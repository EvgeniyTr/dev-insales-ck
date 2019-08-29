<?php

namespace App\Http\Controllers;

use App\Jobs\Installation\AddWebhook;
use App\Jobs\Installation\AddFieldToOrders;
use App\Jobs\Installation\InstallWidget;
use Illuminate\Http\Request;
use App\Services\OfficeWidget;
use App\Services\OrderField;
use App\Services\User;
use App\Models\Users;

class Init extends Controller
{
	public function init(Request $request)
	{
		$user = Users::where('insalesId', '=', $request->insales_id)->first();
		dispatch(new AddWebhook($user));
		dispatch(new InstallWidget($user));
		dispatch(new AddFieldToOrders($user, AddFIeldToOrders::CK_INCOME_RECEIPT, 'fieldIncomeId'));
		dispatch(new AddFieldToOrders($user, AddFIeldToOrders::CK_INCOME_RETURN_RECEIPT, 'fieldIncomeReturnId'));
	}

    public function addAuthData(Request $request) {
        $user = new User($request->input('insales_id'));
        $user->setFieldInn('7708806062');
        $user->setFieldTaxationSystem(0);
        $user->setNDS(10);
    }

    public function completeSetup(Request $request) {
        return $this->catchException(['insales_id'], $request,
            function($request)
            {
                $user = new User($request->input('insales_id'));
                $user->setFieldFirstTimeSetup(TRUE);
            }
        );  
    }

    public function getSetupStatus(Request $request) {
        return $this->catchException(['insales_id'], $request,
            function($request)
            {
                $user = new User($request->input('insales_id'));
                return response()->json(['status' => TRUE, 'FirstTimeSetup' => $user->getFirstTimeSetup()])->setCallback($request->input('callback'));
            }
        );  
    }
}
