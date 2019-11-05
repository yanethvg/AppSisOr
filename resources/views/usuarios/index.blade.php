@extends('layouts.templateHome')

@section('titulo')
Listado de Usuarios
@endsection
@section('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Listado de Usuarios</h1>
<p>Información de los Usuarios</p>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Usuarios</a></li>
@endsection

@section('content')
    <div class="clearfix">
    <div class="col-md-12" >
        <div class="tile"  id="crud" v-cloak>
            <div class="d-flex mb-4">
                <h3 class="tile-title mr-5 p-2">Usuarios</h3>
                <div class="float-right ml-auto p-2">
                    <a class="btn btn-outline-success"  v-on:click.prevent="showCreate" href=""><i
                            class="fa fa-user-plus icon-expe"></i>Registrar Usuario</a>
                </div>
            </div>
            <div class="table-responsive" >
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre Completo</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="usuario in usuarios">
                            <td>@{{ usuario.nombre }}</td>
                            <td>@{{ usuario.usuario }}</td>
                            <td>
                                <span v-if="usuario.email">@{{ usuario.email }}</span>
                                <span v-else>Email no disponible</span>
                            </td>
                            <td>
                                <span v-if="usuario.roles[0]">@{{ usuario.roles[0].name }}</span>
                                <span v-else>Rol No disponible</span>
                            </td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-outline-info mr-2" v-on:click.prevent="showUsuario(usuario)"><i class="fa fa-pencil icon-expe"></i></a>
                                <a class="btn btn-outline-warning mr-2" v-on:click.prevent="toggleUsuario(usuario.id)">
                                    <i v-if='usuario.habilitado' class="fa fa-unlock icon-expe"></i>
                                    <i v-else class="fa fa-lock icon-expe"></i>
                                </a>
                                <a class="btn btn-outline-primary mr-2"><i class="fa fa-eye icon-expe"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav>
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1" class="page-item" >
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
            @include('usuarios.partials.create')
            @include('usuarios.partials.edit')
            @include('usuarios.partials.show')
        </div>

    </div>
</div>



@endsection

@section('custom_javas')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios@0.19.0/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('js/custom/usuario/paginate.js') }}" ></script>
@endsection
