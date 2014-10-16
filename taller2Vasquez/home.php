<?php
    session_start();

    if(isset($_GET["nombreUsuario"])){
        $_SESSION['nombreUsuario'] = $_GET["nombreUsuario"];
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

 $_SESSION['idUsuario']=0;
$_SESSION["timeout"] = time();
   include_once("includes/database.php");
             $queryUsuario="SELECT id FROM lorembeer.usuarios WHERE nombre='".$_SESSION['nombreUsuario']."'";
             $result=mysqli_query($con,$queryUsuario);
             while($row=mysqli_fetch_array($result)){
             	$_SESSION['idUsuario']=$row['id'];
             }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="assets/icono.ico" >
	<link rel="stylesheet" href="css/styleHome.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Lorem Beer: the code beer!</title>
</head>
<body>
	<header>
		<h1>Welcome <?php echo $_SESSION['nombreUsuario']?> !</h1>
	</header>
	
		<div class="contenedor">
			<h2>Recomended this Month</h2>
			<h3>Best Seller!</h3>
			<ul class="catCardList">
			<?php 
             include_once("includes/database.php");
             // referencia: http://stackoverflow.com/questions/5581609/mysql-query-to-find-the-most-repeated-value
             $queryProductos="SELECT lorembeer.comprar.idProducto,
             lorembeer.productos.nombre AS nom, 
             lorembeer.productos.imagen AS ima, 
             lorembeer.productos.precio AS pre, 
             lorembeer.productos.descripcion AS des, 
             count(lorembeer.comprar.idProducto) c 
             FROM lorembeer.comprar JOIN lorembeer.productos ON lorembeer.comprar.idProducto = lorembeer.productos.id 
             GROUP BY lorembeer.comprar.idProducto ORDER BY c DESC LIMIT 1";
             $result=mysqli_query($con,$queryProductos);

             while($row=mysqli_fetch_array($result)){

                 echo "<li class='catCardList'>";
                 echo "<div class='catCard'><a href='#'><img src='".$row['ima']."' alt=''></a>";
                 echo "<div class='lowerCatCard'>";	
                 echo "<h3>".$row['nom']."</h3>";
                 echo "<div class='startingPrice'>Prices Starting At<span>$".$row['pre']."</span></div>";
                 echo "<p>".$row['des']."</p>";
                 echo "</div>";
                 echo "</div>";
                 echo "</li>"; 
             }
             ?>
         </ul>
		</div>
		<nav>
			<ul>
				<a href="catalog.php"><li>CATALOG</li></a>
				<a href="profile.php"><li>MY PROFILE</li></a>
				<a href="includes/logout.php"><li>LOG OUT</li></a>
			</ul>
	</nav>
</body>
</html>