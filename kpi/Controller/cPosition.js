$(document).ready(function(){
	
	
	//dropdown List Role Start
		fnDropdownListRole();
	//dropdown List Role END
	fnDropdownListDiv();
	var resetDataPosition=function(){
		$("#positionName").val("");
		$("#positionAction").val("add");
		$("#positionId").val("");
		$("#positionSubmit").val("Add");
	}
	var showDataPosition=function(){

		$.ajax({
			url:"../Model/mPosition.php",
			type:"post",
			dataType:"html",
			data:{"action":"showData"},
			success:function(data){
				$("#positionShowData").html(data);
				
				 $("#Tableposition").kendoGrid({
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
				 
				//alert(data);
				 
				 //action del,edit start
				 $(".actionEdit").click(function(){
					 //alert("hello");
					 //alert(this.id);
					 
					 var idEdit=this.id.split("-");
					 var id=idEdit[1];
					 $.ajax({
							url:"../Model/mPosition.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								//alert(data[0]["position_id"]);
								
								$("input#positionName").val(data[0]["position_name"]);
								$("#positionAction").val("editAction");
								$("#positionId").val(data[0]["position_id"]);
								$("#positionSubmit").val("Edit");
								fnDropdownListRole(data[0]["role_id"]);
								
								
								
								
								
								
								
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
							url:"../Model/mPosition.php",
							type:"post",
							dataType:"json",
							data:{"positionId":id,"action":"checkUsingKpiAssignAndKpiResult",},
							success:function(data){
									
									if(data[0]==0){
										if(confirm("ต้องการลบข้อมูลนี้หรือไม่?")){	
											
											 $.ajax({
													url:"../Model/mPosition.php",
													type:"post",
													dataType:"json",
													data:{"id":id,"action":"del"},
													success:function(data){
														if(data[0]=="success"){
															//alert("ลบข้อมูลเรียบร้อย");	
															showDataPosition();
															
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
				 $("#positionReset").click(function(){
					 resetDataPosition();
				 });
				 //PRESS RESET END
			}
			
		});
	}
	
	showDataPosition();
	var validatePositionFn=function(){
		var validate="";
		if($("#positionName").val()==""){
	 		validate+="กรอก Position Name ด้วยครับ \n";
	 	}
	 	
	 	return validate;
	}
	$("form#positionForm").submit(function(){
		/*
		alert($("#positionName").val());
		alert($("#positionBegin").val());
		alert($("#positionEnd").val());
		alert($("#positionColor").val());
		*/
		if(validatePositionFn()!=""){
			alert(validatePositionFn());
		}else{
			$.ajax({
				url:"../Model/mPosition.php",
				type:"post",
				dataType:"json",
				data:{"positionName":$("#positionName").val(),
					"action":$("#positionAction").val(),"positionId":$("#positionId").val(),"role_id":$("#role_id").val()
					},
				success:function(data){
					if(data[0]=="success"){
						alert("บันทึกข้อมูลเรียบร้อย");	
						showDataPosition();
						resetDataPosition();	
					}
					if(data[0]=="editSuccess"){
						alert("แก้ไขข้อมูลเรียบร้อย");	
						showDataPosition();
						resetDataPosition();
							
					}
					
				}
				
			});
		}
		
		return false;
	});
	
	
});