<?php session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
?>
<style>
 #barChartPersonal{
	height:250px;
	/*width:360px;*/
}
 #pieChartPersonal{
	height:250px;
	/*width:360px;*/
}
.k-grid td{
/* padding: 2px; */
}

.gaugePersonal {
	width: 220px;
	height: 185px;
	margin: 0 auto;
	margin-top:5px;
}
.gaugePersonal > svg {
  padding-top: -3px;
}
.textR{
	text-align: right;
	float:right;
}

/*
#gaugePersonal {
	width: 300px;
	height: 180px;
	left:0px;
	
}*/
/*
table {
 
    max-width: "0px;";
}
.k-grid table{
	width:"";
}
*/
</style>

<?php 
$emp_id=$_GET['emp_id'];
?>
<div class="row" >
<!--  panel1 start -->
<div class="panel panel-default" id='informationEmpArea' style="display: none;">
	<div class="panel-heading">
	
							<div class="box-title-l"><span class="glyphicon glyphicon-globe"></span>
							<!-- Information Personal : ข้อมูลส่วนตัว -->
						<B>ข้อมูลพนักงาน</B> 
							</div>
							<!-- 
							<div class="box-title-r">
								<div class="boxNav"><span class="glyphicon glyphicon-remove"></span></div>
								<div class="boxNav"><span class="glyphicon glyphicon-resize-full"></span></div>
								<div class="boxNav"><span class="glyphicon glyphicon-minus"></span></div>
							</div>
								-->
							<br style="clear:both">
						
	</div>
	<div class="panel-body"style="padding-bottom: 5px;">
	<div id="empArea-<?=$emp_id?>"  >
		
		
	</div >
	</div>
</div>
		
			
<div class='row1 container'>
	<div class="col-md-12" style="margin-top:5px;">

		<!-- ### Panel Start ### -->
		<div class="panel panel-default panel-bottom">
					<div class="panel-heading">
					<b><i class="glyphicon glyphicon-screenshot"></i> <?=$_SESSION['emp_dashboard2_l_title_overview']?>	</b>	
					</div>
					<div class="panel-body panel-body-bottom" style="padding-left: 0;padding-right: 0;margin-bottom: 5px;">
					
							<div class="col-md-6">
								<div id="gaugePersonalArea">
				
									<div id="gauge-container1">
										<div class="gaugePersonal" id="gaugePersonal-<?=$emp_id?>" style=' height: 175px;'></div>
										<div style='display:none;' class='gauge_data' id="gauge_data-<?=$emp_id?>"  ></div>
										<p class="bg-info" style="padding: 15px;margin:10px; text-align:center;margin-bottom:0px;" id="gauge-value-<?=$emp_id?>">  <b> 86%</b></p>
										<p style="display:none;" id="gaugeValue-<?=$emp_id?>"></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div id="barChartPersonal-<?=$emp_id?>"  style="width:300px; height:250px;"></div> 
							</div>
					</div>
		</div>
		<!-- ### Panel End ### -->
		
		
		
		
		<!-- <div id="gaugePersonal"></div> -->
		<!-- <img width="250" src="../images/user.jpg" class="img-rounded">-->
	</div>

	<!-- <div class="col-md-12" >
					
		
		<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
					<div class="panel-heading">
					<B><i class=" glyphicon glyphicon-edit"></i> <?=$_SESSION['emp_dashboard2_l_title_appraisal_reasult']?></B>
					</div>
					<div class="panel-body panel-body-bottom" style="padding: 5px;margin-bottom: 5px;">
					
							

					</div>
		</div>
						
			
	</div> -->
</div>
<div class="row1 container">
		<div class="col-md-12">
			<!-- ### Panel Start ### -->
				<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
							<div class="panel-heading">
							<B><i class="glyphicon glyphicon-record"></i> <?=$_SESSION['emp_dashboard2_l_title_kpi_result']?></B>			
							</div>
							<div class="panel-body panel-body-bottom" style="padding-left: 0;padding-right: 0;margin-bottom: 5px;">
								<!-- ### Panel End ### -->
							<!--  table grid start -->
							<div  id="gridPersonalKPI-<?=$emp_id?>"></div>
							<!--  table grid end -->
							</div>
				</div>
		<!--panel end-->
				
		</div>
</div>
				 <!-- <script src="../Controller/cMyEvaluate.js"></script> -->
		





