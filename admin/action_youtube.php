<? session_start();ob_start();

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? /*
include("../config.inc.php");



$id_youtupe=$_GET['id_youtupe'];
$embed_youtupe=$_POST['vdo'];
$title_youtupe=$_POST['title_vdo'];
$id_cat_youtupe=$_POST['id_cat_youtupe'];
$id_cat_youtupe2=$_GET['id_cat_youtupe'];
$action=$_POST['action'];
$action2=$_GET['action2'];


echo"embed=$embed_youtupe<br>";
echo"title=$title_youtupe<br>";
echo"id_cat_youtupe=$id_cat_youtupe<br>";
echo"action=$action";

if($action=="add"){
	echo"action=$action";
$strSQL="insert into youtupe(id_cat_youtupe,title_youtupe,embed_youtupe)values('$id_cat_youtupe','$title_youtupe','$embed_youtupe')";
$result=mysql_query($strSQL);


if(!$result){
	echo"error".mysql_error();
	}else echo"<script>window.location=\"index.php?page=youtupe&id_cat_youtupe=$id_cat_youtupe\";</script>";
	
}else if($action2=="del"){
	echo"เข้ามาลบข้อมูลตรงนี้<br>";
	echo"id_youtupe$id_youtupe<br>";
	$strSQL2="delete from youtupe where id_youtupe=$id_youtupe";
$result2=mysql_query($strSQL2);
	if(!$result2){
		echo"error".mysql_error();
		}else{echo"<script>window.location=\"index.php?page=youtupe&id_cat_youtupe=$id_cat_youtupe2\";</script>";}
	}
	*/
?>
<?php 
	
		
	/*$product_id = trim($_POST['product_id']);//trim ตัดช่องว่างออก
	$productcat_id = trim($_POST['productcat_id']);

	$product_name = trim($_POST['product_name']);
	$product_name_eng = trim($_POST['product_name_eng']);
	$product_detail = trim($_POST['product_detail']);
	$product_detail_eng = trim($_POST['product_detail_eng']);
	$product_price = $_POST['product_price'];
	$product_promotion = $_POST['product_promotion'];
	$product_amount =$_POST['product_amount'];
	$action = $_POST['action'];
	*/
	
	
	require("../config.inc.php");
	
