<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
	<!-- Maps -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet'>
      <!-- Mapbox GL JS -->
      <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.js'></script>
      <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.css' rel='stylesheet'>
      <!-- Geocoder plugin -->
      <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.0.1/mapbox-gl-geocoder.js'></script>
      <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.0.1/mapbox-gl-geocoder.css' type='text/css' />
      <!-- Turf.js plugin -->
      <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
      <!-- file aku -->
      <link rel='stylesheet' href='css/style.css' type='text/css'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto:700');
body
{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
}
nav
{
	position: fixed;
	top: 0;
	left: 0;
	z-index: 3;
	background-color: #337AB7;
	width: 100%;
	height: 100px;
	padding: 10px 100px;
	box-sizing: border-box;
	-webkit-box-shadow: 0px 1px 5px 0px rgba(56,56,56,1);
}
nav.black
{
	background: #3cacfc;
	height: 80px;
	padding: 10px 50px;
}
nav .logo
{
	float: left;
}
nav.black .logo img
{
	height: 65px;
}
nav .logo img
{
	height: 80px;
}
nav ul
{
	float: right;
	margin: 0;
	padding: 0;
	height:50px;
	display: flex;
}
nav ul li
{
	list-style: none;
}
nav ul li a
{
	line-height: 80px;
	color: white;
	padding: 5px 30px;
	font-family: 'Roboto', sans-serif;
	text-decoration: none;
	text-transform: uppercase;

}
nav.black ul li a
{
	color: #fff;
	line-height: 60px;
}
nav ul li a.active,
nav ul li a:hover
{
	color: #0442a5;
	margin-top:1px;
	transition:0.5s;
}
section .sec1
{
	width: 100%;
	height: 100vh;
	background: url(bg1.jpg);
	background-size: cover; 
}
section .sec2
{
	width: 100%;
	height: 100vh;
	background: url(bg2.png);
	background-size: cover; 
}
section.content
{
	padding: 100px;
}
section.content h1
{
	margin: 0;
	padding: 0;
	font-size: 2em;
}
section.content p
{
	margin: 20px 0 0;
	padding: 0;
	font-size: 1.1em;
}
</style>
<nav>
			<div class="logo">
			<a href="/">
				<img src="img/Logo Nyayurs 2.png">
			</a>
			</div>
			<ul>
			<li><a href="/home">Home</a></li>
			<li><a href="/artikel">Artikel</a></li>
					@guest
                    	        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @endif
                        @else
                            	<li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        @endguest
			</ul>
		</nav>
    @yield('content')
</body>
</html>