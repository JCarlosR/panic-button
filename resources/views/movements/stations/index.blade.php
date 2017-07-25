@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Estaciones</a>
        </div>
        <h1>Estaciones</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Listado de estaciones (puntos de partida y puntos de llegada)</h5>
                    </div>
                    <div class="widget-content">
                        @if (session('notification'))
                            <div class="alert alert-success">
                                <p>{{ session('notification') }}</p>
                            </div>
                        @endif

                        <p>
                            <a href="/stations/create" class="btn btn-success">
                                <i class="icon-plus"></i> Nueva estación
                            </a>
                        </p>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Descripción</th>
                                {{--<th>Mapa</th>--}}
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($stations as $station)
                            <tr>
                                <td>{{ $station->name }}</td>
                                <td>{{ $station->address }}</td>
                                <td>{{ $station->phone }}</td>
                                <td>{{ $station->description }}</td>
                                <td>
                                    <a href="/stations/{{ $station->id }}/edit" class="btn btn-small btn-primary">
                                        <i class="icon-edit"></i> Editar
                                    </a>
                                    <a href="/stations/{{ $station->id }}/delete" class="btn btn-small btn-danger"
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
