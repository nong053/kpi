<?
include '../Model/config.php';
$strSQL="

		select e.emp_picture_thum,e.emp_id,e.emp_name,pe.position_name,kr.score_final_percentage,
e.position_id,e.emp_email,e.emp_age,e.emp_other,e.emp_tel,kr.score_sum_percentage,
kr.adjust_percentage,kr.adjust_reason,
(select max(threshold_begin) from threshold) as scoreTarget,e.emp_id from employee e
		INNER JOIN position_emp pe
		ON e.position_id=pe.position_id
		INNER JOIN kpi_result kr
		ON e.emp_id=kr.emp_id
		WHERE kr.kpi_year='2012'
		and kr.appraisal_period_id='11'
		and kr.department_id='9'

		";
$result=mysql_query($strSQL);
$htmlcontent="";


?>
		
<?php 				
while($rs=mysql_fetch_array($result)){
	//echo "emp_picture_thum=".$rs['emp_picture_thum']."<br>";
	
	$htmlcontent.="<table class=\"table-striped\" border=\"0\" spacing=\"0\" style=\"margin-top:5px;margin-left:20px\">	
			<tr>
  				<td ><b>ชื่อ</b></td>
  				<td>".$rs['emp_name']."</td>
  				<td ><b>นามสกุล</b></td>
  				<td> อารมณ์สวะ</td>
  			</tr>
  			<tr>
  				<td ><b>ตำแหน่ง</b></td>
  				<td>".$rs['position_name']."</td>
  				<td ><b>อายุการทำางาน</b></td>
  				<td>3 ปี</td>
  			</tr>
  			<tr>
  				<td><b>วันเดือนปีเกิด</b></td>
  				<td>26/05/29</td>
  				<td><b>อายุ</b></td>
  				<td>".$rs['emp_age']." ปี</td>
  			</tr>
  			<tr>
  				<td><b>สถานนะ</b></td>
  				<td>สมรส</td>
  				<td><b>อีเมลล์</b></td>
  				<td>".$rs['emp_email']."</td>
  			</tr>
  			<tr>
  				<td><b>เบอร์บ้าน</b></td>
  				<td>024445566</td>
  				<td><b>เบอร์มือถือ</b></td>
  				<td>".$rs['emp_tel']."</td>
  			</tr>
  			<tr>
  				<td><b>ที่อยู่</b></td>
  				<td>688/168 หมู่บ้านรื่นฤดี5</td>
  				<td><b>ตำบล/แขวง</b></td>
  				<td>คันนายาว</td>
  			</tr>
  			<tr>
  				<td><b>อำเภอ/เขต</b></td>
  				<td>มีนบุรี</td>
  				<td><b>จังหวัด</b></td>
  				<td>กรุงเทพ</td>
  			</tr>
  			
  			<tr>
  				<td><b>รหัสไปรษณี</b></td>
  				<td>10520</td>
  				<td><b>รหัสพนักงาน</b></td>
  				<td>".$rs['emp_id']."</td>
  				
  			</tr>
  			
  		</table>
  		";
	
  		$htmlcontent.="<table>
  			<thead>
  				<tr>
  					<th><strong>KPI CODE</strong></th>
  					<th><strong>KPI Name</strong></th>
  					<th><strong>KPI Target</strong></th>
  					<th><strong>KPI Actual</strong></th>
  					<th><strong>KPI Perfomance</strong></th>
  				</tr>
  			</thead>
  			<tbody>
  			";
  			
  			$strSQLKpi="
  			
				select kpi.kpi_id as 'kpi_code' ,kpi.kpi_name as 'kpi_name' ,
				ak.target_data as 'kpi_target' ,ak.kpi_actual_manual as 'kpi_actual' ,
				ak.performance  as 'kpi_performence'
				from assign_kpi ak
				inner JOIN kpi
				ON ak.kpi_id=kpi.kpi_id
				where ak.assign_kpi_year='2012'
				and ak.appraisal_period_id='11'
				and ak.emp_id='$rs[emp_id]'
				and ak.admin_id='198'
  			
		";
  			$resultKpi=mysql_query($strSQLKpi);
  			while($rsKPI=mysql_fetch_array($resultKpi)){
				//echo $rsKPI['kpi_code'];
  				
	  				$htmlcontent.="
  					<tr>
		  				<td>".$rsKPI['kpi_code']."</td>
		  				<td>".$rsKPI['kpi_name']."</td>
		  				<td>".$rsKPI['kpi_target']."</td>
		  				<td>".$rsKPI['kpi_actual']."</td>
		  				<td>".$rsKPI['kpi_performence']."</td>
	  				</tr>";
				
  			}
  			
  			
  				
  				
  				
  			$htmlcontent.="</tbody>
  			
  		</table>
  		<table>
  			<tbody>
  				<tr>
  					<td><strong> Perfomance</strong></td>
  					<td>".$rs['score_sum_percentage']."%</td>
  				</tr>
  				<tr>
  					<td><strong>จิตพิสัย</strong></td>
  					<td>".$rs['adjust_percentage']."%</td>
  					
  				</tr>
  				<tr>
  					<td><strong>Total</strong></td>
  					<td>".$rs['score_final_percentage']."%</td>
  					
  				</tr>
  			</tbody>
  		</table>";
	
} 
//echo $htmlcontent;
$strSQLKpi="
  	
				select * from assign_kpi
  	
		";
$resultKpi=mysql_query($strSQLKpi);
while($rsKPI=mysql_fetch_array($resultKpi)){
	//echo $rsKPI['kpi_code'];

	  	

}
	