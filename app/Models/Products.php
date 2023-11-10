<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products.tbproducts';
    protected $fillable = [
        'namep',
        'pricp',
        'stocp',
        'brandp',
        'catep',
        'statup',
        'created_at',
        'updated_at'
    ];
}
