<div class="modal fade" id="editHorario{{ $horario->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    Actualizar Información Horario
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('horario.update', $horario->id) }}"
                enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="modal-body" id="cont_modal">           
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label for="dia" class="col-form-label">Dia</label>
                            <select class="form-control" name="dia" id="dia"
                            class="form-control rounded-pill">
                            <option>{{ $horario->dia }}</option>
                            <option>Lunes</option>
                            <option>Martes</option>
                            <option>Miercoles</option>
                            <option>Jueves</option>
                            <option>Viernes</option>
                            <option>Sabado</option>
                            <option>Domingo</option>
                        </select>
                        </div>
                        <div class="form-group col-md">
                            <label for="inicio" class="col-form-label">Inicio</label>
                            <input type="time" class="form-control" name="inicio" id="inicio" value={{ \Carbon\Carbon::parse($horario->inicio)->format('H:i A') }}>
                        </div>
                        <div class="form-group col-md">
                            <label for="final" class="col-form-label">final</label>
                            <input type="time" class="form-control" name="final" id="final" value={{ \Carbon\Carbon::parse($horario->final)->format('H:i A') }}>
                        </div>
                    </div>  
                     <input type="text" name="personal_id" class="form-control" value="{{ $horario->personal_id }}"
                        required="true" style="visibility:hidden"> 
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>