$(document).ready(function(){
	

	//dropdown List AppralisalPeriod start
	var fnDropdownListAppralisal=function(year,appraisal_period_id){
		
		$.ajax({
			url:"../Model/mAppralisalPeriodList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"year":year},
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"appraisalPeriodList\" name=\"appraisalPeriodList\">";
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
	$("#year").change(function(){
		//alert($(this).val());
		fnDropdownListAppralisal($(this).val());
	});
	$("#year").change();
//dropdown year change action end
	
	//dropdown List AppralisalPeriod start
	
	//dropdown List Position start
	var fnDropdownListPosition=function(position_id){
		//alert("position");
		$.ajax({
			url:"../Model/mPositionList.php",
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				console.log(data);
				
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"positionList\" name=\"positionList\">";
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
	fnDropdownListPosition();
	//dropdown List Position start
	//dropdown List ResultKpi start
	var fnDropdownListPers=function(perspective_id){
		
		//alert(perspective_id);
		$.ajax({
			url:"../Model/mPerspectiveList.php",
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"perspectiveList\" name=\"perspectiveList\">";
					$.each(data,function(index,indexEntry){
						
						if(perspective_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				//alert(htmlDropDrowList);
				$("#perspectiveArea").html(htmlDropDrowList);
				//persDropDrowList
			}
		});
	}	
	fnDropdownListPers();
	//dropdown List ResultKpi start
	
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
				htmlDropDrowList+="<select id=\"employeeList\" name=\"employeeList\">";
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
	fnDropdownListEmployee();
	//dropdown List Employee start
	
	
	
	
	
	
	var resetDataResultKpi=function(){
		fnDropdownListAppralisal($("#year").val());
		fnDropdownListPers();
		fnDropdownListPosition();
		fnDropdownListEmployee($("#positionList").val());
		
		$("#assignKpiAction").val("add");
		$("#assignKpiId").val("");
		$("#assignKpiSubmit").val("Add");
	}
	var showDataResultKpi=function(){
/*

year
appraisalPeriodList
positionList
employeeList
perspectiveList

*/
		$.ajax({
			url:"../Model/mResultKpi.php",
			type:"post",
			dataType:"html",
			data:{"action":"showData","year":$("#year").val(),"appraisalPeriod":$("#appraisalPeriodList").val(),"position":$("#positionList").val(),
				"employee":$("#employeeList").val(),"perspective":$("#perspectiveList").val(),
				},
			success:function(data){
				$("#assignKpiShowData").html(data);
				
				 $("#TableassignKpi").kendoGrid({
                     height: 250,
                     sortable: true,
                     pageable: {
                         refresh: true,
                         pageSizes: true,
                         buttonCount: 5
                     },
                 });
				 setGridTable();
				 
				//alert(data);
				 
				 //action del,edit start
				 $(".actionEdit").click(function(){
					 //alert("hello");
					 //alert(this.id);
					 
					 var idEdit=this.id.split("-");
					 var id=idEdit[1];
					 $.ajax({
							url:"../Model/mResultKpi.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								//alert(data[0]["perspective_id"]);
								
								//$("input#perspectiveName").val(data[0]["perspective_name"]);
								
								/*
								assign_kpi_id
								assign_kpi_year
								appraisal_period_id
								emp_id
								position_id
								perspective_id
								*/
								
								fnDropdownListAppralisal($("#year").val(),data[0]["appraisal_period_id"]);
								fnDropdownListPers(data[0]["perspective_id"]);
								fnDropdownListPosition(data[0]["position_id"]);
								fnDropdownListEmployee($("#positionList").val(),data[0]["emp_id"]);
								
								$("#assignKpiAction").val("editAction");
								$("#assignKpiId").val(data[0]["assign_kpi_id"]);
								$("#assignKpiSubmit").val("Edit");
								
								
								
								
								
								
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
					 //alert("hello");
					 //alert(this.id);
					 
					 var idDel=this.id.split("-");
					 var id=idDel[1];
					 $.ajax({
							url:"../Model/mResultKpi.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"del"},
							success:function(data){
								if(data[0]=="success"){
									alert("ลบข้อมูลเรียบร้อย");	
									showDataResultKpi();
									
								}
							}
					 });
					 
				 });
				 //action del,edit end
				 
				 //PRESS RESET SRART
				 $("#assignKpiReset").click(function(){
					 resetDataResultKpi();
				 });
				 //PRESS RESET END
			}
			
		});
	}
	
	showDataResultKpi();
	
	
	$("form#ResultKpiForm").submit(function(){
		
		
	//alert("hello1");
	/*
	 year
	appraisalPeriod
	position1
	employee
	perspective
	 */
	
		
		$.ajax({
			url:"../Model/mResultKpi.php",
			type:"post",
			dataType:"json",
			data:{"year":$("#year").val(),"appraisalPeriod":$("#appraisalPeriodList").val(),"position":$("#positionList").val(),
			"employee":$("#employeeList").val(),"perspective":$("#perspectiveList").val(),
				"action":$("#assignKpiAction").val(),"assignKpiId":$("#assignKpiId").val()
				},
			success:function(data){
				if(data[0]=="success"){
					alert("บันทึกข้อมูลเรียบร้อย");	
					showDataResultKpi();
					resetDataResultKpi();	
				}
				if(data[0]=="editSuccess"){
					alert("แก้ไขข้อมูลเรียบร้อย");	
					showDataResultKpi();
					resetDataResultKpi();	
				}
				
			}
			
		});
		
		return false;
	});
	
});