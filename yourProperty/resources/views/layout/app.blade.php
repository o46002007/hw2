<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>@yield('titolo')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		@section('font')
        @show
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> <!-- logo -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> <!-- article -->
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet"> <!-- header -->
		<link rel="shortcut icon" href="immagini/shortcuticon.jpg" />
        @section('css')
        @show
		<script src='{{url("js/menu.js")}}' defer ></script>
        @section('js')
        @show
	</head>
	<body>
    <div id="pagina" class="hidden">@yield('pagina')</div>
		<header>
            @section('overlay')
            @show
			<nav>
				<div class="logo">
					<a>Your Property</a>
				</div>
				<div id="links">
				</div>
				@section('search')
				@show
				<div id="menu">
					<div></div>
					<div></div>
					<div></div>
				</div>
			</nav>
            @section('intestazione')
            @show
		</header>
		<article>
        @section('article')
        @show
        </article>
		<footer>
			<div class="logo">
				<a>Your Property</a>
			</div>
			<div id="matricola">Mattia Cavallaro O46002007</div>
		</footer>
	</body> 
</html>