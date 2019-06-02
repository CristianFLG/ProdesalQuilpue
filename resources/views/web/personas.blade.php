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
			<div class="col-md-5 col-sm-5" style="text-align: left;">
				<h3>{{ $productor->nombre }}</h3>
				<h4>Numero de Contacto: {{ $productor->telefono }}</h4>
				<h4>Lugar: {{ $productor->lugar }}</h4>
				<ul class="social-icon text-left" >
           			<li><a href="#" class="wow fadeInUp fa fa-facebook" data-wow-delay="2s"></a></li>
          			<li><a href="#" class="wow fadeInDown fa fa-twitter" data-wow-delay="2s"></a></li>
          			<li><a href="#" class="wow fadeIn fa fa-instagram" data-wow-delay="2s"></a></li>
       			</ul><br>
       			<p>historia de familia: </p>
			</div>
		</div>
	</div>
</div>
<div class="col-ms-12" ><img src="{{ asset('images/separator.jpg') }}" style="height:70px; width: 100%"></div>
	<div class="col-md-12" ><br><br></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="wow bounce">Productos</h2>
							<div class="iso-section wow fadeIn" data-wow-delay="0.6s">
               				 	<div class="iso-box-section">
               				 		<div class="iso-box-wrapper col4-iso-box">

               				 			@foreach($productor->productos as $productos)
               				 			<div class="iso-box graphic photoshop wallpaper col-md-4 col-sm-6 col-xs-12">	
               				 				<div class="portfolio-thumb">

               				 					@foreach($productos->imagens as $img)
               				 					<a href="{{ route('detalle',$productos->id) }}">
               				 						<img src="{{ $img->url_img }}" class="fluid-img" alt="portfolio img"></a>
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
		<div class="col-md-12" ><br><br></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="wow bounce">Experiencias</h2>
							<div class="iso-section wow fadeIn" data-wow-delay="0.6s">
               				 	<div class="iso-box-section">
               				 		<div class="iso-box-wrapper col4-iso-box">

               				 			@foreach($productor->experiencias as $exper)
               				 			<div class="iso-box graphic photoshop wallpaper col-md-4 col-sm-6 col-xs-12">	
               				 				<div class="portfolio-thumb">

               				 					@foreach($exper->imagenes as $phot)
               				 					<a href="{{ route('detallexper',$exper->id) }}"><img src="{{ $phot->url_img }}" class="fluid-img" alt="portfolio img"></a>
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
		</div>
	</div>
		<div class="google_map">
			<div id="map-canvas"></div>
		</div>
@endsection
