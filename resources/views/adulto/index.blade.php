@extends('adminlte::page')

@section('title', 'Adultos Mayores')
<!--data table-->
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="text-center">Registros de Adultos Mayores</h1>
@stop

@section('content')

    <a href="{{ url('adulto/create') }}" class="btn btn-success"> Registrar Nuevo Adulto Mayor</a>
    <br />
    <br />
    <table id="adultos" class="table table-wite">
        <thead class="thead table-primary">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($adultos as $adulto)
                <tr>
                    <td>{{ $adulto->id }}</td>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $adulto->foto }}"
                            width="100">
                    </td>
                    <td>{{ $adulto->primer_nombre }}</td>
                    <td>{{ $adulto->segundo_nombre }}</td>
                    <td>{{ $adulto->primer_apellido }}</td>
                    <td>{{ $adulto->segundo_apellido }}</td>
                    <td>
                        <a href="{{ url('/general/adulto_detalle/' . $adulto->id) }}" class="btn btn-info">
                            Detalle
                        </a>
                        |
                        <a href="{{ url('/adulto/' . $adulto->id . '/edit') }}" class="btn btn-warning">
                            Editar
                        </a> |
                        <form action="{{ route('adulto.destroy', $adulto->id) }}" class="d-inline formulario-eliminar"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {!! $adultos->links() !!}

    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Borrar">
        <i class="fa fa-lg fa-fw fa-trash"></i>
    </button>
    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalle">
        <i class="fa fa-lg fa-fw fa-eye"></i>
    </button>
    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
        <i class="fa fa-lg fa-fw fa-pen"></i>
    </button>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script>
    $(document).ready(function(){
        $('#adultos').DataTable();
    } );
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
