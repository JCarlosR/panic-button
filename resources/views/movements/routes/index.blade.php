@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Rutas</a>
        </div>
        <h1>Rutas</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Listado de rutas (movimientos de una estación a otra)</h5>
                    </div>
                    <div class="widget-content">
                        @if (session('notification'))
                            <div class="alert alert-success">
                                <p>{{ session('notification') }}</p>
                            </div>
                        @endif

                        <p>
                            <a href="/routes/create" class="btn btn-success">
                                <i class="icon-plus"></i> Nueva ruta
                            </a>
                        </p>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Desde</th>
                                <th>Hasta</th>
                                <th>Nombre</th>
                                <th>Tiempo promedio</th>
                                <th>Distancia promedio</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($routes as $route)
                            <tr>
                                <td>{{ $route->from->name }}</td>
                                <td>{{ $route->to->name }}</td>
                                <td>{{ $route->name }}</td>
                                <td>{{ $route->time }} horas</td>
                                <td>{{ $route->distance }} kilómetros</td>
                                <td>
                                    <a href="/routes/{{ $route->id }}/edit" class="btn btn-small btn-primary">
                                        <i class="icon-edit"></i> Editar
                                    </a>
                                    <a href="/routes/{{ $route->id }}/delete" class="btn btn-small btn-danger"
                                    onclick="return confirm('¿Está seguro que desea eliminar este registro?');">
                                        <i class="icon-remove"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
