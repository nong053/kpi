<? session_start(); ob_start();
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

if($_SESSION['session']==""){

	header( "location: ../".$_SESSION['admin_username']);
	exit(0);	
	
}

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
$_SESSION['main_menul_l_assign_kpi_emp']="ประเมินตนเอง";
$_SESSION['main_menul_l_approve_kpi_result']="อนุมัติผลประเมิน";
$_SESSION['main_menul_l_appraisal_result']="ผลประเมิน";

}
// Sett Main Menu End
?>
<?php include_once '../config.inc.php';?>
<?php 

//if(($_SESSION['emp_id']=="") and ($_SESSION['admin_id']=="")){
if($_SESSION['login_status']!="1"){

	
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
	 <!-- Font Awesome -->
	 <link rel="stylesheet" href="../Css/font-awesome/css/font-awesome.min.css">

	 <!-- Custom styles for this template -->
	 
	 <link href="../Css/starter-template.css" rel="stylesheet">

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

	 <!-- jquery confirm start -->
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	 <!-- jquery confirm end -->
	 
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
	<link href="../favicon/favicon.ico" rel="shortcut icon" type="image/x-icon" />

	

   <style type="text/css">
   	.btn{
   		 /* padding: 4px 12px; */
			

   	}
   	.glyphicon{
   		left: 0px;
	    top: 4px;
   	}
   	td, th {
	    padding: 2px;
	}
	.alert{
		margin-bottom: 5px;
	}
	.dropdown-menu > li > a{
		/* border-bottom: 0.5px solid #cccc; */
	}
	.img-circle {
    border:oldlace 2px solid;
	}

	.navbar-nav > li > .dropdown-menu{
		background: #428BCA;
		color:while;
		/* margin-top: 12px; */
		border-top: none;
	}

	.dropdown-menu > li > a {
		display: block;
		padding: 3px 20px;
		clear: both;
		font-weight: normal;
		line-height: 1.42857143;
		color: white;
		white-space: nowrap;
	}
	.dropdown-menu > li > a:hover{
		color:#ccc;
		font-weight: bold;
		background-color: #428BCA;
	}
	.bg-blue{
		background:#428BCA;
		color:white;
	}

   </style>
  
  </head>

  <body ng-app="myApp">

    <div class="navbar navbar-blue navbar-fixed-top shadow-sm" role="navigation">
      <div class="container">
        <div class="navbar-header" style="margin-top:5px;">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <a style='height: 0px; font-weight:bold;' class="navbar-brand" href="#" > 
		  <!-- <span class="iconMenu glyphicon glyphicon-dashboard" style="font-size:30px;"></span> -->
		   <?=$_SESSION['admin_company']?> 
		   <!-- KPI <i class="fa fa-angle-double-right"></i> BSC -->
		</a>
        </div>
        
        <div class="collapse navbar-collapse">
       	
		  <?php
		  if($_SESSION['admin_status']==3 or $_SESSION['admin_status']==1)
		  {
		  ?>
          <ul class="nav navbar-nav navbar-right" style='margin-top:10px'>
		  <?php
		  }else{
			?>
          <ul class="nav navbar-nav navbar-right" style='margin-top:3px'>
		  <?php
		  }
		  ?>
           
           
            <li class="dropdown" style="cursor: pointer;">
			<a class="dropdown-toggle" data-toggle="dropdown" style="background-color: #428BCA;">
					
					<?php 
					// GET EMPLOYEE FOR DISPLAY HERE..
					if($_SESSION[emp_ses_id]!=""){
					$strSQLEmp="select e.*,pe.*,d.*,r.role_name from employee  e
								inner join  position_emp pe 
								on e.position_id=pe.position_id
								inner join  department d 
								on d.department_id=e.department_id
								inner join  role r
								on r.role_id=e.role_id
								where emp_id=$_SESSION[emp_ses_id]";

					$resultEmp=mysql_query($strSQLEmp);
					$rsEmp=mysql_fetch_array($resultEmp);
						//echo $rsEmp['emp_picture_thum'];
					$role="emp";
					if($rsEmp['emp_picture_thum']==""){
						?>
						<img src="../View/uploads/avatar.jpg" width="45" class="img-circle" style="opacity: 0.1;">
						<?
					}else{
						?>
						<img src="<?=$rsEmp['emp_picture_thum']?>" width="45" class="img-circle">
						<?
					}
					?>

					

					<strong>
						<?=$rsEmp['emp_first_name']?> <?=$rsEmp['emp_last_name']?> <i class="fa fa-angle-double-right"></i> <?=$rsEmp['department_name']?> <i class="fa fa-angle-double-right"></i> <span style="color:orange"><?=$rsEmp['role_name']?></span>
					</strong>
					<input type="hidden" name="emp_id" id="emp_id"  value="<?=$rsEmp['emp_id']?>">
					<input type="hidden" name="emp_first_name" id="emp_first_name"  value="<?=$rsEmp['emp_first_name']?>">
					<input type="hidden" name="emp_last_name" id="emp_last_name"  value="<?=$rsEmp['emp_last_name']?>">
					<input type="hidden" name="emp_department" id="emp_department"  value="<?=$rsEmp['department_name']?>">
					<input type="hidden" name="emp_department_id" id="emp_department_id"  value="<?=$rsEmp['department_id']?>">
					<input type="hidden" name="emp_position" id="emp_position"  value="<?=$rsEmp['position_name']?>">
					<input type="hidden" name="emp_position_id" id="emp_position_id"  value="<?=$rsEmp['position_id']?>">
					<input type="hidden" name="emp_image" id="emp_image"  value="<?=$rsEmp['emp_picture_thum']?>">
					<input type="hidden" name="emp_work_age" id="emp_work_age"  value="<?=dateDifference($rsEmp['emp_age_working'],date("Y-m-d"))?>">
					
						
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
						(<?=$rsEmp['admin_id']?>) <i class="fa fa-angle-double-right"></i> </strong> <?=$rsEmp['admin_name']?> &nbsp;&nbsp; <?=$rsEmp['admin_surname']?>
					<?php
					}
					?>
					
			
			<form method="post" action="../logout.php" style='display: none;' id='formLogout'>
				<input type='hidden' id='admin_username' name='admin_username' value='<?php echo $_SESSION[admin_username]?>'>
				<input type='hidden' id='unset_session' name='unset_session' value='loguout'>
				<input type='submit' id='btnLogoutSumit' name='btnLogoutSumit'>
			</form>
			<span class="caret"></span>
			</a>
			<!-- <span class="glyphicon glyphicon-off" style="color:red;"></span> -->
			
				<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
					
					<?php
					
					if($_SESSION['admin_status']==1 or $_SESSION['admin_status']==3){
						?>
						<li>
							<a href='../admin' id='profile' class=''><i  class='glyphicon glyphicon-cog'></i> ผู้ดูแลละบบ</a>
						</li>
						<?
					}
					?>
						<!-- <a href='?language=EN' id='EnLanguage' class=''>
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
							?> -->

					<li>		
						<a href='#' id='logout' class=''><i style="color:orange" class="glyphicon glyphicon-off"></i> ออกจากระบบ</a>

						<form method="post" action="../logout.php" style='display: none;' id='formLogout'>
							<input type='hidden' id='admin_username' name='admin_username' value='<?php echo $_SESSION[admin_username]?>'>
							<input type='hidden' id='unset_session' name='unset_session' value='loguout'>
							<input type='submit' id='btnLogoutSumit' name='btnLogoutSumit'>
						</form>
						
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
						/*
						echo "admin_status=".$_SESSION['admin_status']."<br>";
						echo "emp_role_level=".$_SESSION['emp_role_leve']."<br>";
						echo "emp_role_level_id=".$_SESSION['emp_role_level_id']."<br>";
						*/

				  		if(($_SESSION['admin_status']==3) //super admin
				  		or ($_SESSION['admin_status']==1  //admin system
						or ($_SESSION['emp_role_level_id']=="1") //1 super evaluate,2 evaluate, 3 user
						)){
				  		?>
							
							
							<li  class="active mainMenu menuLevel1">
					  			<a  href="index.php#/pages/vKpiOwner" id="kpiDashboardMenu" class=""><i class="iconMenu glyphicon glyphicon-dashboard"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_kpiDashboard']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		<li class="mainMenu menuLevel1">
					  			<a href="index.php#/pages/vKpiDashboard" id="appraisalResultMenu" class=""><i class="iconMenu glyphicon glyphicon-record"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_appraisal_result']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		
							<!-- <li class="mainMenu menuLevel1">
							  <a  href="#" id="threshold" class=" "><i class="iconMenu glyphicon glyphicon-th-large"></i> <span class="menu-text"> <?=$_SESSION['main_menul_l_threshold']?></span></a>
							</li> -->
							<li class="mainMenu menuLevel1">
					  			<a  href="index.php#/pages/vAppraisalPeriod" id="appraisalPeriodMenu" class=""><i class="iconMenu glyphicon glyphicon-time"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_appraisalPeriod']?></span></a>
					  			<b class="arrow"></b>
							</li>
							<li class="mainMenu menuLevel1">
								  <a href="index.php#/pages/vPerspective" id="perspectiveMenu" 
								  class=""><i class="iconMenu glyphicon glyphicon glyphicon-fire"></i>  <span class="menu-text"> มุมมองธุรกิจ</span></a>
					  			<b class="arrow"></b>
							</li>
							
							
							<li class="mainMenu menuLevel1"> 
					  			<a href="index.php#/pages/vDepartment" id="departmentMenu" class=""><i class="iconMenu glyphicon glyphicon-road"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_department']?></span></a>
					 			<b class="arrow"></b>
					 		</li>
							
							<li class="mainMenu menuLevel1">
					  			<a href="index.php#/pages/vPosition" id="positionMenu" class=""><i class="iconMenu glyphicon glyphicon glyphicon-fire"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_position']?></span></a>
					  			<b class="arrow"></b>
							</li>
							
							  
					 		
					  		<li class="mainMenu menuLevel1">
					  			<a href="index.php#/pages/vEmployee" id="employeeMenu" class=""><i class="iconMenu glyphicon glyphicon-user"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_employee']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		<li class="mainMenu menuLevel1 menuLevel2">
					 			 <a href="index.php#/pages/vKpi" id="kpiMenu" class=""><i class="iconMenu glyphicon glyphicon-signal"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_kpi']?></span></a>
					 		 	<b class="arrow"></b>
					 		 </li>
					 		 <li class="mainMenu menuLevel1 menuLevel2">
					  			<a href="index.php#/pages/vAssignEvaluate" id="assignMasterKPIMenu" class=""><i class="iconMenu glyphicon glyphicon-indent-left"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_master_kpi']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		
					 		
					  		<li class="mainMenu menuLevel1 menuLevel2">
					  			<a href="index.php#/pages/vAssignKPI" id="assignKPIMenu" class=""><i class="iconMenu glyphicon glyphicon-list-alt"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_kpi']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		<!-- 
					  		<li class="mainMenu menuLevel1 menuLevel2">
					  			<a href="#" id="myEvaluate" class=""><i class="iconMenu glyphicon glyphicon-list-alt"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_kpi_emp']?></span></a>
					  			<b class="arrow"></b>
					  		</li> -->
					  		
					  		
					  		<li class="mainMenu menuLevel1">
					  			<a href="index.php#/pages/vApproveKpiResult" id="approveKpiResultMenu" class=""><i class="iconMenu glyphicon glyphicon-edit"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_approve_kpi_result']?></span></a>
					  			<b class="arrow"></b>
					  		</li>


					  		
				  		<?
						}else if($_SESSION['emp_role_level_id']=="2"){//chief
						?>

							<li class="active mainMenu menuLevel1">
					  			<a  href="index.php#/pages/vKpiOwner" id="kpiDashboardMenu" class=""><i class="iconMenu glyphicon glyphicon-dashboard"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_kpiDashboard']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		
					  		
					 		
					  		<li class="mainMenu menuLevel1 menuLevel2">
					  			<a href="index.php#/pages/vAssignKPI" id="assignKPIMenu" class=""><i class="iconMenu glyphicon glyphicon-list-alt"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_kpi']?></span></a>
					  			<b class="arrow"></b>
							</li>
							  
							<li class="mainMenu menuLevel1 menuLevel2">
					  			<a href="index.php#/pages/vMyEvaluate" id="myEvaluateMenu" class=""><i class="iconMenu glyphicon glyphicon-list-alt"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_kpi_emp']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		
					  		
					  		
						
						<?

						}else if($_SESSION['emp_role_level_id']=="3"){//emp
						?>
				  		
							<li class=" mainMenu menuLevel1">
					  			<a  href="index.php#/pages/vKpiOwner" id="kpiDashboardEmpMenu" class=""><i class="iconMenu glyphicon glyphicon-dashboard"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_kpiDashboard']?></span></a>
					  			<b class="arrow"></b>
							  </li>
					
					  		<li class="mainMenu menuLevel1 menuLevel2">
					  			<a href="index.php#/pages/vMyEvaluate" id="myEvaluateMenu" class=""><i class="iconMenu glyphicon glyphicon-list-alt"></i>  <span class="menu-text"> <?=$_SESSION['main_menul_l_assign_kpi_emp']?></span></a>
					  			<b class="arrow"></b>
					  		</li>
					  		

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

					<button class="boxC btn btn-success notClick">
						<i class=" glyphicon glyphicon-tasks"></i>
					</button>
					<button class="boxC btn btn-info notClick">
					<!-- <a href="../admin/index.php?page=admin"  class="boxC btn btn-info "> -->
						<i class="glyphicon  glyphicon-user"></i>
					<!-- </a> -->
					</button>
					<button class="boxC btn btn-warning notClick">
						<i class="glyphicon glyphicon-pencil"></i>
					</button>
					<button  class="boxC btn btn-danger notClick">
						<i class="glyphicon glyphicon glyphicon-save"></i>
					</button>

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
			
			<button class="boxC btn btn-default " id="withdrawEnlarge">
				<i class="glyphicon glyphicon-align-justify"></i>
			</button>

			<button class="boxC btn btn-default " id="btnFullScreen">
				<i class="glyphicon glyphicon-fullscreen"></i>
			</button>


			<!-- <div class="withdraw-Enlarge" style="display:inline; float:right ; position:relative; magin-right:200px;margin-left: 2px;">
				<button id="withdrawEnlarge" class="glyphicon glyphicon-align-justify  btn btn-primary" style="width:auto;height:30px; font-weight:normal;"></button>
			</div> -->
			
		
			
			<!-- button full screen start -->
			<!-- <div class="fullScreen" style="display:inline; float:right ; position:relative; magin-right:5px">
				<button class=" glyphicon glyphicon-fullscreen btn btn-primary" id="btnFullScreen" style="width:auto;height:30px;"></button>
			</div> -->

			<!-- button full screen end -->
			
		</div>
		<!--  form search,button fullscreen end -->
		
		
	</div>
	<div class="container">
		
		<div id="mainContent" class="ng-view">
			
		</div>
	</div>

	<input type='hidden' id='embed_admin_username' name='embed_admin_username' value='<?=$_SESSION['admin_username']?>'>
	<input type='hidden' id='embed_emp_role_leve' name='embed_emp_role_leve' value='<?=$_SESSION['emp_role_leve']?>'>
	<input type='hidden' id='embed_emp_role_level_id' name='embed_emp_role_level_id' value='<?=$_SESSION['emp_role_level_id']?>'>
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





	

	<!-- <div  id="confirmMainModal" class="modal fade bs-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content ">
			<div class="modal-header alert-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"  id="confirmTitle"></h4>
			</div>
			<div class="modal-body">
				<p id="confirmDetail"></p>
			</div>
			<div class="modal-footer">
				<button type="button" id="confirmOK" class="btn btn-primary">ตกลง</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				
			</div>
		</div>
	</div>
	</div> -->
	<div id="modalMainConfirmArea"></div>



  </body>
</html>






