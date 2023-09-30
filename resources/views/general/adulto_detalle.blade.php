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
            @if (empty($adulto->historialDatos->id))
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#createHistorial">
                    + Ficha Medidas Corporales
                </button>
                @include('historial.create')
            @endif
        </div>
    </div>
    <br>
    @if ($adulto->referenciaDatos->count())
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
                    @foreach ($adulto->referenciaDatos as $referencia)
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
    @if (isset($adulto->historialDatos->id))
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
    @if (isset($adulto->historialDatos->id))
        <div class="row">
            <div class="col-3">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createPatologia">
                    + Patologias
                </button>
                @include('patologia.create')
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#createMedicamento">
                    + Medicamento
                </button>
                @include('medicamento.create')
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createAlergias">
                    + Alergias
                </button>
            </div>
        </div>
        <br>
    @endif


    <!--PATOLOGIAS TABLA-->
    @if (isset($adulto->historialDatos->id))
    <div class="card card-success">
    @if ($adulto->historialDatos->patologiasDatos->count())
        <h3>
            <p class="text-white bg-success px-5">PATOLOGIAS</p>
        </h3>
        <div class="table table-auto">
            <table class="table table-bordered  table-hover ">
                <thead class="thead table-success">
                    <tr>
                        <th>Patologia:</th>
                        <th>Fecha de diagnostico:</th>
                        <th>Gravedad:</th>
                        <th>Tratamiento:</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($adulto->historialDatos->patologiasDatos as $patologia)
                        <tr>
                            <input name="contador" value="{{ $contadorPatologia = (int) $loop->iteration - 1 }}"
                                type="hidden">
                            <td>{{ $patologia->nombre_patologia }}</td>
                            <td>{{ $patologia->fecha_diagnostico }}</td>
                            <td>{{ $patologia->gravedad }}</td>
                            <td>{{ $patologia->tratamiento_actual }}</td>
                            <td>
                                <button type="button" class="btn btn-success formulario" data-toggle="modal"
                                    data-target="#detallePatologia{{ $contadorPatologia }}">
                                    Notas
                                </button>
                                <button type="button" class="btn btn-outline-success formulario" data-toggle="modal"
                                    data-target="#editPatologia{{ $patologia->id }}">
                                    Editar
                                </button>
                                <form method="POST" action="{{ route('eliminar_patologia') }}"
                                    class="d-inline formulario-eliminar">
                                    @csrf
                                    <input name="id" value="{{ $patologia->id }}" type="hidden">
                                    <input name="ruta" value="{{ $adulto->id }}" type="hidden">
                                    <button type="submit" class="btn btn-outline-danger"
                                        data-toggle="modal">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @include('patologia.edit')
                        @include('patologia.detalle')
                    @endforeach
                </tbody>
            </table>
            <div class="w-100 p-1" style="background-color: #28a745;"></div>
        </div>
    @endif
    @endif
</div>
    <!--TABLA MEDICAMENTO-->
    @if (isset($adulto->historialDatos->id))
    <div class="card card-secondary">
    @if ($adulto->historialDatos->medicamentosDatos->count())
        <h3>
            <p class="text-white bg-secondary px-5">MEDICAMENTOS</p>
        </h3>
        <div class="table table-auto">
            <table id="medicamentos" class="table table-bordered  table-hover">
                <thead class="thead table-secondary">
                    <tr>
                        <th>Medicamento</th>
                        <th>Dosis</th>
                        <th>Frecuencia</th>
                        <th>Administracion</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Final</th>
                        <th>Conteo Dias</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($adulto->historialDatos->medicamentosDatos as $medicamento)
                        <tr>
                            <input name="contador" value="{{ $contadorMedicamento = (int) $loop->iteration - 1 }}"
                                type="hidden">
                            <td>{{ $medicamento->nombre_medicamento }}</td>
                            <td>{{ $medicamento->cantidad_medicamento }} {{ $medicamento->medida_medicamento }}</td>
                            <td>{{ $medicamento->frecuencia_tiempo }} {{ $medicamento->frecuencia_dia }}</td>
                            <td>{{ $medicamento->via_administracion }}</td>
                            <td class="fecha-inicio">{{ $medicamento->fecha_inicio }}</td>
                            <td class="fecha-fin">{{ $medicamento->fecha_fin }}</td>
                            <td class="resultado"></td>
                            <td>
                                <button type="button" class="btn btn-secondary formulario" data-toggle="modal"
                                    data-target="#detalleMedicamento{{ $contadorMedicamento }}">
                                    Notas
                                </button>
                                <button type="button" class="btn btn-outline-secondary formulario" data-toggle="modal"
                                    data-target="#editMedicamento{{ $medicamento->id }}">
                                    Editar
                                </button>
                                <form method="POST" action="{{ route('eliminar_medicamento') }}"
                                    class="d-inline formulario-eliminar">
                                    @csrf
                                    <input name="id" value="{{ $medicamento->id }}" type="hidden">
                                    <input name="ruta" value="{{ $adulto->id }}" type="hidden">
                                    <button type="submit" class="btn btn-outline-danger"
                                        data-toggle="modal">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @include('medicamento.edit')
                        @include('medicamento.detalle')
                    @endforeach
                </tbody>
            </table>
            <button id="calcularDiasMedicamento">Calcular Diferencias</button>
            <div class="w-100 p-1" style="background-color: #6c757d;"></div>
        </div>
    @endif
    @endif
</div>

@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop




@section('js')

    <script>
        function DiasMedicamento() {
            const filas = document.querySelectorAll('#medicamentos tbody tr');

            for (let i = 0; i < filas.length; i++) {
                const fechaInicio = new Date(filas[i].querySelector('.fecha-inicio').textContent);
                const fechaFinCell = filas[i].querySelector('.fecha-fin');
                const resultadoCell = filas[i].querySelector('.resultado');

                let fechaFin;
                let plus;

                if (!fechaFinCell.textContent) {
                    fechaFin = new Date();
                    plus = 0;
                } else {
                    fechaFin = new Date(fechaFinCell.textContent);
                    plus = 1;
                }

                const diferencia = Math.abs(fechaFin - fechaInicio);
                const diasDiferencia = Math.ceil(diferencia / (1000 * 3600 * 24));
                const dias = Math.ceil(diasDiferencia + plus)
                resultadoCell.textContent = dias + ' días';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('calcularDiasMedicamento').addEventListener('click', DiasMedicamento);
        });
    </script>

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
                position:'top-center',
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
