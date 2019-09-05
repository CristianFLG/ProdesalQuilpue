@extends('layouts.barra')

@section('content')			
	<div id="evento">
		<div class="container">
			@foreach($eventos as $evento)
			<div class="row">
			<div class="col-md-12 text-center">
				<h2 id="titulo1">Próximos Eventos</h2>
			</div>			
				<div class="col-md-12 col-sm-5" data-wow-delay="0.9s">
					<h3 style="text-align: center">{{ $evento->titulo }}</h3>
					<p><i class="fa fa-map-marker too-icon"></i> {{ $evento->ubicacion }}</p>
					<p><i class="fa fa-calendar too-icon"></i><b>{{ $evento->fecha_ini }}</b> hasta <b>{{ $evento->fecha_ter }}</b></p>
					<p>{{ $evento->informacion }}</p>
				</div>
				
				@foreach($evento->imagens as $imag)
					<div class="col-md-4 col-sm-4 " data-wow-delay="0.3s">
						<img src="{{ $imag->url_img }}" class="img-responsive">
					</div>
				@endforeach		
			</div>
			<hr class="style3">
			@endforeach
			{{ $eventos->render() }}
		</div>
	</div>
	<div class="division"></div>
	<div class="google_map">
		<div id="map-canvas"></div>
	</div>
@endsection
@include('footer');