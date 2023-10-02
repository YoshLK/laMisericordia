@extends('adminlte::page')

@section('title', 'Adultos Mayores')
<!--data table-->
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="text-center bg-red">Adultos Mayores - Inactivos</h1>
@stop

@section('content')

    <br />
    <table id="adultos" class="table table-white">
        <thead class="thead table-danger">
            <tr>
                <th>Foto</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Ingreso</th>
                <th>Salida</th>
                <th>Tiempo</th>
                <th>Patologias</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($adultosInactivos as $adulto)
                <tr>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $adulto->foto }}" width="100">
                    </td>
                    <td>{{ $adulto->primer_nombre }} {{ $adulto->segundo_nombre }}</td>
                    <td>{{ $adulto->primer_apellido }} {{ $adulto->segundo_apellido }}</td>
                    <td class="fecha-inicio">{{ $adulto->fecha_ingreso }}</td>
                    <td class="fecha-fin">{{ $adulto->fecha_salida }}</td>
                    <td class="resultado"></td>
                    <td>
                    @if (isset($adulto->historialDatos->id))
                    @foreach ($adulto->historialDatos->patologiasDatos as $patologia)
                    <li>{{$patologia->nombre_patologia}}</li>
                    @endforeach
                    @endif
                    </td>
                    <td>
                        <a href="{{ url('/general/adulto_detalle/' . $adulto->id) }}"
                            class="btn btn-xs btn-info text-light mx-1 shadow" title="Detalle">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                        <a href="{{ url('/adulto/' . $adulto->id . '/edit') }}"
                            class="btn btn-xs btn-primary   text-light   mx-1 shadow" title="Editar">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <form action="{{ route('adulto.destroy', $adulto->id) }}" class="d-inline formulario-eliminar"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <input name="ruta" value="inactivo" type="hidden">
                            <input name="id" value="{{$adulto->id}}" type="hidden">
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Borrar"><i
                                    class="fa fa-lg fa-fw fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
  
    <button id="calcularEstancia">Calcular Estancia</button>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script>
        function TiempoEstancia() {
            const filas = document.querySelectorAll('#adultos tbody tr');

            for (let i = 0; i < filas.length; i++) {
                const fechaInicio = new Date(filas[i].querySelector('.fecha-inicio').textContent);
                const fechaFinCell = filas[i].querySelector('.fecha-fin');
                const resultadoCell = filas[i].querySelector('.resultado');

                let fechaFin;
                if (!fechaFinCell.textContent) {
                    fechaFin = new Date();
                } else {
                    fechaFin = new Date(fechaFinCell.textContent);
                }

                const diferencia = Math.abs(fechaFin - fechaInicio);
                const diasDiferencia = Math.ceil(diferencia / (1000 * 3600 * 24));
                const dias = Math.ceil(diasDiferencia)

                const anios = Math.floor(dias / 365);
                dia = dias - (anios * 365);

                const meses = Math.floor(dia / 31);
                dia -= meses * 31;

                if (anios != 0) {
                    aniosText = anios + ' Años ';
                } else {
                    aniosText = "";
                }

                if (meses != 0) {
                    mesesText = meses + ' Meses ';
                } else {
                    mesesText = "";
                }

                resultadoCell.textContent = aniosText + mesesText + dia + ' Dias' + " @ " + dias;
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('calcularEstancia').addEventListener('click', TiempoEstancia);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#adultos').DataTable();
        });
    </script>



    @if (session('mensaje') == 'registrado')
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Adulto agregado exitosamente',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    @if (session('mensaje') == 'editado')
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Adulto Editado exitosamente',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    @if (session('mensaje') == 'eliminado')
        <script>
            Swal.fire(
                'Registro Eliminado!',
                'El adulto mayor fue eliminado.',
                'success'
            )
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e) {

            e.preventDefault();

            Swal.fire({
                title: 'Esta seguro de eliminar este registro?',
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
