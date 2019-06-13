@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Agregar nuevo Territorio</strong>
                    <a href="{{ route('territorios.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus" aria-hidden="true" data-toggle="tooltip" title="Agregar Nuevo Territorio"></i>
                    </a>
                </div>
                <hr>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Familia</th>
                                <th>Coordenadas</th>
                                <th>Alcantarillado</th>
                                <th>Superficie</th>
                                <th>estanque</th>
                                <th>Pradera</th>
                                <th>Colmenar</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($territorios as $terr)
                            <tr>
                                <td scope="row">{{ $terr->id }}</td>
                                <td>{{ $terr->productor->nombre }}</td>
                                <td>{{ $terr->coordenadas }}</td>
                                <td>{{ $terr->alcantarillado }}</td>
                                <td>{{ $terr->superficie }}</td>
                                <td>{{ $terr->estanque }}</td>
                                <td>{{ $terr->pradera }}</td>
                                <td>{{ $terr->colmenar }}</td>
                                <td width="10px">
                                    <a href="{{ route('territorios.show', $terr->id) }}" class="btn btn-sm btn-default">Ver</a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('territorios.edit', $terr->id) }}" class="btn btn-sm btn-default">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['territorios.destroy', $terr->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>        
                    {{ $territorios->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection