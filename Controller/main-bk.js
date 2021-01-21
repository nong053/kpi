

/* start call kpiDashboard */


/*function action click department start*/
	var actionGaugeDep=function(){
		
		//Click Department to Show Detail into Start.
		$(".gaugeDep").off("click");
		$(".gaugeDep").on("click",function(){
			//alert($("#paramDepartmentEmb").val());
			//### Call kpiDasboardMainFn for emp role Start ###
			$.ajax({
				url:"../View/vKpiDashboard.php",
				type:"get",
				dataType:"html",
				async:false,
				data:{"kpi_year":$("#paramYearEmb").val(),"appraisal_period_id":$("#paramAppraisalEmb").val(),
					"department_id":$("#paramDepartmentEmb").val(),"department_name":$("#paramDepartmentNameEmb").val()
					},
				success:function(data){
					$("#mainContent").html(data);
					callProgramControl("cKpiDashboard.js");
					kpiDasboardMainFn($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#paramDepartmentEmb").val(),$("#paramDepartmentNameEmb").val());
					//kpiDasboardMainFn($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#departmentIdEmp").val(),$("#departmentNameEmp").val(),$("#emp_id").val());
					//### drawdown grid for show detail within ###
					//$(".k-icon").click();
				}
			});
			//### Call kpiDasboardMainFn for emp role End ###
		
		});
		// Click Department to Show Detail into End.
	}
	/*function action click department end*/
	
	
	// function kpi dashboard
	var kpiOwnerFn=function(){
		$(".pageEmb").remove();
		$("body").append("<input type='hidden' name='pageKpiDashboard' id='pageKpiDashboard' class='pageEmb' value='pageKpiDashboard'>");
		$(".topParameter").show();
		$.ajax({
			url:"../View/vKpiOwner.php",
			type:"get",
			dataType:"html",
			async:false,
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cKpiOwner.js");
				
			}
		});
	}
	
var setGridTable=function(){
	//alert("hello");
	$(".k-grid td").css({
		"padding-top":"2px",
		"padding-bottom":"2px"
	});
};


//dropdown List Department start
var fnDropdownListDep=function(department_id,paramSelectAll){
	//alert(department_id);
	$.ajax({
		url:"../Model/mDepartmentList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":paramSelectAll},
		success:function(data){
			console.log(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"department_id\" name=\"department_id\" class=\"form-control \" style=\"width:auto;\">";
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
			//persDropDrowList
		}
	});
}	
fnDropdownListDep();
//dropdown List Department start


//dropdown List AppralisalPeriod start
var fnDropdownListAppralisal=function(year,appraisal_period_id,paramSelectAll){
	alert(paramSelectAll);
	$.ajax({
		url:"../Model/mAppralisalPeriodList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"year":year,"paramSelectAll":paramSelectAll},
		success:function(data){
			console.log(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"appraisal_period_id\" name=\"appraisal_period_id\" class=\"appraisal_period_id\">";
				$.each(data,function(index,indexEntry){
					if(appraisal_period_id==indexEntry[0]){
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
					}else{
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
					}
					
				});
			htmlDropDrowList+="</select>";
			
			$("#periodArea").html(htmlDropDrowList);
			//persDropDrowList
		}
	});
}	
//fnDropdownListAppralisal("2012");
//dropdown year change action start
/*
$("#year").change(function(){
	fnDropdownListAppralisal($(this).val());
});
$("#year").change();
*/
//dropdown year change action end

//dropdown List AppralisalPeriod start

//dropdown List Position start

var fnDropdownListPosition=function(position_id,paramSelectAll){
	//alert("position");
	$.ajax({
		url:"../Model/mPositionList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":paramSelectAll},
		success:function(data){
			console.log(data);
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"position_id\" name=\"position_id\" class=\"form-control \" style=\"width:auto;\">";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					
					if(position_id==indexEntry[0]){
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
					}else{
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
					}
					
					
				});
			htmlDropDrowList+="</select>";
			
			$("#positionArea").html(htmlDropDrowList);
			$("#position1").change(function(){
				//alert($(this).val());
				fnDropdownListEmployee($(this).val());
			});
			//persDropDrowList
			
		}
	});
}	
//fnDropdownListPosition();
//dropdown List Position start


