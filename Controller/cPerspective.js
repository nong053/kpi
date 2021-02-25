$(document).ready(function(){
	
	var resetDataPerspective=function(){
		$("input#perspectiveName").val("");
		
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
				
				 $("#TablePerspective").kendoGrid();
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

                                $("input#perspectiveName").val(data[0]["perspective_name"]);
                                $("input#perspectiveWeight").val(data[0]["perspective_weight"]);
								$("#perspectiveAction").val("editAction");
								$("#perspectiveId").val(data[0]["perspective_id"]);
								
								if($("#embed_language").val()=="th"){
								   $("#submitPerspective").val("แก้ไข");
								}else{
									$("#submitPerspective").val("Edit");
								}
								
								$("#perspectiveModal").modal('show');
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
				
					if(confirm("ยืนยันการลบข้อมูล")){
					 var idDel=this.id.split("-");
					 var id=idDel[1];
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

					} else{
						$("#perspectiveModal").modal('hide');
					}
										 
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
	 		validate+="กรอกชื่อมุมมองธุรกิจด้วยครับ \n";
	 	}  

		if($("#perspectiveWeight").val()==""){
			validate+="กรอกนำ้หนักมุมมองธุรกิจด้วยครับ \n";
		}  
	 	
	 	return validate;
	}
	
	$("form#perspectiveForm").submit(function(){
		
	
		if(validatePerspectiveFn()!=""){
			alert(validatePerspectiveFn());
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
		$("#perspectiveModal").modal('show');	
	});
	//parameter end
});