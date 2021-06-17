//search data start

	var showDataEmployee=function(year,appraisal_period_id,department_id,position_id,role_id){
		//alert(department_id);
		$.ajax({
			url:"../Model/mApproveKpi.php",
			type:"post",
			dataType:"html",
			data:{"action":"showEmpData","year":year,"appraisal_period_id":appraisal_period_id,
			"department_id":department_id,"position_id":position_id,"role_id":role_id},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				$("#employeeShowData").html(data);
				
				//  $("#Tableemployee").kendoGrid({
                //     /// height: 350,
                //      sortable: true,
                //      pageable: {
                //          refresh: true,
                //          pageSizes: true,
                        //  buttonCount: 5
                //      },
                //  });
				 setGridTable();
				 
				//alert(data);
				 
				//Edit For Approve kpi START
					$(".actionApproveEditKPI").click(function(){
						
						$("#warningInModal").hide();
						var  data_id=this.id.split("-");
						var kpi_year=data_id[1];
						var appraisal_period_id=data_id[2];
						var department_id=data_id[3];
						var position_id=data_id[4];
						var emp_id=data_id[5];
						var role_id=data_id[6];

						
						
						$("#year_approve_emb").val(kpi_year);
						$("#appraisal_period_emb").val(appraisal_period_id);
						$("#dep_approve_id_emb").val(department_id);
						$("#position_approve_id_emb").val(position_id);
						$("#employee_id_emb").val(emp_id);
						$("#role_id_emb").val(role_id);

						 
						$.ajax({
							url:"../Model/mApproveKpi.php",
							type:"post",
							dataType:"json",
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							data:{
							"year":kpi_year,
							"appraisal_period_id":appraisal_period_id,
							"employee_id":emp_id,
							"action":"list_kpi"
							},
							success:function(data){
								
								
					
								var html="";
								$.each(data,function(index,indexEntry){
									html+="<tr>";
										html+="<td><div style='text-align:center;'>";
											html+=(index+1);
										html+="</div></td>";

										html+="<td>";
											html+=indexEntry[1];

										html+="<td><div style='text-align:right;'>";
											html+=indexEntry[2];
										html+="</div</td>";

										html+="<td><div style='text-align:right;'>";
											html+=indexEntry[6];
										html+="</div</td>";

										html+="<td><div style='text-align:right;'>";
											html+=indexEntry[3];
										html+="</div></td>";

										html+="<td><div style='text-align:right;'>";

											var performance_emp=indexEntry[7]*40/100;
											var performance_chief=indexEntry[4]*60/100;
											var performance_total=performance_emp+performance_chief;
											performance_total =parseFloat(performance_total).toFixed(2);
											
											html+=performance_total+"%";
										html+="</div></td>";
									html+="</tr>";
								});
								
								$("#kpi_list_result").html(html);
							}
							
						});

						 
						  
						 // alert($("#employee_id_emb").val());
						  $.ajax({
								url:"../Model/mApproveKpi.php",
								type:"post",
								dataType:"json",
								headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
								data:{
								"year":kpi_year,
								"appraisal_period_id":appraisal_period_id,
								"employee_id":emp_id,
								"action":"edit"
								},
								success:function(data){
									
									$(".formAdjust").show();
									$("#adjust_reason").val(data[0]['adjust_reason']);
									$("#adjust_percentage").val(data[0]['adjust_percentage']);
									//showDataEmployee(kpi_year,appraisal_period_id,department_id,position_id,role_id='All');
									$("#approveModal").modal({backdrop: 'static', keyboard: false});
								}
								
							});
						  
						  
					});
				//EDIT For Approve kpi END

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
										$("#image_file_display").html("<img style=\"opacity:0.1\" class=\"img-circle\" src=\"../View/uploads/avatar.jpg\" width=\"150\" height=\"150\">");
									}else{
										$("#image_file_display").html("<img class=\"img-circle\" src=\""+data[0]["emp_picture"]+"\" width=\"150\" height=\"150\">");
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

				//actionNewEvaluate start
				$(".actionNewEvaluate").click(function(){
					var  data_id=this.id.split("-");
					var kpi_year=data_id[1];
					var appraisal_period_id=data_id[2];
					var department_id=data_id[3];
					var position_id=data_id[4];
					var emp_id=data_id[5];


					//if(confirm("ยืนยันการส่งพนักงานไปประเมินใหม่")){
						$.confirm({
							theme: 'bootstrap', // 'material', 'bootstrap'
							title: 'ยืนยัน!',
							content: 'ยืนยันการส่งพนักงานไปประเมินใหม่?',
							buttons: {
							
							'ยืนยัน': {
							btnClass: 'btn-blue',
							action: function(){
								$.ajax({
									url:"../Model/mApproveKpi.php",
									type:"post",
									dataType:"json",
									headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
									data:{
										"year":kpi_year,
										"appraisal_period_id":appraisal_period_id,
										"department_id":department_id,
										"position_id":position_id,
										"employee_id":emp_id,
										"action":"newEvaluateAction"
										 },
									success:function(data){
										
										
										if(data[0]=="success"){
											
											showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_role"));
										}
										
									}
									
								});
							}
							},
							'ยกเลิก': function () {}
							}
							});
						
					//}
						
				   
			   });


				
				//actionNewEvaluate end
				//actionApproveKPI Action start

				$(".actionApproveKPI").click(function(){
					$("#warningInModal").hide();
					 var  data_id=this.id.split("-");
					 var kpi_year=data_id[1];
					 var appraisal_period_id=data_id[2];
					 var department_id=data_id[3];
					 var position_id=data_id[4];
					 var emp_id=data_id[5];
					 
					
					 
					 
					/* 
					 alert(empDepId);
					 alert(empPositionId);
					 */
					 //if(confirm("ยืนยันการอนุมัติผลประเมิน?")){
						$.confirm({
							theme: 'bootstrap', // 'material', 'bootstrap'
							title: 'ยืนยัน!',
							content: 'ยืนยันการอนุมัติผลประเมิน?',
							buttons: {
							
							'ยืนยัน': {
							btnClass: 'btn-blue',
							action: function(){
							
								$.ajax({
									url:"../Model/mApproveKpi.php",
									type:"post",
									dataType:"json",
									headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
									data:{
										"year":kpi_year,
										"appraisal_period_id":appraisal_period_id,
										"department_id":department_id,
										"position_id":position_id,
										"employee_id":emp_id,
										"total_score_percentage":$("#total_score_percentage-"+emp_id).text(),	
										"action":"approveKpiAction"
										 },
									success:function(data){
										//alert(data);
										
										if(data[0]=="approveSuccess"){
											//alert("Approve KPI Successfully");
											//showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
											showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_role"));
										}
										
									}
									
								});


							}
							},
							'ยกเลิก': function () {}
							}
							});

					     
					 //}
					     
					//alert(emp_id);
				});
				//actionApproveKPI Action start
				 
				
				
			}
			
		});
	}
