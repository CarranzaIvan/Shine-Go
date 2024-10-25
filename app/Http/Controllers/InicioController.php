<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    // Vísta de Inicio
    public function welcome()
    {
        return view('welcome');
    }

    // Vísta de terminos
    public function verTerminos()
    {
        return view('terminos');
    }

    // Vísta de terminos
    public function verChatbot()
    {
        return view('chatbot');
    }

    // Vísta de Preguntas Frecuentes
    public function verPreguntas()
    {
        return view('preguntas');
    }
}
