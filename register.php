<?php  session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>สร้างบัญชีเพื่อใช้งานระบบประเมินบุคคล</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="Css/bootstrap-overrides.css" rel="stylesheet">
	
	

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="Css/lib/animate.css" media="screen, projection">
    <link rel="stylesheet" href="Css/sign-up.css" type="text/css" media="screen" />
	<link href="favicon/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
	@import url(./Css/fonts/thsarabunnew.css);

	body{

	font-family: 'THSarabunNew', sans-serif; 

	}
    body {
    overflow-x: hidden;
    /* color: rgba(244,244,245,.9); */
    background: radial-gradient(farthest-side ellipse at 10% 0,#333867 20%,#17193b);
    background-attachment: fixed;
    background-size: cover;
    background-repeat: no-repeat;
	color: white;
    }
	.width100p{
		width: 100%;
	}

	#sign_up1 .footer input[type="text"], #sign_up1 .footer input[type="password"] {
    border-radius: 3px;
    font-size: 16px;
    height: 25px;
    margin: 0 10px 0px 0;
    color: black;
    width: 100%;
}
	.tex-label{
		padding:5px;
		padding-top: 15px;
		font-size: 15px;
	}

	#sign_up1 .dosnt a:hover {
    color: #ccc;
	}

	.medium-password{
		color:orange;
	}
			
	.strong-password{
		color:springgreen;
	}
	.weak-password{
		color:red;
	}


	</style>
	
	<script src="kendoCommercial/js/jquery.min.js"></script>
	<script>


			function check_character(ch){
				var len, digit;
				if(ch == " "){
					len=0;
				}else{
					len = ch.length;
				}
				for(var i=0 ; i<len ; i++)
				{
					digit = ch.charAt(i)
					if( (digit >= "a" && digit <= "z") || (digit >="0" && digit <="9") || (digit >="A" && digit <="Z") || (digit =="_")){
					;
					}else{
						return false;
					}
				}
				return true;
			}
		function isEmail(email) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);
		}
		function validatePhone(phone) {
			
			var regex = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
			return regex.test(phone);
		}	
		
		function checkPasswordStrength() {
			
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            if ($('#admin_password').val().length < 6) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('weak-password');
                $('#password-strength-status').html("ต้องมากกว่า 6 ตัวอักษร");
				return false;
            } else {
                if ($('#admin_password').val().match(number) && $('#admin_password').val().match(alphabets) && $('#admin_password').val().match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("ความปลอดภัยสูง");
					return true;
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html("ความปลอดภัยระดับกลาง");
					return true;
                }
            }
        }
			

	    	$(document).ready(function(){

	    		/*validate register*/
	    		
	    		/*
	    		 		<input type="text" name="admin_username" id="admin_username" placeholder="User">
                        <input type="text" name="admin_password" id="admin_password" placeholder="Pssword">
                        <input type="text" name="admin_confirm" id="admin_confirm" placeholder="Confirm password">
                        <input type="text" name="admin_name" id="admin_name" placeholder="First name">
                        <input type="text" name="admin_surname" id="admin_surname" placeholder="Last name">
                        <input type="text" name="admin_email" id="admin_email" placeholder="Email">
                        <input type="text" name="admin_tel" id="admin_tel" placeholder="Tel">
                        <input type="text" name="admin_age" id="admin_age" placeholder="Age">
                        <input type="text" name="calculate" id="calculate" placeholder="1+3=?">
	    		*/

				$("#admin_password").keyup(function(){
					
					checkPasswordStrength();
				});

	    		$("form#frmRegis").submit(function(){
	    			var check="";


					


					if(check_character($("#admin_username").val())==false){
						check+="*กรุณากรอกชื่อในการเข้าไช้งานเป็นภาษาอังกฤษหรือตัวเลข\n";
					}
	    			
	    			if($("#admin_username").val()==""){
	    				check+="*กรุณากรอกชื่อในการเข้าไช้งาน\n";
	    			}
					// if(checkPasswordStrengthFn($("#admin_password").val())){
						
					// }
	    			if($("#admin_password").val()==""){
	    				check+="*กรุณากรอกรหัสผ่าน\n";
	    			}
					if(checkPasswordStrength()==false){
						check+="*รหัสผ่านต้องมากกว่า 6 ตัวอักษร\n";
					}

	    			if($("#admin_confirm").val()==""){
	    				check+="*กรุณากรอกยืนยันรหัสผ่าน\n";
	    			}
					
					if($("#admin_company").val()==""){
	    				check+="*กรุณากรอกชื่อบริษัท/หน่วยงาน\n";
	    			}
	    			if($("#admin_name").val()==""){
	    				check+="*กรุณากรอกชื่อ\n";
	    			}
	    			if($("#admin_surname").val()==""){
	    				check+="*กรุณากรอกนามสกุล\n";
	    			}
	    			// if($("#admin_email").val()==""){
						
		
	    			// 	check+="*กรุณากรอกE-mail\n";
	    			// }
					if(isEmail($("#admin_email").val())==false){
							check+="*กรอกอีเมลล์ไม่ถูกต้อง\n";
					}

	    			// if($("#admin_tel").val()==""){
	    			// 	check+="*กรุณากรอกเบอร์โทรศัพท์\n";
	    			// }
					if(validatePhone($("#admin_tel").val())==false){
							check+="*กรอกเบอร์โทรศัพท์ไม่ถูกต้อง\n";
					}

	    			if($("#admin_password").val()!=$("#admin_confirm").val()){
	    				check+="*กรอกหัสยืนยันไม่ถูกต้อง\n";
	    			}
	    			
	    			
	    			if(check!=""){
	    				alert(check);
	    				return false;
	    			}else{
		    			
						$.ajax({
								url:"register_process.php",
								type:"post",
								dataType:"json",
								data:{"action":"add","admin_username":$("#admin_username").val(),"admin_password":$("#admin_password").val(),
									"admin_name":$("#admin_name").val(),"admin_surname":$("#admin_surname").val(),"admin_email":$("#admin_email").val(),
									"admin_tel":$("#admin_tel").val(),"admin_age":$("#admin_age").val(),"vercode":$("#vercode").val(),
									"action":"add","vercode1":$("#vercode1").val(),"admin_company":$("#admin_company").val()},
								success:function(data){
									//alert(data);
									if(data=="vercode-wrong"){
										alert("รหัส verify code ไม่ถูกต้องครับ ");
										
										
									}else if(data=="user-not-empty"){
										alert("ชื่อผู้ใช้นี้มีการใช้งานแล้ว");
										//location.reload(); 
									}else if(data.status=="200"){
										alert("สร้างบัญชีของท่านเรียบร้อย\nข้อมูลสำหรับการเข้าใช้งาน\nซื่อผู้ใช้งาน: "+$("#admin_username").val()+"\nรหัสผ่าน: "+$("#admin_password").val()+"\nหรือตรวจสอบข้อมูลการใช้งานที่อีเมลล์ทีท่านได้ลงทะเบียนไว้");
										
										$("#admin_username").val("");
						    			$("#admin_password").val("");
							    		$("#admin_name").val("");
								    	$("#admin_surname").val("");
						    			$("#admin_email").val("");
						    			$("#admin_tel").val("");
						    			$("#admin_age").val("");
						    			$("#admin_confirm").val("");
						    			$("#vercode1").val("");
						    			
						    			//window.location="admin/index.php";
						    			
						    			window.location=""+data.admin_username+"";
						    			
						    			
									}else{
										//location.reload(); 
										}
									
								}
							});
						return false;
		    			}
	    			
	    			
	    			});
	    	
	    		return false;
	    	
	    		/*validate register*/
		    });
	    </script>
