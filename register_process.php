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
				$position_id="";
				$department_id="";
				$perspective_id="";
				if($num=$result->num_rows){
					$rs=$result->fetch_assoc();


					//Example Period data start
					$strSQLPeriod="INSERT INTO appraisal_period(appraisal_period_year,appraisal_period_desc,appraisal_period_start,appraisal_period_end,appraisal_period_target_percentage,admin_id)
					VALUES(YEAR(CURDATE()),'ครั้งที่1',now(),now(),'80','$rs[admin_id]'),
					(YEAR(CURDATE()),'ครั้งที่2',now(),now(),'80','$rs[admin_id]'),
					(YEAR(CURDATE()),'ครั้งที่3',now(),now(),'80','$rs[admin_id]'),
					(YEAR(CURDATE()),'ครั้งที่4',now(),now(),'80','$rs[admin_id]')
					";
					$rsPeriod=$conn->query($strSQLPeriod);
					if($rsPeriod){
						//echo'["success"]';
					}else{
						//echo'["error"]';
						echo'appraisal_period '.$conn->error;
					}
					//Example Period data end
					//Example perspective data start
					$strSQLPerspective="INSERT INTO perspective(perspective_name,perspective_weight,admin_id)
					VALUES('พัฒนาบุคคลากร','25','$rs[admin_id]'),
					('ด้านลูกค้า','25','$rs[admin_id]'),
					('การเงิน','25','$rs[admin_id]'),
					('การเรียนรู้และการเติบโต','25','$rs[admin_id]')
					";
					$rsPerspective=$conn->query($strSQLPerspective);
					if($rsPerspective){
						//echo'["success"]';
						$strSQLSelectPerspective="select * from perspective where admin_id='$rs[admin_id]' order by perspective_id";
						$resultSelectPerspective=$conn->query($strSQLSelectPerspective);
						if($numSelectPerspective=$resultSelectPerspective->num_rows){
							$rsSelectPerspective=$resultSelectPerspective->fetch_assoc();
							$perspective_id=$rsSelectPerspective['perspective_id'];
						}

					}else{
						echo'perspective '.$conn->error;
					}
					//Example perspective data end

					//Example department data start
					
					$strSQLDepartment="INSERT INTO department(department_code,department_name,department_detail,admin_id)
					VALUES('D001','ฝ่ายเงิน','ฝ่ายการเงิน','$rs[admin_id]'),
					('D002','ฝ่ายตลาด','ฝ่ายการตลาด','$rs[admin_id]'),
					('D003','ฝ่ายบัญชี','ฝ่ายบัญชี','$rs[admin_id]'),
					('D004','ฝ่ายไอที','ฝ่ายไอที','$rs[admin_id]')
					";
					$rsDepartment=$conn->query($strSQLDepartment);
					if($rsDepartment){
						//echo'["success"]';
						$strSQLSelectDepartment="select * from department where admin_id='$rs[admin_id]' order by department_code";
						$resultSelectDepartment=$conn->query($strSQLSelectDepartment);
						if($numSelectDepartment=$resultSelectDepartment->num_rows){
							$rsSelectDepartment=$resultSelectDepartment->fetch_assoc();
							$department_id=$rsSelectDepartment['department_id'];
						}

					}else{
						echo'department '.$conn->error;
					}
					//Example department data end
					//Example position data start
					
					$strSQLPosiion="INSERT INTO position_emp(position_name,admin_id,role_id)
					VALUES('ผู้บริหาร','$rs[admin_id]','1'),
					('หัวหน้าแผนก','$rs[admin_id]','2'),
					('พนักงานทั่วไป','$rs[admin_id]','3')
					";
					$rsPosiion=$conn->query($strSQLPosiion);
					if($rsPosiion){
						//echo'["success"]';
						$strSQLSelectPosiion="select * from position_emp where admin_id='$rs[admin_id]' order by role_id";
						$resultSelectPosiion=$conn->query($strSQLSelectPosiion);
						if($numSelectPosiion=$resultSelectPosiion->num_rows){
							$rsSelectPosiion=$resultSelectPosiion->fetch_assoc();
							$position_id=$rsSelectPosiion['position_id'];
						}
					}else{
						echo "position_emp ".$conn->error;
					}
					//Example position data end

					//Example Employee data start
					$strSQLEmp="INSERT INTO employee(emp_user,emp_pass,emp_tel,emp_mobile,emp_age,emp_email,position_id,emp_other,emp_picture,emp_picture_thum,department_id,role_id,admin_id,
						emp_first_name,emp_last_name,emp_date_of_birth,emp_age_working,emp_status,emp_adress,emp_district,emp_sub_district,emp_province,emp_postcode,emp_status_work_id,emp_code)
						VALUES(
						'user001',md5('user001'),'020000000','0800000000','20','test001@gmail.com','$position_id','อื่นๆ','','','$department_id','3','$rs[admin_id]',
						'ไกรสร','คงไว้',now(),'10','single','553/80','เขตบางกะปิ','คลองจั่น','กทม.','10210','1','EM001'
						),(
						'user002',md5('user002'),'020000000','0800000000','20','test001@gmail.com','$position_id','อื่นๆ','','','$department_id','3','$rs[admin_id]',
						'วรเวช','อยู่เจริญ',now(),'10','single','554/80','เขตบางกะปิ','คลองจั่น','กทม.','10210','1','EM002'
						),(
						'user003',md5('user003'),'020000000','0800000000','20','test001@gmail.com','$position_id','อื่นๆ','','','$department_id','3','$rs[admin_id]',
						'เธียรธาร','คันโธสา',now(),'10','single','555/80','เขตบางกะปิ','คลองจั่น','กทม.','10210','1','EM003'
						),(
						'user004',md5('user004'),'020000000','0800000000','20','test001@gmail.com','$position_id','อื่นๆ','','','$department_id','2','$rs[admin_id]',
						'ศิริพร','สิงห์ทองกล้า',now(),'10','single','556/80','เขตบางกะปิ','คลองจั่น','กทม.','10210','1','EM004'
						),(
						'user005',md5('user005'),'020000000','0800000000','20','test001@gmail.com','$position_id','อื่นๆ','','','$department_id','1','$rs[admin_id]',
						'บูรณา','คงไว้',now(),now(),'single','557/80','เขตบางกะปิ','คลองจั่น','กทม.','10210','1','EM005'
						)";
						$rsEmp=$conn->query($strSQLEmp);
						if($rsEmp){
							//echo'["success"]';
						}else{
							echo "employee ".$conn->error;;
						}
					//Example Employee data end


					//Example kpi data start
					//KPI1
					$strSQL_KPI1="INSERT INTO kpi(kpi_name,kpi_better_flag,kpi_detail,admin_id,kpi_type_score,kpi_data_target,perspective_id)
					VALUES('ความพึงพอใจของผู้ใช้บริหาร','Y','','$rs[admin_id]','2','5','$perspective_id')";
					$rs_KPI1=$conn->query($strSQL_KPI1);
					$id_KPI1 = $conn -> insert_id;
					if($rs_KPI1){
						$strSQL1_KPI1="
						INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
						VALUES('0','0','0 ','$id_KPI1','ไม่ผ่าน');
						";
						$conn->query($strSQL1_KPI1);

						$strSQL2_KPI1="
						INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
						VALUES('1','1','1','$id_KPI1','ต่ำกว่าเกณฑ์');
						";
						$conn->query($strSQL2_KPI1);

						$strSQL3_KPI1="
						INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
						VALUES('2','2','2','$id_KPI1','ผ่านเกณฑ์ขั้นต่ำ');
						";
						$conn->query($strSQL3_KPI1);

						$strSQL4_KPI1="
						INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
						VALUES('3','3','3','$id_KPI1','น่าพอใจ');
						";
						$conn->query($strSQL4_KPI1);

						$strSQL5_KPI1="
						INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
						VALUES('4','4','4','$id_KPI1','ดี');
						";
						$conn->query($strSQL5_KPI1);
					

						$strSQL6_KPI1="
						INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
						VALUES('5','5','5 ','$id_KPI1','ดีมาก');
						";
						$conn->query($strSQL6_KPI1);
					}

					//KPI2
					$strSQL_KPI2="INSERT INTO kpi(kpi_name,kpi_better_flag,kpi_detail,admin_id,kpi_type_score,kpi_data_target,perspective_id)
					VALUES('ความรวดเร็วในการให้บริการ','Y','','$rs[admin_id]','2','5','$perspective_id')";
					$rs_KPI2=$conn->query($strSQL_KPI2);
					$id_KPI2 = $conn -> insert_id;
					if($rs_KPI2){
						$strSQL1_KPI2="
						INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
						VALUES('0','0','0 ','$id_KPI2','ไม่ผ่าน');
						";
						$conn->query($strSQL1_KPI2);

						$strSQL2_KPI2="
						INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
						VALUES('1','1','1','$id_KPI2','ต่ำกว่าเกณฑ์');
						";
						$conn->query($strSQL2_KPI2);

						$strSQL3_KPI2="
						INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
						VALUES('2','2','2','$id_KPI2','ผ่านเกณฑ์ขั้นต่ำ');
						";
						$conn->query($strSQL3_KPI2);

						$strSQL4_KPI2="
						INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
						VALUES('3','3','3','$id_KPI2','น่าพอใจ');
						";
						$conn->query($strSQL4_KPI2);

						$strSQL5_KPI2="
						INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
						VALUES('4','4','4','$id_KPI2','ดี');
						";
						$conn->query($strSQL5_KPI2);
					

						$strSQL6_KPI2="
						INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
						VALUES('5','5','5 ','$id_KPI2','ดีมาก');
						";
						$conn->query($strSQL6_KPI2);
					}

	

			

		
			

		



	
					//Example kpi data end


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

					echo '{"status":"200","admin_username":"'.$rs['admin_username'].'"}';
				}
				
			}
	
		}
	}
}


//header("Location: index.php?page=admin");
//echo"<script>window.location=\"login.php\";</script>";

?>