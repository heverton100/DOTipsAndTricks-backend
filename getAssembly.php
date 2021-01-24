<?php
      
require_once "Connection.php";

$db = new Connection();
$conn = $db->connect();

$itemID = $_GET["itemID"];

$query = "SELECT MON.id_item
, MON.quantity
, IT.name_item COLLATE SQL_Latin1_General_CP1251_CS_AS as name_item
, IT.description_item COLLATE SQL_Latin1_General_CP1251_CS_AS AS description_item
, IT.url_image_item FROM Assembly MON 
INNER JOIN Item IT ON 
IT.id_item = MON.component
WHERE MON.id_item = ".$itemID;

$result = $db->getData($conn, $query);

echo json_encode($result);

?>