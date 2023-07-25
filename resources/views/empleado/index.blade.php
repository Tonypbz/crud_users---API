@extends('layouts.app')

@section('template_title')
    {{ __('Empleado') }}
@endsection
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="card-title">{{ __('Empleado') }}</span>
                            <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm">
                                {{ __('Agregar un nuevo empleado') }}
                            </a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Codigo</th>
                                        <th>Apellidos</th>
                                        <th>Nombres</th>
                                        <th>Users Id</th>
                                        <th>Ingreso</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr class="{{ $empleado->estado === 'Inactivo' ? 'table-danger' : '' }}">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $empleado->codigo }}</td>
                                            <td>{{ $empleado->apellidos }}</td>
                                            <td>{{ $empleado->nombres }}</td>
                                            <td>{{ $empleado->users_id }}</td>
                                            <td>{{ $empleado->ingreso }}</td>
                                            <td>{{ $empleado->estado }}</td>
                                            <td>
                                                @if ($empleado->estado !== 'Inactivo')
                                                    <a class="btn btn-sm btn-primary" href="{{ route('empleados.show', $empleado->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Visualizar') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleados.edit', $empleado->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                @endif
                                                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    @if ($empleado->estado !== 'Inactivo')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                        </button>
                                                    @endif
                                                </form>
                                                <form action="{{ route('empleados.cestado', $empleado->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-toggle-on"></i> {{ __('Cambiar Estado') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $empleados->links() !!}
            </div>
        </div>
    </div>
@endsection
