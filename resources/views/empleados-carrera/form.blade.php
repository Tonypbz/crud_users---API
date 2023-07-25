<div class="card">
    <div class="card-body">

        <div class="form-group">
            {{ Form::label('carreras_id', __('Carrera')) }}
            {{ Form::select('carreras_id', $carreras, isset($empleadosCarrera) ? $empleadosCarrera->carreras_id : null, ['class' => 'form-control' . ($errors->has('carreras_id') ? ' is-invalid' : ''), 'placeholder' => __('Seleccione una carrera')]) }}
            {!! $errors->first('carreras_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleados_id', __('Empleado')) }}
            {{ Form::select('empleados_id', $empleados, isset($empleadosCarrera) ? $empleadosCarrera->empleados_id : null, ['class' => 'form-control' . ($errors->has('empleados_id') ? ' is-invalid' : ''), 'placeholder' => __('Seleccione un empleado')]) }}
            {!! $errors->first('empleados_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="fecha">{{ __('Fecha') }}</label>
            <input type="date" name="fecha" value="{{ $empleadosCarrera->fecha }}" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" placeholder="{{ __('Fecha') }}">
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        @if(Route::currentRouteName() === 'empleados-carreras.edit')
            <div class="form-group">
                <label for="estado">{{ __('Estado') }}</label>
                <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                    <option value="Activo" {{ $empleadosCarrera->estado == 'Activo' ? 'selected' : '' }}>{{ __('Activo') }}</option>
                    <option value="Inactivo" {{ $empleadosCarrera->estado == 'Inactivo' ? 'selected' : '' }}>{{ __('Inactivo') }}</option>
                </select>
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif

    </div>
    <div class="card-footer mt-20">
        <button type="submit" class="btn btn-primary">{{ __('Aceptar') }}</button>
        <a href="{{ route('empleados-carreras.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
    </div>
</div>
