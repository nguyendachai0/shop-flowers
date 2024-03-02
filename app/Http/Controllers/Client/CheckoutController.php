<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('client.checkout.index');
    }
    public function processCheckout(Request $request)
    {
        $validated = $request->validate([]);
        $order = new Order();
        $order->save();
        session()->forget('cart');
        session(['total_price' => 0]);
        return redirect()->route('order.success')->with('success', 'Order placed successfully.');
    }
}
