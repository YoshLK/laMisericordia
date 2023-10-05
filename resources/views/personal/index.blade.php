@extends('adminlte::page')

@section('title', 'Personal')

@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="text-center bg-info ">Registros del Personal</h1>
@stop

@section('content')

    <a href="{{ url('personal/create') }}" class="btn btn-outline-success"> + Registrar Nuevo Personal</a>
    <br />
    <br />
    <table id="personalsTable" class="table table-wite">
        <thead class="thead table-info ">
            <tr>
                <th>Foto</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Ingreso</th>
                <th>Salida</th>
                <th>Tiempo</th>
                <th>??????</th>
                <th>??????</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($personals as $personal)
                <tr>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $personal->foto }}" width="100">
                    </td>
                    <td>{{ $personal->primer_nombre }} {{ $personal->segundo_nombre }}</td>
                    <td>{{ $personal->primer_apellido }} {{ $personal->segundo_apellido }}</td>
                    <td class="fecha-inicio">{{ $personal->fecha_contratacion }}</td>
                    <td class="fecha-fin">{{ $personal->fecha_salida }}</td>
                    <td class="resultado"></td> 
                    <td>      </td>
                    <td>   </td>
                    <td>
                        <a href="{{ url('/general/personal_detalle/' . $personal->id) }}"
                            class="btn btn-xs btn-info text-light mx-1 shadow" title="Detalle">
                            <i class="fa fa-lg fa-fw fa-eye"></i>Detalle
                        </a>
                        <a href="{{ url('/personal/' . $personal->id . '/edit') }}"
                            class="btn btn-xs btn-primary   text-light   mx-1 shadow" title="Editar">
                            <i class="fa fa-lg fa-fw fa-pen"></i>Editar
                        </a>
                        <form action="{{ route('personal.destroy', $personal->id) }}" class="d-inline formulario-eliminar"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <input name="ruta" type="hidden">
                            <input name="id" value="{{ $personal->id }}" type="hidden">
                            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Borrar"><i
                                    class="fa fa-lg fa-fw fa-trash"></i>Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <!--{//!! $personals->links() !!}-->
    <button id="calcularTiempo">Calcular Tiempo</button>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script>
        function TiempoContrato() {
            const filas = document.querySelectorAll('#personalsTable tbody tr');

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
            $('#personalsTable').DataTable().destroy();
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
        }
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('calcularTiempo').addEventListener('click', TiempoContrato);
        });
    </script>

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
        title: 'Personal registrado exitosamente',
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
        title: 'Personal Editado exitosamente',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif

@if (session('mensaje') == 'eliminado')
<script>
    Swal.fire(
        'Registro Eliminado!',
        'El personal fue eliminado.',
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
