<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label for="nombrecarrera">{{ __('Nombre de la Carrera') }}</label>
            <input type="text" name="nombrecarrera" value="{{ $carrera->nombrecarrera }}" class="form-control{{ $errors->has('nombrecarrera') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre de la Carrera') }}">
            {!! $errors->first('nombrecarrera', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        @if(Route::currentRouteName() === 'carreras.edit')
            <div class="form-group">
                <label for="estado">{{ __('Estado') }}</label>
                <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                    <option value="Activo" {{ $carrera->estado == 'Activo' ? 'selected' : '' }}>{{ __('Activo') }}</option>
                    <option value="Inactivo" {{ $carrera->estado == 'Inactivo' ? 'selected' : '' }}>{{ __('Inactivo') }}</option>
                </select>
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif

        <div class="form-group">
            <label for="facultad">{{ __('Facultad') }}</label>
            <input type="text" name="facultad" value="{{ $carrera->facultad }}" class="form-control{{ $errors->has('facultad') ? ' is-invalid' : '' }}" placeholder="{{ __('Facultad') }}">
            {!! $errors->first('facultad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="card-footer mt-20">
        <button type="submit" class="btn btn-primary">{{ __('Aceptar') }}</button>
        <a href="{{ route('carreras.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
    </div>
</div>
