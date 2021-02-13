 <? @session_start(); ob_start();
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
	$strSQL="SELECT * FROM baseline where kpi_id=$paramKpiId 
	order by baseline_score";
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='Tablebaseline' class='grid table-striped'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:5%' />";
			$tableHTML.="<col style='width:10%' />";
			$tableHTML.="<col style='width:10%'/>";
			$tableHTML.="<col style='width:10%'/>";
			$tableHTML.="<col style='width:50%'/>";
			/*$tableHTML.="<col />";*/
			
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th  style='text-align:right;' data-field=\"column1\"><b> ".$_SESSION['baseline_l_tbl_id']."</b></th>";
			$tableHTML.="<th  style='text-align:right;' data-field=\"column2\"><b> ".$_SESSION['baseline_l_tbl_kpi_begin']."</b></th>";
			$tableHTML.="<th  style='text-align:right;' data-field=\"column3\"><b> ".$_SESSION['baseline_l_tbl_kpi_end']."</b></th>";
			$tableHTML.="<th  style='text-align:right;' data-field=\"column4\"><b> ".$_SESSION['baseline_l_tbl_kpi_score']."</b></th>";
			$tableHTML.="<th data-field=\"column5\"><b> ".$_SESSION['baseline_l_tbl_kpi_suggestion']."</b></th>";
			if($paramkpiTypeScore==1){
			$tableHTML.="<th data-field=\"column6\" style='text-align:right;'><b>".$_SESSION['baseline_l_tbl_manage']."</b></th>";
			}
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";

	$colorThreshold = array("","#DD0000", "#FFFF99", "#FFCC66", "#99FF00", "#339933", "#336666");
	$colorThresholdTrueFalse = array("","#DD0000", "#336666");
	
	
	while($rs=mysql_fetch_array($result)){
		

	$tableHTML.="<tbody class=\"contentkpi\">";
	$tableHTML.="<tr>";
	$tableHTML.="	<td><div  style='text-align:right;'>".$i."</div></td>";
	$tableHTML.="	<td><div  style='text-align:right;'>".$rs['baseline_begin']."</div></td>";
	$tableHTML.="	<td><div  style='text-align:right;'>".$rs['baseline_end']."</div></td>";
	$tableHTML.="	<td><div  style='text-align:right;'>".$rs['baseline_score']."</div></td>";
	
	if($paramkpiTypeScore!=3){
		
		$tableHTML.="	<td><div style=\"width:20px; float:left; height:20px; background:".$colorThreshold[$i]."\"></div> &nbsp;".$rs['suggestion']."</td>";
		
	}else if($paramkpiTypeScore==3){
		$tableHTML.="	<td><div style=\"width:20px; float:left; height:20px; background:".$colorThresholdTrueFalse[$i]."\"></div> &nbsp;".$rs['suggestion']."</td>";
	}

	if($paramkpiTypeScore==1){
	$tableHTML.="
	<td>
	<div style='text-align: right;'>
			<button type='button' id='idEdit-".$rs['baseline_id']."' class='actionEdit btn btn-primary '><i class='glyphicon glyphicon-pencil'></i></button>
			<!-- <button type='button' id='idDel-".$rs['baseline_id']."' class=' actionDel btn btn-danger '><i class='glyphicon glyphicon-trash'></i></button> -->
			
	</div>				
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
if($_POST['action']=="del"){
	$id=$_POST['id'];

	$strSQL="DELETE FROM baseline WHERE baseline_id=$id";
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
	
	$strSQL="SELECT * FROM baseline WHERE baseline_id=$id";
	$result=mysql_query($strSQL);
	if($result){
		$rs=mysql_fetch_array($result);
		
		//echo "[{\"abc\":$rs[kpi_id],\"def\":\"22\"}]";
		
		 echo "[{\"baseline_id\":\"$rs[baseline_id]\",\"baseline_begin\":\"$rs[baseline_begin]\",
		 		\"baseline_end\":\"$rs[baseline_end]\",\"baseline_score\":\"$rs[baseline_score]\",\"suggestion\":\"$rs[suggestion]\"}]";
		 
		
	}else{
		echo'["error"]';
	}
	
	mysql_close($conn);
}
if($_POST['action']=="editAction"){


	$strSQL="UPDATE baseline SET baseline_begin='$baselineBegin',baseline_end='$baselineEnd',baseline_score='$baselinetargetScore',
	suggestion='$suggestion'
	WHERE baseline_id='$baselineId'";
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


