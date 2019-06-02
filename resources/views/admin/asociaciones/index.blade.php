@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Lista de Asociaciones </strong>
                    <a href="{{ route('asociaciones.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus" aria-hidden="true" data-toggle="tooltip" title="Agregar Nueva Asociacion"></i>
                    </a>
                    </a>
                </div>
                <hr>
                <div class="panel-body">       
                    <div class="form-group"> 
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Cantidad Miembros</th>                               
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($asociaciones as $asoc)
                            <tr id='table-experiencia'>
                                <td id = 'table-experiencia'>{{ $asoc->id }}</td>
                                <td>{{ $asoc->nombre }}</td>
                                <td></td>
                               
                                <td width="10px">
                                    <a href="{{ route('asociaciones.show', $asoc->id) }}" class="btn btn-sm btn-default">Ver</a>
                                </td>
                                 <td width="10px">
                                    <a href="{{ route('asociaciones.edit', $asoc->id) }}" class="btn btn-sm btn-default">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['asociaciones.destroy', $asoc->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>        
                    {{ $asociaciones->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

