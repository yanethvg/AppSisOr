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
            <form id="store" v-on:submit.prevent="createPaciente" v-cloak>
                <div class="form-group">
                    <label class="control-label">Nombre Completo</label>
                    <input :class="['form-control', errors.nombre ? 'is-invalid' : '']" type="text" name="nombre"
                        placeholder="Ingrese Nombre Completo" v-model="paciente.nombre">
                    <div v-if='errors.nombre' class="form-control-feedback text-danger">@{{ errors.nombre[0] }}</div>
                </div>
                <div class="form-group">
                    <label class="control-label">Dirección</label>
                    <textarea :class="['form-control', errors.direccion ? 'is-invalid' : '']" rows="4" name="direccion"
                        placeholder="Ingrese la Dirección" v-model="paciente.direccion"></textarea>
                    <div v-if='errors.direccion' class="form-control-feedback text-danger">@{{ errors.direccion[0] }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Telefono</label>
                    <div class="row" id="telefono">
                        <div class="col-lg-4  col-md-12 d-flex">
                            <input :class="['form-control','mr-2', errors['telefono.0'] ? 'is-invalid' : '']"
                                type="text" name="telefono[]" v-model="paciente.telefono[0]">
                            <button v-on:click.prevent='agregarTelefono' class="btn btn-outline-info mr-2"><i
                                    class="fa fa-plus icon-expe "></i></button>

                        </div>

                        <div v-if="telefonos['0']" class="col-lg-4 col-md-12 d-flex ">
                            <input :class="['form-control','mr-2', errors['telefono.1'] ? 'is-invalid' : '']"
                                type="text" name="telefono[]" v-model="paciente.telefono[1]">
                            <button class="btn btn-outline-danger mr-2 " id="telAuxFirst"
                                v-on:click.prevent='borrarTelefono($event)'> <i
                                    class="fa fa-trash icon-expe "></i></button>
                        </div>
                        <div v-if="telefonos['1']" class="col-lg-4 col-md-12 d-flex ">
                            <input :class="['form-control','mr-2', errors['telefono.0'] ? 'is-invalid' : '']"
                                type="text" name="telefono[]" v-model="paciente.telefono[2]">
                            <button class="btn btn-outline-danger mr-2 " id="telAuxSecond"
                                v-on:click.prevent='borrarTelefono($event)'><i
                                    class="fa fa-trash icon-expe "></i></button>
                        </div>

                    </div>
                    <div v-if='errors.telefono' class="form-control-feedback text-danger">@{{ errors.telefono[0] }}
                    </div>
                    <div v-if='errors["telefono.0"]' class="form-control-feedback text-danger">
                        @{{ errors["telefono.0"][0] }}</div>
                    <div v-if='errors["telefono.1"]' class="form-control-feedback text-danger">
                        @{{ errors["telefono.1"][0] }}</div>
                    <div v-if='errors["telefono.2"]' class="form-control-feedback text-danger">
                        @{{ errors["telefono.2"][0] }}</div>

                </div>
                <div class="form-group">
                    <label class="control-label">Padecimiento (Lo que nota en los dientes)</label>
                    <textarea :class="['form-control', errors.padecimiento ? 'is-invalid' : '']" rows="4"
                        name="padecimiento" placeholder="Ingrese el padecimiento"
                        v-model="paciente.padecimiento"></textarea>
                    <div v-if='errors.padecimiento' class="form-control-feedback text-danger">
                        @{{ errors.padecimiento[0] }}</div>
                </div>
                <div class="form-group">
                    <label class="control-label">Recomendacion</label>
                    <input :class="['form-control', errors.recomendacion ? 'is-invalid' : '']" type="text"
                        name="recomendacion" placeholder="Ingrese Nombre de la Recomendacion"
                        v-model="paciente.recomendacion">
                    <div v-if='errors.recomendacion' class="form-control-feedback text-danger">
                        @{{ errors.recomendacion[0] }}</div>
                </div>
                <div class="form-group" id="validacionFecha">
                    <div class="row">
                        <div class="col-6">
                            <label class="control-label">Fecha de Nacimiento</label>
                            <input :class="['form-control', errors.fechaNacimiento ? 'is-invalid' : '']" type="date"
                                name="fecha_nacimiento" v-on:blur='toggleAge($event)' id="fecha-nacimiento"
                                v-model="paciente.fechaNacimiento">
                            <div v-if='errors.fechaNacimiento' class="form-control-feedback text-danger">
                                @{{ errors.nombre[0] }}</div>
                        </div>
                        <div class="col-6">
                            <label class="control-label">Edad</label>
                            <input class="form-control" v-model='edad' type="text" disabled="disabled" id="edad">
                        </div>
                    </div>
                </div>
                <div id="datos_responsable" v-if='enableAge' class="mt-3 fadein">
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <label class="control-label">Nombre de la Madre</label>
                                <input :class="['form-control', errors['encargados.nombreMadre'] ? 'is-invalid' : '']"
                                    type="text" name="madre" placeholder="Ingrese el nombre de la madre"
                                    v-model="paciente.encargados.nombreMadre">
                                <div v-if="errors['encargados.nombreMadre']" class="form-control-feedback text-danger">
                                    @{{ errors['encargados.nombreMadre'][0] }}</div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label class="control-label">Ocupación de la Madre</label>
                                <input
                                    :class="['form-control', errors['encargados.ocupacionMadre'] ? 'is-invalid' : '']"
                                    type="text" name="ocupacion_madre" placeholder="Ingrese la ocupacion de la madre"
                                    v-model="paciente.encargados.ocupacionMadre">
                                <div v-if="errors['encargados.ocupacionMadre']"
                                    class="form-control-feedback text-danger">
                                    @{{ errors['encargados.ocupacionMadre'][0] }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <label class="control-label">Nombre del Padre</label>
                                <input :class="['form-control', errors['encargados.nombrePadre'] ? 'is-invalid' : '']"
                                    type="text" name="padre" placeholder="Ingrese el nombre del padre"
                                    v-model="paciente.encargados.nombrePadre">
                                <div v-if="errors['encargados.nombrePadre']" class="form-control-feedback text-danger">
                                    @{{ errors['encargados.nombrePadre'][0] }}</div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label class="control-label">Ocupación del Padre</label>
                                <input
                                    :class="['form-control', errors['encargados.ocupacionPadre'] ? 'is-invalid' : '']"
                                    type="text" name="ocupacion_padre" placeholder="Ingrese la ocupacion del padre"
                                    v-model="paciente.encargados.ocupacionPadre">
                                <div v-if="errors['encargados.ocupacionPadre']"
                                    class="form-control-feedback text-danger">
                                    @{{errors['encargados.ocupacionPadre'][0] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center align-items-center">
                    <p class="mr-4"><b>¿Estudia?</b></p>
                    <div class="toggle-flip mr-2">
                        <label>
                            <input type="checkbox" id="estudia" v-on:click='toggleStudy'>
                            <span class="flip-indecator " data-toggle-on="SI" data-toggle-off="NO"></span>
                        </label>
                    </div>
                </div>
                <div id="datos_estudiantiles" v-if="enableStudy" class="fadein">
                    <div class="form-group">
                        <label class="control-label">Nombre de Institución</label>
                        <input :class="['form-control', errors['estudia.nombreInstitucion'] ? 'is-invalid' : '']"
                            type="text" name="nombre-institucion" placeholder="Ingrese Nombre de Institución" required
                            v-model="paciente.estudia.nombreInstitucion">
                        <div v-if='errors["estudia.nombreInstitucion"]' class="form-control-feedback text-danger">
                            @{{ errors["estudia.nombreInstitucion"][0] }}</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Grado</label>
                        <input :class="['form-control', errors['estudia.grado'] ? 'is-invalid' : '']" type="text"
                            name="grado" placeholder="Ingrese el Grado Academico" required
                            v-model="paciente.estudia.grado">
                        <div v-if='errors["estudia.grado"]' class="form-control-feedback text-danger">
                            @{{ errors["estudia.grado"][0] }}</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Carrera</label>
                        <input :class="['form-control', errors['estudia.carrera'] ? 'is-invalid' : '']" type="text"
                            name="carrera" placeholder="Ingrese la carrera" v-model="paciente.estudia.carrera">
                        <div v-if='errors["estudia.carrera"]' class="form-control-feedback text-danger">
                            @{{ errors["estudia.carrera"][0] }}</div>
                    </div>
                </div>
                <div>
                    <div class="form-group d-flex justify-content-center align-items-center">
                        <p class="mr-4"><b>¿Trabaja?</b></p>
                        <div class="toggle-flip mr-2">
                            <label>
                                <input type="checkbox" v-on:click='toggleWork'><span class="flip-indecator"
                                    data-toggle-on="SI" data-toggle-off="NO"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div id="datos_trabajo" class="fadein" v-if='enableWork'>
                    <div class="form-group">
                        <label class="control-label">Dirección de Trabajo</label>
                        <input :class="['form-control', errors['trabajo.direccionTrabajo'] ? 'is-invalid' : '']"
                            type="text" name="direccion_trabajo" placeholder="Ingrese la Dirección de Trabajo" required
                            v-model="paciente.trabajo.direccionTrabajo">
                        <div v-if="errors['trabajo.direccionTrabajo'] " class="form-control-feedback text-danger">
                            @{{ errors['trabajo.direccionTrabajo'][0] }}</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Profesión</label>
                        <input :class="['form-control', errors['trabajo.profesion'] ? 'is-invalid' : '']" type="text"
                            name="profesion" placeholder="Ingrese la Profesión" required
                            v-model="paciente.trabajo.profesion">
                        <div v-if="errors['trabajo.profesion']" class="form-control-feedback text-danger">
                            @{{ errors['trabajo.profesion'][0] }}</div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header text-center" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn" type="button" data-toggle="collapse" data-target="#antecedente"
                                    aria-expanded="false" aria-controls="antecedente">
                                    Antecedentes
                                </button>
                            </h2>
                        </div>

                        <div id="antecedente" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="text-center font-weight-bolder">Antecedentes Médicos</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group text-center">
                                            <p>Ha habido un cambio grave en su estado de salud en el último año?</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="saludAnio"
                                                    v-model="paciente.antecedente.medico.saludAnio" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="saludAnio"
                                                    v-model="paciente.antecedente.medico.saludAnio" :value="false">NO
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group text-center">
                                            <p>Ha tenido alguna vez alguna enfermedad u operación grave?</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="enfermedadOperacion"
                                                    v-model="paciente.antecedente.medico.enfermedadOperacion"
                                                    :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="enfermedadOperacion"
                                                    v-model="paciente.antecedente.medico.enfermedadOperacion"
                                                    :value="false">NO
                                            </label>
                                            <div class="form-group" v-if="paciente.antecedente.enfermedadOperacion">
                                                <label for="consistioEnfermadad">En qué consistió la enfermedad u
                                                    operación?</label>
                                                <textarea id="consistioEnfermadad" class="form-control"
                                                    name="consistioEnfermadad" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center">Padeció alguna vez alguna de las siguientes enfermedades:</p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group text-center">
                                            <p>Alergia</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="alergia"
                                                    v-model="paciente.antecedente.medico.alergia" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="alergia"
                                                    v-model="paciente.antecedente.medico.alergia" :value="false">NO
                                            </label>
                                            <p>Desmayos</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="desmayo"
                                                    v-model="paciente.antecedente.medico.desmayo" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="desmayo"
                                                    v-model="paciente.antecedente.medico.desmayo" :value="false">NO
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group text-center">
                                            <p>Sinusitis</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="sinusitis"
                                                    v-model="paciente.antecedente.medico.sinusitis" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sinusitis"
                                                    v-model="paciente.antecedente.medico.sinusitis" :value="false">NO
                                            </label>
                                            <p>Hepatitis</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="hepatitis"
                                                    v-model="paciente.antecedente.medico.hepatitis" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="hepatitis"
                                                    v-model="paciente.antecedente.medico.hepatitis" :value="false">NO
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group text-center">
                                            <p>Asma</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="asma"
                                                    v-model="paciente.antecedente.medico.asma" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="asma"
                                                    v-model="paciente.antecedente.medico.asma" :value="false">NO
                                            </label>
                                            <p>Artritis</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="artritis"
                                                    v-model="paciente.antecedente.medico.artritis" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="artritis"
                                                    v-model="paciente.antecedente.medico.artritis" :value="false">NO
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group text-center">
                                            <p>Diabetes</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="diabetes"
                                                    v-model="paciente.antecedente.medico.diabetes" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="diabetes"
                                                    v-model="paciente.antecedente.medico.diabetes" :value="false">NO
                                            </label>
                                            <p>Gastritis</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="gastritis"
                                                    v-model="paciente.antecedente.medico.gastritis" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gastritis"
                                                    v-model="paciente.antecedente.medico.gastritis" :value="false">NO
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group text-center">
                                            <p>Transtornos Renales</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="renal"
                                                    v-model="paciente.antecedente.medico.renal" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="renal"
                                                    v-model="paciente.antecedente.medico.renal" :value="false">NO
                                            </label>
                                            <p>Enfermedades Venéreas</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="enfermedadVenerea"
                                                    v-model="paciente.antecedente.medico.enfermedadVenerea"
                                                    :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="enfermedadVenerea"
                                                    v-model="paciente.antecedente.medico.enfermedadVenerea"
                                                    :value="false">NO
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group text-center">
                                            <p>Tuberculosis</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="tuberculosis"
                                                    v-model="paciente.antecedente.medico.tuberculosis" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="tuberculosis"
                                                    v-model="paciente.antecedente.medico.tuberculosis" :value="false">NO
                                            </label>
                                            <p>SIDA</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="sida"
                                                    v-model="paciente.antecedente.medico.sida" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sida"
                                                    v-model="paciente.antecedente.medico.sida" :value="false">NO
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group text-center">
                                            <p>Presion Sanguinea Alta</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="presionAlta"
                                                    v-model="paciente.antecedente.medico.presionAlta" :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="presionAlta"
                                                    v-model="paciente.antecedente.medico.presionAlta" :value="false">NO
                                            </label>
                                            <p>Transtornos de sangre</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="transtornoSangre"
                                                    v-model="paciente.antecedente.medico.transtornoSangre"
                                                    :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="transtornoSangre"
                                                    v-model="paciente.antecedente.medico.transtornoSangre"
                                                    :value="false">NO
                                            </label>
                                            <p>Toma algun medicamento</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="tomaMedicamento"
                                                    v-model="paciente.antecedente.medico.tomaMedicamento"
                                                    :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="tomaMedicamento"
                                                    v-model="paciente.antecedente.medico.tomaMedicamento"
                                                    :value="false">NO
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group" v-if="paciente.antecedente.medico.tomaMedicamento">
                                            <label for="consumeMedicamento">Cuál o cuáles medicamentos consume?</label>
                                            <textarea id="consumeMedicamento" class="form-control"
                                                v-model="paciente.antecedente.medico.consumeMedicamento"
                                                name="consumeMedicamento" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center"> La información que he proporcionado es verdadera y me comprometo
                                    a reportar
                                    cualquier cambio de mi estado de salud y/o uso de medicamentos
                                </p>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nombreEncargado">Nombre:</label>
                                            <input class="form-control" type="text" name="nombreEncargado"
                                                id="nombreEncargado">
                                        </div>
                                    </div>
                                    <div class="col" v-if="!enableAge">
                                        <div class="form-group">
                                            <label for="documentoUnico">DUI:</label>
                                            <input class="form-control" type="text" name="documentoUnico"
                                                id="documentoUnico">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" v-if="enableAge">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="parentesco">Parentesco:</label>
                                            <input class="form-control" type="text" name="parentesco" id="parentesco">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center font-weight-bolder">Antecedentes Odontologicos</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="chequeoDental">Hace cuanto tiempo se hizo el último chequeo
                                                dental:</label>
                                            <input class="form-control" type="text" name="chequeoDental"
                                                id="chequeoDental"
                                                v-model="paciente.antecedente.odontologico.chequeoDental">
                                        </div>
                                        <div class="form-group">
                                            <label for="accidente">Ha tenido algún accidente que involucre sus dientes,
                                                boca o cara?</label>
                                            <input class="form-control" type="text" name="accidente" id="accidente"
                                                v-model="paciente.antecedente.odontologico.accidente">
                                        </div>
                                        <div class="form-group">
                                            <label for="habito">Tiene algún hábito que involucre sus dientes o
                                                boca?:</label>
                                            <input class="form-control" type="text" name="habito" id="habito"
                                                v-model="paciente.antecedente.odontologico.habito">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center font-weight-bolder">Antecedentes Ortodoncicos</p>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group text-center">
                                            <p>Esta es mi primer visita a un ortodoncista?</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="primerVisita"
                                                    v-model="paciente.antecedente.ortodoncico.primerVisita"
                                                    :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="primerVisita"
                                                    v-model="paciente.antecedente.ortodoncico.primerVisita"
                                                    :value="false">NO
                                            </label>
                                        </div>
                                        <div class="form-group text-center">
                                            <p>Ya he tenido contacto con otro ortodoncista pero quiero una segunda
                                                opinion</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="segundaOpinion"
                                                    v-model="paciente.antecedente.ortodoncico.segundaOpinion"
                                                    :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="segundaOpinion"
                                                    v-model="paciente.antecedente.ortodoncico.segundaOpinion"
                                                    :value="false">NO
                                            </label>
                                        </div>
                                        <div class="form-group text-center">
                                            <p>Ya tuve anteriormente un tratamiento de ortodoncia</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="tratamientoAnterior"
                                                    v-model="paciente.antecedente.ortodoncico.tratamientoAnterior"
                                                    :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="tratamientoAnterior"
                                                    v-model="paciente.antecedente.ortodoncico.tratamientoAnterior"
                                                    :value="false">NO
                                            </label>
                                        </div>
                                        <div class="form-group text-center">
                                            <p>Hay otros miembros de su familia que presetan un problema similar?</p>
                                            <label class="radio-inline">
                                                <input type="radio" name="problemaFamiliar"
                                                    v-model="paciente.antecedente.ortodoncico.problemaFamiliar"
                                                    :value="true">SI
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="problemaFamiliar"
                                                    v-model="paciente.antecedente.ortodoncico.problemaFamiliar"
                                                    :value="false">NO
                                            </label>
                                        </div>
                                        <div class="form-group text-center">
                                            <label for="esperaDeTratamiento">Qué espera del tratamiento de
                                                ortodoncia?</label>
                                            <textarea id="esperaDeTratamiento" class="form-control"
                                                v-model="paciente.antecedente.ortodoncico.esperaDeTratamiento"
                                                name="esperaDeTratamiento" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-center" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn" type="button" data-toggle="collapse"
                                    data-target="#diagnosticoPrevio" aria-expanded="false"
                                    aria-controls="diagnosticoPrevio">
                                    Diagnostico Previo
                                </button>
                            </h2>
                        </div>
                        <div id="diagnosticoPrevio" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="form-group text-center">
                                    <label for="descripcionDiagnostico">Diagnostico</label>
                                    <textarea id="descripcionDiagnostico" class="form-control"
                                        v-model="paciente.diagnosticoPrevio.descripcionDiagnostico"
                                        name="descripcionDiagnostico" rows="3"></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <label for="planDeTratamiento">Plan de Tratamiento</label>
                                    <textarea id="planDeTratamiento" class="form-control"
                                        v-model="paciente.diagnosticoPrevio.planDeTratamiento" name="planDeTratamiento"
                                        rows="3"></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <label for="necesidadOdontologica">Necesidades Odontologicas?</label>
                                    <textarea id="necesidadOdontologica" class="form-control"
                                        v-model="paciente.diagnosticoPrevio.necesidadOdontologica"
                                        name="necesidadOdontologica" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-center" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn" type="button" data-toggle="collapse"
                                    data-target="#fichaDeOrtodoncia" aria-expanded="false"
                                    aria-controls="fichaDeOrtodoncia">
                                    Ficha Ortodoncica
                                </button>
                            </h2>
                        </div>
                        <div id="fichaDeOrtodoncia" class="collapse show" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="text-center font-weight-bold">Facial Frontal</p>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold"
                                                    for="facialFrontal">Facial Frontal</label>
                                            </div>
                                            <select class="custom-select" id="frontal"
                                            v-model="paciente.fichaDeOrtodoncia.facialFrontal.frontal" name="frontal">
                                                <option selected>Seleccionar</option>
                                                <option value="dolicofacial">Dolicofacial</option>
                                                <option value="mesofacial">Mesofacial</option>
                                                <option value="branquifacial">Branquifacial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold">Tercios</label>
                                            </div>
                                            <select class="custom-select" id="primerTercio" v-model= "primerTercio" name="primerTercio">
                                                <option selected>0</option>
                                                <option v-for="i in 100" :value="i" v-text="i"></option>
                                            </select>
                                            <select class="custom-select" id="segundoTercio" v-model= "segundoTercio" name="segundoTercio">
                                                <option selected>0</option>
                                                <option v-for="i in 100" :value="i" v-text="i"></option>
                                            </select>
                                            <select class="custom-select" id="tercerTercio" v-model= "tercerTercio" name="tercerTercio">
                                                <option selected>0</option>
                                                <option v-for="i in 100" :value="i" v-text="i"></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold"
                                                    for="simetria">Simetria</label>
                                            </div>
                                            <select class="custom-select" id="simetria" v-model="paciente.fichaDeOrtodoncia.facialFrontal.simetria" name="simetria">
                                                <option selected>Seleccionar</option>
                                                <option value="true">Si</option>
                                                <option value="false">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold"
                                                    for="sonrisa">Sonrisa</label>
                                            </div>
                                            <select class="custom-select" id="sonrisa" v-model="paciente.fichaDeOrtodoncia.facialFrontal.sonrisa" name="sonrisa">
                                                <option selected>Seleccionar</option>
                                                <option value="dental">Dental</option>
                                                <option value="ginvival">Ginvival</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold"
                                                    for="competencia">Competencia</label>
                                            </div>
                                            <select class="custom-select" id="competencia" v-model="paciente.fichaDeOrtodoncia.facialFrontal.competencia" name="competencia">
                                                <option selected>Seleccionar</option>
                                                <option value="true">Si</option>
                                                <option value="false">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center font-weight-bold">Perfil</p>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold"
                                                    for="perfilSuperior">Perfil Superior</label>
                                            </div>
                                            <select class="custom-select" id="perfilSuperior" v-model="paciente.fichaDeOrtodoncia.perfil.perfilSuperior" name="perfilSuperior">
                                                <option selected>Seleccionar</option>
                                                <option value="ortognatico">Ortognático</option>
                                                <option value="divAnte">Div. Ante.</option>
                                                <option value="divPost">Div. Post.</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold"
                                                    for="perfilInferior">Perfil Inferior</label>
                                            </div>
                                            <select class="custom-select" id="perfilInferior" v-model="paciente.fichaDeOrtodoncia.perfil.perfilInferior" name="perfilInferior">
                                                <option selected>Seleccionar</option>
                                                <option value="recto">Recto</option>
                                                <option value="concavo">Concavo</option>
                                                <option value="convexo">Convexo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold"
                                                    for="anguloNasolabial">Ángulo Nasolabial</label>
                                            </div>
                                            <select class="custom-select" id="anguloNasolabial" v-model="paciente.fichaDeOrtodoncia.perfil.anguloNasolabial" name="anguloNasolabial">
                                                <option selected>Seleccionar</option>
                                                <option value="normal">Normal</option>
                                                <option value="aumentado">Aumentado</option>
                                                <option value="distanciado">Distanciado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold"
                                                    for="nariz">Nariz</label>
                                            </div>
                                            <select class="custom-select" id="nariz" v-model="paciente.fichaDeOrtodoncia.perfil.nariz" name="nariz">
                                                <option selected>Seleccionar</option>
                                                <option value="normal">Normal</option>
                                                <option value="grande">Grande</option>
                                                <option value="pequeña">pequeña</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold"
                                                    for="labios">Labios</label>
                                            </div>
                                            <select class="custom-select" id="labios" v-model="paciente.fichaDeOrtodoncia.perfil.labios" name="labios">
                                                <option selected>Seleccionar</option>
                                                <option value="competente">Competente</option>
                                                <option value="incompetente">Incompetente</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center font-weight-bold">Tejidos Intraorales</p>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-center">
                                            <label for="">Inspección</label>
                                            <textarea name="" class="form-control" id="" v-model="paciente.fichaDeOrtodoncia.tejidosIntraorales.inspeccion" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-center">
                                            <label for="">Palpación</label>
                                            <textarea name="" class="form-control" id="" v-model="paciente.fichaDeOrtodoncia.tejidosIntraorales.palpacion" cols="20" rows="3"></textarea>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-center">
                                            <label for="">Encías</label>
                                            <textarea name="" class="form-control" id="" v-model="paciente.fichaDeOrtodoncia.tejidosIntraorales.encias" cols="30" rows="3"></textarea>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group text-center">
                                            <label for="">Frenillos</label>
                                            <textarea name="" class="form-control" id="" v-model="paciente.fichaDeOrtodoncia.tejidosIntraorales.frenillos" cols="30" rows="3"></textarea>

                                        </div>
                                    </div>

                                </div>
                                <p class="text-center font-weight-bold">Dentición</p>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold"
                                                    for="">Dentición</label>
                                            </div>
                                            <select class="custom-select" id="denticion" v-model="paciente.fichaDeOrtodoncia.denticion.denticion" name="denticion">
                                                <option selected>Seleccionar</option>
                                                <option value="Primario">Primario</option>
                                                <option value="Mixto">Mixto</option>
                                                <option value="Permanente">Permanente</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group text-center">
                                            <label for="">Faltantes</label>
                                            <textarea class="form-control" name="" id="" v-model="paciente.fichaDeOrtodoncia.denticion.faltantes" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center font-weight-bold">Lineas Medias</p>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold" for="">Mx</label>
                                            </div>
                                            <select class="custom-select" id="lineaMX" v-model="paciente.fichaDeOrtodoncia.lineasMedias.lineaMX" name="lineaMx" v-model="lineaMx">
                                                <option :value="true" selected>Normal</option>
                                                <option :value="false">Desviado</option>
                                            </select>
                                            <select class="custom-select" id="" name="" v-if="!lineaMx">
                                                <option value="izquierda" selected>Izquierda</option>
                                                <option value="derecha">Derecha</option>
                                            </select>
                                            <input type="number" class="form-control" name="" id="" v-if="!lineaMx"
                                                placeholder="En milimetro">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold" for="">Md</label>
                                            </div>
                                            <select class="custom-select" id="lineaMd" v-model="paciente.fichaDeOrtodoncia.lineasMedias.lineaMD" name="lineaMd" v-model="lineaMd">
                                                <option :value="true" selected>Normal</option>
                                                <option :value="false">Desviado</option>
                                            </select>
                                            <select class="custom-select" id="" name="" v-if="!lineaMd">
                                                <option value="izquierda" selected>Izquierda</option>
                                                <option value="derecha">Derecha</option>
                                            </select>
                                            <input type="number" class="form-control" name="" id="" v-if="!lineaMd"
                                                placeholder="En milimetro">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center font-weight-bold">Sobremordidas</p>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Horizontal</span>
                                            </div>
                                            <input type="number" v-model="paciente.fichaDeOrtodoncia.mordidas.horizontal" class="form-control" placeholder="mm" min="0" max="10">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold" for="">Vertical</label>
                                            </div>
                                            <select class="custom-select" v-model="paciente.fichaDeOrtodoncia.mordidas.vertical">
                                                <option value="1/3" selected>1/3</option>
                                                <option value="2/3">2/3</option>
                                                <option value="3/3">3/3</option>
                                                <option value="profunda">Profunda</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center font-weight-bold">Mordidas cruzadas</p>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Mordidas cruzadas</label>
                                            <textarea class="form-control" name="mordidasCruzadas" v-model="paciente.fichaDeOrtodoncia.mordidas.mordidasCruzadas" id="mordidasCruzadas" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center font-weight-bold">Relaciones Sagitales</p>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold" for="">Molar
                                                    Derecha</label>
                                            </div>
                                            <select class="custom-select" v-model="paciente.fichaDeOrtodoncia.relacionesSagitales.molarDerecha">
                                                <option value="claseI" selected>Clase I</option>
                                                <option value="claseII">Clase II</option>
                                                <option value="claseIII">Clase III</option>
                                                <option value="c.c">C.C</option>
                                                <option value="n.e">N.E</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold" for="">Molar
                                                    Izquierda</label>
                                            </div>
                                            <select class="custom-select" v-model="paciente.fichaDeOrtodoncia.relacionesSagitales.molarIzquierda" >
                                                <option value="claseI" selected>Clase I</option>
                                                <option value="claseII">Clase II</option>
                                                <option value="claseIII">Clase III</option>
                                                <option value="c.c">C.C</option>
                                                <option value="n.e">N.E</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold" for="">Canina
                                                    Izquierda</label>
                                            </div>
                                            <select class="custom-select" v-model="paciente.fichaDeOrtodoncia.relacionesSagitales.caninaDerecha">
                                                <option value="claseI" selected>Clase I</option>
                                                <option value="claseII">Clase II</option>
                                                <option value="claseIII">Clase III</option>
                                                <option value="c.c">C.C</option>
                                                <option value="n.e">N.E</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text font-weight-bold" for="">Canina
                                                    Izquierda</label>
                                            </div>
                                            <select class="custom-select" v-model="paciente.fichaDeOrtodoncia.relacionesSagitales.caninaIzquierda">
                                                <option value="claseI" selected>Clase I</option>
                                                <option value="claseII">Clase II</option>
                                                <option value="claseIII">Clase III</option>
                                                <option value="c.c">C.C</option>
                                                <option value="n.e">N.E</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center font-weight-bold">Analisis de espacio y discrepancia</p>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Longitud de Arco Maxilar:</label>
                                            <input type="number" class="form-control" name="" id="arcoMaxilar" v-model="paciente.fichaDeOrtodoncia.espacioDiscrepancia.arcoMaxilar"
                                                placeholder="Valor en mm" v-model="paciente.arcoMaxilar">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Longitud de Arco Mandibular:</label>
                                            <input type="number" class="form-control" name="" id="arcoMandibular" v-model="paciente.fichaDeOrtodoncia.espacioDiscrepancia.arcoMandibular"
                                                placeholder="Valor en mm" v-model="paciente.arcoMandibular">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <p class="text-center font-weight-bold">Maxilar Derecho</p>
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center">Diente</th>
                                                    <th class="text-center">Medida</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="diente in paciente.dientesMaxilarDerecho">
                                                    <td> <span v-text="diente.nombre"></span></td>
                                                    <td>
                                                        <input type="number" class="form-control" :name="diente.nombre"
                                                            :id="diente.nombre" v-model.number="diente.valor"
                                                            placeholder="Valor en mm">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p class="text-center">Total <span class="font-weight-bold"
                                                v-text="totalSumMaxilarDerecho"></span></p>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <p class="text-center font-weight-bold">Maxilar Izquierdo</p>
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center">Diente</th>
                                                    <th class="text-center">Medida</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="diente in paciente.dientesMaxilarIzquierdo">
                                                    <td> <span v-text="diente.nombre"></span></td>
                                                    <td>
                                                        <input type="number" class="form-control" :name="diente.nombre"
                                                            :id="diente.nombre" placeholder="Valor en mm"
                                                            v-model.number="diente.valor">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p class="text-center">Total <span class="font-weight-bold"
                                                v-text="totalSumMaxilarIzquierdo"></span></p>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <p class="text-center font-weight-bold">Mandibula Derecha</p>
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-dark ">
                                                <tr>
                                                    <th class="text-center">Diente</th>
                                                    <th class="text-center">Medida</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="diente in paciente.dientesMandibulaDerecho">
                                                    <td> <span v-text="diente.nombre"></span></td>
                                                    <td>
                                                        <input type="number" class="form-control" :name="diente.nombre"
                                                            :id="diente.nombre" placeholder="Valor en mm"
                                                            v-model.number="diente.valor">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p class="text-center">Total <span class="font-weight-bold"
                                                v-text="totalSumMandibulaDerecho"></span></p>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <p class="text-center font-weight-bold">Mandibula Izquierda</p>
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center">Diente</th>
                                                    <th class="text-center">Medida</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="diente in paciente.dientesMandibulaIzquierdo">
                                                    <td> <span v-text="diente.nombre"></span></td>
                                                    <td>
                                                        <input type="number" class="form-control" :name="diente.nombre"
                                                            :id="diente.nombre" placeholder="Valor en mm"
                                                            v-model.number="diente.valor">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p class="text-center">Total <span class="font-weight-bold"
                                                v-text="totalSumMandibulaIzquierdo"></span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-center font-weight-bold">Total en el Maxilar: <span
                                                v-text="maxilar"></span></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-center font-weight-bold">Total en la Mandibula: <span
                                                v-text="mandibula"></span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <p class="text-center font-weight-bold">Maxilar: <span
                                                v-text="totalArcoMaxilar > 0 ? 'Exceso':'Deficiencia' "></span></p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <p class="text-center font-weight-bold">Mandibula: <span
                                                v-text="totalArcoMandibular> 0 ? 'Exceso':'Deficiencia'"></span></p>
                                    </div>
                                </div>
                                <p class="text-center font-weight-bold">Bolton Anterior</p>
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-center">
                                            El resultado es:
                                            <span class="font-weight-bold" v-text="resultadoBoltonAnterior"></span>
                                            <span class="font-weight-bold"
                                                v-text="resultadoBoltonAnterior < 72.2 ? 'y es menor' : (resultadoBoltonAnterior > 72.2 ? 'y es mayor' : 'y es igual')"></span>
                                            a 72.2
                                        </p>
                                    </div>
                                </div>
                                <p class="text-center font-weight-bold">Bolton Total</p>
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-center">
                                            El resultado es:
                                            <span class="font-weight-bold" v-text="resultadoBoltonTotal"></span>
                                            <span class="font-weight-bold"
                                                v-text="resultadoBoltonTotal < 91.3 ? 'y es menor' : (resultadoBoltonTotal > 91.3 ? 'y es mayor' : 'y es igual')"></span>
                                            a 91.3
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="mt-3 btn btn-primary btn-block" type="submit"><i
                        class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('custom_javas')
<script type="text/javascript" src="{{ asset('js/custom/paciente/Store.js') }}"></script>
@endsection
