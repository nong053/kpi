<?php error_reporting (E_ALL ^ E_NOTICE);
$headers = apache_request_headers();

$token_data="";
if(isset($headers['Authorization'])){
	$authorization  = $headers['Authorization'];
	$token = explode("Bearer", $authorization);
	$token_data= $token[1];
}

<?php 
include './../config.inc.php';

$json = $JWT->decode($token_data, $key);
 echo 'JWT Decoded: '.$json."<br>";

?>