//dropdown List Department start
/*
var fnDropdownListDep=function(department_id){
	//alert(perspective_id);
	$.ajax({
		url:"../Model/mDepartmentList.php",
		type:"post",
		dataType:"json",
		async:false,
		success:function(data){
			console.log(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"department_id\" name=\"department_id\">";
				$.each(data,function(index,indexEntry){
					if(department_id==indexEntry[0]){
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
					}else{
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
					}
					
				});
			htmlDropDrowList+="</select>";
			
			$("#depDropDrowListArea").html(htmlDropDrowList);
			//persDropDrowList
		}
	});
}	
*/
//fnDropdownListDep();
//dropdown List Department start

//dropdown List Division start
var fnDropdownListDiv=function(division_id){
	//alert(perspective_id);
	$.ajax({
		url:"../Model/mDivisionList.php",
		type:"post",
		dataType:"json",
		async:false,
		success:function(data){
			//alert(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"division_id\" name=\"division_id\" class=\"form-control \" style=\"width:80px;\">";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					if(division_id==indexEntry[0]){
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
					}else{
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
					}
					
				});
			htmlDropDrowList+="</select>";
			//divDropDrowListArea
			$("#divDropDrowListArea").html(htmlDropDrowList);
			//persDropDrowList
		}
	});
}	
//fnDropdownListDiv();


//dropdown List Role start
var fnDropdownListRole=function(role_id){
	//alert(perspective_id);
	$.ajax({
		url:"../Model/mRoleList.php",
		type:"post",
		dataType:"json",
		async:false,
		success:function(data){
			//alert(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"role_id\" name=\"role_id\" class=\"form-control \" style=\"width:auto;\">";
			
				$.each(data,function(index,indexEntry){
					if(role_id==indexEntry[0]){
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
					}else{
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
					}
					
				});
			htmlDropDrowList+="</select>";
			//divDropDrowListArea
			$("#roleDropDrowListArea").html(htmlDropDrowList);
			//persDropDrowList
		}
	});
}	
//fnDropdownListDiv();

//dropdown List Role end



//dropdown List KPI start
var fnDropdownListKPI=function(kpi_id){
	//alert(kpi_id);
	$.ajax({
		url:"../Model/mKpiList.php",
		type:"post",
		dataType:"json",
		async:false,
		success:function(data){
			//alert(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"kpi_id\" name=\"kpi_id\" class=\"form-control \" style=\"width:auto;\">";
				$.each(data,function(index,indexEntry){
					if(kpi_id==indexEntry[0]){
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
					}else{
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
					}
					
				});
			htmlDropDrowList+="</select>";
			
			$("#kpiDropDrowListArea").html(htmlDropDrowList);
			
			
			
		}
	});
}	
//fnDropdownListKPI();
//dropdown List KPI start


//dropdown List Employee start
var fnDropdownListEmployee=function(position_id,emp_id){
	//alert("position");
	$.ajax({
		url:"../Model/mEmployeeList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"position_id":position_id},
		success:function(data){
			console.log(data);
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"employee_id\" name=\"employee_id\" class=\"form-control \" style=\"width:auto;\">";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					
					if(emp_id==indexEntry[0]){
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
					}else{
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
					}
					
					
					
				});
			htmlDropDrowList+="</select>";
			
			$("#employeeArea").html(htmlDropDrowList);
			//persDropDrowList
			
		}
	});
}	
//fnDropdownListEmployee();
//dropdown List Employee start




var callProgramControl=function(programControl){
	$(".programControl").remove();
	$("head").append("<script src='../Controller/"+programControl+"' class='programControl'>");
}

