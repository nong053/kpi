<? session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="Css/bootstrap-overrides.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Css/theme.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="Css/lib/animate.css" media="screen, projection">
    <link rel="stylesheet" href="Css/sign-up.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
    body {
		position: relative;
		background: #DDDCE2 url(../img/body_bg.jpg) repeat left top;
		-webkit-font-smoothing: antialiased;
		font-family: 'Lato', sans-serif !important;
		padding-top: 0px;
	}
	#sign_up2 .signin_box .box .form input[type="password"] {
    border-radius: 3px;
    color: black;
    font-size: 16px;
    height: 27px;
    margin-bottom: 16px;
    width: 96%;
}
	    </style>
</head>
<body>
    
    <div id="sign_up2">
        <div class="container">
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
            <div class="row login">
                <div class="span5 left_box">
                    <h4>เข้าสู่ระบบประเมินบุคคล(KPIs)</h4>

                    <div class="perk_box">
                        <div class="perk">
                            <span class="icos ico1"></span>
                            <p><strong>ลงชื่อเข้าใช้งาน</strong> ระบบประเมินบุคคล</p>
                        </div>
                        <div class="perk">
                            <span class="icos ico2"></span>
                            <p><strong>ปรับแต่งแก้ไข</strong> ท่านสามารถปรับแต่งเว็บไชต์ได้ตามต้องการโดยรองรับกับทุก Browser.</p>
                        </div>
                        <div class="perk">
                            <span class="icos ico3"></span>
                            <p><strong><a href="http://responsivewebthai.com/index-th.php?page=contact">ติดต่อทีมงาน</a></strong> เมื่อพบปัญหาการใช้งานที่ เบอร์โทร: 02-001-8629 มือถือ: 080-992-6565 อีเมลล์: nn.it@hotmail.com <br> </p>
                        </div>
                    </div>
                </div>

                <div class="span6 signin_box">
                    <div class="box">
                        <div class="box_cont">
                            <div class="social">
                               <img src="admin/images/adminloginhead.jpg">
                               <?php 
                               if ($_SESSION['ERORRLOGIN']==true){
                               	echo "<font color=\"#FF0000\">username หรือ password ไม่ถูกต้อง</font>";
                               }else{
                               	//echo "<font color=\"#FF0000\">username หรือ password ไม่ถูกต้อง</font>";
                               }
                               ?>
                               
                            </div>

                            <div class="division">
                                <div class="line l"></div>
                                <span></span>
                                <div class="line r"></div>
                            </div>

                            <div class="form" >
                                <form action="login_process.php" method="post">
                                    <input type="text" placeholder="User name" name="user">
                                    <input type="password" placeholder="Password" name="pass">
                                    <input type="hidden" name="admin_id" value=<?=$_SESSION['admin_id']?>>
                                    
                                   
                                    <input type="submit" value="sign up">
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
                                </form>
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    
  