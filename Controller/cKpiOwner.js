var  getColorEasyPieChart=function(score){
		
		
		var color = "";
		$.ajax({
			url:"../Model/mGetStatus.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"get",
			dataType:"json",
			async:false,
			//data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"emp_id":emp_id},
			success:function(data){
				//console.log(data);
				//get data from model for loop value is between value is coret this argument   
				$.each(data,function(index,indexIntry){
					
					
					
					 if(index==0 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
						 
						  color="#"+indexIntry[3];
		                   
					 }else if(index==1 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
						 
						   color="#"+indexIntry[3];
		                   
					 }else if(index==2 && (parseInt(indexIntry[1])<= score  ) ){
						 
						    color="#"+indexIntry[3];
					 }
					 
				});
				
			}

		});
		
		return color;
	  }
	
	var easyPieChartFn=function(id,percentage){
		
		
		$('#easyPieChart-'+id).easyPieChart({
			//easing: 'easeOutBounce',
			size:'50',
			lineWidth:'5',
			barColor:getColorEasyPieChart(percentage),
			//trackColor:false ,
			scaleColor:false,
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

	}

	var  getColorBall=function(score){
		
		
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
					
					
					
					 if(index==0 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
							
						   //ballScoll+="<div id='ball1'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<div id='ball'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<span style='float:left;padding-left:5px;'>"+parseFloat(score).toFixed(2)+"%</span>";
		                   
					 }else if(index==1 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
						 
						   //ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<div id='ball'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<span style='float:left;padding-left:5px;'>"+parseFloat(score).toFixed(2)+"%</span>";
		                   
					 }else if(index==2 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
						
						   //ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<div id='ball'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<span style='float:left;padding-left:5px;'>"+parseFloat(score).toFixed(2)+"%</span>";
		                   
					 }else if(index==3 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
						
						   //ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<div id='ball'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<span style='float:left;padding-left:5px;'>"+parseFloat(score).toFixed(2)+"%</span>";
		                   
					 }else if(index==4 && (parseInt(indexIntry[1])<= score  ) &&( parseInt(indexIntry[2])>= score)){
						 
						   //ballScoll+="<div id='ball1' class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball'style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<div id='ball'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<span style='float:left;padding-left:5px;'>"+parseFloat(score).toFixed(2)+"%</span>";
		                   
					 }else if(index==5 && (parseInt(indexIntry[1])<= score  ) ){
						 
						   //ballScoll+="<div id='ball1'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball2'  class='ball' style='background-color:#cccccc; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   //ballScoll+="<div id='ball3'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<div id='ball'  class='ball' style='background-color:#"+indexIntry[3]+"; width:20px;height:20px;border-radius:100px; float:left;'></div>";
		                   ballScoll+="<span style='float:left;padding-left:5px;'>"+parseFloat(score).toFixed(2)+"%</span>";
					 }
					 
				});
				
			}

		});
		
		return ballScoll;
	  }

	var gaugeOwner_bk=function(kpi_year,appraisal_period_id,department_id){

		//Guage Owner START
		$.ajax({
			url:"../Model/mGetOwnerKpiResult.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"get",
			data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"action":"guageOwner","department_id":department_id},
			dataType:"json",
			success:function(data){


				try {
				
				var $ranges="";
				//alert(data[0][0]);
				if(data[0][0]==0){
					 
                   $ranges+="ranges: [";
                        $ranges+="{";
                            $ranges+="from: 0,";
                            $ranges+="to: 100,";
                            $ranges+="color: \"#ffc700\"";
                        $ranges+="}";
                    $ranges+="]";
                   
				}else{
					
				//var score="[["+data[0][0]+"]]";
				//var scoreObj=score=eval("("+score+")");
				
				var intervalsStartArray=data[0][1];
				var intervalsStart=intervalsStartArray.split(",");
				
				var intervalsEndArray=data[0][2];
				var intervalsEnd=intervalsEndArray.split(",");
				
				//alert(intervals);
				var intervalColorsArray=data[0][3];
				intervalColorsArray=intervalColorsArray.split(",");
				
				var intervalColors="'"+intervalColorsArray[0]+"','"+intervalColorsArray[1]+"','"+intervalColorsArray[2]+"'";
					$ranges+=" [";

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
						
						var objRanges=eval("("+$ranges+")");
				
				//Gauge for check data value end
				}
				//alert($ranges);
				
				
				 $("#gaugeOwner").kendoRadialGauge({
					 		
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
				
				 $("#gauge-value").html("องค​์กร "+parseFloat(data[0][0]).toFixed(2)+"%");

				 }catch(err) {
				 console.log(err.message);
				}
				
			}
		});
		
		
		//Guage Owner END  
		
	}
	


	var gaugeOwnerPerspective=function(kpi_year){

		//Guage Perspective START
		$.ajax({
			url:"../Model/mGetOwnerKpiResult.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"get",
			data:{"kpi_year":kpi_year,
			"action":"perspective_result"
			},
			dataType:"json",
			success:function(data){


				try {
				
				if(data[0]==0){
					
					return false;
				}
				
				var $ranges="";
				
				
					$ranges+=" [";

						$ranges+=" {";
							$ranges+="from:\"0\",";
							$ranges+="to: \"19\",";
							$ranges+="color: \"#DD0000\"";
						$ranges+=" }, {";
							$ranges+="from:\"20\",";
							$ranges+="to: \"39\",";
							$ranges+="color: \"#FFFF99\"";
						$ranges+="},"; 
						$ranges+="{";
							$ranges+="from:\"40\",";
							$ranges+="to: \"59\",";
							$ranges+="color: \"#FFCC66\"";
						$ranges+= " },";
						$ranges+="{";
							$ranges+="from:\"60\",";
							$ranges+="to: \"79\",";
							$ranges+="color: \"#99FF00\"";
						$ranges+= " },";
						$ranges+="{";
							$ranges+="from:\"80\",";
							$ranges+="to: \"99\",";
							$ranges+="color: \"#339933\"";
						$ranges+= " },";
						$ranges+="{";
							$ranges+="from:\"100\",";
							$ranges+="to: \"100\",";
							$ranges+="color: \"#336666\"";
						$ranges+= " }";
						$ranges+= "]";
						
						var objRanges=eval("("+$ranges+")");
				
				//Gauge for check data value end

				  $("#perspectiveArea").html("");
				  let pers_result=0.00;
				  let pers_weight=0.00;
				  let org_result=0.00;
				  $(data).each(function(index,indexEntry){


					console.log(indexEntry);
					pers_result+=parseFloat(indexEntry[4]);
					pers_weight+=parseFloat(indexEntry[3]);
					
					
					//alert(parseFloat(indexEntry[3]).toFixed(2));


					var htmlPerspectiveHTML="";
					htmlPerspectiveHTML+="<div class=\"col-md-3\">";
						htmlPerspectiveHTML+="<div class=\"panel panel-default panel-bottom\" style=\"margin-top: 5px;\">";
							htmlPerspectiveHTML+="<div class=\"panel-heading\">";
								htmlPerspectiveHTML+="<b><i class=\"glyphicon glyphicon-eye-open\"></i> "+indexEntry[1]+"</b>";	
								htmlPerspectiveHTML+="</div>";
								htmlPerspectiveHTML+="<div class=\"panel-body panel-body-top\">";
								htmlPerspectiveHTML+="<div id=\"gauge-container\">";
								htmlPerspectiveHTML+="<div class=\"gaugePerspective\" id=\"gaugePerspective-"+indexEntry[0]+"\"></div>";
								htmlPerspectiveHTML+="<div class='gaugePerspectiveValue' id=\"gaugePerspectiveValue-"+indexEntry[0]+"\"></div>";
								htmlPerspectiveHTML+="</div>";
							htmlPerspectiveHTML+="</div>";
						htmlPerspectiveHTML+="</div>";
					htmlPerspectiveHTML+="</div>";
					$("#perspectiveArea").append(htmlPerspectiveHTML);

					$("#gaugePerspective-"+indexEntry[0]).kendoRadialGauge({
					 		
						pointer: {
							value:parseFloat(indexEntry[2]).toFixed(2)
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
				    $("#gaugePerspectiveValue-"+indexEntry[0]).html(parseFloat(indexEntry[2]).toFixed(2)+"%");



				  });
				  
				  org_result=pers_result/pers_weight;
				  org_result=parseFloat(org_result).toFixed(2);

				  $("#gaugeOwner").kendoRadialGauge({
					 		
					pointer: {
						value:parseFloat(org_result).toFixed(2)
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
				$("#gaugeOwnerValue").html(org_result+"%");
				  //alert(org_result);


				 }catch(err) {
				 console.log(err.message);
				}
				
			}
		});
		
		
		//Guage Perspective END  
		
	}


	var gaugeDep=function(kpi_year,appraisal_period_id,department_id){

		//Guage Owner START
		$.ajax({
			url:"../Model/mGetOwnerKpiResult.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"get",
			data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"action":"guageOwner","department_id":department_id},
			dataType:"json",
			success:function(data){
				
				var $ranges="";
				//alert(data[0][0]);
				if(data[0][0]==0){
					 
                   $ranges+="ranges: [";
                        $ranges+="{";
                            $ranges+="from: 0,";
                            $ranges+="to: 100,";
                            $ranges+="color: \"#ffc700\"";
                        $ranges+="}";
                    $ranges+="]";
                   
				}else{
					
				//var score="[["+data[0][0]+"]]";
				//var scoreObj=score=eval("("+score+")");
				
				var intervalsStartArray=data[0][1];
				var intervalsStart=intervalsStartArray.split(",");
				
				var intervalsEndArray=data[0][2];
				var intervalsEnd=intervalsEndArray.split(",");
				
				//alert(intervals);
				var intervalColorsArray=data[0][3];
				intervalColorsArray=intervalColorsArray.split(",");
				
				var intervalColors="'"+intervalColorsArray[0]+"','"+intervalColorsArray[1]+"','"+intervalColorsArray[2]+"'";
					$ranges+=" [";
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
						
						var objRanges=eval("("+$ranges+")");
				
				//Gauge for check data value end
				}
				//alert($ranges);
				
				
				 $("#gaugeDep").kendoRadialGauge({
					 		
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
				
				 $("#gauge-dep-value").html("แผนก "+parseFloat(data[0][0]).toFixed(2)+"%");
				
			}
		});
		
		
		//Guage Owner END
		
		  
		
	}


	//BARCHART START
var barChart=function(kpi_year){
	
	 /*bar chart  appraisal period start*/
	$.ajax({
		url:"../Model/mGetOwnerKpiResult.php",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		type:"get",
		dataType:"json",
		data:{"kpi_year":kpi_year,
		"action":"appraialBarChartOwner",
		},
		success:function(data){
			
			try {
			
			// ####### Create Category Bargrpah Start.
			$("#barChartOwner").empty();
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
			
			// ###### Create Series Bargraph Start
			var seriesArray="";
			seriesArray+="[";
			$.each(data,function(index,indexEntry){
				
					
					if(index==0){
						seriesArray+="{";
						if(indexEntry[0]=="Target" || indexEntry[0]=="Target YTD"){
							seriesArray+="type: \"line\",";
							
						}
					}else{
						
						seriesArray+=",{";
						if(indexEntry[0]=="Target" || indexEntry[0]=="Target YTD"){
							seriesArray+="type: \"line\",";
						}
					}
			
					
					seriesArray+="name: \""+indexEntry[0]+"\",";
					seriesArray+="data: ["+indexEntry[1]+"]";
					seriesArray+="}";
				
			});
			seriesArray+="]";
			
			var seriesArrayObj=eval("("+seriesArray+")");
		
			//###### Create Series Bargraph End
			
			
			/*bar chart power by kendo ui start*/
			
			 $("#barChartOwner").kendoChart({
				 	theme:"Flat",
				 	
				 	//theme:"Bootstrap",
			        title: {
			        	visible: true,
			            text: "ผลประเมิน"
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
			                format: "{0}"
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
			            }
			        },
			        tooltip: {
			            visible: true,
			            format: "{0}",
			            template: "#= series.name #: #= value #%"
			        }
			    });
			 
			/*bar chart power by kendo ui end*/
				}catch(err) {
					console.log(err.message);
			}
		}
	});
	
	
	 /*bar chart end*/

};


//BARCHART END

//################# Easy Pie Chart Start #################
var departmentResultFn = function(kpi_year){
	$.ajax({
		url:"../Model/mGetOwnerKpiResult.php",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		type:"get",
		dataType:"json",
		data:{"kpi_year":kpi_year,"action":"scoreDepartmentOwner"},
		success:function(data){
			//alert(data);
			if(data==0){
				return false;
			}
			
			var colorArray=Array();
			
			colorArray[0]="#10c4b2";
			colorArray[1]="#ff7663";
			colorArray[2]="#ffb74f";
			colorArray[3]="#a2df53";
			colorArray[4]="#1c9ec4";
			colorArray[5]="#ff63a5";
			colorArray[6]="#A9DFBF";
			colorArray[7]="#FAD7A0";
			colorArray[8]="#138D75";
			colorArray[9]="#2980B9";
			colorArray[10]="#8E44AD";
			
			$("#areaPieByDepartment").empty();
			$.each(data,function(index,indexEntry){
			var easyChartAreaLayout="";
				//KpiPerspective
			easyChartAreaLayout+="<div class='KpiPerspective  col-xs-6 col-sm-6 col-md-6' id='KpiPerspective-"+indexEntry[0]+"' style='height:83px;  background:"+colorArray[index]+"'>";
				easyChartAreaLayout+="<div class='boxStatus'>";
				easyChartAreaLayout+="<div class='boxGraphTop ' >";
				easyChartAreaLayout+="<div id='donutStatus1 '>";
								
				easyChartAreaLayout+="<span class='easyPieChart' id='easyPieChart-"+indexEntry[0]+"'  data-percent="+indexEntry[2]+">";
				easyChartAreaLayout+="<span class='percent'></span>";
				easyChartAreaLayout+="</span>";
								
				easyChartAreaLayout+="</div>";
				easyChartAreaLayout+="</div>";
				easyChartAreaLayout+="<div class='boxButtonTop'>";
				easyChartAreaLayout+=indexEntry[1];
				easyChartAreaLayout+="</div>";
				easyChartAreaLayout+="</div>";
				easyChartAreaLayout+="<br style='clear:both'>";
			easyChartAreaLayout+="</div>";
			
				
			$("#areaPieByDepartment").append(easyChartAreaLayout);
			easyPieChartFn(indexEntry[0],indexEntry[2]);
			});
		}
	});
	
	
}




//################# Easy Pie Chart End ###################
//#################  Pie Chart Department Result Start ###
var pieChartDepResult=function(kpi_year,appraisal_period_id){
	$.ajax({
		//url:"../Model/mGetPersonKpiResult.php",
		url:"../Model/mGetOwnerKpiResult.php",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		type:"get",
		dataType:"json",
		data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"action":"pieChartByDepartment"},
		success:function(data){
			
			var textJson="[";
        	$.each(data,function(index,indexEntry){
        		//[[\"Heavy Industry\",12],[\"Retail\",9],[\"Light Industry\",14],[\"Out of home\",16],[\"Commuting\", 7],[\"Orientation\", 9]]";
        		if(index==0){
        			textJson+="{";
        		}else{
        			textJson+=",{";
        		}
        		//alert(indexEntry[0]);
        		textJson+="category:\""+indexEntry[0]+"\",";
    			textJson+="value:"+parseFloat(indexEntry[1]).toFixed(2)+"";
        		textJson+="}";
        	});
        	textJson+="]";
        	//alert(textJson);
        	var objJson=eval("("+textJson+")");
        	//alert(textJson);
			//console.log(objJson);
			
			//kendo ui pie start
			$("#pieChartByDepartment").kendoChart({
				theme:"Flat",
                title: {
                    position: "bottom",
                    //text: "ผลการประเมินแยกตามแยกตามแตะะแผนก"
                },
                legend: {
                    visible: true,
                    position:"bottom"
                },
                chartArea: {
                    background: ""
                },
                seriesDefaults: {
                    labels: {
                        visible: true,
                        background: "transparent",
                        template: "#= category #: \n #= value#%"
                    }
                },
                series: [{
                    type: "donut",
                    startAngle: 150,
                    data: objJson,
                    labels: {
                        visible: false,
                        background: "transparent",
                        position: "outsideEnd",
                        template: "#= category #: \n #= value#%"
                    }
                }],
                tooltip: {
                    visible: true,
                    /*format: "{0}%"*/
                    /*template: "#= category # (#= series.name #): #= value #%"*/
                    template: "#= category # - #= kendo.format('{0:P}', percentage) #"
                }
            });
			//kendo ui pie end
		}
	});		
}
//pieChartDepResult();
//#################  Pie Chart Department Result End   ###################
//########  Pie Chart Kpi Result Start ###
var piChartkpiResult = function(kpi_year,appraisal_period_id,department_id){
	$.ajax({
		//url:"../Model/mGetPersonKpiResult.php",
		url:"../Model/mGetOwnerKpiResult.php",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		type:"get",
		dataType:"json",
		data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"action":"pieChartKpiResult","department_id":department_id},
		success:function(data){
			var textJson="[";
	    	$.each(data,function(index,indexEntry){
	    		//[[\"Heavy Industry\",12],[\"Retail\",9],[\"Light Industry\",14],[\"Out of home\",16],[\"Commuting\", 7],[\"Orientation\", 9]]";
	    		if(index==0){
	    			textJson+="{";
	    		}else{
	    			textJson+=",{";
	    		}
	    		textJson+="category:\""+indexEntry[0]+"\",";
				textJson+="value:"+parseFloat(indexEntry[1]).toFixed(2)+"";
	    		textJson+="}";
	    	});
	    	textJson+="]";
	    	var objJson=eval("("+textJson+")");
			
			$("#pieChartKpiResult").kendoChart({
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
	                data: objJson,
	               
	            }],
	            tooltip: {
	                visible: true,
	                template: "#= category # - #= kendo.format('{0:P}', percentage) #"
	                /*format: "{0}%"*/
	            }
	        });
			//kendo ui pie end
		}
	});
}
//piChartkpiResult();
//#################  Pie Chart Kpi Result End   ###################
//#################  Table Kpi Result Start   ###################
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
var TableKpiResult = function(kpi_year,appraisal_period_id,department_id){
	/*
	alert(kpi_year);
	alert(appraisal_period_id);
	alert(department_id);
*/

	
	$.ajax({
		url:"../Model/mGetOwnerKpiResult.php",
		headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
		type:"get",
		dataType:"json",
		async:false,
		data:{"kpi_year":kpi_year,"appraisal_period_id":appraisal_period_id,"action":"tableKpiResult","department_id":department_id},
		success:function(data){
			//alert(data);
			if(data==0){
				return false;
			}

			var textJson="";
			textJson+="[";
			$.each(data,function(index,EntryIndex){
				$.ajax({
					url:"../Model/mDashboardDivision.php",
					headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
					type:"get",
					dataType:"json",
					async:false,
					data:{"kpi_year":kpi_year,"department_id":department_id,"appraisal_period_id":appraisal_period_id,"kpi_id":EntryIndex[0],"action":"score_spraph"},
					success:function(data){
						//console.log(data);
						var score_spraph=data[0][0];
						
						//alert(""+score_spraph+"");
						//return "0,80,80";
							if(index==0){
								textJson+="{";
							}else{
								textJson+=",{";
							}
				/*kpi_id,kpi_name,kpi_target,kpi_actual,kpi_performance,kpi_target_percentage*/
					/*textJson+="\"Field1\":\"<div class='textR'>"+EntryIndex[0]+"</div>\",";*/

					
					
					textJson+="\"Field1\":\"<div class='textR'>"+EntryIndex[5]+"</div>\",";
					textJson+="\"Field2\":\"<div class=''>"+EntryIndex[1]+"</div>\",";
					textJson+="\"Field8\":\"<div class=''>"+EntryIndex[7]+"</div>\",";
					textJson+="\"Field3\":\"<div class='textR'>"+parseFloat(EntryIndex[2]).toFixed(2)+"</div>\",";
					textJson+="\"Field4\":\"<div class='textR'>"+parseFloat(EntryIndex[3]).toFixed(2)+"</div>\",";
					textJson+="\"Field5\":\"<div class='lineSparkline'>"+score_spraph+"</div>\",";
					textJson+="\"Field6\":\"<div class='sparklineBullet'>"+EntryIndex[6]+",100,100,"+EntryIndex[4]+"</div>\",";
					textJson+="\"Field7\":\"<div class='textR'><center>"+getColorBall(EntryIndex[4])+"</center></div>\",";
				
				textJson+="}";
		
					}
				});
				
			});
			textJson+="]";
			//alert(textJson);
			var objJson2=eval("("+textJson+")");
			
			var htmlGridKpiResult="";
			// table grid start
			htmlGridKpiResult+="<table id=\"tableKpiResult\">";
			htmlGridKpiResult+="<colgroup>";
			
					htmlGridKpiResult+="<col style=\"width:7%\" />";
					htmlGridKpiResult+="<col style=\"width:30%\"/>";
					htmlGridKpiResult+="<col style=\"width:7%\"/>";
					htmlGridKpiResult+="<col style=\"width:7%\"/>";
					htmlGridKpiResult+="<col style=\"width:7%\"/>";
					htmlGridKpiResult+="<col style=\"width:7%\"/>";
					htmlGridKpiResult+="<col style=\"width:8%\"/>";
					htmlGridKpiResult+="<col style=\"width:15%\"/>";
					/*htmlGridKpiResult+="<col />";*/
					
					
			htmlGridKpiResult+="</colgroup>";
				htmlGridKpiResult+="<thead>";
					htmlGridKpiResult+="<tr>";
					if($("#embed_language").val()=="th"){

						htmlGridKpiResult+="<th data-field=\"Field1\"><b>#</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field2\"><b>ตัวชี้วัด</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field8\"><b>ประเภทตัวชี้วัด</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field3\"><b>เป้า</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field4\"><b>ผล</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field5\"><b>กราฟ</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field6\"><b>ผลเทียบเป้า</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field7\"><b>ประสิทธิภาพ%</b></th>";

					}else{

						htmlGridKpiResult+="<th data-field=\"Field1\"><b>#</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field2\"><b>KPI Name</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field8\"><b>KPI Type</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field3\"><b>Target</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field4\"><b>Actual</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field5\"><b>Graph</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field6\"><b>Actual/Target</b></th>";
						htmlGridKpiResult+="<th data-field=\"Field7\"><b>Performance%</b></th>";

					}
					htmlGridKpiResult+="</tr>";
				htmlGridKpiResult+="</thead>";
			htmlGridKpiResult+="<tbody>";
				htmlGridKpiResult+="<tr>";
					htmlGridKpiResult+="<td></td>";
						htmlGridKpiResult+="<td></td>";
						htmlGridKpiResult+="<td></td>";
						htmlGridKpiResult+="<td></td>";
						htmlGridKpiResult+="<td></td>";
						htmlGridKpiResult+="<td></td>";
						htmlGridKpiResult+="<td></td>";
						htmlGridKpiResult+="<td></td>";
						htmlGridKpiResult+="</tr> ";
				htmlGridKpiResult+="</tbody>";
			htmlGridKpiResult+="</table>";
            // table grid end 
			$("#tableGridKpieResultArea").html(htmlGridKpiResult);
			
			$("#tableKpiResult").kendoGrid({
				 dataSource: {
			          data:objJson2 
			          },
		        sortable: true
		   	});
			
			$(".k-grid td").css({"padding":"0px;"});
			sparklineBulet(".sparklineBullet");
			sparklineLine(".lineSparkline");
		}
	});

}	
//TableKpiResult();


//dropdown List AppralisalPeriod start
var fnDropdownListAppralisal=function(year,appraisal_period_id){
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
			htmlDropDrowList+="<select id=\"appraisal_period_id\" name=\"appraisal_period_id\" class=\" \" style=\"width:100%;\">";
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
			$("#appraisal_period_id").kendoDropDownList({
					theme: "silver"
				});
			//persDropDrowList
		}
	});
}	

