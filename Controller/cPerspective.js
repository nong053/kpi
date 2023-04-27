$(document).ready(function(){



	$("#exPerspectiveDataAction").click(function(){

		$.ajax({
			url:"../examples/ex-perspective.php",
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

	
	var resetDataPerspective=function(){

		$("#warningInModal").hide();

		$("input#perspectiveName").val("");
		$("#perspectiveWeight").val("");
		
		$("#perspectiveAction").val("add");
		$("#perspectiveId").val("");
		if($("#embed_language").val()=="th"){
			$("#submitPerspective").val("เพิ่ม");
		}else{
			$("#submitPerspective").val("Add");
		}
		
	}
	var showDataPerspective=function(){

		$.ajax({
			url:"../Model/mPerspective.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"html",
			data:{"action":"showData"},
			success:function(data){
				$("#showDataPerspective").html(data);
				
				// $("#TablePerspective").kendoGrid();
				 setGridTable();
				 
				
				 //action del,edit start
				 $(".actionEdit").click(function(){
					
					 var idEdit=this.id.split("-");
					 var id=idEdit[1];
					 $.ajax({
							url:"../Model/mPerspective.php",
							headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								resetDataPerspective();
                                $("input#perspectiveName").val(data[0]["perspective_name"]);
                                $("input#perspectiveWeight").val(data[0]["perspective_weight"]);
								$("#perspectiveAction").val("editAction");
								$("#perspectiveId").val(data[0]["perspective_id"]);
								
								if($("#embed_language").val()=="th"){
								   $("#submitPerspective").val("แก้ไข");
								}else{
									$("#submitPerspective").val("Edit");
								}
								
								$("#perspectiveModal").modal({backdrop: 'static', keyboard: false});
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
				
					//if(confirm("ยืนยันการลบข้อมูล")){
						
					 var idDel=this.id.split("-");
					 var id=idDel[1];
					 

					

				$.ajax({
					url:"../Model/mPerspective.php",
					type:"post",
					dataType:"json",
					data:{"perspective_id":id,"action":"checkUsedData",},
					headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
					success:function(data){

					if(data[0]==0){

					
						$.confirm({
							theme: 'bootstrap', // 'material', 'bootstrap'
							title: 'ยืนยัน!',
							content: 'ต้องการลบมุมมองธุรกิจนี้หรือไม่?',
							buttons: {
							
							'ยืนยัน': {
							btnClass: 'btn-blue',
							action: function(){
								
								$.ajax({
									url:"../Model/mPerspective.php",
									headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
									type:"post",
									dataType:"json",
									data:{"id":id,"action":"del"},
									success:function(data){
										if(data[0]=="success"){
											
											showDataPerspective();
											
	
										}
									}
							});

							}
							},
							'ยกเลิก': function () {}
							}
							});


						
					

					}else{
						$.alert({
							buttons: {
							'ปิด': function () {}
							},
							title: 'แจ้งเตือน!',
							content: 'ไม่สามารถลบมุมมองธุรกิจนี้ได้! เนื่องจากมีตัวชี้วัดอื่นใช้งานอยู่',
							});
						//confirmMainModalFn("ไม่สามารถลบข้อมูลได้! เนื่องจากมีตัวชี้วัดอื่นใช้งานอยู่","แจ้งเตือน","warning");
					}

					}
				});

				});
					
										 
				 
				 //action del,edit end
				 
				 //PRESS RESET SRART
				 $("#perspectiveReset").click(function(){
					 resetDataPerspective();
				 });
				 //PRESS RESET END
			}
			
		});
	}
	
	showDataPerspective();
	
	var validatePerspectiveFn=function(){
		var validate="";
		if($("#perspectiveName").val()==""){
	 		validate+="กรอกชื่อมุมมองธุรกิจด้วยครับ <br>";
	 	}  
		if($("#perspectiveWeight").val()==""){
			validate+="กรอกนำ้หนักมุมมองธุรกิจด้วยครับ <br>";
			
		}
		if(!$.isNumeric($("#perspectiveWeight").val())){
			validate+="นำ้หนักมุมมองธุรกิจต้องเป็นตัวเลข <br>";
		}
	 	return validate;
	}
	
	$("form#perspectiveForm").submit(function(){
		
	
		if(validatePerspectiveFn()!=""){

			//alert(validatePerspectiveFn());
			warningInModalFn("#warningInModalArea",validatePerspectiveFn());

		}else{
			
            $.ajax({
                url:"../Model/mPerspective.php",
                headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
                type:"post",
                dataType:"json",
                data:{
                    "perspectiveName":$("#perspectiveName").val(),
                    "perspectiveWeight":$("#perspectiveWeight").val(),
                    "action":$("#perspectiveAction").val()
                    ,"perspectiveId":$("#perspectiveId").val()
                    },
                success:function(data){
                    if(data[0]=="success"){
                        	
                        showDataPerspective();
                        resetDataPerspective();
                        $("#perspectiveModal").modal('hide');
                            
                    }
                    if(data[0]=="editSuccess"){
                        //alert("แก้ไขข้อมูลเรียบร้อย");	
                        showDataPerspective();
                        resetDataPerspective();
                        $("#perspectiveModal").modal('hide');                            
                    }
                }                
            });

		}
		return false;
	});

	//parameter start
	$("#btnAddPerspective").click(function(){
		resetDataPerspective();
		$("#perspectiveModal").modal({backdrop: 'static', keyboard: false});	
	});
	//parameter end
});