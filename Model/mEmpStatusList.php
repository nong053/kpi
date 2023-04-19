<? session_start(); ob_start();?>
<?php

include './../config.inc.php';

$paramSelectAll=$_POST['paramSelectAll'];
// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){


if($paramSelectAll=="selectAll"){
	$strSQL="
	select * from(
	select 'All' as id,'ทั้งหมด' as emp_status_work,0 as seq
	UNION
	select id,emp_status_work,1 as seq from emp_status
	)queryA 
	ORDER BY seq
			
	";
}else{
	$strSQL="
	select id,emp_status_work from emp_status
	";
}
	


$result=$conn->query($strSQL);
$i=0;
$dataObject="";
$dataObject.="[";
while($rs=$result->fetch_assoc()){
	if($i==0){
		$dataObject.="[";
		$dataObject.="\"".$rs["id"]."\",\"".$rs["emp_status_work"]."\"";
	}else{
		$dataObject.=",[";
		$dataObject.="\"".$rs["id"]."\",\"".$rs["emp_status_work"]."\"";
	}
	$dataObject.="]";
$i++;
}
$dataObject.="]";
echo $dataObject;

}else{
echo'{"status":"400","error":"not token."}';

}
