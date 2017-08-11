var barChart=function(chartId,data,option){
//Array Unigue start
	//checkOption start
	
	if(option['cateRotate']==""){
		option['cateRotate']=0;
	}
	
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
	    var plot1 = $.jqplot(chartId, obValue, {
	        // The "seriesDefaults" option is an options object that will
	        // be applied to all series in the chart.
	    	animate: true,
	        seriesDefaults:{
	            renderer:$.jqplot.BarRenderer,
	            rendererOptions: {fillToZero: true,
	            				 barWidth: option['barWidth']
	            				 },
	            pointLabels: { show: true },
	            
	            
	        },
	       
	  
	        stackSeries: option['stackSeries'],
	        title: option['title'],
	       // stackSeries: true,
	        // Custom labels for the series are specified with the "label"
	        // option on the series option.  Here a series option object
	        // is specified for each series.
	        series:obSeries,
	        // Show the legend and put it outside the grid, but inside the
	        // plot container, shrinking the grid to accomodate the legend.
	        // A value of "outside" would not shrink the grid and allow
	        // the legend to overflow the container.
	        axesDefaults: {
                tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
                tickOptions: {
                  angle: option['cateRotate'],
                  fontSize: '10pt'
                }
            },
	        legend:{ 
                show:true,
                    renderer: $.jqplot.EnhancedLegendRenderer,
                    location: option['location'] ,
                    placement :option['placement'],
                    marginTop : "10px",
                    rendererOptions: {
                        numberRows: 1
                    }
                 }, 
            
	            
	        axes: {
	            // Use a category axis on the x axis and use our custom ticks.
	            xaxis: {
	                renderer: $.jqplot.CategoryAxisRenderer,
	                ticks: ticks
	            },
	            // Pad the y axis just a little so bars can get close to, but
	            // not touch, the grid boundaries.  1.2 is the default padding.
	            yaxis: {
	                pad: 1.05,
	                tickOptions: {formatString: '%d'}
	            }
	            
	        },
	        
	        seriesColors: option['theme'],
	        highlighter:{
	            show:true,
	            tooltipContentEditor:tooltipContentEditor
	        },
	        highlighter:{
	            show:true,
	            tooltipContentEditor:tooltipContentEditor
	        },

	    });
	    
	    $(".jqplot-highlighter-tooltip").css({"background":option['theme'][0],"color":option['tooltipTextColor'],"opacity":"1"});
	};
	  
	