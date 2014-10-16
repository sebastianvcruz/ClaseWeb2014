<?php 
include_once("database.php");  
$limpiarCarrito="TRUNCATE TABLE lorembeer.carrito";
$result=mysqli_query($con,$limpiarCarrito);
header("Location: ../catalog.php");
 ?>