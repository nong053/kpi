<?php 
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
require_once "JWT.php";
$key = '46196053844814367107123';
$token_data="";
$host="localhost";
//SERVER REAL

$user="root";
$pass="";
$db="person_kpi";


// $user="dashboa2_kpitestuser";
// $pass="010535546";
// $db="dashboa2_kpitestdb";


//set type for encode json web token.
$header = '{"typ":"JWT","alg":"HS256"}';
$JWT = new JWT;

//$conn=mysql_connect($host,$user,$pass);
$conn = new mysqli($host, $user, $pass,$db);
$conn->set_charset("utf8");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
/*
$conn = mysqli_connect($host, $user, $pass, $db);
if($conn){
  mysql_query("SET NAMES UTF8");
  mysql_select_db($db);
}else{
  echo"can't connect database";
}
*/

//get token for virify.

// if( !function_exists('apache_request_headers') ) {
// ///
// function apache_request_headers() {
//   $arh = array();
//   $rx_http = '/\AHTTP_/';
//   foreach($_SERVER as $key => $val) {
//     if( preg_match($rx_http, $key) ) {
//       $arh_key = preg_replace($rx_http, '', $key);
//       $rx_matches = array();
//       // do some nasty string manipulations to restore the original letter case
//       // this should work in most cases
//       $rx_matches = explode('_', $arh_key);
//       if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
//         foreach($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst($ak_val);
//         $arh_key = implode('-', $rx_matches);
//       }
//       $arh[$arh_key] = $val;
//     }
//   }
//   return( $arh );
// }
// ///
// }
// ///



function dateDifference($date_1 , $date_2 , $differenceFormat = '%y' )
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
   
    $interval = date_diff($datetime1, $datetime2);
   
    return $interval->format($differenceFormat);
   
}


//echo getNumDay("2010-09-27","2010-09-29");

if (!function_exists('apache_request_headers')) { 
     eval(' 
         function apache_request_headers() { 
             foreach($_SERVER as $key=>$value) { 
                 if (substr($key,0,5)=="HTTP_") { 
                     $key=str_replace(" ","-",ucwords(strtolower(str_replace("_"," ",substr($key,5))))); 
                     $out[$key]=$value; 
                 } 
             } 
             return $out; 
         } 
     '); 
 } 

$headers = apache_request_headers();
if(isset($headers['Authorization'])){
  $authorization  = $headers['Authorization'];
  $token = explode("Bearer ", $authorization);
  $token_data= $token[1];
}


?>