<?php
      
require_once "Connection.php";

$db = new Connection();
$conn = $db->connect();

$query = "SELECT * FROM [dbo].[Ship] WHERE image_ship IS NOT NULL";
$result = $db->getData($conn, $query);

echo json_encode($result);

?>