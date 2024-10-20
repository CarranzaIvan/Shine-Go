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

        // Nuevo método para cargar la vista con todos los servicios
        public function showRegistrarCita()
        {
            // Obtenemos todos los servicios de la base de datos
            $servicios = Servicio::all();
    
            // Retornamos la vista con los servicios
            return view('registrar_cita', compact('servicios'));
        }
}