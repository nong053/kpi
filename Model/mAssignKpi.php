<? session_start(); ob_start();?>
<?php
include './../config.inc.php';
// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){



$year =$_POST['year'];
$appraisal_period_id = $_POST['appraisal_period_id'];
$department_id=$_POST['department_id'];
$position_id =$_POST['position_id'];
$employee_id = $_POST['employee_id'];
$assign_kpi_id = $_POST['assign_kpi_id'];
$kpi_id=$_POST['kpi_id'];
$admin_id=$_SESSION['admin_id'];



$kpi_weight=$_POST['kpi_weight'];
$target_data=$_POST['kpi_target_data'];
$kpi_type_actual=$_POST['kpi_type_actual'];
$kpi_actual_manual=$_POST['kpi_actual_manual'];
$kpi_actual_query=$_POST['kpi_actual_query'];
$target_score=$_POST['target_score'];
$total_kpi_actual_score=$_POST['total_kpi_actual_score'];
$kpi_actual_score=$_POST['kpi_actual_score'];
$performance=$_POST['performance'];
$complete_kpi_score_flag=$_POST['complete_kpi_score_flag'];

$score_sum_percentage=$_POST['score_sum_percentage'];
$assignAll=$_POST['assignAll'];



if($_POST['action']=="add"){
	
	$strSQLCount="select count(*) AS countRow from assign_kpi where
	(assign_kpi_year='$year' or '$year'='All') and
	(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
	(department_id='$department_id' or '$department_id'='All') and
	(position_id='$position_id' or '$position_id'='All') and
	(emp_id='$employee_id' or '$employee_id'='All') and
	(kpi_id='$kpi_id' or '$kpi_id'='All')
	and admin_id='$admin_id'
	";
	
	$rsCount=mysql_query($strSQLCount);
	$resultCount=mysql_fetch_array($rsCount);
	
	
	
	if($resultCount['countRow']==0){
		
			if($assignAll=="All"){
			//loop insert kpi if select All param into assign start
			$strSQLselectEmp="
			select e.*,pe.position_name,r.role_name,d.department_name
			from employee e
			INNER JOIN position_emp pe on e.position_id=pe.position_id
			INNER JOIN role r on pe.role_id=r.role_id
			INNER JOIN department d on e.department_id=d.department_id
			where (e.department_id='$department_id' or '$department_id' ='All')
			and (e.position_id='$position_id' or '$position_id' ='All')
			and e.emp_status_work_id='1'
			and e.admin_id='$admin_id'
			order by e.emp_id
			";
			$resultSelectEmp=mysql_query($strSQLselectEmp);
			while($rsSelectEmp=mysql_fetch_array($resultSelectEmp)){
				
				$strSQL="INSERT INTO assign_kpi(assign_kpi_year,appraisal_period_id,emp_id,position_id,kpi_weight,kpi_type_actual,
				kpi_actual_query,kpi_actual_manual,target_data,target_score,kpi_id,department_id,total_kpi_actual_score,kpi_actual_score,performance,admin_id)
				VALUES('$year','$appraisal_period_id','$rsSelectEmp[emp_id]','$rsSelectEmp[position_id]','$kpi_weight','$kpi_type_actual','$kpi_actual_query','$kpi_actual_manual',
				'$target_data','$target_score','$kpi_id','$department_id','$total_kpi_actual_score','$kpi_actual_score','$performance','$admin_id')";
				$rs=mysql_query($strSQL);
				
				if($rs){
					echo'["success"]';
				}else{
					echo mysql_error();
				}
				
			}
			
			}else{
				
				
				$strSQL="INSERT INTO assign_kpi(assign_kpi_year,appraisal_period_id,emp_id,position_id,kpi_weight,kpi_type_actual,
				kpi_actual_query,kpi_actual_manual,target_data,target_score,kpi_id,department_id,total_kpi_actual_score,kpi_actual_score,performance,admin_id)
				VALUES('$year','$appraisal_period_id','$employee_id','$position_id','$kpi_weight','$kpi_type_actual','$kpi_actual_query','$kpi_actual_manual',
				'$target_data','$target_score','$kpi_id','$department_id','$total_kpi_actual_score','$kpi_actual_score','$performance','$admin_id')";
				$rs=mysql_query($strSQL);
				if($rs){
					echo'["success"]';
				}else{
					echo mysql_error();
				}
				
				
			}
			
	}else{
		echo'["key-duplicate"]';
	}
	//Loop insert kpi if select All param into assign end
	
	
	
	mysql_close($conn);
}


