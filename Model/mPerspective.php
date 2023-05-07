<?php session_start(); ob_start();?>

<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){

	
$perspectiveName =$_POST['perspectiveName'];
$perspectiveWeight =$_POST['perspectiveWeight'];
$perspective_id =$_POST['perspective_id'];


$admin_id=$_SESSION['admin_id'];

if($_POST['action']=="add"){
	$strSQL="INSERT INTO perspective(perspective_name,perspective_weight,admin_id)
	VALUES('$perspectiveName','$perspectiveWeight','$admin_id')";
	$rs=$conn->query($strSQL);
	if($rs){
		echo'["success"]';
	}else{
		echo'error '.$conn->error; ;
	}
	$conn->close();
}

if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="SELECT * FROM perspective  
 where admin_id='$admin_id' 
 order by  perspective_id
	";
	$result=$conn->query($strSQL);
	
	while($rs=$result->fetch_assoc()){
		
	
	
	$tableHTML.="<div class='col-md-4'>";
		$tableHTML.="<div class='alert alert-success'>";
		$tableHTML.="	<div style='text-align: center;'>".$i."</div>";
		$tableHTML.="	<div>มุมมองธุรกิจ <b>".$rs['perspective_name']."</b></div>";
		$tableHTML.="	<div style='text-align: left;'>น้ำหนัก <b>".$rs['perspective_weight']."%</b></div>";
				
		$tableHTML.="
						<div style='text-align: right;'>
							<button type='button' id='idEdit-".$rs['perspective_id']."' class='actionEdit btn btn-primary '><i class='glyphicon glyphicon-pencil'></i></button>
							<button type='button' id='idDel-".$rs['perspective_id']."' class=' actionDel btn btn-danger '><i class='glyphicon glyphicon-trash'></i></button>
						</div>
				";
		$tableHTML.="	<div>".$rs['score']."</div>";	
		$tableHTML.="</div>";
	$tableHTML.="</div>";

	
	
	}

	echo $tableHTML;
	$conn->close();
}
if($_POST['action']=="del"){
	$id=$_POST['id'];
	
	$strSQL="DELETE FROM perspective WHERE perspective_id=$id";
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

	$strSQL="SELECT * FROM perspective WHERE perspective_id=$id";
	$result=$conn->query($strSQL);
	if($result){
		$rs=$result->fetch_assoc();
		
		 echo "[{\"perspective_id\":\"$rs[perspective_id]\",\"perspective_name\":\"$rs[perspective_name]\",\"perspective_weight\":\"$rs[perspective_weight]\"}]";
		
	}else{
		echo'["error"]';
	}
	
	$conn->close();
}
if($_POST['action']=="editAction"){
	$id=$_POST['perspectiveId'];
    // $perspectiveName=$_POST['perspectiveName'];
    // $perspectiveWeight=$_POST['perspectiveWeight'];


	
	
	
	$strSQL="UPDATE perspective SET perspective_name='$perspectiveName',perspective_weight='$perspectiveWeight' WHERE perspective_id='$id'";
	$result=$conn->query($strSQL);
	if($result){
		echo'["editSuccess"]';
	}else{
		echo'["error"]'.$conn->error; ;
	}

	$conn->close();
}


//CheckUsing in employee Start
if($_POST['action']=="checkUsedData"){

	$sqlSQL="
		select count(*) as countPers
		from kpi 
		where perspective_id='$perspective_id'
	";

	$result=$conn->query($sqlSQL);
	$rs=$result->fetch_assoc();
	echo "[\"$rs[countPers]\"]";
	$conn->close();
}
//CheckUsing in employee End



}else{
	
echo'{"status":"400","error":"not token."}';

}

