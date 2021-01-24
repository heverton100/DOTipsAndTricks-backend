<?php
  
require_once '../Connection.php';

$useremail = $_POST['useremail'];
$newpass = MD5($_POST['pass']);

$db = new Connection();
$conn = $db->connect();

$query = "SELECT * FROM [dbo].[Users] WHERE user_email = "."'$useremail'";
$resultItem = $db->getData($conn, $query);

$logarray = $resultItem[0][user_email];

if($logarray == $useremail){

	$query = "UPDATE contosodb.dbo.Users
				SET user_pass='$newpass', user_date_pass_reset=GETDATE() WHERE user_email = "."'$useremail'";
	$result = $db->query($conn, $query);        
	if ($result) {  
		echo json_encode(array("response"=>"failed")); 
		die(print_r(sqlsrv_errors(), true)); 
	} else {  
		echo json_encode(array("response"=>"success"));
	}

}else{
	echo json_encode(array("response"=>"failed"));
}

?>
