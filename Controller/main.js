/* start call kpiDashboard */
/*Support Data Start.*/
/*
PHP Version 5.6.30
mysql Version 5.5.49
*/
/*Support Data End*/


$( document ).ajaxStart(function() {
	$("body").mLoading();
});
$( document ).ajaxStop(function() {
	$("body").mLoading('hide');
});

// reuse function start


//warning in modal start
var warningInModalFn = function(id,data){
var html="";
	
	html+="<br style=\"clear: both;\">";
	html+="<div id=\"warningInModal\"  class=\"alert alert-warning alert-dismissible fade in \" role=\"alert\"> ";
	html+="<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
	html+="<span aria-hidden=\"true\">×</span></button> ";
	html+="<span id=\"warningInModalDetail\">"+data+"</span> ";
	html+="</div>";

	$(id).html(html);
	
}
//warning in modal end
//confirm in modal start
var confirmMainModalFn = function(detail="ยืนยัน",title="ยืนยัน",type="confirm",idConfirmOK="confirmOK"){
	
	var html="";
	html+="<div  id=\"confirmMainModal\" class=\"modal fade bs-example-modal-sm \" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"mySmallModalLabel\">";
		html+="<div class=\"modal-dialog modal-md\" role=\"document\">";
			html+="<div class=\"modal-content \">";
			html+="<div class=\"modal-header alert-info\">";
			html+="<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
			html+="<h4 class=\"modal-title\"  id=\"confirmTitle\">"+title+"</h4>";
		html+="</div>";
		html+="<div class=\"modal-body\">";
			html+="<p id=\"confirmDetail\">"+detail+"</p>";
		html+="</div>";
		html+="<div class=\"modal-footer\">";
			html+="<button type=\"button\" id="+idConfirmOK+" class=\"btn btn-primary confirmOK\">ตกลง</button>";
			html+="<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">ปิด</button>";
						
		html+="</div>";
		html+="</div>";
		html+="</div>";
	html+="</div>";
	

	$("#modalMainConfirmArea").html(html);



	if(type=="confirm"){
		$(".confirmOK").show();
	}else if(type=="warning"){
		$(".confirmOK").hide();
		
	}
	$("#confirmMainModal").modal();

}
var confirmMainModalHideFn = function(){
	$("#confirmMainModal").modal("hide");
	$("#confirmTitle").html("");
	$("#confirmDetail").html("");	
	$("#modalMainConfirmArea").html("");
}
//confirm in modal end

/*withdraw Enlarge start */
   	  
var EnlargeFn=function(){
 $("#slideLeft").css({"width":"200px","opacity":1});
 $(".sidebar-background").css({"width":"200px"});
 $("#mainContent").css({"margin-left":"201px"});
 //$("#mainContent").css({"margin-left":"50px"});
 //$(thisParam).addClass("active");
 $(".menu-text").show();
 $(".boxTitle").css({"width":"200px"});
 $(".boxLeftTopSmall").hide();
 $(".boxLeftTopLarge").show();
 $(".subMenu").removeClass("submenuHover").css({"padding-left":"5px"});
 $("#slideLeft").show();
 
 
 
};
var withdrawFn=function(){

	$("#slideLeft").css({"width":"50px","opacity":1});
	$(".sidebar-background").css({"width":"50px"});
	$("#mainContent").css({"margin-left":"50px"});
	//$(thisParam).removeClass("active");
	$(".menu-text").hide();
	$(".boxTitle").css({"width":"50px"});
	$(".boxLeftTopSmall").show();
	$(".boxLeftTopLarge").hide();
	$(".subMenu").addClass("submenuHover").css({"padding-left":"0px"});
	$("#slideLeft").show();
 

};


var checkWithDrawEnlarge = function(){
	if($("#withdrawEnlarge").hasClass("active")){
		withdrawFn();
 	}else{
 		EnlargeFn();
 	}
}

//CHECK BROWSER FN
var checkBrowserFn=function(){
	
	if($(window).width()<980){
		$("#withdrawEnlarge").addClass('active');
		withdrawFn();
	}
};

