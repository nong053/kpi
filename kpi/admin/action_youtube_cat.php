<?
include("../config.inc.php");
$id_cat_youtupe=$_GET['id_cat_youtupe'];
$id_cat_youtupe2=$_POST['id_cat_youtupe'];
$action1=$_GET['action'];
$action2=$_POST['action'];
$admin_id=$_POST['admin_id'];

//echo"action2$action2";
$title_cat_youtupe=$_POST['title_cat_youtupe'];

//echo"action$action2<br>";
//echo"title_cat_youtupe=$title_cat_youtupe";
//echo"test test$title_cat_youtupe<br>";

$cat_youtupe=$_POST['cat_youtupe'];
if($action1=="del")
{


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
	
	
	
	//$youtupe_cat_path = iconv("UTF-8","windows-874",$id_cat_youtupe);
	$youtupe_cat_path = "../youtupe/" . $id_cat_youtupe . "/";
	if (is_dir($youtupe_cat_path)){
		remove_dir($youtupe_cat_path);
	}
/* catลบรูปภาพ*/





$strSQL1="delete from cat_youtupe where id_cat_youtupe=$id_cat_youtupe";
$result=mysql_query($strSQL1);
if(!$result){
	echo"mysql_query error".mysql_error();}
	else{
	$strSQL2="select * from youtupe where id_cat_youtupe=$id_cat_youtupe";	
	$result2=mysql_query($strSQL2);
	$num=mysql_num_rows($result2);
	//echo"num$num";
		for($i=1;$i<=$num;$i++){
		$strSQL3="delete from youtupe where id_cat_youtupe=$id_cat_youtupe";
		$result3=mysql_query($strSQL3);
		}
	}
	
	echo"<script>window.location=\"index.php?page=vdo_system&select_page=youtube_cat\";</script>";
	
	
}else if($action2=="add"){

	$strSQL="insert into cat_youtupe(title_cat_youtupe,admin_id)values('$title_cat_youtupe','$admin_id')";
	$result=mysql_query($strSQL);
	$strSQL2="select * from cat_youtupe where title_cat_youtupe='$title_cat_youtupe'";
	$result2=mysql_query($strSQL2);
	if(!$result2){
		echo"error".mysql_error();
		}
	$rs2=mysql_fetch_array($result2);
	
	$id_cat_youtupe=$rs2[id_cat_youtupe];
	
	if(!$result){echo"mysql_query error".mysql_error();
		}else{
			$youtupe_path="../youtupe/";
			if(!is_dir($youtupe_path)){
				umask(0);
			mkdir($youtupe_path,0777);
				}

			$youtupecat_path="../youtupe/".$id_cat_youtupe;
			if(!is_dir($youtupecat_path)){
			umask(0);
			mkdir($youtupecat_path,0777);
				}	
				echo"<script>window.location=\"index.php?page=vdo_system&select_page=youtube_cat\";</script>";
				}
			
			
			
}else if($action2=="edit"){
	//echo"เข้ามานี้edit<br>";
	//echo"id$id_cat_youtupe2<br>";
	$strSQL="update cat_youtupe set title_cat_youtupe='$title_cat_youtupe' where id_cat_youtupe='$id_cat_youtupe2' ";
	$result=mysql_query($strSQL);
	if(!$result){echo"error".mysql_error();
	}else{echo"<script>window.location=\"index.php?page=vdo_system&select_page=youtube_cat\";</script>";}
	
	
}
?>
