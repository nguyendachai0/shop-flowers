<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class PaymentController extends Controller
{

    public function renderCreditPayment()
    {

        $client = new Client();
        $headers = [
            'x-client-id' => env('X_CLIENT_ID'),
            'x-api-key' => env('X_API_KEY'),
            'Content-Type' => 'application/json'
            // 'Cookie' => 'connect.sid=s%3AlJdgrXVqtjQby6QVK8hYSy491p3FUPn5.IxxU9JucQPIPhJXXwGyTGocTV0ZKNtE2QOzDhEAu%2F8g'
        ];
        $body = json_encode([
            "accountNo" => env("ACCOUNT_NO"),
            "accountName" => env("ACCOUNT_NAME"),
            "acqId" => env("ACQID"),
            "addInfo" => "Ung Ho Quy Vac Xin",
            "amount" => "79000",
            "template" => "compact"
        ]);
        $response = $client->request('POST', 'https://api.vietqr.io/v2/generate', [
            'headers' => $headers,
            'body' => $body
        ]);
        $data = json_decode($response->getBody(), true);

        $qrDataURL = $data['data']['qrDataURL'];
        // echo '<pre>';
        // var_dump($qrDataURL);
        // echo '</pre>';
        // die();
        return view('client.payment.credit', compact('qrDataURL'));
    }
}
