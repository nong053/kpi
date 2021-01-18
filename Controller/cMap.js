var map = function(mapId,data,option){
	var scaleObj=eval("("+option['scale']+")");
	var mapData="";
	mapData+="{";
	$.each(data,function(index,indexEntry){
		if(index==0){
		mapData+="\""+indexEntry[0]+"\":"+indexEntry[1]+"";
		}else{
		mapData+=",\""+indexEntry[0]+"\":"+indexEntry[1]+"";	
		}
	});
	mapData+="}";
	
	var mapDataObj=eval("("+mapData+")");
	
	/*
		var mapData = {
				  "TH-XNE": 16.63,//North East
				  "TH-XN": 11.58,//North
				  "TH-XC": 158.97,//Central
				  "TH-XS": 100//south
				 
				};
	*/
		$("#"+mapId).vectorMap({
			  map:option['mapType'],
			  backgroundColor: "transparent",
			  series: {
			    regions: [{
			      values: mapDataObj,
			      scale: scaleObj,
			      normalizeFunction: 'polynomial'
			    }]
			  },
			  onRegionLabelShow: function(e, el, code){
			    el.html(el.html()+' (value - '+mapDataObj[code]+')');
			  },
			  regionStyle: {
					initial: {fill: option['initial']},
					selected: {fill: option['selected']}
				},
			});
		$(".jvectormap-label").css({"background":option['theme'][0],"color":option['tooltipTextColor'],"opacity":"1"});
		 
	

};