var search_approve_kpi_Fn = function(){
	
		$(".emb_param").remove();

		sessionStorage.setItem("param_year", $("#ApproveYear").val());
		sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_approve_kpi").val());
		sessionStorage.setItem("param_department", $("#approve_department_id").val());
		sessionStorage.setItem("param_position", $("#approve_position_id").val());
		sessionStorage.setItem("param_role", $("#approve_role_id").val());

		// $("body").append("<input type='hidden' name='year_emb' class='emb_param' id='year_emb' value='"+$("#ApproveYear").val()+"'>");
		// $("body").append("<input type='hidden' name='appraisal_period_id_emb' class='emb_param' id='appraisal_period_id_emb' value='"+$("#appraisal_period_approve_kpi").val()+"'>");
		// $("body").append("<input type='hidden' name='department_id_emb' class='emb_param' id='department_id_emb' value='"+$("#approve_department_id").val()+"'>");
		// $("body").append("<input type='hidden' name='position_id_emb' class='emb_param' id='position_id_emb' value='"+$("#approve_position_id").val()+"'>");
		showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_role"));
		
		$(".employeeData").show();
		$(".displayHideShow").show();

		
		
}

//search data end
//dropdown List Department start
var fnDropdownListApproveDep=function(department_id,paramSelectAll){

	$.ajax({
		url:"../Model/mDepartmentList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":paramSelectAll},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"approve_department_id\" name=\"approve_department_id\" class=\" \" >";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					if(department_id==indexEntry[0]){
						
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						
					}else{
						
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						
					}
					
				});
			htmlDropDrowList+="</select>";
			
			$("#approveDepDropDrowListArea").html(htmlDropDrowList);

			if($("#embed_emp_role_leve").val()=="Level2"){
				$("#approve_department_id").prop("disabled",true);
			}else{
				$("#approve_department_id").prop("disabled",false);
			}

			$("#approve_department_id").kendoDropDownList({
					theme: "silver"
				});
			//persDropDrowList
		}
	});
}	
fnDropdownListApproveDep('','selectAll');
//dropdown List Department start
//dropdown List Position start

