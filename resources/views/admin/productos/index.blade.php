@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
               
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <strong>Lista de Productos </strong>
                       </div>
                        <div class="col-sm-4">
                        {!! Form::open(['route' => 'searchProducto', 'method' => 'GET', 'class' => 'form-inline'])  !!}

                        {!! Form::select('search',$rubros,null, ['class' => 'form-control']) !!}

                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        <a href="{{ route('productos.index') }}" class="btn btn-primary">
                            <i class="fa fa-refresh"></i>
                        </a>
                        {!! Form::close() !!}
                        </div>
                    </div>
                    <hr>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr width="100%">
                                <th >ID</th>
                                <th>Nombre</th>
                                <th>Derivado</th>
                                <th>Stock</th>
                                <th>Precio</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->nombre_producto }}</td>
                                <td>{{ $product->derivado }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->precio }}</td>
                  
                                <td width="10px">
                                    <a href="{{ route('productos.show', $product->id) }}" class="btn btn-sm btn-default">Ver</a>
                                </td>
                                 <td width="10px">
                                    <a href="{{ route('productos.edit', $product->id) }}" class="btn btn-sm btn-default">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['productos.destroy', $product->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>        
                    {{ $productos->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection