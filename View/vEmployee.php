<?php session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
	//description
	$_SESSION['employee_l_des_title']="พนักงาน";
	$_SESSION['employee_l_des_detail']="เพิ่ม,ลบ,แก้ไขข้อมูลพนักงานและตรงส่วนนี้จะเป็นกำหนดสิทธิ์การประเมินโดยแบ่งเป็น 3 ระดับดังนี้ 
	ผู้รับประเมิน,
	ผู้ประเมิน, 
	ผู้ประเมินสูงสุด  ";
	$_SESSION['employee_l_des_btn_add']="พนักงาน";

	//Search
	$_SESSION['employee_l_search_department']="แผนก";
	$_SESSION['employee_l_search_position']="ตำแหน่ง";
	$_SESSION['employee_l_search_status']="สถานะ";
	$_SESSION['employee_l_search_btn_search']="ค้นหา";

	//column
	$_SESSION['employee_l_tbl_id']="#";
	$_SESSION['employee_l_tbl_picture']="รูป";
	$_SESSION['employee_l_tbl_name']="ข้อมูลพนักงาน";
	$_SESSION['employee_l_tbl_department']="แผนก";
	$_SESSION['employee_l_tbl_position']="ตำแหน่ง";
	$_SESSION['employee_l_tbl_age_working']="อายุงาน";
	$_SESSION['employee_l_tbl_age']="อายุ";
	$_SESSION['employee_l_tbl_status']="สถานะ";
	$_SESSION['employee_l_tbl_manage']="จัดการ";

	//form
	$_SESSION['employee_l_form_name']="พนักงาน";
	$_SESSION['employee_l_form_picture']="รูปภาพ";
	$_SESSION['employee_l_form_emp_code']="รหัสพนักงาน";
	$_SESSION['employee_l_form_user']="ชื่อผู้ใช้งาน";
	$_SESSION['employee_l_form_password']="รหัสผ่าน";
	$_SESSION['employee_l_form_change_password']="เปลี่ยนรหัสผ่าน";
	
	$_SESSION['employee_l_form_confrim_password']="ยืนยันรหัสผ่าน";
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
	$_SESSION['employee_l_form_status_marital']="สถานะภาพ";
	$_SESSION['employee_l_form_status_single']="โสด";
	$_SESSION['employee_l_form_status_married']="แต่งงาน";

	$_SESSION['employee_l_form_address_no']="บ้านเลขที่";
	$_SESSION['employee_l_form_distict']="เขต/อำเภอ";
	$_SESSION['employee_l_form_sub_distict']="แขวง/ตำบล";
	$_SESSION['employee_l_form_province']="จังหวัด";
	$_SESSION['employee_l_form_postcode']="รหัสไปรษณีย์";
	$_SESSION['employee_l_form_other']="อื่นๆ";
	
	$_SESSION['employee_l_form_btn_add']="เพิ่ม";
	$_SESSION['employee_l_form_btn_reset']="เคลียร์";
	$_SESSION['employee_l_form_required']="จำเป็นต้องกรอก";

	

}else{
	
	//description
	$_SESSION['employee_l_des_title']="Employee Setup";
	$_SESSION['employee_l_des_detail']="Add, Delete, Edit Employee Information.";
	$_SESSION['employee_l_des_btn_add']="Employee";

	//Search
	$_SESSION['employee_l_search_department']="Department";
	$_SESSION['employee_l_search_position']="Level";
	$_SESSION['employee_l_search_status']="Status";
	$_SESSION['employee_l_search_btn_search']="Search";

	//column
	$_SESSION['employee_l_tbl_id']="#";
	$_SESSION['employee_l_tbl_picture']="Picture";
	$_SESSION['employee_l_tbl_name']="Full name";
	$_SESSION['employee_l_tbl_department']="Department";
	$_SESSION['employee_l_tbl_position']="Level";
	$_SESSION['employee_l_tbl_age_working']="Age Working";
	$_SESSION['employee_l_tbl_age']="Age";
	$_SESSION['employee_l_tbl_status']="Status";
	$_SESSION['employee_l_tbl_manage']="Manage";

	//form
	
	$_SESSION['employee_l_form_picture']="Picture";
	$_SESSION['employee_l_form_emp_code']="Employee Code";
	$_SESSION['employee_l_form_user']="Username";
	$_SESSION['employee_l_form_change_password']="Changes Pass";
	$_SESSION['employee_l_form_password']="Password";
	$_SESSION['employee_l_form_confrim_password']="Confirm Password";
	$_SESSION['employee_l_form_first_name']="First Name";
	$_SESSION['employee_l_form_last_name']="Last Name";
	$_SESSION['employee_l_form_department']="Department";
	$_SESSION['employee_l_form_position']="Position";
	$_SESSION['employee_l_form_role']="Role";
	$_SESSION['employee_l_form_status']="Stutus";
	$_SESSION['employee_l_form_age']="Age";
	$_SESSION['employee_l_form_moblie']="Moblie";
	$_SESSION['employee_l_form_tel']="Tel.";
	$_SESSION['employee_l_form_email']="E-mail";

	$_SESSION['employee_l_form_brithday']="Brithday";
	$_SESSION['employee_l_form_age_working']="Age Working";
	$_SESSION['employee_l_form_status_marital']="Status";
	$_SESSION['employee_l_form_status_single']="Single";
	$_SESSION['employee_l_form_status_married']="Married";

	$_SESSION['employee_l_form_address_no']="Address No.";
	$_SESSION['employee_l_form_distict']="Distict";
	$_SESSION['employee_l_form_sub_distict']="Sub Distict";
	$_SESSION['employee_l_form_province']="Province";
	$_SESSION['employee_l_form_postcode']="Postcode";
	$_SESSION['employee_l_form_other']="Other";
	
	$_SESSION['employee_l_form_btn_add']="Add";
	$_SESSION['employee_l_form_btn_reset']="Reset";
	$_SESSION['employee_l_form_required']="Required";

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

	.text-right {
		text-align: right;
		padding-right: 10px;
		width: 140px;
	}

	.alert {
		margin-bottom: 5px;

	}

	.panel {
		margin-bottom: 5px;
	}

	.alert>p,
	.alert>ul {
		margin-bottom: 5px;
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
<div id='employeeModal' class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">

		<div class="modal-content">
			<div class="modal-header alert-info">
				<button aria-label="Close" data-dismiss="modal" class="close" type="button">
					<span aria-hidden="true">×</span>
				</button>
				<h4 id="myLargeModalLabel" class="modal-title"> <?= $_SESSION['employee_l_form_name'] ?> </h4>
			</div>
			<form action="../Model/mEmployee.php" autocomplete="off" method="post" enctype="multipart/form-data" id="MyUploadForm">
				<div class="modal-body">

					<!-- content start-->


					<row>

						<div class="col-md-6">

							<table class="employeeData" style="display:none;">
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_picture'] ?></b></td>
									<td>
										<input class='form-control' name="image_file" id="imageInput" type="file" />
										<div style="display: none;" id="output"></div>
									</td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_emp_code'] ?><font color="red">*</font></b></td>
									<td>
										<input type="text" class="form-control " name="empCode" id="empCode">
									</td>
								</tr>

								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_user'] ?><font color="red">*</font></b></td>
									<td>
										<input type="text" class="form-control " name="empUser" id="empUser">
									</td>
								</tr>
								<tr id="changePassArea" style="display: none;">
									<td class='text-right '><b><?= $_SESSION['employee_l_form_change_password'] ?></b></td>
									<td class='text-left'>
										<input type="checkbox" name="changePass" id="changePass">
									</td>
								</tr>

								<tr id="passArea">
									<td class='text-right'><b><?= $_SESSION['employee_l_form_password'] ?><font color="red">*</font></b></td>
									<td>
										<input type="password" class="form-control " name="empPass" id="empPass">
									</td>
								</tr>
								<tr id="confirmPassArea">
									<td class='text-right'><b><?= $_SESSION['employee_l_form_confrim_password'] ?><font color="red">*</font></b></td>
									<td>
										<input type="password" class="form-control " name="empConfirmPass" id="empConfirmPass">
									</td>
								</tr>

								<tr>
									<td class='text-right'><b><b><?= $_SESSION['employee_l_form_first_name'] ?><font color="red">*</font></b></td>
									<td>
										<input type="text" class="form-control " name="empFirstName" id="empFirstName">
									</td>
								</tr>
								<tr>
									<td class='text-right'><b><b><?= $_SESSION['employee_l_form_last_name'] ?><font color="red">*</font></b></td>
									<td>
										<input type="text" class="form-control " name="empLastName" id="empLastName">
									</td>
								</tr>



								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_department'] ?><font color="red">*</font></b></td>
									<td id="depDropDrowListArea">

										<select name="empDepartment" id="empDepartment" class="form-control ">
											<!--
										<option>Position1</option>
										<option>Position2</option>
										<option>Position3</option>
										-->
										</select>

									</td>
								</tr>

								<!-- 
							<tr>
								<td>Division</td>
								<td id="divDropDrowListArea">
								
									<select name="empDivision" id="empDivision">
										<option>Position1</option>
										<option>Position2</option>
										<option>Position3</option>
									</select>
									
								</td>
							</tr>
							 -->

								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_position'] ?><font color="red">*</font></b></td>
									<td id="empPositionArea">

										<select name="empPosition" id="empPosition" class="form-control ">
											<!--
										<option>Position1</option>
										<option>Position2</option>
										<option>Position3</option>
										-->
										</select>

									</td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_role'] ?></b></td>
									<td id="roleDropDrowListArea">
									</td>
								</tr>

								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_status'] ?></b></td>
									<td id="empStatusWorkArea">



									</td>
								</tr>
<!-- 								
							 	<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_position2'] ?>
											
										</b></td>
									<td><input type="text" name="empPosition2" id="empPosition2" class="form-control "> </td>
								</tr>  -->

								


								<!-- <tr>
								<td class='text-right'><b><?= $_SESSION['employee_l_form_age'] ?></b></td>
								<td><input type="text" name="empAge" id="empAge" class="form-control "></td>
							</tr> -->
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_moblie'] ?>
											<!-- <font color="red">*</font> -->
										</b></td>
									<td><input type="text" name="empMobile" id="empMobile" class="form-control "></td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_tel'] ?>
											<!-- <font color="red">*</font> -->
										</b></td>
									<td><input type="text" name="empTel" id="empTel" class="form-control "></td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_email'] ?>
											<!-- <font color="red">*</font> -->
										</b></td>
									<td><input type="text" name="empEmail" id="empEmail" class="form-control "> </td>
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
										<input type="text" name="empBrithDay" id="empBrithDay" class=" ">
									</td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_age_working'] ?>
											<!-- <font color="red">*</font></b> -->
									</td>
									<td>
										<input type="text" name="empAgeWorking" id="empAgeWorking" class=" ">
									</td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_status_marital'] ?></b></td>
									<td id="empStatusArea">

										โสด <input type="radio" class="empStatus " name="empStatus" value="single" checked>
										สมรส <input type="radio" class="empStatus " name="empStatus" value="married">
									</td>
								</tr>



								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_address_no'] ?></b></td>
									<td>
										<textarea id="empAddress" name="empAddress" class="form-control "></textarea>
									</td>
								</tr>

								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_province'] ?></b></td>
									<td><input type="text" name="empProvince" id="empProvince" class="form-control "> </td>
								</tr>
								
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_distict'] ?></b></td>
									<td><input type="text" name="empDistict" id="empDistict" class="form-control "></td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_sub_distict'] ?></b></td>
									<td><input type="text" name="empSubDistict" id="empSubDistict" class="form-control "></td>
								</tr>

								
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_postcode'] ?></b></td>
									<td><input type="text" name="empPostcode" id="empPostcode" class="form-control "></td>
								</tr>
								<tr>
									<td class='text-right'><b><?= $_SESSION['employee_l_form_other'] ?></b></td>
									<td><textarea name="empOther" id="empOther" class="form-control "></textarea></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="">(<font color="red">*</font>)<?= $_SESSION['employee_l_form_required'] ?></td>
								</tr>
								<!--
							<tr>
								<td></td>
								<td colspan="">
								
									<input type="hidden" name="empAction" id ="empAction" class="empAction" value="add">
									<input type="hidden" name="empId" id ="empId"  class="empId" value="">
									<input type="submit" id="empSubmit" name="empSubmit" class="btn btn-primary btn-sm"  value="Add">
									<input type="reset" value="Reset" id="empReset" class="btn default  btn-sm" >

								</td>
							</tr>
							-->
							</table>

							<br style="clear: both;">
						</div>
						<br style="clear: both;">
					</row>
					<br style="clear: both;">


					<!-- content end-->


				</div>
				<div id="warningInModalArea"></div>   
				<div class="modal-footer">
				
	   			
	   		<!-- <button class="btn btn-primary" type="button">Save changes</button>  -->
	   		
					<input type="hidden" name="empAction" id="empAction" class="empAction" value="add">
					<input type="hidden" name="empId" id="empId" class="empId" value="">
					<input type="submit" id="empSubmit" name="empSubmit" class="btn btn-primary " value="<?= $_SESSION['employee_l_form_btn_add'] ?>">
					<input type="reset" value="<?= $_SESSION['employee_l_form_btn_reset'] ?>" id="empReset" class="btn default  ">
					<button data-dismiss="modal" class="btn btn-default" type="button">ปิด</button> 

				</div>

			</form>
			

		</div>

	</div>
</div>
<!-- Large modal end-->

<!-- Large view modal start-->
<div id='employeeViewModal' class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
<!-- Large view modal end-->




<div role="alert" class="alert alert-info">
	<h2> <strong><?= $_SESSION['employee_l_des_title'] ?></strong></h2>
	<?= $_SESSION['employee_l_des_detail'] ?>
</div>


<div class="alert alert-info1 bg-from" role="alert">

	<div class="row">
		<div class="col-md-12">
			
			<div class='col-md-2 boxMargin fontLabelParam'>
				<strong class="pre-search-label boxMargin"><?= $_SESSION['employee_l_search_department'] ?></strong>
			</div>
			<div class='col-md-2 boxMargin'  id="depSearchDropDrowListArea"></div>
		
			<div class='col-md-2 boxMargin fontLabelParam'>
				<strong class='pre-search-label boxMargin'><?= $_SESSION['employee_l_search_position'] ?></strong>
			</div>
			<div class='col-md-2 boxMargin' id="empSearchPositionArea"></div>


			<div class='col-md-2 boxMargin fontLabelParam'>
				<strong class='pre-search-label boxMargin'><?= $_SESSION['employee_l_search_status'] ?></strong>
			</div>
			<div class='col-md-2 boxMargin' id="empSearchStatusWorkArea"></div>

			
			
			
			
			<div class='col-md-2 boxMargin fontLabelParam'><strong class='pre-search-label boxMargin'>สิทธิ์</strong></div>
			<div class='col-md-2 boxMargin' id="roleSearchDropDrowListArea" ></div>

		</div>
	</div>
</div>


	<div style="margin-top: 5px;" class="panel panel-default panel-bottom">
		<div class="panel-heading">

			<button  style="float:right"  data-toggle="modal" data-target="" class="btn btn-primary " id="btnAddEmployee" type="button"><i class="glyphicon  glyphicon-plus"></i>
				<?= $_SESSION['employee_l_des_btn_add'] ?>
			</button>
			<br style="clear: both;">		
		</div>
		<div class="panel-body panel-body-top">

			<div class="employeeData" style="display:none;" id="employeeShowData"></div>

		</div>
	</div>
	<input type='hidden' id='user_amount_empbed' class='param_empbed' name='user_amount_empbed' value='<?= $_SESSION['user_amount'] ?>'>


	<!--
<div class="alert alert-info bg-from" role="alert">
<p class="bg-warning1">
	Employee Form
</p>
<br>

<br style='clear: both'>
</div>
-->
<script src="../Controller/cEmployee.js"></script>