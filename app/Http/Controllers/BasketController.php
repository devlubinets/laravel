<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Http\Controllers\Traits\ApiResponse;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{

    use ApiResponse;

    public function __construct()
    {
        $this->middleware('auth')->only(['basketPlace']);
    }

    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);

            return view('user.basket.show', compact('order'));
        }

        return redirect()->route('products.index');
    }

    public function basketPlace(): Renderable
    {
        $order = (new Basket())->getOrder();

        return view('user.basket.order', compact('order'));
    }

    public function basketConfirm(OrderRequest $request)
    {
        if ((new Basket())->saveOrder($request->name, $request->phone, $request->email)) {
            session()->flash('success', 'Ваш заказ принят в обработку!');
        } else {
            session()->flash('warning', 'Случилась ошибка');
        }
        return redirect()->route('products.index');
    }

    public function basketAdd(Request $request, $productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::with('products')->whereId($orderId)->first();
        }

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products->filter(function ($product) use($productId) {
                return $product->id === (int) $productId;
            })->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }
        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $product = Product::where('id', $productId)->select('name')->first();

        session()->flash('success','Добавлен товар: '.$product->name);

        if ($request->ajax()) {
            return $this->success(
                [
                    'products' => $this->generateProductsResponse($order->products),
                ]
            );
        }
        return redirect()->route('basket.show');
    }

    public function basketRemove(Request $request, $productId)
    {
        (new Basket())->removeProduct($request, $productId);

        $product = Product::where('id', $productId)->select('name')->first();
        session()->flash('warning', 'Удален товар: ' . $product->name);
            /*if ($request->ajax()) {
                return $this->success(
                    [
                        'products' => $this->generateProductsResponse($order->products),
                    ]
                );
            }*/
        return redirect()->route('basket.show');
    }

    private function generateProductsResponse(?Collection $products): array
    {
        $response = [];

        if ($products) {
            foreach ($products as $product) {
                $response[$product->id] = $product->pivot->count;
            }
        }

        return $response;
    }

}
//        if (is_null($orderId)){
//            return redirect()->route('products.index');
//        }
