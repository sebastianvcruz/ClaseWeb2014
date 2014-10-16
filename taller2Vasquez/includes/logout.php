<?php 

session_start();
session_destroy();
include_once("database.php");  
$limpiarCarrito="TRUNCATE TABLE lorembeer.carrito";
$result=mysqli_query($con,$limpiarCarrito);
header("Location: ../index.php");
 ?>