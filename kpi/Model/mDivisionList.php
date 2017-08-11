
<?php
include 'config.php';

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
?>
