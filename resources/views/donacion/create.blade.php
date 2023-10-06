<div class="modal fade" id="createDonacion{{ $donador->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffc107 !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    FORMULARIO NUEVA DONACION
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('donacion.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="text" name="donador_id" value="{{ $donador->id }}" required="true"
                        style="visibility:hidden">
                    <div class="form-row ">
                        <label>Tipo de donacion</label>
                        <select class="form-control" name="tipo_donacion" id="tipo_donacion"
                            class="form-control rounded-pill">
                            <option>Especie</option>
                            <option>Medicamento</option>
                            <option>Prendas</option>
                            <option>Voluntariado</option>
                            <option>Monetaria</option>
                            <option>Otros</option>
                        </select>
                    </div>
                    <div class="form-row ">
                        <label>Cantidad</label>
                        <input type="text" name="cantidad" class="form-control"
                            placeholder="Cantidad de la donacion">
                    </div>
                    <div class="form-row ">
                        <label>Descripcion</label>
                        <textarea class="form-control" name="descripcion" rows="3"
                            placeholder="Descripción general de la donación"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Añadir Donacion</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
