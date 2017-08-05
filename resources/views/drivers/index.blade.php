@extends('layouts.app')

@section('styles')
    <style>
        .select2-drop {
            z-index: 99999;
        }
    </style>
@endsection

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
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Fecha de nacimiento</th>
                                <th>Brevete</th>
                                <th>Camión</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($drivers as $driver)
                            <tr>
                                <td>{{ $driver->dni }}</td>
                                <td>{{ $driver->name }}</td>
                                <td>{{ $driver->phone }}</td>
                                <td>{{ $driver->address }}</td>
                                <td>{{ $driver->birth_date }}</td>
                                <td>{{ $driver->license }}</td>
                                <td>
                                    @if ($driver->truck)
                                        {{ $driver->truck->code }}
                                    @else
                                        Sin asignar
                                    @endif
                                </td>
                                <td>
                                    <a href="/drivers/{{ $driver->id }}/edit" class="btn btn-small btn-primary">
                                        <i class="icon-edit"></i> Editar
                                    </a>
                                    <a href="#setDriver{{ $driver->id }}" data-toggle="modal" class="btn btn-small btn-info">
                                        <i class="icon-magic"></i> Asignar
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

    @foreach ($drivers as $driver)
    <div id="setDriver{{ $driver->id }}" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Asignar camión</h3>
        </div>

        <div class="modal-body">
            <form action="/drivers/truck" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                @if ($driver->truck)
                    <p>Esta es la placa del camión asignado actualmente al transportista: {{ $driver->truck->code }}</p>
                @else
                    <p>Actualmente este transportista no tiene asignado ningún camión.</p>
                @endif
                <div class="control-group">
                    <label for="truck-id" class="control-label">Seleccione un camión del listado:</label>
                    <div class="controls">
                        <select name="truck_id" id="truck-id" required>
                            <option value=""></option>
                            @foreach ($trucks as $truck)
                                <option value="{{ $truck->id }}">Placa {{ $truck->code }} (Modelo {{ $truck->model }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    <a data-dismiss="modal" class="btn" href="#">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection
