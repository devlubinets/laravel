<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function create(array $data)
    {
        Product::create($data);
    }

    public function getProducts(): Collection
    {
        return Product::all();
    }
}
