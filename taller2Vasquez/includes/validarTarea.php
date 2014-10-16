<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Validar Tarea</title>
</head>
<body>
	<?php 
	include_once("database.php");
		$nombre =$_POST["nombre"];
		$descripcion =$_POST["descripcion"];
		$prioridad =$_POST["prioridad"];
		$fechaInicio = $_POST["fechainicio"];
		$fechaTermnar = $_POST["fechaterminar"];
		$creador = $_POST["creador"];
		$asignado = $_POST["nombreAsignar"];
		//para ver si todo llego
		if(empty($nombre)||empty($descripcion)||empty($prioridad)||empty($fechaInicio)||empty($fechaTermnar)||empty($creador)){
			echo "<h2>Error, informacion incompleta a la hora de crear tarea </h2>";
			//especifico que falta
			if(empty($nombre))echo"<p>Falta nombre</p>";
			if(empty($descripcion))echo"<p>Falta descripcion</p>";
			if(empty($prioridad))echo"<p>Falta prioridad</p>";
			if(empty($fechaInicio))echo"<p>Falta fecha de inicio</p>";
			if(empty($fechaTermnar))echo"<p>Falta fecha de terminar</p>";
		}else{
			echo "<h1>Tarea Valida!</h1>";
			//insertar a base de datos
			$registrar="INSERT INTO taller1web.trabajos(`id`, `nombre`, `creador`, `prioridad`, `descripcion`, `fechainicio`, `fechafinal`) 
			VALUES ('','$nombre','$creador','$prioridad','$descripcion','$fechaInicio','$fechaTermnar')";
			//inserta en otra tabla las asignaciones de los trabajos
			$registrar2= "INSERT INTO taller1web.listatrabajos(`idtrabajo`, `idusuario`) VALUES ('','$asignado')";
			$bdinsert= mysqli_query($con,$registrar);
			$bdinsert2= mysqli_query($con,$registrar2);
			//creo un boton para guiar el usuario a su perfil
			echo " <p>Registrada!</p><br/><form action='../usuarioMain.php' method='GET'>
			<input type='hidden' name='nombreUsuario' value='$creador'/>
			<input type='submit' value='Ir a mi perfil'/>
			</form>";
		}
	 ?>
</body>
</html>