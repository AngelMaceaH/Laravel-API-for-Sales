<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $table = 'users.tbclients';
    protected $fillable = [
        'userc',
        'namec',
        'lastc',
        'email',
        'phone',
        'passc',
        'saltc',
        'statuc',
        'created_at',
        'updated_at'
    ];
}
