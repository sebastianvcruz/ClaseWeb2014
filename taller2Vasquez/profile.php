<?php
session_start();

$inactive = 6000;

// check to see if $_SESSION["timeout"] is set
if (isset($_SESSION["timeout"])) {
    // calculate the session's "time to live"
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactive) {
        session_destroy();
        header("Location: includes/logout.php");
    }
    $_SESSION["timeout"] = time();
//     echo $_SESSION['idUsuario'];
 }
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
        <button class="comprar"><a href="#">Buy and Show History!</a></button>
        <div class="record">
            
        </div>
    </div>
<nav>
<div class="carrito">Carrito</div>
            <ul>
                <a href="home.php"><li>HOME</li></a>
                <a href="catalog.php"><li>CATALOG</li></a>
                <a href="includes/logout.php"><li>LOG OUT</li></a>
            </ul>
        </nav>
</body>
<script>
$(document).ready(inicio)
function inicio(){
    $(".comprar").click(addRecord);
    $(".carrito").load("includes/addtocart.php");
}
   
function addRecord(){
    $(".record").load("includes/addrecord.php?p="+$(this).val());
}
</script>
<html>