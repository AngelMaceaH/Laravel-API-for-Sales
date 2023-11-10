<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders.tborders';
    protected $fillable = [
        'cliei',
        'totai',
        'statui',
        'created_at',
        'updated_at'
    ];
}
