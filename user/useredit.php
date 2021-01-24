<?php
  
require_once '../Connection.php';

$username = $_POST['username'];
$useremailNew = $_POST['useremailnew'];
$useremailOld = $_POST['useremailold'];

$db = new Connection();
$conn = $db->connect();

$query = "SELECT * FROM [dbo].[Users] WHERE user_email = "."'$useremailOld'";
$resultItem = $db->getData($conn, $query);

$logarray = $resultItem[0][user_email];
$userid = $resultItem[0][user_id];

if($logarray == $useremailOld){

  $query = "UPDATE contosodb.dbo.Users
            SET user_name='$username', user_email='$useremailNew', user_date_update=GETDATE() WHERE user_id = $userid;";
  $result = $db->query($conn, $query);        
  if ($result) {  
      echo json_encode(array("response"=>"failed")); 
      die(print_r(sqlsrv_errors(), true)); 
  } else {  
      echo json_encode(array("response"=>"success"));
  }

}else{
	
  echo json_encode(array("response"=>"duplicate"));
  
  die();  
  
}

?>