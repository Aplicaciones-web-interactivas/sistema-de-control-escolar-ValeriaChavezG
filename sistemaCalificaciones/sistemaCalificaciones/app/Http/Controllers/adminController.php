<?php

namespace App\Http\Controllers;
use App\Models\alumno;
use App\Models\grupo;
use App\Models\maestro;
use App\Models\materia;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //función para un nuevo alumno
    public function nuevoAlumno(Request $request){
        $nuevoAlumno=new alumno();
        $nuevoAlumno->nom_Alumn = $request->nom_Alumn;
        $nuevoAlumno->email = $request->email;
        $nuevoAlumno->semestre = $request->semestre;
        $nuevoAlumno->matIns = $request->matIns;
        $nuevoAlumno->save();
        return redirect()->back();
    }
    //funcion para eliminar un alumno
    public function eliminarAlumno($id){
        $nuevoAlumno=alumno::find($id);
        $nuevoAlumno->delete();
        return redirect()->back();
      }

    //funcion para insertar una materia
    public function nuevaMateria(Request $request){
        $nuevaMateria=new materia();
        $nuevaMateria->nombreM = $request->nombreM;
        $nuevaMateria->nomProf = $request->nomProf;
        $nuevaMateria->modalidad = $request->modalidad;
        $nuevaMateria->horario = $request->horario;
        $nuevaMateria->save();
        return redirect()->back();
    }
    //funcion para eliminar una materia
    public function eliminarMateria($id){
        $nuevaMateria=alumno::find($id);
        $nuevaMateria->delete();
        return redirect()->back();
    }
        //funcion para insertar un profesor
    public function nuevoProfesor(Request $request){
        $nuevoProfesor=new maestro();
        $nuevoProfesor->nom_Prof = $request->nom_Prof;
        $nuevoProfesor->nom_materia = $request->nom_materia;
        $nuevoProfesor->correo = $request->correo;
        $nuevoProfesor->grupo = $request->grupo;
        $nuevoProfesor->save();
        return redirect()->back();
    }
    //funcion para eliminar un profesor
    public function eliminarProfesor($id){
        $nuevoProfesor=maestro::find($id);
        $nuevoProfesor->delete();
        return redirect()->back();
    }
    //funcion para insertar un grupo

    public function nuevoGrupo(Request $request){
        $nuevoProfesor=new grupo();
        $nuevoProfesor->nomMateria = $request->nomMateria;
        $nuevoProfesor->salon = $request->salon;
        $nuevoProfesor->hora = $request->hora;
        $nuevoProfesor->numGrupo = $request->numGrupo;
        $nuevoProfesor->save();
        return redirect()->back();
    }
    //funcion para eliminar un alumno
    public function eliminarGrupo($id){
        $nuevoProfesor=grupo::find($id);
        $nuevoProfesor->delete();
        return redirect()->back();
    }
}
