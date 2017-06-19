@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="/trucks">Camiones</a>
            <a href="#" class="current">Nuevo</a>
        </div>
        <h1>Nuevo camión</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Registrar nuevo camión</h5>
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

                        <form action="/trucks" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="control-group">
                                <label class="control-label">Placa:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Placa" name="code" value="{{ old('code') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Marca:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Marca" name="brand" value="{{ old('brand') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Modelo:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Modelo" name="model" value="{{ old('model') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Año:</label>
                                <div class="controls">
                                    <input type="number" min="1970" max="2050" class="span11" placeholder="Año" name="year" value="{{ old('year') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Capacidad de carga:</label>
                                <div class="controls">
                                    <input type="number" min="0" max="10000" step="0.01" class="span11" value="{{ old('capacity') }}"
                                           placeholder="Capacidad de carga en toneladas" name="capacity" />
                                </div>
                            </div>
                            {{--<div class="control-group">--}}
                                {{--<label class="control-label">Password input</label>--}}
                                {{--<div class="controls">--}}
                                    {{--<input type="password"  class="span11" placeholder="Enter Password"  />--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="control-group">--}}
                                {{--<label class="control-label">Description field:</label>--}}
                                {{--<div class="controls">--}}
                                    {{--<input type="text" class="span11" />--}}
                                    {{--<span class="help-block">Description field</span> </div>--}}
                            {{--</div>--}}
                            {{--<div class="control-group">--}}
                                {{--<label class="control-label">Message</label>--}}
                                {{--<div class="controls">--}}
                                    {{--<textarea class="span11" ></textarea>--}}
                                {{--</div>--}}
                            {{--</div>--}}
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
