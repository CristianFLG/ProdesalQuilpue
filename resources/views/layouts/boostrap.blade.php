<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>Prodesal Quilpué</title>

		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">

		<!-- animate -->
		<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
		<!-- bootstrap -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<!-- font-awesome -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		<!-- google font -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	</head>

	<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">
	@extends('layouts.barra')

	@section('content')
		<!-- start home -->
		<section id="home" class="text-center">
		  	<div class="templatemo_headerimage">
		    	<div class="flexslider">
			      	<ul class="slides">
			      		@foreach($portadas as $imagenes)
			      			@if($imagenes->estado == 'ACTIVA')
			      				@foreach($imagenes->imagens as $img)
				        			<li>
				        				<img src="{{ asset($img->url_img) }}">
				        			</li>
			        			@endforeach
			        		@endif
			        	@endforeach
			      	</ul>
		    	</div>
		  	</div>				
		</section>
		<!-- end home -->

		<!-- start DEFINICION DE CONTENIDO -->
		<div id="service">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="media">
							<div class="media-object media-left wow fadeIn" data-wow-delay="0.1s">
								<i class="fa fa-envira"></i>
							</div>
							<div class="media-body wow fadeIn">
								<h3 class="media-heading">Experiencias</h3>
								<p>Las experiencias otorgan la oportunidad a la gente de experimentar lo que es vivir en Colliguay.</p>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4">
						<div class="media">
							<div class="media-object media-left wow fadeIn" data-wow-delay="0.3s">
								<i class="fa fa-group"></i>
							</div>
							<div class="media-body wow fadeIn">
								<h3 class="media-heading">Productores</h3>
								<p>Gente posee un gran corazón para dar y recibir, ya sea en sus productos como en las experiencias que pueden entregar.</p>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4">
						<div class="media">
							<div class="media-object media-left wow fadeIn" data-wow-delay="0.6s">
								<i class="fa fa-shopping-cart"></i>
							</div>
							<div class="media-body wow fadeIn" data-wow-delay="0.3s">
								<h3 class="media-heading">Productos</h3>
								<p>Los productos de la gente de Colliguay salen de la tierra sin ningún tipo de producto artificial de por medio.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="media">
							<div class="media-object media-left wow fadeIn" data-wow-delay="0.9s">
								<i class="fa fa-handshake-o"></i>
							</div>
							<div class="media-body wow fadeIn" data-wow-delay="0.6s">
								<h3 class="media-heading">INDAP</h3>
								<p>Pretende terminar con la pobreza rural, generando políticas de desarrollo sustentable al campesinado.</p>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4">
						<div class="media">
							<div class="media-object media-left wow fadeIn" data-wow-delay="0.4s">
								<i class="fa fa-flag"></i>
							</div>
							<div class="media-body wow fadeIn" data-wow-delay="0.3s">
								<h3 class="media-heading">Colliguay</h3>
								<p>El Valle de Colliguay es el lugar perfecto para aventurarse y vivir una experiencia única e inolvidable.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="media">
							<div class="media-object media-left wow fadeIn" data-wow-delay="0.8s">
								<i class="fa fa-info"></i>
							</div>
							<div class="media-body wow fadeIn" data-wow-delay="0.6s">
								<h3 class="media-heading">Eventos </h3>
								<p>se realizan eventos por INDAP para los pequeños agricultores de colliguay puedan acercarce al publico.</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- end service -->

		<!-- start divider -->
		<div id="divider">
			<div class="container">
				<div class="row">
					<div class="col-md-1 col-sm-1"></div>
					<div class="col-md-8 col-sm-8">
						<h2 class="wow bounce">Muestra de <strong>Esfuerzo</strong></h2>
						<h3 class="wow fadeIn" data-wow-delay="0.6s"><mark>Expresamos</mark> Nuestra  <mark>Vida</mark> en esta Página</h3>
					</div>
					<div class="col-md-2 col-sm-2"></div>
				</div>
			</div>
		</div>
		<!-- end divider -->

		<!-- start Proveedores -->
		<div id="team">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="wow bounce">Su Gente</h2>
					</div>
					@foreach($productores as $producor)
							@foreach($producor->imagen as $i)
							@endforeach

							
					<div class="col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.3s">						
						<a href="{{ route('personas', $producor->id) }}"><img src="{{ $i->url_img }}" class="img-responsive" alt="team img" ></a>		
						<h3>{{ $producor->nombre }}</h3>
						@foreach($rubros as $rub)
							@if ($producor->id_rubro == $rub->id)
								<b>Productor de:<p> {{ $rub->nombre_rubro }}</p></b>
							@endif
						@endforeach
					</div>	
					@endforeach
					{{ $productores->render() }}
				</div>
			</div>
		</div>
		<!-- end team -->

		<!-- start newsletter -->
		<div id="newsletter">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title">
							<h2 class="wow bounce">Recibe nuestras novedades</h2>
							<p class="wow fadeIn" data-wow-delay="0.6s">envía tu correo para mayor información sobre lo que estamos haciendo.</p>
						</div>
						<form action="#" method="get" class="wow fadeInUp" data-wow-delay="0.9s">
							<div class="col-md-3 col-sm-3"></div>
							<div class="col-md-4 col-sm-4">
								<input name="email" type="email" class="form-control" id="email" placeholder="Ingresa tu Email">
							</div>
							<div class="col-md-2 col-sm-2">
								<input name="submit" type="submit" class="form-control" id="submit" value="Enviar">
							</div>
							<div class="col-md-3 col-sm-3"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end newsletter -->

		<!-- start portfolio -->
		<div id="portfolio">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="wow bounce">Los Frutos de la Zona</h2>
							<div class="iso-section wow fadeIn" data-wow-delay="0.6s">
               				 	<div class="iso-box-section">
               				 		<div class="iso-box-wrapper col4-iso-box">

               				 			@foreach($productos as $procut)
               				 			<div class="iso-box graphic photoshop wallpaper col-md-4 col-sm-6 col-xs-12">	
               				 				<div class="portfolio-thumb">

               				 					@foreach($procut->imagens as $imag)
               				 					<img src="{{ $imag->url_img }}" class="fluid-img" alt="portfolio img">
               				 					@endforeach

               				 					<h4>{{ $procut->nombre_producto }}/{{ $procut->derivado }}</h4>
               				 					<a href="{{ route('detalle', $procut->id) }}" class="btn btn-success">Producto</a>
               				 					@foreach($procut->productors as $prod)
               				 					<a href="{{ route('personas',$prod->id) }}" class="btn">Productor</a>
               				 					@endforeach
               				 				</div>
               				 			</div>
               				 			@endforeach
               				 			{{ $productos->render() }}
               				 		</div>
               				 	</div>
							</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end portfolio -->

		<!-- start contact -->
		<div id="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 wow fadeInLeft" data-wow-delay="0.6s">
						<h2><strong>INDAP</strong></h2>
						<p>Servicio dependiente del Ministerio de Agricultura.</p>
						<ul class="social-icon">
							<li><a href="https://es-la.facebook.com/INDAPChile/" class="fa fa-facebook" target="_blank"></a></li>
							<li><a href="https://twitter.com/INDAP_Chile?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="fa fa-twitter" target="_blank"></a></li>
							<li><a href="https://www.instagram.com/indapchile/" class="fa fa-instagram" target="_blank"></a></li>
						</ul>
					</div>				
					<div class="col-md-3 col-sm-4 wow fadeIn" data-wow-delay="0.9s">
						<address>
							<h3>Visite nuestras oficinas</h3>
							<p><i class="fa fa-map-marker too-icon"></i> Agustinas 1465, Santiago de Chile</p>
							<p><i class="fa fa-phone too-icon"></i>+56 2 2303 8000</p>
							<p><i class="fa fa-envelope-o too-icon"></i> indap@indap.cl</p>
						</address>
					</div>
					<div class="col-md-4 col-sm-7 wow fadeIn" data-wow-delay="0.3s">
						<img src="{{ asset('images/logoindap.jpg') }}" class="img-responsive">
					</div>
				</div>
			</div>
		</div>
		<!-- Experiencias -->
		<div id="portfolio">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="wow bounce">Experiencias de la Zona</h2>
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
		<!-- start google map -->
		<div class="google_map">
			<div id="map-canvas"></div>
		</div>
		<!-- end google map -->
		
		@endsection			
		@include('footer');
	</body>
</html>