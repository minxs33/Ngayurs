<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->

	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600" rel="stylesheet">
	
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main.css">
    <!-- CSRF Token -->
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>


    <!-- Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js">
	</script>
	<script>
	new WOW().init();
	</script>
	<script src="{{ asset('js/app.js') }}" defer></script>
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
	<link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
	<script
			  src="http://code.jquery.com/jquery-3.3.1.js"></script>
		<script type="text/javascript">
			$(window).on('scroll', function(){
				if($(window).scrollTop()){
					$('nav').addClass('black');
				}
				else
				{
					$('nav').removeClass('black');
				}
			})
		</script>
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
			<li><a href="/">Home</a></li>
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
