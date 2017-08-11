<h2>Division Setup</h2>
<div id="divisionShowData"></div>
<!-- 
<table>
	<thead>
		<tr>
			<th>Division ID</th>
			<th>Division Name</th>
			<th>Division Detail</th>
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
<br>
<form id="divisionForm">
<table>
	<tr>
		<td>Department Name</td>
		<td id="depDropDrowListArea">
			<select id="department" >
				<option>dep1</option>
				<option>dep2</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Division Name</td>
		<td><input type="text" name="divisionName" id="divisionName"></td>
	</tr>
	<tr>
		<td>Division Detail</td>
		<td><textarea name="divisionDetail" id="divisionDetail"></textarea></td>
	</tr>
	
	<tr>
		<td colspan="2">
			<input type="hidden" name="divisionAction" id ="divisionAction" class="divisionAction" value="add">
			<input type="hidden" name="divisionId" id ="divisionId"  class="divisionId" value="">
			<input type="submit" id="divisionSubmit" name="divisionSubmit" value="Add">
			<input type="reset" value="Reset" id="divisionReset">
		</td>
	</tr>
</table>
</form>