var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};

var validateFn = function(){
    var message="";
   
    if($("#admin_username").val()==""){
       // alert($("#admin_username").val());
            message+="กรอกชื่อผู้ใช้งานด้วยครับ\n";
    }
    
    if($("#admin_change_pass_flag").val()=="Y"){	

        if($("#admin_password").val()!=$("#admin_re_password").val()){
            message+="กรอกรหัสผ่านไม่ตรง\n";
            
        }else if($("#admin_password").val()==""){
            message+="กรอกรหัสผ่านด้วยครับ\n";
        }else if($("#admin_re_password").val()==""){
            message+="กรอกยืนรหัสผ่านด้วยครับ\n";
        }

    }
    

 return message;	

    
}
jQuery(document).ready(function(){
    

    $("#admin_password").val("");
    $("#admin_re_password").val("");
    
    /*
    
    if(action=="edit"){

        jQuery("#expired_date").datepicker();
        jQuery("#expired_date").datepicker( "option", "dateFormat", "yy-mm-dd");
        jQuery("#expired_date").datepicker('setDate', '<?=$vExpired_date?>');
    }else{
        jQuery("#expired_date").datepicker();
        jQuery("#expired_date").datepicker( "option", "dateFormat", "yy-mm-dd");
    }
    */
var action = getUrlParameter('action');

if(action=="edit"){	
    
    
    $(".check_box_change_pass_area").show();
    $(".change_pass_area").hide();
    $("#admin_change_pass_flag").val("N");

    $("#admin_change_pass").click(function(){
        
        if($(this).prop("checked") == true){
            
            $(".change_pass_area").show();
            $("#admin_change_pass_flag").val("Y");
        }
        else if($(this).prop("checked") == false){
            
            $(".change_pass_area").hide();
            $("#admin_change_pass_flag").val("N");
        }
    });

}else{
   
    $(".change_pass_area").show();
    $(".check_box_change_pass_area").hide();
}

   
    
    $("form#frm-admin-form").submit(function( event ) {
        //validateFn();
        if(validateFn()!=""){
            alert(validateFn());
            return false;
        }else{
            $(this).submit();
        }

        event.preventDefault();        
    });
    
    
});