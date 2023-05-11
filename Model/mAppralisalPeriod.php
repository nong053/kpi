<?php session_start(); ob_start();?>
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
if($_POST['action']=="checkUsedData"){

	$sqlSQL="select count(*) as countAppraisal
			from assign_evaluate_kpi
			where appraisal_period_id='$appraisalPeriodId'
		";
	
	//$result=mysql_query($sqlSQL);
	//$rs=mysql_fetch_array($result);
	$result=$conn->query($sqlSQL);
	$rs=$result->fetch_assoc();

	echo "[\"$rs[countAppraisal]\"]";
	//mysql_close($conn);
	$conn->close();
}
//CheckUsingKpiAssignAndKpiResult End

if($_POST['action']=="add"){
	$strSQL="INSERT INTO appraisal_period(appraisal_period_year,appraisal_period_desc,appraisal_period_start,appraisal_period_end,appraisal_period_target_percentage,admin_id)
	VALUES('$appraisalPeriodYear','$appraisalPeriodDesc','$appraisalPeriodStart','$appraisalPeriodEnd','$appraisal_period_target_percentage','$admin_id')";
	//$rs=mysql_query($strSQL);
	$rs=$conn->query($strSQL);
	if($rs){
		echo'["success"]';
	}else{
		echo'["error"]';
	}
	//mysql_close($conn);
	$conn->close();
}

if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="SELECT * FROM appraisal_period where  appraisal_period_year='$appraisalPeriodYear' and admin_id='$admin_id'  order by appraisal_period_id  ";
	//$result=mysql_query($strSQL);
	$result=$conn->query($strSQL);
	$tableHTML="";
	$i=1;
	
	while($rs=$result->fetch_assoc()){	
	
	
	$tableHTML.="<div class='col-md-3'>";
	$tableHTML.="	<div class='alert alert-success'>";
	$tableHTML.="<table class='table'>";
	$tableHTML.="<tr>";
		$tableHTML.="<td>ปีประเมิน</td><td class='textR'>	<div> <b>".$rs['appraisal_period_year']."</b></div></td>";
		$tableHTML.="</tr>";
		$tableHTML.="<tr>";
		$tableHTML.="<td>ช่วงประเมิน</td><td class='textR'>	<div> <b>".$rs['appraisal_period_desc']."</b></div></td>";
		//$tableHTML.="	<td>".$rs['appraisal_period_start']."</td>";
		//$tableHTML.="	<td>".$rs['appraisal_period_end']."</td>";
		//$tableHTML.="	<td style='text-align:right;'>".$rs['appraisal_period_target_percentage']."%</td>";
		$tableHTML.="</tr>";
		$tableHTML.="</table>";
		$tableHTML.="
						<div style='text-align: center;' class='row1'>
								<button type='button' id='idEdit-".$rs['appraisal_period_id']."' class='actionEdit btn btn-primary '><i class='glyphicon glyphicon-pencil'></i></button>
								<button type='button' id='idDel-".$rs['appraisal_period_id']."' class='  actionDel btn btn-danger '><i class='glyphicon glyphicon-trash'></i></button>
						</div>
		";
	$tableHTML.="</div>";
	$tableHTML.="</div>";


	
	$i++;
	}
	
	echo $tableHTML;
	$conn->close();
	//mysql_close($conn);
}
if($_POST['action']=="del"){
	$id=$_POST['id'];
	
	$strSQL="DELETE FROM appraisal_period WHERE appraisal_period_id=$id";
	//$result=mysql_query($strSQL);
	$result=$conn->query($strSQL);
	if($result){
		echo'["success"]';
	}else{
		echo'["error"]';
	}
	//mysql_close($conn);
	$conn->close();
	
}
if($_POST['action']=="edit"){
	$id=$_POST['id'];

	$strSQL="SELECT * FROM appraisal_period WHERE appraisal_period_id=$id";
	//$result=mysql_query($strSQL);
	$result=$conn->query($strSQL);
	if($result){
		//$rs=mysql_fetch_array($result);
		$rs=$result->fetch_assoc();
		
		
		 echo "[{\"appraisal_period_id\":\"$rs[appraisal_period_id]\",\"appraisal_period_year\":\"$rs[appraisal_period_year]\",
		 		\"appraisal_period_desc\":\"$rs[appraisal_period_desc]\",\"appraisal_period_start\":\"$rs[appraisal_period_start]\",
		 \"appraisal_period_end\":\"$rs[appraisal_period_end]\", \"appraisal_period_target_percentage\":\"$rs[appraisal_period_target_percentage]\"}]";
		 
	}else{
		echo'["error"]';
	}
	$conn->close();
	//mysql_close($conn);
}
if($_POST['action']=="editAction"){


	$strSQL="UPDATE appraisal_period SET appraisal_period_year='$appraisalPeriodYear',
	appraisal_period_desc='$appraisalPeriodDesc',
	appraisal_period_start='$appraisalPeriodStart',
	appraisal_period_end='$appraisalPeriodEnd',
	appraisal_period_target_percentage='$appraisal_period_target_percentage'
	 WHERE appraisal_period_id='$appraisalPeriodId'";
	
	//$result=mysql_query($strSQL);
	$result=$conn->query($strSQL);
	if($result){
		echo'["editSuccess"]';
	}else{
		echo'["error"]'.$conn->error;
	}

	//mysql_close($conn);
	$conn->close();
}

}else{
	echo'{"status":"400","error":"not token."}';
}


