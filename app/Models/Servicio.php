<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    // Define the table associated with the model
    protected $table = 'servicios';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'nomServicio',
        'descripcion',
        'precio',
    ];

    // Define any relationships if necessary
    // For example, if a Servicio has many Promociones:
    // public function promociones()
    // {
    //     return $this->hasMany(Promocion::class);
    // }
}
