<?php
      
require_once "Connection.php";

$db = new Connection();
$conn = $db->connect();

if($_GET["filter"] == ''){
	$filter = '';
}else{
	$filter = " WHERE CAT.id_category = ".$_GET["filter"];
}

$query = "SELECT DISTINCT CAT.* FROM [dbo].[Item] IT 
INNER JOIN [dbo].[CategoryItem] CAT 
ON CAT.id_category = IT.id_category ".$filter;

$result = $db->getData($conn, $query);

echo json_encode($result);

?>