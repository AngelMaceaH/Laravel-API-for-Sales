<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'users.tbroles';
    protected $fillable = [
        'rolen',
        'created_at',
        'updated_at'
    ];
}
