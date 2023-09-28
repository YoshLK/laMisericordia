@extends('adminlte::page')

@section('title', 'Nuevo registro')

@section('content_header')
    <h1 class="text-center">Adultos Mayores Registro</h1>
@stop

@section('content')

    <div class="container">
        <form action="{{ url('/adulto') }}" method="post" enctype="multipart/form-data"
            class="px-4 py-2 border border-info rounded-lg formulario-guardar" style="width: 300px height:75px">
            @csrf
            @include('adulto.form', ['modo' => 'Guardar', 'color' => 'outline-success'])
        </form>
    </div>

    <div class="container mt-3 border border-dark rounded-lg" style="bground-color: #f9f9f9;">

        <hr />
        <br>
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        const $select_Foto = document.querySelector("#selectFoto"),
            $viewFoto = document.querySelector("#viewFoto");
        $select_Foto.addEventListener("change", () => {

            const archivos = $select_Foto.files;

            if (!archivos || !archivos.length) {
                $viewFoto.src = "";
                return;
            }

            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);

            $viewFoto.src = objectURL;
        });
    </script>

@stop