var fnDropdownListApprovePosition=function(position_id,paramSelectAll){
	
	$.ajax({
		url:"../Model/mPositionList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":paramSelectAll},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"approve_position_id\" name=\"approve_position_id\" class=\" \" >";
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
			
			$("#approvePositionArea").html(htmlDropDrowList);

				
			
			if($("#embed_emp_role_leve").val()=="Level2"){
					$("#approve_position_id").val($("#embed_role_underling_position_id").val()).prop("disabled",true);
			}else{
					$("#approve_position_id").prop("disabled",false);
			}
			/*
			$("#position1").change(function(){
				
				fnDropdownListEmployee($(this).val());
			});
			*/

			$("#approve_position_id").kendoDropDownList({
				theme: "silver"
			});
			
			
		}
	});
}	
//fnDropdownListPosition();
//dropdown List Position end
//dropdown List role start
var fnDropdownListAppraisalRole=function(role_id){

	$.ajax({
		url:"../Model/mRoleList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":"selectAll"},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"approve_role_id\" name=\"approve_role_id\" class=\"\" style='width:120px;' >";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					if(role_id==indexEntry[0]){
						
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						
					}else{
						
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						
					}
					
				});
			htmlDropDrowList+="</select>";
			
			$("#roleDropDrowListArea").html(htmlDropDrowList);

			if($("#embed_emp_role_level_id").val()==2){
				$("#approve_role_id").prop("disabled",true);
			}else{
				$("#approve_role_id").prop("disabled",false);
			}

			$("#approve_role_id").kendoDropDownList({
					theme: "silver"
				});
			//persDropDrowList
		}
	});
}

