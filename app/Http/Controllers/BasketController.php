<?php

namespace App\Http\Controllers;

use App\Services\BasketService;
use App\Http\Controllers\Traits\ApiResponse;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    use ApiResponse;

    private $basketService;

    public function __construct(BasketService $basketService)
    {
        $this->middleware('auth')->only(['basketPlace']);
        $this->basketService = $basketService;
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

    public function basketPlace()
    {
        $order = $this->basketService->getOrder();
        if (!$this->basketService->countAvailable()) {
            session()->flash('warning', 'Товар недоступен для заказа в полном объеме');
            return redirect()->route('basket.show');
        }
        return view('user.basket.order', compact('order'));
    }

    public function basketConfirm(OrderRequest $request): RedirectResponse
    {
        if ($this->basketService->saveOrder($request->name, $request->phone, $request->email)) {
            session()->flash('success', 'Ваш заказ принят в обработку!');
        } else {
            session()->flash('warning', 'Товар недоступен для заказа в полном объеме');
        }
        return redirect()->route('products.index');
    }

    public function basketAdd(Request $request, $productId)
    {
        $order = $this->basketService->checkOrder();
        $result =  $this->basketService->addProduct($request, $productId, $order);
        $product = Product::where('id', $productId)->select('name')->first();
        if ($result) {
            session()->flash('success', 'Добавлен товар: ' . $product->name);
        } else {
            session()->flash('warning', 'Товар ' . $product->name . 'в большем кол-во не доступен для заказа');
        }

        return redirect()->route('basket.show'); //ajax
    }

    public function basketRemove(Request $request, $productId): RedirectResponse
    {
        (new BasketService())->removeProduct($request, $productId);

        $product = Product::where('id', $productId)->select('name')->first();
        session()->flash('warning', 'Удален товар: ' . $product->name);

        return redirect()->route('basket.show'); // ajax
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

//ajax
/*if ($request->ajax()) {
            return $this->success(
                [
                    'products' => $this->generateProductsResponse($order->products),
                ]
            );
        }*/
