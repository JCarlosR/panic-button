@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="/drivers">Conductores</a>
            <a href="#" class="current">Editar</a>
        </div>
        <h1>Modificar conductor</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Editar conductor seleccionado</h5>
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
                                <label class="control-label">Nombre:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Nombre" name="name" value="{{ old('name', $driver->name) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">DNI:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="DNI" name="dni" value="{{ old('dni', $driver->dni) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Teléfono:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Teléfono" name="phone" value="{{ old('phone', $driver->phone) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Dirección:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Dirección" name="address" value="{{ old('address', $driver->address) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Fecha de nacimiento:</label>
                                <div class="controls">
                                    <input type="date" min="1940" class="span11" placeholder="Fecha de nacimiento" name="birth_date" value="{{ old('birth_date', $driver->birth_date) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Brevete:</label>
                                <div class="controls">
                                    <input type="text" class="span11" value="{{ old('license', $driver->license) }}"
                                           placeholder="Brevete" name="license" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">E-mail:</label>
                                <div class="controls">
                                    <input type="email" class="span11" name="email" required value="{{ $driver->email }}" disabled>
                                    <span class="help-block">
                                        POR AHORA el email no es un campo editable.
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Contraseña:</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="password" required value="******" disabled>
                                    <span class="help-block">
                                        SOLO el usuario puede modificar su contraseña vía mail.
                                    </span>
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
