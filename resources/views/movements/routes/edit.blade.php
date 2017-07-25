@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="/routes">Rutas</a>
            <a href="#" class="current">Editar</a>
        </div>
        <h1>Modificar ruta</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Editar ruta seleccionada</h5>
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
                                <label class="control-label">Punto de partida:</label>
                                <div class="controls">
                                    <select name="from_id" title="Seleccione punto de partida">
                                        <option value=""></option>
                                        @foreach ($stations as $station)
                                            <option value="{{ $station->id }}" @if($station->id==old('from_id', $route->from_id)) selected @endif>{{ $station->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Punto de llegada:</label>
                                <div class="controls">
                                    <select name="to_id" title="Seleccione punto de llegada">
                                        <option value=""></option>
                                        @foreach ($stations as $station)
                                            <option value="{{ $station->id }}" @if($station->id==old('to_id', $route->to_id)) selected @endif>{{ $station->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Nombre:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Nombre de la ruta" name="name" value="{{ old('name', $route->name) }}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Tiempo:</label>
                                <div class="controls">
                                    <input type="number" class="span11" placeholder="Tiempo aproximado en horas"
                                           name="time" value="{{ old('time', $route->time) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Distancia:</label>
                                <div class="controls">
                                    <input type="number" class="span11" name="distance"
                                           placeholder="Distancia aproximada en kilómetros" value="{{ old('distance', $route->distance) }}">
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