var currentDate = function(){
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();
	var output = d.getFullYear() + '-' +
		((''+month).length<2 ? '0' : '') + month + '-' +
		((''+day).length<2 ? '0' : '') + day;

	return output;
}
var currentYear = function(){
	var d = new Date();
	
	var year = d.getFullYear();
	

	return year;
}
	
// reuse function end



var checkTokenFn = function(data){
	
$.ajax({
		url:"../Model/mCheckToken.php",
		type:"get",
		dataType:"json",
		async:false,
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		
		success:function(data){

			
			console.log(data);
			if(data['status']=="400"){

				
				window.location="../"+$("#embed_admin_username").val();
				return false;

			}else{
				//alert("200");
				return true;
				
			}
			return false;

			
		}
	});

	
}



//assign page
var resetDataAssignKpi_bk=function(activeKPIs){
		if(activeKPIs==true){
			fnDropdownAssignListKPI();
		}
		//alert("Reset");
		//fnDropdownListAppralisalAssignKpi($("#year").val());
		//fnDropdownListDep();
		//fnDropdownListDiv();
		//fnDropdownListPosition();
		fnDropdownListEmployee($("#position_id").val());
		
		// kpiAction();
		// $("#kpi_id").change();
		
		
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

		if($("#embed_language").val()=="th"){
			$("#assign_kpi_submit").val("เพิ่ม");
		}else{
			$("#assign_kpi_submit").val("Add");
		}

		//$("#assign_kpi_submit").val("Add");
	}


	/*KPI lIST START*/
	var kpiAction_bk=function(action){
		
		
	
		$("#kpi_id").off("change");
		$("#kpi_id").on("change",function(){
			
					
			$.ajax({
				url:"../Model/mAssignMasterKpi.php",
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
				url:"../Model/mAssignMasterKpi.php",
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

/*function action click department start*/
	var actionGaugeDep=function(){
		
		//Click Department to Show Detail into Start.
		$(".gaugeDep").off("click");
		$(".gaugeDep").on("click",function(){

			//### Call kpiDasboardMainFn for emp role Start ###
			$.ajax({
				url:"../View/vKpiDashboard.php",
				type:"get",
				dataType:"html",
				async:false,
				data:{"kpi_year":sessionStorage.getItem("param_year"),"appraisal_period_id":sessionStorage.getItem("param_appraisal_period"),
					"department_id":sessionStorage.getItem("param_department"),"department_name":$("#paramDepartmentNameEmb").val()
					},
				headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
				success:function(data){
					$("#mainContent").html(data);
					callProgramControl("cKpiDashboard.js");
					kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),$("#paramDepartmentNameEmb").val());
					//### drawdown grid for show detail within ###
					
				}
			});
			//### Call kpiDasboardMainFn for emp role End ###
		
		});
		// Click Department to Show Detail into End.
	}
	/*function action click department end*/
	
	
	// function kpi dashboard
	var kpiOwnerFn_bk=function(){
		$(".pageEmb").remove();
		$("body").append("<input type='hidden' name='pageKpiDashboard' id='pageKpiDashboard' class='pageEmb' value='pageKpiDashboard'>");
		$(".topParameter").show();
		$.ajax({
			url:"../View/vKpiOwner.php",
			type:"get",
			dataType:"html",
			async:false,
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cKpiOwner.js");
				
			}
		});
	}
	
var setGridTable=function(){

	$(".k-grid td").css({
		"padding-top":"2px",
		"padding-bottom":"2px"
	});
};


//dropdown List Department start
var fnDropdownListDep=function(department_id,paramSelectAll){

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
			htmlDropDrowList+="<select id=\"department_id\" name=\"department_id\" class=\" \" >";
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
				$("#department_id").prop("disabled",true);
			}else{
				$("#department_id").prop("disabled",false);
			}

			$("#department_id").kendoDropDownList({
					theme: "silver"
				});
			//persDropDrowList
		}
	});
}	
fnDropdownListDep();
//dropdown List Department start