//#################  Create Parameter End #####################

//#################  Create Parameter Year Start   ############
var paramYear=function(kpi_year){


		$.ajax({
			url:"../Model/mAppraisalYearList.php",
			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
			type:"post",
			dataType:"json",
			async:false,
			success:function(data){
				var htmlDropDrowList="";
				htmlDropDrowList+="<select id=\"appraisal_year\" name=\"appraisal_year\" class=\" \" style=\"width:100%;\">";
					$.each(data,function(index,indexEntry){
						if(kpi_year!=undefined){
							if(kpi_year==indexEntry[0]){
								htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[0]+"</option>";	
							}else{
								htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[0]+"</option>";
							}
							
						}else{
							//alert(indexEntry[1]);
							if(indexEntry[1]==1){
								htmlDropDrowList+="<option value="+indexEntry[0]+" selected>"+indexEntry[0]+"</option>";	
							}else{
								htmlDropDrowList+="<option value="+indexEntry[0]+">"+indexEntry[0]+"</option>";
							}
							
						}
							
									
							
							
						
					});
				htmlDropDrowList+="</select>";
				$("#appraisalYearArea").html(htmlDropDrowList);
				$("#appraisal_year").kendoDropDownList({
					theme: "silver"
				});
				sessionStorage.setItem("param_year", $("#appraisal_year").val());
				
			}
		});
		

}



