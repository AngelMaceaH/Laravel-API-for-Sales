<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    protected $table = 'sales.tbinvoices';
    protected $fillable = [
        'cliei',
        'totai',
        'statui',
        'created_at',
        'updated_at'
    ];
}
