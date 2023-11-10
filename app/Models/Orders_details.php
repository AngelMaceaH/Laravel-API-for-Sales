<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_details extends Model
{
    use HasFactory;
    protected $table = 'orders.tborders_details';
    protected $fillable = [
        'invoi',
        'prodi',
        'quanti',
        'pricei',
        'totali',
        'statui',
        'created_at',
        'updated_at'
    ];
}