</head>
<body>
    

    <!-- Sign In Option 1 -->
    <div id="sign_up1">
        <div class="container">
            <div class="row">
            
                <div class="span12 header">
                    <h4>สร้างบัญชีเพื่อใช้งานระบบประเมินบุคคล</h4>
                    <p>   
					URL สำหรับเข้าใช้งาน :: http://test.dashboardweb.com ติดปัญหาการใช้งาน โทร.0809926565
					</p>
						 
                   
                </div>

                <!--  
                
ชื่อ

นามสกุล

E-mail

Website

ชื่อเข้าใช้

รหัสผ่าน
                
                -->
<div class="footer">
	<form id="frmRegis" >           
		<div class="row">
			<div class="span4">
				<div class="tex-label"><font color="red">*</font> ชื่อผู้ใช้งาน</div>
				<div class="width100p">
					<input type="text"  name="admin_username" id="admin_username" placeholder="* ชื่อผู้ใช้(ภาษาอังกฤษเท่านั้น)">
				</div>
			</div>
			<div class="span4">
				<div class="tex-label"><font color="red">*</font> รหัสผ่าน <span id="password-strength-status"></span></div>
				<div>
					<input type="password" name="admin_password" id="admin_password" placeholder="* รหัสผ่าน">
				</div>
			</div>
			<div class="span4">
				<div class="tex-label"><font color="red">*</font> ยืนยันรหัสผ่าน</div>
				<div>
					<input type="password" name="admin_confirm" id="admin_confirm" placeholder="* ยืนยันรหัสผ่าน">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="span4">
				<div class="tex-label"><font color="red">*</font> ชื่อบริษัท/หน่วยงาน</div>
				<div class="width100p">
					<input type="text" name="admin_company" id="admin_company" placeholder="ชื่อบริษัท/หน่วยงาน">
				</div>
			</div>
			<div class="span4">
				<div class="tex-label"><font color="red">*</font> ชื่อ</div>
				<div>
					<input type="text" name="admin_name" id="admin_name" placeholder="* ชื่อ">
				</div>
			</div>
			<div class="span4">
				<div class="tex-label"><font color="red">*</font> นามสกุล</div>
				<div>
					<input type="text" name="admin_surname" id="admin_surname" placeholder="* นามสกุล">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="span4">
				<div class='tex-label'><font color="red">*</font> อีเมลล์</div>
				<div class="width100p">
					<input type="text" name="admin_email" id="admin_email" placeholder="* อีเมลล์">
				</div>
			</div>
			<div class="span4">
				<div class="tex-label"><font color="red">*</font> เบอร์โทร</div>
				<div>
				<input type="text" name="admin_tel" id="admin_tel" placeholder="* เบอร์โทร.">
				</div>
			</div>
			<div class="span4">
				<div class="tex-label">&nbsp;</div>
				<div>
					<div class="row">
						<div class="span1">
							
							<img src="captcha.php" style="height: 35px;">
						</div>
						<div class="span3">
							
							<input type="text"  name="vercode1" id="vercode1" placeholder="* กรอกรหัส"> 
						</div>
					</div>
				</div>
			</div>
			
			
		</div>


		<div class="span12" style="text-align: center; margin-top:35px;"><input type="submit" style="font-size:24px; padding:15px;"  value="สร้างบัญชี"></div>

                
						
                        
                        
						
                       
						
                        
                        
                        
                        
                        <!-- <input type="text" name="admin_age" id="admin_age" placeholder="อายุ"> -->
                       
                    </form>
                </div>

                <!-- <div class="span5 remember">
                    <label class="checkbox">
                        <input type="checkbox"> Remember me
                    </label>
                    <a href="#">Forgot password?</a>
                </div> -->
				
                <div class="span12 dosnt">
				<br style="clear:both">
                    <span>มีบัญชีอยู่แล้ว?</span>
                    <a href="index.php">เข้าสู่ระบบ</a>
                </div>

			
					
				<br style="clear:both">

				<div class="container" style="margin-top:25px;">
				<h4 style="color:white; margin-top:15px;">ราคาแพคเกจ</h4>
					<div class="row" style="color:white;">
						<div class='col-md-12' >
						<table class="table" style="font-size: 16px;">
							<thead>
							<tr>
								<th>แพคเกจ</th>
								<th>พนักงาน</th>
								<th>ราคา/เดือน</th>
								<th>ราคา/ปี</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>แพ็กเกจ E</td>
								<td>5 คน</td>
								<td><font color="red">ฟรี</font>/เดือน</td>
								<td><font color="red">ฟรี</font>/ปี</td>
							</tr>
							<tr>
								<td>แพ็กเกจ D</td>
								<td>10 คน</td>
								<td>275/เดือน</td>
								<td>2,750/ปี</td>
							</tr>
							
							<tr>
								<td>แพ็กเกจ C</td>
								<td>15 คน</td>
								<td>385/เดือน</td>
								<td>3,850/ปี</td>
							</tr>
							<tr>
								<td>แพ็กเกจ B</td>
								<td>25 คน</td>
								<td>495/เดือน</td>
								<td>4,950/ปี</td>
							</tr>
							<tr>
								<td>แพ็กเกจ A</td>
								<td>50 คน</td>
								<td>935/เดือน</td>
								<td>9,350/ปี</td>
							</tr>
							</tbody>
						</table>
						</div>
					</div>
				</div>




				



            </div>
        </div>
    </div>



	




    
    
    
    
    
    
    
    
    
    
    