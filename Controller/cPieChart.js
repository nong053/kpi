var pieChart = function(chartId,data,option){

	// var value= eval("("+data+")");
	  
	
	            var plot1 = jQuery.jqplot (chartId, [data],
	            		
	              {
	            	
	            	seriesColors: option['theme'],
	            	title: option['title'],
	                seriesDefaults: {
	                  // Make this a pie chart.
	                  renderer: jQuery.jqplot.PieRenderer,
	                  rendererOptions: {
	                    // Put data labels on the pie slices.
	                    // By default, labels show the percentage of the slice.
	                    showDataLabels: true,
	                    dataLabels: option['dataLabels']
	                  }
	                },
	                highlighter: {
	                	  show: true,
	                	  formatString:'%s %d', 
	                	  tooltipLocation:'sw', 
	                	  useAxesFormatters:false
	                	},
	                legend: { show:true, location: option['location'], placement :option['placement']}
	              }
	              
	            );
	            
	            $(".jqplot-highlighter-tooltip").css({"background":option['theme'][0],"color":option['tooltipTextColor'],"opacity":"1"});
};