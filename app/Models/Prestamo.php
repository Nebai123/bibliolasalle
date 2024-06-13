<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'id_estudiante',
        'id_libro',
        'dni',
        'fecha_prestamo',
        'fecha_devolucion',
        'observacion',
    ];

    // Especificar el nombre de la clave primaria si es diferente a 'id'
    protected $primaryKey = 'id_prestamo';

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'id_libro');
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante')->withDefault();
    }
}
