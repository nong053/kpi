<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
?>

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
$strSQL="select a.*,p.* from admin a
left join package p
on a.package = p.id
where a.admin_username='$user' 
and a.admin_password=MD5('$pass') 
and a.admin_id='$admin_id'";

//$strSQL="select * from admin where admin_username='$user' and admin_password='$pass' and admin_id='$admin_id'";
$result=mysql_query($strSQL);

$strSQLEmp="select e.*,r.role_id,r.role_name as role_name,ad.* from employee e
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
	$_SESSION['admin_id']=$rs['admin_id'];
	$_SESSION['admin_name']=$rs['admin_name'];
	$_SESSION['admin_surname']=$rs['admin_surname'];
	$_SESSION['admin_status']=$rs['admin_status'];
	$_SESSION['package']=$rs['package'];



	$_SESSION['user_amount']=$rs['user_amount'];
	$_SESSION['appraisal_amount']=$rs['appraisal_amount'];
	$_SESSION['previous_amount']=$rs['previous_amount'];


	$_SESSION['login_status']=1;
	
	$_SESSION['ERORRLOGIN']="";
	$_SESSION['emp_ses_id']="";
	$_SESSION['emp_name']="";


	// $strSQLPosition="SELECT position_id FROM person_kpi.position_emp 
	// where admin_id='$admin_id'
	// and role_id=1
	// ";
	// $resultPosition=mysql_query($strSQLPosition);
	// if($resultPosition){
	// 	$rsPosition=mysql_fetch_array($resultPosition);
	// 	$_SESSION['role_executive_position_id']=$rsPosition['position_id'];
	// }



	//echo"<script>window.location='admin/index.php?admin_id=".$_SESSION['admin_id']."'</script>";
	echo"<script>window.location='View/index.php'</script>";
	//echo "admin here..";
	}else if($num=mysql_num_rows($resultEmp)){
		
		$rsEmp=mysql_fetch_array($resultEmp);
		$_SESSION['emp_ses_id']=$rsEmp['emp_id'];
		$_SESSION['emp_name']=$rsEmp['emp_name'];
		$_SESSION['admin_status']=0;
		$_SESSION['emp_role_leve']=$rsEmp['role_name'];
		$_SESSION['emp_role_level_id']=$rsEmp['role_id'];
		

		$_SESSION['ERORRLOGIN']="";
		$_SESSION['login_status']=1;
		

		if($rsEmp['role_name']=="Level2"){

			$strSQLPosition="SELECT position_id FROM position_emp 
			where admin_id='$admin_id'
			and role_id=3
			";
			$resultPosition=mysql_query($strSQLPosition);
			$rsPosition=mysql_fetch_array($resultPosition);
			$_SESSION['role_underling_position_id']=$rsPosition['position_id'];

		}
		
		// else if($rsEmp['role_name']=="Level1"){

		// 	$strSQLPosition2="SELECT position_id FROM person_kpi.position_emp 
		// 	where admin_id='$admin_id'
		// 	and role_id=1
		// 	";
		// 	$resultPosition2=mysql_query($strSQLPosition2);
		// 	$rsPosition2=mysql_fetch_array($resultPosition2);
		// 	$_SESSION['role_executive_position_id']=$rsPosition2['position_id'];

		// }
		
	// "emp here..";
	echo"<script>window.location='View/index.php?emp_id=".$_SESSION['emp_ses_id']."'</script>";
	}else{
	$_SESSION['ERORRLOGIN']="รหัสผ่านไม่ถูกต้อง";
	echo"<script>window.location='login.php?admin_name=".$_SESSION['admin_name']."'</script>";
	}
		
	//echo "emp_leve=".$_SESSION['emp_leve'];
	
?>