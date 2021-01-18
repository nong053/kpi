<? session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666666;
}
#detail {
	padding:5px;
}
h2 {
	font-size:18px;
	color:#1a4d80;
	display:block;
	margin:0px;
	padding:0px 5px 5px 5px;
	color:#1a4d80;
}
-->
</style>

		<h2>ผู้ดูแลระบบ</h2>
		<?
		
		require("../config.inc.php");
		$admin_id = $_GET['admin_id'];
		$sql="select * from admin where admin_id = '$admin_id'";
		$table=mysql_query($sql) or die(mysql_error());
		if($num_rows=mysql_num_rows($table)) {
			if($row=mysql_fetch_array($table)) {
				if($row['admin_status'] == '1'){
					$admin_status = "ใช้งานได้";
				}elseif($row['admin_status'] == '3'){
					$admin_status = "Supper User";
				}else{
					$admin_status = "ระงับชั่วคราว";
				}
				echo "<div id=\"admin-line\">\r\n";
				echo "<div id=\"detail\"><strong style=\"color:#1a4d80;\">ชื่อ : </strong>".$row['admin_name']."</div>\r\n";
				echo "<div id=\"detail\"><strong style=\"color:#1a4d80;\">นามสกุล : </strong>".$row['admin_surname']."</div>\r\n";
				echo "<div id=\"detail\"><strong style=\"color:#1a4d80;\">สถานะ : </strong>".$admin_status."</div>\r\n";
				if($_SESSION['admin_status'] == '3'){
					echo "<div id=\"detail\"><strong style=\"color:#1a4d80;\">ชื่อเข้าใช้ : </strong>".$row['admin_username']."</div>\r\n";
					echo "<div id=\"detail\"><strong style=\"color:#1a4d80;\">รหัสผ่าน : </strong>".$row['admin_password']."</div>\r\n";
				}
				echo "</div>\r\n";
			}
		}
		?>