$(document).ready(function(){
	/* start call kpi */
	$("a[href='#performance']").click(function(){
		$.ajax({
			url:"../View/kpi1.html",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#performance").html(data);
			}
		});
	});
	$("a[href='#performance']").click();
	
	$("a[href='#averagePerformance']").click(function(){
		$.ajax({
			url:"../View/kpi2.html",
			type:"get",
			dataType:"html",
			success:function(data){
				$("#averagePerformance").html(data);
			}
		});
	});
	/* start call kpi */
});