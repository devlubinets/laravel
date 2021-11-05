<?php

namespace App\Classes;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class Basket
{
    protected $order;

    public function __construct()
    {
        $orderId = session('orderId');
        $this->order = Order::findOrFail($orderId);
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function saveOrder($name, $phone, $email)
    {
        return $this->order->saveOrder($name, $phone, $email);
    }

    public function removeProduct(Request $request, $productId)
    {
        if ($this->order->products->contains($productId)) {
            $pivotRow = $this->order->products->filter(function ($product) use ($productId) {
                return $product->id === (int)$productId;
            })->first()->pivot;
            if ($pivotRow->count < 2) {
                $this->order->products()->detach($productId);
                $this->order->refresh();
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
    }

    public function addProduct(Request $request, $productId)
    {

    }
}
