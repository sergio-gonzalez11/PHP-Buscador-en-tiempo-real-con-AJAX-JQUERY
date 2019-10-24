
<?php 
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');

require_once 'conexion.php';

function search() {

  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST['search']);
  
  $sql = "SELECT nombre, posicion FROM equipo WHERE nombre LIKE '%$search%' ";
  $res = $mysqli->query($sql);
  
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    
    echo "<p>$row[nombre] " . " -- juega en la posicion de : $row[posicion]  </p>";
      
  }
}

search();