<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $casts = [
        'order_items' => 'array',
    ];

    protected $fillable = [
        'user_id', 'price', 'order_items',
    ];
}
