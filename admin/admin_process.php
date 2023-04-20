<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
require("../config.inc.php");
$admin_id = $_POST['admin_id'];
$admin_name = trim($_POST['admin_name']);
$admin_surname = trim($_POST['admin_surname']);
$admin_username = trim($_POST['admin_username']);
$admin_company = trim($_POST['admin_company']);
$admin_tel = trim($_POST['admin_tel']);


$admin_email = trim($_POST['admin_email']);
$admin_website = trim($_POST['admin_website']);
$admin_send_email = trim($_POST['admin_send_email']);

$admin_password = trim($_POST['admin_password']);
$admin_status = $_POST['admin_status'];
$expired_date = $_POST['expired_date'];
$package = $_POST['package'];
$activated = $_POST['activated'];



$action = $_POST['action'];
/*
echo "admin_name".$admin_name."<br>";
echo "admin_surname".$admin_surname."<br>";
echo "admin_username".$admin_username."<br>";
echo "admin_password".$admin_password."<br>";
*/	if($action=='add'){
		if( ($admin_name == "") || ($admin_surname == "") || ($admin_username == "") || ($admin_password == "") ){
			
			?>
			<script>
				alert("กรอกข้อมูลไม่ครบ !");
				window.history.back();
			</script>
			<?php
			exit();
			
		}
	}else{
		if( ($admin_name == "") || ($admin_surname == "") || ($admin_username == "") ){
			
			?>
			<script>
				alert("กรอกข้อมูลไม่ครบ !");
				window.history.back();
			</script>
			<?php
			exit();
			
		}
	}
		switch($action){			
			case 'edit' :

				if($admin_password!=""){
					$admin_password=md5($admin_password);
				}
				$sql="UPDATE admin SET admin_name='$admin_name', admin_surname='$admin_surname', admin_password='$admin_password', admin_status='$admin_status',admin_email='$admin_email',admin_tel='$admin_tel',admin_website='$admin_website',admin_send_email='$admin_send_email',expired_date='$expired_date',activated='$activated',package='$package',admin_company='$admin_company' WHERE admin_id='$admin_id'";
				$conn->query($sql)or die ($conn->error);
				break;
			case 'add' :
				$sql="select * from admin where admin_username='$admin_username'";
				$table=$conn->query($sql) or die($conn->error);
				if($row=$table->fetch_assoc()){
					?>
					<script>
						alert("ชื่อผู้ใช้นี้มีอยู่ในระบบแล้ว !");
						window.history.back();
					</script>
					<?php
					exit();	
				}
				$sql="INSERT INTO admin (admin_name, admin_surname, admin_username, admin_password, admin_status,admin_email,admin_website,admin_send_email,admin_tel,expired_date,activated,package ) VALUES ('$admin_name', '$admin_surname', '$admin_username', '$admin_password', '$admin_status','$admin_email','$','$admin_website','$admin_send_email','$expired_date','$activated','$package')";
				$conn->query($sql)or die ($conn->error);
				break;
			default	:
			
				echo"<script>window.location=\"index.php?page=admin\";</script>";
				break;
		}


echo"<script>window.location=\"index.php?page=admin\";</script>";
?>