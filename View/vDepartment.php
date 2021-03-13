<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
	//description
	$_SESSION['department_l_des_title']="แผนก";
	$_SESSION['department_l_des_detail']="เพื่อกำหนดแผนกที่ต้องการวัดผลการปฏิบัติงาน ";
	$_SESSION['department_l_des_btn_add']="แผนก";

	//column
	$_SESSION['department_l_tbl_id']="#";
	$_SESSION['department_l_tbl_department_code']="รหัสแผนก";
	$_SESSION['department_l_tbl_department_name']="แผนก";
	$_SESSION['department_l_tbl_department_detail']="รายละเอียด";
	$_SESSION['department_l_tbl_manage']="จัดการ";

	//form
	$_SESSION['department_l_form_required']="จำเป็นต้องกรอก";
	$_SESSION['department_l_form_name']="แผนก";
	$_SESSION['department_l_form_department_code']="รหัสแผนก";
	$_SESSION['department_l_form_department_name']="แผนก";
	$_SESSION['department_l_form_department_detail']="รายละเอียด";
	$_SESSION['department_l_form_btn_add']="เพิ่ม";
	$_SESSION['department_l_form_btn_reset']="เคลียร์";

	

}else{
	

	//description
	$_SESSION['department_l_des_title']="Department Setup";
	$_SESSION['department_l_des_detail']="To determine the view or group of KPIs that need to measure performance. ";
	$_SESSION['department_l_des_btn_add']="Department";

	//column
	$_SESSION['department_l_tbl_id']="#";
	$_SESSION['department_l_tbl_department_code']="Code";
	$_SESSION['department_l_tbl_department_name']="Department Name";
	$_SESSION['department_l_tbl_department_detail']="Department Detail";
	$_SESSION['department_l_tbl_manage']="Manage";

	//form
	$_SESSION['department_l_form_required']="Required";
	$_SESSION['department_l_form_name']="Department Form ";
	$_SESSION['department_l_form_department_code']="Department Code";
	$_SESSION['department_l_form_department_name']="Department Name";
	$_SESSION['department_l_form_department_detail']="Department Detail";
	$_SESSION['department_l_form_btn_add']="Add";
	$_SESSION['department_l_form_btn_reset']="Reset";
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
 	
 	
 </style>
 
	<div role="alert" class="alert alert-info">
     <h2> <strong><?=$_SESSION['department_l_des_title']?> </strong></h2>
   		<?=$_SESSION['department_l_des_detail']?>
    </div>
    
    <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
					
				<button data-toggle="modal" data-target="" class="btn btn-primary " id="btnAddDepartment" type="button"><i class="glyphicon  glyphicon-plus"></i>
				<?=$_SESSION['department_l_des_btn_add']?>
				</button>		
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div id="departmentShowData"></div>
			 		
			  </div>
	</div>




<!-- Large modal start-->
<div id='departmentModal' class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog " role="document">
   
   <div class="modal-content"> 
	   <div class="modal-header alert-info"> 
		   <button aria-label="Close" data-dismiss="modal" class="close" type="button">
		   		<span aria-hidden="true">×</span>
		   </button> 
		   	<h4 id="myLargeModalLabel" class="modal-title"> <?=$_SESSION['department_l_form_name']?>  </h4> 
	   </div> 
	   <div class="modal-body"> 

	   		<!-- content start-->
	   		<form id="departmentForm">
				<table style="width: 100%;">
					<!--
					<tr>
						<td style="width: 200px;" class="text-right"><b><?=$_SESSION['department_l_form_department_code']?>  <font color="red">*</font></b></td>
						<td><input type="text" name="departmentCode" class="form-control " id="departmentCode"></td>
					</tr>
					-->
					<tr>
						<td style="width: 200px;" class="text-right"><b><?=$_SESSION['department_l_form_department_name']?>  <font color="red">*</font></b></td>
						<td><input type="text" name="departmentName" class="form-control " id="departmentName"></td>
					</tr>
					<tr>
						<td class="text-right" valign="top"><b><?=$_SESSION['department_l_form_department_detail']?> </b></td>
						<td><textarea name="departmentDetail" class="form-control " id="departmentDetail"></textarea></td>
					</tr>
					
					<tr>
						<td ></td>
						<td >
							(<font color="red">*</font>)<?=$_SESSION['department_l_form_required']?><br>
							<input type="hidden" name="departmentAction" id ="departmentAction" class="departmentAction" value="add">
							<input type="hidden" name="departmentId" id ="departmentId"  class="departmentId" value="">
							<input type="submit" id="departmentSubmit" name="departmentSubmit"  class="btn btn-primary " value="<?=$_SESSION['department_l_form_btn_add']?>">
							<input type="reset" value="<?=$_SESSION['department_l_form_btn_reset']?>" class="btn default  " id="departmentReset">
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

<!--
<div class="alert alert-info bg-from" role="alert">
<p class="bg-warning1">
	Department Form
</p>
<br>
<form id="departmentForm">
<table>
	
	<tr>
		<td class="text-right"><b>Department Name <font color="red">*</font></b></td>
		<td><input type="text" name="departmentName" class="form-control " id="departmentName"></td>
	</tr>
	<tr>
		<td class="text-right" valign="top"><b>Department Detail</b></td>
		<td><textarea name="departmentDetail" class="form-control " id="departmentDetail"></textarea></td>
	</tr>
	
	<tr>
		<td ></td>
		<td >
			(<font color="red">*</font>)จำเป็นต้องกรอก<br>
			<input type="hidden" name="departmentAction" id ="departmentAction" class="departmentAction" value="add">
			<input type="hidden" name="departmentId" id ="departmentId"  class="departmentId" value="">
			<input type="submit" id="departmentSubmit" name="departmentSubmit"  class="btn btn-primary btn-sm" value="Add">
			<input type="reset" value="Reset" class="btn default  btn-sm" id="departmentReset">
		</td>
	</tr>
</table>
</form>
</div>
-->

<script src="../Controller/cDepartment.js"></script>