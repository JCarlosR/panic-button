@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Destinatarios</a>
        </div>
        <h1>Destinatarios</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Listado de destinatarios (que serán notificados por el botón de pánico)</h5>
                    </div>
                    <div class="widget-content">
                        @if (session('notification'))
                            <div class="alert alert-success">
                                <p>{{ session('notification') }}</p>
                            </div>
                        @endif

                        <p>
                            <a href="/receivers/create" class="btn btn-success">
                                <i class="icon-plus"></i> Nuevo destinatario
                            </a>
                        </p>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($receivers as $receiver)
                            <tr>
                                <td>{{ $receiver->full_name }}</td>
                                <td>{{ $receiver->dni }}</td>
                                <td>{{ $receiver->role }}</td>
                                <td>
                                    {{ $receiver->status ? 'Activo' : 'Inactivo' }}
                                </td>
                                <td>{{ $receiver->cellphone }}</td>
                                <td>{{ $receiver->email }}</td>
                                <td>
                                    <a href="/receivers/{{ $receiver->id }}/edit" class="btn btn-small btn-primary">
                                        <i class="icon-edit"></i> Editar
                                    </a>
                                    <a href="/receivers/{{ $receiver->id }}/turn" data-toggle="modal" class="btn btn-small btn-default">
                                        <i class="icon-magic"></i> {{ $receiver->status ? 'Desactivar' : 'Activar' }}
                                    </a>
                                    <a href="/receivers/{{ $receiver->id }}/delete" class="btn btn-small btn-danger"
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
