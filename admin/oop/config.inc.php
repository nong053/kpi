<?php
extract($_REQUEST);
$hostname="localhost";
$username="root";
//$username="asiatvf_user";
$password="010535546";
$dbname="pototype_db";
mysql_connect($hostname,$username,$password);
mysql_query("SET NAMES utf8");
mysql_select_db($dbname);



?>