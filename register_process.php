<?php  session_start();
require("config.inc.php");

$admin_name = trim($_POST['admin_name']);
$admin_surname = trim($_POST['admin_surname']);


$admin_email = trim($_POST['admin_email']);
$admin_website = trim($_POST['admin_website']);
$admin_tel = trim($_POST['admin_tel']);
$admin_age = trim($_POST['admin_age']);

$admin_username = trim($_POST['admin_username']);
$admin_password = trim($_POST['admin_password']);
$admin_status = 1;
$action = $_POST['action'];


/*
echo"admin_name=".$admin_name."\n";
echo"admin_surname=".$admin_surname."\n";
echo"admin_email=".$admin_email."\n";
echo"admin_tel=".$admin_tel."\n";
echo"admin_age=".$admin_age."\n";
echo"admin_username=".$admin_username."\n";
echo"admin_password=".$admin_password."\n";
echo"action=".$action."\n";
*/
//echo"vercode1=".$_POST["vercode1"]."\n";
//echo"vercode2=".$_SESSION["vercode2"]."\n";

$now = new DateTime();
$c= $now->format('Y-m-d H:i:s');  


if ($_POST["vercode1"] != $_SESSION["vercode2"] OR $_SESSION["vercode2"]=='')  {
	echo'["vercode-wrong"]';
}else{
	if($action=="add"){
		$sql="select * from admin where admin_username='$admin_username'";
		$table=mysql_query($sql) or die(mysql_error());
		if($row=mysql_fetch_array($table)){
			echo'["user-not-empty"]';
		}else{
			$sql="INSERT INTO admin (admin_name, admin_surname, admin_username, admin_password, admin_status,admin_email,admin_website,admin_send_email,admin_tel,admin_age ,register_date)
			 VALUES 
			('$admin_name', '$admin_surname', '$admin_username', '".MD5($admin_password)."', '$admin_status','$admin_email','$admin_website','$admin_send_email','$admin_tel','$admin_age','$c')";
			if(mysql_query($sql)){
				//echo'["insert-success"]';
				
				$strSQL="select * from admin where admin_username='$admin_username' and admin_password='".MD5($admin_password)."'";
				$result=mysql_query($strSQL);
				
				
				if($num=mysql_num_rows($result)){
					$rs=mysql_fetch_array($result);
					$_SESSION['admin_id']=$rs['admin_id'];
					$_SESSION['admin_name']=$rs['admin_name'];
					$_SESSION['new_register_admin_username']=$rs['admin_username'];
					$_SESSION['admin_surname']=$rs['admin_surname'];
					$_SESSION['admin_status']=$rs['admin_status'];
					$_SESSION['ERORRLOGIN']="";
					

					
					
					//ส่งmailสมาชิก
					$strTo = $admin_email;
					$strSubject = "สมัครสมาชิกสำหรับเว็บไชต์สำเร็จรูป หจก.เอ็นเอ็นไอที";
					$strHeader ="สวัสดีครับคุณ". $rs['admin_name']." ".$rs['admin_surname'];
					$strMessage = "ท่านได้สมัครสมาชิกเรียบร้อยแล้วครับ \nวิธีเข้าใช้งานหน้าเว็บ  URL= www.nn-it.com/".$admin_username." \nวิธีเข้าใช้งานจัดการ  Back Office URL= www.nn-it.com/login.php  User name:".$admin_username." Password:".$admin_password." \nดาวน์โหลดคู่มือการใช้งานได้ที่  http://www.responsivewebthai.com/doc/muanul_start_package.pdf \nถ้าท่านต้องการจดโดเมนเเป็นชื่อองค์กรของท่านเช่น www.domainname.com โปรดแจ้งทีมงาน ราคาทั้งหมดเพียง 2,610 บาท \nที่อยู่:688/165 หมู่บ้านรื่นฤดี 5 ถนนหทัยราษฎร์ แขวงบางชัน เขตคลองสามวา กรุงเทพฯ 10510 \nเบอร์โทร: 02-001-8629 มือถือ: 080-992-6565 อีเมลล์1: nn.it@hotmail.com อีเมลล์2: support@responsivewebthai.com 		
					 				";
					
					$strTo2 = "kosit.arom@gmail.com";
					$strSubject2 = "แจ้งการสมัครสมาชิกสำหรับเว็บไชต์สำเร็จรูป หจก.เอ็นเอ็นไอที";
					$strHeader2 ="คุณ". $rs['admin_name']." ".$rs['admin_surname'];
					$strMessage2 = "ได้สมัครสมาชิกเรียบร้อยแล้วครับ \nวิธีเข้าใช้งานหน้าเว็บ  URL= www.nn-it.com/".$admin_username." \nวิธีเข้าใช้งานจัดการ  Back Office URL= www.nn-it.com/login.php  User name:".$admin_username." Password:".$admin_password." \nถ้าท่านต้องการจดโดเมนเเป็นชื่อองค์กรของท่านเช่น www.domainname.com โปรดแจ้งทีมงาน ราคาทั้งหมดเพียง 2,610 บาท \nที่อยู่:688/165 หมู่บ้านรื่นฤดี 5 ถนนหทัยราษฎร์ แขวงบางชัน เขตคลองสามวา กรุงเทพฯ 10510 \nเบอร์โทร: 02-001-8629 มือถือ: 080-992-6565 อีเมลล์1: nn.it@hotmail.com อีเมลล์2: support@responsivewebthai.com
					 				";
					$flgSend1 = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
					$flgSend2 = @mail($strTo2,$strSubject2,$strMessage2,$strHeader2);  // @ = No Show Error //

					echo '{"status":"200","admin_username":"'.$rs[admin_username].'"}';
				}
				
			}
	
		}
	}
}


//header("Location: index.php?page=admin");
//echo"<script>window.location=\"login.php\";</script>";

?>