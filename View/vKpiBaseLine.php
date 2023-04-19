 <?php @session_start(); ob_start();error_reporting(0);error_reporting(E_ERROR | E_PARSE);


if($_SESSION['language']=="th"){
	
	//description
	$_SESSION['baseline_l_des_title']="แปลงผลการปฏิบัติงานเป็นคะแนน";
	$_SESSION['baseline_l_des_detail']="เนื่องจากข้อมูลผลการปฏิบัติงานที่วัดมีหลายรูปแบบ เช่น เปอร์เซ็นต์, จำนวนครั้ง, จำนวนคน เป็นต้น จึงจำเป็นต้องมีการแปลงข้อมูลดังกล่าวให้อยู่ในรูปแบบเดียวคิดเป็นคะแนน 1-5 คะแนน ";
	$_SESSION['baseline_l_des_btn_add']="ช่วงคะแนน";
	$_SESSION['baseline_l_des_btn_back']="ย้อนกลับ";
	$_SESSION['baseline_l_des_btn_kpi']="ตัวชี้วัด";

	
	//column
	$_SESSION['baseline_l_tbl_id']="#";
	$_SESSION['baseline_l_tbl_kpi_begin']="เริ่ม";
	$_SESSION['baseline_l_tbl_kpi_end']="ถึง";
	$_SESSION['baseline_l_tbl_kpi_score']="คะแนน";
	$_SESSION['baseline_l_tbl_kpi_suggestion']="อธิบาย";
	$_SESSION['baseline_l_tbl_manage']="จัดการ";

	//form
	
	$_SESSION['baseline_l_form_name']="แปลงคะแนน";
	$_SESSION['baseline_l_form_begin']="เริ่ม";
	$_SESSION['baseline_l_form_end']="ถึง";
	$_SESSION['baseline_l_form_score']="คะแนน";
	$_SESSION['baseline_l_form_suggestion']="อธิบาย";
	$_SESSION['baseline_l_form_btn_add']="เพิ่ม";
	$_SESSION['baseline_l_form_btn_reset']="เคลียร์";
	$_SESSION['baseline_l_form_required']="จำเป็นต้องกรอก";

	

}else{
	
	//description
	$_SESSION['baseline_l_des_title']="KPI Baseline Setup";
	$_SESSION['baseline_l_des_detail']="Performance data measured in many forms, such as percentage, number of times, number of people, etc., need to be converted to the same format as the score. ";
	$_SESSION['baseline_l_des_btn_add']="Baseline";
	$_SESSION['baseline_l_des_btn_back']="Back";
	$_SESSION['baseline_l_des_btn_kpi']="KPI";

	

	//column
	$_SESSION['baseline_l_tbl_id']="#";
	$_SESSION['baseline_l_tbl_kpi_begin']="Baseline Start";
	$_SESSION['baseline_l_tbl_kpi_end']="Baseline End";
	$_SESSION['baseline_l_tbl_kpi_score']="Score";
	$_SESSION['baseline_l_tbl_kpi_suggestion']="Suggestion";
	$_SESSION['baseline_l_tbl_manage']="Manage";

	//form
	
	$_SESSION['baseline_l_form_name']="Baseline Form ";
	$_SESSION['baseline_l_form_begin']="Baseline Start";
	$_SESSION['baseline_l_form_end']="Baseline End";
	$_SESSION['baseline_l_form_score']="Score";
	$_SESSION['baseline_l_form_suggestion']="Suggestion";
	$_SESSION['baseline_l_form_btn_add']="Add";
	$_SESSION['baseline_l_form_btn_reset']="Reset";
	$_SESSION['baseline_l_form_required']="Required";
	
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
<?php 
$kpiName=$_GET['kpiName'];
?>


<!-- Large modal start-->
<div class="modal fade " id='kpiBaseLineModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
   
   <div class="modal-content"> 
	   <div class="modal-header alert-info"> 
		   <button aria-label="Close" data-dismiss="modal" class="close" type="button">
		   		<span aria-hidden="true">×</span>
		   </button> 
		   	<h4 id="myLargeModalLabel" class="modal-title"> <?=$_SESSION['baseline_l_form_name']?>  </h4> 
	   </div> 
	   <div class="modal-body"> 

	   		<!-- content start-->

			
			<form id="baselineForm">
			<table style="width:100%;">
				
				<tr>
					<td style="width:200px;" class='text-right'><b><?=$_SESSION['baseline_l_form_begin']?>  <font color="red">*</font></b></td>
					<td><input type="text" id="baselineBegin" name="baselineBegin"  class="form-control " style="width:100px;" ></td>
				</tr>
				<tr>
					<td class='text-right'><b><?=$_SESSION['baseline_l_form_end']?>  <font color="red">*</font></b></td>
					<td><input type="text" id="baselineEnd" name="baselineEnd"  class="form-control " style="width:100px;"></td>
				</tr>
				
				<tr style='display:none;'>
					<td class='text-right'><b><?=$_SESSION['baseline_l_form_score']?> <font color="red">*</font></b></td>
					<td><input type="text" id="baselinetargetScore" name="baselinetargetScore"  class="form-control " style="width:100px;"></td>
				</tr>
				<tr style='display:none;'>
					<td class='text-right' valign="top"><b><?=$_SESSION['baseline_l_form_suggestion']?></b></td>
					<td>
						<textarea rows="3" cols="50" name="suggestion" id="suggestion"  class="form-control " ></textarea>
					</td>
				</tr>
				
				<tr>
					<td>
					</td>
					<td>
						(<font color="red">*</font>)<?=$_SESSION['baseline_l_form_required']?><br>
						<input type="hidden" name="baselineAction" id ="baselineAction" class="baselineAction" value="add">
						<input type="hidden" name="baselineId" id ="baselineId"  class="baselineId" value="">
						<input type="submit" id="baselineSubmit" name="baselineSubmit" class="btn btn-primary " value="<?=$_SESSION['baseline_l_form_btn_add']?>">
						<input type="reset" value="<?=$_SESSION['baseline_l_form_btn_reset']?>" id="baselineReset" class="btn default  ">
						<button data-dismiss="modal" class="btn btn-default" type="button">ปิด</button> 
						<!--
						<input type="button" id="kpiButton" name="kpiButton" class="btn default  btn-sm" value="back">
						-->
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



<div role="alert" class="alert alert-info">
     <h2> <strong><?=$_SESSION['baseline_l_des_title']?>  </strong></h2>
   		<?=$_SESSION['baseline_l_des_detail']?>
    </div>
    <h4><b><?=$_SESSION['baseline_l_des_btn_kpi']?></b> : <?=$kpiName?></h4>
    
    <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
	 					<!--
						<button class="btn btn-primary " id="addBaseLine" type="button"><i class="glyphicon  glyphicon-plus"></i>
						<?=$_SESSION['baseline_l_des_btn_add']?>
						</button>
						-->
						<input type="button" id="kpiButton" name="kpiButton" class="btn btn-primary  " value="<?=$_SESSION['baseline_l_des_btn_back']?>">		
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div id="kpiBaselineShowData"></div>
			 		
			  </div>
	</div>
    

<!-- 
<table>
	<thead>
		<tr>
			<th>Baseline ID</th>
			<th>Begin Baseline</th>
			<th>End Baseline</th>
			<th>Target Score</th>
			<th>Manage</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			
			<td>1</td>
			<td>20</td>
			<td>40</td>
			<td>50</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			
			<td>1</td>
			<td>41</td>
			<td>50</td>
			<td>55</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			
			<td>1</td>
			<td>61</td>
			<td>70</td>
			<td>60</td>
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

	Baseline Form
</p>
<br>

<form id="baselineForm">
<table>
	
	<tr>
		<td class='text-right'><b>Begin Baseline <font color="red">*</font></b></td>
		<td><input type="text" id="baselineBegin" name="baselineBegin"  class="form-control " style="width:100px;" ></td>
	</tr>
	<tr>
		<td class='text-right'><b>End Baseline <font color="red">*</font></b></td>
		<td><input type="text" id="baselineEnd" name="baselineEnd"  class="form-control " style="width:100px;"></td>
	</tr>
	<tr>
		<td class='text-right'><b>Score <font color="red">*</font></b></td>
		<td><input type="text" id="baselinetargetScore" name="baselinetargetScore"  class="form-control " style="width:100px;"></td>
	</tr>
	<tr>
		<td class='text-right' valign="top"><b>Suggestion</b></td>
		<td>
			<textarea rows="3" cols="50" name="suggestion" id="suggestion"  class="form-control " ></textarea>
		</td>
	</tr>
	
	<tr>
		<td>
		</td>
		<td>
			(<font color="red">*</font>)จำเป็นต้องกรอก<br>
			<input type="hidden" name="baselineAction" id ="baselineAction" class="baselineAction" value="add">
			<input type="hidden" name="baselineId" id ="baselineId"  class="baselineId" value="">
			<input type="submit" id="baselineSubmit" name="baselineSubmit" class="btn btn-primary btn-sm" value="Add">
			<input type="reset" value="Reset" id="baselineReset" class="btn default  btn-sm">
			<input type="button" id="kpiButton" name="kpiButton" class="btn default  btn-sm" value="back">
		</td>
	</tr>
</table>
</form>
</div>
-->
<script src="../Controller/cKpiBaseLine.js"></script>