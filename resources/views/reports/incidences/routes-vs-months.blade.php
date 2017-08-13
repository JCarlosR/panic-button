@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Matriz de Rutas VS Meses</a>
        </div>
        <h1>Matriz de incidencias (Rutas vs Meses)</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Incidencias reportadas en cada ruta por cada mes según un camión específico</h5>
                    </div>
                    <div class="widget-content">
                        <form action="" class="form-horizontal">
                            <div class="control-group">
                                <label for="trucks" class="control-label">Camiones</label>
                                <div class="controls">
                                    <select name="user_id" title="Seleccione una ruta" class="span11" id="trucks" required>
                                        <option value=""></option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}" @if($driver->id==$user_id) selected @endif>
                                                Placa {{ $driver->truck->code }} ({{ $driver->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">
                                Generar matriz de Rutas VS Meses
                            </button>
                        </form>

                        @if (isset($user_id))
                        <table class="table table-bordered data-table-incidences">
                            <thead>
                            <tr>
                                <th>Ruta</th>
                                <th>Ene</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Abr</th>
                                <th>May</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Ago</th>
                                <th>Set</th>
                                <th>Oct</th>
                                <th>Nov</th>
                                <th>Dic</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($routes as $route)
                            <tr>
                                <td>{{ $route->name }}</td>
                                @for ($i=1; $i<=12; ++$i)
                                    <td>{{ (clone $query)->whereMonth('created_at', $i)->whereIn('travel_id', $route->travelIds)->count() }}</td>
                                @endfor
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
