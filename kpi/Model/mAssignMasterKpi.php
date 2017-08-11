<? session_start(); ob_start();?>
<?php
include 'config.php';

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
	
	$strSQLCount="select count(*) AS countRow from assign_kpi_master where
	(assign_kpi_year='$year' or '$year'='All') and
	(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
	(department_id='$department_id' or '$department_id'='All') and
	(position_id='$position_id' or '$position_id'='All') and
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
			
			";
			$resultSelectEmp=mysql_query($strSQLselectEmp);
			while($rsSelectEmp=mysql_fetch_array($resultSelectEmp)){

				$strSQL="INSERT INTO assign_kpi_master(assign_kpi_year,appraisal_period_id,position_id,kpi_weight,kpi_type_actual,
				kpi_actual_query,kpi_actual_manual,target_data,target_score,kpi_id,department_id,total_kpi_actual_score,kpi_actual_score,performance,admin_id,created_dt,updated_dt)
				VALUES('$year','$appraisal_period_id','$rsSelectEmp[position_id]','$kpi_weight','$kpi_type_actual','$kpi_actual_query','$kpi_actual_manual',
				'$target_data','$target_score','$kpi_id','$department_id','$total_kpi_actual_score','$kpi_actual_score','$performance','$admin_id','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
				$rs=mysql_query($strSQL);
				
				if($rs){
					echo'["success"]';
				}else{
					echo mysql_error();
				}
				
			}
			
			}else{
				
				
				$strSQL="INSERT INTO assign_kpi_master(assign_kpi_year,appraisal_period_id,position_id,kpi_weight,kpi_type_actual,
				kpi_actual_query,kpi_actual_manual,target_data,target_score,kpi_id,department_id,total_kpi_actual_score,kpi_actual_score,performance,admin_id)
				VALUES('$year','$appraisal_period_id','$position_id','$kpi_weight','$kpi_type_actual','$kpi_actual_query','$kpi_actual_manual',
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


if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="

	select ak.appraisal_period_id,ak.assign_kpi_id,kpi_name,ak.kpi_weight,ak.target_data,ak.target_score,ak.kpi_type_actual,ak.kpi_actual_manual,ak.kpi_actual_query
	from assign_kpi_master ak
	left JOIN kpi
	on ak.kpi_id=kpi.kpi_id
	where (ak.assign_kpi_year='$year' or '$year'='All')
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
			$tableHTML.="<col  style='width:45%'/>";
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
	$tableHTML.="	<td>".number_format((float)$rs['kpi_weight'], 2, '.', '')."</td>";
	$tableHTML.="	<td>".number_format((float)$rs['target_data'], 2, '.', '')."</td>";
	$tableHTML.="	<td>".number_format((float)$kpi_actual, 2, '.', '')."</td>";
	$tableHTML.="	<td>".number_format((float)$rs['target_score'], 2, '.', '')."</td>";
	
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
	
	$strSQL="DELETE FROM assign_kpi_master WHERE assign_kpi_id=$id and admin_id='$admin_id'";
	$result=mysql_query($strSQL);
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
				
		$rsResultUpdate=mysql_query($strSQLUpdate);
		if(!$rsResultUpdate){
			echo mysql_error();
		}
		
		// check count rows assign_kpi_master
		
		

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
			$result=mysql_query($strSQL);
			
	if($result){
		
		echo'["success"]';

	}
}	
if($_POST['action']=="edit"){
	$id=$_POST['id'];

	$strSQL="SELECT * FROM assign_kpi_master WHERE assign_kpi_id=$id and admin_id='$admin_id'";
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
	$result=mysql_query($strSQL);
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
		
		
		$rsResultUpdate=mysql_query($strSQLUpdate);
		if(!$rsResultUpdate){
			echo mysql_error();
		}else{
			//echo'["success"]';
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
	
	$strSQL="select sum(kpi_weight) as sum_kpi_weight from assign_kpi_master where
		(assign_kpi_year='$year' or '$year'='All') and
		(appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All') and
		(department_id='$department_id' or '$department_id'='All') and
		(position_id='$position_id' or '$position_id'='All') 
		and admin_id='$admin_id'
		group by assign_kpi_year,appraisal_period_id,position_id
		";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
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
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	$total_kpi_actual_score=($rs[sum_kpi_weight]/100);
	
	
	if($rs){
		$strSQLKpiResult="
						select confirm_flag from assign_kpi_master
						where (assign_kpi_year='$year' or '$year'='All') 
						and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
						and (department_id='$department_id' or '$department_id'='All')
						and (position_id='$position_id' or '$position_id'='All')
						and admin_id='$admin_id'
						
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
	
			$rsResultUpdate=mysql_query($strSQLUpdate);
			if(!$rsResultUpdate){
				echo mysql_error();
			}else{
				echo'["success"]';
			}
	
}