$id_youtupe=$_GET['id_youtupe'];
$embed_youtupe=$_POST['vdo'];
$title_youtupe=$_POST['title_vdo'];
$detail_youtupe=$_POST['detail_vdo'];
$id_cat_youtupe=$_POST['id_cat_youtupe'];
$id_cat_youtupe2=$_GET['id_cat_youtupe'];
$action1=$_POST['action'];
$action2=$_GET['action'];
echo"action1:$action1<br>";
echo"action2:$action2<br>";
$id_youtupe=$_POST['id_youtupe'];
echo"id_youtupe$id_youtupe<br>";
//echo"testaction2 ==$action2";	
	
	
	function mkdir_r($dirName, $rights=0777){
		$dirs = explode('/', $dirName);//แยกสัญลักษ์ออกจากตัวอักษร
		$dir='';
		foreach ($dirs as $part) {
			$dir.=$part.'/';
			if (!is_dir($dir) && strlen($dir)>0)
				mkdir($dir, $rights);
		}
	}
	
	function chmod_r($path, $filemode) { 
		if (!is_dir($path)) 
			return chmod($path, $filemode); 
	
		$dh = opendir($path); 
		while (($file = readdir($dh)) !== false) { 
			if($file != '.' && $file != '..') { 
				$fullpath = $path.'/'.$file; 
				if(is_link($fullpath)) 
					return FALSE; 
				elseif(!is_dir($fullpath)) 
					if (!chmod($fullpath, $filemode)) 
						return FALSE; 
				elseif(!chmod_r($fullpath, $filemode)) 
					return FALSE; 
			} 
		} 
	
		closedir($dh); 
	
		if(chmod($path, $filemode)) 
			return TRUE; 
		else 
			return FALSE; 
	}

	function resizeImages($loop,$image,$max_width,$max_height,$max_width2,$max_height2,$images_path) {
		$images_thumbnail_path = $images_path . "/thumbnail";

		
		if(!is_dir($images_path)){
			umask (0);
			mkdir_r($images_path,0777);
		}/*else{
			umask (0);
			chmod_r($images_path,0777);
		}*/
		
		if(!is_dir($images_thumbnail_path)){
			umask (0);
			mkdir_r($images_thumbnail_path,0777);
		}/*else{
			umask (0);
			chmod_r($images_thumbnail_path,0777);
		}*/
		
		$allowedtypes = array("image/x-png","image/png","image/jpeg","image/pjpeg","image/gif");
		$datename = date("YdmHis");
		
		if((is_file($image['tmp_name'])) && ($image['error']=='0') && (in_array($image['type'],$allowedtypes))){
			$imageSize = getimagesize($image['tmp_name']);
			$width = $imageSize[0];
			$height = $imageSize[1];
				
			$x_ratio = $max_width / $width;
			$y_ratio = $max_height / $height;
			
			if(($width <= $max_width) && ($height <= $max_height)){
				$tn_width = $width;
				$tn_height = $height;
			}elseif(($x_ratio * $height) < $max_height){
				$tn_height = ceil($x_ratio * $height);
				$tn_width = $max_width;
			}else{
				$tn_width = ceil($y_ratio * $width);
				$tn_height = $max_height;
			}
			
			$x_ratio = $max_width2 / $width;
			$y_ratio = $max_height2 / $height;
			
			if(($width <= $max_width2) && ($height <= $max_height2)){
				$tn_width2 = $width;
				$tn_height2 = $height;
			}elseif(($x_ratio * $height) < $max_height2){
				$tn_height2 = ceil($x_ratio * $height);
				$tn_width2 = $max_width2;
			}else{
				$tn_width2 = ceil($y_ratio * $width);
				$tn_height2 = $max_height2;
			}
			
			ini_set('memory_limit', '64M');
			
			$max_width_center = ceil($max_width2 / 2);
			$max_height_center = ceil($max_height2 / 2);
			
			$tn_width_center = ceil($tn_width2 / 2);
			$tn_height_center = ceil($tn_height2 / 2);
			
			$x = $max_width_center - $tn_width_center;
			$y = $max_height_center - $tn_height_center;
			
			$dst = ImageCreateTrueColor($tn_width, $tn_height);
			if(($image['type'] == "image/x-png") || ($image['type'] == "image/png")){
				imagesavealpha($dst, true);
				$trans_colour = imagecolorallocatealpha($dst, 0, 0, 0, 127);
				imagefill($dst, 0, 0, $trans_colour);
			}else{
				$white = imagecolorallocate($dst, 255, 255, 255);
				imagefill($dst, 0, 0, $white);
			}
			
			$dst2 = ImageCreateTrueColor($max_width2, $max_height2);
			if(($image['type'] == "image/x-png") || ($image['type'] == "image/png")){
				imagesavealpha($dst2, true);
				$trans_colour = imagecolorallocatealpha($dst2, 0, 0, 0, 127);
				imagefill($dst2, 0, 0, $trans_colour);
			}else{
				$white = imagecolorallocate($dst2, 255, 255, 255);
				imagefill($dst2, 0, 0, $white);
			}
			
			if(($image['type'] == "image/x-png") || ($image['type'] == "image/png")){
			
				$src = imagecreatefrompng($image['tmp_name']);
				imagecopyresampled($dst, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height);
				$fileName = $images_path ."/". $datename . $loop .".png";
				imagepng($dst,$fileName);
				
				imagecopyresampled($dst2, $src, $x, $y, 0, 0, $tn_width2, $tn_height2, $width, $height);
				$fileName = $images_thumbnail_path ."/". $datename . $loop .".png";
				imagepng($dst2,$fileName);
				
			}elseif(($image['type'] == "image/jpeg") || ($image['type'] == "image/pjpeg")){
			
				$src = imagecreatefromjpeg($image['tmp_name']);
				imagecopyresampled($dst, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height);
				$fileName = $images_path ."/". $datename . $loop . ".jpg";
				imagejpeg($dst,$fileName,100);
				
				imagecopyresampled($dst2, $src, $x, $y, 0, 0, $tn_width2, $tn_height2, $width, $height);
				$fileName = $images_thumbnail_path ."/". $datename . $loop . ".jpg";
				imagejpeg($dst2,$fileName,100);
				
			}else{
			
				$src = imagecreatefromgif($image['tmp_name']);
				imagecopyresampled($dst, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height);
				$fileName = $images_path ."/". $datename . $loop . ".gif";
				imagegif($dst,$fileName);
				
				imagecopyresampled($dst2, $src, $x, $y, 0, 0, $tn_width2, $tn_height2, $width, $height);
				$fileName = $images_thumbnail_path ."/". $datename . $loop . ".gif";
				imagegif($dst2,$fileName);
				
			}

			ImageDestroy($src);
			ImageDestroy($dst);
			ImageDestroy($dst2);
			return true;
		}
		
	}



								
	if ($action2 == "del"){
		
		
//$id_cat_youtupe=$_GET['id_cat_youtupe'];
//$id_youtupe=$_GET['$id_youtupe'];
include("../config.inc.php");
$strSQL="delete from youtupe where id_youtupe='$id_youtupe'";
		$result=mysql_query($strSQL);
		if($result){
			?>
            <script>
			alert("ลบข้อมูลเรียบร้อย");
			window.history.back();
			window.location="index.php?page=youtupe&id_cat_youtupe=<?=$id_cat_youtup?>";
			</script>
            <? 
}
		

	
		/*$sql="UPDATE product SET product_name='$product_name',product_name_eng='$product_name_eng', product_detail='$product_detail',product_detail_eng='$product_detail_eng',product_price='$product_price',product_promotion='$product_promotion',product_amount='$product_amount' WHERE product_id='$product_id'";
		mysql_query($sql)or die (mysql_error());
		
		$youtupe_path = "../product/" . $productcat_id . "/" . $product_id . "/";
		for($i = 0; $i < count($_FILES['product_file']); $i++){
			if(is_file($_FILES['product_file']['tmp_name'][$i])){
				$product_file[$i] = array (
					'name' => $_FILES['product_file']['name'][$i],
					'type' => $_FILES['product_file']['type'][$i],
					'tmp_name' => $_FILES['product_file']['tmp_name'][$i],
					'error' => $_FILES['product_file']['error'][$i],
					'size' => $_FILES['product_file']['size'][$i],
				);
				if(($product_file[$i]['type'] == "application/pdf") && ($product_file[$i]['error'] == '0')){
					$now = date("YdmHis").$i;
					$product_pdf_path = $youtupe_path . "/pdf";
					$pdf_file = $product_pdf_path ."/". $now . ".pdf";
					if(!is_dir($product_pdf_path)){
						umask (0);
						mkdir_r($product_pdf_path,0777);
					}/*else{
						umask (0);
						chmod_r($product_pdf_path,0777);
					}*/
					/*
					@move_uploaded_file($product_file[$i]['tmp_name'], $pdf_file);
				}else{
					resizeImages($i,$product_file[$i],700,700,200,200,$youtupe_path);
				}
			}
		}
		*/
	}else if($action1 == "edit"){
	//echo"edit hereeeeeeeeeeeee";
		$path_thumbnail="../youtupe/".$id_cat_youtupe."/".$id_youtupe."/thumbnail/";
$path_big_picture="../youtupe/".$id_cat_youtupe."/".$id_youtupe."/";

			if($handle=opendir($path_thumbnail)){
				$imagesFile=array();
				while(false!==($file=readdir($handle))){
					if($file !="." && $file !=".."){
					$thumbnailsFile=$path_thumbnail."/".$file;
					$big_picture_File=$path_big_picture."/".$file;
					unlink("$thumbnailsFile");
					unlink("$big_picture_File");
				}

			}
			closedir($handle);//ต้องปิดทุกครั้งไม่งั้นลบfolderไม่ได้
		}




	if(is_dir($path_thumbnail)){
	rmdir("$path_thumbnail");
	} 
	if(is_dir($path_big_picture)){
	rmdir("$path_big_picture");
	}

		/*INSERT INTO youtupe (id_youtupe, id_cat_youtupe,title_youtupe,embed_youtupe) VALUES ('$id_youtupe', '$id_cat_youtupe','$title_youtupe', '$embed_youtupe')*/
		
		$sql="UPDATE youtupe SET title_youtupe='$title_youtupe',detail_youtupe='$detail_youtupe',embed_youtupe='$embed_youtupe' WHERE id_youtupe='$id_youtupe'";
		mysql_query($sql)or die (mysql_error());
		
			$youtupe_path = "../youtupe/" . $id_cat_youtupe . "/" . $id_youtupe . "/";
		for($i = 0; $i < count($_FILES['product_file']); $i++){
			if(is_file($_FILES['product_file']['tmp_name'][$i])){
				$product_file[$i] = array (
					'name' => $_FILES['product_file']['name'][$i],
					'type' => $_FILES['product_file']['type'][$i],
					'tmp_name' => $_FILES['product_file']['tmp_name'][$i],
					'error' => $_FILES['product_file']['error'][$i],
					'size' => $_FILES['product_file']['size'][$i],
				);
				if(($product_file[$i]['type'] == "application/pdf") && ($product_file[$i]['error'] == '0')){
					$now = date("YdmHis").$i;
					$product_pdf_path = $youtupe_path . "/pdf";
					$pdf_file = $product_pdf_path ."/". $now . ".pdf";
					if(!is_dir($product_pdf_path)){
						umask (0);
						mkdir_r($product_pdf_path,0777);
					}/*else{
						umask (0);
						chmod_r($product_pdf_path,0777);
					}*/
					
					@move_uploaded_file($product_file[$i]['tmp_name'], $pdf_file);
				}else{
					resizeImages($i,$product_file[$i],700,700,200,200,$youtupe_path);
				}
			}
		}
		
		
		
		
		
		
	
	}elseif ($action1 == "add"){
		
		
		$sql="select * FROM youtupe WHERE title_youtupe = '$title_youtupe'";
		$table=mysql_query($sql) or die(mysql_error());
		if($row=mysql_fetch_array($table)) {
			?>
			<script>
			alert("ชื่อวีดีโอนี้มีอยู่ในระบบแล้ว !");
			window.history.back();
			</script>
			<?
			exit();
		}
		
		$sql="INSERT INTO youtupe (id_cat_youtupe,title_youtupe,detail_youtupe,embed_youtupe) VALUES ('$id_cat_youtupe','$title_youtupe','$detail_youtupe', '$embed_youtupe')";
		mysql_query($sql)or die (mysql_error());
		
		$sql="select * FROM youtupe WHERE title_youtupe = '$title_youtupe'";
		$table=mysql_query($sql) or die(mysql_error());
		if($table)
		
			if($row=mysql_fetch_array($table)) {
				$id_youtupe = $row['id_youtupe'];
				//$youtupe_path = iconv("UTF-8","windows-874",$product_id);
				$youtupe_path = "../youtupe/" . $id_cat_youtupe . "/" . $id_youtupe . "/";
			 
			 
			 
			 
			 mkdir_r($youtupe_path,0777);
			 
			 $aaa=$_FILES['product_file'];
			
				for($i = 0; $i < count($_FILES['product_file']); $i++){
				
				 mkdir_r($youtupe_path,0777);
					if(is_file($_FILES['product_file']['tmp_name'][$i])){
					
						$product_file[$i] = array (
							'name' => $_FILES['product_file']['name'][$i],
							'type' => $_FILES['product_file']['type'][$i],
							'tmp_name' => $_FILES['product_file']['tmp_name'][$i],
							'error' => $_FILES['product_file']['error'][$i],
							'size' => $_FILES['product_file']['size'][$i],
						);
						if(($product_file[$i]['type'] == "application/pdf") && ($product_file[$i]['error'] == '0')){
							$now = date("YdmHis").$i;
							$product_pdf_path = $youtupe_path . "/pdf";
							$pdf_file = $product_pdf_path ."/". $now . ".pdf";
							if(!is_dir($product_pdf_path)){
								umask (0);
								mkdir_r($product_pdf_path,0777);
								
							}/*else{
								umask (0);
								chmod_r($product_pdf_path,0777);
							}*/
							@move_uploaded_file($product_file[$i]['tmp_name'], $pdf_file);
							
						}else{
						
							resizeImages($i,$product_file[$i],700,700,200,200,$youtupe_path);
							
						}
					}
				}
			}
		
	}else{
		header("Location: index.php?page=vdo_system&select_page=youtube&id_cat_youtupe=".$id_cat_youtupe."");
	}
	header("Location: index.php?page=vdo_system&select_page=youtube&id_cat_youtupe=".$id_cat_youtupe."");


?>
