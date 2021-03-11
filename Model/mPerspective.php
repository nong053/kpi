<? session_start(); ob_start();?>

<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){

	
$perspectiveName =$_POST['perspectiveName'];
$perspectiveWeight =$_POST['perspectiveWeight'];

$admin_id=$_SESSION['admin_id'];

if($_POST['action']=="add"){
	$strSQL="INSERT INTO perspective(perspective_name,perspective_weight,admin_id)
	VALUES('$perspectiveName','$perspectiveWeight','$admin_id')";
	$rs=mysql_query($strSQL);
	if($rs){
		echo'["success"]';
	}else{
		echo'error '.mysql_error();
	}
	mysql_close($conn);
}

if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="SELECT * FROM perspective  
 where admin_id='$admin_id' 
 order by  perspective_id
	";
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='TablePerspective' class='grid table-striped' style='width:100%'>";
	$tableHTML.="<colgroup>";
	$tableHTML.="<col style='width:5%' />";
    $tableHTML.="<col  />";
    $tableHTML.="<col  />";
	
	$tableHTML.="<col style='' />";
	
	$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
	$tableHTML.="<tr>";
	$tableHTML.="<th style='text-align:center;' data-field=\"perspective_l_tbl_id\"><b>".$_SESSION['perspective_l_tbl_id']."</b></th>";
    $tableHTML.="<th data-field=\"perspective_l_tbl_perspective_name\"><b>".$_SESSION['perspective_l_tbl_perspective_name']."</b></th>";
    $tableHTML.="<th style='text-align:right;' data-field=\"perspective_l_tbl_perspective_weight\"><b>".$_SESSION['perspective_l_tbl_perspective_weight']."</b></th>";

	$tableHTML.="<th data-field=\"perspective_l_tbl_perspective_manage\" style='text-align:right;'><b>".$_SESSION['perspective_l_tbl_perspective_manage']."</b></th>";

	$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	$tableHTML.="<tbody class=\"contentPerspective\">";
	while($rs=mysql_fetch_array($result)){
		
	
	
	$tableHTML.="<tr>";
	$tableHTML.="	<td><div style='text-align: center;'>".$i."</div></td>";
    $tableHTML.="	<td>".$rs['perspective_name']."</td>";
    $tableHTML.="	<td><div style='text-align: right;'>".$rs['perspective_weight']."%</div></td>";
    		
	$tableHTML.="<td>
			<div style='text-align: right;'>
				<button type='button' id='idEdit-".$rs['perspective_id']."' class='actionEdit btn btn-primary '><i class='glyphicon glyphicon-pencil'></i></button>
			    <button type='button' id='idDel-".$rs['perspective_id']."' class=' actionDel btn btn-danger '><i class='glyphicon glyphicon-trash'></i></button>
			</div>
			</td>";
	$tableHTML.="	<td>".$rs['score']."</td>";	
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
	
	$strSQL="DELETE FROM perspective WHERE perspective_id=$id";
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

	$strSQL="SELECT * FROM perspective WHERE perspective_id=$id";
	$result=mysql_query($strSQL);
	if($result){
		$rs=mysql_fetch_array($result);
		
		 echo "[{\"perspective_id\":\"$rs[perspective_id]\",\"perspective_name\":\"$rs[perspective_name]\",\"perspective_weight\":\"$rs[perspective_weight]\"}]";
		
	}else{
		echo'["error"]';
	}
	
	mysql_close($conn);
}
if($_POST['action']=="editAction"){
	$id=$_POST['perspectiveId'];
    // $perspectiveName=$_POST['perspectiveName'];
    // $perspectiveWeight=$_POST['perspectiveWeight'];


	
	
	
	$strSQL="UPDATE perspective SET perspective_name='$perspectiveName',perspective_weight='$perspectiveWeight' WHERE perspective_id='$id'";
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

