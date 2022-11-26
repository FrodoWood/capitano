<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'firstname', 'lastname', 'email', 'country', 'address1', 'address2', 'county', 'postcode',
    ];
}
