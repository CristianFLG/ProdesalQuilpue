@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-sm-8">
                    <strong>Lista de Productores</strong>
                    <a href="{{ route('productores.create') }}"   class="btn  btn-primary">
                        <i class="fa fa-plus" aria-hidden="true" data-toggle="tooltip" title="Agregar Nuevo Productor"></i>
                    </a>
                </div>
                <div class="col-sm-4">
                    {!! Form::open(['route' => 'search', 'method' => 'GET', 'class' => 'form-inline'])  !!}
                    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar nombre...']) !!}
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>
                <hr>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead class="principal">
                            <tr width="100%">
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Rut</th>
                                <th>Telefono</th>
                                <th >Lugar</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productores as $productor)
                            <tr>
                                <td>{{ $productor->id }}</td>
                                <td>{{ $productor->nombre }}</td>
                                <td>{{ $productor->rut }}</td>
                                <td>{{ $productor->telefono }}</td>
                                <td>{{ $productor->lugar }}</td>
                                
                                <td width="10px">
                                    <a href="{{ route('productores.show', $productor->id) }}"  class="btn btn-sm btn-default">Ver Todo</a>
                                </td>
                                 <td width="10px">
                                    <a href="{{ route('productores.edit', $productor->id) }}" class="btn btn-sm btn-default">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['productores.destroy', $productor->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>        

                    {{ $productores->render() }}
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@endsection