<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ValidateAutologin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
	        'token'      => 'required',
	        'user_email' => 'required|string|email|max:255',
	        'user_name'  => 'required|string',
	        'user_id'    => 'required|string',
	        'token2'     => 'required',
        ];
    }

	/**
	 * Handle a failed validation attempt.
	 *
	 * @param  \Illuminate\Contracts\Validation\Validator  $validator
	 * @return void
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function failedValidation(Validator $validator)
	{
		logger()->debug(__CLASS__ . ', event "Validation Failure"', $this->request->all());

		throw (new ValidationException($validator))
			->errorBag($this->errorBag)
			->redirectTo($this->getRedirectUrl());
	}
}
