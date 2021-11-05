<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketService
{
    protected $order;

    public function __construct($createdOrder = false)
    {
        /*$orderId = session('orderId');
        $data = [];
        if (is_null($orderId) && $createdOrder) {
            if (Auth::check()) {
                $data['user_id'] = Auth::id();
            }

            $this->order = Order::create($data);
            session(['orderId' => $this->order->id]);
        } else {
            $this->order = Order::with('products')->whereId($orderId)->first();
        }
        $this->order = Order::findOrFail($orderId);*/
    }

    public function checkOrder()
    {
        $orderId = session('orderId');
        $data = [];
        if (is_null($orderId)) {
            if (Auth::check()) {
                $data['user_id'] = Auth::id();
            }

            $this->order = Order::create($data);
            session(['orderId' => $this->order->id]);
        } else {
            $this->order = Order::with('products')->whereId($orderId)->first();
        }
        $this->order = Order::findOrFail($orderId);
        return $this->order;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function countAvailable(): bool
    {
        foreach ($this->order->products as $orderProduct) {
            if ($orderProduct->count < $this->getPivotRowNoInt($orderProduct)->count) {
                return false;
            }
        }
        return true;
    }

    public function saveOrder($name, $phone, $email)
    {
        if ($this->countAvailable()) {
            return $this->order->saveOrder($name, $phone, $email);
        }
        return false;
    }

    protected function getPivotRow($productId)
    {
        $this->checkOrder();
        return $this->order->products->filter(function ($product) use ($productId) {
            return $product->id === (int) $productId;
        })->first()->pivot;
    }

    public function removeProduct(Request $request, $productId)
    {
        $this->checkOrder();
        if ($this->order->products->contains($productId)) {
            $pivotRow = $this->getPivotRow($productId);
            if ($pivotRow->count < 2) {
                $this->order->products()->detach($productId);
                $this->order->refresh();
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
    }

    public function addProduct(Request $request, $productId, $order)
    {
        $product = Product::where('id', $productId)->first();
            $this->order = $order;
        $this->checkOrder();
        if ($this->order->products->contains($productId)) {
            $pivotRow = $this->getPivotRow($productId);
            $pivotRow->count++;
            if ($pivotRow->count > $product->count) {
                return false;
            }
            $pivotRow->update();
        } else {
            if ($product->count == 0) {
                return false;
            }
            $this->order->products()->attach($productId);
        }

        if (Auth::check()) {
            $this->order->user_id = Auth::id();
            $this->order->save();
        }
        return true;
    }

    protected function getPivotRowNoInt($productId)
    {
        return $this->order->products()->where('product_id', $productId->id)->first()->pivot;
    }
}
