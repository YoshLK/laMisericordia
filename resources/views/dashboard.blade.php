@extends('adminlte::page')

@section('title', 'La Misericordia')

@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Pantalla de inicio</h1>
@stop

@section('content')
    <p>Dashbord ... En Proceso</p>

    <div class="row px-5 mt-2">
        <div class="col-3">
            <div class="small-box bg-gradient-purple">
                <div class="inner">
                    <h3>{{ $conteoActivo }}</h3>
                    <p>Adultos Activos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <a href="adulto" class="small-box-footer">
                    Ver <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="small-box bg-gradient-red">
                <div class="inner">
                    <h3>{{ $conteoInactivos }}</h3>
                    <p>Adultos Egresados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-times"></i>
                </div>
                <a href="adulto/inactivo" class="small-box-footer">
                    Ver <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-6">
            <div class="info-box bg-orange">
                <span class="info-box-icon"><i class="fas fa-birthday-cake px-5"></i></span>
                <div class="info-box-content">
                    <h3>Proximos Cumpleaños</h3>
                    @foreach ($cumplesAdultos as $cumpleAdulto)
                        <h5 class="px-4">
                            <li class="list-style-type: decimal-leading-zero">{{ $cumpleAdulto->primer_nombre }}
                                {{ $cumpleAdulto->segundo_nombre }}
                                {{ $cumpleAdulto->primer_apellido }}
                                {{ $cumpleAdulto->segundo_apellido }} - {{ $cumpleAdulto->fecha_nacimiento }}</li>
                    @endforeach
                    @foreach ($cumplesPersonals as $cumplePersonal)
                        <li>{{ $cumplePersonal->primer_nombre }} {{ $cumplePersonal->segundo_nombre }}
                            {{ $cumplePersonal->primer_apellido }}
                            {{ $cumplePersonal->segundo_apellido }} - {{ $cumplePersonal->fecha_nacimiento }}</li>
                        </h5>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<br>
{{-- Horario --}}
<table id="adultos" class="table table-bordered  table-hover" >
    <caption>Horarios del Personal la Misericordia</caption>
    <thead class="thead bg-info ">
        <tr>
            <th >Nombre</th>
            <th >Lunes</th>
            <th >Martes</th>
            <th >Miércoles</th>
            <th >Jueves</th>
            <th >Viernes</th>
            <th >Sábado</th>
            <th >Domingo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datosHorarios as $empleado)
            <tr>
                <td>{{ $empleado->primer_nombre }} {{ $empleado->primer_apellido }}</td>
                @foreach (['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'] as $dia)
                    <td>
                        @if (isset($empleado->horarios[$dia]))
                            {{ $empleado->horarios[$dia] }}
                        @else
                            <!-- Puedes mostrar un mensaje o dejarlo en blanco -->
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>



    {{-- Graficas --}}
    <div class="card card-white bg-info" style="width:75%">
        <div class="card-header">
            <h3 class="card-title">GRAFICA DE % ENFERMEDADES</h3>
        </div>
        <div class="card-body">
            @foreach ($enfermedades as $enfermedad)
                {{ $enfermedad->nombre_patologia }}: {{ $enfermedad->cantidad_repeticiones }} <x-adminlte-progress
                    theme="orange" value="{{ ($enfermedad->cantidad_repeticiones / $conteoActivo) * 100 }}" vertical
                    with-label />
            @endforeach
        </div>
    </div>
    <br>

    <div class="card card-white bg-info" style="width:75%">
        <div class="card-header">
            <h3 class="card-title">GRAFICA DE MEDICINAS NECESITADAS</h3>
        </div>
        <div class="card-body">
            @foreach ($medicinas as $medicamento)
                {{ $medicamento->nombre_medicamento }}: {{ $medicamento->cantidad_repeticiones }}<x-adminlte-progress
                    theme="danger" value="{{ ($medicamento->cantidad_repeticiones / $sumaMedicina) * 100 }}" with-label />
            @endforeach

        </div>
    </div>

    @foreach ($medicinas as $medicamento)
        <label type="hidden"
            value="{{ $resultado[] = ($medicamento->cantidad_repeticiones / $sumaMedicina) * 100 }}"></label>
        <label type="hidden" value="{{ $nombre[] = $medicamento->nombre_medicamento }}"> </label>
    @endforeach



    {{-- <div style="width:50%">
        <canvas id="myChart"></canvas>
    </div>

    <button id="consultarConteo">Consultar Conteo de Activos</button>

    <div id="resultadoConteo"></div>

    <button id="generarGrafica">Generar Grafica</button>

    <div id="grafica"></div> --}}

    {{-- <div class="row w-100">
        <div class="col-md-3">
            <div class="card border">
                
                <x-adminlte-small-box class="text-center " title="{{ $conteoActivo }}" text="Adultos Activos" theme="purple"
                    url="adulto" url-text="VER" style="width: 100%" />
                    --}}
    {{-- </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>Eyes</h4></div>
                <div class="text-success text-center mt-2"><h1>9332</h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-heart" aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3"><h4>Hearts</h4></div>
                <div class="text-danger text-center mt-2"><h1>346</h1></div>
            </div>
        </div>
     </div> --}}


    {{-- <div class="container mt-4">
        <div class="row">
            <!-- Primera tarjeta con altura fija -->
            <div class="col-md-3">
                <div class="card mb-4" >
                    <div class="card-body">
                        <h5 class="card-title">Tarjeta R1 C1</h5>
                        <p class="card-text">Contenido de la Tarjeta 1.</p>
                    </div>
                </div>
                <div class="card md-4"  >
                    <div class="card-body">
                        <h5 class="card-title">Tarjeta c1</h5>
                        <p class="card-text">Contenido de la Tarjeta 4.</p>
                    </div>
                </div>
            </div>
            
            <!-- Segunda tarjeta con altura fija -->
            <div class="col-md-3">
                <div class="card mb-4" >
                    <div class="card-body">
                        <h5 class="card-title">Tarjeta R1 C2</h5>
                        <p class="card-text">Contenido de la Tarjeta 2.</p>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Tarjeta c2</h5>
                        <p class="card-text">Contenido de la Tarjeta 5.</p>
                    </div>
                </div>
            </div>
            <!-- Espacio sobrante -->
            <div class="col-md-6">
                <!-- Tarjeta que ocupará el espacio sobrante -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Tarjeta Extra</h5>
                        
                        <p class="card-text">Contenido de la Tarjeta 2.</p>
                        <p class="card-text">Contenido de la Tarjeta 2.</p>
                        <p class="card-text">Contenido de la Tarjeta 2.</p>
                        <p class="card-text">Contenido de la Tarjeta 2.</p>
                        <p class="card-text">Contenido de la Tarjeta 2.</p>
                        <p class="card-text">Contenido de la Tarjeta 2.</p>
                        <p class="card-text">Contenido de la Tarjeta 2.</p>
                        <p class="card-text">Contenido de la Tarjeta 2.</p>
                        <p class="card-text">Contenido de la Tarjeta 2.</p>
                        <p class="card-text">Contenido de la Tarjeta 2.</p>
                        <!-- Contenido de la Tarjeta Extra -->
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


{{-- 
    <div class="card-columns">
        <!-- Primera tarjeta con altura fija -->
        <div class="card-auto">
            <div class="card-body" name="tarjeta 1">
                <x-adminlte-small-box class="text-center " title="{{ $conteoActivo }}" text="Adultos Activos"
                    theme="purple" url="adulto" url-text="VER" style="width: 75%" />
            </div>
        </div>
        <!-- Segunda tarjeta con altura fija -->

        <div class="card-auto">
            <div class="card-body">
                <x-adminlte-small-box class="text-center " title="{{ $conteoInactivos }}" text="Adultos Inactivos"
                    theme="danger" url="adulto/inactivo" url-text="VER" style="width: 75%" />
            </div>
        </div>




        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Tarjeta Extra</h5>

                <p class="card-text">Contenido de la Tarjeta 2.</p>
                <p class="card-text">Contenido de la Tarjeta 2.</p>
                <p class="card-text">Contenido de la Tarjeta 2.</p>
                <p class="card-text">Contenido de la Tarjeta 2.</p>
                <p class="card-text">Contenido de la Tarjeta 2.</p>
                <p class="card-text">Contenido de la Tarjeta 2.</p>
                <p class="card-text">Contenido de la Tarjeta 2.</p>
                <p class="card-text">Contenido de la Tarjeta 2.</p>
                <p class="card-text">Contenido de la Tarjeta 2.</p>
                <p class="card-text">Contenido de la Tarjeta 2.</p>
                <!-- Contenido de la Tarjeta Extra -->
            </div>
        </div>



        <!-- Tarjeta que ocupará el espacio sobrante -->
    </div>

    <div class="card" style="width: 700px">
        <div class="card-body">
            <h5 class="card-title">Tarjeta2</h5>
            <p class="card-text">Contenido de la Tarjeta 2.</p>
        </div>
    </div> --}}

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
