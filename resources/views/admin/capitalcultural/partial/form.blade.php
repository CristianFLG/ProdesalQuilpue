<div class="form-group">
    {{ Form::label('nombre_capital', 'Nombre Capital Cultural') }}
    {{ Form::text('nombre_capital', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-danger']) }}
</div>