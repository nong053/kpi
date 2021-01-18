$(document).ready(function(){
	
	var resetDataDepartment=function(){

		$("#departmentCode").val("");
		$("#departmentName").val("");
		$("#departmentDetail").val("");
		$("#departmentAction").val("add");
		$("#departmentId").val("");

		if($("#embed_language").val()=="th"){
			$("#departmentSubmit").val("เพิ่ม");
		}else{
			$("#departmentSubmit").val("Add");
		}


	}
	var showDataDepartment=function(){

		$.ajax({
			url:"../Model/mDepartment.php",
			type:"post",
			dataType:"html",
			data:{"action":"showData"},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				$("#departmentShowData").html(data);
				
				 $("#Tabledepartment").kendoGrid({
                     /*
					 height: 250,
                     sortable: true,
                     pageable: {
                         refresh: true,
                         pageSizes: true,
                         buttonCount: 5
                     },
                     */
                 });
				 setGridTable();
				 
				//alert(data);
				 
				 //action del,edit start
				 $(".actionEdit").click(function(){
					 //alert("hello");
					 //alert(this.id);
					 
					 var idEdit=this.id.split("-");
					 var id=idEdit[1];
					 $.ajax({
							url:"../Model/mDepartment.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							success:function(data){
								//alert(data[0]["department_id"]);
								$("input#departmentCode").val(data[0]["department_code"]);
								$("input#departmentName").val(data[0]["department_name"]);
								$("#departmentDetail").val(data[0]["department_detail"]);
								$("#departmentAction").val("editAction");
								$("#departmentId").val(data[0]["department_id"]);

								if($("#embed_language").val()=="th"){
									$("#departmentSubmit").val("แก้ไข");
								}else{
									$("#departmentSubmit").val("Edit");
								}
								
								$("#departmentModal").modal("show");
								
								
								
								
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
			
					 var idDel=this.id.split("-");
					 var id=idDel[1];
					 
					//Check kpi_assign and kpi_result it using employee.? Start
					 $.ajax({
							url:"../Model/mDepartment.php",
							type:"post",
							dataType:"json",
							data:{"departmentId":id,"action":"checkUsingKpiAssignAndKpiResult",},
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							success:function(data){
									
									if(data[0]==0){
										if(confirm("ต้องการลบข้อมูลนี้หรือไม่?")){	
											 $.ajax({
													url:"../Model/mDepartment.php",
													type:"post",
													dataType:"json",
													data:{"id":id,"action":"del"},
													headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
													success:function(data){
														if(data[0]=="success"){
															//alert("ลบข้อมูลเรียบร้อย");	
															showDataDepartment();
															
														}
													}
											 });
										}
									}else{
										alert("ไม่สามารถลยข้อมูลได้! เนื่องจากมีการใช้งานอยู่");
									}
							}
					 });
					 //Check kpi_assign and kpi_result it using employee.? End
					 
					
					 
				 });
				 //action del,edit end
				 
				 //PRESS RESET SRART
				 $("#departmentReset").click(function(){
					 resetDataDepartment();
				 });
				 //PRESS RESET END
			}
			
		});
	}
	
	showDataDepartment();
	
	var validateDepartmentFn=function(){


		var validate="";
		var departmentCode="";
		var departmentName="";

		if($("#embed_language").val()=="th"){

			 departmentCode="กรอกรหัสแผนกด้วยครับ";
			 departmentName="กรอกชื่อแผนกด้วยครับ";
			 

		}else{
			 departmentCode="Please Fill the Department Code.";
			 departmentName="Please Fill the Department Name.";
			 
			
		}

		if($("#departmentCode").val()==""){
	 		validate+=departmentCode+"\n";
	 	}
		if($("#departmentName").val()==""){
	 		validate+=departmentName+"\n";
	 	}
	 	
	 	
	 	return validate;
	}
	
	
	$("form#departmentForm").submit(function(){
		/*
		alert($("#departmentName").val());
		alert($("#departmentBegin").val());
		alert($("#departmentEnd").val());
		alert($("#departmentColor").val());
		*/
		if(validateDepartmentFn()!=""){
			alert(validateDepartmentFn());
		}else{

			$.ajax({
				url:"../Model/mDepartment.php",
				type:"post",
				dataType:"json",
				headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
				data:{"departmentName":$("#departmentName").val(),"departmentCode":$("#departmentCode").val(),"departmentDetail":$("#departmentDetail").val(),
					"action":$("#departmentAction").val(),"departmentId":$("#departmentId").val()
					},
				success:function(data){
					if(data[0]=="success"){
						//alert("บันทึกข้อมูลเรียบร้อย");	
						showDataDepartment();
						resetDataDepartment();	
						$("#departmentModal").modal("hide");
					}
					if(data[0]=="editSuccess"){
						//alert("แก้ไขข้อมูลเรียบร้อย");	
						showDataDepartment();
						resetDataDepartment();
						$("#departmentModal").modal("hide");
							
					}
					
				}
				
			});
		}
		
		return false;
	});


	//Add Department Start

	$("#btnAddDepartment").click(function(){
		resetDataDepartment();
		$("#departmentModal").modal("show");
	});

	//Add Department End
	
	
});