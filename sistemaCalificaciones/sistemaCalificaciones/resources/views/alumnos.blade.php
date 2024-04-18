@extends('layouts.app')

@section('content')
 <button type="button" class="btn btn-primary" onclick="nuevo()" style="position: relative;float: right;bottom:20px">
      Abrir Modal
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="registroForm" action="{{route('alumnos.nuevo')}}" method="post" >
                    @csrf
                     <div class="form-group">
                        <label for="nom_Alumn">Nombre del alumno</label>
                        <input type="text" class="form-control" id="nom_Alumn" name="nom_Alumn">
                    </div>
                     <div class="form-group">
                        <label for="email">Correo del alumno</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                     <div class="form-group">
                        <label for="semestre">Semestre del alumno</label>
                        <input type="text" class="form-control" id="semestre" name="semestre">
                    </div>
                     <div class="form-group">
                        <label for="matIns">Materias inscritas</label>
                        <input type="text" class="form-control" id="matIns" name="matIns">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
      </div>
     
    </div>
  </div>
</div>
<div class="container mt-5">
  <table class="table">
    <thead>
      <tr>
        <th>Nombre del alumno</th>
        <th>Correo del alumno</th>
        <th>Semestre del alumno</th>
        <th>Materias inscritas</th>
      </tr>
    </thead>
    <tbody id="tabla-body">
    @foreach ($alumnos as $alumno)
      <tr> 
      <td>{{$alumno->nom_Alumn}} </td>
      <td> {{$alumno->email}}</td>
      <td> {{$alumno->semestre}}</td>
      <td> {{$alumno->matIns}}</td>
      <td>
        {{-- <button type="button" class="btn btn-warning btn-sm" onclick="editar('{{$alumno->id}}','{{$candidate->nameC}}','{{$candidate->nomVotacion}}')">
        <i class="fa fa-edit">  </i>
        </button> --}}
        <a href="{{route('alumnos.eliminar',$alumno->id)}}" class="btn btn-sm btn-danger"> <i class="fa fa-trash">  </i></a> 

      </td>
      </tr>
        
    @endforeach
      <!-- Filas de la tabla se agregarán aquí -->
    </tbody>
  </table>
</div>
@endsection