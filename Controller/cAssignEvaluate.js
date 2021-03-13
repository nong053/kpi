//assign page
var resetDataAssignKpi=function(activeKPIs){
    if(activeKPIs==true){
        fnDropdownAssignListKPI();
    }
   
	$("#warningInModal").hide();

    $("#assign_kpi_action").val("add");
    $("#kpi_weight").val("25.00");
   
    if($("#embed_language").val()=="th"){
        $("#assign_kpi_submit").val("เพิ่ม");
    }else{
        $("#assign_kpi_submit").val("Add");
	}
	$("#kpiDropDrowListAllArea").show();
	$("#kpiTextAllArea").hide();
	

    //$("#assign_kpi_submit").val("Add");
}

//dropdown List Employee start
var fnDropdownListAsignEmployee=function(department_id,position_id,paramSelectAll='selectAll',emp_id){


	$.ajax({
		url:"../Model/mEmployeeList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"position_id":position_id,
			"department_id":department_id,
			"paramSelectAll":paramSelectAll
		},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			

			

			var htmlDropDrowList="";
			htmlDropDrowList+="<select style='width:160px;' id=\"assign_employee_id\" name=\"assign_employee_id\" class=\"\" >";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					
					if(emp_id==indexEntry[0]){
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
					}else{
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
					}
					
					
					
				});
			htmlDropDrowList+="</select>";
			
			$("#empAssignArea").html(htmlDropDrowList);
			$("#assign_employee_id").kendoDropDownList({
					theme: "silver"
				});
			//persDropDrowList
			
		}
	});
}	
//dropdown List Department start
var fnDropdownListAsignDep=function(department_id,paramSelectAll){

	$.ajax({
		url:"../Model/mDepartmentList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":paramSelectAll},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select style='width:160px;' id=\"assign_department_id\" name=\"assign_department_id\" class=\"\" >";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					if(department_id==indexEntry[0]){
						
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						
					}else{
						
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						
					}
					
				});
			htmlDropDrowList+="</select>";
			
			$("#depDropDrowListArea").html(htmlDropDrowList);

			if($("#embed_emp_role_leve").val()=="Level2"){
				$("#assign_department_id").prop("disabled",true);
			}else{
				$("#assign_department_id").prop("disabled",false);
			}

			$("#assign_department_id").kendoDropDownList({
					theme: "silver"
				});
			
			$("#assign_department_id").change(function(){
			
				fnDropdownListAsignEmployee($(this).val(),$("#assign_position_id").val());
			});
		}
	});
}	


//dropdown List Position start
var fnDropdownListAssignPosition=function(position_id,paramSelectAll){
	
	$.ajax({
		url:"../Model/mPositionList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":paramSelectAll},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select style='width:150px;' id=\"assign_position_id\" name=\"assign_position_id\" class=\"\" >";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					
					//if($("#embed_role_executive_position_id").val()!=indexEntry[0]){
						if(position_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
					//}
					
				});
			htmlDropDrowList+="</select>";
			
			$("#positionAssignArea").html(htmlDropDrowList);

			if($("#embed_emp_role_leve").val()=="Level2"){
					$("#assign_position_id").val($("#embed_role_underling_position_id").val()).prop("disabled",true);
			}else{
					$("#assign_position_id").prop("disabled",false);
			}

			$("#assign_position_id").kendoDropDownList({
					theme: "silver"
				});

			$("#assign_position_id").change(function(){
				
				fnDropdownListAsignEmployee($("#assign_department_id").val(),$(this).val());
			});
			
			
		}
	});
}	

