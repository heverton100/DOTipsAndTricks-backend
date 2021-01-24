<?php
      
require_once "Connection.php";

$db = new Connection();
$conn = $db->connect();

$categoryID = $_GET["categoryID"];

$query = "SELECT id_item
, id_category
, description_item COLLATE SQL_Latin1_General_CP1251_CS_AS AS description_item
, url_image_item
, name_item COLLATE SQL_Latin1_General_CP1251_CS_AS as name_item
, damage_base_lasers
, sigla_hardware
, exists_assembly FROM [dbo].[Item] where id_category = ".$categoryID;

$result = $db->getData($conn, $query);

echo json_encode($result);

?>