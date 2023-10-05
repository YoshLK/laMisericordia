<h5>
    @if (count($errors) > 0)

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</h5>
<h3 class="text-center">
    <b> FORMULARIO PERSONAL<b>
</h3>
<div class="row-auto px-5">
    <h3> <span class="fas fa-user  {{ $ColorFormato }}"> Nombre del empleado</span> </h3>
</div>
<div class="row px-5 mt-2">
    <div class="col-auto">
        <input type="text" name="primer_nombre" id="primer_nombre"
            value="{{ isset($personal->primer_nombre) ? $personal->primer_nombre : old('primer_nombre') }}"
            placeholder="Primer Nombre" class="form-control rounded-pill">
    </div>
    <div class="col-auto">
        <input type="text"name="segundo_nombre" id="segundo_nombre"
            value="{{ isset($personal->segundo_nombre) ? $personal->segundo_nombre : old('segundo_nombre') }}"
            placeholder="Segundo Nombre" class="form-control rounded-pill">
    </div>
    <div class="col-auto">
        <input type="text"name="primer_apellido" id="primer_apellido"
            value="{{ isset($personal->primer_apellido) ? $personal->primer_apellido : old('primer_apellido') }}"
            placeholder="Apellido Paterno" class="form-control rounded-pill">
    </div>
    <div class="col-auto">
        <input type="text"name="segundo_apellido" id="segundo_apellido"
            value="{{ isset($personal->segundo_apellido) ? $personal->segundo_apellido : old('segundo_apellido') }}"
            placeholder="Apellido Materno" class="form-control rounded-pill">
    </div>
</div>
<div class="row-auto px-5 py-4">
    <h3> <span class="fas fa-address-card {{ $ColorFormato }}"> DATOS PERSONALES</span> </h3>
</div>
<div class="row px-5">
    <div class="col-4">
        <label for="DPI">DPI</label>
        <input type="text"name="DPI" id="DPI"
            value="{{ isset($personal->DPI) ? $personal->DPI : old('DPI') }}" placeholder="Ingresar DPI"
            class="form-control rounded-pill center">
    </div>
    <div class="col-4">
        @if (isset($personal->foto))
            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $personal->foto }}" width="100">
        @endif
        <label for="foto" class="px-2">Fotografia</label>
        <input type="file" name="foto" id="selectFoto" accept="image/*"
            class="form-control rounded-pill btn-outline-primary">
    </div>
    <div class="col-2">
        <label id="cambio" style="display: none;">Remplazo
            <img class="mw-100" id="viewFoto"></label>
    </div>
</div>
<br>
<div class="row px-5 mt-3">
    <div class="col-4">
        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
        <input type="date"name="fecha_nacimiento" id="fecha_nacimiento"
            value="{{ isset($personal->fecha_nacimiento) ? $personal->fecha_nacimiento : old('fecha_nacimiento') }}"
            class="form-control rounded-pill">
    </div>
    <div class="col-3 px-3">
        <label for="edad">Edad</label>
        <input type="number"name="edad" id="edad"
            value="{{ isset($personal->edad) ? $personal->edad : old('edad') }}" class="form-control rounded-pill">
    </div>
</div>
<div class="row px-5 mt-3">
    <div class="col-8 mt-2">
        <label for="direccion">Dirección</label>
        <input type="text"name="direccion" id="direccion"
            value="{{ isset($personal->direccion) ? $personal->direccion : old('direccion') }}"
            placeholder="Direccion donde reside" class="form-control rounded-pill">
    </div>
    <div class="col-4 mt-2">
        <label for="telefono">Telefono</label>
        <input type="text"name="telefono" id="telefono"
            value="{{ isset($personal->telefono) ? $personal->telefono : old('telefono') }}"
            placeholder="Numero telefonico" class="form-control rounded-pill">
    </div>
</div>
<div class="row-auto px-5 py-4">
    <h3> <span class="fas fa-file {{ $ColorFormato }}"> Iformacion de contratacion</span> </h3>
