<?php session_start();
 $_SESSION['admin_surname'];
 $vExpired_date="";
 ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../jquery-ui/css/cupertino/jquery-ui-1.10.3.custom.min.css" type="text/css" media="all" />


<script src="Controller/cAdmin.js" type="text/javascript"></script>



</head>
<body>
 



<style type="text/css">

#admin-line {
	width:100%;
	padding:5px 0px 5px 0px;
	border-bottom:#666666 dotted 1px;
}
#admin-line-frm {
	width:100%;
	padding:5px;
}
.frm-text {
	width:250px;
	border:1px solid #dedede;
	padding:2px 5px;
	background: #fff url(images/input.jpg) left top repeat-x;
}
#no {
	width:50px;
	padding-left:10px; 
	float:left;
}
#name {
	width:150px; 
	float:left;
}
#name a, #sname a {
	text-decoration:none;
	display:block;
	color:#666;
}
#name a:hover, #sname a:hover {
	/*text-decoration:underline;*/
}
#sname {
	width:150px; 
	float:left;
}
#status {
	width:120px; 
	float:left;
}
#action {
	width:120px; 
	float:left;
}
#action a {
	text-decoration:none;
	color:#1a4d80;
}
#action a:hover {
	text-decoration:underline;
}
#frm-admin {
	width:80px;
	float:left;
	color:#333;
}
#frm-admin2 {
	width:300px;
	float:left;
}
.add a {
	color:#ccc;
	text-decoration:none;
}
.add a:hover {
	color:#333;
	text-decoration:underline;
}

</style>
<div id="admin">
	<div id="detail">
	
		<div id="admin-line" style="color:#666; background:#efefef; font-weight:bold; border:#dedede solid 1px;">
			<div id="no">ลำดับ</div>
			<div id="name" >ชื่อ</div>
			<div id="sname">นามสกุล</div>
            <div id="sname">ชื่อผู้ใช้งาน</div> 
            <!--
            <div id="sname">อื่นๆ</div>  
            -->
			<div id="status" >สถานะ</div> 
			<div id="action" >การจัดการ</div>
			<br style="clear:both"  />
		</div>
		<?php
		if($_SESSION["admin_id"]==1){
			$sql="select * from admin  order by admin_id asc";
		}else{
			$sql="select * from admin where admin_id='$_SESSION[admin_id]' order by admin_id asc";
		}
		
		$table=$conn->query($sql) or die($conn->error);
		if($num_rows=$table->num_rows) {
			$i = 1;
			while($row=$table->fetch_assoc()) {
				if($row['admin_status'] == '1'){
					$vAdmin_status1 = "<div id=\"status\" style=\"color:#006600\">ใช้งานได้</div>\r\n";
				}elseif($row['admin_status'] == '3'){
					$vAdmin_status1 = "<div id=\"status\" style=\"color:#006600\">Supper User</div>\r\n";
				}else{
					$vAdmin_status1 = "<div id=\"status\" style=\"color:#ff0000\">ระงับชั่วคราว</div>\r\n";
				}
				echo "<div id=\"admin-line\">\r\n";
				echo "<div id=\"no\">".$i."</div>\r\n";
				echo "<div id=\"name\"><a href=\"admin_detail.php?admin_id=".$row['admin_id']."&TB_iframe=true&height=200&width=500\" rel=\"sexylightbox\" title=\"".$row['admin_name']." ".$row['admin_surname']."\">".$row['admin_name']."</a></div>\r\n";
				
				
				
				echo "<div id=\"sname\"><a href=\"admin_detail.php?admin_id=".$row['admin_id']."&TB_iframe=true&height=200&width=500\" rel=\"sexylightbox\" title=\"".$row['admin_name']." ".$row['admin_surname']."\">".$row['admin_surname']."</a></div>\r\n";
				
				echo "<div id=\"sname\"><a href=\"admin_detail.php?admin_id=".$row['admin_id']."&TB_iframe=true&height=200&width=500\" rel=\"sexylightbox\" title=\"".$row['admin_name']." ".$row['admin_surname']."\">".$row['admin_username']."<br></a></div>\r\n";
				
				
				/*
				if(strlen($row['admin_website'])>15){
					$vAdmin_website=mb_substr($row['admin_website'],1,15,"UTF-8")."...";
					
				}else{
					$vAdmin_website=$row['admin_website'];
				}
				
				echo "<div id=\"sname\"><a href=\"admin_detail.php?admin_id=".$row['admin_id']."&TB_iframe=true&height=200&width=500\" rel=\"sexylightbox\" title=\"".$row['admin_name']." ".$row['admin_surname']."\">".$vAdmin_website."<br></a></div>\r\n";
				*/
				
				
				echo "<div id=\"status\">".$vAdmin_status1."</div>\r\n";
				
				if($_SESSION['admin_status'] == '3'){
					if($row['admin_status'] != '3'){
						echo "<div id=\"action\"><a onclick=\"return confirm('คุณต้องการลบ ( ".$row['admin_name'] ." ". $row['admin_surname']." ) ออกจากผู้ดูแลระบบ ?');\" href=\"admin_del_process.php?vAdmin_id=".$row['admin_id']."\">ลบ</a>&nbsp;&nbsp;&nbsp;<a href=\"index.php?page=admin&action=edit&vAdmin_id=".$row['admin_id']."\">แก้ไข</a></div>\r\n";
					}else{
						echo "<div id=\"action\" style=\"color:#ff0000;\"><a href=\"index.php?page=admin&action=edit&vAdmin_id=".$row['admin_id']."\">แก้ไข</a></div>";
					}
				}else{
					if($_SESSION['admin_id'] == $row['admin_id']){
						echo "<div id=\"action\"><a href=\"index.php?page=admin&action=edit&vAdmin_id=".$row['admin_id']."\">แก้ไข</a></div>\r\n";
					}else{
						echo "<div id=\"action\" style=\"color:#ff0000;\">ไม่อนุญาติให้ลบหรือแก้ไข</div>";
					}
				}
				
				echo "<br style=\"clear:both\"  />\r\n";
				echo "</div>\r\n";
				$i++;
			}
		}
		?>
	</div>
