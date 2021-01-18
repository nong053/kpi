<? session_start(); ob_start();?>
<?php 
$admin_id=$_SESSION['admin_id'];
$paramTable= $_POST['paramTable'];
include '../../Model/config.php';


if($_POST['action']=="del"){
	//$id=$_POST['id'];

	$strSQL="DELETE FROM $paramTable WHERE admin_id=$admin_id";
	//echo $strSQL;
	$result=mysql_query($strSQL);
	if(!$result){
		
		echo mysql_error();
	}else{
		echo'["success"]';
	}
	mysql_close($conn);

}

?>