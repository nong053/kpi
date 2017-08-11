<? session_start(); ob_start();?>
<?php 
$admin_id=$_SESSION['admin_id'];
$paramTable= $_POST['paramTable'];
include '../../Model/config.php';

if($_POST['action']=="del"){
	$id=$_POST['id'];

	$strSQL="DELETE FROM ".$paramTable." WHERE admin_id='$admin_id'";
	$result=mysql_query($strSQL);
	if($result){
		echo'["success"]';
	}else{
		echo mysql_error();
	}
	mysql_close($conn);

}

?>