<?php

namespace App\Http\Middleware;

use App\Models\AppSettings;
use App\Models\Users;
use Closure;
use Illuminate\Http\Request;

class CheckAuthorization
{
	const AUTHORIZATION_ERROR = 'Authorization failed';

    public function handle(Request $request, Closure $next)
    {
	    if ($request->exists('insales_id') && $this->isUserRegistered($request) && !auth()->check()) {
		    if ($request->exists('shop')) {
			    $token = str_random(36);
			    info('Token ' . $token);

			    $request->session()->flash('insales_id', $request->insales_id);
			    $request->session()->flash('token', $token);

			    $redirect_url = 'http://' . $request->shop . '/admin/applications/' . config('local.addId') . '/login' .
			                    '?token=' . $token .
			                    '&login=' . route('app.autologin');

			    return redirect()->away($redirect_url);
		    }
		    return $this->showDenialMessage(self::AUTHORIZATION_ERROR);
	    }

	    if ($request->exists('insales_id') && !$this->isUserRegistered($request) && !auth()->check()) {
		    return $this->showDenialMessage(self::AUTHORIZATION_ERROR);
	    }

	    return $next($request);
    }

    public function isUserRegistered(Request $request) : bool
    {
    	return (bool) Users::where('insalesId', '=', $request->input('insales_id'))->exists();
    }

	public function showDenialMessage(string $description)
	{
		return response()->json([
			'error' => [
				'status' => 401,
				'description' => $description,
			]
		], 401);
	}
}
