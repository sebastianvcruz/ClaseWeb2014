<?php
    session_start();

    if(isset($_GET["nombreUsuario"])){
        $_SESSION['nombreUsuario'] = $_GET["nombreUsuario"];
    }
    //referenciadel video, para mantener los vaores del carrito en session
if(!isset($_SESSION['contador'])){
        $_SESSION['contador'] = 0;
    }
    $inactive = 6000;
 
// check to see if $_SESSION["timeout"] is set
if (isset($_SESSION["timeout"])) {
    // calculate the session's "time to live"
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactive) {
        session_destroy();
        header("Location: includes/logout.php");
    }
}
 
$_SESSION["timeout"] = time();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="assets/icono.ico" >
	<link rel="stylesheet" href="css/styleCatalog.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/jquery.js"></script>
	<title>Lorem Beer: See our beer!</title>
</head>
</head>
<body>
	<div class="contenedor">
		<form action="includes/limpiar.php">
    <input type="submit" value="Clear Cart!">
	</form>
		<ul class="catCardList">
		<?php 
             include_once("includes/database.php");
             $queryProductos="SELECT * FROM lorembeer.productos WHERE 1 ";
             $result=mysqli_query($con,$queryProductos);
             while($row=mysqli_fetch_array($result)){
                 echo "<li class='catCardList'>";
                 echo "<div class='catCard'><a href='#'><img src='".$row['imagen']."' alt=''></a>";
                 echo "<div class='lowerCatCard'>";	
                 echo "<h3>".$row['nombre']."</h3>";
                 echo "<div class='startingPrice'>Prices Starting At<span>$".$row['precio']."</span></div>";
                 echo "<p>".$row['descripcion']."</p>";
                 echo "<button id='catCardButton' class='buttonBuy' value= '".$row['id']."'><a href='#''>Add to Cart</a></button>";
                 echo "</div>";
                 echo "</div>";
                 echo "</li>"; 
             }
             ?>

					<!-- https://www.video2brain.com/mx/tutorial/estrategia-para-crear-el-carrito-de-la-compra -->
					
     <br/><br/><br/><br/><br/><br/>
	</ul>
	</div>

	<div class="carrito">Carrito</div>
	
		<nav>
			<ul>
				<a href="home.php"><li>HOME</li></a>
				<a href="profile.php"><li>MY PROFILE</li></a>
				<a href="includes/logout.php"><li>LOG OUT</li></a>
			</ul>
		</nav>

	</body>
 	<script>
$(document).ready(inicio)
function inicio(){
	$(".buttonBuy").click(addItem);
	$(".carrito").load("includes/addtocart.php");
}
function addItem(){
	// $(".carrito").append($(this).val());
	$(".carrito").load("includes/addtocart.php?p="+$(this).val());
}
 	</script>
</html>