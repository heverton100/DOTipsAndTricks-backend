<?php
      
require_once "Connection.php";

$ship = $_GET["shipID"];

$db = new Connection();
$conn = $db->connect();

$query = "SELECT MODU.* FROM dbo.Ship NAV
INNER JOIN ShipModule NM ON NM.id_ship = NAV.id_ship 
INNER JOIN Module MODU ON NM.id_module = MODU.id_module
WHERE NAV.id_ship =".$ship;
$result = $db->getData($conn, $query);

if($result != null){
	
	echo json_encode($result);
	
}else{
	
	$json = '[{';
	$json .= '"id_module":0,';
	$json .= '"name_module":"TESTE",';
	$json .= '"description_module":"TESTE",';
	$json .= '"type_module":"TESTE",';
	$json .= '"image_module":"TESTE"';
	$json .= '}]';

	echo $json;
}

?>