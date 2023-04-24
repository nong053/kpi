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
$score_sum_percentage=$_POST['score_sum_percentage'];
$assignAll=$_POST['assignAll'];









if($_POST['action']=="add"){

	$error_count="";
	
	$strSQLCount="select count(*) AS countRow from assign_kpi_master where
	(assign_kpi_year='$year' or '$year'='All') and
	(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
	(department_id='$department_id' or '$department_id'='All') and
	(position_id='$position_id' or '$position_id'='All') and
	(kpi_id='$kpi_id' or '$kpi_id'='All')
	and admin_id='$admin_id'
	";
	
	$rsCount=$conn->query($strSQLCount);
	$resultCount=mysql_fetch_array($rsCount);
	
	
	
	if($resultCount['countRow']==0){
			//echo "1";
			if($assignAll=="All"){
		    //echo "2";
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
			
			";
			$resultSelectEmp=$conn->query($strSQLselectEmp);
				while($rsSelectEmp=mysql_fetch_array($resultSelectEmp)){

					$strSQL="INSERT INTO assign_kpi_master(assign_kpi_year,appraisal_period_id,position_id,kpi_weight,kpi_type_actual,
					kpi_actual_query,kpi_actual_manual,target_data,target_score,kpi_id,department_id,total_kpi_actual_score,kpi_actual_score,performance,admin_id,created_dt,updated_dt)
					VALUES('$year','$appraisal_period_id','$rsSelectEmp[position_id]','$kpi_weight','$kpi_type_actual','$kpi_actual_query','$kpi_actual_manual',
					'$target_data','$target_score','$kpi_id','$department_id','$total_kpi_actual_score','$kpi_actual_score','$performance','$admin_id','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
					
					/*
					$rs=$conn->query($strSQL);
					
					if($rs){
						echo'["success"]';
					}else{
						echo $conn->error;;
					}
					*/
					
				}
			
			}else{
				
				

				

			$strSQLseleAppraisalPeriod="

				select appraisal_period_id,appraisal_period_desc
				from appraisal_period 
				where  appraisal_period_year ='$year'
				and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
				and admin_id='$admin_id'
				ORDER BY appraisal_period_id ASC
			
			";
			$resultSelectAppraisalPeriod=$conn->query($strSQLseleAppraisalPeriod);
			while($rsSelecAppraisalPeriod=mysql_fetch_array($resultSelectAppraisalPeriod)){

				//echo "<br>loop appraisal_period ".$rsSelecAppraisalPeriod['appraisal_period_id'];

					$strSQLDepartment="
				
					SELECT department_id,department_name,department_detail 
					FROM department 
					where 
					(department_id='$department_id' or '$department_id'='All')
					and admin_id='$admin_id'
				
					";
					$resultDepartment=$conn->query($strSQLDepartment);
					while($rsDepartment=mysql_fetch_array($resultDepartment)){

						//echo "<br>loop department ".$rsDepartment['department_id'];
							$strSQLPosition="
				
							select position_id,position_name 
							from position_emp 
							where
							 (position_id='$position_id' or '$position_id'='All')
							 and admin_id='$admin_id'
						
							";
							$resultPosition=$conn->query($strSQLPosition);
							while($rsPosition=mysql_fetch_array($resultPosition)){
									//echo "-------------";
									// echo "<br>loop position ".$rsPosition['position_id'];
									// echo "position_id=".$rsPosition['position_id'];
									// echo "department_id=".$rsDepartment['department_id'];
									// echo "appraisal_period_id=".$rsSelecAppraisalPeriod['appraisal_period_id'];

								$strSQL="INSERT INTO assign_kpi_master(assign_kpi_year,appraisal_period_id,position_id,kpi_weight,kpi_type_actual,
									kpi_actual_query,kpi_actual_manual,target_data,target_score,kpi_id,department_id,total_kpi_actual_score,kpi_actual_score,performance,admin_id)
									VALUES(

										'$year',
										'".$rsSelecAppraisalPeriod['appraisal_period_id']."',
										'".$rsPosition['position_id']."',
										'$kpi_weight',
										'$kpi_type_actual',
										'$kpi_actual_query',
										'$kpi_actual_manual',
										'$target_data',
										'$target_score',
										'$kpi_id',
										'".$rsDepartment['department_id']."',
										'$total_kpi_actual_score',
										'$kpi_actual_score',
										'$performance',
										'$admin_id'
									)";

									$rs=$conn->query($strSQL);
									if(!$rs){
										$error_count=1;										
									}



							}
	

					}


					

			}

				/*

				$strSQL="INSERT INTO assign_kpi_master(assign_kpi_year,appraisal_period_id,position_id,kpi_weight,kpi_type_actual,
				kpi_actual_query,kpi_actual_manual,target_data,target_score,kpi_id,department_id,total_kpi_actual_score,kpi_actual_score,performance,admin_id)
				VALUES('$year','$appraisal_period_id','$position_id','$kpi_weight','$kpi_type_actual','$kpi_actual_query','$kpi_actual_manual',
				'$target_data','$target_score','$kpi_id','$department_id','$total_kpi_actual_score','$kpi_actual_score','$performance','$admin_id')";
				
				$rs=$conn->query($strSQL);
				if($rs){
					echo'["success"]';
				}else{
					echo $conn->error;;
				}
				*/

				if($error_count==0){
					echo'["success"]';
				}else{
					echo $conn->error;;
				}
				
				
			}
			
	}else{
		echo'["key-duplicate"]';
	}
	//Loop insert kpi if select All param into assign end
	
	
	
	$conn->close();
}

