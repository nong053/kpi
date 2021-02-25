<? session_start();

 ?>
<!-- CKE-->
<link rel="stylesheet" href="../jquery-ui/css/cupertino/jquery-ui-1.10.3.custom.min.css" type="text/css" media="all" />
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!-- CKE-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	width:130px;
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
.button {
    width: auto;
    border: 1px solid #999;
    background: #fff url(images/input.jpg) left bottom repeat-x;
    padding: 3px;
}
</style>

<br style="clear:both"  />



<form action="#" method="post" name="frm-admin" id="frm-admin-form">
<strong>ข้อมูลองค์กร </strong>
<div id="admin-line-frm">
<div id="frm-admin" style="text-align: right; padding-right:5px;">ชื่อบริษัท</div>
<div id="frm-admin2">
  <input name="admin_name" type="text" class="frm-text" value="<?=$vAadmin_name1?>" />
</div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin" style="text-align: right; padding-right:5px;">โลโก้บริษัท</div>
<div id="frm-admin2"><input name="admin_surname" type="file" class="" value="<?=$vAdmin_surname?>"></div>
<br style="clear:both"  />
</div>

<div id="admin-line-frm">
<div id="frm-admin" style="text-align: right; padding-right:5px;">พื้นหลัง</div>
<div id="frm-admin2"><input name="admin_surname" type="text" class="frm-text" style='width:80px' value="#FFFFFF"></div>
<br style="clear:both"  />
</div>



<div id="admin-line-frm">
<div id="frm-admin">
	<strong>ข้อมูลข่าวสาร</strong>
</div>
<div id="frm-admin2" style='width:auto;'>

<!-- <input name="admin_surname" type="text" class="frm-text" style='width:80px' value="#FFFFFF"> -->
	<!--CKEditor-->
    <textarea cols="80"  id="about_detail" name="about_detail" rows="10" ><?=$about_detail?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'about_detail',{

          
            filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
            filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
            filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

            } );
        //]]>
    </script>
    <!--CKEditor-->
	
	
</div>
<br style="clear:both"  />
</div>
<div id="admin-line-frm">
<div id="frm-admin2">
<input class="button" name="admin_id" id="admin_id" type="submit" value="บันทึก">
<input class="button" name="action" id="action" type="hidden" value="edit">
<input class="button" name="admin_id" id="admin_id" type="hidden" value="<?=$_SESSION['admin_id']?>">
<input class="button" name="admin_id" id="admin_id" type="reset" value="ยกเลิก">
</div>
<br style="clear:both"  />
</div>
</form>

