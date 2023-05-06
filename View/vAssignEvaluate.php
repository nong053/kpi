<?php session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);



if($_SESSION['language']=="th"){
	
	//description
	$_SESSION['assign_l_des_title']="มอบหมายตัวชี้วัด";
	$_SESSION['assign_l_des_detail']="เพื่อทำการมอบหมายตัวชี้วัดที่ต้องการวัดผลการปฏิบัติงานให้กับพนักงานโดยสามารถมอบหมายได้พร้อมกันทั้งหมด หรือ มอบหมายตามตัวชี้วัดตามรายบุคคล";
	$_SESSION['assign_l_des_btn_add']="มอบหมายตัวชี้วัดทั้งหมด";
	$_SESSION['assign_l_des_btn_confirm']="ส่งประเมินทั้งหมด";
	$_SESSION['assign_l_des_btn_del_all']="ยกเลิกมอบหมายตัวชี้วัดทั้งหมด";
	

	//Search
	$_SESSION['assign_l_search_year']="ปีประเมิน";
	$_SESSION['assign_l_search_appraisalPeriod']="ช่วงประเมิน";
	$_SESSION['assign_l_search_department']="แผนก";
	$_SESSION['assign_l_search_position']="ตำแหน่ง";
	$_SESSION['assign_l_search_fullname']="พนักงาน";
	$_SESSION['assign_l_search_btn_search']="ตกลง";

	//column
	$_SESSION['assign_l_tbl_id']="#";
	$_SESSION['assign_l_tbl_kpi_name']="ชื่อตัวชี้วัด";
	$_SESSION['assign_l_tbl_weight']="น้ำหนัก";
	$_SESSION['assign_l_tbl_target']="เป้าข้อมูลดิบ";
	$_SESSION['assign_l_tbl_target_score']="เป้าคะแนน";
	$_SESSION['assign_l_tbl_manage']="จัดการ";
	$_SESSION['kpi_result_emp_l_tbl_person_info']="ข้อมูลพนักงาน";
	$_SESSION['kpi_result_emp_l_tbl_kpi_assign']="มอบหมายตัวชี้วัด";

	


	

	//form
	
	$_SESSION['assign_l_form_name']="มอบหมายตัวชี้วัด";
	$_SESSION['assign_l_form_kpi_name']="ตัวชี้วัด";
	$_SESSION['assign_l_form_weight']="น้ำหนัก";
	$_SESSION['assign_l_form_btn_add']="เพิ่ม";
	$_SESSION['assign_l_form_btn_reset']="เคลียร์";
	$_SESSION['assign_l_form_required']="จำเป็นต้องกรอก";

	

}else{
	

		//description
	$_SESSION['assign_l_des_title']="KPI Assignment ";
	$_SESSION['assign_l_des_detail']="To assign a measure to measure performance for employees. This will be Assign default metrics Assignment at the level of position, that is, employees under that position.";
	$_SESSION['assign_l_des_btn_add']="All KPI Assignment";
	$_SESSION['assign_l_des_btn_confirm']="All Confirm";
	$_SESSION['assign_l_des_btn_del_all']="Cancel Assign KPI All";

	//Search
	$_SESSION['assign_l_search_year']="Year";
	$_SESSION['assign_l_search_appraisalPeriod']="Appraisal Period";
	$_SESSION['assign_l_search_department']="Department";
	$_SESSION['assign_l_search_position']="Position";
	$_SESSION['assign_l_search_fullname']="Name";
	$_SESSION['assign_l_search_btn_search']="OK";

	//column
	$_SESSION['assign_l_tbl_id']="#";
	$_SESSION['assign_l_tbl_kpi_name']="KPI Name";
	$_SESSION['assign_l_tbl_weight']="Weight";
	$_SESSION['assign_l_tbl_target']="Data Target";
	$_SESSION['assign_l_tbl_target_score']="Target Score";
	$_SESSION['assign_l_tbl_manage']="Manage";
	$_SESSION['kpi_result_emp_l_tbl_person_info']="Person In";
	$_SESSION['kpi_result_emp_l_tbl_kpi_assign']="Assign KPI";

	

	//form
	
	$_SESSION['assign_l_form_name']="KPI Assignment Form";
	$_SESSION['assign_l_form_kpi_name']="KPI";
	$_SESSION['assign_l_form_weight']="KPI Weight";
	$_SESSION['assign_l_form_btn_add']="Add";
	$_SESSION['assign_l_form_btn_reset']="Clear";
	$_SESSION['assign_l_form_required']="Required";


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

}
?>
<style>
	.bg-from {
		background: #f5f5f5;
		border: #f5f5f5;
	}

	.bg-warning1 {
		background: #d9edf7;
		padding: 5px;
		margin: 5px;
		/*margin-bottom:10px;*/

		font-weight: bold;
		color: black;
	}
	.head-box-assign{
		font-weight: bold;
		font-size: 1.5em;
	}
	.text-right {
		text-align: right;
		padding-right: 10px;
	}

	.alert {
		margin-bottom: 5px;

	}

	.panel {
		margin-bottom: 5px;
	}

	#baselineTable {
		padding: 2px;
		margin-bottom: 0px;
	}

	.table>thead>tr>th,
	.table>tbody>tr>th,
	.table>tfoot>tr>th,
	.table>thead>tr>td,
	.table>tbody>tr>td,
	.table>tfoot>tr>td {
		border-top: 1px solid #dddddd;
		line-height: 1.42857;
		padding: 2px;
		vertical-align: top;
	}

	.displayHideShow {
		display: none;

	}
	.emp-text-left{
		text-align: left;
		padding: 5px;
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
<div class="modal fade " id='assignMasterKPIModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog" role="document">

		<div class="modal-content">
			<div class="modal-header alert-info">
				<button aria-label="Close" data-dismiss="modal" class="close" type="button">
					<span aria-hidden="true">×</span>
				</button>
				<h4 id="myLargeModalLabel" class="modal-title"> <?= $_SESSION['assign_l_form_name'] ?></h4>
			</div>
			<div class="modal-body">






				<!-- content start-->
				<form id="AssignKpiForm">
					<row>
						<div class='col-md-12'>
							<table style="width: 100%;">

								<!-- <tr>
									<td style="width: 150px;" class='text-right'><b><?= $_SESSION['assign_l_search_year'] ?></b></td>
									<td id="assignYearInformArea">

									</td>
								</tr>
								<tr>
									<td style="width: 150px;" class='text-right'><b><?= $_SESSION['assign_l_search_appraisalPeriod'] ?></b></td>
									<td id="assignAppraisalPeriodInformArea">

									</td>
								</tr>
								<tr>
									<td style="width: 130px;" class='text-right'><b><?= $_SESSION['assign_l_search_department'] ?></b></td>
									<td id="assignDepartmentInformArea">

									</td>
								</tr>
								<tr>
									<td style="width: 100px;" class='text-right'><b><?= $_SESSION['assign_l_search_position'] ?></b></td>
									<td id="assignPositionInformArea">

									</td>
								</tr>

								<tr>
									<td style="width: 130px;" class='text-right'><b><?= $_SESSION['assign_l_search_fullname'] ?></b></td>
									<td id="empAssignInformArea">

									</td>
								</tr> -->

								<tr id="kpiTextAllArea" style="display: none;">
									<td style="width: " class='text-right'><b><?= $_SESSION['assign_l_form_kpi_name'] ?></b></td>
									<td id="kpiTextArea">

									</td>
								</tr>
								<tr id="kpiDropDrowListAllArea">
									<td style="width: 30%;" class='text-right'><b><?= $_SESSION['assign_l_form_kpi_name'] ?></b></td>
									<td style="width: 70%;" id="kpiDropDrowListArea">

									</td>
								</tr>

								<tr>
									<td  class='text-right'><b><?= $_SESSION['assign_l_form_weight'] ?></td>
									<td>
										<input type="text" id="kpi_weight" name="kpi_weight" class="form-control " value="25.00" style="width:150px;">
									</td>
								</tr>
                                
								<tr style="display: none;">
									<td class='text-right'><b>Target Data</b></td>
									<td>
										<input type="text" id="kpi_target_data" name="kpi_target_data" class="form-control " style="background: #ddd; width:150px;" disabled>
									</td>
								</tr>
								<tr style="display: none;">
									<td class='text-right'><b>Target Score</b></td>
									<td>
										<input type="text" id="target_score" name="target_score" class="form-control " style="background: #ddd; width:150px;" disabled>
									</td>
								</tr>
								<!-- 
								<tr style="display: none;">
									<td class='text-right'><b>Type Actaul Data</b></td>
									<td id="kpiTypeActualArea">
										<input type="radio" checked="" value="0" class="kpi_type_actual" id="actual_manual" name="kpi_type_actual">Manaul : <input type="radio" value="1" class="kpi_type_actual" name="kpi_type_actual" id="actual_query"> Query
									</td>

								</tr>
								
								<tr class="hidden">
									<td class='text-right'><b> Actual Data</b></td>
									<td id="areaKPIActual">

										<input id="kpi_actual_manual" name="kpi_actual_manual" value="0.00" class="form-control " style="width:150px;">
										<textarea id="kpi_actual_query" name="kpi_actual_query" style="display: none;"></textarea>
									</td>
								</tr>

								<tr style="display: none;">
									<td class='text-right'><b>KPI Score</b></td>
									<td id="areaKPIActualScore">

										<input id="kpi_actual_score" name="kpi_actual_score" class="form-control " value="0.00" style="background: #ddd;width:150px;" disabled>

									</td>
								</tr>

								<tr style="display: none;">
									<td class='text-right'><b>Performance% </b></td>
									<td id="areTotalKpiScore">

										<input id="performance" name="performance" class="form-control " value="0.00" style="background: #ddd;width:150px;" disabled>


									</td>
								</tr>

								<tr style="display: none;">
									<td class='text-right'><b>Total Score</b></td>
									<td id="areTotalKpiScore">

										<input id="total_kpi_actual_score" name="total_kpi_actual_score" class="form-control " value="0.00" style="background: #ddd;width:150px;">


									</td>
								</tr> -->


								<tr>
									<td></td>
									<td>
										<div style="float:left;">
											<input type="hidden" name="assign_kpi_action" id="assign_kpi_action" value="add">
											<!-- <input type="hidden" name="assign_kpi_id" id="assign_kpi_id" value=""> -->
											<input type="hidden" name="assign_kpi_by_emp" id="assign_kpi_by_emp" value="N">
											
											<input type="hidden" name="form_year" id="form_year" value="">
											<input type="hidden" name="form_appraisal_period_id" id="form_appraisal_period_id" value="">
											<input type="hidden" name="form_department_id" id="form_department_id" value="">
											<input type="hidden" name="form_position_id" id="form_position_id" value="">
											<input type="hidden" name="form_emp_id" id="form_emp_id" value="">
											<input type="hidden" name="form_kpi_id" id="form_kpi_id" value="">
											


											<input type="submit" id="assign_kpi_submit" name="assign_kpi_submit" value="<?= $_SESSION['assign_l_form_btn_add'] ?>" class="btn btn-primary ">
											<input type="button" value="<?= $_SESSION['assign_l_form_btn_reset'] ?>" id="assign_kpi_reset" class="btn btn-default ">
											<button data-dismiss="modal" class="btn btn-default" type="button">ปิด</button> 
											<!--<input type="button" id="send_to_approve" name="send_to_approve" value="Send to Approve">
									 <input type="button" value="Search" id="assign_kpi_search"> -->
										</div>
									</td>
								</tr>
							</table>
						</div>
						
						<br style="clear: both">
					</row>

				</form>

				<!-- content end-->
				

				<br style="clear: both">
				<div id="warningInModalArea"></div> 
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

							<table class="employeeData">

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
	<h2> <strong><?= $_SESSION['assign_l_des_title'] ?></strong></h2>
	<?= $_SESSION['assign_l_des_detail'] ?>
</div>




<div role="alert" class="alert alert-info1 bg-from">

	<div class="row">
		<div class="col-md-12">

			<div class="col-md-2 boxMargin fontLabelParam"><b class=''><?= $_SESSION['assign_l_search_year'] ?></b></div>
			<div class="col-md-2 boxMargin assignKpiYearArea">
			
			</div>

			<div class="col-md-2 boxMargin fontLabelParam"><b class='pre-search-label '><?= $_SESSION['assign_l_search_appraisalPeriod'] ?></b></div>
			<div class="col-md-2 boxMargin" id="periodAssignArea">

			</div>

			<div class="col-md-2 boxMargin fontLabelParam">
				<b class='pre-search-label '><?= $_SESSION['assign_l_search_department'] ?></b>
			</div>
			<div class="col-md-2 boxMargin">
				<div id="depDropDrowListArea" >

				</div>

			</div>
			
			<div class="col-md-2 boxMargin fontLabelParam"><b class='pre-search-label '><?= $_SESSION['assign_l_search_position'] ?></b></div>
			<div class="col-md-2 boxMargin" id="positionAssignArea">

			</div>

			<div class="col-md-2 boxMargin fontLabelParam"><b class='pre-search-label '><?= $_SESSION['assign_l_search_fullname'] ?></b></div>
			<div class="col-md-2 boxMargin" id="empAssignArea">

			</div>


			<div>&nbsp;</div>
			<div style="display: none;">
				<input type="button" value="<?= $_SESSION['assign_l_search_btn_search'] ?>" id="assign_kpi_search" class="btn btn-primary btn-sm">
				
			</div>
			
		</div>
	</div>
</div>


<!-- <div class="alert alert-info bg-from  displayHideShow" role="alert" >
		
			
		
	</div> -->

<div style="margin-top: 5px; " class="panel panel-default panel-bottom displayHideShow ">


	
		<div class="panel-heading">

			<!-- <div class="col-md-6">
				<div id="empNameArea" class="empNameArea"></div>
				<table>
					<tr class="summary_kpi">
						<td>

							<b><?= $_SESSION['assign_l_tbl_weight'] ?></b>
						</td>
						<td>
							<div id="kpi_weight_total"><strong></strong></div>
						</td>
						<td style='display: none;'>
							| KPI Percentage
						</td>
						<td>
							<div style='display: none;' id="score_sum_percentage"><strong></strong></div>

						</td>
						<td>
							<div id="confirm_kpi"></div>
						</td>

					</tr>
				</table>
			</div> -->
            <!-- <div class="col-md-6 text object-text-left">
            <h3>ทุกช่วงการประเมิน</h3>
            </div> -->
			<div class="col-md-12 text object-text-right">

				<!-- <input type="button" id="delAllKpiEmpAssign" name="delAllKpiEmpAssign" value="<?= $_SESSION['assign_l_des_btn_del_all'] ?>" class="btn btn-danger btn-lg">		 -->
				<button class="btn btn-danger btn-lg" id="delAllKpiEmpAssign" type="button"><i class="glyphicon glyphicon-refresh"></i>
					<?= $_SESSION['assign_l_des_btn_del_all'] ?>
				</button>

				<button class="btn btn-warning btn-lg" id="addAssignKPI" type="button"><i class="glyphicon  glyphicon-plus"></i>
					<?= $_SESSION['assign_l_des_btn_add'] ?>
				</button>
				<!-- <input type="button" id="sendAllKpiEmpAssign" name="sendAllKpiEmpAssign" value="<?= $_SESSION['assign_l_des_btn_confirm'] ?>" class="btn btn-primary btn-lg"> -->
				<button class="btn btn-primary btn-lg" id="sendAllKpiEmpAssign" type="button"><i class="glyphicon glyphicon-send"></i>
					<?= $_SESSION['assign_l_des_btn_confirm'] ?>
				</button>
			</div>
			<br style="clear:both">
		</div>


		<div class="panel-body panel-body-top" style="padding: 5px;">

			<!-- <div id="assignKpiShowData" style="display:none;"></div> -->
			<div id="assignKpiToEmpShowData" style="display:none;"></div>

		</div>
	

</div>




<!-- <div id="formKPI" style="display:none; ">

</div> -->




<div class="assignData" style="display: none;" id="resultKpiShowData"></div>
<input type="hidden" name="paramYearInformEmb">

<script src="../Controller/cAssignEvaluate.js"></script>