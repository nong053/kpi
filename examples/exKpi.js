$(document).ready(function(){
   $("#selectGroupKpi").change(function(){
   
    if($(this).val()=="All"){
        $(".cate").show();
    }else if($(this).val()=="1"){
        $(".cate").hide();
        $(".cate-1").show();
    }else if($(this).val()=="2"){
        $(".cate").hide();
        $(".cate-2").show();
    }else if($(this).val()=="3"){
        $(".cate").hide();
        $(".cate-3").show();
    }else if($(this).val()=="4"){
        $(".cate").hide();
        $(".cate-4").show();
    }else if($(this).val()=="5"){
        $(".cate").hide();
        $(".cate-5").show();
    }else if($(this).val()=="6"){
        $(".cate").hide();
        $(".cate-6").show();
    }else if($(this).val()=="7"){
        $(".cate").hide();
        $(".cate-7").show();
    }
    
   });
});