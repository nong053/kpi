var barBarLineChart=function(chartId,data,option){
	
	
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
		
		// {label:'Hotel'},
         //{label:'Event Regristration'},
        // {label:'Airfare'}
		// 
		//alert(seriesArrayUnique.length);
		series+="[";
		$.each(seriesArrayUnique,function(index,indexEntry){
			if(index==0){
				//{label:'Planned',renderer:$.jqplot.BarRenderer},
			series+="{label:'"+indexEntry+"'}";
			}else{
				
				if(index==seriesArrayUnique.length-1){
					
					series+=",{label:'"+indexEntry+",renderer:$.jqplot.BarRenderer'}";
				}else{
					series+=",{label:'"+indexEntry+"'}";
				}
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
		
		
	
	    
	    // Can specify a custom tick Array.
	    // Ticks should match up one for each y value (category) in the series.
		
	    var cate =cateArrayUnique;
	    var obValue=eval("("+value+")");
	    var obSeries=eval("("+series+")");
	    //alert(ticks);
	   // alert(obValue);
	    console.log(obSeries);
	    var Planned=seriesArrayUnique[0];
	    var Actual=seriesArrayUnique[1];
	    
	    
	/*
	Statace
	    var s1 = [4, 7, 9, 15];
	    var s2 = [12, 6, 19, 8];
	    var s3 = [[1, 40], [2, 13], [3, 54], [4, 47]];
	    var ticks = ['May', 'June', 'July','Agust'];

	    var plot2 = $.jqplot(chartId, [s1, s2,s3], {
	        stackSeries: true,
	        seriesDefaults: {
	            renderer: $.jqplot.BarRenderer,
	            rendererOptions: {
	                barMargin: 10
	            },
	            pointLabels: {
	                show: true,
	                stackedValue: true
	            }
	        },
	        series: [{},
	        {},
	                 { 
	                     disableStack : true,//otherwise it wil be added to values of previous series
	            renderer: $.jqplot.LineRenderer,
	            lineWidth: 2,
	            pointLabels: {
	                show: false
	            },
	            markerOptions: {
	                size: 5
	            }}],
	        axesDefaults: {
	            tickRenderer: $.jqplot.CanvasAxisTickRenderer,
	            tickOptions: {
	                angle: 30
	            }
	        },
	        axes: {
	            xaxis: {
	                renderer: $.jqplot.CategoryAxisRenderer,
	                ticks: ticks
	            },
	            yaxis: {
	                autoscale: true
	            }
	        }
	    });
	
	*/
	 /*
	var planned = [70000,90000,120000,100000,];
    var actual = [90000,80000,150000,120000];
    var trend = [75000, 85000, 140000, 110000];
    var xAxis = ['Jan', 'Feb', 'Mar', 'Apr'];
	*/
    
   
       // $.jqplot(chartId, [ planned,actual, trend], BarChart());
    	 $.jqplot(chartId, obValue, callBarChart());
   

    	 function callBarChart()
    	    {
    	        var optionsObj = {
    	            title: option['title'],
    	            axes: {
    	                 xaxis: {
    	                    renderer: $.jqplot.CategoryAxisRenderer,
    	                    ticks: cate,                       
    	                },
    	                yaxis: {
    	                    tickOptions: { showMark: false, formatString: "%d" },                       
    	                },
    	            },
    	            axesDefaults: {
    	                tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
    	                tickOptions: {
    	                  angle: option['cateRotate'],
    	                  fontSize: '10pt'
    	                }
    	            },
    	            seriesColors: option['theme'],

    	            series: [
    	                     
						

    	               {label:Planned,renderer:$.jqplot.BarRenderer},
    	                //{label: 'Actual',renderer:$.jqplot.BarRenderer},
    	                {label: Actual}
    	                ],

    	            legend: {
    	                show: true,
    	                location: option['location'] ,
	                    placement :option['placement']
    	                },

    	            seriesDefaults:{
    	                shadow: false,
    	                rendererOptions:{
    	                   barPadding: 0,
    	                   barMargin: 10,
    	                   barWidth: 25,
    	               }

    	            }, 
    	            highlighter:{
    		            show:true,
    		            tooltipContentEditor:tooltipContentEditor
    		        },
    	        };
    	        return optionsObj;
    	    }
    	 
 	    $(".jqplot-highlighter-tooltip").css({"background":option['theme'][0],"color":option['tooltipTextColor'],"opacity":"1"});
    
	//Example http://stackoverflow.com/questions/9775772/jqplot-show-trendline-over-barchart
	
	};
	
	
	