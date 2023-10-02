@extends('adminlte::page')

@section('title', 'La Misericordia')

@section('content_header')
    <h1>Pantalla de inicio</h1>
@stop

@section('content')
    <p>Dashbord En proceso</p>
    <div class="row px-5 mt-2">
        <div class="col-4">
            <x-adminlte-small-box class="text-center " title="{{ $conteoActivos }}" text="Adultos Activos" theme="purple"
                url="adulto" url-text="VER" style="width: 75%" />
        </div>
        <div class="col-4">
            <x-adminlte-small-box class="text-center " title="{{ $conteoInactivos }}" text="Adultos Inactivos"
                theme="danger" url="adulto/inactivo" url-text="VER" style="width: 75%" />
        </div>
        <div class="col-4">
            <div class="card card-warning bg-pink" style="width:75%">
                <div class="card-header">
                    <h3 class="card-title">Proximos Cumpleaños</h3>
                </div>
                <div class="card-body">
                    <ol type="1">
                        @foreach ($cumples as $adulto)
                            <li>{{ $adulto->primer_nombre }} {{ $adulto->segundo_nombre }} {{ $adulto->primer_apellido }}
                                {{ $adulto->segundo_apellido }} - {{ $adulto->fecha_nacimiento }}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-white bg-info" style="width:75%">
        <div class="card-header">
            <h3 class="card-title">GRAFICA DE % ENFERMEDADES</h3>
        </div>
        <div class="card-body">
            @foreach ($enfermedades as $enfermedad)
                {{ $enfermedad->nombre_patologia }}: {{$enfermedad->cantidad_repeticiones}} <x-adminlte-progress theme="orange"
                    value="{{ ($enfermedad->cantidad_repeticiones / $conteoActivos) * 100 }}" vertical striped with-label />
            @endforeach
        </div>
    </div>

    <div class="card card-white bg-info" style="width:75%">
        <div class="card-header">
            <h3 class="card-title">GRAFICA DE % ENFERMEDADES</h3>
        </div>
        <div class="card-body">
            @foreach ($enfermedades as $enfermedad)
                {{ $enfermedad->nombre_patologia }}: {{$enfermedad->cantidad_repeticiones}}<x-adminlte-progress theme="danger"
                    value="{{ ($enfermedad->cantidad_repeticiones / $conteoActivos) * 100 }}" striped
                    with-label />
            @endforeach

        </div>
    </div>






@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
