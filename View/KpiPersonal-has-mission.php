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
		  <div class="panel-body">
			<row id="empArea-<?=$emp_id?>" >
				
				
			</row >
			<br style="clear:both">
		  	<row>
		 	<div class="col-md-3" style="margin-top:5px;">
		 	
		 		<!-- ### Panel Start ### -->
				<div class="panel panel-default panel-bottom">
						  <div class="panel-heading">
							<b>ประสิทธิภาพการทำงาน		</b>	
						  </div>
						  <div class="panel-body panel-body-bottom" style="padding: 5px;margin-bottom: 5px;">
						  
						 		
						 			<div id="gaugePersonalArea">
		 	 		
							 	 		<div id="gauge-container">
					    					<div class="gaugePersonal" id="gaugePersonal-<?=$emp_id?>"></div>
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
										<B>ข้อมูล KPI</B>			
									  </div>
									  <div class="panel-body panel-body-bottom" style="padding: 5px;margin-bottom: 5px;">
									  
									 			
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
						                        <th data-field="Field1"><b>CODE</b></th>
						                        <th data-field="Field2"><b>NAME</b></th>
						                        <th data-field="Field3"><b>TARGET</b></th>
						                        <th data-field="Field4"><b>ACTUAL</b></th>
						                        <th data-field="Field5"><b>GRAPH</b></th>
						                        <th data-field="Field6"><b>GRAPH</b></th>
						                        <th data-field="Field7"><b>STATUS</b></th>
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
</div>
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
		    		
		    		<div class="col-md-6">
		    		 	
		    		 	<!-- ### Panel Start ### -->
							<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
									  <div class="panel-heading">
										<B>ผลการประเมินเทียบเป้า			</B>
									  </div>
									  <div class="panel-body panel-body-bottom" style="padding: 5px;margin-bottom: 5px;">
									  
									 			<div id="barChartPersonal-<?=$emp_id?>"  style="height:250px;"></div> 

									  </div>
							</div>
							<!-- ### Panel End ### -->
							
		    		</div>
		    		
					<div class="col-md-6">
						<!-- ### Panel Start ### -->
							<div class="panel panel-default panel-bottom" style="margin-top: 5px;">
									  <div class="panel-heading">
										<B>ผลการประเมินเทียบ KPI			</B>
									  </div>
									  <div class="panel-body panel-body-bottom" style="padding: 5px;margin-bottom: 5px;">
									  
									 		
									 			<div id="pieChartPersonal-<?=$emp_id?>" style="height:250px;"></div> 
									 		
								    	
									 		
									  </div>
							</div>
							<!-- ### Panel End ### -->
							
						 
					</div>
		    		
		    	</row>
		    	
		  </div>
		
		</div>
		<!-- panel 1 end -->
	
</div>
<div class="row">
	<!--  panel1 start -->
		<div class="panel panel-default">
		  <div class="panel-heading">
		   
									<div class="box-title-l"><span class="glyphicon glyphicon-globe"></span>
								<B>	Mission : ภารกิจ</B>
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
		    		<!-- 
		    		<div class="col-md-6">
		    		
		    			
				  		<table class="table-striped" border="0" spacing="0" style="margin-top:5px;">
				  			
				  			<tr>
				  				<td width="100"><b>ตำแหน่ง</b></td>
				  				<td>โปแกรมเมอร์</td>
				  				<td width="120"><b>อายุการทำางาน</b></td>
				  				<td>3 ปี</td>
				  			</tr>
				  			<tr>
				  				<td><b>วันเดือนปีเกิด</b></td>
				  				<td>26/05/29</td>
				  				<td><b>อายุ</b></td>
				  				<td>28</td>
				  			</tr>
				  			<tr>
				  				<td><b>สถานนะ</b></td>
				  				<td>สมรส</td>
				  				<td><b>อีเมลล์</b></td>
				  				<td>nn.it@hotmail.com</td>
				  			</tr>
				  			<tr>
				  				<td><b>เบอร์บ้าน</b></td>
				  				<td>024445566</td>
				  				<td><b>เบอร์มือถือ</b></td>
				  				<td>0809926565</td>
				  			</tr>
				  			<tr>
				  				<td><b>ที่อยู่</b></td>
				  				<td>688/168 หมู่บ้านรื่นฤดี5</td>
				  				<td><b>ตำบล/แขวง</b></td>
				  				<td>คันนายาว</td>
				  			</tr>
				  			<tr>
				  				<td><b>อำเภอ/เขต</b></td>
				  				<td>มีนบุรี</td>
				  				<td><b>จังหวัด</b></td>
				  				<td>กรุงเทพ</td>
				  			</tr>
				  			
				  			<tr>
				  				<td><b>รหัสไปรษณี</b></td>
				  				<td>10520</td>
				  				<td><b>รหัสพนักงาน</b></td>
				  				<td>EMP00884</td>
				  				
				  			</tr>
				  			
				  		</table>
		  		
					</div>
					 -->
					 <!--  table grid start
				<div class="col-md-12">
				
			 	
		    			<table id="gridPersonalMission-<? //$emp_id?>">
			                <colgroup>
			                    <col style="width:5%" />
			                    <col  style="width:25%"/>
			                    <col  style="width:35%"/>
			                    <col style="width:8%"/>
			                    <col style="width:8%"/>
			                    <col style="width:8%"/>
			                    
			                </colgroup>
			                <thead>
			                    <tr>
			                 
			                        <th data-field="Field1"><b> CODE</b></th>
			                        <th data-field="Field2"><b>KPI NAME</b></th>
			                        <th data-field="Field3"><b>KPI DETAIL</b></th>
			                        <th data-field="Field4"><b> ACTUAL</b></th>
			                        <th data-field="Field5"><b> TARGET</b></th>
			                        <th data-field="Field6"><b> SCORE</b></th>
			                        <th data-field="Field7"><b>PERFORMANCE</b></th>
			                     
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
		    			
			 	
				</div>
				 table grid end -->
		    		
		    	</row>
		    	
		  </div>
		
		</div>
		<!-- panel 1 end -->
	
</div>


