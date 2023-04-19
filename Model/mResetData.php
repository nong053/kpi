<?php session_start(); ob_start();?>

<?php
include './../config.inc.php';

/*
//PHP Code: อันนี้แบบลบทุกอย่างใน Table เลย
TRUNCATE TABLE tbl_name  

but, if you mean just reset the auto_increment value:
[php]//PHP Code: อันนี้ไว้ set ค่า AUTO_INCREMENT 
ALTER TABLE theTableInQuestion AUTO_INCREMENT=1234  
*/


// Convert JSON string to Array
/*
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){
*/
	
//assign_kpi
$copyForm=$_POST['vCoppyForm'];
$copyTo=$_POST['vCoppyTo'];



if($_POST['action']=='appraisal_period'){
  $strSQLDel="delete from appraisal_period where admin_id='$copyTo'";
  $resultDel= $conn->query($strSQLDel);
  if(!$resultDel){
  	echo '["notSuccess"]';
  }else{
		  	$strSQL="INSERT INTO appraisal_period (appraisal_period_year,
				appraisal_period_desc,appraisal_period_start,appraisal_period_end,
				appraisal_period_target_percentage,admin_id
			)
			SELECT appraisal_period_year,
					appraisal_period_desc,appraisal_period_start,appraisal_period_end
					appraisal_period_end,appraisal_period_target_percentage,".$copyTo." FROM appraisal_period
					WHERE admin_id='$copyForm'; ";
			$result= $conn->query($strSQL);
			if(!$result){
				echo '["notSuccess"]';
			}else{
				echo '["success"]';
			}
  }
  
  
}
if($_POST['action']=='assign_kpi'){
	$strSQLDel="delete from assign_kpi where admin_id='$copyTo'";
	$resultDel= $conn->query($strSQLDel);
	if(!$resultDel){
		echo '["notSuccess"]';
	}else{
		$strSQL="INSERT INTO assign_kpi(
				assign_kpi_year,
				appraisal_period_id,
				kpi_id,
				department_id,
				position_id,
				emp_id,
				kpi_weight,
				kpi_type_actual,
				kpi_actual_query,
				kpi_actual_manual,
				target_data,
				target_score,
				total_kpi_actual_score,
				kpi_actual_score,
				performance,
				admin_id
				)
							
				SELECT 
				assign_kpi_year,

				(select appraisal_period_id from appraisal_period ap2 where ap2.admin_id=$copyTo
				AND ap2.appraisal_period_desc=ap1.appraisal_period_desc and ap2.appraisal_period_year=ap1.appraisal_period_year
			 order by 1) as appraisal_period_id,

				/*kpi_id,*/
				(select kpi_id from kpi k2 where k2.kpi_name=k1.kpi_name and k2.admin_id='$copyTo') as kpi_id,

				/*department_id,*/
				(select department_id from department d2 where d2.department_name=d1.department_name and d2.admin_id='$copyTo') as department_id,

				/*position_id,*/
				(select position_id from position_emp pe2 where pe2.position_name=pe1.position_name and pe2.admin_id='$copyTo') as position_id,

				/*emp_id,*/
				(select emp_id from employee e2 where e2.emp_first_name=e1.emp_first_name and e2.emp_last_name=e1.emp_last_name
				and e2.admin_id='$copyTo') as emp_id,

				kpi_weight,
				kpi_type_actual,
				kpi_actual_query,
				kpi_actual_manual,
				target_data,
				target_score,
				total_kpi_actual_score,
				kpi_actual_score,
				performance,
				'$copyTo'
				FROM assign_kpi ap

				INNER JOIN department d1
				on ap.department_id=d1.department_id
				INNER JOIN position_emp pe1
				on pe1.position_id=ap.position_id
				INNER JOIN kpi k1
				on ap.kpi_id=k1.kpi_id
				INNER JOIN appraisal_period ap1
				on ap.appraisal_period_id=ap1.appraisal_period_id
				INNER JOIN employee e1
				on ap.emp_id=e1.emp_id
				WHERE ap.admin_id='$copyForm'; 
				
				";
		$result= $conn->query($strSQL);
		if(!$result){
			echo '["notSuccess"]';
		}else{
			echo '["success"]';
		}
	}


}

