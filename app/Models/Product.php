<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//    public function getPriceForCount($count) {
//
//        return $this->price * $count;
//    }
    public function getPriceForCount() {
        if (!is_null ($this->pivot->count)) {
           return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
}
