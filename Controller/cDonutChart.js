var donutChart=function(chartId,data,option){
	
		// var s1 = [['a',6], ['b',8], ['c',14], ['d',20]];
		  //var s2 = [['a', 8], ['b', 12], ['c', 6], ['d', 9]];
		   
		  var plot3 = $.jqplot(chartId, [data], {
			seriesColors: option['theme'],
			title: option['title'],
		    seriesDefaults: {
		      // make this a donut chart.
		    	
		      renderer:$.jqplot.DonutRenderer,
		      rendererOptions:{
		        // Donut's can be cut into slices like pies.
		        sliceMargin: 3,
		        // Pies and donuts can start at any arbitrary angle.
		        startAngle: -90,
		        showDataLabels: true,
		        // By default, data labels show the percentage of the donut/pie.
		        // You can show the data 'value' or data 'label' instead.
		        dataLabels: 'value'
		      }
		  
		    },
            highlighter: {
          	  show: true,
          	  formatString:'%s %d', 
          	  tooltipLocation:'sw', 
          	  useAxesFormatters:false
          	},
		    legend: { show:true, location: option['location'], placement :option['placement'] }
		  });
		  $(".jqplot-highlighter-tooltip").css({"background":option['theme'][0],"color":option['tooltipTextColor'],"opacity":"1"});
	};
	