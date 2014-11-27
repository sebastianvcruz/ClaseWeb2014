  <?php
  include_once('../includes/database.php');

  $marcador = $_POST['marcador'];
  $result="";
  $tmp=[];

  $query = "SELECT * FROM loc.locaciones WHERE locaciones.tipo ='".$marcador."'";
  $resultado = mysqli_query($con,$query);
  
//push la informacion en un JSON
  while ( $row = mysqli_fetch_array($resultado) ) {
    $temp["id"] = $row["id"];
    $temp["lat"] = $row["latitud"];
    $temp["lon"] = $row["longitud"];
    $temp["nom"] = $row["nombre"];
    array_push($tmp,$temp);
  }
  
  $result["error"] = false;
  $result["temps"] = $tmp;

  echo  json_encode($result);

  ?>
