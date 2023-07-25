@extends('layouts.app')

@section('template_title')
    {{ $usersRole->name ?? __('Show Users Role') }}
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
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">{{ __('Roles del usuario') }}</h5>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{ route('users-roles.index') }}">{{ __('Volver') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Roles Id:</strong>
                            {{ $usersRole->roles_id }}
                        </div>
                        <div class="form-group">
                            <strong>Users Id:</strong>
                            {{ $usersRole->users_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $usersRole->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre del usuario:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Rol asignado:</strong>
                            {{ $role->rol }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de creación:</strong>
                            {{ $usersRole->created_at }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de actualización:</strong>
                            {{ $usersRole->updated_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
