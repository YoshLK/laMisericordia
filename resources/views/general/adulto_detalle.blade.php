@extends('adminlte::page')

@section('title', 'Adultos Mayores')

@section('content_header')

    <h3 class="text-center">
        <strong>FICHA DEL ADULTO MAYOR</strong>
    </h3>
@stop

@section('content')

    <!-- DATOS PERSONALES-->
    <div class="card" style="width: 95%;">
        <h3 class="bg-dark px-5" style="width: 100%">DATOS PERSONALES</h3>
        <div class="row px-5 mt-2">
            <div class="col-5">
                <h5> <b> Nombre:</b> {{ $adulto->primer_nombre }} {{ $adulto->segundo_nombre }}
                    {{ $adulto->primer_apellido }}
                    {{ $adulto->segundo_apellido }}
                </h5>
            </div>
            <div class="col-5">
                @if (isset($adulto->foto))
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $adulto->foto }}" width="100">
                @endif
            </div>
            <div class="col-2">
                <a href="{{ url('/adulto/' . $adulto->id . '/edit') }}" class="btn btn-outline-secondary">
                    Editar
                </a>
            </div>
        </div>
        <div class="row px-5 mt-2">
            <div class="col-4">
                <b>
                    <h5>DPI:
                </b> {{ $adulto->DPI }}</span> </h5>
            </div>
            <div class="col-3">
                <b>
                    <h5>Procedencia:
                </b> {{ $adulto->procedencia }}</span> </h5>
            </div>
            <div class="col-5">
                <b>
                    <h5>Fecha de ingreso:
                </b> {{ $adulto->fecha_ingreso }}</span> </h5>
            </div>
        </div>
        <br>
        <div class="row px-5 mt-2">
            <div class="col-5">
                <b>
                    <h5>Fecha de nacimiento:
                </b> {{ $adulto->fecha_nacimiento }}</span> </h5>
            </div>
            <div class="col-3">
                <b>
                    <h5>Edad:
                </b> {{ $adulto->edad }}</span></h5>
            </div>
            <div class="col-4">
                <b>
                    <h5>Estado:
                </b> {{ $adulto->estado_actual }}</span> </h5>
            </div>
        </div>
        <div class="w-100 p-1" style="background-color: #343a40;"></div>
        <br>
    </div>

    <!-- REFERENCIAS -->
    <div class="row">
        <div class="col-3">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createReferencia">
                + Añadir Referencia
            </button>
            @include('referencia.create')
        </div>
        <div class="col-3">
            <!--BOTON HISTORIAL -->
            @if (empty($adulto->historialDatos->peso))
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#createHistorial">
                    + Ficha Medidas Corporales
                </button>
                @include('historial.create')
            @endif
        </div>
    </div>
    <br>
    @if ($referencias->count())
        <h3>
            <p class="text-white bg-primary px-5">REFERENCIAS</p>
        </h3>
        <div class="table-responsive">
            <table class="table table-bordered  table-hover">
                <thead class="thead table-primary">
                    <tr>
                        <th>#</th>
                        <th>Nombre de la referencia:</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($referencias as $referencia)
                        <tr>
                            <td>{{ $referencia->id }} </td>
                            <td>{{ $referencia->primer_nombre }} {{ $referencia->segundo_nombre }}
                                {{ $referencia->primer_apellido }} {{ $referencia->segundo_apellido }}</td>
                            <td>{{ $referencia->telefono }}</td>
                            <td>{{ $referencia->direccion }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary formulario" data-toggle="modal"
                                    data-target="#editReferencia{{ $referencia->id }}">
                                    Editar
                                </button>
                                |
                                <form action="{{ route('referencia.destroy', $referencia->id) }}"
                                    class="d-inline formulario-eliminar" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        <!--modal editar--->
                        @include('referencia.edit')
                    @endforeach
                </tbody>
            </table>
            <div class="w-100 p-1" style="background-color: #007bff;"></div>
    @endif

    <!-- DATOS FICHA CORPORALES-->
    <br>
    @if (isset($adulto->historialDatos->peso))
        <div class="card" style="width: 95%;">
            <h3 class="bg-info px-5" style="width: 100%">MEDIDAS CORPORALES</h3>
            <div class="row px-5 mt-2">
                <div class="col-4 ">
                    <h5>
                        <b>Peso:</b>
                        {{ $adulto->historialDatos->peso }} kg
                    </h5>
                </div>
                <div class="col-4">
                    <h5>
                        <b> Altura:</b>
                        {{ $adulto->historialDatos->altura }} cm
                    </h5>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal"
                        data-target="#editHistorial{{ $adulto->historialDatos->id }}">
                        + Editar Ficha Corporal
                    </button>
                    @include('historial.edit')
                </div>
            </div>
            <h5 class="bg-info px-5 text-center" style="width: 20%"><b>Tallas</b></h5>
            <div class="row px-5">
                <div class="col-4">
                    <h5>
                        <b>Camisa:</b>
                        {{ $adulto->historialDatos->tronco }}
                    </h5>
                </div>
                <div class="col-4">
                    <h5>
                        <b>Patanlon:</b>
                        {{ $adulto->historialDatos->piernas }}
                    </h5>
                </div>
                <div class="col-4">
                    <h5>
                        <b>Calzado:</b>
                        {{ $adulto->historialDatos->calzado }}
                    </h5>
                </div>
            </div>
            @if (isset($adulto->historialDatos->dificultad_motora))
                <h5 class="bg-info px-5 text-center" style="width: 25%"><b>Dificultad Motora</b></h5>
                <div class="row px-5">
                    <h5>
                        {{ $adulto->historialDatos->dificultad_motora }}
                    </h5>
                </div>
            @endif
            <br>
            <div class="w-100 p-1" style="background-color: #17a2b8;"></div>
    @endif
    </div>




    <!-- PATOLOGIAS - MEDICINA - ALERGIAS-->
    @if (isset($adulto->historialDatos->peso))
        <div class="row">
            <div class="col-3">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createPatologia">
                    + Patologias
                </button>
                @include('patologia.create')
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createMedicina">
                    + Medicinas
                </button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createAlergias">
                    + Alergias
                </button>
            </div>
        </div>
    @endif
@stop




@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop




@section('js')
    @if (session('referencia') == 'registrado')
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Referencia agregada exitosamente',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    @if (session('referencia') == 'editado')
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Referencia Editada exitosamente',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    @if (session('referencia') == 'eliminado')
        <script>
            Swal.fire(
                'Registro Eliminado!',
                'Referencia eliminada.',
                'success'
            )
        </script>
    @endif


    @if (session('historial') == 'registradoMedidas')
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Medidas Corporales agregadas exitosamente',
                showConfirmButton: false,
                timer: 2250
            })
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Esta seguro de eliminar la referencia?',
                icon: 'warning',
                color: '#c60d0d',
                text: "Advertencia no se podra recuperar la informacion eliminada!",
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#877e7e',
                confirmButtonText: 'Confirmar Eliminacion!'
            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            })
        });
    </script>
@stop
