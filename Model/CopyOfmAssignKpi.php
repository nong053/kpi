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
$score_sum_percentage=$_POST['score_sum_percentage'];









if($_POST['action']=="add"){
	
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
		
	$strSQL="INSERT INTO assign_kpi(assign_kpi_year,appraisal_period_id,emp_id,position_id,kpi_weight,kpi_type_actual,
	kpi_actual_query,kpi_actual_manual,target_data,target_score,kpi_id,department_id,total_kpi_actual_score,kpi_actual_score,performance,admin_id)
	VALUES('$year','$appraisal_period_id','$employee_id','$position_id','$kpi_weight','$kpi_type_actual','$kpi_actual_query','$kpi_actual_manual',
	'$target_data','$target_score','$kpi_id','$department_id','$total_kpi_actual_score','$kpi_actual_score','$performance','$admin_id')";
	$rs=mysql_query($strSQL);
	
	
	
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
			";
			
			$rsResultCount=mysql_query($strSQLCount);
			$resultResultCount=mysql_fetch_array($rsResultCount);
			
			if($resultResultCount['countRow']==0){
				/*
			//echo" insert kpi_result=".$resultResultCount['countRow'];
			$strSQLKpiResult="INSERT INTO kpi_result(kpi_year,appraisal_period_id,department_id,position_id,emp_id,
			score_sum_percentage,adjust_percentage,adjust_reason,approve_flag)
			VALUES('$year','$appraisal_period_id','$department_id','$division_id','$position_id','$employee_id','90','','','0')";
			$rsResult=mysql_query($strSQLKpiResult);
			
				if(!$rsResult){
				echo mysql_error();	
				}
			*/
			}else{
				// Update kpi_result when change kpi_reult and wait for confirm change.
				/*
				$strSQLUpdate="
				UPDATE kpi_result
				SET confirm_flag='N'
				where (kpi_year='$year' or '$year'='All') and
				(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
				(department_id='$department_id' or '$department_id'='All') and
				(division_id='$division_id' or '$division_id'='All') and
				(position_id='$position_id' or '$position_id'='All') and
				(emp_id='$employee_id' or '$employee_id'='All')";
				
				$rsResultUpdate=mysql_query($strSQLUpdate);
				*/
				//echo" update kpi_result".$resultResultCount['countRow'];
				
			}
			
			
			if($rs){
				echo'["success"]';
			}else{
				echo mysql_error();
			}
			
	
	}else{
		echo'["key-duplicate"]';
	}
	
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
	INNER JOIN role r on pe.role_id=r.role_id
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
	$tableHTML.="<table id='Tableemployee' class='grid table-striped'>";
	$tableHTML.="<colgroup>";
	$tableHTML.="<col style='width:5%' />";
	$tableHTML.="<col style='width:5%' />";
	$tableHTML.="<col />";
	$tableHTML.="<col />";
	$tableHTML.="<col />";
	$tableHTML.="<col />";
	$tableHTML.="<col style='width:5%'/>";
	$tableHTML.="<col style='width:5%'/>";
	$tableHTML.="<col style='width:8%'/>";

	$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
	$tableHTML.="<tr>";
	$tableHTML.="<th><b> ID</b></th>";
	$tableHTML.="<th><b>Picture</b></th>";
	$tableHTML.="<th><b>Name</b></th>";
	$tableHTML.="<th><b>Department</b></th>";
	$tableHTML.="<th><b>Position</b></th>";
	$tableHTML.="<th><b>Role</b></th>";
	$tableHTML.="<th><b>Age W</b></th>";
	$tableHTML.="<th><b>Age</b></th>";
	$tableHTML.="<th><b>Score</b></th>";
	$tableHTML.="<th><b>Manage</b></th>";
		
	$tableHTML.="</tr>";
	$tableHTML.="</thead>";

	while($rs=mysql_fetch_array($result)){

		$tableHTML.="<tbody class=\"contentemployee\">";
		$tableHTML.="<tr>";
		$tableHTML.="	<td>".$i."|".$rs['emp_id']."</td>";
		$tableHTML.="	<td><img class=\"img-circle\"  src=".$rs['emp_picture_thum']." width=50></td>";
		$tableHTML.="	<td>".$rs['emp_first_name']." ".$rs['emp_last_name']."</td>";
		$tableHTML.="	<td>".$rs['department_name']."<span style='display:none;' id='depId-".$rs['emp_id']."'>".$rs['department_id']."</span></td>";
		$tableHTML.="	<td>".$rs['position_name']."<span  style='display:none;' id='positionId-".$rs['emp_id']."'>".$rs['position_id']."</span></td>";
		$tableHTML.="	<td>".$rs['role_name']."</td>";
		$tableHTML.="	<td>".$rs['emp_age_working']."</td>";
		$tableHTML.="	<td>".$rs['emp_age']."</td>";
		
/*
appraisal_period_id	1
department_id	1
division_id	7
employee_id	35
position_id	3
year	2012
*/
		$strSQLKpiResult="
				SELECT  e.emp_id,kr.approve_flag,kr.confirm_flag,kr.score_sum_percentage,kr.score_final_percentage FROM employee e
				INNER JOIN kpi_result kr
				ON e.emp_id=kr.emp_id
				where kr.kpi_year='$year' 
				and kr.appraisal_period_id='$appraisal_period_id' 
				and kr.department_id='".$rs['department_id']."' 
				and kr.position_id='".$rs['position_id']."' 
				and kr.emp_id='".$rs['emp_id']."' 
		";
		$resultKpiResult=mysql_query($strSQLKpiResult);
		
		$rsKpiResult=mysql_fetch_array($resultKpiResult);

		$score="";
		if($rsKpiResult['score_final_percentage']!=""){
			$score=$rsKpiResult['score_final_percentage'];
		}else{
			$score=$rsKpiResult['score_sum_percentage'];
		}
		
		$tableHTML.="	<td>$score</td>";
		
		if($rsKpiResult[emp_id]!=""){
			
			if(($rsKpiResult[approve_flag]=="Y") and ($rsKpiResult[confirm_flag]=="Y")){
				$tableHTML.="<td>
				<button type='button' id='idAssignKPI-".$rs['emp_id']."' class='approvedKpi btn btn-success btn-xs'>Approved</button>
				</td>";
			}else{
			$tableHTML.="	<td>
			<button type='button' id='idAssignKPI-".$rs['emp_id']."' class='actionAssignKPI btn btn-warning btn-xs'>Assigned </button>
			<button type='button' id='idAssignKPI-".$rs['emp_id']."' class='actionRemoveAssign btn btn-danger btn-xs'>Remove</button>
			</td>";
			}
		}else{
			$tableHTML.="<td>
			<button type='button' id='idAssignKPI-".$rs['emp_id']."' class='actionAssignKPI btn btn-danger btn-xs'>Assign KPI</button>
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

	select ak.appraisal_period_id,ak.assign_kpi_id,kpi_name,ak.kpi_weight,ak.target_data,ak.target_score,ak.kpi_type_actual,ak.kpi_actual_manual,ak.kpi_actual_query
	from assign_kpi ak
	inner JOIN kpi
	on ak.kpi_id=kpi.kpi_id
	where (ak.emp_id='$employee_id' or '$employee_id'='All')
	and (ak.assign_kpi_year='$year' or '$year'='All')
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
if($_POST['action']=="del"){
	$id=$_POST['id'];
	
	$strSQL="DELETE FROM assign_kpi WHERE assign_kpi_id=$id";
	$result=mysql_query($strSQL);
	if($result){
		
		// check count rows assign_kpi
		
		$strSQLCount="select count(*) AS countRow from assign_kpi where
		(assign_kpi_year='$year' or '$year'='All') and
		(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
		(department_id='$department_id' or '$department_id'='All') and
		(position_id='$position_id' or '$position_id'='All') and
		(emp_id='$employee_id' or '$employee_id'='All')
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
			(emp_id='$employee_id' or '$employee_id'='All')";
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
			(emp_id='$employee_id' or '$employee_id'='All')";
			
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
			$strSQL="DELETE FROM assign_kpi  
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
			and emp_id='$employee_id' ";
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
		
		 echo "[{\"assign_kpi_id\":\"$rs[assign_kpi_id]\",\"assign_kpi_year\":\"$rs[assign_kpi_year]\",
		 		\"appraisal_period_id\":\"$rs[appraisal_period_id]\",\"emp_id\":\"$rs[emp_id]\",
	\"position_id\":\"$rs[position_id]\",\"kpi_id\":\"$rs[kpi_id]\",
	\"kpi_weight\":\"$rs[kpi_weight]\",\"target_data\":\"$rs[target_data]\",\"kpi_type_actual\":\"$rs[kpi_type_actual]\",
	\"kpi_actual_manual\":\"$rs[kpi_actual_manual]\",\"kpi_actual_query\":\"$rs[kpi_actual_query]\",\"target_score\":\"$rs[target_score]\",
	\"department_id\":\"$rs[department_id]\",\"total_kpi_actual_score\":\"$rs[total_kpi_actual_score]\",
	\"kpi_actual_score\":\"$rs[kpi_actual_score]\",\"performance\":\"$rs[performance]\"
	}]";
		
	}else{
		echo'["error"]';
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

	$strSQL="UPDATE assign_kpi SET assign_kpi_year='$year',appraisal_period_id='$appraisal_period_id' ,
	position_id='$position_id' ,emp_id='$employee_id' ,department_id='$department_id',
	kpi_id='$kpi_id',
	kpi_weight='$kpi_weight',target_data='$target_data',kpi_type_actual='$kpi_type_actual',kpi_actual_manual='$kpi_actual_manual',
	kpi_actual_query='$kpi_actual_query',target_score='$target_score',kpi_actual_score='$kpi_actual_score',
	total_kpi_actual_score='$total_kpi_actual_score',performance='$performance'
	WHERE assign_kpi_id='$assign_kpi_id'";
	$result=mysql_query($strSQL);
	if($result){
		echo'["editSuccess"]';
		
		// Update kpi_result when change kpi_reult and wait for confirm change.
		$strSQLCount="select count(*) AS countRow from kpi_result where
		(kpi_year='$year' or '$year'='All') and
		(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
		(department_id='$department_id' or '$department_id'='All') and
		
		(position_id='$position_id' or '$position_id'='All') and
		(emp_id='$employee_id' or '$employee_id'='All')
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
			 (emp_id='$employee_id' or '$employee_id'='All')";
		
			 $rsResultUpdate=mysql_query($strSQLUpdate);
			 
			 //echo" update kpi_result".$resultResultCount['countRow'];
		
		}
	}else{
		echo'["error"]'.mysql_error();
	}

	mysql_close($conn);
}


if($_POST['action']=="getDataBaseline"){
	
	$strSQL="select baseline_end as max_baseline_data,max(baseline_score)as max_baseline_score from baseline
where kpi_id='$kpi_id'
GROUP BY kpi_id";
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
	$tableHtml.="<table class='table table-striped' id='baselineTable'>
				 	<thead>
						<tr>
							
							<th><center>Begin</center></th>
							<th><center>END</center></th>
							<th><center>Score</center></th>
						</tr>
				  	</thead>
					<tbody>";
				$i=0;
				while($rs=mysql_fetch_array($result)){
					$tableHtml.="<tr>
									
									<td><center>$rs[baseline_begin]</center></td>
									<td><center>$rs[baseline_end]</center></td>
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
	
	$strSQL="select sum(kpi_weight) as sum_kpi_weight from assign_kpi where
		(assign_kpi_year='$year' or '$year'='All') and
		(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
		(department_id='$department_id' or '$department_id'='All') and
		(position_id='$position_id' or '$position_id'='All') and
		(emp_id='$employee_id' or '$employee_id'='All')
		group by assign_kpi_year,appraisal_period_id,position_id,emp_id
		";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	echo "[{\"kpi_weight\":\"$rs[sum_kpi_weight]\"}]";
	
}
if($_POST['action']=="getKPIPercentage"){

	$strSQL="select sum(total_kpi_actual_score) as sum_kpi_weight from assign_kpi where
	(assign_kpi_year='$year' or '$year'='All') and
	(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
	(department_id='$department_id' or '$department_id'='All') and
	(position_id='$position_id' or '$position_id'='All') and
	(emp_id='$employee_id' or '$employee_id'='All')
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
		";
		$resultKpiResult=mysql_query($strSQLKpiResult);
		$rsKpiResult=mysql_fetch_array($resultKpiResult);
		
		
		echo "[{\"total_kpi_actual_score\":\"$total_kpi_actual_score\",\"confirm_flag\":\"$rsKpiResult[confirm_flag]\"}]";
		
	}

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
			SET score_sum_percentage='$score_sum_percentage',confirm_flag='Y'
			where (kpi_year='$year' or '$year'='All') and
			(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
			(department_id='$department_id' or '$department_id'='All') and
					
							(position_id='$position_id' or '$position_id'='All') and
									(emp_id='$employee_id' or '$employee_id'='All')";
	
											$rsResultUpdate=mysql_query($strSQLUpdate);
											if(!$rsResultUpdate){
												echo mysql_error();
											}else{
												echo'["success"]';
											}
	
											//echo" update kpi_result".$resultResultCount['countRow'];
				
		}
	
}


}else{
		echo'{"status":"400","error":"not token."}';
}


