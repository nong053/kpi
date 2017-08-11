<? session_start(); ob_start();?>

<?php
$admin_id=$_SESSION['admin_id'];
	include 'config.php';
	$year=$_POST['year'];
	$paramSelectAll=$_POST['paramSelectAll'];
	
	//$year="2012";
	if($paramSelectAll=="selectAll"){
		$strSQL="select * from(
		select 'All' as appraisal_period_id,'ทั้งหมด' as appraisal_period_desc ,0 as seq
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
?>