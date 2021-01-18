<?php
include './../config.inc.php';


// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){
	
$year =$_POST['assign_kpi_year'];
$appraisalPeriod = $_POST['appraisal_period_id'];
$position =$_POST['position_id'];
$emp_id = $_POST['emp_id'];
$perspective = $_POST['perspective_id'];
$kpi_id = $_POST['kpi_id'];
$assign_kpi_id = $_POST['assign_kpi_id'];
$actualData = $_POST['actualData'];




if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="select ak.*,p.perspective_name,k.kpi_id,k.kpi_name,e.emp_name from assign_kpi ak
INNER JOIN perspective p on ak.perspective_id=p.perspective_id
INNER JOIN kpi k on p.perspective_id=k.perspective_id
INNER JOIN employee e on ak.emp_id=e.emp_id
where assign_kpi_year='$year'
and appraisal_period_id='$appraisalPeriod'
and ak.emp_id='$emp_id '
and p.perspective_id='$perspective'";
	
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='TableKpi' class='grid table-striped'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:50px' />";
			$tableHTML.="<col  />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
	
	/*
	<th>Employee Code</th>
	<th>Employee Name</th>				
	<th>KPI Code</th>	
	<th>KPI Name</th> 
	 */
		$tableHTML.="<tr>";
			$tableHTML.="<th><b>ID</b></th>";
			$tableHTML.="<th><b>Year</b></th>";

			$tableHTML.="<th><b>Employee Name</b></th>";
			$tableHTML.="<th><b>Pespective</b></th>";
			$tableHTML.="<th><b>KPI NAME</b></th>";
			$tableHTML.="<th><b>Manage</b></th>";
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	
	while($rs=mysql_fetch_array($result)){
		
		
	$tableHTML.="<tbody class=\"contentassignKpi\">";
	$tableHTML.="<tr>";
	$tableHTML.="	<td>".$i."</td>";
	$tableHTML.="	<td>".$rs['assign_kpi_year']."</td>";
	$tableHTML.="	<td>".$rs['emp_name']."</td>";
	$tableHTML.="	<td>".$rs['perspective_name']."</td>";
	$tableHTML.="	<td>".$rs['kpi_name']."</td>";
	
	

	$tableHTML.="	<td>
			<button type='button' id='idSetKpi-".$rs['kpi_id']."' class='actionSetKpi btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'> KPI Result</i></button>
			
			</td>";
	$tableHTML.="</tr>";

	
	$i++;
	}
	$tableHTML.="</tbody>";
	$tableHTML.="</table>";
	echo $tableHTML;
	mysql_close($conn);
}


