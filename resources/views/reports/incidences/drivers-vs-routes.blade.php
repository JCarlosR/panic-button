@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Camiones VS Rutas</a>
        </div>
        <h1>Matriz de Camiones VS Rutas</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Incidencias reportadas por los camiones en cada ruta segun mes</h5>
                    </div>
                    <div class="widget-content">
                        <form action="" class="form-horizontal">
                            <div class="control-group">
                                <label for="year" class="control-label">Año</label>
                                <div class="controls">
                                    <select name="year" id="year">
                                        <option value="">Seleccione año</option>
                                        <option value="2016" @if($year==2016) selected @endif>2016</option>
                                        <option value="2017" @if($year==2017) selected @endif>2017</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="month" class="control-label">Mes</label>
                                <div class="controls">
                                    <select name="month" id="month">
                                        <option value="">Seleccione mes</option>
                                        <option value="0" @if($month==0) selected @endif>Enero</option>
                                        <option value="1" @if($month==1) selected @endif>Febrero</option>
                                        <option value="2" @if($month==2) selected @endif>Marzo</option>
                                        <option value="3" @if($month==3) selected @endif>Abril</option>
                                        <option value="4" @if($month==4) selected @endif>Mayo</option>
                                        <option value="5" @if($month==5) selected @endif>Junio</option>
                                        <option value="6" @if($month==6) selected @endif>Julio</option>
                                        <option value="7" @if($month==7) selected @endif>Agosto</option>
                                        <option value="8" @if($month==8) selected @endif>Setiembre</option>
                                        <option value="9" @if($month==9) selected @endif>Octubre</option>
                                        <option value="10" @if($month==10) selected @endif>Noviembre</option>
                                        <option value="11" @if($month==11) selected @endif>Diciembre</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">
                                Generar matriz Camiones VS Rutas
                            </button>
                        </form>

                        @if (isset($year) && isset($month))
                        <table class="table table-bordered data-table-incidences">
                            <thead>
                            <tr>
                                <th>C \ R</th>
                                @foreach ($routes as $route)
                                    <th>{{ $route->name }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($drivers as $driver)
                            <tr>
                                <td>{{ $driver->truck->code }}</td>
                                @foreach ($routes as $route)
                                    <th>
                                        {{ $query->where('user_id', $driver->id)->whereIn('travel_id', $route->travelIds)->count() }}
                                    </th>
                                @endforeach
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
