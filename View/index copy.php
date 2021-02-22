<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_GET['language']=='TH'){
	$_SESSION['language']="th";
}else if($_GET['language']=='EN'){
	$_SESSION['language']="en";
}else{
	$_SESSION['language']="th";
}
//echo $_GET['language'];
//echo $_SESSION['language'];

if($_SESSION['language']=="en"){
// Set Main Menu Start
//EN

$_SESSION['main_menul_l_kpiDashboard']="Kpi Dashboard";
$_SESSION['main_menul_l_threshold']="Threshold";
$_SESSION['main_menul_l_appraisalPeriod']="Appraisal Period";
$_SESSION['main_menul_l_department']="Department";
$_SESSION['main_menul_l_position']="Level";
$_SESSION['main_menul_l_employee']="Employee";
$_SESSION['main_menul_l_kpi']="KPI";
$_SESSION['main_menul_l_assign_master_kpi']="Assignment";
$_SESSION['main_menul_l_assign_kpi']="Evaluate(chief)";
$_SESSION['main_menul_l_assign_kpi_emp']="Evaluate(yourself)";
$_SESSION['main_menul_l_approve_kpi_result']="Approve Kpi Result";
$_SESSION['main_menul_l_appraisal_result']="Appraisal Result";


}else{
//TH
$_SESSION['main_menul_l_kpiDashboard']="แดชบอร์ด BSC";
$_SESSION['main_menul_l_threshold']="เกณฑ์การประเมิน";
$_SESSION['main_menul_l_appraisalPeriod']="ช่วงประเมิน";
$_SESSION['main_menul_l_department']="แผนก";
$_SESSION['main_menul_l_position']="ตำแหน่ง";
$_SESSION['main_menul_l_employee']="พนักงาน";
$_SESSION['main_menul_l_kpi']="ตัวชี้วัด";
$_SESSION['main_menul_l_assign_master_kpi']="มอบหมายตัวชี้วัด";
$_SESSION['main_menul_l_assign_kpi']="ประเมิน";
$_SESSION['main_menul_l_assign_kpi_emp']="พนักงานตประเมินเอง";
$_SESSION['main_menul_l_approve_kpi_result']="อนุมัติผลประเมิน";
$_SESSION['main_menul_l_appraisal_result']="ผลประเมิน";

}
// Sett Main Menu End

?>
<?php include_once '../config.inc.php';?>
<?php 



