<? @session_start(); ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?
include("../config.inc.php");

$id_hotel=$_POST['id_hotel'];//รับค่ามา2หน้า คือ 1รับมาจาก add_hotel 2hotel_add_pic



$hotel_cat_id=$_POST['hotel_cat_id'];
echo"hotel_cat_id$hotel_cat_id<br>";
$name_hotel=$_POST['name_hotel'];
$title_hotel=$_POST['title_hotel'];
$detail_hotel=$_POST['detail_hotel'];
$price_hotel=$_POST['price_hotel'];
$promotion_hotel=$_POST['promotion_hotel'];
$detail_promotion_hotel=$_POST['detail_promotion_hotel'];
$map_hotel=$_POST['map_hotel'];
$date=date("d-m-y");
$position_id=$_POST['position_id'];
$province_id=$_POST['province_id'];


//create session


$_SESSION['name_hotel']=$_POST['name_hotel'];
$_SESSION['title_hotel']=$_POST['title_hotel'];
$_SESSION['detail_hotel']=$_POST['detail_hotel'];
$_SESSION['price_hotel']=$_POST['price_hotel'];
$_SESSION['promotion_hotel']=$_POST['promotion_hotel'];
$_SESSION['detail_promotion_hotel']=$_POST['detail_promotion_hotel'];
$_SESSION['map_hotel']=$_POST['map_hotel'];

$_SESSION['province_id']=$_POST['province_id'];


echo"date$date<br>";
echo"1$name_hotel<br>";
echo"2$title_hotel<br>";
echo"3$detail_hotel<br>";
echo"4$price_hotel<br>";
echo"5$promotion_hotel<br>";
echo"6$detail_promotion_hotel<br>";
echo"7111$map_hotel<br>";
echo"8$date_hotel<br>";
echo"9$province_id<br>";
echo"10$position_id<br>";



$action1=$_POST['action'];
$action2=$_GET['action'];
if($action1=="add"){
/*	if(!$name_hotel){
				echo"<script>alert(\"ใส่ชื่อ โรงแรม ด้วยครับ\");</script>";
				echo"<script>window.location=\"index.php?page=hotel_system\";</script>";
				exit();
		}
$strSQL_check_name="select * from hotel_add where name_hotel='$name_hotel'";
$result_check_name=mysql_query($strSQL_check_name);
if($result_check_name){
$num_check_name=mysql_num_rows($result_check_name);
	if($num_check_name){
				echo"<script>alert(\"ชื่อ โรงแรมนี้มีอยู่ในระบบแล้วครับ\");</script>";
				echo"<script>window.location=\"index.php?page=hotel_system\";</script>";
				exit();
	}
}*/
//del session

unset($_SESSION['name_hotel']);
unset($_SESSION['title_hotel']);
unset($_SESSION['detail_hotel']);
unset($_SESSION['price_hotel']);
unset($_SESSION['promotion_hotel']);
unset($_SESSION['detail_promotion_hotel']);
unset($_SESSION['map_hotel']);
unset($_SESSION['province_id']);




$strSQL="insert into hotel_add(hotel_cat_id,name_hotel,position_id,title_hotel,detail_hotel,price_hotel,promotion_hotel,detail_promotion_hotel,update_hotel,map_hotel)values('$hotel_cat_id','$name_hotel','$position_id','$title_hotel','$detail_hotel','$price_hotel','$promotion_hotel','$detail_promotion_hotel','$date','$map_hotel')";


	$result=mysql_query($strSQL);
	if(!$result){
		echo"error".mysql_error();
	}else{
		$strSQL="select * from hotel_add where name_hotel='$name_hotel'";
		
		$result=mysql_query($strSQL);
			if(!$result){
			echo"error".mysql_error();
			}
			$rs=mysql_fetch_array($result);
			$id_hotel=$rs[id_hotel];//get id_hotel
			/*
		    session_unregister("name_hotel");
            session_unregister("title_hotel");
            session_unregister("detail_hotel");
            session_unregister("price_hotel");
            session_unregister("promotion_hotel");
            session_unregister("detail_promotion_hotel");
            session_unregister("map_hotel");
            session_unregister("date_hotel");*/
		
		/*echo"<script>alert(\"จัดเก็บข้อมูลโรงแรมเรียบร้อยแล้ว ไปจัดการรูปภาพของโรงแรมต่อครับ\");</script>";*/
		/*echo"<script>window.location=\"index.php?page=hotel_system&select_page=hotel_add_pic&id_hotel=$id_hotel&edit_pic_hotel=edit_pic_hotel\";</script>";*/
		
		/*header("location:index.php?page=hotel_system&select_page=hotel_add_pic&id_hotel=$id_hotel&hotel_edit_pic=hotel_edit_pic");*/
		}

}

