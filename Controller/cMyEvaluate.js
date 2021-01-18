//reuse start

	/*calculte kpi Percentage start*/
	var calculateKpiPercentage =function(year,appraisal_period_id,department_id,position_id,employee_id,confirmKpi){
		
	$.ajax({
		url:"../Model/mEvaluate.php",
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
					$(".actionAddScore").removeAttr("disabled");
					//$("#score_sum_percentage").css({"color":"red"});
					
				}else if(data[0]['confirm_flag']=="Y"){
					
					confirm_kpi='<strong style=\"color:green\"> (ยืนยันการประเมินเรียบร้อย) </strong>';
					$("#kpi_process").hide();
					$("#score_sum_percentage").css({"color":"green"});
					$(".actionAddScore").attr("disabled","disabled");
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
		url:"../Model/mEvaluate.php",
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
		url:"../Model/mEvaluate.php",
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
							url:"../Model/mEvaluate.php",
							type:"post",
							dataType:"json",
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							data:{"id":id,"action":"del","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
								"position_id":position_id,"employee_id":employee_id},
							success:function(data){
								if(data[0]=="success"){
									alert("ลบข้อมูลเรียบร้อย");	
									//showDataAssignKpi();
									showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val(),$("#emp_assign_id_emb").val());
									//showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id").val(),$("#department_id").val(),$("#position_id").val(),$("#employee_id").val());
									showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
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

$("form#AssignKpiForm").submit(function(){


	 	if($("#kpi_actual_manual").val()==""){
	 		alert('Please fill KPI Result');
	 	}
	 	
	 	if($(".complete_kpi_score").get().length<1){
	 		alert("Please fill score completed.");
	 		return false;
	 	}
		
		 /*
		 console.log("################################");
		 console.log("1="+$("#myEvaluateYear").val());
		 console.log("2="+$("#my_evaluate_period").val());

		 console.log("3="+$("#positionIdEmp").val());
		 console.log("4="+$("#departmentIdEmp").val());
		 console.log("5="+$("#emp_id").val());

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
			url:"../Model/mEvaluate.php",
			type:"post",
			dataType:"json",
			data:{
				"year":$("#myEvaluateYear").val(),
				"appraisal_period_id":$("#my_evaluate_period").val(),
				"position_id":$("#positionIdEmp").val(),
				"department_id":$("#departmentIdEmp").val(),
				"employee_id":$("#emp_id").val(),
				"kpi_id":$("#kpi_id").val(),
				"kpi_weight":$("#kpi_weight").val(),"kpi_target_data":$("#kpi_target_data").val(),
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
			async:false,
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){

				if(data[0]=="success"){
					showDataAssignKpi($("#myEvaluateYear").val(),$("#my_evaluate_period").val(),$("#departmentIdEmp").val(),$("#positionIdEmp").val(),$("#emp_id").val());
					resetDataAssignKpi(false);	
				}else if(data[0]=="key-duplicate"){
					alert("ข้อมูลซ้ำ");
				}
				if(data[0]=="editSuccess"){
					showDataAssignKpi($("#myEvaluateYear").val(),$("#my_evaluate_period").val(),$("#departmentIdEmp").val(),$("#positionIdEmp").val(),$("#emp_id").val());
			
				}
			}
			
		});
	
		
		return false;
	});
	
/*kpi_actual_manual fill  start*/
var calculate_kpi_score_by_manual_fn = function(kpi_actual_manual){


		var performance="";
		//alert($("#kpi_weight").val());
		$.ajax({
			url:"../Model/mEvaluate.php",
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
/*kpi_actual_manual fill  end*/

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
					 
	 var idEdit=id.split("-");
	 var id=idEdit[1];
	 $.ajax({
			url:"../Model/mEvaluate.php",
			type:"post",
			dataType:"json",
			data:{"id":id,"action":"edit"},
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
				
				/*
				fnDropdownListAppralisalAssignKpi($("#year").val(),data[0]["appraisal_period_id"]);
				fnDropdownListDep(data[0]["department_id"],"selectAll");
				fnDropdownListPosition(data[0]["position_id"],"selectAll");
				*/
				/*change dropdown to label 16/092017 */
				//fnDropdownListKPI(data[0]["kpi_id"]);
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
				//$("#assign_kpi_submit").val("Edit");
				
				
				
				
				
				//showDataAssignKpi
				//showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#division_id_emb").val(),$("#position_id_emb").val(),$("#emp_assign_id_emb").val());
				
			}
	 });
	};


//reuse end	



//appraisalYearArea
var paramMyEvaluateAppraisal = function(year){
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
				htmlDropDrowList+="<select id=\"my_evaluate_period\" name=\"my_evaluate_period\" class=\"form-control input-sm\" style=\"width:auto;\">";
					$.each(data,function(index,indexEntry){
						// if(appraisal_period_id==indexEntry[0]){
						// 	htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						// }else{

							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						// }
						
					});
				htmlDropDrowList+="</select>";
				
				$("#myEvaluatePeriodArea").html(htmlDropDrowList);
				$("#my_evaluate_period").kendoDropDownList({
					theme: "silver"
					});
				//persDropDrowList
			}
		});
}
var paramMyEvaluateYear=function(kpi_year){
	//alert("Year");

	$.ajax({
		url:"../Model/mAppraisalYearList.php",
		type:"post",
		dataType:"json",
		async:false,
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"myEvaluateYear\" name=\"myEvaluateYear\" class=\"form-control input-sm\" style=\"width:auto;\">";
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
			$("#myEvaluateYearArea").html(htmlDropDrowList);
			$("#myEvaluateYear").kendoDropDownList({
			theme: "silver"
			});
			//dropdown year change action start
			$("#myEvaluateYear").change(function(){
				
				//alert($("#appraisal_period_id_emb").val());
				//alert($("#year_emb").val());
				/*
				if(($("#year_emb").val()!=undefined) && ($("#appraisal_period_id_emb").val()!=undefined) ){
					fnDropdownListAppralisalAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val());
					
				}else{
					fnDropdownListAppralisalAssignKpi($(this).val());
				}
				*/
				paramMyEvaluateAppraisal($(this).val());
				$("#paramYearEmb").val($(this).val());	
			});
			
			$("#myEvaluateYear").change();
				
		}
	});
}
//paramYear();

var showDataMyEvaluateKpiList=function(year,appraisal_period_id,department_id,position_id,employee_id){
		
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
			url:"../Model/mEvaluate.php",
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
			url:"../Model/mEvaluate.php",
			type:"post",
			dataType:"html",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			data:{"action":"showData","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
				"position_id":position_id,"employee_id":employee_id},
			async:false,
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
								url:"../Model/mEvaluate.php",
								type:"post",
								dataType:"json",
								headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
								data:{"id":id,"action":"del","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
									"position_id":position_id,"employee_id":employee_id},
								async:false,
								success:function(data){
									if(data[0]=="success"){
										alert("ลบข้อมูลเรียบร้อย");	
										//showDataAssignKpi();
										showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val(),$("#emp_assign_id_emb").val());
										//showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id").val(),$("#department_id").val(),$("#position_id").val(),$("#employee_id").val());
										showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
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
							async:false,
							success:function(data){
								
							  /*
							  alert(data[0]["assign_kpi_year"]);
							  alert(data[0]["appraisal_period_id"]);
							  alert(data[0]["position_id"]);
							  alert(data[0]["perspective_id"]);
							  */
							
							  showDataResultKpi(data[0]["assign_kpi_year"],data[0]["appraisal_period_id"],data[0]["position_id"],data[0]["perspective_id"],data[0]["emp_id"],id);
							  $(".displayHideShow").show();
						  }
					  });
					  
					//showDataResultKpi();
					  
				 });
				 //PRESS actionkpiResult END
			}
			
		});
	}

