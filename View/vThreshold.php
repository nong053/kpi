<?php session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
?>
<link rel="stylesheet" href="../Css/custom_colorpicker.css" type="text/css" />
<?php

if($_SESSION['language']=="th"){
	
	$_SESSION['threshold_l_title']="เกณฑ์การประเมิน";
	$_SESSION['threshold_l_detail']="เพื่อกำหนดสีและชื่อของเกณฑ์การประเมินผลการปฏิบัติงาน";
	$_SESSION['threshold_l_btn_add']="เกณฑ์การประเมิน";

	$_SESSION['threshold_l_tbl_id']="#";
	$_SESSION['threshold_l_tbl_threshold_name']="ชื่อเกณฑ์การประเมิน";
	$_SESSION['threshold_l_tbl_begin_threshold']="จาก%";
	$_SESSION['threshold_l_tbl_end_threshold']="ถึง%";
	$_SESSION['threshold_l_tbl_threshold_color']="สี";
	$_SESSION['threshold_l_tbl_threshold_score']="คะแนน";
	
	$_SESSION['threshold_l_tbl_threshold_manage']="จัดการ";

	$_SESSION['threshold_l_form_required']="จำเป็นต้องกรอก";
	$_SESSION['threshold_l_form_name']="ฟร์อมเกณฑ์การประเมิน";

	$_SESSION['threshold_btn_add']="เพิ่ม";
	$_SESSION['threshold_btn_reset']="เคลียร์";
	

	

}else{

	$_SESSION['threshold_l_title']="Threshold Setup";
	$_SESSION['threshold_l_detail']="To determine the color and name of the evaluation criteria.";
	$_SESSION['threshold_l_btn_add']="Threshold";
	
	$_SESSION['threshold_l_tbl_id']="#";
	$_SESSION['threshold_l_tbl_threshold_name']="Threshold Name";
	$_SESSION['threshold_l_tbl_begin_threshold']="Begin Threshold%";
	$_SESSION['threshold_l_tbl_end_threshold']="End Threshold%";
	$_SESSION['threshold_l_tbl_threshold_color']="Color";
	$_SESSION['threshold_l_tbl_threshold_score']="Score";
	$_SESSION['threshold_l_tbl_threshold_manage']="Manage";

	$_SESSION['threshold_l_form_required']="Required";
	$_SESSION['threshold_l_form_name']="Threshold Form ";

	$_SESSION['threshold_btn_add']="Add";
	$_SESSION['threshold_btn_reset']="Reset";

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

<script type="text/javascript" src="../js/colorpicker.js"></script>
<script type="text/javascript">
$(function(){

	// ให้แสดงแบบ inline ใน tag p id=colorpickerHolder
	/*
	$('#colorpickerHolder').ColorPicker({ // 
		flat: true, // กำหนดให้แสดงแบบ inline
		color:'#000000' // ค่าสีเริ่มต้นที่แสดง
	});	
	*/
	
	//  ส่วนของการแสดงจานสี กำหนดค่าไว้ใน textbox
	// วนลูปกำหนดค่าสีพื้นหลังของ textbox ให้เท่ากับค่าของ textbox นั้นๆ
	$('.colorPicker_css').each(function(){
		$(this).css("background","#"+$(this).val());
	});	
	// กำหนดให้ textbox ที่มี class=colorPicker_css แสดงจานสีเมื่อคลิก
	$('.colorPicker_css').ColorPicker({
		livePreview:true, // เมื่อพิมพ์ขณะแสดงค่าสี ให้จานสีเปลี่ยนสีที่เลือกตามค่าที่พิมพ์
		onBeforeShow: function () { // ฟังก์ชันทำงานก่อน ทำการเลือกค่าสี
			$(this).css("background","#"+$(this).val()); //เปลี่ยนสีพื้นหลังให้เท่ากับค่าใน textbox นั้นๆ
			$(this).ColorPickerSetColor(this.value); //กำหนดค่าสีเริ่มต้นในจานสี 
		},
		onSubmit: function(hsb, hex, rgb, el){ // ฟังก์เมื่อทำการเลือกค่าสีแล้ว
			$(el).val(hex); //ให้ค่าของ textbox เท่ากับค่าสีที่เลือก
			$(el).css("background","#"+hex); // เปลี่ยนสีพื้นหลัง textbox ให้เท่ากับค่าสีที่เลือก
			$(el).ColorPickerHide(); //ปิดจานสี
		}	
	})
	.bind('keyup', function(){ //เพิ่ม event เมื่อพิมพ์ที่ textbox 
		$(this).ColorPickerSetColor(this.value); // ให้กำหนดค่าเริ่มต้นจานสี เป็นค่าใน textbox
	});
	


	// การแสดงจานสี กำหนดค่าไว้ใน input hidden	
	// วนลูปกำหนดค่าสีพื้นหลังของ ปุ่มเลือกค่าสี ให้เท่ากับค่าของ input hidden ด้านหลัง
	 /*
	$('.colorWidget').each(function(){
		$(this).css("background","#"+$(this).next("input").val());
	});	
	// กำหนดให้ ปุ่มเลือกค่าสี ที่มี class=colorWidget แสดงจานสีเมื่อคลิก	
	$(".colorWidget").ColorPicker({ 
//		eventName:'mouseover', //อาจกำหนดเป็น mouseover  ค่าเริ่มต้นคือ เมื่อคลิกเมาส์ 'click'		
		onBeforeShow: function () { // ฟังก์ชันทำงานก่อน ทำการเลือกค่าสี
			$(this).ColorPickerSetColor($(this).next("input").val()); // กำหนดค่าสีเริ่มต้นเท่ากับค่าใน input hidden
		},
		onSubmit: function(hsb, hex, rgb, el) { // ฟังก์เมื่อทำการเลือกค่าสีแล้ว
			$(el).css("background","#"+hex); //กำหนดสีพื้นหลังให้กับปุ่มเลือกค่าสี เท่ากับ ค่าสีที่เลือก
			$(el).next("input").val(hex); // กำหนดค่าสีที่เลือกให้กับ input hidden
			$(el).ColorPickerHide(); //ปิดจานสี
		}
	});
	*/

	
//		event อื่นๆ เพิ่มเติมหากต้องการใช้งาน
//		onShow function ฟังก์ชันเรียกใช้เมื่อจานสีแสดง
//		onBeforeShow function ฟังก์ชันเรียกใช้ก่อนจานสีจะแสดง
//		onHide function ฟังก์ชันเรียกใช้เมื่อปิดจานสี
//		onChange function ฟังก์ชันเรียกใช้เมื่อเปลี่ยนสี
//		onSubmit function ฟังก์ชันเรียกใช้เมื่อเลือกสีที่ต้องการ
	
	
});
</script>

<!-- Large modal start-->
<div id='thresholdModal' class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog " role="document">
   
   <div class="modal-content"> 
	   <div class="modal-header alert-info"> 
		   <button aria-label="Close" data-dismiss="modal" class="close" type="button">
		   		<span aria-hidden="true">×</span>
		   </button> 
		   	<h4 id="myLargeModalLabel" class="modal-title"> <?=$_SESSION['threshold_l_form_name']?> </h4> 
	   </div> 
	   <div class="modal-body"> 

	   		<!-- content start-->
	   		<form id="thresholdForm">
				<table style="width:100%;">
					
					<tr>
						<td style='width:200px' class='text-right'><strong ><?=$_SESSION['threshold_l_tbl_threshold_name']?> <font color="red">*</font></strong></td>
						<td><input type="text" class="form-control " name="thresholdName" id="thresholdName"></td>
					</tr>
					<tr>
						<td class='text-right'> <strong><?=$_SESSION['threshold_l_tbl_begin_threshold']?> <font color="red">*</font></strong></td>
						<td><input style='width:100px;' type="text" class="form-control " name="thresholdBegin" id="thresholdBegin"></td>
					</tr>
					<tr>
						<td class='text-right'><strong><?=$_SESSION['threshold_l_tbl_end_threshold']?> <font color="red">*</font></strong></td>
						<td><input style='width:100px;' type="text" class="form-control " name="thresholdEnd" id="thresholdEnd"></td>
					</tr>
					<tr>
						<td class='text-right'><strong><?=$_SESSION['threshold_l_tbl_threshold_color']?> <font color="red">*</font></strong></td>
						<td> <input style='width:100px;' type="text" class="form-control  colorPicker_css" value="FFFFFF" name="thresholdColor" id="thresholdColor"></td>
					</tr>
					<tr>
						<td >
						</td>
						<td>
						(<font color="red">*</font>)<?=$_SESSION['threshold_l_form_required']?><br>
							<input type="hidden" name="thresholdAction" id ="thresholdAction" class="thresholdAction " value="add">
							<input type="hidden" name="thresholdId" id ="thresholdId"  class="thresholdId" value="">
							<input type="submit" id="submitThreshold" name="submitThreshold " class="btn btn-primary " value="<?=$_SESSION['threshold_btn_add']?>">
							<input type="reset" value="<?=$_SESSION['threshold_btn_reset']?>" class="btn default  " id="thresholdReset">
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
     <h2> <strong><?=$_SESSION['threshold_l_title']?></strong></h2>
   		  <?=$_SESSION['threshold_l_detail']?>
    </div>


  
   
      <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
						<button style="display: none;" data-toggle="modal" data-target=".appraisalPeriodSetup" class="btn btn-primary " id="btnAddThreshold" type="button"><i class="glyphicon  glyphicon-plus"></i>
						<?=$_SESSION['threshold_l_btn_add']?>
						</button>		
			  </div>
			  <div class="panel-body panel-body-top">
			  		
			 		<div id="showDataTheshold"></div>
			 		
			  </div>
	</div>


 
















<!---
<div class="alert alert-info bg-from" role="alert">
<p class="bg-warning1">
	 
	 Threshold Form
</p>
<br>
     <form id="thresholdForm">
		<table>
			
			<tr>
				<td class='text-right'><strong >Threshold Name <font color="red">*</font></strong></td>
				<td><input type="text" class="form-control " name="thresholdName" id="thresholdName"></td>
			</tr>
			<tr>
				<td class='text-right'> <strong>Begin Threshold <font color="red">*</font></strong></td>
				<td><input type="text" class="form-control " name="thresholdBegin" id="thresholdBegin"></td>
			</tr>
			<tr>
				<td class='text-right'><strong>End Threshold <font color="red">*</font></strong></td>
				<td><input type="text" class="form-control " name="thresholdEnd" id="thresholdEnd"></td>
			</tr>
			<tr>
				<td class='text-right'><strong>Color Code <font color="red">*</font></strong></td>
				<td> <input type="text" class="form-control  colorPicker_css" value="FFFFFF" name="thresholdColor" id="thresholdColor"></td>
			</tr>
			<tr>
				<td >
				</td>
				<td>
				(<font color="red">*</font>)จำเป็นต้องกรอก<br>
					<input type="hidden" name="thresholdAction" id ="thresholdAction" class="thresholdAction " value="add">
					<input type="hidden" name="thresholdId" id ="thresholdId"  class="thresholdId" value="">
					<input type="submit" id="submitThreshold" name="submitThreshold " class="btn btn-primary btn-sm" value="Add">
					<input type="reset" value="Reset" class="btn default  btn-sm" id="thresholdReset">
				</td>
			</tr>
		</table>
	</form>
</div>
-->

<script src="../Controller/cThreshold.js"></script>

    
