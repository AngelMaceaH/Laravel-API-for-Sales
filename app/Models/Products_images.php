<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_images extends Model
{
    use HasFactory;
    protected $table = 'products.tbproducts_images';
    protected $fillable = [
        'prodp',
        'imagp',
        'statup',
        'created_at',
        'updated_at'
    ];
}
