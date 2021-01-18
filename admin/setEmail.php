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
	width:185px;
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
			<div id="name" >Your Name</div>
			<div id="sname">E-mail</div>
            <div id="sname">Account Type</div> 
            <div id="sname">Incoming</div>  
			<div id="status" >Outgoing(SMTP)</div> 
			<div id="action" >Manage</div>
			<br style="clear:both"  />
		</div>
		
	</div>
</div>
<br style="clear:both"  />
<br style="clear:both"  />



<form action="#" method="post" name="frm-admin" id="frm-admin-form">
<strong>User Information</strong>
<div id="admin-line-frm">
<div id="frm-admin">Your Name</div>
<div id="frm-admin2">
  <input name="admin_name" type="text" class="frm-text" value="<?=$vAadmin_name1?>" />
</div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">E-mail Address</div>
<div id="frm-admin2"><input name="admin_surname" type="text" class="frm-text" value="<?=$vAdmin_surname?>"></div>
<br style="clear:both"  />
</div>
 <strong>Server Information</strong>
<div id="admin-line-frm">
<div id="frm-admin">Account Type</div>
<div id="frm-admin2">

	<select class="frm-text" style='width:100px'>
		<option>IMAP</option>
	</select>
</div>
<br style="clear:both"  />
</div>
<div id="admin-line-frm">
<div id="frm-admin">Incoming mail server</div>
<div id="frm-admin2"><input name="admin_tel" type="text" class="frm-text" value="<?=$vAdmin_tel?>"></div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin">Outgoing mail server(SMTP)</div>
<div id="frm-admin2"><input name="admin_website" type="text" class="frm-text" value="<?=$vAdmin_website?>"></div>
<br style="clear:both"  />
</div>

 <strong>logo Information</strong>
<div id="admin-line-frm">
<div id="frm-admin">User Name</div>
<div id="frm-admin2"><input name="admin_username" id="admin_username" type="text"  class="frm-text" value="<?=$vAdmin_username?>" ></div>
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
<input class="button" name="admin_id" id="admin_id" type="submit" value="Save">
<input name="action" id="action" type="hidden" value="<?=$action2?>">
<input name="admin_id" id="admin_id" type="hidden" value="<?=$vAdmin_id?>">
<input class="button" name="admin_id" id="admin_id" type="submit" value="Reset">
</div>
<br style="clear:both"  />
</div>
</form>

