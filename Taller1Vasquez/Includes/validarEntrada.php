<?php 
	
	//este documento solo tiene de funcion de ver si los usuarios existen en la base de datos 
    include_once("database.php");
    $nombreUsuario =$_POST["nombreusuario"];
    $contrasena =$_POST["contrasena"];
    $query="SELECT * FROM taller1web.usuarios WHERE usuarios.nombreUsuario='$nombreUsuario' AND usuarios.clave='$contrasena'";
    $validar = mysqli_query($con,$query);
    if(mysqli_num_rows($validar) >= 1)
        {
		//referencia : http://www.cyberciti.biz/faq/php-redirect/
		header("Location: ../usuarioMain.php?nombreUsuario=".$nombreUsuario);
		
        }

        else{
            echo "<h2>El usuario no existe o el la contrasena esta erronea</h2>";
        }
 ?>