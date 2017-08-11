
    	$(document).ready(function(){
    		$('#tabs1 a:first').tab('show'); // Select first tab
    		$('#tabs1 a').click(function (e) {
    			  e.preventDefault();
    			  $(this).tab('show');
    			  
    		});
    		
    		//start kendoui line chart
    		 $("#lineChart").kendoChart({
                 title: {
                     text: "Gross domestic product growth /GDP annual %/"
                 },
                 legend: {
                     position: "bottom"
                 },
                 chartArea: {
                     background: ""
                 },
                 seriesDefaults: {
                     type: "line"
                 },
                 series: [{
                     name: "India",
                     data: [3.907, 7.943, 7.848, 9.284, 9.263, 9.801, 3.890, 8.238, 9.552, 6.855]
                 },{
                     name: "World",
                     data: [1.988, 2.733, 3.994, 3.464, 4.001, 3.939, 1.333, -2.245, 4.339, 2.727]
                 },{
                     name: "Russian Federation",
                     data: [4.743, 7.295, 7.175, 6.376, 8.153, 8.535, 5.247, -7.832, 4.3, 4.3]
                 },{
                     name: "Haiti",
                     data: [-0.253, 0.362, -3.519, 1.799, 2.252, 3.343, 0.843, 2.877, -5.416, 5.590]
                 }],
                 valueAxis: {
                     labels: {
                         format: "{0}%"
                     },
                     line: {
                         visible: false
                     },
                     axisCrossingValue: -10
                 },
                 categoryAxis: {
                     categories: [2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011],
                     majorGridLines: {
                         visible: false
                     }
                 },
                 tooltip: {
                     visible: true,
                     format: "{0}%",
                     template: "#= series.name #: #= value #"
                 }
             });
    		//end kendoui line chart
    		//start suffer color table
    		$("table#table1 tbody tr:odd").addClass("active");
    		$("table#table2 tbody tr:odd").addClass("active");
    		//end suffer color table
    	});
