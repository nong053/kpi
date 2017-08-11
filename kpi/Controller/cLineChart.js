var lineChart=function(chartId,data,option){
	
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
	    
	    
	    
	    
	    
		//var ticks = ['May', 'June', 'July', 'August', 'June', 'July', 'August', 'June', 'July'];
		 var plot2 = $.jqplot (chartId, obValue, {
		      // Give the plot a title.
		      title: option['title'],
		      // You can specify options for all axes on the plot at once with
		      // the axesDefaults object.  Here, we're using a canvas renderer
		      // to draw the axis label which allows rotated text.
		      series:obSeries,
		      seriesColors: option['theme'],
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
		      axesDefaults: {
		        labelRenderer: $.jqplot.CanvasAxisLabelRenderer
		      },
		      // An axes object holds options for all axes.
		      // Allowable axes are xaxis, x2axis, yaxis, y2axis, y3axis, ...
		      // Up to 9 y axes are supported.
		      axes: {
		        // options for each axis are specified in seperate option objects.
		         xaxis: {
	                renderer: $.jqplot.CategoryAxisRenderer,
	                ticks: ticks
	            },
		        yaxis: {
		          //label: "Y Axis"
		        }
		      },
		      highlighter:{
		            show:true,
		            tooltipContentEditor:tooltipContentEditor
		        }
		    });
		 $(".jqplot-highlighter-tooltip").css({"background":option['theme'][0],"color":option['tooltipTextColor'],"opacity":"1"});
	};