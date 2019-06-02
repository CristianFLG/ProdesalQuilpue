<div class="form-group">
	{{ Form::label('productor_id', 'Productores') }}
	{{ Form::select('productor_id', $productor, null, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    {{ Form::label('coordenadas', 'Coordenadas') }}
    {{ Form::text('coordenadas', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('alcantarillado', 'Alcantarillado') }}
    {{ Form::text('alcantarillado', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('superficie', 'Superficie') }}
    {{ Form::text('superficie', null, ['class' => 'form-control',  
   ]) }}
</div>
<div class="form-group">
    {{ Form::label('estanque', 'Estanque') }}
    {{ Form::text('estanque', null, ['class' => 'form-control',  
   ]) }}
</div>
<div class="form-group">
    {{ Form::label('tipo_agua', 'Tipo de Agua') }}
    {{ Form::text('tipo_agua', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('pradera', 'Pradera') }}
    {{ Form::text('pradera', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('colmenar', 'Colmenar') }}
    {{ Form::text('colmenar', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Imagen') }}
    {{ Form::file('image') }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-danger']) }}
</div>