$(document).ready(function(){
	
	

	//dropdown List AppralisalPeriod start
	/*
	var fnDropdownListAppralisal=function(year,appraisal_period_id){
		//alert(year);
		$.ajax({
			url:"../Model/mAppralisalPeriodList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"year":year},
			success:function(data){
				//alert(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"appraisal_period_id\" name=\"appraisal_period_id\" class=\"form-control \" style=\"width:auto;\">";
					$.each(data,function(index,indexEntry){
						if(appraisal_period_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				//alert(htmlDropDrowList);
				$("#appraisalPeriodAea").html(htmlDropDrowList);
				//persDropDrowList
			}
		});
	}	
*/
	//#################  Create Parameter End #####################

	//#################  Create Parameter Year Start   ############
	var paramYear=function(kpi_year){


			$.ajax({
				url:"../Model/mAppraisalYearList.php",
				type:"post",
				dataType:"json",
				async:false,
				success:function(data){
					var htmlDropDrowList="";
					htmlDropDrowList+="<select id=\"appraisal_year\" name=\"appraisal_year\" class=\"form-control \" style=\"width:auto;\">";
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
					$("#appraisalYearArea").html(htmlDropDrowList);
					$("#appraisal_year").change(function(){
						
						fnDropdownListAppralisal($(this).val());
					});
				}
			});
			

	}
	//paramYear($("#paramYearEmb").val());
	//fnDropdownListAppralisal($("#appraisal_year").val());
	//#################  Create Parameter Year End   ############

	
	
	//################START CLICK kpiDashboard DISPLAY OWNER DAASHBOARD ##################
	var ownnerDisplayFn=function(){
		//alert($("#depDisable").val());
		
		if($("#depDisable").val()=="disable"){
			kpiOwnerFn();
			
			if($("#paramYearEmb").val()!=undefined){
				paramYear($("#paramYearEmb").val());
				fnDropdownListDep($("#departmentIdEmp").val(),"selectAll");
				$("#department_id").prop('disabled', 'disabled');
				fnDropdownListAppralisal($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),"selectAll");
			}else{
				paramYear();
				fnDropdownListDep($("#departmentIdEmp").val(),"selectAll");
				fnDropdownListAppralisal($("#appraisal_year").val(),"","selectAll");
				$("#department_id").prop('disabled', 'disabled');
			}
			// call function index page
			
				$("#areaPieByDepartment").empty();
				var htmlGaugeArea="";
				htmlGaugeArea+="<div id=\"gauge-container\">";
				htmlGaugeArea+="<div class=\"gaugeDep\" id=\"gaugeDep\"></div>";
				htmlGaugeArea+="<div id=\"gauge-dep-value\"></div>";
				htmlGaugeArea+="</div>";
				
				$("#areaPieByDepartment").html(htmlGaugeArea);
				
				gaugeDep($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#paramDepartmentEmb").val());
				
				$("#pieChartByDepartment").hide();
				$("#pieChartKpiResult").show();
				$("#titleKpiAndDep").html("ผลการประเมินตามKPIs");
				//alert($("#paramDepartmentNameEmb").val());
				$("#titleDepTop").html("ผลการประเมิน"+$("#paramDepartmentNameEmb").val());
				piChartkpiResult($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#paramDepartmentEmb").val());
			
			gaugeOwner($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),"All");
			barChart($("#paramYearEmb").val(),$("#paramDepartmentEmb").val());
			TableKpiResult($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#paramDepartmentEmb").val());
			
			actionGaugeDep();
			
			
			/*add subject on page*/
			var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-dashboard\"></i> "+$("#kpiDashboard >.menu-text").text()+"</b>";
			$("#subjectPage").html(subjectPage);
			
		}else{
			
		
		kpiOwnerFn();
		
		if($("#paramYearEmb").val()!=undefined){
		paramYear($("#paramYearEmb").val());
		fnDropdownListDep($("#paramDepartmentEmb").val(),"selectAll");
		fnDropdownListAppralisal($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),"selectAll");
		}else{
			paramYear();
			fnDropdownListDep("","selectAll");
			fnDropdownListAppralisal($("#appraisal_year").val(),"","selectAll");	
		}
		// call function index page
		
		if($("#paramDepartmentEmb").val()=="All"){
			$("#areaPieByDepartment").empty();
			
			$("#areaPieByDepartment").html("<div id='pieByDepartment'></div>");
			easyPieChartMainFn($("#paramYearEmb").val(),$("#paramAppraisalEmb").val());
			$("#pieChartByDepartment").show();
			$("#pieChartKpiResult").hide();
			$("#titleKpiAndDep").html("ผลการประเมินตามแผนก");
			$("#titleDepTop").html("ผลการประเมินแต่ละแผนก");
			
			pieChartDepResult($("#paramYearEmb").val(),$("#paramAppraisalEmb").val());
		}else{
			$("#areaPieByDepartment").empty();
			var htmlGaugeArea="";
			htmlGaugeArea+="<div id=\"gauge-container\">";
			htmlGaugeArea+="<div class=\"gaugeDep\" id=\"gaugeDep\"></div>";
			htmlGaugeArea+="<div id=\"gauge-dep-value\"></div>";
			htmlGaugeArea+="</div>";
			
			$("#areaPieByDepartment").html(htmlGaugeArea);
			
			gaugeDep($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#paramDepartmentEmb").val());
			
			$("#pieChartByDepartment").hide();
			$("#pieChartKpiResult").show();
			$("#titleKpiAndDep").html("ผลการประเมินตามKPIs");
			//alert($("#paramDepartmentNameEmb").val());
			$("#titleDepTop").html("ผลการประเมิน"+$("#paramDepartmentNameEmb").val());
			piChartkpiResult($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#paramDepartmentEmb").val());
		}
		gaugeOwner($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),"All");
		barChart($("#paramYearEmb").val(),$("#paramDepartmentEmb").val());
		TableKpiResult($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#paramDepartmentEmb").val());
		
		actionGaugeDep();
		
		
		/*add subject on page*/
		var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-dashboard\"></i> "+$("#kpiDashboard >.menu-text").text()+"</b>";
		$("#subjectPage").html(subjectPage);
		}
	};
	
	//################END CLICK kpiDashboard DISPLAY OWNER DAASHBOARD ####################
	
	$("#kpiDashboard").off("click");
	$("#kpiDashboard").on("click",function(){
		//call fn
		ownnerDisplayFn();
		
	});
	
	
	// Defualt Click this Element on Start Up Start.
	$.ajax({
		url:"../Model/mCheckRole.php",
		type:"get",
		dataType:"json",
		async:false,
		data:{"emp_id":$("#emp_id").val()},
		success:function(data){
			//alert(data);
			if(data[0][0]=="emp"){
				$(".pageEmb").remove();
				$(".RoleEmb").remove();
				
				setTimeout(function(){
					//### withdrow panel left ###
					$("#withdrawEnlarge").click();
				});
				
				
				
				$("body").append("<input type=\"hidden\" name=\"pageDepartment\" id=\"pageDepartment\" class=\"pageEmb\" value=\"pageDepartment\">");
				$("body").append("<input type=\"hidden\" name=\"roleEmp\" id=\"roleEmp\" class=\"RoleEmb\" value=\"roleEmp\">");
				$("body").append("<input type=\"hidden\" name=\"departmentIdEmp\" id=\"departmentIdEmp\" class=\"RoleEmb\" value=\""+data[0][1]+"\">");
				
				$("body").append("<input type=\"hidden\" name=\"departmentNameEmp\" id=\"departmentNameEmp\" class=\"RoleEmb\" value=\""+data[0][2]+"\">");
				$("body").append("<input type=\"hidden\" name=\"roleLevelEmp\" id=\"roleLevelEmp\" class=\"RoleEmb\" value=\""+data[0][4]+"\">");
				if((data[0][4]=="Level3") || (data[0][4]=="Level2")){
					$("body").append("<input type=\"hidden\" name=\"depDisable\" id=\"depDisable\" class=\"RoleEmb\" value=\"disable\">");
				}
				
				//Define Role for display on dashboord
				if($("#roleLevelEmp").val()=="Level3"){
				$.ajax({
					url:"../View/vKpiDashboard.php",
					type:"get",
					dataType:"html",
					async:false,
					data:{"kpi_year":data[0][3],"appraisal_period_id":"All","department_id":data[0][1],"department_name":data[0][2]},
					success:function(data2){
						//alert("hello2");
						$("#mainContent").html(data2);
						callProgramControl("cKpiDashboard.js");
						
						//kpiDasboardMainFn(2015,"All","9","แผนก11","2");
						
						kpiDasboardMainFn(data[0][3],"All",data[0][1],data[0][2],$("#emp_id").val());
						//kpiDasboardMainFn($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#departmentIdEmp").val(),$("#departmentNameEmp").val(),$("#emp_id").val());
						//$("#appraisalPeriodSubmit").click();
					}
				});
				}else if($("#roleLevelEmp").val()=="Level2"){
					
					ownnerDisplayFn();
					
				}else if($("#roleLevelEmp").val()=="Level1"){
					
					ownnerDisplayFn();
				}
				
			
			}else{
	
				$(".RoleEmb").remove();
				$("body").append("<input type=\"hidden\" name=\"roleAdmin\" id=\"roleAdmin\" class=\"RoleEmb\" value=\"roleAdmin\">");
				
			}
				/*
				$.ajax({
					url:"../View/vKpiDashboard.php",
					type:"get",
					dataType:"html",
					async:false,
					data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"department_id":department_id,"department_name":department_name},
					success:function(data){
						$("#mainContent").html(data);
						callProgramControl("cKpiDashboard.js");
						kpiDasboardMainFn(kpi_year,appraisal_period_id,department_id,department_name);
					}
				});
				*/
				
			}
	});
	
	// Defualt Click this Element on Start Up End.
	
	
	
	

	/* start call approveKpiResult  */
	$("#approveKpiResult").click(function(){
		$(".topParameter").hide();
		
		//### Embed Page Start ###
		$(".pageEmb").remove();
		$("body").append("<input type='hidden' name='pageApproveKpiResult' id='pageApproveKpiResult' class='pageEmb' value='pageApproveKpiResult'>");
		
		//### Embed Page End ###
		
		$.ajax({
			url:"../View/vApproveKpiResult.php",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cApproveKpi.js");
				
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-edit\"></i> "+$("#approveKpiResult >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			}
		});
	});
	/* end call approveKpiResult  */
	
	
	/* start call kpi result  */
	$("#kpiResult").click(function(){
		$(".topParameter").hide();
		//### Embed Page Start ###
		$(".pageEmb").remove();
		$("body").append("<input type='hidden' name='pageKpiResult' id='pageKpiResult' class='pageEmb' value='pageKpiResult'>");
		//### Embed Page End ###
		$.ajax({
			url:"../View/vResultKpi.php",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cResultKpi.js");
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-dashboard\"></i> "+$("#kpiResult >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			}
		});
	});

	/* end call kpi result  */
	
	
	/* start call position  */
	$("#position").click(function(){
		$(".topParameter").hide();
		//### Embed Page Start ###
		$(".pageEmb").remove();
		$("body").append("<input type='hidden' name='pagePosition' id='pagePosition' class='pageEmb' value='pagePosition'>");
		//### Embed Page End ###
		
		$.ajax({
			url:"../View/vPosition.php",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cPosition.js");
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-fire\"></i> "+$("#position >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			}
		});
	});

	/* end call position  */
	
	/* start call employee  */
	$("#employee").click(function(){
		
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vEmployee.php",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				//$(".emb_param").remove();
				callProgramControl("cEmployee.js");
				//$(".emb_param").remove();
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-user\"></i> "+$("#employee >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			}
		});
	});

	/* end call employee  */
	
	
	/* start call assignKPI  */
	$("#assignKPI").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vAssignKPI.php",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cAssignKpi.js");
				//showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id").val(),$("#department_id").val(),$("#division_id").val(),$("#position_id").val(),$("#employee_id").val());
				//showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#division_id_emb").val(),$("#position_id_emb").val());
				
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-signal\"></i> "+$("#assignKPI >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			
			}
		});
	});

	/* end call kpiBaseLine  */
	/* start call appraisalPeriod  */
	$("#appraisalPeriod").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vAppraisalPeriod.php",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cAppraisalPeriod.js");
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-time\"></i> "+$("#appraisalPeriod >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			}
		});
	});

	/* end call kpiBaseLine  */
	
	
	/* start call kpiBaseLine  */
	$("#kpiBaseLine").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vKpiBaseLine.php",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				//scallProgramControl("cThreshold.js");
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-dashboard\"></i> "+$("#kpiBaseLine >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
				
			}
		});
	});

	/* end call kpiBaseLine  */
	
	/* start call threshold  */
	$("#threshold").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vThreshold.php",
			type:"get",
			dataType:"html",
			sync:false,
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cThreshold.js");
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon  glyphicon-th-large\"></i> "+$("#threshold >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
				
			}
		});
	});

	/* end call threshold  */
	
	/* start call Department  */
	$("#department").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vDepartment.php",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cDepartment.js");
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-road\"></i> "+$("#department >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			}
		});
	});

	/* end call Department  */
	
	/* start call Division  */
	$("#division").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vDivision.php",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cDivision.js");
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-dashboard\"></i> "+$("#division >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			}
		});
	});

	/* end call Division  */
	
	
	/* start call executive summary */
	$("#executive").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/executive.html",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-dashboard\"></i> "+$("#executive >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			}
		});
	});
	
	
	/* end call executive summary */
	
	/* start call traffic */
	$("#traffic").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/traffic.html",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-dashboard\"></i> "+$("#traffic >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			}
		});
	});
	
	
	

	$("#kpi").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vKpi.php",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cKPI.js");
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-edit\"></i> "+$("#kpi >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			}
		});
	});
	
	$("#hr").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/hr.html",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
			}
		});
	});
	
	$("#education").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/education.html",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
			}
		});
	});
	
	/*start manufactoring*/
	$("#manufactoring").click(function(){
		$.ajax({
			url:"../View/manufacturing.html",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
			}
		});
	});
	/*end manufactoring*/
	
	

   	  
   	  	
   	  $("li.list-group-item a").click(function(){
   		  
      	if($(this).hasClass("dropdownCollapse")){
      		//alert("dropdownCollapse");
      		$(this).removeClass("dropdownCollapse");
      		$(this).addClass("dropdownEnlarge");
      		$( "li.list-group-item  ul").show();
      		console.log($( "li.list-group-item>ul").text());
      	}else{
      		$(this).removeClass("dropdownEnlarge");
      		$(this).addClass("dropdownCollapse");
      		$( "li.list-group-item ul").hide();
      		//(this>ul).hide();
      		//alert("dropdownEnlarge");
      	}
      	
      	return false;
      });

   	  
   	  $("#gearOption").click(function(){
   		 
   		  if($(".optionArea").hasClass("active")){
   			$(".optionArea").animate({"left":"-30px"}).removeClass("active");
   		  }else{
   			$(".optionArea").animate({"left":"-330px"}).addClass("active"); 
   		  }
  
   		 return false;
   	  });
   	 
   	  /*withdraw Enlarge start */
   	  
   	  var withdrawEnlargeCom=function(thisParam){
   		    $("#slideLeft").css({"width":"200px"});
			$(".sidebar-background").css({"width":"200px"});
			$("#mainContent").css({"margin-left":"201px"});
			$(thisParam).addClass("active");
			$(".menu-text").show();
			$(".boxTitle").css({"width":"200px"});
			$(".boxLeftTopSmall").hide();
			$(".boxLeftTopLarge").show();
			$(".subMenu").removeClass("submenuHover").css({"padding-left":"5px"});
			$("#slideLeft").show();
			
   	  };
   	  $("#withdrawEnlarge").click(function(){

   		 if($(this).hasClass("active")){
   			 
   			 $("#slideLeft").css({"width":"50px"});
   			 $(".sidebar-background").css({"width":"50px"});
   			 $("#mainContent").css({"margin-left":"50px"});
   			 $(this).removeClass("active");
   			 $(".menu-text").hide();
   			 $(".boxTitle").css({"width":"50px"});
   			 $(".boxLeftTopSmall").show();
   			 $(".boxLeftTopLarge").hide();
   			 $(".subMenu").addClass("submenuHover").css({"padding-left":"0px"});
   			 $("#slideLeft").show();
   			 
   		 }else{
   			
   			withdrawEnlargeCom(this);
   		 }
   	  });
   	/*withdraw Enlarge end */
   	  
   	  //full screen start
   	 $(".fullscreen-supported").toggle($(document).fullScreen() != null);
     $(".fullscreen-not-supported").toggle($(document).fullScreen() == null);
     
     $(document).bind("fullscreenchange", function(e) {
        console.log("Full screen changed.");
        $("#status").text($(document).fullScreen() ? 
            "Full screen enabled" : "Full screen disabled");
     });
     
     $(document).bind("fullscreenerror", function(e) {
        console.log("Full screen error.");
        $("#status").text("Browser won't enter full screen mode for some reason.");
     });
     
     
     $("#btnFullScreen").click(function(){
    	 
    	 $(document).toggleFullScreen(); 
    	 
     });
     
   	  //full screen end
     
     //sub menu mouse hover start
     $("ul.nav-list>li").mouseenter(function(e){
			$(".submenuHover",this).css({"top":"-0px","left":"50px"});
			$(".submenuHover",this).show();
			$(this).css({"background":"#f5f5f5"});
		}).mouseleave(function() {
			$(".submenuHover").hide();
			$(this).css({"background":""});
		});
     //sub menu mouse hover end
     
     /*list submenu +-*/
     $("#creteDashboard1").click(function(){
    	
    	if($(this).hasClass("dropdownCollapse")){
    		
    		$(this).next().children()
    		.addClass("glyphicon-plus")
    		.removeClass("glyphicon-minus");
    		
     	}else{
     		
     		$(this).next().children()
     		.removeClass("glyphicon-plus")
    		.addClass("glyphicon-minus");
     		
     	}
     });
     $("#creteDashboard2").click(function(){
    	
     	if($(this).hasClass("dropdownCollapse")){
     		
     		$(this).next().children()
     		.addClass("glyphicon-plus")
     		.removeClass("glyphicon-minus");
     		
      	}else{
      		
      		$(this).next().children()
      		.removeClass("glyphicon-plus")
     		.addClass("glyphicon-minus");
      		
      	}
      });
     /**/
     
     /*button left top in main menu action start*/
     /*
     connect-database
     connect-admin
     connect-message
     connect-mission
     */
     $(".connect-database").click(function(){
    	alert("For premium package."); 
     });
     $(".connect-admin").click(function(){
    	 alert("For premium package."); 
      });
     $(".connect-message").click(function(){
    	 alert("For premium package."); 
      });
     $(".connect-mission").click(function(){
    	 alert("For premium package."); 
      });
     /*button left top in main menu action start*/
     
     /*option start action start*/
     $(".themeAction").click(function(){
    	 alert("For premium package."); 
      });
     /*option start action start*/
     
     
     
});
