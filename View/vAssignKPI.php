<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
	//description
	$_SESSION['kpi_result_l_des_title']="ประเมิน";
	$_SESSION['kpi_result_l_des_detail']="หัวหน้ากรอกผลการปฏิบัติงานให้กับพนักงาน";
	

	//Search
	$_SESSION['kpi_result_l_search_year']="ปีประเมิน";
	$_SESSION['kpi_result_l_search_appraisalPeriod']="ช่วงประเมิน";
	$_SESSION['kpi_result_l_search_department']="แผนก/ฝ่าย";
	$_SESSION['kpi_result_l_search_position']="ตำแหน่ง";
	$_SESSION['kpi_result_l_search_btn_search']="ตกลง";

	//column1
	//column1
	$_SESSION['kpi_result_emp_l_tbl_list']="พนักงาน";
	$_SESSION['kpi_result_emp_l_tbl_id']="#";
	$_SESSION['kpi_result_emp_l_tbl_pticture']="รูป";
	$_SESSION['kpi_result_emp_l_tbl_fullname']="ข้อมูลพนักงาน";
	$_SESSION['kpi_result_emp_l_tbl_department']="แผนก";
	$_SESSION['kpi_result_emp_l_tbl_position']="ระดับ";
	$_SESSION['kpi_result_emp_l_tbl_age']="อายุ";
	$_SESSION['kpi_result_emp_l_tbl_result']="สรุปผลการประเมิน";
	$_SESSION['kpi_result_emp_l_tbl_chief_result']="หัวหน้าประเมิน";
	$_SESSION['kpi_result_emp_l_tbl_emp_result']="ประเมินตนเอง";
	$_SESSION['kpi_result_emp_l_tbl_adjust_result']="ปรับคะแนน";
	
	
	$_SESSION['kpi_result_emp_l_tbl_manage']="จัดการ";


	//column2
	$_SESSION['kpi_result_l_tbl_list']="ตัวชี้วัด";
	$_SESSION['kpi_result_l_tbl_id']="#";
	$_SESSION['kpi_result_l_tbl_kpi_name']="ตัวชี้วัด";
	$_SESSION['kpi_result_l_tbl_weight']="น้ำหนัก";
	$_SESSION['kpi_result_l_tbl_target']="เป้า";
	$_SESSION['kpi_result_l_tbl_target_score']="ผลการประเมิน";
	$_SESSION['kpi_result_l_tbl_manage']="ประเมิน";

	

	//form
	
	$_SESSION['kpi_result_l_form_suggestion']="เกณฑ์";
	//$_SESSION['kpi_result_l_form_name']="ฟอร์มการประเมิน";
	$_SESSION['kpi_result_l_form_name']="";
	$_SESSION['kpi_result_l_form_name2']="รายการประเมิน";
	$_SESSION['kpi_result_l_form_kpi_weight']="น้ำหนัก ";
	$_SESSION['kpi_result_l_form_kpi_percentage']="ผลการประเมิน";

	$_SESSION['kpi_result_l_form_kpi_name']="ตัวชี้วัด";
	$_SESSION['kpi_result_l_form_baseline']="ตารางคะแนน ";
	$_SESSION['kpi_result_l_form_btn_save']="บันทึก";
	$_SESSION['kpi_result_l_form_begin']="เริ่ม";
	$_SESSION['kpi_result_l_form_end']="ถึง";
	$_SESSION['kpi_result_l_form_score']="คะแนน";
	$_SESSION['kpi_result_l_form_acutal_data']="ผลการประเมิน";

	//form employee detail start
	$_SESSION['employee_l_form_name']="พนักงาน";
	$_SESSION['employee_l_form_picture']="รูปภาพ";
	$_SESSION['employee_l_form_emp_code']="รหัสพนักงาน";
	$_SESSION['employee_l_form_user']="ชื่อผู้ใช้งาน";
	$_SESSION['employee_l_form_first_name']="ชื่อ";
	$_SESSION['employee_l_form_last_name']="นามสกุล";
	$_SESSION['employee_l_form_department']="แผนก";
	$_SESSION['employee_l_form_position']='ตำแหน่ง';
	$_SESSION['employee_l_form_role']="สิทธิ์";
	
	$_SESSION['employee_l_form_status']="สถานะ";
	$_SESSION['employee_l_form_age']="อายุ";
	$_SESSION['employee_l_form_moblie']="เบอร์มือถือ";
	$_SESSION['employee_l_form_tel']="เบอร์โทรศัพท์";
	$_SESSION['employee_l_form_email']="อีเมลล์";

	$_SESSION['employee_l_form_brithday']="วันเดือนปีเกิด";
	$_SESSION['employee_l_form_age_working']="เข้าทำงานเมื่อ";
	$_SESSION['employee_l_form_status_marital']="สถานะสมรส";
	$_SESSION['employee_l_form_status_single']="โสด";
	$_SESSION['employee_l_form_status_married']="แต่งงาน";

	$_SESSION['employee_l_form_address_no']="บ้านเลขที่";
	$_SESSION['employee_l_form_distict']="เขต/อำเภอ";
	$_SESSION['employee_l_form_sub_distict']="แขวง/ตำบล";
	$_SESSION['employee_l_form_province']="จังหวัด";
	$_SESSION['employee_l_form_postcode']="รหัสไปรษณีย์";
	$_SESSION['employee_l_form_other']="อื่นๆ";
	//form employee detail end
	

}else{
	
//description
	$_SESSION['kpi_result_l_form_suggestion']="Threshold";
	$_SESSION['kpi_result_l_des_title']="Evaluate";
	$_SESSION['kpi_result_l_des_detail']="To evaluate KPIs for employees.";
	

	//Search
	$_SESSION['kpi_result_l_search_year']="Year";
	$_SESSION['kpi_result_l_search_appraisalPeriod']="Appraisal Period";
	$_SESSION['kpi_result_l_search_department']="Department";
	$_SESSION['kpi_result_l_search_position']="Position";
	$_SESSION['kpi_result_l_search_btn_search']="OK";

	//column1
	$_SESSION['kpi_result_emp_l_tbl_list']="Employees";
	$_SESSION['kpi_result_emp_l_tbl_id']="#";
	$_SESSION['kpi_result_emp_l_tbl_pticture']="Picture";
	$_SESSION['kpi_result_emp_l_tbl_fullname']="Full Name";
	$_SESSION['kpi_result_emp_l_tbl_department']="Department";
	$_SESSION['kpi_result_emp_l_tbl_position']="Level";
	$_SESSION['kpi_result_emp_l_tbl_age']="Age";
	$_SESSION['kpi_result_emp_l_tbl_result']="Perfomnace";
	$_SESSION['kpi_result_emp_l_tbl_chief_result']="Chief Evaluate";
	$_SESSION['kpi_result_emp_l_tbl_emp_result']="Emp Evaluate";
	$_SESSION['kpi_result_emp_l_tbl_adjust_result']="Adjust";
	
	
	$_SESSION['kpi_result_emp_l_tbl_manage']="Manage";


	//column2
	

	$_SESSION['kpi_result_l_tbl_list']="KPI List";
	$_SESSION['kpi_result_l_tbl_id']="#";
	$_SESSION['kpi_result_l_tbl_kpi_name']="KPI Name";
	$_SESSION['kpi_result_l_tbl_weight']="Weight";
	$_SESSION['kpi_result_l_tbl_target']="Target";
	$_SESSION['kpi_result_l_tbl_target_score']="Actual";
	$_SESSION['kpi_result_l_tbl_manage']="Appraisal";

	

	//form
	
	//$_SESSION['kpi_result_l_form_name']="Evaluate Form ";
	$_SESSION['kpi_result_l_form_name']="";
	$_SESSION['kpi_result_l_form_name2']="Evaluate by KPI";
	$_SESSION['kpi_result_l_form_kpi_weight']="KPI Weight ";
	$_SESSION['kpi_result_l_form_kpi_percentage']="Performance";

	$_SESSION['kpi_result_l_form_kpi_name']="KPI";
	$_SESSION['kpi_result_l_form_baseline']="Baseline ";
	$_SESSION['kpi_result_l_form_btn_save']="Save";
	$_SESSION['kpi_result_l_form_begin']="Begin";
	$_SESSION['kpi_result_l_form_end']="End";
	$_SESSION['kpi_result_l_form_score']="Score";
	$_SESSION['kpi_result_l_form_acutal_data']="KPI Result";

}
?>

