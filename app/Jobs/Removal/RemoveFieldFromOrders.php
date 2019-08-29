<?php

namespace App\Jobs\Removal;

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

class RemoveFieldFromOrders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	private const API_URL_FIELDS = '/admin/fields';

    public $tries = 1;

	private $user;
	private $receipt_field_id;

	public function __construct(Users $user, int $receipt_field_id)
	{
		$this->user = $user;
		$this->receipt_field_id = $receipt_field_id;
	}

	/**
	 * Добавляем поля в раздел "Заказы"
	 *
	 * @return mixed
	 * @throws Exception
	 */
    public function handle(Client $client)
    {
	    info("Beginning Field removal job for User {$this->user->insalesId}");

	    $fields_uri = $this->user->insales_uri . self::API_URL_FIELDS . '/' . $this->receipt_field_id . '.json';

	    $response = $client->delete($fields_uri);

	    if ($response->getStatusCode() === 200) {
		    info("Field (id{$this->user->fieldId}) removed from account of User {$this->user->insalesId}");
	    }
    }

    public function failed(Exception $exception)
    {
	    logger()->critical(__CLASS__ . " job assigned for User {$this->user->insalesId} finished with error: {$exception->getMessage()}", $exception->getTrace());
    }
}
