

<?php
	
	include 'config.php';
	//$year="2012";
	$strSQL="
		select year,current_year from(
		select year(CURDATE())-3 as 'year',0 as 'current_year'
		UNION
		select year(CURDATE())-2 as 'year',0 as 'current_year'
		UNION
		select year(CURDATE())-1 as 'year',0 as 'current_year'
		UNION
		select year(CURDATE()) as 'year',1 as 'current_year'
		UNION
		select year(CURDATE())+1 as 'year',0 as 'current_year'
		UNION
		select year(CURDATE())+2 as 'year',0 as 'current_year'
		UNION
		select year(CURDATE())+3 as 'year',0 as 'current_year'
		)queryA
			";
	$result=mysql_query($strSQL);
	$i=0;
	$dataObject="";
	$dataObject.="[";
	while($rs=mysql_fetch_array($result)){
		if($i==0){
			$dataObject.="[";
			$dataObject.="\"".$rs["year"]."\",\"".$rs["current_year"]."\"";
		}else{
			$dataObject.=",[";
			$dataObject.="\"".$rs["year"]."\",\"".$rs["current_year"]."\"";
		}
		$dataObject.="]";
		$i++;
	}
	$dataObject.="]";
	echo $dataObject;
?>