<style>
 	.bg-from{
 	background:#f5f5f5;
 	border: #f5f5f5;
 	}
 	.bg-warning1{
 	background:#d9edf7;
 	padding:5px;
 	margin:5px;
 	/*margin-bottom:10px;*/
 	
 	font-weight:bold;
 	color:black;
 	}
 	.text-right{
 	text-align:right;
 	padding-right: 10px;
 	}
 	.alert{
 	 margin-bottom: 5px;
     /* padding: 5px; */
 	}
 	.panel{
 	margin-bottom: 5px;
 	}
 	#baselineTable{
 	 padding: 2px;
 	 margin-bottom: 0px;
 	}
 	.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    border-top: 1px solid #dddddd;
    line-height: 1.42857;
    padding: 2px;
    vertical-align: top;
}
	.displayHideShow{
		display: none;
	}


	.k-grid > table > tbody > tr:hover,
	.k-grid-content > table > tbody > tr:hover
	{
	        background: #ddd ;
	}

	table#baselineTable > tbody > tr:hover
	{
	        background: #ddd ;
	}
	
	#score_sum_percentage{
		font-size: 50px;
		font-weight: bold;
	}
	.score_sum_percentage{
		font-size: 20px;
		font-weight: bold;
	}
	.impageEmpClass{
		width: 120px;
		float: left;

	}
	.infoEmpClass{
		width: 200px;
		float:left;
	}
	.empName1{
		/* font-weight: bold; */
		/* font-size: 20px; */
	}
	.starRed{

		color:red;
	}
	.starYellow{
		color:yellow;
	}
	.starGreen{
		color:green;
	}
	.actionViewEmployee{
		cursor: pointer;
		display: block;
	}

	.boxMargin{
		margin-top:5px;
		margin-bottom:5px;
	}
	
	.fontLabelParam{
		text-align:right; 
		padding-top:5px;
	} 





 </style>




 <!-- Large modal start-->
