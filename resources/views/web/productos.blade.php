@extends('layouts.barra')

@section('content')

<div id="team">
	<div class="container">
		<div class="row">
			<div class="col-ms-12 col-sm-12" data-wow-delay="0.3s">
						@foreach($productos->imagens as $img)
					    	<img src="{{ $img->url_img }}"/ style="position: relative;">
					    @endforeach
			</div>	
			<div class="col-ms-12 col-sm-12 col-xs-12 text-center">
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

			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 id="titulo1">Relacionados</h2>
               				 	<div class="iso-box-section" data-wow-delay="0.6s">
               				 		<div class="iso-box-wrapper">	 			
										@foreach($producto_rubro as $relation)
											@if($relation->id != $productos->id)
		               				 			<div class="iso-box col-md-4 col-sm-6 col-xs-12">	
		               				 				<div class="portfolio-thumb">
		               				 					@foreach($relation->imagens as $img)
		               				 					<a href="{{ route('detalle',$relation->id) }}">
		               				 						<img src="{{ $img->url_img }}" class="fluid-img" alt="portfolio img">
		               				 					</a>
		               				 					@endforeach
		               				 					<h4>{{ $relation->nombre_producto }}/{{ $relation->derivado }}</h4>
		               				 				</div>
		               				 			</div>
	               				 			@endif
               				 			@endforeach
               				 		</div>
               				 	</div>
					</div>
				</div>
			</div>
		</div>    
@endsection