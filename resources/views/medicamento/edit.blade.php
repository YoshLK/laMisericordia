Edicion
<div class="modal fade" id="editMedicamento{{ $medicamento->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #28a745 !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    FORMULARIO EDICION PATOLOGIA
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('medicamento.update', $medicamento->id) }}"
                enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="modal-body">
                    <h5 class="modal-title bg-success col-md-7"> Datos del Medicamento</h5>
                    <input type="text" name="historial_id" value="{{ $adulto->historialDatos->id }}" required="true"
                        style="visibility:hidden">
                    <input type="text" name="adulto_id" value="{{ $adulto->id }}" required="true"
                        style="visibility:hidden">
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Nombre del medicamento</label>
                            <input type="text" name="nombre_medicamento" class="form-control"
                                value="{{ $medicamento->nombre_medicamento }}"
                                placeholder="Ingresar el nombre del medicamento" required="true">
                        </div>
                    </div>
                    <h6 class="modal-title bg-success text-white col-md-6">Detalles de administracion</h6>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Dosis cantidad</label>
                            <input type="text" name="cantidad_medicamento" class="form-control"
                                value="{{ $medicamento->cantidad_medicamento }}" placeholder="Dosis en numeros"
                                required="true">
                        </div>
                        <div class="form-group col-md">
                            <label>Dosis medida</label>
                            <select class="form-control" name="medida_medicamento" id="medida_medicamento"
                                class="form-control rounded-pill">
                                <option>{{ $medicamento->medida_medicamento }}</option>
                                <option>Unidad</option>
                                <option>Miligramos (mg)</option>
                                <option>Mililitros (ml)</option>
                                <option>Litros(L)</option>
                                <option>Gotas</option>
                                <option>Microgramos(mcg)</option>
                                <option>Otra</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Via de administracion</label>
                            <select class="form-control" name="via_administracion" id="via_administracion"
                                class="form-control rounded-pill">
                                <option>{{ $medicamento->via_administracion }}</option>
                                <option>Vía Oral</option>
                                <option>Vía Intravenosa</option>
                                <option>Vía Rectal</option>
                                <option>Otra</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Frecuencia</label>
                            <input type="text" name="frecuencia_tiempo" class="form-control"
                            value="{{ $medicamento->frecuencia_tiempo }}"  
                            placeholder="Frecuencia en numeros" required="true">
                        </div>
                        <div class="form-group col-md">
                            <label>Tiempo</label>
                            <select class="form-control" name="frecuencia_dia" id="frecuencia_dia"
                                class="form-control rounded-pill">
                                <option>{{ $medicamento->frecuencia_dia }}</option>
                                <option>Horas</option>
                                <option>Dia</option>
                                <option>Semana</option>
                                <option>Mes</option>
                                <option>Otra</option>
                            </select>
                        </div>
                    </div>
                    <h6 class="modal-title bg-success text-white col-md-6">Tiempo de duracion</h6>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Fecha de inicio</label>
                            <input type="date" name="fecha_inicio" class="form-control" value="{{ $medicamento->fecha_inicio }}"  required="true">
                        </div>
                        <div class="form-group col-md">
                            <label>Fecha del final</label>
                            <input type="date" name="fecha_fin" value="{{ $medicamento->fecha_fin }} class="form-control">
                        </div>
                    </div>
                    <div class="form-row ">
                        <label>Notas del medicamento</label>
                        <textarea class="form-control" name="nota_medicamento" rows="10"
                            placeholder="Información adicional sobre el medicamento">{{ $medicamento->nota_medicamento }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
