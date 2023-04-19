<?php session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
		//Search
	$_SESSION['kpi_owner_search_year']="ปีประเมิน";
	$_SESSION['kpi_owner_l_search_department']="แผนก";
	$_SESSION['kpi_owner_l_search_appraisalPeriod']="ช่วงประเมิน";
	$_SESSION['kpi_owner_l_search_btn_search']="ตกลง";

	
	//page owner
	$_SESSION['kpi_owner_l_by_owner']="วิสัยทัศน์และยุทธวิธี";
	$_SESSION['kpi_owner_l_by_appraisal']="ผลประเมินตามช่วงประเมิน";
	$_SESSION['kpi_owner_l_by_department']="ผลประเมินตามแผนก";
	$_SESSION['kpi_owner_l_by_kpi']="ผลประเมินรายตัวชี้วัด";

	//table
	$_SESSION['kpi_owner_l_tbl_title1']="ตัวชี้วัด";
	$_SESSION['kpi_owner_l_tbl_title2']="ผลประเมินรายตัวชี้วัด";

	$_SESSION['kpi_owner_l_tbl_id']="#";
	$_SESSION['kpi_owner_l_tbl_kpi_name']="ตัวชี้วัด";
	$_SESSION['kpi_owner_l_tbl_target']="เป้า";
	$_SESSION['kpi_owner_l_tbl_actual']="ผลประเมิน";
	$_SESSION['kpi_owner_l_tbl_grahp']="กราฟ";
	$_SESSION['kpi_owner_l_tbl_target_actual']="ผลเทียบเป้า";
	$_SESSION['kpi_owner_l_tbl_performance']="ประสิทธิภาพ%";
	
	

}else{
	
//Search
	$_SESSION['kpi_owner_search_year']="Appraisal Year";
	$_SESSION['kpi_owner_l_search_department']="Department";
	$_SESSION['kpi_owner_l_search_appraisalPeriod']="Appraisal Period";
	$_SESSION['kpi_owner_l_search_btn_search']="Submit";

	
	//page owner
	$_SESSION['kpi_owner_l_by_owner']="Overview";
	$_SESSION['kpi_owner_l_by_appraisal']="Appraisal Result by Period";
	$_SESSION['kpi_owner_l_by_department']="Appraisal Result by Department";
	$_SESSION['kpi_owner_l_by_kpi']="Appraisal Result by KPIs";

	//table
	$_SESSION['kpi_owner_l_tbl_title1']="KPI List";
	$_SESSION['kpi_owner_l_tbl_title2']="KPI Result";

	$_SESSION['kpi_owner_l_tbl_id']="#";
	$_SESSION['kpi_owner_l_tbl_kpi_name']="KPI Name";
	$_SESSION['kpi_owner_l_tbl_target']="Target";
	$_SESSION['kpi_owner_l_tbl_actual']="Actual";
	$_SESSION['kpi_owner_l_tbl_grahp']="Graph";
	$_SESSION['kpi_owner_l_tbl_target_actual']="Actual/Target";
	$_SESSION['kpi_owner_l_tbl_performance']="Performace%";

}
?>
 <style>
                #gauge-container {
                    background: transparent url("../images/gauge-container-partial-236.png") no-repeat 50% 50%;
                    width: 236px;
                    height: 236px;
                    text-align: center;
                    margin: 0 auto 0px auto;
                    margin: 0 auto 5px;
                }

                .gaugeOwner {
                    width: 220px;
                    height: 185px;
                    margin: 0 auto;
                    margin-top:5px;
                  
				}
				.gaugePerspective{
					width: 220px;
					height: 185px;
					margin: 0 auto;
					margin-top: 5px;
				}
                .gaugeDep  {
				    height: 185px;
				    margin: 5px auto 0;
				    width: 220px;
				}

                #gauge-container .k-slider {
                    margin-top: -11px;
                    width: 140px;
                }
                  #gaugeOwner > svg {
                   padding-top: -3px;
                  }
                  
                  #barChart{
                  height:230px;
                  width:430px;
                  }
                  .percent {
				    display: inline-block;
				    line-height: 50px;
				    margin-left: -20px;
				    z-index: 2;
				}
				
				.easyPieChart {
				  position: relative;
				  display: inline-block;
				  width: 70px;
		
	
				  text-align: center;
				  margin-top: 13px;
				  margin-left:15px;
				}
				.easyPieChart canvas {
				  position: absolute;
				  top: 0;
				  left: 0;
				}
				
				.percent:after {
				  content: '%';
				  margin-left: 0.1em;
				  font-size: .8em;
				}
				
				.KpiPerspective{
				/*
				float:left;
				margin-left:2px;
				height: 79px;
				min-width:160px;
				*/
				}
				#barChartOwner{
				height:250px;
				}

				/*hidden tooltip sparkline*/
				.jqstooltip{
				display:none;
				}
				#jqstooltip{
					display:none;
				}

				#areaPieByDepartment{
					/* cursor: pointer; */
				}
				#gaugeOwnerValue{
					font-weight: bold;
					font-size: 24px;
				}
				.box1{
					text-align:right; 
					padding:5px;
				}
				.gaugePerspectiveValue{
					font-weight: bold;
					font-size: 24px;
				}

				.boxMargin{
					margin-top:5px;
					margin-bottom:5px;
				}

				.fontLabelParam{
					text-align:right; 
					padding-top:7px;
				} 
                 

            </style>
				

 <div class="row1">
		<div class="panel panel-default panel-top">
		  <div class="panel-heading" style="padding:0px;">
		   
									<div class="box-title-l">
									
									
			
										
										<!-- Parameter Top KPI Owner Page Start-->
											<div class="col-md-12">
												
												<div class="col-md-2" >
													<div >
														<div  class='boxMargin pre-search-label fontLabelParam' style="padding-right: 5px; font-weight:bold;">
														<?=$_SESSION['kpi_owner_search_year']?>
														</div>
													</div>
												</div> 
												
												<div class="col-md-2">
														<div class='boxMargin' id="appraisalYearArea"></div>
												</div>
												


												
												
												<!-- <div class="box5"  style="display: none;">
													<button href="#appraisalPeriodSubmit" id="appraisalPeriodSubmit" class="btn btn-primary btn-sm" style="margin-top: 2px; margin-left:10px; "><?=$_SESSION['kpi_owner_l_search_btn_search']?></button>
												</div> -->
												
												
											</div>
										<!-- Parameter Top KPI Owner Page End-->
										<!-- 
										<table>
											<tr>
												<td>
												<span class="glyphicon glyphicon-dashboard"></span>ภาพรวมของบริษัท
												</td>
												<td>&nbsp; &nbsp; <strong>ปีการประเมิน</strong></td>
												<td id="appraisalYearArea">
													
												</td>
												<td><strong>ประเมินครั้งที่</strong></td>
												<td id="appraisalPeriodAea">
													
												</td>
												<td>
													<button id="appraisalPeriodSubmit">ตกลง</button>
												</td>
											</tr>
										</table>
										 -->
										
									
									
									
									</div>
									<div class="box-title-r" >
										<div class="boxNav">
										<a href="#">
										<span class="glyphicon glyphicon-remove glyphicon-remove-top"></span>
										</a>
										</div>
										<div class="boxNav">
										<a href="#">
										<span class="glyphicon glyphicon-resize-full glyphicon-resize-full-top"></span>
										</a>
										</div>
										<div class="boxNav">
										<a href="#">
										<span class="glyphicon glyphicon-minus glyphicon-minus-top"></span>
										</a>
										</div>
									</div>
									<br style="clear:both">
								
		  </div>
		  <div class="panel-body panel-body-top" >
		    	
		    	<row >
		    		<div class="col-md-3 ">
		    		<!-- ### Panel Start ### -->
						<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
								  <div class="panel-heading">
									<b><i  class="glyphicon glyphicon-screenshot"></i> <?=$_SESSION['kpi_owner_l_by_owner']?></b>			
								  </div>
								  <div class="panel-body panel-body-top">
								  
								 		<div id="gauge-container">
						    				<div class="gaugeOwner" id="gaugeOwner"></div>
						    				<div id="gaugeOwnerValue"></div>
						    			</div>
								 		
								  </div>
						</div>
						<!-- ### Panel End ### -->
						
						
		    			
		    			
		    		</div>
		    		
		    	
		    		
		    		
		    		<div class="col-md-4 ">
		    			<!-- ### Panel Start ### -->
						<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
								  <div class="panel-heading">
									<b> <i class="glyphicon glyphicon-random"></i>&nbsp;<span id='titleDepTop'></span>	<?=$_SESSION['kpi_owner_l_by_department']?></b>	
								  </div>
								  <div class="panel-body panel-body-top" style="padding: 0px;margin-bottom: 0px;">
								  
								 		<div id="areaPieByDepartment" style="width: auto;"></div>
								 		
								  </div>
						</div>
						<!-- ### Panel End ### -->
						
		    			
		    		</div>
		    		
		    		
		    		<div class="col-md-5 col-sm-12">
		    			<!-- ### Panel Start ### -->
						<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
								  <div class="panel-heading">
									<b><i class=" glyphicon glyphicon-edit"></i> <?=$_SESSION['kpi_owner_l_by_appraisal']?></b>			
								  </div>
								  <div class="panel-body panel-body-top">
								  
								 		<div id="barChartOwner"></div>	
								 		
								  </div>
						</div>
						<!-- ### Panel End ### -->
		    			
		    		</div>
		    	</row>
		    	
		  </div>
		
		    	
	 <row>
			<div id="perspectiveArea"></div>
	</row>
	<br style="clear: both;">   	
		  
</div>
</div>

<script src="../Controller/cKpiOwner.js"></script>
