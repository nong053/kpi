<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['language']=="th"){
	
	//description	

	//Search
	$_SESSION['emp_dashboard_l_search_year']="ปีการประเมิน";
	$_SESSION['emp_dashboard_l_search_appraisal_period']="ช่วงประเมิน";
	$_SESSION['emp_dashboard_l_search_department']="แผนก";
	

	$_SESSION['emp_dashboard_l_search_btn_search']="ตกลง";
	$_SESSION['emp_dashboard_l_search_btn_back']="ย้อนกลับ";

	//table level1
	
	$_SESSION['emp_dashboard_emp_l_tbl_id']="#";
	$_SESSION['emp_dashboard_emp_l_tbl_pticture']="";
	$_SESSION['emp_dashboard_emp_l_tbl_fullname']="ชื่อ-นามสกุล";
	$_SESSION['emp_dashboard_emp_l_tbl_department']="แผนก";
	$_SESSION['emp_dashboard_l_tbl_position']="ตำแหน่ง";
	$_SESSION['emp_dashboard_l_tbl_target']="เป้า";
	$_SESSION['emp_dashboard_l_tbl_actual']="ผลการประเมิน";
	$_SESSION['emp_dashboard_l_tbl_graph']="กราฟ";
	$_SESSION['emp_dashboard_l_tbl_actual_target']="เทียบเป้า";
	$_SESSION['emp_dashboard_l_tbl_status']="สถานะ";
	$_SESSION['emp_dashboard_l_tbl_download']="ดาวน์โหลด";

	//table2
	$_SESSION['emp_dashboard2_l_title_overview']="ผลการประเมิน";
	$_SESSION['emp_dashboard2_l_title_kpi_result']="ผลการประเมินรายตัวชี้วัด";
	$_SESSION['emp_dashboard2_l_tbl_id']="#";
	$_SESSION['emp_dashboard2_l_tbl_kpi_name']="ตัวชี้วัด";
	$_SESSION['emp_dashboard2_l_tbl_target']="เป้า";
	$_SESSION['emp_dashboard2_l_tbl_actual']="ผล";
	$_SESSION['emp_dashboard2_l_tbl_graph']="กราฟ";
	$_SESSION['emp_dashboard2_l_tbl_actual_target']="เทียบเป้า";
	$_SESSION['emp_dashboard2_l_tbl_status']="สถานะ";
	
	$_SESSION['emp_dashboard2_l_title_appraisal_reasult']="ผลงวดการประเมิน";

	

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
												 <strong><?=$_SESSION['emp_dashboard_l_search_year']?></strong></td>
												<td id="appraisalYearArea">
													
												</td>
												<td id="kpiDashboardSearchParamDepLabelArea">
												 <strong><?=$_SESSION['emp_dashboard_l_search_department']?></strong></td>
												<td id="appraisalDepDropDrowListArea">
													
												</td>

												<td><strong><?=$_SESSION['emp_dashboard_l_search_appraisal_period']?></strong></td>
												<td id="appraisalPeriodAea">
													
												</td>
												<td >
													<button style="display: none;" id="kpiDashboardSubmit" class="btn btn-primary btn-sm" ><?=$_SESSION['emp_dashboard_l_search_btn_search']?></button>
													<input type="button" value="<?=$_SESSION['emp_dashboard_l_search_btn_back']?>" class="btn default  btn-sm" name="dashboardBackBtn" id="dashboardBackBtn">
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

   
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Personal Information : ข้อมูลส่วนตัว</h4>
      </div>
      <div class="modal-body">
        			<div class="col-md-3">
        				<img width="180" src="../images/user.jpg" class="img-circle">
        			</div>
		    		<div class="col-md-9">
		    		
		    			
				  		<table class="table-striped" border="0" spacing="0" style="margin-top:5px;margin-left:20px">
				  			
	
				  			<tr>
				  				<td width="100"><b>ชื่อ</b></td>
				  				<td>นายโฆษิต</td>
				  				<td width="120"><b>นามสกุล</b></td>
				  				<td> อารมณ์สวะ</td>
				  			</tr>
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
				  				<td>28 ปี</td>
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
				<br style="clear: both">	 
      </div>
     
  </div>
</div>
<!-- modal end -->