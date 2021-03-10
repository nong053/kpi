<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
	//description
	$_SESSION['emp_evaluate_l_des_title']="ประเมินตนเอง";
	$_SESSION['emp_evaluate_l_des_detail']="เพื่อประเมินตัวเอง ";
	

	//Search
	$_SESSION['emp_evaluate_l_search_year']="ปีประเมิน";
	$_SESSION['emp_evaluate_l_search_appraisalPeriod']="ช่วงการประเมิน";
	$_SESSION['emp_evaluate_l_search_department']="แผนก";
	$_SESSION['emp_evaluate_l_search_position']="ตำแหน่ง";
	$_SESSION['emp_evaluate_l_search_btn_search']="ตกลง";

	//column1
	//column1
	$_SESSION['emp_evaluate_emp_l_tbl_list']="พนักงาน";
	$_SESSION['emp_evaluate_emp_l_tbl_id']="#";
	$_SESSION['emp_evaluate_emp_l_tbl_pticture']="รูป";
	$_SESSION['emp_evaluate_emp_l_tbl_fullname']="ชื่อ-นามสกุล";
	$_SESSION['emp_evaluate_emp_l_tbl_department']="แผนก";
	$_SESSION['emp_evaluate_emp_l_tbl_position']="ตำแหน่ง";
	$_SESSION['emp_evaluate_emp_l_tbl_age']="อายุ";
	$_SESSION['emp_evaluate_emp_l_tbl_result']="ผลการประเมิน";
	$_SESSION['emp_evaluate_emp_l_tbl_manage']="จัดการ";


	//column2
	$_SESSION['emp_evaluate_l_tbl_list']="ประเมินตามตัวชี้วัด";
	$_SESSION['emp_evaluate_l_tbl_id']="#";
	$_SESSION['emp_evaluate_l_tbl_kpi_name']="ตัวชี้วัด";
	$_SESSION['emp_evaluate_l_tbl_weight']="น้ำหนัก";
	$_SESSION['emp_evaluate_l_tbl_target']="เป้า";
	$_SESSION['emp_evaluate_l_tbl_target_score']="ผลการประเมิน";
	$_SESSION['emp_evaluate_l_tbl_manage']="ประเมิน";

	

	//form
	
	$_SESSION['emp_evaluate_l_form_suggestion']="เกณฑ์";
	//$_SESSION['emp_evaluate_l_form_name']="ฟอร์มการประเมิน";
	$_SESSION['emp_evaluate_l_form_name']="ประเมินตามตัวชี้วัด";
	$_SESSION['emp_evaluate_l_form_name2']="รายการประเมิน";
	$_SESSION['emp_evaluate_l_form_kpi_weight']="น้ำหนัก ";
	$_SESSION['emp_evaluate_l_form_kpi_percentage']="ผลการประเมิน";

	$_SESSION['emp_evaluate_l_form_kpi_name']="ตัวชี้วัด";
	$_SESSION['emp_evaluate_l_form_baseline']="ตารางคะแนน ";
	$_SESSION['emp_evaluate_l_form_btn_save']="บันทึก";
	$_SESSION['emp_evaluate_l_form_begin']="เริ่ม";
	$_SESSION['emp_evaluate_l_form_end']="ถึง";
	$_SESSION['emp_evaluate_l_form_score']="คะแนน";
	$_SESSION['emp_evaluate_l_form_acutal_data']="ผลการประเมิน";

	

}else{
	
//description
	$_SESSION['emp_evaluate_l_form_suggestion']="Threshold";
	$_SESSION['emp_evaluate_l_des_title']="Evaluate";
	$_SESSION['emp_evaluate_l_des_detail']="To assess yourself.";
	

	//Search
	$_SESSION['emp_evaluate_l_search_year']="Year";
	$_SESSION['emp_evaluate_l_search_appraisalPeriod']="Appraisal Period";
	$_SESSION['emp_evaluate_l_search_department']="Department";
	$_SESSION['emp_evaluate_l_search_position']="Position";
	$_SESSION['emp_evaluate_l_search_btn_search']="OK";

	//column1
	$_SESSION['emp_evaluate_emp_l_tbl_list']="Employees";
	$_SESSION['emp_evaluate_emp_l_tbl_id']="#";
	$_SESSION['emp_evaluate_emp_l_tbl_pticture']="Picture";
	$_SESSION['emp_evaluate_emp_l_tbl_fullname']="Full Name";
	$_SESSION['emp_evaluate_emp_l_tbl_department']="Department";
	$_SESSION['emp_evaluate_emp_l_tbl_position']="Position";
	$_SESSION['emp_evaluate_emp_l_tbl_age']="Age";
	$_SESSION['emp_evaluate_emp_l_tbl_result']="Perfomnace";
	$_SESSION['emp_evaluate_emp_l_tbl_manage']="Manage";


	//column2
	

	$_SESSION['emp_evaluate_l_tbl_list']="KPI List";
	$_SESSION['emp_evaluate_l_tbl_id']="#";
	$_SESSION['emp_evaluate_l_tbl_kpi_name']="KPI Name";
	$_SESSION['emp_evaluate_l_tbl_weight']="Weight";
	$_SESSION['emp_evaluate_l_tbl_target']="Target";
	$_SESSION['emp_evaluate_l_tbl_target_score']="Actual";
	$_SESSION['emp_evaluate_l_tbl_manage']="Appraisal";

	

	//form
	
	//$_SESSION['emp_evaluate_l_form_name']="Evaluate Form ";
	$_SESSION['emp_evaluate_l_form_name']="Evaluate by KPI";
	$_SESSION['emp_evaluate_l_form_name2']="Evaluate by KPI";
	$_SESSION['emp_evaluate_l_form_kpi_weight']="KPI Weight ";
	$_SESSION['emp_evaluate_l_form_kpi_percentage']="Performance";

	$_SESSION['emp_evaluate_l_form_kpi_name']="KPI";
	$_SESSION['emp_evaluate_l_form_baseline']="Baseline ";
	$_SESSION['emp_evaluate_l_form_btn_save']="Save";
	$_SESSION['emp_evaluate_l_form_begin']="Begin";
	$_SESSION['emp_evaluate_l_form_end']="End";
	$_SESSION['emp_evaluate_l_form_score']="Score";
	$_SESSION['emp_evaluate_l_form_acutal_data']="KPI Result";

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
     padding: 5px;
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
		font-weight: bold;
		font-size: 20px;
	}
	
 </style>




 <!-- Large modal start-->
