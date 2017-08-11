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
$webdir_id=$_GET['webdir_id'];
$strSQL="delete from webdir where webdir_id='$webdir_id'";
$result=mysql_query($strSQL);
if(!$result){
 	echo"error".mysql_error();
	}
}

if($action=="add"){

$webdir_cat=$_POST['webdir_cat'];
$webdir_url=$_POST['webdir_url'];
$webdir_homepage=$_POST['webdir_homepage'];
$webdir_detail=$_POST['webdir_detail'];
$webdir_tag1 =$_POST['webdir_tag1'];
$webdir_tag2 =$_POST['webdir_tag2'];
$webdir_tag3 =$_POST['webdir_tag3'];
$webdir_keyword =$_POST['webdir_keyword'];
$webdir_email =$_POST['webdir_email'];
$webdir_status =$_POST['webdir_status'];

$strSQL="insert into webdir(webdir_url,webdir_homepage,webdir_detail,webdir_tag1,webdir_tag2,webdir_tag3,webdir_keyword,webdir_mail,webdir_status,webdir_cat)values('$webdir_url','$webdir_homepage','$webdir_detail','$webdir_tag1','$webdir_tag2','$webdir_tag3','$webdir_keyword','$webdir_email','$webdir_status','$webdir_cat')";

$result=mysql_query($strSQL);
if(!$result){
	echo"error".mysql_error();
	}else{
	return true;
	}
}	
if($action=="edit"){
//echo"edit";
$webdir_cat=$_POST['webdir_cat'];
$webdir_url=$_POST['webdir_url'];
$webdir_homepage=$_POST['webdir_homepage'];
$webdir_detail=$_POST['webdir_detail'];
$webdir_tag1 =$_POST['webdir_tag1'];
$webdir_tag2 =$_POST['webdir_tag2'];
$webdir_tag3 =$_POST['webdir_tag3'];
$webdir_keyword =$_POST['webdir_keyword'];
$webdir_mail =$_POST['webdir_mail'];
$webdir_status =$_POST['webdir_status'];
$webdir_id=$_POST['webdir_id'];

//echo"cat_webdir_id$cat_webdir_id";

$strSQL="update webdir set webdir_url='$webdir_url',webdir_homepage='$webdir_homepage',webdir_detail='$webdir_detail',webdir_tag1='$webdir_tag1',webdir_tag2='$webdir_tag2',webdir_tag3='$webdir_tag3',webdir_keyword='$webdir_keyword',webdir_mail='$webdir_mail',webdir_status='$webdir_status' ,webdir_cat='$webdir_cat' where webdir_id='$webdir_id'";
$result=mysql_query($strSQL);
if(!$result){echo"error".mysql_error();}
}

?>
