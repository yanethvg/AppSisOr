@extends('layouts.templateHome')

@section('titulo')
Crear Expediente
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Crear Expediente</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('pacientes.index')}}">Pacientes</a></li>
<li class="breadcrumb-item"><a href="{{route('pacientes.create')}}">Crear Expediente</a></li>
@endsection

@section('content')
<div class="tile-body">
    <div class="tile">
        <h3 class="tile-title">Crear Expediente</h3>
        <div class="tile-body">
            <form id="store"  v-on:submit.prevent="createPaciente">
                <div class="form-group">
                    <label class="control-label">Nombre Completo</label>
                    <input class="form-control" type="text" name="nombre" placeholder="Ingrese Nombre Completo" v-model="paciente.nombre" >
                </div>
                <div class="form-group">
                    <label class="control-label">Dirección</label>
                    <textarea class="form-control
                    " rows="4" name="direccion" placeholder="Ingrese la Dirección"  v-model="paciente.direccion"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Telefono</label>
                    <div class="row" id="telefono">
                        <div class="col-lg-4  col-md-12 d-flex">
                            <input class="form-control mr-2" type="text" name="telefono[]" v-model="paciente.telefono[0]">
                            <a v-on:click.prevent='agregarTelefono' class="btn btn-outline-info mr-2"><i class="fa fa-plus icon-expe "></i></a>
                        </div>
                        <div v-if="telefonos['0']" class="col-lg-4 col-md-12 d-flex ">
                            <input class="form-control mr-2" type="text" name="telefono[]" v-model="paciente.telefono[1]">
                            <a class="btn btn-outline-danger mr-2 " id="telAuxFirst" v-on:click.prevent='borrarTelefono($event)' ><i class="fa fa-trash icon-expe " ></i></a>
                        </div>
                        <div v-if="telefonos['1']" class="col-lg-4 col-md-12 d-flex ">
                            <input class="form-control mr-2" type="text" name="telefono[]" v-model="paciente.telefono[2]" >
                            <a class="btn btn-outline-danger mr-2 " id="telAuxSecond" v-on:click.prevent='borrarTelefono($event)' ><i class="fa fa-trash icon-expe " ></i></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Padecimiento (Lo que nota en los dientes)</label>
                    <textarea class="form-control" rows="4" name="padecimiento"
                        placeholder="Ingrese el padecimiento" v-model="paciente.padecimiento" ></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Recomendacion</label>
                    <input class="form-control" type="text" name="recomendacion" placeholder="Ingrese Nombre de la Recomendacion" v-model="paciente.recomendacion" >
                </div>
                <div class="form-group" id="validacionFecha">
                    <div class="row">
                        <div class="col-6">
                            <label class="control-label">Fecha de Nacimiento</label>
                            <input class="form-control" type="date" name="fecha_nacimiento" v-on:blur='toggleAge($event)' id="fecha-nacimiento" v-model="paciente.fecha_nacimiento">
                        </div>
                        <div class="col-6">
                            <label class="control-label">Edad</label>
                            <input class="form-control" v-model='edad' type="text" disabled="disabled" id="edad">
                        </div>
                    </div>
                </div>
                <div id="datos_responsable" v-if='enableAge' class="mt-3 fadein" >
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <label class="control-label">Nombre de la Madre</label>
                                <input class="form-control" type="text" name="madre" placeholder="Ingrese el nombre de la madre"  v-model="paciente.encargados.nombreMadre" >
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label class="control-label">Ocupación de la  Madre</label>
                                <input class="form-control" type="text" name="ocupacion_madre" placeholder="Ingrese la ocupacion de la madre" v-model="paciente.encargados.ocupacionMadre" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <label class="control-label">Nombre del Padre</label>
                                <input class="form-control" type="text" name="padre" placeholder="Ingrese el nombre del padre"
                                v-model="paciente.encargados.nombrePadre">
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label class="control-label">Ocupación del Padre</label>
                                <input class="form-control" type="text" name="ocupacion_padre" placeholder="Ingrese la ocupacion del padre" v-model="paciente.encargados.ocupacionPadre">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center align-items-center">
                    <p class="mr-4"><b>¿Estudia?</b></p>
                    <div class="toggle-flip mr-2">
                        <label>
                            <input type="checkbox" id="estudia" v-on:click='toggleStudy'>
                            <span class="flip-indecator " data-toggle-on="SI"
                                data-toggle-off="NO"></span>
                        </label>
                    </div>
                </div>
                <div id="datos_estudiantiles" v-if="enableStudy" class="fadein">
                    <div class="form-group">
                        <label class="control-label">Nombre de Institución</label>
                        <input class="form-control" type="text" name="nombre-institucion" placeholder="Ingrese Nombre de Institución" required v-model="paciente.estudia.nombreInstitucion">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Grado</label>
                        <input class="form-control" type="text" name="grado" placeholder="Ingrese el Grado Academico" required v-model="paciente.estudia.grado">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Carrera</label>
                        <input class="form-control" type="text" name="carrera" placeholder="Ingrese la carrera"v-model="paciente.estudia.carrera">
                    </div>
                    </div>
                <div>
                    <div class="form-group d-flex justify-content-center align-items-center">
                        <p class="mr-4"><b>¿Trabaja?</b></p>
                        <div class="toggle-flip mr-2">
                            <label>
                                <input type="checkbox" v-on:click='toggleWork'><span class="flip-indecator" data-toggle-on="SI"  data-toggle-off="NO"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div id="datos_trabajo" class="fadein" v-if='enableWork'>
                    <div class="form-group">
                        <label class="control-label">Dirección de Trabajo</label>
                        <input class="form-control" type="text" name="direccion_trabajo" placeholder="Ingrese la Dirección de Trabajo" required v-model="paciente.trabajo.direccionTrabajo">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Profesión</label>
                        <input class="form-control" type="text" name="profesion" placeholder="Ingrese la Profesión" required v-model="paciente.trabajo.profesion">
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit"><i  class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;</button>
            </form>
        </div>

    </div>
</div>
@endsection

@section('custom_javas')
<script type="text/javascript" src="{{ asset('js/custom/paciente/Store.js') }}"></script>
@endsection
