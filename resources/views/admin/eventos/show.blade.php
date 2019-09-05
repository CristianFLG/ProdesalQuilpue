@extends('layouts.app')

@section('content')
<div id="vistas">
    <div class="container">
        <div class="row">
                <div class="col-md-8 sep-20">
                    <strong>Evento</strong>
                </div>

                <div class="col-md-4"> 
                    {!! Form::open(['route' => ['eventos.destroy', $evento->id], 'method' => 'DELETE']) !!}
                        <button class="btn btn-sm btn-danger">Eliminar</button>                           
                    {!! Form::close() !!}
                </div>
               <DIV class="col-md-12"> <hr class="hr-primary "> </DIV>
            <div class="col-md-12 sep-20">
                <p><strong>Titulo: </strong> {{ $evento->titulo }}</p>
                <p><strong>Ubicación: </strong> {{ $evento->ubicacion }}</p>
                <p><strong>Fecha de Inicio: </strong> {{ $evento->fecha_ini }}</p>
                <p><strong>Fecha de Termino: </strong> {{ $evento->fecha_ter }}</p>
            </div> 
         
                @foreach($evento->imagens as $img) 
                    <div class="col-md-4">
                        <img src="{{ $img->url_img }}" class="img-fluid" >
                    </div>
                @endforeach
        </div>
    </div>
</div>

@endsection
