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
 	.alert{
 	 margin-bottom: 5px;
     padding: 5px;
 	}
 	.panel{
 	margin-bottom: 5px;
 	}
 	.alert > p, .alert > ul {
    margin-bottom: 5px;
	}
 </style>
 
<div role="alert" class="alert alert-info">
     <h2> <strong>Employee Setup</strong></h2>
   		เพิ่ม,ลบ,แก้ไขข้อมูลพนักงาน
    </div>

<form action="../Model/mEmployee.php" method="post" enctype="multipart/form-data" id="MyUploadForm">
<div class="alert alert-info bg-from" role="alert">

<table>
	<tr>
		<td><b>Department</b></td>
		<td id="depSearchDropDrowListArea">
			<!--  
			<select name="empDepartment" id="empDepartment">
				<option>Position1</option>
				<option>Position2</option>
				<option>Position3</option>
			</select>
			-->
		</td>
			<!-- 
			<td>Division</td>
			<td id="divSearchDropDrowListArea">
			</td>
			 -->
		<td><b>Position</b></td>
		<td id="empSearchPositionArea">
			<!--  
			<select name="empDepartment" id="empDepartment">
				<option>Position1</option>
				<option>Position2</option>
				<option>Position3</option>
			</select>
			-->
		</td>
		<td><b>Status Work</b></td>
		<td id="empSearchStatusWorkArea">
			<!--  
			<select name="empDepartment" id="empDepartment">
				<option>Position1</option>
				<option>Position2</option>
				<option>Position3</option>
			</select>
			-->
		</td>
		<td>
			<button type="button" id="customerSearch"  class="btn btn-primary btn-sm"> Search </button>
		</td>
	</tr>
</table>



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
	Employee Form
</p>
<br>