//if(($_SESSION['emp_id']=="") and ($_SESSION['admin_id']=="")){
if($_SESSION['login_status']!="1"){

	//header( "location: ../login.php?admin_name=".$_SESSION['admin_name']."" );
	//header( "location: ../login.php?admin_name=Demo.V1" );
	header( "location: ../".$_SESSION['admin_username']);

	exit(0);	
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
    <title>KPI (Key Performance Indicators)</title>
	
    <!-- Bootstrap core CSS -->
    <!--
    <link href="../bootstrap-3.0.2/css/bootstrap.css" rel="stylesheet">
    -->
     <link href="../bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet">
    

	
	 <!-- Custom styles for this template -->
	 
	 <link href="../Css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<!-- <script src="../kendoCommercial/js/jquery.min.js"></script> -->
	<script src="../js/jquery-2.1.1.js"></script>
    <script src="../bootstrap-3.0.2/js/bootstrap.min.js"></script>
    
    
	<!--mloading start-->
	<link href="../Css/jquery.mloading.css" rel="stylesheet" />
	<script type="text/javascript" src="../js/jquery.mloading.js"></script>
	<!--mloading end-->
	 <!-- full screen plugin start -->
	 <script type="text/javascript" src="../jquery-fullscreen/jquery.fullscreen-min.js"></script>
	 <!-- full screen plugin end -->

    <!--start kendo ui -->
    
    <link href="../kendoCommercial/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="../kendoCommercial/styles/kendo.default.min.css" rel="stylesheet" />
    <!--
    <script src="../kendoCommercial/js/angular.min.js"></script>
    -->
    <script src="../kendoCommercial/js/kendo.all.min.js"></script>
     <!-- easy pie chart start -->
 	<script src="../easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
	 <!-- easy pie chart end -->
	 
	 
	 <!-- load angular fame work start-->
	<script src="../js/angular.min.js"></script>
	<script src="../js/angular-route.js"></script>

    <script src="../Controller/main.js"></script>
    
	<!-- spark line start -->
	<script src="../sparkLine/jquery.sparkline.min.js"></script>
	<!-- spark line end -->
	
	<!-- start jqueryui -->
	<link rel="stylesheet" href="../jquery-ui/css/cupertino/jquery-ui-1.10.3.custom.min.css">
	<script src="../jquery-ui/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- end jqueryui -->
	
	<link rel="stylesheet" href="../Css/main.css">
	
    <!--  css customize -->
    <link href="../Css/executive.css" rel="stylesheet">
    <!--  css customize -->

	
<script>

  var withdrawEnlargeCom=function(thisParam){
	  
	$("#slideLeft").css({"width":"200px"});
	$(".sidebar-background").css({"width":"200px"});
	$("#mainContent").css({"margin-left":"201px"});

	$(thisParam).addClass("active");
	$(".menu-text").show();
	$(".boxTitle").css({"width":"200px"});
	$(".boxLeftTopSmall").hide();
	$(".boxLeftTopLarge").show();
	$(".subMenu").removeClass("submenuHover").css({"padding-left":"5px"});
	$("#slideLeft").show();
  };

  var withdrawEnlargeMobile=function(thisParam){
		$("#slideLeft").css({"width":"50px"});
		$(".sidebar-background").css({"width":"50px"});
		$("#mainContent").css({"margin-left":"51px"});
		$(thisParam).addClass("active");
		$(".menu-text").hide();
		$(".boxTitle").css({"width":"50px"});
		$(".boxLeftTopSmall").show();
		$(".boxLeftTopLarge").hide();
		$(".subMenu").removeClass("submenuHover").css({"padding-left":"5px"});
		$("#slideLeft").show();
   };
	  
  
var moblieFn = function(){
	 $(".topParameter .box1").css({
		    "width":"100%",
			"margin-top":"2px"
	   });
	   $(".topParameter .box2").css({
		    "width":"100%",
			"margin-top":"2px"
	   });
	   $(".topParameter .box3").css({
		    "width":"100%",
			"margin-top":"2px"
	   });
	   $(".topParameter .box4").css({
		    "width":"100%",
			"margin-top":"2px"
	   });

	   $(".topParameter .box5").css({
			 
			"margin-top":"5px"
			
	   });

	   $(".topParameter .box7").css({
		   	"width":"100%",
			"float": "left",
			"margin-top":"2px",
			"margin-left":"0px"
	   });

	   $(".topParameter .box8").css({
		   	"width":"100%",
			"float": "left",
			"margin-top":"2px",
			"margin-left":"0px",
	   });

	   $("select#appraisal_year").css({
		   	"width":"100%",
	   });

	   $("select#department_id").css({
		   	"width":"100%",
	   });

	   $("select#appraisal_period_id").css({
		   	"width":"100%",
	   });

	   $("#appraisalPeriodSubmit").css({

		   	"margin-bottom": "5px",
	   		"margin-top": "10px",
	    	"width": "100%"
	   }).removeClass("btn-sm");
	   withdrawEnlargeMobile();
	   $("#withdrawEnlarge").removeClass("active");
	   $(".topParameter").show();

		$("#appraisalPeriodSubmit").attr("href","#appraisalPeriodSubmit");
	   $('#appraisalPeriodSubmit').click(function(){
		    $('html, body').animate({
		        scrollTop: $( $(this).attr('href') ).offset().top
		    }, 500);
		    return false;
		});
		
	  // $("#slideLeft").show();
		//$("#withdrawEnlarge").click();
}
var computerFn = function(){
		//alert("computerFn");
	 	$(".topParameter .box1").css({
		    // "width":"120px",
			"margin-top":"10px",
			// "padding-left":"10px;",
			"float":"left"
	   });
	   $(".topParameter .box2").css({
		    "width":"160px",
			"margin-top":"2px",
			"float":"left"
	   });
	   $(".topParameter .box3").css({
		    "width":"140px",
			"margin-top":"10px",
			"float":"left"
	   });
	   $(".topParameter .box4").css({
		    "width":"90px",
			"margin-top":"2px",
			"float":"left"
	   });

	   $(".topParameter .box5").css({

			"margin-top":"1px",
			"width":"90px",
			"float": "left"
			
	   });

	   $(".topParameter .box7").css({
		   	// "width":"100px",
			"float": "left",
			"margin-top":"10px",
			"margin-left":"0px"
	   });

	   $(".topParameter .box8").css({
		   	"width":"150px",
			"float": "left",
			"margin-top":"2px",
			"margin-left":"0px"
	   });

	   $("select#appraisal_period_id").css({
		   	"width":"80px",
	   });

	   $("#appraisalPeriodSubmit").css({
		   	"width":"auto",
		 	"margin-bottom": "0px",
	   		"margin-top": "2px",
	   		
	   }).addClass("btn-sm");
	/*
	  withdrawEnlargeCom(this);
	  $(".topParameter").show();
	  $("#withdrawEnlarge").addClass("active");
	  $("#appraisalPeriodSubmit").attr("href","");
	  */
	 //  $("#slideLeft").show();
}
var widthWindow=$(window).width();
//alert(widthWindow);
$(window).resize(function(){
	
	var widthWindowPercentage= (parseFloat($(window).width())/parseFloat(widthWindow))*100;
	
	/*console.log(widthWindowPercentage+"%");*/
	/*widthWindowPercentage=(widthWindowPercentage);*/
	//console.log(widthWindowPercentage+"%");
	//$(".KpiPerspective").css({"min-width":(widthWindowPercentage+60)+"px"});
	if($(window).width() < 980){
		
		//$(".KpiPerspective").css({"min-width":"100px"});
	}
	 if($(window).width() > 980){
		//$(".KpiPerspective").css({"min-width":"160px"});
	}
});

//CHECK BROWSER FN
var checkBrowserFn=function(){
		
		if($(window).width()<980){
			   //alert($(window).width());
			   //console.log($(window).width()); 
			   /*
			   $("#slideLeft").hide();
			   $(".boxTitle").hide();
			   $(".sidebar-background").hide();
			   $("#mainContent").css({"margin-left":"0px"});
			   */
			  /*

			   $("#slideLeft").show();
			   $("#mainContent").css({"margin-left":"50px"});
			   $(".boxTitle").show();
			   $(".sidebar-background").show();
			   */
			   
			   moblieFn();

		   }else{
			   /*
			   $("#slideLeft").show();
			   $("#mainContent").css({"margin-left":"201px"});
			   $(".boxTitle").show();
			   $(".sidebar-background").show();
			   */
			   computerFn();
		   }
	};

	
    $(document).ready(function(){

    $(".topParameter").hide();
	checkBrowserFn();
	setTimeout(function(){
		$("#kpiDashboard").click();
		$("#appraisalPeriodSubmit").click();
	});
	
   	$(window).resize(function(){
   		//checkBrowserFn();
   		//$("#appraisalPeriodSubmit").click();
	   
   	});

   	$("#kpiDashboard").click(function(){
   		checkBrowserFn();
   	});
   	
});//document ready
   </script>

   <style type="text/css">
   	.btn{
   		 /* padding: 3px 12px; */

   	}
   	.glyphicon{
   		left: 0px;
	    top: 3px;
   	}
   	td, th {
	    padding: 2px;
	}
	.alert{
		margin-bottom: 5px;
	}
	.dropdown-menu > li > a{
		border-bottom: 0.5px solid #cccc;
	}

   </style>
  
  </head>

  <body ng-app="myApp" >

    <div class="navbar navbar-blue navbar-fixed-top shadow-sm" role="navigation">
      <div class="container">
        <div class="navbar-header" style="margin-top:5px;">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <a style='height: 0px;' class="navbar-brand" href="#" > 
		  <!-- <span class="iconMenu glyphicon glyphicon-dashboard" style="font-size:30px;"></span> -->
		   โปรแกรมประเมินผลปฎิบัติงานโดยตัวชี้วัด (Key Performance Indicators)</a>
        </div>
        
        <div class="collapse navbar-collapse">
       	
          
          <ul class="nav navbar-nav navbar-right" style='margin-top:10px'>
          
           
           
            <li class="dropdown">
			<a class="dropdown-toggle" href="#" data-toggle="dropdown">
					
					<?php 
					// GET EMPLOYEE FOR DISPLAY HERE..
					if($_SESSION[emp_ses_id]!=""){
					$strSQLEmp="select e.*,pe.*,d.* from employee  e
								inner join  position_emp pe 
								on e.position_id=pe.position_id
								inner join  department d 
								on d.department_id=e.department_id
								where emp_id=$_SESSION[emp_ses_id]";

					$resultEmp=mysql_query($strSQLEmp);
					$rsEmp=mysql_fetch_array($resultEmp);
						//echo $rsEmp['emp_picture_thum'];
					$role="emp";
					?>
					<img src="<?=$rsEmp['emp_picture_thum']?>" width="45" class="img-circle">

					<strong><?=$rsEmp['emp_first_name']?> <?=$rsEmp['emp_last_name']?></strong>
					<input type="hidden" name="emp_id" id="emp_id"  value="<?=$rsEmp['emp_id']?>">
					<input type="hidden" name="emp_first_name" id="emp_first_name"  value="<?=$rsEmp['emp_first_name']?>">
					<input type="hidden" name="emp_last_name" id="emp_last_name"  value="<?=$rsEmp['emp_last_name']?>">
					<input type="hidden" name="emp_department" id="emp_department"  value="<?=$rsEmp['department_name']?>">
					<input type="hidden" name="emp_position" id="emp_position"  value="<?=$rsEmp['position_name']?>">
					<input type="hidden" name="emp_image" id="emp_image"  value="<?=$rsEmp['emp_picture_thum']?>">
					
						
					<?php
					}else if($_SESSION[admin_id]!=""){
						$strSQLEmp="select * from admin where admin_id=$_SESSION[admin_id]";
						$resultEmp=mysql_query($strSQLEmp);
						$rsEmp=mysql_fetch_array($resultEmp);
						$role="admin";
						
						//echo $rsEmp['emp_picture_thum'];
						?>
						
						<strong>
						<button class="boxC btn btn-info btn-circle " style="margin-top:0px; padding:0px;">
							<i class="glyphicon  glyphicon-user"></i>
						</button>
						Admin
						(<?=$rsEmp['admin_id']?>) || </strong> <?=$rsEmp['admin_name']?> &nbsp;&nbsp; <?=$rsEmp['admin_surname']?>
					<?php
					}
					?>
					
			
			<span class="caret"></span>

			</a>
				<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
					
					

					<li>
					<?php
					
					if($_SESSION['admin_status']==1 or $_SESSION['admin_status']==3){
						?>
							<a href='../admin' id='profile' class=''><i class='glyphicon glyphicon-cog'></i> Control Panel</a>
						<?
					}
					?>
						<a href='?language=EN' id='EnLanguage' class=''>
							<?php
							if($_SESSION['language']=='en'){
								?>
								<i style="color: blue;" class='glyphicon glyphicon-globe'></i> EN</a>
								<?
							}else{
								?>
								<i class='glyphicon glyphicon-globe'></i> EN</a>
								<?
							}
							?>
							
						<a href='?language=TH' id='thLanguage' class=''>
							<?php
							if($_SESSION['language']=='th'){
								?>
								<i style="color: blue;" class='glyphicon glyphicon-globe'></i> ไทย</a>
								<?
							}else{
								?>
								<i class='glyphicon glyphicon-globe'></i> ไทย</a>
								<?
							}
							?>

							
						<a href='#' id='logout' class=''><i style="color: red;" class="glyphicon glyphicon-off"></i> Logout</a>

						<form method="post" action="../logout.php" style='display: none;' id='formLogout'>
							<input type='hidden' id='admin_username' name='admin_username' value='<?php echo $_SESSION[admin_username]?>'>
							<input type='hidden' id='unset_session' name='unset_session' value='loguout'>
							<input type='submit' id='btnLogoutSumit' name='btnLogoutSumit'>
						</form>
						<!--
						<a href="../logout.php?role=<?=$role?>&superUser=<?=$_SESSION[admin_id]?>">
							<i class="icon-off"></i>
							Logout
						</a>
						-->
					</li>
				</ul>
			</li>
			
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    <div class="sidebar-background">
		<div class="primary-sidebar-background"></div>
	</div>
	<div id="slideLeft">
	
			<div class="list-group listGroupTop">
				
					<ul class="nav nav-list">
						<?php
						
				  		if(($_SESSION['admin_status']==3) 
				  		or ($_SESSION['admin_status']==1 
						or ($_SESSION['emp_role_leve']=="Level1")
						)){
				  		?>
							
							
							<li  class="active mainMenu menuLevel1">
					  			<a  href="#" id="kpiDashboard" class=""><i class="iconMenu glyphicon glyphicon-dashboard"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_kpiDashboard']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		<li class="mainMenu menuLevel1">
					  			<a href="#" id="appraisalResult" class=""><i class="iconMenu glyphicon glyphicon-record"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_appraisal_result']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		
							<!-- <li class="mainMenu menuLevel1">
							  <a  href="#" id="threshold" class=" "><i class="iconMenu glyphicon glyphicon-th-large"></i> <span class="menu-text"> <?=$_SESSION['main_menul_l_threshold']?></span></a>
							</li> -->
							<li class="mainMenu menuLevel1">
					  			<a  href="#" id="appraisalPeriod" class=""><i class="iconMenu glyphicon glyphicon-time"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_appraisalPeriod']?></span></a>
					  			<b class="arrow"></b>
							</li>
							<li class="mainMenu menuLevel1">
								  <a href="#" id="perspective" 
								  
								  class=""><i class="iconMenu glyphicon glyphicon glyphicon-fire"></i>  <span class="menu-text"> มุมมองธุรกิจ</span></a>
					  			<b class="arrow"></b>
							</li>
							
							
							<li class="mainMenu menuLevel1"> 
					  			<a href="#" id="department" class=""><i class="iconMenu glyphicon glyphicon-road"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_department']?></span></a>
					 			<b class="arrow"></b>
					 		</li>
							
							<li class="mainMenu menuLevel1">
					  			<a href="#" id="position" class=""><i class="iconMenu glyphicon glyphicon glyphicon-fire"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_position']?></span></a>
					  			<b class="arrow"></b>
							</li>
							
							  
					 		
					  		<li class="mainMenu menuLevel1">
					  			<a href="#" id="employee" class=""><i class="iconMenu glyphicon glyphicon-user"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_employee']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		<li class="mainMenu menuLevel1 menuLevel2">
					 			 <a href="#" id="kpi" class=""><i class="iconMenu glyphicon glyphicon-signal"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_kpi']?></span></a>
					 		 	<b class="arrow"></b>
					 		 </li>
					 		 <li class="mainMenu menuLevel1 menuLevel2">
					  			<a href="#" id="assignMasterKPI" class=""><i class="iconMenu glyphicon glyphicon-indent-left"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_master_kpi']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		
					 		
					  		<li class="mainMenu menuLevel1 menuLevel2">
					  			<a href="#" id="assignKPI" class=""><i class="iconMenu glyphicon glyphicon-list-alt"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_kpi']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		<!-- 
					  		<li class="mainMenu menuLevel1 menuLevel2">
					  			<a href="#" id="myEvaluate" class=""><i class="iconMenu glyphicon glyphicon-list-alt"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_kpi_emp']?></span></a>
					  			<b class="arrow"></b>
					  		</li> -->
					  		
					  		
					  		<li class="mainMenu menuLevel1">
					  			<a href="#" id="approveKpiResult" class=""><i class="iconMenu glyphicon glyphicon-edit"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_approve_kpi_result']?></span></a>
					  			<b class="arrow"></b>
					  		</li>


					  		
				  		<?
						}else if($_SESSION['emp_role_leve']=="Level2"){//chief
						?>

							<li class="active mainMenu menuLevel1">
					  			<a  href="#" id="kpiDashboard" class=""><i class="iconMenu glyphicon glyphicon-dashboard"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_kpiDashboard']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		<!-- 
							<li class="#mainMenu menuLevel1" style="background: #dddddd;">
							  <a style="background: #dddddd; cursor: default;";  href="#" id="#threshold" class=" "><i class="iconMenu glyphicon glyphicon-th-large"></i> <span class="menu-text"> <?=$_SESSION['main_menul_l_threshold']?></span></a>
							</li>
							<li class="#mainMenu menuLevel1">
					  			<a  style="background: #dddddd; cursor: default;" href="#" id="#appraisalPeriod" class=""><i class="iconMenu glyphicon glyphicon-time"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_appraisalPeriod']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
							<li class="#mainMenu menuLevel1"> 
					  			<a style="background: #dddddd; cursor: default;" href="#" id="#department" class=""><i class="iconMenu glyphicon glyphicon-road"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_department']?></span></a>
					 			<b class="arrow"></b>
					 		</li>
					 		
					 		<li class="#mainMenu menuLevel1">
					  			<a style="background: #dddddd; cursor: default;" href="#" id="#position" class=""><i class="iconMenu glyphicon glyphicon glyphicon-fire"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_position']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		 -->
					  		<!-- <li class="mainMenu menuLevel1">
					  			<a href="#" id="employee" class=""><i class="iconMenu glyphicon glyphicon-user"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_employee']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		<li class="mainMenu menuLevel1 menuLevel2">
					 			 <a href="#" id="kpi" class=""><i class="iconMenu glyphicon glyphicon-signal"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_kpi']?></span></a>
					 		 	<b class="arrow"></b>
					 		 </li>
					 		 <li class="mainMenu menuLevel1 menuLevel2">
					  			<a href="#" id="assignMasterKPI" class=""><i class="iconMenu glyphicon glyphicon-indent-left"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_master_kpi']?></span></a>
					  			<b class="arrow"></b>
					  		</li> -->
					  		
					 		
					  		<li class="mainMenu menuLevel1 menuLevel2">
					  			<a href="#" id="assignKPI" class=""><i class="iconMenu glyphicon glyphicon-list-alt"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_kpi']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		
					  		
					  		<!-- <li class="#mainMenu menuLevel1">
					  			<a style="background: #dddddd; cursor: default;" href="#" id="#approveKpiResult" class=""><i class="iconMenu glyphicon glyphicon-edit"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_approve_kpi_result']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		 -->
						
						<?

						}else if($_SESSION['emp_role_leve']=="Level3"){//emp
						?>
				  		
							<li class=" mainMenu menuLevel1">
					  			<a  href="#" id="kpiDashboardEmp" class=""><i class="iconMenu glyphicon glyphicon-dashboard"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_kpiDashboard']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		<li class="mainMenu menuLevel1 menuLevel2">
					  			<a href="#" id="myEvaluate" class=""><i class="iconMenu glyphicon glyphicon-list-alt"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_kpi_emp']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		<!-- 
					  		
							<li class="#mainMenu menuLevel1" style="background: #dddddd;">
							  <a style="background: #dddddd; cursor: default;";  href="#" id="#threshold" class=" "><i class="iconMenu glyphicon glyphicon-th-large"></i> <span class="menu-text"> <?=$_SESSION['main_menul_l_threshold']?></span></a>
							</li>
							<li class="#mainMenu menuLevel1">
					  			<a  style="background: #dddddd; cursor: default;" href="#" id="#appraisalPeriod" class=""><i class="iconMenu glyphicon glyphicon-time"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_appraisalPeriod']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
							<li class="#mainMenu menuLevel1"> 
					  			<a style="background: #dddddd; cursor: default;" href="#" id="#department" class=""><i class="iconMenu glyphicon glyphicon-road"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_department']?></span></a>
					 			<b class="arrow"></b>
					 		</li>
					 		
					 		<li class="#mainMenu menuLevel1">
					  			<a style="background: #dddddd; cursor: default;" href="#" id="#position" class=""><i class="iconMenu glyphicon glyphicon glyphicon-fire"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_position']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		<li class="#mainMenu menuLevel1">
					  			<a  style="background: #dddddd; cursor: default;"  href="#" id="#employee" class=""><i class="iconMenu glyphicon glyphicon-user"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_employee']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		<li class="#mainMenu menuLevel1 menuLevel2">
					 			 <a style="background: #dddddd; cursor: default;"  href="#" id="#kpi" class=""><i class="iconMenu glyphicon glyphicon-signal"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_kpi']?></span></a>
					 		 	<b class="arrow"></b>
					 		 </li>
					 		 <li class="#mainMenu menuLevel1 menuLevel2">
					  			<a style="background: #dddddd; cursor: default;"  href="#" id="#assignMasterKPI" class=""><i class="iconMenu glyphicon glyphicon-indent-left"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_master_kpi']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		
					  		<li class="#mainMenu menuLevel1 menuLevel2">
					  			<a style="background: #dddddd;cursor: default;"  href="#" id="#assignKPI" class=""><i class="iconMenu glyphicon glyphicon-list-alt"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_kpi']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		
					  		
					  		<li class="#mainMenu menuLevel1">
					  			<a style="background: #dddddd; cursor: default;"  style="background: #dddddd" href="#" id="#approveKpiResult" class=""><i class="iconMenu glyphicon glyphicon-edit"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_approve_kpi_result']?></span></a>
					  			<b class="arrow"></b>
					  		</li> -->

				  		<?
				  		}
				  		?>
				  		
					
				</ul>
				 
				


		 </div>
	</div>
	<div class="titleTab">
		
		<div class="boxTitle">
			<div class="boxLeft" style="margin-left: 7px;">
				
				<div class="boxLeftTopLarge">
					<?
					//echo $_SESSION['admin_status'];
					if($_SESSION['admin_status']!="1" and $_SESSION['admin_status']!="3"){

					?>
					<button class="boxC btn btn-success connect-database">
						<i class=" glyphicon glyphicon-tasks"></i>
					</button>
					<button class="boxC btn btn-info connect-admin">
						<i class="glyphicon  glyphicon-user"></i>
					</button>
					<button class="boxC btn btn-warning connect-message">
						<i class="glyphicon glyphicon-pencil"></i>
					</button>
					<button class="boxC btn btn-danger connect-mission">
						<i class="glyphicon glyphicon glyphicon-save"></i>
					</button>
					<?
					}else{
					?>

					<a href="#"  class="boxC btn btn-success ">
						<i class=" glyphicon glyphicon-tasks"></i>
					</a>
					<a href="../admin/index.php?page=admin"  class="boxC btn btn-info ">
						<i class="glyphicon  glyphicon-user"></i>
					</a>
					<a href="#"  class="boxC btn btn-warning ">
						<i class="glyphicon glyphicon-pencil"></i>
					</a>
					<a href="../admin/index.php?page=clearData"  class="boxC btn btn-danger ">
						<i class="glyphicon glyphicon glyphicon-save"></i>
					</a>

					<?
					}
					?>
				</div>
				 
				<div class="boxLeftTopSmall">
					<span class="boxSmall colorGreen"></span>
					<span class="boxSmall colorBlue"></span>
					<span class="boxSmall colorOrange"></span>
					<span class="boxSmall colorRed"></span>
				</div>
			
				 
			</div>
		</div>
		
		<div class="boxTitleN">
		<div id="subjectPage" ></div>
		 
		</div>
		
		<!--  form search,button fullscreen start -->
		<div class="boxTopRight" style="float:right; margin-right:10px;">
				<!--
				<div class="withdraw-Enlarge" style="display:inline; float:right ; position:relative; magin-right:200px;margin-left: 2px;">
					<button id="withdrawEnlarge" class="glyphicon glyphicon-align-justify  btn btn-default" style="width:auto;height:30px; font-weight:normal;"></button>
				</div>
				
				<div class="boxTitleR" style=" float:right; margin-right:2px">
					<div class="formSearch" ></div>
				</div>
				-->
			<!--  form search,button fullscreen end -->
			
			<!-- button full screen start -->
			<div class="fullScreen" style="display:inline; float:right ; position:relative; magin-right:5px">
				<button class=" glyphicon glyphicon-fullscreen btn btn-default" id="btnFullScreen" style="width:auto;height:30px;"></button>
			</div>
			<!-- button full screen end -->
			
		</div>
		<!--  form search,button fullscreen end -->
		
		
	</div>
	<div class="container">
		
		<div id="mainContent">
			
		</div>
	</div>

	<input type='hidden' id='embed_admin_username' name='embed_admin_username' value='<?=$_SESSION['admin_username']?>'>

	<input type='hidden' id='embed_emp_role_leve' name='embed_emp_role_leve' value='<?=$_SESSION['emp_role_leve']?>'>

	<input type='hidden' id='embed_admin_id' name='embed_admin_id' value='<?=$_SESSION['admin_id']?>'>
	<input type='hidden' id='embed_admin_name' name='embed_admin_name' value='<?=$_SESSION['admin_name']?>'>
	<input type='hidden' id='embed_admin_surname' name='embed_admin_surname' value='<?=$_SESSION['admin_surname']?>'>
	<input type='hidden' id='embed_admin_status' name='embed_admin_status' value='<?=$_SESSION['admin_status']?>'>
	<input type='hidden' id='embed_package' name='embed_package' value='<?=$_SESSION['package']?>'>
	<input type='hidden' id='embed_user_amount' name='embed_user_amount' value='<?=$_SESSION['user_amount']?>'>
	<input type='hidden' id='embed_appraisal_amount' name='embed_appraisal_amount' value='<?=$_SESSION['appraisal_amount']?>'>
	<input type='hidden' id='embed_previous_amount' name='embed_previous_amount' value='<?=$_SESSION['previous_amount']?>'>
	<input type='hidden' id='embed_language' name='embed_language' value='<?=$_SESSION['language']?>'>

	<input type='hidden' id='embed_role_underling_position_id' name='embed_role_underling_position_id' value='<?=$_SESSION['role_underling_position_id']?>'>


	<input type='hidden' id='embed_role_executive_position_id' name='embed_role_executive_position_id' value='<?=$_SESSION['role_executive_position_id']?>'>
	

	 

  </body>
</html>


