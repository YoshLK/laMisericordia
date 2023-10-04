@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1 class="text-center bg-primary ">Edición de Personal</h1>
@stop

@section('content')
<div class="card" style="width: 100%;">
    <div class="container">
        <form action="{{ url('/personal/' . $personal->id) }}" method="post" enctype="multipart/form-data"
            class="px-4 py-2 border border-info rounded-lg" style="width: 300px height:75px">
            @csrf
            {{ method_field('PATCH') }}
            @include('personal.form', ['modo' => 'Editar', 'color' => 'outline-primary', 'ColorFormato'=>'badge text-green bg-primary rounded-pill'])
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> </script>
@stop