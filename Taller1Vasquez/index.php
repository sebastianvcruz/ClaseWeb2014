<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>ProjectColab</title>
</head>
<body>
	
<!-- el siguiente codigo se baso un poco en los ejemplos encontrados en la pagina 
http://codingcyber.com/simple-login-script-php-and-mysql-64/# -->

<h1>Ingresa a tu cuenta</h1>
<form action="includes/validarEntrada.php" method="POST">
    <p><label>Nombre del Usuario : </label>
	<input type="text" name="nombreusuario" placeholder="nombre" /></p>
 
    <p><label>Contraseña : </label>
    	<!-- atributo password para no revelar la palabra  -->
	<input type="password" name="contrasena" placeholder="contraseña" /></p>
    <input type="submit" name="submit" value="Ingresa"/>

    <br/>
    <p>Crea una cuenta, <a href="registro.php">Registrate!</a></p>
    </form>
</body>
</html>