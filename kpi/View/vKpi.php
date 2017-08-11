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
     <h2> <strong>KPIs Setup</strong></h2>
   		เซ็ตข้อมูล KPI เพื่อนำไปวัดผลการปฏิบัติงานของพนักงาน
    </div>
    
    <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
				<b>KPIs List</b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div id="kpiShowData"></div>
			 		
			  </div>
	</div>
    

<!-- 
<table>
	<thead>
		<tr>
			<th>KPI Code</th>
			<th>KPI Name</th>
			<th>Objective</th>
			<th>Formula</th>
			<th>kpi Name</th>
			
			<th>Manage</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			
			<td>0</td>
			<td>ด้านการเงิน</td>
			<td>การเงินรวมทั้งบริษัท</td>
			<td>การเงินรวมทั้งบริษัท</td>
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
			<td>การเงินรวมทั้งบริษัท</td>
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
			<td>การเงินรวมทั้งบริษัท</td>
			<td>การเงินรวมทั้งบริษัท</td>
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
	KPIs FORM
</p>
<br>
<form id="kpiForm">
<table>
	<!-- 
	<tr>
		<td>KPI Code</td>
		<td><input type="text" id="kpiCode" name="kpiCode"></td>
	</tr>

 	<tr>
		<td>Department Name</td>
		<td id="depDropDrowListArea">
			<select>
				<option>ไม่ระบุ</option>
				<option>การเงิน</option>
				<option>การตลาด</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Division Name</td>
		<td id="divDropDrowListArea">
			<select>
				<option>ไม่ระบุ</option>
				<option>ฝ่าย ไอที</option>
				<option>ฝ่าย Support</option>
			</select>
		</td>
	</tr>
	 -->
	 <tr>
		<td class="text-right"><b>KPI Code <font color="red">*</font></b></td>
		<td><input type="text" id="kpiCode" name="kpiCode"  style='width:100px;'  class="form-control input-sm"></td>
	</tr>
	<tr>
		<td class="text-right"><b>KPI Name <font color="red">*</font></b></td>
		<td><input type="text" id="kpiName" name="kpiName"  style='width:300px;' class="form-control input-sm"></td>
	</tr>
	
	<tr>
		<td class="text-right"  valign="top"><b>KPI Detail</b></td>
		<td><textarea id="kpiDetail" rows="5" cols="25" name="kpiDetail" class="form-control input-sm"></textarea>
	</tr>
	<!-- 
	<tr>
		<td>Owner Weight </td>
		<td><input type="text" id="kpiOwnWeight" name="kpiOwnWeight"></td>
	</tr>
	<tr>
		<td>Perspective Weight </td>
		<td><input type="text" id="kpiPersWeight" name="kpiPersWeight"></td>
	</tr>
	 
	
	

	<tr>
		<td >Type Actaul Data</td>
		<td id="kpiTypeActualArea">
		<input type="radio" name="kpiTypeActual" id="actualManual" class="kpiTypeActual" value="0" checked>Manaul : <input type="radio" id="actualQuery" name="kpiTypeActual" class="kpiTypeActual" value="1"> Query 
		</td>
	
	</tr>
	<tr>
		<td>KPI Actual</td>
		<td id="areaKPIActual">
		 
			<input name="kpiActualManual" id="kpiActualManual">
			<textarea name="kpiActualQuery" id="kpiActualQuery"></textarea> 
		</td>
	</tr>
	<tr>
		<td>KPI Target</td>
		<td>
			<input type="text" name="kpiTarget" id="kpiTarget">
		</td>
	</tr>
	 -->
	<tr>
		<td>
		</td>
		<td >
		(<font color="red">*</font>)จำเป็นต้องกรอก<br>
			<input type="hidden" name="kpiAction" id ="kpiAction" class="kpiAction" value="add">
			<input type="hidden" name="kpiId" id ="kpiId"  class="kpiId" value="">
			<input type="submit" id="kpiSubmit" name="kpiSubmit" value="Add" class="btn btn-primary btn-sm">
			<input type="reset" value="Reset" class="btn default btn-sm" id="kpiReset">
		</td>
	</tr>
</table>
</form>
</div>