<!-- <div class="modal fade " id='assignResultKPIModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document"> -->
   
   

 <!--  </div>
</div> -->
<!-- Large modal end-->



 
<div role="alert" class="alert alert-info">
     <h2> <strong><?=$_SESSION['emp_evaluate_l_des_title']?></strong></h2>
   		<?=$_SESSION['emp_evaluate_l_des_detail']?>
    </div>




<div role="alert" class="alert alert-info bg-from">
	
<table>
	<tr>
	
		<td><b><?=$_SESSION['emp_evaluate_l_search_year']?></b></td>
		<td id="myEvaluateYearArea">
		</td>
	
		<td><b><?=$_SESSION['emp_evaluate_l_search_appraisalPeriod']?></b></td>
		<td id="myEvaluatePeriodArea">
			
		</td>
		<td>&nbsp;</td>
		<td style="display: none;">
			<input type="button" value="<?=$_SESSION['emp_evaluate_l_search_btn_search']?>" id="my_evaluate_search"  class="btn btn-primary btn-sm">
		</td>
	</tr>
	</table>
</div>






<div class="panel panel-default">
      <!-- <div class="panel-heading"><b><?=$_SESSION['emp_evaluate_l_form_name']?></b> </div> -->
      <div class="panel-body" style="padding-bottom: 5px;">

      <!--content start-->

      <div class="alert alert-info bg-from displayHideShow" role="alert" style="display: block;">

		<div class="row container-fluid">
			<div class="col-md-6">
				<div id="empNameArea" class="empNameArea">
					<div class="">
						<div class="impageEmpClass">
							<img class="img-circle" id="empDisplayImage" src="../View/uploads/avatar.jpg" width="100px;">
						</div>
						<div class="infoEmpClass" style="border: 0px solid #ddd; padding: 5px; margin-top: 0px;" >
							<div id="empDisplayFullName" style="font-weight: bold;font-size: 16px; border-bottom: 0px solid #ddd; "></div>
		
							ตำแหน่ง:<span id="empDisplayPosition"></span><br>
							แผนก:<span id="empDisplayDepartment"></span><br>
							สิทธิ์:<span id="empDisplayRole"></span><br>
							อายุงาน:<span id="empDisplayWorkAge"></span><br>
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-6 " style="text-align: right; font-weight: bold;font-size: 24px;">
			
				<div class="summary_kpi">
					<div style="display: none;;">
					 	น้ำหนัก 					</div>
					<div style="display: none;;">
						<div id="kpi_weight_total"><strong style="color:green"><strong></strong></strong></div> 
					</div>
					<div>
					 	 ผลการประเมิน 
					</div>
					<div>
						<div id="score_sum_percentage" style="color: rgb(255, 0, 0);">0%</div>
					</div>
				
				</div>

			</div>
		</div>
	
	
