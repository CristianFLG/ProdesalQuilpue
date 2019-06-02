@extends('layouts.barra')

@section('content')
<div id="portfolio">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="wow bounce" id="titulo1">Los Frutos de la Zona</h2>
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
@endsection