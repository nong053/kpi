<?php session_start(); ob_start();?>
<?php
include './../config.inc.php';


// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){

$departmentCode =$_POST['departmentCode'];	
$departmentName =$_POST['departmentName'];
$departmentDetail = $_POST['departmentDetail'];
$departmentId = $_POST['departmentId'];
$admin_id=$_SESSION['admin_id'];



//CheckUsing in employee Start
if($_POST['action']=="checkUsedData"){

	$sqlSQL="
		select count(*) as countDep
		from employee 
		where department_id='$departmentId'
	";

	$result=$conn->query($sqlSQL);
	$rs=$result->fetch_assoc();
	echo "[\"$rs[countDep]\"]";
	$conn->close();
}
//CheckUsing in employee End

if($_POST['action']=="add"){
	$strSQL="INSERT INTO department(department_code,department_name,department_detail,admin_id)
	VALUES('$departmentCode','$departmentName','$departmentDetail','$admin_id')";
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
	$strSQL="SELECT * FROM department where  admin_id='$admin_id' order by department_id";
	$result=$conn->query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='Tabledepartment' class='grid table-striped' style='width:100%'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:5%' />";
			//$tableHTML.="<col style='width:10%' />";
			$tableHTML.="<col  style='width:35%'/>";
			$tableHTML.="<col style='width:35%'/>";
	
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th style='text-align:center;' data-field=\"column1\"><b>".$_SESSION['department_l_tbl_id']."</b></th>";
			//$tableHTML.="<th data-field=\"column2\"><b>".$_SESSION['department_l_tbl_department_code']."</b></th>";
			$tableHTML.="<th data-field=\"column3\"><b>".$_SESSION['department_l_tbl_department_name']."</b></th>";
			$tableHTML.="<th data-field=\"column4\"><b>".$_SESSION['department_l_tbl_department_detail']."</b></th>";
			$tableHTML.="<th data-field=\"column5\" style='text-align:center;'><b>".$_SESSION['department_l_tbl_manage']."</b></th>";
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	
	while($rs=$result->fetch_assoc()){
		
	
	$tableHTML.="<tbody class=\"contentdepartment\">";
	$tableHTML.="<tr>";
	$tableHTML.="	<td><div style='text-align:center;'>".$i."</div></td>";
	//$tableHTML.="	<td>".$rs['department_code']."</td>";
	$tableHTML.="	<td>".$rs['department_name']."</td>";
	$tableHTML.="	<td>".$rs['department_detail']."</td>";

	$tableHTML.="	<td>

				<div style='text-align: center;'>
					<button type='button' id='idEdit-".$rs['department_id']."' class='actionEdit btn btn-primary '><i class='glyphicon glyphicon-pencil'></i></button>
					<button type='button' id='idDel-".$rs['department_id']."' class=' actionDel btn btn-danger '><i class='glyphicon glyphicon-trash'></i></button>
				</div>
			</td>";
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
	
	$strSQL="DELETE FROM department WHERE department_id=$id";
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

	$strSQL="SELECT * FROM department WHERE department_id=$id";
	$result=$conn->query($strSQL);
	if($result){
		$rs=$result->fetch_assoc();
		
		//echo "[{\"abc\":$rs[department_id],\"def\":\"22\"}]";
		
		 echo "[{\"department_id\":\"$rs[department_id]\",\"department_code\":\"$rs[department_code]\",\"department_name\":\"$rs[department_name]\",
		 		\"department_detail\":\"$rs[department_detail]\"}]";
		
	}else{
		echo'["error"]';
	}
	
	$conn->close();
}
if($_POST['action']=="editAction"){
	$id=$_POST['departmentId'];
	$departmentCode=$_POST['departmentCode'];
	$departmentName=$_POST['departmentName'];
	$departmentDetail=$_POST['departmentDetail'];


	
	
	
	$strSQL="UPDATE department SET department_code='$departmentCode',department_name='$departmentName',department_detail='$departmentDetail' WHERE department_id='$id'";
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


