<style>
 	.bg-from{
 	background:#f5f5f5;
 	border: #f5f5f5;
 	}
 	.bg-warning1{
 	background:#d9edf7;
 	padding:5px;
 	margin:5px;
 	/*margin-bottom:10px;*/
 	
 	font-weight:bold;
 	color:black;
 	}
 	.text-right{
 	text-align:right;
 	padding-right: 10px;
 	}
 	.alert{
 	 margin-bottom: 5px;
     padding: 5px;
 	}
 	.panel{
 	margin-bottom: 5px;
 	}
 	#baselineTable{
 	 padding: 2px;
 	 margin-bottom: 0px;
 	}
 	.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    border-top: 1px solid #dddddd;
    line-height: 1.42857;
    padding: 2px;
    vertical-align: top;
}
 </style>
 
<div role="alert" class="alert alert-info">
     <h2> <strong>Assign KPI</strong></h2>
   		เพื่อทำการมอบหมาย KPI ที่ต้องวัดผลการปฏิบัติงานให้กับพนักงาน ตรงนี้จะเป็นการ Assign KPI ค่าเริ่มต้นโดย Assign KPI เข้าไปในระดับตำแหน่ง ซึ่งก็คือพนักงานที่อยู่ภายใต้ตำแหน่งนั้นๆจะถูก Assign KPI เป็นค่าเริ่มต้นทันที
    </div>



<form id="AssignKpiForm">
<div role="alert" class="alert alert-info bg-from">
	
<table>
	<tr>
	
		<td>Year</td>
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
	
		<td>Appraisal Period</td>
		<td id="periodAssignArea">
			
		</td>
	
		<td>
		Department
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
		<td>Position</td>
		<td id="positionArea">
			
		</td>
	
		<td>&nbsp;</td>
		<td>
			<input type="button" value="Search" id="assign_kpi_search"  class="btn btn-primary btn-sm">
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
	
	<div class="alert alert-info bg-from" role="alert">
		
			<div id="empNameArea" class="empNameArea"></div>
			<table>
			<tr class="summary_kpi">
				<td >
				 	KPI Weight
				</td>
				<td>
					<div id="kpi_weight_total"><strong></strong></div> 
				</td>
				<td>
				 	| KPI Percentage 
				</td>
				<td>
				<div id="score_sum_percentage"><strong></strong></div>
				
				</td>
				<td>
				<div id="confirm_kpi"></div>
				</td>
				
			</tr>
		</table>
		
	</div>
	
	<div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
				<b>Assign List</b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div id="assignKpiShowData" style="display:none;"></div>
			 		
			  </div>
	</div>
	

	
	
	<div id="formKPI" style="display:none;">
	
	
	
	

<div class="alert alert-info bg-from" role="alert">
<p class="bg-warning1">

	Assign KPIs Form
</p>
<br>
	
	<row>
		<div class='col-md-6'>
			<table>
		
		<tr>
			<td class='text-right'><b>KPI Name</b></td>
			<td id="kpiDropDrowListArea">
				
			</td>
		</tr>
		
		<tr>
			<td class='text-right'><b>KPI Weight</td>
			<td >
				<input type="text" id="kpi_weight" name="kpi_weight"  class="form-control input-sm" value="25.00"  style="width:150px;" >
			</td>
		</tr>
		<tr>
			<td class='text-right'><b>Target Data</b></td>
			<td >
				<input type="text" id="kpi_target_data" name="kpi_target_data"  class="form-control input-sm" style="background: #ddd; width:150px;"  disabled>
			</td>
		</tr>
		<tr>
			<td class='text-right'><b>Target Score</b></td>
			<td >
				<input type="text" id="target_score" name="target_score"  class="form-control input-sm" style="background: #ddd; width:150px;" disabled>
			</td>
		</tr>
		<tr>
			<td class='text-right'><b>Type Actaul Data</b></td>
			<td id="kpiTypeActualArea">
			<input type="radio" checked="" value="0" class="kpi_type_actual" id="actual_manual" name="kpi_type_actual">Manaul : <input type="radio" value="1" class="kpi_type_actual" name="kpi_type_actual" id="actual_query"> Query 
			</td>
		
		</tr>
		<tr>
			<td class='text-right'><b> Actual Data</b></td>
			<td id="areaKPIActual">
			 
				<input id="kpi_actual_manual" name="kpi_actual_manual" value="0.00"  class="form-control input-sm" style="width:150px;">
				<textarea id="kpi_actual_query" name="kpi_actual_query" style="display: none;"></textarea> 
			</td>
		</tr>
		
		<tr>
			<td class='text-right'><b>KPI Score</b></td>
			<td id="areaKPIActualScore">
			 
				<input id="kpi_actual_score" name="kpi_actual_score"  class="form-control input-sm" value="0.00" style="background: #ddd;width:150px;" disabled>
				
			</td>
		</tr>
			
		<tr>
			<td class='text-right'><b>Performance% </b></td>
			<td id="areTotalKpiScore">
			
				<input id="performance" name="performance"  class="form-control input-sm" value="0.00" style="background: #ddd;width:150px;" disabled>
				
				
			</td>
		</tr>
		
		<tr style="display: none;">
			<td class='text-right'><b>Total  Score</b></td>
			<td id="areTotalKpiScore">
			
				<input id="total_kpi_actual_score" name="total_kpi_actual_score"  class="form-control input-sm" value="0.00" style="background: #ddd;width:150px;">
				
				
			</td>
		</tr>
		 
		
		<tr>
			<td ></td>
			<td >
				<div style="float:left;">
					<input type="hidden" name="assign_kpi_action" id ="assign_kpi_action"  value="add">
					<input type="hidden" name="assign_kpi_id" id ="assign_kpi_id"  value="">
					<input type="submit" id="assign_kpi_submit" name="assign_kpi_submit" value="Add" class="btn btn-primary btn-sm">
					<input type="button" value="Reset" id="assign_kpi_reset" class="btn btn-default btn-sm">
					<input type="button" id="kpi_process" name="kpi_process" value="Finish" class="btn btn-primary btn-sm">
					<!--<input type="button" id="send_to_approve" name="send_to_approve" value="Send to Approve">
					 <input type="button" value="Search" id="assign_kpi_search"> -->
				</div>
			</td>
		</tr>
		
		
		
	</table>
		</div>
		<div class='col-md-3'>
			<!-- <p class="bg-warning1"><B>Baseline</B></p> -->
			
				<div style="margin-top: 30px;" class="panel panel-default panel-bottom">
				  <div class="panel-heading">
					<b>Baseline List</b>			
				  </div>
				  <div class="panel-body panel-body-top">
				  
				 		<div id="baseLineArea" style="display: none;"></div>
				 		
						  </div>
				</div>
			
		</div>
	</row>
	
	<br style='clear: both'>
</div>	
	
	
</div>
</form>



<div class="assignData" style="display: none;" id="resultKpiShowData"></div>

      	
      	
