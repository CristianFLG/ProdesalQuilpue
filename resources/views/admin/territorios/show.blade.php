@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                <strong>Territorio</strong>
                
                </div>
                <br>
                <div class="panel-body">
                    <p><strong>Familia: </strong>{{ $territorio->productor->nombre  }}</p>
                    <p><strong>Coordenadas: </strong>{{ $territorio->coordenadas }}</p>
                    <p><strong>Alcantarillado: </strong>{{ $territorio->alcantarillado }}</p>
                    <p><strong>Superficie: </strong>{{ $territorio->superficie }}</p>
                    <p><strong>Estanque: </strong>{{ $territorio->estanque }}</p>
                    <p><strong>Pradera: </strong>{{ $territorio->pradera }}</p>
                    <p><strong>Colmenar :</strong>{{ $territorio->colmenar }}</p>
                    <a href="{{ route('territorios.index') }}" class="float-right btn btn-sm btn-primary">
                        Volver
                    </a>
                    
                    @foreach($territorio->imagens as $tabla)
                        
                    <img src="{{ $tabla->url_img }}" class="img-responsive" height="50%" width="50%">
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
