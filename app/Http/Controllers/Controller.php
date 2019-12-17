<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function setSuccess($message): void
    {
        session()->flash('type', 'success');
        session()->flash('message', $message);
    }
    protected function setError($message): void
    {
        session()->flash('type', 'warning');
        session()->flash('message', $message);
    }

    protected function sendSMS($phone, $text)
    {
        $endpoint = "http://esms.dianahost.com/smsapi";
        $client = new \GuzzleHttp\Client();
        $id = 5;
        $value = "ABC";

        $response = $client->request('GET', $endpoint, ['query' => [
            'api_key' => 'C20038355ce1478fd3d231.43007688',
            'type' => 'text',
            'contacts' => $phone,
            'senderid' => '8804445629107',
            'msg' => $text

        ]]);

// url will be: http://my.domain.com/test.php?key1=5&key2=ABC;
        /*
                $statusCode = $response->getStatusCode();
                $content = $response->getBody();
        */
    }
}
