<?php
      
require_once "Connection.php";

$ship = $_GET["shipID"];

$db = new Connection();
$conn = $db->connect();

$query = "SELECT * FROM ShipAbilities WHERE id_ship =".$ship;
$result = $db->getData($conn, $query);

if($result != null){
	
	echo json_encode($result);
	
}else{
	
	$json = '[{';
	$json .= '"id_ability":0,';
	$json .= '"id_ship":0,';
	$json .= '"ability_name":"TESTE",';
	$json .= '"ability_desc":"TESTE",';
	$json .= '"ability_image":"TESTE"';
	$json .= '}]';

	echo $json;
}

?>