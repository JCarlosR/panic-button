@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="/trucks">Camiones</a>
            <a href="#" class="current">Editar</a>
        </div>
        <h1>Modificar camión</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Editar camión seleccionado</h5>
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
                                <label class="control-label">Placa:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Placa" name="code" value="{{ old('code', $truck->code) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Marca:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Marca" name="brand" value="{{ old('brand', $truck->brand) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Modelo:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Modelo" name="model" value="{{ old('model', $truck->model) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Año:</label>
                                <div class="controls">
                                    <input type="number" min="1970" max="2050" class="span11" placeholder="Año" name="year" value="{{ old('year', $truck->year) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Capacidad de carga:</label>
                                <div class="controls">
                                    <input type="number" min="0" max="10000" step="0.01" class="span11" value="{{ old('capacity', $truck->capacity) }}"
                                           placeholder="Capacidad de carga en toneladas" name="capacity" />
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
