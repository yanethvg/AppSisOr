@extends('layouts.templateHome')

@section('titulo')
Home AppSisOr
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Home</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="alert alert-info">
    <strong>Bienvenido al Sistema de la Clinica </strong>Indicaciones para {{ Auth::user()->nombre }}
</div>
<div class="tile">
    <div class="tile-body">
            <div class="card-group">
                    <div class="card">
                      <img src="{{ asset('img/user.png')}}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Permisos</h5>
                        <p class="card-text">Permisos Asignados a {{ Auth::user()->nombre}}</p>
                        <ul>
                            <li>Permiso 1</li>
                            <li>Permiso 2</li>
                        </ul>
                      </div>
                    </div>
                    <div class="card">
                      <img src="{{ asset('img/diente.png')}} " class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Clinica Ortodoncia S.A de C.V</h5>
                        <p class="card-text">Bienvenido a su portal&nbsp;</p>
                      </div>

                    </div>
                    <div class="card">
                      <img src="{{ asset('img/expediente.png')}} " class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Objetivo del Sistema</h5>
                        <p class="card-text">Nuestro Sistema  SisAppOr Espera ayudar con la administración desde guardar los datos del paciente</p>
                      </div>

                    </div>
                  </div>
    </div>
</div>
@endsection
