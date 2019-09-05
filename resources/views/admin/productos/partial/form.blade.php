<div class="form-group">
     <strong>Productor: {{ $productores->nombre }}</strong>
    {{ Form::hidden('id_productor', $productores->id) }}
</div> 
<div class="form-group">
	{{ Form::label('id_rubro', 'Rubro') }}
	{{ Form::select('id_rubro', $rubros, null, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    {{ Form::label('nombre_producto', 'Nombre del Producto') }}
    {{ Form::text('nombre_producto', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('derivado', 'Derivado') }}
    {{ Form::text('derivado', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('stock', 'Stock') }}
    {{ Form::number('stock', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('medida', 'Detalle') }}
    {{ Form::text('medida', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('precio', 'Precio') }}
    {{ Form::number('precio', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Imagen') }}
    {{ Form::file('image[]', array('multiple' => true)) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-danger']) }}
</div>
