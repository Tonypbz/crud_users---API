@extends('layouts.app')
<style>
    body {
    margin: auto;
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    overflow: auto;
    background: linear-gradient(315deg, rgba(101,0,94,1) 3%, rgba(60,132,206,1) 38%, rgba(48,238,226,1) 68%, rgba(255,25,25,1) 98%);
    animation: gradient 15s ease infinite;
    background-size: 400% 400%;
    background-attachment: fixed;
}

@keyframes gradient {
    0% {
        background-position: 0% 0%;
    }
    50% {
        background-position: 100% 100%;
    }
    100% {
        background-position: 0% 0%;
    }
}

.wave {
    background: rgb(255 255 255 / 25%);
    border-radius: 1000% 1000% 0 0;
    position: fixed;
    width: 200%;
    height: 12em;
    animation: wave 10s -3s linear infinite;
    transform: translate3d(0, 0, 0);
    opacity: 0.8;
    bottom: 0;
    left: 0;
    z-index: -1;
}

.wave:nth-of-type(2) {
    bottom: -1.25em;
    animation: wave 18s linear reverse infinite;
    opacity: 0.8;
}

.wave:nth-of-type(3) {
    bottom: -2.5em;
    animation: wave 20s -1s reverse infinite;
    opacity: 0.9;
}

@keyframes wave {
    2% {
        transform: translateX(1);
    }

    25% {
        transform: translateX(-25%);
    }

    50% {
        transform: translateX(-50%);
    }

    75% {
        transform: translateX(-25%);
    }

    100% {
        transform: translateX(1);
    }
}
    </style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-14">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1>Listado de Empleado Actividad</h1>
                        <a href="{{ url('/empleadoactividad/create') }}" class="btn btn-danger">Agregar nuevo</a>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Empleado</th>
                                <th>Actividad</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $empleadoactividad)
                                <tr>
                                    <td>{{ $empleadoactividad['id'] }}</td>
                                    <td>{{ $empleadoactividad['NombreEmpleado'] }}</td>
                                    <td>{{ $empleadoactividad['Actividad'] }}</td>
                                    <td>{{ $empleadoactividad['FechaInicio'] }}</td>
                                    <td>{{ $empleadoactividad['FechaFin'] }}</td>
                                    <td>{{ $empleadoactividad['Estado'] }}</td>
                                    <td>
                                        <a href="{{ url('/empleadoactividad/' . $empleadoactividad['id']) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ url('/empleadoactividad/' . $empleadoactividad['id'] . '/edit') }}" class="btn btn-primary btn-sm">Editar</a>
                                        <form action="{{ url('/empleadoactividad/' . $empleadoactividad['id']) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection