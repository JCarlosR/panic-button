@extends('layouts.start')

@section('content')
    <div id="loginbox">
        <form id="loginform" class="form-vertical" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="control-group normal_text">
                <h3><img src="{{ asset('img/logo.png') }}" alt="Logo" /></h3>
            </div>

            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg">
                            <i class="icon-user"></i>
                        </span>
                        <input id="name" type="text" class="form-control" name="name"
                               value="{{ old('name') }}" required autofocus placeholder="Nombre">
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg">
                            <i class="icon-user"></i>
                        </span>
                        <input id="email" type="email" class="form-control" name="email"
                               value="{{ old('email') }}" required autofocus placeholder="E-mail">
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly">
                            <i class="icon-lock"></i>
                        </span>
                        <input id="password" type="password" class="form-control"
                               name="password" required placeholder="Clave">
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly">
                            <i class="icon-lock"></i>
                        </span>
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required placeholder="Confirmar clave">
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <span class="pull-right">
                <button class="btn btn-success"> Registro</button>
            </span>
            </div>
        </form>
    </div>
@endsection
