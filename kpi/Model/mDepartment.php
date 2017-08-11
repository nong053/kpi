<? session_start(); ob_start();?>
<?php
include 'config.php';
$departmentName =$_POST['departmentName'];
$departmentDetail = $_POST['departmentDetail'];
$departmentId = $_POST['departmentId'];
$admin_id=$_SESSION['admin_id'];



//CheckUsingKpiAssignAndKpiResult Start
if($_POST['action']=="checkUsingKpiAssignAndKpiResult"){

	$sqlSQL="
		select count(*) as countDep
		from assign_kpi 
		where department_id='$departmentId'
	";

	$result=mysql_query($sqlSQL);
	$rs=mysql_fetch_array($result);
	echo "[\"$rs[countDep]\"]";
	mysql_close($conn);
}
//CheckUsingKpiAssignAndKpiResult End

if($_POST['action']=="add"){
	$strSQL="INSERT INTO department(department_name,department_detail,admin_id)
	VALUES('$departmentName','$departmentDetail','$admin_id')";
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
	$strSQL="SELECT * FROM department where  admin_id='$admin_id' order by department_id";
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='Tabledepartment' class='grid table-striped'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:5%' />";
			$tableHTML.="<col  style='width:30%'/>";
			$tableHTML.="<col style='width:45%'/>";
	
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th><b> ID</b></th>";
			$tableHTML.="<th><b>Department Name</b></th>";
			$tableHTML.="<th><b>Department Detail</b></th>";
			$tableHTML.="<th><b>Manage</b></th>";
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	
	while($rs=mysql_fetch_array($result)){
		
	
	$tableHTML.="<tbody class=\"contentdepartment\">";
	$tableHTML.="<tr>";
	$tableHTML.="	<td>".$i."</td>";
	$tableHTML.="	<td>".$rs['department_name']."</td>";
	$tableHTML.="	<td>".$rs['department_detail']."</td>";

	$tableHTML.="	<td>
			<button type='button' id='idEdit-".$rs['department_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>
			<button type='button' id='idDel-".$rs['department_id']."' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>
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
	
	$strSQL="DELETE FROM department WHERE department_id=$id";
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

	$strSQL="SELECT * FROM department WHERE department_id=$id";
	$result=mysql_query($strSQL);
	if($result){
		$rs=mysql_fetch_array($result);
		
		//echo "[{\"abc\":$rs[department_id],\"def\":\"22\"}]";
		
		 echo "[{\"department_id\":\"$rs[department_id]\",\"department_name\":\"$rs[department_name]\",
		 		\"department_detail\":\"$rs[department_detail]\"}]";
		
	}else{
		echo'["error"]';
	}
	
	mysql_close($conn);
}
if($_POST['action']=="editAction"){
	$id=$_POST['departmentId'];
	$departmentName=$_POST['departmentName'];
	$departmentDetail=$_POST['departmentDetail'];


	
	
	
	$strSQL="UPDATE department SET department_name='$departmentName',department_detail='$departmentDetail' WHERE department_id='$id'";
	$result=mysql_query($strSQL);
	if($result){
		echo'["editSuccess"]';
	}else{
		echo'["error"]'.mysql_error();
	}

	mysql_close($conn);
}


