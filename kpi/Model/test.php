<? session_start(); ob_start();?>
<?php 
echo "emp_id=".$_SESSION['emp_id'];
echo "admin_id=".$_SESSION['admin_id'];
/*
include 'config.php';

$strSQLKpiResult="
						select confirm_flag from kpi_result
						where kpi_year=2012
						and appraisal_period_id=1
						and department_id=1
						and division_id=7
						and position_id=55
		";
		$resultKpiResult=mysql_query($strSQLKpiResult);
		$rsKpiResult=mysql_fetch_array($resultKpiResult);
		
		if($rsKpiResult){
			echo "[{\"total_kpi_actual_score\":\"$total_kpi_actual_score\",\"confirm_flag\":\"$rsKpiResult[confirm_flag]\"}]";
		}else{
			echo"not data";
		}
		
	*/


?>
