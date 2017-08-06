@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Reporte de viajes</a>
        </div>
        <h1>Viajes realizados</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Listado de viajes</h5>
                    </div>
                    <div class="widget-content">
                        @if (session('notification'))
                            <div class="alert alert-success">
                                <p>{{ session('notification') }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered data-table-travels">
                            <thead>
                            <tr>
                                <th># Viaje</th>
                                <th>Conductor</th>
                                <th>Camión</th>
                                <th>Ruta a seguir</th>
                                <th>Distancia total</th>
                                <th>Distancia real</th>
                                <th>Tiempo total</th>
                                <th>Tiempo real</th>
                                {{--<th>Fecha de partida</th>--}}
                                {{--<th>Hora de partida</th>--}}
                                <th>Margen distancia</th>
                                <th>Margen tiempo</th>
                                <th>Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($travels as $travel)
                                <tr>
                                    <td>{{ $travel->id }}</td>
                                    <td>{{ $travel->user->name }}</td>
                                    <td>{{ $travel->user->truck ? $travel->user->truck->code : 'Sin asignar' }}</td>
                                    <td>{{ $travel->route->name }}</td>
                                    <td>{{ $travel->route->distance }} km</td>
                                    <td>{{ $travel->real_distance }} km</td>
                                    <td>{{ $travel->route->time }} h ({{ $travel->route->time *60 }} min)</td>
                                    <td>{{ $travel->time }} min</td>
                                    {{--<td>{{ $travel->departure_date }}</td>--}}
                                    {{--<td>{{ $travel->departure_time }}</td>--}}
                                    <td>{{ $travel->distance_margin }} %</td>
                                    <td>{{ $travel->time_margin }} %</td>
                                    <td>
                                        <span class="label label-{{ $travel->status_margin }}">
                                            {{ $travel->status_margin }}
                                        </span>
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

@section('scripts')
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
    <script>
        $('.data-table-travels').DataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            dom: 'B<"clearfix">lfrtip',
            "oLanguage": {
                "sSearch": "<span>Filtro:</span> _INPUT_" //search
            },
            buttons: ['print']
        });
    </script>
@endsection
