
	
	
	//fixed varible for waiting start here..
/*
	var kpi_year="2012";
	var appraisal_period_id="2";
	var department_id="1";
*/	

var searchListEmpByKPIFn =function(){
		//alert($(".pageEmb").val());
					//alert($(".RoleEmb").val());
					$(".paramEmb").remove();
					//$(".department_emp").remove();

					sessionStorage.setItem("param_year", $("#appraisal_year_table").val());
					sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_id_table").val());
					sessionStorage.setItem("param_department", $("#department_id_table").val());
					sessionStorage.setItem("department_name_emp", $("#department_id_table option:selected").text());
					/*
					$("body").append("<input type='hidden' class='paramEmb' name='paramYearEmb' id='paramYearEmb' value='"+$("#appraisal_year_table").val()+"'>");
					$("body").append("<input type='hidden' class='paramEmb' name='paramAppraisalEmb' id='paramAppraisalEmb' value='"+$("#appraisal_period_id_table").val()+"'>");
					$("body").append("<input type='hidden' class='paramEmb' name='paramDepartmentEmb' id='paramDepartmentEmb' value='"+$("#department_id_table").val()+"'>");
					$("body").append("<input type='hidden' class='paramEmb' name='department_name_emp' id='department_name_emp' value='"+$("#department_id_table option:selected").text()+"'>");
					*/
					

					
					if($(".pageEmb").val()=="pageDepartment" || $(".pageEmb").val()=="pageKpiDashboard"){
						
						
						if($(".RoleEmb").val()=="roleEmp"){
							//alert("2");
							//### Call kpiDasboardMainFn for emp role Start ###
							$.ajax({
								url:"../View/vKpiDashboard.php",
								type:"get",
								dataType:"html",
								async:false,
								data:{"kpi_year":sessionStorage.getItem("param_year"),"appraisal_period_id":sessionStorage.getItem("param_appraisal_period"),
									"department_id":sessionStorage.getItem("param_department"),"department_name":$("#paramDepartmentNameEmb").val()
									},
								success:function(data){
									$("#mainContent").html(data);
									callProgramControl("cKpiDashboard.js");
									//check if Level 3 get page is show all becuace one emp_id
									if($("#roleLevelEmp").val()=="Level3"){

										

										kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("department_name_emp"),$("#emp_id").val());
										//### drawdown grid for show detail within ###
										$("#gridDeparment .k-icon").click();


										//hide parameter for role is level3
										$("#kpiDashboardSearchParamDepLabelArea").hide();
										$("#appraisalDepDropDrowListArea").hide();
										$("#dashboardBackBtn").hide();

									}else{
										kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("department_name_emp"));

										
									}
								}
							});
							//### Call kpiDasboardMainFn for emp role End ###
							
						}else{
							//alert("3");
						//### Call Program department Page Start ###
							/*
							alert("paramYearEmb"+$("#paramYearEmb").val());
							alert("paramAppraisalEmb"+$("#paramAppraisalEmb").val());
							alert("paramDepartmentEmb"+$("#paramDepartmentEmb").val());
							alert("department_name_emp"+$("#department_name_emp").val());
							*/
							kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("department_name_emp"));
						//### Call Program department Page Start ###
						}
						
						
					}else{//else2
						
						//alert("4");
						kpiOwnerFn();
						// call function index page
						gaugeOwner(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
						barChart(sessionStorage.getItem("param_year"));
						easyPieChartMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
						pieChartDepResult(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
						piChartkpiResult(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
						TableKpiResult(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
						
					
				
			}
	}
var kpiDasboardMainFn = function(kpi_year,appraisal_period_id,department_id,department_name,emp_id){
	
	// alert(kpi_year);
	// alert(appraisal_period_id);

	// alert(department_name);
	// alert(emp_id);




	var sparklineBulet=function(graphName){
		$(graphName).sparkline("html", {
		    type: 'bullet',
		    });
		}
	//sparklineBulet();
	var sparklineLine=function(graphName){
		$(graphName).sparkline("html", {
		    type: 'line',
		    width: '80',
		    height: '20'});
	}
	
//################################################ball

var  getColorBall=function(score)
{
	//alert("hello"+score);
	var ballScoll = "";
	$.ajax({
		url:"../Model/mGetStatus.php",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		type:"get",
		dataType:"json",
		async:false,
		//data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"emp_id":emp_id},
		success:function(data){
			
			//get data from model for loop value is between value is coret this argument   
			$.each(data,function(index,indexIntry){
				
				 /*
				 if(index==0 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
					 
					   ballScoll+="<div id='ball1'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
	                   ballScoll+="<div id='ball2'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
	                   ballScoll+="<div id='ball3'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
				
				 }else if(index==1 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
					 
					   ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
	                   ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
	                   ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
	                   
				 }else if(index==2 && (parseInt(indexIntry[1])<= score  )){
					 
					   ballScoll+="<div id='ball1'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
	                   ballScoll+="<div id='ball2'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
	                   ballScoll+="<div id='ball3'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
	                   
				 }
				 */


				  if(index==0 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
						
						   //ballScoll+="<div id='ball1'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<div id='ball'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<span style='float:left;padding-left:5px; font-weight:bold;font-size:20px; color:green;'>"+parseFloat(score).toFixed(2)+"%</span>";
		                   
					 }else if(index==1 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
						 
						   //ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<div id='ball'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<span style='float:left;padding-left:5px;  font-weight:bold;font-size:20px; color:green;'>"+parseFloat(score).toFixed(2)+"%</span>";
		                   
					 }else if(index==2 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
						
						   //ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<div id='ball'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<span style='float:left;padding-left:5px;  font-weight:bold;font-size:20px; color:green;'>"+parseFloat(score).toFixed(2)+"%</span>";
		                   
					 }else if(index==3 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
						
						   //ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<div id='ball'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<span style='float:left;padding-left:5px;  font-weight:bold;font-size:20px; color:green;'>"+parseFloat(score).toFixed(2)+"%</span>";
		                   
					 }else if(index==4 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
						 
						   //ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<div id='ball'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<span style='float:left;padding-left:5px;  font-weight:bold;font-size:20px; color:green;'>"+parseFloat(score).toFixed(2)+"%</span>";
		                   
					 }else if(index==5 && (parseInt(indexIntry[1])<= score  ) ){
						 
						   //ballScoll+="<div id='ball1'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<div id='ball'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<span style='float:left;padding-left:5px; font-weight:bold;font-size:20px; color:green;'>"+parseFloat(score).toFixed(2)+"%</span>";
					 }
				
			});
			
		}
	});
	
	return ballScoll;
  }


function detailInit(e) {
			
			$.ajax({
				url:"../View/vKpiPersonal.php",
				type:"get",
				dataType:"html",
				async:false,
				data:{"emp_id":e.data.fieldId},
				success:function(data){
					//$("#mainContent").html(data);
					//console.log(data):
					$("<div>"+data+"</div>").appendTo(e.detailCell);
					/*
					$("#gridPersonal").kendoGrid({
				       // height: 230,
				        sortable: true
				    });
					*/
					// ################ Genarate Table Emp  START ################# //
					
					// ################ Genarate Table Emp GRID  START ################# //
					// $.ajax({
					// 	url:"../Model/mGetPersonKpiResult.php",
					// 	headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
					// 	type:"get",
					// 	dataType:"html",
					// 	async:false,
					// 	data:{"emp_id":e.data.fieldId,"action":"emp_info"},
					// 	success:function(data){
					// 		$("#empArea-"+e.data.fieldId).html(data);
					// 	}
					// });
					// ################ Genarate Person KPI GRID  START ################# //

					$.ajax({
						url:"../Model/mGetPersonKpiResult.php",
						headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
						type:"get",
						dataType:"json",
						async:false,
						data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"emp_id":e.data.fieldId,"action":"list_kpi"},
						success:function(data){
							//alert(data);
							var textJson="";
							textJson+="[";
							$.each(data,function(index,EntryIndex){
								$.ajax({
									url:"../Model/mGetPersonKpiResult.php",
									headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
									type:"get",
									dataType:"json",
									async:false,
									data:{"kpi_year":kpi_year,"emp_id":e.data.fieldId,"kpi_id":EntryIndex[0],"action":"score_graph"},
									success:function(data){
										//alert(data);
										var score_spraph=data[0][0];
											if(index==0){
												textJson+="{";
											}else{
												textJson+=",{";
											}
											//alert(score_spraph);
												/*
												    KPI CODE
													KPI NAME
													KPI TARGET
													KPI ACTUAL
													TARGET/ACTUAL =bullet
													KPI GRAPH=line
													STATUS=ball status
													
												 */
												//alert(EntryIndex[1]);
											
												textJson+="\"Field1\":\"<div class='textR'>"+EntryIndex[0]+"</div>\",";
												textJson+="\"Field2\":\"<div class=''>"+EntryIndex[1]+"</div>\",";
												textJson+="\"Field3\":\"<div class='textR'>"+EntryIndex[2]+"</div>\",";
												textJson+="\"Field4\":\"<div class='textR'>"+EntryIndex[3]+"</div>\",";
												textJson+="\"Field5\":\"<div class='textR'><div class='lineSparklinekpi-"+e.data.fieldId+"'>"+score_spraph+"</div></div>\",";
												textJson+="\"Field6\":\"<div class='textR'><div class='sparklineBulletKpi-"+e.data.fieldId+"'>"+EntryIndex[5]+",100,100,"+EntryIndex[4]+"</div></div>\",";
												textJson+="\"Field7\":\"<div class='textR'>"+getColorBall(EntryIndex[4])+"<div>\"";
											textJson+="}";
											//alert(textJson);
									}
								});
							});
							textJson+="]";
							//alert(textJson);
							var objJson2=eval("("+textJson+")");
							
							$("#gridPersonalKPI-"+e.data.fieldId).kendoGrid({
								 dataSource: {
							          data:objJson2 
							          },
						        sortable: true
						   	});
							
							sparklineBulet(".sparklineBulletKpi-"+e.data.fieldId);
							sparklineLine(".lineSparklinekpi-"+e.data.fieldId);
						}
					});
					// ################ Genarate Person KPI GRID  END  ################# //
					// ################ Genarate Person KPI GRID  MISSION START ################# //
					/*
					$.ajax({
						url:"../Model/mGetPersonKpiResult.php",
						type:"get",
						dataType:"json",
						async:false,
						data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"emp_id":e.data.fieldId,"action":"suggestion_result"},
						success:function(data){
							//alert(data);
							var textJson="";
							textJson+="[";
							$.each(data,function(index,EntryIndex){
								//alert(EntryIndex[6]);
								if(index==0){
									textJson+="{";
								}else{
									textJson+=",{";
								}
								
									textJson+="\"Field1\":\"<div class='textR'>"+EntryIndex[0]+"</div>\",";
									textJson+="\"Field2\":\"<div class=''>"+EntryIndex[1]+"</div>\",";
								
								textJson+="}";
						
									
								
							});
							textJson+="]";
							//alert(textJson);
							var objJson2=eval("("+textJson+")");
				
							$("#gridPersonalSuggestion-"+e.data.fieldId).kendoGrid({
								 dataSource: {
							          data:objJson2 
							          },
						        sortable: true
						   	});

						}
					});
					*/
					// ################ Genarate Person KPI GRID MISSION END  ################# //
					// Gauge for check data value start
					/*
					 var kpi_year="2012";
					 var appraisal_period_id="2";
					 var department_id="1";
					 */
					
					// ################ Genarate Perfomance Guage Start  ################# //
					$.ajax({
						url:"../Model/mGetPersonKpiScore.php",
						headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
						type:"get",
						data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"emp_id":e.data.fieldId},
						dataType:"json",
						success:function(data){

							try {

							  
							
							
							if(data[0][0]==0){
								 
				                   $ranges+="ranges: [";
				                        $ranges+="{";
				                            $ranges+="from: 0,";
				                            $ranges+="to: 100,";
				                            $ranges+="color: \"#ffc700\"";
				                        $ranges+="}";
				                    $ranges+="]";
				                   
								}else{
							
							var intervalsStartArray=data[0][1];
							var intervalsStart=intervalsStartArray.split(",");
							
							var intervalsEndArray=data[0][2];
							var intervalsEnd=intervalsEndArray.split(",");
							
							//alert(intervals);
							var intervalColorsArray=data[0][3];
							intervalColorsArray=intervalColorsArray.split(",");
							
							var intervalColors="'"+intervalColorsArray[0]+"','"+intervalColorsArray[1]+"','"+intervalColorsArray[2]+"'";
							
							var $ranges=" [";

									/*
									$ranges+=" {";
										$ranges+="from: "+intervalsStart[0]+",";
										$ranges+="to: "+intervalsEnd[0]+",";
										$ranges+="color: \"#"+intervalColorsArray[0]+"\"";
									$ranges+=" }, {";
										$ranges+="from: "+intervalsStart[1]+",";
										$ranges+="to: "+intervalsEnd[1]+",";
										$ranges+=" color: \"#"+intervalColorsArray[1]+"\"";
									$ranges+="}, {";
										$ranges+=" from: "+intervalsStart[2]+",";
										$ranges+="to: "+intervalsEnd[2]+",";
										$ranges+="color: \"#"+intervalColorsArray[2]+"\"";
									$ranges+= " }";
									*/

									$ranges+=" {";
										$ranges+="from: "+intervalsStart[0]+",";
										$ranges+="to: "+intervalsEnd[0]+",";
										$ranges+="color: \"#"+intervalColorsArray[0]+"\"";
									$ranges+=" }, {";
										$ranges+="from: "+intervalsStart[1]+",";
										$ranges+="to: "+intervalsEnd[1]+",";
										$ranges+=" color: \"#"+intervalColorsArray[1]+"\"";
									$ranges+="},"; 
									$ranges+="{";
										$ranges+=" from: "+intervalsStart[2]+",";
										$ranges+="to: "+intervalsEnd[2]+",";
										$ranges+="color: \"#"+intervalColorsArray[2]+"\"";
									$ranges+= " },";
									$ranges+="{";
										$ranges+=" from: "+intervalsStart[3]+",";
										$ranges+="to: "+intervalsEnd[3]+",";
										$ranges+="color: \"#"+intervalColorsArray[3]+"\"";
									$ranges+= " },";
									$ranges+="{";
										$ranges+=" from: "+intervalsStart[4]+",";
										$ranges+="to: "+intervalsEnd[4]+",";
										$ranges+="color: \"#"+intervalColorsArray[4]+"\"";
									$ranges+= " },";
									$ranges+="{";
										$ranges+=" from: "+intervalsStart[5]+",";
										$ranges+="to: "+intervalsEnd[5]+",";
										$ranges+="color: \"#"+intervalColorsArray[5]+"\"";
									$ranges+= " }";




									$ranges+= "]";
									
								}
							//alert($ranges);
									var objRanges=eval("("+$ranges+")");
							
							//Gauge for check data value end
							
							 $("#gaugePersonal-"+e.data.fieldId).kendoRadialGauge({

								  pointer: {
					                  value:data[0][0]
					              },

					              scale: {
					                  minorUnit: 5,
					                  startAngle: -30,
					                  endAngle: 210,
					                  max: 100,
					                  labels: {
					                     // position: labelPosition || "inside"
					                  },
					                  ranges:objRanges
					              }
					          });
							 
							 $("#gauge-value-"+e.data.fieldId).html("<b>"+e.data.field1+""+parseFloat(data[0][0]).toFixed(2)+"% </b>");
							$(".gaugePersonal > svg").css({"top":"6px"});


							}catch(err) {
							 console.log(err.message);
							}
						}

					});
					// ################ Genarate Perfomance Guage End  ################# //
					
					
					 /*bar chart  appraisal period start*/
					$.ajax({
						url:"../Model/mGetPersonKpiResult.php",
						headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
						type:"get",
						dataType:"json",
						data:{"kpi_year":kpi_year,"emp_id":e.data.fieldId,"action":"bar_chart_appraisal"},
						success:function(data){

						// ####### Create Category Bargrpah Start.
							// categories: [2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011],
							var  $categoriesArray=data[0][2];
							$categoriesArray=$categoriesArray.split(",");
							var $categories="";
							$categories="[";
							for(var i=0; i<$categoriesArray.length; i++){
								if(i==0){
									$categories+="\""+$categoriesArray[i]+"\"";
								}else{
									$categories+=",\""+$categoriesArray[i]+"\"";
								}
							}
							$categories+="]";
							var categoriesObj=eval("("+$categories+")");
							// ######### Create Category Bargrpah End.
							
							//###### Create Series Bargraph Start
							var seriesArray="";
							seriesArray+="[";
							$.each(data,function(index,indexEntry){
								
								//	alert(indexEntry[1]);
									
									if(index==0){
										seriesArray+="{";
										if(indexEntry[0]=="Target"){
											seriesArray+="type: \"line\",";
										}
									}else{
										seriesArray+=",{";
										if(indexEntry[0]=="Target"){
											seriesArray+="type: \"line\",";
										}
										//seriesArray+="type: \"line\",";
									}
									seriesArray+="name: \""+indexEntry[0]+"\",";
									seriesArray+="data: ["+indexEntry[1]+"]";
									seriesArray+="}";
								
							});
							seriesArray+="]";
							//alert(seriesArray);
							var seriesArrayObj=eval("("+seriesArray+")");
							console.log(seriesArrayObj);
							
							//###### Create Series Bargraph End
							/*
							[{
							            name: "2012",
							            data: [60,70, 81,85]
							        }, {
							            name: "2013",
							            data: [66, 72, 79, 84]
							        },{
							            type: "line",
							            data: [80, 80, 80],
							            name: "เป้าหมาย",
							           // color: "#ec5e0a",
							            //axis: "mpg"
							        }]
							*/
							
							/*bar chart power by kendo ui start*/
							
							 $("#barChartPersonal-"+e.data.fieldId).kendoChart({
								    theme:"Flat",
							        title: {
							        	visible: true,
							           // text: "ผลการประเมิน"
							        },
							        legend: {
							            position: "right"
							        },
							        seriesDefaults: {
							            type: "column"
							        },
							        series: seriesArrayObj,
							        valueAxis: {
							            labels: {
							                format: "{0}",
							                //font: "18px Arial",
							            },
							            line: {
							                visible: false
							            },
							            axisCrossingValue: 0
							        },
							        categoryAxis: {
							            categories: categoriesObj,
							            line: {
							                visible: false
							            },
							            labels: {
							               // padding: {top: 135}
							            	//font: "18px Arial",
							            }
							        },
							        tooltip: {
							            visible: true,
							            format: "{0}",
							            template: "#= series.name #: #= value #"
							        }
							    });
							 
							/*bar chart power by kendo ui end*/




						}
					});
					
					 /*bar chart end*/
					 /*pie Chart Personal start*/
					/*
					$.ajax({
						//url:"../Model/mGetPersonKpiResult.php",
						url:"../Model/mGetPersonKpiResult.php",
						type:"get",
						dataType:"json",
						data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"emp_id":e.data.fieldId,"action":"pie_chart_kpi"},
						success:function(data){
							//alert(data);
							var textJson="[";
				        	$.each(data,function(index,indexEntry){
				        		//[[\"Heavy Industry\",12],[\"Retail\",9],[\"Light Industry\",14],[\"Out of home\",16],[\"Commuting\", 7],[\"Orientation\", 9]]";
				        		if(index==0){
				        			textJson+="{";
				        		}else{
				        			textJson+=",{";
				        		}
				        		textJson+="category:\""+indexEntry[0]+"\",";
			        			textJson+="value:"+indexEntry[1]+"";
			        			
				        		textJson+="}";
				        		
				        	});
				        	textJson+="]";
				        	//alert(textJson);
				        	var objJson=eval("("+textJson+")");
				        	//alert(textJson);
							console.log(objJson);
							 
							
							//kendo ui pie start
							$("#pieChartPersonal-"+e.data.fieldId).kendoChart({
								theme:"Flat",
				                title: {
				                    position: "bottom",
				                    //text: "ผลการประเมินแยกตาม KPI"
				                },
				                legend: {
				                    visible: false
				                },
				                chartArea: {
				                    background: ""
				                },
				                seriesDefaults: {
				                    labels: {
				                        visible: false,
				                        background: "transparent",
				                        template: "#= category #: \n #= value#%"
				                    }
				                },
				                series: [{
				                    type: "pie",
				                    startAngle: 150,
				                    data: objJson
				                }],
				                tooltip: {
				                    visible: true,
				                    //format: "{0}%"
				                    template: "#= category # - #= kendo.format('{0:P}', percentage) #"
				                }
				            });
							//kendo ui pie end
							
						}
					});
					*/
					 /*pie Chart Personal end*/
					 
					 /*startline start*/
					 var sparklineBuletPerso=function(){
							$(".sparklineBulletPerso").sparkline([10,12,12,9,7], {
							    type: 'bullet'});
							}

					 //sparklineBuletPerso();

						var sparklineLinePerso=function(){
							$(".lineSparklinePerso").sparkline([5,6,7,9,9,5,3,2,2,4,6,7], {
							    type: 'line',
							    width: '80',
							    height: '40'});
						}
						//sparklineLinePerso();
					 /*startline end*/
				}
			});

	};
	
	// ################ Genarate GRID ################# //
	$.ajax({
		url:"../Model/mDashboardDivision.php",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		type:"get",
		dataType:"json",
		async:false,
		data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"department_id":department_id,"action":"list_emp_score","emp_id":emp_id},
		success:function(data){
			
			var textJson="";
			textJson+="[";
			$.each(data,function(index,EntryIndex){
				
				$.ajax({
					url:"../Model/mDashboardDivision.php",
					headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
					type:"get",
					dataType:"json",
					async:false,
					data:{"kpi_year":kpi_year,"emp_id":EntryIndex[5],"action":"score_spraph_emp"},
					success:function(data){

						//console.log("-------------");
						//console.log(data[0][0]);
						if(data[0][0]==0){
							return false;
						}
						var score_spraph=data[0][0];
						
						//alert(""+score_spraph+"");
						//return "0,80,80";
							if(index==0){
								textJson+="{";
							}else{
								textJson+=",{";
							}
								textJson+="\"fieldId\":\""+EntryIndex[5]+"\",";
								textJson+="\"field0\":\"<div class='kpi' data-toggle='modal' data-target='.bs-example-modal-lg'><img width='50' class='img-circle'  src='"+EntryIndex[0]+"'></div>\",";
								textJson+="\"field1\":\"<div class='kpi'>"+EntryIndex[1]+"</div>\",";
								textJson+="\"field2\":\""+EntryIndex[6]+"\",";
								textJson+="\"field3\":\""+EntryIndex[2]+"\",";
								/*textJson+="\"field3\":\"<div class='textR'>"+EntryIndex[3]+"</div>\",";*/
								textJson+="\"field4\":\"<div class='textR'>"+EntryIndex[4]+"</div>\",";
								textJson+="\"field5\":\"<div class='textR'>"+EntryIndex[3]+"</div>\",";
								textJson+="\"field6\":\"<div class='textR'><div class='lineSparkline'>"+score_spraph+"</div></div>\",";
								textJson+="\"field7\":\"<div class='textR'><div class='sparklineBullet'>"+EntryIndex[4]+",100,100,"+EntryIndex[3]+"</div></div>\",";
								textJson+="\"field8\":\"<div class='textR'>"+getColorBall(EntryIndex[3])+"<div>\",";
								//textJson+="\"field9\":\"<div class='textR'><center><a href='#' class='downloadPDFbyPerson' id='id-"+EntryIndex[5]+"'><img width='20' src='../images/PDF_downlaod.png'></a></center><div>\"";
								
							textJson+="}";
					}
				});
			});
			textJson+="]";
			//alert(textJson);
			var objJson=eval("("+textJson+")");
			
			
			
			// table grid start --
			var gridDepartment="";
			gridDepartment+="<table id=\"gridDeparment\">";
			gridDepartment+="<colgroup>";
				gridDepartment+="<col style=\"width:10%\"/>";
				gridDepartment+="<col style=\"width:15%\" />";
				gridDepartment+="<col style=\"width:13%\" />";
				gridDepartment+="<col style=\"width:15%\" />";
				//gridDepartment+="<col style=\"width:7%\" />";
				//gridDepartment+="<col style=\"width:7%\"  />";
				gridDepartment+="<col  style=\"width:15%\" />";
				gridDepartment+="<col  style=\"width:15%\" />";
				/*gridDepartment+="<col style=\"width:70px\"  />";*/
			gridDepartment+="</colgroup>";
				gridDepartment+="<thead>";
					gridDepartment+="<tr>";
				
					if($("#embed_language").val()=="th"){
						gridDepartment+="<th data-field=\"field0\" ><b></b></th>";
						gridDepartment+="<th data-field=\"field1\" ><b>ชื่อ-นามสกุล</b></th>";
						gridDepartment+="<th data-field=\"field2\"><b>แผนก</b></th>";
						gridDepartment+="<th data-field=\"field3\"><b>ตำแหน่ง</b></th>";
						//gridDepartment+="<th data-field=\"field4\"><b>เป้า</b></th>";
						//gridDepartment+="<th data-field=\"field5\"><b>ผล</b></th>";
						gridDepartment+="<th data-field=\"field6\"><b>กราฟ</th>";
						gridDepartment+="<th data-field=\"field7\"><b>เทียบเป้า</b></th>";
						gridDepartment+="<th data-field=\"field8\"><b>ผลการประเมิน</b></th>";
						//gridDepartment+="<th data-field=\"field9\"><b>ดาวน์โหลด</b></th>";
						  
					}else{
						gridDepartment+="<th data-field=\"field0\" ><b></b></th>";
						gridDepartment+="<th data-field=\"field1\" ><b>Full Name</b></th>";
						gridDepartment+="<th data-field=\"field2\"><b>Department</b></th>";
						gridDepartment+="<th data-field=\"field3\"><b>Position</b></th>";
						//gridDepartment+="<th data-field=\"field4\"><b>Target</b></th>";
						//gridDepartment+="<th data-field=\"field5\"><b>Acutal</b></th>";
						gridDepartment+="<th data-field=\"field6\"><b>Graph</th>";
						gridDepartment+="<th data-field=\"field7\"><b>Actual/Target</b></th>";
						gridDepartment+="<th data-field=\"field8\"><b>Result</b></th>";
						//gridDepartment+="<th data-field=\"field9\"><b>Download</b></th>";
						  
					}
						
				
						gridDepartment+="</tr>";
				gridDepartment+=" </thead>";
					gridDepartment+=" <tbody>";
						gridDepartment+=" <tr>";
							gridDepartment+="<td></td>";
							gridDepartment+="<td></td>";
							gridDepartment+="<td></td>";
							gridDepartment+="<td></td>";
							gridDepartment+="<td></td>";
							gridDepartment+="<td></td>";
							//gridDepartment+="<td></td>";
							//gridDepartment+="<td></td>";
						gridDepartment+="</tr>	";
					gridDepartment+="</tbody>";
				gridDepartment+="</table>";
			// table grid end 
  			
  			$("#departmentArea").html(gridDepartment);
			$("#gridDeparment").kendoGrid({
				  //ไม่กำหนดความสูง height จะเป็น auto
		          //height: 500,
				  detailInit: detailInit,
		          dataSource: {
		          data: objJson,//[{"Filed1":"content1"},{"Filed2":"content2"}]
			
		          },
		   	});
			sparklineBulet(".sparklineBullet");
			sparklineLine(".lineSparkline");
			$(".k-grid td").css({"padding":"0px;"});
		   	
			
		}
	});
	// ################ Genarate GRID ################# //
	// ################ button top right start  in panel ##########
	// press button for download by person start
		$(".downloadPDFbyPerson").click(function(){
			
			var emp_id= this.id.split("-");
			emp_id=emp_id[1];
			fnLinkToPDF(emp_id);
		});
	// press button for download by person end
	// press button for download KPI PDF
	var fnLinkToPDF=function(emp_id){
		if(undefined!=emp_id){
			window.open("../html2pdf/kpi_report.php?kpi_year="+kpi_year+"&appraisal_period_id="+appraisal_period_id+"&department_id="+department_id+"&emp_id="+emp_id+"", "_blank");
		}else{
			window.open("../html2pdf/kpi_report.php?kpi_year="+kpi_year+"&appraisal_period_id="+appraisal_period_id+"&department_id="+department_id+"", "_blank");
		}
	}
	$(".glyphicon-download-alt").click(function(){
		
		if(undefined!=emp_id){
			window.open("../html2pdf/kpi_report.php?kpi_year="+kpi_year+"&appraisal_period_id="+appraisal_period_id+"&department_id="+department_id+"&emp_id="+emp_id+"", "_blank");
		}else{
			window.open("../html2pdf/kpi_report.php?kpi_year="+kpi_year+"&appraisal_period_id="+appraisal_period_id+"&department_id="+department_id+"", "_blank");
		}
	});

	$(".glyphicon-minus").click(function(){
		
		$(".departmentArea").slideUp();
	});
	$(".glyphicon-resize-full").click(function(){
		
		$(".departmentArea").slideDown();
	});
	$(".glyphicon-remove").click(function(){
		$(".panel").hide();
	});
	 //glyphicon-minus
	 //glyphicon-resize-full
	 //glyphicon-remove
	// ################ button top right start in panel ###########

	

	//dropdown List AppralisalPeriod start
	var fnDropdownListAppralisalTable=function(year,appraisal_period_id){
		//alert(year);
		$.ajax({
			url:"../Model/mAppralisalPeriodList.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			async:false,
			data:{"year":year,"paramSelectAll":"selectAll"},
			success:function(data){
				//alert(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"appraisal_period_id_table\" name=\"appraisal_period_id_table\" class=\"form-control input-sm\" style=\"width:80px;\">";
					$.each(data,function(index,indexEntry){
						if(appraisal_period_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
						
					});
				htmlDropDrowList+="</select>";
				//alert(htmlDropDrowList);
				$("#appraisalPeriodAea").html(htmlDropDrowList);
				$("#appraisal_period_id_table").kendoDropDownList({
					theme: "silver"
					});
				//persDropDrowList
			}
		});
	}	

	//#################  Create Parameter End #####################


//dropdown List Department start
var fnDropdownListDepartmetnTable=function(department_id,paramSelectAll){
	//alert(department_id);
	$.ajax({
		url:"../Model/mDepartmentList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":paramSelectAll},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			console.log(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"department_id_table\" name=\"department_id_table\" class=\"form-control input-sm\" >";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					if(department_id==indexEntry[0]){
						
						htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						
					}else{
						
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						
					}
					
				});
			htmlDropDrowList+="</select>";
			//alert(htmlDropDrowList);
			$("#appraisalDepDropDrowListArea").html(htmlDropDrowList);


			$("#department_id_table").kendoDropDownList({
					theme: "silver"
				});
			//persDropDrowList
		}
	});
}	
	//#################  Create Parameter Year Start   ############
	var paramYearTable=function(kpi_year){

		
			$.ajax({
				url:"../Model/mAppraisalYearList.php",
				headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
				type:"post",
				dataType:"json",
				async:false,
				success:function(data){
					var htmlDropDrowList="";
					htmlDropDrowList+="<select id=\"appraisal_year_table\" name=\"appraisal_year_table\" class=\"form-control input-sm\" style=\"width:80px;\">";
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
					$("#appraisalYearArea").html(htmlDropDrowList);
					$("#appraisal_year_table").kendoDropDownList({
					theme: "silver"
					});
					$("#appraisal_year_table").change(function(){
						
						fnDropdownListAppralisalTable($(this).val());
					});
				}
			});
			

	}
	//kpi_year,appraisal_period_id
	if(kpi_year!=""){
		paramYearTable(kpi_year);
	}else{
		paramYearTable($("#appraisal_year_table").val());
	}




	if(department_id!=""){
		fnDropdownListDepartmetnTable(department_id,"selectAll");
	}else{
		fnDropdownListDepartmetnTable("","selectAll");
	}

	if(appraisal_period_id!=""){
		fnDropdownListAppralisalTable(kpi_year,appraisal_period_id);
	}else{
		fnDropdownListAppralisalTable($("#appraisal_year_table").val(),$("#appraisal_period_id_table").val());
	}
	
	//fnDropdownListAppralisal($("#appraisal_year").val());
	//#################  Create Parameter Year End   ############

	

	//#################  submit button action start #####################
	
	$("#kpiDashboardSubmit").off("click");
	$("#kpiDashboardSubmit").on("click",function(){
					//alert($(".pageEmb").val());
					//alert($(".RoleEmb").val());
					$(".paramEmb").remove();
					sessionStorage.setItem("param_year", $("#appraisal_year_table").val());
					sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_id_table").val());
					/*
					$("body").append("<input type='hidden' class='paramEmb' name='paramYearEmb' id='paramYearEmb' value='"+$("#appraisal_year_table").val()+"'>");
					$("body").append("<input type='hidden' class='paramEmb' name='paramAppraisalEmb' id='paramAppraisalEmb' value='"+$("#appraisal_period_id_table").val()+"'>");
					*/
					if($(".pageEmb").val()=="pageDepartment" || $(".pageEmb").val()=="pageKpiDashboard"){
						
						
						if($(".RoleEmb").val()=="roleEmp"){
							//alert("2");
							//### Call kpiDasboardMainFn for emp role Start ###
							$.ajax({
								url:"../View/vKpiDashboard.php",
								type:"get",
								dataType:"html",
								async:false,
								data:{"kpi_year":sessionStorage.getItem("param_year"),"appraisal_period_id":sessionStorage.getItem("param_appraisal_period"),
									"department_id":sessionStorage.getItem("param_year"),"department_name":$("#paramDepartmentNameEmb").val()
									},
								success:function(data){
									$("#mainContent").html(data);
									callProgramControl("cKpiDashboard.js");
									//check if Level 3 get page is show all becuace one emp_id
									if($("#roleLevelEmp").val()=="Level3"){
										kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("department_name_emp"),$("#emp_id").val());
										//### drawdown grid for show detail within ###
										$("#gridDeparment .k-icon").click();
									}else{
										kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("department_name_emp"));
									}
								}
							});
							//### Call kpiDasboardMainFn for emp role End ###
							
						}else{
							//alert("3");
						//### Call Program department Page Start ###
							/*
							alert("paramYearEmb"+$("#paramYearEmb").val());
							alert("paramAppraisalEmb"+$("#paramAppraisalEmb").val());
							alert("paramDepartmentEmb"+$("#paramDepartmentEmb").val());
							alert("department_name_emp"+$("#department_name_emp").val());
							*/
							kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("department_name_emp"));
						//### Call Program department Page Start ###
						}
						
						
					}else{//else2
						
						//alert("4");
						kpiOwnerFn();
						// call function index page
						gaugeOwner(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
						barChart(sessionStorage.getItem("param_year"));
						easyPieChartMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
						pieChartDepResult(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
						piChartkpiResult(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
						TableKpiResult(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"));
						
					
				
			}

	});
	//$("#kpiDashboardSubmit").click();


	$( "body" ).off( "change", "#appraisal_year_table");
	$( "body" ).on( "change", "#appraisal_year_table", function() {
		
		searchListEmpByKPIFn();
	});

	$( "body" ).off( "change", "#department_id_table");
	$( "body" ).on( "change", "#department_id_table", function() {
		
		searchListEmpByKPIFn();
	});


	

	$( "body" ).off( "change", "#appraisal_period_id_table");
	$( "body" ).on( "change", "#appraisal_period_id_table", function() {
	
		searchListEmpByKPIFn();
	});


	//#################  submit button action end   #####################
	
	$("#dashboardBackBtn").click(function(){
		$("#kpiDashboard").click();
	});
};

$(document).ready(function(){
	setTimeout(function(){
		
		//searchListEmpByKPIFn();
	},500);
});
