<?php
  
require_once '../Connection.php';

$useremail = $_POST['useremail'];
$pass = MD5($_POST['pass']);

$db = new Connection();
$conn = $db->connect();

$query = "SELECT user_id,user_name,user_email,user_pass FROM [dbo].[Users] WHERE user_email = "."'$useremail'". " AND user_pass = "."'$pass'";
$resultItem = $db->getData($conn, $query);

$logarray = $resultItem[0][user_email];
  
if($logarray == $useremail){

  echo json_encode(array("user_id"=>$resultItem[0][user_id],
    "user_name"=>$resultItem[0][user_name],
    "user_email"=>$resultItem[0][user_email],
    "user_pass"=>$resultItem[0][user_pass],
    "response"=>"success"
    ));

}else{
  
  echo json_encode(array("response"=>"failed"));

}

?>