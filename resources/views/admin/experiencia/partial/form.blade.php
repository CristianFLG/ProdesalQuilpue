
<div class="form-group">      
    <strong>Productor: {{ $nombre_prod->nombre }}</strong>
    {{ Form::hidden('id_productor', $nombre_prod->id) }}
</div> 
<div class="form-group">
    {{ Form::label('nombre_exper', 'Nombre Experiencia') }}
    {{ Form::text('nombre_exper', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('detalle', 'Detalle sobre la experiencia') }}
    {{ Form::textarea('detalle', null, ['class' => 'form-control','row' => 3]) }}
</div>
<div class="form-group">
    {{ Form::label('precio', 'Precio') }}
    {{ Form::number('precio', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('estado_exper', 'Estado') }}
    <br>
    <label style="margin-left:20px">
    {{ Form::radio('estado_exper', 'ACTIVA') }} Activa
    </label>
    <br>
    <label style="margin-left:20px">
     {{ Form::radio('estado_exper', 'INACTIVA') }} Inactiva
     </label>
</div>
<div class="form-group">
    {{ Form::label('image', 'Imagen') }}
    {{ Form::file('image') }}
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-danger']) }}
</div>