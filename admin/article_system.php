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
?>


<title>จัดการ บทความ</title>
<div id="dev_text" style="font-size:13px; font-weight:bold; color:#FFF; padding:5px; background-color:#333;">จัดการ บทความ(Management Article)</div>
<div class="content_about_us" style="background-color:#FFF;">
	<div id="about_us">
    
    
    
    
    
    
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	
            <td width="14%">
             <div id="devtext_title">ลำดับ.  
            </div>       
            </td>
            <td width="19%">
             <div id="devtext_title">หัวข้อ(Title)</div>        
            </td>
           
            <td width="18%">
             <div id="devtext_title"><br style="clear:both" /></div>        
            </td>
            <td width="38%">
             <div id="devtext_title">หมวดเมนู(Main menu)</div>        
            </td>
            <td width="38%">
             <div id="devtext_title">แสดงข้อมูล</div>        
            </td>
            <td width="11%">
             <div id="devtext_title">จัดการ</div>
            </td>
        </tr>
<? 
$action_article=$_GET['action_article'];
$main_menu_id_edit=$_GET['menu_id'];
if($action_article=="edit"){
$article_id=$_GET['article_id'];
$strSQL="select * from article where article_id=$article_id";
$result=mysql_query($strSQL);
$rs=mysql_fetch_array($result);

$article_name_eng_edit=$rs[article_name_eng];
$article_title_eng_edit=$rs[article_title_eng];
$article_detail_eng_edit=$rs[article_detail_eng];


$article_show_edit=$rs[article_show];

$article_detail_edit=$rs[article_detail];
$article_title_edit=$rs[article_title];
$main_menu_id_edit=$rs[main_menu_id];
$article_id=$rs[article_id];
$action_article="edit";
$article_name_edit=$rs[article_name];



}else{
	$action_article="add";
}

$strSQL="select * from article where admin_id='$member_user_id'";
$result=mysql_query($strSQL);
$i=1;
$SQLposition = new database();
while($rs=mysql_fetch_array($result)){
$article_name_eng=$rs[article_name_eng];
$article_title_eng=$rs[article_title_eng];
$article_detail_eng=$rs[article_detail_eng];



$article_detail=$rs[article_detail];
$article_title=$rs[article_title];
$article_del_id=$rs[article_id];
$main_menu_id=$rs[main_menu_id];
$article_show=$rs[article_show];
$action_article_del="del";

$article_name=$rs[article_name];


			

?>	
<tr>
	<td>
    <?=$i?>
    </td>
    <td>
 
     <?
        if(strlen($article_name)>30){
		$article_name=mb_substr($article_name,0,30,"UTF-8")."...";
		}else{
		$article_name=$article_name;
		}
		echo"$article_name";
		
		if(strlen($article_name_eng)>30){
		$article_name_eng=mb_substr($article_name_eng,0,30,"UTF-8")."...";
		}else{
		$article_name_eng=$article_name_eng;
		}
		echo"($article_name_eng)";
		?>
    </td>
    <td>
    	<? /*
        if(strlen($article_detail)>30){
		$article_detail=mb_substr($article_detail,0,30,"UTF-8")."...";
		}else{
		$article_detail=$article_detail;
		}
		echo"$article_detail";*/
		?>
    </td>
    	
    <td>
    <?
    	
		$strSQL3="select * from main_menu where main_menu_id='$main_menu_id'";
		$result3=mysql_query($strSQL3);
		$rs3=mysql_fetch_array($result3);
		echo "$rs3[main_menu_name]($rs3[main_menu_name_eng])";
		
	
	
	
	/*$strSQL3="select * from main_menu where main_menu_id='$main_menu_id'";
		$result3=mysql_query($strSQL3);
		$rs3=mysql_fetch_array($result3);
		echo $rs3[main_menu_name];
$fc= new database();
$test=$fc->tableSQL("main_menu");
$num=mysql_num_rows($test);
$rs=mysql_fetch_array($test);
echo $rs[main_menu_id];*/
		?>
    </td>
    <td>
    <?=$article_show?>
    </td>
    <td>
    <a href="action_article_system.php
?article_del_id=<?=$article_del_id?>&action_article_del=<?=$action_article_del?>">
    <img src="../images_system/b_drop.png" border="0" />
    </a>
    &nbsp;
    <a href="index.php?page=article_system&action_article=edit&article_id=<?=$article_del_id?>">
    <img src="../images_system/b_edit.png"  border="0"/>
    </a>
    </td>
</tr>
<?
$i++;
}
?>
</table>
<br style="clear:both" />
<br style="clear:both" />
<form action="action_article_system.php" method="post" enctype="multipart/form-data"> 
<table border="0" cellpadding="0" cellspacing="0" width="770">
    	
        
        <tr>
        	<td width="705">
            	<div id="txt" style="padding:5px 5px 5px 0px;"><b>หมวดเมนู(Main Menu)</b></div>
            </td>
        </tr>
        <tr>
        	<td>
            <?
			if($_GET['article_id']!=""){
			}
			$strSQL="select * from main_menu where admin_id='$member_user_id'";
			$result=mysql_query($strSQL);
			$num=mysql_num_rows($result);
			
			
			/*$ps = new database();
			$ps->selectSQL("main_menu");
			$result=mysql_query($ps);
			$num=mysql_num_rows($ps);
			*/?>
            
            <select name="main_menu_id">
            	
            <?
			for($i=1;$i<=$num;$i++)
			{
				$rs=mysql_fetch_array($result);
				if($main_menu_id_edit==$rs[main_menu_id]){
				?>
		  		<option selected="selected" value="<?=$rs[main_menu_id];?>">
		    		<?=$rs[main_menu_name];?>(<?=$rs[main_menu_name_eng];?>)
	      		</option>
		  		<?
				}else{
				
				?>
            	<option value="<?=$rs[main_menu_id];?>">
                	<?=$rs[main_menu_name];?>(<?=$rs[main_menu_name_eng];?>)
                </option>
            	<?
				}
			}
			?>
            </select>
            
            </td>
        </tr>
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
            	<b>หัวข้อ</b>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            
            <input type="text" name="article_name" value="<?=$article_name_edit?>" />

            </td>
        </tr>
         <tr>
        	<td width="705">
            <div id="txt" style="padding:5px 5px 5px 0px;">
            	<b>Title</b>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            
            <input type="text" name="article_name_eng" value="<?=$article_name_eng_edit?>" />

            </td>
        </tr>
         <tr>
        	<td width="705">
            <div id="txt" style="padding:5px 5px 5px 0px;">
            	<b>รายละเอียดย่อย</b>
            </div>
            </td>
        </tr>
        <tr>
            <td>
           <textarea name="article_title" cols="80" rows="7"><?=$article_title_edit?></textarea>
           

            </td>
        </tr>
        
        
        <tr>
        	<td width="705">
            <div id="txt" style="padding:5px 5px 5px 0px;">
            	<b>Title Detail</b>
            </div>
            </td>
        </tr>
        <tr>
            <td>
           <textarea name="article_title_eng" cols="80" rows="7"><?=$article_title_eng_edit?></textarea>
           

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
                <input type="submit" value="Sumit Now">
                </td>
            </tr>
        </tr>
    </table>
    </form>
    </div>
</div>

