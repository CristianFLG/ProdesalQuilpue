@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                <strong>Producto</strong>
                @foreach($producto->productors as $tabla)
                  <a href="{{ route('productores.show', $tabla->id) }}" class="float-right btn btn-primary">
                        ir al Productor
                    </a>
                @endforeach
                </div>
                <br>
                <div class="panel-body">
                    <p><strong>Nombre: </strong> {{ $producto->nombre_producto }}</p>
                    <p><strong>Stock: </strong> {{ $producto->stock }}</p>
                    <p><strong>Precio: </strong> ${{ $producto->precio }}</p>
                    <p><strong>Rubro: </strong> {{ $rubro->nombre_rubro }}</p>
                     @foreach($producto->productors as $tabla)
                    <p><strong>Productor: </strong>{{ $tabla->nombre }}     {{ $tabla->apellidos }}</p>
                    @endforeach
                    @foreach($producto->imagens as $prod)
                        <img src="{{ $prod->url_img }}" class="img-fluid" height="50%" width="50%">

                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
