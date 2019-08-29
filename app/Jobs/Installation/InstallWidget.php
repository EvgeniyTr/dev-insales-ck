<?php

namespace App\Jobs\Installation;

use App\Models\Users;
use Exception;
use InSales\API\ApiResponse;

use Illuminate\{
	Bus\Queueable,
	Queue\SerializesModels,
	Queue\InteractsWithQueue,
	Contracts\Queue\ShouldQueue,
	Foundation\Bus\Dispatchable
};

use GuzzleHttp\{
	Client, Exception\ClientException, Exception\ServerException
};

class InstallWidget implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	/** Раздел "Заказы" бэк-офиса, в который будет установлен виджет. */
	public const ORDER_PAGE = 'order';

	public $tries = 1;

	private $user;

	/** @var int $height Размер блока, содержащего код виджета. */
	private $height = 120;

    public function __construct(Users $user)
    {
        $this->user = $user;
    }

	/**
	 * Устанавливаем виджет для работы с заявками на доставку из раздела "Заказы"
	 */
    public function handle(Client $client)
    {
	    info("Beginning widget installation job for User {$this->user->insalesId}");

	    $widget_uri = 'https://' . config('local.addId') . ':' .
	                          $this->user->pass . '@' .
	                          $this->user->urlShop . '/admin/application_widgets.json';

	    $widget_placement_request = [
		    'headers'          => [
			    'Content-Type' => 'application/json; charset=utf-8',
		    ],
		    'json' => $this->generateWidgetCode()
	    ];

	    $response = $client->post($widget_uri, $widget_placement_request);
	    $widget_data = json_decode($response->getBody(), true, JSON_UNESCAPED_UNICODE);

	    if ($response->getStatusCode() === 201) {
		    $this->user->widgetId = $widget_data['id'];
		    $this->user->save();
	    }

	    info("Widget (id{$this->user->widgetId}) installed for User {$this->user->insalesId}");
    }

    public function generateWidgetCode() : array
    {
    	return [
		    'application_widget' => [
			    'code' => view('Widget.widget', ['user' => $this->user])->render(),
			    'height' => $this->height,
			    'page_type' => self::ORDER_PAGE,
		    ]
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
