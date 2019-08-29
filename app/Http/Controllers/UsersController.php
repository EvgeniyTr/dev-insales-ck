<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	public function showAll(Request $request)
	{
		if (null !== auth()->user()) {
			if ((int) auth()->user()->insalesId === 360290 || (int) auth()->user()->insalesId === 524589) {
				$users = Users::orderBy('insalesId', 'asc')->paginate(50);
				return view('Administration.users', [
					'users' => $users,
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

			abort(404);
		}

		abort(404);
	}
}
