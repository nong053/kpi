<? session_start(); ob_start();?>
<?php
$paramSelectAll=$_POST['paramSelectAll'];
include 'config.php';
if($paramSelectAll=="selectAll"){
	$strSQL="
	select * from(
	select 'All' as id,'ทั้งหมด' as emp_status_work,0 as seq
	UNION
	select id,emp_status_work,1 as seq from emp_status
	)queryA 
	ORDER BY seq
			
	";
}else{
	$strSQL="
	select id,emp_status_work from emp_status
	";
}
	


$result=mysql_query($strSQL);
$i=0;
$dataObject="";
$dataObject.="[";
while($rs=mysql_fetch_array($result)){
	if($i==0){
		$dataObject.="[";
		$dataObject.="\"".$rs["id"]."\",\"".$rs["emp_status_work"]."\"";
	}else{
		$dataObject.=",[";
		$dataObject.="\"".$rs["id"]."\",\"".$rs["emp_status_work"]."\"";
	}
	$dataObject.="]";
$i++;
}
$dataObject.="]";
echo $dataObject;
