@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-2"></div>
        <div class="fondo-form col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Editar Evento</strong>
                </div>
                <br>
                <div class="panel-body">
                    {!! Form::model($evento, ['route' => ['eventos.update', $evento->id], 'method' => 'PUT','files' => true]) !!}       
                        @include('admin.eventos.partial.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
