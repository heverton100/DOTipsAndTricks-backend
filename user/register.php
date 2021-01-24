<?php
  
require_once '../Connection.php';

$username = $_POST['username'];
$useremail = $_POST['useremail'];
$pass = MD5($_POST['pass']);

$db = new Connection();
$conn = $db->connect();

$query = "SELECT * FROM [dbo].[Users] WHERE user_email = "."'$useremail'";
$resultItem = $db->getData($conn, $query);

$logarray = $resultItem[0][user_email];

if($logarray == $useremail){

  echo json_encode(array("response"=>"duplicate"));
  
  die();

}else{
  
  $query = "INSERT INTO contosodb.dbo.Users
            (user_name, user_email, user_pass, user_date_create, user_date_pass_reset, user_date_update)
            VALUES('$username', '$useremail', '$pass', GETDATE(), NULL, NULL);";
  $result = $db->query($conn, $query);        
  if ($result) {  
      echo json_encode(array("response"=>"failed")); 
      die(print_r(sqlsrv_errors(), true)); 
  } else {  
      echo json_encode(array("response"=>"success"));
  }
}

?>