@extends('layouts.barra')

@section('content')
<div id="team">
	<div class="container">
		<div class="row">
			@foreach($experiencias->imagenes as $img)
			<div class="col-ms-6 col-sm-6" data-wow-delay="0.3s">
				<img src="{{ $img->url_img }}" >
			</div>
			@endforeach
			<div class="col-ms-6 col-sm-6 " style="text-align: left;">
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
</div>
<div class="col-ms-12" ><img src="{{ asset('images/separator.jpg') }}" style="height:70px; width: 100%"></div>
<div id="portfolio">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="wow bounce">Experiencias de la Zona</h2>
							<div class="iso-section wow fadeIn" data-wow-delay="0.6s">
               				 	<div class="iso-box-section">
               				 		<div class="iso-box-wrapper col4-iso-box">

               				 			@foreach($experiencia as $exper)
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
               				 			{{ $experiencia->render() }}
               				 		</div>
               				 	</div>
							</div>
					</div>
				</div>
			</div>
		</div>

@endsection