if($_POST['action']=="showEmpData"){
	
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
	
	$result=$conn->query($strSQL);
	$tableHTML="";
	$i=1;
	$tableHTML.="<table id='Tableemployee' class='table grid table-striped'>";
	$tableHTML.="<colgroup>";
	$tableHTML.="<col style='width:10%' />";
	$tableHTML.="<col style='width:80%' />";
	
	$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
	$tableHTML.="<tr>";
	$tableHTML.="<th style='text-align:center;' data-field=\"column2\"><b>".$_SESSION['kpi_result_emp_l_tbl_person_info']."</b></th>";
	$tableHTML.="<th data-field=\"column3\"><b>".$_SESSION['kpi_result_emp_l_tbl_kpi_assign']."</b></th>";
		
	$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	$tableHTML.="<div class='contentemployee'>";
	while($rs=$result->fetch_assoc()){
		$tableHTML.="<tr>";
			$tableHTML.="<td style='text-align:center;'>";

			
			$tableHTML.="<div class='thumbnail' style='width:200px;'>";
					 if(empty($rs['emp_picture_thum'])){
						 	$tableHTML.="	<img style='opacity:0.1;' src=\"../view/uploads/avatar.jpg\" >";
						 }else{
						 	$tableHTML.="	<img  src=\"".$rs['emp_picture_thum']."\" >";
					 }
					 $tableHTML.=" 
					<div class='caption'>";
						
					 $tableHTML.="<p class='emp-text-left'>";
					 $tableHTML.="<b>".$rs['emp_first_name']." ".$rs['emp_last_name']."</b>";
					 $tableHTML.="<br>".$rs['department_name'];
					 $tableHTML.="<br> ตำแหน่ง".$rs['position_name'];
					 $tableHTML.="</p>";
					 $tableHTML.=" 
					</div>
					</div>";
				

			$tableHTML.="</td>";
			$tableHTML.="<td>";
			$tableHTML.="
			<div class='alert alert-info'>
					 <div class='col-md-6 object-text-left'>
					 น้ำหนักตัวชี้วัดรวม
					 </div>
					 <div class='col-md-6 object-text-right'>
					 <button class='btn btn-warning'>ส่งประเมิน</button>
					 <button class='btn btn-primary'>มอบหมายตัวชี้วัด</button>
					 </div>
					 <br style='clear:both'>
			</div>";
			
			$tableHTML.="<table class='table'>";
			$tableHTML.="<thead>";
			$tableHTML.="<tr>";
				$tableHTML.="<th>";
					$tableHTML.="ตัวชี้วัด";
				$tableHTML.="</th>";
				$tableHTML.="<th>";
					$tableHTML.="จัดการ";
				$tableHTML.="</th>";

			//$tableHTML.="</th>";
			$tableHTML.="</thead'>";
			$tableHTML.="</tbody'>";
					$tableHTML.="<tr>";
					$tableHTML.="<td>";
						$tableHTML.="xx";
					$tableHTML.="</td>";
					$tableHTML.="<td>";
						$tableHTML.="xx";
					$tableHTML.="</td>";
					$tableHTML.="</tr>";
				$tableHTML.="</tbody>";
			$tableHTML.="</table>";
			$tableHTML.="</td>";
		$tableHTML.="</tr>";
		


	}
	$tableHTML.="</tbody>";
	$tableHTML.="</table>";

	echo $tableHTML;
	$conn->close();


}
if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="

	select ak.appraisal_period_id,ak.assign_kpi_id,ak.kpi_id,kpi_name,ak.kpi_weight,ak.target_data,ak.target_score,ak.kpi_type_actual,ak.kpi_actual_manual,ak.kpi_actual_query,ak.confirm_flag
	from assign_kpi_master ak
	left JOIN kpi
	on ak.kpi_id=kpi.kpi_id
	where (ak.assign_kpi_year='$year' or '$year'='All')
    and (ak.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
	and (ak.position_id='$position_id' or '$position_id'='All')
	and (ak.department_id='$department_id' or '$department_id'='All')
	and ak.admin_id='$admin_id' 
	";
	
	
	
	$result=$conn->query($strSQL);
	$tableHTML="";
	$i=1;
	$tableHTML.="<table id='TableassignKpi' class=' table grid table-striped'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:5%' />";
			$tableHTML.="<col  style='width:45%'/>";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th data-field=\"column1\"><b>".$_SESSION['assign_l_tbl_id']."</b></th>";
			$tableHTML.="<th data-field=\"column2\"><b>".$_SESSION['assign_l_tbl_kpi_name']."</b></th>";
			$tableHTML.="<th data-field=\"column3\"><b>".$_SESSION['assign_l_tbl_weight']."</b></th>";
			$tableHTML.="<th data-field=\"column4\"><b>".$_SESSION['assign_l_tbl_target']." </b></th>";
			//$tableHTML.="<th data-field=\"column5\"><b>Actual</b></th>";
			$tableHTML.="<th data-field=\"column6\"><b>".$_SESSION['assign_l_tbl_target_score']." </b></th>";
			$tableHTML.="<th data-field=\"column7\" style='text-align:center;'><b>".$_SESSION['assign_l_tbl_manage']."</b></th>";
	
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	
	while($rs=$result->fetch_assoc()){
		
		if($rs['kpi_type_actual']=="0"){
			$kpi_actual=$rs['kpi_actual_manual'];
		}else{
			$kpi_actual=$rs['kpi_actual_query'];
		}
	$tableHTML.="<tbody class=\"contentassignKpi\">";
	$tableHTML.="<tr>";
	$tableHTML.="	<td>".$i."</td>";
	$tableHTML.="	<td>".$rs['kpi_name']."</td>";
	$tableHTML.="	<td>".number_format((float)$rs['kpi_weight'], 2, '.', '')."</td>";
	$tableHTML.="	<td>".number_format((float)$rs['target_data'], 2, '.', '')."</td>";
	//$tableHTML.="	<td>".number_format((float)$kpi_actual, 2, '.', '')."</td>";
	$tableHTML.="	<td>".number_format((float)$rs['target_score'], 2, '.', '')."</td>";
	
	$tableHTML.="	<td>
		<div style='text-align:center;'>";

		
/*
edit for new customer start
if($rs['confirm_flag']=="Y"){ 

$tableHTML.="
			<button disabled type='button' id='idEdit-".$rs['assign_kpi_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>";
$tableHTML.="

			<button disabled type='button' id='idDel-".$rs['assign_kpi_id']."' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>
			<input type='hidden'  class='embed_confirm_flag' name='embed_confirm_flag' value='".$rs['confirm_flag']."'>
			";
}else{
	$tableHTML.="
			<button type='button' id='idEdit-".$rs['assign_kpi_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>";
	$tableHTML.="

			<button type='button' id='idDel-".$rs['assign_kpi_id']."' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>";
}
edit for new customer end
*/
$tableHTML.="
			<button type='button' id='idEdit-".$rs['assign_kpi_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>";
	$tableHTML.="

			<button type='button' id='idDel-".$rs['assign_kpi_id']."-".$rs['kpi_id']."' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>";


$tableHTML.="
			
		 </div>
			</td>";
	$tableHTML.="</tr>";
	
	$i++;
	}
	$tableHTML.="</tbody>";
	$tableHTML.="</table>";
	echo $tableHTML;
	$conn->close();

}
if($_POST['action']=="del"){
	$id=$_POST['id'];
	$kpi_id=$_POST['kpi_id'];
	
	


	$strSQL="DELETE FROM assign_kpi_master WHERE assign_kpi_id=$id and admin_id='$admin_id'";


	$strSQLAssignKpi="DELETE FROM assign_kpi WHERE  assign_kpi_year='$year' and department_id='$department_id' and  appraisal_period_id='$appraisal_period_id'  and admin_id='$admin_id'";
	$resultAssignKpi=$conn->query($strSQLAssignKpi);


	$strSQLKpiResult="DELETE FROM kpi_result WHERE  kpi_year='$year' and department_id='$department_id' and  appraisal_period_id='$appraisal_period_id'  and admin_id='$admin_id'";
	$resultKpiResult=$conn->query($strSQLKpiResult);
	
	


	$result=$conn->query($strSQL);
	if($result){
		echo'["success"]';
		
		$strSQLUpdate="
		UPDATE assign_kpi_master SET confirm_flag='N', updated_dt='".date("Y-m-d H:i:s")."'
				where (assign_kpi_year='$year' or '$year'='All')
				and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
				and (department_id='$department_id' or '$department_id'='All')
				and (position_id='$position_id' or '$position_id'='All')
				and admin_id='$admin_id'
			";
				
		$rsResultUpdate=$conn->query($strSQLUpdate);
		if(!$rsResultUpdate){
			echo $conn->error;;
		}
		
		// check count rows assign_kpi_master
		
		

	}else{
		echo'["error"]';
	}
	$conn->close();
	
}
if($_POST['action']=="removeAssignKPIs"){
	/*
	echo "yeaer=".$year;
	echo "appraisal_period_id=".$appraisal_period_id ;
	echo "department_id=".$department_id;
	echo "position_id=".$position_id;
	echo "admin_id=".$admin_id;
	
	action	removeAssignKPIs
	appraisal_period_id	22
	department_id	11
	employee_id	20
	position_id	10
	year	2015


	*/
			$strSQL="DELETE FROM assign_kpi_master  
			WHERE  assign_kpi_year='$year'
			and appraisal_period_id='$appraisal_period_id'
			and department_id='$department_id'
			and position_id='$position_id'
			and admin_id='$admin_id'
		";
			$result=$conn->query($strSQL);
			
	if($result){
		
		echo'["success"]';

	}
}	
if($_POST['action']=="edit"){
	$id=$_POST['id'];

	$strSQLAssignKpi="DELETE FROM assign_kpi WHERE  assign_kpi_year='$year' and department_id='$department_id' and  appraisal_period_id='$appraisal_period_id'  and admin_id='$admin_id'";
	$resultAssignKpi=$conn->query($strSQLAssignKpi);

	$strSQLKpiResult="DELETE FROM kpi_result WHERE  kpi_year='$year' and department_id='$department_id' and  appraisal_period_id='$appraisal_period_id'  and admin_id='$admin_id'";
	$resultKpiResult=$conn->query($strSQLKpiResult);


	$strSQL="SELECT * FROM assign_kpi_master WHERE assign_kpi_id=$id and admin_id='$admin_id'";
	$result=$conn->query($strSQL);
	if($result){
		$rs=$result->fetch_assoc();
		
		/*
		kpi_id
		kpi_weight
		target_data
		kpi_type_actual
		kpi_actual_manual
		kpi_actual_query
		target_score
		*/
		
		 echo "[{\"assign_kpi_id\":\"$rs[assign_kpi_id]\",\"assign_kpi_year\":\"$rs[assign_kpi_year]\",
		 		\"appraisal_period_id\":\"$rs[appraisal_period_id]\",
	\"position_id\":\"$rs[position_id]\",\"kpi_id\":\"$rs[kpi_id]\",
	\"kpi_weight\":\"$rs[kpi_weight]\",\"target_data\":\"$rs[target_data]\",\"kpi_type_actual\":\"$rs[kpi_type_actual]\",
	\"kpi_actual_manual\":\"$rs[kpi_actual_manual]\",\"kpi_actual_query\":\"$rs[kpi_actual_query]\",\"target_score\":\"$rs[target_score]\",
	\"department_id\":\"$rs[department_id]\",\"total_kpi_actual_score\":\"$rs[total_kpi_actual_score]\",
	\"kpi_actual_score\":\"$rs[kpi_actual_score]\",\"performance\":\"$rs[performance]\"
	}]";
		
	}else{
		echo'["error"]';
	}
	
	$conn->close();
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
	position_id
	
	kpi_id
	kpi_weight
	target_data
	kpi_type_actual
	kpi_actual_manual
	kpi_actual_query
	target_score
	*/

	$strSQL="UPDATE assign_kpi_master SET assign_kpi_year='$year',appraisal_period_id='$appraisal_period_id' ,
	position_id='$position_id'  ,department_id='$department_id',kpi_id='$kpi_id',kpi_weight='$kpi_weight',
	target_data='$target_data',kpi_type_actual='$kpi_type_actual',kpi_actual_manual='$kpi_actual_manual',
	kpi_actual_query='$kpi_actual_query',target_score='$target_score',kpi_actual_score='$kpi_actual_score',
	total_kpi_actual_score='$total_kpi_actual_score',performance='$performance'
	WHERE assign_kpi_id='$assign_kpi_id'";
	$result=$conn->query($strSQL);
	if($result){
		echo'["editSuccess"]';
		
		$strSQLUpdate="
		UPDATE assign_kpi_master SET confirm_flag='N', updated_dt='".date("Y-m-d H:i:s")."'
				where (assign_kpi_year='$year' or '$year'='All')
				and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
				and (department_id='$department_id' or '$department_id'='All')
				and (position_id='$position_id' or '$position_id'='All')
				and admin_id='$admin_id'
		";
		
		
		$rsResultUpdate=$conn->query($strSQLUpdate);
		if(!$rsResultUpdate){
			echo $conn->error;;
		}else{
			//echo'["success"]';
		}
		
		
	}else{
		echo'["error"]'.$conn->error;;
	}

	$conn->close();
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

	$result=$conn->query($strSQL);
	$rs=$result->fetch_assoc();
	echo "[{\"kpi_target_data\":\"$rs[max_baseline_data]\",\"target_score\":\"$rs[max_baseline_score]\"}]";
}
if($_POST['action']=="getAllDataBaseline"){

	$tableHtml="";
	$strSQL="
	
	select b.baseline_id,b.kpi_id,b.baseline_begin,b.baseline_end,b.baseline_score,b.suggestion ,k.kpi_type_score
from baseline b
inner join kpi k on b.kpi_id=k.kpi_id
where b.kpi_id='$kpi_id'
ORDER BY b.baseline_score desc";
	$resultCheckTypeScore=$conn->query($strSQL);
	$result=$conn->query($strSQL);
	$rsCheckTypeScore=$resultCheckTypeScore->fetch_assoc();
	if($rsCheckTypeScore['kpi_type_score']==1){
		$tableHtml.="<table class='table table-striped' id='baselineTable'>
				 	<thead>
						<tr>
							
							<th style='text-align:right; width:110px;'>เริ่ม</th>
							<th style='text-align:right;width:110px;'>ถึง</th>
							<th style='text-align:right;width:80px;'>คะแนน</th>
							<th><div style='padding-left:10px;'>เกฑณ์ประเมิน</div></th>
							<th style='text-align:center;'></th>
						</tr>
				  	</thead>
					<tbody>";
	}else {
		$tableHtml.="<table class='table table-striped' id='baselineTable'>
				 	<thead>
						<tr>
							
							
							<th style='text-align:right;width:80px;'>คะแนน</th>
							<th><div style='padding-left:10px;'>เกฑณ์ประเมิน</div></th>
							<th style='text-align:center;'></th>
						</tr>
				  	</thead>
					<tbody>";
	}
	
				$i=0;
				while($rs=$result->fetch_assoc()){
					if($rs['kpi_type_score']==1){
					$tableHtml.="
								<tr id='baseline_radio-".$rs['baseline_id']."'  class='baseline_radio' style ='cursor:pointer;'>
								
									<td id='baseline_begin_result-".$rs['baseline_id']."'><div style='text-align:right'>".number_format($rs['baseline_begin'], 2, '.', ',')."</div></td>
									<td id='baseline_end_result-".$rs['baseline_id']."'><div style='text-align:right'>".number_format($rs['baseline_end'], 2, '.', ',')."</div></td>
									<td><div style='text-align:right'><span class=\"label label-primary\">".$rs['baseline_score']."</span></div></td>
									<td><div style='padding-left:10px;'>".$rs['suggestion']."</div></td>
<td style='text-align:center;'> 
	<button class='btn btn-warning'><i class='glyphicon glyphicon-check'></i> กดให้คะแนน</button>
</td>
								<tr>
						";
					}else{
						$tableHtml.="
								<tr id='baseline_radio-".$rs['baseline_id']."'  class='baseline_radio' style ='cursor:pointer;'>
								
									
									<td><div style='text-align:right'><span class=\"label label-primary\">".$rs['baseline_score']."</span></div></td>
									<td><div style='padding-left:10px;'>".$rs['suggestion']."</div></td>
<td style='text-align:center;'> 
	<button class='btn btn-warning'><i class='glyphicon glyphicon-check'></i> กดให้คะแนน</button>
</td>
								<tr>
						";
					}
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
	$result=$conn->query($strSQL);
	$rs=$result->fetch_assoc();


	echo "[{\"baseline_score\":\"$rs[baseline_score]\"}]";

}
if($_POST['action']=="getSumWeightKpi"){
	
	$strSQL="select sum(kpi_weight) as sum_kpi_weight from assign_kpi_master where
		(assign_kpi_year='$year' or '$year'='All') and
		(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
		(department_id='$department_id' or '$department_id'='All') and
		(position_id='$position_id' or '$position_id'='All') 
		and admin_id='$admin_id'
		group by assign_kpi_year,appraisal_period_id,position_id
		";
	$result=$conn->query($strSQL);
	$rs=$result->fetch_assoc();
	echo "[{\"kpi_weight\":\"$rs[sum_kpi_weight]\"}]";
	
}
if($_POST['action']=="getKPIPercentage"){

	$strSQL="select sum(total_kpi_actual_score) as sum_kpi_weight from assign_kpi_master where
	(assign_kpi_year='$year' or '$year'='All') and
	(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
	(department_id='$department_id' or '$department_id'='All') and
	(position_id='$position_id' or '$position_id'='All') 
	and admin_id='$admin_id'
	group by assign_kpi_year,appraisal_period_id,position_id
	";
	$result=$conn->query($strSQL);
	$rs=$result->fetch_assoc();
	$total_kpi_actual_score=($rs['sum_kpi_weight']/100);
	
	
	if($rs){
		$strSQLKpiResult="
						select confirm_flag from assign_kpi_master
						where (assign_kpi_year='$year' or '$year'='All') 
						and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
						and (department_id='$department_id' or '$department_id'='All')
						and (position_id='$position_id' or '$position_id'='All')
						and admin_id='$admin_id'
						
		";
		$resultKpiResult=$conn->query($strSQLKpiResult);
		$rsKpiResult=$resultKpiResult->fetch_assoc();
		
		
		echo "[{\"total_kpi_actual_score\":\"$total_kpi_actual_score\",\"confirm_flag\":\"$rsKpiResult[confirm_flag]\"}]";
		
	}

}


if($_POST['action']=="confrimKpi"){

	
	/*
	 kpi_year
	appraisal_period_id
	department_id

	position_id
	
	score_percentage
	adjust_percentage
	adjust_reason
	approve_flag
	*/
	
		$strSQLUpdate="
		UPDATE assign_kpi_master SET confirm_flag='Y', updated_dt='".date("Y-m-d H:i:s")."'
		where (assign_kpi_year='$year' or '$year'='All') 
			and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
			and (department_id='$department_id' or '$department_id'='All')
			and (position_id='$position_id' or '$position_id'='All')
			and admin_id='$admin_id'
			";
	
			$rsResultUpdate=$conn->query($strSQLUpdate);
			if(!$rsResultUpdate){
				echo $conn->error;;
			}else{
				echo'["success"]';
			}
	
}


}else{
	echo'{"status":"400","error":"not token."}';
}


