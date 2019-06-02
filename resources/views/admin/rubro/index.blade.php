@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Lista de Rubros</strong>
                    <a href="{{ route('rubros.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus" aria-hidden="true" data-toggle="tooltip" title="Agregar Nueva Rubro"></i>
                    </a>
                </div>

                <br>
                <div class="panel-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rubros as $rubro)
                            <tr>
                                <td>{{ $rubro->id }}</td>
                                <td>{{ $rubro->nombre_rubro }}</td>
                                 <td width="10px">
                                    <a href="{{ route('rubros.edit', $rubro->id) }}" class="btn btn-sm btn-default">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['rubros.destroy', $rubro->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>                           
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>        

                    {{ $rubros->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection