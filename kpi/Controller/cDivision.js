$(document).ready(function(){
	
	var resetDataDivision=function(){
		$("#divisionName").val("");
		$("#divisionDetail").val("");
		$("#divisionAction").val("add");
		$("#divisionId").val("");
		$("#divisionSubmit").val("Add");
	}
	
	
	//dropdown List Department start
	/*
	var fnDropdownListDep=function(department_id){
		//alert(perspective_id);
		$.ajax({
			url:"../Model/mDepartmentList.php",
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				console.log(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"departmentId\" name=\"departmentId\">";
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
	*/
	fnDropdownListDep();
	//dropdown List Department start
	
	var showDataDivision=function(){

		$.ajax({
			url:"../Model/mDivision.php",
			type:"post",
			dataType:"html",
			data:{"action":"showData"},
			success:function(data){
				$("#divisionShowData").html(data);
				
				 $("#Tabledivision").kendoGrid({
                     height: 250,
                     sortable: true,
                     pageable: {
                         refresh: true,
                         pageSizes: true,
                         buttonCount: 5
                     },
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
							url:"../Model/mDivision.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								//alert(data[0]["division_id"]);
								
								$("input#divisionName").val(data[0]["division_name"]);
								$("#divisionDetail").val(data[0]["division_detail"]);
								$("#divisionAction").val("editAction");
								$("#divisionId").val(data[0]["division_id"]);
								$("#divisionSubmit").val("Edit");
								fnDropdownListDep(data[0]["department_id"]);
								
								
								
								
								
								
							}
					 });
				 });
				 
				 
				 $(".actionDel").click(function(){
					 //alert("hello");
					 //alert(this.id);
					 
					 var idDel=this.id.split("-");
					 var id=idDel[1];
					 $.ajax({
							url:"../Model/mDivision.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"del"},
							success:function(data){
								if(data[0]=="success"){
									alert("ลบข้อมูลเรียบร้อย");	
									showDataDivision();
									
								}
							}
					 });
					 
				 });
				 //action del,edit end
				 
				 //PRESS RESET SRART
				 $("#divisionReset").click(function(){
					 resetDataDivision();
				 });
				 //PRESS RESET END
			}
			
		});
	}
	
	showDataDivision();
	//alert($("#departmentId").val());
	$("form#divisionForm").submit(function(){
		/*
		alert($("#divisionName").val());
		alert($("#divisionBegin").val());
		alert($("#divisionEnd").val());
		alert($("#divisionColor").val());
		*/
		//alert($("#department").val());
		$.ajax({
			url:"../Model/mDivision.php",
			type:"post",
			dataType:"json",
			data:{"divisionName":$("#divisionName").val(),"divisionDetail":$("#divisionDetail").val(),"departmentId":$("#department_id").val(),
				"action":$("#divisionAction").val(),"divisionId":$("#divisionId").val()
				},
			success:function(data){
				if(data[0]=="success"){
					alert("บันทึกข้อมูลเรียบร้อย");	
					showDataDivision();
					resetDataDivision();	
				}
				if(data[0]=="editSuccess"){
					alert("แก้ไขข้อมูลเรียบร้อย");	
					showDataDivision();
					resetDataDivision();
						
				}
				
			}
			
		});
		return false;
	});
	
	
});