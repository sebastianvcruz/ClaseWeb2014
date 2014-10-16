<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php  
	include_once("database.php");
		$nombre =$_POST["nombre"];
		$apellido =$_POST["apellido"];
		$nombreUsuario =$_POST["nombreusuario"];
		$contrasena = $_POST["contrasena"];
		// echo "<p>llegando Info<p>";
		// implemento este condicinal para saber si falta algun tipo de informacion en el registro
		if(empty($nombre)||empty($apellido)||empty($nombreUsuario)||empty($contrasena)){
			echo "<p>Error, informacion incompleta a la hora de registrarte <p>";
			//especifico que falta
			if(empty($nombre))echo"<p>Falta tu nombre</p>";
			if(empty($apellido))echo"<p>Falta tu apellido</p>";
			if(empty($nombreUsuario))echo"<p>Falta tu nombre de usuario</p>";
			if(empty($contrasena))echo"<p>Falta tu contrasena</p>";
			echo "<FORM><INPUT Type='button' VALUE='Atras' onClick='history.go(-1);return true';></FORM>";
		}else{
			//reviso si existe un usuario con el mismo nombre 
			//referencia de http://codingcyber.com/simple-login-script-php-and-mysql-64/#
			$query = "SELECT * FROM taller1web.usuarios WHERE nombreusuario='$nombreUsuario'";
			//$query = "SELECT * FROM taller1web.usuarios WHERE  1";
			$resultados = mysqli_query($con,$query);
			//ve cuantos existen con el mismo usuario
			$cuenta = mysqli_num_rows($resultados);
				if ($cuenta >= 1){
					echo "<p>El nombre de usuario ya existe, intenta otro</p>";
					echo "<FORM><INPUT Type='button' VALUE='Atras' onClick='history.go(-1);return true';></FORM>";
				}else{
					//cuando el se verifica que el user no esta repetido entonces se agrega a la basede datos 
					echo "<p>Nombre de usuario valido</p>";
					$registrar="INSERT INTO taller1web.usuarios(`id`, `nombre`, `apellido`, `nombreUsuario`, `clave`) 
					VALUES ('','$nombre','$apellido','$nombreUsuario','$contrasena')";
					$bdinsert= mysqli_query($con,$registrar);
					//creo un boton para guiar el usuario a su perfil
					echo " <form action='../usuarioMain.php' method='GET'>
					<input type='hidden' name='nombreUsuario' value='$nombreUsuario'/>
					<input type='submit' value='Ir a mi perfil'/>
					</form>";
				}
			}
	?>
</body>
</html>