//dropdown List AppralisalPeriod start
	var fnDropdownListAppralisalAssignKpi=function(year,appraisal_period_id,paramSelectAll="selectAll"){
		//alert(year);
		$.ajax({
			url:"../Model/mAppralisalPeriodList.php",
			type:"post",
			dataType:"json",
			async:false,
            data:{
                    "year":year,
                    "paramSelectAll":paramSelectAll,
            },
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				
				var htmlDropDrowList="";
				htmlDropDrowList+="<select  style='width:100px;'id=\"appraisal_period_assign_kpi\" name=\"appraisal_period_assign_kpi\" class=\"\" style=\"width:auto;\">";
				//htmlDropDrowList+="<option value=\"all\">ทั้งหมด</option>";
					$.each(data,function(index,indexEntry){
						if(appraisal_period_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#periodAssignArea").html(htmlDropDrowList);
				

				$("#appraisal_period_assign_kpi").kendoDropDownList({
					theme: "silver"
				});
				//persDropDrowList
			}
		});
	}	
//appraisalYearArea
var fnDropdownListYear=function(kpi_year){
	//alert("Year");

	$.ajax({
		url:"../Model/mAppraisalYearList.php",
		type:"post",
		dataType:"json",
		async:false,
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"assign_year\" name=\"assign_year\" class=\"\" style=\"width:auto;\">";
				$.each(data,function(index,indexEntry){
					if(kpi_year!=undefined){
						if(kpi_year==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[0]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[0]+"</option>";
						}
						
					}
					else{
						if(indexEntry[1]==1){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[0]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[0]+"</option>";
						}
					}
				});
			htmlDropDrowList+="</select>";
			//alert(htmlDropDrowList);
			$(".assignKpiYearArea").html(htmlDropDrowList);
			$("#assignYearArea").html(htmlDropDrowList);
			$("#assign_year").kendoDropDownList({
			theme: "silver"
			});
			//dropdown year change action start
			$("#assign_year").change(function(){
				
				//alert($("#appraisal_period_id_emb").val());
				//alert($("#year_emb").val());
				/*
				if(($("#year_emb").val()!=undefined) && ($("#appraisal_period_id_emb").val()!=undefined) ){
					fnDropdownListAppralisalAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val());
					
				}else{
					fnDropdownListAppralisalAssignKpi($(this).val());
				}
				*/
				fnDropdownListAppralisalAssignKpi($(this).val());
				//$("#paramYearEmb").val($(this).val());	
				sessionStorage.setItem("param_year",$(this).val());
			});
			
			$("#assign_year").change();
				
		}
	});
}
	





//dropdown List KPI start
var fnDropdownAssignListKPI=function(kpi_id){
	//alert(kpi_id);
	$.ajax({
		//url:"../Model/mKpiListByDepartment.php",
		url:"../Model/mKpiList.php",
		
		type:"post",
		dataType:"json",
		async:false,
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		//data:{"department_id":$("select#department_id option:selected").val()},
		success:function(data){
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"kpi_id\" name=\"kpi_id\" class=\"\" style=\"width:100%;\">";
				$.each(data,function(index,indexEntry){
					if(kpi_id==indexEntry[0]){
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
					}else{
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
					}
					
				});
			htmlDropDrowList+="</select>";
			
			$("#kpiDropDrowListArea").html(htmlDropDrowList);
			$("#kpi_id").kendoDropDownList({
					theme: "silver"
				});
			
	
			
		}
	});
}	
//fnDropdownAssignListKPI();



/*calculte kpi Percentage start*/
var calculateKpiPercentage =function(){
	
	

};

var delAllKpiEmpAssign = function(year,appraisal_period_id,department_id,position_id,emp_id,kpi_id){

	
	$.ajax({
		url:"../Model/mAssignEvaluate.php",
		type:"post",
		dataType:"json",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		data:{
			"action":"delAllKpiAssignEmp",
			"year":year ,
			"appraisal_period_id":appraisal_period_id ,
			"department_id":department_id ,
			"position_id":position_id,
			"emp_id":emp_id,
			"kpi_id":kpi_id,
		},
			async:false,
		success:function(data){
		
			
			if(data[0]=="success"){
				//alert("Deleted success.");
				//confirmMainModalFn("ลบการมอบหมายตัวชี้วัดทั้งหมดเรียบร้อย","แจ้งเตือน","warning");
				showDataEmpAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
			}
			
		}
		
	});
}

var delByKpiEmpAssign = function(year,appraisal_period_id,department_id,position_id,emp_id,kpi_id){

	
	$.ajax({
		url:"../Model/mAssignEvaluate.php",
		type:"post",
		dataType:"json",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		data:{
			"action":"delByKpiAssignEmp",
			"year":year ,
			"appraisal_period_id":appraisal_period_id,
			"department_id":department_id ,
			"position_id":position_id,
			"emp_id":emp_id,
			"kpi_id":kpi_id
		},
			async:false,
		success:function(data){
		
			
			if(data[0]=="success"){
				showDataEmpAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
			}else{
				$.alert({
					buttons: {
					'ปิด': function () {
						
					}
					},
					title: 'แจ้งเตือน!',
					content: 'เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้',
				});
			}
			
		}
		
	});
}


// var sendKPIAsignToEvaluate = function(year,appraisal_period_id,department_id,position_id,emp_id){
// 	$.ajax({
// 		url:"../Model/mAssignEvaluate.php",
// 		type:"post",
// 		dataType:"json",
// 		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
// 		data:{
// 			"action":"confrimKpi",
// 			"year":year ,
// 			"appraisal_period_id":appraisal_period_id ,
// 			"department_id":department_id ,
// 			"position_id":position_id,
// 			"emp_id":emp_id,
// 		},
// 			async:false,
// 		success:function(data){
// 			if(data[0]=="success"){
// 				alert("assign kpi success.");
// 			}	
// 		}	
// 	});
// };

var sendKPIAsignToEvaluate = function(action,year,appraisal_period_id,department_id,position_id,emp_id){
	
	$.ajax({
		url:"../Model/mAssignEvaluate.php",
		type:"post",
		dataType:"json",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		data:{
			"action":action,
			"year":year ,
			"appraisal_period_id":appraisal_period_id ,
			"department_id":department_id ,
			"position_id":position_id,
			"emp_id":emp_id,
		},
			async:false,
		success:function(data){
			if(data[0]=="success"){
				//alert("ส่งประเมินเรียบร้อย");
			}else{

			}	
		}	
	});
};

/*calculte Percentage end*/
var showDataEmpAssignKpi = function(year,appraisal_period_id,department_id,position_id,emp_id){

	$.ajax({
		url:"../Model/mAssignEvaluate.php",
		type:"post",
		dataType:"html",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		data:{
			"action":"showEmpData",
			"year":year ,
			"appraisal_period_id":appraisal_period_id ,
			"department_id":department_id ,
			"position_id":position_id,
			"emp_id":emp_id,
		},
			async:false,
		success:function(data){
		
			$("#assignKpiToEmpShowData").html(data).show();
			$(".displayHideShow").show();


			
			
			$.each($(".confirm_flag_complete"),function(index,indexEntry){
				//alert(index);
				

				var idArray=indexEntry.id;
				
				var empID;
				var positionID;
				var departmentID;
				var appraisalPeriodID;
				var appraisalYear;

				idArray=idArray.split("-");
				

				appraisalYear=idArray[1];
				appraisalPeriodID=idArray[2];
				departmentID=idArray[3];
				positionID=idArray[4];
				empID=idArray[5];

				
				if($("#check_status-"+appraisalYear+"-"+appraisalPeriodID+"-"+departmentID+"-"+positionID+"-"+empID).hasClass('confirm_flag_complete')){
					
					$("#status_confirm_flag-"+appraisalYear+"-"+appraisalPeriodID+"-"+departmentID+"-"+positionID+"-"+empID).html("ส่งประเมินเรียบร้อย").parent().parent().removeClass("alert-warning").addClass("alert-info");
					$("#assignKpiByEmp-"+appraisalYear+"-"+appraisalPeriodID+"-"+departmentID+"-"+positionID+"-"+empID).prop("disabled",true);
					$("#sendKpiAssignByEmp-"+appraisalYear+"-"+appraisalPeriodID+"-"+departmentID+"-"+positionID+"-"+empID).prop("disabled",true);

					$(".actionEdit-"+appraisalYear+"-"+appraisalPeriodID+"-"+departmentID+"-"+positionID+"-"+empID).prop("disabled",true);
					$(".actionDel-"+appraisalYear+"-"+appraisalPeriodID+"-"+departmentID+"-"+positionID+"-"+empID).prop("disabled",true);
				}
		



				
			});

			
			$(".actionViewEmployee").click(function(){
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
									$("#image_file_display").html("<img style=\"opacity:0.1\" class=\"img-circle\" src=\"../View/uploads/avatar.jpg\" width=\"150\">");
								}else{
									$("#image_file_display").html("<img class=\"img-circle\" src=\""+data[0]["emp_picture"]+"\" width=\"150\">");
								}

								$("#empCode_display").html(data[0]["emp_code"]);
								$("#empUser_display").html(data[0]["emp_user"]);
								$("#empFirstName_display").html(data[0]["emp_first_name"]);
								$("#empLastName_display").html(data[0]["emp_last_name"]);

								$("#empDepartment_display").html(data[0]["department_name"]);
								$("#empPosition_display").html(data[0]["position_name"]);
								$("#empRole_display").html(data[0]["role_name"]);
								$("#empStatusWork_display").html(data[0]["emp_status_work"]);
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
								$("#empMobile_display").html(data[0]["emp_mobile"]);
								$("#empAddress_display").html(data[0]["emp_adress"]);
								$("#empDistict_display").html(data[0]["emp_district"]);
								$("#empSubDistict_display").html(data[0]["emp_sub_district"]);
								$("#empProvince_display").html(data[0]["emp_province"]);
								$("#empPostcode_display").html(data[0]["emp_postcode"]);
								
								$("#employeeViewDetailModal").modal({backdrop: 'static', keyboard: false});

							}catch(err) {
							console.log(err.message);
						}

					   }
				});
				
			});
			
			//sendAssignKpi
			$(".sendKpiAssignByEmp").click(function(){


				
				
				var idArray=this.id;
				var empID;
				var positionID;
				var departmentID;
				var appraisalPeriodID;
				var appraisalYear;
				idArray=idArray.split("-");

				appraisalYear=idArray[1];
				appraisalPeriodID=idArray[2];
				departmentID=idArray[3];
				positionID=idArray[4];
				empID=idArray[5];
				
				if($("#check_status-"+appraisalYear+"-"+appraisalPeriodID+"-"+departmentID+"-"+positionID+"-"+empID).hasClass('status_complete')){
				
					$.confirm({
						theme: 'bootstrap', // 'material', 'bootstrap'
						title: 'ยืนยัน!',
						content: 'ยืนยันการมอบหมายตัวชี้วัด?',
						buttons: {
						
						'ยืนยัน': {
						btnClass: 'btn-blue',
						action: function(){

							sendKPIAsignToEvaluate("confrimKpi",appraisalYear,appraisalPeriodID,departmentID,positionID,empID);
							showDataEmpAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
						
						}
						},
						'ยกเลิก': function () {}
						}
						});

					
				
				}else{
					//alert("ไม่สามารถส่งไปประเมินได้เนื่องจากน้ำหนักตัวชี้วัดไม่เท่ากับ 100%");
					$.alert({
						buttons: {
						'ปิด': function () {}
						},
						title: 'แจ้งเตือน!',
						content: 'ไม่สามารถส่งไปประเมินได้เนื่องจากน้ำหนักตัวชี้วัดรวมไม่เท่ากับ <br>100%</b>',
						});

				}


				return false;
			});

			//assignKpiToEmp
			$(".assignKpiByEmp").click(function(){

				resetDataAssignKpi();

				var idArray=this.id;
				var empID;
				var positionID;
				var departmentID;
				var appraisalPeriodID;
				var appraisalYear;
				idArray=idArray.split("-");

				appraisalYear=idArray[1];
				appraisalPeriodID=idArray[2];
				departmentID=idArray[3];
				positionID=idArray[4];
				empID=idArray[5];
				$("#assign_kpi_by_emp").val("Y");


				$("#form_year").val(appraisalYear);
				$("#form_appraisal_period_id").val(appraisalPeriodID);
				$("#form_department_id").val(departmentID);
				$("#form_position_id").val(positionID);
				$("#form_emp_id").val(empID);

				
				
				
				
				fnDropdownAssignListKPI();
				$("#assignMasterKPIModal").modal({backdrop: 'static', keyboard: false});
				
				//sendKPIAsignToEvaluate("confrimKpi",appraisalYear,appraisalPeriodID,departmentID,positionID,empID);
				


				
			});
			//edit,delete here.
			$(".actionDel").click(function(){
				var idArray=this.id;
				var empID;
				var kpiID;
				var positionID;
				var departmentID;
				var appraisalPeriodID;
				var appraisalYear;
				idArray=idArray.split("-");

				appraisalYear=idArray[1];
				appraisalPeriodID=idArray[2];
				departmentID=idArray[3];
				positionID=idArray[4];
				empID=idArray[5];
				kpiID=idArray[6];
				
				
				$.confirm({
					theme: 'bootstrap', // 'material', 'bootstrap'
					title: 'ยืนยัน!',
					content: 'ยืนยันลบการมอบหมายตัวชี้วัดนี้?',
					buttons: {
					
					'ยืนยัน': {
					btnClass: 'btn-blue',
					action: function(){
						delByKpiEmpAssign(appraisalYear,appraisalPeriodID,departmentID,positionID,empID,kpiID);
					}
					},
					'ยกเลิก': function () {}
					}
					});
				

			});

			$(".actionEdit").click(function(){
				var idArray=this.id;
				var empID;
				var kpiID;
				var positionID;
				var departmentID;
				var appraisalPeriodID;
				var appraisalYear;
				idArray=idArray.split("-");

				appraisalYear=idArray[1];
				appraisalPeriodID=idArray[2];
				departmentID=idArray[3];
				positionID=idArray[4];
				empID=idArray[5];
				kpiID=idArray[6];
				
				

				resetDataAssignKpi();
				
				//fnDropdownAssignListKPI(kpiID);
				//$("#kpi_id").prop('disabled', true);

				$("#form_year").val(appraisalYear);
				$("#form_appraisal_period_id").val(appraisalPeriodID);
				$("#form_department_id").val(departmentID);
				$("#form_position_id").val(positionID);
				$("#form_emp_id").val(empID);
				$("#form_kpi_id").val(kpiID);

				$("#kpiDropDrowListAllArea").hide();
				
				
				$("#kpiTextArea").html($("#kpiName-"+appraisalYear+"-"+appraisalPeriodID+"-"+departmentID+"-"+positionID+"-"+empID+"-"+kpiID).text());
				$("#kpiTextAllArea").show();

				$("#assign_kpi_action").val("editAction");
				$("#assign_kpi_by_emp").val("Y");
				$("#assign_kpi_submit").val("แก้ไข")
				$("#kpi_weight").val($("#kpi_weight_assign_to_emp_id-"+empID+"-"+kpiID).text().trim());
				$("#assignMasterKPIModal").modal({backdrop: 'static', keyboard: false});


				
			});
			
		}
		
	});
}



