<?php 
	echo "<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <link rel='shortcut icon' href='assets/icono.ico' >
        <link rel='stylesheet' href='../css/style.css'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Varela+Round'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <title>Wrong User-Password</title>
    </head>";
	//este documento solo tiene de funcion de ver si los usuarios existen en la base de datos 
    include_once("database.php");
    $nombreUsuario =$_POST["username"];
    $contrasena =$_POST["password"];
    $query="SELECT * FROM lorembeer.usuarios WHERE usuarios.nombre='$nombreUsuario' AND usuarios.password='$contrasena'";
    $validar = mysqli_query($con,$query);
    if(mysqli_num_rows($validar) >= 1)
        {
		//referencia : http://www.cyberciti.biz/faq/php-redirect/
		header("Location: ../home.php?nombreUsuario=".$nombreUsuario);
		
        }

        else{
            echo "<h2>Your Username or Password are incorrect, please try again</h2>";
        }
 ?>