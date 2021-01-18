//search data start

	var showDataEmployee=function(year,appraisal_period_id,department_id,position_id){
		//alert(department_id);
		$.ajax({
			url:"../Model/mApproveKpi.php",
			type:"post",
			dataType:"html",
			data:{"action":"showEmpData","year":year,"appraisal_period_id":appraisal_period_id,"department_id":department_id,"position_id":position_id},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				$("#employeeShowData").html(data);
				
				 $("#Tableemployee").kendoGrid({
                    /// height: 350,
                     sortable: true,
                     pageable: {
                         refresh: true,
                         pageSizes: true,
                         buttonCount: 5
                     },
                 });
				 setGridTable();
				 
				//alert(data);
				 
				//Edit For Approve kpi START
					$(".actionApproveEditKPI").click(function(){
						
						 var emp_id=this.id.split("-");
						 emp_id=emp_id[1];
						  var  empDepId =$("#depId-"+emp_id).text();
						  var  empPositionId =$("#positionId-"+emp_id).text();
						  
						  $("#employee_id_emb").remove();
						  $("#dep_approve_id_emb").remove();
						  $("#position_approve_id_emb").remove();
						  
						  $("body").append("<input type='hidden' name='employee_id_emb' class='emp_param' id='employee_id_emb' value='"+emp_id+"'>");
						  $("body").append("<input type='hidden' name='dep_approve_id_emb' class='emp_param' id='dep_approve_id_emb' value='"+empDepId+"'>");
						  $("body").append("<input type='hidden' name='position_approve_id_emb' class='emp_param' id='position_approve_id_emb' value='"+empPositionId+"'>");
						  
						 // alert($("#employee_id_emb").val());
						  $.ajax({
								url:"../Model/mApproveKpi.php",
								type:"post",
								dataType:"json",
								headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
								data:{
								"year":sessionStorage.getItem("param_year"),
								"appraisal_period_id":sessionStorage.getItem("param_appraisal_period"),
								"employee_id":$("#employee_id_emb").val(),
								"action":"edit"
								},
								success:function(data){
									
									$(".formAdjust").show();
									$("#adjust_reason").val(data[0]['adjust_reason']);
									$("#adjust_percentage").val(data[0]['adjust_percentage']);
									showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());

									$("#approveModal").modal('show');

								}
								
							});
						  
						  
					});
				//EDIT For Approve kpi END
					
				//actionApproveKPI Action start
				$(".actionApproveKPI").click(function(){
					 var  emp_id=this.id.split("-");
					      emp_id=emp_id[1];
					 var  empDepId =$("#depId-"+emp_id).text();
					 var  empPositionId =$("#positionId-"+emp_id).text();
					 
					 
					/* 
					 alert(empDepId);
					 alert(empPositionId);
					 */
					 if(confirm("Do You Want to Confirm Approve KPI?")){
					     $.ajax({
								url:"../Model/mApproveKpi.php",
								type:"post",
								dataType:"json",
								headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
								data:{
									"year":sessionStorage.getItem("param_year"),
									"appraisal_period_id":sessionStorage.getItem("param_appraisal_period"),
									"position_id":empPositionId,
									"employee_id":emp_id,
									"department_id":empDepId,
									"total_score_percentage":$("#total_score_percentage-"+emp_id).text(),	
									"action":"approveKpiAction"
									 },
								success:function(data){
									//alert(data);
									
									if(data[0]=="approveSuccess"){
										//alert("Approve KPI Successfully");
										//showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
										showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
									}
									
								}
								
							});
					 }
					     
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

		// $("body").append("<input type='hidden' name='year_emb' class='emb_param' id='year_emb' value='"+$("#ApproveYear").val()+"'>");
		// $("body").append("<input type='hidden' name='appraisal_period_id_emb' class='emb_param' id='appraisal_period_id_emb' value='"+$("#appraisal_period_approve_kpi").val()+"'>");
		// $("body").append("<input type='hidden' name='department_id_emb' class='emb_param' id='department_id_emb' value='"+$("#approve_department_id").val()+"'>");
		// $("body").append("<input type='hidden' name='position_id_emb' class='emb_param' id='position_id_emb' value='"+$("#approve_position_id").val()+"'>");
		showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
		
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
			console.log(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"approve_department_id\" name=\"approve_department_id\" class=\"form-control input-sm\" >";
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
fnDropdownListApproveDep();
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
			console.log(data);
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"approve_position_id\" name=\"approve_position_id\" class=\"form-control input-sm\" >";
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
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"appraisal_period_approve_kpi\" name=\"appraisal_period_approve_kpi\"  class=\"form-control input-sm\" style=\"width:auto;\" >";
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
				htmlDropDrowList+="<select id=\"ApproveYear\" name=\"ApproveYear\" class=\"form-control input-sm\" style=\"width:auto;\" >";
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
	
	//###################################### parameter list end #########################

	var resetDataApproveKpi=function(){
		

		
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
	search_approve_kpi_Fn();
	/*Search data for approve data end*/
	

	
	//Form Approve Edit Start
	$("#btnSubmit").click(function(){
		/*
		alert("score="+$("#score").val());
		alert("reason="+$("#reason").val());
		alert("year_emb="+$("#year_emb").val());
		alert("appraisal_period_id_emb="+$("#appraisal_period_id_emb").val());
		alert("department_id_emb="+$("#department_id_emb").val());
		alert("division_id_emb="+$("#division_id_emb").val());
		alert("position_id_emb="+$("#position_id_emb").val());
		alert("employee_id_emb="+$("#employee_id_emb").val());
		*/
		
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
				//alert(data);
				if(data[0]=="updateSuccess"){
					

					if($("#embed_language").val()=="th"){
						alert("ปรับคะแนนเรียบร้อย");
					}else{
						alert("Adjust performance Success.");
					}


					resetDataApproveKpi();
					showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
					$("#approveModal").modal('hide');
				}else{
					alert("Error");
				}
				
			}
			
		});
		return false;
	});
	//Form Approve Edit End
	
	
	
	

});