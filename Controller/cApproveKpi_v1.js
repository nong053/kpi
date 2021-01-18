$(document).ready(function(){
	
	//##################################### parameter list start ########################
	//dropdown year change action start
	$("#year").change(function(){
		//alert($(this).val());
		fnDropdownListAppralisal($(this).val());
	});
	$("#year").change();
	//dropdown year change action end
	
	fnDropdownListPosition();
	fnDropdownListDep();
	fnDropdownListDiv();
	fnDropdownListKPI();
	fnDropdownListEmployee();
	
	
	
	//###################################### parameter list end #########################
	/*
	 $year =$_POST['year'];
	 $appraisalPeriod = $_POST['appraisalPeriod'];
	 $position_id =$_POST['position_id'];
	 $employee = $_POST['employee'];
	 $department_id=$_POST['department_id'];
	 $division_id=$_POST['division_id']; 
	 */
	//showDataApproveKpi(year,appraisalPeriodList,department_id,division_id,position_id,employee_id);
	//year,appraisalPeriod,position_id,employee,department_id,division_id
	var showDataApproveKpi=function(year,appraisal_period_id,department_id,division_id,position_id,employee_id){
			
		$.ajax({
			url:"../Model/mApproveKpi.php",
			type:"post",
			dataType:"html",
			data:{"action":"showData","year":year,"appraisal_period_id":appraisal_period_id,
				"department_id":department_id,"division_id":division_id,"position_id":position_id,"employee_id":employee_id,
				},
			success:function(data){
				$("#approveKpiShowData").html(data);
				
				 $("#TableapproveKpi").kendoGrid({
                     height: 250,
                     sortable: true,
                     pageable: {
                         refresh: true,
                         pageSizes: true,
                         buttonCount: 5
                     },
                 });
				 setGridTable();
				 
				//action edit start
				 $(".actionEdit").click(function(){
					
					
					 var idEdit=this.id.split("-");
					 var id=idEdit[1];
					 $.ajax({
							url:"../Model/mApproveKpi.php",
							type:"post",
							dataType:"json",
							data:{"id":id,"action":"edit"},
							success:function(data){
								//alert(data[0]['adjust_percentage']);
								//alert(data[0]['adjustment_reason']);
								
								if($(".actionEdit").hasClass("clicked")){
									$(".actionEdit").removeClass("clicked");
			
									$(".adjust_percentage_area"+id).html(data[0]['adjust_percentage']);
									$(".adjustment_reason_area"+id).html(data[0]['adjustment_reason']);
									
								}else{
									$(".actionEdit").addClass("clicked");
									
									var htmlText="<input type='text' name='adjust_percentage"+id+"' class='adjust_percentage"+id+"' value='"+data[0]['adjust_percentage']+"'>";
									var htmlTextArea="<textarea class='adjustment_reason"+id+"' name='adjustment_reason"+id+"' >"+data[0]['adjustment_reason']+"</textarea>";
									$(".adjust_percentage_area"+id).html(htmlText);
									$(".adjustment_reason_area"+id).html(htmlTextArea);
								}
								
							}
					 });
				 });
				//action edit start
				 
				//action approve start
				 $(".actionkpiApprove").click(function(){
					
					
					 var idEdit=this.id.split("-");
					 var id=idEdit[1];
					
					 
					alert($(".adjust_percentage"+id).val());
					alert($(".adjustment_reason"+id).val());
					 /*
					$year =$_POST['year'];
					$appraisal_period_id = $_POST['appraisal_period_id'];
					$position_id =$_POST['position_id'];
					$employee = $_POST['employee'];
					$department_id=$_POST['department_id'];
					$division_id=$_POST['division_id'];
					 */
					 $.ajax({
							url:"../Model/mApproveKpi.php",
							type:"post",
							dataType:"json",
							
							data:{"id":id,"action":"aproveAction","adjust_percentage":$(".adjust_percentage"+id).val(),"adjustment_reason":$(".adjustment_reason"+id).val(),
								"year":$("#year_emb").val(),"appraisal_period_id":$("#appraisal_period_id_emb").val(),"position_id":$("#position_id_emb").val(),
								"department_id":$("#department_id_emb").val(),"division_id":$("#division_id_emb").val(),
								},
							success:function(data){
								showDataApproveKpi();
							}
					 });
					 
				 });
				//action approve end
				
			}
			
		});
	}
	
	showDataApproveKpi("All","All","All","All","All","All");
	
	/*######################## Start #######################*/
	$("#btnSearch").click(function(){
		//alert("hello jquery");
		/*
		alert($("#year").val());
		alert($("#appraisalPeriodList").val());
		alert($("#department_id_emb").val());
		alert($("#division_id").val());
		alert($("#position_id").val());
		alert($("#employee_id").val());
		*/
		$(".emb_param").remove();
		$("body").append("<input type='hidden' name='year_emb' class='emb_param' id='year_emb' value='"+$("#year").val()+"'>");
		$("body").append("<input type='hidden' name='appraisal_period_id_emb' class='emb_param' id='appraisal_period_id_emb' value='"+$("#appraisal_period_id").val()+"'>");
		$("body").append("<input type='hidden' name='department_id_emb' class='emb_param' id='department_id_emb' value='"+$("#department_id").val()+"'>");
		$("body").append("<input type='hidden' name='division_id_emb' class='emb_param' id='division_id_emb' value='"+$("#division_id").val()+"'>");
		$("body").append("<input type='hidden' name='position_id_emb' class='emb_param' id='position_id_emb' value='"+$("#position_id").val()+"'>");
		$("body").append("<input type='hidden' name='employee_id_emb' class='emb_param' id='employee_id_emb' value='"+$("#employee_id").val()+"'>");

		
		 
		 showDataApproveKpi($("#year_emb").val(),$("#appraisal_period_id_emb").val(),$("#department_id_emb").val(),
				 $("#division_id_emb").val(),$("#position_id_emb").val(),$("#employee_id_emb").val());
		 
		// showDataApproveKpi(year,appraisalPeriodList,department_id,division_id,position_id,employee_id);
		
		/*
		year #year_emb
		appraisalPeriodList #appraisal_period_id_emb
		department_id #department_id_emb
		division_id #division_id_emb
		position_id #position_id_emb
		employee_id #employee_id_emb
*/		
		
	});
	/*######################## End #######################*/
	
});