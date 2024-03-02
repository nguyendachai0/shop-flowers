<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        return view('client.cart.index', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('productId');
        $product = Product::find($productId);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        // If the product is already in the cart, increase its quantity
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            // Add the product to the cart
            $cart[$productId] = [
                'name' => $product->name,
                'quantity' => 1,
                'image' => $product->image,
                'price' => $product->price,

            ];
        }

        session()->put('cart', $cart);
        session(['total_price' => $this->totalPrice()]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }

    public function updateCart(Request $request, $productId)
    {
        $quantity = $request->input('quantity');

        if ($quantity <= 0) {
            return redirect()->route('cart.index')->with('error', 'Quantity must be greater than zero.');
        }

        $cart = session()->get('cart');

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart');

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully.');
    }

    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully.');
    }
    public function totalPrice()
    {
        $cart = session()->get('cart');
        $totalPrice = 0;

        if ($cart) {
            foreach ($cart as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
        }

        return $totalPrice;
    }
}
