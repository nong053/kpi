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
$admin_id=$_SESSION['admin_id'];

/*
$strSQL="
select ROUND(sum(score_final_percentage)/count(appraisal_period_id),2)as score_final_percentage  ,
(select GROUP_CONCAT(threshold_begin)
from threshold where  admin_id='$admin_id' order by threshold_begin)as threshold_begin ,
(select GROUP_CONCAT(threshold_end)
from threshold where  admin_id='$admin_id' order by threshold_end)as threshold_end ,
(select GROUP_CONCAT(threshold_color)
from threshold where  admin_id='$admin_id' order by threshold_color)as threshold_color 
from kpi_result
where kpi_year='$kpi_year'
and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
and emp_id='$emp_id'
and admin_id='$admin_id'		
";
*/
$strSQL="
select ROUND(sum(score_final_percentage)/count(appraisal_period_id),2)as score_final_percentage  ,
(select GROUP_CONCAT(threshold_begin)
from threshold  order by threshold_begin)as threshold_begin ,
(select GROUP_CONCAT(threshold_end)
from threshold  order by threshold_end)as threshold_end ,
(select GROUP_CONCAT(threshold_color)
from threshold order by threshold_color)as threshold_color 
from kpi_result
where kpi_year='$kpi_year'
and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
and emp_id='$emp_id'
and admin_id='$admin_id'		
";
$columnName="score_final_percentage,threshold_begin,threshold_end,threshold_color";
genarateJson($strSQL,$columnName,$conn);




}else{
echo'{"status":"400","error":"not token."}';

}

?>