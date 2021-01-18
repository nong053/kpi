<? session_start();
 $_SESSION['admin_surname'];


 ?>

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
	width:100px; 
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
	width:120px; 
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
	width:125px;
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
			<div id="no">ID</div>
			<div id="name" >Conn Name</div>
			<div id="sname">Host Name</div>
            <div id="sname">Dabase Name</div> 
            <div id="sname">Port Number</div>  
			<div id="status" >User Name</div> 
			<div id="action" >Manage</div>
			<br style="clear:both"  />
		</div>
		<?
		if($_SESSION[admin_id]==1){
			$sql="select * from admin  order by admin_id asc";
		}else{
			$sql="select * from admin where admin_id='$_SESSION[admin_id]' order by admin_id asc";
		}
		
		$table=mysql_query($sql) or die(mysql_error());
		if($num_rows=mysql_num_rows($table)) {
			$i = 1;
			while($row=mysql_fetch_array($table)) {
				
			}
		}
		?>
	</div>
</div>
<br style="clear:both"  />
<br style="clear:both"  />


<? 
	if($_GET['action'] == "edit"){
		echo "<h2>แก้ไขข้อมูลผู้ดูแลระบบ <span class=\"add\"><a href=\"index.php?page=admin\">เพิ่มการเชื่อมต่อฐานข้อมูล</a></span></h2>";
		$action2 = "edit";
		
		if($_SESSION['admin_status'] == '3'){
			$sql="select * from admin where admin_id = '$_GET[vAdmin_id]'";
		}else{
			$sql="select * from admin where admin_id = '$_SESSION[admin_id]'";
		}
		
		$table=mysql_query($sql) or die(mysql_error());
			if($row=mysql_fetch_array($table)) {
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
				
			}
			
		$username = "<input name=\"admin_username\" type=\"text\" class=\"frm-text\"  disabled=\"disabled\" value=\"".$admin_username."\">";
		$username .= "<input name=\"admin_username\" id=\"admin_username\" type=\"hidden\" value=\"".$admin_username."\">";
		
		if( ($_SESSION['admin_id'] == $vAdmin_id) || ($_SESSION['admin_status'] == '3') ){
			$submit = "<input type=\"submit\" value=\"แก้ไขการเชื่อมต่อฐานข้อมูล\" class=\"button\">";
		}else{
			$submit = "<input type=\"submit\" disabled=\"disabled\" value=\"แก้ไขเชื่อมต่อฐานข้อมูล\" class=\"button\">";
		}
		
	}else{
		echo "<h2>เพิ่มการเชื่อมต่อฐานข้อมูล</h2>";
		$action2 = "add";
		
		if($_SESSION['admin_status'] == '3'){
			$submit = "<input type=\"submit\" value=\"เพิ่มเการชื่อมต่อฐานข้อมูล\" class=\"button\">";
		}else{
			$submit = "<input type=\"submit\" disabled=\"disabled\" value=\"เพิ่มการเชื่อมต่อฐานข้อมูล\" class=\"button\">";
		}
		
		$vAdmin_id = "";
		$vAadmin_name1 = "";
		$vAdmin_surname = "";
		$vAdmin_username = "";
		$vAdmin_password = "";
		$vAdmin_status1 = "";
		$vAdmin_email="";
		$vAdmin_tel="";
		$vAdmin_age="";
		$vAdmin_website="";
		$vAdmin_send_email="";
		$username = "<input name=\"admin_username\" type=\"text\" class=\"frm-text\">";
	}
?>

<form action="#" method="post" name="frm-admin" id="frm-admin-form">
<div id="admin-line-frm">
<div id="frm-admin">Connection Name</div>
<div id="frm-admin2">
  <input name="admin_name" type="text" class="frm-text" value="<?=$vAadmin_name1?>" />
</div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">Host Name</div>
<div id="frm-admin2"><input name="admin_surname" type="text" class="frm-text" value="<?=$vAdmin_surname?>"></div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">Database Name</div>
<div id="frm-admin2"><input name="admin_email" type="text" class="frm-text" value="<?=$vAdmin_email?>"></div>
<br style="clear:both"  />
</div>
<div id="admin-line-frm">
<div id="frm-admin">Port Number</div>
<div id="frm-admin2"><input name="admin_tel" type="text" class="frm-text" value="<?=$vAdmin_tel?>"></div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">User Name</div>
<div id="frm-admin2"><input name="admin_website" type="text" class="frm-text" value="<?=$vAdmin_website?>"></div>
<br style="clear:both"  />
</div>


<div id="admin-line-frm">
<div id="frm-admin">Password</div>
<div id="frm-admin2"><input name="admin_username" id="admin_username" type="text"  class="frm-text" value="<?=$vAdmin_username?>" ></div>
<br style="clear:both"  />
</div>













<div id="admin-line-frm">
<div id="frm-admin">&nbsp;</div>
<div id="frm-admin2">
<input class='button' name="admin_id" id="admin_id" type="submit" value="Save">
<input name="action" id="action" type="hidden" value="<?=$action2?>">
<input name="admin_id" id="admin_id" type="hidden" value="<?=$vAdmin_id?>">
<input class='button' name="admin_id" id="admin_id" type="submit" value="Reset">
</div>
<br style="clear:both"  />
</div>
</form>

