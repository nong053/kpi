<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
	//description
	$_SESSION['appraisalPeriod_l_des_title']="ช่วงประเมิน";
	$_SESSION['appraisalPeriod_l_des_detail']="เพื่อกำหนดงวดการประเมินผลการปฏิบัติงานว่าใน 1 ปีจะประเมินผลกี่ครั้ง และแต่ละครั้งจะเริ่มและสิ้นสุดที่วันใด";
	$_SESSION['appraisalPeriod_l_des_btn_add']="ช่วงประเมิน";

	//column
	$_SESSION['appraisalPeriod_l_tbl_id']="#";
	$_SESSION['appraisalPeriod_l_tbl_year']="ปีการประเมิน";
	$_SESSION['appraisalPeriod_l_tbl_des']="ช่วงประเมิน";
	$_SESSION['appraisalPeriod_l_tbl_start']="เริ่ม";
	$_SESSION['appraisalPeriod_l_tbl_end']="ถึง";
	$_SESSION['appraisalPeriod_l_tbl_target']="เป้าหมายYTD%";

	$_SESSION['appraisalPeriod_l_tbl_manage']="จัดการ";

	//form
	$_SESSION['appraisalPeriod_l_form_required']="จำเป็นต้องกรอก";
	$_SESSION['appraisalPeriod_l_form_name']="ฟร์อมช่วงประเมิน";
	$_SESSION['appraisalPeriod_l_form_des']="ชื่อช่วงประเมิน";
	$_SESSION['appraisalPeriod_l_form_start']="เริ่ม";
	$_SESSION['appraisalPeriod_l_form_end']="ถึง";
	$_SESSION['appraisalPeriod_l_form_target']="เป้าหมายYTD%";
	$_SESSION['appraisalPeriod_l_form_btn_add']="เพิ่ม";
	$_SESSION['appraisalPeriod_l_form_btn_reset']="เคลียร์";
	

	

}else{
	

	//description
	$_SESSION['appraisalPeriod_l_des_title']="Appraisal Period Setup";
	$_SESSION['appraisalPeriod_l_des_detail']="To determine the period of performance evaluation, how many times in a year? And each time it starts and ends on any day.";
	$_SESSION['appraisalPeriod_l_des_btn_add']="Appraisal Period";

	//column
	$_SESSION['appraisalPeriod_l_tbl_id']="#";
	$_SESSION['appraisalPeriod_l_tbl_year']="Year";
	$_SESSION['appraisalPeriod_l_tbl_des']="Appraisal Period";
	$_SESSION['appraisalPeriod_l_tbl_start']="From";
	$_SESSION['appraisalPeriod_l_tbl_end']="To";
	$_SESSION['appraisalPeriod_l_tbl_target']="Target YTD%";
	$_SESSION['appraisalPeriod_l_tbl_manage']="Manage";

	//form
	$_SESSION['appraisalPeriod_l_form_required']="Required";
	$_SESSION['appraisalPeriod_l_form_name']="Appraial Period Form ";
	$_SESSION['appraisalPeriod_l_form_des']="Description";
	$_SESSION['appraisalPeriod_l_form_start']="From";
	$_SESSION['appraisalPeriod_l_form_end']="To";
	$_SESSION['appraisalPeriod_l_form_target']="Target YTD%";
	$_SESSION['appraisalPeriod_l_form_btn_add']="Add";
	$_SESSION['appraisalPeriod_l_form_btn_reset']="Reset";
}

?>	
	<link href="../Css/appraisalPeriod.css" rel="stylesheet">
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
     <h2> <strong><?=$_SESSION['appraisalPeriod_l_des_title']?></strong></h2>
   		 <?=$_SESSION['appraisalPeriod_l_des_detail']?>
    </div>


 <!-- Large modal start-->
