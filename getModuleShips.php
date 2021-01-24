<?php
      
require_once "Connection.php";

$module = $_GET["moduleID"];

$db = new Connection();
$conn = $db->connect();

$query = "SELECT NAV.* FROM dbo.Ship NAV
INNER JOIN ShipModule NM ON NM.id_ship = NAV.id_ship 
INNER JOIN Module MODU ON NM.id_module = MODU.id_module
WHERE MODU.id_module = ". $module;
$result = $db->getData($conn, $query);
  
echo json_encode($result);

?>