@extends('layouts.barra')

@section('content')
<div id="team">
	<div class="container">
		<div class="row">
               <div class="col-md-6 col-sm-4">
               {!! Form::open(['route' => 'searchProductos', 'method' => 'GET', 'class' => 'form-inline'])  !!}
                    
                    {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar...']) !!}

                    <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
                    <a href="{{ route('productos_todos') }}" class="btn btn-primary">
                         <i class="fa fa-refresh"></i>
                    </a>
                    {!! Form::close() !!}
               </div>
			<div class="col-md-12 text-center">
			     <h2 id="titulo1">Los Frutos de la Zona</h2>
                    	<div class="iso-box-section" data-wow-delay="0.6s">
                    		<div class="iso-box-wrapper" >
                    			@foreach($productos as $procut)  
                         			<div class="iso-box col-md-4 col-sm-6 col-xs-12" >
                         				<div class="portfolio-thumb" >
                         				 	@foreach($procut->imagens as $imag)
                         				 	    <img src="{{ $imag->url_img }}" class="fluid-img">
                         				 	@endforeach
                         				 	<h4>{{ $procut->nombre_producto }}/{{ $procut->derivado }}</h4>
                         				 	<a href="{{ route('detalle', $procut->id) }}" class="btn btn-success">Producto</a>
                         				 	@foreach($procut->productors as $prod)
                         				 		<a href="{{ route('personas',$prod->id) }}" class="btn"><b>Productor</b></a>
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
@endsection