if($_POST['action']=="showDataKpi"){
	//echo "Show Data";
	
	/*
	 
$year =$_POST['assign_kpi_year'];
$appraisalPeriod = $_POST['appraisal_period_id'];
$position =$_POST['position_id'];
$emp_id = $_POST['emp_id'];
$perspective = $_POST['perspective_id'];
$kpi_id = $_POST['kpi_id'];
$assign_kpi_id = $_POST['assign_kpi_id'];
$actualData = $_POST['actualData'];


	 */
$strSQL="select ak.*,p.perspective_name,k.kpi_id,k.kpi_name,k.kpi_target,k.kpi_pers_weight,k.kpi_own_weight,e.emp_name,ap.appraisal_period_desc from assign_kpi ak
INNER JOIN perspective p on ak.perspective_id=p.perspective_id
INNER JOIN kpi k on p.perspective_id=k.perspective_id
INNER JOIN employee e on ak.emp_id=e.emp_id
INNER JOIN appraisal_period ap ON ak.appraisal_period_id=ap.appraisal_period_id

where assign_kpi_year='$year'
and ak.appraisal_period_id='$appraisalPeriod'
and ak.emp_id='$emp_id '
and k.kpi_id='$kpi_id'";

	
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	
	$strSQLKpiResult="select * from kpi_result where assign_kpi_id='$assign_kpi_id'
and kpi_id='$kpi_id'";
$resultKpiResult=mysql_query($strSQLKpiResult);
$rsKpiResult=mysql_fetch_array($resultKpiResult);

echo "test".$rsKpiResult[kpi_actual];
	
	
	
	$html="
	<h2>KPI DETAIL</h2>
	<table>
	<tr>
	<td>
	Year
	</td>
	<td>
	<input type='text'  readonly value='$rs[assign_kpi_year]' style=\"background:#dddddd\">
	</td>
	</tr>
	<tr>
	<td>
	Period
	</td>
	<td>
	<input type='text' readonly value='$rs[appraisal_period_desc]' style=\"background:#dddddd\">
	</td>
	</tr>
	<tr>
	<td>
	Employee Code
	</td>
	<td>
	<input type='text' readonly value='$rs[emp_id]' style=\"background:#dddddd\">
	<input type='text' readonly value='$rs[emp_name]' style=\"background:#dddddd\">
	</td>
	</tr>
	<tr>
	<td>
	KPI Code
	</td>
	<td>
	<input type='text' readonly value='$rs[kpi_id]' style=\"background:#dddddd\">
		
	</td>
	</tr>
	<tr>
	<td>
	KPI Name
	</td>
	<td>
	<input type='text' readonly value='$rs[kpi_name]' style=\"background:#dddddd\">
		
	</td>
	</tr>
	<tr>
	<td>
	Target Data
	</td>
	<td>
	<input type='text' readonly value='$rs[kpi_target]' style=\"background:#dddddd\">
		
	</td>
	</tr>
	<!--
	<tr>
	<td>
	Target Score
	</td>
	<td>
	<input type='text' readonly value='50' style=\"background:#dddddd\">
	</td>
	</tr>
	-->
	<tr>
	<td>
	Actal Data
	</td>
	<td>
	<input id='actualData' type='text'  value='$rsKpiResult[kpi_actual]'>
		
	</td>
	</tr>
	<!--
	<tr>
	<td>
	Baseline Data
	</td>
	<td>
	<input id='baseLineData' type='text' readonly value='80' style=\"background:#dddddd\">
		
	</td>
	</tr>
	-->
	<tr>
	<td>
	Actual Score
	</td>
	<td>
	<input type='text' readonly value='45' style=\"background:#dddddd\">
	</td>
	</tr>
	<tr>
	<td>
	P Weight
	</td>
	<td>
	<input type='text' readonly value='$rs[kpi_pers_weight]' style=\"background:#dddddd\">
	</td>
	</tr>
	<tr>
	<td>
	O Weight
	</td>
	<td>
	<input type='text' readonly value='$rs[kpi_own_weight]' style=\"background:#dddddd\">
	</td>
	</tr>
	<tr>
		<td>
			<button id=\"btn-kpi-submit\">Submit</button>
		</td>
	</tr>
	</table>
	";
	
	echo $html;
	
}


if($_POST['action']=="editAction"){
	/*
	
	year
	appraisalPeriod
	position1
	employee
	perspective
	
	
	assign_kpi_id
	assign_kpi_year
	appraisal_period_id
	emp_id
	position_id
	perspective_id
	*/

	$strSQL="UPDATE assign_kpi SET assign_kpi_year='$year',appraisal_period_id='$appraisalPeriod' ,
	position_id='$position' ,emp_id='$employee' ,perspective_id='$perspective' 
	WHERE assign_kpi_id='$assignKpiId'";
	$result=mysql_query($strSQL);
	if($result){
		echo'["editSuccess"]';
	}else{
		echo'["error"]'.mysql_error();
	}

	mysql_close($conn);
}

if($_POST['action']=="setActualKpi"){
 $strSQL="select count(*) as countRow from kpi_result
 	where assign_kpi_id='$assign_kpi_id'
 	and kpi_id='$kpi_id'";
 $result=mysql_query($strSQL);
 $rs=mysql_fetch_array($result);
 if($rs[countRow]==0){
 	//echo"ok".$rs[countRow];
/*
kpi_result

kpi_result_id
assign_kpi_id
kpi_id
kpi_actual


$year =$_POST['assign_kpi_year'];
$appraisalPeriod = $_POST['appraisal_period_id'];
$position =$_POST['position_id'];
$emp_id = $_POST['emp_id'];
$perspective = $_POST['perspective_id'];
$kpi_id = $_POST['kpi_id'];

$assign_kpi_id
*/
 	
 	$strSQL="INSERT INTO kpi_result(assign_kpi_id,kpi_id,kpi_actual)
 	VALUES('$assign_kpi_id','$kpi_id','$actualData')";
 	$rs=mysql_query($strSQL);
 	if($rs){
 		echo'["success"]';
 	}else{
 		echo'["error"]';
 	}
 	mysql_close($conn);
 	
 	
 	
 	
 }else{
 	//echo "no".$rs[countRow];
 	
 	$strSQL="UPDATE kpi_result SET kpi_id='$kpi_id',kpi_actual='$actualData' 
 	WHERE assign_kpi_id='$assign_kpi_id'";
 	$result=mysql_query($strSQL);
 	if($result){
 		echo'["editSuccess"]';
 	}else{
 		echo'["error"]'.mysql_error();
 	}
 	
 	mysql_close($conn);
 	
 }
}

}else{
echo'{"status":"400","error":"not token."}';

}

