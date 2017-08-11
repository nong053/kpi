
<?php
	
	include 'config.php';
	$assign_kpi_id=$_POST['assign_kpi_id'];
	//$year="2012";
	$strSQL="select assign_kpi_year,appraisal_period_id,emp_id,position_id,perspective_id from assign_kpi
where assign_kpi_id='$assign_kpi_id'";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	
	echo "[{\"assign_kpi_year\":\"$rs[assign_kpi_year]\",\"appraisal_period_id\":\"$rs[appraisal_period_id]\",
	\"position_id\":\"$rs[position_id]\",\"perspective_id\":\"$rs[perspective_id]\",\"emp_id\":\"$rs[emp_id]\"}]";
?>
