<h2>Result KPI</h2>


<br>

<form id="ResultKpiForm">
<table>
	<tr>
		<td>Year</td>
		<td>
			<select id="year">
				<option>2012</option>
				<option>2013</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Period</td>
		<td id="periodArea">
			<select>
				<option>การประเมินผลงานคร้งที่ 1 </option>
				<option>การประเมินผลงานคร้งที่ 2 </option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td>Position</td>
		<td id="positionArea">
			<select>
				<option>นนักงานขาย </option>
				<option>ฝ่ายการผลิต</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Employee</td>
		<td id="employeeArea">
			<select>
				<option>วิชัย เก่งกาจ1</option>
				<option>วิชัย เก่งกาจ2</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>
		Perspective
		</td>
		<td>
			<div id="perspectiveArea" style="float:left;">
			<select>
				<option>Per001 </option>
				<option>Per002</option>
			</select>
			</div>
			
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div style="float:left;">
				<input type="hidden" name="assignKpiAction" id ="assignKpiAction" class="assignKpiAction" value="add">
				<input type="hidden" name="assignKpiId" id ="assignKpiId"  class="assignKpiId" value="">
				<input type="submit" id="assignKpiSubmit" name="assignKpiSubmit" value="Add">
				<input type="reset" value="Reset" id="assignKpiReset">
				<input type="button" value="Search" id="assignKpiSearch">
			</div>
		</td>
	</tr>
	
	
	
</table>
</form>
<div id="assignKpiShowData"></div>

<table>
	<tr>
		<td>Year</td>
		<td>
			<select>
				<option>2012</option>
				<option>2011</option>
				<option>2010</option>
			</select>
			
		</td>
	</tr>
	<tr>
		<td>Period</td>
		<td>
			<select>
				<option>การประเมินผลงานคร้้งที่ 1</option>
				<option>การประเมินผลงานคร้้งที่ 2</option>
				<option>การประเมินผลงานคร้้งที่ 3</option>
				<option>การประเมินผลงานคร้้งที่ 4</option>
			</select>

		</td>
	</tr>
	<tr>
		<td>Position</td>
		<td>
			<select>
				<option>พนักงานขาย 1</option>
				<option>พนักงานขาย 2</option>
				<option>พนักงานขาย 3</option>
				<option>พนักงานขาย  4</option>
			</select>

		</td>
	</tr>
	<tr>
		<td>Employee</td>
		<td>
			<select>
				<option>วิชัย เก่ากาจ1</option>
				<option>วิชัย เก่ากาจ2</option>
				<option>วิชัย เก่ากาจ3</option>
				<option>วิชัย เก่ากาจ4</option>
			</select>

		</td>
		<td>
			<button>Search</button>
		</td>
	</tr>
	
</table>

Detail Perspective Here.

<table>
	<thead>
		<tr>
			<th>Employee Code</th>
			<th>Employee Name</th>
			<th>KPI Code</th>
			<th>KPI Name</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				001
			</td>
			<td>
				Full Name01
			</td>
			<td>
				KPI01
			</td>
			<td>
				KPINAME001
			</td>
		</tr>
		<tr>
			<td>
				002
			</td>
			<td>
				Full Name02
			</td>
			<td>
				KPI02
			</td>
			<td>
				KPINAME002
			</td>
		</tr>
	</tbody>
</table>

<br>
ไว้เอากราฟมาวางไว้ตรงนี้
<br>
<table>
	<tr>
		<td>
			Year
		</td>
		<td>
			<input type="text"  disable value="2012">
		</td>
	</tr>
	<tr>
		<td>
			Period
		</td>
		<td>
			<input type="text" disable value="การประเมินผลงานครั้งที่ 1">
		</td>
	</tr>
	<tr>
		<td>
			Employee Code
		</td>
		<td>
			<input type="text" disable value="50-024">
			<input type="text" disable value="นายวิชัย เก่งกาจ">
		</td>
	</tr>
	<tr>
		<td>
			KPI Code
		</td>
		<td>
			<input type="text" disable value="KPI001">
			
		</td>
	</tr>
	<tr>
		<td>
			KPI Name
		</td>
		<td>
			<input type="text" disable value="KPI NAME001">
			
		</td>
	</tr>
	<tr>
		<td>
			Target Data
		</td>
		<td>
			<input type="text" disable value="5,000,000">
			
		</td>
	</tr>
	<tr>
		<td>
			Target Score
		</td>
		<td>
			<input type="text" disable value="50">
		</td>
	</tr>
	<tr>
		<td>
			Actal Data
		</td>
		<td>
			<input type="text" disable value="4,500,000">
			
		</td>
	</tr>
	<tr>
		<td>
			Baseline Data
		</td>
		<td>
			<input type="text" disable value="80">
			
		</td>
	</tr>
	<tr>
		<td>
			Actual Score
		</td>
		<td>
			<input type="text" disable value="45">
		</td>
	</tr>
	
	<tr>
		<td>
			% Actual vs Target
		</td>
		<td>
			<input type="text" disable value="90.00%">
		</td>
	</tr>
	<tr>
		<td>
			Weight
		</td>
		<td>
			<input type="text" disable value="50">
		</td>
	</tr>
	<tr>
		<td>
			Weight Percentage
		</td>
		<td>
			<input type="text" disable value="45%">
		</td>
	</tr>
</table>










