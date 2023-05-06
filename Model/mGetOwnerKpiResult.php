<?php session_start(); ob_start();?>
<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){



include 'mGenarateJson.php';

$kpi_year=$_GET['kpi_year'];
$appraisal_period_id=$_GET['appraisal_period_id'];
$appraisal_period_id=$_GET['appraisal_period_id'];
$department_id=$_GET['department_id'];


$admin_id=$_SESSION['admin_id'];

if($_GET['action']=="guageOwner"){
	$strSQL="
	select 
	(sum(kr.score_final_percentage)/COUNT(kr.emp_id)) as total_score,
	(select GROUP_CONCAT(threshold_begin)
	from threshold  order by threshold_begin)as threshold_begin ,
	(select GROUP_CONCAT(threshold_end)
	from threshold  order by threshold_end)as threshold_end ,
	(select GROUP_CONCAT(threshold_color)
	from threshold  order by threshold_color)as threshold_color 
	
	from kpi_result kr 
	where kr.kpi_year='$kpi_year'
	-- and (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
	-- and (kr.department_id='$department_id' or '$department_id'='All')
	and kr.admin_id='$admin_id'
	and kr.approve_flag='Y'
	GROUP BY kr.kpi_year
	";
	$columnName="total_score,threshold_begin,threshold_end,threshold_color";
	genarateJson($strSQL,$columnName,$conn);

}
if($_GET['action']=="appraialBarChartOwner"){
	$kpi_year_plus=$kpi_year+1;
	$kpi_year_minus=$kpi_year-1;
	$strSQL="
	
	select kpi_year,GROUP_CONCAT(IFNULL(actual_score,0)) as actual_score ,
	GROUP_CONCAT(IFNULL(appraisal,0)) as appraisal from(
	select kpi_year,round(sum(kr.score_final_percentage)/count(kr.emp_id),2) as actual_score,
	ap.appraisal_period_desc as appraisal,  ap.appraisal_period_id
	from kpi_result kr
	INNER JOIN appraisal_period ap on kr.appraisal_period_id=ap.appraisal_period_id
	INNER JOIN employee e on e.emp_id=kr.emp_id
	
	where kpi_year BETWEEN '$kpi_year_minus' and '$kpi_year'
	and kr.admin_id='$admin_id'
	and kr.approve_flag='Y'
	and e.emp_status_work_id='1'
	GROUP BY kr.appraisal_period_id
	)queryA
	GROUP BY kpi_year	
	


	
	
	";
	$columnName="kpi_year,actual_score,appraisal";
	genarateJson($strSQL,$columnName,$conn);
}

if($_GET['action']=="scoreDepartmentOwner"){
	$strSQL="


	select d.department_id,
	d.department_name,ifnull(
     (select
	 sum(kr.score_final_percentage)/count(kr.emp_id) 
     from kpi_result kr
	 inner join employee e on e.emp_id=kr.emp_id
     where kpi_year='$kpi_year'
	and kr.admin_id='$admin_id'
	and kr.approve_flag='Y'
	and e.emp_status_work_id='1'
    and kr.department_id=d.department_id
	),0) as total_score
     
	from  department d
	where d.admin_id='$admin_id'
	GROUP BY d.department_id

		
	
	";
	$columnName="department_id,department_name,total_score";
	genarateJson($strSQL,$columnName,$conn);
}
if($_GET['action']=="test"){
	$strSQL="
	
	select kpi_year,GROUP_CONCAT(IFNULL(actual_score,0)) as actual_score ,
	GROUP_CONCAT(IFNULL(appraisal,0)) as appraisal from(
	select kpi_year,kr.department_id,kr.score_final_percentage as actual_score,
	ap.appraisal_period_desc as appraisal,  ap.appraisal_period_id,
	kr.emp_id
	from kpi_result kr
	INNER JOIN appraisal_period ap 
	on kr.appraisal_period_id=ap.appraisal_period_id
	where   kpi_year<=2012+1
	GROUP BY kr.appraisal_period_id

	)queryA
	
	GROUP BY kpi_year
			
	UNION
	
	select 'Target' as kpi_year,  GROUP_CONCAT(IFNULL(ap.appraisal_period_target_percentage,0)),'' as appraisal from appraisal_period ap
	where appraisal_period_year='$kpi_year'
	
	";
	
	$columnName="kpi_year,actual_score,appraisal";
	genarateJson($strSQL,$columnName,$conn);
}
if($_GET['action']=="pieChartByDepartment"){
	$strSQL="
	select 
d.department_name,
sum(kr.score_final_percentage)/count(kr.emp_id) as total_soore
from  kpi_result kr 
inner JOIN department d
on kr.department_id=d.department_id
where kpi_year='$kpi_year'
and kr.admin_id='$admin_id'
and kr.approve_flag='Y'
and (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
GROUP BY kr.kpi_year,kr.department_id
	";

	$columnName="department_name,total_soore";
	genarateJson($strSQL,$columnName,$conn);
}
if($_GET['action']=="pieChartKpiResult"){
	$strSQL="
select ak.kpi_id,k.kpi_name,sum(ak.performance)/count(kr.emp_id) as score  from assign_kpi ak
INNER JOIN kpi k
on ak.kpi_id=k.kpi_id
INNER JOIN kpi_result kr on ak.assign_kpi_year=kr.kpi_year
and ak.appraisal_period_id=kr.appraisal_period_id
and ak.department_id=kr.department_id
where ak.assign_kpi_year='$kpi_year'
and ak.admin_id='$admin_id'
and (ak.department_id='$department_id' or '$department_id'='All')
and (ak.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
and kr.approve_flag='Y'
GROUP BY ak.assign_kpi_year,ak.kpi_id
	";

	$columnName="kpi_name,score";
	genarateJson($strSQL,$columnName,$conn);
}
if($_GET['action']=="tableKpiResult"){
	$strSQL="
select kpi.kpi_code as 'kpi_code', kpi.kpi_id as 'kpi_id' ,kpi.kpi_name as 'kpi_name',kpi_better_flag,
sum(ak.target_data)/count(kr.emp_id) as 'kpi_target' ,sum(ak.kpi_actual_manual)/count(kr.emp_id) as 'kpi_actual',
sum(ak.performance)/count(kr.emp_id)  as 'kpi_performance',
(select max(threshold_begin) from threshold
where admin_id='$admin_id') as kpi_target_percentage
from assign_kpi ak
inner JOIN kpi 
ON ak.kpi_id=kpi.kpi_id
INNER JOIN kpi_result kr on ak.assign_kpi_year=kr.kpi_year
and ak.appraisal_period_id=kr.appraisal_period_id
and ak.department_id=kr.department_id
and ak.emp_id=kr.emp_id

where ak.assign_kpi_year='$kpi_year'
and ak.admin_id='$admin_id'
and (ak.department_id='$department_id' or '$department_id'='All')
and (ak.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
and kr.approve_flag='Y'
GROUP BY ak.assign_kpi_year,ak.kpi_id
";
	/*kpi_id,kpi_name,kpi_better_flag,kpi_target,kpi_actual,kpi_performance*/
	$columnName="kpi_id,kpi_name,kpi_target,kpi_actual,kpi_performance,kpi_code,kpi_target_percentage,kpi_better_flag";
	genarateJson($strSQL,$columnName,$conn);
}

if($_GET['action']=="perspective_result"){
	$strSQL_bk="
	select pp.perspective_id,pp.perspective_name, 
ifnull(
(

	select  sum(aek.performance*p.perspective_weight)/sum(p.perspective_weight) as pers_result  from assign_evaluate_kpi aek
	inner join kpi k on k.kpi_id=aek.kpi_id
	inner join perspective p on k.perspective_id=p.perspective_id
	where aek.assign_kpi_year='$kpi_year'
	and aek.admin_id='$admin_id'
	and p.perspective_id=pp.perspective_id
	group by p.perspective_id

),0) as pers_performance,pp.perspective_weight,


ifnull(
pp.perspective_weight *(

	select  sum(aek.performance*p.perspective_weight)/sum(p.perspective_weight) as pers_result  from assign_evaluate_kpi aek
	inner join kpi k on k.kpi_id=aek.kpi_id
	inner join perspective p on k.perspective_id=p.perspective_id
	where aek.assign_kpi_year='$kpi_year'
	and aek.admin_id='$admin_id'
	and p.perspective_id=pp.perspective_id
	group by p.perspective_id

),0) as pers_result
from perspective pp
where pp.admin_id='$admin_id'



";
$strSQL="

select pp.perspective_id,pp.perspective_name, 

(ifnull(
(

	select  sum(aek.performance*p.perspective_weight)/sum(p.perspective_weight) as pers_result  from assign_evaluate_kpi aek
	inner join kpi k on k.kpi_id=aek.kpi_id
	inner join perspective p on k.perspective_id=p.perspective_id
	inner join kpi_result kr on aek.emp_id=kr.emp_id
	inner join employee e on e.emp_id=kr.emp_id
	where aek.assign_kpi_year='$kpi_year'
	and aek.admin_id='$admin_id'
	and kr.approve_flag='Y'
	and e.emp_status_work_id='1'
	and p.perspective_id=pp.perspective_id
	and (aek.complete_kpi_score_flag='Y' or aek.emp_complete_kpi_score_flag='Y')
	group by p.perspective_id

),0)*60/100 )
+
(ifnull(
(

	select  sum(aek.emp_performance*p.perspective_weight)/sum(p.perspective_weight) as pers_result  from assign_evaluate_kpi aek
	inner join kpi k on k.kpi_id=aek.kpi_id
	inner join perspective p on k.perspective_id=p.perspective_id
	inner join kpi_result kr on aek.emp_id=kr.emp_id
	inner join employee e on e.emp_id=kr.emp_id
	where aek.assign_kpi_year='$kpi_year'
	and aek.admin_id='$admin_id'
	and kr.approve_flag='Y'
	and e.emp_status_work_id='1'
	and p.perspective_id=pp.perspective_id
	and (aek.complete_kpi_score_flag='Y' or aek.emp_complete_kpi_score_flag='Y')
	group by p.perspective_id

),0)*40/100)

 as pers_performance,
 

ifnull(
pp.perspective_weight *(

	select  (sum((aek.performance*60/100)*p.perspective_weight)/sum(p.perspective_weight)) as pers_result  from assign_evaluate_kpi aek
	inner join kpi k on k.kpi_id=aek.kpi_id
	inner join perspective p on k.perspective_id=p.perspective_id
	inner join kpi_result kr on aek.emp_id=kr.emp_id
	inner join employee e on e.emp_id=kr.emp_id
	where aek.assign_kpi_year='$kpi_year'
	and aek.admin_id='$admin_id'
	and kr.approve_flag='Y'
	and e.emp_status_work_id='1'
	and p.perspective_id=pp.perspective_id
	and (aek.complete_kpi_score_flag='Y' or aek.emp_complete_kpi_score_flag='Y')
	group by p.perspective_id

),0) +
ifnull(
pp.perspective_weight *(

	select  (sum((aek.emp_performance*40/100)*p.perspective_weight)/sum(p.perspective_weight)) as pers_result  from assign_evaluate_kpi aek
	inner join kpi k on k.kpi_id=aek.kpi_id
	inner join perspective p on k.perspective_id=p.perspective_id
	inner join kpi_result kr on aek.emp_id=kr.emp_id
	inner join employee e on e.emp_id=kr.emp_id
	where aek.assign_kpi_year='$kpi_year'
	and aek.admin_id='$admin_id'
	and kr.approve_flag='Y'
	and e.emp_status_work_id='1'
	and p.perspective_id=pp.perspective_id
	and (aek.complete_kpi_score_flag='Y' or aek.emp_complete_kpi_score_flag='Y')
	group by p.perspective_id

),0) as pers_result,
pp.perspective_weight

from perspective pp
where pp.admin_id='$admin_id'
";



	/*kpi_id,kpi_name,kpi_better_flag,kpi_target,kpi_actual,kpi_performance*/
	$columnName="perspective_id,perspective_name,pers_performance,perspective_weight,pers_result";
	genarateJson($strSQL,$columnName,$conn);
}


}else{
echo'{"status":"400","error":"not token."}';

}


?>