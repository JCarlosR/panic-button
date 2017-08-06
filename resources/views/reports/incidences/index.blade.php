@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Incidencias</a>
        </div>
        <h1>Incidencias o denuncias</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Listado de denuncias (por presionar el botón de pánico)</h5>
                    </div>
                    <div class="widget-content">
                        @if (session('notification'))
                            <div class="alert alert-success">
                                <p>{{ session('notification') }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered data-table-incidences">
                            <thead>
                            <tr>
                                <th>Camión</th>
                                <th>Conductor</th>
                                <th>DNI</th>
                                <th>Ruta</th>
                                <th>Fecha</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($calls as $call)
                            <tr>
                                @if ($call->user->truck)
                                    <td>{{ $call->user->truck->code }}</td>
                                @else
                                    <td>Sin asignar</td>
                                @endif
                                <td>{{ $call->user->name }}</td>
                                <td>{{ $call->user->dni ?: 'Sin asignar' }}</td>
                                @if ($call->travel)
                                    <td>{{ $call->travel->route->name }}</td>
                                @else
                                    <td>Viaje no encontrado</td>
                                @endif
                                <td>{{ $call->created_at }}</td>
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
        $('.data-table-incidences').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers"
        });
    </script>
@endsection
