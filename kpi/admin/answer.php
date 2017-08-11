<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- CKE-->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!-- CKE-->
<style>
.answer{
	width:auto;
	height:auto;
}
.answer #bg_title_answer{
	width:auto;
	height:auto;
	
}
.answer #bg_title_answer a{
	color:#333;
	text-decoration:none;
	
}
.answer #bg_title_answer #title_answes{
	width:auto;
	height:auto;
	padding:5px;
	
	background-color:#09F;
	color:#FFF;
	font-weight:bold;
	
	font-size:16px;
}
.answer #bg_title_answer #answer{
	padding:5px;
	border:#CCC 1px dotted;
	color:#333;
}
.answer #bg_title_answer #answer #content{
	float:left;
	width:auto;
}
#action{
	width:200px;
	
	color:#000;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
   <?php 
//include("config.inc.php");
//include("fckeditor/fckeditor.php");

$topic_id=$_GET['topic_id'];
$strSQL = "select * from topic where topic_id=$topic_id";
$result=mysql_query($strSQL);
$rs=mysql_fetch_array($result);
/*echo $rs[topic_detail];*/
?>

<body>
<div class="answer">
	<div id="bg_title_answer">
		<div id="title_answes">
        หัวข้อกระทู้:<?=$rs[topic_subject]?>&nbsp;ตั้งกระทู้โดย:<?=$rs[topic_name]?>&nbsp;ต้้งกระทู้เมื่อ:<?=$rs[topic_update]?>
    	</div>
        <div id="answer">
        <?=$rs[topic_detail]?>
        </div>
    </div> 
    <br style="clear:both" />
    
<?php
$strSQL2="select * from answer where topic_id=$topic_id";
$result2=mysql_query($strSQL2);
if(!$result2){
	echo"data emty";
	}
while($rs2=mysql_fetch_array($result2)){	
$ans_id=$rs2[ans_id];

?>
    
    <div id="bg_title_answer">
		<div id="title_answes">
         ตอบโดย:<?=$rs2[ans_name]?>&nbsp;ตอบเมื่อ:<?=$rs2[ans_update]?>
    	</div>
        <div id="answer">
        	<div id="content">
			
            <?
			$action2=$_GET['action2'];
			$topic_id2=$_GET['topic_id2'];
			
			if($action2=="edit" and $ans_id=="$ans_id2"){
				
			?>
     		<form method="post" action="edit_answer.php">
             <!--CKEditor-->
    <textarea cols="80" id="ans_detail" name="ans_detail" rows="10" ><?=$rs2[ans_detail]?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'ans_detail',{

          
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
    <input type="submit"  value="แก้ไขข้อมูล" />
    <input type="hidden" name="ans_id" value="<?=$ans_id?>" />
    <input type="hidden" name="topic_id" value="<?=$topic_id?>" />
    <input type="button" onclick="parent.location='index.php?page=answer&topic_id=<?=$topic_id?>'" value="ยกเลิกการแก้ไข" />
    </form>
	<?
			
			}else{
				echo"$rs2[ans_detail]";
				
				?>
                <div id="action">
           	 <a onClick="return confirm('คุณต้องการลบข้อมูลนี้ ?');" href="del_answer.php?ans_id=<?=$rs2[ans_id]?>&topic_id=<?=$topic_id?>"><img src="images/b_drop.png" border="0" />ลบคำตอบนี้ </a>
            <a href="index.php?page=answer&action2=edit&ans_id2=<?=$ans_id?>&topic_id=<?=$topic_id?>">
            <img src="images/b_edit.png" border="0" />
            แก้ไขคำตอบนี้
            </a>
            </div>
                <? 
			
			}
			
	?>
            </div>
        
        	
            <br style="clear:both" />
        </div>
    </div> 
    
<?

}
?>

 </div>
   