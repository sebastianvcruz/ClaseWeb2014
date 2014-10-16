<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="assets/icono.ico" >
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Lorem Beer: Welcome!</title>
	</head>
	<body>
		<video autoplay="" loop="" poster="" id="videoFondo">
			<source src="assets/video/pouring.mp4" type="video/mp4"/>
		</video>
		<header>
			<figure>
				<img src="assets/logo.svg" alt="Lorem Beer" class="logoMain animatedl zoomIn"/>
			</figure> 
		</header>
		<div class="textoIntro animated bounceInLeft">
			<p>Try to program with a “Lorm Beer” next</p>
			<p>to you. You will expiriense a boost in</p>
			<p>your creativity and your lines of code</p>
			<p>will fly.</p>
			<br/>
			<p>Buy one from our catalog now!</p>
			<br/>
			<p>Please drink resposably</p>
		</div>
		<!-- Referencia:http://codepen.io/m412c0/pen/qahmr?editors=110 -->
		<div id="login" class="animated bounceInRight">
		<h2>Log In</h2>
		<form action="includes/validarEntrada.php" method="POST">
			<fieldset>

				<p><label for="Username">User name</label></p>
				<p><input type="text" name="username" placeholder="Username"></p> 

				<p><label for="password">Password</label></p>
				<p><input type="password" name="password" placeholder="password"></p> 

				<p><input type="submit" value="Log In"></p>

			</fieldset>
		</form>

	</div> <!-- end login -->
	<footer>
		<p>Sebastian Vasquez 2014</p>
	</footer>
	</body>
</html>