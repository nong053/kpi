<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>demo howto ajax</title>
</head>

<body>

<div id="showData"></div>

<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(function(){
	setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
		// 1 วินาที่ เท่า 1000
		// คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
		var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
				url:"time.php",
				data:"rev=1",
				async:false,
				success:function(getData){
					$("div#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
				}
		}).responseText;
	},1000);	
});
</script>
</body>

</html>