<div class="modal fade " id='assignResultKPIModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
   
   <div class="modal-content"> 
	   <div class="modal-header alert-info"> 
		   <button aria-label="Close" data-dismiss="modal" class="close" type="button">
		   		<span aria-hidden="true">×</span>
		   </button> 
		   	<h4 id="myLargeModalLabel" class="modal-title"> <?=$_SESSION['kpi_result_l_form_name']?> 
		   		ปีประเมิน: <span id='form_appraisal_year'></span> ช่วงประเมิน: <span id='form_appraisal_time'></span> </h4> 
	   </div> 
	   <div class="modal-body"> 

	   		<!-- content start-->


<div class="alert alert-info bg-from displayHideShow" role="alert" >

		<div class="row container-fluid">
			<div class="col-md-6">
				<div id="empNameArea" class="empNameArea"></div>
			</div>
			<div class="col-md-6 " style="text-align: right;">
			
				<div class="summary_kpi">
					<div style="display: none;;" >
					 	<?=$_SESSION['kpi_result_l_form_kpi_weight']?>
					</div>
					<div style="display: none;;">
						น้ำหนัก:<div id="kpi_weight_total"><strong></strong></div> 
					</div>
					<div>
					 	 <?=$_SESSION['kpi_result_l_form_kpi_percentage']?> 
					</div>
					<div>
						<div id="score_sum_percentage"></div>
						<div style="display: inline;" id="confirm_kpi"></div>
					</div>
					<!--
					<td>
					<div style="display: inline;" id="confirm_kpi"></div>
					<input type="button" id="kpi_process" name="kpi_process" value="ยืนยันผลการประเมิน" class="btn btn-primary btn-sm">
					</td>
					-->
				</div>

			</div>
		</div>
	
	
</div>				
<div style="margin-top: 5px;" class="panel panel-default panel-bottom displayHideShow">
		  <div class="panel-heading">
			<b><?=$_SESSION['kpi_result_l_tbl_list']?> </b>			
		  </div>
		  <div class="panel-body panel-body-top">
		  
		 		<div id="assignKpiShowData" style="display:none;"></div>
		 		
		  </div>
</div>
	

	
	
<div id="formKPI" style="display:none;">
	

<div class="alert alert-info bg-from" role="alert">
<p class="bg-warning1">

	<?=$_SESSION['kpi_result_l_form_name2']?> 
