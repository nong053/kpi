<?php session_start(); ob_start();?>

<?php
include './../config.inc.php';


// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){


$positionName =$_POST['positionName'];
$positionId = $_POST['positionId'];
$role_id = $_POST['role_id'];
$admin_id=$_SESSION['admin_id'];
//echo $admin_id;

//checkUsedData Start
if($_POST['action']=="checkUsedData"){

	$sqlSQL="
		select count(*) as countPosition
		from employee 
		where position_id='$positionId'
	";

	$result=$conn->query($sqlSQL);
	$rs=$result->fetch_assoc();
	
	echo "[\"$rs[countPosition]\"]";
	
	$conn->close();
}
//checkUsedData End


if($_POST['action']=="add"){
	
	
	
	$strSQL="INSERT INTO position_emp(position_name,admin_id,role_id)
	VALUES('$positionName','$admin_id','$role_id')";
	$rs=$conn->query($strSQL);
	if($rs){
		echo'["success"]';
	}else{
		echo $conn->error;
	}
	$conn->close();
}

if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="SELECT pe.*,r.role_name FROM position_emp pe
LEFT JOIN role r on pe.role_id=r.role_id
 where admin_id='$admin_id'";
	$result=$conn->query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='Tableposition' class='grid table-striped' style='width:100%'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:5%' />";
			$tableHTML.="<col  style='width:80%' />";
			$tableHTML.="<col  style='width:20%' />";

			
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th style='text-align:center;' data-field=\"position_l_tbl_id\"><b> ".$_SESSION['position_l_tbl_id']."</b></th>";
			$tableHTML.="<th data-field=\"position_l_tbl_position_name\"><b> ".$_SESSION['position_l_tbl_position_name']."</b></th>";
			//$tableHTML.="<th data-field=\"position_l_tbl_role_name\"><b> ".$_SESSION['position_l_tbl_role_name']." </b></th>";
			$tableHTML.="<th data-field=\"position_l_tbl_manage\" style='text-align:center;'><b> ".$_SESSION['position_l_tbl_manage']."</b></th>";
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	
	while($rs=$result->fetch_assoc()){
		
	
	$tableHTML.="<tbody class=\"contentposition\" >";
	$tableHTML.="<tr>";
	$tableHTML.="	<td><div style='text-align:center;'>".$i."</div></td>";
	$tableHTML.="	<td>".$rs['position_name']."</td>";
	//$tableHTML.="	<td>".$rs['role_name']."</td>";

	 $tableHTML.="<td>
					<div style='text-align: center;'>
							<button type='button' id='idEdit-".$rs['position_id']."' class='actionEdit btn btn-primary '><i class='glyphicon glyphicon-pencil'></i></button>
							<button type='button' id='idDel-".$rs['position_id']."' class=' actionDel btn btn-danger '><i class='glyphicon glyphicon-trash'></i></button>
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
	
	$strSQL="DELETE FROM position_emp WHERE position_id=$id";
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

	$strSQL="SELECT * FROM position_emp WHERE position_id=$id";
	$result=$conn->query($strSQL);
	if($result){
		$rs=$result->fetch_assoc();
		
		//echo "[{\"abc\":$rs[position_id],\"def\":\"22\"}]";
		
		 echo "[{\"position_id\":\"$rs[position_id]\",\"position_name\":\"$rs[position_name]\",\"role_id\":\"$rs[role_id]\"}]";
		
	}else{
		echo'["error"]';
	}
	
	$conn->close();
}
if($_POST['action']=="editAction"){
	$id=$_POST['positionId'];
	$positionName=$_POST['positionName'];
	


	
	
	
	$strSQL="UPDATE position_emp SET position_name='$positionName',role_id='$role_id' WHERE position_id='$id'";
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
?>


