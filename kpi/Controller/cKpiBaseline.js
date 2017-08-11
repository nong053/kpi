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
		$("#baselineBegin").val("");
		$("#baselineEnd").val("");
		$("#baselinetargetScore").val("");
		$("#baselineId").val("");
		$("#suggestion").val("");
		
		$("#baselineAction").val("add");
		$("#baselineSubmit").val("Add");
		
	}
	var showDatabaseline=function(kpi_id){
		//alert(kpi_id);

		$.ajax({
			url:"../Model/mKpiBaseLine.php",
			type:"post",
			dataType:"html",
			data:{"action":"showData","paramKpiId":kpi_id},
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
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								//alert(data[0]["baseline_id"]);
								
								$("input#baselineBegin").val(data[0]["baseline_begin"]);
								$("#baselineEnd").val(data[0]["baseline_end"]);
								$("#baselinetargetScore").val(data[0]["baseline_score"]);
								$("#suggestion").val(data[0]["suggestion"]);
								$("#baselineAction").val("editAction");
								$("#baselineId").val(data[0]["baseline_id"]);
								$("#baselineSubmit").val("Edit");
								
								
								
								
								
								
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
					 //alert("hello");
					 //alert(this.id);
					 
					 var idDel=this.id.split("-");
					 var id=idDel[1];
					 $.ajax({
							url:"../Model/mKpiBaseLine.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"del"},
							success:function(data){
								if(data[0]=="success"){
									alert("ลบข้อมูลเรียบร้อย");	
									showDatabaseline($("#paramKpiId").val());
									
								}
							}
					 });
					 
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
 		$(".paramKPI").remove();
 		$.ajax({
			url:"../View/vKpi.php",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#mainContent").html(data);
				callProgramControl("cKPI.js");
			}
		});
 		
 	});
 	//back to kpi end
 	//validate form start
 	var validateBaselineFn=function(){
		var validate="";
		if($("#baselineBegin").val()==""){
	 		validate+="กรอก Baseline Begin ด้วยครับ \n";
	 	}if($("#baselineEnd").val()==""){
	 		validate+="กรอก Baseline End ด้วยครับ \n";
	 	} 
	 	if($("#baselinetargetScore").val()==""){
	 		validate+="กรอก Target Score ด้วยครับ \n";
	 	} 
	 	
	 	return validate;
	}
 	//validate form end
 	
 	
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
			alert(validateBaselineFn());
			return false;
		}else{
			
		
			$.ajax({
					url:"../Model/mKpiBaseLine.php",
					type:"post",
					dataType:"json",
					data:{"baselineBegin":$("#baselineBegin").val(),"baselineEnd":$("#baselineEnd").val(),"baselinetargetScore":$("#baselinetargetScore").val(),
						"action":$("#baselineAction").val(),"baselineId":$("#baselineId").val(),"paramKpiId":$("#paramKpiId").val(),"suggestion":$("#suggestion").val()
						},
					success:function(data){
						if(data[0]=="success"){
							alert("บันทึกข้อมูลเรียบร้อย");	
							showDatabaseline($("#paramKpiId").val());
							resetDatabaseline();	
						}
						if(data[0]=="editSuccess"){
							alert("แก้ไขข้อมูลเรียบร้อย");	
							showDatabaseline($("#paramKpiId").val());
							resetDatabaseline();
								
						}
						
					}
					
				});
				return false;
		}
	});
});