<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
?>

<?php

if($_SESSION['language']=="th"){
	
	$_SESSION['perspective_l_title']="มุมมองธุรกิจ";
	$_SESSION['perspective_l_detail']="กำหนดมุมมองทางธุรกิจสำหรับนำไปคำนวณ Balance Scorecard น้ำหนักของมุมมองธุรกิจต้องเท่ากับ 100% <br>*** BSC คือเครื่องมือทางด้านการจัดการที่ช่วยในการนากลยุทธ์ไปสู่การ ปฏิบัติ(Strategic Implementation) โดยอาศัยการวัดหรือประเมิน (Measurement)";
	$_SESSION['perspective_l_btn_add']="มุมมองธุรกิจ";

	$_SESSION['perspective_l_tbl_id']="#";
    $_SESSION['perspective_l_tbl_perspective_name']="มุมมองธุรกิจ";
    $_SESSION['perspective_l_tbl_perspective_weight']="น้ำหนัก(100%)";
    
	$_SESSION['perspective_l_tbl_perspective_manage']="จัดการ";

	$_SESSION['perspective_l_form_required']="จำเป็นต้องกรอก";
	$_SESSION['perspective_l_form_name']="มุมมองทางธุรกิจ";

	$_SESSION['perspective_btn_add']="เพิ่ม";
	$_SESSION['perspective_btn_reset']="เคลียร์";
	

	

}else{

	$_SESSION['perspective_l_title']="Perspective Setup";
	$_SESSION['perspective_l_detail']="To determine the color and name of the evaluation criteria.";
	$_SESSION['perspective_l_btn_add']="perspective";
	
	$_SESSION['perspective_l_tbl_id']="#";
	$_SESSION['perspective_l_tbl_perspective_name']="Perspective Name";
	$_SESSION['perspective_l_tbl_perspective_manage']="Manage";

	$_SESSION['perspective_l_form_required']="Required";
	$_SESSION['perspective_l_form_name']="Perspective Form ";

	$_SESSION['perspective_btn_add']="Add";
	$_SESSION['perspective_btn_reset']="Reset";

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
 	
 	.colorpicker{
 		z-index: 1990;
 	}
 	
 </style>



<!-- Large modal start-->
<div id='perspectiveModal' class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog " role="document">
   
   <div class="modal-content"> 
	   <div class="modal-header alert-info"> 
		   <button aria-label="Close" data-dismiss="modal" class="close" type="button">
		   		<span aria-hidden="true">×</span>
		   </button> 
		   	<h4 id="myLargeModalLabel" class="modal-title"> <?=$_SESSION['perspective_l_form_name']?> </h4> 
	   </div> 
	   <div class="modal-body"> 

	   		<!-- content start-->
	   		<form id="perspectiveForm">
				<table style="width:100%;">
					
					<tr>
						<td style='width:200px' class='text-right'><strong ><?=$_SESSION['perspective_l_tbl_perspective_name']?> <font color="red">*</font></strong></td>
						<td><input type="text" class="form-control " name="perspectiveName" id="perspectiveName"></td>
                    </tr>
                    
                    <tr>
						<td style='width:200px' class='text-right'><strong >น้ำหนัก <font color="red">*</font></strong></td>
						<td><input type="text" style='width:100px' class="form-control " name="perspectiveWeight" id="perspectiveWeight"></td>
					</tr>
					
					
					<tr>
						<td >
						</td>
						<td>
						(<font color="red">*</font>)<?=$_SESSION['perspective_l_form_required']?><br>
							<input type="hidden" name="perspectiveAction" id ="perspectiveAction" class="perspectiveAction " value="add">
							<input type="hidden" name="perspectiveId" id ="perspectiveId"  class="perspectiveId" value="">
							<input type="submit" id="submitPerspective" name="submitPerspective " class="btn btn-primary " value="<?=$_SESSION['perspective_btn_add']?>">
							<input type="reset" value="<?=$_SESSION['perspective_btn_reset']?>" class="btn default  " id="perspectiveReset">
							<button data-dismiss="modal" class="btn btn-default" type="button">ปิด</button> 
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

<!-- Large example modal start-->
<div class="modal fade ex-data-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
   
   <div class="modal-content"> 
	   <div class="modal-header alert-info"> 
		   <button aria-label="Close" data-dismiss="modal" class="close" type="button">
		   		<span aria-hidden="true">×</span>
		   </button> 
		   	<h4 id="myLargeModalLabel" class="modal-title"> ตัวอย่างมุมมองธุรกิจ</h4> 
	   </div> 
	   <div class="modal-body"> 

	   		<!-- content start-->
	 			<div id="exContentDataArea"></div>
				
	   		<!-- content end-->

	   </div> 
   </div>

  </div>
</div>
<!-- Large example data modal end-->


	<div role="alert" class="alert alert-info">
     <h2> <strong><?=$_SESSION['perspective_l_title']?></strong></h2>
   		  <?=$_SESSION['perspective_l_detail']?> <font color="red">***</font> <a style="text-decoration:underline; cursor:pointer;" id="exPerspectiveDataAction">ตัวอย่างมุมมองธุรกิจ</a>
    </div>
   
      <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
						<button style="" data-toggle="modal" data-target=".appraisalPeriodSetup" class="btn btn-primary " id="btnAddPerspective" type="button"><i class="glyphicon  glyphicon-plus"></i>
						<?=$_SESSION['perspective_l_btn_add']?>
						</button>		
			  </div>
			  <div class="panel-body panel-body-top">
			  		
			 		<div id="showDataPerspective"></div>
			 		
			  </div>
    </div>
    
    <script src="../Controller/cPerspective.js"></script>


 















    
