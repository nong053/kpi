<?php
include 'config.php';

$baselineBegin =$_POST['baselineBegin'];
$baselineEnd = $_POST['baselineEnd'];
$baselinetargetScore = $_POST['baselinetargetScore'];
$baselineId = $_POST['baselineId'];
$paramKpiId = $_POST['paramKpiId'];
$suggestion = $_POST['suggestion'];





if($_POST['action']=="add"){
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
	$strSQL="SELECT * FROM baseline where kpi_id=$paramKpiId order by baseline_begin,kpi_id";
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
			$tableHTML.="<th><b> ID</b></th>";
			$tableHTML.="<th><b> Begin</b></th>";
			$tableHTML.="<th><b> End</b></th>";
			$tableHTML.="<th><b>Score</b></th>";
			$tableHTML.="<th><b> Suggestion</b></th>";
			$tableHTML.="<th><b>Manage</b></th>";
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	
	while($rs=mysql_fetch_array($result)){
		

	$tableHTML.="<tbody class=\"contentkpi\">";
	$tableHTML.="<tr>";
	$tableHTML.="	<td>".$i."</td>";
	$tableHTML.="	<td>".$rs['baseline_begin']."</td>";
	$tableHTML.="	<td>".$rs['baseline_end']."</td>";
	$tableHTML.="	<td>".$rs['baseline_score']."</td>";
	$tableHTML.="	<td>".$rs['suggestion']."</td>";


	$tableHTML.="	<td>
			<button type='button' id='idEdit-".$rs['baseline_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>
			<button type='button' id='idDel-".$rs['baseline_id']."' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>
			
					
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