if($_POST['action']=='assign_kpi_master'){
	$strSQLDel="delete from assign_kpi_master where admin_id='$copyTo'";
	$resultDel= $conn->query($strSQLDel);
	if(!$resultDel){
		echo '["notSuccess1"]';
		
	}else{
		$strSQL="INSERT INTO assign_kpi_master(
				assign_kpi_year,
				appraisal_period_id,
				kpi_id,
				department_id,
				position_id,
				kpi_weight,
				kpi_type_actual,
				kpi_actual_query,
				kpi_actual_manual,
				target_data,
				target_score,
				total_kpi_actual_score,
				kpi_actual_score,
				performance,
				confirm_flag,
				admin_id
				)
							
				SELECT assign_kpi_year,
				
				
				(select appraisal_period_id from appraisal_period ap2 where ap2.admin_id='$copyTo'
				AND ap2.appraisal_period_desc=ap1.appraisal_period_desc and ap2.appraisal_period_year=ap1.appraisal_period_year
			 	order by 1) as appraisal_period_id,

			
				(select kpi_id from kpi k2 where k2.kpi_name=k1.kpi_name and k2.admin_id='$copyTo') as kpi_id,

			
				(select department_id from department d2 where d2.department_name=d1.department_name and d2.admin_id='$copyTo') as department_id,

				
				(select position_id from position_emp pe2 where pe2.position_name=pe1.position_name and pe2.admin_id='$copyTo') as position_id,
				
				kpi_weight,
				kpi_type_actual,
				kpi_actual_query,
				kpi_actual_manual,
				target_data,
				target_score,
				total_kpi_actual_score,
				kpi_actual_score,
				performance,
				confirm_flag,
				".$copyTo."
				FROM assign_kpi_master akm
				INNER JOIN department d1
				on akm.department_id=d1.department_id
				INNER JOIN position_emp pe1
				on pe1.position_id=akm.position_id
				INNER JOIN kpi k1
				on akm.kpi_id=k1.kpi_id
				INNER JOIN appraisal_period ap1
				on akm.appraisal_period_id=ap1.appraisal_period_id
				WHERE akm.admin_id='$copyForm';
				
		";
		$result= $conn->query($strSQL);
		if(!$result){
			echo '["notSuccess2"]';
			//echo $conn->error;
		}else{
			echo '["success"]';
		}
	}


}
if($_GET['action']=='assign_kpi_master_test'){

	$strSQLDel="delete from assign_kpi_master where admin_id=198";
	$resultDel= $conn->query($strSQLDel);
	if(!$resultDel){
		echo '["notSuccess1"]';
		
	}else{
		echo "delete is ok <br>";
		$strSQL="
							
				
							
				SELECT assign_kpi_year,
				
				
				(select appraisal_period_id from appraisal_period ap2 where ap2.admin_id='198'
				AND ap2.appraisal_period_desc=ap1.appraisal_period_desc and ap2.appraisal_period_year=ap1.appraisal_period_year
			 	order by 1) as appraisal_period_id,

			
				(select kpi_id from kpi k2 where k2.kpi_name=k1.kpi_name and k2.admin_id='198') as kpi_id,

			
				(select department_id from department d2 where d2.department_name=d1.department_name and d2.admin_id='198') as department_id,

				
				(select position_id from position_emp pe2 where pe2.position_name=pe1.position_name and pe2.admin_id='198') as position_id,
				
				kpi_weight,
				kpi_type_actual,
				kpi_actual_query,
				kpi_actual_manual,
				target_data,
				target_score,
				total_kpi_actual_score,
				kpi_actual_score,
				performance,
				confirm_flag,
				'198' as copy_to
				FROM assign_kpi_master akm
				INNER JOIN department d1
				on akm.department_id=d1.department_id
				INNER JOIN position_emp pe1
				on pe1.position_id=akm.position_id
				INNER JOIN kpi k1
				on akm.kpi_id=k1.kpi_id
				INNER JOIN appraisal_period ap1
				on akm.appraisal_period_id=ap1.appraisal_period_id
				WHERE akm.admin_id='197';
		";
		$result= $conn->query($strSQL);
		if(!$result){
			echo '["notSuccess2"]';
			
		}else{

			while($rs=$result->fetch_assoc()){

				echo "assign_kpi_year=".$rs['assign_kpi_year']."<br>";
				echo "appraisal_period_id=".$rs['appraisal_period_id']."<br>";
				echo "kpi_id=".$rs['kpi_id']."<br>";
				echo "department_id=".$rs['department_id']."<br>";
				echo "position_id=".$rs['position_id']."<br>";

				echo "copy_to=".$rs['copy_to']."<br>";

				echo "kpi_weight=".$rs['kpi_weight']."<br>";
				echo "kpi_type_actual=".$rs['kpi_type_actual']."<br>";
				echo "kpi_actual_query=".$rs['kpi_actual_query']."<br>";
				echo "kpi_actual_manual=".$rs['kpi_actual_manual']."<br>";
				echo "target_data=".$rs['target_data']."<br>";
				echo "target_score=".$rs['target_score']."<br>";
				echo "total_kpi_actual_score=".$rs['total_kpi_actual_score']."<br>";
				echo "kpi_actual_score=".$rs['kpi_actual_score']."<br>";
				echo "performance=".$rs['performance']."<br>";
				echo "confirm_flag=".$rs['confirm_flag']."<br>";


				$sqlInsert="insert into assign_kpi_master(assign_kpi_year,appraisal_period_id,kpi_id)
				values()";




				echo "==================================="."<br>";
			}
			
		}
	}


}
if($_POST['action']=='department'){
	
	$strSQLDel="delete from department where admin_id='$copyTo'";
	$resultDel= $conn->query($strSQLDel);
	if(!$resultDel){
		echo '["notSuccess1"]';
	}else{
		$strSQL="INSERT INTO department(
				department_name,
				department_detail,
				admin_id
				)
				SELECT
				department_name,
				department_detail,
				".$copyTo."
				FROM department
				WHERE admin_id='$copyForm'; ";
		
		$result= $conn->query($strSQL);
		if(!$result){
			echo '["notSuccess2"]';
		}else{
			echo '["success"]';
		}
	}
	

}

