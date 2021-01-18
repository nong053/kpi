//set initial start
//Global Param Start
var token=[];
//Global Param End

$(document).ready(function(){
/*
 คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี   - ฟ้าอ่อน #00FFFF
คณะทรัพยากรชีวภาพและเทคโนโลยี - เขียวอ่อน #76B800
คณะพลังงานสิ่งแวดล้อมและวัสดุ - ส้ม-ขาว #FFA500
คณะวิทยาศาสตร์  - เหลือง #FFFF00
คณะวิศวกรรมศาสตร์  - เลือดหมู #A52A2A
คณะศิลปศาสตร์  - ฟ้าคราม #4682b4
คณะสถาปัตยกรรมศาสตร์และการออกแบบ  - ส้ม  #FFAE00
คณะเทคโนโลยีสารสนเทศ  -  เทา-เงิน  #F0F8FF
บัณฑิตวิทยาลัยการจัดการและนวัตกรรม  - เลือดหมู / แดงเข้ม #EF4C00
บัณฑิตวิทยาลัยร่วมด้านพลังงานและสิ่งแวดล้อม  - ฟ้าน้ำเงิน #007BC3
วิทยาลัยสหวิทยาการ  ไม่มี
สถาบันการเรียนรู้   แดง ดำ เชียว (เลือกใช้ค่ะอาจจับคู่แค่ 2 สี)
สถาบันวิทยาการหุ่นยนต์ภาคสนาม  - ส้ม  #FFAE00 
*/
//set tooltip


	


	$("#btnBarChart").click(function(){

		$.ajax({
			url:"../Model/mBarChart.php",
			type:"get",
			dataType:"json",
			success:function(data){
				//alert(data);
				option=[];
				option['cateRotate']=0;
				option['theme']=theme;
				option['location']='e';
				option['placement']='outside';
				option['tooltipTextColor']='white';
				option['title']="ชื่อกราฟ";
				option['barWidth']=25;
				
				
				barChart("chart",data,option);	
			}
		});
	});
	$("#btnBarChartMutiSeries").click(function(){
		$.ajax({
			url:"../Model/mBarChartMutiSeries.php",
			type:"get",
			dataType:"json",
			success:function(data){
				
				option=[];
				option['cateRotate']=-30;
				option['theme']=theme;
				option['stackSeries']=false;
				option['tooltipTextColor']='white';
				option['location']='e';
				option['placement']='outside';
				option['title']="ชื่อกราฟ";
				
				barChart("chart",data,option);	
			}
		});
		
	});
	$("#btnChartHorizontal").click(function(){
		$.ajax({
			url:"../Model/mBarChart.php",
			type:"get",
			dataType:"json",
			success:function(data){
				//alert(data);
				option=[];
				option['cateRotate']=-30;
				option['theme']=theme;
				option['tooltipTextColor']='white';
				option['location']='e';
				option['placement']='outside';
				option['stackSeries']=false;
				option['title']="ชื่อกราฟ";
				option['barWidth']=25;
				
				barChartHorizontal("chart",data,option);	
				
			}
		});
	});
	$("#btnChartLine").click(function(){
		$.ajax({
			url:"../Model/mBarChartMutiSeries.php",
			type:"get",
			dataType:"json",
			success:function(data){
				//alert(data);
				option=[];
				option['cateRotate']=-30;
				option['theme']=theme;
				option['title']="ชื่อกราฟ";
				option['tooltipTextColor']='white';
				option['location']='e';
				option['placement']='outside';
				option['title']="ชื่อกราฟ";
				
				lineChart("chart",data,option);	
			}
		});
	});
	
	$("#btnDonut").click(function(){
		$.ajax({
			url:"../Model/mPieChart.php",
			type:"get",
			dataType:"json",
			success:function(data){
				
				option=[];
				option['cateRotate']=-30;
				option['theme']=theme;
				option['tooltipTextColor']='white';
				option['title']="ชื่อกราฟ";
				option['location']='e';
				option['placement']='inside';
				
				donutChart("chart",data,option);	
			}
		});
	
	});
	
	$("#btnPie").click(function(){
		$.ajax({
			url:"../Model/mPieChart.php",
			type:"get",
			dataType:"json",
			success:function(data){
				
				option=[];
				option['theme']=theme;	
				option['dataLabels']='value';//‘label’, ‘value’, ‘percent’ 	
				option['tooltipTextColor']='white';
				option['title']="ชื่อกราฟ";
				
				pieChart("chart",data,option);	
			}
		});
	});
	
	$("#btnBarLineChart").click(function(){
		$.ajax({
			url:"../Model/mBarLineChart.php",
			type:"get",
			dataType:"json",
			success:function(data){
				
				option=[];
				option['cateRotate']=0;
				option['theme']=theme;
				option['title']="Graph BarlineChart";
				option['tooltipTextColor']='white';
				option['location']='e';
				option['placement']='outside';
				option['title']="ชื่อกราฟ";
				barBarLineChart("chart",data,option);	
			}
		});
	});
	
	$("#btnChartHorizontalMutiSeries").click(function(){
		$.ajax({
			url:"../Model/mBarChartMutiSeries.php",
			type:"get",
			dataType:"json",
			success:function(data){
				//alert(data);
				option=[];
				option['cateRotate']=-30;
				option['theme']=theme;
				option['tooltipTextColor']='white';
				option['title']="ชื่อกราฟ";
				option['location']='e';
				option['placement']='outside';
				option['barWidth']=7;
				option['stackSeries']=false;
				barChartHorizontal("chart",data,option);	
				
			}
		});
	
	});
	$("#btnChartHorizontalMutiSeriesStace").click(function(){
		$.ajax({
			url:"../Model/mBarChartMutiSeries.php",
			type:"get",
			dataType:"json",
			success:function(data){
				//alert(data);
				option=[];
				option['cateRotate']=-30;
				option['theme']=theme;
				option['stackSeries']=true;
				option['tooltipTextColor']='white';
				option['location']='e';
				option['placement']='outside';
				barChartHorizontal("chart",data,option);	

			}
		});
		
	});
	
	$("#btngaugeChart").click(function(){
		$.ajax({
			url:"../Model/mGaugeChart.php",
			type:"get",
			dataType:"json",
			success:function(data){
				//alert(data);
				option=[];
				option['cateRotate']=0;
				option['ticks']="[10000, 30000, 50000, 70000]";
				option['intervals']="[22000, 55000, 70000]";
				option['intervalColors']="['red', 'yellow', 'green']";
				option['label']='Metric Tons per Year';
				option['labelPosition']='bottom';
				option['labelHeightAdjust']=-5;
				option['intervalOuterRadius']=130;
				option['tooltipTextColor']='white';
				
				
				gaugeChart("chart",data,option);	
					
			}
		});
	});
	
	$("#btnMapRegion").click(function(){
		//th_mill_en
		//th_regions_mill_en
		
		$.ajax({
			url:"../Model/mMapThRegion.php",
			type:"get",
			dataType:"json",
			success:function(data){
				option=[];
				option['mapType']="th_regions_mill_en";
				option['tooltipTextColor']='white';
				option['theme']=theme;
				option['initial']="#808080";
				option['selected']="#F4A582";
				option['scale']="['#C8EEFF', '#0071A4']";
				
				map("chart",data,option);	
			}
		});
		
		
	});
	$("#btnMapProvince").click(function(){
		//th_mill_en
		//th_regions_mill_en
		
		$.ajax({
			url:"../Model/mMapThProvince.php",
			type:"get",
			dataType:"json",
			success:function(data){
				option=[];
				option['mapType']="th_mill_en";
				option['tooltipTextColor']='white';
				option['theme']=theme;
				option['initial']="#808080";
				option['selected']="#F4A582";
				option['scale']="['#C8EEFF', '#0071A4']";
				
				map("chart",data,option);	
			}
		});
		
		
	});
	
	$("#btnTable").click(function(){
		$.ajax({
			url:"../Model/mTable.php",
			type:"get",
			dataType:"json",
			success:function(data){
				option=[];
				option['theme']=theme;
				
				table("chart",data);	
				
			}
		});
	});
});