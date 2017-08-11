<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include("../config.inc.php");


/*echo"cat_webdir_index$cat_webdir_index<br>";
echo"cat_webdir_tltle$cat_webdir_title<br>";
echo"cat_webdir_detail$cat_webdir_detail<br>";
*/

$action=$_POST['action'];
$action_del=$_GET['action'];



if($action_del=="del"){
$cat_webdir_id=$_GET['cat_webdir_id'];
$strSQL="delete from cat_webdir where cat_webdir_id='$cat_webdir_id'";
$result=mysql_query($strSQL);
if(!$result){
 	echo"error".mysql_error();
	}
}

if($action=="add"){

$cat_webdir_index=$_POST['cat_webdir_index'];
$cat_webdir_title=$_POST['cat_webdir_title'];
$cat_webdir_detail=$_POST['cat_webdir_detail'];

$strSQL="insert into cat_webdir(cat_webdir_index,cat_webdir_title,cat_webdir_detail)values('$cat_webdir_index','$cat_webdir_title','$cat_webdir_detail')";

$result=mysql_query($strSQL);
if(!$result){
	echo"error".mysql_error();
	}else{
	return true;
	}
}	
if($action=="edit"){
echo"edit";
$cat_webdir_index=$_POST['cat_webdir_index'];
$cat_webdir_title=$_POST['cat_webdir_title'];
$cat_webdir_detail=$_POST['cat_webdir_detail'];
$cat_webdir_id=$_POST['cat_webdir_id'];

echo"cat_webdir_id$cat_webdir_id";

$strSQL="update cat_webdir set cat_webdir_index='$cat_webdir_index',cat_webdir_title='$cat_webdir_title',cat_webdir_detail='$cat_webdir_detail' where cat_webdir_id='$cat_webdir_id'";
$result=mysql_query($strSQL);
if(!$result){echo"error".mysql_error();}
}

?>
