<h2>Perspective Setup</h2>
<div id="perspectiveShowData"></div>
<!-- 
<table>
	<thead>
		<tr>
			<th>Perspective ID</th>
			<th>Perspective Name</th>
			<th>Perspective Detail</th>
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
<form id="perspectiveForm">
<table>
	
	<tr>
		<td>Perspective Name</td>
		<td><input type="text" name="perspectiveName" id="perspectiveName"></td>
	</tr>
	<tr>
		<td>Perspective Detail</td>
		<td><textarea name="perspectiveDetail" id="perspectiveDetail"></textarea></td>
	</tr>
	
	<tr>
		<td colspan="2">
			<input type="hidden" name="perspectiveAction" id ="perspectiveAction" class="perspectiveAction" value="add">
			<input type="hidden" name="perspectiveId" id ="perspectiveId"  class="perspectiveId" value="">
			<input type="submit" id="perspectiveSubmit" name="perspectiveSubmit" value="Add">
			<input type="reset" value="Reset" id="perspectiveReset">
		</td>
	</tr>
</table>
</form>