<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retorna una vista de inicio (ajusta 'home' al nombre de tu vista)
        return view('inicio');
    }
}
