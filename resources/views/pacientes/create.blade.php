@extends('layouts.templateHome')

@section('titulo')
Crear Expediente
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Crear Expediente</h1>
<p>Creación de Expediente para paciente</p>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('pacientes.index')}}">Pacientes</a></li>
<li class="breadcrumb-item"><a href="{{route('pacientes.create')}}">Crear Expediente</a></li>
@endsection

@section('content')
<div class="tile-body">
    @include('pacientes.partials.crear')
</div>
@endsection

@section('custom_javas')
<script type="text/javascript" src="{{ asset('js/custom/telefono.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom/fecha-nacimiento.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom/estudia.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom/trabaja.js') }}"></script>
@endsection