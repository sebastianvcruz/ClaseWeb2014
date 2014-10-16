<?php 
// referencia:https://www.video2brain.com/mx/videos-55007.htm
// En el tutorial usaron variables de sesion para crear la tabla de productos en el carrito
// pero esto no me servia porque cunado la destruia tambien se me destruia las variables de usuario
// asi que decidi meter todo en una tabla en mi base de datos llamada carrito 

session_start();
$suma = 0;
 if(isset($_GET['p'])){
 	$_SESSION['producto'] = $_GET['p']; 
 }else{
$_SESSION['producto']=0;

 }
 include_once("database.php");      
            
// for($i =0;$i<$_SESSION['contador'];$i++){
	// echo "Producto: ".$_SESSION['producto'][$i]."<br>";
	$queryProductos="SELECT id,nombre,precio FROM lorembeer.productos WHERE id=".$_SESSION['producto']."";
	$result=mysqli_query($con,$queryProductos);
	while($row=mysqli_fetch_array($result)){	
		$registrar="INSERT INTO lorembeer.carrito (`idProducto`, `idUsuario`)
					VALUES ('".$row['id']."','".$_SESSION['idUsuario']."')";
					$bdinsert= mysqli_query($con,$registrar);
		
	}
//}
echo "<table class='rwd-table'>
        <tr>
			<th>Product</th>
    		<th>Price</th>
    	</tr>	"; 

$queryCarrito="SELECT nombre AS nom,precio AS pre FROM lorembeer.productos JOIN lorembeer.carrito ON 
lorembeer.carrito.idProducto=lorembeer.productos.id";
$resultCarrito=mysqli_query($con,$queryCarrito);
while($row2=mysqli_fetch_array($resultCarrito)){
	echo "<tr><td>".$row2['nom']."</td><td>".$row2['pre']."</td></tr>";
	$suma += $row2['pre'];
	}
echo "<tr><td>Total</td><td>".number_format($suma,2)."</td></tr>";
echo "</table>"; 

?>