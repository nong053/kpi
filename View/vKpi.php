<? @session_start(); ob_start();error_reporting(0);error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
	//description
	$_SESSION['kpi_l_des_title']="ตัวชี้วัด";
	$_SESSION['kpi_l_des_detail']="กำหนดตัวชี้วัดเพื่อนำไปวัดผลการปฏิบัติงานของพนักงาน ";
	$_SESSION['kpi_l_des_btn_add']="ตัวชี้วัด";

	//Search
	$_SESSION['kpi_l_search_department']="แผนก";

	//column
	$_SESSION['kpi_l_tbl_id']="#";
	$_SESSION['kpi_l_tbl_kpi_name']="ชื่อตัวชี้วัด";
	$_SESSION['kpi_l_tbl_kpi_better_flag']="ประเภทตัวชี้วัด";
	
	$_SESSION['kpi_l_form_kpi_better_flag']="ชื่อตัวชี้วัด";
	
	$_SESSION['kpi_l_tbl_kpi_detail']="รายละเอียดตัวชี้วัด";
	$_SESSION['kpi_l_tbl_kpi_perspective']="มุมมองธุรกิจ";
	$_SESSION['kpi_l_tbl_kpi_type_score']="การคิดคะแนน";


	
	

	$_SESSION['kpi_l_tbl_manage']="จัดการ";

	//form
	
	$_SESSION['kpi_l_form_name']="ฟอร์มตัวชี้วัด";
	$_SESSION['kpi_l_form_kpi_code']="รหัสตัวชี้วัด";
	$_SESSION['kpi_l_form_department']="แผนก";
	$_SESSION['kpi_l_form_kpi_name']="ชื่อตัวชี้วัด";
	$_SESSION['kpi_l_form_kpi_better_flag']="ประเภทตัวชี้วัด";
	$_SESSION['kpi_l_form_kpi_type_score']="การคิดคะแนน";
	$_SESSION['kpi_l_form_kpi_data_target']="เป้าข้อมูลดิบ";
	
	$_SESSION['kpi_l_form_kpi_detail']="รายละเอียดตัวชี้วัด";
	$_SESSION['kpi_l_form_kpi_perspective']="มุมมองธุรกิจ";
	$_SESSION['kpi_l_form_btn_add']="เพิ่ม";
	$_SESSION['kpi_l_form_btn_reset']="เคลียร์";
	$_SESSION['kpi_l_form_required']="จำเป็นต้องกรอก";

	

}else{
	

		//description
	$_SESSION['kpi_l_des_title']="KPI Setup";
	$_SESSION['kpi_l_des_detail']="Set KPI data to measure employee performance. ";
	$_SESSION['kpi_l_des_btn_add']="KPI";

	//Search
	$_SESSION['kpi_l_search_department']="Department";

	//column
	$_SESSION['kpi_l_tbl_id']="#";
	$_SESSION['kpi_l_tbl_kpi_name']="KPI Name";
	$_SESSION['kpi_l_form_kpi_better_flag']="The better";
	$_SESSION['kpi_l_tbl_kpi_better_flag']="The better";
	$_SESSION['kpi_l_tbl_kpi_detail']="KPI Detail";
	$_SESSION['kpi_l_tbl_kpi_perspective']="Perspective";
	$_SESSION['kpi_l_tbl_kpi_type_score']="Type Score";
	$_SESSION['kpi_l_tbl_manage']="Manage";

	//form
	
	$_SESSION['kpi_l_form_name']="KPI Form ";
	$_SESSION['kpi_l_form_kpi_code']="KPI Code";
	$_SESSION['kpi_l_form_department']="Department";
	$_SESSION['kpi_l_form_kpi_name']="KPI Name";
	$_SESSION['kpi_l_form_kpi_detail']="KPI Detail";
	$_SESSION['kpi_l_form_kpi_type_score']="KPI Score Type ";
	$_SESSION['kpi_l_form_kpi_data_target']="Target Data";
	$_SESSION['kpi_l_form_btn_add']="Add";
	$_SESSION['kpi_l_form_btn_reset']="Reset";
	$_SESSION['kpi_l_form_required']="Required";

	
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


 <!-- Large modal start-->
<div class="modal fade " id='kpiModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
   
   <div class="modal-content"> 
	   <div class="modal-header alert-info"> 
		   <button aria-label="Close" data-dismiss="modal" class="close" type="button">
		   		<span aria-hidden="true">×</span>
		   </button> 
		   	<h4 id="myLargeModalLabel" class="modal-title"> <?=$_SESSION['kpi_l_form_name']?>  </h4> 
	   </div> 
	   <div class="modal-body"> 

	   		<!-- content start-->

			<form id="kpiForm">
				<table style="width:100%;">
					<!--
					 <tr>
						<td style="width:200px;" class="text-right"><b><?=$_SESSION['kpi_l_form_kpi_code']?>  <font color="red">*</font></b></td>
						<td><input type="text" id="kpiCode" name="kpiCode"  style='width:100px;'  class="form-control "></td>
					</tr>
-->
					<tr style="display: none;">
						<td class="text-right"><b><?=$_SESSION['kpi_l_form_department']?> <font color="red">*</font></b></td>
						<td id='formdepDropDrowListArea'></td>
					</tr>
					<tr>
						<td class="text-right"><b><?=$_SESSION['kpi_l_form_kpi_name']?> <font color="red">*</font></b></td>
						<td>
							<input type="text" id="kpiName" name="kpiName"  style='width:300px;' class="form-control ">
						</td>
					</tr>

					<tr>
						<td class="text-right"><b><?=$_SESSION['kpi_l_form_kpi_perspective']?> <font color="red">*</font></b></td>
						<td id='formPerspectiveDropDrowListArea'>
							

						</td>
					</tr>

					<tr id="kpi_type_score_area" style="display: none;">
						<td class="text-right"><b><?=$_SESSION['kpi_l_form_kpi_type_score']?> <font color="red">*</font></b></td>
						<td>
						
						
						<input type="radio" checked="checked" id="kpiTypeScore2" class="kpiTypeScore" name="kpiTypeScore"   class="form-control " value="2"> 1-5 คะแนน
						&nbsp;
						
						<input type="radio" id="kpiTypeScore3" class="kpiTypeScore" name="kpiTypeScore"   class="form-control " value="3"> ถูก/ผิด
						&nbsp;
						<input type="radio"   id="kpiTypeScore1" class="kpiTypeScore" name="kpiTypeScore"   class="form-control " value="1"> กำหนดเอง
						
						</td>
					</tr>

					<tr id="kpi_better_flag_area" style="display: none;">
						<td class="text-right"><b><?=$_SESSION['kpi_l_form_kpi_better_flag']?> <font color="red">*</font></b></td>
						<td>
						 <input type="radio"  checked="checked" id="kpiBetterFlagY" class="kpiBetterFlag" name="kpiBetterFlag"   class="form-control " value="Y">&nbsp;ยิ่งมากยิ่งดี
						&nbsp; <input type="radio" id="kpiBetterFlagN" class="kpiBetterFlag" name="kpiBetterFlag"   class="form-control " value="N">&nbsp;ยิ่งน้อยยิ่งดี
						</td>
					</tr>

					

					
					

					<tr id="kpiDataTargetArea"  style="display: none;">
						<td class="text-right"><b><?=$_SESSION['kpi_l_form_kpi_data_target']?> <font color="red">*</font></b></td>
						<td>
							<input type="text" id="kpiDataTarget" name="kpiDataTarget"  style='width:100px;' class="form-control ">
						</td>
					</tr>

					<tr>
						<td class="text-right"  valign="top"><b><?=$_SESSION['kpi_l_form_kpi_detail']?> </b></td>
						<td><textarea id="kpiDetail" rows="5" cols="25" name="kpiDetail" class="form-control "></textarea>
					</tr>
					

					<tr>
						<td>
						</td>
						<td >
						(<font color="red">*</font>)<?=$_SESSION['kpi_l_form_required']?><br>
							<input type="hidden" name="kpiAction" id ="kpiAction" class="kpiAction" value="add">
							<input type="hidden" name="kpiId" id ="kpiId"  class="kpiId" value="">
							<input type="submit" id="kpiSubmit" name="kpiSubmit" value="<?=$_SESSION['kpi_l_form_btn_add']?>" class="btn btn-primary">
							<input type="reset" value="<?=$_SESSION['kpi_l_form_btn_reset']?>" class="btn default" id="kpiReset">
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
     <h2> <strong><?=$_SESSION['kpi_l_des_title']?> </strong></h2>
   		<?=$_SESSION['kpi_l_des_detail']?>
    </div>
    
    <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">

			  <table>
				<tr>
					<td style="display: none;"><b><?=$_SESSION['kpi_l_search_department']?></b></td>
					<td style="display: none;" id="depDropDrowListArea">
					
					</td>
					<td >
						<button class="btn btn-primary " id="addKPI" type="button"><i class="glyphicon  glyphicon-plus"></i>
						<?=$_SESSION['kpi_l_des_btn_add']?>
						</button>		
					</td>

			  	</tr>
			  	</table>		
						
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div id="kpiShowData"></div>
			 		
			  </div>
	</div>
	<div id='kpiEmpbedParam'></div>
    

<!-- 
<table>
	<thead>
		<tr>
			<th>KPI Code</th>
			<th>KPI Name</th>
			<th>Objective</th>
			<th>Formula</th>
			<th>kpi Name</th>
			
			<th>Manage</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			
			<td>0</td>
			<td>ด้านการเงิน</td>
			<td>การเงินรวมทั้งบริษัท</td>
			<td>การเงินรวมทั้งบริษัท</td>
			<td>การเงินรวมทั้งบริษัท</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			
			<td>1</td>
			<td>ด้านการขาย</td>
			<td>การเงินรวมทั้งบริษัท</td>
			<td>การเงินรวมทั้งบริษัท</td>
			<td>การเงินรวมทั้งบริษัท</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			
			<td>2</td>
			<td>ด้านการตลาด</td>
			<td>การวางแผน</td>
			<td>การเงินรวมทั้งบริษัท</td>
			<td>การเงินรวมทั้งบริษัท</td>
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
	KPIs FORM
</p>
<br>


<form id="kpiForm">
<table>
	
	 <tr>
		<td class="text-right"><b>KPI Code <font color="red">*</font></b></td>
		<td><input type="text" id="kpiCode" name="kpiCode"  style='width:100px;'  class="form-control "></td>
	</tr>
	<tr>
		<td class="text-right"><b>KPI Name <font color="red">*</font></b></td>
		<td><input type="text" id="kpiName" name="kpiName"  style='width:300px;' class="form-control "></td>
	</tr>
	
	<tr>
		<td class="text-right"  valign="top"><b>KPI Detail</b></td>
		<td><textarea id="kpiDetail" rows="5" cols="25" name="kpiDetail" class="form-control "></textarea>
	</tr>
	
	<tr>
		<td>
		</td>
		<td >
		(<font color="red">*</font>)จำเป็นต้องกรอก<br>
			<input type="hidden" name="kpiAction" id ="kpiAction" class="kpiAction" value="add">
			<input type="hidden" name="kpiId" id ="kpiId"  class="kpiId" value="">
			<input type="submit" id="kpiSubmit" name="kpiSubmit" value="Add" class="btn btn-primary btn-sm">
			<input type="reset" value="Reset" class="btn default btn-sm" id="kpiReset">
		</td>
	</tr>
</table>
</form>
</div>
-->