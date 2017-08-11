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

                #gauge-container .k-slider {
                    margin-top: -11px;
                    width: 140px;
                }
                  #gaugeOwner > svg {
                   padding-top: -3px;
                  }
                  
                  #barChart{
                  height:250px;
                  width:360px;
                  }
                  .panel{
                   margin-bottom: 10px;
                  }
                  
                  .ExBallGray{
						background:#eeeeee;
						width:20px;
						height:20px;
						border-radius: 100%;
					}
					.ExBallRed{
						background:#5CB85C;
						width:20px;
						height:20px;
						border-radius: 100%;
					}
					.ExBallYellow{
						background:#F0AD4E;
						width:20px;
						height:20px;
						border-radius: 100%;
					}
					.ExBallGreen{
						background:#F5F5F5;
						width:20px;
						height:20px;
						bborder-radius: 100%;
					}

            </style>

 <div class="row1">
 	<div class="col-md-4">
			<div class="panel panel-default">
		  <div class="panel-heading">
		   
									<div class="box-title-l"><span class="glyphicon glyphicon-globe"></span>
									<span id="pers01">ภาพรวมฝ่ายการเงิน</span>
									</div>
									<div class="box-title-r">
										<div class="boxNav"><span class="glyphicon glyphicon-remove"></span></div>
										<div class="boxNav"><span class="glyphicon glyphicon-resize-full"></span></div>
										<div class="boxNav"><span class="glyphicon glyphicon-minus"></span></div>
									</div>
									<br style="clear:both">
								
		  </div>
		  <div class="panel-body">
		    			<div id="gauge-container">
		    				<div class="gaugeOwner" id="gaugeOwner"></div>
		    				<div id="gauge-value">ฝ่ายการเงิน <b> 86%</b></div>
		    			</div>
		    	<row>
		    		
		    		<div id="barChart"></div>
		    	</row>
		    	
		  </div>
		
		</div>
	</div>
 	<div class="col-md-8">
 	
		<!--  panel1 start -->
		<div class="panel panel-default">
		  <div class="panel-heading">
		   
									<div class="box-title-l"><span class="glyphicon glyphicon-globe"></span>
									Perspective : ด้านการเงิน
									</div>
									<div class="box-title-r">
										<div class="boxNav"><span class="glyphicon glyphicon-remove"></span></div>
										<div class="boxNav"><span class="glyphicon glyphicon-resize-full"></span></div>
										<div class="boxNav"><span class="glyphicon glyphicon-minus"></span></div>
									</div>
									<br style="clear:both">
								
		  </div>
		  <div class="panel-body">
		    	
		    	<row>
		    		
		    		<div class="col-md-12">
		    			<!--  table grid start -->
		    			<table id="grid">
			                <colgroup>
			                    <col />
			                    <col />
			                    <col />
			                     <col />
			                    <col style="width:100px" />
			                    <col style="width:100px" />
			                    <col style="width:100px" />
			                </colgroup>
			                <thead>
			                    <tr>
			                        <th data-field="filed1"><b>KPI CODE</b></th>
			                        <th data-field="filed2"><b>KPI NAME</b></th>
			                        <th data-field="filed3"><b>KPI TARGET</b></th>
			                        <th data-field="filed4"><b>KPI ACTUAL</b></th>
			                        <th data-field="filed5"><b>KPI SCORE</b></th>
			                        <th data-field="filed6"><b>KPI GRAPH</b></th>
			                        <th data-field="filed7"><b>STATUS</b></th>
			                    </tr>
			                </thead>
			                <tbody>
			                    <tr>
			                        <td>KPI001</td>
			                        <td>ยอดขายเทียบเป้าปี2557</td>
			                        <td>8000</td>
			                        <td>7500</td>
			                         <td>
			                         	<div class="sparkline"></div>
			                         </td>
			                         <td>
			                         	<div class="lineSparkline"></div>
			                         </td>
			                        <td>
			                         	<span class=" pull-right ExBallGray"></span>
										<span class=" pull-right ExBallGray"></span>
										<span class=" pull-right ExBallGray"></span>
			                        </td>
			                    </tr>
			                     <tr>
			                        <td>KPI001</td>
			                        <td>การขยันทำงาน</td>
			                        <td>8000</td>
			                        <td>7500</td>
			                         <td><div class="sparkline"></div></td>
			                         <td>
			                         	<div class="lineSparkline"></div>
			                         </td>
			                        <td>
			                        
			                        	<span class=" pull-right ExBallGray"></span>
										<span class=" pull-right ExBallGray"></span>
										<span class=" pull-right ExBallRed"></span>
			                        </td>
			                    </tr>
			                     <tr>
			                        <td>KPI001</td>
			                        <td>การอบรมหาความรู้</td>
			                        <td>8000</td>
			                        <td>7500</td>
			                         <td><div class="sparkline"></div></td>
			                         <td>
			                         	<div class="lineSparkline"></div>
			                         </td>
			                        <td>
			                        	<span class=" pull-right ExBallGray"></span>
										<span class=" pull-right ExBallGray"></span>
										<span class=" pull-right ExBallRed"></span>
			                        </td>
			                    </tr>
			                     <tr>
			                        <td>KPI001</td>
			                        <td>ตรงต่อเวลา</td>
			                        <td>8000</td>
			                        <td>7500</td>
			                         <td><div class="sparkline"></div></td>
			                         <td>
			                         	<div class="lineSparkline"></div>
			                         </td>
			                        <td>
			                        	<span class=" pull-right ExBallGray"></span>
										<span class=" pull-right ExBallGray"></span>
										<span class=" pull-right ExBallRed"></span>
			                        </td>
			                    </tr>
			                     <tr>
			                        <td>KPI001</td>
			                        <td>ความรักองค์กร</td>
			                        <td>8000</td>
			                        <td>7500</td>
			                         <td><div class="sparkline"></div></td>
			                         <td>
			                         	<div class="lineSparkline"></div>
			                         </td>
			                        <td>
			                        	<span class=" pull-right ExBallGray"></span>
										<span class=" pull-right ExBallGray"></span>
										<span class=" pull-right ExBallRed"></span>
			                        </td>
			                    </tr>
			                    
			                    
			                </tbody>
			            </table>
		    			<!--  table grid end -->
		    		</div>
		    		
		    	</row>
		    	
		  </div>
		
		</div>
		<!-- panel 1 end -->
		
		<!--  panel2 start -->
		<div class="panel panel-default" >
		  <div class="panel-heading">
		   
									<div class="box-title-l"><span class="glyphicon glyphicon-globe"></span>
									Mission KPI CODE KPI001
									</div>
									<div class="box-title-r">
										<div class="boxNav"><span class="glyphicon glyphicon-remove"></span></div>
										<div class="boxNav"><span class="glyphicon glyphicon-resize-full"></span></div>
										<div class="boxNav"><span class="glyphicon glyphicon-minus"></span></div>
									</div>
									<br style="clear:both">
								
		  </div>
		  <div class="panel-body">
		    	
		    	<row>
		    		
		    		<div class="col-md-12">
		    			<!--  table grid start -->
		    			<table id="grid2">
			                <colgroup>
			                    <col style="width:120px" />
			                    <col />
			                   
			                  
			                </colgroup>
			                <thead>
			                    <tr>
			                        <th data-field="filed1"><b>KPI CODE</b></th>
			                        <th data-field="filed2"><b>KPI NAME</b></th>
			                     
			                    </tr>
			                </thead>
			                <tbody>
			                    <tr>
			                        <td>
			                        KPI001 <br>
			                    		   ความรักองค์กร<br>
			                        </td>
			                        <td>ปัญหาการทำเว็บไซต์ที่ไม่ประสบผลสำเร็จในการสร้างยอดขาย ทุกคนที่อยากทำเว็บไซต์ต่างมุ่งหวังอยากได้ยอดขายและลูกค้าเพิ่มขึ้น แต่ส่วนใหญ่ทำเว็บไซต์ไปแล้วไม่ตอบโจทย์การขายได้ และผู้ให้บริการทำเว็บไซต์ไม่มีบริการด้านการตลาดให้ จึงทำให้ไม่ประสบผลสำเร็จในเพิ่มยอดขาย </td>
			                      
			                        
			                    </tr>
			                     <tr>
			                        <td>
			                         KPI001 <br>
			                      	  การขยันทำงาน<br>
			                        </td>
			                        <td>ปัญหาการทำเว็บไซต์ที่ไม่ประสบผลสำเร็จในการสร้างยอดขาย ทุกคนที่อยากทำเว็บไซต์ต่างมุ่งหวังอยากได้ยอดขายและลูกค้าเพิ่มขึ้น แต่ส่วนใหญ่ทำเว็บไซต์ไปแล้วไม่ตอบโจทย์การขายได้ และผู้ให้บริการทำเว็บไซต์ไม่มีบริการด้านการตลาดให้ จึงทำให้ไม่ประสบผลสำเร็จในเพิ่มยอดขาย </td>
			                     
			                    </tr>
			                     <tr>
			                        <td>
			                         KPI001 <br>
			                      	  ตรงต่อเวลา<br>
			                        </td>
			                        <td>ปัญหาการทำเว็บไซต์ที่ไม่ประสบผลสำเร็จในการสร้างยอดขาย ทุกคนที่อยากทำเว็บไซต์ต่างมุ่งหวังอยากได้ยอดขายและลูกค้าเพิ่มขึ้น แต่ส่วนใหญ่ทำเว็บไซต์ไปแล้วไม่ตอบโจทย์การขายได้ และผู้ให้บริการทำเว็บไซต์ไม่มีบริการด้านการตลาดให้ จึงทำให้ไม่ประสบผลสำเร็จในเพิ่มยอดขาย </td>
			                  
			                        
			                    </tr>
			                    
			                    
			                    
			                </tbody>
			            </table>
		    			<!--  table grid end -->
		    		</div>
		    		
		    	</row>
		    	
		  </div>
		
		</div>
		<!-- panel 2 end -->
	</div>
	
</div>
