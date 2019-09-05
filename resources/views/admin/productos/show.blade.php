@extends('layouts.app')

@section('content')
<div id="vistas">
    <div class="container">
        <div class="row">
            <div class="col-md-8 sep-20">
                <strong>Producto</strong>
            </div>
             <div class="col-md-4">
                {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'DELETE']) !!}
                    <button class="btn btn-sm btn-danger">Eliminar</button>                           
                {!! Form::close() !!}
            </div>
            <div class="col-md-12"> <hr class="hr-primary "> </div>
            <div class="col-md-12 sep-20">
                <p><strong>Nombre: </strong> {{ $producto->nombre_producto }}</p>
                <p><strong>Stock: </strong> {{ $producto->stock }}</p>
                <p><strong>Precio: </strong> ${{ $producto->precio }}</p>
                <p><strong>Rubro: </strong> {{ $rubro->nombre_rubro }}</p>
                @foreach($producto->productors as $tabla)
                <p>
                    <strong>Productor: </strong>{{ $tabla->nombre }}     {{ $tabla->apellidos }}
                    @endforeach
                    @foreach($producto->productors as $tabla)
                        <a href="{{ route('productores.show', $tabla->id) }}" class="btn btn-primary">
                            ir al Productor 
                        </a>
                    @endforeach
                </p>                    
            </div>
            @foreach($producto->imagens as $prod)
                <div class="col-md-4">
                    <img src="{{ $prod->url_img }}" class="img-fluid">
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
