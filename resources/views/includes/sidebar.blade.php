<div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active">
            <a href="/home">
                <i class="icon icon-home"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/">
                <i class="icon icon-signal"></i> <span>Reporte de incidencias</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/trucks') }}">
                <i class="icon icon-th"></i> <span>Camiones</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/drivers') }}">
                <i class="icon icon-hand-up"></i> <span>Conductores</span>
            </a>
        </li>
        <li>
            <a href="{{ url('receivers') }}">
                <i class="icon icon-file"></i> <span>Destinatarios</span>
                {{--<span class="label label-important" title="Vía mail y vía SMS">2</span>--}}
            </a>
        </li>
        <li>
            <a href="{{ url('/map') }}">
                <i class="icon icon-magic"></i> <span>Mapa</span>
            </a>
        </li>
        <li class="submenu">
            <a href="#">
                <i class="icon icon-th-list"></i> <span>Desplazamientos</span>
            </a>
            <ul>
                <li><a href="{{ url('stations') }}">Estaciones</a></li>
                <li><a href="{{ url('routes') }}">Rutas</a></li>
                <li><a href="{{ url('travels') }}">Viajes programados</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#">
                <i class="icon icon-info-sign"></i> <span>Reportes</span>
                {{--<span class="label label-important">2</span>--}}
            </a>
            <ul>
                <li><a href="{{ url('reports/incidences') }}">Reporte de incidencias</a></li>
                <li><a href="{{ url('reports/travels') }}">Reporte de viajes realizados</a></li>
                <li><a href="{{ url('reports/incidences/matrix') }}">Matriz de incidencias</a></li>
                <li><a href="{{ url('reports/incidences/drivers-vs-routes') }}">Vehículos VS Rutas</a></li>
                <li><a href="{{ url('reports/incidences/routes-vs-months') }}">Rutas VS Meses</a></li>
            </ul>
        </li>

        <li class="content"> <span>% Incidentes (últimos 30d)</span>
            <div class="progress progress-mini progress-danger active progress-striped">
                <div style="width: 33%;" class="bar"></div>
            </div>
            <span class="percent">33%</span>
            <div class="stat">4 / 12 desplazamientos</div>
        </li>
        <li class="content"> <span>Disk Space Usage</span>
            <div class="progress progress-mini active progress-striped">
                <div style="width: 87%;" class="bar"></div>
            </div>
            <span class="percent">87%</span>
            <div class="stat">604.44 / 4000 MB</div>
        </li>
    </ul>
</div>
