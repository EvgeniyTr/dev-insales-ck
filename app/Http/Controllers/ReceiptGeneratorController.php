<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Requests\Widget\InSalesOrderInfo;
use Illuminate\Support\Collection;

use GuzzleHttp\{
	Client as Guzzle, Exception\ClientException, Exception\ServerException
};

class ReceiptGeneratorController extends Controller
{
	public const CK_INCOME_RECEIPT = 'cloudkassir_income_receipt';
	public const CK_INCOME_RETURN_RECEIPT = 'cloudkassir_income_return_receipt';

	public const RECEIPT_INCOME = 'Income';
	public const RECEIPT_INCOME_RETURN = 'IncomeReturn';

	public const PENDING = 'pending';
	public const PAID    = 'paid';

	private $user;
	private $guzzle;

	public function __construct(Guzzle $guzzle)
	{
		$this->guzzle = $guzzle;
	}

    public function generateIncomeReceiptFromWebhook(InSalesOrderInfo $request, Users $user)
    {
	    $this->user = $user;
	    $order_info = $request->validated();
	    info('Webhook', $order_info);

	    try {
		    if ($this->isReceiptGenerationPermitted($order_info, self::PAID, self::CK_INCOME_RECEIPT) &&
		        !cache()->has($order_info['id'] . '-' . self::PENDING)) {

			    $receipt_body = $this->generateReceipt($order_info, self::RECEIPT_INCOME);
			    logger()->notice(__METHOD__, $receipt_body);
			    $receipt_response = $this->placeReceiptGenerationRequest($receipt_body);
			    logger()->info($receipt_response);

			    if ($receipt_response['Success'] === true) {
				    $this->changeFieldValue($order_info['id'], self::CK_INCOME_RECEIPT, 'https://receipts.ru/' . $receipt_response['Model']['Id']);

				    cache([$order_info['id'] . '-' . self::PENDING => $order_info], 60);

				    return response()->json($receipt_response);
			    }

			    return response()->json('', 400);
		    }
	    } catch (\Exception $e) {
	    	logger()->alert(__METHOD__ . ' error occurred during process of receipt generation ' . $e->getMessage());
	    }

	    logger()->notice(__METHOD__ . ' receipt already generated or happened some error in code', $order_info);
	    return response()->json('', 200);
    }

    public function generateIncomeReturnReceipt(InSalesOrderInfo $request, Users $user)
    {
    	$this->user = $user;
    	$order_info = $request->validated();

	    if ($this->isReceiptGenerationPermitted($order_info, self::PAID, self::CK_INCOME_RETURN_RECEIPT) &&
	        !cache()->has($order_info['id'] . '-' . self::PAID)) {

		    $receipt_body = $this->generateReceipt($order_info, self::RECEIPT_INCOME_RETURN);
		    $receipt_response = $this->placeReceiptGenerationRequest($receipt_body);

		    if ($receipt_response['Success'] === true) {
			    $this->changeOrderFinancialStatus($order_info['id'], self::PENDING);
			    $this->changeFieldValue($order_info['id'], self::CK_INCOME_RETURN_RECEIPT, 'https://receipts.ru/' . $receipt_response['Model']['Id']);

			    cache([$order_info['id'] . '-' . self::PAID => $order_info], 60);

			    return response()->json($receipt_response);
		    }

		    return [
			    'errors' => [
				    'details' => 'Произошла ошибка в процессе создания чека возврата.',
			    ]
		    ];
	    }

	    return [
		    'errors' => [
			    'details' => 'Печать чека недоступна.',
		    ]
	    ];
    }

    public function generateReceipt(array $order_info, string $receipt_type) : array
    {
	    $items = $this->collectItems($order_info['order_lines']);

//	    if ($order_info['full_delivery_price']) {
		    $items[] = $this->addDeliveryExpenses($order_info);
//	    }

	    return [
		    'Inn' => $this->user->inn,
		    'InvoiceId' => $order_info['number'],
		    'AccountId' => $this->user->insalesId,
		    'Type' => $receipt_type,
		    'CustomerReceipt' => [
			    'Items' => $items,
			    'taxationSystem' => $this->user->taxationSystem,
			    'email' => $order_info['client']['email'],
			    'phone' => $order_info['client']['phone'],
		    ]
	    ];
    }

