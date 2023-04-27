$(document).ready(function(){
	
	var resetDataDepartment=function(){

		$("#warningInModal").hide();
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
				
				// $("#Tabledepartment").kendoGrid({
                     /*
					 height: 250,
                     sortable: true,
                     pageable: {
                         refresh: true,
                         pageSizes: true,
                         buttonCount: 5
                     },
                     */
                // });
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
								resetDataDepartment();
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
								
								$("#departmentModal").modal({backdrop: 'static', keyboard: false});
								
								
								
								
								
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
							data:{"departmentId":id,"action":"checkUsedData",},
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							success:function(data){
									
									if(data[0]==0){

										$.confirm({
											theme: 'bootstrap', // 'material', 'bootstrap'
											title: 'ยืนยัน!',
											content: 'ต้องการลบแผนกนี้หรือไม่?',
											buttons: {
											
											'ยืนยัน': {
											btnClass: 'btn-blue',
											action: function(){
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
											},
											'ยกเลิก': function () {}
											}
											});

											
											
										//}
										//});
									}else{
										//confirmMainModalFn("ไม่สามารถลบข้อมูลได้! เนื่องจากพนักงานมีการใช้งานอยู่","แจ้งเตือน","warning");
										$.alert({
											buttons: {
											'ปิด': function () {}
											},
											title: 'แจ้งเตือน!',
											content: 'ไม่สามารถลบข้อมูลได้! เนื่องจากมีพนักงานใช้งานอยู่!',
											});

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
		/*
		if($("#departmentCode").val()==""){
	 		validate+=departmentCode+"\n";
		 }
		 */
		if($("#departmentName").val()==""){
	 		validate+=departmentName+"<br>";
	 	}
	 	
	 	
	 	return validate;
	}
	
	
	$("form#departmentForm").submit(function(){
		
		if(validateDepartmentFn()!=""){
			//alert(validateDepartmentFn());
			warningInModalFn("#warningInModalArea",validateDepartmentFn());
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
		$("#departmentModal").modal({backdrop: 'static', keyboard: false});
	});

	//Add Department End
	
	
});