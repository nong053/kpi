<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

//echo "444545336346374567456745675465746457546";

if($_SESSION['language']=="th"){
	
	//description
	$_SESSION['assign_l_des_title']="มอบหมายตัวชี้วัด";
	$_SESSION['assign_l_des_detail']="เพื่อทำการมอบหมายตัวชี้วัดที่ต้องวัดผลการปฏิบัติงานให้กับพนักงาน ตรงนี้จะเป็นการ มอบหมายตัวชี้วัดค่าเริ่มต้นโดยมอบหมายในระดับตำแหน่งซึ่งก็คือพนักงานที่อยู่ภายใต้ตำแหน่งนั้นๆ";
	$_SESSION['assign_l_des_btn_add']="มอบหมายตัวชี้วัด";
	$_SESSION['assign_l_des_btn_confirm']="ยืนยันทั้งหมด";

	//Search
	$_SESSION['assign_l_search_year']="ปีประเมิน";
	$_SESSION['assign_l_search_appraisalPeriod']="ช่วงประเมิน";
	$_SESSION['assign_l_search_department']="แผนก";
	$_SESSION['assign_l_search_position']="ตำแหน่ง";
	$_SESSION['assign_l_search_fullname']="พนักงาน";
	$_SESSION['assign_l_search_btn_search']="ตกลง";

	//column
	$_SESSION['assign_l_tbl_id']="#";
	$_SESSION['assign_l_tbl_kpi_name']="ชื่อตัวชี้วัด";
	$_SESSION['assign_l_tbl_weight']="น้ำหนัก";
	$_SESSION['assign_l_tbl_target']="เป้าข้อมูลดิบ";
	$_SESSION['assign_l_tbl_target_score']="เป้าคะแนน";
	$_SESSION['assign_l_tbl_manage']="จัดการ";

	

	//form
	
	$_SESSION['assign_l_form_name']="มอบหมายตัวชี้วัด";
	$_SESSION['assign_l_form_kpi_name']="ตัวชี้วัด";
	$_SESSION['assign_l_form_weight']="น้ำหนัก";
	$_SESSION['assign_l_form_btn_add']="เพิ่ม";
	$_SESSION['assign_l_form_btn_reset']="เคลียร์";
	$_SESSION['assign_l_form_required']="จำเป็นต้องกรอก";

	

}else{
	

		//description
	$_SESSION['assign_l_des_title']="KPI Assignment ";
	$_SESSION['assign_l_des_detail']="To assign a measure to measure performance for employees. This will be Assign default metrics Assignment at the level of position, that is, employees under that position.";
	$_SESSION['assign_l_des_btn_add']="KPI Assignment ";
	$_SESSION['assign_l_des_btn_confirm']="All Confirm";

	//Search
	$_SESSION['assign_l_search_year']="Year";
	$_SESSION['assign_l_search_appraisalPeriod']="Appraisal Period";
	$_SESSION['assign_l_search_department']="Department";
	$_SESSION['assign_l_search_position']="Position";
	$_SESSION['assign_l_search_fullname']="Name";
	$_SESSION['assign_l_search_btn_search']="OK";

	//column
	$_SESSION['assign_l_tbl_id']="#";
	$_SESSION['assign_l_tbl_kpi_name']="KPI Name";
	$_SESSION['assign_l_tbl_weight']="Weight";
	$_SESSION['assign_l_tbl_target']="Data Target";
	$_SESSION['assign_l_tbl_target_score']="Target Score";
	$_SESSION['assign_l_tbl_manage']="Manage";

	

	//form
	
	$_SESSION['assign_l_form_name']="KPI Assignment Form";
	$_SESSION['assign_l_form_kpi_name']="KPI";
	$_SESSION['assign_l_form_weight']="KPI Weight";
	$_SESSION['assign_l_form_btn_add']="Add";
	$_SESSION['assign_l_form_btn_reset']="Clear";
	$_SESSION['assign_l_form_required']="Required";
}
?>
<style>
	.bg-from {
		background: #f5f5f5;
		border: #f5f5f5;
	}

	.bg-warning1 {
		background: #d9edf7;
		padding: 5px;
		margin: 5px;
		/*margin-bottom:10px;*/

		font-weight: bold;
		color: black;
	}

	.text-right {
		text-align: right;
		padding-right: 10px;
	}

	.alert {
		margin-bottom: 5px;

	}

	.panel {
		margin-bottom: 5px;
	}

	#baselineTable {
		padding: 2px;
		margin-bottom: 0px;
	}

	.table>thead>tr>th,
	.table>tbody>tr>th,
	.table>tfoot>tr>th,
	.table>thead>tr>td,
	.table>tbody>tr>td,
	.table>tfoot>tr>td {
		border-top: 1px solid #dddddd;
		line-height: 1.42857;
		padding: 2px;
		vertical-align: top;
	}

	.displayHideShow {
		display: none;

	}
</style>