if($_POST['action']=='employee'){

	$strSQLDel="delete from employee where admin_id='$copyTo'";
	$resultDel= $conn->query($strSQLDel);
	if(!$resultDel){
		echo '["notSuccess1"]';
	}else{
		$strSQL="INSERT INTO employee(
				emp_user,
				emp_pass,
				emp_picture_thum,
				emp_picture,
				emp_tel,
				emp_age,
				emp_name,
				emp_email,
				emp_other,
				position_id,
				department_id,
				emp_date_of_birth,
				emp_age_working,
				emp_last_name,
				emp_first_name,
				emp_status,
				emp_mobile,
				emp_adress,
				emp_district,
				emp_sub_district,
				emp_province,
				emp_postcode,
				emp_status_work_id,
				emp_code,
				admin_id
				
				
				)
				SELECT
				emp_user,
				emp_pass,
				emp_picture_thum,
				emp_picture,
				emp_tel,
				emp_age,
				emp_name,
				emp_email,
				emp_other,
				(select position_id from position_emp pe2 where pe2.position_name=pe1.position_name and pe2.admin_id='$copyTo') as position_id,
				(select department_id from department d2 where d2.department_name=d1.department_name and d2.admin_id='$copyTo') as department_id,
				emp_date_of_birth,
				emp_age_working,
				emp_last_name,
				emp_first_name,
				emp_status,
				emp_mobile,
				emp_adress,
				emp_district,
				emp_sub_district,
				emp_province,
				emp_postcode,
				emp_status_work_id,
				emp_code,
				".$copyTo."
				FROM employee e
				INNER JOIN department d1
				on e.department_id=d1.department_id
				INNER JOIN position_emp pe1
				on pe1.position_id=e.position_id
				WHERE e.admin_id='$copyForm'; ";

		$result= $conn->query($strSQL);
		if(!$result){
			//echo '["notSuccess2"]';
			echo $conn->error;
		}else{
			echo '["success"]';
		}
	}


}