//Dropdown List AppralisalPeriod start
var fnDropdownListAppralisal=function(year,appraisal_period_id,paramSelectAll){
	//alert(paramSelectAll);
	$.ajax({
		url:"../Model/mAppralisalPeriodList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"year":year,"paramSelectAll":paramSelectAll},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			console.log(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"appraisal_period_id\" name=\"appraisal_period_id\" class=\"appraisal_period_id\" >";
				$.each(data,function(index,indexEntry){
					if(appraisal_period_id==indexEntry[0]){
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
					}else{
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
					}
					
				});
			htmlDropDrowList+="</select>";
			
			$("#periodArea").html(htmlDropDrowList);
			$("#appraisal_period_id").kendoDropDownList({
					theme: "silver"
				});
			//persDropDrowList
		}
	});
}	

//dropdown List Position start

var fnDropdownListPosition=function(position_id,paramSelectAll){
	
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
			htmlDropDrowList+="<select id=\"position_id\" name=\"position_id\" class=\"\" >";
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
			
			$("#positionArea").html(htmlDropDrowList);

			if($("#embed_emp_role_leve").val()=="Level2"){
					$("#position_id").val($("#embed_role_underling_position_id").val()).prop("disabled",true);
			}else{
					$("#position_id").prop("disabled",false);
			}

			$("#position_id").kendoDropDownList({
					theme: "silver"
				});
			$("#position1").change(function(){
				
				fnDropdownListEmployee($(this).val());
			});
			//persDropDrowList
			
		}
	});
}	
//fnDropdownListPosition();
//dropdown List Position end

//dropdown List Division start
var fnDropdownListDiv=function(division_id){
	//alert(perspective_id);
	$.ajax({
		url:"../Model/mDivisionList.php",
		type:"post",
		dataType:"json",
		async:false,
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			//alert(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"division_id\" name=\"division_id\" class=\" \" >";
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
			$("#division_id").kendoDropDownList({
					theme: "silver"
				});
			//persDropDrowList
		}
	});
}	
//fnDropdownListDiv();


