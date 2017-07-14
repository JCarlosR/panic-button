@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="/receivers">Destinatarios</a>
            <a href="#" class="current">Editar</a>
        </div>
        <h1>Modificar destinatario</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Editar destinatario seleccionado</h5>
                    </div>
                    <div class="widget-content">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="control-group">
                                <label class="control-label">Nombres:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Nombres" name="name" value="{{ old('name', $receiver->name) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Apellidos:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Apellidos" name="last_name" value="{{ old('last_name', $receiver->last_name) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">DNI:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="DNI" name="dni" value="{{ old('dni', $receiver->dni) }}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Rol:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Rol" name="role" value="{{ old('role', $receiver->role) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Descripción:</label>
                                <div class="controls">
                                    <textarea class="span11" name="description" id="description"
                                              placeholder="¿Qué procesos llevará a cabo?">{{ old('description', $receiver->description) }}</textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Celular:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Teléfono celular (recibirá notificación SMS)"
                                           name="cellphone" value="{{ old('cellphone', $receiver->cellphone) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">E-mail:</label>
                                <div class="controls">
                                    <input type="email" class="span11" name="email"
                                           placeholder="Email (recibirá notificación por correo)" value="{{ old('email', $receiver->email) }}">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
