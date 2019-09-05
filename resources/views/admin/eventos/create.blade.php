@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-2"></div>
        <div class="fondo-form col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Crear Nuevo Evento</strong>
                </div>
                <br>
                <div class="panel-body">
                    {!! Form::open(array('route' => 'eventos.store','files' => true)) !!}
                        
                        @include('admin.eventos.partial.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection