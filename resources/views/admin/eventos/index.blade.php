@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Eventos</strong>
                    <a href="{{ route('eventos.create') }}"   class="btn btn-primary">
                        <i class="fa fa-plus" aria-hidden="true" data-toggle="tooltip" title="Agregar Nuevo Evento"></i>
                    </a>
                </div>
                <hr>
                <div class="panel-body">
                    <table class="table table-condensed table-striped">
                        <thead>	
                            <tr>
                                <th width="5px">ID</th>
                                <th width="15%">Titulo</th>
                                <th>Ubicación</th>
                                <th >Fechas</th>
                                <th colspan="3">&nbsp;</th>                              
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($eventos as $evento)
                           	<tr>
                           		<td>{{ $evento->id }}</td>
                           		<td>{{ $evento->titulo }}</td>
                           		<td>{{ $evento->ubicacion }}</td>
                           		<td>{{ $evento->fecha_ini.'/'.$evento->fecha_ter }}</td>
                              <td width="10px">
                                    <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-sm btn-default">Ver</a>
                              </td>
                              <td width="10px">
                                <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-sm btn-default">Editar</a>
                              </td>
                              <td>
                                {!! Form::open(['route' => ['eventos.destroy', $evento->id], 'method' => 'DELETE']) !!}
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