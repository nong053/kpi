$(document).ready(function(){
	
	//binding date start
	$("#appraisalPeriodStart").kendoDatePicker();
	$("#appraisalPeriodEnd").kendoDatePicker();
	//binding date end
	
	var resetDataAppraisalPeriod=function(){
		//$("#appraisalPeriodYear").val("");
		$("#appraisalPeriodDesc").val("");
		$("#appraisalPeriodStart").val("");
		$("#appraisalPeriodEnd").val("");
		$("#appraisal_period_target_percentage").val("");
		$("#appraisalPeriodAction").val("add");
		$("#appraisalPeriodId").val("");
		$("#appraisalPeriodSubmit").val("Add");
	}
	var showDataAppraisalPeriod=function(paramYear){
		//alert(paramYear);
		$.ajax({
			url:"../Model/mAppralisalPeriod.php",
			type:"post",
			dataType:"html",
			data:{"action":"showData","appraisalPeriodYear":paramYear},
			success:function(data){
				$("#appraisalPeriodShowData").html(data);
				
				 $("#TableappraisalPeriod").kendoGrid({
                    
					 /*height: 250,
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
							url:"../Model/mAppralisalPeriod.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								//alert(data[0]["appraisalPeriod_id"]);
								
								$("input#appraisalPeriodYear").val(data[0]["appraisal_period_year"]);
								$("#appraisalPeriodDesc").val(data[0]["appraisal_period_desc"]);
								$("#appraisalPeriodStart").val(data[0]["appraisal_period_start"]);
								$("#appraisalPeriodEnd").val(data[0]["appraisal_period_end"]);
								$("#appraisalPeriodAction").val("editAction");
								$("#appraisalPeriodId").val(data[0]["appraisal_period_id"]);
								$("#appraisal_period_target_percentage").val(data[0]["appraisal_period_target_percentage"]);
								$("#appraisalPeriodSubmit").val("Edit");
								
								
								
								
								
								
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
					 var idDel=this.id.split("-");
					 var id=idDel[1];
					 
					//Check kpi_assign and kpi_result it using employee.? Start
					 $.ajax({
							url:"../Model/mAppralisalPeriod.php",
							type:"post",
							dataType:"json",
							data:{"appraisalPeriodId":id,"action":"checkUsingKpiAssignAndKpiResult",},
							success:function(data){
									
									if(data[0]==0){
										
										//Delete Data  Start
										if(confirm("ต้องการลบข้อมูลนี้หรือไม่?")){
										 $.ajax({
												url:"../Model/mAppralisalPeriod.php",
												type:"post",
												dataType:"json",
												data:{"id":id,"action":"del"},
												success:function(data){
													if(data[0]=="success"){
														//alert("ลบข้อมูลเรียบร้อย");	
														showDataAppraisalPeriod(paramYear);
														
													}
												}
										 });
										}
										//Delete Data  End
										 
									}else{
										alert("ไม่สามารถลยข้อมูลได้! เนื่องจากมีการใช้งานอยู่");
									}
							}
					 });
					 //Check kpi_assign and kpi_result it using employee.? End
					 
					 
					 
					
					 
				 });
				 //action del,edit end
				 
				 //PRESS RESET SRART
				 $("#appraisalPeriodReset").click(function(){
					 resetDataAppraisalPeriod();
				 });
				 //PRESS RESET END
			}
			
		});
	}
	
	showDataAppraisalPeriod($("#appraisalPeriodYear").val());
	
	var validateAppraisalPeriodFn=function(){
		var validate="";
		if($("#appraisalPeriodDesc").val()==""){
	 		validate+="กรอก  Appraisal Period Desction ด้วยครับ \n";
	 	}if($("#appraisalPeriodStart").val()==""){
	 		validate+="กรอก  Appraisal Period Start ด้วยครับ \n";
	 	}if($("#appraisalPeriodEnd").val()==""){
	 		validate+="กรอก  Appraisal Period End ด้วยครับ \n";
	 	}if($("#appraisal_period_target_percentage").val()==""){
	 		validate+="กรอก  Appraisal Period Percentage ด้วยครับ \n";
	 	}   
	 	
	 	return validate;
	}
	
	$("form#appraisalPeriodForm").submit(function(){
		/*
		alert($("#appraisalPeriodName").val());
		alert($("#appraisalPeriodBegin").val());
		alert($("#appraisalPeriodEnd").val());
		alert($("#appraisalPeriodColor").val());
		*/
		
		if(validateAppraisalPeriodFn()!=""){
			alert(validateAppraisalPeriodFn());
		}else{
			
			$.ajax({
				url:"../Model/mAppralisalPeriod.php",
				type:"post",
				dataType:"json",
				data:{"appraisalPeriodYear":$("#appraisalPeriodYear").val(),"appraisalPeriodDesc":$("#appraisalPeriodDesc").val(),
					"appraisalPeriodStart":$("#appraisalPeriodStart").val(),"appraisalPeriodEnd":$("#appraisalPeriodEnd").val(),
					"action":$("#appraisalPeriodAction").val(),"appraisalPeriodId":$("#appraisalPeriodId").val(),
					"appraisal_period_target_percentage":$("#appraisal_period_target_percentage").val()
					
					},
				success:function(data){
					if(data[0]=="success"){
						alert("บันทึกข้อมูลเรียบร้อย");	
						showDataAppraisalPeriod($("#appraisalPeriodYear").val());
						resetDataAppraisalPeriod();	
					}
					if(data[0]=="editSuccess"){
						alert("แก้ไขข้อมูลเรียบร้อย");	
						showDataAppraisalPeriod($("#appraisalPeriodYear").val());
						resetDataAppraisalPeriod();
							
					}
					
				}
				
			});
			
		}
		
		return false;
	});
	//$("form#appraisalPeriodForm").click();
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
				htmlDropDrowList+="<select id=\"appraisalPeriodYear\" name=\"appraisalPeriodYear\" class=\"form-control input-sm\" style='width:80px;'>";
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
				$(".appraisalYearArea").html(htmlDropDrowList);
					$("#appraisalPeriodYear").change(function(){
						//alert($(this).val());
						showDataAppraisalPeriod($(this).val());
					});
					
					$("#appraisalPeriodYear").change();
				
			}
		});
	}
	paramYear();
});