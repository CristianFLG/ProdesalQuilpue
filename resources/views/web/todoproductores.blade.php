@extends('layouts.barra')

@section('content')
		<div id="team">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-4">
						{!! Form::open(['route' => 'searchProductors', 'method' => 'GET', 'class' => 'form-inline'])  !!}
	                        	{!! Form::select('search',$listarubro,null, ['class' => 'form-control']) !!}
	                        	<button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
	                        	<a href="{{ route('productores_todos') }}" class="btn btn-primary">
	                            	<i class="fa fa-refresh"></i>
	                        	</a>
	                    	{!! Form::close() !!}
                    	</div>
					<div class="col-md-12 text-center">
						<h2 id="titulo1">Su Gente</h2>
	                         	<div class="iso-box-section" data-wow-delay="0.6s">
		                           	<div class="iso-box-wrapper">
										@foreach($productores as $producor)
											@foreach($producor->imagen as $i)
												<div class="iso-box col-md-4 col-sm-6 col-xs-12">	
                    								<div class="portfolio-thumb">
										@endforeach
													<a href="{{ route('personas', $producor->id) }}">
														<img src="{{ $i->url_img }}" class="img-responsive" alt="team img">
													</a>
													<h3>{{ $producor->nombre }}</h3>
													@foreach($rubros as $rub)
														@if ($producor->id_rubro == $rub->id)
															<h4>
																Tipo de Productos: {{ $rub->nombre_rubro }}
															</h4>
														@endif
													@endforeach
													<h4>{{ $producor->lugar }}</h4>
													</div>
												</div>	
											@endforeach
									{{ $productores->render() }}
									</div>
								</div>
					</div>
				</div>
			</div>
		</div>

		<div class="division"></div>
		<div class="google_map">
			<div id="map-canvas"></div>
		</div>
@endsection
@include('footer');