@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Lista de Portadas</strong>
                    <a href="{{ route('portadas.create') }}"   class="btn btn-primary">
                        <i class="fa fa-plus" aria-hidden="true" data-toggle="tooltip" title="Agregar Nueva Portada"></i>
                    </a>
                </div>
                <hr>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr width="100%">
                                <th width="10px">ID</th>
                                <th>Imagen</th>
                                <th>Estado</th>               
                                <th colspan="3">&nbsp;</th>                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($portadas as $img)
                            <tr>
                                <td>{{ $img->id }}</td>
                                @foreach($img->imagens as $i)
                                <td><img src="{{ $i->url_img }}" class="img-fluid" width="50%"></td>
                                @endforeach
                                <td>{{ $img->estado }}</td>
                                <td width="10px">
                                    <a href="{{ route('portadas.show', $img->id) }}" class="btn btn-sm btn-default">Ver</a>
                                </td>
                                 <td width="10px">
                                    <a href="{{ route('portadas.edit', $img->id) }}" class="btn btn-sm btn-default">Editar</a>
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['portadas.destroy', $img->id], 'method' => 'DELETE']) !!}
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