<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jquery color picker</title>
<!--<link rel="stylesheet" href="css/colorpicker.css" type="text/css" />-->
<link rel="stylesheet" href="Css/custom_colorpicker.css" type="text/css" />
<style type="text/css">
/* css กำหนดรูปแบบของ textbox สำหรับจานใช้งานจานสีตามต้องการ */
.colorPicker_css{
/*	width:25px;	*/
}

/* ส่วนของ css กำหนดสำหรับจานสีใช้กับ input hidden */
.containWidget{
	position:relative;
	display:block;
	width:30px;
	height:30px;
	overflow:hidden;	
}
.colorWidget{
	position:absolute;
	cursor:pointer;	
	top:-3px;
	left:-3px;
}
</style>
</head>

<body>

http://www.eyecon.ro/colorpicker/

<br />
การแสดงจานสี แบบ inline หรือแสดงในตำแหน่งที่ต้องการ<br />
<p id="colorpickerHolder"></p>

การแสดงจานสี กำหนดค่าไว้ใน textbox <br />
<p><input type="text" class="colorPicker_css" maxlength="6" size="6" id="colorpickerField1" value="00ff00" /></p>
<p><input type="text" class="colorPicker_css"  maxlength="6" size="6" id="colorpickerField3" value="0000ff" /></p>
<p><input type="text" class="colorPicker_css"  maxlength="6" size="6" id="colorpickerField2" value="ff0000" /></p>


การแสดงจานสี กำหนดค่าไว้ใน input hidden<br />
<div class="containWidget">
<img class="colorWidget" src="images/custom/select.png" border="0" />
<input name="my_color1" type="hidden" id="my_color1" value="000000" />
</div>
<br />
<div class="containWidget">
<img class="colorWidget" src="images/custom/select.png" border="0" />
<input name="my_color2" type="hidden" id="my_color2" value="ff0000" />
</div>




<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/colorpicker.js"></script>
<script type="text/javascript">
$(function(){

	// ให้แสดงแบบ inline ใน tag p id=colorpickerHolder
	$('#colorpickerHolder').ColorPicker({ // 
		flat: true, // กำหนดให้แสดงแบบ inline
		color:'#000000' // ค่าสีเริ่มต้นที่แสดง
	});	


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


	
//		event อื่นๆ เพิ่มเติมหากต้องการใช้งาน
//		onShow function ฟังก์ชันเรียกใช้เมื่อจานสีแสดง
//		onBeforeShow function ฟังก์ชันเรียกใช้ก่อนจานสีจะแสดง
//		onHide function ฟังก์ชันเรียกใช้เมื่อปิดจานสี
//		onChange function ฟังก์ชันเรียกใช้เมื่อเปลี่ยนสี
//		onSubmit function ฟังก์ชันเรียกใช้เมื่อเลือกสีที่ต้องการ
	
	
});
</script>
</body>
</html>