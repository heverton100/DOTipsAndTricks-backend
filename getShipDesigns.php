<?php
      
require_once "Connection.php";

$db = new Connection();
$conn = $db->connect();

$shipID = $_GET["shipID"];

$query = "SELECT id_ship_design, name_design, image_design FROM ShipDesigns WHERE id_ship = ".$shipID;

$result = $db->getData($conn, $query);


if($result != null){
	
	echo json_encode($result);
	
}else{
	
	$json = '[{';
	$json .= '"id_ship_design":0,';
	$json .= '"name_design":"TESTE",';
	$json .= '"image_design":"TESTE",';
	$json .= '}]';

	echo $json;
}



?>