//#################  Create Parameter Dep Default Start ############



//#################  Create Parameter Dep Default End   ############

//#################  Create Parameter Year End   ############



//#################  submit button action start #####################
/*
$("#appraisalPeriodSubmit").off("click");
$("#appraisalPeriodSubmit").on("click",function(){
	
	
	$(".paramEmb").remove();
	$("body").append("<input type='hidden' class='paramEmb' name='paramYearEmb' id='paramYearEmb' value='"+$("#appraisal_year").val()+"'>");
	$("body").append("<input type='hidden' class='paramEmb' name='paramAppraisalEmb' id='paramAppraisalEmb' value='"+$("#appraisal_period_id").val()+"'>");
	
	if($(".pageEmb").val()=="pageDepartment"){
		
		//### Call Program department Page Start ###
		
		kpiDasboardMainFn($("#paramYearEmb").val(),$("#paramAppraisalEmb").val(),$("#department_id_emp").val(),$("#department_name_emp").val());
		
		//### Call Program department Page Start ###
	}else{
		//alert("page not Department");
		gaugeOwner($("#paramYearEmb").val(),$("#paramAppraisalEmb").val());
		barChart($("#paramYearEmb").val());
		easyPieChartMainFn($("#paramYearEmb").val(),$("#paramAppraisalEmb").val());
		pieChartDepResult($("#paramYearEmb").val(),$("#paramAppraisalEmb").val());
		piChartkpiResult($("#paramYearEmb").val(),$("#paramAppraisalEmb").val());
		TableKpiResult($("#paramYearEmb").val(),$("#paramAppraisalEmb").val());
	}
	

});
$("#appraisalPeriodSubmit").click();
*/
//#################  submit button action end   #####################


