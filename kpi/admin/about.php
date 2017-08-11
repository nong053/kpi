<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/about_us.css" rel="stylesheet" type="text/css">
<!-- CKE-->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!-- CKE-->
<?php 
include("../config.inc.php");
//##### Check table home Start #####
//ทำการ select admin_id ออกมาใช้งาน

$query_about_admin_id="select admin_id from about where admin_id='$member_user_id'";
$result_about_admin_id=$obj_manage_data->select_data_proc($query_about_admin_id);
$rs_num_about=mysql_num_rows($result_about_admin_id);

if(!$rs_num_about){
//ทำการเพิ่มข้อมูลเมื่อมี User ใหม่เข้ามา
$table="about";
$field="admin_id,about_detail";
$admin_detail="
<table>
	<tr>
		<td>บริษัท:</td>
		<td></td>
	</tr>
	<tr>
		<td>ที่อยู่:</td>
		<td></td>
	</tr>
	<tr>
		<td>E-mail:</td>
		<td></td>
	</tr>
	<tr>
		<td>เบอร์โทร:</td>
		<td></td>
	</tr>
</table>

";
$values ="'$member_user_id','$admin_detail'";
$obj_manage_data->insert_data($table,$field,$values);
}
//##### Check table home end #####

$strSQL="select * from about where admin_id=$member_user_id";
$result=mysql_query($strSQL);
$rs=mysql_fetch_array($result);
$about_detail=$rs[about_detail];
$about_title=$rs[about_title];
$about_detail_eng=$rs[about_detail_eng];
$about_map=$rs[about_map];
?>
<div class="content_about_us">
	<div id="about_us">

<!--
     <form name="form1" method="post" action="add_picture.php" enctype="multipart/form-data">
   <table>
   		<tr>
        	<td>
            upload รูปภาพ
            </td>
        </tr>
        <tr>
        	<td>
            <input type="file" name="filUpload">
            </td>
           <td>
           	<input type="hidden" name="pic_type" value="about" >
            <input name="btnSubmit" type="submit" value="Submit">
            
           </td>
        </tr>
       
   </table>
   </form>  
 -->  
   
    
    
    
    
    
    
    <form action="process_about.php" method="post"> 
    <table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
			Code แผนที่จาก Google
			</td>
		</tr>
		<tr>
			<td>
				<textarea id="about_map" name="about_map" cols="100" rows="10"><?=$about_map?></textarea>
			</td>
		</tr>
    	<tr>
        	
            <td>
            <div id="about_us_div" style="width:600px;">
           	  <? //$about_title?>
             
              <? //$about_detail?>
            </div>
           
            <br style="clear:both">
            </td>
        </tr>
        <tr><td>รายละเอียดเพิ่มเติม
            </td>
        </tr>
        <tr>
        	
            <td>




<!--CKEditor-->
    <textarea cols="80" id="about_detail" name="about_detail" rows="10" ><?=$about_detail?></textarea>
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
            </td>
       </tr>
       
       <tr><td>Detail
            </td>
        </tr>
        <tr>
        	
            <td>




<!--CKEditor-->
    <textarea cols="80" id="about_detail_eng" name="about_detail_eng" rows="10" ><?=$about_detail_eng?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'about_detail_eng',{

          
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
            </td>
       </tr>
       <tr>
            
            	
                <td>
                <input type="submit" value="Submit"> <input type="reset" value="Cancel">
                </td>
            
        </tr>
    </table>
    </form>
    </div>
</div>

