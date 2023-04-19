
<?php
	
	include './../config.inc.php';

	// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){



	$assign_kpi_id=$_POST['assign_kpi_id'];
	//$year="2012";
	$strSQL="select assign_kpi_year,appraisal_period_id,emp_id,position_id,perspective_id from assign_kpi
where assign_kpi_id='$assign_kpi_id'";
	$result=$conn->query($strSQL);
	$rs=$result->fetch_assoc();
	
	echo "[{\"assign_kpi_year\":\"$rs[assign_kpi_year]\",\"appraisal_period_id\":\"$rs[appraisal_period_id]\",
	\"position_id\":\"$rs[position_id]\",\"perspective_id\":\"$rs[perspective_id]\",\"emp_id\":\"$rs[emp_id]\"}]";


}else{
	echo'{"status":"400","error":"not token."}';
}
?>
