@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Viajes programados</a>
        </div>
        <h1>Viajes programados</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Listado de viajes (a realizarse en las próximas horas y días)</h5>
                    </div>
                    <div class="widget-content">
                        @if (session('notification'))
                            <div class="alert alert-success">
                                <p>{{ session('notification') }}</p>
                            </div>
                        @endif

                        <p>
                            <a href="/travels/create" class="btn btn-success">
                                <i class="icon-plus"></i> Programar nuevo viaje
                            </a>
                        </p>

                        <table class="table table-bordered data-table-travel">
                            <thead>
                            <tr>
                                <th>Ruta a seguir</th>
                                <th>Fecha de partida</th>
                                <th>Hora de partida</th>
                                <th>Tiempo promedio</th>
                                <th>Distancia promedio</th>
                                <th>Transportista</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($travels as $travel)
                            <tr>
                                <td>{{ $travel->route->name }}</td>
                                <td>{{ $travel->departure_date }}</td>
                                <td>{{ $travel->departure_time }}</td>
                                <td>{{ $travel->route->time }} horas</td>
                                <td>{{ $travel->route->distance }} kilómetros</td>
                                <td>{{ $travel->user->name }}</td>
                                <td>{{ $travel->status_text }}</td>
                                <td>
                                    <a href="/travels/{{ $travel->id }}/edit" class="btn btn-small btn-primary">
                                        <i class="icon-edit"></i> Editar
                                    </a>
                                    <a href="/travels/{{ $travel->id }}/delete" class="btn btn-small btn-danger"
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

@section('scripts')
    <script>
        $('.data-table-travel').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "sDom": '<"H"l>t<"F"p>', // f is for filtering (search)
            "bSort" : false
        });
    </script>
@endsection
