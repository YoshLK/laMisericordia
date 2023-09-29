<div class="modal fade" id="editHistorial{{ $adulto->historialDatos->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #17a2b8  !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    EDICION DE MEDIDAS CORPORALES
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('historial.update', $adulto->historialDatos->id) }}"
                enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="modal-body">
                    <h6 class="modal-title bg-info text-white col-md-7">MEDIDAS CORPORALES</h6>
                    <input type="text" name="adulto_id" value="{{ $adulto->id }}" required="true"
                        style="visibility:hidden">
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Peso (kg)</label>
                            <input type="text" name="peso" class="form-control"
                                value="{{ $adulto->historialDatos->peso }}"
                                placeholder="Ingresar el peso del adulto mayor" required="true">
                        </div>
                        <div class="form-group col-md">
                            <label>Altura (cm)</label>
                            <input type="text" name="altura" class="form-control"
                                value="{{ $adulto->historialDatos->altura }}"
                                placeholder="Ingresar la altura del adulto mayor" required="true">
                        </div>
                    </div>
                    <h6 class="modal-title bg-info text-white col-md-6">TALLAS DE VESTIMENTA</h6>
                    <div class="form-row ">
                        <label>Talla de Camisa/Sweater</label>
                        <select class="form-control" name="tronco" id="tronco" class="form-control rounded-pill">
                            <option>{{ $adulto->historialDatos->tronco }}</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                        </select>
                    </div>
                    <div class="form-row ">
                        <label>Pantalon</label>
                        <input type="text" name="piernas" class="form-control"
                            value="{{ $adulto->historialDatos->piernas }}" placeholder="Ingresar la talla de pantalon"
                            required="true">
                    </div>
                    <div class="form-row ">
                        <label>Calzado</label>
                        <input type="text" name="calzado" class="form-control"
                            value="{{ $adulto->historialDatos->calzado }}" placeholder="Ingresar la talla de calzado"
                            required="true">
                    </div>
                    <br>
                    <div class="form-row ">
                        <h6 class="modal-title bg-info text-white col-md-6">DIFICULTAD MOTORA</h6>
                        <textarea class="form-control" name="dificultad_motora" rows="3" placeholder="Notas de dificultades motoras">{{ $adulto->historialDatos->dificultad_motora }} </textarea>
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
