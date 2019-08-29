<?php

namespace App\Http\Requests\Widget;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class InSalesOrderInfo extends FormRequest
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
	        'fields_values' => 'sometimes|array|nullable',
	        'order_lines'                    => 'required|array',
	        'order_lines.*.full_total_price' => 'required|numeric',
	        'order_lines.*.quantity'         => 'required|int',
	        'order_lines.*.weight'           => 'sometimes|numeric|nullable',
	        'order_lines.*.dimensions'       => 'sometimes|string|nullable',
	        'order_lines.*.sku'              => 'sometimes|string|nullable',
	        'order_lines.*.barcode'          => 'sometimes|string|nullable',
	        'order_lines.*.title'            => 'required|string',
	        'order_lines.*.vat'              => 'sometimes|int|nullable',
	        'shipping_address.name'                  => 'sometimes|string|nullable',
	        'shipping_address.phone'                 => 'sometimes|string|nullable',
	        'shipping_address.full_delivery_address' => 'sometimes|string|nullable',
	        'shipping_address.location.region_zip' => 'sometimes|string|nullable',
	        'shipping_address.location.country'    => 'sometimes|string|nullable',
	        'shipping_address.location.state'      => 'sometimes|string|nullable',
	        'shipping_address.location.state_type' => 'sometimes|string|nullable',
	        'shipping_address.location.city'       => 'sometimes|string|nullable',
	        'shipping_address.location.settlement' => 'sometimes|string|nullable',
	        'shipping_address.location.street'     => 'sometimes|string|nullable',
	        'shipping_address.location.house'      => 'sometimes|string|nullable',
	        'shipping_address.location.flat'       => 'sometimes|string|nullable',
	        'client.email' => 'sometimes|string|nullable',
	        'client.name'  => 'sometimes|string|nullable',
	        'client.phone' => 'sometimes|string|nullable',
	        'id'                   => 'required|integer',
	        'number'               => 'required|integer',
	        'account_id'           => 'required|exists:Users,insalesId|integer',
	        'total_price'          => 'required|numeric',
	        'items_price'          => 'required|numeric',
	        'financial_status'     => 'required|string',
	        'delivery_variant_id'  => 'required|integer',
	        'delivery_description' => 'sometimes|string',
	        'full_delivery_price'  => 'required|numeric',
	        'payment_gateway_id'   => 'required|integer',
	        'delivery_info.tariff_id' => 'sometimes|string|nullable',
	        'delivery_info.outlet.external_id' => 'sometimes|string|nullable',
	        'delivery_info.outlet.latitude'    => 'sometimes|numeric|nullable',
	        'delivery_info.outlet.longitude'   => 'sometimes|numeric|nullable',
        ];
    }

	/**
	 * Handle a failed validation attempt.
	 * @param Validator $validator
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function failedValidation(Validator $validator)
	{
		logger()->debug(__CLASS__ . ', event "Validation Failure"', ['data' => $this->request->all(), 'errors' => $validator->errors()->toArray()]);

		throw (new ValidationException($validator))
			->errorBag($this->errorBag);
	}
}
