<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $guarded = [];

    public function setNameAttribute(string $value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount(): int
    {
        if (!is_null ($this->pivot->count)) {
           return $this->pivot->count * $this->price;
        }

        return $this->price;
    }

    public function getImage(string $type = null)
    {
        if (is_null($this->image)) {
            return asset('images/empty.png');
        }

        switch ($type) {
            case 'medium':
                return asset('storage/products/' . $this->id . '/' . 'medium_' . $this->image);

            case 'small':
                return asset('storage/products/' . $this->id . '/' . 'small_' . $this->image);

            default:
                return asset('storage/products/' . $this->id . '/' . $this->image);
        }

    }

    public function setNewAttribute($value)
    {
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    public function setHitAttribute($value)
    {
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }

    public function setRecommendAttribute($value)
    {
        $this->attributes['recommend'] = $value === 'on' ? 1 : 0;
    }

    public function isHit()
    {
        return $this->hit === 1;
    }

    public function isNew()
    {
        return $this->new === 1;
    }

    public function isRecommend()
    {
        return $this->recommend === 1;
    }
}
