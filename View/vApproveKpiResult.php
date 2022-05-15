<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
	//description
	$_SESSION['approve_l_des_title']="ปรับคะแนนผลการปฏิบัติงาน";
	$_SESSION['approve_l_des_detail']="ผู้ประเมินสู่งสุดหรือผู้บริหาร ปรับคะแนนและอนุมััติผลประเมิน";
	

	//Search
	$_SESSION['approve_l_search_year']="ปีประเมิน";
	$_SESSION['approve_l_search_appraisalPeriod']="ช่วงประเมิน";
	$_SESSION['approve_l_search_department']="แผนก";
	$_SESSION['approve_l_search_position']="ตำแหน่ง";
	$_SESSION['approve_l_search_btn_search']="ค้นหา";

	//column1
	$_SESSION['approve_emp_l_tbl_list']="พนักงาน";
	$_SESSION['approve_emp_l_tbl_id']="#";
	$_SESSION['approve_emp_l_tbl_pticture']="รูป";
	$_SESSION['approve_emp_l_tbl_fullname']="ข้อมูลพนักงาน";
	$_SESSION['approve_emp_l_tbl_department']="แผนก";
	$_SESSION['approve_emp_l_tbl_position']="ระดับ";
	$_SESSION['approve_emp_l_tbl_age']="อายุ";
	$_SESSION['approve_emp_l_tbl_result']="หัวหน้าประเมิน";
	$_SESSION['approve_emp_l_tbl_emp_result']="ประเมินตนเอง";
	$_SESSION['approve_emp_l_tbl_total_result']="สรุปผลประเมิน";
	$_SESSION['approve_emp_l_tbl_adjust_result']="ปรับคะแนน";
	$_SESSION['approve_emp_l_tbl_manage']="จัดการ";

	//form
	$_SESSION['approve_l_form_name']="ปรับผลการประเมิน";
	$_SESSION['approve_l_form_kpi_peromance']="ผลการประเมิน ";
	$_SESSION['approve_l_form_kpi_reason']="เหตุผล";
	$_SESSION['approve_l_form_btn_save']="บันทึก";
	$_SESSION['approve_l_form_btn_reset']="เคลียร์";

	

}else{
	
//description
	$_SESSION['approve_l_des_title']="Approve";
	$_SESSION['approve_l_des_detail']="For the management or manager to adjust the performance scores for each period to employees.";
	

	//Search
	$_SESSION['approve_l_search_year']="Year";
	$_SESSION['approve_l_search_appraisalPeriod']="Appraisal Period";
	$_SESSION['approve_l_search_department']="Department";
	$_SESSION['approve_l_search_position']="Level";
	$_SESSION['approve_l_search_btn_search']="Search";

	//column1
	$_SESSION['approve_emp_l_tbl_list']="Employees";
	$_SESSION['approve_emp_l_tbl_id']="#";
	$_SESSION['approve_emp_l_tbl_pticture']="Picture";
	$_SESSION['approve_emp_l_tbl_fullname']="Full Name";
	$_SESSION['approve_emp_l_tbl_department']="Department";
	$_SESSION['approve_emp_l_tbl_position']="Level";
	$_SESSION['approve_emp_l_tbl_age']="Age";
	$_SESSION['approve_emp_l_tbl_result']="Perfomnace";
	$_SESSION['approve_emp_l_tbl_emp_result']="Self-assessment";
	$_SESSION['approve_emp_l_tbl_total_result']="Perfomnace Total";
	$_SESSION['approve_emp_l_tbl_adjust_result']="Adjust Score";
	
	$_SESSION['approve_emp_l_tbl_manage']="Manage";

	

	//form
	$_SESSION['approve_l_form_name']="Adjust Form";
	$_SESSION['approve_l_form_kpi_peromance']="Perfomance% ";
	$_SESSION['approve_l_form_kpi_reason']="Reason";
	$_SESSION['approve_l_form_btn_save']="Save";
	$_SESSION['approve_l_form_btn_reset']="Reset";


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
 	.alert {
    border: 1px solid transparent;
    border-radius: 4px;
    margin-bottom: 5px;
    /* padding: 5px; */
}
.panel {
   
    margin-bottom: 5px;
}
 	.displayHideShow{
 		display: none;
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
<div class="modal fade " id='approveModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
   
   <div class="modal-content"> 
	   <div class="modal-header alert-info"> 
		   <button aria-label="Close" data-dismiss="modal" class="close" type="button">
		   		<span aria-hidden="true">×</span>
		   </button> 
		   	<h4 id="myLargeModalLabel" class="modal-title"><?=$_SESSION['approve_l_form_name']?>  </h4> 
	   </div> 
	   <div class="modal-body"> 

	   		<!-- content start-->
			   

			   <table class="table">
				   <thead>
					   <tr>
							<th style="text-align: center;">#</th>
							<th>ตัวชี้วัด</th>
							<th style="text-align: right;">เป้าข้อมูลดิบ</th>
							<th style="text-align: right;">ประเมินตนเอง</th>
							<th style="text-align: right;">หัวหน้าประเมิน</th>
							<th style="text-align: right;">ผลประเมิน%</th>
							
					   </tr>
				   </thead>
				   <tbody id="kpi_list_result">

					   
				   </tbody>
			   </table>
			   
			   <hr>

			<form id="AssignKpiForm">
				<table class="formAdjust" style="display:none; width: 100%;"  >
				<tr>
					<td class='text-right' style="width: 200px;">
						<b><?=$_SESSION['approve_l_form_kpi_peromance']?>%</b><font color="red">*</font>
					</td>
					<td>
						<input type="text" id="adjust_percentage" name="adjust_percentage"   class="form-control " >
					</td>
				</tr>
				<tr>
					<td class='text-right' valign="top">
						<b><?=$_SESSION['approve_l_form_kpi_reason']?></b>
					</td>
					<td>
						<textarea id="adjust_reason" name="adjust_reason"   class="form-control " ></textarea>
					</td>
					
				</tr>
				<tr>
					<td>
					
					</td>
					<td>
					<input type="hidden" value="" name="year_approve_emb" id="employee_id_emb">
					<input type="hidden" value="" name="appraisal_period_emb" id="appraisal_period_emb">
					<input type="hidden" value="" name="dep_approve_id_emb" id="dep_approve_id_emb">
					<input type="hidden" value="" name="position_approve_id_emb" id="position_approve_id_emb">
					<input type="hidden" value="" name="employee_id_emb" id="employee_id_emb">
					<input type="hidden" value="" name="role_id_emb" id="role_id_emb">

					<input type="button" id="btnSubmit" name="btnSubmit" value="<?=$_SESSION['approve_l_form_btn_save']?>"  class="btn btn-primary">
					<input type="reset" id="btnReset" name="btnReset" value="<?=$_SESSION['approve_l_form_btn_reset']?>"  class="btn btn-default">
					<button data-dismiss="modal" class="btn btn-default" type="button">ปิด</button> 
					</td>
				</tr>
			</table>
		</form>
	   		<!-- content end-->
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
     <h2> <strong><?=$_SESSION['approve_l_des_title']?></strong></h2>
   		<?=$_SESSION['approve_l_des_detail']?>
    </div>

      	





<div class="alert alert-info1 bg-from" role="alert">
<div class="row">
	<div class="col-md-12">
	
		<div class="col-md-2 boxMargin fontLabelParam"><b><?=$_SESSION['approve_l_search_year']?></b></div>
		<div class="col-md-2 boxMargin" id="approveKpiYearArea">
		
		</div>
	
		<div class="col-md-2 boxMargin fontLabelParam"><b class='pre-search-label'><?=$_SESSION['approve_l_search_appraisalPeriod']?></b> </div>
		<div class="col-md-2 boxMargin" id="periodApproveArea">
			
		</div>
	
		<div class="col-md-2 boxMargin fontLabelParam">
			<b class='pre-search-label'><?=$_SESSION['approve_l_search_department']?></b>
		</div>
		<div class="col-md-2 boxMargin">
			<div id="approveDepDropDrowListArea" >
			
			</div>
			
		</div>

		<div class="col-md-2 boxMargin fontLabelParam"><b class='pre-search-label'><?=$_SESSION['approve_l_search_position']?></b></div>
		<div class="col-md-2 boxMargin" id="approvePositionArea">
			
		</div>
		<div class="col-md-2 boxMargin fontLabelParam"><b class='pre-search-label'>สิทธิ์</b></div>
		<div class="col-md-2 boxMargin">
			<div id="roleDropDrowListArea" ></div>
		</div>
		<div>&nbsp;</div>
		<div style="display: none;">
			<input type="button" value="<?=$_SESSION['approve_l_search_btn_search']?>" id="approve_kpi_search"  class="btn btn-primary btn-sm">
		</div>
	</div>
	</div>
	</div>
	
	 <div style="margin-top: 5px;" class="panel panel-default panel-bottom displayHideShow">
			  <div class="panel-heading">
				<b><?=$_SESSION['approve_emp_l_tbl_list']?></b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div class="employeeData" style="display:none;" id="employeeShowData"></div>
			 		
			  </div>
	</div>
	
	
	<script src="../Controller/cApproveKpi.js"></script>

	




 
      	
      	
      