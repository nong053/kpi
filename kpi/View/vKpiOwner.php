
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
                 

            </style>

 <div class="row1">
		<div class="panel panel-default panel-top">
		  <div class="panel-heading" >
		   
									<div class="box-title-l">
									
									<div class="topParameter">
			
										
										<!-- Parameter Top KPI Owner Page Start-->
											<row class="topParameter">
												<div class="box1" ><div >
												<span class="glyphicon glyphicon-globe"></span>
												ปีการประเมิน</div></div>
												<div class="box2">
														<div id="appraisalYearArea"></div>
												</div>
												<div class="box7" ><div >
											
													แผนก
												</div>
												</div>
												<div class="box8">
														<div id="depDropDrowListArea"></div>
												</div>
												
												<div class="box3" >ประเมินครั้งที่</div>
												<div class="box4">
													<div id="appraisalPeriodAea"></div>
												</div>
												<div class="box5" >
													<button href="#appraisalPeriodSubmit" id="appraisalPeriodSubmit" class="btn btn-primary btn-sm" style="margin-top: 2px;">ตกลง</button>
												</div>
												
											</row>
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
									<b><i  class="glyphicon glyphicon-screenshot"></i> ประสิทธิภาพโดยรวม</b>			
								  </div>
								  <div class="panel-body panel-body-top">
								  
								 		<div id="gauge-container">
						    				<div class="gaugeOwner" id="gaugeOwner"></div>
						    				<div id="gauge-value"></div>
						    			</div>
								 		
								  </div>
						</div>
						<!-- ### Panel End ### -->
						
						
		    			
		    			
		    		</div>
		    		<div class="col-md-5 ">
		    		
		    			<!-- ### Panel Start ### -->
						<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
								  <div class="panel-heading">
									<b><i class=" glyphicon glyphicon-edit"></i> ผลการประเมิน</b>			
								  </div>
								  <div class="panel-body panel-body-top">
								  
								 		<div id="barChartOwner"></div>	
								 		
								  </div>
						</div>
						<!-- ### Panel End ### -->
						
		    			
		    		</div>
		    		<div class="col-md-4 col-sm-12">
		    		
		    			
		    			<!-- ### Panel Start ### -->
						<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
								  <div class="panel-heading">
									<b> <i class="glyphicon glyphicon-random"></i> <span id='titleDepTop'></span>	</b>	
								  </div>
								  <div class="panel-body panel-body-top" style="padding: 5px;margin-bottom: 5px;">
								  
								 		<div id="areaPieByDepartment" style="width: auto;"></div>
								 		
								  </div>
						</div>
						<!-- ### Panel End ### -->
		    		</div>
		    	</row>
		    	
		  </div>
		
		</div>
</div>

<div class="row2" style="margin-top:-15px;">
	<div class="panel panel-default panel-bottom">
		  <div class="panel-heading">
		   
									<div class="box-title-l"><span class="glyphicon glyphicon-signal"></span>
									<b>ดัชนี(KPI)</b>
									</div>
									<div class="box-title-r">
										<div class="boxNav">
											<a href="#">
											<span class="glyphicon glyphicon-remove glyphicon-remove-bottom"></span>
											</a>
										</div>
										<div class="boxNav">
											<a href="#">
											<span class="glyphicon glyphicon-resize-full glyphicon-resize-full-bottom"></span>
											</a>
										</div>
										<div class="boxNav">
											<a href="#">
											<span class="glyphicon glyphicon-minus glyphicon-minus-bottom"></span>
											</a>
										</div>
									</div>
									<br style="clear:both">
								
		  </div>
		  <div class="panel-body panel-body-bottom">
		    	
		    	<row>
		    		
		    		<div class="col-md-9">
		    		 		<!-- ### Panel Start ### -->
							<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
									  <div class="panel-heading">
									<b><i class="glyphicon glyphicon-record"></i> ผลการประเมินตาม KPI	</b>		
									  </div>
									  <div class="panel-body panel-body-bottom" >
									  
									 		<div id="tableGridKpieResultArea"></div>
									 		
									  </div>
							</div>
							<!-- ### Panel End ### -->
		    		</div>
		    		<div class="col-md-3">
			    			<!-- ### Panel Start ### -->
							<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
									  <div class="panel-heading">
									<b><i class="glyphicon glyphicon-flash"></i>	<span id='titleKpiAndDep'></span>			</b>
									  </div>
									  <div class="panel-body panel-body-bottom" style="padding: 5px;margin-bottom: 5px;">
									  
									 		<div class="col-md-12">
									 		<center>
									 			<div id="pieChartByDepartment" style="height:270px; text-align:center"></div>
									 		</center>
									 			<div id="pieChartKpiResult"  style="height:200px; text-align:center"></div>
									 		</div>
								    		</div>
									 		
									  </div>
							</div>
							<!-- ### Panel End ### -->
							
							
							
		    		</div>
		    	</row>
		    	
		  </div>
		  
		</div>
</div>

