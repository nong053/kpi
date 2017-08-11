<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
#dev_text{
font-size:16px; 
font-weight:bold; 
color:#FFF; 
padding:5px; 
background-color:#333;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
//$new_tour=$_GET['new_tour'];รับจาก action_tour
$id_tour=$_GET['id_tour'];//รับจาก action_tour
$edit_pictour=$_GET['edit_pictour'];

if(!$id_tour){
?>
<!--<div id="dev_text" style="font-size:18px; font-weight:bold; color:#FFF; padding:5px; background-color:#333;">
BIG BANNER 800 X 400 px
</div>-->
	
	<table cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td width="10%">
            <div id="dev_text">
            <center>
            ลำดับ
            </center>
            </div>
            </td>
            <td width="50%">
            <div id="dev_text">
            ทัวร์
            </div>
            </td>
            <td width="21%">
            <div id="dev_text">
            <center>
            จัดการรูปภาพ
            </center>
            </div>
            </td>
        </tr>
        <?
		$strSQL="select * from tour_add ";
		$result=mysql_query($strSQL);
		if(!$result){
			echo"error".mysql_error();
		}else{
			$i=1;
			while($rs=mysql_fetch_array($result)){
				$name_tour=$rs[name_tour];
				$id_tour=$rs[id_tour];
		
		?>
        <tr>
        	<td>
            <center>
            <?=$i?>
            </center>
            </td>
            <td>
           	<?=$name_tour?>
            </td>
            <td>
            <center>
            <!--
            <a href="index.php?page=tour&select_tour=add_pictour&id_tour=<?=$id_tour?>">
            เพิ่ม
            </a>
            &nbsp;-->
            
            
            <a href="index.php?page=tour&select_tour=add_pictour&id_tour=<?=$id_tour?>&edit_pictour=edit_pictour">
            <img src="../images_system/b_insrow.png" border="0" />
            </a>
            &nbsp;
            <a href="action_tour.php?id_tour=<?=$id_tour?>&action=del_dir_pic&name_tour=<?=$name_tour?>">
            <img src="../images_system/b_drop.png" border="0" />
            </a>
            </center>
            </td>
        </tr>
        <?
			$i++;
			}//while
		
  	
	}//if result
	?>
    </table>
    

    
    
<?
}else{// new tour come


	$strSQL_nametour="select * from tour_add where id_tour='$id_tour'";
	$result_nametour=mysql_query($strSQL_nametour);
	if(!$result_nametour){
	echo"error".mysql_error();
	}
	$rs_nametour=mysql_fetch_array($result_nametour);
	$nametour=$rs_nametour[name_tour];
	

if($edit_pictour){
$strSQL="select * from tour_pic where id_tour='$id_tour'";
$result=mysql_query($strSQL);

	if(!$result){
		echo"error".mysql_error();
	}else{
		?>
        <table width="100%" cellpadding="0" cellspacing="0">
        	<tr>
            	
           	 	<td width="20%">
                <div id="dev_text">
                <center>
             	ลำดับ
                </center>
                </div>
             	</td>
             	<td width="69%">
                <div id="dev_text">
             	รูปทัวร์
                </div>
             	</td>
                <td width="11%">
                <div id="dev_text">
             	จัดการ
                </div>
             	</td>
            </tr>
           	
		
		<?
		$i=1;
		while($rs=mysql_fetch_array($result)){
		$name_pic_tour=$rs[name_pic_tour];
		$id_pic_tour=$rs[id_pic_tour];
		
		?>
            
			<tr>
            	<td>
                <center>
                <?=$i?>
                </center>
            	</td>
            	<td>
                <img src="../mypic_tour/<?=$id_tour?>/<?=$name_pic_tour?>" width="150" height="80"/>
                
                </td>
                <td>
                <center>
                <a href="action_tour.php?id_tour=<?=$id_tour?>&id_pic_tour=<?=$id_pic_tour?>&action=del_pic&name_pic_tour=<?=$name_pic_tour?>">
               <img src="../images_system/b_drop.png" border="0" />
                </a>
                </center>
                </td>
            </tr>
            
		<?
        $i++;
		}
	?>
    </table>
    <?
	}

$text_title="กำลังแก้ไขรูปภาพทัวร์";
}else{
$text_title="กำลังเพิ่มรูปภาพทัวร์";
}
?>
<br style="clear:both" />
<div id="dev_text" style="font-size:16px; font-weight:bold; color:#FFF; padding:5px; background-color:#333;">
<?=$text_title?>:<?=$nametour?>
</div>
<form action="action_tour.php" method="post" enctype="multipart/form-data">
<table>
	<tr>
    	<td>
        รูปภาพ1
        </td>
        <td>
       <input type="file" name="pictour[]" />
        </td>
    </tr>
    <tr>
    	<td>
        รูปภาพ2
        </td>
        <td>
       <input type="file" name="pictour[]" />
        </td>
    </tr>
    <tr>
    	<td>
        รูปภาพ3
        </td>
        <td>
       <input type="file" name="pictour[]" />
        </td>
    </tr>
    <tr>
    	<td>
        รูปภาพ4
        </td>
        <td>
       <input type="file" name="pictour[]" />
        </td>
    </tr>
    <tr>
    	<td>
        
        </td>
        <td>
        <input type="hidden" name="id_tour" value="<?=$id_tour?>" />
        <input type="hidden" name="action" value="add_pictour" />
       <input type="submit" name="add_pictour" value="บันทึกรูปภาพ" style="width:100px; height:20px; background-color:#CCC; border:#999 solid 1px;" />
        </td>
    </tr>
</table>
</form>
<?
}
?>
</body>
</html>