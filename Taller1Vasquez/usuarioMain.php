<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>myPerfil</title>

</head>
<body>
	<?php  
	include_once("includes/database.php");
	if(isset($_GET["nombreUsuario"])){
	$nombreUsuario=$_GET["nombreUsuario"];
	$queryNombres= " SELECT usuarios.nombre AS nombre, usuarios.apellido AS apellido 
	FROM taller1web.usuarios WHERE usuarios.nombreUsuario='$nombreUsuario'";
		$resultados = mysqli_query($con,$queryNombres);
		//Referencia: http://www.w3schools.com/php/func_mysqli_fetch_row.asp
        $nombres=mysqli_fetch_row($resultados);
		echo "<h1>Hola ".$nombres[0]." ".$nombres[1]."!</h1><br/>";
		//echo "<h2><u>Crear Tarea</u></h2>";
	}else{
		echo "<p>error al identificar usuario</p>";

	}
	?>
	<h2><u>Tus trabajos asignadas ordenados por priordad</u></h2>
	<?php 
		$queryMisTrabajos= "SELECT usuarios.nombreUsuario AS usuario, trabajos.nombre AS nombreTrabajo, trabajos.prioridad 
		AS prioridad, trabajos.fechainicio AS fecha FROM taller1web.trabajos 
		JOIN taller1web.listatrabajos ON trabajos.id=listatrabajos.idtrabajo 
		JOIN taller1web.usuarios ON listatrabajos.idusuario = usuarios.nombreUsuario WHERE usuarios.nombreUsuario='$nombreUsuario'ORDER BY trabajos.prioridad";
		$resultadosTrabajos = mysqli_query($con,$queryMisTrabajos);
		while($trabajos = mysqli_fetch_array($resultadosTrabajos)){ 
			//condicion para convertir el valor numerico de prioridad en una palabra
			if($trabajos["prioridad"]==1){
				$prio='alta';
			}else if($trabajos["prioridad"]==2){
				$prio='media';
			}else if($trabajos["prioridad"]==3){
				$prio='baja';
			}
			echo "<p><strong>Nombre: </strong>".$trabajos["nombreTrabajo"]." - <strong>Prioridad:</strong> ".$prio." - <strong>Fecha:</strong> ".$trabajos["fecha"].
			"</p>";
		}
	 ?>

	<h2><u>Crear Tarea</u></h2>
	<form action="includes/validarTarea.php" method="POST">
		<p><label>Nombre de la Tarea: </label>
		<input type="text" name="nombre" placeholder="Nombre de la tarea" /></p>

		<p><label>Descripción: </label><br/>
		<textarea name="descripcion" rows="6" cols="30">Descripción de la tarea</textarea></p>

    	<p><label>Prioridad: </label>
		<input type="radio" name="prioridad" value="3">Baja
		<input type="radio" name="prioridad" value="2">Media
		<input type="radio" name="prioridad" value="1">Alta</p>;
		<p><label>Fecha de Inicio: </label>
		<input type="date" name="fechainicio"/></p>
		<p><label>Fecha para Terminar: </label>
		<input type="date" name="fechaterminar"/></p>
		<?php 
		echo "<label>Asignar tarea a: </label>
   			<SELECT NAME=nombreAsignar>";
			$queryUsuarios = "SELECT usuarios.nombreUsuario FROM taller1web.usuarios";
			$resultados = mysqli_query($con,$queryUsuarios);
				while($row = mysqli_fetch_array($resultados)){
					$seleccionNombre=$row["nombreUsuario"];
					echo "<OPTION VALUE=".$seleccionNombre.">".$seleccionNombre."</OPTION>'";
				}
        	echo "</SELECT><br/><br/>";
		 ?>
		 <!-- casi me mato encontrando como pasar la informacion de variables con este input -->
		<input type="hidden" name="creador" value="<?php echo $nombreUsuario; ?>"/>

		<input type="submit" name="submit" value="Crear"/>

	</form><br/><br/>
	<h2><u>Ver trabajos de otros Usuarios</u></h2>
	<form action="includes/trabajosUsuarios.php" method="GET">
	<?php 

		echo "<label>Otros usuarios: </label>
   			<SELECT NAME=nombreAsignar2>";
			$queryUsuarios2 = "SELECT usuarios.nombreUsuario FROM taller1web.usuarios";
			$resultados2 = mysqli_query($con,$queryUsuarios2);
				while($row2 = mysqli_fetch_array($resultados2)){
					$seleccionNombre2=$row2["nombreUsuario"];
					echo "<OPTION VALUE=".$seleccionNombre2.">".$seleccionNombre2."</OPTION>'";
				}
        	echo "</SELECT><br/><br/>";
		 ?>
		 <input type="submit" name="submit" value="buscar"/>
		</form>
</body>
</html>