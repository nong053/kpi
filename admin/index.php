<?php session_start();
require("../config.inc.php");
if(isset($_GET['logout'])){
	session_destroy();
	header("location:../index.php");
}
if(!$_SESSION['admin_name']){//กรณี check การloginของ admin
	header("location:../index.php"); 
}
?>

<?php 

if($_SESSION['login_status']!="1"){
	header( "location: ../".$_SESSION['admin_username']);
	exit(0);	
}
?>
<style>
	a{
		text-decoration: none;
		color:blue;
	}
</style>
<?php
/*##########ดึง oject มาใช้งาน Start*/
	function __autoload($filename){
		require_once "../oop/".$filename.".php";
		}
$obj_manage_data = new manage_data();

/*##########ดึง oject มาใช้งาน End*/
/*################## จัดาร session ผู้ใช้งาน Start*/
$admin_id=trim($_SESSION['admin_id']);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--
<link href="../admin/css.css" type="text/css" rel="stylesheet"/>
-->
<!--<script src="../kendoCommercial/js/jquery.min.js"></script>-->
<script src="../jquery-ui/js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="../jquery-ui/js/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>  -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666666;
}
body {
	background:#336699 url(images/bg.jpg) top left repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
p{
	padding-right:10px;
	padding-left:10px;
	margin:0px;
	line-height: 1.6em;
}
#header {
	width:940px;
	margin:auto;
}
#header-l {
	padding:38px 0px 37px 0px;
	font-size:24px;
	font-weight:bold;
	color:#FFFFFF;
	width:50%;
	float:left;
}
#header-r {
	color:#FFFFFF;
	text-align:right;
	padding:43px 0px 43px 0px;
	width:50%;
	float:left;
}
#header-r a {
	text-decoration:none;
	font-weight:bold;
	color:#1a4d80;
}
#header-r a:hover {
	color:#FFFFFF;
	text-decoration:underline;
}
#main {
	width:1000px;
	margin:auto;
	background:#FFFFFF;
	border:#013467 solid 5px;
	padding-bottom:30px;
}
#content-l {
	width:190px;
	float:left;
}
#box {
	margin:5px;
}
#box h2 {
	background:#e6ecf8;
	border-top:1px solid #c5d6e8;
	border-right:1px solid #c5d6e8;
	border-left:1px solid #c5d6e8;
	line-height:135%;
	padding:3px 0px 4px 10px;
	font-weight:bold;
	font-size:14px;
	color:#1a4d80;
	display:block;
	margin:0px;
}
#box #box-content {
	background:#e6ecf8;
	/*border-top:1px solid #dedbd1;*/
	border-right:1px solid #c5d6e8;
	border-left:1px solid #c5d6e8;
	padding-top:5px;
	height:100%;
}

/*นี้คือlINKที่ต้องการ */
#box ul {
	padding:0;
	margin:0px 10px 0px 10px;
	list-style:none;
}

#box ul li a {
	display:block;
	padding:5px 5px 5px 5px;
	text-decoration:none;
	color:#333;
}
#box ul li a:hover {
	/*color:#666;*/
	background:#c5d6e8;
}

/*นี้คือlINKที่ต้องการ */




#box p {
	display:block;
}

#box p a {
	text-decoration:none;
	color:#333;
	display:block;
	padding-top:3px;
	padding-bottom:3px;
	border-bottom:1px dotted #c5d6e8;
}
#box p a:hover {
	color:#666;
	text-decoration:underline;
}
#content-r {
	width:795px;
	float:left;
	/*-moz-border-radius:15px;
	-webkit-border-radius:15px;
	border:#999 2px solid; มุมโค้ง*/
}
#content-main {
	margin:5px;
	
}
#content-main h2 {
	font-size:14px;
	color:#1a4d80;
	display:block;
	margin:0px;
	padding-bottom:10px;
	color:#333;
}
.button { 
	width:auto; 
	border:1px solid #999; 
	background: #fff url(images/input.jpg) left bottom repeat-x;
	padding:3px;
}
.text {
	width:220px; 
	border:1px solid #dedede;
	padding:2px 5px;
	background: #fff url(images/input.jpg) left top repeat-x;
}
.page {
	text-decoration:none;
	padding:2px 5px 2px 5px;
	border:#333 solid 1px;
	color:#333;
	font-weight:normal;
}
.page2 {
	text-decoration:none;
	padding:2px 5px 2px 5px;
	color:#333;
}
</style>



