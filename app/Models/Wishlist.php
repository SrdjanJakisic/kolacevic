<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillable = [
        'userId',
        'productId',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }
}
