$(document).ready(function(){

	
	var resetDataPerspective=function(){
		$("#empUser").val("");
		$("#empConfirmPass").val("");
		$("#empFullName").val("");
		$("#empPosition").val("");
		$("#empAge").val("");
		$("#empTel").val("");
		$("#empEmail").val("");
		$("#empOther").val("");
		
		$("#empAction").val("add");
		$("#empSubmit").val("Add");
	}
	var showDataPerspective=function(){

		$.ajax({
			url:"../Model/mEmployee.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"html",
			data:{"action":"showData"},
			success:function(data){
				$("#employeeShowData").html(data);
				
				 $("#Tableemployee").kendoGrid({
                     height: 250,
                     sortable: true,
                     pageable: {
                         refresh: true,
                         pageSizes: true,
                         buttonCount: 5
                     },
                 });
				 setGridTable();
				 
				//alert(data);
				 
				 //action del,edit start
				 $(".actionEdit").click(function(){
					 
					// alert(this.id);
					 
					 var idEdit=this.id.split("-");
					 var id=idEdit[1];
					 $.ajax({
							url:"../Model/mEmployee.php",
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								//alert(data[0]["employee_id"]);
								///console.log(data);
								/*
								employee
								############ View ##############
								empPicture
								empUser
								empPass
								empConfirmPass
								empFullName
								empPosition
								empAge
								empTel
								empEmail
								empOther
								############ Database ##############
								emp_id
								emp_user
								emp_pass
								emp_picture
								emp_tel
								emp_age
								emp_name
								emp_email 
								position_id
								emp_other
								*/
								
								$("input#empUser").val(data[0]["emp_user"]);
								$("#empPass").val(data[0]["emp_pass"]);
								$("#empFullName").val(data[0]["emp_name"]);
								$("#empPosition").val(data[0]["position_id"]);
								$("#empAge").val(data[0]["emp_age"]);
								$("#empTel").val(data[0]["emp_tel"]);
								$("#empEmail").val(data[0]["emp_email"]);
								$("#empOther").val(data[0]["emp_other"]);
								$("#empId").val(data[0]["emp_id"]);
								
						
								$("#empSubmit").val("Edit");
								$("#empAction").val("editAction");
								
								
								
								
								
								
								
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
					 //alert("hello");
					 //alert(this.id);
					 
					 var idDel=this.id.split("-");
					 var id=idDel[1];
					 $.ajax({
							url:"../Model/mEmployee.php",
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"del"},
							success:function(data){
								if(data[0]=="success"){
									alert("ลบข้อมูลเรียบร้อย");	
									showDataPerspective();
									
								}
							}
					 });
					 
				 });
				 //action del,edit end
				 
				 //PRESS RESET SRART
				 $("#empReset").click(function(){
					 resetDataPerspective();
				 });
				 //PRESS RESET END
			}
			
		});
	}
	
	showDataPerspective();
	
	$("form#employeeForm").submit(function(){
		/*
		employee
		############ View ##############
		empPicture
		empUser
		empPass
		empConfirmPass
		empFullName
		empPosition
		empAge
		empTel
		empEmail
		empOther
		############ Database ##############
		emp_id
		emp_user
		emp_pass
		emp_picture
		emp_tel
		emp_age
		emp_name
		emp_email 
		position_id
		emp_other
		*/
		$.ajax({
			url:"../Model/mEmployee.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			data:{"empUser":$("#empUser").val(),"empPass":$("#empPass").val(),"empFullName":$("#empFullName").val(),
				"empPosition":$("#empPosition").val(),"empAge":$("#empAge").val(),"empTel":$("#empTel").val(),
				"empEmail":$("#empEmail").val(),"empOther":$("#empOther").val(),"empPicture":$("#empPicture").val()
				"action":$("#empAction").val(),"empId":$("#empId").val()
				},
			success:function(data){
				if(data[0]=="success"){
					alert("บันทึกข้อมูลเรียบร้อย");	
					showDataPerspective();
					resetDataPerspective();	
				}
				if(data[0]=="editSuccess"){
					alert("แก้ไขข้อมูลเรียบร้อย");	
					showDataPerspective();
					resetDataPerspective();
						
				}
				
			}
			
		});
		return false;
	});
	
	
});