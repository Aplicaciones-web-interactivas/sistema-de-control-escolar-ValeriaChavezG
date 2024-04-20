@extends('secret')

@section('content')

    <div class="container mt-5">
        <h2>Lista de Calificaciones</h2>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Nueva Calificacion
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agrega Calificacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('calificaciones.nuevo') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="Nombre_alumno" class="form-label">Nombre del Alumno:</label>
                                <select class="form-select" id="opcionesSelect1" name="Nombre_alumno">
                                    <option selected>Seleccionar...</option>
                                    @foreach ($alumnos as $alumno)
                                        <option value="{{ $alumno->nom_Alumn }}">{{ $alumno->nom_Alumn }}</option>
                                    @endforeach
                                </select>
                                {{-- <label for="Nombre_alumno" class="form-label">Nombre del Alumno</label>
                                <input type="text" class="form-control" id="Nombre_alumno" name="Nombre_alumno" required> --}}
                            </div>
                            <div class="mb-3">
                                <label for="Nombre_Materia" class="form-label">Nombre del Materia:</label>
                                <select class="form-select" id="opcionesSelect1" name="Nombre_Materia">
                                    <option selected>Seleccionar...</option>
                                    @foreach ($materias as $materia)
                                        <option value="{{ $materia->nombreM }}">{{ $materia->nombreM }}</option>
                                    @endforeach
                                </select>
                                {{-- <label for="Nombre_Materia" class="form-label">Nombre de la Materia</label>
                                <input type="text" class="form-control" id="Nombre_Materia" name="Nombre_Materia"
                                    required> --}}
                            </div>
                            <div class="mb-3">

                                <label for="Parcial" class="form-label">Parcial:</label>
                                <input type="text" class="form-control" id="Parcial" name="Parcial" required>

                            </div>
                            <div class="mb-3">
                                <label for="Calificacion" class="form-label">Calificacion:</label>
                                <input type="text" class="form-control" id="Calificacion" name="Calificacion" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="tablaCalificacion">
        <table class="table mt-3" >
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Materia</th>
                    <th>Parcial</th>
                    <th>Calificacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calificaciones as $calificacion)
                    <tr>
                        <td>{{ $calificacion->Nombre_alumno }}</td>
                        <td>{{ $calificacion->Nombre_Materia }}</td>
                        <td>{{ $calificacion->Parcial }}</td>
                        <td>{{ $calificacion->Calificacion }}</td>
                        <td>
                            <a href="{{ route('calificaciones.eliminar', $calificacion->id) }}"
                                class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <div>
            <form action="{{ route('generaPDF') }}" method="post" id="formPDF">
                @csrf
                <input type="hidden" id="impresionPDF" name="impresionPDF">
                <button type="button" id="generarPDF">Generar PDF </button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#generarPDF").click(function() {
            var tabla = $("#tablaCalificacion").clone();
            tabla.find('td:nth-child(5), td:nth-child(5)').remove();
            var table1 = tabla.html();
            console.log(table1);
            $("#impresionPDF").val(table1);
            $("#formPDF").submit();
        });
    });
    </script>
    {{-- <script>
        $(document).ready(function() {
            $("#generarPDF").click(function() {
                var tablaHTML = $("#tablaCalificacion").html();
                // $.ajax({
                //     url: "{{ route('generaPDF') }}",
                //     method: 'POST',
                //     data: {
                //         tablaPDF: tablaHTML,
                //         _token: "{{ csrf_token() }}"
                //     },
                //     success: function(response) {
                //         console.log(response);
                //         // Si quieres redirigir al usuario al PDF generado, puedes hacerlo aquí
                //         // window.location.href = response.url;
                //     },
                //     error: function(xhr, status, error) {
                //         console.error(xhr.responseText);
                //     }
                // });
                console.log(tablaHTML);
                $("#impresionPDF").val(tablaHTML);
                $("#formPDF").submit();
            });
        });
    </script> --}}
    
@endsection
