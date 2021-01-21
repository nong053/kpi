
<?php

include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if ($jsonArray["login_status"] == 1) {


	$position_id = $_POST['position_id'];
	$department_id = $_POST['department_id'];
	$paramSelectAll = $_POST['paramSelectAll'];

	if ($paramSelectAll == "selectAll") {

		$strSQL = "select emp_id,fullname,seq from(
			SELECT 'All' AS emp_id,'ทั้งหมด' as fullname  ,0 as seq
			UNION
			SELECT  emp_id, concat(emp_first_name,' ',emp_last_name) as fullname,1 as seq from employee where position_id='$position_id' and department_id='$department_id' 
	)queryA
			ORDER BY seq,emp_id";

	} else {
		$strSQL = "select emp_id,concat(emp_first_name,' ',emp_last_name) as fullname from employee  where position_id='$position_id' and department_id='$department_id' order by emp_id";
	}

	$result = mysql_query($strSQL);
	$i = 0;
	$dataObject = "";
	$dataObject .= "[";
	while ($rs = mysql_fetch_array($result)) {
		if ($i == 0) {
			$dataObject .= "[";
			$dataObject .= "\"" . $rs["emp_id"] . "\",\"" . $rs["fullname"] ."\"";
		} else {
			$dataObject .= ",[";
			$dataObject .= "\"" . $rs["emp_id"] . "\",\"" . $rs["fullname"] ."\"";
		}
		$dataObject .= "]";
		$i++;
	}
	$dataObject .= "]";
	echo $dataObject;
} else {
	echo '{"status":"400","error":"not token."}';
}

?>
