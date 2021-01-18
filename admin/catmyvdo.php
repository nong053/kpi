<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
#devtext_title{	
	padding:5px;
	font-weight:bold;
	font-size:13px;
	border-top:#dedede solid 1px;
	border-bottom:#dedede solid 1px;
	background:#efefef;
}
#devtext a{
	color:#000;
	text-decoration:none;

	 
}
</style>
<?
if($_GET['action']=="edit"){
$id_catmyvdo=$_GET['id_catmyvdo'];
		 $strSQL="select * from catmyvdo where id_catmyvdo=$id_catmyvdo";
		 $result=mysql_query($strSQL);
		 $rs=mysql_fetch_array($result);
		 $name_catmyvdo=$rs[name_catmyvdo];
		 $id_catmyvdo=$rs[id_catmyvdo];
		 $action="edit";
		 
}else{
	$action="add";
}


?>
<table cellpadding="0" cellspacing="0" width="100%">
	
    <tr >
    	<td width="64">
        <div id="devtext_title" style="border-left:#dedede solid 1px;">
        <center>
        ลำดับ
        </center>
        </div>
        </td>
        <td width="307">
        <div id="devtext_title">
        หมวดวีดีโอ
        </div>
        </td>
        <td width="68">
        <div id="devtext_title" style="border-right:#dedede solid 1px;">
        จัดการ
        </div>
        </td>
    </tr>
	<?
	include("../config.inc.php");
	$strSQL="select * from catmyvdo";
	$result=mysql_query($strSQL);
	$i=1;
	while($rs=mysql_fetch_array($result)){
		
	?>
    <tr >
    	<td width="64"><center>
        <?=$i?>
        </center>
        </td>
        <td width="307">
        <div id="devtext">
        <a href="index.php?page=vdo_system&select_page=myvdo&id_catmyvdo=<?=$rs[id_catmyvdo]?>">
       	<img src="images/downloads.gif" border="0" />
		<?=$rs[name_catmyvdo]?>
        </a>
        </div>
        </td>
        <td width="68">
        <a href="index.php?page=vdo_system&select_page=catmyvdo&id_catmyvdo=<?=$rs[id_catmyvdo]?>&action=edit">
        <img src="../images_system/b_edit.png" border="0">
        </a>
        </a>&nbsp;
        <a href="action_catmyvdo.php?id_catmyvdo=<?=$rs[id_catmyvdo]?>&action=del" onclick="return confirm('ท่านต้องการลบ ข้อมูลหรือไม่ เมื่อท่านลบหมวดวีดีโอ<?=$rs[name_catmyvdo]?> วีดีโอทั้งหมดในหมวดนี้จะถูกลบด้วย');">
        <img src="../images_system/b_drop.png" border="0">
        </a>
         
        </td>
    </tr>
    <?
	$i++;
	}
	?>
</table>

<br style="clear:both">

<form action="action_catmyvdo.php" method="post">
<table>
	<tr>
    	<td>
        ชื่อหมวดวีดีโอ
        </td>
        <td>
        <input type="text" name="name_catmyvdo" value="<?=$name_catmyvdo?>">
        </td>
    </tr>
    <tr>
    	<td>
        </td>
        <td>
        <input type="hidden" value="<?=$action?>" name="action">
        <input type="hidden" value="<?=$id_catmyvdo?>" name="id_catmyvdo">
        <input type="submit" value="Submit Now">
        </td>
    </tr>
</table>
</form>
