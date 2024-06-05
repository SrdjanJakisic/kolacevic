<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'userId',
        'firstName',
        'lastName',
        'email',
        'phone',
        'adress',
        'city',
        'totalPrice',
        'orderStatus',
        'message',
        'trackingNumber',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'orderId', 'id');
    }
}
