<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calificaciones extends Model
{
    protected $fillable = ['Nombre_alumno', 'Nombre_Materia', 'Parcial', 'Calificacion'];
    use HasFactory;
}
