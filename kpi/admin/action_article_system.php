<? session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("../config.inc.php");
$article_name_eng=trim($_POST['article_name_eng']);
$article_title_eng=trim($_POST['article_title_eng']);
$article_detail_eng=trim($_POST['article_detail_eng']);

$article_detail=trim($_POST['article_detail']);
$article_title=trim($_POST['article_title']);
$action_article=trim($_POST['action_article']);
$article_show=trim($_POST['article_show']);

$action_article_del=$_GET['action_article_del'];
$article_del_id=$_GET['article_del_id'];
$article_id=$_POST['article_id'];
$main_menu_id=$_POST['main_menu_id'];
$article_name=$_POST['article_name'];
$member_user_id=$_SESSION['member_user_id'];
//echo"11$article_detail";
//echo"22$article_title";


if($action_article=="edit"){
	//echo"hello edit<br>";
	//echo"article_title$article_title<br>";
	//echo"article_detail$article_detail<br>";
	//echo"article_id$article_id<br>";
$strSQL="update article set article_name='$article_name',article_title='$article_title',article_detail='$article_detail',article_name_eng='$article_name_eng',article_title_eng='$article_title_eng',article_detail_eng='$article_detail_eng',main_menu_id='$main_menu_id',article_show='$article_show' where article_id='$article_id'" ;
$result=mysql_query($strSQL);
if(!$result){
	echo"error".mysql_error();
}else{
	echo"<script>window.location=\"index.php?page=menu_system&select_menu=article_management&menu_id=$main_menu_id\";</script>";
	
	}
}


if($action_article=="add"){
	$strSQL="insert into article(article_name,article_title,article_detail,article_name_eng,article_title_eng,article_detail_eng,main_menu_id,article_show,admin_id)values('$article_name','$article_title','$article_detail','$article_name_eng','$article_title_eng','$article_detail_eng','$main_menu_id','$article_show','$member_user_id')";
	$result=mysql_query($strSQL);
	if(!$result){echo"error".mysql_error();}else{
	echo"<script>window.location=\"index.php?page=menu_system&select_menu=article_management&menu_id=$main_menu_id\";</script>";
	}
}


if($action_article_del=="del"){
	$strSQL="delete from article where article_id=$article_del_id";
	$result=mysql_query($strSQL);
	if(!$result){echo"error".mysql_error();}else{
		echo"<script>window.location=\"index.php?page=menu_system&select_menu=article_management&menu_id=$main_menu_id\";</script>";}
}

?>