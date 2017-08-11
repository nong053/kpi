<?session_start(); ob_start();?>
<?php 
if($_GET['role']=="admin"){
	if($_GET['superUser']=="1"){
	header( "location: /" );
	}else{
	header( "location: /$_SESSION[admin_username]" );
	}
	unset($_SESSION["admin_id"]);
	exit(0);
}else if($_GET['role']=="emp"){
	unset($_SESSION["emp_id"]);
	unset($_SESSION["emp_name"]);
	
	if($_GET['superUser']=="1"){
		header( "location: /" );
	}else{
	header( "location: /$_SESSION[admin_username]" );
	}
	exit(0);
}

?>