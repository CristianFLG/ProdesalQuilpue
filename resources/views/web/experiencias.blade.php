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
			</div>
		</div>
	</div>
</div>
<div class="col-ms-12" ><img src="{{ asset('images/separator.jpg') }}" style="height:70px; width: 100%"></div>

@endsection