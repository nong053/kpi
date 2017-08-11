<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	require("../config.inc.php");
	$admin_id = $_GET['vAdmin_id'];
	if($admin_id == '1'){
		?>
		<script>
			alert("ไม่อนุญาติให้ลบ Super User !");
			window.history.back();
		</script>
		<?
		exit();
	}
	$sql="DELETE FROM admin WHERE admin_id='$admin_id'";
	$rs=@mysql_query($sql)or die (mysql_error());
	if($rs){
		
	
		
		
		
		/*delete picture slide start*/
		function delPicture($path,$admin_id){
			$path_picture="../".$path."/".$admin_id."/";
			if(!$handle=@opendir($path_picture)){
			
			}else
			{
				$imagesFile=array();
				while(false!==($file=readdir($handle))){
					if($file !="." && $file !=".."){
						$pictureFile=$path_picture."/".$file;
						@unlink("$pictureFile");
					}
			
				}
				closedir($handle);//ต้องปิดทุกครั้งไม่งั้นลบfolderไม่ได้
			}
			if(is_dir($path_picture)){
				rmdir("$path_picture");
			}
		}
		function delCkfinderPicture($path){
			$path_picture=$path;
			if(!$handle=opendir($path_picture)){
					
			}else
			{
				$imagesFile=array();
				while(false!==($file=readdir($handle))){
					if($file !="." && $file !=".."){
						$pictureFile=$path_picture."/".$file;
						@unlink("$pictureFile");
					}
						
				}
				closedir($handle);//ต้องปิดทุกครั้งไม่งั้นลบfolderไม่ได้
			}
			if(is_dir($path_picture)){
				rmdir("$path_picture");
			}
		}
		
		delPicture("slide_picture",$admin_id);
		delPicture("object_system",$admin_id);
		//delCkfinderPicture("../userfiles/".$admin_id."/_thumbs/Images");
		function rrmdir($dir) {
			foreach(glob($dir . '/*') as $file) {
				if(is_dir($file)) @rrmdir($file); else @unlink($file);
			} @rmdir($dir);
		}
		@rrmdir("../userfiles/".$admin_id."/");
		
		
		/*delete picture slide end*/
		//
		
		
		
		
		
		
		
	
	}
	//header("Location: index.php?page=admin");
?>
 <META HTTP-EQUIV=Refresh CONTENT="0; URL=index.php?page=admin"> 