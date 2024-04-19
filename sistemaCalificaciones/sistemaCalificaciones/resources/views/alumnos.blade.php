@extends('secret')

@section('content')
<div class="container mt-5">
    <h2>Lista de Alumnos</h2>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Nuevo Alumno
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('alumnos.nuevo') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nom_Alumn" class="form-label">Nombre del alumno</label>
                            <input type="text" class="form-control" id="nom_Alumn" name="nom_Alumn" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo del alumno</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="semestre" class="form-label">Semestre del alumno</label>
                            <input type="number" class="form-control" id="semestre" name="semestre" required>
                        </div>
                        <div class="mb-3">
                            <label for="matIns" class="form-label">Creditos disponibles este semestre</label>
                            <input type="number" class="form-control" id="matIns" name="matIns" required>
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
                <th>Nombre del alumno</th>
                <th>Correo del alumno</th>
                <th>Semestre del alumno</th>
                <th>Creditos disponibles este semestre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->nom_Alumn }}</td>
                <td>{{ $alumno->email }}</td>
                <td>{{ $alumno->semestre }}</td>
                <td>{{ $alumno->matIns }}</td>
                <td>
                    <a href="{{ route('alumnos.eliminar', $alumno->id) }}" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
