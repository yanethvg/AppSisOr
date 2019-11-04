@extends('layouts.templateHome')

@section('titulo')
Listado de Expedientes
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Listado de Expedientes</h1>
<p>Información de los Pacientes</p>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('pacientes.index')}}">Pacientes</a></li>
@endsection

@section('content')
    <div class="clearfix"></div>
    <div class="col-md-12">
        <div class="tile">
            <div class="d-flex mb-4">
                <h3 class="tile-title mr-5 p-2">Expedientes</h3>
                <div class="float-right ml-auto p-2">
                    <a class="btn btn-outline-success" href="{{route('pacientes.create')}}"><i
                            class="fa fa-user-plus icon-expe"></i>Crear Expediente</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre Completo</th>
                            <th>Fecha Nacimiento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-outline-info mr-2"><i class="fa fa-pencil icon-expe"></i></button>
                                    <a class="btn btn-outline-danger mr-2"><i class="fa fa-trash icon-expe"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection