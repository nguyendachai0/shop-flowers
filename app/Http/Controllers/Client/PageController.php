<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::all();
        return view('client.home', compact('products'));
    }
    public function about()
    {
    }
    public function contact()
    {
    }
}
