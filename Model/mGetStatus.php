<? session_start(); ob_start();?>
<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){

	
include 'mGenarateJson.php';

$kpi_year=$_GET['kpi_year'];
$appraisal_period_id=$_GET['appraisal_period_id'];
$admin_id=$_SESSION['admin_id'];
/*
$strSQL="
	select threshold_name,threshold_begin,threshold_end,threshold_color
from threshold where admin_id='$admin_id' order by threshold_begin
		
";
*/

$strSQL="
	select threshold_name,threshold_begin,threshold_end,threshold_color
from threshold  order by score		
";
$columnName="threshold_name,threshold_begin,threshold_end,threshold_color";
genarateJson($strSQL,$columnName,$conn);



}else{
echo'{"status":"400","error":"not token."}';

}

?>