<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Registro</h1>
<form action="includes/registrousuario.php" method="POST">
    <p><label>Nombre : </label>
	<input type="text" name="nombre" placeholder="Nombre" /></p>
	
	<p><label>Apellido : </label>
	 <input type="text" name="apellido" placeholder="Apellido"/></p>

	<p><label>Nombre de Usuario : </label>
	<input type="text" name="nombreusuario" placeholder="Nombre usuario" /></p>
 
    <p><label>Contraseña : </label>
	<input type="password" name="contrasena" placeholder="Contraseña" /></p>
 
    <input type="submit" value="Registrar" />
    <br/><br/><br/>
    <a href="index.php">Home</a>
    </form>

</body>
</html>