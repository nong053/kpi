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
				htmlDropDrowList+="<select id=\"appraisal_period_assign_evaluate_kpi\" name=\"appraisal_period_assign_evaluate_kpi\" class=\"\" style=\"width:auto;\">";
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
			console.log(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"appraisal_department_id\" name=\"appraisal_department_id\" class=\"\" >";
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
			console.log(data);
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"appraisal_position_id\" name=\"appraisal_position_id\" class=\"\" >";
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
							  showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),depId,positionId,$("#emp_assign_id_emb").val());
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


		var performance="";
		//alert($("#kpi_weight").val());
		$.ajax({
			url:"../Model/mAssignKpi.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"action":"getKpiScore","kpi_id":$("#kpi_id").val(),"kpi_actual_manual":kpi_actual_manual},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				
				  //alert(data[0]["baseline_score"]);
				
				 
				  $("#kpi_actual_score").val(data[0]["baseline_score"]);
				  //performance or percentage = (actual/target)*100;
				  performance= (parseInt($("#kpi_actual_score").val())/parseInt($("#target_score").val())*100)
				  //alert(performance);
				  $("#performance").val(performance+"%");


				  $("#check_complete_kpi_score-"+$("#kpi_id").val()).parent().addClass('complete_kpi_score');
				  $("#check_complete_kpi_score-"+$("#kpi_id").val()).parent().parent().css({"background":"green","color":"white"});
				  
				  // console.log( $("#check_complete_kpi_score-"+$("#kpi_id").val()).parent().get());	
				  // console.log($("#kpi_id").val());
				  
				
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

var manageFn = function(id,actionType){


 	if(actionType=="addScore"){
 			$("#assign_kpi_reset").hide();
 			//$("#kpi_process").hide();

 			if($("#embed_language").val()=="th"){
			$("#assign_kpi_submit").val("บันทึก");
			}else{
				$("#assign_kpi_submit").val("Save");
			}

 			//$("#assign_kpi_submit").val("Save");
 			$("#formKPI").show();
 			
 	}else if(actionType=="edit"){
 			$("#assign_kpi_reset").show();
 			$("#kpi_process").show();

 			if($("#embed_language").val()=="th"){
			$("#assign_kpi_submit").val("แก้ไข");
			}else{
				$("#assign_kpi_submit").val("Edit");
			}
 			//$("#assign_kpi_submit").val("Edit");
	 }
	 
	 /*
	 var idEdit=id.split("-");
	 var id=idEdit[1];
	 $.ajax({
			url:"../Model/mAssignKpi.php",
			type:"post",
			dataType:"json",
			data:{"id":id,"action":"edit"},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				
				
				fngetKpiName(data[0]["kpi_id"]);
				kpiAction("edit");
				$("#kpi_id").change();
				fnDropdownListEmployee($("#position_id").val(),data[0]["empId"]);
				
				
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
				
			}
	 });
	 */
	 
	};

var showDataEmployee=function(year,appraisal_period_id,department_id,position_id){
		//alert(department_id);
		$.ajax({
			url:"../Model/mAssignKpi.php",
			type:"post",
			dataType:"html",
			async:false,
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			data:{"action":"showEmpData","year":year,"appraisal_period_id":appraisal_period_id,"department_id":department_id,"position_id":position_id},
			success:function(data){
				$("#employeeShowData").html(data);
				
				//  $("#Tableemployee").kendoGrid({
                //     // height: 350,
                //      sortable: true,
                //      pageable: {
                //          refresh: true,
                //          pageSizes: true,
                //          buttonCount: 5
                //      },
                //  });
				 setGridTable();
				 
				//alert(data);
				 //PRESS approvedKpi  START
				 $(".approvedKpi").click(function(){
					 alert("Approve KPIsแล้ว ไม่สามารถประเมินได้");
				 });
				 //PRESS approvedKpi  END
				//actionAssignKPI
					$(".actionAssignKPI").click(function(){
						
						 var idAssignKPI=this.id.split("-");
						 var empId=idAssignKPI[1];
						 var depId=$("#depId-"+empId).text();
						 var positionId=$("#positionId-"+empId).text();
						 
							$("#emp_assign_id_emb").remove();
							$("#dep_assign_id_emb").remove();
							$("#position_assign_id_emb").remove();
							/*Embeded Parameter to use.*/
							$("body").append("<input type='hidden' name='emp_assign_id_emb' class='emp_param' id='emp_assign_id_emb' value='"+empId+"'>");
							$("body").append("<input type='hidden' name='dep_assign_id_emb' class='emp_param' id='dep_assign_id_emb' value='"+depId+"'>");
							$("body").append("<input type='hidden' name='position_assign_id_emb' class='emp_param' id='position_assign_id_emb' value='"+positionId+"'>");
							
							// alert(depId);
							// alert(positionId);
							// alert(empId);
							
							
							// Copy KPI Assign Master to KPI Assign Auto Matic START
							
							$.ajax({
								url:"../Model/mAssignKpi.php",
								type:"post",
								dataType:"json",
								async:false,
								headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
								data:{"action":"copyAssignMasterKpi","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
									"position_id":position_id,"employee_id":empId},
								success:function(data){
									//alert(data[0]);
									showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),depId,positionId,empId);
								}
							});
							
							// Copy KPI Assign Master to KPI Assign Auto Matic END
							
							
							
							
							$("#assignKpiShowData").show();
							//$("#formKPI").show();
							$("#formKPI").hide();
							//$(".actionAssignKPI").parent().parent().css({"background":"white"});
							//$(this).parent().parent().css({"background":"#ddd"});
							
							var empName=$("#fullname_emp_data-"+empId).text();
							var empDepartment=$("#dep_emp_data-"+empId).text();
							var empPosition=$("#position_emp_data-"+empId).text();

							
							var imageEmp="";
							//alert($("#image_emp_data-"+empId).attr("src"));
							imageEmp+="<img class='img-circle' src='"+$("#image_emp_data-"+empId).attr("src")+"' width='100px;'>";

							var empAreaData="";
							empAreaData+="<div class=''>";
								empAreaData+="<div class='impageEmpClass'>";
									empAreaData+=imageEmp;
								empAreaData+="</div>";
								empAreaData+="<div class='infoEmpClass'>";
									empAreaData+="<span class='empName1'>"+empName+"</span><br>";
									empAreaData+="ตำแหน่ง:"+empPosition+"<br>";
									empAreaData+="แผนก:"+empDepartment+"<br>";
									
								empAreaData+="</div>";

							empAreaData+="</div>";

							if($("#embed_language").val()=="th"){
								//$("#empNameArea").html(imageEmp+"<br><b>ผู้รับการประเมิน : "+empName+"</b>");
								$("#empNameArea").html(empAreaData);
							}else{
								$("#empNameArea").html(imageEmp+"<br><b>Appraisal Result : "+empName+"</b>");
							}

							//$("#empNameArea").html("<b>Appraisal KPI Result : "+empName+"</b>");
							$("#form_appraisal_year").html($("#year option:selected").text());
							$("#form_appraisal_time").html($("#appraisal_period_assign_evaluate_kpi option:selected").text());
							
							//resetDataAssignKpi();
							$("#assignResultKPIModal").modal('show');

							
							/*alert("hello");*/
					});
				/*Assign KPI END*/
				 
				/*Romove Asign KPIs Start*/
					$(".actionRemoveAssign").click(function(){
						 var idAssignKPI=this.id.split("-");
						 var empId=idAssignKPI[1];
						 var depId=$("#depId-"+empId).text();
						 var positionId=$("#positionId-"+empId).text();
						
						 $.ajax({
								url:"../Model/mAssignKpi.php",
								type:"post",
								dataType:"json",
								headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
								data:{"action":"removeAssignKPIs","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":depId ,
									"position_id":positionId,"employee_id":empId},
								success:function(data){
									//alert(data);
									
									if("success"==data[0]){
										alert("ลบ KPIs Assign เรียบร้อย");
										showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
									}else{
										alert("ไม่สามารถลบข้อมูลได้");
									}
								}
						 });
						
						 
					});
				/*Romove Asign KPIs Start*/
					
					
				
				
			}
			
		});
	}

