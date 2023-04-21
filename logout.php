<?php session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
?>
<?php 
//echo "unset_session=".$_POST['unset_session'];

if($_POST['unset_session']=="loguout"){

		session_destroy();
		//Emp Session
		$_SESSION['emp_ses_id']="";
		$_SESSION['emp_name']="";
		$_SESSION['admin_status']=0;
		$_SESSION['emp_role_leve']="";
		$_SESSION['ERORRLOGIN']="";
		$_SESSION['login_status']=0;
		$_SESSION['emp_role_level_id']="";

		//Admin Session
		$_SESSION['admin_id']="";
		$_SESSION['admin_name']="";
		$_SESSION['admin_surname']="";
		$_SESSION['admin_status']="";
		$_SESSION['login_status']=0;
		$_SESSION['session']="";


	//echo "session_destroy";
	//$admin_username=$_POST['admin_username'];
	//echo $admin_username;
	//header( "location: ../kpi/".$admin_username );

	// echo"<script>setTimeout(function(){window.location='../kpi/".$admin_username."'},1000);</script>";
	echo"<script>setTimeout(function(){window.location='../kpi'},1000);</script>";
	//echo"<script>setTimeout(function(){window.location='../kpi/'},3000);</script>";


}
?>
