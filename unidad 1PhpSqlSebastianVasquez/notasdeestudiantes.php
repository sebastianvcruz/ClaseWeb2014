<html>

<head>
	<title>Notas de todos los estudiantes</title>
	<meta charset="UTF-8">
</head>

<body>
<?php

include_once("includes/database.php");  /*para conectarse a la base de datos*/

echo "<p>Este código tiene unos problemas a la hora de extraer la información del servidor, de la manera como se planteo</p>";
echo "<p>Todos los datos se extraen pero no hay forma de ajustarlos a la tabla con los nombres talleres. </p>";
echo "</br>";
echo "<p>Traté de convertir los campos vacíos con ceros pero no fue fácil y por eso tiene este error, el primer dato que encuentra </p>";
echo "<p>siempre lo pone en la columna 1 sin importar que los datos pertenezcan a la columna 2.</p>";
echo "</br>";
echo "<p>La mejor forma para que esto se evite es usar el método que mostraron en clase con un for() y usando el SUM() de MySql</p>";
echo "</br>";

//primer query para encontrar los nombre de los estudiantes y sus codigos, los cuales tienen notas en la base de datos (JOIN) ; esto 
//luego se usa para hacer una relacion con otro cuery y llenar la tabla 
$result = mysqli_query($con,"SELECT estudiantesWeb.estudiantes.nombre AS Nombre, estudiantesWeb.estudiantes.codigo AS 
Codigo  FROM estudiantesWeb.notasdeestudiantes JOIN estudiantesWeb.estudiantes ON 
notasdeestudiantes.codigoEstudiante=estudiantes.codigo GROUP BY estudiantes.nombre");  
//capturar errores 
if($result == false)
	{
		echo "<h4>Error: ".mysqli_error($con)."</h4>";
	} else {

		echo"<table border='4' style='width:150px'>";
		echo"<th>Nombre</th>";
		//query para saber los nombre de las notas 
		$sqlNombreNotas="SELECT * FROM estudiantesWeb.notas";
		$nombreNotas= mysqli_query($con,$sqlNombreNotas);
		//crea el titulo de cada columna de la tabla 
		while($notasConNombre = mysqli_fetch_array($nombreNotas)){
			echo"<th>".$notasConNombre["nombre"]."</th>";
		}
 //Segundo query para obtener el codigo del estudiante (relacion con el anterior) y los valores de cada nota
$queriNota= "SELECT estudiantesWeb.estudiantes.codigo AS codigo, estudiantesWeb.notasdeestudiantes.valor AS 
valorNota,estudiantesWeb.notasdeestudiantes.idNota AS idN FROM estudiantesWeb.notasdeestudiantes JOIN 
estudiantesWeb.estudiantes ON notasdeestudiantes.codigoEstudiante=estudiantes.codigo JOIN estudiantesWeb.notas 
ON notasdeestudiantes.idNota=notas.idNota";
//tabla
while($row = mysqli_fetch_array($result)) {
	echo"<tr>";
	//por cada estudiante que se encuentra se hace un link al siguente documento php
    echo"<td><a href='estudiantes.php?codigo=".$row["Codigo"]."'>".$row["Nombre"]."</a></td>";
	$notas= mysqli_query($con,$queriNota);

 		while($datosNotas = mysqli_fetch_array($notas)){
 	 		if($row["Codigo"]==$datosNotas["codigo"]){ //relacion para llenar filas
    		echo"<td>".$datosNotas["valorNota"]."</td>";
   			}
 		}
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
	<form action="estudiantes.php" method="LINK">
		<input type="submit" value="Estudantes">
	</form>
</body></html>