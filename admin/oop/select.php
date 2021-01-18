<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	function __autoload($filename){
		require_once $filename.".php";
		}
	$obj_manage_data = new manage_data();
	$result_article=$obj_manage_data->select_data("article");
	$rs_article=mysql_fetch_array($result_article);
	while($rs_article=mysql_fetch_array($result_article)){
	echo "<br>article_title".$rs_article[article_title]."<br>";
	}

	
?>