</p>
<br>
	
	<row>
		<div class='col-md-12'><!-- colum12 -->
		<form id="AssignKpiForm">
		<table style="width: 100%;">
		
		<tr>
			<!-- <td style="width:150px;" class='text-right'><b><?=$_SESSION['kpi_result_l_form_kpi_name']?></b></td> -->
			<td colspan='2'>
			<span style="font-weight: bold;"><?=$_SESSION['kpi_result_l_form_kpi_name']?></span>:<span id="kpiDropDrowListArea"></span>
			</td>
		</tr>
		
		<tr style='display: none;'>
			<td class='text-right'><b>KPI Weight</td>
			<td >
				<input type="text" id="kpi_weight" name="kpi_weight"  class="form-control "  style="width:150px;" value="0.00">
			</td>
		</tr>
		<tr class='' style="display: none;">
			<td class='text-right'><b>Target Data</b></td>
			<td >
				<input type="text" id="kpi_target_data" name="kpi_target_data"  class="form-control " style="background: #ddd; width:150px;"  disabled>
			</td>
		</tr>
		<tr class='' style="display: none;">
			<td class='text-right'><b>Target Score</b></td>
			<td >
				<input type="text" id="target_score" name="target_score"  class="form-control " style="background: #ddd; width:150px;" disabled>
			</td>
		</tr>
		<tr class='' style="display: none;">
			<td class='text-right'><b>Type Actaul Data</b></td>
			<td id="kpiTypeActualArea">
			<input type="radio" checked="" value="0" class="kpi_type_actual" id="actual_manual" name="kpi_type_actual">Manaul : <input type="radio" value="1" class="kpi_type_actual" name="kpi_type_actual" id="actual_query"> Query 
			</td>
		
		</tr>
		<tr>
			<!-- <td  class='text-right' style="display: table; float:right; margin-right:10px;"><b><?=$_SESSION['kpi_result_l_form_baseline']?></b></td> -->
			<td colspan='2'>
				<div style="margin-top: 0px;margin-bottom:0px;" class="panel panel-default panel-bottom">
				  <!--
				  <div class="panel-heading">
					<b>Baseline List</b>			
				  </div>
				  -->
				  <div class="panel-body panel-body-top">
				  
				 		<div id="baseLineArea" style="display: none;"></div>
				 		
						  </div>
				</div>
			</td>
		</tr>
		 
		<tr  style="display: none;">
			<td class='text-right'><b> <?=$_SESSION['kpi_result_l_form_acutal_data']?></b></td>
			<td id="areaKPIActual">
			 
				<input id="kpi_actual_manual" name="kpi_actual_manual" value=""  class="form-control " style="width:100px;">
				<textarea id="kpi_actual_query" name="kpi_actual_query" style="display: none;"></textarea> 
			</td>
		</tr>
		
		<tr class='' style="display: none;">
			<td class='text-right'><b>KPI Score</b></td>
			<td id="areaKPIActualScore">
			 
				<input id="kpi_actual_score" name="kpi_actual_score"  class="form-control " value="0.00" style="background: #ddd;width:150px;" disabled>
				
			</td>
		</tr>
			
		<tr class='' style="display: none;">
			<td class='text-right'><b>Performance% </b></td>
			<td id="areTotalKpiScore">
			
				<input id="performance" name="performance"  class="form-control " value="0.00" style="background: #ddd;width:150px;" disabled>
				
				
			</td>
		</tr>
		
		<tr style="display: none;">
			<td class='text-right'><b>Total  Score</b></td>
			<td id="areTotalKpiScore">
			
				<input id="total_kpi_actual_score" name="total_kpi_actual_score"  class="form-control " value="0.00" style="background: #ddd;width:150px;">
				
				
			</td>
		</tr>


		
		<tr style="display: none;">
			<td ></td>
			<td >
				<div style="float:left;">
					<input type="hidden" name="assign_kpi_action" id ="assign_kpi_action"  value="add">

					<input type="hidden" name="assign_kpi_year" id ="assign_kpi_year"  value="">
					<input type="hidden" name="assign_kpi_appraisal_period" id ="assign_kpi_appraisal_period"  value="">
					<input type="hidden" name="assign_kpi_department" id ="assign_kpi_department"  value="">
					<input type="hidden" name="assign_kpi_position" id ="assign_kpi_position"  value="">
					<input type="hidden" name="assign_kpi_emp" id ="assign_kpi_emp"  value="">
					<input type="hidden" name="assign_kpi_role_id" id ="assign_kpi_role_id"  value="">


					<input type="hidden" name="assign_kpi_id" id ="assign_kpi_id"  value="">
					<input type="submit" id="assign_kpi_submit" name="assign_kpi_submit" value="Add" class="btn btn-primary btn-sm">
					<input type="button" value="Reset" id="assign_kpi_reset" class="btn btn-default btn-sm">
					
					<!--
					<input type="button" id="kpi_process" name="kpi_process" value="Finish" class="btn btn-primary btn-sm">
				-->
					<!--<input type="button" id="send_to_approve" name="send_to_approve" value="Send to Approve">
					 <input type="button" value="Search" id="assign_kpi_search"> -->
				</div>
			</td>
		</tr>

		</form>
		
		
		
	</table>

	


	</div><!-- column12-->
	<!--
		<div class='col-md-3'>
			
				<div style="margin-top: 0px;" class="panel panel-default panel-bottom">
				  <div class="panel-heading">
					<b>Baseline List</b>			
				  </div>
				  <div class="panel-body panel-body-top">
				  
				 		<div id="baseLineArea" style="display: none;"></div>
				 		
						  </div>
				</div>
			
		</div>
		-->


		

	</row>



	
	
	<br style='clear: both'>
