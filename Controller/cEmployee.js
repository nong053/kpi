/*ttps://www.facebook.com/photo.php?fbid=236961356831573&set=ecnf.100015531318540&type=3&theater*/
var checkPackageFn = function(){
	var user_amount="";
	$.ajax({
			url:"../Model/mEmployee.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			async:false,
			data:{"action":"checkUserForPackage"},
			success:function(data){
				//console.log(data);
				user_amount=data;
			}
		});
	return user_amount;

}
$(document).ready(function(){
	
	
	
	//dropdown List Department start
	var fnDropdownListSearchDep=function(department_id){
		//alert("department_id="+department_id);
		$.ajax({
			url:"../Model/mDepartmentList.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			async:false,
			data:{"paramSelectAll":"selectAll"},
			success:function(data){
				//console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"department_search_id\" name=\"department_search_id\" class=\"\" style='width:100%;'>";
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

				if($("#embed_emp_role_leve").val()=="Level2"){
					$("#department_search_id").prop("disabled",true);
				}else{
					$("#department_search_id").prop("disabled",false);
				}

				$("#department_search_id").kendoDropDownList({
					theme: "silver"
				});
				//persDropDrowList
			}
		});
	}	
	
	//fnDropdownListSearchDep(sessionStorage.getItem("param_department"));
	//alert($("#depDisable").val());
	if($("#depDisable").val()!=undefined){
		fnDropdownListSearchDep($("#departmentIdEmp").val());
		//fnDropdownListDep($("#departmentIdEmp").val(),"selectAll");
		//alert("hello1");
		$("#department_search_id").prop('disabled', 'disabled');
	}else{
		fnDropdownListSearchDep(sessionStorage.getItem("param_department"),"selectAll");
	}
	//alert(sessionStorage.getItem("param_department"));
	
	//dropdown List Department start
	
	//dropdown List status working Start
	var fnDropdownListSearchStatusWork=function(status_work_id){
		//alert("status_work_id"+status_work_id);
		$.ajax({
			url:"../Model/mEmpStatusList.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			async:false,
			data:{"paramSelectAll":"selectAll"},
			success:function(data){
				
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"status_work_search_id\" name=\"status_work_search_id\" class=\"\" style='width:100%;' >";
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
				$("#status_work_search_id").kendoDropDownList({
					theme: "silver"
				});
				//persDropDrowList
			}
		});
	}	
	fnDropdownListSearchStatusWork(sessionStorage.getItem("status_work"));
	//dropdown List Status Working End
	
	//dropdown List Division start
	var fnDropdownListDep=function(department_id){
		//alert(perspective_id);
		$("#emp_department_for_check").remove();
		$("body").append("<input type='hidden' id='emp_department_for_check' name='emp_department_for_check' value="+department_id+">");
		
		$.ajax({
			url:"../Model/mDepartmentList.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				//alert(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"empDepartment\" name=\"empDepartment\" class=\"\" style='width:100%;'>";
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

				if($("#embed_emp_role_leve").val()=="Level2"){
					$("#empDepartment").prop("disabled",true);
				}else{
					$("#empDepartment").prop("disabled",false);
				}

				$("#empDepartment").kendoDropDownList({
					theme: "silver"
				});
				

				//persDropDrowList
			}
		});
	}	
	//fnDropdownListSearchDiv();
	fnDropdownListDep();
	
	
	//dropdown List EmpPostion start
	var fnDropdownListEmpSeashPostion=function(position_id){
		//alert("position_id="+position_id);
		$.ajax({
			url:"../Model/mEmpPositionList.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			async:false,
			data:{"paramSelectAll":"selectAll"},
			success:function(data){
				
				var htmlDropDrowList="";
				htmlDropDrowList+="<select  id=\"position_search_id\" name=\"position_search_id\" class=\"\" style='width:100%;' >";
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

				if($("#embed_emp_role_leve").val()=="Level2"){
					$("#position_search_id").val($("#embed_role_underling_position_id").val()).prop("disabled",true);
				}else{
					$("#position_search_id").prop("disabled",false);
				}

				$("#position_search_id").kendoDropDownList({
					theme: "silver"
				});
				//persDropDrowList
			}
		});
	}	
	fnDropdownListEmpSeashPostion(sessionStorage.getItem("param_position"));
	
	//dropdown List EmpPostion end
	//dropdown List role start
	var fnDropdownListSearchEmpRole=function(role_id){

		$.ajax({
			url:"../Model/mRoleList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"paramSelectAll":"selectAll"},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"emp_role_id\" name=\"emp_role_id\" class=\"\" style='width:100%;' >";
				//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
					$.each(data,function(index,indexEntry){
						if(role_id==indexEntry[0]){
							
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
							
						}else{
							
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
							
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#roleSearchDropDrowListArea").html(htmlDropDrowList);

				// if($("#embed_emp_role_level_id").val()==2){
				// 	$("#emp_role_id").prop("disabled",true);
				// }else{
				// 	$("#emp_role_id").prop("disabled",false);
				// }

				$("#emp_role_id").kendoDropDownList({
						theme: "silver"
					});
				//persDropDrowList
			}
		});
	}
//dropdown List role start
fnDropdownListSearchEmpRole(sessionStorage.getItem("param_role"));
	
	
	//dropdown List EmpPostion start
	var fnDropdownListEmpPostion=function(position_id){
		
		$("#emp_position_for_check").remove();
		
		$("body").append("<input type='hidden' id='emp_position_for_check' name='emp_position_for_check' value="+position_id+">");
		
		$.ajax({
			url:"../Model/mEmpPositionList.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"empPosition\" name=\"empPosition\" class=\"\" style='width:100%;'>";
					$.each(data,function(index,indexEntry){
						if(position_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#empPositionArea").html(htmlDropDrowList);

				if($("#embed_emp_role_leve").val()=="Level2"){
					$("#empPosition").val($("#embed_role_underling_position_id").val()).prop("disabled",true);
				}else{
					$("#empPosition").prop("disabled",false);
				}
				
				$("#empPosition").kendoDropDownList({
					theme: "silver"
				});
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
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"empStatusWork\" name=\"empStatusWork\" class=\"\" style='width:100%;'>";
					$.each(data,function(index,indexEntry){
						if(status_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#empStatusWorkArea").html(htmlDropDrowList);
				$("#empStatusWork").kendoDropDownList({
					theme: "silver"
				});
				//persDropDrowList
			}
		});
	}
	
	fnDropdownListEmpStatus();

	fnDropdownListRole();


	//Dropdown List Emp Status start
	
	
	
	
//Programming here.
	
	
	
	var resetDataEmployee=function(){

		$("#warningInModal").hide();
		$("#passArea").show();
		$("#confirmPassArea").show();

		$("#changePassArea").hide();
		$("#empCode").val("");
		$("#empUser").val("");
		$("#empPass").val("");
		$("#empConfirmPass").val("");
		$("#empFullName").val("");
		$("#empFirstName").val("");
		$("#empLastName").val("");
		//$("#empPosition2").val("");

		$("#empPosition").val("");
		$("#empAge").val("");
		$("#empMobile").val("");
		$("#empTel").val("");
		$("#empEmail").val("");
		$("#empBrithDay").val(currentDate());
		$("#empAgeWorking").val(currentDate());
		$("input[name=empStatus][value='single']").prop("checked",true);
		$("#empAddress").val("");
		$("#empDistict").val("");
		$("#empSubDistict").val("");
		$("#empProvince").val("");
		$("#empPostcode").val("");

		$("#empOther").val("");
		
		$("#empAction").val("add");
		$("#empId").val("");
		$("#emp_id_for_check").val("");
		//$("#empSubmit").val("Add");

		if($("#embed_language").val()=="th"){
			$("#empSubmit").val("เพิ่ม");
		}else{
			$("#empSubmit").val("Add");
		}

	}
	var showDataEmployee=function(department_id,position_id,status_work_search_id,role_id){
		/*
		alert("department_id="+department_id);
		alert("division_id="+division_id);
		alert("position_id="+position_id);
		*/
		$.ajax({
			url:"../Model/mEmployee.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"html",
			data:{"action":"showData","department_id":department_id,"position_id":position_id,"status_work_search_id":status_work_search_id,"role_id":role_id},
			success:function(data){
				
				$("#employeeShowData").html(data);
				
				// $("#Tableemployee").kendoGrid({
                    // height: 350,
                    //  sortable: true,
                    //  pageable: {
                    //      refresh: true,
                    //      pageSizes: true,
                    //      buttonCount: 5
                    //  },
                // });
				 setGridTable();
				 
				//alert(data);
				 
				 //action del,edit start
				 $(".actionView").click(function(){
					var idView=this.id.split("-");
					var id=idView[1];
				   
					$.ajax({
						   url:"../Model/mEmployee.php",
						   headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
						   type:"post",
						   dataType:"json",
						   data:{"id":id,"action":"edit"},
						   async:false,
						   success:function(data){
							   
							try {

								if(data[0]["emp_picture"]==""){
									$("#image_file_display").html("<img style=\"opacity:0.1\" class=\"img-circle\" src=\"../View/uploads/avatar.jpg\" width=\"150\" height=\"150\">");
								}else{
									$("#image_file_display").html("<img class=\"img-circle\" src=\""+data[0]["emp_picture"]+"\" width=\"150\" height=\"150\">");
								}
									//$("#image_file_display").html("<img class='img-circle' src="+data[0]["emp_picture"]+" width=\"150\">");
									$("#empCode_display").html(data[0]["emp_code"]);
									$("#empUser_display").html(data[0]["emp_user"]);
									$("#empFirstName_display").html(data[0]["emp_first_name"]);
									$("#empLastName_display").html(data[0]["emp_last_name"]);

									$("#empDepartment_display").html(data[0]["department_name"]);
									$("#empPosition_display").html(data[0]["position_name"]);
									$("#empRole_display").html(data[0]["role_name"]);
									$("#empStatusWork_display").html(data[0]["emp_status_work"]);
									
									

									


									$("#empAge_display").html(data[0]["emp_age"]);
									$("#empTel_display").html(data[0]["emp_tel"]);
									$("#empEmail_display").html(data[0]["emp_email"]);
									$("#empOther_display").html(data[0]["emp_other"]);
									
									

									
									
									
									
									$("#empBrithDay_display").html(data[0]["emp_date_of_birth"]);
									$("#empAgeWorking_display").html(data[0]["emp_age_working"]);
									
									if(data[0]["emp_status"]=="single"){
										
										$("#empStatus_display").html("โสด");
										
									}else{

										$("#empStatus_display").html("สมรส");
									}
									//$("#empStatus").val(data[0]["emp_status"]);
									$("#empMobile_display").html(data[0]["emp_mobile"]);
									$("#empAddress_display").html(data[0]["emp_adress"]);
									$("#empDistict_display").html(data[0]["emp_district"]);
									$("#empSubDistict_display").html(data[0]["emp_sub_district"]);
									$("#empProvince_display").html(data[0]["emp_province"]);
									$("#empPostcode_display").html(data[0]["emp_postcode"]);

									
									

									$("#employeeViewModal").modal({backdrop: 'static', keyboard: false});

								}catch(err) {
								console.log(err.message);
							}

						   }
					});
					
				});

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
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							async:false,
							success:function(data){
								//alert(data[0]["employee_id"]);
								///console.log(data);
								
								resetDataEmployee();
								$("input#empUser").val(data[0]["emp_user"]);
								//$("#empPass").val(data[0]["emp_pass"]);
								//$("#empConfirmPass").val(data[0]["emp_pass"]);
								//$("#empFullName").val(data[0]["emp_name"]);
								//$("#empPosition").val(data[0]["position_id"]);
								//$("#empPosition2").val(data[0]["position2"]);
								//fnDropdownListEmpSeashPostion(data[0]["position_id"]);
								fnDropdownListSearchDep(data[0]["department_id"]);
								
								fnDropdownListDep(data[0]["department_id"]);
								//fnDropdownListEmpPostion
								fnDropdownListEmpPostion(data[0]["position_id"]);
								fnDropdownListEmpStatus(data[0]["emp_status_work_id"],data[0]["emp_user"]);
								fnDropdownListRole(data[0]["role_id"]);
								$("#empAge").val(data[0]["emp_age"]);
								$("#empTel").val(data[0]["emp_tel"]);
								$("#empEmail").val(data[0]["emp_email"]);
								$("#empOther").val(data[0]["emp_other"]);
								$("#empId").val(data[0]["emp_id"]);
								$("#empCode").val(data[0]["emp_code"]);

								$("#changePassArea").show();
								$("#passArea").hide();
								$("#confirmPassArea").hide();
								
								
								$("#empFirstName").val(data[0]["emp_first_name"]);
								$("#empLastName").val(data[0]["emp_last_name"]);
								$("#empBrithDay").val(data[0]["emp_date_of_birth"]);
								$("#empAgeWorking").val(data[0]["emp_age_working"]);
								var statusEmp="";
								if(data[0]["emp_status"]=="single"){
									//alert("Single");
									statusEmp+="โสด <input type=\"radio\" class=\"empStatus\" name=\"empStatus\" value=\"single\" checked>";
									statusEmp+="สมรส <input type=\"radio\" class=\"empStatus\" name=\"empStatus\"  value=\"married\">";
									
									$("#empStatusArea").html(statusEmp);
									
								}else{
									//alert("Maried");
									statusEmp+="โสด <input type=\"radio\" class=\"empStatus\" name=\"empStatus\" value=\"single\" >";
									statusEmp+="สมรส <input type=\"radio\" class=\"empStatus\" name=\"empStatus\"  value=\"married\" checked>";
									
									$("#empStatusArea").html(statusEmp);
								}
								//$("#empStatus").val(data[0]["emp_status"]);
								$("#empMobile").val(data[0]["emp_mobile"]);
								$("#empAddress").val(data[0]["emp_adress"]);
								$("#empDistict").val(data[0]["emp_district"]);
								$("#empSubDistict").val(data[0]["emp_sub_district"]);
								$("#empProvince").val(data[0]["emp_province"]);
								$("#empPostcode").val(data[0]["emp_postcode"]);

								if($("#embed_language").val()=="th"){
									$("#empSubmit").val("แก้ไข");
								}else{
									$("#empSubmit").val("Edit");
								}

								//$("#empSubmit").val("Edit");

								$("#empAction").val("editAction");

								$("#employeeModal").modal({backdrop: 'static', keyboard: false});

							}
					 });
					 
				 });
				 
				 
				 $(".actionDel").click(function(){
					 var idDel=this.id.split("-");
					 var id=idDel[1];
					 
					 //Check kpi_assign and kpi_result it using employee.? Start
					 $.ajax({
							url:"../Model/mEmployee.php",
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							type:"post",
							dataType:"json",
							data:{"emp_id":id,"action":"checkUsingKpiAssignAndKpiResult",},
							success:function(data){
									
									if(data[0]==0){

										//if(confirm("ต้องการลบข้อมูลนี้หรือไม่?")){	
											$.confirm({
												theme: 'bootstrap', // 'material', 'bootstrap'
												title: 'ยืนยัน!',
												content: 'ต้องการลบข้อมูลพนักงานคนนี้หรือไม่?',
												buttons: {
												
												'ยืนยัน': {
												btnClass: 'btn-blue',
												action: function(){
													$.ajax({
															url:"../Model/mEmployee.php",
															headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
															type:"post",
															dataType:"json",
															data:{"id":id,"action":"del"},
															success:function(data){
																if(data[0]=="success"){
																	//alert("ลบข้อมูลเรียบร้อย");	
																	
																	showDataEmployee(sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("status_work"),sessionStorage.getItem("param_role"));
																	
																}
															}
													});
													

												}
												},
												'ยกเลิก': function () {}
												}
												});
										 
										//}
										
									}else{


										$.alert({
											buttons: {
											'ปิด': function () {}
											},
											title: 'แจ้งเตือน!',
											content: 'ไม่สามารถลยข้อมูลได้เนื่องจากพนักงานรายนี้ถูกมอบหมายตัวชี้วัดแล้ว',
											});
									

										//alert("ไม่สามารถลยข้อมูลได้เนื่องจาก รหัสพนักงานนี้มีการใช้งานอยู่");
										/*
										if(confirm("ต้องการลบข้อมูลนี้หรือไม่? เนื่องจากรหัสพนักงานนี้มีการใช้งานอยู่")){
									
										 $.ajax({
												url:"../Model/mEmployee.php",
												headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
												type:"post",
												dataType:"json",
												data:{"id":id,"action":"del"},
												success:function(data){
													if(data[0]=="success"){
														//alert("ลบข้อมูลเรียบร้อย");	
														confirmMainModalHideFn();
														showDataEmployee(sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("status_work"),sessionStorage.getItem("param_role"));
														
													}
												}
										 });
									
										}
										*/


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

		function check_character(ch){
			var len, digit;
			if(ch == " "){
				len=0;
			}else{
				len = ch.length;
			}
			for(var i=0 ; i<len ; i++)
			{
				digit = ch.charAt(i)
				if( (digit >= "a" && digit <= "z") || (digit >="0" && digit <="9") || (digit >="A" && digit <="Z") || (digit =="_")){
				;
				}else{
					return false;
				}
			}
			return true;
		}
	function isEmail(email) {
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}
	function validatePhone(phone) {
		
		var regex = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
		return regex.test(phone);
	}	
	
	function checkPasswordStrength() {
		
		var number = /([0-9])/;
		var alphabets = /([a-zA-Z])/;
		var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
		if ($('#empPass').val().length < 6) {
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('weak-password');
			$('#password-strength-status').html("ต้องมากกว่า 6 ตัวอักษร)");
			return false;
		} else {
			if ($('#empPass').val().match(number) && $('#empPass').val().match(alphabets) && $('#empPass').val().match(special_characters)) {
				$('#password-strength-status').removeClass();
				$('#password-strength-status').addClass('strong-password');
				$('#password-strength-status').html("ความปลอดภัยสูง");
				return true;
			} else {
				$('#password-strength-status').removeClass();
				$('#password-strength-status').addClass('medium-password');
				$('#password-strength-status').html("มีความปลอดภัยระดับกลาง");
				return true;
			}
		}
	}
	var validateFn=function(){

		
		//Validate Start
		 var validate="";
		 var checkUserDuplicate="";
		 var checkEmpCode="";
		 var checkUsername="";
		 var checkPassword="";
		 var checkConfirmPass="";
		 var checkConfirmPassResult="";
		 var checkFirstName="";
		 var checkLastName="";
		 var checkTel="";
		 var checkEmail="";
		 var checkBirthday="";
		 var checkWorkingAge="";

		 if($("#embed_language").val()=="th"){

			 
			 checkUserDuplicate+="ชื่อผู้ใช้งานนี้มีการใช้งานแล้ว<br>";
			 checkEmpCode+="กรอกรหัสพนักงานด้วยครับ<br>";
			 checkUsername+="กรอกชื่อผู้ใช้งานด้วยครับ <br>";
			 checkPassword+="กรอกรหัสผ่านด้วยครับ<br>";
			 checkConfirmPass+="กรอกยืนยันรหัสผ่านด้วยครับ <br>";
			 checkConfirmPassResult+="กรอกยืนยันรหัสผ่านไม่ตรงกัน <br>";
			 checkFirstName+="กรอกชื่อด้วยครับ<br>";
			 checkLastName+="กรอกนามสกุลด้วยครับ<br>";
			 checkTel+="กรอกเบอร์โทรด้วยครับ <br>";
			 checkEmail+="กรอกอีเมลล์ด้วยครับ <br>";
			 checkBirthday+="กรอกวันเกิดด้วยครับ <br>";
			 checkWorkingAge+="กรอกวันที่เริ่มงานด้วยครับ <br>";

		}else{

			 
			 checkUserDuplicate+="This username is already active.<br>";
			 checkEmpCode+="Please Fill your Employee ID.<br>";
			 checkUsername+="Please Fill username.<br>";
			 checkPassword+="Please Fill Password.<br>";
			 checkConfirmPass+="Please Fill Confirm Password.<br>";
			 checkConfirmPassResult+="Password and Confirm password is Incorrect.<br>";
			 checkFirstName+="Please Fill first name.<br>";
			 checkLastName+="Please Fill last name.<br>";
			 checkTel+="Please Fill your Tel.<br>";
			 checkEmail+="Please Fill your Email.<br>";
			 checkBirthday+="Please Fill your birth.<br>";
			 checkWorkingAge+="Please Fill your work experience.<br>";
		
		}
		 
		 //check employee user duplicate? start	
		// alert($("#empAction").val());
		 if($("#empAction").val()!="editAction"){
			 $.ajax({
					url:"../Model/mEmployee.php",
					headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
					type:"post",
					dataType:"json",
					async:false,
					data:{"empUser":$("#empUser").val(),"action":"checkUserDuplicate"},
					success:function(data){
						//alert(data[0])
						if(data[0]!=0){
				
							validate+=checkUserDuplicate;
							
						}
					}
			 });
		 }else{
			 //emp_user_for_check
			 /*
			 if($("#emp_user_for_check").val()!=$("#empUser").val()){
				 $.ajax({
						url:"../Model/mEmployee.php",
						headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
						type:"post",
						dataType:"json",
						async:false,
						data:{"empUser":$("#empUser").val(),"action":"checkUserDuplicate"},
						success:function(data){
							//alert(data[0])
							if(data[0]!=0){
					
								validate+=checkUserDuplicate;
								
							}
						}
				 });
				 
			 }
			 */
			 
		 }
		//check employee user duplicate? end

		  if($("#empAction").val()!="editAction"){


			 	if($("#empCode").val()==""){
			 		validate+=checkEmpCode;
			 	}else if(check_character($("#empCode").val())==false){
					
					validate+="รหัสพนักงานต้องเป็นภาษาอังกฤษหรือตัวเลขเท่านั้น<br>";
				}


				if($("#empUser").val()==""){
			 		validate+=checkUsername;
			 	}else if(check_character($("#empUser").val())==false){
					
					validate+="ชื่อผู้ใช้งานต้องเป็นภาษาอังกฤษหรือตัวเลขเท่านั้น<br>";
				}
				
				if($("#empPass").val()==""){
			 		validate+=checkPassword;
			 	}else if(checkPasswordStrength()==false){
					validate+="รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร<br>";
				 }
				  
				if($("#empConfirmPass").val()==""){
			 		validate+=checkConfirmPass;
			 	}
			 	
			 	
			 	if($("#empConfirmPass").val()!=$("#empPass").val()){
			 		validate+=checkConfirmPassResult;
			 	}
			 	

			 	if($("#empFirstName").val()==""){
			 		validate+=checkFirstName;
			 	} 
			 	if($("#empLastName").val()==""){
			 		validate+=checkLastName;
			 	} 
				 //alert($("#empDepartment").val());
				if($("#empDepartment").val()=="" || $("#empDepartment").val()==null){
					validate+="เลือกแผนกด้วยครับ<br>";
				} 
				if($("#empPosition").val()=="" || $("#empPosition").val()==null){
					validate+="เลือกตำแหน่งด้วยครับ<br>";
				}

				 
				 


			}else{


				



				if($("#empCode").val()==""){
			 		validate+=checkEmpCode;
			 	}if($("#empUser").val()==""){
			 		validate+=checkUsername;
			 	}else if(check_character($("#empUser").val())==false){
					
					validate+="ชื่อผู้ใช้งานต้องเป็นภาษาอังกฤษหรือตัวเลขเท่านั้น<br>";
				}

			 	if ($('#changePass').is(":checked"))
				{
				  if($("#empConfirmPass").val()!=$("#empPass").val()){
			 		validate+=checkConfirmPassResult;
			 		}
				 
				}

				
			 	if($("#empFirstName").val()==""){
			 		validate+=checkFirstName;
			 	} 
			 	if($("#empLastName").val()==""){
			 		validate+=checkLastName;
			 	} 
			 	// if($("#empBrithDay").val()==""){
			 	// 	validate+=checkBirthday;
			 	// } if($("#empAgeWorking").val()==""){
			 	// 	validate+=checkWorkingAge;
			 	// }

			 	// if($("#empTel").val()==""){
			 	// 	validate+=checkTel;
			 	// } if($("#empEmail").val()==""){
			 	// 	validate+=checkEmail;
			 	// }

			}
		 	
		 	return validate;
		 	
		 	//Validate End
	};
	// $('#MyUploadForm').attr("action","../Model/mEmployee.php?token="+sessionStorage.getItem('token'));
	 $('#MyUploadForm').submit(function() { 

		 
		 if(validateFn()!=""){	
	 		//alert(validateFn());
			warningInModalFn("#warningInModalArea",validateFn());

	 	 }else if(validateFn()==""){	
	 		$("#MyUploadForm").ajaxSubmit(options);
	 		return false;
	 	 }
		 
		 //Check kpi_assign and kpi_result it using employee.? Start
		 /*
		 $.ajax({
				url:"../Model/mEmployee.php",
				headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
				type:"post",
				dataType:"json",
				async:false,
				data:{"emp_id":$("#emp_id_for_check").val(),"action":"checkUsingKpiAssignAndKpiResult",},
				success:function(data){

						try {


								if(data[0]==0){

									if(validateFn()!=""){	
								 		alert(validateFn());
								 	}else if(validateFn()==""){	
								 		$("#MyUploadForm").ajaxSubmit(options);
								 		return false;
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
						catch(err) {
						  console.log(err.message);
						}
				}
		 });
		 */
		 //Check kpi_assign and kpi_result it using employee.? End
		return false; 
	}); 


function afterSuccess(data)
{
	//alert(data);

	
	if(data=="editSuccess"){
		//alert("แก้ไขข้อมูลเรียบร้อย");
		resetDataEmployee();
		$("#employeeModal").modal("hide");
	}else{
		//alert("บันทึกข้อมูลเรียบร้อย");
		$("#employeeModal").modal("hide");
	}
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	
	/*
	alert(sessionStorage.getItem("param_department"));
	alert(sessionStorage.getItem("param_position"));*/
	fnDropdownListEmpSeashPostion(sessionStorage.getItem("param_position"));
	fnDropdownListSearchDep(sessionStorage.getItem("param_department"));
	fnDropdownListSearchStatusWork(sessionStorage.getItem("status_work"));
	fnDropdownListSearchEmpRole(sessionStorage.getItem("param_role"));

	//fnDropdownListSearchDiv($("#division_id_emb").val());
	showDataEmployee(sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("status_work"),sessionStorage.getItem("param_role"));
	/*
	showDataEmployee(sessionStorage.getItem("param_department"),$("#division_id_emb").val(),sessionStorage.getItem("param_position"));

	fnDropdownListEmpSeashPostion(sessionStorage.getItem("param_position"));
	fnDropdownListSearchDep(sessionStorage.getItem("param_department"));
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



/*change param action start*/
sessionStorage.setItem("param_department", $("#department_search_id").val());
sessionStorage.setItem("param_position", $("#position_search_id").val());
sessionStorage.setItem("status_work", $("#status_work_search_id").val());
sessionStorage.setItem("param_role", $("#emp_role_id").val());
	
 setTimeout(function(){
	showDataEmployee(sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("status_work"),sessionStorage.getItem("param_role"));
	$(".employeeData").show();
 });


$("#department_search_id").change(function(){
	
	sessionStorage.setItem("param_department", $("#department_search_id").val());
	sessionStorage.setItem("param_position", $("#position_search_id").val());
	sessionStorage.setItem("status_work", $("#status_work_search_id").val());
	sessionStorage.setItem("param_role", $("#emp_role_id").val());
	$(".employeeData").show();
	showDataEmployee(sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("status_work"),sessionStorage.getItem("param_role"));
})
$("#position_search_id").change(function(){
	sessionStorage.setItem("param_department", $("#department_search_id").val());
	sessionStorage.setItem("param_position", $("#position_search_id").val());
	sessionStorage.setItem("status_work", $("#status_work_search_id").val());
	sessionStorage.setItem("param_role", $("#emp_role_id").val());
	$(".employeeData").show();
	showDataEmployee(sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("status_work"),sessionStorage.getItem("param_role"));
})
$("#status_work_search_id").change(function(){
	sessionStorage.setItem("param_department", $("#department_search_id").val());
	sessionStorage.setItem("param_position", $("#position_search_id").val());
	sessionStorage.setItem("status_work", $("#status_work_search_id").val());
	sessionStorage.setItem("param_role", $("#emp_role_id").val());
	$(".employeeData").show();
	showDataEmployee(sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("status_work"),sessionStorage.getItem("param_role"));
})
$("#emp_role_id").change(function(){
	sessionStorage.setItem("param_department", $("#department_search_id").val());
	sessionStorage.setItem("param_position", $("#position_search_id").val());
	sessionStorage.setItem("status_work", $("#status_work_search_id").val());
	sessionStorage.setItem("param_role", $("#emp_role_id").val());
	$(".employeeData").show();
	showDataEmployee(sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("status_work"),sessionStorage.getItem("param_role"));
})

/*change param action end*/
	
	$("#empBrithDay").datepicker();
	$( "#empBrithDay" ).datepicker( "option", "dateFormat", "yy-mm-dd");
	$("#empAgeWorking").datepicker();
	$( "#empAgeWorking" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	

	
	//Add employee start
	$("#btnAddEmployee").click(function(){
		
		
		//if(parseInt(checkPackageFn()) < parseInt($("#embed_user_amount").val())){

			resetDataEmployee();
			fnDropdownListEmpPostion(sessionStorage.getItem("param_position"));
			fnDropdownListDep(sessionStorage.getItem("param_department"));
			fnDropdownListEmpStatus(sessionStorage.getItem("status_work"));		
			$("#employeeModal").modal({backdrop: 'static', keyboard: false});

		// }else{
		// 	$.alert({
		// 		buttons: {
		// 		'ปิด': function () {}
		// 		},
		// 		title: 'แจ้งเตือน!',
		// 		content: 'ไม่สามารถเพิ่มพนักงานอีกได้ <br>ติดต่อผู้ดูแลระบบเพื่อเปลี่ยนแพคเกจโทร.0809926565',
		// 		});

			
		// }
	});

	//add empoyell end


	$("#changePass").click(function(){

		if($(this).is(":checked")){
			$("#passArea").show();
			$("#confirmPassArea").show();
		}else{
			$("#passArea").hide();
			$("#confirmPassArea").hide();
		}
		

	});


	if(sessionStorage.getItem('checkMobile')=='mobile'){
		
		
		$(".pre-search-label").css({"padding-left":"0px"});
		$(".fontLabelParam").css({"text-align":"left"});
	}else{
		
		$(".pre-search-label").css({"padding-left":"15px"});
		$(".fontLabelParam").css({"text-align":"right"});
	}
	
});