//dropdown List Role start
var fnDropdownListRole=function(role_id){
	
	$.ajax({
		url:"../Model/mRoleList.php",
		type:"post",
		dataType:"json",
		async:false,
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
		
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"role_id\" name=\"role_id\" class=\" \" >";
			
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
			$("#role_id").kendoDropDownList({
					theme: "silver"
				});
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
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"kpi_id\" name=\"kpi_id\" class=\" \" >";
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
//fnDropdownListKPI();
//dropdown List KPI start


//dropdown List Employee start
var fnDropdownListEmployee=function(position_id,emp_id){

	$.ajax({
		url:"../Model/mEmployeeList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"position_id":position_id},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			console.log(data);
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"employee_id\" name=\"employee_id\" class=\"\" >";
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
			$("#employee_id").kendoDropDownList({
					theme: "silver"
				});
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
	
	//Start Program ....
	
	//Default Parameter		
	//sessionStorage.setItem("param_year", "All");
	sessionStorage.setItem("param_appraisal_period", "All");
	sessionStorage.setItem("param_department", "All");
	sessionStorage.setItem("param_position", "All");
	sessionStorage.setItem("param_emp", "All");
	sessionStorage.setItem("param_role", "All");

	$(".mainMenu").click(function(){
		$(".mainMenu").removeClass("active");
		$(this).addClass("active");
	});
	

	checkTokenFn();
	checkBrowserFn();

	//Logout Start
	$("#logout").click(function(){
		
		sessionStorage.clear();
		$("form#formLogout").submit();
		 return false;	
	});
	//Logout End

	//#################  Create Parameter Year Start   ############
	var paramYear_bk=function(kpi_year){
		

			$.ajax({
				url:"../Model/mAppraisalYearList.php",
				type:"post",
				dataType:"json",
				async:false,
				headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
				success:function(data){
					var htmlDropDrowList="";
					htmlDropDrowList+="<select id=\"appraisal_year\" name=\"appraisal_year\" class=\" \" >";
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
					$("#appraisal_year").kendoDropDownList({
					theme: "silver"
					});
					
					$("#appraisal_year").change(function(){
						
						fnDropdownListAppralisal($(this).val());
					});
				}
			});
			

	}
	//paramYear(sessionStorage.getItem("param_year"));
	//fnDropdownListAppralisal($("#appraisal_year").val());
	//#################  Create Parameter Year End   ############

	
	
	//################START CLICK kpiDashboard DISPLAY OWNER DAASHBOARD ##################
	var ownnerDisplayFn=function(){
	
		
		if($("#depDisable").val()=="disable"){
			kpiOwnerFn();
			
			
			if(sessionStorage.getItem("param_year")!=null){
				paramYear(sessionStorage.getItem("param_year"));
				fnDropdownListDep($("#departmentIdEmp").val(),"selectAll");
				$("#department_id").prop('disabled', 'disabled');
				fnDropdownListAppralisal(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),"selectAll");
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
				
				gaugeDep(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"));
				
				$("#pieChartByDepartment").hide();
				$("#pieChartKpiResult").show();
				$("#titleKpiAndDep").html("ผลการประเมินตามKPIs");
				//alert($("#paramDepartmentNameEmb").val());
				$("#titleDepTop").html("ผลการประเมิน"+$("#paramDepartmentNameEmb").val());
				piChartkpiResult(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"));
			
				//gaugeOwner(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),"All");
				barChart(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_department"));
				TableKpiResult(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"));
				
				actionGaugeDep();
			
			
			/*add subject on page*/
			var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-dashboard\"></i> "+$("#kpiDashboard >.menu-text").text()+"</b>";
			$("#subjectPage").html(subjectPage);
			
		}else{
			
		
		//Defalult dashboard page start	
		kpiOwnerFn();
		
		
		
		if(sessionStorage.getItem("param_year")!=null){

		paramYear(sessionStorage.getItem("param_year"));
		fnDropdownListDep(sessionStorage.getItem("param_department"),"selectAll");
		fnDropdownListAppralisal(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),"selectAll");
		
		
		}else{
			
			paramYear();
			fnDropdownListDep("","selectAll");
			fnDropdownListAppralisal($("#appraisal_year").val(),"","selectAll");	
		}
		// call function index page
		
		if(sessionStorage.getItem("param_department")=="All"){
			$("#areaPieByDepartment").empty();
			
			$("#areaPieByDepartment").html("<div id='pieByDepartment'></div>");
			easyPieChartMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
			$("#pieChartByDepartment").show();
			$("#pieChartKpiResult").hide();
			$("#titleKpiAndDep").html("ผลการประเมินตามแผนก");
			$("#titleDepTop").html("ผลการประเมินแต่ละแผนก");
			
			pieChartDepResult(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
		}else{
			$("#areaPieByDepartment").empty();
			var htmlGaugeArea="";
			htmlGaugeArea+="<div id=\"gauge-container\">";
			htmlGaugeArea+="<div class=\"gaugeDep\" id=\"gaugeDep\"></div>";
			htmlGaugeArea+="<div id=\"gauge-dep-value\"></div>";
			htmlGaugeArea+="</div>";
			
			$("#areaPieByDepartment").html(htmlGaugeArea);
			
			gaugeDep(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"));
			
			$("#pieChartByDepartment").hide();
			$("#pieChartKpiResult").show();
			$("#titleKpiAndDep").html("ผลการประเมินตามKPIs");
			//alert($("#paramDepartmentNameEmb").val());
			$("#titleDepTop").html("ผลการประเมิน"+$("#paramDepartmentNameEmb").val());
			piChartkpiResult(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"));
		}
		//gaugeOwner(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),"All");
		barChart(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_department"));
		TableKpiResult(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"));
		
		actionGaugeDep();
		
		
		/*add subject on page*/
		var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-dashboard\"></i> "+$("#kpiDashboard >.menu-text").text()+"</b>";
		$("#subjectPage").html(subjectPage);
		}
	};
	
	//################END CLICK kpiDashboard DISPLAY OWNER DAASHBOARD ####################
	

	$("#kpiDashboard").off("click");
	$("#kpiDashboard").on("click",function(){
	
		//ownnerDisplayFn();
		kpiOwnerFn();
		
		
		
	});

	// $("#kpiDashboardEmp").off("click");
	// $("#kpiDashboardEmp").on("click",function(){
	// 	//call fn
	// 	Level3FunctionFn();
		
		
	// });
	// Level3FunctionFn();

	
	
	
	
	
	

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
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
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
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
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
	$("#position_bk").click(function(){
		$(".topParameter").hide();
		//### Embed Page Start ###
		$(".pageEmb").remove();
		$("body").append("<input type='hidden' name='pagePosition' id='pagePosition' class='pageEmb' value='pagePosition'>");
		//### Embed Page End ###
		
		$.ajax({
			url:"../View/vPosition.php",
			type:"get",
			dataType:"html",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
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
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
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
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cAssignKpi.js");
				//showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id").val(),$("#department_id").val(),$("#division_id").val(),$("#position_id").val(),$("#employee_id").val());
				//showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#division_id_emb").val(),$("#position_id_emb").val());
				
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon glyphicon-list-alt\"></i> "+$("#assignKPI >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			
			}
		});
	});

	/* end call kpiBaseLine  */
	/* start call my evaluate  */
	$("#myEvaluate").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vMyEvaluate.php",
			type:"get",
			dataType:"html",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cMyEvaluate.js");
				//showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id").val(),$("#department_id").val(),$("#division_id").val(),$("#position_id").val(),$("#employee_id").val());
				//showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#division_id_emb").val(),$("#position_id_emb").val());
				
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon glyphicon-list-alt\"></i> "+$("#myEvaluate >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			
			}
		});
	});

	/* end call my evaluate  */
	/* start call assignKPI master  */
	$("#assignMasterKPI").click(function(){
		
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vAssignEvaluate.php",
			type:"get",
			dataType:"html",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cAssignEvaluate.js");
				//showDataAssignKpi($("#year_emb").val(),$("#appraisal_period_id").val(),$("#department_id").val(),$("#division_id").val(),$("#position_id").val(),$("#employee_id").val());
				//showDataEmployee($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),$("#division_id_emb").val(),$("#position_id_emb").val());
				
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-indent-left\"></i> "+$("#assignMasterKPI >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			
			}
		});
		
		
	});
	/* end call assignKPI  master*/
	/* start call appraisalPeriod  */
	$("#appraisalPeriod").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vAppraisalPeriod.php",
			type:"get",
			dataType:"html",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
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
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
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
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
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


	/* start call threshold  */
	$("#perspective").click(function(){
		$(".topParameter").hide();
		
		$.ajax({
			url:"../View/vPerspective.php",
			type:"get",
			dataType:"html",
			sync:false,
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cPerspective.js");
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon  glyphicon-th-large\"></i> "+$("#perspective >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
				
			}
		});
	});

	/* end call threshold  */


	/*start call emp appraisal result*/
	$("#appraisalResult").click(function(){
	$(".topParameter").hide();
		$.ajax({
			url:"../View/vKpiDashboard.php",
			type:"get",
			dataType:"html",
			async:false,
			//data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"department_id":department_id,"department_name":department_name},
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cKpiDashboard.js");
				$("#dashboardBackBtn").hide();
				kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),$("#paramDepartmentNameEmb").val());
			}
		});
	});
	/*end call emp appraisal result*/
	
	/* start call Department  */
	$("#department").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vDepartment.php",
			type:"get",
			dataType:"html",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
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
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
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
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
			success:function(data){
				$("#mainContent").html(data);
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-dashboard\"></i> "+$("#executive >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			}
		});
	});
	
	
	/* end call executive summary */
	$("#kpi").click(function(){
		$(".topParameter").hide();
		$.ajax({
			url:"../View/vKpi.php",
			type:"get",
			dataType:"html",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cKPI.js");
				/*add subject on page*/
				var subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-signal\"></i> "+$("#kpi >.menu-text").text()+"</b>";
				$("#subjectPage").html(subjectPage);
			}
		});
	});
   	  	
   	  $("li.list-group-item a").click(function(){
   		  
      	if($(this).hasClass("dropdownCollapse")){
      		
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
   	 
   	  
   	  $("#withdrawEnlarge").click(function(){
		
		//checkWithDrawEnlarge();
   		 if($(this).hasClass("active")){
			
			EnlargeFn();
			$("#withdrawEnlarge").removeClass('active');
			
   			 
   		 }else{
		
			withdrawFn();
			$("#withdrawEnlarge").addClass('active');
			
			
			
   		 }
	  });
	  
	  
		 
	 /*
	  $( "#slideLeft" )
		.mouseover(function() {
			EnlargeFn();
		})
		.mouseout(function() {
			withdrawFn();
		});
		withdrawFn();
*/
   	/*withdraw Enlarge end */
   	  
   	  //full screen start
   	 $(".fullscreen-supported").toggle($(document).fullScreen() != null);
     $(".fullscreen-not-supported").toggle($(document).fullScreen() == null);
     
     $(document).bind("fullscreenchange", function(e) {
        
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
    	alert("สำหรับผู้ดูแลระบบ(Super Admin)");   
     });
     $(".connect-admin").click(function(){
		alert("สำหรับผู้ดูแลระบบ(Super Admin)");  
      });
     $(".connect-message").click(function(){
		alert("สำหรับผู้ดูแลระบบ(Super Admin)");  
      });
     $(".connect-mission").click(function(){
		alert("สำหรับผู้ดูแลระบบ(Super Admin)");   
      });
	  $(".notClick").click(function(){
		alert("สำหรับผู้ดูแลระบบ(Super Admin)");  
	 });
     /*button left top in main menu action start*/
     
     /*option start action start*/
     $(".themeAction").click(function(){
		alert("สำหรับผู้ดูแลระบบ(Super Admin)");  
      });
     /*option start action start*/
     
     
     
     //########################## Reset Data Start ##########################
     var resetDataFn=function(vCoppyForm,vCoppyTo,vTable){
    	 $.ajax({
	 			url:"../Model/mResetData.php",
	 			type:"post",
	 			dataType:"json",
	 			data:{"vCoppyForm":vCoppyForm,"vCoppyTo":vCoppyTo,"action":vTable},
	 			async:false,
	 			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
	 			success:function(data){
	 				if(data=="success"){
	 					alert("Reset Table "+vTable+" is Successfully");
	 				}else{
	 					alert("Reset Table "+vTable+" is Fail");
	 				}
	 			}
	 		});
     }	
  
     $("#btnResetData").click(function(){
    	 var vCoppyForm='198';//id admin source is copy
    	 var vCoppyTo='197'; //id admindestination is copy
    	 resetDataFn(vCoppyForm,vCoppyTo,"threshold");
    	 resetDataFn(vCoppyForm,vCoppyTo,"appraisal_period");
    	 resetDataFn(vCoppyForm,vCoppyTo,"department");
    	 resetDataFn(vCoppyForm,vCoppyTo,"position_emp");
    	 resetDataFn(vCoppyForm,vCoppyTo,"employee");
    	 resetDataFn(vCoppyForm,vCoppyTo,"kpi");
    	 resetDataFn(vCoppyForm,vCoppyTo,"assign_kpi_master");
    	 resetDataFn(vCoppyForm,vCoppyTo,"assign_kpi");

    	 resetDataFn(vCoppyForm,vCoppyTo,"kpi_result");
    	 
    	 
    	 
    	 
    	 return false;
 		});
     //########################## Reset Data End ############################


     //########################## Binding  Tooltip ##########################
    // $('[data-toggle="tooltip"]').tooltip();   
     $("body").kendoTooltip({ 
     	filter: "a[title]",
     	position: "top"
      });



	  
});


/*start route single page*/
var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
	$routeProvider
	.when("/", {
		templateUrl : "vKpiOwner.php"
	})
	.when("/pages/:url", {
		templateUrl : "home1.php",
		controller:"pageController"
		
	})
	.otherwise({
		templateUrl : "home1.php"
	});
});



app.controller("pageController",function($scope, $route, $routeParams){


	

	$route.current.templateUrl = $routeParams.url + ".php";
	  $.get($route.current.templateUrl, function (data){
	       $("#mainContent").html(data);

		   //alert($routeParams.url);
		   checkWithDrawEnlarge();
		   
		   var subjectPage="";
	          $(".mainMenu").removeClass("active");
			  if($routeParams.url=="vKpiOwner"){
				
				
				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-dashboard\"></i> "+$("#kpiDashboardMenu >.menu-text").text()+"</b>";
				$("#kpiDashboardMenu").parent().addClass("active");
			 	$("#kpiDashboardEmpMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
			  }else if($routeParams.url=="vKpiDashboard"){

				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-record\"></i> "+$("#appraisalResultMenu >.menu-text").text()+"</b>";
				$("#appraisalResultMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
			  }else if($routeParams.url=="vAppraisalPeriod"){

				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-time\"></i> "+$("#appraisalPeriodMenu >.menu-text").text()+"</b>";
				$("#appraisalPeriodMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
			  }else if($routeParams.url=="vPerspective"){

				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-fire\"></i> "+$("#perspectiveMenu >.menu-text").text()+"</b>";
				$("#perspectiveMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
			  }else if($routeParams.url=="vDepartment"){
				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-road\"></i> "+$("#departmentMenu >.menu-text").text()+"</b>";
				$("#departmentMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
			  }else if($routeParams.url=="vPosition"){

				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-fire\"></i> "+$("#positionMenu >.menu-text").text()+"</b>";
				$("#positionMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
			  }else if($routeParams.url=="vEmployee"){

				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-user\"></i> "+$("#employeeMenu >.menu-text").text()+"</b>";
				$("#employeeMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
				
			  }else if($routeParams.url=="vKpi"){

				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-signal\"></i> "+$("#kpiMenu >.menu-text").text()+"</b>";
				$("#kpiMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
			  }else if($routeParams.url=="vAssignEvaluate"){

				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-indent-left\"></i> "+$("#assignMasterKPIMenu >.menu-text").text()+"</b>";
				$("#assignMasterKPIMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
			  }else if($routeParams.url=="vAssignKPI"){

				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-list-alt\"></i> "+$("#assignKPIMenu >.menu-text").text()+"</b>";
				$("#assignKPIMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
			  }else if($routeParams.url=="vApproveKpiResult"){

				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-edit\"></i> "+$("#approveKpiResultMenu >.menu-text").text()+"</b>";
				$("#approveKpiResultMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
			  }else if($routeParams.url=="vKpiDashboard"){

				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-record\"></i> "+$("#kpiDashboardEmpMenu >.menu-text").text()+"</b>";
				$("#kpiDashboardEmpMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
			  }else if($routeParams.url=="vMyEvaluate"){

				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-list-alt\"></i> "+$("#myEvaluateMenu >.menu-text").text()+"</b>";
				$("#myEvaluateMenu").parent().addClass("active");
				$("#subjectPage").html(subjectPage);
				
			  }else{
				subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-dashboard\"></i> "+$("#kpiDashboardMenu >.menu-text").text()+"</b>";
				$("#kpiDashboardMenu").parent().addClass("active");
			 	$("#kpiDashboardEmpMenu").parent().addClass("active");

				$("#subjectPage").html(subjectPage);
			  }
			  
			//   else if($routeParams.url=="vKpiOwner"){
			// 	subjectPage="&nbsp;&nbsp;<b><i class=\"glyphicon glyphicon-record\"></i> "+$("#kpiDashboardEmpMenu >.menu-text").text()+"</b>";
			// 	$("#kpiDashboardEmpMenu").parent().addClass("active");
			// 	$("#subjectPage").html(subjectPage);
			//   }



	  });

});
/*end route single page*/
