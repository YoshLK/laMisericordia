<div class="modal fade" id="editDonador{{ $donador->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #228bee !important;">
                <h3 class="modal-title" style="color: #fff; text-align: center;">
                    FORMULARIO EDICION DONADOR
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('donador.update', $donador->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="modal-body">
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Nombre del donador</label>
                            <input type="text" name="nombre_donador" class="form-control"
                                placeholder="Ingresar el nombre completo del donador" value="{{ $donador->nombre_donador }}" required="true">
                        </div>
                    </div>
                    <h5 class="modal-title bg-warning text-white col-md-7">DATOS OPCIONALES</h5>
                    <div class="form-row ">
                        <div class="form-group col-md">
                            <label>Organizacion</label>
                            <input type="text" name="organizacion" class="form-control"
                                placeholder="Nombre de la organización" value="{{ $donador->organizacion }}" >
                        </div>
                        <div class="form-group col-md">
                            <label>Telefono</label>
                            <input type="text" name="telefono_donador" class="form-control"
                                placeholder="Numero de contacto" value="{{ $donador->telefono_donador }}" >
                        </div>
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
