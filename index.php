<? session_start();
error_reporting (E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html>
<head>
    <title>ลงชื่อเข้าใช้งาน</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Styles -->
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="Css/bootstrap-overrides.css" rel="stylesheet">
    

    <link rel="stylesheet" type="text/css" href="Css/lib/animate.css" media="screen, projection">
    <link rel="stylesheet" href="Css/sign-up.css" type="text/css" media="screen" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Css/font-awesome/css/font-awesome.min.css">
    <link href="favicon/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
    @import url(./Css/fonts/thsarabunnew.css);

    body{

    font-family: 'THSarabunNew', sans-serif; 

    }

   
    #sign_up2 .signin_box .box .form input[type="password"] {
    border-radius: 3px;
    color: black;
    font-size: 16px;
    height: 27px;
    margin-bottom: 16px;
    width: 96%;
}

    .submit{

    background: #333867 none repeat scroll 0 0;
    border: 0 none;
    border-radius: 3px;
    color: #fff;
    font-size: 15px;
    padding: 8px 18px;
    text-transform: uppercase;
    transition: background 0.2s linear 0s, box-shadow 0.2s linear 0s;
    }
    #sign_up2{
    /* background: url('./img/backgrounds/ocean.jpg') no-repeat; */
    display: block;
    height: 540px;
    color:white;
    /* margin-bottom: 90px;
    margin-top: -35px; */
    }
    #sign_up2 .left_box {
    color: white;
    }
    #sign_up2 .left_box .perk_box .perk {
    color: white;
    }

    #sign_up2 .left_box .perk_box .perk p strong {
    color: aliceblue;
    }
    body {
    overflow-x: hidden;
    /* color: rgba(244,244,245,.9); */
    background: radial-gradient(farthest-side ellipse at 10% 0,#333867 20%,#17193b);
    background-attachment: fixed;
    background-size: cover;
    background-repeat: no-repeat;
    }
    .font-white{
        color:white;
    }

    </style>
    
</head>
<body>



    <div id="sign_up2">
        <div class="container">
        
            <div class="row login" style='margin-top: 10%'>
                <div class="span6 left_box">
                    <h4>เข้าสู่ระบบประเมินบุคคล<br>
                   
                </h4>

                    <div class="perk_box">
                     
                        <div class="perk">
                            
                            <p><strong><a style="color:white;" href="https://dashboardweb.com/index.php?page=contact">ติดต่อทีมงาน</a></strong> <br>เมื่อพบปัญหาการใช้งานโทร. 080-992-6565 <br>
                                อีเมลล์:nn.it@hotmail.com ,Line:nongnuyit<br>
                               
                            </p>
                            <p>
                                <a href="https://dashboardweb.com/pdf/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%83%E0%B8%8A%E0%B9%89%E0%B8%87%E0%B8%B2%E0%B8%99%20KPI-BSC.pdf">ดาวน์โหลดคู่มือการใช้งาน <i style="color:white;" class="fa fa-cloud-download" aria-hidden="true"></i></a>
                            </p>
                        </div>
                    </div>

                    
                </div>

                <div class="span6 signin_box">
                    <div class="box">
                        <div class="box_cont">
                            <div class="social">
                               
                               <i class="fa fa-lock" style="font-size: 120px; color:#333867;"></i>
                                <h3 style="color:#333867">
                                ลงชื่อเข้าใช้งานระบบประเมิน<br>KPI<i class='fa fa-angle-double-right'></i>BSC
                                </h3>
                                <font  style='color:red;' >
                                <?=$_SESSION['activated_message'];?>
                                </font>
                                <br>
                                <font id='warning' style='display: none; color:red;' >username หรือ password ไม่ถูกต้อง</font>

                                <?php
                               
                                if(!empty($_SESSION['ERORRLOGIN'])){
                                    ?>
                                     <font  style='color:red;' >
                                     <?php
                                    echo $_SESSION['ERORRLOGIN'];
                                    ?>
                                     </font>
                                    <?
                                }
                                ?>
                            </div>

                            <div class="division">
                                <div class="line l"></div>
                                <span></span>
                                <div class="line r"></div>
                            </div>

                            <div class="form"  >
                                <form action="#" id='formSubmit' method="post">
                                    <input type="text" placeholder="ชื่อผู้ใช้งาน" id='user' name="user">
                                    <input type="password" placeholder="รหัสผ่าน" id='pass' name="pass">
                                    <input type="hidden" name="admin_id" id='admin_id' value=<?=$_SESSION['admin_id']?>>

                                   
                                        
                                        <span style="float: left; color:blue;">
                                        <a href="register.php">สร้างบัญชีผู้ใช้งาน</a>
                                        </span>
                                        <span style="float: right;">
                                            <input  type="button" class="submit" id='btnSubmit' value="เข้าสู่ระบบ">
                                        </span>
                                        
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   



<script src='kendoCommercial/js/jquery.min.js'></script>
<script>
    $(document).ready(function(){

        // var admin_id="<?=$_SESSION['admin_id']?>";
        // var admin_username="<?=$_SESSION['subDomain']?>";
        // if(admin_username=="" && admin_username==0){

        //     window.location = "admin_kpi";
        //     return false;
        // }

        
        $("#btnSubmit").click(function(){

            $.ajax({
                url:"login_token_process.php",
                type:"post",
                dataType:"json",
                data:{
                    "username":$("#user").val(),
                    "password":$("#pass").val()
                    // ,"admin_id":$("#admin_id").val()
                },
                success:function(data){
                   // console.log(data);
                    console.log(data.token);
                    
                    if(data.status=='200'){
                        $("#warning").hide();
                        sessionStorage.setItem('token', data.token); 
                        var formHtml="";
                        formHtml+="<form style=\"display: none;\" action=\"login_process.php\" id=\"formSubmit2\" method=\"post\">";
                        formHtml+="<input type=\"text\" placeholder=\"User name\" id=\"user\" name=\"user\" value="+data.user+">";
                        formHtml+="<input type=\"password\" placeholder=\"Password\" id=\"pass\" name=\"pass\" value="+data.pass+">";
                        // formHtml+="<input type=\"hidden\" name=\"admin_id\" id=\"admin_id\" value="+data.admin_id+">";
                        formHtml+="<input class='submit' type=\"submit\" id='btnSubmit2' value=\"sign up\">";
                        formHtml+="</form>";
                        $("body").append(formHtml);
                        $("#btnSubmit2").click();

                        }else if(data.status=='error'){

                                $("#warning").show();
                        }
                    
                  


                }
            })

            return false;
        });
    });

</script>
    
  