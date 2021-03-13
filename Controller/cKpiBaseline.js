$(document).ready(function(){
	
	/*
	 baseline
	
	baselineId
	baselineBegin
	baselineEnd
	baselinetargetScore
	
	baseline_id
	baseline_begin
	baseline_end
	baseline_score
	
	*/
	
	var resetDatabaseline=function(){
		$("#warningInModal").hide();
		$("#baselineBegin").val("");
		$("#baselineEnd").val("");
		$("#baselinetargetScore").val("");
		$("#baselineId").val("");
		$("#suggestion").val("");
		
		$("#baselineAction").val("add");
		//$("#baselineSubmit").val("Add");
		if($("#embed_language").val()=="th"){
			$("#baselineSubmit").val("เพิ่ม");
		}else{
			$("#baselineSubmit").val("Add");
		}

		
	}
	var showDatabaseline=function(kpi_id){
		//alert(kpi_id);

		$.ajax({
			url:"../Model/mKpiBaseLine.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"html",
			data:{"action":"showData",
			"paramKpiId":kpi_id,
			"paramkpiTypeScore":$("#paramkpiTypeScore").val(),
			"paramKpiBetterFlag":$("#paramKpiBetterFlag").val()
			
		},
			success:function(data){
				$("#kpiBaselineShowData").html(data);
				
				 $("#Tablebaseline").kendoGrid({
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
							url:"../Model/mKpiBaseLine.php",
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								//alert(data[0]["baseline_id"]);
								resetDatabaseline();
								$("input#baselineBegin").val(data[0]["baseline_begin"]);
								$("#baselineEnd").val(data[0]["baseline_end"]);
								$("#baselinetargetScore").val(data[0]["baseline_score"]);
								$("#suggestion").val(data[0]["suggestion"]);
								$("#baselineAction").val("editAction");
								$("#baselineId").val(data[0]["baseline_id"]);

								if($("#embed_language").val()=="th"){
									$("#baselineSubmit").val("แก้ไข");
								}else{
									$("#baselineSubmit").val("Edit");
								}

								//$("#baselineSubmit").val("Edit");
								
								$("#kpiBaseLineModal").modal({backdrop: 'static', keyboard: false});
								
								
								
								
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
					 //alert("hello");
					 //alert(this.id);
					  var idDel=this.id.split("-");
					  var id=idDel[1];

					 if(confirm("ต้องการลบข้อมูลนี้หรือไม่?")){	
						
						 $.ajax({
								url:"../Model/mKpiBaseLine.php",
								headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
								type:"post",
								dataType:"json",
								data:{"id":id,"action":"del"},
								success:function(data){
									if(data[0]=="success"){
										//alert("ลบข้อมูลเรียบร้อย");	
										showDatabaseline($("#paramKpiId").val());
										
									}
								}
						 });
					}
					 
				 });
				 //action del,edit end
				 
				 //PRESS RESET SRART
				 $("#baselineReset").click(function(){
					 resetDatabaseline($("#paramKpiId").val());
				 });
				 //PRESS RESET END
				 
				 
				 
			}
			
		});
	}
	
	setTimeout(function(){
		showDatabaseline($("#paramKpiId").val());
	});
	
	
	
	//back to kpi start
 	$("#kpiButton").click(function(){
		location.reload();
		
 		
 	});
 	//back to kpi end
 	//validate form start
 	var validateBaselineFn=function(){
		var validate="";

		var baselineBegin="";
		var baselineEnd="";
		var checkTargetScore="";

		if($("#embed_language").val()=="th"){

			baselineBegin="กรอกค่าเริ่มต้นด้วยครับ";
			baselineEnd="กรอกค่าสิ้นสุดด้วยครับ ";
			checkTargetScore="กรอกคะแนนด้วยครับ ";
		}else{

			 baselineBegin="Please fill the  Baseline Begin.";
			 baselineEnd="Please fill the Baselline End.";
			 checkTargetScore="Please fill the Score.";
		}

		// if($("#baselineBegin").val()==""){
	 	// 	validate+=baselineBegin+"<br>";
			 
	 	// }if($("#baselineEnd").val()==""){
	 	// 	validate+=baselineEnd+"<br>";
	 	// } 

		if(!$.isNumeric($("#baselineBegin").val())){
			validate+="ค่าเริ่มต้นต้องกรอกเป็นตัวเลข <br>";
		}

		if(!$.isNumeric($("#baselineEnd").val())){
			validate+="ค่าสิ้นสุดต้องกรอกเป็นตัวเลข <br>";
		}


	 	if($("#baselinetargetScore").val()==""){
	 		validate+=checkTargetScore+"<br>";
	 	} 
	 	
	 	return validate;
	}
 	//validate form end
 	
 	$("form#baselineForm").off();
	$("form#baselineForm").submit(function(){
		
		/*
		 baseline
		
		baselineId
		baselineBegin
		baselineEnd
		baselinetargetScore
		
		baseline_id
		baseline_begin
		baseline_end
		baseline_score
		
		*/
		//alert($("#paramKpiId").val());
		if(validateBaselineFn()!=""){
			//alert(validateBaselineFn());
			warningInModalFn("#warningInModalArea",validateBaselineFn());
			return false;
		}else{
			
		
			$.ajax({
					url:"../Model/mKpiBaseLine.php",
					headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
					type:"post",
					dataType:"json",
					data:{
						"baselineBegin":$("#baselineBegin").val(),
						"baselineEnd":$("#baselineEnd").val(),
						"baselinetargetScore":$("#baselinetargetScore").val(),
						"action":$("#baselineAction").val(),
						"baselineId":$("#baselineId").val(),
						"paramKpiId":$("#paramKpiId").val(),
						"paramkpiTypeScore":$("#paramkpiTypeScore").val(),
						
						"suggestion":$("#suggestion").val()
						},
					success:function(data){
						if(data[0]=="success"){
							//alert("บันทึกข้อมูลเรียบร้อย");	
							showDatabaseline($("#paramKpiId").val());
							resetDatabaseline();	
							$("#kpiBaseLineModal").modal('hide');
						}
						if(data[0]=="editSuccess"){
							//alert("แก้ไขข้อมูลเรียบร้อย");	
							showDatabaseline($("#paramKpiId").val());
							resetDatabaseline();
							$("#kpiBaseLineModal").modal('hide');
								
						}
						
					}
					
				});
				return false;
		}
	});



	//add baseline
	$("#addBaseLine").click(function(){
		resetDatabaseline();
		$("#kpiBaseLineModal").modal({backdrop: 'static', keyboard: false});
	});


});