</div>
<br style="clear:both"  />
<br style="clear:both"  />


<?php 
	if($_GET['action'] == "edit"){
		if($_SESSION['admin_status'] == '3'){
		echo "<h2>แก้ไขข้อมูลผู้ดูแลระบบ <span class=\"add\"><a href=\"index.php?page=admin\">เพิ่มข้อมูลผู้ดูแลระบบ</a></span></h2>";
		}
		$action2 = "edit";
		
		if($_SESSION['admin_status'] == '3'){
			$sql="select * from admin where admin_id = '$_GET[vAdmin_id]'";
		}else{
			$sql="select * from admin where admin_id = '$_SESSION[admin_id]'";
		}
		
		$table=$conn->query($sql) or die($conn->error);
			if($row=$table->fetch_assoc()) {
				$vAdmin_id = $row['admin_id'];
				$vAadmin_name1 = $row['admin_name'];
				$vAdmin_surname = $row['admin_surname'];
				$vAdmin_username = $row['admin_username'];
				$vAdmin_password = $row['admin_password'];
				$vAdmin_status1 = $row['admin_status'];
				$vAdmin_email = $row['admin_email'];
				$vAdmin_tel = $row['admin_tel'];
				$vAdmin_age = $row['admin_age'];
				$vAdmin_website = $row['admin_website'];
				$vAdmin_send_email = $row['admin_send_email'];
				$vExpired_date=$row['expired_date'];
				$vPackage=$row['package'];
				$vActivated=$row['activated'];
				$vAdmin_company=$row['admin_company'];


				
			}

			
			
		$username = "<input name=\"admin_username\" type=\"text\" class=\"frm-text\"  disabled=\"disabled\" value=\"".$admin_username."\">";
		$username .= "<input name=\"admin_username\" id=\"admin_username\" type=\"hidden\" value=\"".$admin_username."\">";
		
		if( ($_SESSION['admin_id'] == $vAdmin_id) || ($_SESSION['admin_status'] == '3') ){
			$submit = "<input type=\"submit\" value=\"แก้ไขผู้ดูแลระบบ\" class=\"button\">";
		}else{
			$submit = "<input type=\"submit\" disabled=\"disabled\" value=\"แก้ไขผู้ดูแลระบบ\" class=\"button\">";
		}
		
	}else{
		echo "<h2>เพิ่มข้อมูลผู้ดูแลระบบ</h2>";
		$action2 = "add";
		
		if($_SESSION['admin_status'] == '3'){
			$submit = "<input type=\"submit\" value=\"เพิ่มผู้ดูแลระบบ\" class=\"button\">";
		}else{
			$submit = "<input type=\"submit\" disabled=\"disabled\" value=\"เพิ่มผู้ดูแลระบบ\" class=\"button\">";
		}
		
		$vAdmin_id = "";
		$vAadmin_name1 = "";
		$vAdmin_surname = "";
		$vAdmin_username = "";
		$vAdmin_password = "";
		$vExpired_date="";
		$vAdmin_status1 = "";
		$vAdmin_email="";
		$vAdmin_tel="";
		$vAdmin_age="";
		$vAdmin_website="";
		$vAdmin_send_email="";
		$vPackage="";
		$vActivated="";

		$username = "<input name=\"admin_username\" type=\"text\" class=\"frm-text\">";
	}
