<?php 
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$host="127.0.0.1";
/*
$user="root";
$pass="010535546";
$db="person_kpi";
*/

$user="root";
$pass="";
$db="person_kpi";


$conn=mysql_connect($host,$user,$pass);
if($conn){
	mysql_query("SET NAMES UTF8");
	mysql_select_db($db);
}else{
	echo"can't connect database";
}

?>