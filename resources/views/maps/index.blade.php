@extends('layouts.app')

@section('styles')
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div id="content-header">
        <div id="breadcrumb">
            <a href="/" title="Ir al inicio" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
            <a href="#" class="current">Mapa</a>
        </div>
        <h1>Mapa</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Mapa de desplazamientos</h5>
                    </div>
                    <div class="widget-content">
                        @if (session('notification'))
                            <div class="alert alert-success">
                                <p>{{ session('notification') }}</p>
                            </div>
                        @endif

                        {{--<p>--}}
                            {{--<a href="/drivers/create" class="btn btn-success">--}}
                                {{--<i class="icon-plus"></i> Nuevo conductor--}}
                            {{--</a>--}}
                        {{--</p>--}}

                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap">
    </script>
    <script>
        function initMap() {
            var uluru = {lat: -8.1149148, lng: -79.0381925};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });

            $('#map').show();
        }
    </script>
@endsection