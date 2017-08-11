
<?php
	
	include 'config.php';
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
?>
