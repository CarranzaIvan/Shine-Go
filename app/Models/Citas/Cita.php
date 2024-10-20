<?php

namespace App\Models\Citas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicio;

class Cita extends Model
{
    use HasFactory;
    
    protected $table = 'citas';
    protected $primaryKey = 'id_cita';

    protected $fillable = [
        'id_usuario',
        'id_servicio',
        'fecha_cita',
        'hora_cita',
        'title',
        'start',
        'end',
        'color',
        'estado',
        'fyh_creacion',
        'fyh_actualizacion',
    ];

    public $timestamps = false; // Deshabilita las marcas de tiempo automáticas

    // Mutator para asegurarse de que el campo 'start' sea igual a 'fecha_cita'
    public function setFechaCitaAttribute($value)
    {
        $this->attributes['fecha_cita'] = $value;
        $this->attributes['start'] = $value; // Asigna el mismo valor a 'start'
        $this->attributes['end'] = $value; // Asigna el mismo valor a 'end' (puedes ajustar esto si necesitas otra lógica)
    }

     // Relación con el modelo Servicio
     public function servicio()
     {
         return $this->belongsTo(Servicio::class, 'id_servicio');
     }
}


