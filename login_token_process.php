<? session_start(); ob_start();
include("config.inc.php");
$user=$_POST['username'];
$pass=$_POST['password'];
$admin_id=$_POST['admin_id'];
$admin_name="";
$emp_role_level="";


$strSQL="select * from admin where admin_username='$user' and admin_password=MD5('$pass')";
$result=mysql_query($strSQL);
$strSQLEmp="select e.*,r.role_name as role_name,ad.* from employee e
INNER JOIN position_emp pe on e.position_id=pe.position_id
INNER JOIN role r on e.role_id=r.role_id
INNER JOIN admin ad  on e.admin_id=ad.admin_id
where e.emp_user='$user'
and e.emp_pass=MD5('$pass')

";
$resultEmp=mysql_query($strSQLEmp);

if($num=mysql_num_rows($result)){
	$rs=mysql_fetch_array($result);

	$admin_name=$rs['admin_name'];
	$payload = '{"iss":"'.$user.'",
				"admin_id":"'.$admin_id.'",
				"admin_name":"'.$rs['admin_name'].'",
				"admin_surname":"'.$rs['admin_surname'].'",
				"admin_status":"'.$rs['admin_status'].'",
				"login_status":"1",
				"exp":1300819380
			}';
	$token = $JWT->encode($header, $payload, $key);
	

	echo '{"status":"200","token":"'.$token.'","admin_id":"'.$admin_id.'","user":"'.$user.'",
	"pass":"'.$pass.'"}';



	}else if($num=mysql_num_rows($resultEmp)){
		
		$rsEmp=mysql_fetch_array($resultEmp);
		$emp_role_level=$rsEmp['role_name'];
		$payload = '{"iss":"'.$rsEmp['emp_id'].'",
				"emp_name":"'.$rsEmp['emp_name'].'",
				"admin_status":"0",
				"login_status":"1",
				"emp_role_level":"'.$rsEmp['role_name'].'",
				"ERORRLOGIN":"",
				"exp":1300819380
			}';
	$token = $JWT->encode($header, $payload, $key);
	
	echo '{"status":200,"token":"'.$token.'",
	"emp_id":"'.$rsEmp['emp_id'].'",
	"user":"'.$user.'",
	"pass":"'.$pass.'",
	"admin_id":"'.$admin_id.'"
	}';	

	}else{
	echo '{"status":"error","ERORRLOGIN":"รหัสผ่านไม่ถูกต้อง","admin_name":"'.$admin_name.'"}';
	}
	

?>