<title>Back office</title></head>
<body>
<div id="header">
	<div id="header-l">
	  Back Office System</div>
	<div id="header-r">
		ยินดีต้อนรับ, <img src="images/details.gif" width="16" height="16" border="0" align="absbottom" /> <strong>
		<?php
		if($_SESSION['admin_name']){
		?>
		<?php echo $_SESSION['admin_name']?> <?php echo$_SESSION['admin_surname']?>
        <?php
		}else{
		?>
        <?php echo$_SESSION['member_name_upline']?>
        <?php
		}
		?>
        </strong> <img src="images/logout.gif" width="16" height="16" border="0" align="absbottom" /> <a href="index.php?logout">ออกจากระบบ</a>	</div>
	<br style="clear:both;" />
</div>
<br style="clear:both;" />
<div id="main">
<div id="content-l">
  <div id="box">
		<h2>เมนูหลัก</h2>
		<div id="box-content">
			<ul>
				<!--
				<li><a href="#"><img src="images/pic_small/Settings.png"  border="0" align="absbottom" /> เลือกรายการ</a></li>
				-->
           		<li><a href="index.php?page=admin"><img src="images/details.gif" width="16" height="16" border="0" align="absbottom" /> ผู้ดูแลระบบ</a></li>
           		 <!--
                <li><a href="index.php?page=setConnectDb"><img src="images/pic_small/Macristocracy.png" border="0" align="absbottom" /> Set Database</a></li>
               
      			<li><a href="index.php?page=setEmail"><img src="images/order.gif" width="16" height="16" border="0" align="absbottom" /> Set E-mail</a></li>
				-->
				<!-- <li><a href="index.php?page=setHomePage"><img src="images/clientarea.gif" border="0" align="absbottom" /> ตั้งค่า</a></li>-->
			
				<!--<li><a href="index.php?page=clearData"><img src="images/Photos.png" border="0" align="absbottom" /> Clear Data</a></li>-->
				<!--
				<li><a href="#" id="btnResetData"><img src="images/iFile.png" width="16" height="16" border="0" align="absbottom" /> Get KPI Example </a></li>
				-->

				<li><a href="../View/index.php"><img src="images/support.gif" width="16" height="16" border="0" align="absbottom" /> ระบบประเมินผล</a></li>

					
				
			</ul>
            <br style="clear:both" />
		</div>
		<div id="box-footer"></div>
	</div>
</div>
<div id="content-r">
	<div id="content-main">
	   <?php
		switch($_GET['page']){
			
			
			
			case 'setConnectDb':
				include("setConnectDb.php");
				break;
				
			case 'setHomePage':
				include("setHomePage.php");
				break;
				
			case 'setEmail':
				include("setEmail.php");
				break;
				
			case 'admin':
				include("admin.php");
				break;
				
			case 'clearData':
				include("clearData.php");
				break;
				
				
				
			default:
				include("admin.php");
				break;
				
		}	
	?>
    <br style="clear:both;" />
	</div>
	<br style="clear:both;" />
</div>
<div style="clear:both;" ></div>
</div>

</body>
</html>


<script>
//########################## Reset Data Start ##########################
     var resetDataFn=function(vCoppyForm,vCoppyTo,vTable){
    	 $.ajax({
	 			url:"../Model/mResetData.php",
	 			type:"post",
	 			dataType:"json",
	 			data:{"vCoppyForm":vCoppyForm,"vCoppyTo":vCoppyTo,"action":vTable},
	 			async:false,
	 			headers:{Authorization:"Bearer "+sessionStorage.getItem('token')},
	 			success:function(data){
	 				if(data=="success"){
	 					alert("Reset Table "+vTable+" is Successfully");
	 				}else{
	 					alert("Reset Table "+vTable+" is Fail");
	 				}
	 			}
	 		});
     }	
  	$(document).ready(function(){
  			var admin_id="<?=$admin_id?>";
  			

     $("#btnResetData").click(function(){
     
    	 var vCoppyForm='199';//id admin source is copy
    	 var vCoppyTo=admin_id; //id admindestination is copy
    	 resetDataFn(vCoppyForm,vCoppyTo,"threshold");
    	 resetDataFn(vCoppyForm,vCoppyTo,"appraisal_period");
    	 resetDataFn(vCoppyForm,vCoppyTo,"department");
    	 resetDataFn(vCoppyForm,vCoppyTo,"position_emp");
    	 resetDataFn(vCoppyForm,vCoppyTo,"employee");
    	 resetDataFn(vCoppyForm,vCoppyTo,"kpi");
    	 resetDataFn(vCoppyForm,vCoppyTo,"assign_kpi_master");
    	 resetDataFn(vCoppyForm,vCoppyTo,"assign_kpi");

    	 resetDataFn(vCoppyForm,vCoppyTo,"kpi_result");
    	 return false;
 		});
    });
     //########################## Reset Data End ############################
</script>
