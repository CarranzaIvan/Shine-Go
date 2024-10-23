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

    // Carga la vista de servicios.
    public function verServicios(){

        // Obtiene todos los servicios
        $servicios = Servicio::all();

        // Devuelve la vista y pasa los servicios
        return view('VistaServicios.servicios', compact('servicios'));
    }

    // Carga la vista de gestión de servicios.
    public function gestionServicios(){

        // Obtiene todos los servicios
        $servicios = Servicio::all();

        // Devuelve la vista y pasa los servicios
        return view('VistaServicios.gestionServicios', compact('servicios'));
    }

    // Carga la vista de gestión de servicios.
    public function eliminarServicio($idServicio){

        // Obtiene todos los servicios
        $servicio = Servicio::find($idServicio);
        $servicio->delete(); // Elimino el servicio
        // Devuelve la vista de gestion de servicios
        return redirect('/servicios/gestion');
    }

    // Carga la vista de gestión de servicios.
    public function guardarServicio(Request $request){

        $servicio = new Servicio();
        $servicio -> nomServicio = $request -> nomServicio;
        $servicio -> descripcion = $request -> descripcion;
        $servicio -> precio = $request -> precio;
        $servicio -> save();

        // Devuelve la vista de gestion de servicios
        return redirect('/servicios/gestion');
    }

    public function actualizarServicio(Request $request, $idServicio){

        $servicio = Servicio::find($idServicio);
        $servicio -> nomServicio = $request -> nomServicio;
        $servicio -> descripcion = $request -> descripcion;
        $servicio -> precio = $request -> precio;
        $servicio -> save();

        // Devuelve la vista de gestion de servicios
        return redirect('/servicios/gestion');
    }
}