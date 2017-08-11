<? session_start();
 $_SESSION['admin_surname'];

 ?>
 <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
 <script>
 	$(document).ready(function(){
 		//alert("hello");
 	 	var delTableFn=function(table){
 	 	 	//alert("hello");
 	 	 	
	 	 		$.ajax({
	 	 	 		url:"../admin/Model/del_table.php",
	 	 	 		type:"post",
	 	 	 		dataType:"json",
	 	 	 		data:{"paramTable":table,"action":"del"},
	 	 	 		success:function(data){
	 					//alert(data[0]);
	 					if(data[0]=="success"){
							alert("ลบข้อมูลเรียบร้อย");
		 				}
	 	 	 	 	}
	 	 	 	});

 	 	 	}

		
 	 	//delTableFn("department");
 	 	/*
 	 	appraisalPeriod
		assignKPIs
		baseline
		department
		empStatus
		employee
		KPIs
		KPIsResult
		position
		role
		threshold
 	 	*/

 	 	$(".appraisalPeriod").click(function(){
 	 	 	
 	 	 	if(confirm("ยืนยันการลบข้อมูล!")){
 	 		delTableFn("appraisal_period");
 	 	 	}
 	 	 	
 	 	});

 	 	$(".assignKPIs").click(function(){
 	 		if(confirm("ยืนยันการลบข้อมูล!")){
 	 		delTableFn("assign_kpi");
 	 		}
	 	});

 	 	$(".baseline").click(function(){
 	 		if(confirm("ยืนยันการลบข้อมูล!")){
 	 		delTableFn("baseline");
 	 		}
	 	});

 	 	$(".department").click(function(){
 	 		if(confirm("ยืนยันการลบข้อมูล!")){
 	 		delTableFn("department");
 	 		}
	 	});

 	 	$(".empStatus").click(function(){
 	 		if(confirm("ยืนยันการลบข้อมูล!")){
 	 		delTableFn("emp_status");
 	 		}
	 	});

 	 	$(".employee").click(function(){
 	 		if(confirm("ยืนยันการลบข้อมูล!")){
 	 		delTableFn("employee");
 	 		}
	 	});

 	 	$(".KPIs").click(function(){
 	 		if(confirm("ยืนยันการลบข้อมูล!")){
 	 		delTableFn("kpi");
 	 		}
	 	});

 	 	$(".KPIsResult").click(function(){
 	 		if(confirm("ยืนยันการลบข้อมูล!")){
 	 		delTableFn("kpi_result");
 	 		}
	 	});

 	 	$(".position").click(function(){
 	 		if(confirm("ยืนยันการลบข้อมูล!")){
 	 		delTableFn("position_emp");
 	 		}
	 	});

 	 	$(".role").click(function(){
 	 		if(confirm("ยืนยันการลบข้อมูล!")){
 	 		delTableFn("role");
 	 		}
	 	});

 	 	$(".threshold").click(function(){
 	 		if(confirm("ยืนยันการลบข้อมูล!")){
 	 		delTableFn("threshold");
 	 		}
	 	});

 	 	$(".division").click(function(){
 	 		if(confirm("ยืนยันการลบข้อมูล!")){
 	 		delTableFn("division");
 	 		}
	 	});

 	 	
 		
 	 });
 </script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
#admin{
	width:300px;
}
#admin-line {
	width:100%;
	padding:5px 0px 5px 0px;
	border-bottom:#666666 dotted 1px;
}
#admin-line-frm {
	width:100%;
	padding:5px;
}
.frm-text {
	width:250px;
	border:1px solid #dedede;
	padding:2px 5px;
	background: #fff url(images/input.jpg) left top repeat-x;
}
#no {
	width:50px;
	padding-left:10px; 
	float:left;
}
#name {
	width:120px; 
	float:left;
}
#name a, #sname a {
	text-decoration:none;
	display:block;
	color:#666;
}
#name a:hover, #sname a:hover {
	/*text-decoration:underline;*/
}
#sname {
	width:120px; 
	float:left;
}
#status {
	width:120px; 
	float:left;
}
#action {
	width:120px; 
	float:left;
}
#action a {
	text-decoration:none;
	color:#1a4d80;
}
#action a:hover {
	text-decoration:underline;
}
#frm-admin {
	width:125px;
	float:left;
	color:#333;
}
#frm-admin2 {
	width:300px;
	float:left;
}
.add a {
	color:#ccc;
	text-decoration:none;
}
.add a:hover {
	color:#333;
	text-decoration:underline;
}
-->
</style>


