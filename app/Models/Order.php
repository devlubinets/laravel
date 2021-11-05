<?php

namespace App\Models;

use App\Events\Order\OrderCreated;
use App\Events\Order\OrderUpdated;
use App\Notifications\Order\NewOrderNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    protected $fillable = [
        'id', 'status', 'name', 'phone', 'email', 'user_id',
    ];

    protected $dispatchesEvents = [
        'updated' => OrderUpdated::class,
    ];

    public function isAvailable()
    {
        return $this->status > 0;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function saveOrder($name, $phone, $email)
    {
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->email = $email;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products()->withTrashed()->get() as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }
}
