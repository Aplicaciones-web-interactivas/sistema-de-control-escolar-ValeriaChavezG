@extends('secret')

@section('content')
    <div class="container mt-5">
        <h2>Lista de Grupos</h2>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Nuevo Grupo
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agrega Grupo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('grupos.nuevo') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="nomMateria" class="form-label">Nombre Materia:</label>
                                    <select class="form-select" id="opcionesSelect1" name="nomMateria">
                                        <option selected>Seleccionar...</option>
                                        @foreach ($materias as $materia)
                                            <option value="{{ $materia->nombreM }}">{{ $materia->nombreM }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="salon" class="form-label">Salon</label>
                                    <input type="text" class="form-control" id="salon" name="salon" required>
                                </div>
                                <div class="mb-3">
                                    <label for="NumAlumnos" class="form-label">Cupo de Alumnos</label>
                                    <input type="text" class="form-control" id="NumAlumnos" name="NumAlumnos" required>
                                </div>

                                <div class="mb-3">
                                    <label for="numGrupo" class="form-label">Numero de Grupo</label>
                                    <input type="text" class="form-control" id="numGrupo" name="numGrupo" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre Materia:</th>
                <th>Salon</th>
                <th>Cupo de Alumnos</th>
                <th>Numero de Grupo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grupos as $grupo)
                <tr>
                    <td>{{ $grupo->nomMateria }}</td>
                    <td>{{ $grupo->salon }}</td>
                    <td>{{ $grupo->NumAlumnos }}</td>
                    <td>{{ $grupo->numGrupo }}</td>
                    <td>
                        <a href="{{ route('grupos.eliminar', $grupo->id) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
