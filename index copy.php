<?php session_start(); 
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
//error_reporting (E_ALL ^ E_NOTICE);

//Get Host Name 
$host=$_SERVER['HTTP_HOST'];
$domain = explode(".", $host);
$admin_username = "";
$_SESSION['activated_message']="";
$_SESSION['activated_trial']=0;
$_SESSION['activated']=0;







include_once 'config.inc.php';

//for demo delete start;
//$_GET['userName']="demo_admin";
//for demo delete end;

$userName = (isset($_GET['userName'])) ? $_GET['userName'] : '';

if(!$userName){
	
	if(count($domain)>2){
		$admin_username=$domain[1];
	}else{
		$admin_username=$domain[0];
	}
	$_SESSION['subDomain']="";
	
}else{
	$admin_username=$_GET['userName'];
	$_SESSION['subDomain']=$_GET['userName'];
}

if($_SESSION['subDomain']!=""){
	$subDomain=$_SESSION['subDomain'];
}else{
	$subDomain="";
}



$query_admin="select * from admin where admin_username='$admin_username' and admin_status!=0";

//echo $query_admin."<br>";
$result_admin=mysql_query($query_admin);
$rs_num=mysql_num_rows($result_admin);
$rs=@mysql_fetch_array($result_admin);


if($rs_num){
	$_SESSION['admin_id']=$rs[admin_id];
	$_SESSION['admin_username']=$rs[admin_username];

	$_SESSION['register_date']=$rs[register_date];
	$_SESSION['activated']=$rs[activated];



	 if($rs[activated]==0){

	 //Check Activated Trial
	$now = new DateTime();
	$c= $now->format('Y-m-d H:i:s');    // MySQL datetime format
	$register_date=date_create($rs[register_date]);

	 // echo "วันที่สมัครทดลองใช้งาน:".$rs[register_date];
	 // echo "<br>";
	 // echo "วันที่ปัจจุบัน:".$c;
	 // echo "<br>";

    $current_date=date_create($c);
    $diff=date_diff($register_date,$current_date);

    // echo "จำนวนวันที่ใช้ไป:".$diff->format("%R%a days");
    // echo "<br>";

    $date_dff=$diff->format("%R%a");
    $date_dff=(int)$date_dff;



   // echo $date_dff;
   // echo "<br>";

	    if($date_dff>=30){


	    $_SESSION['activated_message']='หมดอายุการใช้งาน<br>ต่ออายุการใช้งานโทร. 0809926565';
	    $_SESSION['activated_trial']=0;
	    }else{



	    $_SESSION['activated_message']="เหลือเวลาการใช้งาน <b style='font-size:20px;'>".(30-$date_dff)."</b> วัน";
	    $_SESSION['activated_trial']=1;

	    }
	}else if($rs[activated]==1){

	//Check Activated 
	$now = new DateTime();
	$c= $now->format('Y-m-d H:i:s'); 
	
	$expired_date=date_create($rs[expired_date]);
    $current_date=date_create($c);

    //echo "current_date".$current_date."<br>";
    $diff=date_diff($expired_date,$current_date);
    $date_dff=$diff->format("%R%d");
    //echo "date_dff1".$date_dff;
    $date_dff=(int)$date_dff;
    



    if($date_dff>0){
    	$_SESSION['activated_message']='หมดอายุการใช้งาน<br>ต่ออายุการใช้งานโทร. 0809926565';
    	//update active flag ==0
    	$strSQL="UPDATE admin set activated='0' where admin_id='".$_SESSION['admin_id']."'";
		$result=mysql_query($strSQL);


    }else{

 		//$_SESSION['activated_message']="เหลือเวลาการใช้งาน <b style='font-size:20px;'>".abs($date_dff)."</b> วัน";

    }
	//$_SESSION['activated_trial']=1;
   


	}
    //Check Activated End..

	

	$admin_id=$_SESSION['admin_id'];
	
	// ###################   INCLUDE FILE FOR INDEX.PHP START   ################
	
	include("login.php");
	
}else{
	?>
	<title>System is running..</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<center>
	<!--<img src="images/c.png"><br>-->
	<h1>
	กรอก <font color="red">username</font> ต่อจาก url ตัวอย่าง http://kpi.dashboardweb.com/<font color='red'>username</font><br>
	หรือ http://localhost/kpi/?userName=<font color='red'>username</font>
	</h1>
	</center>
	<?php
	exit();
}