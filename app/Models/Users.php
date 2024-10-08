<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users.tbusers';
    protected $fillable = [
        'usern',
        'namen',
        'lastn',
        'email',
        'passn',
        'saltn',
        'rolen',
        'statun',
        'created_at',
        'updated_at'
    ];
}