<!-- Large modal start-->
<div class="modal fade " id='assignMasterKPIModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog" role="document">

		<div class="modal-content">
			<div class="modal-header alert-info">
				<button aria-label="Close" data-dismiss="modal" class="close" type="button">
					<span aria-hidden="true">×</span>
				</button>
				<h4 id="myLargeModalLabel" class="modal-title"> <?= $_SESSION['assign_l_form_name'] ?></h4>
			</div>
			<div class="modal-body">






				<!-- content start-->
				<form id="AssignKpiForm">
					<row>
						<div class='col-md-12'>
							<table style="width: 100%;">

								<tr>
									<td style="width: 150px;" class='text-right'><b><?= $_SESSION['assign_l_search_year'] ?></b></td>
									<td id="assignYearInformArea">

									</td>
								</tr>
								<tr>
									<td style="width: 150px;" class='text-right'><b><?= $_SESSION['assign_l_search_appraisalPeriod'] ?></b></td>
									<td id="assignAppraisalPeriodInformArea">

									</td>
								</tr>
								<tr>
									<td style="width: 130px;" class='text-right'><b><?= $_SESSION['assign_l_search_department'] ?></b></td>
									<td id="assignDepartmentInformArea">

									</td>
								</tr>
								<tr>
									<td style="width: 100px;" class='text-right'><b><?= $_SESSION['assign_l_search_position'] ?></b></td>
									<td id="assignPositionInformArea">

									</td>
								</tr>

								<tr>
									<td style="width: 130px;" class='text-right'><b><?= $_SESSION['assign_l_search_fullname'] ?></b></td>
									<td id="empAssignInformArea">

									</td>
								</tr>


								<tr>
									<td style="width: 150px;" class='text-right'><b><?= $_SESSION['assign_l_form_kpi_name'] ?></b></td>
									<td id="kpiDropDrowListArea">

									</td>
								</tr>

								<tr>
									<td class='text-right'><b><?= $_SESSION['assign_l_form_weight'] ?></td>
									<td>
										<input type="text" id="kpi_weight" name="kpi_weight" class="form-control " value="25.00" style="width:150px;">
									</td>
								</tr>
								<tr style="display: none;">
									<td class='text-right'><b>Target Data</b></td>
									<td>
										<input type="text" id="kpi_target_data" name="kpi_target_data" class="form-control " style="background: #ddd; width:150px;" disabled>
									</td>
								</tr>
								<tr style="display: none;">
									<td class='text-right'><b>Target Score</b></td>
									<td>
										<input type="text" id="target_score" name="target_score" class="form-control " style="background: #ddd; width:150px;" disabled>
									</td>
								</tr>
								<tr style="display: none;">
									<td class='text-right'><b>Type Actaul Data</b></td>
									<td id="kpiTypeActualArea">
										<input type="radio" checked="" value="0" class="kpi_type_actual" id="actual_manual" name="kpi_type_actual">Manaul : <input type="radio" value="1" class="kpi_type_actual" name="kpi_type_actual" id="actual_query"> Query
									</td>

								</tr>
								<tr class="hidden">
									<td class='text-right'><b> Actual Data</b></td>
									<td id="areaKPIActual">

										<input id="kpi_actual_manual" name="kpi_actual_manual" value="0.00" class="form-control " style="width:150px;">
										<textarea id="kpi_actual_query" name="kpi_actual_query" style="display: none;"></textarea>
									</td>
								</tr>

								<tr style="display: none;">
									<td class='text-right'><b>KPI Score</b></td>
									<td id="areaKPIActualScore">

										<input id="kpi_actual_score" name="kpi_actual_score" class="form-control " value="0.00" style="background: #ddd;width:150px;" disabled>

									</td>
								</tr>

								<tr style="display: none;">
									<td class='text-right'><b>Performance% </b></td>
									<td id="areTotalKpiScore">

										<input id="performance" name="performance" class="form-control " value="0.00" style="background: #ddd;width:150px;" disabled>


									</td>
								</tr>

								<tr style="display: none;">
									<td class='text-right'><b>Total Score</b></td>
									<td id="areTotalKpiScore">

										<input id="total_kpi_actual_score" name="total_kpi_actual_score" class="form-control " value="0.00" style="background: #ddd;width:150px;">


									</td>
								</tr>


								<tr>
									<td></td>
									<td>
										<div style="float:left;">
											<input type="hidden" name="assign_kpi_action" id="assign_kpi_action" value="add">
											<input type="hidden" name="assign_kpi_id" id="assign_kpi_id" value="">
											<input type="submit" id="assign_kpi_submit" name="assign_kpi_submit" value="<?= $_SESSION['assign_l_form_btn_add'] ?>" class="btn btn-primary ">
											<input type="button" value="<?= $_SESSION['assign_l_form_btn_reset'] ?>" id="assign_kpi_reset" class="btn btn-default ">

											<!--<input type="button" id="send_to_approve" name="send_to_approve" value="Send to Approve">
									 <input type="button" value="Search" id="assign_kpi_search"> -->
										</div>
									</td>
								</tr>



							</table>
						</div>
						<!--
						<div class='col-md-3' class="hidden">
							
							
								<div style="margin-top: 0px;" class="panel panel-default panel-bottom">
								  <div class="panel-heading">
									<b>Baseline List</b>			
								  </div>
								  <div class="panel-body panel-body-top">
								  
								 		<div id="baseLineArea" style="display: none;"></div>
								 		
										  </div>
								</div>
							
						</div>
						-->
						<br style="clear: both">
					</row>

				</form>

				<!-- content end-->

				<br style="clear: both">
			</div>
		</div>

	</div>
