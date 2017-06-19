@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Conductores</a>
        </div>
        <h1>Conductores</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Listado de conductores registrados</h5>
                    </div>
                    <div class="widget-content">
                        @if (session('notification'))
                            <div class="alert alert-success">
                                <p>{{ session('notification') }}</p>
                            </div>
                        @endif

                        <p>
                            <a href="/drivers/create" class="btn btn-success">
                                <i class="icon-plus"></i> Nuevo conductor
                            </a>
                        </p>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Fecha de nacimiento</th>
                                <th>Brevete</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($drivers as $driver)
                            <tr>
                                <td>{{ $driver->dni }}</td>
                                <td>{{ $driver->phone }}</td>
                                <td>{{ $driver->address }}</td>
                                <td>{{ $driver->birth_date }}</td>
                                <td>{{ $driver->license }}</td>
                                <td>
                                    <a href="/drivers/{{ $driver->id }}/edit" class="btn btn-small btn-primary">
                                        <i class="icon-edit"></i> Editar
                                    </a>
                                    <a href="/drivers/{{ $driver->id }}/delete" class="btn btn-small btn-danger"
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
