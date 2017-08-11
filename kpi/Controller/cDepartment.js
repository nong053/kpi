$(document).ready(function(){
	
	var resetDataDepartment=function(){
		$("#departmentName").val("");
		$("#departmentDetail").val("");
		$("#departmentAction").val("add");
		$("#departmentId").val("");
		$("#departmentSubmit").val("Add");
	}
	var showDataDepartment=function(){

		$.ajax({
			url:"../Model/mDepartment.php",
			type:"post",
			dataType:"html",
			data:{"action":"showData"},
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
							success:function(data){
								//alert(data[0]["department_id"]);
								
								$("input#departmentName").val(data[0]["department_name"]);
								$("#departmentDetail").val(data[0]["department_detail"]);
								$("#departmentAction").val("editAction");
								$("#departmentId").val(data[0]["department_id"]);
								$("#departmentSubmit").val("Edit");
								
								
								
								
								
								
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
					 //alert("hello");
					 //alert(this.id);
					 
					 var idDel=this.id.split("-");
					 var id=idDel[1];
					 
					//Check kpi_assign and kpi_result it using employee.? Start
					 $.ajax({
							url:"../Model/mDepartment.php",
							type:"post",
							dataType:"json",
							data:{"departmentId":id,"action":"checkUsingKpiAssignAndKpiResult",},
							success:function(data){
									
									if(data[0]==0){
										if(confirm("ต้องการลบข้อมูลนี้หรือไม่?")){	
											 $.ajax({
													url:"../Model/mDepartment.php",
													type:"post",
													dataType:"json",
													data:{"id":id,"action":"del"},
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
		if($("#departmentName").val()==""){
	 		validate+="กรอก Department Name ด้วยครับ \n";
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
				data:{"departmentName":$("#departmentName").val(),"departmentDetail":$("#departmentDetail").val(),
					"action":$("#departmentAction").val(),"departmentId":$("#departmentId").val()
					},
				success:function(data){
					if(data[0]=="success"){
						alert("บันทึกข้อมูลเรียบร้อย");	
						showDataDepartment();
						resetDataDepartment();	
					}
					if(data[0]=="editSuccess"){
						alert("แก้ไขข้อมูลเรียบร้อย");	
						showDataDepartment();
						resetDataDepartment();
							
					}
					
				}
				
			});
		}
		
		return false;
	});
	
	
});