<div class="modal fade" id="detalleMedicamento{{ $contadorMedicamento }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #6c757d !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    NOTAS MEDICAMENTO
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="cont_modal">
                <div class="form-row ">
                    <div class="form-row ">
                        <h6 class="modal-title bg-secondary text-white col-md-6">Notas / Anotaciones</h6>
                        <textarea class="form-control" name="nota_medicamento" rows="10" placeholder="Notas de dificultades motoras">{{ $adulto->historialDatos->medicamentosDatos[$contadorMedicamento]->nota_medicamento }} </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    </div>
                </div>
            </div>
        </div>