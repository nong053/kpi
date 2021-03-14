<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

$kpi_year=$_GET['kpi_year'];
$appraisal_period_id=$_GET['appraisal_period_id'];
$department_id=$_GET['department_id'];
$position_id=$_GET['position_id'];
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
// if($emp_id!=""){
// 	$strSQL="
	
// 		select e.*,if(e.emp_status='single', 'โสด', 'สมรส') as emp_status_th,pe.position_name,ROUND(sum(kr.score_final_percentage)/count(kr.appraisal_period_id),2) AS score_final_percentage,
// 		ROUND(sum(kr.score_sum_percentage )/count(kr.appraisal_period_id),2) as score_sum_percentage,
// 		ROUND(sum(kr.adjust_percentage)/count(kr.appraisal_period_id),2) as adjust_percentage,
// 		kr.adjust_reason,ap.appraisal_period_desc,
// 		(select max(threshold_begin) from threshold) as scoreTarget,e.emp_id from employee e
// 		INNER JOIN position_emp pe
// 		ON e.position_id=e.position_id
// 		INNER JOIN kpi_result kr
// 		ON e.emp_id=kr.emp_id
// 		INNER JOIN appraisal_period ap 
// 		ON ap.appraisal_period_id=kr.appraisal_period_id
// 		WHERE kr.kpi_year='$kpi_year'
// 		and (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
// 		and kr.department_id='$department_id'
// 		and kr.emp_id='$emp_id'
// 		and kr.approve_flag='Y'
// 		GROUP BY kr.emp_id
		
	
	
