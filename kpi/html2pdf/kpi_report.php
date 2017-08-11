<? session_start(); ob_start();

$kpi_year=$_GET['kpi_year'];
$appraisal_period_id=$_GET['appraisal_period_id'];
$department_id=$_GET['department_id'];
$emp_id=$_GET['emp_id'];
$admin_id=$_SESSION['admin_id'];
/*
$kpi_year=2012;
$appraisal_period_id=11;
$department_id=9;
$admin_id=186;
$emp_id=82;
*/
require_once("setPDFKPIReport.php");
include '../Model/config.php';
if($emp_id!=""){
	$strSQL="
	
		select e.*,pe.position_name,ROUND(sum(kr.score_final_percentage)/count(kr.appraisal_period_id),2) AS score_final_percentage,
		ROUND(sum(kr.score_sum_percentage )/count(kr.appraisal_period_id),2) as score_sum_percentage,
		ROUND(sum(kr.adjust_percentage)/count(kr.appraisal_period_id),2) as adjust_percentage,
		kr.adjust_reason,ap.appraisal_period_desc,
		(select max(threshold_begin) from threshold) as scoreTarget,e.emp_id from employee e
		INNER JOIN position_emp pe
		ON e.position_id=pe.position_id
		INNER JOIN kpi_result kr
		ON e.emp_id=kr.emp_id
		INNER JOIN appraisal_period ap 
		ON ap.appraisal_period_id=kr.appraisal_period_id
		WHERE kr.kpi_year='$kpi_year'
		and (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
		and kr.department_id='$department_id'
		and kr.emp_id='$emp_id'
		and kr.approve_flag='Y'
		GROUP BY kr.emp_id
		
	
	
		";	
}else{
	$strSQL="

		select e.*,pe.position_name,ROUND(sum(kr.score_final_percentage)/count(kr.appraisal_period_id),2) AS score_final_percentage,
		ROUND(sum(kr.score_sum_percentage )/count(kr.appraisal_period_id),2) as score_sum_percentage,
		ROUND(sum(kr.adjust_percentage)/count(kr.appraisal_period_id),2) as adjust_percentage,
		kr.adjust_reason,ap.appraisal_period_desc,
		(select max(threshold_begin) from threshold) as scoreTarget,e.emp_id from employee e
		INNER JOIN position_emp pe
		ON e.position_id=pe.position_id
		INNER JOIN kpi_result kr
		ON e.emp_id=kr.emp_id
		INNER JOIN appraisal_period ap 
		ON ap.appraisal_period_id=kr.appraisal_period_id
		WHERE kr.kpi_year='$kpi_year'
		and (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
		and kr.department_id='$department_id'
		and kr.approve_flag='Y'
		GROUP BY kr.emp_id
		

		";
}
$result=mysql_query($strSQL);
$htmlcontent="";
$appraisal_period_desc="";
		
while($rs=mysql_fetch_array($result)){
	//echo "emp_picture_thum=".$rs['emp_picture_thum']."<br>";
	if($appraisal_period_id=="All"){
		$appraisal_period_desc="ทั้งหมด";
	}else{
		$appraisal_period_desc=$rs['appraisal_period_desc'];
	}
	$htmlcontent.="
			<table class=\"table-striped\" border=\"1\" spacing=\"0\" style=\"margin-top:5px;margin-left:20px\">	
			<tr>
  				<td ><b>ปีการประเมิน</b></td>
  				<td><b>".$kpi_year."</b></td>
  				<td ><b>รอบการประเมิน</b></td>
  						
  				<td> <b>".$appraisal_period_desc."</b></td>
  			</tr>
  			</table>
  			<br>
			<table class=\"table-striped\" border=\"1\" spacing=\"0\" style=\"margin-top:5px;margin-left:20px\">	
			<tr>
  				<td ><b>ชื่อ</b></td>
  				<td>".$rs['emp_first_name']."</td>
  				<td ><b>นามสกุล</b></td>
  				<td>".$rs['emp_last_name']."</td>
  			</tr>
  			<tr>
  				<td ><b>ตำแหน่ง</b></td>
  				<td>".$rs['position_name']."</td>
  				<td ><b>อายุการทำางาน</b></td>
  				<td>".$rs['emp_age_working']." ปี</td>
  			</tr>
  			<tr>
  				<td><b>วันเดือนปีเกิด</b></td>
  				<td>".$rs['emp_date_of_birth']."</td>
  				<td><b>อายุ</b></td>
  				<td>".$rs['emp_age']." ปี</td>
  			</tr>
  			<tr>
  				<td><b>สถานนะ</b></td>
  				<td>".$rs['emp_status']."</td>
  				<td><b>อีเมลล์</b></td>
  				<td>".$rs['emp_email']."</td>
  			</tr>
  			<tr>
  				<td><b>เบอร์บ้าน</b></td>
  				<td>".$rs['emp_tel']."</td>
  				<td><b>เบอร์มือถือ</b></td>
  				<td>".$rs['emp_mobile']."</td>
  			</tr>
  			<tr>
  				<td><b>ที่อยู่</b></td>
  				<td>".$rs['emp_adress']."</td>
  				<td><b>ตำบล/แขวง</b></td>
  				<td>".$rs['emp_sub_district']."</td>
  			</tr>
  			<tr>
  				<td><b>อำเภอ/เขต</b></td>
  				<td>".$rs['emp_district']."</td>
  				<td><b>จังหวัด</b></td>
  				<td>".$rs['emp_province']."</td>
  			</tr>
  			
  			<tr>
  				<td><b>รหัสไปรษณี</b></td>
  				<td>".$rs['emp_postcode']."</td>
  				<td><b>รหัสพนักงาน</b></td>
  				<td>".$rs['emp_id']."</td>
  				
  			</tr>
  			
  		</table>
  		<br>
  		";
	
  		$htmlcontent.="<table border=\"1\">
  			<thead>
  				<tr>
  					<th width='10%'><strong>KPI CODE</strong></th>
  					<th width='50%'><strong>KPI Name</strong></th>
  					<th width='20%'><strong>KPI Target</strong></th>
  					<th width='20%'><strong>KPI Actual</strong></th>
  					
  				</tr>
  			</thead>
  			<tbody>
  			";
  		/*
  		$kpi_year=2012;
  		$appraisal_period_id=11;
  		$department_id=9;
  		$admin_id=186;
  		*/
  			$strSQLKpi="
  			
  			select kpi.kpi_id as 'kpi_code' ,kpi.kpi_name as 'kpi_name' ,
				ak.target_data as 'kpi_target' ,
				round(sum(ak.kpi_actual_manual)/count(ak.appraisal_period_id),2) as 'kpi_actual' ,
				round(sum(ak.performance)/count(ak.appraisal_period_id),2)  as 'kpi_performence'
				from assign_kpi ak
				inner JOIN kpi
				ON ak.kpi_id=kpi.kpi_id
				INNER JOIN kpi_result kr on ak.assign_kpi_year=kr.kpi_year
				and ak.appraisal_period_id=kr.appraisal_period_id
				and ak.department_id=kr.department_id
				and ak.emp_id=kr.emp_id

				where ak.assign_kpi_year='$kpi_year'
				and (ak.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
				and ak.emp_id='$rs[emp_id]'
				and kr.approve_flag='Y'
GROUP BY kpi.kpi_id


				
				
  			
		";
  			$resultKpi=mysql_query($strSQLKpi);
  			while($rsKPI=mysql_fetch_array($resultKpi)){
				//echo $rsKPI['kpi_code'];
  				
	  				$htmlcontent.="
  					<tr>
		  				<td width='10%'>".$rsKPI['kpi_code']."</td>
		  				<td width='50%'>".$rsKPI['kpi_name']."</td>
		  				<td width='20%'>".$rsKPI['kpi_target']."</td>
		  				<td width='20%'>".$rsKPI['kpi_actual']."</td>
		  				
	  				</tr>";
				
  			}
  			
  			
  				
  				
  				
  			$htmlcontent.="</tbody>
  			
  		</table>
  		<table>
  			<tbody>
  				<tr>
  					<td><strong> Perfomance</strong></td>
  					<td>".$rs['score_sum_percentage']."%</td>
  					<td></td>
  					<td></td>
  				</tr>
  				<tr>
  					<td><strong>Adjust</strong></td>
  					<td>".$rs['adjust_percentage']."%</td>
  					<td></td>
  					<td></td>
  				</tr>
  				<tr>
  					<td><strong>Total</strong></td>
  					<td>".$rs['score_final_percentage']."%</td>
  					<td></td>
  					<td></td>
  				</tr>
  			</tbody>
  		</table>
  							<hr>
  							";
	
} 
	//echo $htmlcontent;

// เพิ่มหน้าใน PDF 

$pdf->AddPage();
// กำหนด HTML code หรือรับค่าจากตัวแปรที่ส่งมา
//	กรณีกำหนดโดยตรง
//	ตัวอย่าง กรณีรับจากตัวแปร
// $htmlcontent =$_POST['HTMLcode'];


$htmlcontent=stripslashes($htmlcontent);
$htmlcontent=AdjustHTML($htmlcontent);



// สร้างเนื้อหาจาก  HTML code
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

// เลื่อน pointer ไปหน้าสุดท้าย
$pdf->lastPage();

// ปิดและสร้างเอกสาร PDF
$pdf->Output('test.pdf', 'I');
?>