<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ProtectedController;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends ProtectedController
{
    public function index(): View
    {
        $newOrders = Order::where('status', 1)->latest()->get();
        $approvedOrders = Order::where('status', 2)->latest()->get();
        $cancelOrders = Order::where('status', 3)->latest()->get();
        return view('admin.dashboard', compact('newOrders', 'approvedOrders', 'cancelOrders'));
    }

    public function show(int $id): View
    {
        $products = Order::findOrFail($id)->products()->withTrashed()->get();
        return view('admin.order.show', [
            'order' => Order::findOrFail($id),
            'products' => $products,
        ]);
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();
        return redirect()->route('admin.orders.index');
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        if ($request->status === 2) {
             $order->update(['status' => $request->status]);
        }
        if ($request->status === 3) {
            $order->update(['status' => $request->status]);
        }
        return redirect()->back();
    }
}
