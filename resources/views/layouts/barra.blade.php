<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Prodesal Quilpué</title>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<!-- animate -->
		<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
		<!-- bootstrap -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<!-- font-awesome -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		<!-- google font -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700,800' rel='stylesheet' type='text/css'>
		<!-- custom -->
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	</head>
	<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">
		<!-- start navigation -->
		<div class="navbar navbar-fixed-top navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
					</button>
					<a href="/" class="navbar-brand"><img src="{{ asset('images/logo-prodesal.jpg') }}" class="img-responsive" alt="logo"></a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="/" class="smoothScroll">INICIO</a>
						</li>
						<li>
							<a href="{{ route('informacion') }}" class="smoothScroll">EVENTOS</a></li>
						<li>
							<a href="{{ route('productores_todos') }}" class="smoothScroll">SU GENTE</a>
						</li>
						<li>
							<a href="{{ route('experiencias_todos') }}" class="smoothScroll">EXPERIENCIAS</a>
						</li>
						<li>
							<a href="{{ route('productos_todos') }}" class="smoothScroll">FRUTOS DE LA ZONA</a>
						</li>
					</ul>
					</div> 
				</div>
			</div>
		<!-- end navigation -->
		@yield('content')
		
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-7">
						<p>Copyright &copy; 2018 Universidad Playa Ancha</p>
						<small>Diseñada por<a rel="nofollow" href="http://www.tooplate.com" target="_parent"> Cristian Flores Gallardo</a></small>
					</div>
					<div class="col-md-4 col-sm-5">
						<ul class="social-icon">
							<li>
								<a href="https://es-la.facebook.com/INDAPChile/" class="fa fa-facebook"></a>
							</li>
							<li>
								<a href="https://twitter.com/indap_chile?lang=es" class="fa fa-twitter"></a>
							</li>
							<li>
								<a href="https://www.instagram.com/indapchile/" class="fa fa-instagram"></a>
							</li>
							@guest
							<li><a href="/login" class="smoothScroll">LOGIN</a></li>
							@else
							<li><a href="/admin" class="smoothScroll">ADMINISTRAR</a></li>
	    					<li>
	                            <a class="dropdown-item" href="{{ route('logout') }}"
	                            onclick="event.preventDefault();
	                            document.getElementById('logout-form').submit();">
	                            {{ __('LOGOUT') }}
	                            </a>
	                               	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                    @csrf
	                               	</form>
	                    	@endguest
	                        </li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
			<!-- jQuery -->
		<script src="{{ asset('js/jquery.js') }}"></script>
		<!-- bootstrap -->
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<!-- isotope -->
		<script src="{{ asset('js/isotope.js') }}"></script>
		<!-- images loaded -->
   		<script src="{{ asset('js/imagesloaded.min.js') }}"></script>
   		<!-- wow -->
		<script src="{{ asset('js/wow.min.js') }}"></script>
		<!-- smoothScroll -->
		<script src="{{ asset('js/smoothscroll.js') }}"></script>
		<!-- jquery flexslider -->
		<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
		<!-- custom -->
		<script src="{{ asset('js/map.js') }}"></script>
</body>
</html>