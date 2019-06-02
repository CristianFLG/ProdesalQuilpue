<div class="form-group">
    {{ Form::label('nombre_rubro', 'Nombre del Rubro') }}
    {{ Form::text('nombre_rubro', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-danger']) }}
</div>