var my_evaluate_search_fn = function(){

	

}
$(document).ready(function(){

	if($("#paramYearEmb").val()!=undefined){
		paramMyEvaluateYear($("#paramYearEmb").val());
	}else{
		paramMyEvaluateYear();
	}


	$("#myEvaluateYear").change(function(){
		//my_evaluate_search_fn();
		showDataMyEvaluateKpiList(yea=$("#myEvaluateYear").val(),appraisal_period_id=$("#my_evaluate_period").val(),department_id=$("#departmentIdEmp").val(),position_id=$("#positionIdEmp").val(),employee_id=$("#emp_id").val());
	});

	$("#my_evaluate_period").change(function(){
		//my_evaluate_search_fn();
		showDataMyEvaluateKpiList(yea=$("#myEvaluateYear").val(),appraisal_period_id=$("#my_evaluate_period").val(),department_id=$("#departmentIdEmp").val(),position_id=$("#positionIdEmp").val(),employee_id=$("#emp_id").val());
	});

	showDataMyEvaluateKpiList(yea=$("#myEvaluateYear").val(),appraisal_period_id=$("#my_evaluate_period").val(),department_id=$("#departmentIdEmp").val(),position_id=$("#positionIdEmp").val(),employee_id=$("#emp_id").val());






 // console.log("################################");

	// 	 console.log("1="+$("#myEvaluateYear").val());
	// 	 console.log("2="+$("#my_evaluate_period").val());

	// 	 console.log("3="+$("#positionIdEmp").val());
	// 	 console.log("4="+$("#departmentIdEmp").val());
	// 	 console.log("5="+$("#emp_id").val());

	// 	 console.log("6="+$("#kpi_id").val());
	// 	 console.log("7="+$("#kpi_weight").val());
	// 	 console.log("8="+$("#kpi_target_data").val());
	// 	 console.log("9="+$(".kpi_type_actual:checked").val());
	// 	 console.log("10="+$("#kpi_actual_manual").val());
	// 	 console.log("11="+$("#kpi_actual_query").val());
	// 	 console.log("12="+$("#target_score").val());
	// 	 console.log("13="+$("#total_kpi_actual_score").val());
	// 	 console.log("14="+$("#kpi_actual_score").val());
	// 	 console.log("15="+$("#performance").val());
	// 	 console.log("16="+$("#assign_kpi_action").val());
	// 	 console.log("17="+$("#assign_kpi_id").val());
		



	$("body").off("click",".baseline_radio");
	$("body").on("click",".baseline_radio",function(){
		
		var arrayID=this.id;
		arrayID = arrayID.split("-");
		var id="";
		id=arrayID[1];
		//alert(id);
		$("#kpi_actual_manual").val($("#baseline_begin_result-"+id).text());
		calculate_kpi_score_by_manual_fn($("#baseline_begin_result-"+id).text());
		$("#assign_kpi_submit").click();
		$("#formKPI").hide();

		return false;


	});



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

				// alert("1="+$("#myEvaluateYear").val());
				// alert("2="+$("#my_evaluate_period").val());
				// alert("3="+$("#departmentIdEmp").val());
				// alert("4="+$("#positionIdEmp").val());
				// alert("5="+$("#emp_id").val());
				// alert("6="+$("#score_sum_percentage").text());
				
				$.ajax({
					url:"../Model/mEvaluate.php",
					type:"post",
					dataType:"json",
					data:{"year":$("#myEvaluateYear").val(),"appraisal_period_id":$("#my_evaluate_period").val(),
						"department_id":$("#departmentIdEmp").val(),
						"position_id":$("#positionIdEmp").val(),"employee_id":$("#emp_id").val(),"score_sum_percentage":$("#score_sum_percentage").text(),
							"action":"confrimKpi"},
					headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
					async:false,
					success:function(data){
						
						  if(data[0]=="success"){
							  //alert("ประเมินเรียบร้อย");
							  showDataAssignKpi($("#myEvaluateYear").val(),$("#my_evaluate_period").val(),$("#departmentIdEmp").val(),$("#positionIdEmp").val(),$("#emp_id").val());
						  	  $("#formKPI").hide();
						  	  $('#assignResultKPIModal').modal('hide');
						  }
							
						
					}
				});
				
				
				
				
			}else{
				
				alert("Weight KPI ไม่เท่ากับ 100");
				
			}
			
			
		});
	/* KPI Process End*/


	



$("#empDisplayImage").attr("src",$("#emp_image").val());
$("#empDisplayFullName").html($("#emp_first_name").val()+" "+$("#emp_last_name").val());
$("#empDisplayPosition").html($("#emp_position").val());
$("#empDisplayDepartment").html($("#emp_department").val());


});