@extends('layouts.start')

@section('content')
    <div id="loginbox">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button class="close" data-dismiss="alert">×</button>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="loginform" class="form-vertical" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="control-group normal_text"> <h3><img src="{{ asset('img/logo.png') }}" alt="Logo" /></h3></div>
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
            {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar sesión--}}
            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">¿Olvidaste tu clave?</a></span>
                <span class="pull-right">
                <button class="btn btn-success"> Ingresar</button>
            </span>
            </div>
        </form>
        {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
            {{--Forgot Your Password?--}}
        {{--</a>--}}
        <form id="recoverform" action="#" class="form-vertical">
            <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                </div>
            </div>

            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Volver al login</a></span>
                <span class="pull-right"><a class="btn btn-info">Solicitar nueva</a></span>
            </div>
        </form>
    </div>
@endsection
