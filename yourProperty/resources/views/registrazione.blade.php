<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registrazione</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> <!-- logo -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> <!-- article -->
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet"> <!-- header -->
		<link rel="shortcut icon" href="immagini/shortcuticon.jpg" />
		<link rel='stylesheet' href='{{url("css/rl.css")}}'>
		<script src='{{url("js/menu.js")}}' defer ></script>
		<script src='{{url("js/registrazione.js")}}' defer ></script>
	</head>
	<body>
		<div id="pagina" class="hidden">registrazione</div>
		<header>
			<nav>
				<div class="logo">
					<a>Your Property</a>
				</div>
				<div id="links">
					<a class="link" href="index">Home</a>
					<a class="link" href="login">Login</a>
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
				@if(isset($old_nome))
				<div id='errorephp'>Cambia credenziali</div>
				@endif
				<h4 class='errore' id="errore"></h4>
				<main>
					<form name="form" method="post">
						<input type="hidden" name="_token" value="{{$csrf_token}}">
						<label>Nome<input id="nome" type="text" name="nome" value='{{$old_nome}}'></label>
						<label>Cognome<input id="cognome" type="text" name="cognome" value='{{$old_cognome}}'></label>
						<label>Username<input id="username" type="text" name="username"></label>
						<span id="spanUsername"></span>
						<label>Password<input id="password" type="password" name="password"></label>
						<label>Conferma password<input id="confermaPassword" type="password" name="confermapassword"></label>
						<input id="invio" type="submit" name="invio" value="Registrati"><br>
					</form>
				</main>
			</div>
		</section>
	</body> 
</html>