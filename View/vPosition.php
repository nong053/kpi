<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
		//description
	$_SESSION['position_l_des_title']="ตำแหน่ง";
	$_SESSION['position_l_des_detail']="เพื่อกำหนดว่าพนักงานคนใดเป็นระดับ อยู่ใน Role ใดเพื่อใช้เป็นข้อมูลในกำหนดสิทธิ์ในการปรับผลการปฏิบัติงาน ";
	$_SESSION['position_l_des_btn_add']="ตำแหน่ง";

	//column
	$_SESSION['position_l_tbl_id']="#";
	$_SESSION['position_l_tbl_position_name']="ตำแหน่ง";
	$_SESSION['position_l_tbl_role_name']="สิทธิ์การจัดการ";
	$_SESSION['position_l_tbl_manage']="จัดการ";

	//form
	
	$_SESSION['position_l_form_name']="ตำแหน่ง";
	$_SESSION['position_l_form_position_name']="ตำแหน่ง";
	$_SESSION['position_l_form_role_name']="สิทธิ์การจัดการ";
	$_SESSION['position_l_form_btn_add']="เพิ่ม";
	$_SESSION['position_l_form_btn_reset']="เคลียร์";
	$_SESSION['position_l_form_required']="จำเป็นต้องกรอก";

	

}else{
	

	//description
	$_SESSION['position_l_des_title']="Position Setup";
	$_SESSION['position_l_des_detail']="To determine which employee is the manager level, use the information to determine the right to adjust performance.";
	$_SESSION['position_l_des_btn_add']="Position";

	//column
	$_SESSION['position_l_tbl_id']="#";
	$_SESSION['position_l_tbl_position_name']="Position name";
	$_SESSION['position_l_tbl_role_name']="Role";
	$_SESSION['position_l_tbl_manage']="Manage";

	//form
	$_SESSION['position_l_form_required']="Required";
	$_SESSION['position_l_form_name']="Position Form ";
	$_SESSION['position_l_form_position_name']="Position Name";
	$_SESSION['position_l_form_role_name']="Role";
	$_SESSION['position_l_form_btn_add']="Add";
	$_SESSION['position_l_form_btn_reset']="Reset";
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
<div id='positionModal' class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
   
   <div class="modal-content"> 
	   <div class="modal-header alert-info"> 
		   <button aria-label="Close" data-dismiss="modal" class="close" type="button">
		   		<span aria-hidden="true">×</span>
		   </button> 
		   	<h4 id="myLargeModalLabel" class="modal-title"> <?=$_SESSION['position_l_form_name']?> </h4> 
	   </div> 
	   <div class="modal-body"> 

	   		<!-- content start-->
	   		<form id="positionForm">
				<table style="width:100%;">

					
					
					<tr>
						<td style='width: 200px;'class="text-right"><b><?=$_SESSION['position_l_form_position_name']?><font color="red">*</font></b></td>
						<td>
							<input type="text" id="positionName" name="positionName" class="form-control ">
						</td>
					</tr>
					<!-- <tr>
						<td class='text-right'><b><?=$_SESSION['position_l_form_role_name']?></b></td>
						<td id="roleDropDrowListArea">

						</td>
					</tr> -->
					
					
					<tr>
						<td></td>
						<td>
						(<font color="red">*</font>)<?=$_SESSION['position_l_form_required']?><br>
							<input type="hidden" name="positionAction" id ="positionAction" class="positionAction" value="add">
							<input type="hidden" name="positionId" id ="positionId"  class="positionId" value="">
							<input type="submit" id="positionSubmit" name="positionSubmit" class="btn btn-primary " value="<?=$_SESSION['position_l_form_btn_add']?>">
							<input type="reset" value="<?=$_SESSION['position_l_form_btn_reset']?>" id="positionReset" class="btn default  ">
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
     <h2> <strong><?=$_SESSION['position_l_des_title']?></strong></h2>
   		<?=$_SESSION['position_l_des_detail']?>
</div>
    
    <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
					
				<button data-toggle="modal" data-target="" class="btn btn-primary " id="btnAddPosition" type="button"><i class="glyphicon  glyphicon-plus"></i>
						<?=$_SESSION['position_l_des_btn_add']?>
				</button>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div id="positionShowData"></div>
			 		
			  </div>
	</div>

	<script src="../Controller/cPosition.js"></script>


 
 
