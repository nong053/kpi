<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
	//description
	$_SESSION['approve_l_des_title']="ปรับคะแนนผลการปฏิบัติการ";
	$_SESSION['approve_l_des_detail']="เพื่อให้ผู้บริหารหรือผู้จัดการสามารถปรับคะแนนผลการปฏิบัติการในแต่ละงวดให้พนักงานได้  ";
	

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
	$_SESSION['approve_l_form_name']="ฟอร์มปรับผลการประเมิน";
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

			<form id="AssignKpiForm">
				<table class="formAdjust" style="display:none; width: 100%;"  >
				<tr>
					<td class='text-right' style="width: 200px;">
						<b><?=$_SESSION['approve_l_form_kpi_peromance']?>%</b>
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

					<input type="button" id="btnSubmit" name="btnSubmit" value="<?=$_SESSION['approve_l_form_btn_save']?>"  class="btn btn-primary">
					<input type="reset" id="btnReset" name="btnReset" value="<?=$_SESSION['approve_l_form_btn_reset']?>"  class="btn btn-default">
					</td>
				</tr>
			</table>
		</form>
	   		<!-- content end-->

	   </div> 
   </div>

  </div>
</div>
<!-- Large modal end-->

<div role="alert" class="alert alert-info">
     <h2> <strong><?=$_SESSION['approve_l_des_title']?></strong></h2>
   		<?=$_SESSION['approve_l_des_detail']?>
    </div>

      	





<div class="alert alert-info bg-from" role="alert">
<table>
	<tr>
	
		<td><b><?=$_SESSION['approve_l_search_year']?></b></td>
		<td id="approveKpiYearArea">
		<!-- 
			<select id="year">
				<option>2012</option>
				<option>2013</option>
				<option>2014</option>
				<option>2015</option>
			</select>
		 -->
		</td>
	
		<td><b class='pre-search-label'><?=$_SESSION['approve_l_search_appraisalPeriod']?></b> </td>
		<td id="periodApproveArea">
			
		</td>
	
		<td>
			<b class='pre-search-label'><?=$_SESSION['approve_l_search_department']?></b>
		</td>
		<td>
			<div id="approveDepDropDrowListArea" style="float:left;">
			
			</div>
			
		</td>
	<!-- 
		<td>
		Division
		</td>
		<td>
			<div id="divDropDrowListArea" style="float:left;">
			
			</div>
			
		</td>
	 -->
		<td><b class='pre-search-label'><?=$_SESSION['approve_l_search_position']?></b></td>
		<td id="approvePositionArea">
			
		</td>
	<!-- 
		<td>Employee</td>
		<td id="employeeArea">
			
		</td>
	-->
		<td>&nbsp;</td>
		<td style="display: none;">
			<input type="button" value="<?=$_SESSION['approve_l_search_btn_search']?>" id="approve_kpi_search"  class="btn btn-primary btn-sm">
		</td>
	</tr>
	</table>
	</div>
	
	 <div style="margin-top: 5px;" class="panel panel-default panel-bottom displayHideShow">
			  <div class="panel-heading">
				<b><?=$_SESSION['approve_emp_l_tbl_list']?></b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div class="employeeData" style="display:none;" id="employeeShowData"></div>
			 		
			  </div>
	</div>
	
	<!--
	<div class="alert alert-info bg-from displayHideShow" role="alert">
		<p class="bg-warning1">
		Adjustment Form
		</p>	
		<br>

	</div>
	-->
	<script src="../Controller/cApproveKpi.js"></script>

	




 
      	
      	
      