	
	<link href="../Css/appraisalPeriod.css" rel="stylesheet">
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
 	
 	
 </style>
	<div role="alert" class="alert alert-info">
     <h2> <strong>AppraisalPeriod Setup</strong></h2>
   		 เพื่อกำหนดงวดการประเมินผลการปฏิบัติงานว่าใน 1 ปีจะประเมินผลกี่ครั้ง และแต่ละครั้งจะเริ่มและสิ้นสุดที่วันใด
    </div>

    
   <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
				<b>AppraisalPeriod List</b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div id="appraisalPeriodShowData"></div>
			 		
			  </div>
	</div>

<!-- 
<table>
	<thead>
		<tr>
			<th>Year</th>
			<th>Period No</th>
			<th>Description</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Manage</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>2012</td>
			<td>1</td>
			<td>26/11/2012</td>
			<td>25/03/2013</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			<td>2012</td>
			<td>1</td>
			<td>26/11/2012</td>
			<td>25/03/2013</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			<td>2012</td>
			<td>1</td>
			<td>26/11/2012</td>
			<td>25/03/2013</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
	</tbody>
</table>
 -->
<div class="alert alert-info bg-from" role="alert">
<p class="bg-warning1">
	  Appraial Period Form
</p>
<br>

<form id="appraisalPeriodForm">
<table>
	<tr>
		<td class='text-right'><b>Year</b></td>
		<td class="appraisalYearArea">
			<!-- 
			<select name="appraisalPeriodYear" id="appraisalPeriodYear">
				<option>2012</option>
				<option>2013</option>
			</select>
			 -->
		</td>
	</tr>
	
	<tr>
		<td class='text-right'><b>Description <font color="red">*</font></b></td>
		<td><input type="text" name="appraisalPeriodDesc" id="appraisalPeriodDesc" class="form-control input-sm" style="width:250px;"></td>
	</tr>
	<tr>
		<td class='text-right'><b>Start Date <font color="red">*</font></b></td>
		<td><input type="text" name="appraisalPeriodStart" id="appraisalPeriodStart" class="form-control input-sm" style="width:100px;"></td>
	</tr>
	<tr>
		<td class='text-right'><b>End Date <font color="red">*</font></b></td>
		<td><input type="text" name="appraisalPeriodEnd" id="appraisalPeriodEnd" class="form-control input-sm" style="width:100px;"></td>
	</tr>
	<tr>
		<td class='text-right'><b>Target Percentage <font color="red">*</font></b></td>
		<td><input type="text" name="appraisal_period_target_percentage" id="appraisal_period_target_percentage" class="form-control input-sm" style="width:100px;"></td>
	</tr>
	<tr>
		<td >
		</td>
		<td>
		(<font color="red">*</font>)จำเป็นต้องกรอก<br>
			<input type="hidden" name="appraisalPeriodAction" id ="appraisalPeriodAction" class="appraisalPeriodAction" value="add">
			<input type="hidden" name="appraisalPeriodId" id ="appraisalPeriodId"  class="appraisalPeriodId" value="">
			<input type="submit" id="appraisalPeriodSubmit" name="appraisalPeriodSubmit" class="btn btn-primary btn-sm" value="Add">
			<input type="reset" value="Reset" class="btn default  btn-sm" id="appraisalPeriodReset">
		</td>
	</tr>
</table>
</form>
</div>