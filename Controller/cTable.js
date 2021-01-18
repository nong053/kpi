var table=function(tableId,data){
	//alert("Create Table");
	var htmlTable="";
	htmlTable+="<table id=\"table"+tableId+"\">";
	$.each(data,function(index,indexEntry){
		if(index==0){
			htmlTable+="<thead>";
			htmlTable+="<tr class=\"active\">";
			for(var i=0;i<indexEntry.length;i++){
				htmlTable+="<th><b>"+indexEntry[i]+"</b></th>";
				
			}
			htmlTable+="</tr>";
			htmlTable+="</thead>";
			htmlTable+="<tbody>";
			
		}else{
			
			htmlTable+="<tr>";
			for(var i=0;i<indexEntry.length;i++){
				htmlTable+="<td>"+indexEntry[i]+"</td>";
			}
			htmlTable+="</tr>";
			
		}

	});
	htmlTable+="</tbody>";
	htmlTable+="</table>";

	//console.log(data); 
	//alert(htmlTable);
	$("#"+tableId).html(htmlTable);
	$("#table"+tableId).kendoGrid();
};
	