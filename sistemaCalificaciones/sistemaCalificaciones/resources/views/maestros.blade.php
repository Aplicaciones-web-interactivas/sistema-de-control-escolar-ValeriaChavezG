@extends('secret')

@section('content')
    <div class="container mt-5">
        <h2>Lista de Profesores</h2>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Nuevo Profesor
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agrega un Profesor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('maestros.nuevo') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nom_Prof" class="form-label">Nombre del Profesor: </label>
                                <input type="text" class="form-control" id="nom_Prof" name="nom_Prof" required>
                            </div>
                            <div class="mb-3">
                                <label for="nom_materia" class="form-label">Especialización:</label>
                                <select class="form-select" id="opcionesSelect1" name="nom_materia">
                                    <option selected>Seleccionar...</option>
                                    <option value="Desarrollo web">Desarrollo web</option>
                                    <option value="Inteligencia Artificial">Inteligencia Artificial</option>
                                    <option value="Ciberseguridad y redes">Ciberseguridad y redes</option>
                                    <option value="Desarrollo de videjuegos">Desarrollo de videjuegos</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="text" class="form-control" id="correo" name="correo" required>
                            </div>
                            {{-- <div class="mb-3">
                            <label for="grupo" class="form-label">Grupo</label>
                            <input type="text" class="form-control" id="grupo" name="grupo" required>
                        </div> --}}
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nombre del profesor</th>
                    <th>Especialización</th>
                    <th>correo</th>
                    {{-- <th>Grupo</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($maestros as $maestro)
                    <tr>
                        <td>{{ $maestro->nom_Prof }}</td>
                        <td>{{ $maestro->nom_materia }}</td>
                        <td>{{ $maestro->correo }}</td>
                        {{-- <td>{{ $maestro->grupo }}</td> --}}
                        <td>
                            <a href="{{ route('maestros.eliminar', $maestro->id) }}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
