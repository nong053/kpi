<?php
function genarateJson($strSQL,$columnName,$conn){

	$explodeColumnName= (explode(",",$columnName));


	//$result=mysql_query($strSQL);
	$result=$conn->query($strSQL);
	if($result){
		$i=0;
		$json="[";
		//while($rs=mysql_fetch_array($result)){
		while($rs=$result->fetch_assoc()){
			if($i==0){
				$json.="[";
				for($j=0;$j<count($explodeColumnName);$j++){
					if($j==0){
					 $json.="\"".$rs[$explodeColumnName[$j]]."\"";
					}else{
						$json.=",\"".$rs[$explodeColumnName[$j]]."\"";
					}
				}
				//[[\"Title1\",\"Title2\",\"Title3\"],[\"June\",\"Hotel\",\"600\"],[\"Junly\",\"Hotel\",\"700\"],[\"Agust\",\"Hotel\",\"1000\"],[\"Octember\",\"Hotel\",\"1000\"]]";

			}else{
				$json.=",[";
				for($j=0;$j<count($explodeColumnName);$j++){
					if($j==0){
						$json.="\"".$rs[$explodeColumnName[$j]]."\"";
					}else{
						$json.=",\"".$rs[$explodeColumnName[$j]]."\"";
					}
				}
			}
			$json.="]";
			$i++;
		}
		$json.="]";
		
		if($json=="[]"){
			echo "[[0]]";
		}else{
			echo $json;
		}
		//mysql_close($conn);
		$conn->close();
	}

}
?>