@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Matriz de incidencias</a>
        </div>
        <h1>Matriz de incidencias (o denuncias)</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Incidencias reportadas por un camión en un rango de fechas</h5>
                    </div>
                    <div class="widget-content">
                        <form action="" class="form-horizontal">
                            <div class="control-group">
                                <label for="trucks" class="control-label">Camiones</label>
                                <div class="controls">
                                    <select name="user_id" title="Seleccione una ruta" class="span11" id="trucks" required>
                                        <option value=""></option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}" @if($driver->id==old('driver_id')) selected @endif>
                                                Placa {{ $driver->truck->code }} ({{ $driver->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="start-date" class="control-label">Fecha de inicio</label>
                                <div class="controls">
                                    <input type="date" id="start-date" name="start_date" class="span11" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="end-date" class="control-label">Fecha de fin</label>
                                <div class="controls">
                                    <input type="date" id="end-date" name="end_date" class="span11" required>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">
                                Generar matriz de incidencias
                            </button>
                        </form>

                        <table class="table table-bordered data-table-incidences">
                            <thead>
                            <tr>
                                <th>Camión</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
