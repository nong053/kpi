
$(document).ready(function(){
	
	var gaugeOwner=function(){

		
		//$("#gaugeOwner").kendoRadialGauge();
		  $("#gaugeOwner").kendoRadialGauge({

			  pointer: {
                  value: 85
              },

              scale: {
                  minorUnit: 5,
                  startAngle: -30,
                  endAngle: 210,
                  max: 100,
                  labels: {
                     // position: labelPosition || "inside"
                  },
                  ranges: [
                      {
                          from: 00,
                          to: 49,
                          color: "#c20000"
                      }, {
                          from: 50,
                          to: 79,
                          color: "#ffc700"
                      }, {
                          from: 80,
                          to: 100,
                          color: "green"
                      }
                  ]
              }
          });
		
	}
	gaugeOwner();
	
var gridKendoGrid=function(){
	$("#grid").kendoGrid({
        height: 230,
        sortable: true
    });
}
gridKendoGrid();


var sparklineBulet=function(){
	$(".sparkline").sparkline([10,12,12,9,7], {
	    type: 'bullet'});
	}

sparklineBulet();

var sparklineLine=function(){
	$(".lineSparkline").sparkline([5,6,7,9,9,5,3,2,2,4,6,7], {
	    type: 'line',
	    width: '70',
	    height: '20'});
}

sparklineLine();


var gridKendoGrid2=function(){
	$("#grid2").kendoGrid({
        height: 230,
        sortable: true
    });
}
gridKendoGrid2();

	//BARCHART START
var barChart=function(){
	$("#barChart").kendoChart({
        title: {
        	visible: true,
            text: "ผลการประเมิน"
        },
        legend: {
            position: "top"
        },
        seriesDefaults: {
            type: "column"
        },
        series: [{
            name: "2012",
            data: [60,70, 81,85]
        }, {
            name: "2013",
            data: [66, 72, 79, 84]
        }, {
            name: "2014",
            data: [68, 78, 80,79]
        },{
            type: "line",
            data: [85, 85, 86, 87],
            name: "เป้าหมาย",
           // color: "#ec5e0a",
            //axis: "mpg"
        }],
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
            categories: ["ครั้งที่1", "ครั้งที่2", "ครั้งที่3", "ครั้งที่4"],
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
            template: "#= series.name #: #= value #"
        }
    });
};
//BARCHART END

barChart();
	


//click perspective for Detail Employee start
$("#pers01").click(function(){
	$.ajax({
		url:"../View/vKpiDashboard.php",
		type:"get",
		dataType:"html",
		async:false,
		success:function(data){
			$("#mainContent").html(data);
			callProgramControl("cKpiDashboard.js");
		}
	});
});
//click perspective for Detail Employee start
});
