<div class="modal fade" id="editPatologia{{ $patologia->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #28a745 !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    Actualizar Información - Patologia
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('patologia.update', $patologia->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="modal-body">
                    <h5 class="modal-title bg-success col-md-7"> Datos de la patologia</h5>
                    <input type="text" name="historial_id" value="{{ $adulto->historialDatos->id }}" required="true"
                        style="visibility:hidden">
                    <input type="text" name="adulto_id" value="{{ $adulto->id }}" required="true"
                        style="visibility:hidden">
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Nombre de la patologia</label>
                            <input type="text" name="nombre_patologia" class="form-control"
                                value="{{ $patologia->nombre_patologia }}"
                                placeholder="Ingresar el nombre de la patologia" required="true">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Fecha del Diagnostico</label>
                            <input type="date" name="fecha_diagnostico" class="form-control"
                                value="{{ $patologia->fecha_diagnostico }}" required="true">
                        </div>
                        <div class="form-group col-md">
                            <label>Gravedad</label>
                            <select class="form-control" name="gravedad" id="gravedad"
                                class="form-control rounded-pill">
                                <option>{{ $patologia->gravedad }}</option>
                                <option>Leve</option>
                                <option>Moderada</option>
                                <option>Avanzada</option>
                                <option>Grave</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row ">
                        <label>Tratamiento</label>
                        <textarea class="form-control" name="tratamiento_actual" rows="3" placeholder="Tratamiento ">{{ $patologia->tratamiento_actual }}</textarea>
                    </div>
                    <div class="form-row ">
                        <label>Anotaciones/Evolucion</label>
                        <textarea class="form-control" name="notas_patologia" rows="10"
                            placeholder="Información adicional relevante sobre la patología, síntomas, resultados o recomendaciones médicas.">{{ $patologia->notas_patologia }}</textarea>
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
