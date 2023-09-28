@extends('adminlte::page')

@section('title', 'Adultos Mayores')

@section('content_header')

    <h3 class="text-center">
        <strong class="bg-skyblue">FICHA DEL ADULTO MAYOR</strong>
    </h3>
@stop

@section('content')

    <div class="row-auto">
        <h3> <span class="fas fa-user  badge text-green bg-warning rounded-pill"> Nombre:</span> </h3>
    </div>
    <div class="row">
        <div class="col-5">
            <h3 class="text-center">
                <b> {{ $adulto->primer_nombre }} {{ $adulto->segundo_nombre }} {{ $adulto->primer_apellido }}
                    {{ $adulto->segundo_apellido }}
                </b>
            </h3>
        </div>
        <div class="col-5">
            @if (isset($adulto->foto))
                <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $adulto->foto }}" width="100">
            @endif
        </div>
        <div class="col-2">
            <a href="{{ url('/adulto/' . $adulto->id . '/edit') }}" class="btn btn-warning">
                Editar
            </a>
        </div>
    </div>

    <div class="row-auto px-2 py-2">
        <h3> <span class="fas fa-address-card badge bg-warning rounded-pill"> Credenciales</span> </h3>
    </div>
    <div class="row">
        <div class="col-4">
            <b>
                <h3>DPI:
            </b> {{ $adulto->DPI }}</span> </h3>
        </div>
        <div class="col-3">
            <b>
                <h3>Procedencia:
            </b> {{ $adulto->procedencia }}</span> </h3>
        </div>
        <div class="col-5">
            <b>
                <h3>Fecha de ingreso:
            </b> {{ $adulto->fecha_ingreso }}</span> </h3>
        </div>
    </div>

    <div class="row-auto px-2 py-3">
        <h3> <span class="fas fa-user  badge text-green bg-warning  rounded-pill"> Iformacion adicional</span> </h3>
    </div>
    <div class="row">
        <div class="col-5">
            <b>
                <h3>Fecha de nacimiento:
            </b> {{ $adulto->fecha_nacimiento }}</span> </h3>
        </div>
        <div class="col-3">
            <b>
                <h3>Edad:
            </b> {{ $adulto->edad }}</span></h3>
        </div>
        <div class="col-4">
            <b>
                <h3>Estado:
            </b> {{ $adulto->estado_actual }}</span> </h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-3">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createReferencia">
                + Añadir Referencia
            </button>
        </div>
        <div class="col-3">
        <!--BOTON HISTORIAL -->
            @if(empty($adulto->historialDatos->peso))
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createHistorial">
                    + Ficha Medidas Corporales
                </button>
                @include('historial.create')
            @endif

        </div>
    </div>
    <br>
    @include('referencia.create')
    <!-- Modal -->
    @if ($referencias->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
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
                                <button type="button" class="btn btn-warning formulario" data-toggle="modal"
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
    @endif

    @if (isset($adulto->historialDatos->peso))
    <div class="row">
        <div class="col-6">
            <h3> <span class="badge text-green bg-warning rounded-pill"> Medidas Corporales:</span> </h3>
          </div>
          <div class="col-6">
            
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editHistorial{{ $adulto->historialDatos->id }}">
                + Editar Ficha Corporal
            </button>
            @include('historial.edit')
          </div>
   </div>
    <div class="row">
        <div class="col-6 ">
            <h3>
                <b>Peso:</b>
                {{ $adulto->historialDatos->peso }} kg
            </h3>
        </div>
        <div class="col-auto-6">
            <h3>
                <b> Altura:</b>
                {{ $adulto->historialDatos->altura }} cm
            </h3>
        </div>
    </div>
    <div class="row-auto">
        <h3> <span class="badge text-green bg-warning rounded-pill"> Tallas:</span> </h3>
    </div>
    <div class="row">
        <div class="col-4">
            <h3>
                <b>Camisa:</b>
                {{ $adulto->historialDatos->tronco }}
            </h3>
        </div>
        <div class="col-4">
            <h3>
                <b>Patanlon:</b>
                {{ $adulto->historialDatos->piernas }}
            </h3>
        </div>
        <div class="col-4">
            <h3>
                <b>Calzado:</b>
                {{ $adulto->historialDatos->calzado }}
            </h3>
        </div>
    </div>
    @if(isset($adulto->historialDatos->dificultad_motora))
    <div class="row-auto">
        <h3> <span class="badge text-green bg-warning rounded-pill"> Discapacidad Motora</span> </h3>
    </div>
            <h3>
                <b>Dificultad Motora:</b>
                {{ $adulto->historialDatos->dificultad_motora }}
            </h3>
    @endif
    <br>
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
