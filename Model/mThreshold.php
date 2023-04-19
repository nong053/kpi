<? session_start(); ob_start();?>

<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){

	
$thresholdName =$_POST['thresholdName'];
$thresholdBegin = $_POST['thresholdBegin'];
$thresholdEnd = $_POST['thresholdEnd'];
$thresholdColor = $_POST['thresholdColor'];
$admin_id=$_SESSION['admin_id'];

if($_POST['action']=="add"){
	$strSQL="INSERT INTO threshold(threshold_name,threshold_begin,threshold_end,threshold_color,admin_id)
	VALUES('$thresholdName','$thresholdBegin','$thresholdEnd','$thresholdColor','$admin_id')";
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
	$strSQL="SELECT * FROM threshold 
	-- where admin_id='$admin_id' 
	";
	$result=$conn->query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='TableThreshold' class='grid table-striped' style='width:100%'>";
	$tableHTML.="<colgroup>";
	$tableHTML.="<col style='width:5%' />";
	$tableHTML.="<col  />";
	$tableHTML.="<col />";
	$tableHTML.="<col />";
	$tableHTML.="<col style='' />";
	
	$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
	$tableHTML.="<tr>";
	$tableHTML.="<th style='text-align:right;' data-field=\"threshold_l_tbl_id\"><b>".$_SESSION['threshold_l_tbl_id']."</b></th>";
	$tableHTML.="<th data-field=\"threshold_l_tbl_threshold_name\"><b>".$_SESSION['threshold_l_tbl_threshold_name']."</b></th>";
	$tableHTML.="<th style='text-align:right;' data-field=\"threshold_l_tbl_begin_threshold\"><b>".$_SESSION['threshold_l_tbl_begin_threshold']."</b></th>";
	$tableHTML.="<th style='text-align:right;' data-field=\"threshold_l_tbl_end_threshold\"><b>".$_SESSION['threshold_l_tbl_end_threshold']."</b></th>";
	$tableHTML.="<th data-field=\"threshold_l_tbl_threshold_color\"><b>".$_SESSION['threshold_l_tbl_threshold_color']."</b></th>";

	$tableHTML.="<th style='text-align:right;' data-field=\"threshold_l_tbl_threshold_score\"><b>".$_SESSION['threshold_l_tbl_threshold_score']."</b></th>";

	$tableHTML.="<th data-field=\"threshold_l_tbl_threshold_manage\" style='text-align:right;'><b>".$_SESSION['threshold_l_tbl_threshold_manage']."</b></th>";

	$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	$tableHTML.="<tbody class=\"contentThreshold\">";
	while($rs=$result->fetch_assoc()){
		
	
	
	$tableHTML.="<tr>";
	$tableHTML.="	<td><div style='text-align: right;'>".$i."</div></td>";
	$tableHTML.="	<td>".$rs['threshold_name']."</td>";
	$tableHTML.="	<td><div style='text-align: right;'>".$rs['threshold_begin']."%</div></td>";
	$tableHTML.="	<td> <div style='text-align: right;'>".$rs['threshold_end']."%</div></td>";
	$tableHTML.="	<td>
					<div style='width:50px;'>
					<div style='width:20px; float:left; height:20px; background:#".$rs['threshold_color']."'></div>
					<div style='width:20px; float:left; margin-left:5px;' >#".$rs['threshold_color']."</div>
					</div>
						
			</td>";
	$tableHTML.="	<td><div style='text-align: right;'>".$rs['score']."</div></td>";		
	$tableHTML.="<td>
			<div style='text-align: right;'>
				<button type='button' id='idEdit-".$rs['threshold_id']."' class='actionEdit btn btn-primary '><i class='glyphicon glyphicon-pencil'></i></button>
				<!-- <button type='button' id='idDel-".$rs['threshold_id']."' class=' actionDel btn btn-danger '><i class='glyphicon glyphicon-trash'></i></button> -->
			</div>
			</td>";
	$tableHTML.="	<td>".$rs['score']."</td>";	
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
	
	$strSQL="DELETE FROM threshold WHERE threshold_id=$id";
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

	$strSQL="SELECT * FROM threshold WHERE threshold_id=$id";
	$result=$conn->query($strSQL);
	if($result){
		$rs=$result->fetch_assoc();
		
		//echo "[{\"abc\":$rs[threshold_id],\"def\":\"22\"}]";
		
		 echo "[{\"threshold_id\":\"$rs[threshold_id]\",\"threshold_name\":\"$rs[threshold_name]\",
		 		\"threshold_begin\":\"$rs[threshold_begin]\",\"threshold_end\":\"$rs[threshold_end]\",
		 		\"threshold_color\":\"$rs[threshold_color]\"}]";
		
	}else{
		echo'["error"]';
	}
	
	$conn->close();
}
if($_POST['action']=="editAction"){
	$id=$_POST['thresholdId'];
	$thresholdName=$_POST['thresholdName'];
	$thresholdBegin=$_POST['thresholdBegin'];
	$thresholdEnd=$_POST['thresholdEnd'];
	$thresholdColor=$_POST['thresholdColor'];

	
	
	
	$strSQL="UPDATE threshold SET threshold_name='$thresholdName',threshold_begin='$thresholdBegin',
	threshold_end='$thresholdEnd',threshold_color='$thresholdColor' WHERE threshold_id='$id'";
	$result=$conn->query($strSQL);
	if($result){
		echo'["editSuccess"]';
	}else{
		echo'["error"]'.$conn->error;
	}

	$conn->close();
}


}else{
	
echo'{"status":"400","error":"not token."}';

}

