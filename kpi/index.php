<?php session_start();

//Get Host Name 
$host=$_SERVER['HTTP_HOST'];
$domain = explode(".", $host);
$admin_username = "";


include_once 'config.inc.php';

//for demo delete start;
//$_GET['userName']="demo_admin";
//for demo delete end;

if(!$_GET['userName']){
	
	if(count($domain)>2){
		$admin_username=$domain[1];
	}else{
		$admin_username=$domain[0];
	}
	$_SESSION['subDomain']="";
	
}else{
	$admin_username=$_GET['userName'];
	$_SESSION['subDomain']=$_GET['userName'];
}

if($_SESSION['subDomain']!=""){
	$subDomain=$_SESSION['subDomain'];
}else{
	$subDomain="";
}

$query_admin="select * from admin where admin_username='$admin_username' and admin_status!=0";
$result_admin=mysql_query($query_admin);
$rs_num=mysql_num_rows($result_admin);
$rs=@mysql_fetch_array($result_admin);
if($rs_num){
	$_SESSION['admin_id']=$rs[admin_id];
	$_SESSION['admin_username']=$rs[admin_username];
	$admin_id=$_SESSION['admin_id'];
	
	// ###################   INCLUDE FILE FOR INDEX.PHP START   ################
	
	include("login.php");
	
}else{
	?>
	<title>ปิดให้บริการชั่วคราว</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<center>
	<img src="images/c.png"><br>
	<h1>ปิดให้บริการชั่วคราว</h1>
	</center>
	<?php
	exit();
}