<?php
      
require_once "Connection.php";

$ship = $_GET["shipID"];

$db = new Connection();
$conn = $db->connect();

$query = "SELECT * FROM dbo.Ship WHERE id_ship =".$ship;
$result = $db->getData($conn, $query);

$json = '{';

foreach ($result as $ships ) {
	
	$json .= '"id_ship":'.$ships['id_ship'].",";
	$json .= '"name_ship":'.'"'.$ships['name_ship'].'"'.",";
	$json .= '"description_ship":'.'"'.$ships['description_ship'].'"'.",";
	$json .= '"bonus":'.'"'.$ships['bonus'].'"'.",";
	$json .= '"velocity":'.$ships['velocity'].",";
	$json .= '"cargo":'.$ships['cargo'].",";
	$json .= '"points_hp":'.$ships['points_hp'].",";
	$json .= '"slots_lasers":'.$ships['slots_lasers'].",";
	$json .= '"slots_generators":'.$ships['slots_generators'].",";
	$json .= '"slots_extras":'.$ships['slots_extras'].",";
	$json .= '"slots_modules_ship":'.$ships['slots_modules_ship'].",";
	$json .= '"image_ship":'.'"'.$ships['image_ship'].'"'.",";
	$json .= '"has_ability":'.'"'.$ships['has_ability'].'"'.",";
	$json .= '"slots_missile_launcher":'.$ships['slots_missile_launcher'].",";
	
};
$json = substr($json, 0, -1);

$json .= '}';

echo $json;

?>