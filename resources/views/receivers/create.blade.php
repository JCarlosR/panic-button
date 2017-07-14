@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="/receivers">Destinatarios</a>
            <a href="#" class="current">Nuevo</a>
        </div>
        <h1>Nuevo destinatario</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Registrar nuevo destinatario</h5>
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

                        <form action="/receivers" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="control-group">
                                <label class="control-label">Nombres:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Nombres" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Apellidos:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Apellidos" name="last_name" value="{{ old('last_name') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">DNI:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="DNI" name="dni" value="{{ old('dni') }}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Rol:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Rol" name="role" value="{{ old('role') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Descripción:</label>
                                <div class="controls">
                                    <textarea class="span11" name="description" id="description"
                                              placeholder="¿Qué procesos llevará a cabo?">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Celular:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Teléfono celular (recibirá notificación SMS)"
                                           name="cellphone" value="{{ old('cellphone') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">E-mail:</label>
                                <div class="controls">
                                    <input type="email" class="span11" name="email"
                                           placeholder="Email (recibirá notificación por correo)" value="{{ old('email') }}">
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
