<div class="tile">
    <h3 class="tile-title">Crear Expediente</h3>
    <div class="tile-body">
        <form id="store"  v-on:submit.prevent="createPaciente">
            <div class="form-group">
                <label class="control-label">Nombre Completo</label>
                <input class="form-control" type="text" name="nombre" placeholder="Ingrese Nombre Completo" >
            </div>
            <div class="form-group">
                <label class="control-label">Dirección</label>
                <textarea class="form-control
                " rows="4" name="direccion" placeholder="Ingrese la Dirección" ></textarea>
            </div>
            <div class="form-group">
                <label class="control-label">Telefono</label>
                <div class="row" id="telefono">
                    <div class="col-lg-4  col-md-12 d-flex">
                        <input class="form-control mr-2" type="text" name="telefono[]" >
                        <a v-on:click.prevent='agregarTelefono' class="btn btn-outline-info mr-2"><i class="fa fa-plus icon-expe "></i></a>
                    </div>
                    <div v-if="telefonos['0']" class="col-lg-4 col-md-12 d-flex ">
                        <input class="form-control mr-2" type="text" name="telefono[]" >
                        <a class="btn btn-outline-danger mr-2 " id="telAuxFirst" v-on:click.prevent='borrarTelefono($event)' ><i class="fa fa-trash icon-expe " ></i></a>
                    </div>
                    <div v-if="telefonos['1']" class="col-lg-4 col-md-12 d-flex ">
                        <input class="form-control mr-2" type="text" name="telefono[]" >
                        <a class="btn btn-outline-danger mr-2 " id="telAuxSecond" v-on:click.prevent='borrarTelefono($event)' ><i class="fa fa-trash icon-expe " ></i></a>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Padecimiento (Lo que nota en los dientes)</label>
                <textarea class="form-control" rows="4" name="padecimiento"
                    placeholder="Ingrese el padecimiento"></textarea>
            </div>
            <div class="form-group">
                <label class="control-label">Recomendacion</label>
                <input class="form-control" type="text" name="recomendacion" placeholder="Ingrese Nombre de la Recomendacion" >
            </div>
            <div class="form-group" id="validacionFecha">
                <div class="row">
                    <div class="col-6">
                        <label class="control-label">Fecha de Nacimiento</label>
                        <input class="form-control" type="date" name="fecha_nacimiento" id="fecha-nacimiento" >
                    </div>
                    <div class="col-6">
                        <label class="control-label">Edad</label>
                        <input class="form-control" type="text" disabled="disabled" id="edad" >
                    </div>
                </div>
            </div>
            <div class="form-group d-flex justify-content-center align-items-center">
                <p class="mr-4"><b>¿Estudia?</b></p>
                <div class="toggle-flip mr-2">
                    <label>
                        <input type="checkbox" id="estudia">
                        <span class="flip-indecator " data-toggle-on="SI"
                            data-toggle-off="NO"></span>
                    </label>
                </div>
            </div>
            <div id="infoEstudiantil"></div>
            <div>
                <div class="form-group d-flex justify-content-center align-items-center">
                    <p class="mr-4"><b>¿Trabaja?</b></p>
                    <div class="toggle-flip mr-2">
                        <label>
                            <input type="checkbox" id="trabaja"><span class="flip-indecator" data-toggle-on="SI"  data-toggle-off="NO"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div id="infoTrabajo"></div>
            <button class="btn btn-primary btn-block" type="submit"><i  class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;</button>
        </form>
    </div>

</div>
