<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include("../config.inc.php");

$action=$_POST['action'];
$action_del=$_GET['action'];
$admin_id=$_GET['admin_id'];

if($action_del=="del"){
$seo_id=$_GET['seo_id'];
/*echo"jobcat_id$jobcat_id";*/
$strSQL="delete from seo where seo_id='$seo_id'";
$result=mysql_query($strSQL);
if(!$result){
 	echo"error".mysql_error();
	}
}

if($action=="add"){

$seo_tag1=$_POST['seo_tag1'];
$seo_tag2=$_POST['seo_tag2'];
$seo_tag3=$_POST['seo_tag3'];
$seo_keyword=$_POST['seo_keyword'];
$seo_position=$_POST['seo_position'];
$admin_id=$_POST['admin_id'];
$strSQL="insert into seo(seo_tag1,seo_tag2,seo_tag3,seo_keyword,seo_position,admin_id)values('$seo_tag1','$seo_tag2','$seo_tag3','$seo_keyword','$seo_position','$admin_id')";

$result=mysql_query($strSQL);
if(!$result){
	echo"error".mysql_error();
	}else{
	return true;
	}
}	
if($action=="edit"){
echo"edit";
$seo_id=$_POST['seo_id'];
$seo_tag1=$_POST['seo_tag1'];
$seo_tag2=$_POST['seo_tag2'];
$seo_tag3=$_POST['seo_tag3'];
$seo_keyword=$_POST['seo_keyword'];
$seo_position=$_POST['seo_position'];

//echo"cat_webdir_id$cat_webdir_id";

$strSQL="update seo set seo_tag1='$seo_tag1',seo_tag2='$seo_tag2',seo_tag3='$seo_tag3',seo_keyword='$seo_keyword',seo_position='$seo_position' where seo_id='$seo_id'";
$result=mysql_query($strSQL);
if(!$result){echo"error".mysql_error();}
}
?>
