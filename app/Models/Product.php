<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'products';
    protected $fillable =
    [
        'categoryId',
        'productName',
        'productDescription',
        'productPrice',
        'productImage',
        'productQuantity',
        'productWeight',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'id');
    }
}
