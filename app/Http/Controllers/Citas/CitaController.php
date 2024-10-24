<?php

namespace App\Http\Controllers\Citas;

use App\Http\Controllers\Controller;
use App\Models\Citas\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CitaController extends Controller
{

    public function index()
    {
        // Cargar las citas junto con la relación 'servicio'
        $citas = Cita::with('servicio')->get();
        return view('dashboard.citas.index', compact('citas'));
    }
    public function show($id)
    {
        // Cargar la cita con el servicio y usuario relacionado
        $cita = Cita::with(['servicio'])->find($id);

        if (!$cita) {
            return redirect()->back()->withErrors('Cita no encontrada');
        }

        return view('dashboard.citas.show', compact('cita'));
    }
    public function destroy($id)
    {
        $cita = Cita::find($id);

        if ($cita) {
            $cita->delete();
            return redirect()->route('dashboard.citas.index')->with('success', 'Cita eliminada exitosamente.');
        } else {
            return redirect()->route('dashboard.citas.index')->with('error', 'No se pudo encontrar la cita.');
        }
    }



    public function getCitas()
    {
        // Mapeamos 'id_cita' como 'id' para que FullCalendar lo use como identificador
        $citas = Cita::select('id_cita as id', 'id_usuario', 'id_servicio', 'title', 'start', 'end', 'color')->get();

        // Devolvemos las citas en formato JSON para FullCalendar
        return response()->json($citas);
    }


    public function getHorasOcupadas(Request $request)
    {
        // Obtenemos la fecha seleccionada desde la solicitud AJAX
        $fecha = $request->input('fecha');

        // Consultamos las citas en esa fecha
        $citas = Cita::where('fecha_cita', $fecha)->get();

        // Creamos un array para almacenar las horas ocupadas
        $horasOcupadas = [];

        // Recorremos las citas para agregar las horas ocupadas al array
        foreach ($citas as $cita) {
            $horasOcupadas[] = $cita->hora_cita;
        }

        // Devolvemos las horas ocupadas como JSON
        return response()->json($horasOcupadas);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'id_usuario' => 'required|string|max:255',
            'id_servicio' => 'required|integer',
            'fecha_cita' => 'required|date',
            'hora_cita' => 'required|string|max:100',
        ]);

        // Obtener el servicio con el id proporcionado
        $servicio = \App\Models\Servicio::find($validatedData['id_servicio']);

        // Verificar si el servicio existe
        if (!$servicio) {
            return redirect()->back()->withErrors(['id_servicio' => 'El servicio seleccionado no es válido.']);
        }

        // Crear una nueva cita con los datos validados
        $cita = new Cita();
        $cita->id_usuario = $validatedData['id_usuario']; // Ajusta esto según cómo se guarde el usuario
        $cita->id_servicio = $validatedData['id_servicio'];
        $cita->fecha_cita = $validatedData['fecha_cita'];
        $cita->hora_cita = $validatedData['hora_cita'];
        $cita->title = $servicio->nomServicio; // Asigna el nombre del servicio como título
        $cita->color = '#FF0000'; // Color opcional
        $cita->estado = 'pendiente';
        $cita->save();

        return response()->json(['success' => true, 'cita_id' => $cita->id_cita]);
    }

    public function getDetalleCitaPago($id)
    {
        // Verificamos que el ID esté presente
        $cita = Cita::select(
            'citas.id_cita',
            'citas.title',
            'citas.fecha_cita',
            'citas.hora_cita',
            'citas.id_usuario',
            'servicios.nomServicio',
            'servicios.descripcion',
            'servicios.precio',
            'promociones.descuento'
        )
            ->join('servicios', 'citas.id_servicio', '=', 'servicios.id')
            ->leftJoin('promociones', 'servicios.id', '=', 'promociones.servicio_id')
            ->where('citas.id_cita', $id)
            ->first();

        // Si no se encuentra la cita, devolvemos un error
        if (!$cita) {
            return response()->json(['error' => 'Cita no encontrada'], 404);
        }
        // Si no hay promoción, establecemos el descuento a 0
        $descuento = $cita->descuento ?? 0;
        // Devolvemos los detalles de la cita
        return response()->json([
            'id' => $cita->id_cita,
            'servicio' => $cita->nomServicio,
            'descripcion' => $cita->descripcion,
            'title' => $cita->title,
            'fecha' => $cita->fecha_cita,
            'hora' => $cita->hora_cita,
            'usuario' => $cita->id_usuario,
            'precio' => $cita->precio,
            'descuento' => $descuento
        ]);
    }

    // Método para obtener detalles de una cita
    public function getDetalleCita(Request $request)
    {
        $id = $request->input('id');

        // Verificamos que el ID esté presente
        if (!$id) {
            return response()->json(['error' => 'No se proporcionó un ID de cita'], 400);
        }

        // Realizamos un INNER JOIN para obtener los detalles de la cita, servicio y promoción
        $cita = Cita::select(
            'citas.id_cita',
            'citas.title',
            'citas.fecha_cita',
            'citas.hora_cita',
            'citas.id_usuario',
            'servicios.nomServicio',
            'servicios.precio',
            'promociones.descuento'
        )
            ->join('servicios', 'citas.id_servicio', '=', 'servicios.id')
            ->leftJoin('promociones', 'servicios.id', '=', 'promociones.servicio_id')
            ->where('citas.id_cita', $id)
            ->first();

        // Si no se encuentra la cita, devolvemos un error
        if (!$cita) {
            return response()->json(['error' => 'Cita no encontrada'], 404);
        }

        // Si no hay promoción, establecemos el descuento a 0
        $descuento = $cita->descuento ?? 0;

        // Devolvemos los detalles de la cita
        return response()->json([
            'id' => $cita->id_cita,
            'servicio' => $cita->nomServicio,
            'title' => $cita->title,
            'fecha' => $cita->fecha_cita,
            'hora' => $cita->hora_cita,
            'usuario' => $cita->id_usuario,
            'precio' => $cita->precio,
            'descuento' => $descuento
        ]);
    }

    // Método para eliminar una cita
    public function deleteCita(Request $request)
    {
        $id = $request->input('id');
        $cita = Cita::find($id);

        if ($cita) {
            $cita->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Cita no encontrada.'], 404);
        }
    }
}