if($action1=="add_picfile"){
//echo"here add $id_hotel ss";

			$pic_hotel_path="../mypic_hotel/";
			if(!is_dir($pic_hotel_path)){
				
				
				umask(0);
			$pic_hotel_path=mkdir($pic_hotel_path,0777);
				if($pic_hotel_path){
					$pic_hotel_id_path="../mypic_hotel/$id_hotel/";
					
					if(!is_dir($pic_hotel_id_path)){
					umask(0);
				
			    	 mkdir($pic_hotel_id_path,0777);
					 
					}
					
				}
			
			
			}else{//ถ้ามี path $pic_hotel_path แล้ว มาสร้าง folder นี้เลย
			
					$pic_hotel_id_path="../mypic_hotel/$id_hotel/";
					
					if(!is_dir($pic_hotel_id_path)){
					umask(0);
			    	mkdir($pic_hotel_id_path,0777);
					}
					
					
			}
			
		$num= count($_FILES['picfile']['name']);
		
		for($i = 0; $i <$num; $i++){
		
		$num_check0=$_FILES['picfile']['tmp_name'][0];
		$num_check1=$_FILES['picfile']['tmp_name'][1];
		$num_check2=$_FILES['picfile']['tmp_name'][2];
		$num_check3=$_FILES['picfile']['tmp_name'][3];
		if($num_check0=="" and $num_check1=="" and $num_check2=="" and $num_check3==""){
			echo"<script>alert(\"ใส่รูปภาพด้วยครับ\");</script>";
			echo"<script>window.location=\"index.php?page=hotel_system&select_page=hotel_add_pic&id_hotel=$id_hotel\";</script>";
			exit();
		}
		
		
		copy($_FILES['picfile']['tmp_name'][$i],"../mypic_hotel/$id_hotel/".$_FILES['picfile']['name'][$i]);
		
		if($_FILES['picfile']['name'][$i]!=""){
			$strSQL="insert into hotel_pic(name_pic_hotel,id_hotel)values('".$_FILES['picfile']['name'][$i]."','$id_hotel')";
			$result=mysql_query($strSQL);
			if(!$result){
			echo"error".mysql_error();
			}else{
			echo"<script>window.location=\"index.php?page=hotel_system&select_page=hotel_add_pic&id_hotel=$id_hotel&hotel_edit_pic=hotel_edit_pic\";</script>";
			}
		}//if sheck values is null
	}
	
			
			
}
if($action2=="del_dir_pic"){
	$id_hotel=$_GET['id_hotel'];
	$name_hotel=$_GET['name_hotel'];
	//echo"here del_pic $id_hotel";
	/* ลบรูปภาพ cat*/
	function remove_dir($dir) { 
	$handle = opendir($dir); 
	while (false!==($item = readdir($handle))) { 
		if($item != '.' && $item != '..') { 
			if(is_dir($dir.'/'.$item))  { 
				remove_dir($dir.'/'.$item); 
			}else{ 
				unlink($dir.'/'.$item); 
			} 
		} 
	} 
	closedir($handle); 
	if(rmdir($dir)) { 
		$success = true; 
	}        
	return $success; 
	} 
	
	
	
	//$myvdo_cat_path = iconv("UTF-8","windows-874",$id_catmyvdo);
	$mypic_hotel_path = "../mypic_hotel/" . $id_hotel. "/";
	if (is_dir($mypic_hotel_path)){
		remove_dir($mypic_hotel_path);
	}
	
/* catลบรูปภาพ*/
	$strSQL="delete from hotel_pic where id_hotel=$id_hotel";
	$result=mysql_query($strSQL);
	if(!$result){
	echo"error".mysql_query();
	}else{
	echo"<script>alert(\"ระบบได้ลบรูปภาพของ โรงแรม $name_hotel ทั้งหมดแล้ว\");</script>";
	echo"<script>window.location=\"index.php?page=hotel_system&select_page=hotel_add_pic\";</script>";
	}
	

}
if($action2=="del_pic"){
//echo"here del_pic";
$id_hotel=$_GET['id_hotel'];
$id_pic_hotel=$_GET['id_pic_hotel'];
$name_pic_hotel=$_GET['name_pic_hotel'];

//echo"id_pic_hotel$id_pic_hotel";
	

	$path_picture="../mypic_hotel/$id_hotel/$name_pic_hotel";
	
	//echo"path_big_picture$path_big_picture";
	if($path_picture){	
	unlink("$path_picture");
	$strSQL="delete from hotel_pic where id_pic_hotel='$id_pic_hotel'";
	$result=mysql_query($strSQL);
	if(!$result){
	echo"error".mysql_error();
	}else{
	echo"<script>window.location=\"index.php?page=hotel_system&select_page=hotel_add_pic&id_hotel=$id_hotel&hotel_edit_pic=hotel_edit_pic\";</script>";
	
	}
}


}
if($action1=="edit_hotel"){
	$title_hotel=$_POST['title_hotel2'];
	$map_hotel=$_POST['map_hotel2'];
	$page=$_POST['position_id'];
	$province_id=$_POST['province_id'];
	
	
	
	
//echo"here edit<br>";
//echo"date$date<br>";
//echo"1$name_hotel<br>";
//echo"2$title_hotel<br>";
//echo"3$detail_hotel<br>";
//echo"4$price_hotel<br>";
//echo"5$promotion_hotel<br>";
//echo"6$detail_promotion_hotel<br>";
//echo"7$map_hotel<br>";
//echo"8$date_hotel<br>";
//echo"9id_hotel$id_hotel";

	$strSQL="update hotel_add  set name_hotel='$name_hotel',province_id='$province_id',title_hotel='$title_hotel',detail_hotel='$detail_hotel',price_hotel='$price_hotel',promotion_hotel='$promotion_hotel',detail_promotion_hotel='$detail_promotion_hotel',map_hotel='$map_hotel',date_hotel='$date_hotel',update_hotel='$date',page='$page' where id_hotel='$id_hotel'";
	$result=mysql_query($strSQL);
	if(!$result){
	echo"error".mysql_error();
	}else{
	echo"<script>alert(\"แก้ไขข้อมูลเรียบร้อย\");</script>";
	unset($_SESSION['name_hotel']);
	unset($_SESSION['title_hotel']);
	unset($_SESSION['detail_hotel']);
	unset($_SESSION['price_hotel']);
	unset($_SESSION['promotion_hotel']);
	unset($_SESSION['detail_promotion_hotel']);
	unset($_SESSION['map_hotel']);
	unset($_SESSION['date_hotel']);
	/*echo"<script>window.location=\"index.php?page=hotel_system&select_page=edit_hotel\";</script>";*/
	header("location:index.php?page=hotel_system&select_page=edit_hotel");
	}
}

