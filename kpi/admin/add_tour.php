<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- pic up date-->
<script type="text/javascript" src="../sum_js/date.js"></script>
<link type="text/css" href="../sum_js/date.css" rel="stylesheet" type="text/css" />
<!-- pic up date-->
<!-- CKE-->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!-- CKE-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?
$name_tour=$_SESSION['name_tour'];
$title_tour=$_SESSION['title_tour'];
$detail_tour=$_SESSION['detail_tour'];
$price_tour=$_SESSION['price_tour'];
$promotion_tour=$_SESSION['promotion_tour'];
$detail_promotion_tour=$_SESSION['detail_promotion_tour'];
$itinerary_tour=$_SESSION['itinerary_tour'];
$date_tour=$_SESSION['date_tour'];
$country_tour=$_SESSION['country_tour'];
?>

<body>

<form action="action_tour.php" method="post">
<table width="100%">
<tr>
	<td>วันที่เดินทาง 
    </td>
    
</tr>
<tr>
	<td>
    
<font face="MS Sans Serif">
<!-- ข้อควรระวัง : ชื่อของ Input จะต้องมี name เป็นค่าเดียวกับที่อยู่ในส่วน <a href=...> ด้วยนะครับ ดูตัวอย่างการใช้
ด้านล่าง สังเกตตรงคำว่า date นะ -->
</font><input name="date_tour" size="20" value="<?=$date_tour?>"> 
<a href="javascript:displayDatePicker('date_tour')">
<img border="0" src="../images_system/formcal.gif" width="16" height="16"></a>

    </td>
</tr>
<tr>
	<td>
    ชื่อทัวร์
    </td>
</tr>
<tr>
    <td>
    <input type="text"  name="name_tour" value="<?=$name_tour?>"/>
    </td>
</tr>

<tr>
	<td>
    ปรเทศ
    </td>
</tr>
<tr>
    <td>
    <!--ประเทศ-->
   
    <select name="country_tour">
    
    <?
    $strSQL_country="select * from country_tour";
	$result_country=mysql_query($strSQL_country);
	while($rs_country=mysql_fetch_array($result_country))
	{		$country_name=$rs_country['country_name'];
			if($country_tour=="$country_name"){
				
			?>
			<option value="<?=$country_name?>" selected ><?=$country_name?></option>
            <?
			}else{
			
			?>
			<option value="<?=$country_name?>"> <?=$country_name?></option>
			<?
			}//if
     }//while
	?>
    
    </select>
    
    
    
    <!--ประเทศ-->
    </td>
</tr>


<tr>
	<td>
    	
    ข้อมูลทัวร์
    </td>
</tr>
<tr>
	<td>
    	<!--CKEditor-->
    <textarea cols="80" id="title_tour" name="title_tour" rows="10" ><?=$title_tour?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'title_tour',{

          
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
    ข้อมูลทัวร์ แบบละเอียด
    </td>
</tr>
<tr>
	<td>
    <!--CKEditor-->
    <textarea cols="80" id="detail_tour" name="detail_tour" rows="10" ><?=$detail_tour?>
    </textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'detail_tour',{

          
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
    ข้อมูลทัวร์ กิจกรรม กำหนดการ
    </td>
<tr>
</tr>
    <td>
     <!--CKEditor-->
    <textarea cols="80" id="itinerary_tour" name="itinerary_tour" rows="10" ><?=$itinerary_tour?>
    </textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'itinerary_tour',{

          
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
    ราคา 
    </td>
<tr>
</tr>
    <td>
    <input type="text" name="price_tour" value="<?=$price_tour?>" />
    </td>
</tr>
<tr>
	<td>
   ราคา โปรโมชั่น
    </td>
</tr>
<tr>
    <td>
    <input type="text" name="promotion_tour" value="<?=$promotion_tour?>" />
    </td>
</tr>
<tr>
	<td>
    รายละเอียดโปรโมชั่น
    </td>
</tr>

<tr>
    <td><textarea name="detail_promotion_tour" cols="50" rows="10"><?=$detail_promotion_tour?></textarea></td>
</tr>
<tr>
	<td>
    ให้ทั่วนี้อยู่<select name="page_select">
    <option value="general">หน้าทั่วไป</option>
    <option value="home">หน้าแรก</option>
    </select>
    </td>
</tr>
<tr>
	<td>
    <input type="hidden" value="add" name="action" />
   <!-- เพิ่มข้อมูลใหม่
    <input type="hidden" value="new_tour" name="new_tour" />-->
   <!-- เพิ่มข้อมูลใหม่-->
    <input type="submit" value="บันทึกข้อมูล" style="width:100px; height:20px; background-color:#CCC; border:#999 solid 1px;" />
    <input type="reset" value="ยกเลิก" style="width:100px; height:20px; background-color:#CCC; border:#999 solid 1px;"  />
    </td>
</tr>

</table>
</form>
</body>
</html>