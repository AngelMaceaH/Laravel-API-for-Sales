<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart_details extends Model
{
    use HasFactory;
    protected $table = 'orders.tbshopping_cart_details';
    protected $fillable = [
        'carti',
        'prodi',
        'quanti',
        'pricei',
        'totali',
        'statui',
        'created_at',
        'updated_at'
    ];
}
