<? ob_start();

$pic_type=$_POST['pic_type'];
$banner_detail=$_POST['banner_detail'];
//echo"banner_detail$banner_detail";

	if(copy($_FILES["filUpload"]["tmp_name"],"../home_banner/".$_FILES["filUpload"]["name"]))
	{
		
		//*** Insert Record ***//
		
		include("../config.inc.php");
		//$objDB = mysql_select_db("web_born_db");
		$strSQL = "INSERT INTO home_banner";
		$strSQL .="(banner_name,banner_detail) VALUES ('".$_FILES["filUpload"]["name"]."','$banner_detail')";
		$objQuery = mysql_query($strSQL);	
		if($objQuery){
			echo"<script>window.location=\"index.php?page=$pic_type\";</script>";
			}
	}
?>