//################ button top right start  in panel ###########
$(".glyphicon-minus-top").click(function(){
	
	$(".panel-body-top").slideUp();
	
});
$(".glyphicon-resize-full-top").click(function(){
	
	$(".panel-body-top").slideDown();
	
});
$(".glyphicon-remove-top").click(function(){
	
	$(".panel-top").hide();
	
});
//################ button top right start  in panel ###########
//################ button bottom right start  in panel ###########
$(".glyphicon-minus-bottom").click(function(){
	
	$(".panel-body-bottom").slideUp();
	
});
$(".glyphicon-resize-full-bottom").click(function(){
	
	$(".panel-body-bottom").slideDown();
	
});
$(".glyphicon-remove-bottom").click(function(){
	
	$(".panel-bottom").hide();
	
});
//################ button bottom right start  in panel ###########



//#################  submit button action start #####################




$(document).ready(function(){
	
	
	paramYear(sessionStorage.getItem("param_year"));
	$( "body" ).off( "change", "#appraisal_year");
	$( "body" ).on( "change", "#appraisal_year", function() {
		//searchKPIOwnerFn();
		sessionStorage.setItem("param_year", $("#appraisal_year").val());
		gaugeOwnerPerspective(sessionStorage.getItem("param_year"));
		barChart(sessionStorage.getItem("param_year"));
		departmentResultFn(sessionStorage.getItem("param_year"));
	});

	gaugeOwnerPerspective(sessionStorage.getItem("param_year"));
	barChart(sessionStorage.getItem("param_year"));
	departmentResultFn(sessionStorage.getItem("param_year"));
});


//$("#appraisalPeriodSubmit").click();

//#################  submit button action end   #####################


