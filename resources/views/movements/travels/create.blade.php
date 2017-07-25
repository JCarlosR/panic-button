@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="/travels">Viajes programados</a>
            <a href="#" class="current">Nuevo</a>
        </div>
        <h1>Nuevo viaje</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Programar nuevo viaje</h5>
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

                        <form action="/travels" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="control-group">
                                <label class="control-label">Ruta a seguir:</label>
                                <div class="controls">
                                    <select name="route_id" title="Seleccione una ruta">
                                        <option value=""></option>
                                        @foreach ($routes as $route)
                                            <option value="{{ $route->id }}" @if($route->id==old('route_id')) selected @endif>{{ $route->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Hora de salida:</label>
                                <div class="controls">
                                    <input type="time" class="span11" placeholder="Hora de salida" name="departure_time" value="{{ old('departure_time') }}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Fecha de salida:</label>
                                <div class="controls">
                                    <input type="date" class="span11" placeholder="Fecha de salida"
                                           name="departure_date" value="{{ old('departure_date') }}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Transportista asignado:</label>
                                <div class="controls">
                                    <select name="user_id" title="Seleccione una ruta">
                                        <option value=""></option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}" @if($driver->id==old('driver_id')) selected @endif>{{ $driver->name }}</option>
                                        @endforeach
                                    </select>
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
