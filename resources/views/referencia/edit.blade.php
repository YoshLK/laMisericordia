<div class="modal fade" id="editReferencia{{ $referencia->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #e9e64f !important;">
          <h3 class="modal-title" style="color: #000000; text-align: center;">
              Actualizar Información - Referencia
          </h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('referencia.update', $referencia->id) }}" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        <div class="modal-body" id="cont_modal">
        <div class="form-row ">
            <div class="form-group col-md">
              <label for="primer_nombre" class="col-form-label">Primer Nombre:</label>
              <input type="text" name="primer_nombre" class="form-control" value="{{ $referencia->primer_nombre }}" required="true">
            </div>
            <div class="form-group col-md">
                <label for="rsegundo_nombre" class="col-form-label">Segundo Nombre:</label>
                <input type="text" name="segundo_nombre" class="form-control" value="{{ $referencia->segundo_nombre }}" required="true">
              </div>
         </div>

         <div class="form-row ">
            <div class="form-group col-md">
              <label for="primer_apellido" class="col-form-label">Apellido Paterno:</label>
              <input type="text" name="primer_apellido" class="form-control" value="{{ $referencia->primer_apellido }}" required="true">
            </div>
            <div class="form-group col-md">
                <label for="segundo_apellido" class="col-form-label">Apellido Materno:</label>
                <input type="text" name="segundo_apellido" class="form-control" value="{{ $referencia->segundo_apellido }}" required="true">
              </div>
         </div>

         <div class="form-row">
            <div class="form-group col-md">
              <label for="telefono" class="col-form-label">Telefono:</label>
              <input type="text" name="telefono" class="form-control" value="{{$referencia->telefono}}" required="true">
            </div>
        <div class="form-row col-md">
            <div class="form-group">
              <label for="direccion" class="col-form-label">Direccion:</label>
              <input type="text" name="direccion" class="form-control" value="{{$referencia->direccion}}" required="true">
            </div>
        </div>
        </div>
            <input type="text" name="adulto_id" class="form-control" value="{{$referencia->adulto_id}}" required="true" style="visibility:hidden">
        <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Guardar Cambios</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
   </form>
</div>
</div>
</div>