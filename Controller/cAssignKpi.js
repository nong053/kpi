/*KPI lIST START*/
var getBaseLineAction=function(action){
		
		
				
		$.ajax({
			url:"../Model/mAssignMasterKpi.php",
			type:"post",
			dataType:"json",
			data:{"action":"getDataBaseline","kpi_id":$("#kpi_id").val()},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
		
				
				  $("#kpi_target_data").val(data[0]["kpi_target_data"]);
				  $("#target_score").val(data[0]["target_score"]);
				  
				  if(action!="edit"){
					$("#kpi_actual_manual").val("0.00");
					$("#kpi_actual_score").val("0.00");
					$("#performance").val("0.00%");
					$("#total_kpi_actual_score").val("0.00");
				  }

			}
		});
		
		//Get Baseline For Fill Score Start
		$.ajax({
			url:"../Model/mAssignMasterKpi.php",
			type:"post",
			dataType:"html",
			data:{"action":"getAllDataBaseline","kpi_id":$("#kpi_id").val()},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				// alert(data);
				$("#baseLineArea").html(data).show();
				  /*baseLineArea*/

			}
		});
		
		
	
	
	/*KPI lIST END*/
}
//dropdown List AppralisalPeriod start
	var fnDropdownListAppralisalAssignEvaluateKpi=function(year,appraisal_period_id){
		//alert(year);
		$.ajax({
			url:"../Model/mAppralisalPeriodList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{
				"year":year,
				//"paramSelectAll":"selectAll",
			},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"appraisal_period_assign_evaluate_kpi\" name=\"appraisal_period_assign_evaluate_kpi\" class=\"\" style=\"width:100%;\">";
					$.each(data,function(index,indexEntry){
						if(appraisal_period_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#periodAssignArea").html(htmlDropDrowList);
				$("#appraisal_period_assign_evaluate_kpi").kendoDropDownList({
					theme: "silver"
					});
				//persDropDrowList
			}
		});
	}	

//dropdown List Department start
var fnDropdownListAppraisalDep=function(department_id,paramSelectAll){

	$.ajax({
		url:"../Model/mDepartmentList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":paramSelectAll},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"appraisal_department_id\" name=\"appraisal_department_id\" class=\"\" style='width:100%;' >";
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

			if($("#embed_emp_role_level_id").val()==2){
				$("#appraisal_department_id").prop("disabled",true);
			}else{
				$("#appraisal_department_id").prop("disabled",false);
			}

			$("#appraisal_department_id").kendoDropDownList({
					theme: "silver"
				});
			//persDropDrowList
		}
	});
}	

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
			htmlDropDrowList+="<select id=\"appraisal_role_id\" name=\"appraisal_role_id\" class=\"\" style='width:100%;' >";
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
				$("#appraisal_role_id").prop("disabled",true);
			}else{
				$("#appraisal_role_id").prop("disabled",false);
			}

			$("#appraisal_role_id").kendoDropDownList({
					theme: "silver"
				});
			//persDropDrowList
		}
	});
}	


//dropdown List Department start
var fnDropdownListAppraisalPosition=function(position_id,paramSelectAll){
	
	$.ajax({
		url:"../Model/mPositionList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":paramSelectAll},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"appraisal_position_id\" name=\"appraisal_position_id\" class=\"\" style='width:100%;' >";
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
			
			$("#positionAppaisalArea").html(htmlDropDrowList);

			if($("#embed_emp_role_leve").val()=="Level2"){
					$("#appraisal_position_id").val($("#embed_role_underling_position_id").val()).prop("disabled",true);
			}else{
					$("#appraisal_position_id").prop("disabled",false);
			}

			$("#appraisal_position_id").kendoDropDownList({
					theme: "silver"
				});

			// $("#position1").change(function(){
				
			// 	fnDropdownListEmployee($(this).val());
			// });
			//persDropDrowList
			
		}
	});
}	
//fnDropdownListPosition();
//dropdown List Position end

var kpi_process_fn = function(){
	if($(".contentassignKpi tr").get().length!=$(".complete_kpi_score_flag").get().length){
	 		alert("Please fill score completed, "+$(".contentassignKpi tr").get().length+" KPI.");
	 		return false;
	 		}else{
	 		//alert("OK fill score completed, "+$(".contentassignKpi tr").get().length+" KPI.");
	 		}

			if(parseInt($("#kpi_weight_total").text())==100){

				
				$.ajax({
					url:"../Model/mAssignKpi.php",
					type:"post",
					dataType:"json",
					data:{
					"year":sessionStorage.getItem("param_year"),
					"appraisal_period_id":sessionStorage.getItem("param_appraisal_period"),
					"department_id":$("#dep_assign_id_emb").val(),
					"position_id":$("#position_assign_id_emb").val(),
					"employee_id":$("#emp_assign_id_emb").val(),
					"score_sum_percentage":$("#score_sum_percentage").text(),
					"action":"confrimKpi"},
					headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
					async:false,
					success:function(data){
						
						  if(data[0]=="success"){
							  //alert("ประเมินเรียบร้อย");
							  showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),$("#dep_assign_id_emb").val(),$("#position_assign_id_emb").val(),$("#emp_assign_id_emb").val());
							  showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),depId,positionId,sessionStorage.getItem("param_role"));
						  	  $("#formKPI").hide();
						  	  $('#assignResultKPIModal').modal('hide');
						  }
							
						
					}
				});
				
				//alert("weight 100");
				
			}else{
				
				alert("Weight KPI ไม่เท่ากับ 100");
				
			}
}

