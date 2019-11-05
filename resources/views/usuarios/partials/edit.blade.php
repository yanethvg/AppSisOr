<form method="POST"  v-on:submit.prevent="updateUsuario">
        <div class="modal fade" id='edit' >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Editar usuario</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label">Nombre Completo</label>
                        <input :class="['form-control', errors.nombre ? 'is-invalid' : '']" type="text" v-model="fillUsuario.nombre" name="nombre" placeholder="Ingrese Nombre Completo">
                        <div v-if='errors.nombre' class="form-control-feedback text-danger">@{{ errors.nombre[0] }}</div>

                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label class="control-label">Nombre de usuario</label>
                                <input :class="['form-control', errors.usuario ? 'is-invalid' : '']"  type="text" name="usuario" v-model="fillUsuario.usuario" aria-describedby="usuarioHelp">
                                <div v-if='errors.usuario' class="form-control-feedback text-danger">@{{ errors.usuario[0] }}</div>
                            </div>
                            <div class="col-6">
                                <label class="control-label">Email</label>
                                <input :class="['form-control', errors.email ? 'is-invalid' : '']" type="email" v-model="fillUsuario.email" >
                                <div v-if='errors.email' class="form-control-feedback text-danger">@{{ errors.email[0] }}</div>
                            </div>
                        </div>
                    <pre> </pre>
                    </div>
                    <div class="form-group">
                        <label for="roles">Rol a desempeñar</label>
                        <select :class="['form-control', errors.rol ? 'is-invalid' : '']" id="roles_update" v-model="fillUsuario.rol">
                          <option value>Escoger un rol</option>
                          <option v-for="rol in roles" :value='rol.slug'>@{{ rol.name }}</option>
                        </select>
                        <div v-if='errors.rol' class="form-control-feedback text-danger">@{{ errors.rol[0] }}</div>

                    </div>



                <div class="modal-footer">
                  <button class="btn btn-primary" type="submit">Actualizar</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </form>
