<? session_start(); ob_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include("config.inc.php");
$user=$_POST['user'];
$pass=$_POST['pass'];


/*echo "$user";
echo "$pass";*/
$strSQL="select * from employee
where emp_user='$user'
and emp_pass='$pass'";
$result=mysql_query($strSQL);


if($num=mysql_num_rows($result)){
	$rs=mysql_fetch_array($result);
	$_SESSION['emp_id']=$rs['emp_id'];
	$_SESSION['emp_name']=$rs['emp_name'];
	$_SESSION['ERORRLOGIN']="";

	echo"<script>window.location='index.php?admin_id=".$_SESSION['admin_id']."'</script>";
	
	}else{
		
	$_SESSION['ERORRLOGIN']="รหัสผ่านไม่ถูกต้อง";
	echo"<script>window.location='login.php'</script>";
				
	}
		
	
?>