?>

<form action="admin_process.php" method="post" name="frm-admin" id="frm-admin-form">
<div id="admin-line-frm">
	<div id="frm-admin">ชื่อบริษัท</div>
	<div id="frm-admin2">
	<input name="admin_company" type="text" class="frm-text" value="<?=$vAdmin_company?>" />
	</div>
	<br style="clear:both"  />	
</div>

<div id="admin-line-frm">
	<div id="frm-admin">ชื่อ</div>
	<div id="frm-admin2">
	<input name="admin_name" type="text" class="frm-text" value="<?=$vAadmin_name1?>" />
	</div>
	<br style="clear:both"  />	
</div>

<div id="admin-line-frm">
<div id="frm-admin">นามสกุล</div>
<div id="frm-admin2"><input name="admin_surname" type="text" class="frm-text" value="<?=$vAdmin_surname?>"></div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">อีเมลล์</div>
<div id="frm-admin2"><input name="admin_email" type="text" class="frm-text" value="<?=$vAdmin_email?>"></div>
<br style="clear:both"  />
</div>
<div id="admin-line-frm">
<div id="frm-admin">เบอร์โทร</div>
<div id="frm-admin2"><input name="admin_tel" type="text" class="frm-text" value="<?=$vAdmin_tel?>"></div>
<br style="clear:both"  />
</div>
<!--
<div id="admin-line-frm">
<div id="frm-admin">อายุ</div>
<div id="frm-admin2"><input name="admin_age" type="text" class="frm-text" value="<?=$vAdmin_age?>"></div>
<br style="clear:both"  />
</div>


<div id="admin-line-frm">
<div id="frm-admin" style="width:200px;">ข้อมูลรายละเอียดอื่นๆ</div>
<div id="frm-admin2"><textarea name="admin_website" type="text" cols="30" class="frm-texts" ><?=$vAdmin_website?></textarea></div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">Website</div>
<div id="frm-admin2"><input name="admin_website" type="text" class="frm-text" value="<?=$vAdmin_website?>"></div>
<br style="clear:both"  />
</div>
-->

<div id="admin-line-frm">
<div id="frm-admin">ชื่อเข้าใช้</div>
<div id="frm-admin2"><input name="admin_username" id="admin_username" type="text"  class="frm-text" value="<?=$vAdmin_username?>" ></div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm" class="check_box_change_pass_area">
	<div id="frm-admin">เปลี่ยนรหัสผ่าน</div>
	<div id="frm-admin2"><input id="admin_change_pass" name="admin_change_pass" type="checkbox" class="" value=""></div>
	<br style="clear:both"  />
