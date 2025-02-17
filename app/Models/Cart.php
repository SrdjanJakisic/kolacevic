<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $fillable = [
        'userId',
        'productId',
        'productQty'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }
}