</div>

<!-- 
<div class="alert alert-info bg-from displayHideShow" role="alert" >

		<div class="row container-fluid">
			<div class="col-md-6">
				<div id="empNameArea" class="empNameArea"></div>
			</div>
			<div class="col-md-6 " style="text-align: right;">
			
				<div class="summary_kpi">
					<div style="display: none;;" >
					 	<?=$_SESSION['emp_evaluate_l_form_kpi_weight']?>
					</div>
					<div style="display: none;;">
						<div id="kpi_weight_total"><strong></strong></div> 
					</div>
					<div>
					 	 <?=$_SESSION['emp_evaluate_l_form_kpi_percentage']?> 
					</div>
					<div>
						<div id="score_sum_percentage"></div>
					</div>
					
				</div>

			</div>
		</div>	
</div>	
-->	

<div style="margin-top: 0px;" class="panel panel-default panel-bottom ">
		  <div class="panel-heading">
			<b><?=$_SESSION['emp_evaluate_l_tbl_list']?> </b>			
		  </div>
		  <div class="panel-body panel-body-top">
		  
		 		<div id="assignKpiShowData" ></div>
		 		
		  </div>
</div>
	

	
<div id="formKPI" style="display:none;">
	

<div class="alert alert-info bg-from" role="alert">
<p class="bg-warning1">

	<?=$_SESSION['emp_evaluate_l_form_name2']?> 
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


					<input type="hidden" name="assign_kpi_id" id ="assign_kpi_id"  value="">
					<input type="submit" id="assign_kpi_submit" name="assign_kpi_submit" value="Add" class="btn btn-primary btn-sm">
					<input type="button" value="Reset" id="assign_kpi_reset" class="btn btn-default btn-sm">
					<button data-dismiss="modal" class="btn btn-default" type="button">ปิด</button> 
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
		<div style="float: right; padding: 5px;">
			<div style="display: inline;" id="confirm_kpi"></div>			
			<input type="button" id="kpi_process" name="kpi_process" value="ยืนยันผลการประเมิน" class="btn btn-warning ">
		</div>
		<br style='clear: both'>
      <!--content end-->
  	</div>
</div>



	<div id='paramEmbedAssignKPI'></div>
	
	
	<script src="../Controller/cMyEvaluate.js"></script>

	
	






      	
      	
