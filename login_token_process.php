<? session_start(); ob_start();


include("config.inc.php");


$user=$_POST['username'];
$pass=$_POST['password'];
$admin_id=$_POST['admin_id'];
$admin_name="";
$emp_role_level="";
/*
if($admin_id==""){
	//$admin_id=1;
	//$_SESSION['admin_id']=1;
}else{
	$admin_id=$_POST['admin_id'];
	$_SESSION['admin_id']=$_POST['admin_id'];
}
*/


// echo "user=$user";
// echo "pass=$pass";
// echo "admin_id=$admin_id";


// $payload = '{"iss":'.$user.',"admin_id":'.$admin_id.',"exp":1300819380}';

// $token = $JWT->encode($header, $payload, $key);
// $json = $JWT->decode($token, $key);

// echo 'JSON Web Token: '.$token."<br>";
// echo 'JWT Decoded: '.$json."<br>";


$strSQL="select * from admin where admin_username='$user' and admin_password=MD5('$pass') and admin_id='$admin_id'";
$result=mysql_query($strSQL);

$strSQLEmp="select e.*,r.role_name as role_name,ad.* from employee e
INNER JOIN position_emp pe on e.position_id=pe.position_id
INNER JOIN role r on e.role_id=r.role_id
INNER JOIN admin ad  on e.admin_id=ad.admin_id
where e.emp_user='$user'
and e.emp_pass=MD5('$pass')
and e.admin_id='$admin_id'
		";
$resultEmp=mysql_query($strSQLEmp);


if($num=mysql_num_rows($result)){
	$rs=mysql_fetch_array($result);


	// $_SESSION['admin_id']=$rs['admin_id'];
	// $_SESSION['admin_name']=$rs['admin_name'];
	// $_SESSION['admin_surname']=$rs['admin_surname'];
	// $_SESSION['admin_status']=$rs['admin_status'];
	// $_SESSION['ERORRLOGIN']="";
	
	// $_SESSION['emp_ses_id']="";
	// $_SESSION['emp_name']="";
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


	//echo"<script>window.location='admin/index.php?admin_id=".$_SESSION['admin_id']."'</script>";
	//echo "admin here..";
	}else if($num=mysql_num_rows($resultEmp)){
		
		$rsEmp=mysql_fetch_array($resultEmp);

		
		// $_SESSION['emp_ses_id']=$rsEmp['emp_id'];
		// $_SESSION['emp_name']=$rsEmp['emp_name'];
		// $_SESSION['admin_status']=0;
		// $_SESSION['emp_role_level']=$rsEmp['role_name'];
		// $_SESSION['ERORRLOGIN']="";
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
	// "emp here..";
	//echo"<script>window.location='View/index.php?emp_id=".$_SESSION['emp_ses_id']."'</script>";
	}else{
	echo '{"status":"error","ERORRLOGIN":"รหัสผ่านไม่ถูกต้อง","admin_name":"'.$admin_name.'"}';
	//$_SESSION['ERORRLOGIN']="รหัสผ่านไม่ถูกต้อง";
	//echo"<script>window.location='login.php?admin_name=".$_SESSION['admin_name']."'</script>";
	}
	//echo '{"emp_level":"'.$emp_role_level.'"}';	
	//echo "emp_leve=".$_SESSION['emp_leve'];

?>