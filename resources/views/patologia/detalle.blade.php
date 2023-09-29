<div class="modal fade" id="detallePatologia{{ $contador }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #28a745 !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    NOTAS
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="cont_modal">
                <div class="form-row ">
                    <div class="form-row ">
                        <h6 class="modal-title bg-success text-white col-md-6">Anotaciones / Evolucion</h6>
                        <textarea class="form-control" name="dificultad_motora" rows="10" placeholder="Notas de dificultades motoras">{{ $adulto->historialDatos->patologiasDatos[$contador]->notas_patologia }} </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    </div>
                </div>
            </div>
        </div>
