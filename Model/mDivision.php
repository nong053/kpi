<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){

	
$divisionName =$_POST['divisionName'];
$divisionDetail = $_POST['divisionDetail'];
$divisionId = $_POST['divisionId'];
$departmentId = $_POST['departmentId'];




if($_POST['action']=="add"){
	$strSQL="INSERT INTO division(division_name,division_detail,department_id)
	VALUES('$divisionName','$divisionDetail','$departmentId')";
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
	$strSQL="SELECT * FROM division
left   JOIN department dep
ON dep.department_id=division.department_id";
	$result=$conn->query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='Tabledivision' class='grid'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:50px' />";
			$tableHTML.="<col  />";
			$tableHTML.="<col  />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th data-field=\"column1\"><b> ID</b></th>";
			$tableHTML.="<th data-field=\"column2\"><b>Department Name</b></th>";
			$tableHTML.="<th data-field=\"column3\"><b>Division Name</b></th>";
			$tableHTML.="<th data-field=\"column4\"><b>Division Detail</b></th>";
			$tableHTML.="<th data-field=\"column5\"><b>Manage</b></th>";
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	
	while($rs=$result->fetch_assoc()){
		
	
	$tableHTML.="<tbody class=\"contentdivision\">";
	$tableHTML.="<tr>";
	$tableHTML.="	<td>".$i."</td>";
	$tableHTML.="	<td>".$rs['department_name']."</td>";
	$tableHTML.="	<td>".$rs['division_name']."</td>";
	$tableHTML.="	<td>".$rs['division_detail']."</td>";

	$tableHTML.="	<td>
			<button type='button' id='idEdit-".$rs['division_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>
			<button type='button' id='idDel-".$rs['division_id']."' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>
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
	
	$strSQL="DELETE FROM division WHERE division_id=$id";
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

	$strSQL="SELECT * FROM division WHERE division_id=$id";
	$result=$conn->query($strSQL);
	if($result){
		$rs=$result->fetch_assoc();
		
		//echo "[{\"abc\":$rs[division_id],\"def\":\"22\"}]";
		
		 echo "[{\"division_id\":\"$rs[division_id]\",\"division_name\":\"$rs[division_name]\",\"department_id\":\"$rs[department_id]\",
		 		\"division_detail\":\"$rs[division_detail]\"}]";
		
	}else{
		echo'["error"]';
	}
	
	$conn->close();
}
if($_POST['action']=="editAction"){



	
	
	
	$strSQL="UPDATE division SET division_name='$divisionName',department_id='$departmentId',division_detail='$divisionDetail' WHERE division_id='$divisionId'";
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