</div>
<div class="row px-5">
    <div class="col-4">
        <label for="titulo">Titulo Academico</label>
        <input type="text"name="titulo" id="titulo"
            value="{{ isset($personal->titulo) ? $personal->titulo : old('titulo') }}" placeholder="Titulo academico"
            class="form-control rounded-pill">
    </div>
    <div class="col-4 mt-2">
        <label for="cargo">Cargo</label>
        <input type="text"name="cargo" id="cargo"
            value="{{ isset($personal->cargo) ? $personal->cargo : old('cargo') }}" placeholder="Cargo operativo"
            class="form-control rounded-pill">
    </div>
    <div class="col-4 mt-2">
        <label for="salario">Salario</label>
        <input type="number"name="salario" id="salario"
            value="{{ isset($personal->salario) ? $personal->salario : old('salario') }}"
            placeholder="Monto del Salario" class="form-control rounded-pill">
    </div>
</div>
<div class="row px-5 mt-3">
    <div class="col-3">
        <label for="impuesto">Impuesto</label>
        <select class="form-control" name="impuesto" id="impuesto" class="form-control rounded-pill">
            <option> {{ isset($personal->impuesto) ? $personal->impuesto : old('impuesto') }}</option>
            <option>Aplica</option>
            <option>No aplica</option>
        </select>
    </div>
    <div class="col-6">
        <label for="sat">Identificacion Tributaria / Motivo</label>
        <input type="text"name="sat" id="sat"
            value="{{ isset($personal->sat) ? $personal->sat : old('sat') }}" placeholder="Identificacion SAT"
            class="form-control rounded-pill">
    </div>
</div>
<div class="row px-5 mt-3">
    <div class="col-4">
        <label for="fecha_contratacion">Fecha de Contratacion</label>
        <input type="date"name="fecha_contratacion" id="fecha_contratacion"
            value="{{ isset($personal->fecha_contratacion) ? $personal->fecha_contratacion : old('fecha_contratacion') }}"
            class="form-control rounded-pill">
    </div>
    <div class="col-4">
        <label for="estado_actual">Estado</label>
        <select class="form-control" name="estado_actual" id="estado_actual" class="form-control rounded-pill">
            <option> {{ isset($personal->estado_actual) ? $personal->estado_actual : old('estado_actual') }}</option>
            <option>Activo</option>
            <option>Inactivo</option>
        </select>
    </div>
    <div class="col-5">
        <label id="fecha_salida" style="display: none;">Fecha de salida: <input type="date" name="fecha_salida"
                class="form-control rounded-pill"
                value="{{ isset($personal->fecha_salida) ? $personal->fecha_salida : old('fecha_salida') }}"></label>
    </div>
</div>

<div class="row px-3 py-3">
    <div class="col-auto">
        <x-adminlte-button class="btn-flat rounded-pill" type="submit" label="{{ $modo }} datos"
            theme="{{ $color }}" icon="fas fa-lg fa-save" />
    </div>
    <div class="col-auto">
        <a class="btn btn-outline-danger rounded-pill" href="{{ url('personal') }}"> Cancelar</a>
    </div>
</div>

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectEstado = document.getElementById('estado_actual');
            const labelInfoAdicional1 = document.getElementById('fecha_salida');

            selectEstado.addEventListener('change', function() {
                if (selectEstado.value === 'Inactivo') {
                    labelInfoAdicional1.style.display = 'block';
                } else {
                    labelInfoAdicional1.style.display = 'none';
                }
            });

            if (selectEstado.value === 'Inactivo') {
                labelInfoAdicional1.style.display = 'block';
            }
        });
    </script>

    <script>
        const cambioFoto = document.getElementById('cambio');
        const $select_Foto = document.querySelector("#selectFoto"),
            $viewFoto = document.querySelector("#viewFoto");

        $select_Foto.addEventListener("change", () => {

            const archivos = $select_Foto.files;

            if (!archivos || !archivos.length) {
                $viewFoto.src = "";
                $cambioFoto.style.display = 'none';
                return;
            }

            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);

            $viewFoto.src = objectURL;
            cambioFoto.style.display = 'block';
        });
    </script>
@stop