var searchAssignMasterKPIFn = function(){
		
		
		$(".displayHideShow").hide();
		sessionStorage.setItem("param_year", $("#assign_year").val());
		sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_assign_kpi").val());
		sessionStorage.setItem("param_department", $("#assign_department_id").val());
		sessionStorage.setItem("param_position", $("#assign_position_id").val());
		sessionStorage.setItem("param_emp", $("#assign_employee_id").val());

		showDataEmpAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
		
		if($(".contentemployee").html()=="" || $("#assignKpiToEmpShowData").html()==""){
			$("#delAllKpiEmpAssign").prop("disabled",true);
			$("#sendAllKpiEmpAssign").prop("disabled",true);
			$("#addAssignKPI").prop("disabled",true);
		}else{
			$("#delAllKpiEmpAssign").prop("disabled",false);
			$("#sendAllKpiEmpAssign").prop("disabled",false);
			$("#addAssignKPI").prop("disabled",false);
		}
	
}

$(document).ready(function(){


	//##################################### parameter list start ########################
	
	fnDropdownListYear(sessionStorage.getItem("param_year"));
	fnDropdownListAppralisalAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),"selectAll");
	fnDropdownListAsignDep( sessionStorage.getItem("param_department"),"selectAll");
	fnDropdownListAssignPosition(sessionStorage.getItem("param_position"),"selectAll");
	fnDropdownListAsignEmployee(sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),"selectAll");
	
	//###################################### parameter list end #########################	

	//showDataEmpAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
	

	/*Search data for assign data start*/
	$(document).on("click","#assign_kpi_search",function(){
		
		if($("#appraisal_period_assign_kpi").val()==null){
			//alert("กรุณากำหนดช่วงการประเมิน");
			$.alert({
				buttons: {
				'ปิด': function () {}
				},
				title: 'แจ้งเตือน!',
				content: 'กรุณากำหนดช่วงการประเมิน',
				});
		}
		if($("#assign_department_id").val()==null){
			//alert("กรุณากำหนดแผนก");
			$.alert({
				buttons: {
				'ปิด': function () {}
				},
				title: 'แจ้งเตือน!',
				content: 'กรุณากำหนดแผนก',
				});
		}
		if($("#assign_position_id").val()==null){
			//alert("กรุณากำหนดตำแน่ง");
			$.alert({
				buttons: {
				'ปิด': function () {}
				},
				title: 'แจ้งเตือน!',
				content: 'กรุณากำหนดตำแน่ง',
				});
		}
		
		
		//parameter send to year,appraisal_period_id,department_id,position_id
		showDataEmpAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
		
		
		$(".displayHideShow").show();

		
		if($(".embed_confirm_flag").val()=='Y'){
			/*edit for customer 
			$("#addAssignKPI").attr("disabled","disabled");
			$("#sendAllKpiEmpAssign").attr("disabled","disabled");
			*/
			
		}else{
			$("#addAssignKPI").removeAttr("disabled");
			$("#sendAllKpiEmpAssign").removeAttr("disabled");
		}

		//$("#empNameArea").empty();
		//$(".employeeData").show();

		$(document).off("click");
	});
	/*Search data for assign data end*/

	//validate form start
	var validateAssignEvaluateFn=function(){
		
		var validate="";
		
		
		if($("#kpi_id").val()=="" || $("#kpi_id").val()==null){
	 		validate+="เลือกตัวชี้วัดด้วยครับ<br>";
	 	} 

		if(!$.isNumeric($("#kpi_weight").val())){
			validate+="น้ำหนักตัวชี้วัดต้องเป็นตัวเลข <br>";
		}


	 	
	 	
	 	return validate;
	}
 	//validate form end
	
	$("form#AssignKpiForm").submit(function(){

		if(validateAssignEvaluateFn()!=""){
			//alert(validateBaselineFn());
			warningInModalFn("#warningInModalArea",validateAssignEvaluateFn());
			return false;
		}else{

			var year;
			var appraisal_period_id;
			var department_id;
			var position_id;
			var emp_id;
			var kpi_id;


			
			if($("#assign_kpi_by_emp").val()=="N"){
				
				year=sessionStorage.getItem("param_year");
				appraisal_period_id=sessionStorage.getItem("param_appraisal_period");
				department_id=sessionStorage.getItem("param_department");
				position_id=sessionStorage.getItem("param_position");
				emp_id=sessionStorage.getItem("param_emp")
				
				
			}else{
				
				year=$("#form_year").val();
				appraisal_period_id=$("#form_appraisal_period_id").val();
				department_id=$("#form_department_id").val();
				position_id=$("#form_position_id").val();
				emp_id=$("#form_emp_id").val();
				
			}

			if($("#assign_kpi_action").val()=="add"){
				kpi_id=$("#kpi_id").val();
			}else{
				kpi_id=$("#form_kpi_id").val();
			}

			
			$.ajax({
				url:"../Model/mAssignEvaluate.php",
				type:"post",
				dataType:"json",
				headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
				data:{

				"year":year,
				"appraisal_period_id":appraisal_period_id,
				"department_id":department_id,
				"position_id":position_id,
				"emp_id":emp_id,
				"kpi_id":kpi_id,
				"kpi_weight":$("#kpi_weight").val(),"kpi_target_data":$("#kpi_target_data").val(),"kpi_type_actual":$(".kpi_type_actual:checked").val(),
				"action":$("#assign_kpi_action").val(),
					},
				success:function(data){
					if(data[0]=="success"){
						
						showDataEmpAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
						resetDataAssignKpi(false);	
						$("#assignMasterKPIModal").modal("hide");

					}else if(data[0]=="key-duplicate"){
						

						if($("#embed_language").val()=="th"){
							
							warningInModalFn("#warningInModalArea","ห้ามมอบหมายตัวชี้วัดซ้ำกัน");
							
							
						}else{
							
							warningInModalFn("#warningInModalArea","KPI Name is Duplicated.");
							
						}
					}
					if(data[0]=="editSuccess"){
						
						showDataEmpAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
						resetDataAssignKpi(false);	
						$("#assignMasterKPIModal").modal("hide");
					}
					
					
				}
				
			});
			return false;
		}
	});
	//Start Main button manange assign kpi 

	$("#addAssignKPI").click(function(){

		// if($("#appraisal_period_assign_kpi").val()==null){
		// 	alert("กรุณากำหนดช่วงการประเมิน");
		// 	return false;
		// }
		// if($("#assign_department_id").val()==null){
		// 	alert("กรุณากำหนดแผนก");
		// 	return false;
		// }
		// if($("#assign_position_id").val()==null){
		// 	alert("กรุณากำหนดตำแน่ง");
		// 	return false;
		// }
		$("#assign_kpi_by_emp").val("N");

		//param by emp
		$("#form_year").val("");
		$("#form_appraisal_period_id").val("");
		$("#form_department_id").val("");
		$("#form_position_id").val("");
		$("#form_emp_id").val("");
		$("#form_kpi_id").val("");

		resetDataAssignKpi();
		fnDropdownAssignListKPI();
		$("#assignMasterKPIModal").modal({backdrop: 'static', keyboard: false});
		
	});
	
	$("#delAllKpiEmpAssign").click(function(){

		


		$.confirm({
			theme: 'bootstrap', // 'material', 'bootstrap'
			title: 'ยืนยัน!',
			content: 'ยืนยันยกเลิกการมอบหมายตัวชี้วัดทั้งหมด?<br>ยกเลิกการมอบหมายตัวชี้วัดได้กรณียังไม่ส่งประเมิน ถ้าส่งประเมินแล้วให้กดมอบหมายใหม่ที่หน้าประเมิน',
			buttons: {

				'ยืนยัน': {
					btnClass: 'btn-blue',
					action: function(){
						delAllKpiEmpAssign(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
					}
				},
				'ยกเลิก': function () {}
			}
		});
			

	});
	$("#sendAllKpiEmpAssign").click(function(){
		

		$.confirm({
			theme: 'bootstrap', // 'material', 'bootstrap'
			title: 'ยืนยัน!',
			content: 'ยืนยันเพื่อส่งพนักงานไปประเมินทั้งหมด?<br>กรณีส่งพนักงานไปประเมินทั้งหมดพนักงานทุกคนต้องมีน้ำหนักตัวชี้วัดรวมเท่ากับ 100%',
			buttons: {

				'ยืนยัน': {
					btnClass: 'btn-blue',
					action: function(){
						var status_not_complete=0;
						$(".status_not_complete").each(function(index,indexEntry){
							status_not_complete+=1;
						});
						if(status_not_complete==0){
						
							sendKPIAsignToEvaluate("confrimKpi",sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
							showDataEmpAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
						}else{

							$.alert({
								buttons: {
									'ปิด': function () {}
									
								},
								title: 'แจ้งเตือน!',
								content: 'ไม่สามารถส่งไปประเมินได้ เพราะนำ้หนักตัวชี้วัดที่มอบหมายให้แต่ละคนไม่เท่ากับ <b>100%</b>',
							});

							
						}
					}
				},
				'ยกเลิก': function () {}
			}
		});
			
	});


	//Start Main button manange assign kpi 
	
	//parameter search binding chaange action start
	$(document).off('change','#assign_year');
	$("#assign_year").change(function(){
	
		searchAssignMasterKPIFn();
	});

	
	$(document).off('change','#appraisal_period_assign_kpi');
	$(document).on("change","#appraisal_period_assign_kpi",function(){
		searchAssignMasterKPIFn();
		
	});
	$(document).off('change','#assign_department_id');
	$(document).on("change","#assign_department_id",function(){
		searchAssignMasterKPIFn();
		
	});
	$(document).off('change','#assign_position_id');
	$(document).on("change","#assign_position_id",function(){
		searchAssignMasterKPIFn();
		
	});
	$(document).off('change','#assign_employee_id');
	$(document).on("change","#assign_employee_id",function(){
		searchAssignMasterKPIFn();
		
	});
	//parameter search binding chaange action end	

	searchAssignMasterKPIFn();

		//Default Submit		

});