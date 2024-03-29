@extends('layouts.barra')

@section('content')

<div id="team">
	<div class="container">
		<div class="row">
			@foreach($experiencias->imagenes as $img)
			<div class="col-ms-12 col-sm-12" data-wow-delay="0.3s">
				<img src="{{ $img->url_img }}" >
			</div>
			@endforeach
			<div class="col-ms-12 col-sm-12">
				<h3> {{ $experiencias->nombre_exper }}</h3>
				<h4>Estado Actual: {{ $experiencias->estado_exper }} </h4>
				<h4>Precio Actual: ${{ $experiencias->precio }}</h4>
				@foreach($experiencias->productores as $prod)
					<h4>Productor: <a href="{{ route('personas',$prod->id) }}">{{ $prod->nombre }}</h4></a>
				@endforeach
				<b><p>{{ $experiencias->detalle}}</p></b>
			</div>
		</div>
	</div>
	<hr>
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 id="titulo1">Experiencias de la Zona</h2>
							<div class="iso-section" data-wow-delay="0.6s">
               				 	<div class="iso-box-section">
               				 		<div class="iso-box-wrapper">
               				 			@foreach($experiencia as $exper)
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
               				 			{{ $experiencia->render() }}
               				 		</div>
               				 	</div>
							</div>
					</div>
				</div>
			</div>
		</div>

@endsection