<div class="modal fade" id="editDonacion{{ $donacion->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffc107 !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    FORMULARIO EDICION DONACION
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('donacion.update', $donacion->id) }}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
                <div class="modal-body">
                    <div class="form-row ">
                        <label>Tipo de donacion</label>
                        <select class="form-control" name="tipo_donacion" id="tipo_donacion"
                            class="form-control rounded-pill">
                            <option>{{ $donacion->tipo_donacion }}</option>
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
                        <input type="text" name="cantidad" class="form-control" placeholder="Cantidad de la donacion"
                            value="{{ $donacion->cantidad }}">
                    </div>
                    <div class="form-row ">
                        <label>Descripcion</label>
                        <textarea class="form-control" name="descripcion" rows="3" placeholder="Descripción general de la donación"
                            value="{{ $donacion->descripcion }}"></textarea>
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
