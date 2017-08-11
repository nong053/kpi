<? session_start(); ob_start();?>
<?php
$admin_id=$_SESSION['admin_id'];
$paramSelectAll=$_POST['paramSelectAll'];
include 'config.php';
if($paramSelectAll=="selectAll"){
	$strSQL="select position_id,position_name from(
	SELECT 'All' AS position_id,'ทั้งหมด' as position_name,0 as seq
	UNION
	select position_id,position_name,1 as seq from position_emp where admin_id='$admin_id'
	)queryA
	ORDER BY seq";
}else{
	$strSQL="
	select position_id,position_name from position_emp where admin_id='$admin_id'
	";
}


$result=mysql_query($strSQL);
$i=0;
$dataObject="";
$dataObject.="[";
while($rs=mysql_fetch_array($result)){
	if($i==0){
		$dataObject.="[";
		$dataObject.="\"".$rs["position_id"]."\",\"".$rs["position_name"]."\"";
	}else{
		$dataObject.=",[";
		$dataObject.="\"".$rs["position_id"]."\",\"".$rs["position_name"]."\"";
	}
	$dataObject.="]";
$i++;
}
$dataObject.="]";
echo $dataObject;