/*kpi_actual_manual fill status start*/
var calculate_kpi_score_by_manual_fn = function(kpi_actual_manual){

		var kpi_actual_manual_not_commar= parseInt(kpi_actual_manual.replace(",", ""));
		var performance="";
		//alert($("#kpi_weight").val());
		$.ajax({
			url:"../Model/mAssignKpi.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"action":"getKpiScore","kpi_id":$("#kpi_id").val(),"kpi_actual_manual":kpi_actual_manual_not_commar},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				
				 
				  $("#kpi_actual_score").val(data[0]["baseline_score"]);
				  //performance or percentage = (actual/target)*100;
				  performance= (parseInt($("#kpi_actual_score").val())/parseInt($("#target_score").val())*100);
				  $("#performance").val(performance+"%");


				  $("#check_complete_kpi_score-"+$("#kpi_id").val()).parent().addClass('complete_kpi_score');
				  $("#check_complete_kpi_score-"+$("#kpi_id").val()).parent().parent().css({"background":"green","color":"white"});
				  
				  
			}
		});
		//calculate  total_kpi_actual_score
		var kpi_weight=parseFloat($("#kpi_weight").val());
		var kpi_actual_manual=parseFloat(kpi_actual_manual);
		var kpi_percentage=parseFloat(performance);
		var total_kpi_actual_score=parseFloat(kpi_percentage*kpi_weight).toFixed(2);
		$("#total_kpi_actual_score").val(total_kpi_actual_score);
	}
	/*kpi_actual_manual fill status start*/
	//dropdown List KPI start
var fngetKpiName=function(kpi_id){
	//alert(kpi_id);
	$.ajax({
		url:"../Model/mKpiList.php",
		type:"post",
		dataType:"json",
		async:false,
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			
			var htmTextKPI="";
			
				$.each(data,function(index,indexEntry){
					if(kpi_id==indexEntry[0]){
						
						htmTextKPI=indexEntry[1];
					}
					
				});

			
			$("#kpiDropDrowListArea").html(htmTextKPI);

			$("#paramEmbedAssignKPI").html("<input type='hidden' id='kpi_id' name='kpi_id'  value='"+kpi_id+"'>");


			//$("#kpiDropDrowListArea").html(htmlDropDrowList);
			
			
			
		}
	});
}	
	/*calculte kpi Percentage start*/
	var calculateKpiPercentage =function(year,appraisal_period_id,department_id,position_id,employee_id,confirmKpi){
		
	$.ajax({
		url:"../Model/mAssignKpi.php",
		type:"post",
		dataType:"json",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		data:{"action":"getKPIPercentage","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
			"position_id":position_id,"employee_id":employee_id},
		success:function(data){
				
				//alert(data[0]['confirm_flag']);
				
				var confirm_kpi="";
				if(data[0]['confirm_flag']=="N" || data[0]['confirm_flag']==""){
					confirm_kpi='<strong style=\"color:red\"> (!!ยังไม่ยืนยันการประเมิน)</strong>';
					$("#kpi_process").show();

					$("#score_sum_percentage").css({"color":"red"});
					showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_role"));
					//$("#score_sum_percentage").css({"color":"red"});
					
				}else if(data[0]['confirm_flag']=="Y"){
					
					confirm_kpi='<strong style=\"color:green\"> (ยืนยันการประเมินเรียบร้อย) </strong>';
					$("#kpi_process").hide();
					$("#score_sum_percentage").css({"color":"green"});
					
					
					//$("#score_sum_percentage").css({"color":"green"});
				}
				if(confirmKpi=="notConfirmKpi"){
					$("#confirm_kpi").html(confirm_kpi);
					$("#score_sum_percentage").html(data[0]['total_kpi_actual_score']+"%");
				}else{
					$("#confirm_kpi").html(confirm_kpi);
					$("#score_sum_percentage").html(data[0]['total_kpi_actual_score']+"%");	
				}
		}
	});
	};
	/*calculte Percentage end*/

