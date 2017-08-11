$(document).ready(function(){
	
	//dropdown List AppralisalPeriod start
	var fnDropdownListAppralisalAssignKpi=function(year,appraisal_period_id){
		//alert(year);
		$.ajax({
			url:"../Model/mAppralisalPeriodList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"year":year},
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"appraisal_period_assign_kpi\" name=\"appraisal_period_assign_kpi\" class=\"form-control input-sm\" style=\"width:auto;\">";
					$.each(data,function(index,indexEntry){
						if(appraisal_period_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#periodAssignArea").html(htmlDropDrowList);
				//persDropDrowList
			}
		});
	}	
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
	fnDropdownListPosition($("#position_id_emb").val(),"");
	//fnDropdownListDep( $("#department_id_emb").val(),"selectAll");
	
	if($("#depDisable").val()!=undefined){
		fnDropdownListDep($("#departmentIdEmp").val());
		//fnDropdownListDep($("#departmentIdEmp").val(),"selectAll");
		$("#department_id").prop('disabled', 'disabled');
	}else{
		fnDropdownListDep( $("#department_id_emb").val(),"");
	}
	
	//fnDropdownListDiv( $("#division_id_emb").val());
	fnDropdownListKPI();
	fnDropdownListEmployee();
	
	
	
	//###################################### parameter list end #########################

	var resetDataAssignKpi=function(activeKPIs){
		if(activeKPIs==true){
			fnDropdownListKPI();
		}
		//alert("Reset");
		//fnDropdownListAppralisalAssignKpi($("#year").val());
		//fnDropdownListDep();
		//fnDropdownListDiv();
		//fnDropdownListPosition();
		fnDropdownListEmployee($("#position_id").val());
		
		kpiAction();
		$("#kpi_id").change();
		
		
		$("#kpi_weight").val("25.00");
		//$("#kpi_target_data").val("");
		//$("#target_score").val("");
		$("#kpi_actual_score").val("0.00");
		$("#kpi_actual_manual").val("0.00");
		$("#performance").val("0.00%");
		$("#total_kpi_actual_score").val("0.00");
		
		$("#kpi_actual_query").val("");
		

		
		$("#assign_kpi_action").val("add");
		$("#assign_kpi_id").val("");
		$("#assign_kpi_submit").val("Add");
	}
	/*
	 $year =$_POST['year'];
	$appraisal_period_id = $_POST['appraisal_period_id'];
	$department_id=$_POST['department_id'];
	$division_id=$_POST['division_id'];
	$position_id =$_POST['position_id'];
	

	$assign_kpi_id = $_POST['assign_kpi_id'];
	$kpi_id=$_POST['kpi_id'];
	
	 */
	
	
	
	
	
	/*calculte kpi Percentage start*/
	var calculateKpiPercentage =function(year,appraisal_period_id,department_id,position_id,confirmKpi){
		
	$.ajax({
		url:"../Model/mAssignMasterKpi.php",
		type:"post",
		dataType:"json",
		data:{"action":"getKPIPercentage","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
			"position_id":position_id},
		success:function(data){
				
				//alert(data[0]['confirm_flag']);
				
				var confirm_kpi="";
				if(data[0]['confirm_flag']=="N" || data[0]['confirm_flag']==""){
					confirm_kpi='<strong style=\"color:red\"> (ยังไม่ยืนยัน KPI)</strong>';
				}else if(data[0]['confirm_flag']=="Y"){
					confirm_kpi='<strong style=\"color:green\"> (ยืนยัน KPI เรียบร้อย) </strong>';
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
			success:function(data){
				//alert(data[0]['kpi_weight']);
				//fnDropdownListKPI();
				//set empty value
				$("#confirm_kpi").html("");
				$("#score_sum_percentage").html("");
				$("#kpi_weight_total").html("");
				
				
				if(parseInt(data[0]['kpi_weight'])==100){
					
					$("#kpi_weight_total").html("<strong style=\"color:green\">"+data[0]['kpi_weight']+"<strong>");
					calculateKpiPercentage(year,appraisal_period_id,department_id,position_id,"confirmKpi");
					
				}else{
					
					$("#kpi_weight_total").html("<strong style=\"color:red\">"+data[0]['kpi_weight']+"<strong>");
					calculateKpiPercentage(year,appraisal_period_id,department_id,position_id,"notConfirmKpi");
					
				}
				
				
				
			}
		});
		/*calculte weight kpi end*/
		
		
		$.ajax({
			url:"../Model/mAssignMasterKpi.php",
			type:"post",
			dataType:"html",
			data:{"action":"showData","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
				"position_id":position_id},
			success:function(data){
				//alert(data);
				$("#assignKpiShowData").html(data).show();
				$("#formKPI").show();
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
				 //action del,edit start
				 $(".actionEdit").click(function(){
			
					 //alert(this.id);
					 
					 var idEdit=this.id.split("-");
					 var id=idEdit[1];
					 $.ajax({
							url:"../Model/mAssignMasterKpi.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
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
								fnDropdownListKPI(data[0]["kpi_id"]);
								
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
								$("#assign_kpi_submit").val("Edit");
								
								
								
								
								
								//showDataAssignKpi
								//showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#division_id_emb").val(),$("#position_id_emb").val(),$("#emp_assign_id_emb").val());
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
					 //alert("hello");
					 //alert(this.id);
					 
					 
					 if(confirm("Do you want to delete this KPI?")){
						 var idDel=this.id.split("-");
						 var id=idDel[1];
						 $.ajax({
								url:"../Model/mAssignMasterKpi.php",
								type:"post",
								dataType:"json",
								data:{"id":id,"action":"del","year":year,"appraisal_period_id":appraisal_period_id ,"department_id":department_id ,
									"position_id":position_id},
								success:function(data){
									if(data[0]=="success"){
										//alert("ลบข้อมูลเรียบร้อย");	
										//showDataAssignKpi();
										showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
										
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
	
	showDataAssignKpi();

	/*Search data for assign data start*/
	$("#assign_kpi_search").click(function(){
		
		$(".emb_param").remove();
		$("body").append("<input type='hidden' name='year_emb' class='emb_param' id='year_emb' value='"+$("#year").val()+"'>");
		$("body").append("<input type='hidden' name='appraisal_period_id_emb' class='emb_param' id='appraisal_period_id_emb' value='"+$("#appraisal_period_assign_kpi").val()+"'>");
		$("body").append("<input type='hidden' name='department_id_emb' class='emb_param' id='department_id_emb' value='"+$("#department_id").val()+"'>");
		$("body").append("<input type='hidden' name='position_id_emb' class='emb_param' id='position_id_emb' value='"+$("#position_id").val()+"'>");
		//parameter send to year,appraisal_period_id,department_id,position_id
		showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val());
		
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
		 var depId=$("#department_id_emb").val();
		 var positionId=$("#position_id_emb").val();
		 
	
		 
		$.ajax({
			url:"../Model/mAssignMasterKpi.php",
			type:"post",
			dataType:"json",
			data:{"year":$("#year").val(),"appraisal_period_id":$("#appraisal_period_id_emb").val(),"position_id":positionId,
			"department_id":depId,
			"kpi_id":$("#kpi_id").val(),
			"kpi_weight":$("#kpi_weight").val(),"kpi_target_data":$("#kpi_target_data").val(),"kpi_type_actual":$(".kpi_type_actual:checked").val(),
			"kpi_actual_manual":$("#kpi_actual_manual").val(),"kpi_actual_query":$("#kpi_actual_query").val(),"target_score":$("#target_score").val(),
			"total_kpi_actual_score":$("#total_kpi_actual_score").val(),
			"kpi_actual_score":$("#kpi_actual_score").val(),"performance":$("#performance").val(),
				"action":$("#assign_kpi_action").val(),"assign_kpi_id":$("#assign_kpi_id").val()
				},
			success:function(data){
				if(data[0]=="success"){
					alert("บันทึกข้อมูลเรียบร้อย");	
					//showDataAssignKpi();
					showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),depId,positionId,$("#emp_assign_id_emb").val());
					resetDataAssignKpi(false);	
				}else if(data[0]=="key-duplicate"){
					alert("ข้อมูลซ้ำ");
				}
				if(data[0]=="editSuccess"){
					alert("แก้ไขข้อมูลเรียบร้อย");	
					//showDataAssignKpi();
					showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),depId,positionId,$("#emp_assign_id_emb").val());
					resetDataAssignKpi(false);	
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
				url:"../Model/mAssignMasterKpi.php",
				type:"post",
				dataType:"json",
				data:{"action":"getDataBaseline","kpi_id":$(this).val()},
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
				url:"../Model/mAssignMasterKpi.php",
				type:"post",
				dataType:"html",
				data:{"action":"getAllDataBaseline","kpi_id":$(this).val()},
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
		var performance="";
		//alert($("#kpi_weight").val());
		$.ajax({
			url:"../Model/mAssignMasterKpi.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"action":"getKpiScore","kpi_id":$("#kpi_id").val(),"kpi_actual_manual":$(this).val()},
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
					data:{"year":$("#year_emb").val(),"appraisal_period_id":$("#appraisal_period_id_emb").val(),
						"department_id":$("#department_id_emb").val(),
						"position_id":$("#position_id_emb").val(),"score_sum_percentage":$("#score_sum_percentage").text(),
							"action":"confrimKpi"},
					success:function(data){
						
						  if(data[0]=="success"){
							  alert("กำหนด KPI เรียบร้อย");
							  showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#position_id_emb").val(),$("#emp_assign_id_emb").val());
							 
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
		var paramYear=function(kpi_year){
			//alert("Year");

			$.ajax({
				url:"../Model/mAppraisalYearList.php",
				type:"post",
				dataType:"json",
				async:false,
				success:function(data){
					
					var htmlDropDrowList="";
					htmlDropDrowList+="<select id=\"year\" name=\"year\" class=\"form-control input-sm\" style=\"width:auto;\">";
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
					$(".assignKpiYearArea").html(htmlDropDrowList);
					//dropdown year change action start
					$("#year").change(function(){
						
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
					});
					
					$("#year").change();
						
				}
			});
		}
		paramYear();
	
		//action click actual data by manaul or query start
		$(".kpi_type_actual").click(function(){
			if($(this).val()=="1"){
				alert("For premium package.");
				$("#actual_manual").click();
			}
		});
		//action click actual data by manaul or query end
});