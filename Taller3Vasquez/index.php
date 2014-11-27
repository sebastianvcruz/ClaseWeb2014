<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css">
 
  
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/main.css">

  <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body onload="iniciarGMap()">
<div id="contenedor">
  
  <!-- mapa de googlemaps -->
  <div id="map_canvas" style="width:850px; height:574px"></div>

  <img id="logo" src="img/logo.png"/>
<!-- imagenes para seleccionar  -->
  <section id="iconos">
    <img name="icono" id="restaurante" src="img/restaurante.png"/>
    <img name="icono" id="hotel" src="img/hotel.png"/>
    <img name="icono" id="parque" src="img/parques.png"/>
    <img name="icono" id="museo" src="img/museos.png"/>
  </section>

<!-- canvas para hacer el drop -->
<section id="cajaSoltar">
    <canvas id="lienzo" width="290" height="287"></canvas>
    <input type="button" value="Reset" onclick="reset()">
  </section>

 </div> 
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="js/vendor/bootstrap.min.js"></script>

  <script src="js/main.js"></script>

  <script type="text/javascript"
  src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCaab8OrK_KEDS9LQOaEpxRIKew75pzDMw&sensor=true">
  </script>

</body>
</html>
