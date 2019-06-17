@extends('layouts.barra')

@section('content')		
		<style type="text/css">
		#evento
    	{
	        background: url({{}});
	        background-size: cover;
	        background-repeat: no-repeat;
	        color: #ffffff;
    	}
		</style>
		<div id="evento">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 wow fadeInLeft" data-wow-delay="0.6s">
						<h2><strong>INDAP</strong></h2>
						<p>Servicio dependiente del Ministerio de Agricultura.</p>
						<ul class="social-icon">
							<li><a href="https://es-la.facebook.com/INDAPChile/" class="fa fa-facebook" target="_blank"></a></li>
							<li><a href="https://twitter.com/INDAP_Chile?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="fa fa-twitter" target="_blank"></a></li>
							<li><a href="https://www.instagram.com/indapchile/" class="fa fa-instagram" target="_blank"></a></li>
						</ul>
					</div>				
					<div class="col-md-3 col-sm-4 wow fadeIn" data-wow-delay="0.9s">
						<address>
							<h3>Visite nuestras oficinas</h3>
							<p><i class="fa fa-map-marker too-icon"></i> Agustinas 1465, Santiago de Chile</p>
							<p><i class="fa fa-phone too-icon"></i>+56 2 2303 8000</p>
							<p><i class="fa fa-envelope-o too-icon"></i> indap@indap.cl</p>
						</address>
					</div>
					<div class="col-md-4 col-sm-7 wow fadeIn" data-wow-delay="0.3s">
						<img src="{{ asset('images/logoindap.jpg') }}" class="img-responsive">
					</div>
				</div>
			</div>
		</div>
		<div class="google_map">
			<div id="map-canvas"></div>
		</div>

@endsection
@include('footer');