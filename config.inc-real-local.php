<?php 
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
require_once "JWT.php";
$key = '46196053844814367107123';
$token_data="";
$host="127.0.0.1";
//SERVER REAL

$user="root";
$pass="";
$db="person_kpi";

/*
$user="dashboa1";
$pass="010535546";
$db="dashboa1_kpi";
*/
// sssdss

//set type for encode json web token.
$header = '{"typ":"JWT","alg":"HS256"}';
$JWT = new JWT;

$conn=mysql_connect($host,$user,$pass);
//$conn = mysqli_connect($host, $user, $pass, $db);
if($conn){
	mysql_query("SET NAMES UTF8");
	mysql_select_db($db);
	//echo"connect success.";
}else{
	echo"can't connect database";
}

//get token for virify.

if( !function_exists('apache_request_headers') ) {
///
function apache_request_headers() {
  $arh = array();
  $rx_http = '/\AHTTP_/';
  foreach($_SERVER as $key => $val) {
    if( preg_match($rx_http, $key) ) {
      $arh_key = preg_replace($rx_http, '', $key);
      $rx_matches = array();
      // do some nasty string manipulations to restore the original letter case
      // this should work in most cases
      $rx_matches = explode('_', $arh_key);
      if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
        foreach($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst($ak_val);
        $arh_key = implode('-', $rx_matches);
      }
      $arh[$arh_key] = $val;
    }
  }
  return( $arh );
}
///
}
///

$headers = apache_request_headers();
if(isset($headers['Authorization'])){
	$authorization  = $headers['Authorization'];
	$token = explode("Bearer ", $authorization);
	$token_data= $token[1];
}



?>