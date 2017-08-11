$(document).ready(function(){
	var htmlActual="";
	if($("#actualManual" ).prop( "checked", true )){
		//htmlActual="<input type=\"text\" id=\"kpiActualManual\" name=\"kpiActualManual\">";
		$("#kpiActualManual").show();
		$("#kpiActualQuery").hide();
	}else{
		$("#kpiActualManual").hide();
		$("#kpiActualQuery").show();
		//htmlActual="<textarea id=\"kpiActualQuery\" name=\"kpiActualQuery\"></textarea>";
	}
	//$("#areaKPIActual").html(htmlActual);
	
	$(".kpiTypeActual").click(function(){
		//alert($(this).val());
		
		if($(this).val()==0){
			
			//Manual
			$("#kpiActualManual").show();
			$("#kpiActualQuery").hide();
			//htmlActual="<input type=\"text\" id=\"kpiActualManual\" name=\"kpiActualManual\">";
		}else{
			//Query
			$("#kpiActualManual").hide();
			$("#kpiActualQuery").show();
			//htmlActual="<textarea id=\"kpiActualQuery\" name=\"kpiActualQuery\"></textarea>";
			//alert("1");
		}
		//$("#areaKPIActual").html(htmlActual);
	});
	
//$( "#x" ).prop( "checked", true );
	
	var resetDatakpi=function(){
		$("#kpiCode").val("");
		$("#kpiName").val("");
		$("#kpiTarget").val("");
		$("#kpiDetail").val("");
		
		$("#kpiActualQuery").text("");
		$("#kpiActualManual").val("");
		$("#kpiAction").val("add");
		$("#kpiId").val("");
		$("#kpiSubmit").val("Add");
		//fnDropdownListDev();
		//fnRadioKpiTypeTargetArea(0);
	}
	var showDatakpi=function(){

		$.ajax({
			url:"../Model/mKPI.php",
			type:"post",
			dataType:"html",
			data:{"action":"showData"},
			success:function(data){
				$("#kpiShowData").html(data);
				
				 $("#Tablekpi").kendoGrid({
					 /*
                     height: 300,
                     sortable: true,
                     pageable: {
                         refresh: true,
                         pageSizes: true,
                         buttonCount: 5
                     },
                     */
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
							url:"../Model/mKPI.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								//alert("["+data[0]["department_id"]+"]");
								//alert(data[0]["kpi_name"]);
								$("input#kpiName").val(data[0]["kpi_name"]);
								$("input#kpiTarget").val(data[0]["kpi_target"]);
								
								$("#kpiDetail").val(data[0]["kpi_detail"]);

								$("#kpiActualManual").val(data[0]["kpi_actual_manual"]);
								$("#kpiActualQuery").val(data[0]["kpi_actual_query"]);
								
								fnDropdownListDep(data[0]["department_id"]);
								fnDropdownListDiv(data[0]["division_id"]);
								fnRadioKpiTypeTargetArea(data[0]["kpi_type_target"]);
								
								$("#kpiAction").val("editAction");
								$("#kpiId").val(data[0]["kpi_id"]);
								$("#kpiCode").val(data[0]["kpi_code"]);
								$("#kpiSubmit").val("Edit");
								
								
								
								
								
								
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
					 //alert("hello");
					 //alert(this.id);
					 
					 var idDel=this.id.split("-");
					 var id=idDel[1];
					 
					//Check kpi_assign and kpi_result it using employee.? Start
					 $.ajax({
							url:"../Model/mKPI.php",
							type:"post",
							dataType:"json",
							data:{"kpiId":id,"action":"checkUsingKpiAssignAndKpiResult",},
							success:function(data){
									
									if(data[0]==0){
										if(confirm("ต้องการลบข้อมูลนี้หรือไม่?")){	
											
											$.ajax({
												url:"../Model/mKPI.php",
												type:"post",
												dataType:"json",
												data:{"id":id,"action":"del"},
												success:function(data){
													if(data[0]=="success"){
														//alert("ลบข้อมูลเรียบร้อย");	
														showDatakpi();
														
													}
												}
										 });

										}										
									}else{
										alert("ไม่สามารถลยข้อมูลได้! เนื่องจากมีการใช้งานอยู่");
									}
							}
					 });
					 //Check kpi_assign and kpi_result it using employee.? End
					 
					 
					 
				 });
				 //action del,edit end
				 
				 //PRESS RESET SRART
				 $("#kpiReset").click(function(){
					 resetDatakpi();
				 });
				 //PRESS RESET END
				 
				 //action baseline start
				 $(".actionBaseline").click(function(){
					 var idKPI=this.id.split("-");
					 var id=idKPI[1];
					var kpiName=$(this).parent().prev().prev().text();
					// alert(id);
					 $.ajax({
							url:"../View/vKpiBaseLine.php",
							type:"get",
							dataType:"html",
							async:false,
							data:{"kpiName":kpiName},
							success:function(data){
								$("#mainContent").html(data);
								callProgramControl("cKpiBaseline.js");
								
								$(".paramKPI").remove();
								$("body").append("<input type=\"hidden\" name=\"paramKpiId\" id=\"paramKpiId\" class=\"paramKPI\" value="+id+">");
								
									
							
								
							}
						});
					 
				 });
				 //action baseline end
			}
			
		});
	}
	
	showDatakpi();
	
	//radio check start
	var fnRadioKpiTypeTargetArea=function(KpiTypeTarget){
		var hrmlKpiTypeTarget="";
		if(KpiTypeTarget==0){
			hrmlKpiTypeTarget="Manaul <input type=\"radio\" name=\"kpiTypeTarget\" class=\"kpiTypeTarget\" value=\"0\" checked>Query <input type=\"radio\" name=\"kpiTypeTarget\" class=\"kpiTypeTarget\" value=\"1\">";
		}else{
			hrmlKpiTypeTarget="Manaul <input type=\"radio\" name=\"kpiTypeTarget\" class=\"kpiTypeTarget\" value=\"0\" >Query <input type=\"radio\" name=\"kpiTypeTarget\" class=\"kpiTypeTarget\" value=\"1\" checked>";
		}
		$("#kpiTypeTargetArea").html(hrmlKpiTypeTarget);
	}
	//radio check end
	//dropdown List Department start
	var fnDropdownListDep=function(department_id){
		
		$.ajax({
			url:"../Model/mDepartmentList.php",
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"departmentId\" name=\"departmentId\">";
				//htmlDropDrowList+="<option value=\"0\">ไม่ระบุ</option>";
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
	//dropdown List Division start
	var fnDropdownListDiv=function(division_id,department_id){
		//alert(perspective_id);
		$.ajax({
			url:"../Model/mDivisionList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"department_id":department_id},
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"divisionId\" name=\"divisionId\">";
				//htmlDropDrowList+="<option value=\"0\">ไม่ระบุ</option>";
					$.each(data,function(index,indexEntry){
						if(division_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#divDropDrowListArea").html(htmlDropDrowList);
				//persDropDrowList
			}
		});
	}	
	fnDropdownListDiv();
	//dropdown List Division start
	
	//casecast department to division start
	$("#departmentId").change(function(){
		//alert($(this).val());
		fnDropdownListDiv('',$(this).val());
	});
	//casecast department to division end
	
	var validateKPIsFn=function(){
		var validate="";
		if($("#kpiCode").val()==""){
	 		validate+="กรอก  KPI CODE ด้วยครับ \n";
	 	}if($("#kpiName").val()==""){
	 		validate+="กรอก  KPI NAME ด้วยครับ \n";
	 	} 
	 	
	 	return validate;
	}
	$("form#kpiForm").submit(function(){
		//alert($(".kpiTypeTarget:checked").val());
		//alert($("select#perspective option:selected").val());
		/*
		alert($("#kpiName").val());
		alert($("#kpiBegin").val());
		alert($("#kpiEnd").val());
		alert($("#kpiColor").val());
		*/
		if(validateKPIsFn()!=""){
			alert(validateKPIsFn());
		}else{
			$.ajax({
				url:"../Model/mKPI.php",
				type:"post",
				dataType:"json",
				data:{"kpiName":$("#kpiName").val(),"kpiDetail":$("#kpiDetail").val(),
					"action":$("#kpiAction").val(),"kpiId":$("#kpiId").val(),
					"departmentId":$("select#departmentId option:selected").val(),"divisionId":$("select#divisionId option:selected").val(),
					"kpiActualQuery":$("#kpiActualQuery").val(),"kpiActualManual":$("#kpiActualManual").val(),
					"kpiTypeActual":$(".kpiTypeActual:checked").val(),"kpiTarget":$("#kpiTarget").val(),
					"kpiCode":$("#kpiCode").val()
					},
				success:function(data){
					if(data[0]=="success"){
						alert("บันทึกข้อมูลเรียบร้อย");	
						showDatakpi();
						resetDatakpi();	
					}
					if(data[0]=="editSuccess"){
						alert("แก้ไขข้อมูลเรียบร้อย");	
						showDatakpi();
						resetDatakpi();
							
					}
					
				}
				
			});
		}
		return false;
	});
	
	
});