@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="fondo-form col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                <strong>Editar Asociación</strong>
                </div>
                <br>
                <div class="panel-body">
                    {!! Form::model($asociacion, ['route' => ['asociaciones.update', $asociacion->id], 'method' => 'PUT']) !!}
                        
                        @include('admin.asociaciones.partial.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
