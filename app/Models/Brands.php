<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    protected $table = 'products.tbbrands';
    protected $fillable = [
        'nameb',
        'imagb',
        'statub',
        'created_at',
        'updated_at'
    ];
}
