 <?php @session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
?>
<?php
include './../config.inc.php';


// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){
	

$baselineBegin =$_POST['baselineBegin'];
$baselineEnd = $_POST['baselineEnd'];
$baselinetargetScore = $_POST['baselinetargetScore'];
$baselineId = $_POST['baselineId'];
$paramKpiId = $_POST['paramKpiId'];
$paramkpiTypeScore = $_POST['paramkpiTypeScore'];
$paramKpiBetterFlag = $_POST['paramKpiBetterFlag'];



$suggestion = $_POST['suggestion'];







if($_POST['action']=="add"){
	/*
	if($paramkpiTypeScore==1){

	}else if($paramkpiTypeScore==2){

	}else if($paramkpiTypeScore==3){

	}
	*/

	$strSQL="INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
	VALUES('$baselineBegin','$baselineEnd','$baselinetargetScore ','$paramKpiId','$suggestion')";

	$rs=$conn->query($strSQL);
	if($rs){
		echo'["success"]';
	}else{
		echo'["error"]';
	}
	$conn->close();
}



if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="
	SELECT * FROM baseline b INNER JOIN kpi k on b.kpi_id=k.kpi_id
	
	where b.kpi_id=$paramKpiId 
	order by b.baseline_score";
	$result=$conn->query($strSQL);
	$$tableHTML="";
	$i=1;
/*
	$tableHTML.="<table id='Tablebaseline' class='grid table-striped table'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:5%' />";
			$tableHTML.="<col style='width:10%' />";
			$tableHTML.="<col style='width:10%'/>";
			$tableHTML.="<col style='width:10%'/>";
			$tableHTML.="<col style='width:50%'/>";
			
			
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th  style='text-align:center;' data-field=\"column1\"><b> ".$_SESSION['baseline_l_tbl_id']."</b></th>";
			$tableHTML.="<th  style='text-align:right;' data-field=\"column2\"><b> ".$_SESSION['baseline_l_tbl_kpi_begin']."</b></th>";
			$tableHTML.="<th  style='text-align:right;' data-field=\"column3\"><b> ".$_SESSION['baseline_l_tbl_kpi_end']."</b></th>";
			$tableHTML.="<th  style='text-align:right;' data-field=\"column4\"><b> ".$_SESSION['baseline_l_tbl_kpi_score']."</b></th>";
			$tableHTML.="<th data-field=\"column5\"><b> ".$_SESSION['baseline_l_tbl_kpi_suggestion']."</b></th>";
			if($paramkpiTypeScore==1){
			$tableHTML.="<th data-field=\"column6\" style='text-align:center;'><b>".$_SESSION['baseline_l_tbl_manage']."</b></th>";
			}
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
*/
	$colorThreshold = array("","#DD0000", "#FFFF99", "#FFCC66", "#99FF00", "#339933", "#336666");
	$colorThresholdTrueFalse = array("","#DD0000", "#336666");
	
	
	while($rs=$result->fetch_assoc()){
		

	$tableHTML.="<div class='col-md-4'>";
		$tableHTML.="<div class='alert alert-success'>";
		//$tableHTML.="	<div  style='text-align:center;'>".$i."</div>";
		if($paramkpiTypeScore==1){
		$tableHTML.="	<div  style='text-align:left;'>เริ่ม <b>".$rs['baseline_begin']." ".$rs['kpi_unit']."</b></div>";
		$tableHTML.="	<div  style='text-align:left;'>ถึง <b>".$rs['baseline_end']." ".$rs['kpi_unit']."</b></div>";
		}
		$tableHTML.="	<div  style='text-align:left;'>แปลงเป็นคะแนนเท่ากับ <b>".$rs['baseline_score']." คะแนน</b></div>";
		
		//$paramkpiTypeScore==1 กำหนดเอง
		//$paramkpiTypeScore==2 1-5
		//$paramkpiTypeScore==3 ผ่าน/ไม่ผ่าน
		if($paramkpiTypeScore==1 || $paramkpiTypeScore==2){
			
			$tableHTML.="	<div>เกณฑ์การประเมิน <b>".$rs['suggestion']."</b></div>";
			$tableHTML.="   <div style=\"float:left;margin-right:5px;\">สีพื้นหลัง</div> <div style=\"width:20px; float:left; height:20px; background:".$colorThreshold[$i]."\"></div>";
			$tableHTML.="<br style='clear:both'>";
		}else if($paramkpiTypeScore==3){//ผ่าน ไม่ผ่าน
			$tableHTML.="	<div>เกณฑ์การประเมิน  <b>".$rs['suggestion']."</b></div>";
			$tableHTML.="	<div style=\"float:left; margin-right:5px;\">สีพื้นหลัง</div> <div style=\"width:20px; float:left; height:20px; background:".$colorThresholdTrueFalse[$i]."\"></div>";
			$tableHTML.="<br style='clear:both'>";
		}

		if($paramkpiTypeScore==1 ){
		$tableHTML.="
		<div>
			<div style='text-align: right;'>
					<button type='button' id='idEdit-".$rs['baseline_id']."' class='actionEdit btn btn-primary '><i class='glyphicon glyphicon-pencil'></i></button>
			</div>				
		</div>";
		}
		
		$tableHTML.="</div>";
	$tableHTML.="</div>";
	
	$i++;
	}
	// $tableHTML.="</tbody>";
	// $tableHTML.="</table>";
	echo $tableHTML;
	$conn->close();
}
if($_POST['action']=="del"){
	$id=$_POST['id'];

	$strSQL="DELETE FROM baseline WHERE baseline_id=$id";
	$result=$conn->query($strSQL);
	if($result){
		echo'["success"]';
	}else{
		echo'["error"]';
	}
	$conn->close();
	
}
if($_POST['action']=="edit"){
	$id=$_POST['id'];
	
	$strSQL="SELECT * FROM baseline WHERE baseline_id=$id";
	$result=$conn->query($strSQL);
	if($result){
		$rs=$result->fetch_assoc();
		
		//echo "[{\"abc\":$rs[kpi_id],\"def\":\"22\"}]";
		
		 echo "[{\"baseline_id\":\"$rs[baseline_id]\",\"baseline_begin\":\"$rs[baseline_begin]\",
		 		\"baseline_end\":\"$rs[baseline_end]\",\"baseline_score\":\"$rs[baseline_score]\",\"suggestion\":\"$rs[suggestion]\"}]";
		 
		
	}else{
		echo'["error"]';
	}
	
	$conn->close();
}
if($_POST['action']=="editAction"){


	$strSQL="UPDATE baseline SET baseline_begin='$baselineBegin',baseline_end='$baselineEnd',baseline_score='$baselinetargetScore',
	suggestion='$suggestion'
	WHERE baseline_id='$baselineId'";
	$result=$conn->query($strSQL);
	if($result){
		echo'["editSuccess"]';
	}else{
		echo'["error"]'.$conn->error;;
	}

	$conn->close();
}

}else{
echo'{"status":"400","error":"not token."}';

}


