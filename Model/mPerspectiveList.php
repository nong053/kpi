
<?php
include './../config.inc.php';


// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);

$admin_id=$_SESSION['admin_id'];

if($jsonArray["login_status"]==1){
	

$strSQL="SELECT * FROM perspective where admin_id='$admin_id'";
$result=mysql_query($strSQL);
$i=0;
$dataObject="";
$dataObject.="[";
while($rs=mysql_fetch_array($result)){
	if($i==0){
		$dataObject.="[";
		$dataObject.="\"".$rs["perspective_id"]."\",\"".$rs["perspective_name"]."\"";
	}else{
		$dataObject.=",[";
		$dataObject.="\"".$rs["perspective_id"]."\",\"".$rs["perspective_name"]."\"";
	}
	$dataObject.="]";
	$i++;
}
$dataObject.="]";
echo $dataObject;

}else{
echo'{"status":"400","error":"not token."}';

}

?>
