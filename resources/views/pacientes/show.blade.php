@extends('layouts.templateHome')

@section('titulo')
Ver Expediente
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Ver Expediente</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('pacientes.index')}}">Pacientes</a></li>
@endsection


@section('content')
<div class="tile-body">
        <div class="tile">
            <div class="tile-body">
                Hola
            </div>
        </div>
</div>
@endsection
@section('custom_javas')

@endsection
