<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include("../config.inc.php");


/*echo"webcat_register_index$webcat_register_index<br>";
echo"webcat_register_tltle$cat_webre_package<br>";
echo"cat_webre_detail$cat_webre_detail<br>";
*/

$action=$_POST['action'];
$action_del=$_GET['action'];



if($action_del=="del"){
$cat_webre_id=$_GET['cat_webre_id'];
$strSQL="delete from webcat_register where cat_webre_id='$cat_webre_id'";
$result=mysql_query($strSQL);
if(!$result){
 	echo"error".mysql_error();
	}
}

if($action=="add"){

$webcat_register_index=$_POST['webcat_register_index'];
$cat_webre_package=$_POST['cat_webre_package'];
$cat_webre_detail=$_POST['cat_webre_detail'];

$strSQL="insert into webcat_register(cat_webre_package,cat_webre_detail)values('$cat_webre_package','$cat_webre_detail')";

$result=mysql_query($strSQL);
if(!$result){
	echo"error".mysql_error();
	}else{
	return true;
	}
}	
if($action=="edit"){
/*echo"edit";*/

$cat_webre_package=$_POST['cat_webre_package'];
$cat_webre_detail=$_POST['cat_webre_detail'];
$cat_webre_id=$_POST['cat_webre_id'];

/*echo"cat_webre_id$cat_webre_id";*/

$strSQL="update webcat_register set cat_webre_package='$cat_webre_package',cat_webre_detail='$cat_webre_detail' where cat_webre_id='$cat_webre_id'";
$result=mysql_query($strSQL);
if(!$result){echo"error".mysql_error();}
}

?>
