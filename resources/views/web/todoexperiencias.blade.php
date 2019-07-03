@extends('layouts.barra')

@section('content')
<div id="portfolio">
	<div class="container">
		<div class="row">
               {!! Form::open(['route' => 'searchProductos', 'method' => 'GET', 'class' => 'form-inline'])  !!}
               {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar...']) !!}
               <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
               <a href="{{ route('productos_todos') }}" class="btn btn-primary">
                    <i class="fa fa-refresh"></i>
               </a>
               {!! Form::close() !!}
			<div class="col-md-12 text-center">
				<h2 class="wow bounce" id="titulo1">Experiencias de la Zona</h2>
					<div class="iso-section wow fadeIn" data-wow-delay="0.6s">
               			<div class="iso-box-section">
               				<div class="iso-box-wrapper col4-iso-box">
               				 	@foreach($experiencias as $exper)
               				 	<div class="iso-box graphic photoshop wallpaper col-md-4 col-sm-6 col-xs-12">	
               				 		<div class="portfolio-thumb">
               				 			@foreach($exper->imagenes as $phot)
               				 				<img src="{{ $phot->url_img }}" class="fluid-img" alt="portfolio img">
               				 			@endforeach 					
               				 			<h4>{{ $exper->nombre_exper }}</h4>
               				 				<a href="{{ route('detallexper',$exper->id) }}" class="btn btn-warning">Experiencia</a>
               				 			     @foreach($exper->productores as $produ)
               				 				     <a href="{{ route('personas',$produ->id) }}" class="btn">Productor</a>
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
</div>
@endsection