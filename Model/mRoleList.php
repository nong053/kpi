
<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){



$strSQL="SELECT * FROM role  order by role_id desc";

$result=mysql_query($strSQL);
$i=0;
$dataObject="";
$dataObject.="[";
while($rs=mysql_fetch_array($result)){
	if($i==0){
		$dataObject.="[";
		$dataObject.="\"".$rs["role_id"]."\",\"".$rs["role_name"]."\"";
	}else{
		$dataObject.=",[";
		$dataObject.="\"".$rs["role_id"]."\",\"".$rs["role_name"]."\"";
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
