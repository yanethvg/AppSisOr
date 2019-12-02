<form method="POST"  v-on:submit.prevent="updatePago">
        <div class="modal fade" id='edit' >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Actualizar Pago</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label">Nombre Completo</label>
                        <input :class="['form-control', errors.nombre ? 'is-invalid' : '']" type="text" v-model="fillPago.nombre" name="nombre" >
                        <div v-if='errors.nombre' class="form-control-feedback text-danger">@{{ errors.nombre[0] }}</div>
                    </div>

                    <div class="form-group">
                            <label class="control-label">Descripcion</label>
                            <input :class="['form-control', errors.descripcion ? 'is-invalid' : '']" type="text" v-model="fillPago.descropcion" name="descripcion" placeholder="Ingrese Descripción">
                            <div v-if='errors.nombre' class="form-control-feedback text-danger">@{{ errors.descripcion[0] }}</div>
                    </div>
                    <div class="form-group">
                            <label class="control-label">Monto</label>
                            <input :class="['form-control', errors.monto ? 'is-invalid' : '']" type="text" v-model="fillPago.monto" name="descripcion" placeholder="Ingrese Monto">
                            <div v-if='errors.monto' class="form-control-feedback text-danger">@{{ errors.monto[0] }}</div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" type="submit">Actualizar</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
</form>