if($_POST['action']=='kpi_bk'){

	$strSQLDel="delete from kpi where admin_id='$copyTo'";
	$resultDel= $conn->query($strSQLDel);
	if(!$resultDel){
		echo '["notSuccess1"]';
	}else{
		$strSQL="INSERT INTO kpi(
				kpi_name,
				kpi_detail,
				kpi_code,
				admin_id


				)
				SELECT
				kpi_name,
				kpi_detail,
				kpi_code,
				".$copyTo."
				FROM kpi
				WHERE admin_id='$copyForm'; ";

		$result= $conn->query($strSQL);
		if(!$result){
			echo '["notSuccess2"]';
		}else{
			echo '["success"]';
		}
	}


}
//if($_POST['action']=='kpi'){
if($_GET['action']=='kpi'){
	 $copyTo="197";
	 $copyForm="199";
	
	$message="";

	$strSQLDel="delete from kpi where admin_id='$copyTo'";
	$resultDel= $conn->query($strSQLDel);
	if(!$resultDel){
		echo '["notSuccess1"]';
	}else{

		//echo "ok";
		$strSQL="
				SELECT
				kpi_id,
				kpi_name,
				kpi_detail,
				kpi_code,
				".$copyTo." as admin_id,
				department_code
				FROM kpi
				WHERE admin_id='$copyForm'; ";

		$result= $conn->query($strSQL);
		while($rs= $result->fetch_assoc()){
			//echo "kpi_id=".$rs['kpi_id']."<br>";
			$strSQLInsert="
				INSERT INTO kpi(
				kpi_name,
				kpi_detail,
				kpi_code,
				admin_id,
				department_code
				)VALUES(
				'".$rs['kpi_name']."',
				'".$rs['kpi_detail']."',
				'".$rs['kpi_code']."',
				'".$rs['admin_id']."',
				'".$rs['department_code']."'
				)";

				$resultInsert=$conn->query($strSQLInsert);
				if($resultInsert){
					//echo "insert to baseline".mysql_insert_id()." <br>";
					// $strSQLInsertBaseline="select baseline_id,kpi_id,baseline_begin,
					// baseline_end,baseline_score,suggestion
					// from baseline
					// where kpi_id ='".$rs['kpi_code']."'";
					// $resultBaseline= $conn->query($strSQLInsertBaseline);
					$strSQLBaseLineDel="delete from baseline where kpi_id='".$rs['kpi_id']."'";
					$resultBaseLineDel= $conn->query($strSQLBaseLineDel);
					$strSQLBaseline="INSERT INTO baseline(
						
						kpi_id,
						baseline_begin,
						baseline_end,
						baseline_score,
						suggestion
						)
						SELECT

						
						".mysql_insert_id().",
						baseline_begin,
						baseline_end,
						baseline_score,
						suggestion

						FROM baseline
						WHERE kpi_id='".$rs['kpi_id']."' ";

						

					$resultBaseline= $conn->query($strSQLBaseline);


					if($resultBaseline){
						//echo '["baselineSuccess"]';
						$message="[\"baselineSuccess\"]";
					}else{
						$message="[\"baselineNotSuccess\"]";
						echo $conn->error;

					}

				}else{
					echo $conn->error;
				}
			}

		echo $message;
	}


}

