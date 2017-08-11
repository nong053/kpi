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
<?php 
$kpiName=$_GET['kpiName'];
?>
<div role="alert" class="alert alert-info">
     <h2> <strong>KPI Baseline Setup</strong></h2>
   		เนื่องจากข้อมูลผลการปฏิบัติงานที่วัดมีหลายรูปแบบ เช่น เปอร์เซ็นต์, จำนวนครั้ง, จำนวนคน เป็นต้น จึงจำเป็นต้องมีการแปลงข้อมูลดังกล่าวให้อยู่ในรูปแบบเดียวกันโดยให้เป็นคะแนน การเซ็ตข้อมูลเพื่อแปลงข้อมูลดังกล่าว เรียกว่า KPI Baseline
    </div>
    <h2>KPI : <?=$kpiName?></h2>
    
    <div style="margin-top: 5px;" class="panel panel-default panel-bottom">
			  <div class="panel-heading">
				<b>Baseline List</b>			
			  </div>
			  <div class="panel-body panel-body-top">
			  
			 		<div id="kpiBaselineShowData"></div>
			 		
			  </div>
	</div>
    

<!-- 
<table>
	<thead>
		<tr>
			<th>Baseline ID</th>
			<th>Begin Baseline</th>
			<th>End Baseline</th>
			<th>Target Score</th>
			<th>Manage</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			
			<td>1</td>
			<td>20</td>
			<td>40</td>
			<td>50</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			
			<td>1</td>
			<td>41</td>
			<td>50</td>
			<td>55</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			
			<td>1</td>
			<td>61</td>
			<td>70</td>
			<td>60</td>
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

	Baseline FORM
</p>
<br>

<form id="baselineForm">
<table>
	
	<tr>
		<td class='text-right'><b>Begin Baseline <font color="red">*</font></b></td>
		<td><input type="text" id="baselineBegin" name="baselineBegin"  class="form-control input-sm" style="width:100px;" ></td>
	</tr>
	<tr>
		<td class='text-right'><b>End Baseline <font color="red">*</font></b></td>
		<td><input type="text" id="baselineEnd" name="baselineEnd"  class="form-control input-sm" style="width:100px;"></td>
	</tr>
	<tr>
		<td class='text-right'><b>Score <font color="red">*</font></b></td>
		<td><input type="text" id="baselinetargetScore" name="baselinetargetScore"  class="form-control input-sm" style="width:100px;"></td>
	</tr>
	<tr>
		<td class='text-right' valign="top"><b>Suggestion</b></td>
		<td>
			<textarea rows="3" cols="50" name="suggestion" id="suggestion"  class="form-control input-sm" ></textarea>
		</td>
	</tr>
	
	<tr>
		<td>
		</td>
		<td>
			(<font color="red">*</font>)จำเป็นต้องกรอก<br>
			<input type="hidden" name="baselineAction" id ="baselineAction" class="baselineAction" value="add">
			<input type="hidden" name="baselineId" id ="baselineId"  class="baselineId" value="">
			<input type="submit" id="baselineSubmit" name="baselineSubmit" class="btn btn-primary btn-sm" value="Add">
			<input type="reset" value="Reset" id="baselineReset" class="btn default  btn-sm">
			<input type="button" id="kpiButton" name="kpiButton" class="btn default  btn-sm" value="back">
		</td>
	</tr>
</table>
</form>
</div>