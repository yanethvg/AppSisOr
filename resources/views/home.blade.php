@extends('layouts.templateHome')

@section('titulo')
Home AppSisOr
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Home</h1>
<p>Inicio de Home</p>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                Estas Logueado! {{ Auth::user()->nombre }}
            </div>
        </div>
    </div>
</div>
@endsection