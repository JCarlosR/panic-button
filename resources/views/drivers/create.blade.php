@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="/drivers">Conductores</a>
            <a href="#" class="current">Nuevo</a>
        </div>
        <h1>Nuevo conductor</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Registrar nuevo conductor</h5>
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

                        <form action="/drivers" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="control-group">
                                <label class="control-label">Nombre:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Nombre" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">DNI:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="DNI" name="dni" value="{{ old('dni') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Teléfono:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Teléfono" name="phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Dirección:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Dirección" name="address" value="{{ old('address') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Fecha de nacimiento:</label>
                                <div class="controls">
                                    <input type="date" min="1940" class="span11" placeholder="Fecha de nacimiento" name="birth_date" value="{{ old('birth_date') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Brevete:</label>
                                <div class="controls">
                                    <input type="text" class="span11" value="{{ old('license') }}"
                                           placeholder="Brevete" name="license" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">E-mail:</label>
                                <div class="controls">
                                    <input type="email" class="span11" name="email" required value="{{ old('email') }}">
                                    <span class="help-block">
                                        Es un campo obligatorio para que pueda recibir notificaciones, y recuperar su acceso en caso de ser necesario.
                                    </span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Contraseña:</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="password" required>
                                    <span class="help-block">
                                        Esta contraseña lo asigna la administración.
                                        El usuario podrá cambiar su contraseña posteriormente vía mail.
                                    </span>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="row-fluid">--}}
            {{--<div class="span6">--}}
                {{--<div class="widget-box">--}}
                    {{--<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>--}}
                        {{--<h5>Selects, radios and checkboxes</h5>--}}
                    {{--</div>--}}
                    {{--<div class="widget-content nopadding">--}}
                        {{--<form action="#" method="get" class="form-horizontal">--}}
                            {{--<div class="control-group">--}}
                                {{--<label class="control-label">Select input</label>--}}
                                {{--<div class="controls">--}}
                                    {{--<select >--}}
                                        {{--<option>First option</option>--}}
                                        {{--<option>Second option</option>--}}
                                        {{--<option>Third option</option>--}}
                                        {{--<option>Fourth option</option>--}}
                                        {{--<option>Fifth option</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="control-group">--}}
                                {{--<label class="control-label">Multiple Select input</label>--}}
                                {{--<div class="controls">--}}
                                    {{--<select multiple >--}}
                                        {{--<option>First option</option>--}}
                                        {{--<option selected>Second option</option>--}}
                                        {{--<option>Third option</option>--}}
                                        {{--<option>Fourth option</option>--}}
                                        {{--<option>Fifth option</option>--}}
                                        {{--<option>Sixth option</option>--}}
                                        {{--<option>Seventh option</option>--}}
                                        {{--<option>Eighth option</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="control-group">--}}
                                {{--<label class="control-label">Radio inputs</label>--}}
                                {{--<div class="controls">--}}
                                    {{--<label>--}}
                                        {{--<input type="radio" name="radios" />--}}
                                        {{--First One</label>--}}
                                    {{--<label>--}}
                                        {{--<input type="radio" name="radios" />--}}
                                        {{--Second One</label>--}}
                                    {{--<label>--}}
                                        {{--<input type="radio" name="radios" />--}}
                                        {{--Third One</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="control-group">--}}
                                {{--<label class="control-label">Checkboxes</label>--}}
                                {{--<div class="controls">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="radios" />--}}
                                        {{--First One</label>--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="radios" />--}}
                                        {{--Second One</label>--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="radios" />--}}
                                        {{--Third One</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="control-group">--}}
                                {{--<label class="control-label">File upload input</label>--}}
                                {{--<div class="controls">--}}
                                    {{--<input type="file" />--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-actions">--}}
                                {{--<button type="submit" class="btn btn-success">Save</button>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection
