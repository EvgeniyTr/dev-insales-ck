<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\ValidateAutologin;
use App\Models\Users;
use App\Http\Controllers\Controller;

class AutologinController extends Controller
{
	private const AUTHORIZATION_ERROR = 'Authorization failed';
	private const INVALID_TOKEN       = 'Invalid token';
	private const INVALID_TOKEN2       = 'Invalid token2';

	public function autologin(ValidateAutologin $request)
	{
		if (!$request->session()->exists('insales_id') || !$request->session()->exists('token')) {
			$this->showDenialMessage(self::AUTHORIZATION_ERROR);
		}

		$user = Users::where('insalesId', '=', (int) $request->session()->pull('insales_id'))->first();
		$token = $request->session()->pull('token');

		if (null === $user || null === $token) {
			return $this->showDenialMessage(self::AUTHORIZATION_ERROR);
		}

		$verification_token1 = md5(
			$token .
			$user->pass
		);

		$verification_token2 = md5(
			$token .
			$request->user_email .
			$request->user_name .
			$request->user_id .
			$user->pass
		);

		if ($request->token !== $verification_token1) {
			return $this->showDenialMessage(self::INVALID_TOKEN);
		}

//		if ($user->insalesId == '597430') {
//			$verification_token3 = md5(
//				$token .
//				$request->user_email .
//				$request->user_name .
//				$request->user_id .
//				$request->email_confirmed .
//				$user->pass
//			);
//
//			if ($request->token3 !== $verification_token3) {
//				return response()->json([
//					'token3' => $request->token3,
//					'calculated' => $verification_token3,
//					'token' => $token,
//					'user_email' => $request->user_email,
//					'user_name' => $request->user_name,
//					'user_id' => $request->user_id,
//					'email_confirmed' => $request->email_confirmed,
//				], 401);
//			}
//		} else {
			if ($request->token2 !== $verification_token2) {
				info('Token2: from request ' . $request->token2 . ', calculated ' . $verification_token2, [
					'$token' => $token,
					'$request->user_email' => $request->user_email,
					'$request->user_name' => $request->user_name,
					'$request->user_id' => $request->user_id,
					'$user->pass' => $user->pass,
				]);
				return $this->showDenialMessage(self::INVALID_TOKEN2);
			}
//		}

		auth()->login($user, true);

		$request->session()->regenerate();

		return redirect()->intended('/home?insales_id=' . auth()->user()->insalesId);
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
