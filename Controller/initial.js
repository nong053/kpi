var option = new Array();
var theme=["#007BC3", "#76B800", "#FFA500","#EF4C00","#A52A2A","#4682b4"];
 
function tooltipContentEditor(str, seriesIndex, pointIndex, plot) {
    // display series_label, x-axis_tick, y-axis value
    return plot.series[seriesIndex]["label"] + ", " + plot.data[seriesIndex][pointIndex];
}