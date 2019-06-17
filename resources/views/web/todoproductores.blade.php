@extends('layouts.barra')

@section('content')
		<div id="team">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="wow bounce" id="titulo1">Su Gente</h2>
					</div>
						  <div class="col-md-12">
                        {!! Form::open(['route' => 'searchProductor', 'method' => 'GET', 'class' => 'form-inline'])  !!}

                        {!! Form::select('search',$listarubro,null, ['class' => 'form-control']) !!}

                        <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
                        <a href="{{ route('productores_todos') }}" class="btn btn-primary">
                            <i class="fa fa-refresh"></i>
                        </a>
                        {!! Form::close() !!}
                        
					</div>
					@foreach($productores as $producor)
						@foreach($producor->imagen as $i)
					<div class="col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.3s">
						@endforeach
						<a href="{{ route('personas', $producor->id) }}"><img src="{{ $i->url_img }}" class="img-responsive" alt="team img"></a>
						<h3>{{ $producor->nombre }}</h3>
						@foreach($rubros as $rub)
							@if ($producor->id_rubro == $rub->id)
								<h4>Tipo de Productos: {{ $rub->nombre_rubro }}</h4>
							@endif
						@endforeach
						<h4>{{ $producor->lugar }}</h4>
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
		<hr class="style3">
		<div class="google_map">
			<div id="map-canvas"></div>
		</div>
@endsection
@include('footer');