</div>

<div id="admin-line-frm" class="change_pass_area" style="display: none;">
	<div id="frm-admin">รหัสผ่าน</div>
	<div id="frm-admin2"><input id="admin_password" name="admin_password" type="password" class="frm-text" value=""></div>
	<br style="clear:both"  />
</div>
<div id="admin-line-frm" class="change_pass_area" style="display: none;">
	<div id="frm-admin">ยืนยันรหัสผ่าน</div>
	<div id="frm-admin2"><input id="admin_re_password" name="admin_re_password" type="password" class="frm-text" value=""></div>
	<br style="clear:both"  />
</div>
<input name="admin_status" id="admin_status" type="hidden" value="<?=$vAdmin_status1?>">
<?php
if($_SESSION['admin_status']=="3"){

?>
<div id="admin-line-frm">
	<div id="frm-admin">Activate</div>
	<div id="frm-admin2">
		
		<select id='activated' name='activated'>
			<option <?php if($vActivated == "0"){echo "selected=\"selected\"";}?>  value='0'>Non Activated</option>
			<option <?php if($vActivated == "1"){echo "selected=\"selected\"";}?>  value='1'>Activated</option>
		
		</select>

	</div>
	<br style="clear:both"  />
</div>


<div id="admin-line-frm" class="expired_date_area" style="display: none;">
	<div id="frm-admin">หมดอายุ</div>
	<div id="frm-admin2"><input name="expired_date" id='expired_date' type="text" class="frm-text" value="<?=$vExpired_date?>"></div>
	<br style="clear:both"  />
</div>

<div id="admin-line-frm">
	<div id="frm-admin">แพกเก็จ</div>
	<div id="frm-admin2">
		
		<select id='package' name='package'>

		<?php
		$sql="SELECT * FROM person_kpi.package order by id asc";
		$table=$conn->query($sql) or die($conn->error);
		while($row=$table->fetch_assoc()) {
			if($row['id']==$vPackage){
				?>
				<option selected value="<?=$row['id']?>"><?=$row['name']?></option>
				<?php
			}else{
				?>
				<option value="<?=$row['id']?>"><?=$row['name']?></option>
				<?php
			}
			

		}
		?>
		
		</select>

	</div>
	<br style="clear:both"  />
</div>




<div id="admin-line-frm">
<div id="frm-admin">สถานะ</div>
	<div id="frm-admin2">
	<?php if( $_SESSION['admin_status'] == '3' && $vAdmin_status1 != '3' ){ ?>
		<select name="admin_status" id="admin_status" >
		  <option <?php if($vAdmin_status1 == "1"){echo "selected=\"selected\"";}?> value="1">ใช้งานได้</option>
		  <option <?php if($vAdmin_status1 == "0"){echo "selected=\"selected\"";}?> value="0">ระงับชั่วคราว</option>
  	    </select>
	<?php }else{ ?>
		<select name="admin_status" id="admin_status" disabled="disabled">
		  <option <?php if($vAdmin_status1 == "1"){echo "selected=\"selected\"";}?> value="1">ใช้งานได้</option>
		  <option <?php if($vAdmin_status1 == "0"){echo "selected=\"selected\"";}?> value="0">ระงับชั่วคราว</option>
  	    </select>
		<input name="admin_status" id="admin_status" type="hidden" value="<?=$vAdmin_status1?>">
	<?php } ?>
		
	</div>
<br style="clear:both"  />
</div>
<?php
}
?>

<div id="admin-line-frm">
<div id="frm-admin">&nbsp;</div>
<div id="frm-admin2">
<?=$submit?>
<input name="action" id="action" type="hidden" value="<?=$action2?>">
<input name="admin_id" id="admin_id" type="hidden" value="<?=$vAdmin_id?>">
<input name="admin_change_pass_flag" id="admin_change_pass_flag" type="hidden" value="Y">

</div>
<br style="clear:both"  />
</div>
</form>