if($_POST['action']=='kpi_result'){

	$strSQLDel="delete from kpi_result where admin_id='$copyTo'";
	$resultDel= $conn->query($strSQLDel);
	if(!$resultDel){
		echo '["notSuccess1"]';
	}else{
		$strSQL="INSERT INTO kpi_result(
				kpi_year,
				appraisal_period_id,
				department_id,
				
				position_id,
				emp_id,
				adjust_percentage,
				adjust_reason,
				confirm_flag,
				approve_flag,
				score_sum_percentage,
				score_final_percentage,
				admin_id
				


				)
				
				
				
								SELECT
				kpi_year,
				(select appraisal_period_id from appraisal_period ap2 where ap2.admin_id=$copyTo
				AND ap2.appraisal_period_desc=ap1.appraisal_period_desc and ap2.appraisal_period_year=ap1.appraisal_period_year
			 order by 1) as appraisal_period_id,


				/*department_id,*/
				(select department_id from department d2 where d2.department_name=d1.department_name and d2.admin_id='$copyTo') as department_id,

				/*position_id,*/
				(select position_id from position_emp pe2 where pe2.position_name=pe1.position_name and pe2.admin_id='$copyTo') as position_id,

				/*emp_id,*/
				(select emp_id from employee e2 where e2.emp_first_name=e1.emp_first_name and e2.emp_last_name=e1.emp_last_name
				and e2.admin_id='$copyTo') as emp_id,

				adjust_percentage,
				adjust_reason,
				confirm_flag,
				approve_flag,
				score_sum_percentage,
				score_final_percentage,
				'$copyTo'
				FROM kpi_result kr

				INNER JOIN department d1
				on kr.department_id=d1.department_id
				INNER JOIN position_emp pe1
				on pe1.position_id=kr.position_id
				
				INNER JOIN appraisal_period ap1
				on kr.appraisal_period_id=ap1.appraisal_period_id
				INNER JOIN employee e1
				on kr.emp_id=e1.emp_id

				WHERE kr.admin_id='$copyForm'
				
				
				
				
				
			 ";

		$result= $conn->query($strSQL);
		if(!$result){
			echo '["notSuccess2"]';
			//echo $conn->error;
		}else{
			echo '["success"]';
		}
	}


}

if($_POST['action']=='position_emp'){

	$strSQLDel="delete from position_emp where admin_id='$copyTo'";
	$resultDel= $conn->query($strSQLDel);
	if(!$resultDel){
		echo '["notSuccess1"]';
	}else{
		$strSQL="INSERT INTO position_emp(
				position_name,
				role_id,
				admin_id



				)
				SELECT
				position_name,
				role_id,
				".$copyTo."
				FROM position_emp
				WHERE admin_id='$copyForm'; ";

		$result= $conn->query($strSQL);
		if(!$result){
			echo '["notSuccess2"]';
		}else{
			echo '["success"]';
		}
	}


}


if($_POST['action']=='threshold'){

	$strSQLDel="delete from threshold where admin_id='$copyTo'";
	$resultDel= $conn->query($strSQLDel);
	if(!$resultDel){
		echo '["notSuccess1"]';
	}else{
		$strSQL="INSERT INTO threshold(
				threshold_name,
				threshold_begin,
				threshold_end,
				threshold_color,
				admin_id
				



				)
				SELECT
				threshold_name,
				threshold_begin,
				threshold_end,
				threshold_color,
				".$copyTo."
				FROM threshold
				WHERE admin_id='$copyForm'; ";

		$result= $conn->query($strSQL);
		if(!$result){
			echo '["notSuccess2"]';
		}else{
			echo '["success"]';
		}
	}


}



/*

}else{
echo'{"status":"400","error":"not token."}';

}

*/



?>