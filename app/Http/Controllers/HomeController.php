<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): Renderable
    {
        $products = Product::get();
        return view('home', compact('products'));
    }
//    public function product($product = null): Renderable
//    {
//        return view('user.products.product', [
//            'product'=>$product,
//        ]);
//    }
}
