$(document).ready(function(){

	//##################################### AppralisalPeriod list start ########################
	var fnDropdownListAppralisalApproveKpi=function(year,appraisal_period_id){
		
		$.ajax({
			url:"../Model/mAppralisalPeriodList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"year":year},
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
				//persDropDrowList
			}
		});
	}	

	//##################################### AppralisalPeriod list start ########################
	//##################################### appraisalYearArea list start ########################
	var paramYear=function(kpi_year){
		//alert("Year");

		$.ajax({
			url:"../Model/mAppraisalYearList.php",
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"year\" name=\"year\" class=\"form-control input-sm\" style=\"width:auto;\" >";
					$.each(data,function(index,indexEntry){
						if(kpi_year!=undefined){
							if(kpi_year==indexEntry[1]){
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
				//dropdown year change action start
				$("#year").change(function(){
					//alert($(this).val());
					/*
					if(($("#year_emb").val()!=undefined) && ($("#appraisal_period_id_emb").val()!=undefined) ){
						fnDropdownListAppralisalApproveKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val());
					}else{
						fnDropdownListAppralisalApproveKpi($(this).val());
					}
					*/
					fnDropdownListAppralisalApproveKpi($(this).val());
				});
				
				$("#year").change();
					
			}
		});
	}
	paramYear();
	
	//##################################### appraisalYearArea list start ########################
	//##################################### parameter list start ########################
	
	//dropdown year change action start
	/*
	$("#year").change(function(){
		fnDropdownListAppralisal($(this).val());
	});
	$("#year").change();
	*/
	
	fnDropdownListPosition($("#position_id_emb").val(),"selectAll");
	fnDropdownListDep( $("#department_id_emb").val(),"selectAll");
	//fnDropdownListDiv( $("#division_id_emb").val());
	fnDropdownListKPI();
	fnDropdownListEmployee();
	
	//###################################### parameter list end #########################

	var resetDataApproveKpi=function(){
		

		
		$("#adjust_percentage").val("");
		$("#adjust_reason").val("");
		
		
	}

	var showDataEmployee=function(year,appraisal_period_id,department_id,position_id){
		//alert(department_id);
		$.ajax({
			url:"../Model/mApproveKpi.php",
			type:"post",
			dataType:"html",
			data:{"action":"showEmpData","year":year,"appraisal_period_id":appraisal_period_id,"department_id":department_id,"position_id":position_id},
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
								data:{"year":$("#year_emb").val(),"appraisal_period_id":$("#appraisal_period_id_emb").val(),
									"employee_id":$("#employee_id_emb").val(),
									"action":"edit"
									 },
								success:function(data){
									
									$(".formAdjust").show();
									$("#adjust_reason").val(data[0]['adjust_reason']);
									$("#adjust_percentage").val(data[0]['adjust_percentage']);
									showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
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
								data:{"year":$("#year_emb").val(),"appraisal_period_id":$("#appraisal_period_id_emb").val(),
									"position_id":empPositionId,
									"employee_id":emp_id,
									"department_id":empDepId,
									"action":"approveKpiAction"
									 },
								success:function(data){
									//alert(data);
									
									if(data[0]=="approveSuccess"){
										//alert("Approve KPI Successfully");
										showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
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
	//showDataEmployee("All","All","All","All","All");
	showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
	

	/*Search data for approve data start*/
	$("#approve_kpi_search").click(function(){
		//alert("hello jquery");
		//alert($("#appraisal_period_approve_kpi").val());
		$(".emb_param").remove();
		$("body").append("<input type='hidden' name='year_emb' class='emb_param' id='year_emb' value='"+$("#year").val()+"'>");
		$("body").append("<input type='hidden' name='appraisal_period_id_emb' class='emb_param' id='appraisal_period_id_emb' value='"+$("#appraisal_period_approve_kpi").val()+"'>");
		$("body").append("<input type='hidden' name='department_id_emb' class='emb_param' id='department_id_emb' value='"+$("#department_id").val()+"'>");
		//$("body").append("<input type='hidden' name='division_id_emb' class='emb_param' id='division_id_emb' value='"+$("#division_id").val()+"'>");
		$("body").append("<input type='hidden' name='position_id_emb' class='emb_param' id='position_id_emb' value='"+$("#position_id").val()+"'>");
		
		
		showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
		
		$(".employeeData").show();
		//showDataApproveKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#division_id_emb").val(),$("#position_id_emb").val(),$("#employee_id_emb").val());
		//showDataApproveKpi("All","All","All","All","All","All");
		
	});
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
			data:{"year":$("#year").val(),"appraisal_period_id":$("#appraisal_period_id_emb").val(),
			"employee_id":$("#employee_id_emb").val(),"adjust_percentage":$("#adjust_percentage").val(),"adjust_reason":$("#adjust_reason").val(),
			"action":"editAction"
				},
			success:function(data){
				//alert(data);
				if(data[0]=="updateSuccess"){
					alert("Adjust Kpi Success");
					resetDataApproveKpi();
					showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
					
				}else{
					alert("Error");
				}
				
			}
			
		});
		return false;
	});
	//Form Approve Edit End
	
	
	
	

});