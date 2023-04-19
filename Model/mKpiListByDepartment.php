<? session_start(); ob_start();?>
<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){


$admin_id=$_SESSION['admin_id'];
$department_id=$_POST['department_id'];
//$admin_id='198';
$strSQL="SELECT * FROM kpi  where admin_id='$admin_id' and department_id='$department_id'";
$result=$conn->query($strSQL);
$i=0;
$dataObject="";
$dataObject.="[";
while($rs=$result->fetch_assoc()){
	if($i==0){
		$dataObject.="[";
		$dataObject.="\"".$rs["kpi_id"]."\",\"".$rs["kpi_name"]."\"";
	}else{
		$dataObject.=",[";
		$dataObject.="\"".$rs["kpi_id"]."\",\"".$rs["kpi_name"]."\"";
	}
	$dataObject.="]";
	$i++;
}
$dataObject.="]";
echo $dataObject;

}else{
echo'{"status":"400","error":"not token."}';

}


?>
