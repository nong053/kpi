<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- CKE-->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!-- CKE-->
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
<?
include("../config.inc.php");
//##### Check manage user login end #####
$member_user_url=trim($_SESSION['member_user_url2']);

//ทำการ select admin_id ออกมาจาก admin
$query_admin="select admin_id from admin where admin_id='".$admin_id."'";
$result_admin=$obj_manage_data->select_data_proc($query_admin);
$rs_admin=mysql_fetch_array($result_admin);

//ถ้าไม่มีaddmin_id ตามที่ loginเข้ามาให้ values =0 คือไม่มีข้อมูลน้นเอง
if(!$rs_admin){
$admin_id =0;
}else{
//ถ้ามีข้อมูล admin_id ให้ valuse = $admin_id ที่อยู่ในtable category product
$admin_id = $rs_admin['admin_id'];
}
//ถ้าการlogin เข้ามาเป็น admin ให้แสดงข้อมูลของ admin 
if($_SESSION['admin_status']=="3"){
$admin_id=1;
}
echo"admin_id".$admin_id;
//##### Check manage user login end #####

?>
<div id="dev_text" style="font-size:18px; font-weight:bold; color:#FFF; padding:5px; background-color:#333;">
SMALL BANNER 280 X 100 px
</div>

<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
    	<td width="62">
        <div id="devtext_title">
        No.
        </div>
        </td>
        <td width="185">
        <div id="devtext_title">
        Small Banner
        </div>
        </td>
        <td width="201">
         <div id="devtext_title">
        Position
        </div>
        </td>
        <td width="262">
        <div id="devtext_title">
       	Banner Detail
        </div>
        </td>
        <td width="142">
        <div id="devtext_title">
       	Banner Link
        </div>
        </td>
        <td width="142">
         <div id="devtext_title">
       	Action
        </div>
        </td>
    </tr>
    <? 
	$action=$_GET['action'];
	if($action=="edit"){
	$pic_id=$_GET['pic_id'];
	
	$strSQL="select * from banner_sum where pic_id=$pic_id";
	//echo"hello";
	$result=mysql_query($strSQL);
	$rs=mysql_fetch_array($result);
	 $pic_type_edit=$rs[pic_type];
	 $pic_detail_edit=$rs[pic_detail];
	 $pic_detail_eng_edit=$rs[pic_detail_eng];
	 $main_menu_id_edit=$rs[main_menu_id];
	 $pic_link_edit=$rs[pic_link];
	 $action_banner="edit_piture.php";
	}else{
		$action_banner="add_picture.php";
	
		
	$strSQL5 = "select * from banner_sum where admin_id=$admin_id";
	$result5=mysql_query($strSQL5);
	$num5=mysql_num_rows($result5);
	$i=1;
	while($rs5=mysql_fetch_array($result5)){	
	$pic_id=$rs5[pic_id];
	$pic_name=$rs5[pic_name];
	$pic_type=$rs5[pic_type];
	$pic_detail=$rs5[pic_detail];
	$pic_link=$rs5[pic_link];
	$main_menu_id=$rs5[main_menu_id];
	
	$strSQL_main_menu="select * from main_menu where main_menu_id='$main_menu_id'";
	$result_main_menu=mysql_query($strSQL_main_menu);
	$rs_main_menu=mysql_fetch_array($result_main_menu);
    

	
	?>
     <tr>
     	<td>
        <center>
        <?=$i?>
        </center>
        </td>
    	<td>
        <img src="../mypicture/<?=$admin_id?>/<?=$pic_name?>" width="20%" height="20%" />
        </td>
        <td>
       
        <?=$rs_main_menu[main_menu_name];?>
        <?=$rs_main_menu[main_menu_name_eng];?>
		
        </td>
        <td>
        <?
        if(strlen($pic_detail)>20){
		$pic_detail=mb_substr($pic_detail,0,20,"UTF-8")."...";
		}else{
		$pic_detail=$pic_detail;
		}
		echo"$pic_detail";
		?>
        </td>
        <td>
        
        <?
        if(strlen($pic_link)>20){
		$pic_link=mb_substr($pic_link,0,20,"UTF-8")."..";
		}else{
		$pic_link=$pic_link;
		}
		echo"$pic_link";
		?>
        </td>
        <td>
        <a href="delete_picture.php?page=banner&pic_id=<?=$pic_id?>&admin_id=<?=$admin_id?>"> <img src="../images_system/b_drop.png" border="0" /></a>
        <a href="index.php?page=banner&pic_id=<?=$pic_id?>&action=edit&pic_type=<?=$pic_type?>"> <img src="../images_system/b_edit.png"  border="0"/></a>
        </td>
     </tr>
	
    
    <?
	$i++;
	}
}
	?>
    
   
    </table>

<form action="<?=$action_banner?>" method="post" enctype="multipart/form-data">
<table>
   		<tr>
        	<td>
            <b>Banner Upload</b>
          </td>
        </tr>
        <? 
		if(!$action=="edit"){
		?>
        <tr>
        	<td>
           
            <input type="file" name="filUpload">
            </td>
        </tr> 
         
        <?
		}
		?>
        <tr>
        	<td>
           <?
		/*
        $pic_type=$_GET['pic_type'];
		$pic_id=$_GET['pic_id'];
		
		$pic[1]="หน้าแรก";
		$pic[2]="หน้าทัวร์";
		$pic[3]="หน้าจองทัวร์";
		$pic[4]="หน้าเว็บบอร์ด";
		
		
		 $strSQL_position="select * from banner_sum where pic_id='$pic_id'";
		 $result_position=mysql_query($strSQL_position);
		 if($result_position){
			 $num_position=mysql_num_rows($result_position);
		 }
         //$picture_important=$rs[picture_important]
		
		 ?>
		<select name="pic_type">
		  <?
		
		for($i=1;$i<=4; $i++){
			if($pic_type==$pic[$i]){
		?>
		  <option selected="selected" value="<?=$pic[$i]?>">
		    <?=$pic[$i]?>
	      </option>
		  <?
		}else{
		?>
		  <option value="<?=$pic[$i]?>">
		    <?=$pic[$i]?>
	      </option>
		  <? 
		}
	}
		*/?>
		<!--  </select>-->
          <?
			$strSQL="select * from main_menu where admin_id='$admin_id'";
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
          
		
           
           
           
           ตำแหน่ง banner
            </td> 
        </tr>
        <tr>
        	<td>
           <b>External Link</b>
            </td>
        </tr>
        <tr>
        	<td>
            <input type="text" name="pic_link" value="<?=$pic_link_edit?>"> ตัวอย่างเช่น http://www.google.com/
            </td>
        </tr>
       
          <tr>
        	<td>รายละเอียด
        	</td>
        </tr>
        <tr>
        	<td>
                   <!--CKEditor-->
    <textarea cols="80" id="pic_detail" name="pic_detail" rows="10" ><?=$pic_detail_edit?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'pic_detail',{
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
        	<td><b>Banner Detail</b>
        	</td>
        </tr>
        <tr>
        	<td>
        <!--CKEditor-->
    <textarea cols="80" id="pic_detail_eng" name="pic_detail_eng" rows="10" ><?=$pic_detail_eng_edit?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'pic_detail_eng',{
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
        
           <td height="26">
           	<input type="hidden" name="pic_type_page" value="banner" >
            <input type="hidden" name="pic_id" value="<?=$pic_id?>" />
			 <input type="hidden" name="admin_id" value="<?=$admin_id?>" />
            <input name="btnSubmit" type="submit" value="Submit Now">
            
           </td>
        </tr>
        
        
       
   </table>
 </form>