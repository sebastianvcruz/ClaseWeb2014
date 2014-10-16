<?php 
session_start();

$sumaRecord = 0;
if(isset($_GET['r'])){
 	$_SESSION['producto'] = $_GET['r']; 
 }else{

 }
 include_once("database.php");
echo "<br/>";

$date = date('Y-m-d H:i:s');//fecha actual 
$queryProductos="SELECT carrito.idProducto AS id,productos.nombre,productos.precio FROM 
lorembeer.carrito JOIN lorembeer.productos ON lorembeer.carrito.idProducto=lorembeer.productos.id";
$resultCarrito=mysqli_query($con,$queryProductos);
	while($row=mysqli_fetch_array($resultCarrito)){
	$registrar="INSERT INTO lorembeer.comprar (`idUsuario`, `idProducto`,`fecha`)
					VALUES ('".$_SESSION['idUsuario']."','".$row['id']."','$date')";
					$bdinsert= mysqli_query($con,$registrar);
	}

$queryHistoria="SELECT productos.nombre AS nom, productos.precio AS pre, comprar.fecha AS fecha FROM 
lorembeer.productos JOIN lorembeer.comprar ON lorembeer.productos.id=lorembeer.comprar.idProducto WHERE comprar.idUsuario=".$_SESSION['idUsuario']."";
$resultHistoria=mysqli_query($con,$queryHistoria);
$limpiarCarrito="TRUNCATE TABLE lorembeer.carrito";
$result=mysqli_query($con,$limpiarCarrito);
echo "<table class='rwd2-table'>
        <tr>
			<th>Product</th>
    		<th>Price</th>
    		<th>Date</th>
    	</tr>	"; 
    	while($row2=mysqli_fetch_array($resultHistoria)){
    		echo "<tr><td>".$row2['nom']."</td><td>".$row2['pre']."</td><td>".$row2['fecha']."</td></tr>";
    	$sumaRecord+=$row2['pre'];
    	}
echo "<tr><td>Total</td><td>".number_format($sumaRecord,2)."</td></tr>";
echo "</table>";
echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";
    

 ?>