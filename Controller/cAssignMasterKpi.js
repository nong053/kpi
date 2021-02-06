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
			console.log(data);
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
			console.log(data);
			
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
	var fnDropdownListAppralisalAssignKpi=function(year,appraisal_period_id){
		//alert(year);
		$.ajax({
			url:"../Model/mAppralisalPeriodList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"year":year},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				console.log(data);
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
var paramAssignYear=function(kpi_year){
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
	



	
//appraisalYearArea
var fnDropdownListYearInform=function(kpi_year){
	//alert("Year");

	$.ajax({
		url:"../Model/mAppraisalYearList.php",
		type:"post",
		dataType:"json",
		async:false,
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"yearInform\" name=\"yearInform\" class=\"\" style=\"width:auto;\">";
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
			
			$("#assignYearInformArea").html(htmlDropDrowList);
			$("#yearInform").kendoDropDownList({
			theme: "silver"
			});
			
			$("#yearInform").change(function(){
				//alert($(this).val());
				fnDropdownListAppralisalAssignKpiInForm($(this).val(),sessionStorage.getItem("param_appraisal_period"));
				//$("#paramYearEmb").val($(this).val());	
			});
			$("#yearInform").change();
				
		}
	});
}





//paramYear();
//dropdown List Position start
var fnDropdownListPositionInform=function(position_id){
	
	$.ajax({
		url:"../Model/mPositionList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":"selectAll"},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			//console.log(data);
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"assignPositionInform\" name=\"assignPositionInform\" class=\"\" >";
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
			
			$("#assignPositionInformArea").html(htmlDropDrowList);
			$("#assignPositionInform").kendoDropDownList({
					theme: "silver"
				});
			
			//persDropDrowList
			
		}
	});
}	

//dropdown List Position end

//dropdown List Employee start

var fnDropdownListEmpInform=function(department_id,position_id,paramSelectAll='selectAll',emp_id){

	
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
			console.log(data);
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"assignEmpInform\" name=\"assignEmpInform\" class=\"\" >";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					
					if(emp_id==indexEntry[0]){
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
					}else{
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
					}
					
					
					
				});
			htmlDropDrowList+="</select>";
			
			$("#empAssignInformArea").html(htmlDropDrowList);
			$("#assignEmpInform").kendoDropDownList({
					theme: "silver"
				});
			
			
		}
	});
}
//dropdown List Employee end


//dropdown List Department start
var fnDropdownListDepInform=function(department_id){

	$.ajax({
		url:"../Model/mDepartmentList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":"selectAll"},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			console.log(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"assignDepartmentInform\" name=\"assignDepartmentInform\" class=\"\" >";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					if(department_id==indexEntry[0]){
						
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						
					}else{
						
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						
					}
					
				});
			htmlDropDrowList+="</select>";
			
			$("#assignDepartmentInformArea").html(htmlDropDrowList);

			$("#assignDepartmentInform").kendoDropDownList({
					theme: "silver"
				});
			//persDropDrowList
		}
	});
}	
//dropdown List Department END

