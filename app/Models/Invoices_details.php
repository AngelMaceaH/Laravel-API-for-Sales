<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices_details extends Model
{
    use HasFactory;
    protected $table = 'sales.tbinvoices_details';
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
