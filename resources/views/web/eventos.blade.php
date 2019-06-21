@extends('layouts.barra')

@section('content')			
	<div id="evento">
		<div class="container">
			<div class="row">			
				@foreach($eventos as $evento)
					<div class="col-md-12 col-sm-5 wow fadeIn" data-wow-delay="0.9s">
						<h3>{{ $evento->titulo }}</h3>
						<p><i class="fa fa-map-marker too-icon"></i> {{ $evento->ubicacion }}</p>
						<p><i class="fa fa-calendar too-icon"></i>{{ $evento->fecha_ini }} hasta {{ $evento->fecha_ter }}</p>
						<p>{{ $evento->informacion }}</p>
					</div>
					@foreach($evento->imagens as $imag)
						<div class="col-md-3 col-sm-7 wow fadeIn" data-wow-delay="0.3s">
						</div>
						<div class="col-md-6 col-sm-7 wow fadeIn" data-wow-delay="0.3s">
							<img src="{{ $imag->url_img }}" class="img-responsive">
						</div>
							<div class="col-md-3 col-sm-7 wow fadeIn" data-wow-delay="0.3s">
						</div>
					@endforeach	
				@endforeach			
			</div>
			<hr class="style3">
				{{ $eventos->render() }}
		</div>
	</div>
	<div class="google_map">
		<div id="map-canvas"></div>
	</div>
@endsection
@include('footer');