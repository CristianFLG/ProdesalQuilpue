@extends('layouts.barra')

@section('content')
<div id="team">
	<div class="container">
		<div class="row">
               <div class="col-md-6 col-sm-4">
                    {!! Form::open(['route' => 'searchExperiencias', 'method' => 'GET', 'class' => 'form-inline'])  !!}
                    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar...']) !!}
                    <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
                    <a href="{{ route('productos_todos') }}" class="btn btn-primary">
                         <i class="fa fa-refresh"></i>
                    </a>
                    {!! Form::close() !!}
               </div>
			<div class="col-md-12 text-center">
				<h2 id="titulo1">Experiencias de la Zona</h2>
                         <div class="iso-box-section" data-wow-delay="0.6s">
                              <div class="iso-box-wrapper">
                                   @foreach($experiencias as $exper)
                                   <div class="iso-box col-md-4 col-sm-6 col-xs-12">   
                                        <div class="portfolio-thumb">
                                             @foreach($exper->imagenes as $phot)
                                                  <img src="{{ $phot->url_img }}" class="fluid-img" alt="portfolio img">
                                             @endforeach                        
                                             <h4>{{ $exper->nombre_exper }}</h4>
                                             <a href="{{ route('detallexper',$exper->id) }}" class="btn btn-warning">Experiencia</a>
                                             @foreach($exper->productores as $produ)
                                                  <a href="{{ route('personas',$produ->id) }}" class="btn"><b>Productor</b></a>
                                             @endforeach
                                        </div>
                                   </div>
                                   @endforeach
                                   {{ $experiencias->render() }}
                              </div>
                         </div>
			</div>
		</div>
	</div>
</div>
@endsection