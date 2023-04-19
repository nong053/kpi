//#################  Create Parameter Year Start   ############
var fnDropdownListYearKpiDashboard=function(kpi_year){
	$.ajax({
		url:"../Model/mAppraisalYearList.php",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		type:"post",
		dataType:"json",
		async:false,
		success:function(data){
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"appraisal_year_table\" name=\"appraisal_year_table\" class=\" \" style=\"width:100%;\">";
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
				
				fnDropdownListAppraisalKpiDashboard($(this).val());
			});
		}
	});
	

}
//dropdown List AppralisalPeriod start
var fnDropdownListAppraisalKpiDashboard=function(year,appraisal_period_id){
	//alert(year);
	$.ajax({
		url:"../Model/mAppralisalPeriodList.php",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		type:"post",
		dataType:"json",
		async:false,
		data:{"year":year,"paramSelectAll":""},
		success:function(data){
			//alert(data);
			var htmlDropDrowList="";
			htmlDropDrowList+="<select id=\"appraisal_period_id_table\" name=\"appraisal_period_id_table\" class=\" \" style=\"width:100%;\">";
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
var fnDropdownListDepartmentKpiDashboard=function(department_id,paramSelectAll){
//alert(department_id);
$.ajax({
	url:"../Model/mDepartmentList.php",
	type:"post",
	dataType:"json",
	async:false,
	data:{"paramSelectAll":paramSelectAll},
	headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
	success:function(data){
	
		var htmlDropDrowList="";
		htmlDropDrowList+="<select id=\"department_id_table\" name=\"department_id_table\" class=\" \"  style='width:100%;'>";
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

		$("#department_id_table").change(function(){
				
			fnDropdownListEmpKpiDashboard(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),$(this).val(),$("#assign_position_id").val());
		});

	}
});
}

//dropdown List Position start
var fnDropdownListPositionKpiDashboard=function(position_id,paramSelectAll){
	
	$.ajax({
		url:"../Model/mPositionList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"paramSelectAll":paramSelectAll},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select style='width:100%;' id=\"assign_position_id\" name=\"assign_position_id\" class=\"\" >";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					
					//if($("#embed_role_executive_position_id").val()!=indexEntry[0]){
						if(position_id==indexEntry[0]){
							htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[1]+"</option>";	
						}else{
							htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
						}
					//}
					
				});
			htmlDropDrowList+="</select>";
			
			$("#appraisalPositionDropDrowListArea").html(htmlDropDrowList);
			$("#assign_position_id").kendoDropDownList({
					theme: "silver"
			});

			$("#assign_position_id").change(function(){
				
				fnDropdownListEmpKpiDashboard($("#department_id_table").val(),$(this).val());
			});
		}
	});
}		


//dropdown List Employee start
var fnDropdownListEmpKpiDashboard=function(year,appraisal_period_id,department_id,position_id,paramSelectAll='selectAll'){


	$.ajax({
		url:"../Model/mEmployeeResultList.php",
		type:"post",
		dataType:"json",
		async:false,
		data:{"position_id":position_id,
			"department_id":department_id,

			"year":year,
			"appraisal_period_id":appraisal_period_id,

			"paramSelectAll":paramSelectAll
		},
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		success:function(data){
			
			
			var htmlDropDrowList="";
			htmlDropDrowList+="<select style='width:100%;' id=\"assign_employee_id\" name=\"assign_employee_id\" class=\"\" >";
			//htmlDropDrowList+="<option value=\"All\" >ทั้งหมด</option>";
				$.each(data,function(index,indexEntry){
					
					
						htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[1]+"</option>";
					
					
					
					
				});
			htmlDropDrowList+="</select>";
			
			$("#appraisalEmpDropDrowListArea").html(htmlDropDrowList);
			$("#assign_employee_id").kendoDropDownList({
					theme: "silver"
				});
			//persDropDrowList
			
		}
	});
}	


