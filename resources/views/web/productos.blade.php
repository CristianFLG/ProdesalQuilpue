@extends('layouts.barra')

@section('content')
<div id="team">
	<div class="container">
		<div class="row">
			@foreach($productos->imagens as $img)
			<div class="col-ms-6 col-sm-6" data-wow-delay="0.3s">
				<img src="{{ $img->url_img }}">
			</div>
			@endforeach
			<div class="col-ms-6 col-sm-6 col-xs-12" style="text-align: left;">
				<h3>{{ $productos->derivado }} {{ $productos->nombre_producto }}</h3>
				<h4>Cantidad Producida: {{ $productos->stock }} {{ $productos->medida }} </h4>
				<h4>Valor: ${{ $productos->precio }}</h4>
				@foreach($productos->productors as $prod)
					<h4>Productor: <a href="{{ route('personas',$prod->id) }}">{{ $prod->nombre }}</h4></a>
					<h4>Contacto: {{ $prod->telefono }}</h4>
				@endforeach
			</div>
		</div>
	</div>
</div>

<div class="col-ms-12" ><img src="{{ asset('images/separator.jpg') }}" style="height:70px; width: 100%"></div>
		<div id="portfolio">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="wow bounce">Relacionados</h2>
							<div class="iso-section wow fadeIn" data-wow-delay="0.6s">
               				 	<div class="iso-box-section">
               				 		<div class="iso-box-wrapper col4-iso-box">

               				 			
										@foreach($producto_rubro as $relation)
               				 			<div class="iso-box graphic photoshop wallpaper col-md-4 col-sm-6 col-xs-12">	
               				 				<div class="portfolio-thumb">

               				 					@foreach($relation->imagens as $img)
               				 					<a href="{{ route('detalle',$relation->id) }}">
               				 						<img src="{{ $img->url_img }}" class="fluid-img" alt="portfolio img">
               				 					</a>
               				 					@endforeach

               				 					<h4>{{ $relation->nombre_producto }}/{{ $relation->derivado }}</h4>
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
@endsection