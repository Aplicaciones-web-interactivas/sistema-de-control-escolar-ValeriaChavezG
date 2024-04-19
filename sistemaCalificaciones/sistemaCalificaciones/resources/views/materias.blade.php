@extends('secret')

@section('content')
<div class="container mt-5">
    <h2>Lista de Materias</h2>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Nueva Materia
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega Materia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('materias.nuevo') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nombreM" class="form-label">Nombre de la Materia</label>
                            <input type="text" class="form-control" id="nombreM" name="nombreM" required>
                        </div>
                        <div class="mb-3">
                            <label for="nom_Prof" class="form-label">Nombre del profesor:</label>
                            <select class="form-select" id="opcionesSelect1" name="nomProf">
                                <option selected>Seleccionar...</option>
                                    @foreach ($maestros as $maestro)
                                <option value="{{$maestro->nom_Prof}}">{{$maestro->nom_Prof}}</option>
                                    @endforeach
                            </select>
                            {{-- <label for="nomProf" class="form-label">Nombre del profesor</label>
                            <input type="text" class="form-control" id="nomProf" name="nomProf" required> --}}
                        </div>
                        <div class="mb-3">
                         <label for="modalidad" class="form-label">Modalidad:</label>
                         <select class="form-select"  id="opcionesSelect1" name="Modalidad">
                      <option selected>Seleccionar...</option> 
                        <option value="Presencial" >Presencial</option>
                        <option value="En linea">En línea</option>
                    </select>
                            {{-- <label for="modalidad" class="form-label">Modalidad</label>
                            <input type="text" class="form-control" id="modalidad" name="modalidad" required> --}}
                        </div>
                        <div class="mb-3">
                            <label for="Horario" class="form-label">Horario</label>
                            <input type="text" class="form-control" id="Horario" name="Horario" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre de la materia</th>
                <th>Nombre del profesor</th>
                <th>Modalidad</th>
                <th>Horario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materias as $materia)
            <tr>
                <td>{{ $materia->nombreM }}</td>
                <td>{{ $materia->nomProf }}</td>
                <td>{{ $materia->Modalidad }}</td>
                <td>{{ $materia->Horario }}</td>
                <td>
                    <a href="{{ route('materias.eliminar', $materia->id) }}" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