if($_POST['action']=="showEmpData"){
	//echo "Show Data";
	/*
	 select e.*,pe.position_id,pe.position_name,r.role_name,d.department_id,d.department_name,kr.score_sum_percentage,kr.score_final_percentage
	from employee e
	INNER JOIN position_emp pe on e.position_id=pe.position_id
	INNER JOIN role r on pe.role_id=r.role_id
	INNER JOIN department d on e.department_id=d.department_id
	LEFT JOIN kpi_result kr ON kr.emp_id=e.emp_id
	where (e.department_id='$department_id' or '$department_id' ='All')
	and (e.position_id='$position_id' or '$position_id' ='All')
	and e.emp_status_work_id='1'
	and e.admin_id='$admin_id'
	and kr.kpi_year='$year'
	and kr.appraisal_period_id='$appraisal_period_id'
	*/
	$strSQL="
	
	

select e.*,pe.position_name,r.role_name,d.department_name

	from employee e
	INNER JOIN position_emp pe on e.position_id=pe.position_id
	INNER JOIN role r on e.role_id=r.role_id
	INNER JOIN department d on e.department_id=d.department_id
	where (e.department_id='$department_id' or '$department_id' ='All')
	and (e.position_id='$position_id' or '$position_id' ='All')
	and e.emp_status_work_id='1'
	and e.admin_id='$admin_id'
	order by e.emp_id

	";
	
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='Tableemployee' class='table grid table-striped'>";
	$tableHTML.="<colgroup>";
	// $tableHTML.="<col style='width:5%' />";
	$tableHTML.="<col style='width:8%' />";
	$tableHTML.="<col style='width:13%' />";
	$tableHTML.="<col style='width:13%' />";
	$tableHTML.="<col style='width:13%' />";
	$tableHTML.="<col style='width:13%' />";


	$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
	$tableHTML.="<tr>";
	// $tableHTML.="<th  data-field=\"column1\"><b>".$_SESSION['kpi_result_emp_l_tbl_id']."</b></th>";
	$tableHTML.="<th style='text-align:center;' data-field=\"column2\"></th>";
	$tableHTML.="<th data-field=\"column3\"><b>".$_SESSION['kpi_result_emp_l_tbl_fullname']."</b></th>";
	//$tableHTML.="<th data-field=\"column4\"><b>".$_SESSION['kpi_result_emp_l_tbl_department']."</b></th>";
	//$tableHTML.="<th data-field=\"column5\"><b>".$_SESSION['kpi_result_emp_l_tbl_position']."</b></th>";
	//$tableHTML.="<th><b>Role</b></th>";
	//$tableHTML.="<th><b>Age W</b></th>";
	// $tableHTML.="<th data-field=\"column6\"><b>".$_SESSION['kpi_result_emp_l_tbl_age']."</b></th>";
	$tableHTML.="<th style='text-align:right;' data-field=\"column7\"><b>".$_SESSION['kpi_result_emp_l_tbl_emp_result']."</b></th>";
	$tableHTML.="<th style='text-align:right' data-field=\"column8\"><b>".$_SESSION['kpi_result_emp_l_tbl_chief_result']."</b></th>";
	$tableHTML.="<th style='text-align:right' data-field=\"column9\"><b>".$_SESSION['kpi_result_emp_l_tbl_adjust_result']."</b></th>";
	$tableHTML.="<th style='text-align:right' data-field=\"column10\"><b>".$_SESSION['kpi_result_emp_l_tbl_result']."</b></th>";
	$tableHTML.="<th style='text-align:right' data-field=\"column11\" '><b>".$_SESSION['kpi_result_emp_l_tbl_manage']."</b></th>";
		
	$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	$tableHTML.="<tbody class=\"contentemployee\">";
	while($rs=mysql_fetch_array($result)){

		
		$tableHTML.="<tr>";
		// $tableHTML.="	<td>".$i."|".$rs['emp_id']."</td>";
		$tableHTML.="	<td style='text-align:center;'>";
		// <img class=\"img-circle\"  src=".$rs['emp_picture_thum']." width=50>
		if(empty($rs['emp_picture_thum'])){

			$tableHTML.="	<img id='image_emp_data-".$rs['emp_id']."' style='opacity:0.1;' class=\"img-circle shadow\" src=\"../view/uploads/avatar.jpg\" width=\"80\" height='80'>";

		}else{

			$tableHTML.="	<img id='image_emp_data-".$rs['emp_id']."' class=\"img-circle\" src=\"".$rs['emp_picture_thum']."\" width=\"80\"  height='80'>";
		
		}
		$tableHTML.="</td>";
		$tableHTML.="	<td>
		<span  id='fullName-".$rs['emp_id']."'>
		<b>".$rs['emp_first_name']." ".$rs['emp_last_name']."</b><br>".$rs['department_name']."<br>ตำแหน่ง".$rs['position_name']."<br>
		</span>
		<span style='display:none;' id='depId-".$rs['emp_id']."'>
		".$rs['department_id'].
		"</span>
		<span style='display:none;' id='depName-".$rs['emp_id']."'>
		".$rs['department_name'].
		"</span>
		<span  style='display:none;' id='positionId-".$rs['emp_id']."'>
		".$rs['position_id']."
		</span>
		<span  style='display:none;' id='positionName-".$rs['emp_id']."'>
		".$rs['position_name']."
		</span>
		</td>";
		//$tableHTML.="	<td>".$rs['department_name']."<span style='display:none;' id='depId-".$rs['emp_id']."'>".$rs['department_id']."</span></td>";
		//$tableHTML.="	<td>".$rs['position_name']."<span  style='display:none;' id='positionId-".$rs['emp_id']."'>".$rs['position_id']."</span></td>";


		//$tableHTML.="	<td>".$rs['role_name']."</td>";
		//$tableHTML.="	<td>".$rs['emp_age_working']."</td>";
		// $tableHTML.="	<td>".$rs['emp_age']."</td>";
		
/*
appraisal_period_id	1
department_id	1
division_id	7
employee_id	35
position_id	3
year	2012

distinct complete_kpi_score_flag
*/
		$strSQLKpiResult="
				SELECT  e.emp_id,kr.approve_flag,kr.confirm_flag,kr.emp_score_sum_percentage,kr.score_sum_percentage,kr.adjust_percentage,kr.score_final_percentage
				
 
				FROM employee e
				INNER JOIN kpi_result kr	
				ON e.emp_id=kr.emp_id
				where kr.kpi_year='$year' 
				and kr.appraisal_period_id='$appraisal_period_id' 
				and kr.department_id='".$rs['department_id']."' 
				and kr.position_id='".$rs['position_id']."' 
				and kr.emp_id='".$rs['emp_id']."' 
				
				and kr.admin_id='$admin_id'
		";

		$resultKpiResult=mysql_query($strSQLKpiResult);
		$rsKpiResult=mysql_fetch_array($resultKpiResult);

		$strSQLCountAssignMaster="
				select count(*)  as  count_assign_evaluate_kpi  from assign_evaluate_kpi where 
				 assign_kpi_year=".$year."
				and appraisal_period_id=".$appraisal_period_id."
				and department_id=".$rs['department_id']."  
				and position_id=".$rs['position_id']." 
				and emp_id=".$rs['emp_id']." 
				and confirm_flag='Y'
		";

		$resultCountAssignMaster=mysql_query($strSQLCountAssignMaster);
		$rsKpiCountAssignMaster=mysql_fetch_array($resultCountAssignMaster);


		$strSQLEmpCheckAssignKpi="
						select distinct complete_kpi_score_flag  from assign_evaluate_kpi
						where (assign_kpi_year='$year' or '$year'='All') 
						and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
						and department_id=".$rs['department_id']."  
						and position_id=".$rs['position_id']." 
						and emp_id=".$rs['emp_id']." 
						and admin_id='$admin_id'
		";
		$resultCheckAssignKpi=mysql_query($strSQLEmpCheckAssignKpi);
		$rsCheckAssignKpi=mysql_fetch_array($resultCheckAssignKpi);
		


		// $score="";
		// if($rsKpiResult['score_final_percentage']!=""){
		// 	$score=$rsKpiResult['score_final_percentage'];
		// }else{
		// 	$score=$rsKpiResult['score_sum_percentage'];
		// }

		$tableHTML.="	<td ><div style=' text-align:right; font-weight:bold; color:orange;'>".number_format((float)$rsKpiResult['emp_score_sum_percentage'], 2, '.', '')."%</div></td>";
		$tableHTML.="	<td ><div style=' text-align:right; font-weight:bold; color:orange;'>".number_format((float)$rsKpiResult['score_sum_percentage'], 2, '.', '')."%</div></td>";

		$tableHTML.="	<td ><div style=' text-align:right; font-weight:bold; color:orange;'>".number_format((float)$rsKpiResult['adjust_percentage'], 2, '.', '')."%</div></td>";
		

		$total_score_percentage=(($rsKpiResult['score_sum_percentage']*60/100) +($rsKpiResult['emp_score_sum_percentage']*40/100)+$rsKpiResult['adjust_percentage']);

		$tableHTML.="	<td ><div style=' text-align:right; font-weight:bold; color:green;'>".number_format((float)$total_score_percentage, 2, '.', '')."%</div></td>";
		
		if($rsKpiResult[emp_id]!="" and $rsCheckAssignKpi['complete_kpi_score_flag']=='Y'){
			
			if(($rsKpiResult[approve_flag]=="Y") and ($rsKpiResult[confirm_flag]=="Y")){
				// $tableHTML.="<td>
				// <div style='text-align:center;'>
				// <button type='button' id='idAssignKPI-".$rs['emp_id']."' class='approvedKpi btn btn-success btn-xs'>Approved</button>
				// </div>
				// </td>";
				$tableHTML.="	<td>
				<div style='text-align:right;'>
				<button type='button' id='idAssignKPI-".$year."-".$appraisal_period_id."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='actionAssignKPI btn btn-success '>อนุมัติแล้ว</button>";
				//$tableHTML.="<button type='button' id='idAssignKPI-".$year."-".$appraisal_period_id."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='actionRemoveAssign btn btn-danger '>เคลียร์</button>
				$tableHTML.="
				</div>
				</td>";

			}else{
			//  if($rsKpiResult[confirm_flag]=="Y"){
			$tableHTML.="	<td>
			<div style='text-align:right;'>";
				if($_SESSION['emp_role_level_id']==2 or $_SESSION['emp_role_level_id']==1 ){
					$tableHTML.="<button type='button' id='readyForEvaluate-".$year."-".$appraisal_period_id."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='actionAssignKPI btn btn-info '>รออนุมัติ</button> ";
				}else{
				$tableHTML.="<button type='button' id='actionBackToAssign-".$year."-".$appraisal_period_id."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='actionBackToAssign btn btn-danger '>มอบหมายตัวชี้วัด</button> ";
				$tableHTML.="<button type='button' id='readyForEvaluate-".$year."-".$appraisal_period_id."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='actionAssignKPI btn btn-info '>รออนุมัติ</button> ";
				//$tableHTML.="<button type='button' id='idAssignKPI-".$year."-".$appraisal_period_id."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='actionRemoveAssign btn btn-danger '>เคลียร์</button>";
				}

			$tableHTML.="</div>
			</td>";
			}
			// else{
			// $tableHTML.="<td>
			// 	<div style='text-align:right;'>
				
			// 	<!-- <button type='button' id='actionBackToAssign-".$year."-".$appraisal_period_id."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='actionBackToAssign evaluated btn btn-danger '>มอบหมายตัวชี้วัดใหม่</button> -->
			// 	<!-- <button type='button' id='readyForEvaluate-".$year."-".$appraisal_period_id."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='actionAssignKPI  evaluated btn btn-warning '>พร้อมรับประเมิน</button> -->
				
			// 	</div>
			// </td>";
			// }
			
		}else if($rsKpiCountAssignMaster['count_assign_evaluate_kpi']>0 ){
			 if($_SESSION['emp_role_level_id']==2 or $_SESSION['emp_role_level_id']==1 ){
				$tableHTML.="<td>
				<div style='text-align:right;'>";
				//$tableHTML.="<button type='button' id='actionBackToAssign-".$year."-".$appraisal_period_id."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='actionBackToAssign btn btn-danger '>มอบหมายตัวชี้วัดใหม่</button> ";
				$tableHTML.="<button type='button' id='readyForEvaluate-".$year."-".$appraisal_period_id."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='actionAssignKPI btn btn-warning '>พร้อมรับประเมิน</button> ";
				
				$tableHTML.="</div>
				</td>";
			 }else{
				$tableHTML.="<td>
				<div style='text-align:right;'>";
				$tableHTML.="<button type='button' id='actionBackToAssign-".$year."-".$appraisal_period_id."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='actionBackToAssign btn btn-danger '>มอบหมายตัวชี้วัดใหม่</button> ";
				$tableHTML.="<button type='button' id='readyForEvaluate-".$year."-".$appraisal_period_id."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='actionAssignKPI btn btn-warning '>พร้อมรับประเมิน</button> ";
				
				$tableHTML.="</div> </td>";
			 }
		}else{
			$tableHTML.="<td style='text-align:right;'>
			<div style='text-align:right; color:red;'>ยังไม่ถูกมอบหมายตัวชี้วัด </div>
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

/*
if($_POST['action']=="showDataAssignAll"){

	$strSQL="

	select ak.appraisal_period_id,ak.assign_kpi_id,kpi_name,ak.kpi_weight,ak.target_data,ak.target_score,ak.kpi_type_actual,ak.kpi_actual_manual,ak.kpi_actual_query
	from assign_kpi_all ak
	inner JOIN kpi
	on ak.kpi_id=kpi.kpi_id
	where  (ak.assign_kpi_year='$year' or '$year'='All')
	and (ak.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
	and (ak.position_id='$position_id' or '$position_id'='All')
	and (ak.department_id='$department_id' or '$department_id'='All')
	and ak.admin_id='$admin_id'
	";



	$result=mysql_query($strSQL);
	$$tableHTML="";
			$i=1;
			$tableHTML.="<table id='TableassignKpi' class='grid table-striped'>";
			$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:5%' />";
			$tableHTML.="<col  style='width:50%'/>";
			$tableHTML.="<col />";
			$tableHTML.="<col />";

			$tableHTML.="</colgroup>";
			$tableHTML.="<thead>";
			$tableHTML.="<tr>";
			$tableHTML.="<th><b>Code</b></th>";
			$tableHTML.="<th><b>KPI Name</b></th>";
			$tableHTML.="<th><b>Weight</b></th>";
			$tableHTML.="<th><b>Target </b></th>";
			$tableHTML.="<th><b>Actual</b></th>";
			$tableHTML.="<th><b>Target Score</b></th>";
			$tableHTML.="<th><b>Manage</b></th>";

				
			$tableHTML.="</tr>";
			$tableHTML.="</thead>";

			while($rs=mysql_fetch_array($result)){

				if($rs['kpi_type_actual']=="0"){
					$kpi_actual=$rs['kpi_actual_manual'];
				}else{
					$kpi_actual=$rs['kpi_actual_query'];
				}
				$tableHTML.="<tbody class=\"contentassignKpi\">";
				$tableHTML.="<tr>";
				$tableHTML.="	<td>".$i."</td>";
				$tableHTML.="	<td>".$rs['kpi_name']."</td>";
				$tableHTML.="	<td>".$rs['kpi_weight']."</td>";
				$tableHTML.="	<td>".$rs['target_data']."</td>";
				$tableHTML.="	<td>".$kpi_actual."</td>";
				$tableHTML.="	<td>".$rs['target_score']."</td>";

				$tableHTML.="	<td>
			<button type='button' id='idEdit-".$rs['assign_kpi_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>
			<button type='button' id='idDel-".$rs['assign_kpi_id']."' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>
		
			</td>";
				$tableHTML.="</tr>";

				$i++;
			}
			$tableHTML.="</tbody>";
			$tableHTML.="</table>";
			echo $tableHTML;
			mysql_close($conn);
}
*/
/*
if($_POST['action']=="addAssignAll"){

	
	$strSQLCount="select count(*) AS countRow from assign_kpi where
	(assign_kpi_year='$year' or '$year'='All') and
	(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
	(department_id='$department_id' or '$department_id'='All') and
	(position_id='$position_id' or '$position_id'='All') and
	(emp_id='$employee_id' or '$employee_id'='All') and
	(kpi_id='$kpi_id' or '$kpi_id'='All')
	";
	
	$rsCount=mysql_query($strSQLCount);
	$resultCount=mysql_fetch_array($rsCount);

	if($resultCount['countRow']==0){

		if($assignAll=="All"){
			//loop insert kpi if select All param into assign start
			$strSQLselectEmp="
			select e.*,pe.position_name,r.role_name,d.department_name
			from employee e
			INNER JOIN position_emp pe on e.position_id=pe.position_id
			INNER JOIN role r on pe.role_id=r.role_id
			INNER JOIN department d on e.department_id=d.department_id
			where (e.department_id='$department_id' or '$department_id' ='All')
			and (e.position_id='$position_id' or '$position_id' ='All')
			and e.emp_status_work_id='1'
			and e.admin_id='$admin_id'
			order by e.emp_id
			";
			$resultSelectEmp=mysql_query($strSQLselectEmp);
			while($rsSelectEmp=mysql_fetch_array($resultSelectEmp)){

				$strSQL="INSERT INTO assign_kpi(assign_kpi_year,appraisal_period_id,emp_id,position_id,kpi_weight,kpi_type_actual,
				kpi_actual_query,kpi_actual_manual,target_data,target_score,kpi_id,department_id,total_kpi_actual_score,kpi_actual_score,performance,admin_id)
				VALUES('$year','$appraisal_period_id','$rsSelectEmp[emp_id]','$rsSelectEmp[position_id]','$kpi_weight','$kpi_type_actual','$kpi_actual_query','$kpi_actual_manual',
				'$target_data','$target_score','$kpi_id','$department_id','$total_kpi_actual_score','$kpi_actual_score','$performance','$admin_id')";
				$rs=mysql_query($strSQL);

				if($rs){
					echo'["success"]';
				}else{
					echo mysql_error();
				}

			}
				
		}else{


			$strSQL="INSERT INTO assign_kpi(assign_kpi_year,appraisal_period_id,emp_id,position_id,kpi_weight,kpi_type_actual,
			kpi_actual_query,kpi_actual_manual,target_data,target_score,kpi_id,department_id,total_kpi_actual_score,kpi_actual_score,performance,admin_id)
			VALUES('$year','$appraisal_period_id','$employee_id','$position_id','$kpi_weight','$kpi_type_actual','$kpi_actual_query','$kpi_actual_manual',
			'$target_data','$target_score','$kpi_id','$department_id','$total_kpi_actual_score','$kpi_actual_score','$performance','$admin_id')";
			$rs=mysql_query($strSQL);
			if($rs){
				echo'["success"]';
			}else{
				echo mysql_error();
			}


		}
			
	}else{
		echo'["key-duplicate"]';
	}
	//Loop insert kpi if select All param into assign end



	mysql_close($conn);
}
*/


if($_POST['action']=="showData"){
	//echo "Show Data";
/*
$strSQL="select ak.*,ap.appraisal_period_desc,e.emp_name,pe.position_name from assign_kpi ak
left join appraisal_period ap on ak.appraisal_period_id=ap.appraisal_period_id
left join employee e on ak.emp_id=e.emp_id
left join position_emp pe on ak.position_id=pe.position_id
";


$year =$_POST['year'];
$appraisal_period_id = $_POST['appraisal_period_id'];
$position_id =$_POST['position_id'];
$employee_id = $_POST['employee_id'];
$assign_kpi_id = $_POST['assign_kpi_id'];
$kpi_id=$_POST['kpi_id'];
$department_id=$_POST['department_id'];
$division_id=$_POST['division_id'];


*/
	$strSQL="

	select kpi.kpi_id,ak.appraisal_period_id,ak.assign_kpi_year,ak.department_id,ak.position_id,ak.emp_id,
	kpi_name,ak.kpi_weight,ak.target_data,ak.target_score,ak.kpi_type_actual,ak.kpi_actual_manual,ak.kpi_actual_query,ak.complete_kpi_score_flag
	from assign_evaluate_kpi ak
	left JOIN kpi
	on ak.kpi_id=kpi.kpi_id
	where 
	 (ak.assign_kpi_year='$year' )
    and (ak.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
	and (ak.department_id='$department_id' or '$department_id'='All')
	and (ak.position_id='$position_id' or '$position_id'='All')
	and (ak.emp_id='$employee_id' or '$employee_id'='All')
	and ak.admin_id='$admin_id' 
	and ak.confirm_flag='Y' 
	";
	
	
	
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='TableassignKpi' class='table grid table-striped'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:5%' />";
			$tableHTML.="<col  style='width:45%'/>";
			$tableHTML.="<col style='width:10%'/>";
			$tableHTML.="<col style='width:10%'/>";
			//$tableHTML.="<col style='width:10%'/>";
			$tableHTML.="<col style='width:15%'/>";
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th data-field=\"column1\" style='text-align:right;'><b>".$_SESSION['kpi_result_l_tbl_id']."</b></th>";
			$tableHTML.="<th data-field=\"column2\"><b>".$_SESSION['kpi_result_l_tbl_kpi_name']." </b></th>";
			$tableHTML.="<th data-field=\"column3\" style='text-align:right;'><b>".$_SESSION['kpi_result_l_tbl_weight']."</b></th>";
			$tableHTML.="<th data-field=\"column4\" style='text-align:right;'><b>".$_SESSION['kpi_result_l_tbl_target']." </b></th>";
			$tableHTML.="<th  data-field=\"column5\" style='text-align:right;'><b>".$_SESSION['kpi_result_l_tbl_target_score']."</b></th>";
			//$tableHTML.="<th><b>Target Score</b></th>";
			$tableHTML.="<th data-field=\"column6\" style='text-align:right;'><b>".$_SESSION['kpi_result_l_tbl_manage']."</b></th>";
	
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	$tableHTML.="<tbody class=\"contentassignKpi\">";
	
	while($rs=mysql_fetch_array($result)){
		
		if($rs['kpi_type_actual']=="0"){
			$kpi_actual=$rs['kpi_actual_manual'];
		}else{
			$kpi_actual=$rs['kpi_actual_query'];
		}

		if($rs['complete_kpi_score_flag']=="Y"){
			$complete_kpi_score_flag="complete_kpi_score_flag";
		}else{
			$complete_kpi_score_flag="not_complete_kpi_score_flag";
		}


	
	$tableHTML.="<tr>";
	$tableHTML.="	<td style='background:yellow;'><div style='text-align:right;'>".$i."</div> <span style='display:none;' class='".$complete_kpi_score_flag." check_complete_kpi_score' id='check_complete_kpi_score-".$rs['kpi_id']."'></span></td>";
	$tableHTML.="	<td>".$rs['kpi_name']."</td>";
	$tableHTML.="	<td><div style='text-align:right;'>".number_format((float)$rs['kpi_weight'], 2, '.', '')."</div></td>";
	$tableHTML.="	<td><div style='text-align:right;'>".number_format((float)$rs['target_data'], 2, '.', '')."</div></td>";
	$tableHTML.="	<td><div style='text-align:right;'>".number_format((float)$kpi_actual, 2, '.', '') ."</div></td>";
	//$tableHTML.="	<td>".number_format((float)$rs['target_score'], 2, '.', '')."</td>";
	$tableHTML.="	<td>
			
	<div style='text-align:right;'>
			<button type='button' style='display:none;' id='idEdit-".$rs['kpi_id']."' class='actionEdit btn btn-primary '><i class='glyphicon glyphicon-pencil'></i></button>

			<button type='button' id='idAddScore-".$rs['assign_kpi_year']."-".$rs['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."-".$rs['kpi_id']."' class='actionAddScore btn btn-primary'><i class='glyphicon glyphicon-log-in'></i></button>

			<button type='button' style='display:none;' id='idDel-".$rs['kpi_id']."' class=' actionDel btn btn-danger '><i class='glyphicon glyphicon-trash'></i></button>
	</div>
			</td>";
	$tableHTML.="</tr>";
	
	$i++;
	}
	$tableHTML.="</tbody>";
	$tableHTML.="</table>";
	echo $tableHTML;
	mysql_close($conn);
}
if($_POST['action']=="del"){
	$id=$_POST['id'];
	
	$strSQL="DELETE FROM assign_kpi WHERE assign_kpi_id=$id and admin_id='$admin_id'";
	$result=mysql_query($strSQL);
	if($result){
		
		// check count rows assign_kpi
		
		$strSQLCount="select count(*) AS countRow from assign_kpi where
		(assign_kpi_year='$year' or '$year'='All') and
		(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
		(department_id='$department_id' or '$department_id'='All') and
		(position_id='$position_id' or '$position_id'='All') and
		(emp_id='$employee_id' or '$employee_id'='All')
		and admin_id='$admin_id'
		";
		
		$rsResultCount=mysql_query($strSQLCount);
		$resultResultCount=mysql_fetch_array($rsResultCount);
		
		// delete kpi_result if assign_kpi=0
		
		if($resultResultCount['countRow']==0){
			$strSQL="DELETE FROM kpi_result WHERE 
			(kpi_year='$year' or '$year'='All') and
			(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
			(department_id='$department_id' or '$department_id'='All') and
			(position_id='$position_id' or '$position_id'='All') and
			(emp_id='$employee_id' or '$employee_id'='All')
			and admin_id='$admin_id'
			";
			$result=mysql_query($strSQL);
		}else{
			// SET confirm_flag is N Start
			$strSQLUpdate="
			UPDATE kpi_result
			SET score_sum_percentage='$score_sum_percentage',confirm_flag='N'
			where (kpi_year='$year' or '$year'='All') and
			(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
			(department_id='$department_id' or '$department_id'='All') and
			(position_id='$position_id' or '$position_id'='All') and
			(emp_id='$employee_id' or '$employee_id'='All')
			and admin_id='$admin_id'
			";
			
			$rsResultUpdate=mysql_query($strSQLUpdate);
			if(!$rsResultUpdate){
				echo mysql_error();
			}else{
				//echo'["success"]';
			}
			// SET confirm_flag is N End
		}
		
		echo'["success"]';
		/*
		$strSQLKpiResult="DELETE FROM kpi_result WHERE assign_kpi_id='$id'";
		$resultKpiResult=mysql_query($strSQLKpiResult);
		*/
		
	
		
		
	}else{
		echo'["error"]';
	}
	mysql_close($conn);
	
}
if($_POST['action']=="removeAssignKPIs"){
	/*
	echo "yeaer=".$year;
	echo "appraisal_period_id=".$appraisal_period_id ;
	echo "department_id=".$department_id;
	echo "position_id=".$position_id;
	echo "employee_id=".$employee_id ;
	echo "admin_id=".$admin_id;
	
	action	removeAssignKPIs
	appraisal_period_id	22
	department_id	11
	employee_id	20
	position_id	10
	year	2015


	*/
			$strSQL="DELETE FROM assign_evaluate_kpi  
			WHERE  assign_kpi_year='$year'
			and appraisal_period_id='$appraisal_period_id'
			and department_id='$department_id'
			and position_id='$position_id'
			and emp_id='$employee_id'
			and admin_id='$admin_id'
		";
			$result=mysql_query($strSQL);
			
	if($result){
		//echo'["success1"]';
			
			
			$strSQL2="DELETE FROM kpi_result WHERE
			kpi_year='$year' 
			and appraisal_period_id='$appraisal_period_id' 
			and department_id='$department_id' 
			and position_id='$position_id' 
			and emp_id='$employee_id' 
			and admin_id='$admin_id'
			";
			$result2=@mysql_query($strSQL2);
			if(!$result2){
				echo mysql_error();
			}else{
				//echo'["success2"]';
			}
	
	}else{
		echo mysql_error();
	}
	echo'["success"]';

}

if($_POST['action']=="backToAssignKPI"){
	
		
		$strSQL1="DELETE FROM kpi_result WHERE
		kpi_year='$year' 
		and appraisal_period_id='$appraisal_period_id' 
		and department_id='$department_id' 
		and position_id='$position_id' 
		and emp_id='$employee_id' 
		and admin_id='$admin_id'
		";
		$result1=@mysql_query($strSQL1);
		if($result1){
			//kpi_actual_manual,target_data,target_score,total_kpi_actual_score,kpi_actual_score,performance
			$strSQL2="
			UPDATE assign_evaluate_kpi
			SET 
			confirm_flag = 'N',
			kpi_actual_manual = '',
			target_data = '',
			target_score = '',
			total_kpi_actual_score = '',
			kpi_actual_score = '',
			performance = '',
			complete_kpi_score_flag='N',

			emp_kpi_actual_manual = '',
			emp_total_kpi_actual_score='',
			emp_kpi_actual_score='',
			emp_performance='',
			emp_complete_kpi_score_flag='N'

			
			
			WHERE
			assign_kpi_year='$year' 
			and appraisal_period_id='$appraisal_period_id' 
			and department_id='$department_id' 
			and position_id='$position_id' 
			and emp_id='$employee_id' 
			and admin_id='$admin_id'
			";
			$result2=@mysql_query($strSQL2);
			if(!$result2){
				echo mysql_error();
			}else{
				echo'["success"]';
			}
	
		}

}


if($_POST['action']=="edit"){
/*	
$year =$_POST['year'];
$appraisal_period_id = $_POST['appraisal_period_id'];
$department_id=$_POST['department_id'];
$position_id =$_POST['position_id'];
$employee_id = $_POST['employee_id'];
$assign_kpi_id = $_POST['assign_kpi_id'];
$kpi_id=$_POST['kpi_id'];
*/

	$strSQL="
	SELECT *,k.kpi_name FROM assign_evaluate_kpi aek
	INNER JOIN kpi k on aek.kpi_id=k.kpi_id 
	WHERE 

	aek.assign_kpi_year=$year 
	and aek.appraisal_period_id=$appraisal_period_id 
	and aek.department_id=$department_id 
	and aek.position_id=$position_id 
	and aek.emp_id=$employee_id 
	and aek.kpi_id=$kpi_id 
	and aek.admin_id='$admin_id'";

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
		
		 echo "[
			 {\"assign_kpi_id\":\"$rs[assign_kpi_id]\",\"assign_kpi_year\":\"$rs[assign_kpi_year]\",
		 		\"appraisal_period_id\":\"$rs[appraisal_period_id]\",\"emp_id\":\"$rs[emp_id]\",
	\"position_id\":\"$rs[position_id]\",\"kpi_id\":\"$rs[kpi_id]\",
	\"kpi_weight\":\"$rs[kpi_weight]\",\"target_data\":\"$rs[target_data]\",\"kpi_type_actual\":\"$rs[kpi_type_actual]\",
	\"kpi_actual_manual\":\"$rs[kpi_actual_manual]\",\"kpi_actual_query\":\"$rs[kpi_actual_query]\",\"target_score\":\"$rs[target_score]\",
	\"department_id\":\"$rs[department_id]\",\"total_kpi_actual_score\":\"$rs[total_kpi_actual_score]\",
	\"kpi_actual_score\":\"$rs[kpi_actual_score]\",\"performance\":\"$rs[performance]\",\"kpi_name\":\"$rs[kpi_name]\"
	}]";
		
	}else{

		echo'["error"]';
	echo mysql_error();
	}
	
	mysql_close($conn);
}
if($_POST['action']=="editAction"){
	/*
	
	year
	appraisal_period_id
	position1
	employee
	perspective
	
	
	assign_kpi_id
	assign_kpi_year
	appraisal_period_id
	emp_id
	position_id
	
	kpi_id
	kpi_weight
	target_data
	kpi_type_actual
	kpi_actual_manual
	kpi_actual_query
	target_score
	*/

	$strSQL="UPDATE assign_evaluate_kpi 
	SET 
	-- assign_kpi_year='$year',
	-- appraisal_period_id='$appraisal_period_id' ,
	-- position_id='$position_id' ,
	-- emp_id='$employee_id' ,
	-- department_id='$department_id',
	-- kpi_id='$kpi_id',

	kpi_weight='$kpi_weight',
	target_data='$target_data',
	kpi_type_actual='$kpi_type_actual',
	kpi_actual_manual='$kpi_actual_manual',
	kpi_actual_query='$kpi_actual_query',
	target_score='$target_score',
	kpi_actual_score='$kpi_actual_score',
	total_kpi_actual_score='$total_kpi_actual_score',
	performance='$performance',
	complete_kpi_score_flag='$complete_kpi_score_flag'

	WHERE 

	assign_kpi_year=$year 
	and appraisal_period_id=$appraisal_period_id 
	and department_id=$department_id 
	and position_id=$position_id 
	and emp_id=$employee_id 
	and kpi_id=$kpi_id 
	and admin_id='$admin_id'
	";
	$result=mysql_query($strSQL);
	if($result){





		$strSQL2="
		UPDATE kpi_result SET confirm_flag='N'
		WHERE kpi_year='$year'
		and appraisal_period_id='$appraisal_period_id'
		and department_id='$department_id'
		and position_id='$position_id'
		and emp_id='$employee_id'
	";
	$result2=mysql_query($strSQL2);

	if($result2){

		echo'["editSuccess"]';
	}
		
		// Update kpi_result when change kpi_reult and wait for confirm change.
	/*
		$strSQLCount="select count(*) AS countRow from kpi_result where
		(kpi_year='$year' or '$year'='All') and
		(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
		(department_id='$department_id' or '$department_id'='All') and
		(position_id='$position_id' or '$position_id'='All') and
		(emp_id='$employee_id' or '$employee_id'='All')
		and admin_id='$admin_id'
		";
			
		$rsResultCount=mysql_query($strSQLCount);
		$resultResultCount=mysql_fetch_array($rsResultCount);
			
		if($resultResultCount['countRow']!=0){
			// Update kpi_result when change kpi_reult and wait for confirm change.
			
			$strSQLUpdate="
			 UPDATE kpi_result
			 SET confirm_flag='N'
			 where (kpi_year='$year' or '$year'='All') and
			 (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
			 (department_id='$department_id' or '$department_id'='All') and
			 (position_id='$position_id' or '$position_id'='All') and
			 (emp_id='$employee_id' or '$employee_id'='All')
			 and admin_id='$admin_id'
			";
		
			 $rsResultUpdate=mysql_query($strSQLUpdate);
			 
			 //echo" update kpi_result".$resultResultCount['countRow'];
		
		}

		*/
	}else{
		echo'["error"]'.mysql_error();
	}

	mysql_close($conn);
}


if($_POST['action']=="getDataBaseline"){
	/*
	$strSQL="select baseline_end as max_baseline_data,max(baseline_score)as max_baseline_score from baseline
where kpi_id='$kpi_id'
GROUP BY kpi_id";
*/

$strSQL="select if(kpi.kpi_better_flag='Y',max(base.baseline_begin),min(base.baseline_end)) as max_baseline_data,
max(base.baseline_score)as max_baseline_score 
from kpi
left JOIN baseline base 
on kpi.kpi_id=base.kpi_id
where kpi.kpi_id='$kpi_id'
GROUP BY kpi.kpi_id";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	echo "[{\"kpi_target_data\":\"$rs[max_baseline_data]\",\"target_score\":\"$rs[max_baseline_score]\"}]";
}
if($_POST['action']=="getAllDataBaseline"){

	$tableHtml="";
	$strSQL="select kpi_id,baseline_begin,baseline_end,baseline_score from baseline
where kpi_id='$kpi_id'
ORDER BY baseline_score desc";
	$result=mysql_query($strSQL);
	//$rs=mysql_fetch_array($result);
	$tableHtml.="<table class='table table-striped' id='baselineTable' style='width:400px;'>
				 	<thead>
						<tr>
							
							<th><center>".$_SESSION['kpi_result_l_form_begin']."</center></th>
							<th></th>
							<th><center>".$_SESSION['kpi_result_l_form_end']."</center></th>
							<th></th>
							<th><center>".$_SESSION['kpi_result_l_form_score']."</center></th>
						</tr>
				  	</thead>
					<tbody>";
				$i=0;
				while($rs=mysql_fetch_array($result)){
					$tableHtml.="<tr>
									
									<td><center>$rs[baseline_begin]</center></td>
									<td>--></td>
									<td><center>$rs[baseline_end]</center></td>
									<td>=</td>
									<td><center>$rs[baseline_score]</center></td>
								 <tr>
						
						
						";
					$i++;
				}
				
	$tableHtml.="</tbody></table>";
	echo $tableHtml;
			
}

if($_POST['action']=="getKpiScore"){
	$strSQL="select baseline_score FROM baseline
	where kpi_id='$kpi_id'
	and  '$kpi_actual_manual' BETWEEN baseline_begin AND baseline_end; 
	";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);




	echo "[{\"baseline_score\":\"$rs[baseline_score]\"}]";

}
if($_POST['action']=="getSumWeightKpi"){
	
	$strSQL="select sum(kpi_weight) as sum_kpi_weight from assign_evaluate_kpi where
		(assign_kpi_year='$year' or '$year'='All') and
		(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
		(department_id='$department_id' or '$department_id'='All') and
		(position_id='$position_id' or '$position_id'='All') and
		(emp_id='$employee_id' or '$employee_id'='All')
		and admin_id='$admin_id'
		group by assign_kpi_year,appraisal_period_id,position_id,emp_id
		";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	echo "[{\"kpi_weight\":\"$rs[sum_kpi_weight]\"}]";
	
}
if($_POST['action']=="getKPIPercentage"){

	$strSQL="select sum(total_kpi_actual_score) as sum_kpi_weight from assign_evaluate_kpi where
	(assign_kpi_year='$year') and
	(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
	(department_id='$department_id' or '$department_id'='All') and
	(position_id='$position_id' or '$position_id'='All') and
	(emp_id='$employee_id' or '$employee_id'='All')
	and admin_id='$admin_id'
	group by assign_kpi_year,appraisal_period_id,position_id,emp_id
	";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	$total_kpi_actual_score=($rs[sum_kpi_weight]/100);
	
	
	if($rs){
		$strSQLKpiResult="
						select confirm_flag from kpi_result
						where (kpi_year='$year' or '$year'='All') 
						and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
						and (department_id='$department_id' or '$department_id'='All')
						and (position_id='$position_id' or '$position_id'='All')
						and (emp_id='$employee_id' or '$employee_id'='All')
						and admin_id='$admin_id'
		";
		$resultKpiResult=mysql_query($strSQLKpiResult);
		$rsKpiResult=mysql_fetch_array($resultKpiResult);
		
		
		echo "[{\"total_kpi_actual_score\":\"$total_kpi_actual_score\",\"confirm_flag\":\"$rsKpiResult[confirm_flag]\"}]";
		
	}
/*
	if($rs){
		$strSQLKpiResult="
						select emp_confirm_flag,approve_flag from kpi_result
						where (kpi_year='$year' or '$year'='All') 
						and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
						and (department_id='$department_id' or '$department_id'='All')
						and (position_id='$position_id' or '$position_id'='All')
						and (emp_id='$employee_id' or '$employee_id'='All')
						and admin_id='$admin_id'
		";
		$resultKpiResult=mysql_query($strSQLKpiResult);
		$rsKpiResult=mysql_fetch_array($resultKpiResult);


		$strSQLEmpCheckAssignKpi="
						select distinct complete_kpi_score_flag as complete_kpi_score_flag from assign_evaluate_kpi
						where (assign_kpi_year='$year' or '$year'='All') 
						and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
						and (department_id='$department_id' or '$department_id'='All')
						and (position_id='$position_id' or '$position_id'='All')
						and (emp_id='$employee_id' or '$employee_id'='All')
						and admin_id='$admin_id'
		";
		$resultCheckAssignKpi=mysql_query($strSQLEmpCheckAssignKpi);
		$rsCheckAssignKpi=mysql_fetch_array($resultCheckAssignKpi);

		
		
		echo "[{\"total_kpi_actual_score\":\"$total_kpi_actual_score\",\"confirm_flag\":\"$rsKpiResult[emp_confirm_flag]\",\"approve_flag\":\"$rsKpiResult[approve_flag]\",\"complete_kpi_score_flag\":\"$rsCheckAssignKpi[complete_kpi_score_flag]\"}]";
		
	}
*/

}


if($_POST['action']=="confrimKpi"){

	/*
	 kpi_year
	appraisal_period_id
	department_id

	position_id
	emp_id
	score_percentage
	adjust_percentage
	adjust_reason
	approve_flag
	*/
	$strSQLCount="select count(*) AS countRow from kpi_result where
	(kpi_year='$year' or '$year'='All') and
	(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
	(department_id='$department_id' or '$department_id'='All') and
	(position_id='$position_id' or '$position_id'='All') and
	(emp_id='$employee_id' or '$employee_id'='All')
	and admin_id='$admin_id'
	";
		
	$rsResultCount=mysql_query($strSQLCount);
	$resultResultCount=mysql_fetch_array($rsResultCount);
		
	if($resultResultCount['countRow']==0){
		//echo"database is empty";
			//echo" insert kpi_result=".$resultResultCount['countRow'];
				$strSQLKpiResult="INSERT INTO kpi_result(kpi_year,appraisal_period_id,department_id,position_id,emp_id,
		score_sum_percentage,adjust_percentage,adjust_reason,approve_flag,confirm_flag,admin_id)
		VALUES('$year','$appraisal_period_id','$department_id','$position_id','$employee_id','$score_sum_percentage','','','0','Y','$admin_id')";
		$rsResult=mysql_query($strSQLKpiResult);
			
			if(!$rsResult){
			echo mysql_error();
			}else{
				echo'["success"]';
			}
				
		}
		else{
		//echo"database is fully";
		$strSQLUpdate="
		UPDATE kpi_result
			SET score_sum_percentage='$score_sum_percentage',score_final_percentage='$score_sum_percentage',
			confirm_flag='Y',
			approve_flag='N',
			adjust_percentage='',
			adjust_reason=''
			where (kpi_year='$year' or '$year'='All') and
			(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
			(department_id='$department_id' or '$department_id'='All') and
			(position_id='$position_id' or '$position_id'='All') and
			(emp_id='$employee_id' or '$employee_id'='All')
			and admin_id='$admin_id'
		";
		
	
											$rsResultUpdate=mysql_query($strSQLUpdate);
											if(!$rsResultUpdate){
												echo mysql_error();
											}else{
												echo'["success"]';
											}
	
											//echo" update kpi_result".$resultResultCount['countRow'];
				
		}
	
}

if($_POST['action']=='copyAssignMasterKpi'){
	
	$strsSQLCountAssign="
		
	SELECT count(*) as countAssign FROM assign_kpi
	where (assign_kpi_year='$year' or '$year'='All') 
	and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
	and (department_id='$department_id' or '$department_id'='All')
	and (position_id='$position_id' or '$position_id'='All')
	and emp_id='$employee_id'
	and admin_id='$admin_id'
		
		";
	$resultCountAssign=mysql_query($strsSQLCountAssign);
	$rsCountAssign=mysql_fetch_array($resultCountAssign);
	
	if($rsCountAssign[countAssign]==0){
	
		$sqlSQL="
			insert into assign_kpi (assign_kpi_year,appraisal_period_id,kpi_id,
	department_id,position_id,kpi_weight,kpi_type_actual,
	kpi_actual_query,kpi_actual_manual,target_data,target_score,
	total_kpi_actual_score,kpi_actual_score,performance,admin_id,emp_id)
	select assign_kpi_year,appraisal_period_id,kpi_id,
	department_id,position_id,kpi_weight,kpi_type_actual,
	kpi_actual_query,kpi_actual_manual,target_data,target_score,
	total_kpi_actual_score,kpi_actual_score,performance,admin_id,$employee_id
	from assign_kpi_master
	where (assign_kpi_year='$year' or '$year'='All') 
		and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
		and (department_id='$department_id' or '$department_id'='All')
		and (position_id='$position_id' or '$position_id'='All')
		and confirm_flag='Y'
			";
		
		$result=mysql_query($sqlSQL);
		if(!$result){
			echo mysql_error();
		}else{
		 	echo'["copyAready"]';
		}
		
	}else{
			echo'["noCopy"]';
	}
}

}else{
	echo'{"status":"400","error":"not token."}';
}

