@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="row">
                    <div class="col-sm-8">
                        <strong>Lista de Experiencias </strong>
                    </div>
                    <div class="col-sm-4">
                        {!! Form::open(['route' => 'searchExperiencia', 'method' => 'GET', 'class' => 'form-inline'])  !!}

                        {!! Form::select('search',['ACTIVA' => 'ACTIVAS', 'INACTIVA' => 'INACTIVAS'],null, ['class' => 'form-control']) !!}

                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        <a href="{{ route('experiencias.index') }}" class="btn btn-primary">
                            <i class="fa fa-refresh"></i>
                        </a>
                        {!! Form::close() !!}
                    </div>
                </div>
                <hr>
                <div class="panel-body">       
                    <div class="form-group"> 
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Estado</th>                                
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($experiencias as $exper)
                            <tr id='table-experiencia'>
                                <td id = 'table-experiencia'>{{ $exper->id }}</td>
                                <td>{{ $exper->nombre_exper }}</td>
                                <td>{{ $exper->precio }}</td>
                                <td>{{ $exper->estado_exper }}</td>
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
                    {{ $experiencias->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ asset('js/admin/index.js') }}">
    </script>
@endsection
