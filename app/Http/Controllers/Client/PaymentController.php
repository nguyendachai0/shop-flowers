<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use GuzzleHttp\Client;
use Session;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class PaymentController extends Controller
{

    public function renderCreditPayment()
    {
        $total_price = $_POST['total_price'];
        $fullname = $_POST['name'];
        $billId = $this->generateBillId();
        // dd($billId);
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
            "addInfo" => $this->makeInfoMessage($fullname, $billId),
            "amount" => $total_price,
            "template" => "compact"
        ]);
        $response = $client->request('POST', 'https://api.vietqr.io/v2/generate', [
            'headers' => $headers,
            'body' => $body
        ]);
        $data = json_decode($response->getBody(), true);
        $order = new  Order();
        $order->name = $fullname;
        $order->email = $_POST['email'];
        $order->phone = $_POST['phone'];
        $order->address = $_POST['address'];
        $order->note = $_POST['note'];
        $order->total = $total_price;
        $order->status = 'Processing';
        $order->save();
        $allItems = Session::get('cart');
        foreach ($allItems as $key => $item) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $key;
            $orderDetail->quantity = $item['quantity'];
            $orderDetail->price = $item['price']  *  $item['quantity'];
            $orderDetail->save();
        }
        Session::forget('cart');
        Session::forget('total_price');
        $qrDataURL = $data['data']['qrDataURL'];
        $paymentMethod = $_POST['payment_method'];
        if ($paymentMethod == 'credit_card') {
            return view('client.payment.credit', compact('qrDataURL'));
        } elseif ($paymentMethod == 'cod') {
            return  redirect()->route('home');
        }
    }
    private function makeInfoMessage($fullname, $billId)
    {
        return $fullname .  ' ' . $billId;
    }
    private function generateBillId()
    {
        return substr(uniqid('', true), 0, 8);
    }
}
