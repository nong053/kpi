<?php session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
	//description	

	//Search
	$_SESSION['emp_dashboard_l_search_year']="ปีประเมิน";
	$_SESSION['emp_dashboard_l_search_appraisal_period']="ช่วงประเมิน";
	$_SESSION['emp_dashboard_l_search_department']="แผนก";
	$_SESSION['emp_dashboard_l_search_position']="ตำแหน่ง";
	$_SESSION['emp_dashboard_l_search_emp']="พนักงาน";
	
	

	$_SESSION['emp_dashboard_l_search_btn_search']="ตกลง";
	$_SESSION['emp_dashboard_l_search_btn_back']="ย้อนกลับ";

	//table level1
	
	$_SESSION['emp_dashboard_emp_l_tbl_id']="#";
	$_SESSION['emp_dashboard_emp_l_tbl_pticture']="";
	$_SESSION['emp_dashboard_emp_l_tbl_fullname']="ชื่อ-นามสกุล";
	$_SESSION['emp_dashboard_emp_l_tbl_department']="แผนก";
	$_SESSION['emp_dashboard_l_tbl_position']="ตำแหน่ง";
	
	$_SESSION['emp_dashboard_l_tbl_target']="เป้า";
	$_SESSION['emp_dashboard_l_tbl_actual']="ผลประเมิน";
	$_SESSION['emp_dashboard_l_tbl_graph']="กราฟ";
	$_SESSION['emp_dashboard_l_tbl_actual_target']="เทียบเป้า";
	$_SESSION['emp_dashboard_l_tbl_status']="สถานะ";
	$_SESSION['emp_dashboard_l_tbl_download']="ดาวน์โหลด";

	//table2
	$_SESSION['emp_dashboard2_l_title_overview']="ผลประเมิน";
	$_SESSION['emp_dashboard2_l_title_kpi_result']="ผลประเมินรายตัวชี้วัด";
	$_SESSION['emp_dashboard2_l_tbl_id']="#";
	$_SESSION['emp_dashboard2_l_tbl_kpi_name']="ตัวชี้วัด";
	$_SESSION['emp_dashboard2_l_tbl_target']="เป้าข้อมูลดิบ";
	$_SESSION['emp_dashboard2_l_tbl_actual']="ผล";
	$_SESSION['emp_dashboard2_l_tbl_graph']="กราฟ";
	$_SESSION['emp_dashboard2_l_tbl_actual_target']="เทียบเป้า";
	$_SESSION['emp_dashboard2_l_tbl_status']="ผลประเมิน%";
	
	$_SESSION['emp_dashboard2_l_title_appraisal_reasult']="ผลตามช่วงประเมิน";


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

	//Search
	$_SESSION['emp_dashboard_l_search_year']="Appriasal Year";
	$_SESSION['emp_dashboard_l_search_appraisal_period']="Appraisal Period";
	$_SESSION['emp_dashboard_l_search_department']="Department";
	$_SESSION['emp_dashboard_l_search_btn_search']="Submit";
	$_SESSION['emp_dashboard_l_search_btn_back']="Back";

	//table level1
	
	$_SESSION['emp_dashboard_emp_l_tbl_id']="#";
	$_SESSION['emp_dashboard_emp_l_tbl_pticture']="";
	$_SESSION['emp_dashboard_emp_l_tbl_fullname']="Full Name";
	$_SESSION['emp_dashboard_emp_l_tbl_department']="Department";
	$_SESSION['emp_dashboard_l_tbl_position']="Position";
	$_SESSION['emp_dashboard_l_tbl_target']="Target";
	$_SESSION['emp_dashboard_l_tbl_actual']="Acutal";
	$_SESSION['emp_dashboard_l_tbl_graph']="Graph";
	$_SESSION['emp_dashboard_l_tbl_actual_target']="Actual/Target";
	$_SESSION['emp_dashboard_l_tbl_status']="Status";
	$_SESSION['emp_dashboard_l_tbl_download']="Download";

	//table2
	$_SESSION['emp_dashboard2_l_title_overview']="Overview";
	$_SESSION['emp_dashboard2_l_title_kpi_result']="KPI Result";
	$_SESSION['emp_dashboard2_l_tbl_id']="#";
	$_SESSION['emp_dashboard2_l_tbl_kpi_name']="KPI  Name";
	$_SESSION['emp_dashboard2_l_tbl_target']="Target";
	$_SESSION['emp_dashboard2_l_tbl_actual']="Actual";
	$_SESSION['emp_dashboard2_l_tbl_graph']="Graph";
	$_SESSION['emp_dashboard2_l_tbl_actual_target']="Actual/Target";
	$_SESSION['emp_dashboard2_l_tbl_status']="Status";
	
	$_SESSION['emp_dashboard2_l_title_appraisal_reasult']="Appraisal Result by Period";

}
$department_name=$_GET['department_name']; 
?>
 <style>
	#gauge-container {
		background: transparent url("../images/gauge-container-partial-236.png") no-repeat 50% 50%;
		width: 236px;
		height: 236px;
		text-align: center;
		margin: 0 auto 0px auto;
		margin: 0 auto 5px;
	}

	.gaugeOwner {
		width: 220px;
		height: 185px;
		margin: 0 auto;
		margin-top:5px;
		
	}

	#gauge-container .k-slider {
		margin-top: -11px;
		width: 140px;
	}
	#gaugeOwner > svg {
	padding-top: -3px;
	}
	
	#barChart{
	height:250px;
	width:360px;
	}
	.panel{
	margin-bottom: 10px;
	}
	.ball{
		margin-left: 5px;
	}
	.ExBallGray{
		background:#eeeeee;
		width:20px;
		height:20px;
		border-radius: 100%;
	}
	.ExBallRed{
		background:#5CB85C;
		width:20px;
		height:20px;
		border-radius: 100%;
	}
	.ExBallYellow{
		background:#F0AD4E;
		width:20px;
		height:20px;
		border-radius: 100%;
	}
	.ExBallGreen{
		background:#F5F5F5;
		width:20px;
		height:20px;
		bborder-radius: 100%;
	}
	.modal-dialog {
		padding-bottom: 30px;
		padding-top: 30px;
		width: 780px;
	}

	/*hidden tooltip sparkline*/
	.jqstooltip{
	display:none;
	}
	#jqstooltip{
		display:none;
	}
	.textR{
		text-align: right;
		float: right;
	}
	.actionViewEmployee{
		cursor: pointer;
		/* display: block; */
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

 <div class="row1">
 	
 	<div class="col-md-121">
 	
		<!--  panel1 start -->
		<div class="panel panel-default">
		  <div class="panel-heading">
		   
									<div class="box-title-l">
									
										<div class="topParameter">
				
											<div class='row1'>
												<div class="col-md-121">
													
													<div class='col-md-2 boxMargin fontLabelParam' >
													<strong class="pre-search-label boxMargin"><?=$_SESSION['emp_dashboard_l_search_year']?></strong>
													</div>
													<div class='col-md-2 boxMargin' id="appraisalYearArea">
													</div>
													<div class='col-md-2 boxMargin fontLabelParam' ><strong class="pre-search-label"><?=$_SESSION['emp_dashboard_l_search_appraisal_period']?></strong></div>
													<div class='col-md-2 boxMargin' id="appraisalPeriodAea">
													</div>
													<div class='col-md-2 boxMargin fontLabelParam'  id="kpiDashboardSearchParamDepLabelArea">
														<strong class="pre-search-label boxMargin"><?=$_SESSION['emp_dashboard_l_search_department']?></strong>
													</div>
													<div class='col-md-2 boxMargin' id="appraisalDepDropDrowListArea">
													</div>

													<div class='col-md-2 boxMargin fontLabelParam'  id="kpiDashboardSearchParamPositionLabelArea">
														<strong class="pre-search-label boxMargin"><?=$_SESSION['emp_dashboard_l_search_position']?></strong>
													</div>
													<div class='col-md-2 boxMargin' id="appraisalPositionDropDrowListArea">
													</div>

													<div class='col-md-2 boxMargin fontLabelParam'   id="kpiDashboardSearchParamEmpLabelArea">
													<strong class="pre-search-label boxMargin"><?=$_SESSION['emp_dashboard_l_search_emp']?></strong></div>
													<div class='col-md-2 boxMargin'  id="appraisalEmpDropDrowListArea">
													</div>


													<div >
														<button style="display: none;" id="kpiDashboardSubmit" class="btn btn-primary btn-sm" ><?=$_SESSION['emp_dashboard_l_search_btn_search']?></button>
														<!-- <input type="button" value="<?=$_SESSION['emp_dashboard_l_search_btn_back']?>" class="btn default  btn-sm" name="dashboardBackBtn" id="dashboardBackBtn"> -->
													</div>
												</div>
												
											</div>
										</div>
									
									</div>
									<div class="box-title-r">
										
										<div class="boxNav">
											<a href="#">
											<span class="glyphicon glyphicon-remove"></span>
											</a>
										</div>
										<div class="boxNav">
											<a href="#">
											<span class="glyphicon glyphicon-resize-full"></span>
											</a>
										</div>
										<div class="boxNav">
											<a href="#">
											<span class="glyphicon glyphicon-minus"></span>
											</a>
										</div>
										<div class="boxNav">
											<a href="#">
											<span class="glyphicon glyphicon-download-alt"></span>
											</a>
										</div>
									</div>
									<br style="clear:both">
								
		  </div>
		  <div class="panel-body">
		    	
		    	<row>
		    		
		    		<div class="col-md-12" style="padding-left: 0;padding-right: 0;">
		    		
		    			
		    			<div id="departmentArea" class="departmentArea"></div>
		    			
		    			
		    		</div>
		    		
		    	</row>
		    	
		  </div>
		
		</div>
		<!-- panel 1 end -->
		
		
	</div>
	
</div>

			
<!-- modal start -->

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
						
							<table class="employeeData" >
								
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

							<table class="employeeData" >

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


   

<script src="../Controller/cKpiDashboard.js"></script>
