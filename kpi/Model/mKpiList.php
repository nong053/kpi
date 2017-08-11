<? session_start(); ob_start();?>
<?php
include 'config.php';
$admin_id=$_SESSION['admin_id'];
//$admin_id='198';
$strSQL="SELECT * FROM kpi  where admin_id='$admin_id'";
$result=mysql_query($strSQL);
$i=0;
$dataObject="";
$dataObject.="[";
while($rs=mysql_fetch_array($result)){
	if($i==0){
		$dataObject.="[";
		$dataObject.="\"".$rs["kpi_id"]."\",\"".$rs["kpi_name"]."\"";
	}else{
		$dataObject.=",[";
		$dataObject.="\"".$rs["kpi_id"]."\",\"".$rs["kpi_name"]."\"";
	}
	$dataObject.="]";
	$i++;
}
$dataObject.="]";
echo $dataObject;
?>
