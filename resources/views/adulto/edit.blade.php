@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Editar vista</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{url('/adulto/'.$adulto->id )}}" method="post" enctype="multipart/form-data" class="px-4 py-2 border border-info rounded-lg" style="width: 300px height:75px">
            @csrf
            {{method_field('PATCH')}}
            @include('adulto.form',['modo'=>'Editar','color'=>'outline-primary'])
        </form>
    </div>   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); 
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