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
                    <table class="table table-striped table-hover table-reflow">
                        <thead>	
                            <tr width="100%">
                                <th width="10px">ID</th>
                                <th>Titulo</th>
                                <th>Ubicación</th>
                                <th>Fechas</th>
                                <th class="col-md-4">Detalles</th>
                                <th>Imagen</th>
                                <th colspan="3">&nbsp;</th>                              
                            </tr>
                        </thead>
                        <tbody>
                        	@if($eventos!=null)
                        	@foreach($eventos as $evento)
                           	<tr>
                           		<td>{{ $evento->id }}</td>
                           		<td>{{ $evento->titulo }}</td>
                           		<td>{{ $evento->ubicacion }}</td>
                           		<td>{{ $evento->fecha_ini.'/'.$evento->fecha_ter }}</td>
                           		<td style="width: 10px">{{ $evento->informacion }}</td>
	                           	<td> 
	                           		@foreach($evento->imagens as $tabla)
	                                	<img src="{{ $tabla->url_img }}" class="img-fluid">  
	                                @endforeach
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
                           	@endif
                        </tbody>   
                    </table>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection