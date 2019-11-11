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
                    <form>
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
                                                <div class="col-lg-4  col-md-12 d-flex">
                                                    <input class="form-control mr-2" type="text" name="telefono[]" >
                                                    <a  class="btn btn-outline-info mr-2"><i class="fa fa-plus icon-expe "></i></a>
                                                </div>
                                                <div  class="col-lg-4 col-md-12 d-flex ">
                                                    <input class="form-control mr-2" type="text" name="telefono[]" >
                                                    <a class="btn btn-outline-danger mr-2 " id="telAuxFirst" v-on:click.prevent='borrarTelefono($event)' ><i class="fa fa-trash icon-expe " ></i></a>
                                                </div>
                                                <div  class="col-lg-4 col-md-12 d-flex ">
                                                    <input class="form-control mr-2" type="text" name="telefono[]" >
                                                    <a class="btn btn-outline-danger mr-2 " id="telAuxSecond" v-on:click.prevent='borrarTelefono($event)' ><i class="fa fa-trash icon-expe " ></i></a>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group" id="validacionFecha">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="control-label">Fecha de Nacimiento</label>
                                                <input class="form-control" type="date" name="fecha_nacimiento" id="fecha-nacimiento" value="{{ old('fecha_nacimiento')??$paciente->fecha_nacimiento}}">
                                            </div>
                                            <div class="col-6">
                                                <label class="control-label">Edad</label>
                                                <input class="form-control" type="text" disabled="disabled" id="edad" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Recomendacion</label>
                                            <input class="form-control" type="text" name="recomendacion" placeholder="Ingrese Nombre de la Recomendacion" value="{{ old('recomendacion')??$paciente->recomendacion}}">
                                        </div>
                            </div>
                        </div>
                    <div class="card border-primary mb-3">
                            <div class="card-header text-white bg-primary">Datos Estudiantiles</div>
                            <div class="card-body ">
                                    <div id="datos_estudiantiles">
                                            <div class="form-group">
                                                <label class="control-label">Nombre de Institución</label>
                                                <input class="form-control" type="text" name="nombre-institucion" placeholder="Ingrese Nombre de Institución" >
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Grado</label>
                                                <input class="form-control" type="text" name="grado" placeholder="Ingrese el Grado Academico" >
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Carrera</label>
                                                <input class="form-control" type="text" name="carrera" placeholder="Ingrese la carrera">
                                            </div>
                                            </div>
                            </div>
                    </div>
                    <div class="card border-primary mb-3">
                        <div class="card-header text-white bg-primary">Datos Laborales</div>
                        <div class="card-body ">
                                <div id="datos_trabajo">
                                        <div class="form-group">
                                            <label class="control-label">Dirección de Trabajo</label>
                                            <textarea class="form-control
                                            " rows="4" name="direccion">{{ old('direccion_trabajo')??$paciente->direccion_trabajo}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Profesión</label>
                                            <input class="form-control" type="text" name="profesion" placeholder="Ingrese la Profesión"  value="{{ old('profesion')??$paciente->profesion}}">
                                        </div>
                                </div>
                        </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit"><i  class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;</button>
            </form>
            </div>
        </div>
    </div>
@endsection
@section('custom_javas')

@endsection

