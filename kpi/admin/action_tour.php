<? @session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?
include("../config.inc.php");

$id_tour=$_POST['id_tour'];//รับค่ามา2หน้า คือ 1รับมาจาก add_tour 2add_pictour




$name_tour=$_POST['name_tour'];
$title_tour=$_POST['title_tour'];
$detail_tour=$_POST['detail_tour'];
$price_tour=$_POST['price_tour'];
$promotion_tour=$_POST['promotion_tour'];
$detail_promotion_tour=$_POST['detail_promotion_tour'];
$itinerary_tour=$_POST['itinerary_tour'];
$date_tour=$_POST['date_tour'];
$date=date("d-m-y");
$page_select=$_POST['page_select'];
$country_tour=$_POST['country_tour'];

//create session
$_SESSION['name_tour']=$_POST['name_tour'];
$_SESSION['title_tour']=$_POST['title_tour'];
$_SESSION['detail_tour']=$_POST['detail_tour'];
$_SESSION['price_tour']=$_POST['price_tour'];
$_SESSION['promotion_tour']=$_POST['promotion_tour'];
$_SESSION['detail_promotion_tour']=$_POST['detail_promotion_tour'];
$_SESSION['itinerary_tour']=$_POST['itinerary_tour'];
$_SESSION['date_tour']=$_POST['date_tour'];
$_SESSION['country_tour']=$_POST['country_tour'];


//echo"date$date";
//echo"1$name_tour";
//echo"2$title_tour";
//echo"3$detail_tour";
//echo"4$price_tour";
//echo"5$promotion_tour";
//echo"6$detail_promotion_tour";
//echo"7$itinerary_tour";
//echo"8$date_tour";


$action1=$_POST['action'];
$action2=$_GET['action'];
if($action1=="add"){
	if(!$name_tour){
				echo"<script>alert(\"ใส่ชื่อทัวร์ด้วยครับ\");</script>";
				echo"<script>window.location=\"index.php?page=tour\";</script>";
				exit();
		}
$strSQL_check_name="select * from tour_add where name_tour='$name_tour'";
$result_check_name=mysql_query($strSQL_check_name);
if($result_check_name){
$num_check_name=mysql_num_rows($result_check_name);
	if($num_check_name){
				echo"<script>alert(\"ชื่อทัวร์นี้มีอยู่ในระบบแล้วครับ\");</script>";
				echo"<script>window.location=\"index.php?page=tour\";</script>";
				exit();
	}
}
//del session

unset($_SESSION['name_tour']);
unset($_SESSION['title_tour']);
unset($_SESSION['detail_tour']);
unset($_SESSION['price_tour']);
unset($_SESSION['promotion_tour']);
unset($_SESSION['detail_promotion_tour']);
unset($_SESSION['itinerary_tour']);
unset($_SESSION['date_tour']);
unset($_SESSION['country_tour']);




$strSQL="insert into tour_add(name_tour,country_tour,title_tour,detail_tour,price_tour,promotion_tour,detail_promotion_tour,itinerary_tour,date_tour,update_tour,page)values('$name_tour','$country_tour','$title_tour','$detail_tour','$price_tour','$promotion_tour','$detail_promotion_tour','$itinerary_tour','$date_tour','$date','$page_select')";


	$result=mysql_query($strSQL);
	if(!$result){
		echo"error".mysql_error();
	}else{
		$strSQL="select * from tour_add where name_tour='$name_tour'";
		
		$result=mysql_query($strSQL);
			if(!$result){
			echo"error".mysql_error();
			}
			$rs=mysql_fetch_array($result);
			$id_tour=$rs[id_tour];//get id_tour
			/*
		    session_unregister("name_tour");
            session_unregister("title_tour");
            session_unregister("detail_tour");
            session_unregister("price_tour");
            session_unregister("promotion_tour");
            session_unregister("detail_promotion_tour");
            session_unregister("itinerary_tour");
            session_unregister("date_tour");*/
		
		echo"<script>alert(\"จัดเก็บข้อมูลเรียบร้อยแล้ว ไปจัดการรูปภาพต่อครับ\");</script>";
		echo"<script>window.location=\"index.php?page=tour&select_tour=add_pictour&id_tour=$id_tour&edit_pictour=edit_pictour\";</script>";
		}

}

