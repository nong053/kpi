<?php session_start();?>

<?
include("../config.inc.php");
$action_menu=$_POST['action_menu'];
$action_menu_del=$_GET['action_menu_del'];





echo"member_user_id=$member_user_id";

if($action_menu_del=="del"){
$menu_del_id=$_GET['menu_del_id'];
$member_user_id=$_SESSION['member_user_id'];
$strSQL="delete from main_menu where main_menu_id='$menu_del_id'";
$result=mysql_query($strSQL);
if(!$result){
 	echo"error".mysql_error();
	}
}

if($action_menu=="add"){
$member_user_id=$_POST['member_user_id'];
$main_menu_name=$_POST['menu_name'];
$main_menu_name_eng=$_POST['menu_name_eng'];
$main_menu_link=$_POST['menu_link'];
$menu_priority=$_POST['menu_priority'];
//$main_menu_detail=$_POST['menu_detail'];
$plugin=$_POST['plugin'];
if($plugin!="link"){
$main_menu_link	="";
}


$strSQL="insert into main_menu(main_menu_name,main_menu_name_eng,main_menu_link,menu_priority,plugin,admin_id)values('$main_menu_name','$main_menu_name_eng','$main_menu_link','$menu_priority','$plugin','$member_user_id')";

$result=mysql_query($strSQL);
if(!$result){
	echo"error".mysql_error();
	}else{
	return true;
	}
}	
if($action_menu=="edit"){
//echo"edit..";
$main_menu_name=$_POST['menu_name'];
$main_menu_name_eng=$_POST['menu_name_eng'];
$main_menu_link=$_POST['menu_link'];
$menu_priority=$_POST['menu_priority'];
$plugin=$_POST['plugin'];
$main_menu_id=$_POST['main_menu_id'];

//$select_type_menu=$_POST['select_type_menu'];
/*echo"1$main_menu_id<br>";
echo"2$main_menu_name<br>";
echo"3$main_menu_detail<br>";
echo"4$main_menu_link<br>";*/


$strSQL="update main_menu set main_menu_name='$main_menu_name',main_menu_name_eng='$main_menu_name_eng',main_menu_link='$main_menu_link' ,menu_priority='$menu_priority',plugin='$plugin' where main_menu_id='$main_menu_id'";
$result=mysql_query($strSQL);
if(!$result){echo"error".mysql_error();}
}
?>
