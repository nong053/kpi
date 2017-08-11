<? session_start(); ob_start();?>

<?php
include 'config.php';
$thresholdName =$_POST['thresholdName'];
$thresholdBegin = $_POST['thresholdBegin'];
$thresholdEnd = $_POST['thresholdEnd'];
$thresholdColor = $_POST['thresholdColor'];
$admin_id=$_SESSION['admin_id'];

if($_POST['action']=="add"){
	$strSQL="INSERT INTO threshold(threshold_name,threshold_begin,threshold_end,threshold_color,admin_id)
	VALUES('$thresholdName','$thresholdBegin','$thresholdEnd','$thresholdColor','$admin_id')";
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
	$strSQL="SELECT * FROM threshold where admin_id='$admin_id' ";
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='TableThreshold' class='grid table-striped'>";
	$tableHTML.="<colgroup>";
	$tableHTML.="<col style='width:5%' />";
	$tableHTML.="<col  />";
	$tableHTML.="<col />";
	$tableHTML.="<col />";
	$tableHTML.="<col style='' />";
	
	$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
	$tableHTML.="<tr>";
	$tableHTML.="<th><b> ID</b></th>";
	$tableHTML.="<th><b>Threshold Name</b></th>";
	$tableHTML.="<th><b>Begin Threshold</b></th>";
	$tableHTML.="<th><b>End Threshold</b></th>";
	$tableHTML.="<th><b>Color</b></th>";
	$tableHTML.="<th><b>Manage</b></th>";
	$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	
	while($rs=mysql_fetch_array($result)){
		
	
	$tableHTML.="<tbody class=\"contentThreshold\">";
	$tableHTML.="<tr>";
	$tableHTML.="	<td>".$i."</td>";
	$tableHTML.="	<td>".$rs['threshold_name']."</td>";
	$tableHTML.="	<td>".$rs['threshold_begin']."</td>";
	$tableHTML.="	<td>".$rs['threshold_end']."</td>";
	$tableHTML.="	<td>
					<div style='width:50px;'>
					<div style='width:20px; float:left; height:20px; background:#".$rs['threshold_color']."'></div>
					<div style='width:20px; float:left; margin-left:5px;' >#".$rs['threshold_color']."</div>
					</div>
						
			</td>";
	$tableHTML.="	<td>
			<button type='button' id='idEdit-".$rs['threshold_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>
			<button type='button' id='idDel-".$rs['threshold_id']."' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>
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
	
	$strSQL="DELETE FROM threshold WHERE threshold_id=$id";
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

	$strSQL="SELECT * FROM threshold WHERE threshold_id=$id";
	$result=mysql_query($strSQL);
	if($result){
		$rs=mysql_fetch_array($result);
		
		//echo "[{\"abc\":$rs[threshold_id],\"def\":\"22\"}]";
		
		 echo "[{\"threshold_id\":\"$rs[threshold_id]\",\"threshold_name\":\"$rs[threshold_name]\",
		 		\"threshold_begin\":\"$rs[threshold_begin]\",\"threshold_end\":\"$rs[threshold_end]\",
		 		\"threshold_color\":\"$rs[threshold_color]\"}]";
		
	}else{
		echo'["error"]';
	}
	
	mysql_close($conn);
}
if($_POST['action']=="editAction"){
	$id=$_POST['thresholdId'];
	$thresholdName=$_POST['thresholdName'];
	$thresholdBegin=$_POST['thresholdBegin'];
	$thresholdEnd=$_POST['thresholdEnd'];
	$thresholdColor=$_POST['thresholdColor'];

	
	
	
	$strSQL="UPDATE threshold SET threshold_name='$thresholdName',threshold_begin='$thresholdBegin',
	threshold_end='$thresholdEnd',threshold_color='$thresholdColor' WHERE threshold_id='$id'";
	$result=mysql_query($strSQL);
	if($result){
		echo'["editSuccess"]';
	}else{
		echo'["error"]'.mysql_error();
	}

	mysql_close($conn);
}