</div>	
	
	
</div>




<div class="assignData" style="display: none;" id="resultKpiShowData"></div>




		<div style="float: right;">
			<!-- <div style="display: inline;" id="confirm_kpi"></div> -->
			
			
			<input type="button" id="kpi_process" name="kpi_process" value="ยืนยันผลการประเมิน" class="btn btn-warning ">
		</div>
		<br style='clear: both'>
		<div id="warningInModalArea"></div>

	   		<!-- content end-->

	   </div> 
   </div>

  </div>
</div>
<!-- Large modal end-->

<!-- Large view employee detail modal start-->
<div id='employeeViewDetailModal' class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">

		<div class="modal-content">
			<div class="modal-header alert-info">
				<button aria-label="Close" data-dismiss="modal" class="close" type="button">
					<span aria-hidden="true">×</span>
				</button>
				<h4 id="myLargeModalLabel" class="modal-title"> ข้อมูลพนักงาน </h4>
			</div>
			
				<div class="modal-body">

					<!-- content start-->


					<row>
						<table>
							<tr>
								<td class='text-right'><b><?= $_SESSION['employee_l_form_picture'] ?></b></td>
								<td>
									<div id="image_file_display"></div>
								</td>
							</tr>
						</table>
						<div class="col-md-6">
						
							<table class="employeeData" style="display:none;">
								
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_emp_code'] ?></b></td>
									<td>
										<div id="empCode_display"></div>
										
									</td>
								</tr>

								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_user'] ?></b></td>
									<td>
										<div id="empUser_display"></div>
									</td>
								</tr>
								

								<tr>
									<td class='text-right'><b><b><?= $_SESSION['employee_l_form_first_name'] ?></b></td>
									<td>
										<div id="empFirstName_display"></div>
										
									</td>
								</tr>
								<tr>
									<td class='text-right'><b><b><?= $_SESSION['employee_l_form_last_name'] ?></b></td>
									<td>
										<div id="empLastName_display"></div>
										
									</td>
								</tr>



								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_department'] ?></b></td>
									<td >
										
										<div id="empDepartment_display"></div>
									</td>
								</tr>

							

								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_position'] ?></b></td>
									<td >

										
										<div id="empPosition_display"></div>

									</td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_role'] ?></b></td>
									<td>
										<div id="empRole_display"></div>
									</td>
								</tr>

								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_status'] ?></b></td>
									<td>
										<div id="empStatusWork_display"></div>
									</td>
								</tr>

								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_moblie'] ?>
											<!-- <font color="red">*</font> -->
										</b></td>
									<td>
										
										<div id="empMobile_display"></div>
									</td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_tel'] ?>
											<!-- <font color="red">*</font> -->
										</b></td>
									<td>
										
										<div id="empTel_display"></div>
									</td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_email'] ?>
											<!-- <font color="red">*</font> -->
										</b></td>
									<td>
										
										<div id="empEmail_display"></div>
									</td>
								</tr>



							</table>
						</div>
						<div class="col-md-6">

							<table class="employeeData" style="display:none;">

								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_brithday'] ?>
											<!-- <font color="red">*</font> -->
										</b></td>
									<td>
										<div id="empBrithDay_display"></div>
										
									</td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_age_working'] ?>
											<!-- <font color="red">*</font></b> -->
									</td>
									<td>
										
										<div id="empAgeWorking_display"></div>
									</td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_status_marital'] ?></b></td>
									<td id="empStatusArea">

										<div id="empStatus_display"></div>

										
									</td>
								</tr>



								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_address_no'] ?></b></td>
									<td>
										
										<div id="empAddress_display"></div>
									</td>
								</tr>

								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_province'] ?></b></td>
									<td>
										
										<div id="empProvince_display"></div>
									 </td>
								</tr>
								
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_distict'] ?></b></td>
									<td>
										
										<div id="empDistict_display"></div>
									</td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_sub_distict'] ?></b></td>
									<td>
										<div id="empSubDistict_display"></div>
										
										
									</td>
								</tr>

								
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_postcode'] ?></b></td>
									<td>
										
										<div id="empPostcode_display"></div>
									</td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_other'] ?></b></td>
									<td>
										
										<div id="empOther_display"></div>
										
									</td>
								</tr>
								
							
							</table>

							<br style="clear: both;">
						</div>
						<br style="clear: both;">
					</row>
					<br style="clear: both;">


					<!-- content end-->

				</div>

				<div class="modal-footer">
					
	   				<button data-dismiss="modal" class="btn btn-default" type="button">ปิด</button> 
	   		
				</div>

			

		</div>

	</div>
