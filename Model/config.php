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




function dateDifference($date_1 , $date_2 , $differenceFormat = '%y' )
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
   
    $interval = date_diff($datetime1, $datetime2);
   
    return $interval->format($differenceFormat);
   
}

?>