
<?php
	
	include './../config.inc.php';

	// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){

	
	$position__id=$_POST['position__id'];
	//$position__id='3';
	//$year="2012";
	$strSQL="select * from employee  where position_id='$position__id'";
	$result=mysql_query($strSQL);
	$i=0;
	$dataObject="";
	$dataObject.="[";
	while($rs=mysql_fetch_array($result)){
		if($i==0){
			$dataObject.="[";
			$dataObject.="\"".$rs["emp_id"]."\",\"".$rs["emp_name"]."\"";
		}else{
			$dataObject.=",[";
			$dataObject.="\"".$rs["emp_id"]."\",\"".$rs["emp_name"]."\"";
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
