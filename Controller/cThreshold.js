$(document).ready(function(){
	
	var resetDataThershold=function(){
		$("input#thresholdName").val("");
		$("#thresholdBegin").val("");
		$("#thresholdEnd").val("");
		$("#thresholdColor").val("").css({"background":"#ffffff"});
		$("#thresholdAction").val("add");
		$("#thresholdId").val("");
		if($("#embed_language").val()=="th"){
			$("#submitThreshold").val("เพิ่ม");
		}else{
			$("#submitThreshold").val("Add");
		}
		
	}
	var showDataThershold=function(){

		$.ajax({
			url:"../Model/mThreshold.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"html",
			data:{"action":"showData"},
			success:function(data){
				$("#showDataTheshold").html(data);
				
				 $("#TableThreshold").kendoGrid({
                    // height: 250,
                     /*
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
							url:"../Model/mThreshold.php",
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								//alert(data[0]["threshold_id"]);
								
								$("input#thresholdName").val(data[0]["threshold_name"]);
								$("#thresholdBegin").val(data[0]["threshold_begin"]);
								$("#thresholdEnd").val(data[0]["threshold_end"]);
								$("#thresholdColor").val(data[0]["threshold_color"]).css({"background":"#"+data[0]["threshold_color"]});
								$("#thresholdAction").val("editAction");
								$("#thresholdId").val(data[0]["threshold_id"]);
								$("#thresholdId").val(data[0]["threshold_id"]);
								
								if($("#embed_language").val()=="th"){
									$("#submitThreshold").val("แก้ไข");
								}else{
									$("#submitThreshold").val("Edit");
								}
								
								
								$("#thresholdModal").modal('show');
								
								
								
								
								
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
				
					if(confirm("ยืนยันการลบข้อมูล")){
					 var idDel=this.id.split("-");
					 var id=idDel[1];
					 $.ajax({
							url:"../Model/mThreshold.php",
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"del"},
							success:function(data){
								if(data[0]=="success"){
									
									showDataThershold();

									
								}
							}
					 });

					} else{
						$("#thresholdModal").modal('hide');
					}
										 
				 });
				 //action del,edit end
				 
				 //PRESS RESET SRART
				 $("#thresholdReset").click(function(){
					 resetDataThershold();
				 });
				 //PRESS RESET END
			}
			
		});
	}
	
	showDataThershold();
	
	var validateThresholdFn=function(){
		var validate="";
		if($("#thresholdName").val()==""){
	 		validate+="กรอก  Threshold Name ด้วยครับ \n";
	 	}if($("#thresholdBegin").val()==""){
	 		validate+="กรอก  Threshold Begin ด้วยครับ \n";
	 	}if($("#thresholdEnd").val()==""){
	 		validate+="กรอก  Threshold End ด้วยครับ \n";
	 	} if($("#thresholdColor").val()==""){
	 		validate+="กรอก  Threshold Color ด้วยครับ \n";
	 	}   
	 	
	 	return validate;
	}
	
	$("form#thresholdForm").submit(function(){
		//alert("hello");
		/*
		alert($("#thresholdName").val());
		alert($("#thresholdBegin").val());
		alert($("#thresholdEnd").val());
		alert($("#thresholdColor").val());
		*/
	
		if(validateThresholdFn()!=""){
			alert(validateThresholdFn());
		}else{
			console.log($(".contentThreshold tr").length);

			if($(".contentThreshold tr").length==3 && $("#thresholdAction").val()=="add"){
				alert("ไม่สามารถกรอกเกณฑ์การประเมินได้เกิน3เกณฑ์การประเมิน");
			}else{


			
				$.ajax({
					url:"../Model/mThreshold.php",
					headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
					type:"post",
					dataType:"json",
					data:{"thresholdName":$("#thresholdName").val(),"thresholdBegin":$("#thresholdBegin").val(),
						"thresholdEnd":$("#thresholdEnd").val(),"thresholdColor":$("#thresholdColor").val(),
						"action":$("#thresholdAction").val(),"thresholdId":$("#thresholdId").val()
						},
					success:function(data){
						if(data[0]=="success"){
							//alert("บันทึกข้อมูลเรียบร้อย");	
							showDataThershold();
							resetDataThershold();
							$("#thresholdModal").modal('hide');
								
						}
						if(data[0]=="editSuccess"){
							//alert("แก้ไขข้อมูลเรียบร้อย");	
							showDataThershold();
							resetDataThershold();
							$("#thresholdModal").modal('hide');
								
						}
						
					}
					
				});

			}
			

		}
		
		
	
		
		return false;
	});


	//parameter start

	$("#btnAddThreshold").click(function(){
		resetDataThershold();
		$("#thresholdModal").modal('show');	
	});

	//parameter end
	
	
});