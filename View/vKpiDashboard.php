<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
	//description	

	//Search
	$_SESSION['emp_dashboard_l_search_year']="ปีประเมิน";
	$_SESSION['emp_dashboard_l_search_appraisal_period']="ช่วงประเมิน";
	$_SESSION['emp_dashboard_l_search_department']="แผนก";
	$_SESSION['emp_dashboard_l_search_position']="ตำแหน่ง";
	$_SESSION['emp_dashboard_l_search_emp']="พนักงาน";
	
	

	$_SESSION['emp_dashboard_l_search_btn_search']="ตกลง";
	$_SESSION['emp_dashboard_l_search_btn_back']="ย้อนกลับ";

	//table level1
	
	$_SESSION['emp_dashboard_emp_l_tbl_id']="#";
	$_SESSION['emp_dashboard_emp_l_tbl_pticture']="";
	$_SESSION['emp_dashboard_emp_l_tbl_fullname']="ชื่อ-นามสกุล";
	$_SESSION['emp_dashboard_emp_l_tbl_department']="แผนก";
	$_SESSION['emp_dashboard_l_tbl_position']="ตำแหน่ง";
	
	$_SESSION['emp_dashboard_l_tbl_target']="เป้า";
	$_SESSION['emp_dashboard_l_tbl_actual']="ผลประเมิน";
	$_SESSION['emp_dashboard_l_tbl_graph']="กราฟ";
	$_SESSION['emp_dashboard_l_tbl_actual_target']="เทียบเป้า";
	$_SESSION['emp_dashboard_l_tbl_status']="สถานะ";
	$_SESSION['emp_dashboard_l_tbl_download']="ดาวน์โหลด";

	//table2
	$_SESSION['emp_dashboard2_l_title_overview']="ผลประเมิน";
	$_SESSION['emp_dashboard2_l_title_kpi_result']="ผลประเมินรายตัวชี้วัด";
	$_SESSION['emp_dashboard2_l_tbl_id']="#";
	$_SESSION['emp_dashboard2_l_tbl_kpi_name']="ตัวชี้วัด";
	$_SESSION['emp_dashboard2_l_tbl_target']="เป้าข้อมูลดิบ";
	$_SESSION['emp_dashboard2_l_tbl_actual']="ผล";
	$_SESSION['emp_dashboard2_l_tbl_graph']="กราฟ";
	$_SESSION['emp_dashboard2_l_tbl_actual_target']="เทียบเป้า";
	$_SESSION['emp_dashboard2_l_tbl_status']="ผลประเมิน%";
	
	$_SESSION['emp_dashboard2_l_title_appraisal_reasult']="ผลตามช่วงประเมิน";

	

}else{
	
//description	

	//Search
	$_SESSION['emp_dashboard_l_search_year']="Appriasal Year";
	$_SESSION['emp_dashboard_l_search_appraisal_period']="Appraisal Period";
	$_SESSION['emp_dashboard_l_search_department']="Department";
	$_SESSION['emp_dashboard_l_search_btn_search']="Submit";
	$_SESSION['emp_dashboard_l_search_btn_back']="Back";

	//table level1
	
	$_SESSION['emp_dashboard_emp_l_tbl_id']="#";
	$_SESSION['emp_dashboard_emp_l_tbl_pticture']="";
	$_SESSION['emp_dashboard_emp_l_tbl_fullname']="Full Name";
	$_SESSION['emp_dashboard_emp_l_tbl_department']="Department";
	$_SESSION['emp_dashboard_l_tbl_position']="Position";
	$_SESSION['emp_dashboard_l_tbl_target']="Target";
	$_SESSION['emp_dashboard_l_tbl_actual']="Acutal";
	$_SESSION['emp_dashboard_l_tbl_graph']="Graph";
	$_SESSION['emp_dashboard_l_tbl_actual_target']="Actual/Target";
	$_SESSION['emp_dashboard_l_tbl_status']="Status";
	$_SESSION['emp_dashboard_l_tbl_download']="Download";

	//table2
	$_SESSION['emp_dashboard2_l_title_overview']="Overview";
	$_SESSION['emp_dashboard2_l_title_kpi_result']="KPI Result";
	$_SESSION['emp_dashboard2_l_tbl_id']="#";
	$_SESSION['emp_dashboard2_l_tbl_kpi_name']="KPI  Name";
	$_SESSION['emp_dashboard2_l_tbl_target']="Target";
	$_SESSION['emp_dashboard2_l_tbl_actual']="Actual";
	$_SESSION['emp_dashboard2_l_tbl_graph']="Graph";
	$_SESSION['emp_dashboard2_l_tbl_actual_target']="Actual/Target";
	$_SESSION['emp_dashboard2_l_tbl_status']="Status";
	
	$_SESSION['emp_dashboard2_l_title_appraisal_reasult']="Appraisal Result by Period";

}
$department_name=$_GET['department_name']; 
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
                  .ball{
					  margin-left: 5px;
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
					.modal-dialog {
					    padding-bottom: 30px;
					    padding-top: 30px;
					    width: 780px;
					}

					/*hidden tooltip sparkline*/
					.jqstooltip{
					display:none;
					}
					#jqstooltip{
						display:none;
					}
					.textR{
						text-align: right;
						float: right;
					}
	                 
            </style>

 <div class="row1">
 	
 	<div class="col-md-12">
 	
		<!--  panel1 start -->
		<div class="panel panel-default">
		  <div class="panel-heading">
		   
									<div class="box-title-l">
									
									
									
									<div class="topParameter">
			
										<table>
											<tr>
												
												<td>
												 <strong class="pre-search-label"><?=$_SESSION['emp_dashboard_l_search_year']?></strong></td>
												<td id="appraisalYearArea">
												</td>
												<td><strong class="pre-search-label"><?=$_SESSION['emp_dashboard_l_search_appraisal_period']?></strong></td>
												<td id="appraisalPeriodAea">
												</td>
												<td id="kpiDashboardSearchParamDepLabelArea">
												 <strong class="pre-search-label"><?=$_SESSION['emp_dashboard_l_search_department']?></strong></td>
												<td id="appraisalDepDropDrowListArea">
												</td>

												<td id="kpiDashboardSearchParamPositionLabelArea">
												 <strong class="pre-search-label"><?=$_SESSION['emp_dashboard_l_search_position']?></strong></td>
												<td id="appraisalPositionDropDrowListArea">
												</td>

												<td id="kpiDashboardSearchParamEmpLabelArea">
												 <strong class="pre-search-label"><?=$_SESSION['emp_dashboard_l_search_emp']?></strong></td>
												<td id="appraisalEmpDropDrowListArea">
												</td>


												<td >
													<button style="display: none;" id="kpiDashboardSubmit" class="btn btn-primary btn-sm" ><?=$_SESSION['emp_dashboard_l_search_btn_search']?></button>
													<!-- <input type="button" value="<?=$_SESSION['emp_dashboard_l_search_btn_back']?>" class="btn default  btn-sm" name="dashboardBackBtn" id="dashboardBackBtn"> -->
												</td>
											</tr>
											
										</table>
									</div>
									
									</div>
									<div class="box-title-r">
										
										<div class="boxNav">
											<a href="#">
											<span class="glyphicon glyphicon-remove"></span>
											</a>
										</div>
										<div class="boxNav">
											<a href="#">
											<span class="glyphicon glyphicon-resize-full"></span>
											</a>
										</div>
										<div class="boxNav">
											<a href="#">
											<span class="glyphicon glyphicon-minus"></span>
											</a>
										</div>
										<div class="boxNav">
											<a href="#">
											<span class="glyphicon glyphicon-download-alt"></span>
											</a>
										</div>
									</div>
									<br style="clear:both">
								
		  </div>
		  <div class="panel-body">
		    	
		    	<row>
		    		
		    		<div class="col-md-12" style="padding-left: 0;padding-right: 0;">
		    		
		    			
		    			<div id="departmentArea" class="departmentArea"></div>
		    			
		    			
		    		</div>
		    		
		    	</row>
		    	
		  </div>
		
		</div>
		<!-- panel 1 end -->
		
		
	</div>
	
</div>

			
<!-- modal start -->

   

<script src="../Controller/cKpiDashboard.js"></script>
