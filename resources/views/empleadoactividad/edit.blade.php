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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1 class="card-title">{{ __('Editar EmpleadoActividad') }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('/empleadoactividad/'.$data['id']) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="id">{{ __('ID') }}:</label>
                                <input type="text" class="form-control" id="id" name="id" value="{{ $data['id'] }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="NombreEmpleado">{{ __('Nombre Empleado') }}:</label>
                                <input type="text" class="form-control" id="NombreEmpleado" name="NombreEmpleado" value="{{ $data['NombreEmpleado'] }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Actividad">{{ __('Actividad') }}:</label>
                                <input type="text" class="form-control" id="Actividad" name="Actividad" value="{{ $data['Actividad'] }}" required>
                            </div>
                            <div class="form-group">
                                <label for="FechaInicio">{{ __('Fecha Inicio') }}:</label>
                                <input type="date" class="form-control" id="FechaInicio" name="FechaInicio" value="{{ $data['FechaInicio'] }}" required>
                            </div>
                            <div class="form-group">
                                <label for="FechaFin">{{ __('Fecha Fin') }}:</label>
                                <input type="date" class="form-control" id="FechaFin" name="FechaFin" value="{{ $data['FechaFin'] }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Estado">{{ __('Estado') }}:</label>
                                <select class="form-control" id="Estado" name="Estado" required>
                                    <option value="Activo" @if($data['Estado'] == 'Activo') selected @endif>Activo</option>
                                    <option value="Inactivo" @if($data['Estado'] == 'Inactivo') selected @endif>Inactivo</option>
                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-3">{{ __('Guardar cambios') }}</button>
                                <a href="{{ url('/empleadoactividad/' . $data['id']) }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
