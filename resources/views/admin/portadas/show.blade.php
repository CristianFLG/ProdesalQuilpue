@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                <strong>Portada</strong>
                   <a href="{{ route('portadas.index') }}" class="float-right btn btn-sm btn-primary">
                        Volver
                    </a>
                </div>
                <br>
                <div class="panel-body">
                    <p><strong>Estado: </strong> {{ $portada->estado }}</p>
                      @foreach($portada->imagens as $tabla) 
                    <img src="{{ $tabla->url_img }}" class="img-responsive" height="80%" width="80%">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
