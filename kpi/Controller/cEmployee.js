$(document).ready(function(){
	
	
	//dropdown List Role Start
		//fnDropdownListRole();
	//dropdown List Role END
	
	
	//dropdown List Department start
	var fnDropdownListSearchDep=function(department_id){
		//alert(perspective_id);
		$.ajax({
			url:"../Model/mDepartmentList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"paramSelectAll":"selectAll"},
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"department_search_id\" name=\"department_search_id\" class=\"form-control input-sm\" style=\"width:auto;\" >";
				//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
					$.each(data,function(index,indexEntry){
						if(department_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#depSearchDropDrowListArea").html(htmlDropDrowList);
				//persDropDrowList
			}
		});
	}	
	
	//fnDropdownListSearchDep($("#department_id_emb").val());
	//alert($("#depDisable").val());
	if($("#depDisable").val()!=undefined){
		fnDropdownListSearchDep($("#departmentIdEmp").val());
		//fnDropdownListDep($("#departmentIdEmp").val(),"selectAll");
		//alert("hello1");
		$("#department_search_id").prop('disabled', 'disabled');
	}else{
		fnDropdownListSearchDep($("#department_id_emb").val(),"selectAll");
	}
	//alert($("#department_id_emb").val());
	
	//dropdown List Department start
	
	//dropdown List status working Start
	var fnDropdownListSearchStatusWork=function(status_work_id){
		//alert(perspective_id);
		$.ajax({
			url:"../Model/mEmpStatusList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"paramSelectAll":"selectAll"},
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"status_work_search_id\" name=\"status_work_search_id\" class=\"form-control input-sm\" style=\"width:auto;\" >";
				//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
					$.each(data,function(index,indexEntry){
						if(status_work_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#empSearchStatusWorkArea").html(htmlDropDrowList);
				//persDropDrowList
			}
		});
	}	
	fnDropdownListSearchStatusWork();
	//dropdown List Status Working End
	

	//dropdown List Division start
	var fnDropdownListDep=function(department_id){
		//alert(perspective_id);
		$("#emp_department_for_check").remove();
		$("body").append("<input type='hidden' id='emp_department_for_check' name='emp_department_for_check' value="+department_id+">");
		
		$.ajax({
			url:"../Model/mDepartmentList.php",
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				//alert(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"empDepartment\" name=\"empDepartment\" class=\"form-control input-sm\" style=\"width:auto;\">";
				//htmlDropDrowList+="<option value='0'>ไม่ระบุ</option>";
				//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
					$.each(data,function(index,indexEntry){
							
						if(department_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
					});
				htmlDropDrowList+="</select>";
				//divDropDrowListArea
				$("#depDropDrowListArea").html(htmlDropDrowList);
				//persDropDrowList
			}
		});
	}	
	//fnDropdownListSearchDiv();
	fnDropdownListDep();
	
	
	//dropdown List EmpPostion start
	var fnDropdownListEmpSeashPostion=function(position_id){
		//alert(perspective_id);
		$.ajax({
			url:"../Model/mEmpPositionList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"paramSelectAll":"selectAll"},
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"position_search_id\" name=\"position_search_id\" class=\"form-control input-sm\" style=\"width:auto;\">";
				//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
					$.each(data,function(index,indexEntry){
						if(position_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#empSearchPositionArea").html(htmlDropDrowList);
				//persDropDrowList
			}
		});
	}	
	fnDropdownListEmpSeashPostion($("#position_id_emb").val());
	
	//dropdown List EmpPostion end
	
	
	
	
	//dropdown List EmpPostion start
	var fnDropdownListEmpPostion=function(position_id){
		
		$("#emp_position_for_check").remove();
		
		$("body").append("<input type='hidden' id='emp_position_for_check' name='emp_position_for_check' value="+position_id+">");
		
		$.ajax({
			url:"../Model/mEmpPositionList.php",
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"empPosition\" name=\"empPosition\" class=\"form-control input-sm\" style=\"width:auto;\">";
					$.each(data,function(index,indexEntry){
						if(position_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#empPositionArea").html(htmlDropDrowList);
				//persDropDrowList
			}
		});
	}	
	fnDropdownListEmpPostion();
	//fnDropdownListDep();

	//dropdown List EmpPostion start
	
	//Dropdown List Emp Status start
	var fnDropdownListEmpStatus=function(status_id,emp_user){
		
		$("#emp_user_for_check").remove();
		$("body").append("<input type='hidden' id='emp_user_for_check' name='emp_user_for_check' value="+emp_user+">");
		$.ajax({
			url:"../Model/mEmpStatusList.php",
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"empStatusWork\" name=\"empStatusWork\" class=\"form-control input-sm\" style=\"width:auto;\">";
					$.each(data,function(index,indexEntry){
						if(status_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#empStatusWorkArea").html(htmlDropDrowList);
				//persDropDrowList
			}
		});
	}
	
	fnDropdownListEmpStatus();


	//Dropdown List Emp Status start
	
	
	
	
//Programming here.
	
	
	
	var resetDataEmployee=function(){
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
	var showDataEmployee=function(department_id,position_id,status_work_search_id){
		/*
		alert("department_id="+department_id);
		alert("division_id="+division_id);
		alert("position_id="+position_id);
		*/
		$.ajax({
			url:"../Model/mEmployee.php",
			type:"post",
			dataType:"html",
			data:{"action":"showData","department_id":department_id,"position_id":position_id,"status_work_search_id":status_work_search_id},
			success:function(data){
				
				$("#employeeShowData").html(data);
				
				 $("#Tableemployee").kendoGrid({
                    // height: 350,
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
					 var idEdit=this.id.split("-");
					 var id=idEdit[1];
					
					 //emp_position_for_check
					 //Emp Id Embeded Parameter Start
					 $("#emp_id_for_check").remove();
					 $("body").append("<input type='hidden' name='emp_id_for_check' id='emp_id_for_check' value='"+id+"'>");
					 //Emp Id Embeded Parameter End
					 
					
					 $.ajax({
							url:"../Model/mEmployee.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								//alert(data[0]["employee_id"]);
								///console.log(data);
								
								
								$("input#empUser").val(data[0]["emp_user"]);
								$("#empPass").val(data[0]["emp_pass"]);
								$("#empConfirmPass").val(data[0]["emp_pass"]);
								//$("#empFullName").val(data[0]["emp_name"]);
								//$("#empPosition").val(data[0]["position_id"]);
								//fnDropdownListEmpSeashPostion(data[0]["position_id"]);
								fnDropdownListSearchDep(data[0]["department_id"]);
								
								fnDropdownListDep(data[0]["department_id"]);
								//fnDropdownListEmpPostion
								fnDropdownListEmpPostion(data[0]["position_id"]);
								fnDropdownListEmpStatus(data[0]["emp_status_work_id"],data[0]["emp_user"]);
								//fnDropdownListRole(data[0]["role_id"]);
								$("#empAge").val(data[0]["emp_age"]);
								$("#empTel").val(data[0]["emp_tel"]);
								$("#empEmail").val(data[0]["emp_email"]);
								$("#empOther").val(data[0]["emp_other"]);
								$("#empId").val(data[0]["emp_id"]);
								$("#empCode").val(data[0]["emp_code"]);
								
								
								$("#empFirstName").val(data[0]["emp_first_name"]);
								$("#empLastName").val(data[0]["emp_last_name"]);
								$("#empBrithDay").val(data[0]["emp_date_of_birth"]);
								$("#empAgeWorking").val(data[0]["emp_age_working"]);
								var statusEmp="";
								if(data[0]["emp_status"]=="single"){
									//alert("Single");
									statusEmp+="Single <input type=\"radio\" class=\"empStatus\" name=\"empStatus\" value=\"single\" checked>";
									statusEmp+="Married <input type=\"radio\" class=\"empStatus\" name=\"empStatus\"  value=\"married\">";
									
									$("#empStatusArea").html(statusEmp);
									
								}else{
									//alert("Maried");
									statusEmp+="Single <input type=\"radio\" class=\"empStatus\" name=\"empStatus\" value=\"single\" >";
									statusEmp+="Married <input type=\"radio\" class=\"empStatus\" name=\"empStatus\"  value=\"married\" checked>";
									
									$("#empStatusArea").html(statusEmp);
								}
								//$("#empStatus").val(data[0]["emp_status"]);
								$("#empMobile").val(data[0]["emp_mobile"]);
								$("#empAddress").val(data[0]["emp_adress"]);
								$("#empDistict").val(data[0]["emp_district"]);
								$("#empSubDistict").val(data[0]["emp_sub_district"]);
								$("#empProvince").val(data[0]["emp_province"]);
								$("#empPostcode").val(data[0]["emp_postcode"]);
								$("#empSubmit").val("Edit");
								$("#empAction").val("editAction");

							}
					 });
					 
				 });
				 
				 
				 $(".actionDel").click(function(){
					 var idDel=this.id.split("-");
					 var id=idDel[1];
					 //Check kpi_assign and kpi_result it using employee.? Start
					 $.ajax({
							url:"../Model/mEmployee.php",
							type:"post",
							dataType:"json",
							data:{"emp_id":id,"action":"checkUsingKpiAssignAndKpiResult",},
							success:function(data){
									
									if(data[0]==0){
										if(confirm("ต้องการลบข้อมูลนี้หรือไม่?")){	
										 $.ajax({
												url:"../Model/mEmployee.php",
												type:"post",
												dataType:"json",
												data:{"id":id,"action":"del"},
												success:function(data){
													if(data[0]=="success"){
														//alert("ลบข้อมูลเรียบร้อย");	
														showDataEmployee($("#department_id_emb").val(),$("#position_id_emb").val(),$("#status_work_search_id_emb").val());
														
													}
												}
										 });
										}
										
									}else{
										alert("ไม่สามารถลยข้อมูลได้เนื่องจาก รหัสพนักงานนี้มีการใช้งานอยู่");
									}
							}
					 });
					 //Check kpi_assign and kpi_result it using employee.? End
					 
					 
					 
				 });
				 //action del,edit end
				 
				 //PRESS RESET SRART
				 $("#empReset").click(function(){
					 resetDataEmployee();
				 });
				 //PRESS RESET END
			}
			
		});
	}
	
	showDataEmployee($("#department_id_emb").val(),$("#position_id_emb").val(),$("#status_work_search_id_emb").val());
	
	
	/*
	$("form#employeeForm").submit(function(){
		
		$.ajax({
			url:"../Model/mEmployee.php",
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
					showDataEmployee();
					resetDataEmployee();	
				}
				if(data[0]=="editSuccess"){
					alert("แก้ไขข้อมูลเรียบร้อย");	
					showDataEmployee();
					resetDataEmployee();
						
				}
				
			}
			
		});
		return false;
	});
	
	//Programming here.

*/
	
	var options = { 
			target: '#output',   // target element(s) to be updated with server response 
			//beforeSubmit: beforeSubmit,  // pre-submit callback 
			success: afterSuccess,  // post-submit callback 
			resetForm: true        // reset the form after successful submit 
		}; 
	var validateFn=function(){
		//Validate Start
		 var validate="";
		 //check employee user duplicate? start	
		 if($("#empSubmit").val()!="Edit"){
			 $.ajax({
					url:"../Model/mEmployee.php",
					type:"post",
					dataType:"json",
					async:false,
					data:{"empUser":$("#empUser").val(),"action":"checkUserDuplicate"},
					success:function(data){
						//alert(data[0])
						if(data[0]!=0){
				
							validate+="*** User name นี้มีการใช้งานแล้ว *** \n";
							
						}
					}
			 });
		 }else{
			 //emp_user_for_check
			 if($("#emp_user_for_check").val()!=$("#empUser").val()){
				 $.ajax({
						url:"../Model/mEmployee.php",
						type:"post",
						dataType:"json",
						async:false,
						data:{"empUser":$("#empUser").val(),"action":"checkUserDuplicate"},
						success:function(data){
							//alert(data[0])
							if(data[0]!=0){
					
								validate+="*** User name นี้มีการใช้งานแล้ว *** \n";
								
							}
						}
				 });
				 
			 }
			 
		 }
		//check employee user duplicate? end
		 
		 	if($("#empCode").val()==""){
		 		validate+="กรอก Emp Code ด้วยครับ \n";
		 	}if($("#empUser").val()==""){
		 		validate+="กรอก User name ด้วยครับ \n";
		 	} if($("#empPass").val()==""){
		 		validate+="กรอก Password ด้วยครับ  \n";
		 	} if($("#empConfirmPass").val()==""){
		 		validate+="กรอก Confirm Password ด้วยครับ  \n";
		 	} if($("#empFullName").val()==""){
		 		validate+="กรอก ชื่อ-นามสกุล ด้วยครับ  \n";
		 	} if($("#empTel").val()==""){
		 		validate+="กรอก เบอร์โทร  ด้วยครับ  \n";
		 	} if($("#empEmail").val()==""){
		 		validate+="กรอก E-mail ด้วยครับ  \n";
		 	}
		 	
		 	return validate;
		 	
		 	//Validate End
	};
	 $('#MyUploadForm').submit(function() { 

		 
		 
		 
		 
		 //Check kpi_assign and kpi_result it using employee.? Start
		 
		 $.ajax({
				url:"../Model/mEmployee.php",
				type:"post",
				dataType:"json",
				async:false,
				data:{"emp_id":$("#emp_id_for_check").val(),"action":"checkUsingKpiAssignAndKpiResult",},
				success:function(data){
						//alert(data[0]);
						if(data[0]==0){
							
							if(validateFn()!=""){	
						 		alert(validateFn());
						 	}else if(validateFn()==""){	
						 		$("#MyUploadForm").ajaxSubmit(options);
						 	}
							
						}else{
							//EDIT START
							if($("#emp_position_for_check").val()!=$("#empPosition").val()){
		 					
								alert("ไม่สามารถแก้ไขข้อมูลตำแหน่งได้ เนื่องจาก รหัสพนักงานนี้มีการใช้งานอยู่");
		 					
		 					return false; 
		 					
							}else if($("#emp_department_for_check").val()!=$("#empDepartment").val()){
		 						
		 						alert("ไม่สามารถแก้ไขข้อมูลแผนกได้ เนื่องจาก รหัสพนักงานนี้มีการใช้งานอยู่");	
		 					
	 						}else{
	 							if(validateFn()!=""){	
	 						 		alert(validateFn());
	 						 	}else if(validateFn()==""){	
	 						 		$("#MyUploadForm").ajaxSubmit(options);
	 						 	}
	 						}
							 //EDIT END
						}
				}
		 });
		 
		 //Check kpi_assign and kpi_result it using employee.? End
		 
		 	
		 
			return false; 
			
		}); 


function afterSuccess(data)
{
	//alert(data);

	
	if(data=="editSuccess"){
		alert("แก้ไขข้อมูลเรียบร้อย");
		resetDataEmployee();
	}else{
		alert("บันทึกข้อมูลเรียบร้อย");
	}
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	
	/*
	alert($("#department_id_emb").val());
	alert($("#position_id_emb").val());*/
	fnDropdownListEmpSeashPostion($("#position_id_emb").val());
	fnDropdownListSearchDep($("#department_id_emb").val());
	fnDropdownListSearchStatusWork($("#status_work_search_id_emb").val());
	//fnDropdownListSearchDiv($("#division_id_emb").val());
	showDataEmployee($("#department_id_emb").val(),$("#position_id_emb").val(),$("#status_work_search_id_emb").val());
	/*
	showDataEmployee($("#department_id_emb").val(),$("#division_id_emb").val(),$("#position_id_emb").val());

	fnDropdownListEmpSeashPostion($("#position_id_emb").val());
	fnDropdownListSearchDep($("#department_id_emb").val());
	fnDropdownListSearchDiv($("#division_id_emb").val());
	*/
}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		
		if( !$('#imageInput').val()) //check empty input filed
		{
			$("#output").html("Are you kidding me?");
			return false
		}
		
		var fsize = $('#imageInput')[0].files[0].size; //get file size
		var ftype = $('#imageInput')[0].files[0].type; // get file type
		

		//allow only valid image file types 
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 1 MB (1048576)
		if(fsize>1048576) 
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
			return false
		}
				
		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");  
	}
	else
	{
		//Output error to older browsers that do not support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}
	
/*Search Button Start*/
$("#customerSearch").click(function(){
	/*
	alert($("#department_id").val());
	alert($("#division_id").val());
	alert($("#position_id").val());
	*/
	$(".emb_param").remove();
	$("body").append("<input type='hidden' name='department_id_emb' class='emb_param' id='department_id_emb' value='"+$("#department_search_id").val()+"'>");
	//$("body").append("<input type='hidden' name='division_id_emb' class='emb_param' id='division_id_emb' value='"+$("#division_id").val()+"'>");
	$("body").append("<input type='hidden' name='position_id_emb' class='emb_param' id='position_id_emb' value='"+$("#position_search_id").val()+"'>");
	$("body").append("<input type='hidden' name='status_work_search_id_emb' class='emb_param' id='status_work_search_id_emb' value='"+$("#status_work_search_id").val()+"'>");
	
	$(".employeeData").show();
	//search customer start
	showDataEmployee($("#department_id_emb").val(),$("#position_id_emb").val(),$("#status_work_search_id_emb").val());
 /*
	$.ajax({
			url:"../Model/mEmployee.php",
			type:"post",
			dataType:"json",
			data:{"action":"showData","department_id":$("#department_id_emb").val(),"division_id":$("#division_id_emb").val(),
				"position_id":$("#position_id_emb").val()},
			success:function(data){
				//alert(data);
				showDataEmployee($("#department_id_emb").val(),$("#division_id_emb").val(),$("#position_id_emb").val());
			}
	 });
	*/
	//search customer end
	
	
});
/*Search Button end*/

	$("#empBrithDay").kendoDatePicker();
	
});