<row>
	<div class="col-md-4">
	
		<table class="employeeData" style="display:none;" >
			<tr>
				<td class='text-right'><b>Picture</b></td>
				<td>
					<input   name="image_file" id="imageInput" type="file" />
					 <div style="display: none;" id="output"></div>  
				</td>
			</tr>
			<tr>
				<td class='text-right'><b>Emp Code<font color="red">*</font></b></td>
				<td>
					<input type="text" class="form-control input-sm" name="empCode" id="empCode">
				</td>
			</tr>
			
			<tr>
				<td class='text-right'><b>User<font color="red">*</font></b></td>
				<td>
					<input type="text" class="form-control input-sm" name="empUser" id="empUser">
				</td>
			</tr>
			<tr>
				<td class='text-right'><b>Password<font color="red">*</font></b></td>
				<td>
					<input type="password" class="form-control input-sm" name="empPass" id="empPass">
				</td>
			</tr>
			<tr>
				<td class='text-right'><b>Confrim Password<font color="red">*</font></b></td>
				<td>
					<input type="password" class="form-control input-sm" name="empConfirmPass" id="empConfirmPass">
				</td>
			</tr>
			
			<tr>
				<td class='text-right'><b><b>First Name<font color="red">*</font></b></td>
				<td>
					<input type="text" class="form-control input-sm" name="empFirstName" id="empFirstName">
				</td>
			</tr>
			<tr>
				<td class='text-right'><b><b>Last Name<font color="red">*</font></b></td>
				<td>
					<input type="text" class="form-control input-sm" name="empLastName" id="empLastName">
				</td>
			</tr>
			
			
			 
			<tr>
				<td class='text-right'><b>Department</b></td>
				<td id="depDropDrowListArea">
				 
					<select name="empDepartment" id="empDepartment" class="form-control input-sm">
						<option>Position1</option>
						<option>Position2</option>
						<option>Position3</option>
					</select>
				
				</td>
			</tr>
			
			<!-- 
			<tr>
				<td>Division</td>
				<td id="divDropDrowListArea">
				
					<select name="empDivision" id="empDivision">
						<option>Position1</option>
						<option>Position2</option>
						<option>Position3</option>
					</select>
					
				</td>
			</tr>
			 -->
			 
			<tr>
				<td class='text-right'><b>Position</b></td>
				<td id="empPositionArea">
				
					<select name="empPosition" id="empPosition" class="form-control input-sm">
						<option>Position1</option>
						<option>Position2</option>
						<option>Position3</option>
					</select>
					
				</td>
			</tr>
			<tr>
				<td class='text-right'><b>Status(Working)</b></td>
				<td id="empStatusWorkArea">
				
					
					
				</td>
			</tr>
			
			<tr>
				<td class='text-right'><b>Age</b></td>
				<td><input type="text" name="empAge" id="empAge" class="form-control input-sm"></td>
			</tr>
			<tr>
				<td class='text-right'><b>Mobile<font color="red">*</font></b></td>
				<td><input type="text" name="empMobile" id="empMobile" class="form-control input-sm"></td>
			</tr>
			<tr>
				<td class='text-right'><b>Tel<font color="red">*</font></b></td>
				<td><input type="text" name="empTel" id="empTel" class="form-control input-sm"></td>
			</tr>
			<tr>
				<td class='text-right'><b>Email<font color="red">*</font></b></td>
				<td><input type="text" name="empEmail" id="empEmail" class="form-control input-sm"> </td>
			</tr>
			
			
			
		</table>
	</div>
	<div class="col-md-4">
	
		<table class="employeeData" style="display:none;" >
			
			<tr>
				<td class='text-right'><b>BrithDay</b></td>
				<td>
					<input type="text" name="empBrithDay" id="empBrithDay" class="form-control input-sm">
				</td>
			</tr>
			<tr>
				<td class='text-right'><b>Age working</b></td>
				<td>
					<input type="text" name="empAgeWorking" id="empAgeWorking" class="form-control input-sm">
				</td>
			</tr>
			<tr>
				<td class='text-right'><b>Status</b></td>
				<td id="empStatusArea">
				
					Single <input type="radio" class="empStatus " name="empStatus" value="single" checked> 
					Married <input type="radio" class="empStatus " name="empStatus"  value="married">
				</td>
			</tr>
			
		
			
			<tr>
				<td class='text-right'><b>Adress No</b></td>
				<td>
				 	<textarea id="empAddress" name="empAddress" class="form-control input-sm"></textarea>
				</td>
			</tr>
			<tr>
				<td class='text-right'><b>Distict</b></td>
				<td><input type="text" name="empDistict" id="empDistict" class="form-control input-sm"></td>
			</tr>
			<tr>
				<td class='text-right'><b>Sub Distict</b></td>
				<td><input type="text" name="empSubDistict" id="empSubDistict" class="form-control input-sm"></td>
			</tr>
			
			<tr>
				<td class='text-right'><b>Province</b></td>
				<td><input type="text" name="empProvince" id="empProvince" class="form-control input-sm"> </td>
			</tr>
			<tr>
				<td class='text-right'><b>Postcode</b></td>
				<td><input type="text" name="empPostcode" id="empPostcode" class="form-control input-sm"></td>
			</tr>
			<tr>
				<td class='text-right'><b>Other</b></td>
				<td><textarea name="empOther" id="empOther" class="form-control input-sm"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="">(<font color="red">*</font>)จำเป็นต้องกรอก</td>
			</tr>
			
			<tr>
				<td></td>
				<td colspan="">
					<input type="hidden" name="empAction" id ="empAction" class="empAction" value="add">
					<input type="hidden" name="empId" id ="empId"  class="empId" value="">
					<input type="submit" id="empSubmit" name="empSubmit" class="btn btn-primary btn-sm"  value="Add">
					<input type="reset" value="Reset" id="empReset" class="btn default  btn-sm" >
				</td>
			</tr>
		</table>
		<br>
	</div>
</row>
<br style='clear: both'>
</div>


</form>


