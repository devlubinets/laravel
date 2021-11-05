<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProtectedController;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends ProtectedController
{
    public function index()
    {
        $orders = Order::where('status', 1)->latest()->get();
//        dd($orders->first()->phone);
//        $phoneFormst = $orders->first()->phone
        return view('admin.dashboard', compact('orders'));
    }

    public function show(int $id)
    {
        $products = Order::findOrFail($id)->products()->withTrashed()->get();
        return view('admin.order.show', [
            'order' => Order::findOrFail($id),
            'products' => $products,
        ]);
        //['order' => Order::findOrFail($id)]
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index');
    }
}
