@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                <strong>Vista Asociación</strong>
                </div>
                <br>
                <div class="panel-body">
                    <p><strong>Nombre: </strong> {{ $asociacion->nombre }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
