<?php
      
require_once '../Connection.php';

$db = new Connection();
$conn = $db->connect();

$userlogged = $_GET["userlogged"];

if($_GET["filtroid"] == ''){
	$filtro = '';
}else{
	$filtro = "AND USERS.user_id = ".$_GET["filtroid"];
}

$query = "SELECT TIP.id_tip,
USERS.user_name AS author,
TIP.category_tip,
TIP.content_tip,
TIP.url_image,
CASE WHEN LK.id_user IS NOT NULL THEN 1 WHEN LK.id_user IS NULL THEN 0 END AS liked,
(SELECT COUNT(id_tip) FROM dbo.Likes WHERE id_tip = TIP.id_tip) AS likes
FROM [dbo].[Tips] TIP 
INNER JOIN [dbo].[Users] USERS ON TIP.id_user = USERS.user_id 
LEFT JOIN dbo.Likes LK ON LK.id_tip = TIP.id_tip AND LK.id_user = ".$userlogged." 
WHERE TIP.date_delete IS NULL ".$filtro." ORDER BY TIP.id_tip DESC";

$result = $db->getData($conn, $query);

$json = '[';

foreach ($result as $pp ) {
	$json .= '{';
	$json .= '"id_tip":'.$pp['id_tip'].",";
	$json .= '"liked":'.$pp['liked'].",";
	$json .= '"likes":'.$pp['likes'].",";
	$json .= '"url_image":'.'"'.$pp['url_image'].'"'.",";
	$json .= '"author":'.'"'.$pp['author'].'"'.",";
	$json .= '"category_tip":'.'"'.$pp['category_tip'].'"'.",";
	$json .= '"content_tip":'.'"'.utf8_decode($pp['content_tip']).'"';
	$json .= '},';
	
};

$json = substr($json, 0, -1);
$json .= ']';

echo $json;

?>