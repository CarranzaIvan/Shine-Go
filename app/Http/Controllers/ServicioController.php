<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $servicios = Servicio::where('nomServicio', 'LIKE', "%{$query}%")->get();
        return response()->json($servicios);
    }
}