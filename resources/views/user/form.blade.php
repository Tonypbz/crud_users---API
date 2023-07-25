<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="name">{{ __('Nombre') }}</label>
            <input type="text" name="name" value="{{ $user->name ?? '' }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}">
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="text" name="email" value="{{ $user->email ?? '' }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        @if(Route::currentRouteName() === 'users.create')
            <div class="form-group">
                <label for="password">{{ __('Contraseña') }}</label>
                <input type="text" name="password" value="{{ $user->password }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña') }}">
                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @else
            <input type="hidden" name="password" value="{{ $user->password }}">
        @endif

        @if(Route::currentRouteName() === 'users.edit')
            <div class="form-group">
                <label for="estado">{{ __('Estado') }}</label>
                <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                    <option value="Activo" {{ $user->estado == 'Activo' ? 'selected' : '' }}>{{ __('Activo') }}</option>
                    <option value="Inactivo" {{ $user->estado == 'Inactivo' ? 'selected' : '' }}>{{ __('Inactivo') }}</option>
                </select>
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif

    </div>
    <div class="card-footer mt-20">
        <button type="submit" class="btn btn-primary">{{ __('Aceptar') }}</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
    </div>
</div>
