@extends('layouts.barra')

@section('content')
<div id="team">
	<div class="container">
		<div class="row">
			@foreach($productor->imagen as $product)
			<div class="col-md-5 col-sm-5" data-wow-delay="0.3s">	
				<img src="{{ $product->url_img }}" class="img-responsive" style=" height:300px;">
       		</div>
			@endforeach
			<div class="col-md-7 col-sm-7" style="text-align: left;">
				<h3>{{ $productor->nombre }}</h3>
				@foreach($rubros as $rub)
							@if ($productor->id_rubro == $rub->id)
								<p><b>Tipo de Productos: {{ $rub->nombre_rubro }}</b></p>
							@endif
				@endforeach
				<h4>Numero de Contacto: {{ $productor->telefono }}</h4>
				<p><b>Ubicación: {{ $productor->lugar }}</b></p>
				<ul class="social-icon text-left" >
           			<li><a href="{{ $productor->redes }}" class="fa fa-facebook" data-wow-delay="2s"></a></li>
          			<li><a href="#" class=" fadeInDown fa fa-twitter" data-wow-delay="2s"></a></li>
          			<li><a href="#" class=" fadeIn fa fa-instagram" data-wow-delay="2s"></a></li>
       			</ul>
			</div>
		</div>
	</div>
	<hr>	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
			<h2 id="titulo1">Sus Frutos</h2>
				<div class="iso-section" data-wow-delay="0.6s">
               		<div class="iso-box-section">
               			<div class="iso-box-wrapper">
               				 @foreach($productor->productos as $productos)
               				 	<div class="iso-box graphic photoshop wallpaper col-md-4 col-sm-6 col-xs-12">	
               				 		<div class="portfolio-thumb">
               				 			@foreach($productos->imagens as $img)
               				 				<a href="{{ route('detalle',$productos->id) }}">
               				 					<img src="{{ $img->url_img }}" class="fluid-img" alt="portfolio img">
               				 				</a>
               				 			@endforeach
               				 			<h4>{{ $productos->nombre_producto }}/{{ $productos->derivado }}</h4>
               				 			<h4>$ {{ $productos->precio }}</h4>
               				 		</div>
               				 	</div>
               				 @endforeach
               			</div>
               		</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container persona_division">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 id="titulo1">Experiencias</h2>
				<div class="iso-section" data-wow-delay="0.6s">
               		<div class="iso-box-section">
               				@foreach($productor->experiencias as $exper)
               				 	<div class="iso-box col-md-4 col-sm-6 col-xs-12">	
               				 		<div class="portfolio-thumb">
               				 			@foreach($exper->imagenes as $phot)
               				 				<a href="{{ route('detallexper',$exper->id) }}"><img src="{{ $phot->url_img }}" class="fluid-img" alt="portfolio img">
               				 				</a>
               				 			@endforeach
               				 			<h4>{{ $exper->nombre_exper }}</h4>
               				 			<h4>$ {{ $exper->precio }}</h4>
               				 		</div>
               				 	</div>
               				 @endforeach
               		</div>
				</div>
			</div>
		</div>
	</div>	
</div>
		
<div class="division"></div>		

<div class="google_map">
	<div id="map-canvas"></div>
</div>

@endsection
@include('footer');
