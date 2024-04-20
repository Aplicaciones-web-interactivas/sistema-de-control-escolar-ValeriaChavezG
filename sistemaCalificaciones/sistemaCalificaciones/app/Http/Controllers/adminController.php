<?php

namespace App\Http\Controllers;
use App\Models\alumno;
use App\Models\grupo;
use App\Models\maestro;
use App\Models\materia;
use App\Models\User;
use App\Models\calificaciones;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //función para mostrar los alumnos
    public function listaAlumnos()
    {
        $alumnos = alumno::all();
        return view('alumnos', compact('alumnos'));
    }

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

    public function listaMaterias()
    {
          $materias = materia::all();
          $maestros = maestro::all(); // Obtener todos los maestros disponibles

          return view('materias', compact('materias', 'maestros'));
        //   return view('materias', compact('materias'));
    }
    //funcion para insertar una materia
    public function nuevaMateria(Request $request){
        

        $nuevaMateria=new materia();
        $nuevaMateria->nombreM = $request->nombreM;
        $nuevaMateria->nomProf = $request->nomProf;
        $nuevaMateria->Modalidad = $request->Modalidad;
        $nuevaMateria->Horario = $request->Horario;
        $nuevaMateria->save();
        return redirect()->back();
    }
    //funcion para eliminar una materia
    public function eliminarMateria($id){
        $nuevaMateria=materia::find($id);
        $nuevaMateria->delete();
        return redirect()->back();
    }
    public function listaMaestros()
    {
          $maestros = maestro::all();
          return view('maestros', compact('maestros'));
    }
        //funcion para insertar un profesor
    public function nuevoProfesor(Request $request){
        $nuevoProfesor=new maestro();
        $nuevoProfesor->nom_Prof = $request->nom_Prof;
        $nuevoProfesor->nom_materia = $request->nom_materia;
        $nuevoProfesor->correo = $request->correo;
        // $nuevoProfesor->grupo = $request->grupo;
        $nuevoProfesor->save();
        return redirect()->back();
    }
    //funcion para eliminar un profesor
    public function eliminarProfesor($id){
        $nuevoProfesor=maestro::find($id);
        $nuevoProfesor->delete();
        return redirect()->back();
    }
    public function listaGrupos()
    {
          $grupos = grupo::all();
          $materias = materia::all(); 
          return view('grupos', compact('grupos', 'materias'));
    }
    //funcion para insertar un grupo

    public function nuevoGrupo(Request $request){
        $nuevoProfesor=new grupo();
        $nuevoProfesor->nomMateria = $request->nomMateria;
        $nuevoProfesor->salon = $request->salon;
        $nuevoProfesor->NumAlumnos = $request->NumAlumnos;
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
    public function listaCalificaciones()
    {
          $calificaciones = calificaciones::all();
          $materias = materia::all(); 
          $alumnos = alumno::all(); 
          return view('calificaciones', compact('calificaciones', 'materias', 'alumnos' ));
    }
    public function nuevaCalificacion(Request $request){
        $nuevaCalificacion=new calificaciones();
        $nuevaCalificacion->Nombre_alumno = $request->Nombre_alumno;
        $nuevaCalificacion->Nombre_Materia = $request->Nombre_Materia;
        $nuevaCalificacion->Parcial = $request->Parcial;
        $nuevaCalificacion->Calificacion = $request->Calificacion;
        $nuevaCalificacion->save();
        return redirect()->back();
    }
    //funcion para eliminar un alumno
    public function eliminarCalificacion($id){
        $nuevaCalificacion=calificaciones::find($id);
        $nuevaCalificacion->delete();
        return redirect()->back();
    }
}
