<div class="modal fade" id="createMedicamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #6c757d !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    FORMULARIO NUEVO MEDICAMENTO
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('medicamento.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <h5 class="modal-title bg-secondary col-md-7"> Datos del Medicamento</h5>
                    <input type="text" name="historial_id" value="{{ $adulto->historialDatos->id }}" required="true"
                        style="visibility:hidden">
                    <input type="text" name="adulto_id" value="{{ $adulto->id }}" required="true"
                        style="visibility:hidden">
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Nombre del medicamento</label>
                            <input type="text" name="nombre_medicamento" class="form-control"
                                placeholder="Ingresar el nombre del medicamento" required="true">
                        </div>
                    </div>
                    <h6 class="modal-title bg-secondary text-white col-md-6">Detalles de administracion</h6>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Dosis cantidad</label>
                            <input type="text" name="cantidad_medicamento" class="form-control"
                                placeholder="Dosis en numeros" required="true">
                        </div>
                        <div class="form-group col-md">
                            <label>Dosis medida</label>
                            <select class="form-control" name="medida_medicamento" id="medida_medicamento"
                                class="form-control rounded-pill">
                                <option>Unidad</option>
                                <option>Miligramos (mg)</option>
                                <option>Mililitros (ml)</option>
                                <option>Litros(L)</option>
                                <option>Gotas</option>
                                <option>Cuchara</option>
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
                                placeholder="Frecuencia en numeros" required="true">
                        </div>
                        <div class="form-group col-md">
                            <label>Tiempo</label>
                            <select class="form-control" name="frecuencia_dia" id="frecuencia_dia"
                                class="form-control rounded-pill">
                                <option>Horas</option>
                                <option>Dia</option>
                                <option>Semana</option>
                                <option>Mes</option>
                                <option>Otra</option>
                            </select>
                        </div>
                    </div>
                    <h6 class="modal-title bg-secondary text-white col-md-6">Tiempo de tratamiento</h6>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Fecha de inicio</label>
                            <input type="date" name="fecha_inicio" class="form-control" required="true">
                        </div>
                        <div class="form-group col-md">
                            <label>Fecha del final</label>
                            <input type="date" name="fecha_fin" class="form-control" >
                        </div>
                    </div>
                    <div class="form-row ">
                        <label>Notas del medicamento</label>
                        <textarea class="form-control" name="nota_medicamento" rows="10"
                            placeholder="Información adicional sobre el medicamento"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Añadir Medicamento</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
