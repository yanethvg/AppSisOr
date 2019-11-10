@extends('layouts.templateHome')

@section('titulo')
Listado de Expedientes
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Listado de Expedientes</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('pacientes.index')}}">Pacientes</a></li>
@endsection
@section('content')
    <div class="clearfix"></div>
    <div class="col-md-12">
        <div class="tile"  id="crud" v-cloak>
            <div class="d-flex mb-2">

                <div class="float-right ml-auto ">
                    <a class="btn btn-outline-success" href="{{route('pacientes.create')}}"><i
                            class="fa fa-user-plus icon-expe"></i>Crear</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Nombre Completo</th>
                            <th>Fecha Nacimiento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="paciente in pacientes">
                            <td>@{{paciente.nombre}}</td>
                            <td>@{{paciente.fecha_nacimiento}}</td>
                            <td class="d-flex justify-content-center">
                            <a class="btn btn-outline-primary mr-2" href="/pacientes/@{{paciente.id}}/edit"><i class="fa fa-eye icon-expe"></i></button>
                                    <a class="btn btn-outline-danger mr-2"><i class="fa fa-trash icon-expe"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav>
                <ul class="pagination d-flex justify-content-center ">
                    <li v-if="pagination.current_page > 1" class="page-item " >
                        <a class='page-link' href="#" @click.prevent="changePage(pagination.current_page - 1)">
                            <span>Atras</span>
                        </a>
                    </li>

                    <li class='page-item' v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                        <a  class='page-link' href="#" @click.prevent="changePage(page)">
                            @{{ page }}
                        </a>
                    </li>

                    <li v-if="pagination.current_page < pagination.last_page">
                        <a class='page-link' href="#" @click.prevent="changePage(pagination.current_page + 1)">
                            <span>Siguiente</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
@section('custom_javas')
<script src="{{ asset('js/custom/paciente/paginate.js') }}" ></script>
@endsection
