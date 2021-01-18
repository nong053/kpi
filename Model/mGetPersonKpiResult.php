<? session_start(); ob_start();?>
<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){

	
include 'mGenarateJson.php';

$kpi_year=$_GET['kpi_year'];
$appraisal_period_id=$_GET['appraisal_period_id'];
$emp_id=$_GET['emp_id'];
$kpi_id=$_GET['kpi_id'];
$admin_id=$_SESSION['admin_id'];

if($_GET['action']=='list_kpi'){
$strSQL="
	select kpi.kpi_id as 'kpi_code' ,kpi.kpi_name as 'kpi_name' ,
ak.target_data as 'kpi_target' ,ak.kpi_actual_manual as 'kpi_actual' ,
sum(ak.performance)/count(ak.appraisal_period_id)  as 'kpi_performent',
(select max(threshold_begin) from threshold
where admin_id='$admin_id') as 'kpi_target_percentage'
from assign_kpi ak
inner JOIN kpi 
ON ak.kpi_id=kpi.kpi_id
INNER JOIN kpi_result kr on ak.assign_kpi_year=kr.kpi_year
and ak.appraisal_period_id=kr.appraisal_period_id
and ak.department_id=kr.department_id
and ak.emp_id=kr.emp_id

where ak.assign_kpi_year='$kpi_year'
and (ak.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
and ak.emp_id='$emp_id'
and ak.admin_id='$admin_id'
and kr.approve_flag='Y'
GROUP BY kpi.kpi_id

";
$columnName="kpi_code,kpi_name,kpi_target,kpi_actual,kpi_performent,kpi_target_percentage";
genarateJson($strSQL,$columnName,$conn);
}

if($_GET['action']=='score_graph'){
	//echo "tests";
	$strSQL="SELECT GROUP_CONCAT(score) AS score_spraph FROM(
select kr.kpi_year,kr.appraisal_period_id,ROUND(ak.performance,2) as score,
ak.kpi_id,ak.emp_id
from kpi_result kr
INNER JOIN assign_kpi ak
on kr.kpi_year=ak.assign_kpi_year
and kr.admin_id=ak.admin_id
and kr.department_id=ak.department_id
and kr.position_id=ak.position_id
		where kr.kpi_year='$kpi_year'
		and kr.admin_id='$admin_id'
		and ak.kpi_id='$kpi_id'
		and ak.emp_id='$emp_id'
		and kr.approve_flag='Y'
		GROUP BY kr.kpi_year,ak.appraisal_period_id,emp_id
)queryA
	";
	$columnName="score_spraph";
	genarateJson($strSQL,$columnName,$conn);
}

 if($_GET['action']=='bar_chart_appraisal_test'){

	$strSQL="	
	 	select kpi_year,IFNULL(kr.score_final_percentage,0) as actual_score,
(select max(threshold_begin) as target from threshold
where admin_id=$admin_id) as target,
ap.appraisal_period_desc as appraisal,ap.appraisal_period_id
from kpi_result kr
INNER JOIN appraisal_period ap 
on kr.appraisal_period_id=ap.appraisal_period_id
where   emp_id='$emp_id'
and   kpi_year= '$kpi_year' 
and kr.approve_flag='Y'
order by kpi_year,appraisal asc

";
// $columnName="kpi_year,actual_score,target,appraisal";
// genarateJson($strSQL,$columnName,$conn);

$result=mysql_query($strSQL);
$json = array();
$rows = array();
while($r = mysql_fetch_assoc($result)) {
  $rows[] = $r;
}

array_push($json,$kpi_year);
array_push($json,$rows);

echo json_encode($json);


}

if($_GET['action']=='bar_chart_appraisal'){
	$kpi_year_plus=$kpi_year+1;
	$kpi_year_del1=$kpi_year-1;
	$strSQL="	
	
	select kpi_year,group_concat(IFNULL(kr.score_final_percentage,0)ORDER BY ap.appraisal_period_id) as actual_score,
group_concat(ap.appraisal_period_desc ORDER BY ap.appraisal_period_id) as appraisal
from kpi_result kr
INNER JOIN appraisal_period ap 
on kr.appraisal_period_id=ap.appraisal_period_id
where   emp_id='$emp_id'
and kpi_year='$kpi_year_del1'
and kr.admin_id='$admin_id'
and kr.approve_flag='Y'
GROUP BY kpi_year
	
UNION

	select kpi_year,group_concat(IFNULL(kr.score_final_percentage,0)ORDER BY ap.appraisal_period_id) as actual_score,
group_concat(ap.appraisal_period_desc ORDER BY ap.appraisal_period_id) as appraisal
from kpi_result kr
INNER JOIN appraisal_period ap 
on kr.appraisal_period_id=ap.appraisal_period_id
where   emp_id='$emp_id'
and kpi_year='$kpi_year'
and kr.admin_id='$admin_id'
and kr.approve_flag='Y'
GROUP BY kpi_year

union

select kpi_year,group_concat(IFNULL(kr.score_final_percentage,0)ORDER BY ap.appraisal_period_id) as actual_score,
group_concat(ap.appraisal_period_desc ORDER BY ap.appraisal_period_id) as appraisal
from kpi_result kr
INNER JOIN appraisal_period ap 
on kr.appraisal_period_id=ap.appraisal_period_id
where   emp_id='$emp_id'
and kpi_year='$kpi_year_plus'
and kr.admin_id='$admin_id'
and kr.approve_flag='Y'
GROUP BY kpi_year


union
select kpi_year,group_concat(target),appraisal from (
select 'Target' as kpi_year, (select max(threshold_begin) from threshold
where admin_id='$admin_id') as 'target' ,'' as appraisal
from appraisal_period 
where admin_id ='$admin_id'
and appraisal_period_year='$kpi_year'
)query_a

	";
	$columnName="kpi_year,actual_score,appraisal";
	genarateJson($strSQL,$columnName,$conn);
}


if($_GET['action']=='pie_chart_kpi'){
	//echo "tests";
	$strSQL="
		select kpi.kpi_detail,ROUND(sum(ak.performance)/count(ak.appraisal_period_id),2)as performance  from  assign_kpi ak
		INNER JOIN kpi
		on ak.kpi_id=kpi.kpi_id
		INNER JOIN kpi_result kr on ak.assign_kpi_year=kr.kpi_year
		and ak.appraisal_period_id=kr.appraisal_period_id
		and ak.department_id=kr.department_id
		and ak.emp_id=kr.emp_id
		where assign_kpi_year='$kpi_year'
		and  kr.emp_id='$emp_id'
		and (ak.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id' = 'All')
		and ak.admin_id='$admin_id'
		and kr.approve_flag='Y'
GROUP BY kpi.kpi_id
	";
	$columnName="kpi_detail,performance";
	genarateJson($strSQL,$columnName,$conn);
}

if($_GET['action']=='mision_result'){
	//echo "tests";
	$strSQL="
		select kpi.kpi_id,kpi.kpi_name,kpi.kpi_detail,
	ak.kpi_actual_manual as kpi_actual,
	ak.target_data,ak.kpi_actual_score,
	ak.performance
	from  assign_kpi ak
	INNER JOIN kpi
	on ak.kpi_id=kpi.kpi_id
	INNER JOIN kpi_result kr on ak.assign_kpi_year=kr.kpi_year
	and ak.appraisal_period_id=kr.appraisal_period_id
	and ak.department_id=kr.department_id
	and ak.emp_id=kr.emp_id

	where assign_kpi_year='$kpi_year'
	and  emp_id='$emp_id'
	and appraisal_period_id='$appraisal_period_id'
	and ak.admin_id='$admin_id'
	and kr.approve_flag='Y'
	";
	$columnName="kpi_id,kpi_name,kpi_detail,kpi_actual,target_data,kpi_actual_score,performance";
	genarateJson($strSQL,$columnName,$conn);
}
if($_GET['action']=='suggestion_result'){
	//echo "tests";
	$strSQL="
	select * FROM(	
	select kpi.kpi_id,kpi.kpi_name,kpi.kpi_detail,
	ak.kpi_actual_manual as kpi_actual,
	ak.target_data,ak.kpi_actual_score,
	ak.performance,
(select suggestion from baseline
where kpi_id=kpi.kpi_id
and  ak.kpi_actual_score BETWEEN baseline_begin and baseline_end
and suggestion !='') as suggestion
	from  assign_kpi ak
	INNER JOIN kpi
	on ak.kpi_id=kpi.kpi_id
	INNER JOIN kpi_result kr on ak.assign_kpi_year=kr.kpi_year
	and ak.appraisal_period_id=kr.appraisal_period_id
	and ak.department_id=kr.department_id
	and ak.emp_id=kr.emp_id

	where ak.assign_kpi_year='$kpi_year'
	and  kr.emp_id='$emp_id'
	and (ak.appraisal_period_id='$appraisal_period_id'  or '$appraisal_period_id'='All')
	and ak.admin_id='$admin_id'
	and kr.approve_flag='Y'
)QueryA
where suggestion!=''	
GROUP BY kpi_id
	
	
	";
	$columnName="kpi_id,suggestion";
	genarateJson($strSQL,$columnName,$conn);
}

if($_GET['action']=='emp_info'){
	
	$strSQL="select e.*,pe.position_name from employee e 
INNER JOIN position_emp pe 
on e.position_id=pe.position_id
where  emp_id='$emp_id'";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	
	$htmlEmpInfo="
				
				<div class=\"col-md-9\" style='padding-left: 0;padding-right: 0;margin-top:0px;'>
				
					<div class='bgEmpTable'>
					
						<table  class=\"table-striped\">
				  			<tbody><tr>
				  				<td width=\"100\"><b>ชื่อ</b></td>
				  				<td>$rs[emp_first_name]</td>
				  				<td width=\"120\"><b>นามสกุล</b></td>
				  				<td>$rs[emp_last_name]</td>
				  			</tr>
				  			<tr>
				  				<td width=\"100\"><b>ตำแหน่ง</b></td>
				  				<td>$rs[position_name]</td>
				  				<td width=\"120\"><b>อายุการทำางาน</b></td>
				  				<td>$rs[emp_age_working]ปี</td>
				  			</tr>
				  			<tr>
				  				<td><b>วันเดือนปีเกิด</b></td>
				  				<td>$rs[emp_date_of_birth]</td>
				  				<td><b>อายุ</b></td>
				  				<td>$rs[emp_age]ปี</td>
				  			</tr>
				  			<tr>
				  				<td><b>สถานนะ</b></td>
				  				<td>$rs[emp_status]</td>
				  				<td><b>อีเมลล์</b></td>
				  				<td>$rs[emp_email]</td>
				  			</tr>
				  			<tr>
				  				<td><b>เบอร์บ้าน</b></td>
				  				<td>$rs[emp_tel]</td>
				  				<td><b>เบอร์มือถือ</b></td>
				  				<td>$rs[emp_mobile]</td>
				  			</tr>
				  			<tr>
				  				<td><b>ที่อยู่</b></td>
				  				<td>$rs[emp_adress]</td>
				  				<td><b>ตำบล/แขวง</b></td>
				  				<td>$rs[emp_sub_district]</td>
				  			</tr>
				  			<tr>
				  				<td><b>อำเภอ/เขต</b></td>
				  				<td>$rs[emp_district]</td>
				  				<td><b>จังหวัด</b></td>
				  				<td>$rs[emp_province]</td>
				  			</tr>
				  			
				  			<tr>
				  				<td><b>รหัสไปรษณี</b></td>
				  				<td>$rs[emp_postcode]</td>
				  				<td><b>รหัสพนักงาน</b></td>
				  				<td>EMP$rs[emp_id]</td>
				  				
				  			</tr>
				  			
				  		</tbody>
				  	</table>
					</div>
				</div>
				<div class=\"col-md-3 visible-lg visible-md\" style='margin-top:5px;'>
					<img src=$rs[emp_picture_thum] class=\"img-thumbnail img-responsive \">
				</div>
		
		";
	echo $htmlEmpInfo;
	

}

}else{
echo'{"status":"400","error":"not token."}';

}

?>