<?
include '../config.inc.php';
$strSQL="

		select e.emp_picture_thum,e.emp_id,e.emp_name,pe.position_name,kr.score_final_percentage,
e.position_id,e.emp_email,e.emp_age,e.emp_other,e.emp_tel,kr.score_sum_percentage,
kr.adjust_percentage,kr.adjust_reason,
(select max(threshold_begin) from threshold) as scoreTarget,e.emp_id from employee e
		INNER JOIN position_emp pe
		ON e.position_id=pe.position_id
		INNER JOIN kpi_result kr
		ON e.emp_id=kr.emp_id
		WHERE kr.kpi_year='2012'
		and kr.appraisal_period_id='11'
		and kr.department_id='9'

		";
$result=mysql_query($strSQL);
$htmlcontent="";


?>
		
<?php 				
while($rs=mysql_fetch_array($result)){
	//echo "emp_picture_thum=".$rs['emp_picture_thum']."<br>";
	
	$htmlcontent.="testttt
  		";
	
  		$htmlcontent.="test0
  			";
  			
  			$strSQLKpi="
  			
				select kpi.kpi_id as 'kpi_code' ,kpi.kpi_name as 'kpi_name' ,
				ak.target_data as 'kpi_target' ,ak.kpi_actual_manual as 'kpi_actual' ,
				ak.performance  as 'kpi_performence'
				from assign_kpi ak
				inner JOIN kpi
				ON ak.kpi_id=kpi.kpi_id
				where ak.assign_kpi_year='2012'
				and ak.appraisal_period_id='11'
				and ak.emp_id='$rs[emp_id]'
				and ak.admin_id='198'
  			
		";
  			$resultKpi=mysql_query($strSQLKpi);
  			while($rsKPI=mysql_fetch_array($resultKpi)){
				//echo $rsKPI['kpi_code'];
  				
	  				$htmlcontent.="test1";
				
  			}
  			
  			
  				
  				
  				
  			$htmlcontent.="test";
	
} 
//echo $htmlcontent;
$strSQLKpi="
  	
				select * from assign_kpi
  	
		";
$resultKpi=mysql_query($strSQLKpi);
while($rsKPI=mysql_fetch_array($resultKpi)){
	//echo $rsKPI['kpi_code'];

	  	

}
	