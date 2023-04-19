
<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
$paramSelectAll=$_POST['paramSelectAll'];
if($jsonArray["login_status"]==1){



	if($paramSelectAll=="selectAll"){
		$strSQL="
		select role_id,role_name from(
			SELECT 'All' AS role_id,'ทุกสิทธิ์' as role_name,0  as seq
			UNION
			select role_id,role_name,1 as seq from role 
			order by  role_id desc
			)queryA
			ORDER BY seq";
        
		
	}else{
		$strSQL="SELECT role_id,role_name FROM role  order by role_id desc";
	}

$result=$conn->query($strSQL);
$i=0;
$dataObject="";
$dataObject.="[";
while($rs=$result->fetch_assoc()){
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
