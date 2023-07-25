<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label for="nombre">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" value="{{ $periodo->nombre }}" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}">
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="fechainicio">{{ __('Fecha de inicio') }}</label>
            <input type="date" name="fechainicio" value="{{ $periodo->fechainicio }}" class="form-control{{ $errors->has('fechainicio') ? ' is-invalid' : '' }}" placeholder="{{ __('Fecha de inicio') }}">
            {!! $errors->first('fechainicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="fechafin">{{ __('Fecha de fin') }}</label>
            <input type="date" name="fechafin" value="{{ $periodo->fechafin }}" class="form-control{{ $errors->has('fechafin') ? ' is-invalid' : '' }}" placeholder="{{ __('Fecha de fin') }}">
            {!! $errors->first('fechafin', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        @if(Route::currentRouteName() === 'periodos.edit')
            <div class="form-group">
                <label for="estado">{{ __('Estado') }}</label>
                <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                    <option value="Activo" {{ $periodo->estado == 'Activo' ? 'selected' : '' }}>{{ __('Activo') }}</option>
                    <option value="Inactivo" {{ $periodo->estado == 'Inactivo' ? 'selected' : '' }}>{{ __('Inactivo') }}</option>
                </select>
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif

    </div>
    <div class="card-footer mt-20">
        <button type="submit" class="btn btn-primary">{{ __('Aceptar') }}</button>
        <a href="{{ route('periodos.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
    </div>
</div>
