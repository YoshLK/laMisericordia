@extends('adminlte::page')

@section('title', 'La Misericordia')

@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Pantalla de inicio</h1>
@stop

@section('content')
    <p>Dashbord ... En Proceso</p>
    <div class="card" style="width: 75%;">
        <div class="row px-5 mt-2">
            <div class="col-4">
                <x-adminlte-small-box class="text-center " title="{{ $conteoActivo }}" text="Adultos Activos" theme="purple"
                    url="adulto" url-text="VER" style="width: 75%" />
            </div>
            <div class="col-4">
                <x-adminlte-small-box class="text-center " title="{{ $conteoInactivos }}" text="Adultos Inactivos"
                    theme="danger" url="adulto/inactivo" url-text="VER" style="width: 75%" />
            </div>
        </div>
    </div>

    <div class="card-columns" style="width: 75%;">
        <div class="card-auto">
             <div class="card-body">
            <x-adminlte-small-box class="text-center " title="{{ $conteoActivo }}" text="Adultos Activos" theme="purple"
                url="adulto" url-text="VER" style="width: 75%" />
        </div>
    </div>
        <div class="card-auto">
            <x-adminlte-small-box class="text-center " title="{{ $conteoInactivos }}" text="Adultos Inactivos"
                theme="danger" url="adulto/inactivo" url-text="VER" style="width: 75%" />
        </div>
    </div>
    </div>

    <div class="col-4">
        <div class="card card-warning bg-pink" style="width:75%">
            <div class="card-header">
                <h3 class="card-title">Proximos Cumpleaños</h3>
            </div>
            <div class="card-body">
                <ol type="1">
                    @foreach ($cumplesAdultos as $cumpleAdulto)
                        <li>{{ $cumpleAdulto->primer_nombre }} {{ $cumpleAdulto->segundo_nombre }}
                            {{ $cumpleAdulto->primer_apellido }}
                            {{ $cumpleAdulto->segundo_apellido }} - {{ $cumpleAdulto->fecha_nacimiento }}</li>
                    @endforeach
                    @foreach ($cumplesPersonals as $cumplePersonal)
                        <li>{{ $cumplePersonal->primer_nombre }} {{ $cumplePersonal->segundo_nombre }}
                            {{ $cumplePersonal->primer_apellido }}
                            {{ $cumplePersonal->segundo_apellido }} - {{ $cumplePersonal->fecha_nacimiento }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>

    <div class="card card-white bg-info" style="width:75%">
        <div class="card-header">
            <h3 class="card-title">GRAFICA DE % ENFERMEDADES</h3>
        </div>
        <div class="card-body">
            @foreach ($enfermedades as $enfermedad)
                {{ $enfermedad->nombre_patologia }}: {{ $enfermedad->cantidad_repeticiones }} <x-adminlte-progress
                    theme="orange" value="{{ ($enfermedad->cantidad_repeticiones / $conteoActivo) * 100 }}" vertical
                    striped with-label />
            @endforeach
        </div>
    </div>

    <div class="card card-white bg-info" style="width:75%">
        <div class="card-header">
            <h3 class="card-title">GRAFICA DE MEDICINAS NECESITADAS</h3>
        </div>
        <div class="card-body">
            @foreach ($medicinas as $medicamento)
                {{ $medicamento->nombre_medicamento }}: {{ $medicamento->cantidad_repeticiones }}<x-adminlte-progress
                    theme="danger" value="{{ ($medicamento->cantidad_repeticiones / $sumaMedicina) * 100 }}" striped
                    with-label />
            @endforeach

        </div>
    </div>

    @foreach ($medicinas as $medicamento)
        <label type="hidden"
            value="{{ $resultado[] = ($medicamento->cantidad_repeticiones / $sumaMedicina) * 100 }}"></label>
        <label type="hidden" value="{{ $nombre[] = $medicamento->nombre_medicamento }}"> </label>
    @endforeach



    <div style="width:50%">
        <canvas id="myChart"></canvas>
    </div>

    <button id="consultarConteo">Consultar Conteo de Activos</button>

    <div id="resultadoConteo"></div>

    <button id="generarGrafica">Generar Grafica</button>

    <div id="grafica"></div>

    HOLA
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">


@stop

@section('js')
    <script>
        var resultado = @json($resultado);
        var nombre = @json($nombre);
        const ctx = document.getElementById('myChart');

        var contador = 0;
        var datosArray = [];

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nombre,
                datasets: [{
                    label: 'Grafica de medicinas',
                    data: resultado,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('consultarConteo').addEventListener('click', function() {
            axios.get('{{ route('conteo-activos') }}')
                .then(function(response) {
                    document.getElementById('resultadoConteo').innerHTML = 'Conteo de Activos: ' + response.data
                        .conteoActivos;
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    </script>


    <script>
        document.getElementById('generarGrafica').addEventListener('click', function() {
            axios.get('{{ route('grafica-medicinas') }}')
                .then(function(response) {
                    var sumaMedicinas = response.data.sumaMedicinas;
                    var operacion = sumaMedicinas * 2; // Ejemplo de una operación

                    sumaMedicinas.forEach(function(valor) {
                        console.log(valor.nombre_medicamento)
                    });

                    for (var i = 0; i < sumaMedicinas.length; i++) {
                        var medicamento = sumaMedicinas[i];
                        console.log("Nombre del medicamento: " + medicamento.nombre_medicamento);
                        console.log("Cantidad de repeticiones: " + medicamento.cantidad_repeticiones);
                    }

                    // Muestra el resultado en el elemento 'grafica'
                    document.getElementById('grafica').innerHTML = 'Respuesta: ' + operacion;
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    </script>




@stop