if($action2=="delete_success_hotel"){
	
	$id_hotel=$_GET['id_hotel'];
	$name_hotel=$_GET['name_hotel'];
	$hotel_cat_id=$_GET['hotel_cat_id'];
	$hotel_cat_name=$_GET['hotel_cat_name'];
	
	/* ลบรูปภาพ cat*/
	function remove_dir($dir) { 
	$handle = opendir($dir); 
	while (false!==($item = readdir($handle))) { 
		if($item != '.' && $item != '..') { 
			if(is_dir($dir.'/'.$item))  { 
				remove_dir($dir.'/'.$item); 
			}else{ 
				unlink($dir.'/'.$item); 
			} 
		} 
	} 
	closedir($handle); 
	if(rmdir($dir)) { 
		$success = true; 
	}        
	return $success; 
	} 
	
	
	
	//$myvdo_cat_path = iconv("UTF-8","windows-874",$id_catmyvdo);
	$mypic_hotel_path = "../mypic_hotel/" . $id_hotel. "/";
	if (is_dir($mypic_hotel_path)){
		remove_dir($mypic_hotel_path);
	}
	
/* catลบรูปภาพ*/
	$strSQL="delete from hotel_pic where id_hotel=$id_hotel";
	$result=mysql_query($strSQL);
	if(!$result){
	echo"error1".mysql_query();
	}else{
		$strSQL="delete from hotel_add where id_hotel=$id_hotel";	
		$result=mysql_query($strSQL);
		if(!$result){
		echo"error2".mysql_query();
		}else{
		echo"<script>alert(\"ระบบลบ โรงแรม $name_hotel แล้ว\");</script>";
		/*echo"<script>window.location=\"index.php?page=hotel_system&select_page=edit_hotel\";</script>";*/
		header("location:index.php?page=hotel_system&select_page=hotel_add&action=add&hotel_cat_id=$hotel_cat_id&hotel_cat_name=$hotel_cat_name");
		}
	
	}

}
?>
</body>
</html>
 <a href="index.php?page=hotel_system&select_page=edit_hotel&id_hotel=<?=$id_hotel?>&show_data=show_data">