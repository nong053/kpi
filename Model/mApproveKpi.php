<?php session_start(); ob_start();?>
<?php
include './../config.inc.php';
include 'mGenarateJson.php';
// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){



$year =$_POST['year'];
$appraisal_period_id = $_POST['appraisal_period_id'];
$department_id=$_POST['department_id'];
$role_id=$_POST['role_id'];
$position_id =$_POST['position_id'];
$employee_id = $_POST['employee_id'];
$adjust_percentage= $_POST['adjust_percentage'];
$adjust_reason= $_POST['adjust_reason'];
$admin_id=$_SESSION['admin_id'];
$total_score_percentage= $_POST['total_score_percentage'];




if($_POST['action']=='list_kpi'){
	$strSQL="
		select kpi.kpi_id as 'kpi_code' ,kpi.kpi_name as 'kpi_name' ,kpi.kpi_unit,
	ak.target_data as 'kpi_target' ,ak.kpi_actual_manual as 'kpi_actual' ,
	sum(ak.performance)/count(ak.appraisal_period_id)  as 'kpi_performent',
	ifnull(ak.emp_kpi_actual_manual,0) as 'emp_kpi_actual' ,
	ifnull(ak.emp_performance,0) as 'emp_performance' ,
	100 as 'kpi_target_percentage'
	from assign_evaluate_kpi ak
	inner JOIN kpi 
	ON ak.kpi_id=kpi.kpi_id
	INNER JOIN kpi_result kr on ak.assign_kpi_year=kr.kpi_year
	and ak.appraisal_period_id=kr.appraisal_period_id
	and ak.department_id=kr.department_id
	and ak.emp_id=kr.emp_id

	where ak.assign_kpi_year='$year'
	and (ak.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
	and ak.emp_id='$employee_id'
	and ak.admin_id='$admin_id'
	
	GROUP BY kpi.kpi_id

	";
	$columnName="kpi_code,kpi_name,kpi_target,kpi_actual,kpi_performent,kpi_target_percentage,emp_kpi_actual,emp_performance,kpi_unit";
	genarateJson($strSQL,$columnName,$conn);
}
if($_POST['action']=="showEmpData"){
	//echo "Show Data";

	$strSQL="select e.*,pe.position_name,kr.*,r.role_name,department_name  from employee e
	INNER JOIN position_emp pe on e.position_id=pe.position_id
	INNER JOIN kpi_result kr ON e.emp_id=kr.emp_id
	INNER JOIN role r on e.role_id=r.role_id
	INNER JOIN department d on e.department_id=d.department_id
	where (kr.department_id='$department_id' or '$department_id' ='All')
	
	and (kr.position_id='$position_id' or '$position_id' ='All')
	AND kr.kpi_year='$year'
	AND (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
	AND (e.role_id='$role_id' or '$role_id'='All')

	and (kr.confirm_flag='Y' or kr.emp_confirm_flag='Y') 
	
	and e.emp_status_work_id='1'
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
	//$result=$conn->query($strSQL);
	$result=$conn->query($strSQL);
	$$tableHTML="";
	$i=1;
/*
	$tableHTML.="<table id='Tableemployee' class='grid table-striped table'>";
	$tableHTML.="<colgroup>";
	// $tableHTML.="<col style='width:5%' />";
	$tableHTML.="<col style='width:100px;' />";
	$tableHTML.="<col style='width:100px;' />";
	$tableHTML.="<col style='width:100px; text-align:right;'/>";
	$tableHTML.="<col style='width:100px;' />";
	$tableHTML.="<col style='width:100px;'/>";
	$tableHTML.="<col style='width:100px;'/>";
	$tableHTML.="<col style='width:100px; text-align:center'/>";
	
	//$tableHTML.="<col style='width:5%'/>";
	// $tableHTML.="<col style='width:10% text-align:right'/>";
	

	$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
	$tableHTML.="<tr>";
	// $tableHTML.="<th data-field=\"column1\"><b>".$_SESSION['approve_emp_l_tbl_id']."</b></th>";
	$tableHTML.="<th style='text-align:center;' data-field=\"column2\"><b>".$_SESSION['approve_emp_l_tbl_picture']."</b></th>";
	$tableHTML.="<th data-field=\"column3\"><b>".$_SESSION['approve_emp_l_tbl_fullname']."</b></th>";
	//$tableHTML.="<th data-field=\"column4\"><b>".$_SESSION['approve_emp_l_tbl_department']."</b></th>";
	// $tableHTML.="<th data-field=\"column5\"><b>".$_SESSION['approve_emp_l_tbl_position']."</b></th>";
	//$tableHTML.="<th data-field=\"column6\"><b>Role</b></th>";
	//$tableHTML.="<th data-field=\"column7\"><b>Age W</b></th>";
	//$tableHTML.="<th data-field=\"column8\"><b>".$_SESSION['approve_emp_l_tbl_age']."</b></th>";
	//$tableHTML.="<th data-field=\"column9\"><b>Tel</b></th>";
	$tableHTML.="<th style='text-align:right;'  data-field=\"column10\"><b>".$_SESSION['approve_emp_l_tbl_emp_result']."</b></th>";
	$tableHTML.="<th style='text-align:right;'  data-field=\"column11\"><b>".$_SESSION['approve_emp_l_tbl_result']."</b></th>";
	$tableHTML.="<th style='text-align:right;'  data-field=\"column12\"><b>".$_SESSION['approve_emp_l_tbl_adjust_result']."</b></th>";
	$tableHTML.="<th style='text-align:right;'  data-field=\"column13\"><b>".$_SESSION['approve_emp_l_tbl_total_result']."</b></th>";

	$tableHTML.="<th style='text-align:center;'  data-field=\"column14\" style='text-align:center;'><b>".$_SESSION['approve_emp_l_tbl_manage']."</b></th>";
		
	$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	$tableHTML.="<tbody class=\"contentemployee\">";
*/
	//while($rs=mysql_fetch_array($result)){
	while($rs=$result->fetch_assoc()){

		$score_percentage="";
		$emp_score_percentage="";
		$adjust_score_percentage="";
		$total_score_percentage="";

	    // if($rs['score_final_percentage']!=""){
	    // 	$score_percentage=$rs['score_final_percentage'];
	    // }else{
	    // 	$score_percentage=$rs['score_sum_percentage'];
	    // }

	    $chief_score_percentage=$rs['score_sum_percentage'];
	    $emp_score_percentage=$rs['emp_score_sum_percentage'];

	    $adjust_score_percentage=$rs['adjust_percentage'];

	 
	    $total_score_percentage=(($rs['score_sum_percentage']*60/100) +($rs['emp_score_sum_percentage']*40/100)+$adjust_score_percentage);


		
		$tableHTML.="<div class='col-md-3'>";
			$tableHTML.="<div class='alert alert-success'>";
			//$tableHTML.="	<div style='text-align:center;'>";
			
			if (empty($rs['emp_picture_thum'])) {
				$tableHTML .= "<div style='text-align:center;'>	<img width=100 height=100 class=\"img-circle\" style='opacity:0.1;' src=\"../View/uploads/avatar.jpg\" ><a id='actionViewEmployee-".$rs['emp_id']."' class='actionViewEmployee'>".$rs['emp_code']."</a></div>";
			} else {
				$tableHTML .= "<div style='text-align:center;'>	<img width=100 height=100 class=\"img-circle\" src=\"" . $rs['emp_picture_thum'] . "\" ><a id='actionViewEmployee-".$rs['emp_id']."' class='actionViewEmployee'>".$rs['emp_code']."</a></div>";
			}
			// <img class=\"img-circle\" src=".$rs['emp_picture_thum']." width=80 height=80></td>";
			$tableHTML.="<table class='table'>";
			if($rs['role_id']==3){
				
				$tableHTML.="<tr>";
				$tableHTML.="<td></td><td><span  class=\" starGreen glyphicon glyphicon-star\" ></span></td>";
				$tableHTML.="</tr>";
				


			}else if($rs['role_id']==2){
				$tableHTML.="<tr>";
				$tableHTML.="<td></td><td><span  class=\" starYellow glyphicon glyphicon-star\" ></span><span class=\"starYellow glyphicon glyphicon-star\" ></span></td>";
				$tableHTML.="</tr>";
/*
				$tableHTML.="	<div>
				<span  class=\" starYellow glyphicon glyphicon-star\" ></span><span class=\"starYellow glyphicon glyphicon-star\" ></span><br>
				<b>".$rs['emp_first_name']." ".$rs['emp_last_name']."</b><br>"
				.$rs['department_name']."<br>
				ตำแหน่ง".$rs['position_name']."<br>
				อายุงาน ".dateDifference($rs['emp_age_working'],date("Y-m-d"))."ปี
				</div>";
*/
			}else if($rs['role_id']==1){
				$tableHTML.="<tr>";
				$tableHTML.="<td></td><td><span   class=\" starRed glyphicon glyphicon-star\" ></span><span class=\"starRed glyphicon glyphicon-star\" ></span><span class=\"starRed glyphicon glyphicon-star\" ></span></td>";
				$tableHTML.="</tr>";

/*
				$tableHTML.="	<div>
				<span   class=\" starRed glyphicon glyphicon-star\" ></span><span class=\"starRed glyphicon glyphicon-star\" ></span><span class=\"starRed glyphicon glyphicon-star\" ></span><br>
				<b>".$rs['emp_first_name']." ".$rs['emp_last_name']."</b><br>"
				.$rs['department_name']."<br>
				ตำแหน่ง".$rs['position_name']."<br>
				อายุงาน ".dateDifference($rs['emp_age_working'],date("Y-m-d"))."ปี
				</div>";
*/

				
			}

				$tableHTML.="<tr>";
					$tableHTML.="<td>ชื่อ-นามสกุล</td><td class='textR'><b>".$rs['emp_first_name']." ".$rs['emp_last_name']."</b></td>";
				$tableHTML.="</tr>";
				$tableHTML.="<tr>";
					$tableHTML.="<td>แผนก/ฝ่าย</td><td class='textR'>".$rs['department_name']."</td>";
				$tableHTML.="</tr>";
				$tableHTML.="<tr>";
					$tableHTML.="<td>ตำแหน่ง</td><td class='textR'>".$rs['position_name']."</td>";
				$tableHTML.="</tr>";
				$tableHTML.="<tr>";
					$tableHTML.="<td>อายุงาน</td><td class='textR'> ".dateDifference($rs['emp_age_working'],date("Y-m-d"))."ปี</td>";
				$tableHTML.="</tr>";

			
			$tableHTML.="<tr>";
			$tableHTML.="<td>ประเมินตนเอง</td>	<td class='textR'><div id='emp_score_percentage-".$rs['emp_id']."' style=' text-align:right; color:orange; font-weight:bold;'>".number_format((float)$emp_score_percentage, 2, '.', '')."%</div></td>";
			$tableHTML.="</tr>";
			$tableHTML.="<tr>";
			$tableHTML.="<td>หัวหน้าประเมิน</td>	<td class='textR'><div id='chief_score_percentage-".$rs['emp_id']."' style='text-align:right; color:orange; font-weight:bold;'>".number_format((float)$chief_score_percentage, 2, '.', '')."%</div></td>";
			$tableHTML.="</tr>";
			$tableHTML.="<tr>";
			$tableHTML.="<td>ปรับผลประเมิน</td>	<td class='textR'><div id='adjust_score_percentage-".$rs['emp_id']."' style='text-align:right; color:orange; font-weight:bold;'>".number_format((float)$adjust_score_percentage, 2, '.', '')."%</div></td>";
			$tableHTML.="</tr>";
			$tableHTML.="<tr>";
			$tableHTML.="<td>สรุปผลปฏบัติงาน</td>	<td class='textR'><div id='total_score_percentage-".$rs['emp_id']."' style='text-align:right; color:green; font-weight:bold;'>".number_format((float)$total_score_percentage, 2, '.', '')."%</div></td>";
			$tableHTML.="</tr>";
			
			$tableHTML.="</table>";
			
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
			//$resultKpiResult=$conn->query($strSQLKpiResult);
			//$rsKpiResult=mysql_fetch_array($resultKpiResult);
			$resultKpiResult=$conn->query($strSQLKpiResult);
			$rsKpiResult=$resultKpiResult->fetch_assoc();;
			
			if($rsKpiResult['approve_flag']=="Y"){
			$tableHTML.="	<div>
				<div style='text-align:center'>
					<button type='button' id='actionNewEvaluate-".$rs['kpi_year']."-".$rs['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."-".$rs['role_id']."' class='btn-block1 actionNewEvaluate btn btn-danger'>ประเมินใหม่</button>
					<button type='button' id='idApproveEditKPI-".$rs['kpi_year']."-".$rs['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."-".$rs['role_id']."' class='btn-block1 actionApproveEditKPI btn btn-primary'>ปรับคะแนน</button>
					<button type='button' id='idApproveKPI-".$rs['kpi_year']."-".$rs['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."-".$rs['role_id']."' class='btn-block1 actionApproveKPI btn btn-success '>อนุมัติแล้ว </button>
				</div>
				</div>";
			}else{
				$tableHTML.="<div>
				<div style='text-align:center'>
					<button type='button' id='actionNewEvaluate-".$rs['kpi_year']."-".$rs['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."-".$rs['role_id']."' class='btn-block1 actionNewEvaluate btn btn-danger'>ประเมินใหม่</button>
					<button type='button' id='idApproveEditKPI-".$rs['kpi_year']."-".$rs['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."-".$rs['role_id']."' class='btn-block1 actionApproveEditKPI btn btn-primary '>ปรับคะแนน</button>
					<button type='button' id='idApproveKPI-".$rs['kpi_year']."-".$rs['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."-".$rs['role_id']."' class='btn-block1 actionApproveKPI btn btn-warning '>กดอนุมัติ </button>
					
				</div>
						</div>";
			}
			$tableHTML.="</div>";
		$tableHTML.="</div>";

		$i++;
	}
	/*
	$tableHTML.="</tbody>";
	$tableHTML.="</table>";
	*/
	echo $tableHTML;
	//mysql_close($conn);
	$conn->close();
}

if($_POST['action']=="edit"){


	$strSQL="
select adjust_percentage,adjust_reason from kpi_result
WHERE confirm_flag='Y'
and kpi_year='$year'
and appraisal_period_id='$appraisal_period_id'
and emp_id='$employee_id'
	";
	//$result=$conn->query($strSQL);
	$result=$conn->query($strSQL);
	if($result){
		$rs=$result->fetch_assoc();
		echo "[{\"adjust_percentage\":\"$rs[adjust_percentage]\",\"adjust_reason\":\"$rs[adjust_reason]\"}]";
	}else{
		echo'["error"]';
	}
	$conn->close();
	//mysql_close($conn);
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
	//$result=$conn->query($strSQL);
	//$rs=mysql_fetch_array($result);
	$result=$conn->query($strSQL);
	$rs=$result->fetch_assoc();
	if($rs){
		
		//echo "score_sum_percentage1=". $rs['score_sum_percentage'];
			$score_sum_percentage = $rs['score_sum_percentage']+$adjust_percentage;
			//echo "score_sum_percentage2=".$score_sum_percentage ;
			$strSQLUpdate="
			 UPDATE kpi_result
			 SET  approve_flag='N', adjust_percentage='$adjust_percentage',adjust_reason='$adjust_reason',score_final_percentage='$score_sum_percentage'
			 where kpi_year='$year' 
			 and appraisal_period_id='$appraisal_period_id' 
			 and emp_id='$employee_id' 
			 and confirm_flag='Y'
			";
		
			 //$rsResultUpdate=$conn->query($strSQLUpdate);
			 $rsResultUpdate=$conn->query($strSQLUpdate);
			 
			 if($rsResultUpdate){
			 	echo '["updateSuccess"]';
			 }else{
			 	echo $conn->error;
			 }
			 
			 //echo" update kpi_result".$resultResultCount['countRow'];
			 $conn->close();
	}else{
		//echo mysql_error();
		echo $conn->error;
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
	//$result=$conn->query($strSQL);
	//$rs=mysql_fetch_array($result);

	$result=$conn->query($strSQL);
	$rs=$result->fetch_assoc();
	if($rs){
	
		
		/*
		if($rs['score_final_percentage']==""){
			
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
		*/
			$strSQLUpdate="
			UPDATE kpi_result
			SET approve_flag='Y',score_final_percentage='$total_score_percentage'
			where kpi_year='$year' 
			and appraisal_period_id='$appraisal_period_id' 
			and emp_id='$employee_id' 
			and confirm_flag='Y'
			";	
		//}
		
		
		
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
		$rsResultUpdate=$conn->query($strSQLUpdate);
		
		if($rsResultUpdate){
		echo '["approveSuccess"]';
		}else{
		//echo mysql_error();
		$conn->error;
		}
	
	
	}
	
	//echo" update kpi_result".$resultResultCount['countRow'];



	//mysql_close($conn);
	$conn->close();
}



if($_POST['action']=="newEvaluateAction"){



	
			$strSQLUpdate="
			DELETE FROM kpi_result   
			where kpi_year='$year' 
			and appraisal_period_id='$appraisal_period_id' 
			and department_id='$department_id' 
			and position_id='$position_id' 
			and emp_id='$employee_id' 
			
			";	


		$rsResultUpdate=$conn->query($strSQLUpdate);
		
		if($rsResultUpdate){
		echo '["success"]';
		}else{
		//echo mysql_error();
		$conn->error;
		}
	
	
	
	
	//mysql_close($conn);
	$conn->close();
}


}else{
	echo'{"status":"400","error":"not token."}';
}





