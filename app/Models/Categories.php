<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'products.tbcategories';
    protected $fillable = [
        'namec',
        'statuc',
        'created_at',
        'updated_at'
    ];
}
