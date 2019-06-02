@extends('layouts.barra')

@section('content')
		<div id="team">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="wow bounce" id="titulo1">Su Gente</h2>
					</div>
					@foreach($productores as $producor)
						@foreach($producor->imagen as $i)
					<div class="col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.3s">
						@endforeach
						<a href="{{ route('personas', $producor->id) }}"><img src="{{ $i->url_img }}" class="img-responsive" alt="team img"></a>		
						
						<h4>{{ $producor->lugar }}</h4>
						<h3>{{ $producor->nombre }}</h3>
						<p>Productos, Experiencias y su zona.</p>
						 <ul class="social-icon text-center">
           					<li><a href="#" class="wow fadeInUp fa fa-facebook" data-wow-delay="2s"></a></li>
          					 <li><a href="#" class="wow fadeInDown fa fa-twitter" data-wow-delay="2s"></a></li>
          					 <li><a href="#" class="wow fadeIn fa fa-instagram" data-wow-delay="2s"></a></li>
       					 </ul>
					</div>	
					@endforeach
					{{ $productores->render() }}
				</div>
			</div>
		</div>
@endsection