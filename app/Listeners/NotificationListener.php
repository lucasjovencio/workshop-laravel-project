<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use GuzzleHttp\Client;

class NotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    // Esta variavel deve estar no arquivo .env
    private $API_KEY;

    public function __construct()
    {
        $this->API_KEY = 'c32d1e78f101470dbcaa4c5e001283509881f3ba4a544521a8c1116ed0a432e2d444c0fc24814b2396d7fd4f9a7cea88';
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {   
        $client = new Client();
        $response = $client->request('POST', 'http://localhost:3000/notification' , [
            'form_params' => [
                'data' => $event->data,
                'app_key' => $this->API_KEY
            ]
        ]);
        return $response;
    }
}
