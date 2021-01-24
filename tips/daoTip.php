<?php
      
require_once '../Connection.php';

$db = new Connection();
$conn = $db->connect();

switch ($_POST['function']) {
    case "newtip":
        
        
        $iduser = $_POST["id_user"];
        $category = $_POST["category_tip"];
        $content = $_POST["content_tip"];
        $content2 = utf8_encode($content);
        
        $urlImage = $_POST["url_image"];
        
        $query = "INSERT INTO contosodb.dbo.Tips
				(id_user, category_tip, content_tip, date_create, date_delete, url_image)
				VALUES($iduser, '$category', '$content2', GETDATE(), NULL, '$urlImage');";
        
        $result = $db->query($conn, $query);
      
        if ($result) {  
            echo json_encode(array("response"=>"failed")); 
            die(print_r(sqlsrv_errors(), true)); 
        } else {  
            echo json_encode(array("response"=>"success"));
        }
        
        break;
     case "deletetip": 
     
        $idtip = $_POST["id_tip"];
        
        $query = "UPDATE contosodb.dbo.Tips SET date_delete = GETDATE() WHERE id_tip = $idtip";
        
        $result = $db->query($conn, $query);
      
        if ($result) {  
            echo json_encode(array("response"=>"failed")); 
            die(print_r(sqlsrv_errors(), true)); 
        } else {  
            echo json_encode(array("response"=>"success"));
        }
         
        break;
        
      case "newlike":
        
        
        $iduser = $_POST["id_user"];
        $idtip = $_POST["id_tip"];
        
        
        $query = "INSERT INTO contosodb.dbo.Likes
				(id_user, id_tip)
				VALUES($iduser, $idtip);";
        
        $result = $db->query($conn, $query);
      
        if ($result) {  
            echo json_encode(array("response"=>"failed")); 
            die(print_r(sqlsrv_errors(), true)); 
        } else {  
            echo json_encode(array("response"=>"success"));
        }
        
        break;
        
      case "deslike":
        
        $iduser = $_POST["id_user"];
        $idtip = $_POST["id_tip"];
        
        $query = "DELETE FROM contosodb.dbo.Likes WHERE id_user = $iduser AND id_tip = $idtip;";
        
        $result = $db->query($conn, $query);
      
        if ($result) {  
            echo json_encode(array("response"=>"failed")); 
            die(print_r(sqlsrv_errors(), true)); 
        } else {  
            echo json_encode(array("response"=>"success"));
        }
        
        break;
}





?>