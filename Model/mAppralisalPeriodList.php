<? session_start(); ob_start();?>

<?php
include './../config.inc.php';
$admin_id=$_SESSION['admin_id'];
// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){


	$year=$_POST['year'];
	$paramSelectAll=$_POST['paramSelectAll'];
	
	//$year="2012";
	if($paramSelectAll=="selectAll"){
		$strSQL="select * from(
		select 'All' as appraisal_period_id,'ทุกช่วง' as appraisal_period_desc ,0 as seq
		UNION
		select appraisal_period_id,appraisal_period_desc,1 as seq from appraisal_period where  appraisal_period_year ='$year'
		and admin_id='$admin_id'
		ORDER BY appraisal_period_id ASC
		)queryA
		ORDER BY seq,appraisal_period_id  ASC";
	}else{
		$strSQL="
		select appraisal_period_id,appraisal_period_desc,1 as seq from appraisal_period where  appraisal_period_year ='$year'
		and admin_id='$admin_id'
		ORDER BY appraisal_period_id ASC
		";
	}
	
	
	$result=mysql_query($strSQL);
	$i=0;
	$dataObject="";
	$dataObject.="[";
	while($rs=mysql_fetch_array($result)){
		if($i==0){
			$dataObject.="[";
			$dataObject.="\"".$rs["appraisal_period_id"]."\",\"".$rs["appraisal_period_desc"]."\"";
		}else{
			$dataObject.=",[";
			$dataObject.="\"".$rs["appraisal_period_id"]."\",\"".$rs["appraisal_period_desc"]."\"";
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