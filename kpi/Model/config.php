<?php 

$host="localhost";
/*
$user="root";
$pass="010535546";
$db="person_kpi";
*/

$user="dashboar";
$pass="010535546";
$db="dashboar_kpi";


$conn=mysql_connect($host,$user,$pass);
if($conn){
	mysql_query("SET NAMES UTF8");
	mysql_select_db($db);
}else{
	echo"can't connect database";
}
?>