var manageFn = function(this_id,actionType){


 	if(actionType=="addScore"){

 			$("#assign_kpi_reset").hide();
 			if($("#embed_language").val()=="th"){
				$("#assign_kpi_submit").val("บันทึก");
			}else{
				$("#assign_kpi_submit").val("Save");
			}
 			$("#formKPI").show();
 			
 	}else if(actionType=="edit"){
 			$("#assign_kpi_reset").show();
 			$("#kpi_process").show();
 			if($("#embed_language").val()=="th"){
				$("#assign_kpi_submit").val("แก้ไข");
			}else{
				$("#assign_kpi_submit").val("Edit");
			}
	 }
	
	//Get Baseline For Fill Score Start
	
	 var this_id = this_id.split("-");
	 var year=this_id[1];
	 var appraisal_period_id=this_id[2];
	 var department_id=this_id[3];
	 var position_id=this_id[4];
	 var emp_id=this_id[5];
	 var kpi_id=this_id[6];


	 
	 
	 $.ajax({
			url:"../Model/mAssignKpi.php",
			type:"post",
			dataType:"json",
			data:{
					
				"year":year,
				"appraisal_period_id":appraisal_period_id,
				"department_id":department_id,
				"position_id":position_id,
				"employee_id":emp_id,
				"kpi_id":kpi_id,
				"action":"edit"
			},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				
				
				//fngetKpiName(data[0]["kpi_id"]);
				$("#kpiDropDrowListArea").html(data[0]["kpi_name"]);
				$("#paramEmbedAssignKPI").html("<input type='hidden' id='kpi_id' name='kpi_id'  value='"+data[0]["kpi_id"]+"'>");
				
				getBaseLineAction("edit");
				//$("#kpi_id").change();
				//fnDropdownListEmployee($("#position_id").val(),data[0]["empId"]);
				
				
				$("#kpi_weight").val(data[0]["kpi_weight"]);
				$("#kpi_target_data").val(data[0]["target_data"]);
				$("#kpi_actual_manual").val(data[0]["kpi_actual_manual"]);
				$("#kpi_actual_query").val(data[0]["kpi_actual_query"]);
				$("#target_score").val(data[0]["target_score"]);
				

				if(data[0]["total_kpi_actual_score"]==""){

					$("#total_kpi_actual_score").val(0);	
				}else{

					$("#total_kpi_actual_score").val(data[0]["total_kpi_actual_score"]);
				}

				if(data[0]["kpi_actual_score"]==""){

					$("#kpi_actual_score").val(0);	
				}else{

					$("#kpi_actual_score").val(data[0]["kpi_actual_score"]);
				}

				if(data[0]["performance"]==""){

					$("#performance").val(0+"%");	
				}else{

					$("#performance").val(data[0]["performance"]+"%");
				}
/*
				$("#total_kpi_actual_score").val(data[0]["total_kpi_actual_score"]);
				$("#kpi_actual_score").val(data[0]["kpi_actual_score"]);
				$("#performance").val(data[0]["performance"]+"%");
*/				
				
				$("#assign_kpi_action").val("editAction");
				$("#assign_kpi_id").val(data[0]["assign_kpi_id"]);

			
				var kpi_actual_manual_typ_1="";
				var kpi_actual_manual_typ_2="";
				var kpi_actual_manual_typ_3="";

				kpi_actual_manual_typ_3+="<select style='width:100%' id=\"kpi_actual_manual\" class=\"kpi_actual_manual\" >";
					kpi_actual_manual_typ_3+="<option value=\"5\">ผ่าน</option>";
					kpi_actual_manual_typ_3+="<option value=\"0\">ไม่ผ่าน</option>";
				kpi_actual_manual_typ_3+="</select>";
				kpi_actual_manual_typ_3+="<input id=\"kpi_type_score\" value=\"3\"  style='display:none;' ></input>";

				kpi_actual_manual_typ_2+="<select style='width:100%' id=\"kpi_actual_manual\" class=\"kpi_actual_manual\" >";
					kpi_actual_manual_typ_2+="<option value=\"0\">0 คะแนน</option>";
					kpi_actual_manual_typ_2+="<option value=\"1\">1 คะแนน</option>";
					kpi_actual_manual_typ_2+="<option value=\"2\">2 คะแนน</option>";
					kpi_actual_manual_typ_2+="<option value=\"3\">3 คะแนน</option>";
					kpi_actual_manual_typ_2+="<option value=\"4\">4 คะแนน</option>";
					kpi_actual_manual_typ_2+="<option value=\"5\">5 คะแนน</option>";
				kpi_actual_manual_typ_2+="</select>";
				kpi_actual_manual_typ_2+="<input id=\"kpi_type_score\" value=\"2\"  style='display:none;' ></input>";

				kpi_actual_manual_typ_1+="<input id=\"kpi_actual_manual\" name=\"kpi_actual_manual\" placeholder='หน่วย:"+data[0]["kpi_unit"]+"' value=\"\"  class=\"kpi_actual_manual form-control\"></input>";
				kpi_actual_manual_typ_1+="<input id=\"kpi_type_score\" value=\"1\"  style='display:none;' ></input>";					
			
				$("#kpi_unit").html("(หน่วย:"+data[0]["kpi_unit"]+")");
												

													
				if(data[0]["kpi_type_score"]==1){
					$("#dataAreaKpiTypeScore").html(kpi_actual_manual_typ_1);
				}else if(data[0]["kpi_type_score"]==2){
					$("#dataAreaKpiTypeScore").html(kpi_actual_manual_typ_2);
				}else if(data[0]["kpi_type_score"]==3){
					$("#dataAreaKpiTypeScore").html(kpi_actual_manual_typ_3);
				}
				
				if(data[0]["kpi_actual_manual"]==""){

					$("#kpi_actual_manual").val(0);	
				}else{

					$("#kpi_actual_manual").val(data[0]["kpi_actual_manual"]);	
				}
				
				
			}
	 });
	 
	 
	 
	};