<div id="admin">
	<div id="detail">
	
		<div id="admin-line" style="color:#666; background:#efefef; font-weight:bold; border:#dedede solid 1px;">
			<div id="no">ID</div>
			<div id="name" >Table</div>
			<div id="sname">Manage</div>
            
			<br style="clear:both"  />
		</div>
		<div id="admin-line">
			<div id="no">1</div>
			<div id="name">
				<a href="#" class="appraisalPeriod">
				Appraisal Period
				</a>
			</div>
			<div id="sname">
				<a href="#" class="appraisalPeriod">
				<img width="16" height="16" border="0" align="absbottom" src="images/logout.gif"> Clear
				</a>
			</div>
			
			<br style="clear:both">
		</div>
		<div id="admin-line">
			<div id="no">2</div>
				<div id="name">
					<a href="#" class="assignKPIs">
					Assign KPIs
					</a>
				</div>
				<div id="sname">
					<a href="#" class="assignKPIs">
					<img width="16" height="16" border="0" align="absbottom" src="images/logout.gif"> Clear
					</a>
				</div>
			
			<br style="clear:both">
		</div>
		
		<div id="admin-line">
			<div id="no">3</div>
				<div id="name">
					<a href="#" class="baseline">
					Baseline
					</a>
				</div>
				<div id="sname">
					<a href="#" class="baseline">
					<img width="16" height="16" border="0" align="absbottom" src="images/logout.gif"> Clear
					</a>
				</div>
			
			<br style="clear:both">
		</div>
		
		<div id="admin-line">
			<div id="no">4</div>
				<div id="name">
					<a href="#" class="department">
					Department
					</a>
				</div>
				<div id="sname">
					<a href="#" class="department">
					<img width="16" height="16" border="0" align="absbottom" src="images/logout.gif"> Clear
					</a>
				</div>
			
			<br style="clear:both">
		</div>
		
		<div id="admin-line">
			<div id="no">5</div>
				<div id="name">
					<a href="#" class="empStatus">
					Emp Status
					</a>
				</div>
				<div id="sname">
					<a href="#" class="empStatus">
					<img width="16" height="16" border="0" align="absbottom" src="images/logout.gif"> Clear
					</a>
				</div>
			
			<br style="clear:both">
		</div>
		
		<div id="admin-line">
			<div id="no">6</div>
				<div id="name">
					<a href="#" class="employee">
					Employee
					</a>
				</div>
				<div id="sname">
					<a href="#" class="employee">
					<img width="16" height="16" border="0" align="absbottom" src="images/logout.gif"> Clear
					</a>
				</div>
			
			<br style="clear:both">
		</div>
		
		<div id="admin-line">
			<div id="no">7</div>
				<div id="name">
					<a href="#" class="KPIs">
					KPIs
					</a>
				</div>
				<div id="sname">
					<a href="#" class="KPIs">
					<img width="16" height="16" border="0" align="absbottom" src="images/logout.gif"> Clear
					</a>
				</div>
			
			<br style="clear:both">
		</div>
		
		<div id="admin-line">
			<div id="no">8</div>
				<div id="name">
					<a href="#" class="KPIsResult">
					KPIs Result
					</a>
				</div>
				<div id="sname">
					<a href="#" class="KPIsResult">
					<img width="16" height="16" border="0" align="absbottom" src="images/logout.gif"> Clear
					</a>
				</div>
			
			<br style="clear:both">
		</div>
		
		<div id="admin-line">
			<div id="no">9</div>
				<div id="name">
					<a href="#" class="position">
					Position
					</a>
				</div>
				<div id="sname">
					<a href="#" class="position">
					<img width="16" height="16" border="0" align="absbottom" src="images/logout.gif"> Clear
					</a>
				</div>
			
			<br style="clear:both">
		</div>
		
		<div id="admin-line">
			<div id="no">10</div>
				<div id="name">
					<a href="#" class="role">
					Role
					</a>
				</div>
				<div id="sname">
					<a href="#" class="role">
					<img width="16" height="16" border="0" align="absbottom" src="images/logout.gif"> Clear
					</a>
				</div>
			
			<br style="clear:both">
		</div>
		
		<div id="admin-line">
			<div id="no">11</div>
				<div id="name">
					<a href="#" class="threshold">
					Threshold
					</a>
				</div>
				<div id="sname">
					<a href="#" class="threshold">
					<img width="16" height="16" border="0" align="absbottom" src="images/logout.gif"> Clear
					</a>
				</div>
			
			<br style="clear:both">
		</div>
		
		<!-- 
		<div id="admin-line">
			<div id="no">12</div>
				<div id="name">
					<a href="#" class="division">
					division
					</a>
				</div>
				<div id="sname">
					<a href="#" class="division">
					<img width="16" height="16" border="0" align="absbottom" src="images/logout.gif"> Clear
					</a>
				</div>
			
			<br style="clear:both">
		</div>
		 -->
		
	</div>
</div>
<br style="clear:both"  />
<br style="clear:both"  />

