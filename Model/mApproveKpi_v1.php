<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){



	/*
	 year
	appraisalPeriod
	position1
	employee
	perspective
	*/
$year =$_POST['year'];
$appraisalPeriod = $_POST['appraisalPeriod'];
$position =$_POST['position'];
$employee = $_POST['employee'];
$department_id=$_POST['department_id'];
$division_id=$_POST['division_id'];


$adjust_percentage=$_POST['adjust_percentage'];
$adjustment_reason=$_POST['adjustment_reason'];


/*
		alert("departmentId="+$("#departmentId").val());
		alert("divisionId="+$("#divisionId").val());
		alert("positionList="+$("#positionList").val());
		alert("employeeList="+$("#employeeList").val());
		alert("kpiId="+$("#kpiId").val());
		alert("kpi_weight="+$("#kpi_weight").val());
		alert("kpi_target_data="+$("#kpi_target_data").val());
		alert("kpiTypeActual="+$(".kpiTypeActual:checked").val());
		alert("kpiActualManual="+$("#kpiActualManual").val());
		alert("kpiActualQuery="+$("#kpiActualQuery").val());
		alert("target_score="+$("#target_score").val());
*/



if($_POST['action']=="showData"){
	//echo "Show Data";
	/*
	$strSQL="select ak.*,ap.appraisal_period_desc,e.emp_name,pe.position_name from assign_kpi ak
left join appraisal_period ap on ak.appraisal_period_id=ap.appraisal_period_id
left join employee e on ak.emp_id=e.emp_id
left join position_emp pe on ak.position_id=pe.position_id
";
*/
	$strSQL="

	SELECT ak.assign_kpi_id,ap.appraisal_period_id,ap.appraisal_period_desc,emp.emp_id,emp_name,
kr.score_percentage,kr.adjust_percentage,kr.adjustment_reason
FROM assign_kpi ak
INNER JOIN appraisal_period ap
on ak.appraisal_period_id=ap.appraisal_period_id
INNER JOIN employee emp
on ak.emp_id=emp.emp_id
LEFT JOIN kpi_result kr
on ak.assign_kpi_year=kr.kpi_year
AND ak.department_id=kr.department_id
AND ak.division_id=kr.division_id
and ak.emp_id=kr.emp_id
and ak.position_id=kr.position_id

where (emp.emp_id='$employee' or '$employee'='All')
AND (ap.appraisal_period_id='$appraisalPeriod' or '$appraisalPeriod'='All')
AND (ak.position_id='$position' or '$position'='All')
AND (ak.department_id='$department_id' or '$department_id'='All')
AND (ak.division_id='$division_id' or '$division_id'='All')
	";
	
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='TableapproveKpi' class='grid'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:50px' />";
			$tableHTML.="<col  />";
			$tableHTML.="<col  />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th><b>ID</b></th>";
			$tableHTML.="<th><b>Period</b></th>";
			$tableHTML.="<th><b>Employee Code</b></th>";
			$tableHTML.="<th><b>Employee Name</b></th>";
			$tableHTML.="<th><b>Weight Percentage 	</b></th>";
			$tableHTML.="<th><b>Adjust Percentage</b></th>";
			$tableHTML.="<th><b>Adjustment Reason</b></th>";
			$tableHTML.="<th><b>Final Percentage</b></th>";
			$tableHTML.="<th><b>Manage</b></th>";
	
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	
	while($rs=mysql_fetch_array($result)){
		/*
		if($rs['kpi_type_actual']=="0"){
			$kpi_actual=$rs['kpi_actual_manual'];
		}else{
			$kpi_actual=$rs['kpi_actual_query'];
		}
		*/
	$tableHTML.="<tbody class=\"contentassignKpi\">";
	$tableHTML.="<tr>";
	$tableHTML.="	<td>".$i."</td>";
	$tableHTML.="	<td>".$rs['appraisal_period_desc']."</td>";
	$tableHTML.="	<td>".$rs['emp_id']."</td>";
	$tableHTML.="	<td>".$rs['emp_name']."</td>";
	//$tableHTML.="	<td>".$kpi_actual."</td>";
	$tableHTML.="	<td>".$rs['score_percentage']."</td>";
	$tableHTML.="	<td><div  class='adjust_percentage_area".$rs['assign_kpi_id']."'>".$rs['adjust_percentage']."</div></td>";
	$tableHTML.="	<td ><div class='adjustment_reason_area".$rs['assign_kpi_id']."'>".$rs['adjustment_reason']."</div></td>";
	$tableHTML.="	<td>".$rs['final_percentage']."</td>";
	
	

	$tableHTML.="	<td>
			<button type='button' id='idEdit-".$rs['assign_kpi_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>
			
			<button type='button' id='idKpiApprove-".$rs['assign_kpi_id']."' class=' actionkpiApprove btn btn-primary btn-xs'><i class='glyphicon glyphicon-stats'>Approve</i></button>
			</td>";
	$tableHTML.="</tr>";

	
	$i++;
	}
	$tableHTML.="</tbody>";
	$tableHTML.="</table>";
	echo $tableHTML;
	mysql_close($conn);
}

if($_POST['action']=="edit"){
	$id=$_POST['id'];

	$strSQL="SELECT * FROM assign_kpi WHERE assign_kpi_id=$id";
	$result=mysql_query($strSQL);
	if($result){
		$rs=mysql_fetch_array($result);
		
		/*
		kpi_id
		kpi_weight
		target_data
		kpi_type_actual
		kpi_actual_manual
		kpi_actual_query
		target_score
		*/
		
		 echo "[{
	\"adjust_percentage\":\"$rs[adjust_percentage]\",\"adjustment_reason\":\"$rs[adjustment_reason]\"
	}]";
		
	}else{
		echo'["error"]';
	}
	
	mysql_close($conn);
}
if($_POST['action']=="aproveAction"){
	/*
			// $(".adjust_percentage"+id).val();
			// $(".adjustment_reason"+id).text();
	*/

	$strSQL="UPDATE kpi_result SET adjust_percentage='$adjust_percentage',adjustment_reason='$adjustment_reason' 
	
where emp_id='$employee'
AND appraisal_period_id='$appraisalPeriod'
AND position_id='$position'
AND department_id='$department_id'
AND division_id='$division_id'
	";
	$result=mysql_query($strSQL);
	if($result){
		echo'["editSuccess"]';
	}else{
		echo'["error"]'.mysql_error();
	}

	mysql_close($conn);
}

}else{
	echo'{"status":"400","error":"not token."}';
}

