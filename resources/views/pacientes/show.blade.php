@extends('layouts.templateHome')

@section('titulo')
Ver Expediente
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Ver Expediente</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('pacientes.index')}}">Pacientes</a></li>
<li class="breadcrumb-item"><a href="{{ route('pacientes.show', ['id'=> old('id')??$paciente->id]) }}">Mostrar Paciente</a></li>
@endsection


@section('content')
<div class="tile-body">
        <div class="row user">

                <div class="col-md-3">
                  <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                      <li class="nav-item"><a class="nav-link active" href="#detalle-expediente" data-toggle="tab">Detalle Expediente</a></li>
                      <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Citas</a></li>
                      <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Pagos</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="tab-content">
                    <div class="tab-pane active" id="detalle-expediente">
                      <div class="timeline-post">
                          <h3 class="mb-3 text-primary">Información Personal</h3>
                          <p><strong>Nombre Completo:</strong> <span>{{ old('nombre')??$paciente->nombre}}</span></p>
                          <p><strong>Dirección Residencial:</strong> {{ old('direccion')??$paciente->direccion}}</p>
                          <p><strong>Edad:</strong> {{ old('edad')??$edad}}</p>
                          <p><strong>Telefonos:</strong>
                            @foreach($telefonos as $telefono)
                            <ul>
                              <li>{{$telefono->telefono}}</li>
                            </ul>
                            @endforeach
                            </p>
                            <p><strong>Fecha de Nacimiento:</strong> <span>{{ old('fecha_nacimiento')??$paciente->fecha_nacimiento}}</span></p>
                            <p><strong>Recomendación:</strong>
                                @if($paciente->recomendacion)
                                <span>{{ old('recomendacion')??$paciente->recomendacion}}</span>
                                @else
                                <span>No tiene recomendación</span>
                                @endif
                            </p>
                        </div>
                        @if($paciente->direccion_trabajo)
                        <div class="timeline-post">
                                <h3 class="mb-3 text-primary">Información Laboral</h3>
                                <p><strong>Dirección:</strong> <span>{{ old('direccion_trabajo')??$paciente->direccion_trabajo}}</span></p>
                                <p><strong>Profesión:</strong> {{ old('profesion')??$paciente->profesion}}</p>
                        </div>
                        @endif
                        @if($edad<18)
                        <div class="timeline-post">
                            <h3 class="mb-3 text-primary">Información de Menores de Edad</h3>
                            @if($encargados->madre)
                            <p><strong>Nombre de la Madre:</strong> <span>{{ old('madre')??$encargados->madre}}</span></p>
                            <p><strong>Ocupacion de la Madre:</strong> <span>{{ old('ocupacion_madre')??$encargados->ocupacion_madre}}</span></p>
                            @endif
                            @if($encargados->padre)
                            <p><strong>Nombre del Padre:</strong> <span>{{ old('padre')??$encargados->padre}}</span></p>
                            <p><strong>Ocupacion del Padre:</strong> <span>{{ old('ocupacion_padre')??$encargados->ocupacion_padre}}</span></p>
                            @endif
                        </div>
                        @endif
                        @if(!is_null($estudia))
                        <div class="timeline-post">
                            <h3 class="mb-3 text-primary">Información Escolar</h3>
                            <p><strong>Nombre de la Institución:</strong> <span>{{ old('nombre')??$estudia->nombre}}</span></p>
                            <p><strong>Grado que cursa:</strong> <span>{{ old('grado')??$estudia->grado}}</span></p>
                            @if($paciente->carrera)
                            <p><strong>Carrera:</strong> {{ old('carrera')??$paciente->carrera}}</p>
                            @endif
                        </div>
                        @endif

                    </div>
                    <div class="tab-pane fade" id="user-settings">
                      <div class="tile user-settings">
                        <h4 class="line-head">Settings</h4>
                        <form>
                          <div class="row mb-4">
                            <div class="col-md-4">
                              <label>First Name</label>
                              <input class="form-control" type="text">
                            </div>
                            <div class="col-md-4">
                              <label>Last Name</label>
                              <input class="form-control" type="text">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-8 mb-4">
                              <label>Email</label>
                              <input class="form-control" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-8 mb-4">
                              <label>Mobile No</label>
                              <input class="form-control" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-8 mb-4">
                              <label>Office Phone</label>
                              <input class="form-control" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-8 mb-4">
                              <label>Home Phone</label>
                              <input class="form-control" type="text">
                            </div>
                          </div>
                          <div class="row mb-10">
                            <div class="col-md-12">
                              <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
</div>
@endsection
@section('custom_javas')

@endsection