var kpiDasboardMainFn = function(kpi_year,appraisal_period_id,department_id,position_id,emp_id){

	
	var sparklineBulet=function(graphName){
		$(graphName).sparkline("html", {
		    type: 'bullet',
		    });
		}
	
	var sparklineLine=function(graphName){
		$(graphName).sparkline("html", {
		    type: 'line',
		    width: '80',
		    height: '20'});
	}
	
//################################################ball

var  getColorBall=function(score)
{
	
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
			$.each(data,function(index,indexEntry){
				
				


				  	if(index==0 && (parseInt(indexEntry[1])<= score  ) &&( parseInt(indexEntry[2])>= score)){
						
						   //ballScoll+="<div id='ball1'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   
						   
						   
						   ballScoll+="<span style='float:left;padding-left:5px; font-weight:bold;  color:green; font-size:20px;'>"+parseFloat(score).toFixed(2)+"%</span> ";
						   ballScoll+="<div  class='ball' style='background-color:#"+indexEntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   
					 }else if(index==1 && (parseInt(indexEntry[1])<= score  ) &&( parseInt(indexEntry[2])>= score)){
						 
						   //ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   
						   ballScoll+="<span style='float:left;padding-left:5px;  font-weight:bold; color:green; font-size:20px;'>"+parseFloat(score).toFixed(2)+"%</span> &nbsp;";
						   ballScoll+="<div   class='ball' style='background-color:#"+indexEntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   
					 }else if(index==2 && (parseInt(indexEntry[1])<= score  ) &&( parseInt(indexEntry[2])>= score)){
						
						   //ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   
						   ballScoll+="<span style='float:left;padding-left:5px;  font-weight:bold; color:green; font-size:20px;'>"+parseFloat(score).toFixed(2)+"%</span> &nbsp;";
						   ballScoll+="<div   class='ball' style='background-color:#"+indexEntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   
					 }else if(index==3 && (parseInt(indexEntry[1])<= score  ) &&( parseInt(indexEntry[2])>= score)){
						
						   //ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   
						   ballScoll+="<span style='float:left;padding-left:5px;  font-weight:bold; color:green; font-size:20px;'>"+parseFloat(score).toFixed(2)+"%</span> &nbsp;";
						   ballScoll+="<div   class='ball' style='background-color:#"+indexEntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   
					 }else if(index==4 && (parseInt(indexEntry[1])<= score  ) &&( parseInt(indexEntry[2])>= score)){
						 
						   //ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   
						   ballScoll+="<span style='float:left;padding-left:5px;  font-weight:bold; color:green; font-size:20px;'>"+parseFloat(score).toFixed(2)+"%</span> &nbsp;";
						   ballScoll+="<div   class='ball' style='background-color:#"+indexEntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   
					 }else if(index==5 && (parseInt(indexEntry[1])<= score  ) ){
						 
						   //ballScoll+="<div id='ball1'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   
						   ballScoll+="<span style='float:left;padding-left:5px; font-weight:bold; color:green; font-size:20px;'>"+parseFloat(score).toFixed(2)+"%</span> &nbsp;";
						   ballScoll+="<div   class='ball' style='background-color:#"+indexEntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
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
								
											if(index==0){
												textJson+="{";
											}else{
												textJson+=",{";
											}
											
												textJson+="\"Field1\":\"<div class='' style='text-align:center;'>"+(index+1)+"</div>\",";
												textJson+="\"Field2\":\"<div class=''>"+EntryIndex[1]+"</div>\",";
												textJson+="\"Field3\":\"<div class='textR' >"+EntryIndex[2]+"</div>\",";
												textJson+="\"Field4\":\"<div class='textR'>"+EntryIndex[6]+"</div>\",";
												textJson+="\"Field5\":\"<div class='textR'>"+EntryIndex[3]+"</div>\",";
												//textJson+="\"Field5\":\"<div class='textR'><div class='lineSparklinekpi-"+e.data.fieldId+"'>"+score_spraph+"</div></div>\",";
												//textJson+="\"Field6\":\"<div class=''><div class='sparklineBulletKpi-"+e.data.fieldId+"'>"+EntryIndex[5]+",100,100,"+EntryIndex[4]+"</div></div>\",";
												var performance_emp=EntryIndex[7]*40/100;
												var performance_chief=EntryIndex[4]*60/100;
												
												var performance_total=performance_emp+performance_chief;

												performance_total =parseFloat(performance_total).toFixed(2);
												
												textJson+="\"Field7\":\"<div class='textR'>";
												textJson+=""+getColorBall(performance_total)+"";
												textJson+="<div>\"";
											textJson+="}";
									
							});
							textJson+="]";
							var objJson2=eval("("+textJson+")");
							
							$("#gridPersonalKPI-"+e.data.fieldId).kendoGrid({
								 dataSource: {
							          data:objJson2 
							          },
						        sortable: true
						   	});
							
							sparklineBulet(".sparklineBulletKpi-"+e.data.fieldId);
							//sparklineLine(".lineSparklinekpi-"+e.data.fieldId);
						}
					});
					
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
							 
							 $("#gauge-value-"+e.data.fieldId).html("<b>"+parseFloat(data[0][0]).toFixed(2)+"% </b>");
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
							//console.log(seriesArrayObj);
							
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
		data:{"kpi_year":kpi_year,
		"appraisal_period_id":appraisal_period_id,
		"department_id":department_id,
		"position_id":position_id,
		"emp_id":emp_id,
		"action":"list_emp_score",
		},
		success:function(data){
			

			var textJson="";
			
			textJson+="[";
			$.each(data,function(index,EntryIndex){
				
				if(EntryIndex==0){
					
					textJson+="";
					return false;
				}

							if(index==0){
								textJson+="{";
							}else{
								textJson+=",{";
							}
							
								textJson+="\"fieldId\":\""+EntryIndex[5]+"\",";
								
								if(EntryIndex[0]==""){
									textJson+="\"field0\":\"<div class='kpi' data-toggle='modal' data-target='.bs-example-modal-lg' style='text-align:center; opacity:0.1'><img width='80' class='img-circle'  src='../View/uploads/avatar.jpg'></div>\",";
								}else{
									textJson+="\"field0\":\"<div class='kpi' data-toggle='modal' data-target='.bs-example-modal-lg' style='text-align:center;'><img width='80' class='img-circle'  src='"+EntryIndex[0]+"'></div>\",";
								}
								textJson+="\"field1\":\"<div class='kpi'>";
								textJson+="<a class='actionViewEmployee' id='actionViewEmployee-"+EntryIndex[5]+"'><b >"+EntryIndex[1]+"</b></a><br>";
								textJson+=""+EntryIndex[6]+"<br>";
								textJson+="ตำแหน่ง"+EntryIndex[2]+"";
								textJson+="</div>\",";
								textJson+="\"field3\":\"<div class='textR' style='font-weight:bold;'>"+EntryIndex[8]+"%</div>\",";
								textJson+="\"field7\":\"<div class='textR' style='font-weight:bold;'>"+EntryIndex[9]+"%</div>\",";
								if(EntryIndex[7]==0){
									textJson+="\"field8\":\"<div class='textR'>"+getColorBall(EntryIndex[3])+"<a href='#' class='downloadPDFbyPerson' id='downloadPDFbyPerson-"+EntryIndex[10]+"-"+EntryIndex[11]+"-"+EntryIndex[12]+"-"+EntryIndex[13]+"-"+EntryIndex[5]+"'><img width='20' src='../images/PDF_downlaod.png'></a><div>\",";
								}else{
									textJson+="\"field8\":\"<div class='textR'>"+getColorBall(EntryIndex[3],EntryIndex[5])+"<a href='#' class='downloadPDFbyPerson' id='downloadPDFbyPerson-"+EntryIndex[10]+"-"+EntryIndex[11]+"-"+EntryIndex[12]+"-"+EntryIndex[13]+"-"+EntryIndex[5]+"'><img width='20' src='../images/PDF_downlaod.png'></a><div style='font-size:12px;'>ปรับ("+EntryIndex[7]+")"+EntryIndex[14]+"</div><div>\",";
								}
								//textJson+="\"field9\":\"<div class='textR'><center><a href='#' class='downloadPDFbyPerson' id='id-"+EntryIndex[5]+"'><img width='20' src='../images/PDF_downlaod.png'></a></center><div>\"";
								
							textJson+="}";
				// 	}
				// });
			});
			textJson+="]";
			//alert(textJson);
			var objJson=eval("("+textJson+")");
			
			
			
			// table grid start --
			var gridDepartment="";
			gridDepartment+="<table id=\"gridDeparment\">";
			gridDepartment+="<colgroup>";
				gridDepartment+="<col style=\"width:40px\"/>";
				gridDepartment+="<col style=\"width:150px\" />";
				gridDepartment+="<col style=\"width:100px\" />";
				gridDepartment+="<col style=\"width:100px\" />";
				//gridDepartment+="<col style=\"width:7%\" />";
				//gridDepartment+="<col style=\"width:7%\"  />";
				gridDepartment+="<col  style=\"width:100px\" />";
				// gridDepartment+="<col  style=\"width:15%\" />";
				/*gridDepartment+="<col style=\"width:70px\"  />";*/
			gridDepartment+="</colgroup>";
				gridDepartment+="<thead>";
					gridDepartment+="<tr>";
				
					if($("#embed_language").val()=="th"){
						gridDepartment+="<th style='text-align:center;'  data-field=\"field0\" ><b></b></th>";
						gridDepartment+="<th data-field=\"field1\" ><b>ข้อมูลส่วนตัว</b></th>";
						gridDepartment+="<th style='text-align:right;' data-field=\"field3\"><b>ประเมินตนเอง%</b></th>";
						gridDepartment+="<th style='text-align:right;' data-field=\"field7\"><b>หัวหน้าประเมิน%</b></th>";
						
						gridDepartment+="<th style='text-align:right' data-field=\"field8\"><b>ผลประเมิน% <a href='#' class='downloadPDFbyPerson' id='downloadPDFbyPerson-"+$("#appraisal_year_table").val()+"-"+$("#appraisal_period_id_table").val()+"-"+$("#department_id_table").val()+"-"+$("#assign_position_id").val()+"-"+$("#assign_employee_id").val()+"'><img width='20' src='../images/PDF_downlaod.png'></a></b></th>";
						//gridDepartment+="<th data-field=\"field9\"><b>ดาวน์โหลด</b></th>";
						  
					}else{
						gridDepartment+="<th data-field=\"field0\" ><b></b></th>";
						gridDepartment+="<th data-field=\"field1\" ><b>Employee Info</b></th>";
						gridDepartment+="<th style='text-align:right;' data-field=\"field3\"><b>Evaluate</b></th>";
						gridDepartment+="<th style='text-align:right;' data-field=\"field7\"><b>Chief Evaluate</b></th>";
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

	$(".actionViewEmployee").click(function(){
		var idView=this.id.split("-");
		var id=idView[1];
		$.ajax({
			   url:"../Model/mEmployee.php",
			   headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			   type:"post",
			   dataType:"json",
			   data:{"id":id,"action":"edit"},
			   async:false,
			   success:function(data){
				   
				try {
					
						if(data[0]["emp_picture"]==""){
							$("#image_file_display").html("<img style=\"opacity:0.1\" class=\"img-circle\" src=\"../View/uploads/avatar.jpg\" width=\"150\" height=\"150\">");
						}else{
							$("#image_file_display").html("<img class=\"img-circle\" src=\""+data[0]["emp_picture"]+"\" width=\"150\" height=\"150\">");
						}
						$("#empCode_display").html(data[0]["emp_code"]);
						$("#empUser_display").html(data[0]["emp_user"]);
						$("#empFirstName_display").html(data[0]["emp_first_name"]);
						$("#empLastName_display").html(data[0]["emp_last_name"]);

						$("#empDepartment_display").html(data[0]["department_name"]);
						$("#empPosition_display").html(data[0]["position_name"]);
						$("#empRole_display").html(data[0]["role_name"]);
						$("#empStatusWork_display").html(data[0]["emp_status_work"]);
						$("#empTel_display").html(data[0]["emp_tel"]);
						$("#empEmail_display").html(data[0]["emp_email"]);
						$("#empOther_display").html(data[0]["emp_other"]);
						$("#empBrithDay_display").html(data[0]["emp_date_of_birth"]);
						$("#empAgeWorking_display").html(data[0]["emp_age_working"]);
						
						if(data[0]["emp_status"]=="single"){
							
							$("#empStatus_display").html("โสด");
							
						}else{

							$("#empStatus_display").html("สมรส");
						}
						$("#empMobile_display").html(data[0]["emp_mobile"]);
						$("#empAddress_display").html(data[0]["emp_adress"]);
						$("#empDistict_display").html(data[0]["emp_district"]);
						$("#empSubDistict_display").html(data[0]["emp_sub_district"]);
						$("#empProvince_display").html(data[0]["emp_province"]);
						$("#empPostcode_display").html(data[0]["emp_postcode"]);
						
						$("#employeeViewDetailModal").modal("show");

					}catch(err) {
					console.log(err.message);
				}

			   }
		});
		
	});

	// press button for download by person start
		$(".downloadPDFbyPerson").click(function(){
			
			
			fnLinkToPDF(this.id);
			return false;
		});
	// press button for download by person end
	// press button for download KPI PDF
	var fnLinkToPDF=function(data_id){

		var data_array= data_id.split("-");
		var	kpi_year=data_array[1];
		var	appraisal_period_id=data_array[2];
		var	department_id=data_array[3];
		var	position_id=data_array[4];
		var	emp_id=data_array[5];

		window.open("../html2pdf/kpi_report.php?kpi_year="+kpi_year+"&appraisal_period_id="+appraisal_period_id+"&department_id="+department_id+"&position_id="+position_id+"&emp_id="+emp_id+"", "_blank");
		// if(undefined!=emp_id){
		// 	window.open("../html2pdf/kpi_report.php?kpi_year="+kpi_year+"&appraisal_period_id="+appraisal_period_id+"&department_id="+department_id+"&emp_id="+emp_id+"", "_blank");
		// }else{
		// 	window.open("../html2pdf/kpi_report.php?kpi_year="+kpi_year+"&appraisal_period_id="+appraisal_period_id+"&department_id="+department_id+"", "_blank");
		// }
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
}
	

$(document).ready(function(){

	fnDropdownListYearKpiDashboard(sessionStorage.getItem("param_year"));
	fnDropdownListAppraisalKpiDashboard(sessionStorage.getItem("param_year"));
	fnDropdownListDepartmentKpiDashboard(sessionStorage.getItem("param_department"),"selectAll");
	fnDropdownListPositionKpiDashboard(sessionStorage.getItem("param_position"),"selectAll");
	fnDropdownListEmpKpiDashboard(sessionStorage.getItem("param_year"),$("#appraisal_period_id_table").val(),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),"selectAll");
	
	//alert($("#appraisal_period_id_table").val());
	// sessionStorage.setItem("param_year", $("#appraisal_year_table").val());
	// sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_id_table").val());
	// sessionStorage.setItem("param_department", $("#department_id_table").val());
	// sessionStorage.setItem("param_position", $("#assign_position_id").val());
	// sessionStorage.setItem("param_emp", $("#assign_employee_id").val());
	
	kpiDasboardMainFn(sessionStorage.getItem("param_year"),$("#appraisal_period_id_table").val(),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));



	$( "body" ).off( "change", "#appraisal_year_table");
	$( "body" ).on( "change", "#appraisal_year_table", function() {

		
		sessionStorage.setItem("param_year", $("#appraisal_year_table").val());
		sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_id_table").val());
		sessionStorage.setItem("param_department", $("#department_id_table").val());
		sessionStorage.setItem("param_position", $("#assign_position_id").val());
		sessionStorage.setItem("param_emp", $("#assign_employee_id").val());
		fnDropdownListEmpKpiDashboard(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),"selectAll");
		kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
		
		//searchListEmpByKPIFn();
	});

	$( "body" ).off( "change", "#appraisal_period_id_table");
	$( "body" ).on( "change", "#appraisal_period_id_table", function() {
		
		sessionStorage.setItem("param_year", $("#appraisal_year_table").val());
		sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_id_table").val());
		sessionStorage.setItem("param_department", $("#department_id_table").val());
		sessionStorage.setItem("param_position", $("#assign_position_id").val());
		sessionStorage.setItem("param_emp", $("#assign_employee_id").val());
		fnDropdownListEmpKpiDashboard(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),"selectAll");
		kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
		//searchListEmpByKPIFn();
	});

	$( "body" ).off( "change", "#department_id_table");
	$( "body" ).on( "change", "#department_id_table", function() {
		
		sessionStorage.setItem("param_year", $("#appraisal_year_table").val());
		sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_id_table").val());
		sessionStorage.setItem("param_department", $("#department_id_table").val());
		sessionStorage.setItem("param_position", $("#assign_position_id").val());
		sessionStorage.setItem("param_emp", $("#assign_employee_id").val());
		fnDropdownListEmpKpiDashboard(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),"selectAll");
		kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
		//searchListEmpByKPIFn();
	});

	$( "body" ).off( "change", "#assign_position_id");
	$( "body" ).on( "change", "#assign_position_id", function() {
		
		sessionStorage.setItem("param_year", $("#appraisal_year_table").val());
		sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_id_table").val());
		sessionStorage.setItem("param_department", $("#department_id_table").val());
		sessionStorage.setItem("param_position", $("#assign_position_id").val());
		sessionStorage.setItem("param_emp", $("#assign_employee_id").val());
		fnDropdownListEmpKpiDashboard(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),"selectAll");
		kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
		//searchListEmpByKPIFn();
	});

	$( "body" ).off( "change", "#assign_employee_id");
	$( "body" ).on( "change", "#assign_employee_id", function() {
		
		sessionStorage.setItem("param_year", $("#appraisal_year_table").val());
		sessionStorage.setItem("param_appraisal_period", $("#appraisal_period_id_table").val());
		sessionStorage.setItem("param_department", $("#department_id_table").val());
		sessionStorage.setItem("param_position", $("#assign_position_id").val());
		sessionStorage.setItem("param_emp", $("#assign_employee_id").val());
		kpiDasboardMainFn(sessionStorage.getItem("param_year"),sessionStorage.getItem("param_appraisal_period"),sessionStorage.getItem("param_department"),sessionStorage.getItem("param_position"),sessionStorage.getItem("param_emp"));
		//searchListEmpByKPIFn();
	});


	//check mobile or desktop
	//box-title-l
	

	// setTimeout(function(){
		if(sessionStorage.getItem('checkMobile')=='mobile'){
		
			$(".box-title-l").css({"float":"initial"});
			$(".pre-search-label").css({"padding-left":"0px"});
			$(".fontLabelParam").css({"text-align":"left"});
			

		}else{
			$(".box-title-l").css({"float":"left"});
			$(".pre-search-label").css({"padding-left":"15px"});
			$(".fontLabelParam").css({"text-align":"right"});
		}

	// },500);
	
	

});

