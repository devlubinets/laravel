<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsFilterRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Notifications\User\NewUserNotification;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(ProductsFilterRequest $request, $id = null): View
    {
        $productsQuery = Product::query();

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productsQuery->where($field, 1);
            }
        }

        if ($id) {
            $count = $productsQuery->where('category_id', $id)->count();
            $products = $productsQuery->where('category_id', $id)->paginate(16)->withPath("?" . $request->getQueryString());
            $category = Category::find($id);
        } else {
            $count = $productsQuery->count();
            $products = $productsQuery->paginate(16)->withPath("?" . $request->getQueryString());
            $category = false;
        }
        return view('user.product.index', [
            'products' => $products,
            'categories' => Category::all(),
            'category' => $category,
            'count' => $count,
        ]);
    }

    public function randoms(): View
    {
        $randoms = Product::all()->random(15);

        return view('home', [
            'randoms' => $randoms,
            'categories' => Category::all()
        ]);
    }

    public function show(int $id, ?string $slug = null): View
    {
        return view('user.product.show', [
            'product' => Product::findOrFail($id),
        ]);
    }
}
