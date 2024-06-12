<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impressions extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $table = 'impressions';
    protected $fillable =
    [
        'impressionId',
        'impressionComment',
        'username'
    ];
}
