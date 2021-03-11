$(document).ready(function(){
	
	//start 
	$("a[href='#tab1']").click(function(){
		
		$.ajax({
			url:"../View/education-tab1.html",
			type:"get",
			dataType:"html",
			sync:false,
			success:function(data){
				$("#tab1").html(data);
				pieChart("#ePieChart2");
			}
		});
		
	});
	//end 
	//start 
	$("a[href='#tab2']").click(function(){
		
		$.ajax({
			url:"../View/education-tab2.html",
			type:"get",
			dataType:"html",
			sync:false,
			success:function(data){
				$("#tab2").html(data);
				
			}
		});
		
	});
	//end 
	//start 
	$("a[href='#tab3']").click(function(){
		
		$.ajax({
			url:"../View/education-tab3.html",
			type:"get",
			dataType:"html",
			sync:false,
			success:function(data){
				$("#tab3").html(data);
				
			}
		});
		
	});
	//end 
	//start 
	$("a[href='#tab4']").click(function(){
		
		$.ajax({
			url:"../View/education-tab4.html",
			type:"get",
			dataType:"html",
			sync:false,
			success:function(data){
				$("#tab4").html(data);
				
			}
		});
		
	});
	//end 
	//start 
	$("a[href='#tab5']").click(function(){
		
		$.ajax({
			url:"../View/education-tab5.html",
			type:"get",
			dataType:"html",
			sync:false,
			success:function(data){
				$("#tab5").html(data);
				
			}
		});
		
	});
	//end 
	//education-tab1.html
	$("a[href='#tab1']").click();
	
	
	
	
	/*start chart float*/
	var pieChart=function(pieGraphName){
		//alert(pieGraphName);

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
	
	
});