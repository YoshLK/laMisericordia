@extends('adminlte::page')

@section('title', 'Donaciones')

@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="text-center bg-danger ">Registros Donadores</h1>
@stop

@section('content')

<div class="col-3">
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createDonador">
        + Añadir Donador
    </button>
    @include('donador.create')
</div><br />
    <br />
    <table id="personalsTable" class="table table-wite">
        <thead class="thead table-info ">
            <tr>
                <th>Donador</th>
                <th>Organizacion</th>
                <th>Telefono</th>
                <th>No. Donaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

             @foreach ($donadores as $donador) 
                 <tr>
                    <td>{{$donador->nombre_donador}}</td>
                    <td>{{$donador->organizacion}}</td>
                    <td>{{$donador->telefono_donador}}</td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-outline-warning formulario" data-toggle="modal"
                        data-target="#editDonador{{ $donador->id }}">
                        <i class="far fa-heart"></i>
                        </button>
                        <button type="button" class="btn btn-outline-primary formulario" data-toggle="modal"
                        data-target="#editDonador{{ $donador->id }}">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>
                        <form action="{{ route('donador.destroy', $donador->id) }}" class="d-inline formulario-eliminar"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <input name="id" value="{{ $donador->id }}" type="hidden">
                            <button type="submit" class="btn btn-outline-danger formulario" title="Borrar"><i
                                    class="fa fa-lg fa-fw fa-trash"></i></button>
                        </form>
                        {{-- <a href="{{ url('/general/personal_detalle/' . $personal->id) }}"
                            class="btn btn-xs btn-info text-light mx-1 shadow" title="Detalle">
                            <i class="fa fa-lg fa-fw fa-eye"></i>Detalle
                        </a>
                        
                         --}}
                    </td>
                </tr> 
          @endforeach 
          @include('donador.edit')
        </tbody>
    </table>
 
   

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script>
        $(document).ready(function() {
           $('#personalsTable').DataTable({
                language: {
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "loadingRecords": "Cargando...",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                responsive: "true",
                dom: 'lBfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a excel',
                        className: 'btn btn-success',
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger',
                    },
                    {   
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
                    },
                ],
           });
        });
    </script>

@if (session('mensaje') == 'registrado')
<script>
    Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Registrado exitosamente',
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
        title: 'Edicion exitosamente',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif

@if (session('mensaje') == 'eliminado')
<script>
    Swal.fire(
        'Registro Eliminado!',
        'El registro fue eliminado.',
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