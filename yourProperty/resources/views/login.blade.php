<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> <!-- logo -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> <!-- article -->
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet"> <!-- header -->
		<link rel="shortcut icon" href="immagini/shortcuticon.jpg" />
		<link rel='stylesheet' href='{{url("css/rl.css")}}'>
		<script src='{{url("js/menu.js")}}' defer ></script>
		<script src='{{url("js/login.js")}}' defer ></script>
	</head>
	<body>
		<div id="pagina" class="hidden">login</div>
		<header>
			<nav>
				<div class="logo">
					<a>Your Property</a>
				</div>
				<div id="links">
					<a class="link" href="index">Home</a>
					<a class="link" href="registrazione">Registrati</a>
				</div>
				<div id="menu">
					<div></div>
					<div></div>
					<div></div>
				</div>
			</nav>
		</header>
		<section>
			<div id="contenitore">
				@if(isset($old_username))
				<div id='errorephp'>Credenziali non valide</div>
				@endif
				<h4 class='errore' id="errore"></h4>
				<main>
					<form name="form" method="post">
						<input type="hidden" name="_token" value="{{$csrf_token}}">
						<label>Username<input id="username" type="text" name="username" value='{{$old_username}}'></label>
						<label>Password<input type="password" name="password"></label>
						<input id="invio" type="submit" name="invio" value="Accedi">
					</form>
				</main>
			</div>
		</section>
	</body> 
</html>