$(document).ready(function(){

	//##################################### AppralisalPeriod list start ########################
	var fnDropdownListAppralisalApproveKpi=function(year,appraisal_period_id){
		
		$.ajax({
			url:"../Model/mAppralisalPeriodList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"year":year},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"appraisal_period_approve_kpi\" name=\"appraisal_period_approve_kpi\"  class=\" \" style=\"width:auto;\" >";
					$.each(data,function(index,indexEntry){
						if(appraisal_period_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#periodApproveArea").html(htmlDropDrowList);
				$("#appraisal_period_approve_kpi").kendoDropDownList({
					theme: "silver"
				});
				//persDropDrowList
			}
		});
	}	

	//##################################### AppralisalPeriod list start ########################
	//##################################### appraisalYearArea list start ########################
	var paramApproveYear=function(kpi_year){
		//alert("Year");

		$.ajax({
			url:"../Model/mAppraisalYearList.php",
			type:"post",
			dataType:"json",
			async:false,
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"ApproveYear\" name=\"ApproveYear\" class=\"\" style=\"width:auto;\" >";
					$.each(data,function(index,indexEntry){
						if(kpi_year!=undefined){
							if(kpi_year==indexEntry[0]){
								htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[0]+"</option>";	
							}else{
								htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[0]+"</option>";
							}
							
						}else{
							if(indexEntry[1]==1){
								htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[0]+"</option>";	
							}else{
								htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[0]+"</option>";
							}
						}
					});
				htmlDropDrowList+="</select>";
				//alert(htmlDropDrowList);
				$("#approveKpiYearArea").html(htmlDropDrowList);
				$("#ApproveYear").kendoDropDownList({
					theme: "silver"
				});
				//dropdown year change action start
				$("#ApproveYear").change(function(){
					
					/*
					if(($("#year_emb").val()!=undefined) && ($("#appraisal_period_id_emb").val()!=undefined) ){
						fnDropdownListAppralisalApproveKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val());
					}else{
						fnDropdownListAppralisalApproveKpi($(this).val());
					}
					*/
					fnDropdownListAppralisalApproveKpi($(this).val());
					$("#paramYearEmb").val($(this).val());	
				});
				
				$("#ApproveYear").change();
					
			}
		});
	}
	//paramYear();
	
	if($("#paramYearEmb").val()!=undefined){

			paramApproveYear($("#paramYearEmb").val());
		}else{

			paramApproveYear();
		}
	
	//##################################### appraisalYearArea list start ########################
	//##################################### parameter list start ########################
	
	//dropdown year change action start
	/*
	$("#year").change(function(){
		fnDropdownListAppralisal($(this).val());
	});
	$("#year").change();
	*/
	
	fnDropdownListApprovePosition($("#position_id_emb").val(),"selectAll");
	fnDropdownListDep( $("#department_id_emb").val(),"selectAll");
	//fnDropdownListDiv( $("#division_id_emb").val());
	fnDropdownListKPI();
	fnDropdownListEmployee();
	fnDropdownListAppraisalRole();
	//###################################### parameter list end #########################

	var resetDataApproveKpi=function(){
		

		$("#warningInModal").hide();
		$("#adjust_percentage").val("");
		$("#adjust_reason").val("");
		
		
	}

	//showDataEmployee("All","All","All","All","All");
	//showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
	

	/*Search data for approve data start*/
	/*
	$("#approve_kpi_search").click(function(){

		$(".emb_param").remove();
		$("body").append("<input type='hidden' name='year_emb' class='emb_param' id='year_emb' value='"+$("#year").val()+"'>");
		$("body").append("<input type='hidden' name='appraisal_period_id_emb' class='emb_param' id='appraisal_period_id_emb' value='"+$("#appraisal_period_approve_kpi").val()+"'>");
		$("body").append("<input type='hidden' name='department_id_emb' class='emb_param' id='department_id_emb' value='"+$("#department_id").val()+"'>");
		$("body").append("<input type='hidden' name='position_id_emb' class='emb_param' id='position_id_emb' value='"+$("#position_id").val()+"'>");
		showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
		$(".employeeData").show();
		$(".displayHideShow").show();
		
	});
	$("#approve_kpi_search").click();
	*/

	$("body").off("change","#ApproveYear");
	$("body").on("change","#ApproveYear",function(){
		//alert(1);
		search_approve_kpi_Fn();
	});

	$("body").off("change","#appraisal_period_approve_kpi");
	$("body").on("change","#appraisal_period_approve_kpi",function(){
		//alert(2);
		search_approve_kpi_Fn();
	});

	$("body").off("change","#approve_department_id");
	$("body").on("change","#approve_department_id",function(){
		//alert(3);
		search_approve_kpi_Fn();
	});

	$("body").off("change","#approve_position_id");
	$("body").on("change","#approve_position_id",function(){
		//alert(4);
		search_approve_kpi_Fn();
	});

	$("body").off("change","#approve_role_id");
	$("body").on("change","#approve_role_id",function(){
		//alert(5);
		search_approve_kpi_Fn();
	});
	

	search_approve_kpi_Fn();
	/*Search data for approve data end*/
	
	//validate form start
	var validateApprovedFn=function(){
		
		var validate="";
		


		if(!$.isNumeric($("#adjust_percentage").val())){
			validate+="ปรับคะแนนต้องเป็นตัวเลขเท่านั้น <br>";
		}


	 	
	 	
	 	return validate;
	}
 	//validate form end
	
	//Form Approve Edit Start
	$("#btnSubmit").click(function(){
		
		if(validateApprovedFn()!=""){
			
			warningInModalFn("#warningInModalArea",validateApprovedFn());
			return false;
		}else{
		
		$.ajax({
			url:"../Model/mApproveKpi.php",
			type:"post",
			dataType:"json",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			data:{"year":sessionStorage.getItem("param_year"),
			"appraisal_period_id":sessionStorage.getItem("param_appraisal_period"),
			"employee_id":$("#employee_id_emb").val(),
			"adjust_percentage":$("#adjust_percentage").val(),
			"adjust_reason":$("#adjust_reason").val(),
			"action":"editAction"
				},
			success:function(data){
				
				if(data[0]=="updateSuccess"){
					

					if($("#embed_language").val()=="th"){
						//alert("ปรับคะแนนเรียบร้อย");
					}else{
						//alert("Adjust performance Success.");
					}


					resetDataApproveKpi();
					showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_role"));
					$("#approveModal").modal('hide');
				}else{
					//alert("เกิดข้อผิดพลาด");
					$.alert({
						buttons: {
						'ปิด': function () {}
						},
						title: 'แจ้งเตือน!',
						content: 'เกิดข้อผิดพลาด',
						});
				}
				
			}
			
		});
	}
		return false;
	});
	//Form Approve Edit End
	
	
	
	

});