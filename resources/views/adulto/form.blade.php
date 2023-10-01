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
    <strong class="bg-skyblue">FORMULARIO ADULTO MAYOR</strong>
</h3>
<div class="row-auto">
    <h3> <span class="fas fa-user  badge text-green bg-warning rounded-pill"> Nombre del adulto mayor</span> </h3>
</div>
<div class="row">
    <div class="col-auto">
        <input type="text" name="primer_nombre" id="primer_nombre"
            value="{{ isset($adulto->primer_nombre) ? $adulto->primer_nombre : old('primer_nombre') }}"
            placeholder="Primer Nombre" class="form-control rounded-pill">
    </div>
    <div class="col-auto">
        <input type="text"name="segundo_nombre" id="segundo_nombre"
            value="{{ isset($adulto->segundo_nombre) ? $adulto->segundo_nombre : old('segundo_nombre') }}"
            placeholder="Segundo Nombre" class="form-control rounded-pill">
    </div>
    <div class="col-auto">
        <input type="text"name="primer_apellido" id="primer_apellido"
            value="{{ isset($adulto->primer_apellido) ? $adulto->primer_apellido : old('primer_apellido') }}"
            placeholder="Apellido Paterno" class="form-control rounded-pill">
    </div>
    <div class="col-auto">
        <input type="text"name="segundo_apellido" id="segundo_apellido"
            value="{{ isset($adulto->segundo_apellido) ? $adulto->segundo_apellido : old('segundo_apellido') }}"
            placeholder="Apellido Materno" class="form-control rounded-pill">
    </div>
</div>
<div class="row-auto px-2 py-3">
    <h3> <span class="fas fa-address-card badge bg-warning rounded-pill"> Credenciales</span> </h3>
</div>
<div class="row">
    <div class="col-2">
        <label for="DPI">DPI</label>
        <input type="text"name="DPI" id="DPI" value="{{ isset($adulto->DPI) ? $adulto->DPI : old('DPI') }}"
            placeholder="Ingresar DPI" class="form-control rounded-pill center">
    </div>
    <div class="col-2">
        <label for="procedencia">Referido</label>
        <select class="form-control" name="procedencia" id="procedencia" class="form-control rounded-pill">
            <option>{{ isset($adulto->procedencia) ? $adulto->procedencia : old('procedencia') }}</option>
            <option>No Referido</option>
            <option>PNC</option>
            <option>BCVBG</option>
            <option>HRO</option>
        </select>
    </div>
    <div class="col-4">
        @if (isset($adulto->foto))
            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $adulto->foto }}" width="100">
        @endif
        <label for="foto" class="px-2">Fotografia</label>
        <input type="file" name="foto" id="selectFoto" accept="image/*"
            class="form-control rounded-pill btn-outline-primary">
    </div>
    <div class="col-2">
        <img class="mw-100" id="viewFoto">
    </div>
</div>
<div class="row-auto px-2 py-3">
    <h3> <span class="fas fa-user  badge text-green bg-warning  rounded-pill"> Iformacion adicional</span> </h3>
</div>
<div class="row">
    <div class="col-auto">
        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
        <input type="date"name="fecha_nacimiento" id="fecha_nacimiento"
            value="{{ isset($adulto->fecha_nacimiento) ? $adulto->fecha_nacimiento : old('fecha_nacimiento') }}"
            class="form-control rounded-pill">
    </div>
    <div class="col-2">
        <label for="edad">Edad</label>
        <input type="number"name="edad" id="edad"
            value="{{ isset($adulto->edad) ? $adulto->edad : old('edad') }}" class="form-control rounded-pill">
    </div>
    <div class="col-auto">
        <label for="fecha_ingreso">Fecha de Ingreso</label>
        <input type="date"name="fecha_ingreso" id="fecha_ingreso"
            value="{{ isset($adulto->fecha_ingreso) ? $adulto->fecha_ingreso : old('fecha_ingreso') }}"
            class="form-control rounded-pill">
    </div>
    <div class="col-auto">
        <label for="estado_actual">Estado</label>
        <select class="form-control" name="estado_actual" id="estado_actual" class="form-control rounded-pill">
            <option> {{ isset($adulto->estado_actual) ? $adulto->estado_actual : old('estado_actual') }}</option>
            <option>Activo</option>
            <option>Inactivo</option>
        </select>
    </div>

    <div class="col-auto">
        <label id="fecha_salida" style="display: none;">Fecha de salida: <input type="date" name="fecha_salida"
                class="form-control rounded-pill"
                value="{{ isset($adulto->fecha_salida) ? $adulto->fecha_salida : old('fecha_salida') }}"></label>
        <label id="motivo" style="display: none;">Motivo: <input type="text" name="motivo"
                class="form-control rounded-pill"
                value="{{ isset($adulto->motivo) ? $adulto->motivo : old('motivo') }}"></label>
    </div>
</div>


<div class="row px-3 py-3">
    <div class="col-auto">
        <x-adminlte-button class="btn-flat rounded-pill" type="submit" label="{{ $modo }} datos"
            theme="{{ $color }}" icon="fas fa-lg fa-save" />
    </div>
    <div class="col-auto">
        <a class="btn btn-outline-danger rounded-pill" href="{{ url('adulto') }}"> Cancelar</a>
    </div>
</div>

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectEstado = document.getElementById('estado_actual');
            const labelInfoAdicional1 = document.getElementById('fecha_salida');
            const labelInfoAdicional2 = document.getElementById('motivo');

            selectEstado.addEventListener('change', function() {
                if (selectEstado.value === 'Inactivo') {
                    labelInfoAdicional1.style.display = 'block';
                    labelInfoAdicional2.style.display = 'block';
                } else {
                    labelInfoAdicional1.style.display = 'none';
                    labelInfoAdicional2.style.display = 'none';
                }
            });

            // Verificar el estado inicial
            if (selectEstado.value === 'Inactivo') {
                labelInfoAdicional1.style.display = 'block';
                labelInfoAdicional2.style.display = 'block';
            }
        });
    </script>

@stop
