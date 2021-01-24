<?php
      
require_once "Connection.php";

$itemID = $_GET["itemID"];

$db = new Connection();
$conn = $db->connect();

$query = "SELECT id_item
, id_category
, description_item COLLATE SQL_Latin1_General_CP1251_CS_AS AS description_item
, url_image_item
, name_item COLLATE SQL_Latin1_General_CP1251_CS_AS as name_item
, damage_base_lasers
, sigla_hardware
, exists_assembly FROM [dbo].[Item] WHERE id_item = ".$itemID;
$resultItem = $db->getData($conn, $query);

$json = '{';

foreach ($resultItem as $item ) {
	
	$json .= '"id_item":'.$item['id_item'].",";
	$json .= '"id_category":'.$item['id_category'].",";
	$json .= '"description_item":'.'"'.$item['description_item'].'"'.",";
	$json .= '"url_image_item":'.'"'.$item['url_image_item'].'"'.",";
	$json .= '"name_item":'.'"'.$item['name_item'].'"'.",";
	$json .= '"damage_base_lasers":'.'"'.$item['damage_base_lasers'].'"'.",";
	$json .= '"sigla_hardware":'.'"'.$item['sigla_hardware'].'"'.",";
	$json .= '"exists_assembly":'.'"'.$item['exists_assembly'].'"'.",";
	
};
$json = substr($json, 0, -1);

$json .= '}';

echo $json;

?>