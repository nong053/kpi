<? ob_start();

$pic_type_page=$_POST['pic_type'];
//$pic_type=$_POST['pic_type'];
$main_menu_id=$_POST['main_menu_id'];

$link=$_POST['pic_link'];
//$position=$_POST['position'];
$pic_detail=$_POST['pic_detail'];
$pic_detail_eng=$_POST['pic_detail_eng'];
$admin_id=$_POST['admin_id'];

$productcat_path="../mypicture/".$admin_id."/";
if(!is_dir($productcat_path)){
umask(0);
mkdir($productcat_path,0777);
}


//echo"$pic_type<br>";
//echo"$link<br>";
//echo"$pic_detail<br>";

	if(copy($_FILES["filUpload"]["tmp_name"],"../mypicture/$admin_id/".$_FILES["filUpload"]["name"]))
	{
		
//echo"hello mycopy";
		//*** Insert Record ***//
		
		include("../config.inc.php");
		//$objDB = mysql_select_db("web_born_db");
		if($link=="" or $link=="http://"){
		$link="";
		}
		$strSQL = "INSERT INTO banner_sum";
		$strSQL .="(pic_name,pic_type,pic_detail,pic_detail_eng,pic_link,main_menu_id,admin_id) VALUES ('".$_FILES["filUpload"]["name"]."','$pic_type','$pic_detail','$pic_detail_eng','$link','$main_menu_id','$admin_id')";
		$objQuery = mysql_query($strSQL);	
		if($objQuery){
			echo"<script>window.location=\"index.php?page=$pic_type_page\";</script>";
			}
	}else{
	echo"<script>alert(\"banner is empty\");</script>";
	echo"<script>window.location=\"index.php?page=banner\";</script>";
	}
?>

