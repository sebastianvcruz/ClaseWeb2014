<html>

<head>
	<title>Notas de todos los estudiantes</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
	include_once("includes/database.php");

		if(isset($_GET["codigo"])){  //obtiene variables por URL, primero ve si se le mando algo y dependiendo de eso muestra un tipo de informacion 
		$codigo = $_GET["codigo"];
		$sql= " SELECT estudiantes.nombre AS nombre,  estudiantes.apellido AS apellido, estudiantes.codigo AS codigo  FROM estudiantesWeb.notasdeestudiantes JOIN estudiantesWeb.estudiantes ON notasdeestudiantes.codigoEstudiante=estudiantes.codigo WHERE estudiantes.codigo='$codigo' GROUP BY estudiantes.nombre";
		$result = mysqli_query($con,$sql);

			/*Las siguientes secciones son identicas a la pagina de notasdeestudiantes*/
			echo"<table border='1' style='width:300px'>";
			echo"<th>Codigo</th>";
			echo"<th>Nombre</th>";
			$sqlNombreNotas="SELECT * FROM estudiantesWeb.notas"; 

			$nombreNotas= mysqli_query($con,$sqlNombreNotas);
			while($notasConNombre = mysqli_fetch_array($nombreNotas)){
				echo"<th>".$notasConNombre["nombre"]."</th>";
			}

			while($row = mysqli_fetch_array($result)) {
				echo"<tr>";
				echo"<td>".$codigo."</td>";
				echo"<td>".$row["nombre"]." ".$row["apellido"]."</td>";


				$sqlNotas= "SELECT estudiantes.codigo AS codigo, notasdeestudiantes.valor AS valorNota FROM estudiantesWeb.notasdeestudiantes JOIN estudiantesWeb.estudiantes ON notasdeestudiantes.codigoEstudiante=estudiantes.codigo JOIN estudiantesWeb.notas ON notasdeestudiantes.idNota=notas.idNota ";
				$notas= mysqli_query($con,$sqlNotas);
				while($datosNotas = mysqli_fetch_array($notas)){
					if($row["codigo"]==$datosNotas["codigo"]){
						echo"<td>".$datosNotas["valorNota"]."</td>";
					}
  //print(implode(" , ",$));
				}
				echo"</tr>";
			}	

		
	}else{
      echo"<table>";
		$query= "SELECT * FROM estudiantesWeb.estudiantes";
	
	$result= mysqli_query($con,$query);
      echo "<table border='4' style='width:150px'>";
	while($row = mysqli_fetch_array($result)){
		echo"<tr>";
		echo "<td>".$row["nombre"];
		echo "<td>".$row["apellido"];
		echo "<td>".$row["codigo"];
		echo "<td>".$row["correo"];
		echo"</tr>";
	}
	echo"</table>";
	}

?>
<!--  navegacion -->
<form action="index.php" method="LINK">
		<input type="submit" value="HOME">
	</form>
	</br>
	<form action="notasdeestudiantes.php" method="LINK">
		<input type="submit" value="Notas estudiantes">
	</form>
</body></html>