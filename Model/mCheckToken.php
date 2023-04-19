<?php session_start(); ob_start();?>
<?php 
include './../config.inc.php';


// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]!=1){
	echo'{"status":"400","error":"not token in mCheckToken.php."}';
}
