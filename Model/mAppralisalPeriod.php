<? session_start(); ob_start();?>
<?php
include './../config.inc.php';

//Security by json web token
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){


$appraisalPeriodYear =$_POST['appraisalPeriodYear'];
$appraisalPeriodDesc = $_POST['appraisalPeriodDesc'];
$appraisalPeriodStart = $_POST['appraisalPeriodStart'];
$appraisalPeriodEnd = $_POST['appraisalPeriodEnd'];
$appraisalPeriodId=$_POST['appraisalPeriodId'];
$appraisal_period_target_percentage=$_POST['appraisal_period_target_percentage'];
$admin_id=$_SESSION['admin_id'];

//CheckUsingKpiAssignAndKpiResult Start
if($_POST['action']=="checkUsingKpiAssignAndKpiResult"){

	$sqlSQL="select count(*) as countAppraisal
			from assign_kpi 
			where appraisal_period_id='$appraisalPeriodId'
		";
	
	$result=mysql_query($sqlSQL);
	$rs=mysql_fetch_array($result);
	echo "[\"$rs[countAppraisal]\"]";
	mysql_close($conn);
}
//CheckUsingKpiAssignAndKpiResult End

if($_POST['action']=="add"){
	$strSQL="INSERT INTO appraisal_period(appraisal_period_year,appraisal_period_desc,appraisal_period_start,appraisal_period_end,appraisal_period_target_percentage,admin_id)
	VALUES('$appraisalPeriodYear','$appraisalPeriodDesc','$appraisalPeriodStart','$appraisalPeriodEnd','$appraisal_period_target_percentage','$admin_id')";
	$rs=mysql_query($strSQL);
	if($rs){
		echo'["success"]';
	}else{
		echo'["error"]';
	}
	mysql_close($conn);
}

if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="SELECT * FROM appraisal_period where  appraisal_period_year='$appraisalPeriodYear' and admin_id='$admin_id'  order by appraisal_period_id  ";
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='TableappraisalPeriod' class='grid table-striped' style='width:100%'>";
		$tableHTML.="<colgroup>";
			 $tableHTML.="<col style='width:3%' />";
			 $tableHTML.="<col  style='width:20%'/>";
			 //$tableHTML.="<col style='width:40%'/>";
			 //$tableHTML.="<col style='width:10%'/>";
			 $tableHTML.="<col  style='width:20%'/>";
			 $tableHTML.="<col  style='width:25%'/>";
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th data-field=\"appraisalPeriod_l_tbl_id\"><b>".$_SESSION['appraisalPeriod_l_tbl_id']."</b></th>";
			$tableHTML.="<th data-field=\"appraisalPeriod_l_tbl_year\"><b>".$_SESSION['appraisalPeriod_l_tbl_year']."</b></th>";
			$tableHTML.="<th data-field=\"appraisalPeriod_l_tbl_des\"><b>".$_SESSION['appraisalPeriod_l_tbl_des']."</b></th>";
			//$tableHTML.="<th data-field=\"appraisalPeriod_l_tbl_start\"><b>".$_SESSION['appraisalPeriod_l_tbl_start']." </b></th>";
			//$tableHTML.="<th data-field=\"appraisalPeriod_l_tbl_end\"><b>".$_SESSION['appraisalPeriod_l_tbl_end']." </b></th>";
			//$tableHTML.="<th  data-field=\"appraisalPeriod_l_tbl_target\"><b>".$_SESSION['appraisalPeriod_l_tbl_target']."</b></th>";
			$tableHTML.="<th  data-field=\"appraisalPeriod_l_tbl_manage\"><center><b>".$_SESSION['appraisalPeriod_l_tbl_manage']."</b></center></th>";
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	$tableHTML.="<tbody class=\"contentappraisalPeriod\">";
	while($rs=mysql_fetch_array($result)){
		
	
	
	$tableHTML.="<tr>";
	$tableHTML.="	<td>".$i."</td>";
	$tableHTML.="	<td>".$rs['appraisal_period_year']."</td>";
	$tableHTML.="	<td>".$rs['appraisal_period_desc']."</td>";
	//$tableHTML.="	<td>".$rs['appraisal_period_start']."</td>";
	//$tableHTML.="	<td>".$rs['appraisal_period_end']."</td>";
	//$tableHTML.="	<td style='text-align:right;'>".$rs['appraisal_period_target_percentage']."%</td>";
	
	$tableHTML.="	<td >
	<div style='text-align: center;'>
			<button type='button' id='idEdit-".$rs['appraisal_period_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>
			<button type='button' id='idDel-".$rs['appraisal_period_id']."' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>
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
	
	$strSQL="DELETE FROM appraisal_period WHERE appraisal_period_id=$id";
	$result=mysql_query($strSQL);
	if($result){
		echo'["success"]';
	}else{
		echo'["error"]';
	}
	mysql_close($conn);
	
}
if($_POST['action']=="edit"){
	$id=$_POST['id'];

	$strSQL="SELECT * FROM appraisal_period WHERE appraisal_period_id=$id";
	$result=mysql_query($strSQL);
	if($result){
		$rs=mysql_fetch_array($result);
		
		//echo "[{\"abc\":$rs[appraisalPeriod_id],\"def\":\"22\"}]";
		
		 echo "[{\"appraisal_period_id\":\"$rs[appraisal_period_id]\",\"appraisal_period_year\":\"$rs[appraisal_period_year]\",
		 		\"appraisal_period_desc\":\"$rs[appraisal_period_desc]\",\"appraisal_period_start\":\"$rs[appraisal_period_start]\",
		 \"appraisal_period_end\":\"$rs[appraisal_period_end]\", \"appraisal_period_target_percentage\":\"$rs[appraisal_period_target_percentage]\"}]";
		 
	}else{
		echo'["error"]';
	}
	
	mysql_close($conn);
}
if($_POST['action']=="editAction"){


	$strSQL="UPDATE appraisal_period SET appraisal_period_year='$appraisalPeriodYear',
	appraisal_period_desc='$appraisalPeriodDesc',
	appraisal_period_start='$appraisalPeriodStart',
	appraisal_period_end='$appraisalPeriodEnd',
	appraisal_period_target_percentage='$appraisal_period_target_percentage'
	 WHERE appraisal_period_id='$appraisalPeriodId'";
	
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


