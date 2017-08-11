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
     <h2> <strong>Department Setup</strong></h2>
   		เพื่อกำหนดมุมมองหรือกลุ่มของ KPI ที่ต้องการวัดผลการปฏิบัติงาน
    </div>
    
    <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
				<b>Department List</b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div id="departmentShowData"></div>
			 		
			  </div>
	</div>

<!-- 
<table>
	<thead>
		<tr>
			<th>Department ID</th>
			<th>Department Name</th>
			<th>Department Detail</th>
			<th>Manage</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			
			<td>0</td>
			<td>ด้านการเงิน</td>
			<td>การเงินรวมทั้งบริษัท</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			
			<td>1</td>
			<td>ด้านการขาย</td>
			<td>การเงินรวมทั้งบริษัท</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			
			<td>2</td>
			<td>ด้านการตลาด</td>
			<td>การวางแผน</td>
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
	Department Form
</p>
<br>
<form id="departmentForm">
<table>
	
	<tr>
		<td class="text-right"><b>Department Name <font color="red">*</font></b></td>
		<td><input type="text" name="departmentName" class="form-control input-sm" id="departmentName"></td>
	</tr>
	<tr>
		<td class="text-right" valign="top"><b>Department Detail</b></td>
		<td><textarea name="departmentDetail" class="form-control input-sm" id="departmentDetail"></textarea></td>
	</tr>
	
	<tr>
		<td ></td>
		<td >
			(<font color="red">*</font>)จำเป็นต้องกรอก<br>
			<input type="hidden" name="departmentAction" id ="departmentAction" class="departmentAction" value="add">
			<input type="hidden" name="departmentId" id ="departmentId"  class="departmentId" value="">
			<input type="submit" id="departmentSubmit" name="departmentSubmit"  class="btn btn-primary btn-sm" value="Add">
			<input type="reset" value="Reset" class="btn default  btn-sm" id="departmentReset">
		</td>
	</tr>
</table>
</form>
</div>