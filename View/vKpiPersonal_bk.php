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
padding: 2px;
}

.gaugePersonal {
	width: 220px;
	height: 185px;
	margin: 0 auto;
	margin-top:5px;
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
<div class="row">
<!--  panel1 start -->
		<div class="panel panel-default">
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
			<row id="empArea-<?=$emp_id?>"  >
				
				
			</row >
			</div>
		</div>
		
			
		  	<row>
		 	<div class="col-md-3" style="margin-top:5px;">
		 	
		 		<!-- ### Panel Start ### -->
				<div class="panel panel-default panel-bottom">
						  <div class="panel-heading">
							<b><i class="glyphicon glyphicon-screenshot"></i> ประสิทธิภาพการทำงาน		</b>	
						  </div>
						  <div class="panel-body panel-body-bottom" style="padding-left: 0;padding-right: 0;margin-bottom: 5px;">
						  
						 		
						 			<div id="gaugePersonalArea">
		 	 		
							 	 		<div id="gauge-container">
					    					<div class="gaugePersonal" id="gaugePersonal-<?=$emp_id?>" style=' height: 175px;'></div>
					    					<div id="gauge-value-<?=$emp_id?>">ฝ่ายการเงิน <b> 86%</b></div>
					    				</div>
							 	 	</div>
						  </div>
				</div>
				<!-- ### Panel End ### -->
				
		 	 	
		  		
    		 
    		 	<!-- <div id="gaugePersonal"></div> -->
		  		<!-- <img width="250" src="../images/user.jpg" class="img-rounded">-->
		  	</div>
		  	
		  	<div class="col-md-9" >
		  					<!-- ### Panel Start ### -->
							<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
									  <div class="panel-heading">
										<B><i class="glyphicon glyphicon-record"></i>ผลการประเมินตาม KPI </B>			
									  </div>
									  <div class="panel-body panel-body-bottom" style="padding-left: 0;padding-right: 0;margin-bottom: 5px;">
									  
									 			
									 		<!-- ### Panel End ### -->
		  						<!--  table grid start -->
					    			<table id="gridPersonalKPI-<?=$emp_id?>">
						                <colgroup>
						                    <col style="width:5%"/>
						                    <col style="width:35%"/>
						                    <col />
						                     <col />
						                    <col  />
						                    <col  />
						                   <!--  <col /> -->
						                </colgroup>
						                <thead>
						                    <tr>
						                        <th data-field="Field1"><b>Code</b></th>
						                        <th data-field="Field2"><b>Name</b></th>
						                        <th data-field="Field3"><b>Target</b></th>
						                        <th data-field="Field4"><b>Actual</b></th>
						                        <th data-field="Field5"><b>Graph</b></th>
						                        <th data-field="Field6"><b>T&Actual</b></th>
						                        <th data-field="Field7"><b>Status</b></th>
						                    </tr>
						                </thead>
						                <tbody>
						                    <tr>
						                        <td></td>
						                        <td></td>
						                        <td></td>
						                        <td></td>
						                        <td></td>
						                        <td></td>
						                        <td></td>
						                    </tr>
						                </tbody>
						            </table>
						            
					    			<!--  table grid end -->
								    		
									 		
									  </div>
							</div>
							
		    		<!--  
		    		 <div id="barChartPersonal"></div> 
					<div id="pieChartPersonal"></div>  
					-->
		  	</div>
			</row>
			
			<!--
			<div class="col-md-3">
	
				<div id="gauge-container">
    				<div class="gaugePersonal" id="gaugePersonal"></div>
    				<div id="gauge-value">ฝ่ายการเงิน <b> 86%</b></div>
    			</div>
				    	
			</div>
			 -->

</div>
<div class="row">
	<!--  panel1 start -->
		<div class="panel panel-default">
		  <div class="panel-heading">
		   
									<div class="box-title-l"><span class="glyphicon glyphicon-globe"></span>
										<B> Appraisal : ผลการประเมิน</B>
									</div>
									<div class="box-title-r">
									<!-- 
										<div class="boxNav"><span class="glyphicon glyphicon-remove"></span></div>
										<div class="boxNav"><span class="glyphicon glyphicon-resize-full"></span></div>
										<div class="boxNav"><span class="glyphicon glyphicon-minus"></span></div>
										 -->
									</div>
									<br style="clear:both">
								
		  </div>
		  <div class="panel-body">
		    	
		    	<row>
		    		
		    		<div class="col-md-4">
		    		 	
		    		 	<!-- ### Panel Start ### -->
							<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
									  <div class="panel-heading">
										<B><i class=" glyphicon glyphicon-edit"></i> ผลการประเมินเทียบเป้า			</B>
									  </div>
									  <div class="panel-body panel-body-bottom" style="padding: 5px;margin-bottom: 5px;">
									  
									 			<div id="barChartPersonal-<?=$emp_id?>"  style="height:250px;"></div> 

									  </div>
							</div>
							<!-- ### Panel End ### -->
							
		    		</div>
		    		
					<div class="col-md-4">
						<!-- ### Panel Start ### -->
							<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
									  <div class="panel-heading">
										<B><i class="glyphicon glyphicon-flash"></i> ผลการประเมินเทียบ KPI			</B>
									  </div>
									  <div class="panel-body panel-body-bottom" style="padding: 5px;margin-bottom: 5px;">
									  
									 		
									 			<div id="pieChartPersonal-<?=$emp_id?>" style="height:250px;"></div> 
									 		
								    	
									 		
									  </div>
							</div>
							<!-- ### Panel End ### -->
							
						 
					</div>
					<div class="col-md-4">
						<!-- ### Panel Start ### -->
							<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
									  <div class="panel-heading">
										<B><i class="glyphicon glyphicon-flash"></i> ข้อเสนอแนะ		</B>
									  </div>
									  <div class="panel-body panel-body-bottom" style="padding: 0px;margin-bottom: 0px;">
									  
									 		
									 		<!--  table grid start -->
					    			<table id="gridPersonalSuggestion-<?=$emp_id?>">
						                <colgroup>
						                    <col style="width:5%"/>
						                    <col style="width:35%"/>
						        
						                </colgroup>
						                <thead>
						                    <tr>
						                        <th data-field="Field1"><b>KPI</b></th>
						                        <th data-field="Field2"><b>Suggestion</b></th>
						                     
						                    </tr>
						                </thead>
						                <tbody>
						                    <tr>
						                        <td></td>
						                        <td></td>
						                        <td></td>
						                      
						                    </tr>
						                </tbody>
						            </table>
						            
					    			<!--  table grid end -->
									 		
								    	
									 		
									  </div>
							</div>
							<!-- ### Panel End ### -->
							
						 
					</div>
		    		
		    	</row>
		    	
		    	
		    	
		  </div>
		
		</div>
		<!-- panel 1 end -->
	
</div>