</div>
<!-- Large view employee detail modal end-->



 
<div role="alert" class="alert alert-info">
     <h2> <strong><?=$_SESSION['kpi_result_l_des_title']?></strong></h2>
   		<?=$_SESSION['kpi_result_l_des_detail']?>
    </div>




<div role="alert" class="alert alert-info1 bg-from">
	
<div class="row">
	<div class="col-md-12">
	
		<div class="col-md-2 boxMargin fontLabelParam"><b><?=$_SESSION['kpi_result_l_search_year']?></b></div>
		<div class="col-md-2 boxMargin assignKpiYearArea">
		</div>
	
		<div class="col-md-2 boxMargin fontLabelParam"><b class='pre-search-label'><?=$_SESSION['kpi_result_l_search_appraisalPeriod']?></b></div>
		<div class="col-md-2 boxMargin" id="periodAssignArea">
			
		</div>
	
		<div class="col-md-2 boxMargin fontLabelParam">
			<b class='pre-search-label'><?=$_SESSION['kpi_result_l_search_department']?></b>
		</div>
		<div class="col-md-2 boxMargin">
			<div id="depDropDrowListArea">
			
			</div>
			
		</div>
		
		
	 	
		<div class="col-md-2 boxMargin fontLabelParam"><b class='pre-search-label'><?=$_SESSION['kpi_result_l_search_position']?></b></div>
		<div class="col-md-2 boxMargin" id="positionAppaisalArea">
			
		</div>
		<div class="col-md-2 boxMargin fontLabelParam">
		<b class='pre-search-label'>สิทธิ์</b>
		</div>
		<div class="col-md-2 boxMargin">
			<div  id="roleDropDrowListArea" style="float:left;">
			
			</div>
			
		</div>
	
		<div>&nbsp;</div>
		<div style="display: none;">
			<input type="button" value="<?=$_SESSION['kpi_result_l_search_btn_search']?>" id="assign_kpi_search"  class="btn btn-primary btn-sm">
		</div>
		
	</div>
	</div>
</div>


	<div style="margin-top: 5px;" class="panel panel-default panel-bottom displayHideShow">
			  <div class="panel-heading">
				<b><?=$_SESSION['kpi_result_emp_l_tbl_list']?></b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div class="employeeData" id="employeeShowData" style="display:none;"></div>
			 		
			  </div>
	</div>

	<div id='paramEmbedAssignKPI'></div>
	<script src="../Controller/cAssignKpi.js"></script>
	


	
	






      	
      	