var showDataAssignKpi=function(year,appraisal_period_id,department_id,position_id,employee_id){
		
		/*
		alert("year="+year);
		alert("appraisal_period_id="+appraisal_period_id);
		alert("department_id="+department_id);
		alert("division_id="+division_id);
		alert("position_id="+position_id);
		alert("employee_id="+employee_id);
		*/
		
	
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
				//alert(data[0]['kpi_weight']);
				//fnDropdownListKPI();
				//set empty value
				$("#confirm_kpi").html("");
				$("#score_sum_percentage").html("");
				$("#kpi_weight_total").html("");
				
				
				if(parseInt(data[0]['kpi_weight'])==100){
					
					$("#kpi_weight_total").html("<strong style=\"color:green\">"+data[0]['kpi_weight']+"<strong>");
					calculateKpiPercentage(year,appraisal_period_id,department_id,position_id,employee_id,"confirmKpi");
					
				}else{
					
					$("#kpi_weight_total").html("<strong style=\"color:red\">"+data[0]['kpi_weight']+"<strong>");
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
			data:{"action":"showData","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
				"position_id":position_id,"employee_id":employee_id},
			success:function(data){
				$("#assignKpiShowData").html(data);
				
				 $("#TableassignKpi").kendoGrid({
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
				 $(".complete_kpi_score_flag").parent().parent().css({"background":"#339933","color":"white"});
				 //alert(data);
				 //action del,edit start
				 $(".actionEdit").click(function(){
			
					manageFn(this.id,actionType='edit');

				 });

				 $(".actionAddScore").click(function(){
					$("#formKPI").show();
				 	manageFn(this.id,actionType='addScore');


				 });
				 
				 
				 $(".actionDel").click(function(){
					 //alert("hello");
					 //alert(this.id);
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
										showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
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
						  url:"../Model/mAssignKpiParam.php",
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

var assign_kpi_search_fn = function(){

	$(".emb_param").remove();

		sessionStorage.setItem("param_year", $("#appraisal_year").val());
		sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_assign_evaluate_kpi").val());
		sessionStorage.setItem("param_department", $("#appraisal_department_id").val());
		sessionStorage.setItem("param_position", $("#appraisal_position_id").val());

		// $("body").append("<input type='hidden' name='year_emb' class='emb_param' id='year_emb' value='"+$("#year").val()+"'>");
		// $("body").append("<input type='hidden' name='appraisal_period_id_emb' class='emb_param' id='appraisal_period_id_emb' value='"+$("#appraisal_period_assign_kpi").val()+"'>");
		// $("body").append("<input type='hidden' name='department_id_emb' class='emb_param' id='department_id_emb' value='"+$("#department_id").val()+"'>");
		// $("body").append("<input type='hidden' name='position_id_emb' class='emb_param' id='position_id_emb' value='"+$("#position_id").val()+"'>");
		
		
		showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
		showDataAssignKpi();
		$("#empNameArea").empty();
		$(".employeeData").show();
		$(".displayHideShow").show();

}


$(document).ready(function(){
	

//fnDropdownListKPI();


	
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
	 showDataEmployee($("#year_emb").val(),
	 $("#appraisal_period_id_emb").val(),
	 $("#department_id_emb").val(),
	 $("#division_id_emb").val(),
	 $("#position_id_emb").val());
	*/
	fnDropdownListAppraisalPosition(sessionStorage.getItem("param_position"),"selectAll");

	
	if($("#depDisable").val()!=undefined){
		fnDropdownListAppraisalDep($("#departmentIdEmp").val());
		$("#appraisal_department_id").prop('disabled', 'disabled');
	}else{
		fnDropdownListAppraisalDep( sessionStorage.getItem("param_department"),"selectAll");
	}
	
	//fnDropdownListDiv( $("#division_id_emb").val());
	/*change dropdown to label 16/092017 */
	//fnDropdownListKPI();

	fnDropdownListEmployee();
	
	
	
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
	

	

	
	
	showDataAssignKpi();

	//assign_kpi_search_fn();
	setTimeout(function(){
		assign_kpi_search_fn();
	},500);
	
	/*Search data for assign data end*/
	$("form#AssignKpiForm").off("submit");
	$("form#AssignKpiForm").submit(function(){
	
		

	 	if($("#kpi_actual_manual").val()==""){
	 		alert('Please fill KPI Result');
	 	}
	 	

	 	if($(".complete_kpi_score").get().length<1){
	 		alert("Please fill score completed.");
	 		return false;
	 	}
		 var depId=$("#dep_assign_id_emb").val();
		 var positionId=$("#position_assign_id_emb").val();
		 
		 /*
		 console.log("####################### statt console here.");
		 console.log("1="+$("#year").val());
		 console.log("2="+$("#appraisal_period_assign_kpi").val());
		 console.log("3="+positionId);
		 console.log("4="+depId);
		 console.log("5="+$("#emp_assign_id_emb").val());
		 console.log("6="+$("#kpi_id").val());
		 console.log("7="+$("#kpi_weight").val());
		 console.log("8="+$("#kpi_target_data").val());
		 console.log("9="+$(".kpi_type_actual:checked").val());
		 console.log("10="+$("#kpi_actual_manual").val());
		 console.log("11="+$("#kpi_actual_query").val());
		 console.log("12="+$("#target_score").val());
		 console.log("13="+$("#total_kpi_actual_score").val());
		 console.log("14="+$("#kpi_actual_score").val());
		 console.log("15="+$("#performance").val());
		 console.log("16="+$("#assign_kpi_action").val());
		 console.log("17="+$("#assign_kpi_id").val());
		 */
		 
		 
		$.ajax({
			url:"../Model/mAssignKpi.php",
			type:"post",
			dataType:"json",
			data:{
			"year":sessionStorage.getItem("param_year"),
			"appraisal_period_id":sessionStorage.getItem("param_appraisal_period"),
			"position_id":positionId,
			"department_id":depId,
			"employee_id":$("#emp_assign_id_emb").val(),
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
			"assign_kpi_id":$("#assign_kpi_id").val(),
			"complete_kpi_score_flag":"Y"
			},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				if(data[0]=="success"){
					//alert("บันทึกข้อมูลเรียบร้อย");	
					//showDataAssignKpi();
					showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),depId,positionId,$("#emp_assign_id_emb").val());
					resetDataAssignKpi(false);	
				}else if(data[0]=="key-duplicate"){
					alert("ข้อมูลซ้ำ");
				}
				if(data[0]=="editSuccess"){
					//alert("บันทึกข้อมูลเรียบร้อย");	
					//showDataAssignKpi();
					showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),depId,positionId,$("#emp_assign_id_emb").val());
					//resetDataAssignKpi(false);	
					//$("#formKPI").hide();
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
	
	/*KPI lIST START*/
	var kpiAction=function(action){
		

	
		
		$("#kpi_id").on("change",function(){
			
						
			$.ajax({
				url:"../Model/mAssignKpi.php",
				type:"post",
				dataType:"json",
				data:{"action":"getDataBaseline","kpi_id":$(this).val()},
				headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
				success:function(data){
				
					 // alert(data[0]["kpi_target_data"]);
					  //alert(data[0]["target_score"]);
					  //resetDataAssignKpi();
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
				url:"../Model/mAssignKpi.php",
				type:"post",
				dataType:"html",
				data:{"action":"getAllDataBaseline","kpi_id":$(this).val()},
				headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
				success:function(data){
					// alert(data);
					$("#baseLineArea").html(data).show();
					  /*baseLineArea*/

				}
			});
			
			
		});
		
		/*KPI lIST END*/
	}
	kpiAction();
	$("#kpi_id").change();

	
	/*kpi_actual_manual fill status start*/
	$("#kpi_actual_manual").keyup(function(){

		calculate_kpi_score_by_manual_fn($(this).val());

		/*
		var performance="";
		$.ajax({
			url:"../Model/mAssignKpi.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"action":"getKpiScore","kpi_id":$("#kpi_id").val(),"kpi_actual_manual":$(this).val()},
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
			
				 
				  $("#kpi_actual_score").val(data[0]["baseline_score"]);
				  //performance or percentage = (actual/target)*100;
				  performance= (parseInt($("#kpi_actual_score").val())/parseInt($("#target_score").val())*100)
				  //alert(performance);
				  $("#performance").val(performance+"%");


				  $("#check_complete_kpi_score-"+$("#kpi_id").val()).parent().addClass('complete_kpi_score');
				  $("#check_complete_kpi_score-"+$("#kpi_id").val()).parent().parent().css({"background":"green","color":"white"});
				  
				  
				
			}
		});
		//calculate  total_kpi_actual_score
		
		var kpi_weight=parseFloat($("#kpi_weight").val());
		var kpi_actual_manual=parseFloat($(this).val());
		var kpi_percentage=parseFloat(performance);
		var total_kpi_actual_score=parseFloat(kpi_percentage*kpi_weight).toFixed(2);
		$("#total_kpi_actual_score").val(total_kpi_actual_score);
		*/
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
			
			/*
			 var depId=$("#dep_assign_id_emb").val();
			 var positionId=$("#position_assign_id_emb").val();
			 */
			//alert($("#kpi_weight_total").text());

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
						"action":"confrimKpi"
					},
					headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
					async:false,
					success:function(data){
						
						  if(data[0]=="success"){
							  //alert("ประเมินเรียบร้อย");
							  showDataAssignKpi(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),$("#dep_assign_id_emb").val(),$("#position_assign_id_emb").val(),$("#emp_assign_id_emb").val());
							  showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
						  	  $("#formKPI").hide();
						  	  $('#assignResultKPIModal').modal('hide');
						  }
							
						
					}
				});
				
				//alert("weight 100");
				
			}else{
				
				alert("Weight KPI ไม่เท่ากับ 100");
				
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
					htmlDropDrowList+="<select id=\"appraisal_year\" name=\"appraisal_year\" class=\"\" style=\"width:auto;\">";
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
						
						//alert($("#appraisal_period_id_emb").val());
						//alert($("#year_emb").val());
						/*
						if(($("#year_emb").val()!=undefined) && ($("#appraisal_period_id_emb").val()!=undefined) ){
							fnDropdownListAppralisalAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val());
							
						}else{
							fnDropdownListAppralisalAssignKpi($(this).val());
						}
						*/
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



		//change parameter action end



		$("body").off("click",".baseline_radio");
		$("body").on("click",".baseline_radio",function(){
			
			var arrayID=this.id;
			arrayID = arrayID.split("-");
			var id="";
			id=arrayID[1];
			//$("#baseline_begin_result-"+id).val();

			$("#kpi_actual_manual").val($("#baseline_begin_result-"+id).text());
			calculate_kpi_score_by_manual_fn($("#baseline_begin_result-"+id).text());
			//$("#assign_kpi_submit").click();
			//assign_kpi_submit_fn();
			$("#formKPI").hide();
			//kpi_process_fn();

			

			// setTimeout(function(){
			// 	$("#kpi_process").click();
			// },1000);
			//

		});


		$("body").off("click","#assignResultKPIModal  .close");
		$("body").on("click","#assignResultKPIModal  .close",function(){
			showDataEmployee(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"));
			//showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
		});

});