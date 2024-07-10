<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'homepage';

    protected $fillable = 
    [
        'name',
        'description',
        'image',
        'url'
    ];
}
