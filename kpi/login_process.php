<? session_start(); ob_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include("config.inc.php");
$user=$_POST['user'];
$pass=$_POST['pass'];
if($_POST['admin_id']==""){
	//$admin_id=1;
	//$_SESSION['admin_id']=1;
}else{
	$admin_id=$_POST['admin_id'];
	$_SESSION['admin_id']=$_POST['admin_id'];
}


/*
echo "$user";
echo "$pass";
echo "$admin_id";
*/
$strSQL="select * from admin where admin_username='$user' and admin_password='$pass' and admin_id='$admin_id'";
$result=mysql_query($strSQL);

$strSQLEmp="select e.*,r.role_name as role_name from employee e
INNER JOIN position_emp pe on e.position_id=pe.position_id
INNER JOIN role r on pe.role_id=r.role_id
where e.emp_user='$user'
and e.emp_pass='$pass'
and e.admin_id='$admin_id'
		";
$resultEmp=mysql_query($strSQLEmp);


if($num=mysql_num_rows($result)){
	$rs=mysql_fetch_array($result);
	$_SESSION['admin_id']=$rs['admin_id'];
	$_SESSION['admin_name']=$rs['admin_name'];
	$_SESSION['admin_surname']=$rs['admin_surname'];
	$_SESSION['admin_status']=$rs['admin_status'];
	$_SESSION['ERORRLOGIN']="";
	
	$_SESSION['emp_ses_id']="";
	$_SESSION['emp_name']="";
	


	echo"<script>window.location='admin/index.php?admin_id=".$_SESSION['admin_id']."'</script>";
	//echo "admin here..";
	}else if($num=mysql_num_rows($resultEmp)){
		
		$rsEmp=mysql_fetch_array($resultEmp);
		$_SESSION['emp_ses_id']=$rsEmp['emp_id'];
		$_SESSION['emp_name']=$rsEmp['emp_name'];
		
		$_SESSION['admin_status']=0;
		$_SESSION['emp_role_leve']=$rsEmp['role_name'];
		$_SESSION['ERORRLOGIN']="";
		
		/*
		$_SESSION['admin_id']="";
		$_SESSION['admin_name']="";
		$_SESSION['admin_surname']="";
		*/
		
		
	// "emp here..";
	echo"<script>window.location='View/index.php?emp_id=".$_SESSION['emp_ses_id']."'</script>";
	}else{
	$_SESSION['ERORRLOGIN']="รหัสผ่านไม่ถูกต้อง";
	echo"<script>window.location='login.php?admin_name=".$_SESSION['admin_name']."'</script>";
	}
		
	echo "emp_leve=".$_SESSION['emp_leve'];
	
?>