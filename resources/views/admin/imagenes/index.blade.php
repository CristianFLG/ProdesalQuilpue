@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Lista de Imagenes</strong>
                </div>
                <br>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr width="100%">
                                <th width="10px">ID</th>
                                <th>Imagen</th>
                                <th>Estado</th>               
                                <th colspan="1">&nbsp;</th>                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($imagenes as $img)
                            <tr>
                                <td>{{ $img->id }}</td>
                                <td><img src="{{ $img->url_img }}" class="img-fluid" width="50%"></td>
                                <td>{{ $img->estado_img }}</td>
                                <td>
                                    {!! Form::model($img,['route' => ['imagenes.update', $img->id], 'method' => 'PUT']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Modificar
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