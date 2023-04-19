<?php  session_start();
require("config.inc.php");

$admin_name = trim($_POST['admin_name']);
$admin_surname = trim($_POST['admin_surname']);
$admin_company = trim($_POST['admin_company']);


$admin_email = trim($_POST['admin_email']);
$admin_website = trim($_POST['admin_website']);
$admin_tel = trim($_POST['admin_tel']);
$admin_age = trim($_POST['admin_age']);

$admin_username = trim($_POST['admin_username']);
$admin_password = trim($_POST['admin_password']);
$admin_status = 1;
$action = $_POST['action'];


$now = new DateTime();
$c= $now->format('Y-m-d H:i:s');  


if ($_POST["vercode1"] != $_SESSION["vercode2"] OR $_SESSION["vercode2"]=='')  {
	echo'["vercode-wrong"]';
}else{
	if($action=="add"){
		$sql="
		select sum(countUser) as totalUser from(
			select count(*) as countUser from employee
			where emp_user = '$admin_username'
			union
			select count(*) as countUser from admin
			where admin_username = '$admin_username'
			)as checkUser
		";
		$table=$conn->query($sql) or die($conn->error);
		$rs=$table->fetch_assoc();
		//echo $rs['totalUser'];

		if($rs['totalUser']>0){
			//print_r($row);
			echo'["user-not-empty"]';
		}else{
			$sql="INSERT INTO admin (admin_name, admin_surname, admin_username, admin_password, admin_status,admin_email,admin_website,admin_send_email,admin_tel,admin_age ,register_date,package,admin_company)
			 VALUES 
			('$admin_name', '$admin_surname', '$admin_username', '".MD5($admin_password)."', '$admin_status','$admin_email','$admin_website','$admin_send_email','$admin_tel','$admin_age','$c',1,'$admin_company')";
			if($conn->query($sql)){
				//echo'["insert-success"]';
				
				$strSQL="select * from admin where admin_username='$admin_username' and admin_password='".MD5($admin_password)."'";
				$result=$conn->query($strSQL);
				
				
				if($num=$result->num_rows;){
					$rs=$result->fetch_assoc();
					$_SESSION['admin_id']=$rs['admin_id'];
					$_SESSION['admin_name']=$rs['admin_name'];
					$_SESSION['new_register_admin_username']=$rs['admin_username'];
					$_SESSION['admin_surname']=$rs['admin_surname'];
					$_SESSION['admin_status']=$rs['admin_status'];
					$_SESSION['admin_company']=$rs['admin_company'];
					
					$_SESSION['ERORRLOGIN']="";
					

					//ส่งmailสมาชิก
					$strTo = $admin_email;
					$strSubject = "สร้างบัญชีระบบประเมินผลการปฎิบัติงาน";
					$strHeader ="สวัสดีครับคุณ ". $rs['admin_name']." ".$rs['admin_surname'];
					$strMessage = "ท่านได้สร้างบัญชีเรียบร้อย \nวิธีเข้าใช้งาน  URL= kpi.dashboardweb.com  \nUsername:".$admin_username." \nPassword:".$admin_password."  \nช่องทางการติดต่อ มือถือ: 080-992-6565 อีเมลล์: nn.it@hotmail.com";
					$strTo2 = "kosit.arom@gmail.com";
					$strSubject2 = "รายงานการสร้างบัญชีสำหรับระบบประเมินผลการปฎิบัติงาน";
					$strHeader2 ="คุณ ". $rs['admin_name']." ".$rs['admin_surname'];
					$strMessage2 = "ได้สร้างบัญชีเรียบร้อย \nวิธีเข้าใช้งาน  URL= kpi.dashboardweb.com  \nUsername:".$admin_username." \nPassword:".$admin_password."  \nช่องทางการติดต่อ มือถือ: 080-992-6565 อีเมลล์: nn.it@hotmail.com";
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