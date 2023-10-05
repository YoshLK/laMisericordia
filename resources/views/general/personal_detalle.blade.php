@extends('adminlte::page')

@section('title', 'Adultos Mayores')

@section('content_header')

    <h3 class="text-center">
        <strong>FICHA DEL PERSONAL</strong>
    </h3>
@stop

@section('content')

    <!-- DATOS PERSONALES-->
    <div class="card" style="width: 95%;">
        <h3 class="bg-dark px-5" style="width: 100%">DATOS DEL PERSONAL</h3>
        <div class="row px-5 mt-2">
            <div class="col-5">
                <h5> <b> Nombre:</b> {{ $personal->primer_nombre }} {{ $personal->segundo_nombre }}
                    {{ $personal->primer_apellido }}
                    {{ $personal->segundo_apellido }}
                </h5>
            </div>
            <div class="col-5">
                @if (isset($personal->foto))
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $personal->foto }}" width="100">
                @endif
            </div>
            <div class="col-2">
                <a href="{{ url('/personal/' . $personal->id . '/edit') }}" class="btn btn-outline-secondary">
                    Editar
                </a>
            </div>
        </div>
        <div class="row px-5 mt-2">
            <div class="col-3">
                <b>
                    <h5>DPI:
                </b> {{ $personal->DPI }}</span> </h5>
            </div>
            <div class="col-3">
                <b>
                    <h5>Telefono:
                </b> {{ $personal->telefono }}</span> </h5>
            </div>
            <div class="col-6">
                <b>
                    <h5>Direccion:
                </b> {{ $personal->direccion }}</span> </h5>
            </div>
        </div>
        <br>
        <div class="row px-5 mt-2">
            <div class="col-5">
                <b>
                    <h5>Fecha de nacimiento:
                </b> {{ $personal->fecha_nacimiento }}</span> </h5>
            </div>
            <div class="col-3">
                <b>
                    <h5>Edad:
                </b> {{ $personal->edad }}</span></h5>
            </div>
        </div>

        <div class="row-auto px-5 py-2">
            <h3> <span class="fas fa-file badge text-green bg-dark rounded-pill"> Iformacion de contratacion</span> </h3>
        </div>
        <div class="row px-5 mt-2">
            <div class="col-6">
                <b>
                    <h5>Fecha de incio:
                </b> {{ $personal->fecha_contratacion }}</span> </h5>
            </div>
            <div class="col-6">
                <b>
                    <h5>Titulo Academico:
                </b> {{ $personal->titulo }}</span></h5>
            </div>
        </div>
        <div class="row px-5 mt-2">
            <div class="col-6">
                <b>
                    <h5>Cargo:
                </b> {{ $personal->cargo }}</span> </h5>
            </div>
            <div class="col-6">
                <b>
                    <h5>Salario:
                </b> Q. {{ $personal->salario }}.00</span></h5>
            </div>
        </div>
        <div class="row px-5 mt-2">
            <div class="col-6 mt-2">
                <b>
                    <h5>Aplica a impuestos:
                </b> {{ $personal->impuesto }}</span> </h5>
            </div>
            <div class="col-6 mt-2">
                <b>
                    <h5>Informacion Tributaria:
                </b> {{ $personal->sat }}</span></h5>
            </div>
        </div>
        <div class="row px-5 mt-2">
            <div class="col-6 mt-2">
                <b>
                    <h5>Estado Actual:
                </b> {{ $personal->estado_actual }}</span></h5>
            </div>
            @if ($personal->estado_actual == 'Inactivo')
                <div class="col-6 mt-2">
                    <b>
                        <h5>Fecha de salida:
                    </b>{{ $personal->fecha_salida }}</span> </h5>
                </div>
            @endif
        </div>
        <div class="w-100 p-1" style="background-color: #343a40;"></div>
        <br>
    </div>

    <div class="card" style="width: 95%;">
        <h3 class="bg-primary px-5 mt-2" style="width: 100%">Horario</h3>
        <div class="col-3 ">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createHorario">
                + Agregar Horario
            </button>
            @include('horario.create')
        </div>
   <br>
    <!--Tabla horarios-->
    <br>
    @if ($personal->horarioDatos->count())
        <div class="table-responsive mt-2">
            <table class="table table-bordered  table-hover">
                <thead class="thead table-primary">
                    <tr>
                        <th>Dia</th>
                        <th>Hora de entrada</th>
                        <th>Hora de salida</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personal->horarioDatos as $horario)
                        <tr>
                            <td>{{ $horario->dia }}</td>
                            <td>{{ \Carbon\Carbon::parse($horario->inicio)->format('H:i A') }}</td>
                            <td>{{ \Carbon\Carbon::parse($horario->final)->format('H:i A') }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary formulario" data-toggle="modal"
                                    data-target="#editHorario{{ $horario->id }}">
                                    Editar
                                </button>
                                <form action="{{ route('horario.destroy', $horario->id) }}"
                                    class="d-inline formulario-eliminar" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>

                        @include('horario.edit')
                    @endforeach
                </tbody>
            </table>
            <div class="w-100 p-1" style="background-color: #007bff;"></div>
    @endif
</div>
<br>

@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    @if (session('mensaje') == 'registrado')
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Registro Agregado Exitosamente',
                showConfirmButton: true,
            })
        </script>
    @endif

    @if (session('mensaje') == 'editado')
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Registro Editado Exitosamente',
                showConfirmButton: true,
            })
        </script>
    @endif

    @if (session('mensaje') == 'eliminado')
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'Registro Eliminado!',
                showConfirmButton: true,
            })
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Esta seguro de eliminar el registro?',
                icon: 'warning',
                color: '#c60d0d',
                text: "Advertencia no se podra recuperar la informacion eliminada!",
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Confirmar Eliminacion!'
            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            })
        });
    </script>

@stop
