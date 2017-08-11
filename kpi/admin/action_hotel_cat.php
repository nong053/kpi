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
$hotel_cat_id=$_GET['hotel_cat_id'];
$strSQL="delete from hotel_cat where hotel_cat_id='$hotel_cat_id'";
$result=mysql_query($strSQL);
if(!$result){
 	echo"error".mysql_error();
	}
}

if($action=="add"){

$hotel_cat_name=$_POST['hotel_cat_name'];
$hotel_cat_zone=$_POST['hotel_cat_zone'];
$hotel_cat_province=$_POST['hotel_cat_province'];
$hotel_cat_map=$_POST['hotel_cat_map'];
$hotel_cat_id=$_POST['hotel_cat_id'];

$strSQL="insert into hotel_cat(hotel_cat_name,hotel_cat_id ,hotel_cat_zone,hotel_cat_province,hotel_cat_map)values('$hotel_cat_name','$hotel_cat_id','$hotel_cat_zone','$hotel_cat_province','$hotel_cat_map')";

$result=mysql_query($strSQL);
if(!$result){
	echo"error".mysql_error();
	}else{
	return true;
	}
}	
if($action=="edit"){
$hotel_cat_name=$_POST['hotel_cat_name'];
$hotel_cat_zone=$_POST['hotel_cat_zone'];
$hotel_cat_province=$_POST['hotel_cat_province'];
$hotel_cat_map=$_POST['hotel_cat_map'];
$hotel_cat_id=$_POST['hotel_cat_id'];


$strSQL="update hotel_cat set hotel_cat_name='$hotel_cat_name'hotel_cat_id='$hotel_cat_id',hotel_cat_zone='$hotel_cat_zone',hotel_cat_province='$hotel_cat_province',hotel_cat_map='$hotel_cat_map' where hotel_cat_id='$hotel_cat_id'";
$result=mysql_query($strSQL);
if(!$result){echo"error".mysql_error();}
}

?>
