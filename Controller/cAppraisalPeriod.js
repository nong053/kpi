$(document).ready(function(){
	


	
	//binding date start
	
	$("#exAppraisalPeriodDataAction").click(function(){

		$.ajax({
			url:"../examples/ex-appraisal-period.php",
			type:"post",
			dataType:"html",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			sync:false,
			success:function(data){
				$("#exContentDataArea").html(data);
				$(".ex-data-modal").modal({backdrop: 'static', keyboard: false});
			}
		});
	});

	$("#appraisalPeriodStart").datepicker({
		
		dateFormat: 'yy-mm-dd'
	});
	

	$("#appraisalPeriodEnd").datepicker({
		dateFormat: 'yy-mm-dd',
		
	});
	//binding date end
	
	$("#btnAppraisalPeriod").click(function(){
		resetDataAppraisalPeriod();
	});


	var resetDataAppraisalPeriod=function(){
		//$("#appraisalPeriodYear").val("");
		$("#warningInModal").hide();
		$("#appraisalPeriodDesc").val("");

		$("#appraisalPeriodStart").val(currentDate());

		$("#appraisalPeriodEnd").val(currentDate());

		$("#appraisal_period_target_percentage").val("");
		$("#appraisalPeriodAction").val("add");
		$("#appraisalPeriodId").val("");
		
		if($("#embed_language").val()=="th"){
			$("#appraisalPeriodSubmit").val("เพิ่ม");
		}else{
			$("#appraisalPeriodSubmit").val("Add");
		}
	}
	var showDataAppraisalPeriod=function(paramYear){
		//alert(paramYear);
		$.ajax({
			url:"../Model/mAppralisalPeriod.php",
			type:"post",
			dataType:"html",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			data:{"action":"showData","appraisalPeriodYear":paramYear},
			sync:false,
			success:function(data){
				$("#appraisalPeriodShowData").html(data);
				
				 //$("#TableappraisalPeriod").kendoGrid({
                    
					 // height: 250,
      //                sortable: true,
      //                pageable: {
      //                    refresh: true,
      //                    pageSizes: true,
      //                    buttonCount: 5
      //                },
                     
                 //});
				 setGridTable();
				 
				//alert(data);
				 
				 //action del,edit start
				 $(".actionEdit").click(function(){

				
					 	//alert("hello jquery");
					 	

					 
					 
					 var idEdit=this.id.split("-");
					 var id=idEdit[1];
					 $.ajax({
							url:"../Model/mAppralisalPeriod.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							success:function(data){
								
								resetDataAppraisalPeriod();
								
								$("input#appraisalPeriodYear").val(data[0]["appraisal_period_year"]);
								$("#appraisalPeriodDesc").val(data[0]["appraisal_period_desc"]);
								$("#appraisalPeriodStart").val(data[0]["appraisal_period_start"]);
								$("#appraisalPeriodEnd").val(data[0]["appraisal_period_end"]);
								$("#appraisalPeriodAction").val("editAction");
								$("#appraisalPeriodId").val(data[0]["appraisal_period_id"]);
								$("#appraisal_period_target_percentage").val(data[0]["appraisal_period_target_percentage"]);
								
								if($("#embed_language").val()=="th"){
									$("#appraisalPeriodSubmit").val("แก้ไข");
								}else{
									$("#appraisalPeriodSubmit").val("Edit");
								}

								$(".appraisalPeriodSetup").modal({backdrop: 'static', keyboard: false});
								
								
								
								
								
								
								
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
							data:{"appraisalPeriodId":id,"action":"checkUsedData",},
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							success:function(data){
									
									if(data[0]==0){
										
										//Delete Data  Start
										

											$.confirm({
												theme: 'bootstrap', // 'material', 'bootstrap'
												title: 'ยืนยัน!',
												content: 'ต้องการลบช่วงประเมินนี้หรือไม่?',
												buttons: {
												
												'ยืนยัน': {
												btnClass: 'btn-blue',
												action: function(){
													$.ajax({
														url:"../Model/mAppralisalPeriod.php",
														type:"post",
														dataType:"json",
														data:{"id":id,"action":"del"},
														headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
														success:function(data){
															if(data[0]=="success"){
																
																showDataAppraisalPeriod(paramYear);
																
															}
														}
													});

												}
												},
												'ยกเลิก': function () {}
												}
												});
											
										
										 
									}else{
										//confirmMainModalFn("ไม่สามารถลบช่วงประเมินนี้ได้! เนื่องจากมีการมอบหมายตัวชี้วัดช่วงประเมินนี้แล้ว","แจ้งเตือน","warning");
										//alert("ไม่สามารถลยข้อมูลได้! เนื่องจากมีการใช้งานอยู่");
										$.alert({
											buttons: {
											'ปิด': function () {}
											},
											title: 'แจ้งเตือน!',
											content: 'ไม่สามารถลบช่วงประเมินนี้ได้! เนื่องจากมีการมอบหมายตัวชี้วัดในช่วงประเมินนี้แล้ว',
											});
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
	
	//showDataAppraisalPeriod($("#appraisalPeriodYear").val());
	
	var validateAppraisalPeriodFn=function(){
		var AppraisalPeriodDesction="";
		var AppraisalPeriodStart="";
		var AppraisalPeriodEnd="";
		if($("#embed_language").val()=="th"){

			 AppraisalPeriodDesction="กรอกชื่องวดการประเมินด้วยครับ";
			 AppraisalPeriodStart="กรอกวันเริ่มประเมินด้วยครับ";
			 AppraisalPeriodEnd="กรอกวันสิ้นสุดการประเมินด้วยครับ";
		
		}else{

			 AppraisalPeriodDesction="Please Fill the Appraisal period.";
			 AppraisalPeriodStart="Please Fill the Appraisal From Date.";
			 AppraisalPeriodEnd="Please Fill the Appraisal To Date.";

		}

		var validate="";
		if($("#appraisalPeriodDesc").val()==""){
	 		validate+=AppraisalPeriodDesction+"<br>";
	 	}if($("#appraisalPeriodStart").val()==""){
	 		validate+=AppraisalPeriodStart+"<br>";
	 	}if($("#appraisalPeriodEnd").val()==""){
	 		validate+=AppraisalPeriodEnd+"<br>";
	 	}

	 	// if($("#appraisal_period_target_percentage").val()==""){
	 	// 	validate+="กรอก  Appraisal Period Percentage ด้วยครับ \n";
	 	// }   
	 	
	 	return validate;
	}
	
	$("form#appraisalPeriodForm").submit(function(){
		
		
		if(validateAppraisalPeriodFn()!=""){
			
			warningInModalFn("#warningInModalArea",validateAppraisalPeriodFn());

		}else{
			
			$.ajax({
				url:"../Model/mAppralisalPeriod.php",
				type:"post",
				dataType:"json",
				headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
				data:{"appraisalPeriodYear":$("#appraisalPeriodYear").val(),"appraisalPeriodDesc":$("#appraisalPeriodDesc").val(),
					"appraisalPeriodStart":$("#appraisalPeriodStart").val(),"appraisalPeriodEnd":$("#appraisalPeriodEnd").val(),
					"action":$("#appraisalPeriodAction").val(),"appraisalPeriodId":$("#appraisalPeriodId").val(),
					"appraisal_period_target_percentage":$("#appraisal_period_target_percentage").val()
					
					},
				success:function(data){
					if(data[0]=="success"){
						//alert("บันทึกข้อมูลเรียบร้อย");	
						showDataAppraisalPeriod($("#appraisalPeriodYear").val());
						resetDataAppraisalPeriod();	
						$(".appraisalPeriodSetup").modal('hide');
					}
					if(data[0]=="editSuccess"){
						//alert("แก้ไขข้อมูลเรียบร้อย");	
						showDataAppraisalPeriod($("#appraisalPeriodYear").val());
						resetDataAppraisalPeriod();
						$(".appraisalPeriodSetup").modal('hide');
							
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
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			success:function(data){
				
				var htmlDropDrowList="";
				htmlDropDrowList+="<select style='height: 28px; width:100px;' id=\"appraisalPeriodYear\" name=\"appraisalPeriodYear\" class=\" \" > ";
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
				$(".appraisalYearArea").html(htmlDropDrowList);
				$("#appraisalPeriodYear").kendoDropDownList({
					theme: "silver"
				});

					$("#appraisalPeriodYear").change(function(){
						//alert($(this).val());
						showDataAppraisalPeriod($(this).val());
						$("#paramYearEmb").val($(this).val());	
					});
					//setTimeout(function(){
						//$("#appraisalPeriodYear").change();
					//},500);
					
				
			}
		});
	}
	if($("#paramYearEmb").val()!=undefined){
		paramYear($("#paramYearEmb").val());
	}else{
		paramYear();
		showDataAppraisalPeriod(currentYear());
		
		
	}
});