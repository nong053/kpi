<? session_start(); ob_start();?>
<?php

	
include './../config.inc.php';
include 'mGenarateJson.php';


// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){


$kpi_year=$_GET['kpi_year'];
$appraisal_period_id=$_GET['appraisal_period_id'];
$department_id=$_GET['department_id'];
$position_id=$_GET['position_id'];
$emp_id=$_GET['emp_id'];
$kpi_id=$_GET['kpi_id'];
$admin_id=$_SESSION['admin_id'];




/*
echo "kpi_year".$kpi_year."<br>";
echo "appraisal_period_id".$appraisal_period_id."<br>";
echo "department_id".$department_id."<br>";
*/

if($_GET['action']=="list_emp_score"){
	// if($_GET['emp_id']!=""){
		
		$strSQL="select e.emp_picture_thum,
		CONCAT(e.emp_first_name,' ',e.emp_last_name) as emp_name,
		d.department_name,pe.position_name,
ROUND(sum(kr.score_final_percentage)/count(kr.appraisal_period_id),2) as score_final_percentage,
-- (select max(threshold_begin) from threshold )
100 as scoreTarget,

ifnull(kr.adjust_percentage,0) as adjust_percentage,
ifnull(kr.score_sum_percentage,0) as score_sum_percentage,
ifnull(kr.emp_score_sum_percentage,0)as emp_score_sum_percentage,

e.emp_id,kr.appraisal_period_id
 from employee e
		INNER JOIN position_emp pe
		ON e.position_id=pe.position_id
		INNER JOIN kpi_result kr
		ON e.emp_id=kr.emp_id
		INNER JOIN department d on e.department_id=d.department_id
		WHERE kr.kpi_year='$kpi_year'
		and (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
		and (kr.department_id='$department_id' or 'All'='$department_id')
	    and (kr.position_id='$position_id' or 'All'='$position_id')
		and (kr.emp_id='$_GET[emp_id]' or 'All'='$_GET[emp_id]')
		and kr.admin_id='$admin_id'
		and kr.approve_flag='Y'
		GROUP BY e.emp_id
		";
	/*
	}else{
		$strSQL="
				select e.emp_picture_thum,CONCAT(e.emp_first_name,' ',e.emp_last_name) as emp_name,d.department_name,pe.position_name,
ROUND(sum(kr.score_final_percentage)/count(kr.appraisal_period_id),2) as score_final_percentage,
(select max(threshold_begin) from threshold ) as scoreTarget,e.emp_id,kr.appraisal_period_id
 from employee e
		INNER JOIN position_emp pe
		ON e.position_id=pe.position_id
		INNER JOIN kpi_result kr
		ON e.emp_id=kr.emp_id
		INNER JOIN department d on e.department_id=d.department_id
		WHERE kr.kpi_year='$kpi_year'
		and (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
		and (kr.department_id='$department_id' or '$department_id'='All')
		and (kr.position_id='$position_id' or 'All'='$position_id')
		and kr.admin_id='$admin_id'
		and kr.approve_flag='Y'
		GROUP BY e.emp_id
				";
	}
	*/
	


	$columnName="emp_picture_thum,emp_name,position_name,score_final_percentage,scoreTarget,emp_id,department_name,adjust_percentage,emp_score_sum_percentage,score_sum_percentage";
	genarateJson($strSQL,$columnName,$conn);
}

if($_GET['action']=="score_spraph_emp"){
	$strSQL="
	
	select kpi_year,GROUP_CONCAT(IFNULL(kr.score_final_percentage,0) ORDER BY ap.appraisal_period_id) as score_spraph,
GROUP_CONCAT(ap.appraisal_period_desc ORDER BY ap.appraisal_period_id) as appraisal
from kpi_result kr
INNER JOIN appraisal_period ap 
on kr.appraisal_period_id=ap.appraisal_period_id
where   emp_id='$emp_id'
and kpi_year<='$kpi_year'
and kr.admin_id='$admin_id'
and kr.approve_flag='Y'
GROUP BY kpi_year
	
	
	
	";
	
	$columnName="score_spraph";
	genarateJson($strSQL,$columnName,$conn);
}
if($_GET['action']=="score_spraph"){
	if($emp_id!=""){
		$strSQL="
		
		select GROUP_CONCAT(score) as score_spraph from(
select kr.kpi_year,kr.appraisal_period_id,ROUND(sum(score_final_percentage)/count(kr.emp_id),2) as score,
ak.kpi_id
from kpi_result kr
INNER JOIN assign_kpi ak
on kr.kpi_year=ak.assign_kpi_year
and kr.admin_id=ak.admin_id
and kr.department_id=ak.department_id
and kr.position_id=ak.position_id

		where kr.kpi_year='$kpi_year'
		and kr.admin_id='$admin_id'
		and (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
		and kr.emp_id='$emp_id'
		and ak.kpi_id='$kpi_id'
		and (kr.department_id='$department_id' or '$department_id'='All')
		and kr.approve_flag='Y'
		GROUP BY kr.kpi_year,kr.appraisal_period_id,kr.emp_id,kr.department_id,ak.kpi_id
)queryA
		
		
	";
	}else{
		$strSQL="select GROUP_CONCAT(score) as score_spraph from(
select kr.kpi_year,kr.appraisal_period_id,ROUND(sum(score_final_percentage)/count(kr.emp_id),2) as score,
ak.kpi_id
from kpi_result kr
INNER JOIN assign_kpi ak
on kr.kpi_year=ak.assign_kpi_year
and kr.admin_id=ak.admin_id
and kr.department_id=ak.department_id
and kr.position_id=ak.position_id


		where kr.kpi_year='$kpi_year'
		and kr.admin_id='$admin_id'
		and (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
		and ak.kpi_id='$kpi_id'
		and kr.approve_flag='Y'
		and (kr.department_id='$department_id' or '$department_id'='All')
		GROUP BY kr.kpi_year,kr.appraisal_period_id,kr.department_id,ak.kpi_id
)queryA
		
		";
		
	}
		
	$columnName="score_spraph";
	genarateJson($strSQL,$columnName,$conn);
}

}else{
	echo'{"status":"400","error":"not token."}';
}

?>