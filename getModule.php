<?php
      
require_once "Connection.php";

$module = $_GET["moduleID"];

$db = new Connection();
$conn = $db->connect();

$query = "SELECT * FROM dbo.Module WHERE id_module =".$module;
$result = $db->getData($conn, $query);

$json = '{';

foreach ($result as $module ) {
		
	$json .= '"id_module":'.$module['id_module'].",";
	$json .= '"name_module":'.'"'.$module['name_module'].'"'.",";
	$json .= '"description_module":'.'"'.$module['description_module'].'"'.",";
	$json .= '"type_module":'.'"'.$module['type_module'].'"'.",";
	$json .= '"image_module":'.'"'.$module['image_module'].'"'.",";
	
	$json = substr($json, 0, -1);
	
};

$json .= '}';

echo $json;

?>