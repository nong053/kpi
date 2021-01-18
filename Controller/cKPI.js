var setBaseLineAutoFn =function(paramkpiTypeScore,paramKpiId){
		$.ajax({
			url:"../Model/mKPI.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			data:{"action":"setBaseLineAuto","paramKpiId":paramKpiId,"paramkpiTypeScore":paramkpiTypeScore},
			success:function(data){
				try {
				  
				}
				catch(err) {
				  console.log(err.message);
				}
			}
		});
}

$(document).ready(function(){
	var htmlActual="";

	$(".kpiTypeScore").click(function(){

		if($("#kpiTypeScore1").prop( "checked")==true){
			$("#kpiDataTargetArea").show();
		}else{
			$("#kpiDataTargetArea").hide();
		}
	
	});

	



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
		$("#kpiBetterFlagY").prop("checked",true);
		$("#kpiTypeScore1").prop("checked",true);
		
		$("#kpiTarget").val("");
		$("#kpiDetail").val("");
		
		$("#kpiActualQuery").text("");
		$("#kpiActualManual").val("");
		$("#kpiAction").val("add");
		$("#kpiId").val("");

		$("#kpi_better_flag_area").show();
		$("#kpi_type_score_area").show();
		$("#kpiDataTargetArea").show();
		

		$("#kpiDataTarget").val("");
		

		if($("#embed_language").val()=="th"){
			$("#kpiSubmit").val("เพิ่ม");
		}else{
			$("#kpiSubmit").val("Add");
		}

		//$("#kpiSubmit").val("Add");
		//fnDropdownListDev();
		//fnRadioKpiTypeTargetArea(0);
	}
	var showDatakpi=function(departmentId){

		$.ajax({
			url:"../Model/mKPI.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"html",
			data:{"action":"showData","departmentId":departmentId},
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
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								//alert("["+data[0]["department_id"]+"]");
								//alert(data[0]["kpi_name"]);

								$("#kpi_better_flag_area").hide();
								$("#kpi_type_score_area").hide();
								$("#kpiDataTargetArea").hide();


								$("input#kpiName").val(data[0]["kpi_name"]);

								if(data[0]["kpi_better_flag"]=="Y"){
									$("#kpiBetterFlagY").prop("checked",true);
								}else{
									$("#kpiBetterFlagN").prop("checked",true);
								}

								/*
								if(data[0]["kpi_type_score"]==1){
									$("#kpiTypeScore1").prop("checked",true);
									$("#kpiDataTargetArea").show();

								}else if(data[0]["kpi_type_score"]==2){

									$("#kpiTypeScore2").prop("checked",true);
									$("#kpiDataTargetArea").hide();
								}else if(data[0]["kpi_type_score"]==3){

									$("#kpiTypeScore3").prop("checked",true);
									$("#kpiDataTargetArea").hide();
								}
								*/

								$("#kpiDataTarget").val(data[0]["kpi_data_target"]);

								

								

								$("input#kpiTarget").val(data[0]["kpi_target"]);
								
								$("#kpiDetail").val(data[0]["kpi_detail"]);

								$("#kpiActualManual").val(data[0]["kpi_actual_manual"]);
								$("#kpiActualQuery").val(data[0]["kpi_actual_query"]);
								
								//formFnDropdownListDep(data[0]["department_id"]);
								fnDropdownListDiv(data[0]["division_id"]);
								fnRadioKpiTypeTargetArea(data[0]["kpi_type_target"]);
								
								$("#kpiAction").val("editAction");
								$("#kpiId").val(data[0]["kpi_id"]);
								$("#kpiCode").val(data[0]["kpi_code"]);
								//$("#kpiSubmit").val("Edit");

								if($("#embed_language").val()=="th"){
									$("#kpiSubmit").val("แก้ไข");
								}else{
									$("#kpiSubmit").val("Edit");
								}

								


								$("#kpiModal").modal('show');
								
								
								
								
								
								
								
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
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
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
												headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
												success:function(data){
													if(data[0]=="success"){
														//alert("ลบข้อมูลเรียบร้อย");	
														showDatakpi($("#kpiEmpbedDepartmentIDParam").val());
														
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
					 var kpiTypeScore=idKPI[2];
					var kpiName=$(this).parent().parent().prev().prev().prev().text()+"("+$(this).parent().parent().prev().prev().text()+")";
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


								setBaseLineAutoFn(paramKPI=id);
								$(".paramKPI").remove();
								$("body").append("<input type=\"hidden\" name=\"paramKpiId\" id=\"paramKpiId\" class=\"paramKPI\" value="+id+">");
								$("body").append("<input type=\"hidden\" name=\"paramkpiTypeScore\" id=\"paramkpiTypeScore\" class=\"paramKPI\" value="+kpiTypeScore+">");
								
									
							
								
							}
						});
					 
				 });
				 //action baseline end
			}
			
		});
	}
	
	
	
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
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select style='width:200px;' id=\"departmentId\" name=\"departmentId\" class=\"form-control input-sm\" style=\"width:auto;\" >";
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

				if($("#embed_emp_role_leve").val()=="Level2"){
					$("#departmentId").prop("disabled",true);
				}else{
					$("#departmentId").prop("disabled",false);
				}


				$("#departmentId").kendoDropDownList({
					theme: "silver"
				});
				//persDropDrowList
			}
		});
	}	


	//fnDropdownListDep(sessionStorage.getItem("kpiEmpbedDepartmentIDParam"));
	/*
	if($("#departmentIdEmp").val()!=undefined){
		fnDropdownListDep($("#departmentIdEmp").val());
		$("#departmentId").prop('disabled', true);
	}else{
		fnDropdownListDep(sessionStorage.getItem("kpiEmpbedDepartmentIDParam"));
	}
	*/

	var formFnDropdownListDep=function(department_id){


		
		$.ajax({
			url:"../Model/mDepartmentList.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
			
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"formDepartmentId\" name=\"formDepartmentId\" class=\"form-control input-sm\" style=\"width:auto;\" >";
				//htmlDropDrowList+="<option value=\"0\">ไม่ระบุ</option>";
					$.each(data,function(index,indexEntry){
						if(department_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				
				$("#formdepDropDrowListArea").html(htmlDropDrowList);

				if($("#embed_emp_role_leve").val()=="Level2"){
					$("#formDepartmentId").prop("disabled",true);
				}else{
					$("#formDepartmentId").prop("disabled",false);
				}

				$("#formDepartmentId").kendoDropDownList({
					theme: "silver"
				});
				//persDropDrowList
			}
		});
	}	
	//dropdown List Department start
	//dropdown List Division start
	var fnDropdownListDiv=function(division_id,department_id){
		//alert(perspective_id);
		$.ajax({
			url:"../Model/mDivisionList.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
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
				$("#divisionId").kendoDropDownList({
					theme: "silver"
				});
				//persDropDrowList
			}
		});
	}	
	//fnDropdownListDiv();
	//dropdown List Division start
	
	//casecast department to division start
	//$("#departmentId").change(function(){
		
		showDatakpi(departmentId="");
		$(".kpiEmpbedParam").remove();
		$("#kpiEmpbedParam").html("<input type='hidden' class='kpiEmpbedParam' id='kpiEmpbedDepartmentIDParam' name='kpiEmpbedDepartmentIDParam' value='"+$(this).val()+"'>");
		sessionStorage.setItem("kpiEmpbedDepartmentIDParam",$(this).val());
		//fnDropdownListDiv('',$(this).val());
	//});

	//$("#departmentId").change();
	//casecast department to division end
	
	var checkUniqueKPICodeFn = function(){

		var message="";
		$.ajax({
			url:"../Model/mKPI.php",
			type:"post",
			dataType:"json",
			data:{"kpiCode":$("#kpiCode").val(),"action":"checkUniqueKPICode"},
			async:false,
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){

				//console.log(data);
				message=data;

			}
		});

		return message;
	}

	var validateKPIsFn=function(){
		var validate="";
		var UniqueKPICodeStatus="";

		var checkUnigueKPICode="";
		var checkKPICode="";
		var checkKPIName="";

		if($("#embed_language").val()=="th"){

			 checkUnigueKPICode="รหัสตัวชี้วัดซ้ำ";
			 checkKPICode="กรอกรหัสตัวชี้วัดด้วยครับ ";
			 checkKPIName="กรอกชื่อตัวชี้วัดด้วยครับ ";
			 checkkpiDataTarget="กรอกเป้าข้อมูลดิบด้วยครับ ";
		}else{

			 checkUnigueKPICode="Duplicate KPI Code.";
			 checkKPICode="Please fill the Kpi Code.";
			 checkKPIName="Please fill the Kpi Name.";
			 checkkpiDataTarget="Please fill kpi data target";
		}


		if($("#kpiAction").val()!="editAction"){
			UniqueKPICodeStatus=checkUniqueKPICodeFn();
			if(UniqueKPICodeStatus>0){
				validate+=checkUnigueKPICode+"\n";
			}
		}
		if($("#kpiCode").val()==""){
	 		validate+=checkKPICode+"\n";
	 	}if($("#kpiName").val()==""){
	 		validate+=checkKPIName+"\n";
	 	} 

	 	
	 	if($("#kpiDataTargetArea").is(":visible")){

	 		if($("#kpiDataTarget").val()==""){
		 		validate+=checkkpiDataTarget+"\n";
		 	} 

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

		//alert($(".kpiTypeScore:checked").val());

		// alert($(".kpiBetterFlag:checked").val());
		// $("#kpiBetterFlagN").prop("checked",true);


		
		var department_id="";

		if($("#kpiAction").val()=="editAction"){
			department_id=$("select#formDepartmentId option:selected").val();
		}else{
			department_id=$("select#departmentId option:selected").val();
		}

		var validateKPIs=validateKPIsFn();
		if(validateKPIs!=""){
			alert(validateKPIs);
		}else{
			$.ajax({
				url:"../Model/mKPI.php",
				headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
				type:"post",
				dataType:"json",
				data:{"kpiName":$("#kpiName").val(),"kpiBetterFlag":$(".kpiBetterFlag:checked").val(),"kpiDetail":$("#kpiDetail").val(),
					"action":$("#kpiAction").val(),"kpiId":$("#kpiId").val(),
					//"departmentId":department_id,"divisionId":$("select#divisionId option:selected").val(),
					"kpiActualQuery":$("#kpiActualQuery").val(),"kpiActualManual":$("#kpiActualManual").val(),
					"kpiTypeActual":$(".kpiTypeActual:checked").val(),"kpiTarget":$("#kpiTarget").val(),
					"kpiCode":$("#kpiCode").val(),
					"kpiDataTarget":$("#kpiDataTarget").val(),
					"kpiTypeScore":$(".kpiTypeScore:checked").val()
					},
				success:function(data){
					if(data[0]=="success"){
						//alert("บันทึกข้อมูลเรียบร้อย");	
						showDatakpi($("#kpiEmpbedDepartmentIDParam").val());
						resetDatakpi();	
						$("#kpiModal").modal('hide');
					}
					if(data[0]=="editSuccess"){
						//alert("แก้ไขข้อมูลเรียบร้อย");	
						showDatakpi($("#kpiEmpbedDepartmentIDParam").val());
						resetDatakpi();
						$("#kpiModal").modal('hide');
							
					}
					
				}
				
			});
		}
		
		
		return false;
	});
	

	//ADD KPI
	$("#addKPI").click(function(){
		resetDatakpi();
		//formFnDropdownListDep($("#kpiEmpbedDepartmentIDParam").val());
		$("#kpiModal").modal('show');

	});
	
});