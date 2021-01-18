<? session_start(); ob_start();?>
<?php
include './../config.inc.php';

// Convert JSON string to Array

//echo "token_data1==".$token_data1;
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){
	
include 'mGenarateJson.php';
$emp_id=$_GET['emp_id'];
//echo "emp_id=".$_SESSION['emp_id'];
if($_SESSION['emp_ses_id']!=""){
	
	$strSQL="
		
select 'emp' as role,d.department_id,pe.position_id,d.department_name,(select year(CURDATE()))as current_year,r.role_name  from employee e
INNER JOIN department d on e.department_id=d.department_id
INNER JOIN position_emp pe on e.position_id=pe.position_id
INNER JOIN role r on pe.role_id=r.role_id

where emp_id='$emp_id'

	";
	$columnName="role,department_id,department_name,current_year,role_name,position_id";
	genarateJson($strSQL,$columnName,$conn);
	
}else{
	echo '["admin"]';
}


}else{
	echo'{"status":"400","error":"not token."}';
}


?>