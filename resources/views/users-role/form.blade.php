<div class="card">
    <div class="card-body">
        <div class="form-group">
            {{ Form::label('roles_id', __('Rol')) }}
            {{ Form::select('roles_id', $roles, isset($usersRole) ? $usersRole->roles_id : null, ['class' => 'form-control' . ($errors->has('roles_id') ? ' is-invalid' : ''), 'placeholder' => __('Seleccione un rol')]) }}
            {!! $errors->first('role_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('users_id', __('Usuario')) }}
            {{ Form::select('users_id', $users, isset($usersRole) ? $usersRole->users_id : null, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => __('Seleccione un usuario')]) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(Route::currentRouteName() === 'users-roles.edit')
            <div class="form-group">
                <label for="estado">{{ __('Estado') }}</label>
                <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                    <option value="Activo" {{ $usersRole->estado == 'Activo' ? 'selected' : '' }}>{{ __('Activo') }}</option>
                    <option value="Inactivo" {{ $usersRole->estado == 'Inactivo' ? 'selected' : '' }}>{{ __('Inactivo') }}</option>
                </select>
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ __('Aceptar') }}</button>
        <a href="{{ route('users-roles.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
    </div>
</div>
