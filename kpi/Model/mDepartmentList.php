<? session_start(); ob_start();?>
<?php
$admin_id=$_SESSION['admin_id'];
$paramSelectAll=$_POST['paramSelectAll'];
include 'config.php';
if($paramSelectAll=="selectAll"){

	$strSQL="select department_id,department_name,department_detail from(
	SELECT 'All' AS department_id,'ทั้งหมด' as department_name,'ทั้งหมด' as department_detail,0 as seq
	UNION
	SELECT department_id,department_name,department_detail,1 as seq FROM department where admin_id='$admin_id'
	)queryA
	ORDER BY seq,department_id";
	
}else{
	$strSQL="
	SELECT department_id,department_name,department_detail FROM department where admin_id='$admin_id'
	";
	
}

$result=mysql_query($strSQL);
$i=0;
$dataObject="";
$dataObject.="[";
while($rs=mysql_fetch_array($result)){
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
?>
