   
<div class="form-group">
    {{ Form::label('image', 'Imagen') }}
    {{ Form::file('image') }}
</div>
<div class="form-group">
    {{ Form::label('estado', 'Estado') }}
    <br>
    <label style="margin-left:20px">
    {{ Form::radio('estado', 'ACTIVA') }} Activa
    </label>
    <br>
    <label style="margin-left:20px">
     {{ Form::radio('estado', 'INACTIVA') }} Inactiva
     </label>
</div>
 {{ csrf_field() }}
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-danger']) }}
</div>
 
