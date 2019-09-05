<div class="form-group">
    {{ Form::label('titulo', 'Titulo del Evento') }}
    {{ Form::text('titulo', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('ubicacion', 'Ubicación del evento') }}
    {{ Form::text('ubicacion', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('fecha_ini', 'Fecha de Inicio') }}
    {{ Form::date('fecha_ini',date('Y-m-d')) }}
    <br>
     {{ Form::label('fecha_ter', 'Fecha de Término') }}
    {{ Form::date('fecha_ter',date('Y-m-d')) }}
</div>
<div class="form-group">
    {{ Form::label('informacion', 'Información') }}
    {{ Form::textarea('informacion', null, ['class' => 'form-control','row' => 3]) }}
</div>
<div class="form-group">
    {{ Form::label('lat', 'Latitud') }}
    {{ Form::text('lat', null, ['class' => 'col-sm-4 form-control']) }}
    <br>
    {{ Form::label('lon', 'Longitud') }}
    {{ Form::text('lon', null, ['class' => 'col-sm-4 form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Imagen') }}
    {{ Form::file('image[]', array('multiple' => true)) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-danger']) }}
</div>
