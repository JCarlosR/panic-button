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

                        <form id="formDrawRoute">
                            <div class="form-group">
                                <label for="route">Seleccione ruta a pintar</label>
                                <select id="route" class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                        </form>

                        <p>en el mapa:</p>

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

            var centerLocation = { lat: -8.1090524, lng: -79.0215336 };
            var iconStation = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
            // var iconStation = 'https://stores.macysbackstage.com/images/icon-address.svg';

            var $route = $('#route');
            var routes;

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: centerLocation
            });

            $.getJSON('/api/trucks', function (data) {
                for (var i=0; i<data.length; ++i) {
                    var location = {
                        lat: parseFloat(data[i].lat),
                        lng: parseFloat(data[i].lng),
                    };
                    new google.maps.Marker({
                        position: location,
                        map: map
                    });
                }
            });

            $.getJSON('/api/stations', function (data) {
                data.forEach(function (station) {
                    if (station.lat && station.lng) {
                        //
                        var contentString =
                            '<div id="siteNotice">'+
                            '<h1 class="firstHeading">'+station.name+'</h1>'+
                            '<div id="bodyContent">'+
                            '<p>La estación <b>'+station.name+'</b> se encuentra ubicada a una ' +
                            'latitud de '+station.lat+' y una longitud de '+station.lng+'.</p>'+
                            '</div>'+
                            '</div>';

                        var infowindow = new google.maps.InfoWindow({
                            content: contentString
                        });

                        var stationPosition =  {
                            lat: parseFloat(station.lat),
                            lng: parseFloat(station.lng)
                        };
                        // console.log(lat + ' ' + lng);
                        var marker = new google.maps.Marker({
                            position: stationPosition,
                            map: map,
                            icon: iconStation,
                            title: station.name
                        });

                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    }
                });
            });

            $.getJSON('/api/routes', function (data) {
                routes = data;
                var routeOptions = '<option></option>';
                routes.forEach(function (route, i) {
                    routeOptions += '<option value="'+i+'">'+route.name+'</option>';
                });
                $route.html(routeOptions);
                $route.select2({
                    placeholder: 'Selecciona una ruta'
                });
                $route.on('change', onChangeRouteSelected);
            });

            function onChangeRouteSelected() {
                var selectedRoute = routes[$route.val()];
                // alert(selectedRoute.name);

                var directionsService = new google.maps.DirectionsService();
                var directionsDisplay = new google.maps.DirectionsRenderer();
                directionsDisplay.setMap(map);
                /*directionsDisplay.setOptions({
                    suppressMarkers: true
                });*/

                var origin = {
                    lat: parseFloat(selectedRoute.from.lat),
                    lng: parseFloat(selectedRoute.from.lng)
                };
                var destination = {
                    lat: parseFloat(selectedRoute.to.lat),
                    lng: parseFloat(selectedRoute.to.lng)
                };
                calculateAndDisplayRoute(directionsService, directionsDisplay, origin, destination);
            }

            function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
                directionsService.route({
                    origin: pointA,
                    destination: pointB,
                    travelMode: google.maps.TravelMode.DRIVING
                }, function(response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(response);
                    } else {
                        window.alert('No se ha podido trazar la ruta debido a: ' + status);
                    }
                });
            }
        }
    </script>
@endsection