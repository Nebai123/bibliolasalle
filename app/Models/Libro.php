<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'codigo',
        'titulo',
        'autor',
        'ejemplares',
        'descripcion',
        'imagen',
        'tema',
    ];

    // Si la columna primaria no es 'id', especificar el nombre de la columna primaria
    protected $primaryKey = 'id_libro';

    // Si no usas incrementing IDs
    public $incrementing = true;

    // Definir el tipo de clave primaria
    protected $keyType = 'int';
}
