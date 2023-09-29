 <div class="modal fade" id="createReferencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header" style="background-color: #228bee !important;">
                 <h3 class="modal-title" style="color: #fff; text-align: center;">
                     FORMULARIO NUEVA REFERENCIA
                 </h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="{{ route('referencia.store') }}" method="POST">
                 {{ csrf_field() }}
                 <div class="modal-body">
                     <h5 class="modal-title bg-primary text-white col-md-7"> NOMBRE DE LA REFERENCIA</h5>
                     <input type="text" name="adulto_id" value="{{ $adulto->id }}" required="true"
                         style="visibility:hidden">
                     <div class="form-row ">
                         <div class="form-group col-md">
                             <label>Primer Nombre</label>
                             <input type="text" name="primer_nombre" class="form-control"
                                 placeholder="Ingresar el primer nombre" required="true">
                         </div>
                         <div class="form-group col-md">
                             <label>Segundo Nombre</label>
                             <input type="text" name="segundo_nombre" class="form-control"
                                 placeholder="Ingresar el segundo" required="true">
                         </div>
                     </div>
                     <div class="form-row ">
                         <div class="form-group col-md">
                             <label>Primer Apellido</label>
                             <input type="text" name="primer_apellido" class="form-control"
                                 placeholder="Ingresar el apellido Paterno" required="true">
                         </div>
                         <div class="form-group col-md">
                             <label>Segundo Apellido</label>
                             <input type="text" name="segundo_apellido" class="form-control"
                                 placeholder="Ingresar el apellido Materno" required="true">
                         </div>
                     </div>
                     <h5 class="modal-title bg-primary text-white col-md-6"> DATOS DE CONTACTO</h5>
                     <div class="form-row ">
                         <div class="form-group col-md">
                             <label>Telefono</label>
                             <input type="text" name="telefono" class="form-control"
                                 placeholder="Ingresar el telefono" required="true">
                         </div>
                         <div class="form-group col-md">
                             <label>Direccion</label>
                             <input type="text" name="direccion" class="form-control"
                                 placeholder="Ingresar la direccion" required="true">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Añadir Referencia</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
