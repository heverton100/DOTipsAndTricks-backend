<?php
      
require_once "Connection.php";

$db = new Connection();
$conn = $db->connect();

if($_GET["filter"] == ''){
	$filter = '';
}else{
	$filter = " WHERE research_point > ".$_GET["filter"];
}

$query = "SELECT * FROM [dbo].[ResearchPoints]".$filter;

$result = $db->getData($conn, $query);

$t1 = 0;
$t2 = 0;
$t3 = 0;
$t4 = 0;
$t5 = 0;
$t6 = 0;
  
$json = '[';

foreach ($result as $pp ) {
	$json .= '{';
	$json .= '"research_point":'.'"'.$pp['research_point'].'"'.",";
	$json .= '"quantity_logs":'.$pp['quantity_logs'].",";
	$json .= '"total_logs":'.$pp['total_logs'].",";
	$json .= '"cost_total":'.'"'.number_format($pp['cost_total'], 0, '', '.').'"'.",";
	$json .= '"cost_with_discount":'.'"'.number_format($pp['cost_with_discount'], 0, '', '.').'"'.",";
	$json .= '"cost_with_premium":'.'"'.number_format($pp['cost_with_premium'], 0, '', '.').'"'.",";
	$json .= '"cost_discount_premium":'.'"'.number_format($pp['cost_discount_premium'], 0, '', '.').'"';
	$json .= '},';
	
	$t1 = $t1 + $pp['quantity_logs'];
	$t2 = $t2 + $pp['total_logs'];
	$t3 = $t3 + $pp['cost_total'];
	$t4 = $t4 + $pp['cost_with_discount'];
	$t5 = $t5 + $pp['cost_with_premium'];
	$t6 = $t6 + $pp['cost_discount_premium'];
};


$json .= '{';
$json .= '"research_point":'.'"TOTAL"'.",";
$json .= '"quantity_logs":'.$t1.",";
$json .= '"total_logs":'.$t2.",";
$json .= '"cost_total":'.'"'.number_format($t3, 0, '', '.').'"'.",";
$json .= '"cost_with_discount":'.'"'.number_format($t4, 0, '', '.').'"'.",";
$json .= '"cost_with_premium":'.'"'.number_format($t5, 0, '', '.').'"'.",";
$json .= '"cost_discount_premium":'.'"'.number_format($t6, 0, '', '.').'"';
$json .= '}';


$json .= ']';

echo $json;

?>