// 		";	
// }else{
	$strSQL="

	select e.*,if(e.emp_status='single', 'โสด', 'สมรส') as emp_status_th,pe.position_name,ROUND(sum(kr.score_final_percentage)/count(kr.appraisal_period_id),2) AS score_final_percentage,
	ROUND(sum(kr.score_sum_percentage )/count(kr.appraisal_period_id),2) as score_sum_percentage,
	ROUND(sum(kr.adjust_percentage)/count(kr.appraisal_period_id),2) as adjust_percentage,
	kr.adjust_reason,ap.appraisal_period_desc,
	(select max(threshold_begin) from threshold) as scoreTarget,e.emp_id from employee e
	INNER JOIN position_emp pe
	ON e.position_id=e.position_id
	INNER JOIN kpi_result kr
	ON e.emp_id=kr.emp_id
	INNER JOIN appraisal_period ap 
	ON ap.appraisal_period_id=kr.appraisal_period_id
		WHERE kr.kpi_year='$kpi_year'
		and (kr.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
		and (kr.department_id='$department_id' or 'All'='$department_id')
		and (kr.position_id='$position_id' or 'All'='$position_id')
		and (kr.emp_id='$emp_id' or 'All'='$emp_id')
		and kr.approve_flag='Y'
		GROUP BY kr.emp_id
		

		";
// }
$result=mysql_query($strSQL);
$htmlcontent="";
$appraisal_period_desc="";
if(!$result){
	echo mysql_error();
}		
while($rs=mysql_fetch_array($result)){
	//echo "emp_picture_thum=".$rs['emp_picture_thum']."<br>";
	if($appraisal_period_id=="All"){
		$appraisal_period_desc="ทั้งหมด";
	}else{
		$appraisal_period_desc=$rs['appraisal_period_desc'];
	}
	$htmlcontent.="  

				
			<h1 align=\"center\">ประเมินปี ".$kpi_year." / ".$appraisal_period_desc." / ".$rs['emp_first_name']." ".$rs['emp_last_name']." / ผลประเมิน <span style=\"color:#0D3DFF;\">".$rs['score_final_percentage']."%</span></h1>
			<hr>
			<h3><u>ข้อมูลส่วนตัว</u></h3>
			<div style=\"\">
			<table width='100%' class=\"table-striped\" border=\"\" spacing=\"\" >	
			<tr >
  				<td ><b>ชื่อ : </b> ".$rs['emp_first_name']."</td>
  				
  				<td ><b>นามสกุล : </b> ".$rs['emp_last_name']."</td>
  				
  			</tr>


  			<tr>
  				<td ><b>ตำแหน่ง : </b> ".$rs['position_name']."</td>
  				
  				<td ><b>อายุงาน : </b> ".dateDifference($rs['emp_age_working'],date("Y-m-d"))." ปี</td>
  				
  			</tr>
  			
        <tr>
  				<td><b>วันเดือนปีเกิด : </b> ".$rs['emp_date_of_birth']."</td>
  				
  				<td><b>อายุ : </b> ".$rs['emp_age']." ปี</td>
  				
  			</tr>
  			<tr>
  				<td><b>สถานนะภาพ : </b> ".$rs['emp_status_th']."</td>
  				
  				<td><b>อีเมลล์ : </b> ".$rs['emp_email']."</td>
  			
  			</tr>
  			<tr>
  				<td><b>เบอร์โทรศัพท์ : </b> ".$rs['emp_tel']."</td>
  				
  				<td><b>เบอร์มือถือ : </b> ".$rs['emp_mobile']."</td>
  				
  			</tr>
  			<tr>
  				<td><b>ที่อยู่ : </b> ".$rs['emp_adress']."</td>
  				<td><b>อำเภอ/เขต : </b> ".$rs['emp_district']."</td>
  				
  				
  			</tr>
  			<tr>
			  	<td><b>ตำบล/แขวง : </b> ".$rs['emp_sub_district']."</td>	
  				
  				
  				<td><b>จังหวัด : </b> ".$rs['emp_province']."</td>
  				
  			</tr>
  			
  			<tr>
  				<td><b>รหัสไปรษณี : </b> ".$rs['emp_postcode']."</td>
  				
  				
  				
  				
  			</tr>
  			
  		</table>
		</div>
		  <br>
		  <h3><u>ผลประเมินรายตัวชี้วัด</u></h3>
  		
  		";
	
  		$htmlcontent.="<table border=\"0.1\">
  			<thead>
  				<tr style=\"background-color:#ddd;\">
  					
  					<th width='60%'><div style=\"padding:5px; font-weight:bold; text-align:center;\">ชื่อตัวชี้วัด</div></th>
  					<th width='20%'><div style=\"padding:5px; font-weight:bold; text-align:center;\">ประเมินตนเอง</div></th>
  					<th width='20%'><div style=\"padding:5px; font-weight:bold; text-align:center;\">หัวหน้าประเมิน</div></th>
  					
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
				ifnull(round(sum(ak.emp_performance)/count(ak.appraisal_period_id),2),0.00) as 'emp_performence' ,
				round(sum(ak.performance)/count(ak.appraisal_period_id),2)  as 'chief_performence'
				from assign_evaluate_kpi ak
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
		  				
		  				<td width='60%'>".$rsKPI['kpi_name']."</td>
		  				<td width='20%'><div style=\"text-align:right;\">".$rsKPI['emp_performence']."%</div></td>
		  				<td width='20%'><div style=\"text-align:right;\">".$rsKPI['chief_performence']."%</div></td>
		  				
	  				</tr>";
				
  			}
  			
  			
  				
  				
  				
  			$htmlcontent.="</tbody>
  			
  		</table>
		  <br>
  		<table>
  			<tbody>
  				
  				<tr>";
				if($rs['adjust_reason']==""){  
					$htmlcontent.="<td><strong>ปรับคะแนน</strong></td>";
				}else{
					$htmlcontent.="<td><strong>ปรับคะแนน</strong>(".$rs['adjust_reason'].")</td>";
				}
  				$htmlcontent.="<td><div style=\"text-align:right;\">".$rs['adjust_percentage']."%</div></td>
  					
  				</tr>
  				<tr>
				  
  					<td><strong style=\"text-align:left; color:#0D3DFF\">ผลประเมิน</strong></td>
  					<td><div style=\"text-align:right; color:#0D3DFF\">".$rs['score_final_percentage']."%</div></td>
  					
  				</tr>
  			</tbody>
  		</table>
  		<hr>";
	
}
	//echo "content=";$htmlcontent;

// เพิ่มหน้าใน PDF 

$pdf->AddPage();
$htmlcontent=stripslashes($htmlcontent);
$htmlcontent=AdjustHTML($htmlcontent);
// สร้างเนื้อหาจาก  HTML code
$pdf->writeHTML($htmlcontent, true, 0, true, 0);
// เลื่อน pointer ไปหน้าสุดท้าย
$pdf->lastPage();
// ปิดและสร้างเอกสาร PDF
$pdf->Output('evaluate-kpi-bsc.pdf', 'I');
?>