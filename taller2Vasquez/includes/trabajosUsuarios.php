<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		include_once("database.php");
		if(isset($_GET["nombreAsignar2"])){
			$nombreUsuario=$_GET["nombreAsignar2"];
		}
	 ?>
	<h1>Trabajos de <?php echo $nombreUsuario ?></h1>
	<h2>Ordenado por fecha</h2>
	<?php 
		$queryTrabajos= "SELECT usuarios.nombreUsuario AS usuario, trabajos.nombre AS nombreTrabajo, trabajos.creador AS creador, trabajos.prioridad 
		AS prioridad, trabajos.fechainicio AS fecha FROM taller1web.trabajos 
		JOIN taller1web.listatrabajos ON trabajos.id=listatrabajos.idtrabajo 
		JOIN taller1web.usuarios ON listatrabajos.idusuario = usuarios.nombreUsuario WHERE usuarios.nombreUsuario='$nombreUsuario'ORDER BY trabajos.fechainicio";
		$resultadosTrabajos = mysqli_query($con,$queryTrabajos);
		while($trabajos = mysqli_fetch_array($resultadosTrabajos)){ 
			//condicion para convertir el valor numerico de prioridad en una palabra
			if($trabajos["prioridad"]==1){
				$prio='alta';
			}else if($trabajos["prioridad"]==2){
				$prio='media';
			}else if($trabajos["prioridad"]==3){
				$prio='baja';
			}
			echo "<p><strong>Nombre:</strong> ".$trabajos["nombreTrabajo"]." - <strong>Prioridad: </strong>".$prio.
			" - <strong>Fecha: </strong>".$trabajos["fecha"]. " - <strong>Creador por:</strong>".$trabajos["creador"].
			"</p>";
		}
	 ?>
	 <FORM><INPUT Type='button' VALUE='Atras' onClick='history.go(-1);return true';></FORM>
</body>
</html>