<div class="modal fade appraisalPeriodSetup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
   
   <div class="modal-content"> 
	   <div class="modal-header alert-info"> 
		   <button aria-label="Close" data-dismiss="modal" class="close" type="button">
		   		<span aria-hidden="true">×</span>
		   </button> 
		   	<h4 id="myLargeModalLabel" class="modal-title"> <?=$_SESSION['appraisalPeriod_l_form_name']?></h4> 
	   </div> 
	   <div class="modal-body"> 

	   		<!-- content start-->

				<form id="appraisalPeriodForm">
				<table style="width:100%;">
					<!--
					<tr>
						<td class='text-right'><b>Year</b></td>
						<td class="appraisalYearArea">
							
						</td>
					</tr>
					-->
					<tr>
						<td style="width:200px;" class='text-right'><b><?=$_SESSION['appraisalPeriod_l_form_des']?> <font color="red">*</font></b></td>
						<td><input type="text" name="appraisalPeriodDesc" id="appraisalPeriodDesc" class="form-control " style="width:250px;"></td>
					</tr>
					
					<tr>
						<td class='text-right'><b><?=$_SESSION['appraisalPeriod_l_form_start']?> <font color="red">*</font></b></td>
						<td><input type="text" name="appraisalPeriodStart" id="appraisalPeriodStart" class=" " style="width:150px;"></td>
					</tr>
					<tr>
						<td class='text-right'><b><?=$_SESSION['appraisalPeriod_l_form_end']?> <font color="red">*</font></b></td>
						<td><input type="text" name="appraisalPeriodEnd" id="appraisalPeriodEnd" class=" " style="width:150px;"></td>
					</tr>
					
					<tr style="display: none;">
						<td class='text-right'><b><?=$_SESSION['appraisalPeriod_l_form_target']?>
							<!-- <font color="red">*</font> -->
						</b></td>
						<td><input type="text" name="appraisal_period_target_percentage" id="appraisal_period_target_percentage" class="form-control " style="width:100px;"></td>
					</tr>
					<tr>
						<td >
						</td>
						<td>
						(<font color="red">*</font>)<?=$_SESSION['appraisalPeriod_l_form_required']?><br>
							<input type="hidden" name="appraisalPeriodAction" id ="appraisalPeriodAction" class="appraisalPeriodAction" value="add">
							<input type="hidden" name="appraisalPeriodId" id ="appraisalPeriodId"  class="appraisalPeriodId" value="">
							<input type="submit" id="appraisalPeriodSubmit" name="appraisalPeriodSubmit" class="btn btn-primary " value="<?=$_SESSION['appraisalPeriod_l_form_btn_add']?>">
							<input type="reset" value="<?=$_SESSION['appraisalPeriod_l_form_btn_reset']?>" class="btn default  " id="appraisalPeriodReset">
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


   <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
				

					<span style="float:left;" class='appraisalYearArea'></span>

					<span style="float:left;" class="pre-search-label">
						<button data-toggle="modal" data-target=".appraisalPeriodSetup" class="btn btn-primary " id="btnAppraisalPeriod" type="button"><i class="glyphicon  glyphicon-plus"></i>
						<?=$_SESSION['appraisalPeriod_l_des_btn_add']?>
						</button>
					</span>
				
				<br style="clear: both;">			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div id="appraisalPeriodShowData"></div>
			 		
			  </div>
	</div>

<!-- 
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Period No</th>
			<th>Description</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Manage</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>2012</td>
			<td>1</td>
			<td>26/11/2012</td>
			<td>25/03/2013</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			<td>2012</td>
			<td>1</td>
			<td>26/11/2012</td>
			<td>25/03/2013</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			<td>2012</td>
			<td>1</td>
			<td>26/11/2012</td>
			<td>25/03/2013</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
	</tbody>
</table>
 -->
 <!--
<div class="alert alert-info bg-from" role="alert">
<p class="bg-warning1">
	  Appraial Period Form
</p>
<br>


<form id="appraisalPeriodForm">
<table>
	<tr>
		<td class='text-right'><b>Year</b></td>
		<td class="appraisalYearArea">
		
		</td>
	</tr>
	
	<tr>
		<td class='text-right'><b>Description <font color="red">*</font></b></td>
		<td><input type="text" name="appraisalPeriodDesc" id="appraisalPeriodDesc" class="form-control " style="width:250px;"></td>
	</tr>
	<tr>
		<td class='text-right'><b>Start Date <font color="red">*</font></b></td>
		<td><input type="text" name="appraisalPeriodStart" id="appraisalPeriodStart" class="form-control " style="width:100px;"></td>
	</tr>
	<tr>
		<td class='text-right'><b>End Date <font color="red">*</font></b></td>
		<td><input type="text" name="appraisalPeriodEnd" id="appraisalPeriodEnd" class="form-control " style="width:100px;"></td>
	</tr>
	<tr style="display: none;">
		<td class='text-right'><b>Target Percentage <font color="red">*</font></b></td>
		<td><input type="text" name="appraisal_period_target_percentage" id="appraisal_period_target_percentage" class="form-control " style="width:100px;"></td>
	</tr>
	<tr>
		<td >
		</td>
		<td>
		(<font color="red">*</font>)จำเป็นต้องกรอก<br>
			<input type="hidden" name="appraisalPeriodAction" id ="appraisalPeriodAction" class="appraisalPeriodAction" value="add">
			<input type="hidden" name="appraisalPeriodId" id ="appraisalPeriodId"  class="appraisalPeriodId" value="">
			<input type="submit" id="appraisalPeriodSubmit" name="appraisalPeriodSubmit" class="btn btn-primary btn-sm" value="Add">
			<input type="reset" value="Reset" class="btn default  btn-sm" id="appraisalPeriodReset">
		</td>
	</tr>
</table>
</form>
-->
</div>