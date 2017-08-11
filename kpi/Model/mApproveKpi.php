<? session_start(); ob_start();?>
<?php
include 'config.php';

$year =$_POST['year'];
$appraisal_period_id = $_POST['appraisal_period_id'];
$department_id=$_POST['department_id'];
//$division_id=$_POST['division_id'];
$position_id =$_POST['position_id'];
$employee_id = $_POST['employee_id'];
$adjust_percentage= $_POST['adjust_percentage'];
$adjust_reason= $_POST['adjust_reason'];
$admin_id=$_SESSION['admin_id'];




if($_POST['action']=="showEmpData"){
	//echo "Show Data";

	$strSQL="select e.*,pe.position_name,kr.*,r.role_name,department_name  from employee e
	INNER JOIN position_emp pe on e.position_id=pe.position_id
	INNER JOIN kpi_result kr ON e.emp_id=kr.emp_id
	INNER JOIN role r on pe.role_id=r.role_id
	INNER JOIN department d on e.department_id=d.department_id
	where (kr.department_id='$department_id' or '$department_id' ='All')
	
	and (kr.position_id='$position_id' or '$position_id' ='All')
	AND kr.kpi_year='$year'
	AND (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
	and kr.confirm_flag='Y'
	and kr.admin_id='$admin_id'
	";
	/*
	 $strSQL="select e.*,pe.position_name from employee e
	INNER JOIN position_emp pe on e.position_id=pe.position_id
	where (e.department_id='All' or 'All' ='All')
	and (e.division_id='All' or 'All' ='All')
	and (e.position_id='All' or 'All' ='All')
	";
	*/
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='Tableemployee' class='grid table-striped'>";
	$tableHTML.="<colgroup>";
	$tableHTML.="<col style='width:5%' />";
	$tableHTML.="<col style='width:5%' />";
	$tableHTML.="<col style='width:15%' />";
	$tableHTML.="<col />";
	$tableHTML.="<col />";
	$tableHTML.="<col style='width:8%'/>";
	$tableHTML.="<col style='width:5%'/>";
	$tableHTML.="<col style='width:5%'/>";
	$tableHTML.="<col style='width:5%'/>";
	$tableHTML.="<col style='width:5%'/>";
	/*$tableHTML.="<col />";*/

	$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
	$tableHTML.="<tr>";
	$tableHTML.="<th><b>ID</b></th>";
	$tableHTML.="<th><b>Picture</b></th>";
	$tableHTML.="<th><b>Name</b></th>";
	$tableHTML.="<th><b>Department</b></th>";
	$tableHTML.="<th><b>Position</b></th>";
	$tableHTML.="<th><b>Role</b></th>";
	$tableHTML.="<th><b>Age W</b></th>";
	$tableHTML.="<th><b>Age</b></th>";
	$tableHTML.="<th><b>Tel</b></th>";
	$tableHTML.="<th><b>Perf %</b></th>";
	$tableHTML.="<th><b>Manage</b></th>";
		
	$tableHTML.="</tr>";
	$tableHTML.="</thead>";

	while($rs=mysql_fetch_array($result)){
		$score_percentage="";
	    if($rs['score_final_percentage']!=""){
	    	$score_percentage=$rs['score_final_percentage'];
	    }else{
	    	$score_percentage=$rs['score_sum_percentage'];
	    }

		$tableHTML.="<tbody class=\"contentemployee\">";
		$tableHTML.="<tr>";
		$tableHTML.="	<td>".$i."|".$rs['emp_id']."</td>";
		$tableHTML.="	<td><img class=\"img-circle\" src=".$rs['emp_picture_thum']." width=50></td>";
		$tableHTML.="	<td>".$rs['emp_first_name']." ".$rs['emp_last_name']."</td>";
		$tableHTML.="	<td>".$rs['department_name']."<span style='display:none;' id='depId-".$rs['emp_id']."'>".$rs['department_id']."</span></td>";
		$tableHTML.="	<td>".$rs['position_name']."<span  style='display:none;' id='positionId-".$rs['emp_id']."'>".$rs['position_id']."</span></td>";
		$tableHTML.="	<td>".$rs['role_name']."</td>";
		$tableHTML.="	<td>".$rs['emp_age_working']."</td>";
		$tableHTML.="	<td>".$rs['emp_age']."</td>";
		$tableHTML.="	<td>".$rs['emp_tel']."</td>";
		$tableHTML.="	<td>".number_format((float)$score_percentage, 2, '.', '')."%</td>";
/*
appraisal_period_id	1
department_id	1
division_id	7
employee_id	35
position_id	3
year	2012
*/
		$strSQLKpiResult="
				SELECT  e.emp_id,kr.approve_flag FROM employee e
				INNER JOIN kpi_result kr
				ON e.emp_id=kr.emp_id
				where (kr.kpi_year='$year' or '$year'='All')
				and (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
				and (kr.department_id='$department_id' or '$department_id'='All')
				and (kr.position_id='$position_id' or '$position_id'='All')
				and (kr.emp_id='".$rs['emp_id']."' or '".$rs['emp_id']."'='All')
				and kr.confirm_flag='Y'
		";
		$resultKpiResult=mysql_query($strSQLKpiResult);
		
		$rsKpiResult=mysql_fetch_array($resultKpiResult);
		
		if($rsKpiResult[approve_flag]=="Y"){
		$tableHTML.="	<td>
			<button type='button' id='idApproveKPI-".$rs['emp_id']."' class='actionApproveKPI btn btn-success btn-xs'>Approved </button>
			<button type='button' id='idApproveEditKPI-".$rs['emp_id']."' class='actionApproveEditKPI btn btn-primary btn-xs'>Edit</button>
			</td>";
		}else{
			$tableHTML.="<td>
			<button type='button' id='idApproveKPI-".$rs['emp_id']."' class='actionApproveKPI btn btn-danger btn-xs'>Approve </button>
			<button type='button' id='idApproveEditKPI-".$rs['emp_id']."' class='actionApproveEditKPI btn btn-primary btn-xs'>Edit</button>
					</td>";
		}
		$tableHTML.="</tr>";


		$i++;
	}
	$tableHTML.="</tbody>";
	$tableHTML.="</table>";
	echo $tableHTML;
	mysql_close($conn);
}

if($_POST['action']=="edit"){


	$strSQL="
select adjust_percentage,adjust_reason from kpi_result
WHERE confirm_flag='Y'
and kpi_year='$year'
and appraisal_period_id='$appraisal_period_id'
and emp_id='$employee_id'
	";
	$result=mysql_query($strSQL);
	if($result){
		$rs=mysql_fetch_array($result);
		
		$strSQLEditApprove="
		  	UPDATE kpi_result
			 SET approve_flag='N'
			 where kpi_year='$year' 
			 and appraisal_period_id='$appraisal_period_id' 
			 and emp_id='$employee_id' 
			 and confirm_flag='Y'
			";
		$resultEditApprove=mysql_query($strSQLEditApprove);
		if($resultEditApprove){
			echo "[{\"adjust_percentage\":\"$rs[adjust_percentage]\",\"adjust_reason\":\"$rs[adjust_reason]\"}]";
		}else{
			echo'["error update approve N"]';
		}
		 
		 
		 
		
	}else{
		echo'["error"]';
	}
	
	mysql_close($conn);
}
if($_POST['action']=="editAction"){
	
			// Update kpi_result when change kpi_reult and wait for confirm change.
			
	$strSQL="
	select score_sum_percentage from kpi_result
	WHERE confirm_flag='Y'
	and kpi_year='$year'
	and appraisal_period_id='$appraisal_period_id'
	and emp_id='$employee_id'
	";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	if($rs){
		
		//echo "score_sum_percentage1=". $rs['score_sum_percentage'];
			$score_sum_percentage = $rs['score_sum_percentage']+$adjust_percentage;
			//echo "score_sum_percentage2=".$score_sum_percentage ;
			$strSQLUpdate="
			 UPDATE kpi_result
			 SET adjust_percentage='$adjust_percentage',adjust_reason='$adjust_reason',score_final_percentage='$score_sum_percentage'
			 where kpi_year='$year' 
			 and appraisal_period_id='$appraisal_period_id' 
			 and emp_id='$employee_id' 
			 and confirm_flag='Y'
			";
		
			 $rsResultUpdate=mysql_query($strSQLUpdate);
			 
			 if($rsResultUpdate){
			 	echo '["updateSuccess"]';
			 }else{
			 	echo mysql_error();
			 }
			 
			 //echo" update kpi_result".$resultResultCount['countRow'];
	mysql_close($conn);
	}else{
		echo mysql_error();
	}
}
if($_POST['action']=="approveKpiAction"){

	// Update kpi_result when change kpi_reult and wait for confirm change.
		
	$strSQL="
	select score_sum_percentage,score_final_percentage from kpi_result
	WHERE confirm_flag='Y'
	and kpi_year='$year'
	and appraisal_period_id='$appraisal_period_id'
	and department_id='$department_id'
	and position_id='$position_id'
	and emp_id='$employee_id'
	and admin_id='$admin_id'
	";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	if($rs){
	
		
		
		if($rs['score_final_percentage']==""){
			//echo "empty score_final_percentage=".$rs['score_final_percentage'];
			
			$score_sum_percentage = $rs['score_sum_percentage'] ;
			$strSQLUpdate="
			UPDATE kpi_result
			SET approve_flag='Y',score_final_percentage='$score_sum_percentage'
			where kpi_year='$year'
			and appraisal_period_id='$appraisal_period_id'
			and emp_id='$employee_id'
			and confirm_flag='Y'
			";
		}else{
			//echo "not empty score_final_percentage=".$rs['score_final_percentage'];
			$strSQLUpdate="
			UPDATE kpi_result
			SET approve_flag='Y'
			where kpi_year='$year' 
			and appraisal_period_id='$appraisal_period_id' 
			and emp_id='$employee_id' 
			and confirm_flag='Y'
			";
			
		}
		
		
		
		//echo $score_sum_percentage;
		/*SET approve_flag='Y',score_final_percentage='$score_sum_percentage'*/
		/*
		 $strSQLUpdate="
		UPDATE kpi_result
		SET approve_flag='Y'
		where (kpi_year='$year' or '$year'='All')
		and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
		and (emp_id='$employee_id' or '$employee_id'='All')
		and confirm_flag='Y'
		";
		*/
		$rsResultUpdate=mysql_query($strSQLUpdate);
		
		if($rsResultUpdate){
		echo '["approveSuccess"]';
		}else{
		echo mysql_error();
		}
	
	
	}
	
	//echo" update kpi_result".$resultResultCount['countRow'];



	mysql_close($conn);
}





