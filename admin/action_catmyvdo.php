<?
include("../config.inc.php");
$id_catmyvdo=$_GET['id_catmyvdo'];//2del
$id_catmyvdo2=$_POST['id_catmyvdo'];
$action1=$_GET['action'];
$action2=$_POST['action'];//1
$name_catmyvdo=$_POST['name_catmyvdo'];//1
$cat_myvdo=$_POST['cat_myvdo'];

//echo"action2$action2";
//echo"action$action2<br>";
//echo"title_cat_myvdo=$title_cat_myvdo";
//echo"test test$title_cat_myvdo<br>";


if($action1=="del")
{
//echo"here del<br>";
//echo"id_catmyvdo$id_catmyvdo<br>";

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
	$catmyvdo_path = "../myvdo/" . $id_catmyvdo . "/";
	if (is_dir($catmyvdo_path)){
		remove_dir($catmyvdo_path);
	}
/* catลบรูปภาพ*/





$strSQL1="delete from catmyvdo where id_catmyvdo=$id_catmyvdo";
$result=mysql_query($strSQL1);
if(!$result){
	echo"mysql_query error".mysql_error();}
	else{
	$strSQL2="select * from myvdo where id_catmyvdo=$id_catmyvdo";	
	$result2=mysql_query($strSQL2);
	$num=mysql_num_rows($result2);
	//echo"num$num";
		for($i=1;$i<=$num;$i++){
		$strSQL3="delete from myvdo where id_catmyvdo=$id_catmyvdo";
		$result3=mysql_query($strSQL3);
		}
	}
	
	echo"<script>window.location=\"index.php?page=vdo_system\";</script>";
	
	
}else if($action2=="add"){
	
	if($name_catmyvdo==""){
		echo"<script>alert(\"ใส่ข้อมูลให้ถูกต้อง\");</script>";
		echo"<script>window.location=\"index.php?page=vdo_system\";</script>";
		//echo"here null";
		exit();
	}
	//เช็คชื่อซ้ำ
	$check_cat="select * from catmyvdo";
	$result_cat=mysql_query($check_cat);
	$num_cat=mysql_num_rows($result_cat);
	if($num_cat==5){
			echo"<script>alert(\"เพิ่มหมวดวีดีโอได้สูงสุด5หมวดครับ\");</script>";
			echo"<script>window.location=\"index.php?page=vdo_system\";</script>";
			exit();
	}
	
	
	
	$check_name="select * from catmyvdo where name_catmyvdo='$name_catmyvdo'";
	$result_name=mysql_query($check_name);
	if($result_name){
	$num=mysql_num_rows($result_name);
	}
	
	if($num){
		echo"<script>alert(\"ชื่อหมวดวีดีโอซ้ำครับ\");</script>";
		echo"<script>window.location=\"index.php?page=vdo_system\";</script>";
		}else 
		{
		
	$strSQL="insert into catmyvdo(name_catmyvdo)values('$name_catmyvdo')";
	$result=mysql_query($strSQL);
	$strSQL2="select * from catmyvdo where name_catmyvdo='$name_catmyvdo'";
	$result2=mysql_query($strSQL2);
	if(!$result2){
		echo"error".mysql_error();
		}
	$rs2=mysql_fetch_array($result2);
	
	$id_catmyvdo=$rs2[id_catmyvdo];
	
	if(!$result){echo"mysql_query error".mysql_error();
		}else{
			$myvdo_path="../myvdo/";
			if(!is_dir($myvdo_path)){
				umask(0);
			mkdir($myvdo_path,0777);
				}

			$catmyvdo_path="../myvdo/".$id_catmyvdo;
			if(!is_dir($myvdocat_path)){
			umask(0);
			mkdir($catmyvdo_path,0777);
				}	
				echo"<script>window.location=\"index.php?page=vdo_system\";</script>";
				
				}
			
			
	}//if num
}else if($action2=="edit"){
	
		$check_name="select * from catmyvdo where name_catmyvdo=$name_catmyvdo";
	$result_name=mysql_query($check_name);
	if($result_name){
	$num=mysql_num_rows($result_name);
	}
	if($num){
		echo"<script>alert(\"ชื่อหมวดวีดีโอซ้ำครับ\");</script>";
		echo"<script>window.location=\"index.php?page=vdo_system\";</script>";
		}else{
	
	$strSQL="update catmyvdo set name_catmyvdo='$name_catmyvdo' where id_catmyvdo='$id_catmyvdo2' ";
	$result=mysql_query($strSQL);
	if(!$result){echo"error".mysql_error();
	}else{ echo"<script>window.location=\"index.php?page=vdo_system\";</script>";}
	
	
}
}//check num ซ้ำ
?>