    public function collectItems(array $order_lines)
    {
    	return array_map(function($item) {
		    return [
			    'label'    => (string) $item['title'],
			    'price'    => (float) $item['full_sale_price'],
			    'quantity' => (int) $item['quantity'],
			    'amount'   => (float) $item['full_total_price'],
			    'vat'      => $this->getItemVat($item['vat']),
		    ];
	    }, $order_lines);
    }

    public function getItemVat(?int $item) : ?int
    {
    	$vat_variants = [
    		-1 => null,
		    0  => 0,
		    10 => 10,
		    18 => 18,
			20 => 20,
	    ];

    	return $item ? $vat_variants[$item] : null;
    }

    public function addDeliveryExpenses(array $order_info) : array
    {
	    return [
		    'label'    => $order_info['delivery_description'],
		    'price'    => (float) $order_info['full_delivery_price'],
		    'quantity' => 1,
		    'amount'   => (float) $order_info['full_delivery_price'],
		    'vat'      => (int) $this->user->nds,
	    ];
    }

    public function placeReceiptGenerationRequest(array $receipt_body) : array
    {
	    $cashbox_uri = 'https://api.cloudpayments.ru/kkt/receipt';

	    $receipt_generation_request = [
	    	'auth' => [$this->user->publicId, $this->user->apiSecret],
		    'headers'          => [
			    'Content-Type' => 'application/json; charset=utf-8',
		    ],
		    'json' => $receipt_body,
	    ];

	    $response = $this->guzzle->post($cashbox_uri, $receipt_generation_request);
	    $cloudkassir_response = json_decode($response->getBody(), true, JSON_UNESCAPED_UNICODE);

	    logger()->notice('CloudKassir response', $cloudkassir_response);

	    if ($response->getStatusCode() === 200) {
		    return $cloudkassir_response;
	    }

	    throw new \Exception('Error happened during receipt generation action');
    }

    public function changeOrderFinancialStatus(int $order_id, string $status)
    {
	    $order_uri = $this->user->insales_uri . '/admin/orders/' . $order_id . '.json';

	    $order_changing_request = [
		    'headers'          => [
			    'Content-Type' => 'application/json; charset=utf-8',
		    ],
		    'json' => [
		    	'order' => [
		    		'financial_status' => $status
			    ]
		    ],
	    ];

	    $response = $this->guzzle->put($order_uri, $order_changing_request);
	    $insales_response = json_decode($response->getBody(), true, JSON_UNESCAPED_UNICODE);

	    logger()->notice('InSales response', $insales_response);

	    if ($response->getStatusCode() === 200) {
		    return $insales_response;
	    }
    }

	public function changeFieldValue(int $order_id, string $field_handle, string $receipt_link)
	{
		$order_uri = $this->user->insales_uri . '/admin/orders/' . $order_id . '.json';

		$order_changing_request = [
			'headers'          => [
				'Content-Type' => 'application/json; charset=utf-8',
			],
			'json' => [
				'order' => [
					'fields_values_attributes' => [
						0 => [
							'handle' => $field_handle,
							'value'  => $receipt_link,
						]
					]
				]
			],
		];

		$response = $this->guzzle->put($order_uri, $order_changing_request);
		$insales_response = json_decode($response->getBody(), true, JSON_UNESCAPED_UNICODE);

		logger()->notice('InSales response', $insales_response);

		if ($response->getStatusCode() === 200) {
			return $insales_response;
		}
	}

    public function isReceiptGenerationPermitted(array $order_info, string $financial_status, string $field_handle) : bool
    {
    	if ($order_info['payment_gateway_id'] === $this->user->gatewayException1 || $order_info['payment_gateway_id'] === $this->user->gatewayException2 || $order_info['payment_gateway_id'] === $this->user->gatewayException3)  {
    		return false;
	    }

	    if ($order_info['financial_status'] === $financial_status) {
		    if (empty($order_info['fields_values'])) {
			    return true;
		    }

		    $cloudkassir_field = array_first($order_info['fields_values'], function($field) use ($field_handle) {
			    return $field['handle'] === $field_handle;
		    });

		    return empty($cloudkassir_field['value']);
	    }

	    return false;
    }
}
