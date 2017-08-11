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
 	.alert {
    border: 1px solid transparent;
    border-radius: 4px;
    margin-bottom: 5px;
    padding: 5px;
}
.panel {
   
    margin-bottom: 5px;
}
 	
 </style>

<div role="alert" class="alert alert-info">
     <h2> <strong>Approve KPI</strong></h2>
   		เพื่อให้ผู้บริหารหรือผู้จัดการสามารถปรับคะแนนผลการปฏิบัติการในแต่ละงวดให้พนักงานได้
    </div>

      	




<form id="AssignKpiForm">
<div class="alert alert-info bg-from" role="alert">
<table>
	<tr>
	
		<td>Year</td>
		<td id="approveKpiYearArea">
		<!-- 
			<select id="year">
				<option>2012</option>
				<option>2013</option>
				<option>2014</option>
				<option>2015</option>
			</select>
		 -->
		</td>
	
		<td>Appraisal Period </td>
		<td id="periodApproveArea">
			
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
	<!-- 
		<td>Employee</td>
		<td id="employeeArea">
			
		</td>
	-->
		<td>&nbsp;</td>
		<td>
			<input type="button" value="Search" id="approve_kpi_search"  class="btn btn-primary btn-sm">
		</td>
	</tr>
	</table>
	</div>
	
	 <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
				<b>Employee List</b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div class="employeeData" style="display:none;" id="employeeShowData"></div>
			 		
			  </div>
	</div>
	
	<div class="alert alert-info bg-from" role="alert">
		<p class="bg-warning1">
		Adjustment Form
		</p>	
		<br>
		<table class="formAdjust" style="display:none;" >
		<tr>
			<td class='text-right'>
				<b>Perfomance%</b>
			</td>
			<td>
				<input type="text" id="adjust_percentage" name="adjust_percentage"   class="form-control input-sm" >
			</td>
		</tr>
		<tr>
			<td class='text-right' valign="top">
				<b>Reason</b>
			</td>
			<td>
				<textarea id="adjust_reason" name="adjust_reason"   class="form-control input-sm" ></textarea>
			</td>
			
		</tr>
		<tr>
			<td>
			
			</td>
			<td>
			<input type="button" id="btnSubmit" name="btnSubmit" value="OK"  class="btn btn-primary btn-sm">
			<input type="reset" id="btnReset" name="btnReset" value="Reset"  class="btn btn-default btn-sm">
			</td>
		</tr>
	</table>
</div>


	
</form>



 
      	
      	
      