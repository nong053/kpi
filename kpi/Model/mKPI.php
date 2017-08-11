<? session_start(); ob_start();?>
<?php
include 'config.php';
$kpiName =$_POST['kpiName'];
$kpiDetail = $_POST['kpiDetail'];
$kpiActualManual = $_POST['kpiActualManual'];
$kpiActualQuery = $_POST['kpiActualQuery'];
$kpiTypeActual = $_POST['kpiTypeActual'];
$kpiTarget = $_POST['kpiTarget'];
$kpiId = $_POST['kpiId'];
$kpiCode = $_POST['kpiCode'];

$departmentId=$_POST['departmentId'];
$divisionId=$_POST['divisionId'];
$admin_id=$_SESSION['admin_id'];

//CheckUsingKpiAssignAndKpiResult Start
if($_POST['action']=="checkUsingKpiAssignAndKpiResult"){

	$sqlSQL="select count(*) as countKPIs
	from assign_kpi 
	where kpi_id='$kpiId'
	";

	$result=mysql_query($sqlSQL);
	$rs=mysql_fetch_array($result);
	echo "[\"$rs[countKPIs]\"]";
	mysql_close($conn);
}
//CheckUsingKpiAssignAndKpiResult End
if($_POST['action']=="add"){
	$strSQL="INSERT INTO kpi(kpi_name,kpi_detail,admin_id,kpi_code)
	VALUES('$kpiName','$kpiDetail','$admin_id','$kpiCode')";
	$rs=mysql_query($strSQL);
	if($rs){
		echo'["success"]';
	}else{
		//echo'["error"]';
		echo mysql_error();
	}
	mysql_close($conn);
}

if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="SELECT *FROM kpi  
	where kpi.admin_id='$admin_id'
			order by kpi_id ";
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='Tablekpi' class='grid table-striped'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:5%' />";
			$tableHTML.="<col  style='width:40%'/>";
			$tableHTML.="<col style='width:40%'/>";
		
			/*
			$tableHTML.="<col />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
			*/
			
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th><b> ID</b></th>";
			
			$tableHTML.="<th><b>KPIs Name</b></th>";
			$tableHTML.="<th><b>KPIs Detail</b></th>";
			/*
			$tableHTML.="<th><b>Department</b></th>";
			$tableHTML.="<th><b>Division </b></th>";
			$tableHTML.="<th><b>Actual by Query</b></th>";
			$tableHTML.="<th><b>Kpi Target</b></th>";
			*/
			$tableHTML.="<th><b>Manage</b></th>";
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	
	while($rs=mysql_fetch_array($result)){
		
		if($rs['kpi_type_actual']==1){
			$type_target="<i class='glyphicon glyphicon-ok'></i>";
		}else{
			$type_target="<i class='glyphicon glyphicon-remove'></i>";
		}
		
	
	$tableHTML.="<tbody class=\"contentkpi\">";
	$tableHTML.="<tr>";
	$tableHTML.="	<td>".$rs['kpi_code']."</td>";
	
	$tableHTML.="	<td>".$rs['kpi_name']."</td>";
	$tableHTML.="	<td>".$rs['kpi_detail']."</td>";
	/*
	$tableHTML.="	<td>".$rs['department_name']."</td>";
	$tableHTML.="	<td>".$rs['division_name']."</td>";
	$tableHTML.="	<td>".$type_target."</td>";
	$tableHTML.="	<td>".$rs['kpi_target']."</td>";
	*/
	$tableHTML.="	<td>
			<button type='button' id='idEdit-".$rs['kpi_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>
			<button type='button' id='idDel-".$rs['kpi_id']."' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>
			<button type='button' id='idKPI-".$rs['kpi_id']."' class=' actionBaseline btn btn-primary btn-xs'><i class='glyphicon glyphicon-stats'></i></button>
					
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
	
	$strSQL="DELETE FROM kpi WHERE kpi_id=$id";
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

	$strSQL="SELECT * FROM kpi WHERE kpi_id=$id";
	$result=mysql_query($strSQL);
	if($result){
		$rs=mysql_fetch_array($result);
		
		//echo "[{\"abc\":$rs[kpi_id],\"def\":\"22\"}]";
		
		 echo "[{\"kpi_id\":\"$rs[kpi_id]\",\"kpi_code\":\"$rs[kpi_code]\",\"kpi_name\":\"$rs[kpi_name]\",
		 		\"kpi_detail\":\"$rs[kpi_detail]\",\"department_id\":\"$rs[department_id]\",\"division_id\":\"$rs[division_id]\",\"kpi_actual_query\":\"$rs[kpi_actual_query]\",\"kpi_actual_manual\":\"$rs[kpi_actual_manual]\",\"kpi_type_actual\":\"$rs[kpi_type_actual]\",\"kpi_target\":\"$rs[kpi_target]\"}]";
		 
	}else{
		echo'["error"]';
	}
	
	mysql_close($conn);
}
if($_POST['action']=="editAction"){
	


	$strSQL="UPDATE kpi SET kpi_name='$kpiName',kpi_detail='$kpiDetail',
	kpi_code='$kpiCode'
	WHERE kpi_id='$kpiId'";
	$result=mysql_query($strSQL);
	if($result){
		echo'["editSuccess"]';
	}else{
		echo'["error"]'.mysql_error();
	}

	mysql_close($conn);
}


