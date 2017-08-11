<? session_start();
 $_SESSION['admin_surname']?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
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
	width:120px; 
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
	width:140px; 
	float:left;
}
#status {
	width:160px; 
	float:left;
}
#action {
	width:150px; 
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
-->
</style>
<div id="admin">
	<div id="detail">
	
		<div id="admin-line" style="color:#666; background:#efefef; font-weight:bold; border:#dedede solid 1px;">
			<div id="no">ลำดับ</div>
			<div id="name">ชื่อ</div>
			<div id="sname">นามสกุล</div>
            <div id="sname">E-mail</div> 
            <div id="sname">ชื่อเว็บไชต์:</div>  
			<div id="status">สถานะ</div> 
			<div id="action">การจัดการ</div>
			<br style="clear:both"  />
		</div>
		<?
		$sql="select * from admin order by admin_id asc";
		$table=mysql_query($sql) or die(mysql_error());
		if($num_rows=mysql_num_rows($table)) {
			$i = 1;
			while($row=mysql_fetch_array($table)) {
				if($row['admin_status'] == '1'){
					$admin_status = "<div id=\"status\" style=\"color:#006600\">ใช้งานได้</div>\r\n";
				}elseif($row['admin_status'] == '3'){
					$admin_status = "<div id=\"status\" style=\"color:#006600\">Supper User</div>\r\n";
				}else{
					$admin_status = "<div id=\"status\" style=\"color:#ff0000\">ระงับชั่วคราว</div>\r\n";
				}
				echo "<div id=\"admin-line\">\r\n";
				echo "<div id=\"no\">".$i."</div>\r\n";
				echo "<div id=\"name\"><a href=\"admin_detail.php?admin_id=".$row['admin_id']."&TB_iframe=true&height=200&width=500\" rel=\"sexylightbox\" title=\"".$row['admin_name']." ".$row['admin_surname']."\">".$row['admin_name']."</a></div>\r\n";
				echo "<div id=\"sname\"><a href=\"admin_detail.php?admin_id=".$row['admin_id']."&TB_iframe=true&height=200&width=500\" rel=\"sexylightbox\" title=\"".$row['admin_name']." ".$row['admin_surname']."\">".$row['admin_surname']."</a></div>\r\n";
				echo "<div id=\"status\">".$admin_status."</div>\r\n";
				
				if($_SESSION['admin_status'] == '3'){
					if($row['admin_status'] != '3'){
						echo "<div id=\"action\"><a onclick=\"return confirm('คุณต้องการลบ ( ".$row['admin_name'] ." ". $row['admin_surname']." ) ออกจากผู้ดูแลระบบ ?');\" href=\"admin_del_process.php?admin_id=".$row['admin_id']."\">ลบ</a>&nbsp;&nbsp;&nbsp;<a href=\"index.php?page=admin&action=edit&admin_id=".$row['admin_id']."\">แก้ไข</a></div>\r\n";
					}else{
						echo "<div id=\"action\" style=\"color:#ff0000;\"><a href=\"index.php?page=admin&action=edit&admin_id=".$row['admin_id']."\">แก้ไข</a></div>";
					}
				}else{
					if($_SESSION['admin_id'] == $row['admin_id']){
						echo "<div id=\"action\"><a href=\"index.php?page=admin&action=edit&admin_id=".$row['admin_id']."\">แก้ไข</a></div>\r\n";
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


<? 
	if($_GET['action'] == "edit"){
		echo "<h2>แก้ไขข้อมูลผู้ดูแลระบบ <span class=\"add\"><a href=\"index.php?page=admin\">เพิ่มข้อมูลผู้ดูแลระบบ</a></span></h2>";
		$action2 = "edit";
		
		if($_SESSION['admin_status'] == '3'){
			$sql="select * from admin where admin_id = '$_GET[admin_id]'";
		}else{
			$sql="select * from admin where admin_id = '$_SESSION[admin_id]'";
		}
		
		$table=mysql_query($sql) or die(mysql_error());
			if($row=mysql_fetch_array($table)) {
				$admin_id = $row['admin_id'];
				$admin_name = $row['admin_name'];
				$admin_surname = $row['admin_surname'];
				$admin_username = $row['admin_username'];
				$admin_password = $row['admin_password'];
				$admin_status = $row['admin_status'];
			}
			
		$username = "<input name=\"admin_username\" type=\"text\" class=\"frm-text\"  disabled=\"disabled\" value=\"".$admin_username."\">";
		$username .= "<input name=\"admin_username\" id=\"admin_username\" type=\"hidden\" value=\"".$admin_username."\">";
		
		if( ($_SESSION['admin_id'] == $admin_id) || ($_SESSION['admin_status'] == '3') ){
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
		
		$admin_id = "";
		$admin_name = "";
		$admin_surname = "";
		$admin_username = "";
		$admin_password = "";
		$admin_status = "";
		$username = "<input name=\"admin_username\" type=\"text\" class=\"frm-text\">";
	}
?>

<form action="admin_process.php" method="post" name="frm-admin" id="frm-admin">
<div id="admin-line-frm">
<div id="frm-admin">ชื่อ</div>
<div id="frm-admin2">
  <input name="admin_name" type="text" class="frm-text" value="<?=$admin_name?>" />
</div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">นามสกุล</div>
<div id="frm-admin2"><input name="admin_surname" type="text" class="frm-text" value="<?=$admin_surname?>"></div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">E-mail:</div>
<div id="frm-admin2"><input name="admin_email" type="text" class="frm-text" value="<?=$admin_email?>"></div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">เว็บไชต์</div>
<div id="frm-admin2"><input name="admin_website" type="text" class="frm-text" value="<?=$admin_website?>"></div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">ชื่อเข้าใช้</div>
<div id="frm-admin2"><?=$username?></div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">รหัสผ่าน</div>
<div id="frm-admin2"><input name="admin_password" type="text" class="frm-text" value="<?=$admin_password?>"></div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">สถานะ</div>
	<div id="frm-admin2">
	<? if( $_SESSION['admin_status'] == '3' && $admin_status != '3' ){ ?>
		<select name="admin_status" id="admin_status" style="border:#dedede solid 1px;">
		  <option <? if($admin_status == "1"){echo "selected=\"selected\"";}?> value="1">ใช้งานได้</option>
		  <option <? if($admin_status == "0"){echo "selected=\"selected\"";}?> value="0">ระงับชั่วคราว</option>
  	    </select>
	<? }else{ ?>
		<select name="admin_status" id="admin_status" disabled="disabled">
		  <option <? if($admin_status == "1"){echo "selected=\"selected\"";}?> value="1">ใช้งานได้</option>
		  <option <? if($admin_status == "0"){echo "selected=\"selected\"";}?> value="0">ระงับชั่วคราว</option>
  	    </select>
		<input name="admin_status" id="admin_status" type="hidden" value="<?=$admin_status?>">
	<? } ?>
		
	</div>
<br style="clear:both"  />
</div>




<div id="admin-line-frm">
<div id="frm-admin">สถานะ</div>
	<div id="frm-admin2">
    <? echo"session".$_SESSION['admin_status']?>
	<? if($_SESSION['admin_status'] == '3' && $admin_status != '3' ){ ?>
		<select name="admin_status" id="admin_status" style="border:#dedede solid 1px;">
		 <option>1</option>
         <option>2</option>
  	    </select>
	
	<? }else{
		?>
        <select name="admin_status" id="admin_status" style="border:#dedede solid 1px;">
		 <option>1</option>
         <option>2</option>
  	    </select>
        <?
	}
	?>
		
	</div>
<br style="clear:both"  />
</div>




<div id="admin-line-frm">
<div id="frm-admin">&nbsp;</div>
<div id="frm-admin2">
<?=$submit?>
<input name="action" id="action" type="hidden" value="<?=$action2?>">
<input name="admin_id" id="admin_id" type="hidden" value="<?=$admin_id?>">
</div>
<br style="clear:both"  />
</div>
</form>

