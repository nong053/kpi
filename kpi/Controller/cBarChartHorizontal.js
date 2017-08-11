var barChartHorizontal = function(chartId,data,option){
	//checkOption end
	Array.prototype.getUnique = function(){
		   var u = {}, a = [];
		   for(var i = 0, l = this.length; i < l; ++i){
		      if(u.hasOwnProperty(this[i])) {
		         continue;
		      }
		      a.push(this[i]);
		      u[this[i]] = 1;
		   }
		   return a;
		}
//Array Unigue end
	
	var cateArray= new Array();
	var cateArrayUnique= new Array();
	var seriesArray=new Array();
	var seriesArrayUnique=new Array();
	var series="";
	
	
	$.each(data,function(index,indexEntry){
		//alert(indexEntry[2]);
		
		cateArray[index]=indexEntry[0];
		seriesArray[index]=indexEntry[1];
		
		
		
	});
	cateArrayUnique=cateArray.getUnique();
	seriesArrayUnique=seriesArray.getUnique();
	
	//
	/*
	 {label:'Hotel'},
     {label:'Event Regristration'},
     {label:'Airfare'}
	 */
	series+="[";
	$.each(seriesArrayUnique,function(index,indexEntry){
		if(index==0){
		series+="{label:'"+indexEntry+"'}";
		}else{
		series+=",{label:'"+indexEntry+"'}";
		}
		
	});
	series+="]";
	
	
	var value="";
	value+="[[";
	var cateLength=cateArrayUnique.length-1;
		$.each(data,function(index,indexEntry){
			
				if(index==0){
					value+=indexEntry[2];
				}else{
					if(cateLength==cateArrayUnique.length-1){
						value+=",["+indexEntry[2];
					}else{
						value+=","+indexEntry[2];
					}
					
				}
				
				if(cateLength==0){
					value+="]";
					cateLength=cateArrayUnique.length;
				}
				cateLength--;
								
			
		});
		value+="]";
	//alert(value);
	

    
    // Can specify a custom tick Array.
    // Ticks should match up one for each y value (category) in the series.
	
    var ticks =cateArrayUnique;
    var obValue=eval("("+value+")");
    var obSeries=eval("("+series+")");
	
	
	
	var data = [
	            [[55, 1], [35, 2], [53, 3], [10, 4], [36, 5]],
	            [[4, 1], [4, 2], [3, 3], [5, 4], [7, 5]],
	            [[5, 1], [11, 2], [4, 3], [7, 4], [28, 5]]
	            ];
	
	

	        //var ticks = ['A', 'B', 'C', 'D', 'E'];

	        plot4 = $.jqplot(chartId, obValue, {
	            animate: true,
	            stackSeries: option['stackSeries'],
	            captureRightClick: true,
	            title: option['title'],
	            seriesColors: option['theme'],
	            seriesDefaults: {
	                renderer: $.jqplot.BarRenderer,
	                shadowAngle: 135,
	                rendererOptions: {
	                    barDirection: 'horizontal',
	                    highlightMouseDown: true,
	                    barWidth: option['barWidth']
	                },
	                pointLabels: {
	                    show: true,
	                    formatString: '%d',
	                    hideZeros: true
	                }
	            },
	            series:obSeries,
    	        legend: {
    	            show: true,
    	            location: option['location'] ,
                    placement :option['placement']
    	        },
	            axes: {
	                xaxis: {
	                    renderer: $.jqplot.LogAxisRenderer,
	                    showTicks: false,
	                    drawMajorGridlines: false
	                },
	                yaxis: {
	                    renderer: $.jqplot.CategoryAxisRenderer,
	                    rendererOptions: {
	                        tickRenderer: $.jqplot.AxisTickRenderer,
	                        tickOptions: {
	                            mark: null,
	                            fontSize: 14
	                        }
	                    },
	                    ticks: ticks
	                }
	            },
	            
		        highlighter:{
		            show:true,
		            tooltipContentEditor:tooltipContentEditor
		        },
	        });
	        $(".jqplot-highlighter-tooltip").css({"background":option['theme'][0],"color":option['tooltipTextColor'],"opacity":"1"});
	};