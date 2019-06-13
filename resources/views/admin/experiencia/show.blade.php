@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                <strong>Experiencia</strong>
                @foreach($experiencia->productores as $tabla)
                   <a href="{{ route('productores.show', $tabla->id) }}" class="float-right btn btn-sm btn-primary">
                        ir al productor
                    </a>
                @endforeach
                </div>
                <br>
                <div class="panel-body">
                    <p><strong>Nombre: </strong> {{ $experiencia->nombre_exper }}</p>
                    <p><strong>Precio: </strong> ${{ $experiencia->precio }}</p>
                    <p><strong>Estado: </strong> {{ $experiencia->estado_exper }}</p>
                    @foreach($experiencia->productores as $tabla)
                    <p><strong>Productor: </strong>{{ $tabla->nombre }}     {{ $tabla->apellidos }}</p>
                    @endforeach
                    @foreach($experiencia->imagenes as $tabla)
                        
                    <img src="{{ $tabla->url_img }}" class="img-responsive" height="50%" width="50%">
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