</div>
<!-- Large modal end-->


<div role="alert" class="alert alert-info">
	<h2> <strong><?= $_SESSION['assign_l_des_title'] ?></strong></h2>
	<?= $_SESSION['assign_l_des_detail'] ?>
</div>




<div role="alert" class="alert alert-info bg-from">

	<table>
		<tr>

			<td><b><?= $_SESSION['assign_l_search_year'] ?></b></td>
			<td class="assignKpiYearArea">
				<!-- 
			<select id="year">
				<option>2012</option>
				<option>2013</option>
				<option>2014</option>
				<option>2015</option>
			</select>
		 -->
			</td>

			<td><b class='pre-search-label'><?= $_SESSION['assign_l_search_appraisalPeriod'] ?></b></td>
			<td id="periodAssignArea">

			</td>

			<td>
				<b class='pre-search-label'><?= $_SESSION['assign_l_search_department'] ?></b>
			</td>
			<td>
				<div id="depDropDrowListArea" style="float:left;">

				</div>

			</td>
			<!-- 
		<td>
		Division
		</td>
		<td>
			<div id="divDropDrowListArea" style="float:left;">
			
			</div>
			
		</td>
	 	-->
			<td><b class='pre-search-label'><?= $_SESSION['assign_l_search_position'] ?></b></td>
			<td id="positionAssignArea">

			</td>

			<td><b class='pre-search-label'><?= $_SESSION['assign_l_search_fullname'] ?></b></td>
			<td id="empAssignArea">

			</td>


			<td>&nbsp;</td>
			<td style="display: none;">
				<input type="button" value="<?= $_SESSION['assign_l_search_btn_search'] ?>" id="assign_kpi_search" class="btn btn-primary btn-sm">
				<!-- 
			<button class="actionAssignMasterKPI btn btn-danger btn-xs" id="idAssignMasterKPI" type="button">Assign Master KPI</button>
			 -->
			</td>
			<!-- 
		<td>&nbsp;</td>
		<td>
			<input type="button" value="Assign KPIs" id="assign_kpi_all"  class="btn btn-danger btn-xs">
		</td>
		 -->
		</tr>
	</table>
</div>

<!-- 
	<div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
				<b>Employee List</b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div class="employeeData" id="employeeShowData" style="display:none;"></div>
			 		
			  </div>
	</div>
 -->

<!-- <div class="alert alert-info bg-from  displayHideShow" role="alert" >
		
			
		
	</div> -->

<div style="margin-top: 5px; " class="panel panel-default panel-bottom displayHideShow ">


	
		<div class="panel-heading">

			<div class="col-md-6">
				<div id="empNameArea" class="empNameArea"></div>
				<table>
					<tr class="summary_kpi">
						<td>

							<b><?= $_SESSION['assign_l_tbl_weight'] ?></b>
						</td>
						<td>
							<div id="kpi_weight_total"><strong></strong></div>
						</td>
						<td style='display: none;'>
							| KPI Percentage
						</td>
						<td>
							<div style='display: none;' id="score_sum_percentage"><strong></strong></div>

						</td>
						<td>
							<div id="confirm_kpi"></div>
						</td>

					</tr>
				</table>
			</div>

			<div class="col-md-6 text object-text-right">

				<button class="btn btn-primary " id="addAssignKPI" type="button"><i class="glyphicon  glyphicon-plus"></i>
					<?= $_SESSION['assign_l_des_btn_add'] ?>
				</button>
				<input type="button" id="kpi_process" name="kpi_process" value="<?= $_SESSION['assign_l_des_btn_confirm'] ?>" class="btn btn-warning ">

			</div>
			<br style="clear:both">
		</div>
		<div class="panel-body panel-body-top">

			<div id="assignKpiShowData" style="display:none;"></div>

		</div>
	

</div>




<div id="formKPI" style="display:none; ">




	<!--
<div class="alert alert-info bg-from displayHideShow" role="alert" style="padding-bottom: 10px;">
<p class="bg-warning1">

	Assign KPIs Form
</p>
<br>

	
	<br style='clear: both'>
</div>	
-->

</div>




<div class="assignData" style="display: none;" id="resultKpiShowData"></div>
<input type="hidden" name="paramYearInformEmb">