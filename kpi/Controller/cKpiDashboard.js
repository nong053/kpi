
	
	
	//fixed varible for waiting start here..
/*
	var kpi_year="2012";
	var appraisal_period_id="2";
	var department_id="1";
*/	
var kpiDasboardMainFn = function(kpi_year,appraisal_period_id,department_id,department_name,emp_id){
		
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
		type:"get",
		dataType:"json",
		async:false,
		//data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"emp_id":emp_id},
		success:function(data){
			
			//get data from model for loop value is between value is coret this argument   
			$.each(data,function(index,indexIntry){
				
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
				
			});
			
		}
	});
	
	return ballScoll;
  }


function detailInit(e) {
			//alert(e.data.fieldId);
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
					$.ajax({
						url:"../Model/mGetPersonKpiResult.php",
						type:"get",
						dataType:"html",
						async:false,
						data:{"emp_id":e.data.fieldId,"action":"emp_info"},
						success:function(data){
							$("#empArea-"+e.data.fieldId).html(data);
						}
					});
					// ################ Genarate Person KPI GRID  START ################# //

					$.ajax({
						url:"../Model/mGetPersonKpiResult.php",
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
												textJson+="\"Field6\":\"<div class='textR'><div class='sparklineBulletKpi-"+e.data.fieldId+"'>"+EntryIndex[4]+",100,100,80</div></div>\",";
												textJson+="\"Field7\":\"<div class='textR'>"+getColorBall(EntryIndex[4])+"<div>\"";
											textJson+="}";
											//alert(textJson);
									}
								});
							});
							textJson+="]";
							//alert(textJson);
							var objJson2=eval("("+textJson+")");
							console.log(objJson2);
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
						type:"get",
						data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"emp_id":e.data.fieldId},
						dataType:"json",
						success:function(data){
							
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
						}
					});
					// ################ Genarate Perfomance Guage End  ################# //
					
					
					 /*bar chart  appraisal period start*/
					$.ajax({
						url:"../Model/mGetPersonKpiResult.php",
						type:"get",
						dataType:"json",
						data:{"kpi_year":kpi_year,"emp_id":e.data.fieldId,"action":"bar_chart_appraisal"},
						success:function(data){
							// ####### Create Category Bargrpah Start.
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
		type:"get",
		dataType:"json",
		async:false,
		data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"department_id":department_id,"action":"list_emp_score","emp_id":emp_id},
		success:function(data){
			console.log(data);
			var textJson="";
			textJson+="[";
			$.each(data,function(index,EntryIndex){
				
				$.ajax({
					url:"../Model/mDashboardDivision.php",
					type:"get",
					dataType:"json",
					async:false,
					data:{"kpi_year":kpi_year,"emp_id":EntryIndex[5],"action":"score_spraph_emp"},
					success:function(data){
						
						var score_spraph=data[0][0];
						
						//alert(""+score_spraph+"");
						//return "0,80,80";
							if(index==0){
								textJson+="{";
							}else{
								textJson+=",{";
							}
								textJson+="\"fieldId\":\""+EntryIndex[5]+"\",";
								textJson+="\"field0\":\"<div class='kpi' data-toggle='modal' data-target='.bs-example-modal-lg'><img width='35' class='img-circle'  src='"+EntryIndex[0]+"'></div>\",";
								textJson+="\"field1\":\"<div class='kpi'>"+EntryIndex[1]+"</div>\",";
								textJson+="\"field2\":\""+EntryIndex[6]+"\",";
								textJson+="\"field3\":\""+EntryIndex[2]+"\",";
								/*textJson+="\"field3\":\"<div class='textR'>"+EntryIndex[3]+"</div>\",";*/
								textJson+="\"field4\":\"<div class='textR'>"+EntryIndex[4]+"</div>\",";
								textJson+="\"field5\":\"<div class='textR'>"+EntryIndex[3]+"</div>\",";
								textJson+="\"field6\":\"<div class='textR'><div class='lineSparkline'>"+score_spraph+"</div></div>\",";
								textJson+="\"field7\":\"<div class='textR'><div class='sparklineBullet'>"+EntryIndex[3]+",100,100,"+EntryIndex[4]+"</div></div>\",";
								textJson+="\"field8\":\"<div class='textR'>"+getColorBall(EntryIndex[3])+"<div>\",";
								textJson+="\"field9\":\"<div class='textR'><center><a href='#' class='downloadPDFbyPerson' id='id-"+EntryIndex[5]+"'><img width='20' src='../images/PDF_downlaod.png'></a></center><div>\"";
								
							textJson+="}";
					}
				});
			});
			textJson+="]";
			//alert(textJson);
			var objJson=eval("("+textJson+")");
			
			console.log(objJson);
			
			// table grid start --
			var gridDepartment="";
			gridDepartment+="<table id=\"gridDeparment\">";
			gridDepartment+="<colgroup>";
				gridDepartment+="<col style=\"width:5%\"/>";
				gridDepartment+="<col style=\"width:20%\" />";
				gridDepartment+="<col style=\"width:10%\" />";
				gridDepartment+="<col style=\"width:10%\" />";
				gridDepartment+="<col style=\"width:10%\" />";
				gridDepartment+="<col style=\"width:8%\"  />";
				gridDepartment+="<col  style=\"width:10%\" />";
				gridDepartment+="<col  style=\"width:8%\" />";
				/*gridDepartment+="<col style=\"width:70px\"  />";*/
			gridDepartment+="</colgroup>";
				gridDepartment+="<thead>";
					gridDepartment+="<tr>";
						gridDepartment+="<th data-field=\"field0\" ><center><b></b></center></th>";
						gridDepartment+="<th data-field=\"field1\" ><center><b>ชื่อ-นามสกุล</b></center></th>";
						gridDepartment+="<th data-field=\"field2\"><center><b>ฝ่าย</b></center></th>";
						gridDepartment+="<th data-field=\"field3\"><center><b>ตำแหน่ง</b></center></th>";
						gridDepartment+="<th data-field=\"field4\"><center><b>เป้าหมาย</b></center></th>";
						gridDepartment+="<th data-field=\"field5\"><center><b>ค่าจริง</b></center></th>";
						gridDepartment+="<th data-field=\"field6\"><center><b>กราฟคะแนน</center></th>";
						gridDepartment+="<th data-field=\"field7\"><center><b>เทียบเป้า</b></center></th>";
						gridDepartment+="<th data-field=\"field8\"><center><b>สถานนะ</b></center></th>";
						gridDepartment+="<th data-field=\"field9\"><center><b>PDF</b></center></th>";
						  
				
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
							gridDepartment+="<td></td>";
							gridDepartment+="<td></td>";
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
	var fnDropdownListAppralisal=function(year,appraisal_period_id){
		//alert(year);
		$.ajax({
			url:"../Model/mAppralisalPeriodList.php",
			type:"post",
			dataType:"json",
			async:false,
			data:{"year":year,"paramSelectAll":"selectAll"},
			success:function(data){
				//alert(data);
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"appraisal_period_id\" name=\"appraisal_period_id\" class=\"form-control input-sm\" style=\"width:80px;\">";
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
				//persDropDrowList
			}
		});
	}	

	//#################  Create Parameter End #####################

	//#################  Create Parameter Year Start   ############
	var paramYear=function(kpi_year){

			//alert(kpi_year);
			$.ajax({
				url:"../Model/mAppraisalYearList.php",
				type:"post",
				dataType:"json",
				async:false,
				success:function(data){
					var htmlDropDrowList="";
					htmlDropDrowList+="<select id=\"appraisal_year\" name=\"appraisal_year\" class=\"form-control input-sm\" style=\"width:80px;\">";
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
					$("#appraisal_year").change(function(){
						
						fnDropdownListAppralisal($(this).val());
					});
				}
			});
			

	}
	//kpi_year,appraisal_period_id
	if(kpi_year!=""){
		paramYear(kpi_year);
	}else{
		paramYear($("#paramYearEmb").val());
	}
	if(appraisal_period_id!=""){
		fnDropdownListAppralisal(kpi_year,appraisal_period_id);
	}else{
		fnDropdownListAppralisal($("#paramYearEmb").val(),$("#appraisal_year").val());
	}
	
	//fnDropdownListAppralisal($("#appraisal_year").val());
	//#################  Create Parameter Year End   ############

	

	//#################  submit button action start #####################

	$("#kpiDashboardSubmit").off("click");
	$("#kpiDashboardSubmit").on("click",function(){
					//alert($(".pageEmb").val());
					//alert($(".RoleEmb").val());
					$(".paramEmb").remove();
					$("body").append("<input type='hidden' class='paramEmb' name='paramYearEmb' id='paramYearEmb' value='"+$("#appraisal_year").val()+"'>");
					$("body").append("<input type='hidden' class='paramEmb' name='paramAppraisalEmb' id='paramAppraisalEmb' value='"+$("#appraisal_period_id").val()+"'>");
					
					if($(".pageEmb").val()=="pageDepartment"){
						
						
						if($(".RoleEmb").val()=="roleEmp"){
							//### Call kpiDasboardMainFn for emp role Start ###
							$.ajax({
								url:"../View/vKpiDashboard.php",
								type:"get",
								dataType:"html",
								async:false,
								data:{"kpi_year":$("#paramYearEmb").val(),"appraisal_period_id":$("#paramAppraisalEmb").val(),
									"department_id":$("#departmentIdEmp").val(),"department_name":$("#departmentNameEmp").val()
									},
								success:function(data){
									$("#mainContent").html(data);
									callProgramControl("cKpiDashboard.js");
									//check if Level 3 get page is show all becuace one emp_id
									if($("#roleLevelEmp").val()=="Level3"){
										kpiDasboardMainFn($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#departmentIdEmp").val(),$("#departmentNameEmp").val(),$("#emp_id").val());
										//### drawdown grid for show detail within ###
										$(".k-icon").click();
									}else{
										kpiDasboardMainFn($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#departmentIdEmp").val(),$("#departmentNameEmp").val());
									}
								}
							});
							//### Call kpiDasboardMainFn for emp role End ###
							
						}else{
						//### Call Program department Page Start ###
							
							alert("paramYearEmb"+$("#paramYearEmb").val());
							alert("paramAppraisalEmb"+$("#paramAppraisalEmb").val());
							alert("department_id_emp"+$("#department_id_emp").val());
							alert("department_name_emp"+$("#department_name_emp").val());
							
							kpiDasboardMainFn($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#department_id_emp").val(),$("#department_name_emp").val());
						//### Call Program department Page Start ###
						}
						
						
					}else{//else2
						
						kpiOwnerFn();
						// call function index page
						gaugeOwner($("#paramYearEmb").val(),$("#paramAppraisalEmb").val());
						barChart($("#paramYearEmb").val());
						easyPieChartMainFn($("#paramYearEmb").val(),$("#paramAppraisalEmb").val());
						pieChartDepResult($("#paramYearEmb").val(),$("#paramAppraisalEmb").val());
						piChartkpiResult($("#paramYearEmb").val(),$("#paramAppraisalEmb").val());
						TableKpiResult($("#paramYearEmb").val(),$("#paramAppraisalEmb").val());
						
					
				
			}

	});
	//$("#kpiDashboardSubmit").click();

	//#################  submit button action end   #####################
	
	
};