<?php
      
require_once "Connection.php";

$db = new Connection();
$conn = $db->connect();

if($_GET["filter"] == ''){
	$filter = '';
}else{
	$filter = " WHERE type_module IN ('".$_GET["filter"]."')";
}

$query = "SELECT * FROM [dbo].[Module] ". $filter;

$result = $db->getData($conn, $query);

echo json_encode($result);

?>