var showDataEmployee=function(year,appraisal_period_id,department_id,position_id,role_id){
	
		$.ajax({
			url:"../Model/mAssignKpi.php",
			type:"post",
			dataType:"html",
			async:false,
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			data:{"action":"showEmpData",
			"year":year,"appraisal_period_id":appraisal_period_id
			,"department_id":department_id,"position_id":position_id,
			"role_id":role_id
		},
			success:function(data){
				$("#employeeShowData").html(data);
			
				  //$("#Tableemployee").kendoGrid({
                    // height: 350,
                    //  sortable: true,
                    //  pageable: {
                    //      refresh: true,
                    //      pageSizes: true,
                    //      buttonCount: 5
                    //  },
                 // });
				 setGridTable();
				 
				
				 //PRESS approvedKpi  START
				 $(".approvedKpi").click(function(){
					 alert("อนุมัติผลการประเมินแล้ว ไม่สามารถประเมินได้");
				 });
				 //PRESS approvedKpi  END
				 //actionBackToAssign start
				 $(".actionBackToAssign").click(function(){
					var idAssignKPI=this.id.split("-");
					var typeButton=idAssignKPI[0];
					var year=idAssignKPI[1];
					var appraisal_period_id=idAssignKPI[2];
					var department_id=idAssignKPI[3];
					var position_id=idAssignKPI[4];
					var empId=idAssignKPI[5];


					//if(confirm("ยืนยันการมอบหมายตัวชี้วัดใหม่")){
						$.confirm({
							theme: 'bootstrap', // 'material', 'bootstrap'
							title: 'ยืนยัน!',
							content: 'ยืนยันเพื่อทำการมอบหมายตัวชี้วัดใหม่',
							buttons: {
							
							'ยืนยัน': {
							btnClass: 'btn-blue',
							action: function(){

								$.ajax({
									url:"../Model/mAssignKpi.php",
									type:"post",
									dataType:"json",
									headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
									data:{"action":"backToAssignKPI","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
										"position_id":position_id,"employee_id":empId},
									success:function(data){
										
										if("success"==data[0]){
											//alert("มอบหมายตัวชี้วัดใหม่");
											showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_role"));
										}else{

											$.alert({
												buttons: {
												'ปิด': function () {}
												},
												title: 'แจ้งเตือน!',
												content: 'เกิดข้อผิดพลาดไม่สามารถกลับไปมอบหมายตัวชี้วัดใหม่ได้',
												});
											//alert("ไม่สามารถลบข้อมูลได้");
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
				 //actionBackToAssign end

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
				//actionAssignKPI
					$(".actionAssignKPI").click(function(){
						
						 var idAssignKPI=this.id.split("-");
						 var typeButton=idAssignKPI[0];
						 var year=idAssignKPI[1];
						 var appraisal_period_id=idAssignKPI[2];
						 var department_id=idAssignKPI[3];
						 var position_id=idAssignKPI[4];
						 var empId=idAssignKPI[5];
						 var roleId=idAssignKPI[6];
						 $("#warningInModal").hide();
						
						/*
						 var depId=$("#depId-"+empId).text();
						 var positionId=$("#positionId-"+empId).text();
						 */
						 /*
						 $("#emp_assign_id_emb").remove();
						 $("#dep_assign_id_emb").remove();
						 $("#position_assign_id_emb").remove();
						*/
						 /*Embeded Parameter to use.*/
						/*
						 $("body").append("<input type='hidden' name='emp_assign_id_emb' class='emp_param' id='emp_assign_id_emb' value='"+empId+"'>");
						 $("body").append("<input type='hidden' name='dep_assign_id_emb' class='emp_param' id='dep_assign_id_emb' value='"+depId+"'>");
						 $("body").append("<input type='hidden' name='position_assign_id_emb' class='emp_param' id='position_assign_id_emb' value='"+positionId+"'>");
						*/
						
						 /*
						assign_kpi_year
						assign_kpi_appraisal_period
						assign_kpi_department
						assign_kpi_position
						assign_kpi_emp
						*/
						 $("#assign_kpi_year").val(year);
						 $("#assign_kpi_appraisal_period").val(appraisal_period_id);
						 $("#assign_kpi_department").val(department_id);
						 $("#assign_kpi_position").val(position_id);
						 $("#assign_kpi_emp").val(empId);
						 $("#assign_kpi_role_id").val(roleId);

							
							// Copy KPI Assign Master to KPI Assign Auto Matic START
							/*
							$.ajax({
								url:"../Model/mAssignKpi.php",
								type:"post",
								dataType:"json",
								async:false,
								headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
								data:{"action":"copyAssignMasterKpi","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
									"position_id":position_id,"employee_id":empId},
								success:function(data){
									showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),depId,positionId,empId);
								}
							});
							*/
							
							// Copy KPI Assign Master to KPI Assign Auto Matic END
							 //year,appraisal_period_id,department_id,position_id,empId

							showDataAssignKpi(year,appraisal_period_id,department_id,position_id,empId);
							if(typeButton=='readyForEvaluate'){
								$(".actionAddScore").prop("disabled",false);
							}else{
								$(".actionAddScore").prop("disabled",true);
							}
							
							
							$("#assignKpiShowData").show();
							//$("#formKPI").show();
							$("#formKPI").hide();
							//$(".actionAssignKPI").parent().parent().css({"background":"white"});
							//$(this).parent().parent().css({"background":"#ddd"});
							
							var empName=$("#fullName-"+empId).html();
							var empDepartment=$("#depName-"+empId).text();
							var empPosition=$("#positionName-"+empId).text();

							
							var imageEmp="";
							
							imageEmp+="<img class='img-circle' src='"+$("#image_emp_data-"+empId).attr("src")+"' width='100px;' style='opacity:0.1'>";

							var empAreaData="";
							empAreaData+="<div class=''>";
								empAreaData+="<div class='impageEmpClass' >";
									empAreaData+=imageEmp;
								empAreaData+="</div>";
								empAreaData+="<div class='infoEmpClass'>";
									empAreaData+="<span class='empName1'>"+empName+"</span><br>";
									//empAreaData+="ตำแหน่ง:"+empPosition+"<br>";
									//empAreaData+="แผนก:"+empDepartment+"<br>";
									
								empAreaData+="</div>";

							empAreaData+="</div>";

							if($("#embed_language").val()=="th"){
								//$("#empNameArea").html(imageEmp+"<br><b>ผู้รับการประเมิน : "+empName+"</b>");
								$("#empNameArea").html(empAreaData);
							}else{
								$("#empNameArea").html(imageEmp+"<br><b>Appraisal Result : "+empName+"</b>");
							}

							//$("#empNameArea").html("<b>Appraisal KPI Result : "+empName+"</b>");
							$("#form_appraisal_year").html($("#assign_kpi_year").val());
							$("#form_appraisal_time").html($("#appraisal_period_assign_evaluate_kpi option:selected").text());
							
							//resetDataAssignKpi();
							$("#assignResultKPIModal").modal({backdrop: 'static', keyboard: false});

							
							
					});
				/*Assign KPI END*/
				 
				/*Romove Asign KPIs Start*/
					$(".actionRemoveAssign").click(function(){
						 var idAssignKPI=this.id.split("-");
						 var year=idAssignKPI[1];
						 var appraisal_period_id=idAssignKPI[2];
						 var department_id=idAssignKPI[3];
						 var position_id=idAssignKPI[4];
						 var empId=idAssignKPI[5];
						
						 $.ajax({
								url:"../Model/mAssignKpi.php",
								type:"post",
								dataType:"json",
								headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
								data:{"action":"removeAssignKPIs","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
									"position_id":position_id,"employee_id":empId},
								success:function(data){
									
									
									if("success"==data[0]){

										$.alert({
											buttons: {
											'ปิด': function () {}
											},
											title: 'แจ้งเตือน!',
											content: 'ยกเลิกการมอบหมายตัวชี้วัดเรียบร้อย',
											});

										showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_role"));
									}else{

										$.alert({
											buttons: {
											'ปิด': function () {}
											},
											title: 'แจ้งเตือน!',
											content: 'ไม่สามารถยกเลิกการมอบหมายตัวชี้วัดได้',
											});
										
									}
								}
						 });
						
						 
					});
				/*Romove Asign KPIs Start*/
					
					
				
				
			}
			
		});
	}

var showDataAssignKpi=function(year,appraisal_period_id,department_id,position_id,employee_id){
		
		
		
	
		/*calculte weight kpi start*/
		$.ajax({
			url:"../Model/mAssignKpi.php",
			type:"post",
			dataType:"json",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			async:false,
			data:{"action":"getSumWeightKpi","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
				"position_id":position_id,"employee_id":employee_id},
			success:function(data){
				
				//set empty value
				$("#confirm_kpi").html("");
				$("#score_sum_percentage").html("");
				$("#kpi_weight_total").html("");
				
				if(parseInt(data[0]['kpi_weight'])==100){
					
					$("#kpi_weight_total").html("<strong style=\"color:green\">"+data[0]['kpi_weight']+"%<strong>");
					calculateKpiPercentage(year,appraisal_period_id,department_id,position_id,employee_id,"confirmKpi");
					
				}else{
					
					$("#kpi_weight_total").html("<strong style=\"color:red\">"+data[0]['kpi_weight']+"%<strong>");
					calculateKpiPercentage(year,appraisal_period_id,department_id,position_id,employee_id,"notConfirmKpi");
					
				}
				
				
				
			}
		});
		/*calculte weight kpi end*/
		
		
		$.ajax({
			url:"../Model/mAssignKpi.php",
			type:"post",
			dataType:"html",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			data:{

				"action":"showData",
				"year":year,
				"appraisal_period_id":appraisal_period_id ,
				"department_id":department_id ,
				"position_id":position_id,
				"employee_id":employee_id
			},
			async:false,
			success:function(data){
				$("#assignKpiShowData").html(data);
				
				/// $("#TableassignKpi").kendoGrid({
					/*	 
                     height: 250,
                     sortable: true,
                     pageable: {
                         refresh: true,
                         pageSizes: true,
                         buttonCount: 5
                     },
                    */
				 //});
				 
				 setGridTable();

				 $(".complete_kpi_score_flag").parent().parent().css({"background":"#339933","color":"white"});
				 
				 //action del,edit start
				 $(".actionEdit").click(function(){

					manageFn(this.id,actionType='edit');

				 });

				 $(".actionAddScore").click(function(){
					$("#addScoreModal").modal('show');
					$("#formKPI").show();
				 	manageFn(this.id,actionType='addScore');
				
				 });
				 
				 
				 $(".actionDel").click(function(){
					
					 if(confirm("Do you want to delete this KPI?")){
						 var idDel=this.id.split("-");
						 var id=idDel[1];
						 $.ajax({
								url:"../Model/mAssignKpi.php",
								type:"post",
								dataType:"json",
								headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
								data:{"id":id,"action":"del","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
									"position_id":position_id,"employee_id":employee_id},
								success:function(data){
									if(data[0]=="success"){
										alert("ลบข้อมูลเรียบร้อย");	
										//showDataAssignKpi();
										showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),$("#emp_assign_id_emb").val());
										//showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id").val(),$("#department_id").val(),$("#position_id").val(),$("#employee_id").val());
										showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_role"));
									}
								}
						 });
					 }
					 
				 });
				 //action del,edit end
				 
				 //PRESS RESET SRART
				 $("#assign_kpi_reset").click(function(){
					 resetDataAssignKpi();
				 });
				 //PRESS RESET END
				 
				
				 
				 //PRESS actionkpiResult START
				 $(".actionkpiResult").click(function(){
				
					
					 var id=this.id.split("-");
					  id=id[1];
				
					  
					  $.ajax({
						  url:"../Model/mAssignKpiParam.php",
							type:"post",
							dataType:"json",
							data:{"action":"showData","assign_kpi_id":id},
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							success:function(data){
								
							 
							
							  showDataResultKpi(data[0]["assign_kpi_year"],data[0]["appraisal_period_id"],data[0]["position_id"],data[0]["perspective_id"],data[0]["emp_id"],id);
						  }
					  });
					  
					//showDataResultKpi();
					  
				 });
				 //PRESS actionkpiResult END
			}
			
		});
	}

var assign_kpi_search_fn = function(){

	$(".emb_param").remove();

		sessionStorage.setItem("param_year", $("#appraisal_year").val());
		sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_assign_evaluate_kpi").val());
		sessionStorage.setItem("param_department", $("#appraisal_department_id").val());
		sessionStorage.setItem("param_position", $("#appraisal_position_id").val());
		sessionStorage.setItem("param_role", $("#appraisal_role_id").val());
		
		// $("body").append("<input type='hidden' name='year_emb' class='emb_param' id='year_emb' value='"+$("#year").val()+"'>");
		// $("body").append("<input type='hidden' name='appraisal_period_id_emb' class='emb_param' id='appraisal_period_id_emb' value='"+$("#appraisal_period_assign_kpi").val()+"'>");
		// $("body").append("<input type='hidden' name='department_id_emb' class='emb_param' id='department_id_emb' value='"+$("#department_id").val()+"'>");
		// $("body").append("<input type='hidden' name='position_id_emb' class='emb_param' id='position_id_emb' value='"+$("#position_id").val()+"'>");
		
		
		showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_role"));
		//showDataAssignKpi();
		$("#empNameArea").empty();
		$(".employeeData").show();
		$(".displayHideShow").show();

}
var savePerformanceFn = function(){
	

	if($("#kpi_actual_manual").val()==""){
		alert('กรุณาการผลการปฏิบัติงาน');
		
		return false;
	}
	

	// if($(".complete_kpi_score").get().length<1){
	// 	alert("กรุณากรอกผลการประเมินให้ครบ");
	// 	return false;
	// }
	
   
	
	
   $.ajax({
	   url:"../Model/mAssignKpi.php",
	   type:"post",
	   dataType:"json",
	   data:{
		   
	   "year":$("#assign_kpi_year").val(),
	   "appraisal_period_id":$("#assign_kpi_appraisal_period").val(),
	   "department_id":$("#assign_kpi_department").val(),
	   "position_id":$("#assign_kpi_position").val(),
	   "employee_id":$("#assign_kpi_emp").val(),
	   "kpi_id":$("#kpi_id").val(),
	   "kpi_weight":$("#kpi_weight").val(),
	   "kpi_target_data":$("#kpi_target_data").val(),
	   "kpi_type_actual":$(".kpi_type_actual:checked").val(),
	   "kpi_actual_manual":$("#kpi_actual_manual").val(),
	   "kpi_actual_query":$("#kpi_actual_query").val(),
	   "target_score":$("#target_score").val(),
	   "total_kpi_actual_score":$("#total_kpi_actual_score").val(),
	   "kpi_actual_score":$("#kpi_actual_score").val(),
	   "performance":$("#performance").val(),
	   "action":$("#assign_kpi_action").val(),
		"role_id":$("#assign_kpi_role_id").val(),
	   "complete_kpi_score_flag":"Y"
	   },
	   headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
	   success:function(data){
		   if(data[0]=="success"){
			   //alert("บันทึกข้อมูลเรียบร้อย");	
			   //showDataAssignKpi();
			   showDataAssignKpi($("#assign_kpi_year").val(),$("#assign_kpi_appraisal_period").val(),$("#assign_kpi_department").val(),$("#assign_kpi_position").val(),$("#assign_kpi_emp").val());
			   resetDataAssignKpi(false);	
		   }else if(data[0]=="key-duplicate"){
			   alert("ข้อมูลซ้ำ");
		   }
		   if(data[0]=="editSuccess"){
			   alert("บันทึกข้อมูลเรียบร้อย");	
			   //showDataAssignKpi();
			   showDataAssignKpi($("#assign_kpi_year").val(),$("#assign_kpi_appraisal_period").val(),$("#assign_kpi_department").val(),$("#assign_kpi_position").val(),$("#assign_kpi_emp").val());
			   $("#addScoreModal").modal('hide');  
			   //resetDataAssignKpi(false);	
			   //$("#formKPI").hide();
		   }
	   }
	   
   });
   
}


$(document).ready(function(){
	

//fnDropdownListKPI();

	$("#btn_add_score").click(function(){
		savePerformanceFn();		
		//calculate_kpi_score_by_manual_fn($("#kpi_actual_manual").val());
	});
	
	//check actual value is manual or query start
	
	var htmlActual="";
	if($("#actualManual" ).prop( "checked", true )){
		//htmlActual="<input type=\"text\" id=\"kpi_actual_manual\" name=\"kpi_actual_manual\">";
		$("#kpi_actual_manual").show();
		$("#kpi_actual_query").hide();
	}else{
		$("#kpi_actual_manual").hide();
		$("#kpi_actual_query").show();
		//htmlActual="<textarea id=\"kpi_actual_query\" name=\"kpi_actual_query\"></textarea>";
	}
	//$("#areaKPIActual").html(htmlActual);
	
	$(".kpi_type_actual").click(function(){
		
		
		if($(this).val()==0){
			
			//Manual
			$("#kpi_actual_manual").show();
			$("#kpi_actual_query").hide();
			//htmlActual="<input type=\"text\" id=\"kpi_actual_manual\" name=\"kpi_actual_manual\">";
		}else{
			//Query
			$("#kpi_actual_manual").hide();
			$("#kpi_actual_query").show();
			//htmlActual="<textarea id=\"kpi_actual_query\" name=\"kpi_actual_query\"></textarea>";
			
		}
		//$("#areaKPIActual").html(htmlActual);
	});
	
	//check actual value is manual or query end
	
	//##################################### parameter list start ########################
	
	
	
	fnDropdownListAppraisalPosition(sessionStorage.getItem("param_position"),"selectAll");

	
	if($("#embed_emp_role_level_id").val()==2){
		fnDropdownListAppraisalDep($("#emp_department_id").val());
		$("#appraisal_department_id").prop('disabled', true);
	}else{
		fnDropdownListAppraisalDep( sessionStorage.getItem("param_department"),"selectAll");
	}
	
	
	

	fnDropdownListAppraisalRole();
	
	
	
	//###################################### parameter list end #########################

	
	

	
	
	/*assign kpi all by loop employee start*/	
	$("#assign_kpi_all").click(function(){
		
		/*Embeded Parameter to use.*/
		/*
		$("#param_assign_kpi_all").remove();
		$("body").append("<input type='hidden' name='param_assign_kpi_all' class='param_assign_kpi_all' id='param_assign_kpi_all' value='param_assign_kpi_all'>");
			showDataAssignKpiAll($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val(),"0");
			$("#assignKpiShowData").show();
			$("#formKPI").show();
			var DepName="Department1";
			var PositionName="Position1";
			$("#empNameArea").html("<b>Assign KPIs To : Department:"+DepName+" | Position:"+PositionName+"</b>");
			resetDataAssignKpi();
		*/
			

	});
	/*assign kpi all by loop employee end*/
	
	
	
	//showDataEmployee("All","All","All","All","All");
	//showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
	

	

	
	
	//showDataAssignKpi();

	//assign_kpi_search_fn();
	setTimeout(function(){
		assign_kpi_search_fn();
	},500);
	
	/*Search data for assign data end*/
	$("form#AssignKpiForm").off("submit");
	$("form#AssignKpiForm").submit(function(){
	
		
		  save
		
		
		return false;
	});
	
	/*Table Baseline Start*/
	var TableBaseLine = function(kpi_year,appraisal_period_id){
		
		$.ajax({
			url:"../Model/mGetOwnerKpiResult.php",
			type:"get",
			dataType:"json",
			async:false,
			data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"action":"tableKpiResult"},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				//alert(data);
				var textJson="";
				textJson+="[";
				$.each(data,function(index,EntryIndex){
					$.ajax({
						url:"../Model/mDashboardDivision.php",
						type:"get",
						dataType:"json",
						async:false,
						data:{"kpi_year":kpi_year,"action":"score_spraph"},
						headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
						success:function(data){
							var score_spraph=data[0][0];
								if(index==0){
									textJson+="{";
								}else{
									textJson+=",{";
								}
					/*kpi_id,kpi_name,kpi_target,kpi_actual,kpi_performance*/
					
						textJson+="\"Field1\":\"<div class='textR'>"+EntryIndex[0]+"</div>\",";
						textJson+="\"Field2\":\"<div class=''>"+EntryIndex[1]+"</div>\",";
						textJson+="\"Field3\":\"<div class='textR'>"+parseFloat(EntryIndex[2]).toFixed(2)+"</div>\",";
						textJson+="\"Field4\":\"<div class='textR'>"+parseFloat(EntryIndex[3]).toFixed(2)+"</div>\",";
						textJson+="\"Field5\":\"<div class='lineSparkline'>"+score_spraph+"</div>\",";
						textJson+="\"Field6\":\"<div class='sparklineBullet'>"+EntryIndex[4]+",100,100,80</div>\",";
						textJson+="\"Field7\":\"<div class='textR'><center>"+getColorBall(EntryIndex[4])+"</center></div>\",";
					
					textJson+="}";
			
						}
					});
					
				});
				textJson+="]";
				//alert(textJson);
				var objJson2=eval("("+textJson+")");
				
				var htmlGridKpiResult="";
				// table grid start
				htmlGridKpiResult+="<table id=\"tableKpiResult\" class='grid table-striped table'>";
				htmlGridKpiResult+="<colgroup>";
				
						htmlGridKpiResult+="<col style=\"width:50px\" />";
						htmlGridKpiResult+="<col style=\"width:300px\"/>";
						htmlGridKpiResult+="<col style=\"width:80px\"/>";
						htmlGridKpiResult+="<col style=\"width:80px\"/>";
						htmlGridKpiResult+="<col style=\"width:80px\"/>";
						htmlGridKpiResult+="<col />";
						/*htmlGridKpiResult+="<col />";*/
						
						
				htmlGridKpiResult+="</colgroup>";
					htmlGridKpiResult+="<thead>";
						htmlGridKpiResult+="<tr>";
							htmlGridKpiResult+="<th data-field=\"Field1\"><b>CODE</b></th>";
							htmlGridKpiResult+="<th data-field=\"Field2\"><b>KPI NAME</b></th>";
							htmlGridKpiResult+="<th data-field=\"Field3\"><b> TARGET</b></th>";
							htmlGridKpiResult+="<th data-field=\"Field4\"><b> ACTUAL</b></th>";
							htmlGridKpiResult+="<th data-field=\"Field5\"><b> Graph</b></th>";
							htmlGridKpiResult+="<th data-field=\"Field6\"><b> Target</b></th>";
							htmlGridKpiResult+="<th data-field=\"Field7\"><b>PERFORMANCE</b></th>";
						htmlGridKpiResult+="</tr>";
					htmlGridKpiResult+="</thead>";
				htmlGridKpiResult+="<tbody>";
					htmlGridKpiResult+="<tr>";
						htmlGridKpiResult+="<td></td>";
							htmlGridKpiResult+="<td></td>";
							htmlGridKpiResult+="<td></td>";
							htmlGridKpiResult+="<td></td>";
							htmlGridKpiResult+="<td></td>";
							htmlGridKpiResult+="<td></td>";
							htmlGridKpiResult+="<td></td>";
							htmlGridKpiResult+="</tr> ";
					htmlGridKpiResult+="</tbody>";
				htmlGridKpiResult+="</table>";
	            // table grid end 
				$("#tableGridKpieResultArea").html(htmlGridKpiResult);
				
				$("#tableKpiResult").kendoGrid({
					 dataSource: {
				          data:objJson2 
				          },
			        sortable: true
			   	});
				
				$(".k-grid td").css({"padding":"0px;"});
				sparklineBulet(".sparklineBullet");
				sparklineLine(".lineSparkline");
			}
		});

	};
	/*Table Baseline End*/
	
	

	
	/*kpi_actual_manual fill status start*/
	$(document).on("keyup","#kpi_actual_manual",function(){

		calculate_kpi_score_by_manual_fn($(this).val());

	});
	$(document).on("change","#kpi_actual_manual",function(){

		calculate_kpi_score_by_manual_fn($(this).val());

	});

	/*kpi_actual_manual fill status end*/
	
	/*kpi_weight action start*/
	
	$("#kpi_weight").keyup(function(){
		var kpi_weight=parseFloat($(this).val());
		var kpi_actual_manual=parseFloat($("#kpi_actual_manual").val());
		var kpi_percentage=parseFloat($("#performance").val());
		$("#total_kpi_actual_score").val(kpi_percentage*kpi_weight);
		
	});
	
	
	/*kpi_actual_manual action end*/
	
	/* KPI Process Start*/
		$("#kpi_process").click(function(){
			
			/*
			 var depId=$("#dep_assign_id_emb").val();
			 var positionId=$("#position_assign_id_emb").val();
			 */
			//alert($("#kpi_weight_total").text());

			if($(".contentassignKpi tr").get().length!=$(".complete_kpi_score_flag").get().length){

	 		//alert("กรอกผลประเมินให้ครบทั้ง"+$(".contentassignKpi tr").get().length+"ตัวชี้วัด");
			 warningInModalFn("#warningInModalArea","ไม่สามารถยืนยันผลประเมินได้ เนื่องจากกรอกผลประเมินไม่ครบ");
			
			
	 		return false;
	 		}else{
	 		//alert("OK fill score completed, "+$(".contentassignKpi tr").get().length+" KPI.");
	 		}

			if(parseInt($("#kpi_weight_total").text())==100){

				
				$.ajax({
					url:"../Model/mAssignKpi.php",
					type:"post",
					dataType:"json",
					data:{
						"year":$("#assign_kpi_year").val(),
						"appraisal_period_id":$("#assign_kpi_appraisal_period").val(),
						"department_id":$("#assign_kpi_department").val(),
						"position_id":$("#assign_kpi_position").val(),
						"employee_id":$("#assign_kpi_emp").val(),
						"score_sum_percentage":$("#score_sum_percentage").text(),
						"role_id":$("#assign_kpi_role_id").val(),
						"action":"confrimKpi"
					},
					headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
					async:false,
					success:function(data){
						
						  if(data[0]=="success"){
							  //alert("ประเมินเรียบร้อย");
							  showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),$("#dep_assign_id_emb").val(),$("#position_assign_id_emb").val(),$("#emp_assign_id_emb").val());
							  showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_role"));
						  	  $("#formKPI").hide();
						  	  $('#assignResultKPIModal').modal('hide');
						  }
							
						
					}
				});
				
				//alert("weight 100");
				
			}else{
				
				alert("น้ำหนักตัวชี้วัดไม่เท่ากับ 100%");
				
			}
			
			
		});
	/* KPI Process End*/

		
		
	/*Assign KPI START*/
		
		//appraisalYearArea
		var paramAppraisalYear=function(kpi_year){
			//alert("Year");

			$.ajax({
				url:"../Model/mAppraisalYearList.php",
				type:"post",
				dataType:"json",
				async:false,
				headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
				success:function(data){
					
					var htmlDropDrowList="";
					htmlDropDrowList+="<select id=\"appraisal_year\" name=\"appraisal_year\" class=\"\" style=\"width:100%;\">";
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
					$(".assignKpiYearArea").html(htmlDropDrowList);
					$("#appraisal_year").kendoDropDownList({
					theme: "silver"
					});
					//dropdown year change action start
					$("#appraisal_year").change(function(){
						
						
						fnDropdownListAppralisalAssignEvaluateKpi($(this).val());
						//$("#paramYearEmb").val($(this).val());	
						sessionStorage.setItem("param_year", $("#appraisal_year").val());
					});
					
					$("#appraisal_year").change();
						
				}
			});
		}
		//paramYear();

		if(sessionStorage.getItem("param_year")!=null){
			paramAppraisalYear(sessionStorage.getItem("param_year"));
		}else{
			paramAppraisalYear();
		}

	
		//action click actual data by manaul or query start
		$(".kpi_type_actual").click(function(){
			if($(this).val()=="1"){
				alert("For premium package.");
				$("#actual_manual").click();
			}
		});
		//action click actual data by manaul or query end



		//change parameter action start

		$("#appraisal_year").change(function(){
			assign_kpi_search_fn();
		});

		$("#appraisal_period_assign_evaluate_kpi").change(function(){
			assign_kpi_search_fn();
		});

		$("#appraisal_department_id").change(function(){
			assign_kpi_search_fn();
		});

		$("#appraisal_position_id").change(function(){
			assign_kpi_search_fn();
		});

		$("#appraisal_role_id").change(function(){
			assign_kpi_search_fn();
		});

		



		//change parameter action end


/*
		$("body").off("click",".baseline_radio");
		$("body").on("click",".baseline_radio",function(){
			
			var arrayID=this.id;
			arrayID = arrayID.split("-");
			var id="";
			id=arrayID[1];
			

			$("#kpi_actual_manual").val($("#baseline_begin_result-"+id).text());
			calculate_kpi_score_by_manual_fn($("#baseline_begin_result-"+id).text());
			$("#formKPI").hide();

		});
*/
		




		$("body").off("click","#assignResultKPIModal  .close");
		$("body").on("click","#assignResultKPIModal  .close",function(){
			showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_role"));
			//showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
		});


		if(sessionStorage.getItem('checkMobile')=='mobile'){
		
		
			$(".pre-search-label").css({"padding-left":"0px"});
			$(".fontLabelParam").css({"text-align":"left"});
		}else{
			
			$(".pre-search-label").css({"padding-left":"15px"});
			$(".fontLabelParam").css({"text-align":"right"});
		}

});