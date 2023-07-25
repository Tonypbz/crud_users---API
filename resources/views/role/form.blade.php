<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="rol">{{ __('Rol') }}</label>
            <input type="text" name="rol" value="{{ $role->rol }}" class="form-control{{ $errors->has('rol') ? ' is-invalid' : '' }}" placeholder="{{ __('Rol') }}">
            {!! $errors->first('rol', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        @if(Route::currentRouteName() === 'roles.edit')
            <div class="form-group">
                <label for="estado">{{ __('Estado') }}</label>
                <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                    <option value="Activo" {{ $role->estado == 'Activo' ? 'selected' : '' }}>{{ __('Activo') }}</option>
                    <option value="Inactivo" {{ $role->estado == 'Inactivo' ? 'selected' : '' }}>{{ __('Inactivo') }}</option>
                </select>
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif
    </div>
    <div class="card-footer mt-20">
        <button type="submit" class="btn btn-primary">{{ __('Aceptar') }}</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
    </div>
</div>
