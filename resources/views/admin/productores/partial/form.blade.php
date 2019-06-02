<div class="form-group">
    {{ Form::label('id_capitalcult', 'Capital Cultural') }}
    {{ Form::select('id_capitalcult', $capital, 'No pertenece', ['class' => 'form-control'])}}
</div>
<div class="form-group">
    {{ Form::label('nombre', 'Nombre Completo') }}
    {{ Form::text('nombre', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('rut', 'Rut') }}
    {{ Form::text('rut', null, ['class' => 'form-control', 'maxlength' => '15','id'=>'cliente','maxlength '=> '12' ,'onkeyup' => 'formatCliente(this)']) }}
</div>
<div class="form-group">
    {{ Form::label('telefono', 'Telefono') }}
    {{ Form::number('telefono', null, ['class' => 'form-control', 'maxlength' => '9']) }}
</div>
<div class="form-group">
    {{ Form::label('lugar', 'Localidad') }}
    {{ Form::text('lugar', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('asociacion_id', 'Asociacion') }}
    {{ Form::select('asociacion_id', $asociaciones, ' ', ['class' => 'form-control'])}}
</div>
<div class="form-group">
    {{ Form::label('coordenadas', 'Coordenadas') }}
    {{ Form::text('coordenadas', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Imagen') }}
    {{ Form::file('image') }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-danger']) }}
</div>
<script type="text/javascript">
function formatCliente(cliente)
{cliente.value=cliente.value.replace(/[.-]/g, '')
.replace( /^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4')}
</script>