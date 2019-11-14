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
                    <form  method="POST" action="{{ route('pacientes.update',$paciente->id) }}">
                    <input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Seguridad Otorgada por blade -->
                    <div class="card border-primary mb-3">
                            <div class="card-header text-white bg-primary">Datos Personales</div>
                            <div class="card-body ">
                                    <div class="form-group">
                                            <label class="control-label">Nombre Completo</label>
                                            <input class="form-control" type="text" name="nombre"  value="{{ old('nombre')??$paciente->nombre}}">

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Dirección</label>
                                            <textarea class="form-control
                                            " rows="4" name="direccion">{{ old('direccion')??$paciente->direccion}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Telefono</label>
                                            <div class="row" id="telefono">
                                                @if(count($telefonos) == 1)
                                                <div class="col-lg-4  col-md-12 d-flex">
                                                    <input class="form-control mr-2" type="text" name="telefono[]" value="{{ old('$telefonos[0]->telefono')??$telefonos[0]->telefono}}" >
                                                </div>
                                                <div class="col-lg-4  col-md-12 d-flex">
                                                        <input class="form-control mr-2" type="text" name="telefono[]"  >
                                                </div>
                                                <div class="col-lg-4  col-md-12 d-flex">
                                                        <input class="form-control mr-2" type="text" name="telefono[]"  >
                                                </div>
                                                @elseif(count($telefonos) == 2)
                                                <div class="col-lg-4  col-md-12 d-flex">
                                                        <input class="form-control mr-2" type="text" name="telefono[]" value="{{ old('$telefonos[0]->telefono')??$telefonos[0]->telefono}}" >
                                                </div>
                                                <div class="col-lg-4  col-md-12 d-flex">
                                                        <input class="form-control mr-2" type="text" name="telefono[]" value="{{ old('$telefonos[1]->telefono')??$telefonos[1]->telefono}}" >
                                                </div>
                                                <div class="col-lg-4  col-md-12 d-flex">
                                                        <input class="form-control mr-2" type="text" name="telefono[]"  >
                                                </div>
                                                @else
                                                <div class="col-lg-4  col-md-12 d-flex">
                                                        <input class="form-control mr-2" type="text" name="telefono[]" value="{{ old('$telefonos[0]->telefono')??$telefonos[0]->telefono}}" >
                                                </div>
                                                <div class="col-lg-4  col-md-12 d-flex">
                                                        <input class="form-control mr-2" type="text" name="telefono[]" value="{{ old('$telefonos[1]->telefono')??$telefonos[1]->telefono}}" >
                                                </div>
                                                <div class="col-lg-4  col-md-12 d-flex">
                                                        <input class="form-control mr-2" type="text" name="telefono[]" value="{{ old('$telefonos[2]->telefono')??$telefonos[2]->telefono}}" >
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                    <div class="form-group" id="validacionFecha">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="control-label">Fecha de Nacimiento</label>
                                                <input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento')??$paciente->fecha_nacimiento}}">
                                            </div>
                                            <div class="col-6">
                                                <label class="control-label">Edad</label>
                                                <input class="form-control" type="text" disabled="disabled" id="edad"  value="{{ old('edad')??$edad}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Padecimiento</label>
                                        <textarea class="form-control
                                        " rows="4" name="padecimiento" placeholder="Ingrese Padecimiento">{{ old('padecimiento')??$paciente->padecimiento}}</textarea>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Recomendación</label>
                                        <input class="form-control" type="text" name="recomendacion" placeholder="Ingrese Recomendación"  value="{{ old('recomendacion')??$paciente->recomendacion}}">
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
                                                <input class="form-control" type="text" name="nombre_institucion" placeholder="Ingrese Nombre de Institución"  value="{{ old('$estudia->nombre')??$estudia->nombre}}">
                                                @else
                                                <input class="form-control" type="text" name="nombre_institucion" placeholder="Ingrese Nombre de Institución" >
                                                 @endif

                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Grado</label>
                                                @if($estudia)
                                                <input class="form-control" type="text" name="grado" placeholder="Ingrese el Grado Academico" value="{{ old('$estudia->grado')??$estudia->grado}}">
                                                @else
                                                <input class="form-control" type="text" name="grado" placeholder="Ingrese el Grado Academico">
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Carrera</label>
                                                @if($estudia)
                                                <input class="form-control" type="text" name="carrera" placeholder="Ingrese la carrera"  value="{{ old('$estudia->carrera')??$estudia->carrera}}">
                                                 @else
                                                 <input class="form-control" type="text" name="carrera" placeholder="Ingrese la carrera" >
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
                                            " rows="4" name="direccion_trabajo" placeholder="Ingrese la Dirección de Trabajo">{{ old('direccion_trabajo')??$paciente->direccion_trabajo}}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Profesión</label>
                                            <input class="form-control" type="text" name="profesion" placeholder="Ingrese la Profesión"  value="{{ old('profesion')??$paciente->profesion}}">

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
                                                    <input class="form-control"type="text" name="madre" placeholder="Ingrese el nombre de la madre" value="{{ old('profesion')??$encargados->madre}}">
                                                    @else
                                                    <input class="form-control"type="text" name="madre" placeholder="Ingrese el nombre de la madre" >
                                                    @endif

                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                        <label class="control-label">Ocupacion de la Madre</label>
                                                        @if($encargados)
                                                        <input class="form-control"type="text" name="ocupacion_madre" placeholder="Ingrese la ocupación de la madre"  value="{{ old('ocupacion_madre')??$encargados->ocupacion_madre}}">
                                                        @else
                                                        <input class="form-control"type="text" name="ocupacion_madre" placeholder="Ingrese la ocupación de la madre" >
                                                        @endif

                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group ">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <label class="control-label">Nombre de la Padre</label>
                                                    @if($encargados)
                                                    <input class="form-control"type="text" name="padre" placeholder="Ingrese el nombre del padre" value="{{ old('padre')??$encargados->padre}}">
                                                    @else
                                                    <input class="form-control"type="text" name="padre" placeholder="Ingrese el nombre del padre" >
                                                    @endif

                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                        <label class="control-label">Ocupacion de la Madre</label>
                                                        @if($encargados)
                                                        <input class="form-control"type="text" name="ocupacion_padre" placeholder="Ingrese la ocupación del padre" value="{{ old('ocupacion_padre')??$encargados->ocupacion_padre}}" >
                                                        @else
                                                        <input class="form-control"type="text" name="ocupacion_padre" placeholder="Ingrese la ocupación del padre" >
                                                        @endif

                                                </div>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    @endif
                <button class="btn btn-primary btn-block" type="submit"><i  class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;</button>
            </form>
            </div>
        </div>
    </div>
@endsection
@section('custom_javas')
<script type="text/javascript" src="{{ asset('js/custom/paciente/Store.js') }}"></script>
@endsection

