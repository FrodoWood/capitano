<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CartItem extends Model
{
    use HasFactory;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'title', 'data' 
    ]; 
  
    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 
}
