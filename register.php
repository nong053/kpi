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
    body {
    overflow-x: hidden;
    /* color: rgba(244,244,245,.9); */
    background: radial-gradient(farthest-side ellipse at 10% 0,#333867 20%,#17193b);
    background-attachment: fixed;
    background-size: cover;
    background-repeat: no-repeat;
    }
	
	    </style>
	
	    <script src="kendoCommercial/js/jquery.min.js"></script>
	    <script>
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
	    		
	    		$("form#frmRegis").submit(function(){
	    			var check="";
	    			
	    			if($("#admin_username").val()==""){
	    				check+="*กรุณากรอกชื่อในการเข้าไช้งาน\n";
	    			}
	    			if($("#admin_password").val()==""){
	    				check+="*กรุณากรอกรหัสผ่าน\n";
	    			}
	    			if($("#admin_confirm").val()==""){
	    				check+="*กรุณากรอกหรัสผ่านซ้ำ\n";
	    			}
	    			if($("#admin_name").val()==""){
	    				check+="*กรุณากรอกชื่อ\n";
	    			}
	    			if($("#admin_surname").val()==""){
	    				check+="*กรุณากรอกนามสกุล\n";
	    			}
	    			if($("#admin_email").val()==""){
	    				check+="*กรุณากรอกE-mail\n";
	    			}
	    			if($("#admin_tel").val()==""){
	    				check+="*กรุณากรอกเบอร์โทร\n";
	    			}
	    			if($("#admin_password").val()!=$("#admin_confirm").val()){
	    				check+="*กรอกหัสยืนยันไม่ถูกต้องครับ\n";
	    			}
	    			
	    			
	    			if(check!=""){
	    				alert(check+"ด้วยครับ");
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
										alert("User name นี้มีการใช้งานแล้วครับ");
										//location.reload(); 
									}else if(data.status=="200"){
										alert("สร้างบัญชีของท่านเรียบร้อย");
										
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
					URL สำหรับเข้าใช้งาน :: http://kpi.dashboardweb.com
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
                


                <div class="span12 footer">
                    <form id="frmRegis" >
						<input type="text" name="admin_company" id="admin_company" placeholder="ชื่อบริษัทหรือชื่อระบบ">
                        <input type="text" name="admin_username" id="admin_username" placeholder="* ชื่อผู้ใช้(ภาษาอังกฤษเท่านั้น)">
                        <input type="password" name="admin_password" id="admin_password" placeholder="รหัสผ่าน">
                        <input type="password" name="admin_confirm" id="admin_confirm" placeholder="ยืนยันรหัสผ่าน">
                        <input type="text" name="admin_name" id="admin_name" placeholder="ชื่อ">
                        <input type="text" name="admin_surname" id="admin_surname" placeholder="นามสกุล">
                        <input type="text" name="admin_email" id="admin_email" placeholder="อีเมลล์">
                        <input type="text" name="admin_tel" id="admin_tel" placeholder="เบอร์โทร.">
                        <!-- <input type="text" name="admin_age" id="admin_age" placeholder="อายุ"> -->
                       	<img src="captcha.php">
                        <input type="text" style="width:80px;" name="vercode1" id="vercode1" placeholder="กรอกรหัส"> 
                        <input type="submit"  value="บันทึก">
                    </form>
                </div>

                <!-- <div class="span5 remember">
                    <label class="checkbox">
                        <input type="checkbox"> Remember me
                    </label>
                    <a href="#">Forgot password?</a>
                </div> -->
				
                <div class="span12 dosnt">
                    <span>มีบัญชีรายชื่ออยู่แล้ว?</span>
                    <a href="index.php">เข้าสู่ระบบ</a>
                </div>

			
					
			

				<div class="container" style="margin-top:25px;">
				<h4 style="color:white; margin-top:15px;">ราคาแพคเกจ</h4>
					<div class="row" style="color:white;">
						<div class='col-md-12' >
						<table class="table">
							<thead>
							<tr>
								<th>แพคเกจ</th>
								<th>จำนวนพนักงาน</th>
								<th>ราคา/เดือน</th>
								<th>ราคา/ปี</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>แพ็กเกจ E</td>
								<td>5 คน</td>
								<td>200/เดือน</td>
								<td>2,000/ปี</td>
							</tr>
							<tr>
								<td>แพ็กเกจ D</td>
								<td>10 คน</td>
								<td>250/เดือน</td>
								<td>2,500/ปี</td>
							</tr>
							
							<tr>
								<td>แพ็กเกจ C</td>
								<td>15 คน</td>
								<td>300/เดือน</td>
								<td>3,500/ปี</td>
							</tr>
							<tr>
								<td>แพ็กเกจ B</td>
								<td>25 คน</td>
								<td>400/เดือน</td>
								<td>4,000/ปี</td>
							</tr>
							<tr>
								<td>แพ็กเกจ A</td>
								<td>50 คน</td>
								<td>800/เดือน</td>
								<td>8,000/ปี</td>
							</tr>
							</tbody>
						</table>
						</div>
					</div>
				</div>




				



            </div>
        </div>
    </div>



	




    
    
    
    
    
    
    
    
    
    
    