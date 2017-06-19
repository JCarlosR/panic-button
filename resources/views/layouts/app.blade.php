<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css') }}" />
    {{--<link rel="stylesheet" href="{{ asset('css/uniform.css') }}" />--}}
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/matrix-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/matrix-media.css') }}" />
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/jquery.gritter.css') }}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    @yield('styles')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="/">{{ config('app.name', 'Laravel') }}</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages">
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
                <i class="icon icon-user"></i>
                <span class="text">Bienvenido {{ auth()->user()->name }}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> Mi perfil</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> Mis tareas</a></li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-key"></i> Cerrar sesión
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
                <li class="divider"></li>
                <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
                <li class="divider"></li>
                <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
                <li class="divider"></li>
                <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
            </ul>
        </li>
        <li class="">
            <a title="" href="#">
                <i class="icon icon-cog"></i> <span class="text">Configuración</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="icon-key"></i> <span class="text">Cerrar sesión</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
@include('includes.sidebar')
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
    @yield('content')
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12">2017 &copy; Tecnología Cliente - Servidor</div>
</div>

<!--end-Footer-part-->

<script src="{{ asset('js/excanvas.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.flot.min.js') }}"></script>
<script src="{{ asset('js/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('js/jquery.peity.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/jquery.gritter.min.js') }}"></script>
<script src="{{ asset('js/matrix.chat.js') }}"></script>
{{--<script src="{{ asset('js/jquery.validate.js') }}"></script>--}}
{{--<script src="{{ asset('js/matrix.form_validation.js') }}"></script>--}}
{{--<script src="{{ asset('js/jquery.wizard.js') }}"></script>--}}
<script src="{{ asset('js/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/matrix.popover.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/matrix.js') }}"></script>
<script src="{{ asset('js/matrix.tables.js') }}"></script>

<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>

@yield('scripts')
</body>
</html>
