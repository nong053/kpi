<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include("../config.inc.php");


$action=$_POST['action'];
$action_del=$_GET['action'];



if($action_del=="del"){
$jobcat_id=$_GET['jobcat_id'];
/*echo"jobcat_id$jobcat_id";*/
$strSQL="delete from jobcat where jobcat_id='$jobcat_id'";
$result=mysql_query($strSQL);
if(!$result){
 	echo"error".mysql_error();
	}
}

if($action=="add"){

$jobcat_position=$_POST['jobcat_position'];
$jobcat_title=$_POST['jobcat_title'];
$jobcat_detail=$_POST['jobcat_detail'];
$admin_id=$_POST['admin_id'];

$strSQL="insert into jobcat(jobcat_position,jobcat_title,jobcat_detail,admin_id)values('$jobcat_position','$jobcat_title','$jobcat_detail','$admin_id')";

$result=mysql_query($strSQL);
if(!$result){
	echo"error".mysql_error();
	}else{
	return true;
	}
}	
if($action=="edit"){
echo"edit";
$jobcat_id=$_POST['jobcat_id'];
$jobcat_position=$_POST['jobcat_position'];
$jobcat_title=$_POST['jobcat_title'];
$jobcat_detail=$_POST['jobcat_detail'];

//echo"cat_webdir_id$cat_webdir_id";

$strSQL="update jobcat set jobcat_position='$jobcat_position',jobcat_title='$jobcat_title',jobcat_detail='$jobcat_detail' where jobcat_id='$jobcat_id'";
$result=mysql_query($strSQL);
if(!$result){echo"error".mysql_error();}
}

?>
