<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function get()
    {
        return 'Bienvenido a la API de Angel Macea';
    }
}
