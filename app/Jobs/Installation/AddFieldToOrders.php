<?php

namespace App\Jobs\Installation;

use Exception;
use App\Models\Users;
use Illuminate\{
	Bus\Queueable,
	Queue\SerializesModels,
	Queue\InteractsWithQueue,
	Contracts\Queue\ShouldQueue,
	Foundation\Bus\Dispatchable
};
use InSales\API\ApiResponse;

use GuzzleHttp\{
	Client, Exception\ClientException, Exception\ServerException
};

class AddFieldToOrders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	public const CK_INCOME_RECEIPT = [
		'title'  => 'Чек прихода CloudKassir',
		'handle' => 'cloudkassir_income_receipt',
	];

	public const CK_INCOME_RETURN_RECEIPT = [
		'title'  => 'Чек возврата CloudKassir',
		'handle' => 'cloudkassir_income_return_receipt',
	];

	private const API_URL_FIELDS = '/admin/fields';

    public $tries = 1;

	private $user;
	private $receipt_field;
	private $model_field;

	public function __construct(Users $user, array $receipt_field, string $model_field)
	{
		$this->user = $user;
		$this->receipt_field = $receipt_field;
		$this->model_field = $model_field;
	}

	/**
	 * Добавляем поля в раздел "Заказы"
	 *
	 * @return mixed
	 * @throws Exception
	 */
    public function handle(Client $client)
    {
	    info("Beginning Field installation job for User {$this->user->insalesId}");

	    $fields_uri = $this->user->insales_uri . self::API_URL_FIELDS . '.json';
	    $field_code = $this->generateFieldCode($this->receipt_field['title'], $this->receipt_field['handle']);
	    $request_body = $this->returnRequestBody($field_code);

	    $response = $client->post($fields_uri, $request_body);
	    $field_data = json_decode($response->getBody(), true, JSON_UNESCAPED_UNICODE);

	    if ($response->getStatusCode() === 201) {
		    $this->user->{$this->model_field} = $field_data['id'];
		    $this->user->save();
	    } else {
	    	throw new Exception("There was an error during installation of field {$this->receipt_field['handle']} to User id{$this->user->insalesId}", $field_data);
	    }

	    info("Field (id{$this->user->fieldId}) installed for User {$this->user->insalesId}");
    }

	public function generateFieldCode(string $field_title, string $field_handle) : array
	{
		return [
			'field' => [
				'type' => 'Field::TextField',
				'office_title' => $field_title,
				'destiny' => 3,
				'handle' => $field_handle,
				'active' => true,
				'for_buyer' => false,
				'show_in_result' => false,
				'show_in_checkout' => false,
				'is_indexed' => false,
				'hide_in_backoffice' => false,
			],
		];
	}

	public function returnRequestBody(array $payload) : array
	{
		return [
			'headers'          => [
				'Content-Type' => 'application/json; charset=utf-8',
			],
			'json' => $payload,
		];
	}

    public function failed(Exception $exception)
    {
	    if ($exception instanceof ClientException) {
		    logger()->critical(__CLASS__ . (string) $exception->getResponse()->getBody());
	    } elseif ($exception instanceof ServerException) {
		    $response = $exception->getResponse();
		    $retry_after_period = $response->getHeader('Retry-After');
		    if (isset($retry_after_period) && $response->getStatusCode() === 503) {
			    self::dispatch($this->user)->delay(now()->addMinutes(round($retry_after_period/60, 0, PHP_ROUND_HALF_UP) + 1));
		    }
	    } else {
		    logger()->critical(__CLASS__ . " job assigned for User {$this->user->insalesId} finished with error: {$exception->getMessage()}", $exception->getTrace());
	    }
    }
}
