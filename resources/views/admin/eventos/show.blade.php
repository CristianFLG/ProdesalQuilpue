@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Evento</strong>
                </div>
                <br>
                <div class="panel-body">
                    <p><strong>Titulo: </strong> {{ $evento->titulo }}</p>
                    <p><strong>Ubicación: </strong> {{ $evento->ubicacion }}</p>
                    <p><strong>Fecha de Inicio: </strong> {{ $evento->fecha_ini }}</p>
                    <p><strong>Fecha de Termino: </strong> {{ $evento->fecha_ter }}</p>
                    @foreach($evento->imagens as $img)
                        
                        <img src="{{ $img->url_img }}" class="img-fluid" height="50%" width="50%">
                        
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
