@extends('layouts.templateHome')

@section('titulo')
Editar Expediente
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Editar Expediente</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('pacientes.index')}}">Pacientes</a></li>
<li class="breadcrumb-item"><a href="{{ route('pacientes.edit', ['id'=> old('id')??$paciente->id]) }}">Editar</a></li>
@endsection


@section('content')
<div class="tile-body">
    <div class="tile">
        <div class="tile-body">
            <form id="store" method="POST" action="{{ route('pacientes.update',$paciente->id) }}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <!--Seguridad Otorgada por blade -->
                <div class="card border-primary mb-3">
                    <div class="card-header text-white bg-primary">Datos Personales</div>
                    <div class="card-body ">
                        <div class="form-group">
                            <label class="control-label">Nombre Completo</label>
                            <input class="form-control" type="text" name="nombre"
                                value="{{ old('nombre')??$paciente->nombre}}">

                            @if ($errors->has('nombre'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Dirección</label>
                            <textarea class="form-control
                                            " rows="4"
                                name="direccion">{{ old('direccion')??$paciente->direccion}}</textarea>
                            @if ($errors->has('direccion'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('direccion') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">

                            <label class="control-label">Telefono</label>
                            <div class="row" id="telefono">
                                @if(count($telefonos) == 1)
                                <div class="col-lg-4  col-md-12 d-flex">
                                    <input class="form-control mr-2" type="text" name="telefono[]"
                                        value="{{ old('$telefonos[0]->telefono')??$telefonos[0]->telefono}}" required>

                                </div>
                                <div class="col-lg-4  col-md-12 d-flex">
                                    <input class="form-control mr-2" type="text" name="telefono[]">

                                </div>
                                <div class="col-lg-4  col-md-12 d-flex">
                                    <input class="form-control mr-2" type="text" name="telefono[]">
                                    @if ($errors->has('telefono.min'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('telefono.min') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                @elseif(count($telefonos) == 2)
                                <div class="col-lg-4  col-md-12 d-flex">
                                    <input class="form-control mr-2" type="text" name="telefono[]"
                                        value="{{ old('$telefonos[0]->telefono')??$telefonos[0]->telefono}}" required>
                                </div>
                                <div class="col-lg-4  col-md-12 d-flex">
                                    <input class="form-control mr-2" type="text" name="telefono[]"
                                        value="{{ old('$telefonos[1]->telefono')??$telefonos[1]->telefono}}">
                                </div>
                                <div class="col-lg-4  col-md-12 d-flex">
                                    <input class="form-control mr-2" type="text" name="telefono[]">
                                </div>

                                @else
                                <div class="col-lg-4  col-md-12 d-flex">
                                    <input class="form-control mr-2" type="text" name="telefono[]"
                                        value="{{ old('$telefonos[0]->telefono')??$telefonos[0]->telefono}}" required>
                                </div>
                                <div class="col-lg-4  col-md-12 d-flex">
                                    <input class="form-control mr-2" type="text" name="telefono[]"
                                        value="{{ old('$telefonos[1]->telefono')??$telefonos[1]->telefono}}">
                                </div>
                                <div class="col-lg-4  col-md-12 d-flex">
                                    <input class="form-control mr-2" type="text" name="telefono[]"
                                        value="{{ old('$telefonos[2]->telefono')??$telefonos[2]->telefono}}">
                                </div>

                                @endif

                            </div>

                        </div>

                        <div class="form-group" id="validacionFecha">
                            <div class="row">
                                <div class="col-6">
                                    <label class="control-label">Fecha de Nacimiento</label>
                                    <input class="form-control" type="date" name="fecha_nacimiento"
                                        id="fecha_nacimiento"
                                        value="{{ old('fecha_nacimiento')??$paciente->fecha_nacimiento}}" required>

                                </div>
                                <div class="col-6">
                                    <label class="control-label">Edad</label>
                                    <input class="form-control" type="text" disabled="disabled" id="edad"
                                        value="{{ old('edad')??$edad}}">
                                </div>

                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Padecimiento</label>
                            <textarea class="form-control
                                        " rows="4" name="padecimiento"
                                placeholder="Ingrese Padecimiento">{{ old('padecimiento')??$paciente->padecimiento}}</textarea>
                            @if ($errors->has('padecimiento'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('padecimiento') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Recomendación</label>
                            <input class="form-control" type="text" name="recomendacion"
                                placeholder="Ingrese Recomendación"
                                value="{{ old('recomendacion')??$paciente->recomendacion}}">
                            @if ($errors->has('recomendacion'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('recomendacion') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card border-primary mb-3">
                    <div class="card-header text-white bg-primary">Datos Estudiantiles</div>
                    <div class="card-body ">
                        <div id="datos_estudiantiles">
                            <div class="form-group">
                                <label class="control-label">Nombre de Institución</label>
                                @if($estudia)
                                <input class="form-control" type="text" name="nombre_institucion"
                                    placeholder="Ingrese Nombre de Institución"
                                    value="{{ old('$estudia->nombre')??$estudia->nombre}}">
                                @else
                                <input class="form-control" type="text" name="nombre_institucion"
                                    placeholder="Ingrese Nombre de Institución">
                                @endif
                                @if ($errors->has('nombre_institucion'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('nombre_institucion') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Grado</label>
                                @if($estudia)
                                <input class="form-control" type="text" name="grado"
                                    placeholder="Ingrese el Grado Academico"
                                    value="{{ old('$estudia->grado')??$estudia->grado}}">
                                @else
                                <input class="form-control" type="text" name="grado"
                                    placeholder="Ingrese el Grado Academico">
                                @endif
                                @if ($errors->has('grado'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('grado') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Carrera</label>
                                @if($estudia)
                                <input class="form-control" type="text" name="carrera" placeholder="Ingrese la carrera"
                                    value="{{ old('$estudia->carrera')??$estudia->carrera}}">
                                @else
                                <input class="form-control" type="text" name="carrera" placeholder="Ingrese la carrera">
                                @endif
                                @if ($errors->has('carrera'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('carrera') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if($edad>18)
                <div class="card border-primary mb-3">
                    <div class="card-header text-white bg-primary">Datos Laborales</div>
                    <div class="card-body ">
                        <div id="datos_trabajo">
                            <div class="form-group">
                                <label class="control-label">Dirección de Trabajo</label>
                                <textarea class="form-control
                                            " rows="4" name="direccion_trabajo"
                                    placeholder="Ingrese la Dirección de Trabajo">{{ old('direccion_trabajo')??$paciente->direccion_trabajo}}</textarea>
                                @if ($errors->has('direccion_trabajo'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('direccion_trabajo') }}</strong>
                                </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <label class="control-label">Profesión</label>
                                <input class="form-control" type="text" name="profesion"
                                    placeholder="Ingrese la Profesión"
                                    value="{{ old('profesion')??$paciente->profesion}}">
                                @if ($errors->has('profesion'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('profesion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="card border-primary mb-3">
                    <div class="card-header text-white bg-primary">Datos de Encargados</div>
                    <div class="card-body ">
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label class="control-label">Nombre de la Madre</label>
                                    @if($encargados)
                                    <input class="form-control" type="text" name="madre"
                                        placeholder="Ingrese el nombre de la madre"
                                        value="{{ old('profesion')??$encargados->madre}}">

                                    @else
                                    <input class="form-control" type="text" name="madre"
                                        placeholder="Ingrese el nombre de la madre">

                                    @endif
                                    @if ($errors->has('madre'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('madre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label class="control-label">Ocupacion de la Madre</label>
                                    @if($encargados)
                                    <input class="form-control" type="text" name="ocupacion_madre"
                                        placeholder="Ingrese la ocupación de la madre"
                                        value="{{ old('ocupacion_madre')??$encargados->ocupacion_madre}}">
                                    @else
                                    <input class="form-control" type="text" name="ocupacion_madre"
                                        placeholder="Ingrese la ocupación de la madre">
                                    @endif
                                    @if ($errors->has('ocupacion_madre'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('ocupacion_madre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label class="control-label">Nombre de la Padre</label>
                                    @if($encargados)
                                    <input class="form-control" type="text" name="padre"
                                        placeholder="Ingrese el nombre del padre"
                                        value="{{ old('padre')??$encargados->padre}}">
                                    @else
                                    <input class="form-control" type="text" name="padre"
                                        placeholder="Ingrese el nombre del padre">
                                    @endif
                                    @if ($errors->has('padre'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('padre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label class="control-label">Ocupacion de la Madre</label>
                                    @if($encargados)
                                    <input class="form-control" type="text" name="ocupacion_padre"
                                        placeholder="Ingrese la ocupación del padre"
                                        value="{{ old('ocupacion_padre')??$encargados->ocupacion_padre}}">
                                    @else
                                    <input class="form-control" type="text" name="ocupacion_padre"
                                        placeholder="Ingrese la ocupación del padre">
                                    @endif
                                    @if ($errors->has('ocupacion_padre'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('ocupacion_padre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="card border-primary mb-3">
                    <div class="card-header text-white bg-primary">Datos de Encargados</div>
                    <div class="card-body ">
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label class="control-label">Nombre de la Madre</label>
                                    @if($encargados)
                                    <input class="form-control" type="text" name="madre"
                                        placeholder="Ingrese el nombre de la madre"
                                        value="{{ old('profesion')??$encargados->madre}}">

                                    @else
                                    <input class="form-control" type="text" name="madre"
                                        placeholder="Ingrese el nombre de la madre">

                                    @endif
                                    @if ($errors->has('madre'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('madre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label class="control-label">Ocupacion de la Madre</label>
                                    @if($encargados)
                                    <input class="form-control" type="text" name="ocupacion_madre"
                                        placeholder="Ingrese la ocupación de la madre"
                                        value="{{ old('ocupacion_madre')??$encargados->ocupacion_madre}}">
                                    @else
                                    <input class="form-control" type="text" name="ocupacion_madre"
                                        placeholder="Ingrese la ocupación de la madre">
                                    @endif
                                    @if ($errors->has('ocupacion_madre'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('ocupacion_madre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label class="control-label">Nombre de la Padre</label>
                                    @if($encargados)
                                    <input class="form-control" type="text" name="padre"
                                        placeholder="Ingrese el nombre del padre"
                                        value="{{ old('padre')??$encargados->padre}}">
                                    @else
                                    <input class="form-control" type="text" name="padre"
                                        placeholder="Ingrese el nombre del padre">
                                    @endif
                                    @if ($errors->has('padre'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('padre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label class="control-label">Ocupacion de la Madre</label>
                                    @if($encargados)
                                    <input class="form-control" type="text" name="ocupacion_padre"
                                        placeholder="Ingrese la ocupación del padre"
                                        value="{{ old('ocupacion_padre')??$encargados->ocupacion_padre}}">
                                    @else
                                    <input class="form-control" type="text" name="ocupacion_padre"
                                        placeholder="Ingrese la ocupación del padre">
                                    @endif
                                    @if ($errors->has('ocupacion_padre'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('ocupacion_padre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-primary mb-3">
                    <div class="card-header text-white bg-primary">Antecedentes</div>
                    <div class="card-body">
                        <p class="text-center font-weight-bolder">Antecedentes Médicos</p>
                        <div class="row">
                            <div class="col">
                                <div class="form-group text-center">
                                    <p>Ha habido un cambio grave en su estado de salud en el último año?</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="saludAnio" value="true"
                                            {{$antecedente_medico->saludAnio ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="saludAnio" value="false"
                                            {{!$antecedente_medico->saludAnio ? 'checked':''}}>NO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group text-center">
                                    <p>Ha tenido alguna vez alguna enfermedad u operación grave?</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="enfermedadOperacion" value="true"
                                            {{$antecedente_medico->enfermedadOperacion ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="enfermedadOperacion" value="false"
                                            {{!$antecedente_medico->enfermedadOperacion ? 'checked':''}}>NO
                                    </label>
                                    <div class="form-group">
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
                                        <input type="radio" name="alergia" value="true"
                                            {{$antecedente_medico->alergia ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="alergia" value="false"
                                            {{!$antecedente_medico->alergia ? 'checked':''}}>NO
                                    </label>
                                    <p>Desmayos</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="desmayo" value="true"
                                            {{$antecedente_medico->desmayo ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="desmayo" value="false"
                                            {{!$antecedente_medico->desmayo ? 'checked':''}}>NO
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group text-center">
                                    <p>Sinusitis</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="sinusitis" value="true"
                                            {{$antecedente_medico->sinusitis ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sinusitis" value="false"
                                            {{!$antecedente_medico->sinusitis ? 'checked':''}}>NO
                                    </label>
                                    <p>Hepatitis</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="hepatitis" value="true"
                                            {{$antecedente_medico->hepatitis ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="hepatitis" value="false"
                                            {{!$antecedente_medico->hepatitis ? 'checked':''}}>NO
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group text-center">
                                    <p>Asma</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="asma" value="true"
                                            {{$antecedente_medico->asma ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="asma" value="false"
                                            {{!$antecedente_medico->asma ? 'checked':''}}>NO
                                    </label>
                                    <p>Artritis</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="artritis" value="true"
                                            {{$antecedente_medico->artritis ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="artritis" value="false"
                                            {{!$antecedente_medico->artritis ? 'checked':''}}>NO
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group text-center">
                                    <p>Diabetes</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="diabetes" value="true"
                                            {{$antecedente_medico->diabetes ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="diabetes" value="false"
                                            {{!$antecedente_medico->diabetes ? 'checked':''}}>NO
                                    </label>
                                    <p>Gastritis</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="gastritis" value="true"
                                            {{$antecedente_medico->gastritis ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gastritis" value="false"
                                            {{!$antecedente_medico->gastritis ? 'checked':''}}>NO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    <p>Transtornos Renales</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="renal" value="true"
                                            {{$antecedente_medico->renal ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="renal" value="false"
                                            {{!$antecedente_medico->renal ? 'checked':''}}>NO
                                    </label>
                                    <p>Enfermedades Venéreas</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="enfermedadVenerea" value="true"
                                            {{$antecedente_medico->enfermedadVenerea ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="enfermedadVenerea" value="false"
                                            {{!$antecedente_medico->enfermedadVenerea ? 'checked':''}}>NO
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    <p>Tuberculosis</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="tuberculosis" value="true"
                                            {{$antecedente_medico->tuberculosis ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="tuberculosis" value="false"
                                            {{!$antecedente_medico->tuberculosis ? 'checked':''}}>NO
                                    </label>
                                    <p>SIDA</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="sida" value="true"
                                            {{$antecedente_medico->sida ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sida" value="false"
                                            {{!$antecedente_medico->sida ? 'checked':''}}>NO
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    <p>Presion Sanguinea Alta</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="presionAlta" value="true"
                                            {{$antecedente_medico->presionAlta ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="presionAlta" value="false"
                                            {{!$antecedente_medico->presionAlta ? 'checked':''}}>NO
                                    </label>
                                    <p>Transtornos de sangre</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="transtornoSangre" value="true"
                                            {{$antecedente_medico->transtornoSangre ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="transtornoSangre" value="false"
                                            {{!$antecedente_medico->transtornoSangre ? 'checked':''}}>NO
                                    </label>
                                    <p>Toma algun medicamento</p>

                                    <label class="radio-inline">
                                        <input type="radio" name="tomaMedicamento" value="true"
                                            {{$antecedente_medico->tomaMedicamento ? 'checked':''}}>SI
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="tomaMedicamento" value="false"
                                            {{!$antecedente_medico->tomaMedicamento ? 'checked':''}}>NO
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
                        <p class="text-center"> La información que he proporcionado es verdadera y me comprometo a
                            reportar
                            cualquier cambio de mi estado de salud y/o uso de medicamentos
                        </p>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nombreEncargado">Nombre:</label>
                                    <input class="form-control" type="text" name="nombreEncargado" id="nombreEncargado">
                                </div>
                            </div>
                            <div class="col" v-if="!enableAge">
                                <div class="form-group">
                                    <label for="documentoUnico">DUI:</label>
                                    <input class="form-control" type="text" name="documentoUnico" id="documentoUnico">
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
                                    <input class="form-control" type="text" name="chequeoDental" id="chequeoDental"
                                    value="{{$antecedente_odontologico->chequeDental }}">
                                </div>
                                <div class="form-group">
                                    <label for="accidente">Ha tenido algún accidente que involucre sus dientes, boca o
                                        cara?</label>
                                    <input class="form-control" type="text" name="accidente" id="accidente"
                                    value="{{$antecedente_odontologico->accidente }}">
                                </div>
                                <div class="form-group">
                                    <label for="habito">Tiene algún hábito que involucre sus dientes o boca?:</label>
                                    <input class="form-control" type="text" name="habito" id="habito"
                                    value="{{$antecedente_odontologico->habito }}">
                                </div>
                            </div>
                        </div>
                        <p class="text-center font-weight-bolder">Antecedentes Ortodoncicos</p>
                        <div class="row">
                            <div class="col">
                                <div class="form-group text-center">
                                    <p>Esta es mi primer visita a un ortodoncista?</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="primerVisita" value="true"
                                        {{$antecedente_ortodoncico->primerVisita ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="primerVisita" value="false"
                                        {{!$antecedente_ortodoncico->primerVisita ? 'checked':''}}>NO
                                    </label>
                                </div>
                                <div class="form-group text-center">
                                    <p>Ya he tenido contacto con otro ortodoncista pero quiero una segunda opinion</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="segundaOpinion" value="true"
                                        {{$antecedente_ortodoncico->segundaOpinion ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="segundaOpinion" value="false"
                                        {{!$antecedente_ortodoncico->segundaOpinion ? 'checked':''}}>NO
                                    </label>
                                </div>
                                <div class="form-group text-center">
                                    <p>Ya tuve anteriormente un tratamiento de ortodoncia</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="tratamientoAnterior" value="true"
                                        {{$antecedente_ortodoncico->tratamientoAnterior ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="tratamientoAnterior" value="false"
                                        {{!$antecedente_ortodoncico->tratamientoAnterior ? 'checked':''}}>NO
                                    </label>
                                </div>
                                <div class="form-group text-center">
                                    <p>Hay otros miembros de su familia que presetan un problema similar?</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="problemaFamiliar" value="true"
                                        {{$antecedente_ortodoncico->problemaFamiliar ? 'checked':''}}>SI
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="problemaFamiliar" value="false"
                                        {{!$antecedente_ortodoncico->problemaFamiliar ? 'checked':''}}>NO
                                    </label>
                                </div>
                                <div class="form-group text-center">
                                    <label for="esperaDeTratamiento">Qué espera del tratamiento de ortodoncia?</label>
                                    <textarea id="esperaDeTratamiento" class="form-control" name="esperaDeTratamiento"
                                        rows="3">{{$antecedente_ortodoncico->esperaDeTratamiento }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-primary mb-3">
                    <div class="card-header text-white bg-primary">Diagnostico</div>
                    <div class="card-body ">                        
                        <div class="form-group ">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group text-center">
                                        <label for="descripcionDiagnostico">Descripcion del Diagnostico</label>
                                        <textarea id="descripcionDiagnostico" class="form-control" name="descripcionDiagnostico"
                                            rows="3">{{$diagnostico_previo->descripcion }}</textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="planDeTratamiento">Plan de tratamiento</label>
                                        <textarea id="planDeTratamiento" class="form-control" name="planDeTratamiento"
                                            rows="3">{{$diagnostico_previo->posible_tratamiento }}</textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="necesidadOdontologica">Descripcion del Diagnostico</label>
                                        <textarea id="necesidadOdontologica" class="form-control" name="necesidadOdontologica"
                                            rows="3">{{$diagnostico_previo->necesidades_odontologicas }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit"><i
                        class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('custom_javas')
<script type="text/javascript" src="{{ asset('js/custom/paciente/Store.js') }}"></script>
@endsection