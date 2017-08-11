<h2>Add Employee Setup</h2>
<div id="employeeShowData"></div>
<!-- 
<table>
	<thead>
		<tr>
			<th>Employee Picture</th>
			<th>Employee ID</th>
			<th>Employee Name</th>
			<th>Employee Position</th>
			<th>Employee Age</th>
			<th>Employee Tel</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Picture</td>
			<td>001</td>
			<td>Kosit Aromsava</td>
			<td>Programmer</td>
			<td>28</td>
			<td>009926565</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			<td>Picture</td>
			<td>001</td>
			<td>Kosit Aromsava</td>
			<td>Programmer</td>
			<td>28</td>
			<td>009926565</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
		<tr>
			<td>Picture</td>
			<td>001</td>
			<td>Kosit Aromsava</td>
			<td>Programmer</td>
			<td>28</td>
			<td>009926565</td>
			<td>
				<button>Edit</button>
				<button>Delete</button>
			</td>
		</tr>
	</tbody>
	
</table>
 -->
<br>

<form id="employeeForm" enctype="multipart/form-data">
<table>
	<tr>
		<td>Picture</td>
		<td>
			<input type="file" name="empPicture" id="empPicture">
		</td>
	</tr>
	<tr>
		<td>User</td>
		<td>
			<input type="text" name="empUser" id="empUser">
		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>
			<input type="text" name="empPass" id="empPass">
		</td>
	</tr>
	<tr>
		<td>Confrim Password</td>
		<td>
			<input type="text" name="empConfirmPass" id="empConfirmPass">
		</td>
	</tr>
	
	<tr>
		<td>Full Name</td>
		<td>
			<input type="text" name="empFullName" id="empFullName">
		</td>
	</tr>
	<tr>
		<td>Position</td>
		<td>
			<select name="empPosition" id="empPosition">
				<option>Position1</option>
				<option>Position2</option>
				<option>Position3</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Age</td>
		<td><input type="text" name="empAge" id="empAge"></td>
	</tr>
	<tr>
		<td>Tel</td>
		<td><input type="text" name="empTel" id="empTel"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="empEmail" id="empEmail"></td>
	</tr>
	<tr>
		<td>Other</td>
		<td><textarea name="empOther" id="empOther"></textarea></td>
	</tr>
	
	<tr>
		<td colspan="2">
			<input type="hidden" name="empAction" id ="empAction" class="empAction" value="add">
			<input type="hidden" name="empId" id ="empId"  class="empId" value="">
			<input type="submit" id="empSubmit" name="empSubmit" value="Add">
			<input type="reset" value="Reset" id="empReset">
		</td>
	</tr>
</table>
</form>