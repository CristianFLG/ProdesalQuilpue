@extends('layouts.barra')

@section('content')

<div id="service">		
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="titulo2">¿QUE HACER EN COLLIGUAY?</h2>								
					</div>	
				<div id="service_sub">
					<a href="">
						<div class="col-md-4 block block-1">
							<div class="layer">
								<H3>CAMPING</H3>
							</div>
						</div>
					</a>
					<div class="col-md-4 block block-2">
						<div class="layer">
							<H3>SENDERISMO</H3>
						</div>
					</div>
					<div class="col-md-4 block block-3">
						<div class="layer">
							<H3>CABALGATA</H3>
						</div>
					</div>
					<div class="col-md-4 block block-4">
						<div class="layer">
							<H3>FESTIVAL</H3>
						</div>
					</div>
					<div class="col-md-4 block block-5">
						<div class="layer">
							<H3>ALOJAMIENTO</H3>
						</div>
					</div>
					<div class="col-md-4 block block-6">
						<div class="layer">
							<H3>VISITAS GUIADAS</H3>
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