$(document).ready(function(){
	$("table#executiveTable tbody tr:odd").addClass("active");
	$("table#executiveTable tbody tr:odd").addClass("active");
	
	
	//dial chart start1
	
		   s1 = [32200];

		   plot4 = $.jqplot('gaugeOperations',[s1],{
		       seriesDefaults: {
		           renderer: $.jqplot.MeterGaugeRenderer,
		           rendererOptions: {
		               label: 'Metric Tons per Year',
		               labelPosition: 'bottom',
		               labelHeightAdjust: -5,
		               intervalOuterRadius: 85,
		               ticks: [10000, 30000, 50000, 70000],
		               intervals:[22000, 55000, 70000],
		               intervalColors:['#5CB85C', 'yellow', '#D43F3A']
		           }
		       }
		   });
		   
		
		   s1 = [52200];

		   plot4 = $.jqplot('gaugeConstruction',[s1],{
		       seriesDefaults: {
		           renderer: $.jqplot.MeterGaugeRenderer,
		           rendererOptions: {
		               label: 'Metric Tons per Year',
		               labelPosition: 'bottom',
		               labelHeightAdjust: -5,
		               intervalOuterRadius: 85,
		               ticks: [10000, 30000, 50000, 70000],
		               intervals:[22000, 55000, 70000],
		               intervalColors:['#5CB85C', 'yellow', '#D43F3A']
		           }
		       }
		   });
		  
		   $(".jqplot-grid-canvas").css({"height":"150px"});
		 //dial chart end3
		   
		   
		  //start bar chart morrist 
		   
		   Morris.Bar({
				  element: 'barOperations',
				  data: [
				  {x: '2011 Q1', y: 3, z: 2, a: 3},
				  {x: '2011 Q2', y: 2, z: null, a: 1},
				  {x: '2011 Q3', y: 0, z: 2, a: 4},
				  {x: '2011 Q4', y: 2, z: 4, a: 3}
				  ],
				  xkey: 'x',
				  ykeys: ['y', 'z', 'a'],
				  labels: ['Y', 'Z', 'A']
				  }).on('click', function(i, row){
				  console.log(i, row);
				  });
		   
		   //end bar chart morrist 
		   
		 //start pieByObligation chart morrist
		   var data = [
		               ['Heavy Industry', 12],['Retail', 9], ['Light Industry', 14]
		             ];
		             var plot1 = jQuery.jqplot ('pieByObligation', [data],
		               {
		                 seriesDefaults: {
		                   // Make this a pie chart.
		                   renderer: jQuery.jqplot.PieRenderer,
		                   rendererOptions: {
		                     // Put data labels on the pie slices.
		                     // By default, labels show the percentage of the slice.
		                     showDataLabels: true
		                   }
		                 },
		                 legend: { show:false, location: 'e' }
		               }
		             );
		             
		             /*
		   Morris.Donut({
			   element: 'pieByObligation',
			   data: [
			     {label: "Download Sales", value: 12},
			     {label: "In-Store Sales", value: 30},
			     {label: "Mail-Order Sales", value: 20}
			   ]
			 });
			 */
		 //end pieByObligation chart morrist
		   
		   
		 //start pieByPositionGroup chart morrist
		             /*
		   Morris.Donut({
			   element: 'pieByPositionGroup',
			   data: [
			     {label: "Download Sales", value: 12},
			     {label: "In-Store Sales", value: 30},
			     {label: "Mail-Order Sales", value: 20}
			   ]
			 });
			 */
             var data = [
  		               ['Heavy Industry', 12],['Retail', 9], ['Light Industry', 14]
  		             ];
  		             var plot1 = jQuery.jqplot ('pieByPositionGroup', [data],
  		               {
  		                 seriesDefaults: {
  		                   // Make this a pie chart.
  		                   renderer: jQuery.jqplot.PieRenderer,
  		                   rendererOptions: {
  		                     // Put data labels on the pie slices.
  		                     // By default, labels show the percentage of the slice.
  		                     showDataLabels: true
  		                   }
  		                 },
  		                 legend: { show:false, location: 'e' }
  		               }
  		             );
		//end pieByPositionGroup chart morrist
		   
		 //start piePayment chart morrist  
  		             /*
		   Morris.Donut({
			   element: 'piePayment',
			   data: [
			     {label: "Download Sales", value: 12},
			     {label: "In-Store Sales", value: 30},
			     {label: "Mail-Order Sales", value: 20}
			   ]
			 });
			 */
           var data = [
  		               ['Heavy Industry', 12],['Retail', 9], ['Light Industry', 14]
  		             ];
  		             var plot1 = jQuery.jqplot ('piePayment', [data],
  		               {
  		                 seriesDefaults: {
  		                   // Make this a pie chart.
  		                   renderer: jQuery.jqplot.PieRenderer,
  		                   rendererOptions: {
  		                     // Put data labels on the pie slices.
  		                     // By default, labels show the percentage of the slice.
  		                     showDataLabels: true
  		                   }
  		                 },
  		                 legend: { show:false, location: 'e' }
  		               }
  		             );
	   //end piePayment chart morrist
		   
		   
		 //start lineEmpTurnOver chart morrist
		   Morris.Line({
			   element: 'lineEmpTurnOver',
			   data: [
			     { y: '2006', a: 100, b: 90 },
			     { y: '2007', a: 75,  b: 65 },
			     { y: '2008', a: 50,  b: 40 },
			     { y: '2009', a: 75,  b: 65 },
			     { y: '2010', a: 50,  b: 40 },
			     { y: '2011', a: 75,  b: 65 },
			     { y: '2012', a: 100, b: 90 }
			   ],
			   xkey: 'y',
			   ykeys: ['a', 'b'],
			   labels: ['Series A', 'Series B']
			 });
		//end lineEmpTurnOver chart morrist
		   
		 
		 //start pieRevenue chart morrist  
		   Morris.Donut({
			   element: 'pieRevenue',
			   data: [
			     {label: "Download Sales", value: 12},
			     {label: "In-Store Sales", value: 30},
			     {label: "Mail-Order Sales", value: 20}
			   ]
			 });
		 //end pieRevenue chart morrist
		   
		 //start donut chart morrist  
		   Morris.Donut({
			   element: 'donutStatus1',
			   data: [
			     {label: "Download Sales", value: 12},
			     {label: "In-Store Sales", value: 30},
			     {label: "Mail-Order Sales", value: 20}
			   ]
			 });
		 //end donut chart morrist
		 //start donut chart morrist  
		   Morris.Donut({
			   element: 'donutStatus2',
			   data: [
			     {label: "Download Sales", value: 12},
			     {label: "In-Store Sales", value: 30},
			     {label: "Mail-Order Sales", value: 20}
			   ]
			 });
		 //end donut chart morrist
		 //start donut chart morrist  
		   Morris.Donut({
			   element: 'donutStatus3',
			   data: [
			     {label: "Download Sales", value: 12},
			     {label: "In-Store Sales", value: 30},
			     {label: "Mail-Order Sales", value: 20}
			   ]
			 });
		 //end donut chart morrist
		 //start donut chart morrist  
		   Morris.Donut({
			   element: 'donutStatus4',
			   data: [
			     {label: "Download Sales", value: 12},
			     {label: "In-Store Sales", value: 30},
			     {label: "Mail-Order Sales", value: 20}
			   ]
			 });
		 //end donut chart morrist
		   
		   
		   
		   
		 //start barRevenueByType chart morrist  
		   Morris.Bar({
				  element: 'barRevenueByType',
				  data: [
				  {x: '2011 Q1', y: 3, z: 2, a: 3},
				  {x: '2011 Q2', y: 2, z: null, a: 1},
				  {x: '2011 Q3', y: 0, z: 2, a: 4},
				  {x: '2011 Q4', y: 2, z: 4, a: 3}
				  ],
				  xkey: 'x',
				  ykeys: ['y', 'z', 'a'],
				  labels: ['Y', 'Z', 'A']
				  }).on('click', function(i, row){
				  console.log(i, row);
				  });
		 //end barRevenueByType chart morrist
		   
		 //table grid kendoui
		   /*
		   $("#executiveTable").kendoGrid({
               height: 480,
               sortable: true
           });
           */
		 //table grid kendoui
		   
		   $("#paramYear").kendoDropDownList();
		   $("#paramMonth").kendoDropDownList();
});
