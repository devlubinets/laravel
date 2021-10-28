<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id = null)
    {
        if($id){
            $products = Product::where('category_id', $id)->paginate(16);
            $category = Category::find($id);
            $count = Product::where('category_id', $id)->count();
        }else{
            $products = Product::paginate(16);
            $category = false;
            $count = Product::count();
        }
        return view('user.product.index', [
            'products' => $products,
            'categories' => Category::all(),
            'category'=> $category,
            'count'=> $count,
        ]);
    }

    public function randoms()
    {
        $randoms = Product::all()->random(15);

        return view('home', [
            'randoms' => $randoms,
            'categories' => Category::all()
        ]);
    }
    public function show($code)
    {
        $product = Product::whereCode($code)->first();
        return view('user.product.show', [
            'product' => $product,
        ]);
    }
}