if($action1=="add_pictour"){
//echo"here add $id_tour ss";

			$pic_tour_path="../mypic_tour/";
			if(!is_dir($pic_tour_path)){
				
				
				umask(0);
			$pic_tour_path=mkdir($pic_tour_path,0777);
				if($pic_tour_path){
					$pic_tour_id_path="../mypic_tour/$id_tour/";
					
					if(!is_dir($pic_tour_id_path)){
					umask(0);
				
			    	 mkdir($pic_tour_id_path,0777);
					 
					}
					
				}
			
			
			}else{//ถ้ามี path $pic_tour_path แล้ว มาสร้าง folder นี้เลย
			
					$pic_tour_id_path="../mypic_tour/$id_tour/";
					
					if(!is_dir($pic_tour_id_path)){
					umask(0);
			    	mkdir($pic_tour_id_path,0777);
					}
					
					
			}
			
		$num= count($_FILES['pictour']['name']);
		
		for($i = 0; $i <$num; $i++){
		
		$num_check0=$_FILES['pictour']['tmp_name'][0];
		$num_check1=$_FILES['pictour']['tmp_name'][1];
		$num_check2=$_FILES['pictour']['tmp_name'][2];
		$num_check3=$_FILES['pictour']['tmp_name'][3];
		if($num_check0=="" and $num_check1=="" and $num_check2=="" and $num_check3==""){
			echo"<script>alert(\"ใส่รูปภาพด้วยครับ\");</script>";
			echo"<script>window.location=\"index.php?page=tour&select_tour=add_pictour&id_tour=$id_tour\";</script>";
			exit();
		}
		
		
		copy($_FILES['pictour']['tmp_name'][$i],"../mypic_tour/$id_tour/".$_FILES['pictour']['name'][$i]);
		
		if($_FILES['pictour']['name'][$i]!=""){
			$strSQL="insert into tour_pic(name_pic_tour,id_tour)values('".$_FILES['pictour']['name'][$i]."','$id_tour')";
			$result=mysql_query($strSQL);
			if(!$result){
			echo"error".mysql_error();
			}else{
			echo"<script>window.location=\"index.php?page=tour&select_tour=add_pictour&id_tour=$id_tour&edit_pictour=edit_pictour\";</script>";
			}
		}//if sheck values is null
	}
	
			
			
}
if($action2=="del_dir_pic"){
	$id_tour=$_GET['id_tour'];
	$name_tour=$_GET['name_tour'];
	//echo"here del_pic $id_tour";
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
	$mypic_tour_path = "../mypic_tour/" . $id_tour. "/";
	if (is_dir($mypic_tour_path)){
		remove_dir($mypic_tour_path);
	}
	
/* catลบรูปภาพ*/
	$strSQL="delete from tour_pic where id_tour=$id_tour";
	$result=mysql_query($strSQL);
	if(!$result){
	echo"error".mysql_query();
	}else{
	echo"<script>alert(\"ระบบได้ลบรูปภาพของทัวร์ $name_tour ทั้งหมดแล้ว\");</script>";
	echo"<script>window.location=\"index.php?page=tour&select_tour=add_pictour\";</script>";
	}
	

}
if($action2=="del_pic"){
//echo"here del_pic";
$id_tour=$_GET['id_tour'];
$id_pic_tour=$_GET['id_pic_tour'];
$name_pic_tour=$_GET['name_pic_tour'];

//echo"id_pic_tour$id_pic_tour";
	

	$path_picture="../mypic_tour/$id_tour/$name_pic_tour";
	
	//echo"path_big_picture$path_big_picture";
	if($path_picture){	
	unlink("$path_picture");
	$strSQL="delete from tour_pic where id_pic_tour='$id_pic_tour'";
	$result=mysql_query($strSQL);
	if(!$result){
	echo"error".mysql_error();
	}else{
	echo"<script>window.location=\"index.php?page=tour&select_tour=add_pictour&id_tour=$id_tour&edit_pictour=edit_pictour\";</script>";
	
	}
}


}
if($action1=="edit_tour"){
	$title_tour=$_POST['title_tour2'];
	$itinerary_tour=$_POST['itinerary_tour2'];
	$page=$_POST['page_select'];
	$country_tour=$_POST['country_tour'];
	
	
	
	
//echo"here edit<br>";
//echo"date$date<br>";
//echo"1$name_tour<br>";
//echo"2$title_tour<br>";
//echo"3$detail_tour<br>";
//echo"4$price_tour<br>";
//echo"5$promotion_tour<br>";
//echo"6$detail_promotion_tour<br>";
//echo"7$itinerary_tour<br>";
//echo"8$date_tour<br>";
//echo"9id_tour$id_tour";

	$strSQL="update tour_add  set name_tour='$name_tour',country_tour='$country_tour',title_tour='$title_tour',detail_tour='$detail_tour',price_tour='$price_tour',promotion_tour='$promotion_tour',detail_promotion_tour='$detail_promotion_tour',itinerary_tour='$itinerary_tour',date_tour='$date_tour',update_tour='$date',page='$page' where id_tour='$id_tour'";
	$result=mysql_query($strSQL);
	if(!$result){
	echo"error".mysql_error();
	}else{
	echo"<script>alert(\"แก้ไขข้อมูลเรียบร้อย\");</script>";
	unset($_SESSION['name_tour']);
	unset($_SESSION['title_tour']);
	unset($_SESSION['detail_tour']);
	unset($_SESSION['price_tour']);
	unset($_SESSION['promotion_tour']);
	unset($_SESSION['detail_promotion_tour']);
	unset($_SESSION['itinerary_tour']);
	unset($_SESSION['date_tour']);
	echo"<script>window.location=\"index.php?page=tour&select_tour=edit_tour\";</script>";
	}
}

if($action2=="delete_success_tour"){
	
	$id_tour=$_GET['id_tour'];
	$name_tour=$_GET['name_tour'];
	
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
	$mypic_tour_path = "../mypic_tour/" . $id_tour. "/";
	if (is_dir($mypic_tour_path)){
		remove_dir($mypic_tour_path);
	}
	
/* catลบรูปภาพ*/
	$strSQL="delete from tour_pic where id_tour=$id_tour";
	$result=mysql_query($strSQL);
	if(!$result){
	echo"error".mysql_query();
	}else{
		$strSQL="delete from tour_add where id_tour=$id_tour";	
		$result=mysql_query($strSQL);
		if(!$result){
		echo"error".mysql_query();
		}else{
		echo"<script>alert(\"ระบบลบทัวร์ $name_tour แล้ว\");</script>";
		echo"<script>window.location=\"index.php?page=tour&select_tour=edit_tour\";</script>";
		}
	
	}

}
?>
</body>
</html>
 <a href="index.php?page=tour&select_tour=edit_tour&id_tour=<?=$id_tour?>&show_data=show_data">