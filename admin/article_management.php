<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/about_us.css" rel="stylesheet" type="text/css">
<!-- CKE-->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!-- CKE-->
<?
include("../config.inc.php");
class database{
	function tableSQL($table)
	{
			
			$strSQL="select * from $table";
			$result=mysql_query($strSQL);
			return $result;
		
	}
}
/*$fc= new database();
$test=$fc->tableSQL("main_menu");
$num=mysql_num_rows($test);
$rs=mysql_fetch_array($test);
echo $rs[main_menu_id];*/

?>
<style>
#devtext_title{
	padding:5px;
	font-weight:bold;
	font-size:13px;
	border-top:#dedede solid 1px;
	border-bottom:#dedede solid 1px;
	background:#efefef;
}
#dev_l{
border-left:#dedede solid 1px;
border-top:#dedede solid 1px;
border-bottom:#dedede solid 1px;
background:#efefef;
	padding:5px;
	font-weight:bold;
	font-size:13px;
}
#dev_r{
border-top:#dedede solid 1px;
border-bottom:#dedede solid 1px;
background:#efefef;
border-right:#dedede solid 1px;
	padding:5px;
	font-weight:bold;
	font-size:13px;
}
</style>
<?php 
/*$banner_id=$_GET['banner_id'];
$action=$_GET['action'];*/
//echo"banner$banner_id<br>";
//echo"action$action";
include("../config.inc.php");
/*include("fckeditor/fckeditor.php");*/
$member_user_id=$_SESSION['member_user_id'];
$main_menu_id=$_GET['menu_id'];
$article_name=$_GET['menu_name'];
$article_name_eng=$_GET['menu_name_eng'];

?>


<title>จัดการ บทความ</title>
<div id="dev_text" style="font-size:13px; font-weight:bold; color:#FFF; padding:5px; background-color:#333;">จัดการ บทความ(Management Article)</div>
<div class="content_about_us" style="background-color:#FFF;">
	<div id="about_us">
    
    
 <?php 
 
$strSQL_article="select * from article where main_menu_id='$main_menu_id' and admin_id='$admin_id'";
$result_article=mysql_query($strSQL_article);
$num=mysql_num_rows($result_article);
if(!$num){
	$action_article="add";
	//$main_menu_id=$rs[main_menu_id];
}else{
	
	$rs=mysql_fetch_array($result_article);
	
	$article_name_eng_edit=$rs[article_name_eng];
	$article_title_eng_edit=$rs[article_title_eng];
	$article_detail_eng_edit=$rs[article_detail_eng];
	
	
	$article_show_edit=$rs[article_show];
	
	$article_name_edit=$rs[article_name];
	$article_detail_edit=$rs[article_detail];
	$article_title_edit=$rs[article_title];
	
	$main_menu_id=$rs[main_menu_id];
	$article_id=$rs[article_id];
	$action_article="edit";
	$article_name=$rs[article_name];
	$article_name_eng=$rs[article_name_eng];
}


 ?>  
    
    
    
    
<form action="action_article_system.php" method="post" enctype="multipart/form-data"> 
<table border="0" cellpadding="0" cellspacing="0" width="770">
    	
    
        
        <tr>
        	<td width="705">
            	<div id="txt" style="padding:5px 5px 5px 0px;"><b>แสดงข้อมูล</b></div>
            </td>
        </tr>
         <tr>
        	<td>
            <?
			$strSQL_article="select * from article where article_id='$article_id'";
			$result_article=mysql_query($strSQL_article);
			$num=mysql_num_rows($result_article);
			$rs_result_article=mysql_fetch_array($result_article);
			$article_show=$rs_result_article[article_show];
			
			/*$ps = new database();
			$ps->selectSQL("main_menu");
			$result=mysql_query($ps);
			$num=mysql_num_rows($ps);
			*/
			
			switch($article_show){
				case"show":$selected1="selected";break;
				case"no":$selected2="selected";break;
			}
			?>
            
            <select name="article_show">
           		<option value="show" <?=$selected1?>>
                แสดง
                </option>
                <option value="no" <?=$selected2?>>
                ไม่แสดง
                </option>
                
            </select>
            
            </td>
        </tr>
       
        
        <tr>
        	<td width="705">
            <div id="txt" style="padding:5px 5px 5px 0px;">
            	<b>(SEO)หัวข้อ</b>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            
            <input type="text" name="article_name" value="<?=$article_name_edit?>" style="width:300px"/>

            </td>
        </tr>
         <tr>
        	<td width="705">
            <div id="txt" style="padding:5px 5px 5px 0px;">
            	<b>(SEO)Title</b>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            
            <input type="text" name="article_name_eng" value="<?=$article_name_eng_edit?>" style="width:300px"/>

            </td>
        </tr>
         <tr>
        	<td width="705">
            <div id="txt" style="padding:5px 5px 5px 0px;">
            	<b>(SEO)รายละเอียดย่อย</b>
            </div>
            </td>
        </tr>
        <tr>
            <td>
           <textarea name="article_title" cols="80" rows="3"><?=$article_title_edit?></textarea>
           

            </td>
        </tr>
        
        
        <tr>
        	<td width="705">
            <div id="txt" style="padding:5px 5px 5px 0px;">
            	<b>(SEO)Title Detail</b>
            </div>
            </td>
        </tr>
        <tr>
            <td>
           <textarea name="article_title_eng" cols="80" rows="3"><?=$article_title_eng_edit?></textarea>
           

            </td>
        </tr>
          
       <tr>
        	<td>
            <div id="txt" style="padding:5px 5px 5px 0px;">
            <b>รายละเอียด</b>
            </div>
        	</td>
        </tr>
        
        <tr>
        	
            <td>




<!--CKEditor-->
    <textarea cols="100%" id="article_detail" name="article_detail" rows="20" ><?=$article_detail_edit?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'article_detail',{

          
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
            <div id="txt" style="padding:5px 5px 5px 0px;">
            <b>More Detail</b>
            </div>
        	</td>
        </tr>
        
        <tr>
        	
            <td>




<!--CKEditor-->
    <textarea cols="100%" id="article_detail_eng" name="article_detail_eng" rows="20" ><?=$article_detail_eng_edit?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'article_detail_eng',{

          
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
                <input type="hidden" value="<?=$action_article?>" name="action_article" />
                <input type="hidden" value="<?=$article_id?>"  name="article_id"/>
                <input type="hidden" value="<?=$main_menu_id?>"  name="main_menu_id"/>
                
                <input type="submit" value="Save">
                </td>
            </tr>
       
    </table>
    </form>
    </div>
</div>

