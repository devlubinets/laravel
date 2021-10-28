<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ProtectedController;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends ProtectedController
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $params = $request->except(['image', '_token']);
        $product = Product::create($params);
        $image = $request->file('image');

        if($image){
            $filename = $image->getClientOriginalName();
            $imageResize = Image::make($image->getRealPath());

            if (!File::exists(storage_path('app/public/products/' . $product->id . '/'))) {
                File::makeDirectory(storage_path('app/public/products/' . $product->id . '/'), 0777, true, true);
            }

            $imageResize->save(storage_path('app/public/products/' . $product->id . '/' . $filename));
            $imageResize->resize(310, 230, function ($constraint) {
                $constraint->upsize();
            })->save(storage_path('app/public/products/' . $product->id .'/medium_' . $filename));

            $imageResize->resize(75, 56, function ($constraint) {
                $constraint->upsize();
            })->save(storage_path('app/public/products/' . $product->id .'/small_' . $filename));
            $product->update(['image' => $filename]);
        }
        return redirect()->route('admin.products.index');

    }

    protected function empty()
    {
        $file = Image::make($data['avatar']->path());
        $originalFile = $data['avatar'];
        if (!File::exists(storage_path('app/public/users/' . $user->id . '/'))) {
            File::makeDirectory(storage_path('app/public/users/' . $user->id . '/'), 0777, true, true);
        }
        $file->fit(128, 128, function ($constraint) {
            $constraint->upsize();
        })->save(storage_path('app/public/users/' . $user->id .'/medium_avatar.jpg'));
        $file->fit(64, 64, function ($constraint) {
            $constraint->upsize();
        })->save(storage_path('app/public/users/' . $user->id . '/small_avatar.jpg'));
        $originalFile->storeAs('public/users/' . $user->id, 'original_avatar.' . $originalFile->extension());
        $data['avatar'] = 'original_avatar.' . $originalFile->extension();
        $user->update(['avatar' => $data['avatar']]);
    }

    public function show(int $id)
    {
        return view('admin.product.show', ['product' => Product::findOrFail($id)]);
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        File::deleteDirectory(storage_path('app/public/products/' . $product->id));
        $params = $request->except(['image', '_token']);
        $product->update($params);
        $image = $request->file('image');
        if($image){
            $filename = $image->getClientOriginalName();
            $imageResize = Image::make($image->getRealPath());

            if (!File::exists(storage_path('app/public/products/' . $product->id . '/'))) {
                File::makeDirectory(storage_path('app/public/products/' . $product->id . '/'), 0777, true, true);
            }
            $imageResize->save(storage_path('app/public/products/' . $product->id . '/' . $filename));
            $imageResize->resize(310, 230, function ($constraint) {
                $constraint->upsize();
            })->save(storage_path('app/public/products/' . $product->id .'/medium_' . $filename));

            $imageResize->resize(75, 56, function ($constraint) {
                $constraint->upsize();
            })->save(storage_path('app/public/products/' . $product->id .'/small_' . $filename));
            $product->update(['image' => $filename]);
        }
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        File::deleteDirectory(storage_path('app/public/products/' . $product->id));
        return redirect()->route('admin.products.index');
    }
}
