<?php
      
require_once "Connection.php";

$db = new Connection();
$conn = $db->connect();

$skillID = $_GET["skillID"];

$query = "SELECT * FROM SkillLevels WHERE id_skill = ".$skillID;

$result = $db->getData($conn, $query);

echo json_encode($result);

?>