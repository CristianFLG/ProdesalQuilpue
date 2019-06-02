@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="fondo-form col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <strong> Editar Productor</strong>
                </div>
                <hr>
                <div class="panel-body">
                    {!! Form::model($productor, ['route' => ['productores.update', $productor->id], 'method' => 'PUT','files' => true]) !!}
                         @if(session('message')) {{session('message')}} @endif
                        @include('admin.productores.partial.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection