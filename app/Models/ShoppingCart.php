<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $table = 'orders.tbshopping_cart';
    protected $fillable = [
        'cliei',
        'totai',
        'statui',
        'created_at',
        'updated_at'
    ];
}
