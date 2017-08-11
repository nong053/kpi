<link rel="stylesheet" href="../Css/custom_colorpicker.css" type="text/css" />

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




	<div role="alert" class="alert alert-info">
     <h2> <strong>Threshold Setup</strong></h2>
   		  เพื่อกำหนดสีและชื่อของเกณฑ์การประเมินผลการปฏิบัติงาน
    </div>


    
    <!-- 
    <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
				<b>ประสิทธิภาพโดยรวม</b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		
			 		
			  </div>
	</div>
    
   -->  
   
      <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
				<b>List Threshold</b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  		
			 		<div id="showDataTheshold"></div>
			 		
			  </div>
	</div>

<!-- 
<table id="TableThreshold">
	<thead>
		<tr>
			<th>Threshold ID</th>
			<th>Threshold Name</th>
			<th>Begin Threshold</th>
			<th>End Threshold</th>
			<th>Color</th>
			<th>Manage</th>
		</tr>
	</thead>
	<tbody class="contentThreshold">
		<tr>
			<td>1</td>
			<td>ไม่พอน่าพอใจ</td>
			<td>0</td>
			<td>40</td>
			<td>red</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			<td>1</td>
			<td>น่าพอใจ</td>
			<td>41</td>
			<td>60</td>
			<td>yellow</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			<td>1</td>
			<td>ดี</td>
			<td>61</td>
			<td>70</td>
			<td>green</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
	</tbody>
	
</table>

 -->
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
<div class="alert alert-info bg-from" role="alert">
<p class="bg-warning1">
	 
	 Threshold Form
</p>
<br>
     <form id="thresholdForm">
		<table>
			
			<tr>
				<td class='text-right'><strong >Threshold Name <font color="red">*</font></strong></td>
				<td><input type="text" class="form-control input-sm" name="thresholdName" id="thresholdName"></td>
			</tr>
			<tr>
				<td class='text-right'> <strong>Begin Threshold <font color="red">*</font></strong></td>
				<td><input type="text" class="form-control input-sm" name="thresholdBegin" id="thresholdBegin"></td>
			</tr>
			<tr>
				<td class='text-right'><strong>End Threshold <font color="red">*</font></strong></td>
				<td><input type="text" class="form-control input-sm" name="thresholdEnd" id="thresholdEnd"></td>
			</tr>
			<tr>
				<td class='text-right'><strong>Color Code <font color="red">*</font></strong></td>
				<td> <input type="text" class="form-control input-sm colorPicker_css" value="FFFFFF" name="thresholdColor" id="thresholdColor"></td>
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


    
