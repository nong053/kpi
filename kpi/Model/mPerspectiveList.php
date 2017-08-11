
<?php
include 'config.php';
$strSQL="SELECT * FROM perspective";
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
?>
