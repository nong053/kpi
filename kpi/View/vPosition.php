
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
     <h2> <strong>Position Setup</strong></h2>
   		เพื่อกำหนดว่าพนักงานคนใดเป็นระดับ ผู้จัดการ เพื่อใช้เป็นข้อมูลในกำหนดสิทธิ์ในการปรับผลการปฏิบัติงาน (Appriasal Adjustment) 
    </div>
    
    <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
				<b>Position List</b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div id="positionShowData"></div>
			 		
			  </div>
	</div>

<!-- 
<table>
	<thead>
		<tr>

			<th>Position ID</th>
			<th>Position Name</th>

	
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>001</td>
			<td>Position Name01</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			<td>002</td>
			<td>Position Name02</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			<td>003</td>
			<td>Position Name03</td>
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
	Position Form
</p>
<br>
<form id="positionForm">
<table>

	
	
	<tr>
		<td class="text-right"><b>Position Name<font color="red">*</font></b></td>
		<td>
			<input type="text" id="positionName" name="positionName" class="form-control input-sm">
		</td>
	</tr>
	<tr>
		<td class='text-right'><b>Role</b></td>
		<td id="roleDropDrowListArea">

		</td>
	</tr>
	
	
	<tr>
		<td></td>
		<td>
		(<font color="red">*</font>)จำเป็นต้องกรอก<br>
			<input type="hidden" name="positionAction" id ="positionAction" class="positionAction" value="add">
			<input type="hidden" name="positionId" id ="positionId"  class="positionId" value="">
			<input type="submit" id="positionSubmit" name="positionSubmit" class="btn btn-primary btn-sm" value="Add">
			<input type="reset" value="Reset" id="positionReset" class="btn default  btn-sm">
		</td>
	</tr>
</table>
</form>
</div>