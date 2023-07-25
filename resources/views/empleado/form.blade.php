<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label for="codigo">{{ __('Código') }}</label>
            <input type="text" name="codigo" value="{{ $empleado->codigo }}" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" placeholder="{{ __('Código') }}">
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="apellidos">{{ __('Apellidos') }}</label>
            <input type="text" name="apellidos" value="{{ $empleado->apellidos }}" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellidos') }}">
            {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="nombres">{{ __('Nombres') }}</label>
            <input type="text" name="nombres" value="{{ $empleado->nombres }}" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombres') }}">
            {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="users_id">{{ __('Id del usuario') }}</label>
            <input type="text" name="users_id" value="{{ $empleado->users_id }}" class="form-control{{ $errors->has('users_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Id del usuario') }}">
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="ingreso">{{ __('Ingreso') }}</label>
            <input type="text" name="ingreso" value="{{ $empleado->ingreso }}" class="form-control{{ $errors->has('ingreso') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingreso') }}">
            {!! $errors->first('ingreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        @if(Route::currentRouteName() === 'empleados.edit')
            <div class="form-group">
                <label for="estado">{{ __('Estado') }}</label>
                <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                    <option value="Activo" {{ $empleado->estado == 'Activo' ? 'selected' : '' }}>{{ __('Activo') }}</option>
                    <option value="Inactivo" {{ $empleado->estado == 'Inactivo' ? 'selected' : '' }}>{{ __('Inactivo') }}</option>
                </select>
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif

    </div>
    <div class="card-footer mt-20">
        <button type="submit" class="btn btn-primary">{{ __('Aceptar') }}</button>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
    </div>
</div>
