
<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){


$department_id=$_POST['department_id'];
if($department_id!=""){
	$strSQL="SELECT * FROM division where department_id='$department_id'";
}else{
	$strSQL="SELECT * FROM division ";
}

$result=mysql_query($strSQL);
$i=0;
$dataObject="";
$dataObject.="[";
while($rs=mysql_fetch_array($result)){
	if($i==0){
		$dataObject.="[";
		$dataObject.="\"".$rs["division_id"]."\",\"".$rs["division_name"]."\"";
	}else{
		$dataObject.=",[";
		$dataObject.="\"".$rs["division_id"]."\",\"".$rs["division_name"]."\"";
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
