<div class="modal fade" id="createHorario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    FORMULARIO NUEVO HORARIO
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('horario.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="text" name="personal_id" value="{{ $personal->id }}" required="true"
                        style="visibility:hidden">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Dia</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control" name="dia" id="dia"
                                        class="form-control rounded-pill">
                                        <option>Lunes</option>
                                        <option>Martes</option>
                                        <option>Miercoles</option>
                                        <option>Jueves</option>
                                        <option>Viernes</option>
                                        <option>Sabado</option>
                                        <option>Domingo</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="time" class="form-control" name="inicio" id="inicio" required="true">
                                </td>
                                <td>
                                    <input type="time" class="form-control" name="final" id="final" required="true">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Añadir Referencia</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
