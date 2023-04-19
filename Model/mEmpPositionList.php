<? session_start(); ob_start();?>
<?php

include './../config.inc.php';

$admin_id=$_SESSION['admin_id'];
$paramSelectAll=$_POST['paramSelectAll'];

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){

	
if($paramSelectAll=="selectAll"){
	$strSQL="select position_id,position_name from(
	SELECT 'All' AS position_id,'ทั้งหมด' as position_name,0 as seq
	UNION
	select position_id,position_name,1 as seq from position_emp where admin_id='$admin_id'
	)queryA
	ORDER BY seq";
}else{
	$strSQL="
	select position_id,position_name from position_emp where admin_id='$admin_id'
	";
}


$result=$conn->query($strSQL);
$i=0;
$dataObject="";
$dataObject.="[";
while($rs=$result->fetch_assoc()){
	if($i==0){
		$dataObject.="[";
		$dataObject.="\"".$rs["position_id"]."\",\"".$rs["position_name"]."\"";
	}else{
		$dataObject.=",[";
		$dataObject.="\"".$rs["position_id"]."\",\"".$rs["position_name"]."\"";
	}
	$dataObject.="]";
$i++;
}
$dataObject.="]";
echo $dataObject;

}else{
	echo'{"status":"400","error":"not token."}';

}