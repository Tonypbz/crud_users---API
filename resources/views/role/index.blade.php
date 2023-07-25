@extends('layouts.app')

@section('template_title')
    Role
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
<body>
  <div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
  </div>
</body>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">

                            <h5 id="card_title" class="m-0">
                                {{ __('Roles') }}
                            </h5>

                             <div class="float-right">
                                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm" data-placement="left">
                                  {{ __('Agregar un nuevo rol') }}
                                </a>
                              </div>
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
                                        <th>Rol</th>
                                        <th>Estado</th>
                                        <th>Fecha de Actualización</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr class="{{ $role->estado === 'Inactivo' ? 'table-danger' : '' }}">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $role->rol }}</td>
                                            <td>{{ $role->estado }}</td>
                                            <td>{{ $role->updated_at }}</td>
                                            <td>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                                @if ($role->estado !== 'Inactivo')
                                                    <a class="btn btn-primary btn-sm" href="{{ route('roles.show', $role->id) }}">
                                                        <i class="fa fa-eye"></i> {{ __('Visualizar') }}
                                                    </a>
                                                    <a class="btn btn-success btn-sm" href="{{ route('roles.edit', $role->id) }}">
                                                        <i class="fa fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                @endif
                                                @csrf
                                                @method('DELETE')
                                                @if ($role->estado !== 'Inactivo')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> {{ __('Eliminar') }}
                                                    </button>
                                                @endif
                                            </form>
                                            <form action="{{ route('roles.rcestado', $role->id) }}" method="POST" class="d-inline">
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
                <div class="mt-3">
                    {!! $roles->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
