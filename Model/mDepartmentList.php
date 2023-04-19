<?php session_start(); ob_start();?>
<?php
include './../config.inc.php';

$admin_id=$_SESSION['admin_id'];
$paramSelectAll=$_POST['paramSelectAll'];
// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){



if($paramSelectAll=="selectAll"){

	$strSQL="select department_id,department_name,department_detail from(
	SELECT 'All' AS department_id,'ทุกแผนก' as department_name,'ทุกแผนก' as department_detail,0 as seq
	UNION
	SELECT department_id,department_name,department_detail,1 as seq FROM department where admin_id='$admin_id'
	)queryA
	ORDER BY seq,department_id";
	
}else{
	$strSQL="
	SELECT department_id,department_name,department_detail FROM department where admin_id='$admin_id'
	";
	
}

$result=$conn->query($strSQL);
$i=0;
$dataObject="";
$dataObject.="[";
while($rs=$result->fetch_assoc()){
	if($i==0){
		$dataObject.="[";
		$dataObject.="\"".$rs["department_id"]."\",\"".$rs["department_name"]."\"";
	}else{
		$dataObject.=",[";
		$dataObject.="\"".$rs["department_id"]."\",\"".$rs["department_name"]."\"";
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
