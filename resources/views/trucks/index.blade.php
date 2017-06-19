@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Camiones</a>
        </div>
        <h1>Camiones</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                {{--<div class="widget-box">--}}
                    {{--<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>--}}
                        {{--<h5>Static table</h5>--}}
                    {{--</div>--}}
                    {{--<div class="widget-content nopadding">--}}
                        {{--<table class="table table-bordered table-striped">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>Rendering engine</th>--}}
                                {{--<th>Browser</th>--}}
                                {{--<th>Platform(s)</th>--}}
                                {{--<th>Engine version</th>--}}
                                {{--<th>CSS grade</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--<tr class="odd gradeX">--}}
                                {{--<td>Trident</td>--}}
                                {{--<td>Internet--}}
                                    {{--Explorer 4.0</td>--}}
                                {{--<td>Win 95+</td>--}}
                                {{--<td class="center"> 4</td>--}}
                                {{--<td class="center">X</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Listado de camiones registrados</h5>
                    </div>
                    <div class="widget-content">
                        @if (session('notification'))
                            <div class="alert alert-success">
                                <p>{{ session('notification') }}</p>
                            </div>
                        @endif

                        <p>
                            <a href="/trucks/create" class="btn btn-success">
                                <i class="icon-plus"></i> Nuevo camión
                            </a>
                        </p>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th># Placa</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Año</th>
                                <th>Capacidad carga</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($trucks as $truck)
                            <tr>
                                <td>{{ $truck->code }}</td>{{-- RIH-166 --}}
                                <td>{{ $truck->brand }}</td>{{-- Toyota --}}
                                <td>{{ $truck->model }}</td>{{-- PlatJac1 --}}
                                <td>{{ $truck->year }}</td>{{-- 2015 --}}
                                <td>{{ $truck->capacity }} Toneladas</td>
                                <td>
                                    <a href="/trucks/{{ $truck->id }}/edit" class="btn btn-small btn-primary">
                                        <i class="icon-edit"></i> Editar
                                    </a>
                                    <a href="/trucks/{{ $truck->id }}/delete" class="btn btn-small btn-danger"
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
