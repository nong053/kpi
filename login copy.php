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
    
    <!-- <link rel="stylesheet" type="text/css" href="Css/theme.css"> -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'> -->

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
        <!--
            <div class="section_header">
                <h3>ลงชื่อเข้าใช้งาน  
                <?php //echo $rs['admin_name'];
                if($_GET['admin_name']!=""){
                    $_SESSION['admin_name']=$_GET['admin_name'];
                }else{
                    $_SESSION['admin_name']=$rs['admin_name'];
                }
                
                if($_SESSION['admin_name']){ 
                    echo "(".$_SESSION['admin_name'].")";
                } 
                ?>
                </h3>
            </div>
            -->
            <div class="row login" style='margin-top: 20px;'>
                <div class="span6 left_box">
                    <h4>เข้าสู่ระบบประเมินบุคคล<br>
                    <?php //echo $rs['admin_name'];
                        if($_GET['admin_name']!=""){
                            $_SESSION['admin_name']=$_GET['admin_name'];
                        }else{
                            $_SESSION['admin_name']=$rs['admin_name'];
                        }
                        
                        if($_SESSION['admin_name']){ 
                            echo "(".$_SESSION['admin_name'].")";
                        } 
                    ?>
                </h4>

                    <div class="perk_box">
                        <!--
                        <div class="perk">
                            <span class="icos ico1"></span>
                            <p><strong>ลงชื่อเข้าใช้งาน</strong> ระบบประเมินบุคคล</p>
                        </div>
                        <div class="perk">
                            <span class="icos ico2"></span>
                           <p><strong>เริ่มประเมิน</strong> ด้วยระบบประเมินผลที่ง่ายดายพร้อมตัวอย่าง KPI</p>
                        </div>
                        <div class="perk">
                            <span class="icos ico3"></span>
                            <p><strong><a href="http://responsivewebthai.com/index-th.php?page=contact">ติดต่อทีมงาน</a></strong> เมื่อพบปัญหาการใช้งานติดต่อที่ 080-992-6565 อีเมลล์: nn.it@hotmail.com <br> </p>
                        </div>
                        -->




                        <!-- <div class="perk">
                                <span class="icos ico1" style="height: 77px"></span>
                                <p><strong>ข้อมูลการใช้งาน</strong> <br>
                                <?php
                                    echo "วันที่สมัครใช้งาน:".$rs[register_date];
                                    echo "<br>";
                                    echo "วันที่ปัจจุบัน:".$c;
                                    echo "<br>";
                                

                                ?>
                            </p>
                        </div> -->
                        <div class="perk">
                            
                            <p><strong><a style="color:white;" href="http://responsivewebthai.com/index-th.php?page=contact">ติดต่อทีมงาน</a></strong> <br>เมื่อพบปัญหาการใช้งานโทร. 080-992-6565 <br>
                                อีเมลล์: nn.it@hotmail.com ,Line:nongnuyit
                            </p>
                        </div>
                    </div>

                    
                </div>

                <div class="span6 signin_box">
                    <div class="box">
                        <div class="box_cont">
                            <div class="social">
                               <!-- <img src="admin/images/adminloginhead.jpg"> -->
                               
                               <i class="fa fa-lock" style="font-size: 120px; color:#333867;"></i>
                                <h3 style="color:#333867">
                                ลงชื่อเข้าใช้งานระบบประเมินด้วย KPI<i class='fa fa-angle-double-right'></i>BSC
                                </h3>
                                <font  style='color:red;' >
                                <?=$_SESSION['activated_message'];?>
                                </font>
                                <br>
                                <font id='warning' style='display: none; color:red;' >username หรือ password ไม่ถูกต้อง</font>
                              
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

                                    <?
                           

                                    if($_SESSION['activated_trial']==0 && $_SESSION['activated']==0){
                                        ?>
                                        <input style="float: right;" disabled="disabled" type="button" class="submit" id='btnSubmit' value="เข้าสู่ระบบ">
                                        <?
                                    }else{
                                        ?>
                                        
                                        <span style="float: left; color:blue;">
                                        <a href="register.php">สร้างบัญชีผู้ใช้งาน</a>
                                        </span>
                                        <span style="float: right;">
                                            <input  type="button" class="submit" id='btnSubmit' value="เข้าสู่ระบบ">
                                        </span>
                                        <?
                                    }
                                    ?>
                                    
                                <!--
                                  <center>  <h2>Example Role</h2></center>
                                  <hr>
                                    <table>
                                        <tr>
                                            <td colspan="2"><b>CEO Position</b></td>
                                        </tr>
                                        <tr>
                                            <td >
                                            User Name: <font color="green"><b>ceo</b></font>
                                            </td>
                                            <td>
                                            Password: <font color="green"><b>ceo</b></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Chief Position</b></td>
                                        </tr>
                                        <tr>
                                            <td >
                                            User Name: <font color="green"><b>chief</b></font>
                                            </td>
                                            <td>
                                            Password: <font color="green"><b>chief</b></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Employee Position</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                            User Name: <font color="green"><b>emp99</b></font>
                                            </td>
                                            <td>
                                            Password: <font color="green"><b>emp99</b></font>
                                            </td>
                                        </tr>
                                    </table>
                                    -->
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   

<!--
// Save data to sessionStorage
sessionStorage.setItem('key', 'value');

// Get saved data from sessionStorage
var data = sessionStorage.getItem('key');

// Remove saved data from sessionStorage
sessionStorage.removeItem('key');

// Remove all saved data from sessionStorage
sessionStorage.clear();
-->
<script>
    


</script>
<script src='kendoCommercial/js/jquery.min.js'></script>
<!--<script src='Controller/mainJs.js'></script>-->
<script>
    $(document).ready(function(){
        var admin_id="<?=$_SESSION['admin_id']?>";
        var admin_username="<?=$_SESSION['subDomain']?>";



        if(admin_username=="" && admin_username==0){

            window.location = "admin_kpi";
            return false;
        }

        
        $("#btnSubmit").click(function(){

            $.ajax({
                url:"login_token_process.php",
                type:"post",
                dataType:"json",
                data:{
                    "username":$("#user").val(),
                    "password":$("#pass").val(),
                    "admin_id":$("#admin_id").val()
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
                        formHtml+="<input type=\"hidden\" name=\"admin_id\" id=\"admin_id\" value="+data.admin_id+">";
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
    
  