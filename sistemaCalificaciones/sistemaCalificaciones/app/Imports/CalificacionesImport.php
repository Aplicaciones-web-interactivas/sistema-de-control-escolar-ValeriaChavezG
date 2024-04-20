<?php

namespace App\Imports;

use App\Models\Calificaciones;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CalificacionesImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2; // Saltar la primera fila (encabezados)
    }
    public function model(array $row)
    {
      
        // Verificar si los datos son válidos
        if (!$this->isValidData($row)) {
            // Los datos no son válidos, así que no hacemos nada
            return null;
        }
        $calificaciones = calificaciones::create([
           'Nombre_alumno'    => $row[0], 
           'Nombre_Materia' => $row[1],
           'Parcial'=> $row[2],
           'Calificacion'    => $row[3], 
        ]);
        return $calificaciones;
    }


    private function isValidData(array $row)
{
    // Verificar si el ID del alumno es un entero positivo
    if (empty($row[0]) || !is_string($row[0])) {
        return false;
    }

    // Verificar si la materia es una cadena no vacía
    if (empty($row[1]) || !is_string($row[1])) {
        return false;
    }

    // Verificar si el grupo es una cadena no vacía
    if (!is_numeric($row[2]) || $row[2] <= 0) {
        return false;
    }

    // Verificar si el parcial es un entero positivo
    if (!is_numeric($row[3]) || $row[3] <= 0) {
        return false;
    }

    // Verificar si la calificación es un número decimal en el rango válido (0-10)

    // Si todas las validaciones pasan, los datos son válidos
    return true;
} 
}