//dropdown List AppralisalPeriod start
	var fnDropdownListAppralisalAssignKpiInForm=function(year,appraisal_period_id){
		
		$.ajax({
			url:"../Model/mAppralisalPeriodList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"paramSelectAll":"selectAll","year":year},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select  style='width:100px;'id=\"appraisal_period_assign_kpi_inform\" name=\"appraisal_period_assign_kpi_inform\" class=\"\" style=\"width:auto;\">";
				//htmlDropDrowList+="<option value=\"all\">ทั้งหมด</option>";
					$.each(data,function(index,indexEntry){
						if(appraisal_period_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				
				$("#assignAppraisalPeriodInformArea").html(htmlDropDrowList);

				$("#appraisal_period_assign_kpi_inform").kendoDropDownList({
					theme: "silver"
				});
				//persDropDrowList
			}
		});
	}	
	//check actual value is manual or query start


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
	var calculateKpiPercentage =function(year,appraisal_period_id,department_id,position_id,confirmKpi){
		
	$.ajax({
		url:"../Model/mAssignMasterKpi.php",
		type:"post",
		dataType:"json",
		data:{"action":"getKPIPercentage","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
			"position_id":position_id},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
				
				//alert(data[0]['confirm_flag']);

			
				
				var confirm_kpi="";
				if(data[0]['confirm_flag']=="N" || data[0]['confirm_flag']==""){
					confirm_kpi='<strong style=\"color:red\"> (ยังไม่ยืนยัน KPI)</strong>';
					$("#addAssignKPI").removeAttr("disabled");
					$("#kpi_process").removeAttr("disabled");
					//sessionStorage.setItem('confirm_flag', 'N');
				}else if(data[0]['confirm_flag']=="Y"){
					confirm_kpi='<strong style=\"color:green\"> (ยืนยัน KPI เรียบร้อย) </strong>';
					//sessionStorage.setItem('confirm_flag', 'Y');

					/* edit for customer 
					$("#addAssignKPI").attr("disabled","disabled");
					$("#kpi_process").attr("disabled","disabled");
					*/
				}
				if(confirmKpi=="notConfirmKpi"){
					$("#confirm_kpi").html(confirm_kpi);
					$("#score_sum_percentage").html("<strong style=\"color:red\">"+data[0]['total_kpi_actual_score']+"%<strong>");
				}else{
					$("#confirm_kpi").html(confirm_kpi);
					$("#score_sum_percentage").html("<strong style=\"color:green\">"+data[0]['total_kpi_actual_score']+"%<strong>");	
				}
		}
	});
	};
	/*calculte Percentage end*/
	var showDataEmpAssignKpi = function(department_id,position_id){
		
		
		
		
		$.ajax({
			url:"../Model/mAssignMasterKpi.php",
			type:"post",
			dataType:"html",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			data:{
				"action":"showEmpData",
				"department_id":department_id ,
				"position_id":position_id},
				async:false,
			success:function(data){
			
				$("#assignKpiToEmpShowData").html(data).show();
				
			}
			
		});
	}
	var showDataAssignKpi=function(year,appraisal_period_id,department_id,position_id){
		
		/*
		alert("year="+year);
		alert("appraisal_period_id="+appraisal_period_id);
		alert("department_id="+department_id);
		alert("position_id="+position_id);
		 */
		
		
		
		/*calculte weight kpi start*/
		$.ajax({
			url:"../Model/mAssignMasterKpi.php",
			type:"post",
			dataType:"json",
			data:{"action":"getSumWeightKpi","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
				"position_id":position_id},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			async:false,
			success:function(data){
			
				//fnDropdownAssignListKPI();
				//set empty value
				$("#confirm_kpi").html("");
				$("#score_sum_percentage").html("");
				$("#kpi_weight_total").html("");
				
				
				if(parseInt(data[0]['kpi_weight'])==100){
					
					$("#kpi_weight_total").html("<strong style=\"color:green\">"+data[0]['kpi_weight']+"%<strong>");
					calculateKpiPercentage(year,appraisal_period_id,department_id,position_id,"confirmKpi");
					
				}else{
					
					$("#kpi_weight_total").html("<strong style=\"color:red\">"+data[0]['kpi_weight']+"%<strong>");
					calculateKpiPercentage(year,appraisal_period_id,department_id,position_id,"notConfirmKpi");
					
				}
				
				
				
			}
		});
		/*calculte weight kpi end*/
		
		
		$.ajax({
			url:"../Model/mAssignMasterKpi.php",
			type:"post",
			dataType:"html",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			data:{"action":"showData","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
				"position_id":position_id},
				async:false,
			success:function(data){
			
				$("#assignKpiShowData").html(data).show();
				$("#formKPI").show();
				// $("#TableassignKpi").kendoGrid({
				// 	 /*
                //      height: 250,
                //      sortable: true,
                //      pageable: {
                //          refresh: true,
                //          pageSizes: true,
                //          buttonCount: 5
                //      },
                //      */
                //  });
				 setGridTable();
				 //action del,edit start
				 $(".actionEdit").click(function(){
			
					 //alert(this.id);
					 
					 var idEdit=this.id.split("-");
					 var id=idEdit[1];
					 $.ajax({
							url:"../Model/mAssignMasterKpi.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
									"position_id":position_id},
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							success:function(data){
								
								//alert(data[0]["kpi_actual_manual"]);
								/*
								assign_kpi_id
								assign_kpi_year
								appraisal_period_id
								empId
								position_id
								
								kpi_id
								kpi_weight
								target_data
								kpi_type_actual
								kpi_actual_manual
								kpi_actual_query
								target_score

								*/
								
								
								//fnDropdownListAppralisalAssignKpi(data[0]['assign_kpi_year'],data[0]["appraisal_period_id"]);
							
								
								fnDropdownListYearInform(data[0]['assign_kpi_year']);
								fnDropdownListAppralisalAssignKpiInForm(data[0]['assign_kpi_year'],data[0]["appraisal_period_id"]);
								fnDropdownListDepInform(data[0]['department_id']);
								fnDropdownListPositionInform(data[0]['position_id']);
								fnDropdownListEmpInform(data[0]['department_id'],data[0]['position_id'],'selectAll',data[0]['emp_id']);

								fnDropdownAssignListKPI(data[0]["kpi_id"]);

								// department_id
								// assign_kpi_year
								// appraisal_period_id
								// assign_kpi_id

								kpiAction("edit");
								$("#kpi_id").change();
								
								
								
								$("#kpi_weight").val(data[0]["kpi_weight"]);
								$("#kpi_target_data").val(data[0]["target_data"]);
								$("#kpi_actual_manual").val(data[0]["kpi_actual_manual"]);
								$("#kpi_actual_query").val(data[0]["kpi_actual_query"]);
								$("#target_score").val(data[0]["target_score"]);
								
								$("#total_kpi_actual_score").val(data[0]["total_kpi_actual_score"]);
								$("#kpi_actual_score").val(data[0]["kpi_actual_score"]);
								$("#performance").val(data[0]["performance"]+"%");
								
								
								$("#assign_kpi_action").val("editAction");
								$("#assign_kpi_id").val(data[0]["assign_kpi_id"]);
								//$("#assign_kpi_submit").val("Edit");
								if($("#embed_language").val()=="th"){
									$("#assign_kpi_submit").val("แก้ไข");
								}else{
									$("#assign_kpi_submit").val("Edit");
								}
								
								$("#assignMasterKPIModal").modal("show");
								
								
								
								//showDataAssignKpi
								//showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#division_id_emb").val(),$("#position_id_emb").val(),$("#emp_assign_id_emb").val());
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
					 //alert("hello");
					 //alert(this.id);
					 var confrimDeleteMessage="";
					 if($("#embed_language").val()=="th"){
						confrimDeleteMessage="ยืนยันการลบข้อมูลนี้?";
					}else{
						confrimDeleteMessage="Do you want to delete this KPI?";
					}
				
					 
					 if(confirm(confrimDeleteMessage)){
						 var idDel=this.id.split("-");
						 var id=idDel[1];
						 var kpi_id=idDel[2];
						 $.ajax({
								url:"../Model/mAssignMasterKpi.php",
								type:"post",
								dataType:"json",
								headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
								data:{"id":id,"kpi_id":kpi_id,"action":"del","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
									"position_id":position_id},
								success:function(data){
									if(data[0]=="success"){
										
										showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
										
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
					//alert("hello"); 
					
					 var id=this.id.split("-");
					  id=id[1];
				
					  
					  $.ajax({
						  url:"../Model/mAssignMasterKpiParam.php",
							type:"post",
							dataType:"json",
							data:{"action":"showData","assign_kpi_id":id},
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							success:function(data){
								
							  /*
							  alert(data[0]["assign_kpi_year"]);
							  alert(data[0]["appraisal_period_id"]);
							  alert(data[0]["position_id"]);
							  alert(data[0]["perspective_id"]);
							  */
							
							  showDataResultKpi(data[0]["assign_kpi_year"],data[0]["appraisal_period_id"],data[0]["position_id"],data[0]["perspective_id"],data[0]["emp_id"],id);
						  }
					  });
					  
					//showDataResultKpi();
					  
				 });
				 //PRESS actionkpiResult END
			}
			
		});
	}

var searchAssignMasterKPIFn = function(){
		
		if($("#appraisal_period_assign_kpi").val()==null){
			alert("กรุณากำหนดช่วงการประเมิน");
		}
		if($("#assign_department_id").val()==null){
			alert("กรุณากำหนดแผนก");
		}
		if($("#assign_position_id").val()==null){
			alert("กรุณากำหนดตำแน่ง");
		}
		
		$(".emb_param").remove();

		// $("body").append("<input type='hidden' name='year_emb' class='emb_param' id='year_emb' value='"+$("#year").val()+"'>");
		// $("body").append("<input type='hidden' name='appraisal_period_id_emb' class='emb_param' id='appraisal_period_id_emb' value='"+$("#appraisal_period_assign_kpi").val()+"'>");
		// $("body").append("<input type='hidden' name='department_id_emb' class='emb_param' id='department_id_emb' value='"+$("#department_id").val()+"'>");
		// $("body").append("<input type='hidden' name='position_id_emb' class='emb_param' id='position_id_emb' value='"+$("#position_id").val()+"'>");
		
		sessionStorage.setItem("param_year", $("#assign_year").val());
		sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_assign_kpi").val());
		sessionStorage.setItem("param_department", $("#assign_department_id").val());
		sessionStorage.setItem("param_position", $("#assign_position_id").val());
		sessionStorage.setItem("param_emp", $("#assign_employee_id").val());

		//parameter send to year,appraisal_period_id,department_id,position_id
		//showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
		showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
		
		
		$(".displayHideShow").show();

		
		if($(".embed_confirm_flag").val()=='Y'){
			/*edit for customer 
			$("#addAssignKPI").attr("disabled","disabled");
			$("#kpi_process").attr("disabled","disabled");
			*/
			
		}else{
			$("#addAssignKPI").removeAttr("disabled");
			$("#kpi_process").removeAttr("disabled");
		}

	}

$(document).ready(function(){




	
	
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
		//alert($(this).val());
		
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
			//alert("1");
		}
		//$("#areaKPIActual").html(htmlActual);
	});
	
	//check actual value is manual or query end
	
	//##################################### parameter list start ########################
	
	
	//dropdown year change action end
	/*

	 $("#appraisal_period_id_emb").val(),
	 $("#department_id_emb").val(),
	 $("#division_id_emb").val(),
	 $("#position_id_emb").val());
	*/
	fnDropdownListAssignPosition(sessionStorage.getItem("param_position"),"");
	fnDropdownListAsignEmployee(sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),"selectAll");
	
	//fnDropdownListDep( $("#department_id_emb").val(),"selectAll");
	
	if($("#depDisable").val()!=undefined){
		fnDropdownListAsignDep($("#departmentIdEmp").val());
		//fnDropdownListDep($("#departmentIdEmp").val(),"selectAll");
		$("#department_id").prop('disabled', 'disabled');
	}else{
		//fnDropdownListDep( $("#department_id_emb").val(),"selectAll");
		fnDropdownListAsignDep( sessionStorage.getItem("param_department"),"");
	}
	
	//fnDropdownListDiv( $("#division_id_emb").val());
	//fnDropdownAssignListKPI();
	//fnDropdownListEmployee();
	
	
	
	//###################################### parameter list end #########################

	/*
	 $year =$_POST['year'];
	$appraisal_period_id = $_POST['appraisal_period_id'];
	$department_id=$_POST['department_id'];
	$division_id=$_POST['division_id'];
	$position_id =$_POST['position_id'];
	

	$assign_kpi_id = $_POST['assign_kpi_id'];
	$kpi_id=$_POST['kpi_id'];
	
	 */
	
	
	
	
	
	

	showDataEmpAssignKpi(sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
	//showDataAssignKpi();
	


	/*Search data for assign data start*/
	$("#assign_kpi_search").click(function(){

	/*
	appraisal_period_assign_kpi
	department_id
	position_id
	*/

		if($("#appraisal_period_assign_kpi").val()==null){
			alert("กรุณากำหนดช่วงการประเมิน");
		}
		if($("#assign_department_id").val()==null){
			alert("กรุณากำหนดแผนก");
		}
		if($("#assign_position_id").val()==null){
			alert("กรุณากำหนดตำแน่ง");
		}
		
		$(".emb_param").remove();
		$("body").append("<input type='hidden' name='year_emb' class='emb_param' id='year_emb' value='"+$("#year").val()+"'>");
		$("body").append("<input type='hidden' name='appraisal_period_id_emb' class='emb_param' id='appraisal_period_id_emb' value='"+$("#appraisal_period_assign_kpi").val()+"'>");
		$("body").append("<input type='hidden' name='department_id_emb' class='emb_param' id='department_id_emb' value='"+$("#department_id").val()+"'>");
		$("body").append("<input type='hidden' name='position_id_emb' class='emb_param' id='position_id_emb' value='"+$("#position_id").val()+"'>");
		//parameter send to year,appraisal_period_id,department_id,position_id
		showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
		
		
		$(".displayHideShow").show();

		
		if($(".embed_confirm_flag").val()=='Y'){
			/*edit for customer 
			$("#addAssignKPI").attr("disabled","disabled");
			$("#kpi_process").attr("disabled","disabled");
			*/
			
		}else{
			$("#addAssignKPI").removeAttr("disabled");
			$("#kpi_process").removeAttr("disabled");
		}

		//$("#empNameArea").empty();
		//$(".employeeData").show();
		
	});
	/*Search data for assign data end*/
	
	$("form#AssignKpiForm").submit(function(){

		/*
		alert("department_id="+$("#department_id").val());
		alert("division_id="+$("#division_id").val());
		alert("position_id="+$("#position_id").val());
	
		alert("kpi_id="+$("#kpi_id").val());
		alert("kpi_weight="+$("#kpi_weight").val());
		alert("kpi_target_data="+$("#kpi_target_data").val());
		alert("kpi_type_actual="+$(".kpi_type_actual:checked").val());
		alert("kpi_actual_manual="+$("#kpi_actual_manual").val());
		alert("kpi_actual_query="+$("#kpi_actual_query").val());
		alert("target_score="+$("#target_score").val());
	*/
	//alert("hello1");
	/*
	year
	appraisal_period_id
	position1
	
	perspective
	 */
		//department_id_emb
		//position_id_emb
		 var depId=sessionStorage.getItem("param_department");
		 var positionId=sessionStorage.getItem("param_position");
		 
	
		 
		$.ajax({
			url:"../Model/mAssignMasterKpi.php",
			type:"post",
			dataType:"json",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			data:{

			

			"year":$("#yearInform").val(),
			"appraisal_period_id":$("#appraisal_period_assign_kpi_inform").val(),
			"department_id":$("#assignDepartmentInform").val(),
			"position_id":$("#assignPositionInform").val(),
			"emp_id":$("#assignEmpInform").val(),


			"kpi_id":$("#kpi_id").val(),
			"kpi_weight":$("#kpi_weight").val(),"kpi_target_data":$("#kpi_target_data").val(),"kpi_type_actual":$(".kpi_type_actual:checked").val(),
			"kpi_actual_manual":$("#kpi_actual_manual").val(),"kpi_actual_query":$("#kpi_actual_query").val(),"target_score":$("#target_score").val(),
			"total_kpi_actual_score":$("#total_kpi_actual_score").val(),
			"kpi_actual_score":$("#kpi_actual_score").val(),"performance":$("#performance").val(),
			"action":$("#assign_kpi_action").val(),"assign_kpi_id":$("#assign_kpi_id").val()
				},
			success:function(data){
				if(data[0]=="success"){
					//alert("บันทึกข้อมูลเรียบร้อย");	
					//showDataAssignKpi();
					showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),depId,positionId,$("#emp_assign_id_emb").val());
					resetDataAssignKpi(false);	
					$("#assignMasterKPIModal").modal("hide");

				}else if(data[0]=="key-duplicate"){
					

					if($("#embed_language").val()=="th"){
						alert("ชื่อตัวชี้วัดซ้ำ");
					}else{
						alert("KPI Name is Duplicated.");
					}
				}
				if(data[0]=="editSuccess"){
					//alert("แก้ไขข้อมูลเรียบร้อย");	
					//showDataAssignKpi();
					showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),depId,positionId,$("#emp_assign_id_emb").val());
					resetDataAssignKpi(false);	
					$("#assignMasterKPIModal").modal("hide");
				}
				
				
			}
			
		});
		  
		
		
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
				htmlGridKpiResult+="<table id=\"tableKpiResult\">";
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
	
	
	// kpiAction();
	// $("#kpi_id").change();
	
	
	/*kpi_actual_manual fill status start*/
	$("#kpi_actual_manual").keyup(function(){
		var performance="";
		//alert($("#kpi_weight").val());
		$.ajax({
			url:"../Model/mAssignMasterKpi.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"action":"getKpiScore","kpi_id":$("#kpi_id").val(),"kpi_actual_manual":$(this).val()},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				
				  //alert(data[0]["baseline_score"]);
				
				 
				  $("#kpi_actual_score").val(data[0]["baseline_score"]);
				  //performance or percentage = (actual/target)*100;
				  performance= (parseInt($("#kpi_actual_score").val())/parseInt($("#target_score").val())*100)
				  //alert(performance);
				  $("#performance").val(performance+"%");
				  
				  	
				  
				
			}
		});
		//calculate  total_kpi_actual_score
		
		var kpi_weight=parseFloat($("#kpi_weight").val());
		var kpi_actual_manual=parseFloat($(this).val());
		var kpi_percentage=parseFloat(performance);
		var total_kpi_actual_score=parseFloat(kpi_percentage*kpi_weight).toFixed(2);
		$("#total_kpi_actual_score").val(total_kpi_actual_score);
	});
	/*kpi_actual_manual fill status start*/
	
	/*kpi_weight action start*/
	
	$("#kpi_weight").keyup(function(){
		var kpi_weight=parseFloat($(this).val());
		var kpi_actual_manual=parseFloat($("#kpi_actual_manual").val());
		var kpi_percentage=parseFloat($("#performance").val());
		$("#total_kpi_actual_score").val(kpi_percentage*kpi_weight);
		
	});
	
	/*kpi_weight action end*/
	/*kpi_actual_manual action start*/
	/*
	$("#kpi_actual_manual").keyup(function(){
		
		var kpi_weight=parseFloat($("#kpi_weight").val());
		var kpi_actual_manual=parseFloat($(this).val());
		var total_kpi_actual_score=parseFloat(kpi_actual_manual*kpi_weight).toFixed(2);
		$("#total_kpi_actual_score").val(total_kpi_actual_score);
		
	});
	*/
	/*kpi_actual_manual action end*/
	
	/* KPI Process Start*/
		$("#kpi_process").click(function(){
			
			
			 //department_id_emb
			 //position_id_emb
			 
			//alert($("#kpi_weight_total").text());
			if(parseInt($("#kpi_weight_total").text())==100){

				
				$.ajax({
					url:"../Model/mAssignMasterKpi.php",
					type:"post",
					dataType:"json",
					headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
					data:{"year":sessionStorage.getItem("param_year"),"appraisal_period_id":sessionStorage.getItem("param_appraisal_period"),
						"department_id":sessionStorage.getItem("param_department"),
						"position_id":sessionStorage.getItem("param_position"),"score_sum_percentage":$("#score_sum_percentage").text(),
							"action":"confrimKpi"},
					success:function(data){
						
						  if(data[0]=="success"){
							 // alert("กำหนด KPI เรียบร้อย");
							  	if($("#embed_language").val()=="th"){
									alert("กำหนดตัวชี้วัดเรียบร้อย");
								}else{
									alert("Define KPI is succeed.");
								}
								
							  showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),$("#emp_assign_id_emb").val());
							  $("#assignMasterKPIModal").modal("hide");
						  }
							
						
					}
				});
				
				//alert("weight 100");
				
			}else{
				
				if($("#embed_language").val()=="th"){
					alert("น้ำหนักตัวชี้วัดไม่เท่ากับ 100%");
				}else{
					alert("Weight KPI  not equals to 100%");
				}
				
			}
			
			
		});
	/* KPI Process End*/
		
		
	/*Assign KPI START*/
		
		

		
//sessionStorage.getItem("param_year")
		if(sessionStorage.getItem("param_year")!=null){
			paramAssignYear(sessionStorage.getItem("param_year"));
		}else{

			paramAssignYear();
		}

		//paramYear();
	
		//action click actual data by manaul or query start
		$(".kpi_type_actual").click(function(){
			if($(this).val()=="1"){
				alert("For premium package.");
				$("#actual_manual").click();
			}
		});
		//action click actual data by manaul or query end


		
		$("#addAssignKPI").click(function(){

			if($("#appraisal_period_assign_kpi").val()==null){
				alert("กรุณากำหนดช่วงการประเมิน");
				return false;
			}
			if($("#assign_department_id").val()==null){
				alert("กรุณากำหนดแผนก");
				return false;
			}
			if($("#assign_position_id").val()==null){
				alert("กรุณากำหนดตำแน่ง");
				return false;
			}

			resetDataAssignKpi();
			fnDropdownAssignListKPI();

			
			

			fnDropdownListYearInform(sessionStorage.getItem("param_year"));
			fnDropdownListAppralisalAssignKpiInForm(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
			fnDropdownListDepInform(sessionStorage.getItem("param_department"));
			fnDropdownListPositionInform(sessionStorage.getItem("param_position"));
			fnDropdownListEmpInform(sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),'selectAll',sessionStorage.getItem("param_emp"));

			$("#assignMasterKPIModal").modal("show");
			kpiAction();
		    $("#kpi_id").change();
		});

		//add assign kpi end




	//parameter search binding chaange action start
	$("#assign_year").change(function(){
		
		searchAssignMasterKPIFn();
	});
	$("#appraisal_period_assign_kpi").change(function(){
		searchAssignMasterKPIFn();
	});
	$("#assign_department_id").change(function(){
		searchAssignMasterKPIFn();
	});
	$("#assign_position_id").change(function(){
		searchAssignMasterKPIFn();
	});

	$("#assign_employee_id").change(function(){
		searchAssignMasterKPIFn();
	});
	//parameter search binding chaange action end	

	searchAssignMasterKPIFn();

		//Default Submit

		//$("#assign_kpi_search").click();




		

});