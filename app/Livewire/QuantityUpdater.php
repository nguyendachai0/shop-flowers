<?php

namespace App\Livewire;

use Livewire\Component;
use Session;

class QuantityUpdater extends Component
{
    public $quantity;
    public $product;

    public function mount($product, $initialQuantity)
    {
        $this->quantity = $initialQuantity;
        $this->product = $product;
    }

    public function increment($cartId)
    {
        $this->quantity++;
        $this->updateCart($cartId);
        return redirect(request()->header('Referer'));
    }

    public function decrement($cartId)
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->updateCart($cartId);
        }
        return redirect(request()->header('Referer'));
    }
    private function updateCart($cartId)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$cartId])) {
            $cart[$cartId]['quantity'] = $this->quantity;
            Session::put('cart', $cart);
            $total_price = $this->calculateTotalPrice();
            Session::put('total_price', $total_price);
        }
    }
    public function render()
    {
        return view('livewire.quantity-updater');
    }
    private function calculateTotalPrice()
    {
        $total_price = 0;
        $allItems = Session::get('cart');

        foreach ($allItems as $item) {
            $total_price += $item['price'] * $item['quantity'];
        }

        // Add shipping fee
        $total_price += 10000; // Assuming shipping fee is 10,000 VND

        return $total_price;
    }
}
