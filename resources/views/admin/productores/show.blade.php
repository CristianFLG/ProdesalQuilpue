@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>

        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Productor</strong>
                    <a href="{{ route('producto', $productor->id) }}" class="float-right btn btn-primary">
                        Nuevo Producto
                    </a>
                    <p class="float-right btn"></p>
                    <a href="{{ route('experiencia', $productor->id) }}" class="float-right btn btn-primary">
                        Nueva Experiencia
                    </a>
                </div>
          
                <Hr>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead class="principal">
                            <tr width="100%">
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Rut</th>
                                <th>Telefono</th>
                                <th>Lugar</th>
                                <th>C.Cultural</th>
                                <th>Asociación</th>
                                <th>Imagen</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $productor->id }}</td>
                                <td>{{ $productor->nombre }}</td>
                                <td>{{ $productor->rut }}</td>
                                <td>{{ $productor->telefono }}</td>
                                <td>{{ $productor->lugar }}</td>
                                
                                <td>{{ $capital->nombre_capital }}</td>
                                <td>
                                @foreach($productor->asociaciones as $asoc)
                                    {{ $asoc->nombre }}
                                @endforeach
                                </td>
                                <td>
                                @foreach($productor->imagen as $tabla)
                                <img src="{{ $tabla->url_img }}" class="img-fluid"  width="50%">  
                                @endforeach
                                </td>          
                            </tr>
                        </tbody>
                        <thead class="btn-primary">
                            <tr>
                                <th>ID</th>
                                <th>Productos</th>
                                <th>Derivado</th>
                                <th>Cantidad</th>
                                <th>Valor</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>   
                        <tbody>
                                @foreach($productor->productos as $prod)
                            <tr>
                                <td>{{ $prod->id }}</td>
                                <td>{{ $prod->nombre_producto }}</td>
                                <td>{{ $prod->derivado }}</td>
                                <td>{{ $prod->stock }} {{ $prod->medida }}</td>
                                <td>{{ $prod->precio }}</td>
                                
                                <td width="10px">
                                    <a href="{{ route('productos.show', $prod->id) }}" class="btn btn-sm btn-default">Ver</a>
                                </td>
                                 <td width="10px">
                                    <a href="{{ route('productos.edit', $prod->id) }}" class="btn btn-sm btn-default">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['productos.destroy', $prod->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                                @endforeach   
                        </tbody>
                        <thead class="btn-primary">
                            <tr>
                                <th>ID</th>
                                <th>Experiencias</th>
                                <th>Valor</th>
                                <th>Estado</th>
                                <th colspan="4">&nbsp;</th>
                            </tr>
                        </thead>   
                        <tbody>              
                                @foreach($productor->experiencias as $exper)
                            <tr>
                                <td>{{ $exper->id }}</td>
                                <td>{{ $exper->nombre_exper }}</td>
                                <td>{{ $exper->precio }}</td>
                                <td>{{ $exper->estado_exper }}</td>
                                <td></td>
                                <td width="10px">
                                    <a href="{{ route('experiencias.show', $exper->id) }}" class="btn btn-sm btn-default">Ver</a>
                                </td>
                                 <td width="10px">
                                    <a href="{{ route('experiencias.edit', $exper->id) }}" class="btn btn-sm btn-default">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['experiencias.destroy', $exper->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                                @endforeach   
                        </tbody>
                    </table> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
