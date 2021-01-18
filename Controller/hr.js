$(document).ready(function(){



	/*start chart float*/
	var pieChart=function(pieGraphName){

		// Example Data

		//var data = [
		//	{ label: "Series1",  data: 10},
		//	{ label: "Series2",  data: 30},
		//	{ label: "Series3",  data: 90},
		//	{ label: "Series4",  data: 70},
		//	{ label: "Series5",  data: 80},
		//	{ label: "Series6",  data: 110}
		//];

		//var data = [
		//	{ label: "Series1",  data: [[1,10]]},
		//	{ label: "Series2",  data: [[1,30]]},
		//	{ label: "Series3",  data: [[1,90]]},
		//	{ label: "Series4",  data: [[1,70]]},
		//	{ label: "Series5",  data: [[1,80]]},
		//	{ label: "Series6",  data: [[1,0]]}
		//];

		//var data = [
		//	{ label: "Series A",  data: 0.2063},
		//	{ label: "Series B",  data: 38888}
		//];

		// Randomly Generated Data

		var data = [],
			series = Math.floor(Math.random() * 6) + 3;

		for (var i = 0; i < series; i++) {
			data[i] = {
				label: "Series" + (i + 1),
				data: Math.floor(Math.random() * 100) + 1
			}
		}

		var placeholder = $(""+pieGraphName+"");

		

			placeholder.unbind();

			$("#title").text("Default pie chart");
			$("#description").text("The default pie chart with no options set.");

			$.plot(placeholder, data, {
				series: {
					pie: { 
						show: true
					}
				}
			});

			setCode([
				"$.plot('"+pieGraphName+"', data, {",
				"    series: {",
				"        pie: {",
				"            show: true",
				"        }",
				"    }",
				"});"
			]);	
			//alert("call function");
	};
	

	function labelFormatter(label, series) {
		return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
	}

	function setCode(lines) {
		$("#code").text(lines.join("\n"));
	}
	
	/*start chart float*/
	
	
	/* start call kpi */
	$("a[href='#hr-hr']").click(function(){
		
		$.ajax({
			url:"../View/hr-hr.html",
			type:"get",
			dataType:"html",
			sync:false,
			success:function(data){
				$("#hr-hr").html(data);
				pieChart("#pieGraph1");
				pieChart("#pieGraph2");
				pieChart("#pieGraph3");
				pieChart("#pieGraph4");
				pieChart("#pieGraph5");
				pieChart("#pieGraph6");
			}
		});
		
	});
	$("a[href='#hr-hr']").click();
	
	$("a[href='#hr-npr']").click(function(){
		$.ajax({
			url:"../View/hr-npr.html",
			type:"get",
			sync:false,
			dataType:"html",
			success:function(data){
				$("#hr-npr").html(data);
				pieChart("#pieHrNprGraph1");
				pieChart("#pieHrNprGraph2");
				pieChart("#pieHrNprGraph3");
				update();
			}
		});
		
	});
	/* start call kpi */
	
	
});