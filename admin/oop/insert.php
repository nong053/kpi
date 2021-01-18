<?php
function __autoload($filename){
	require_once($filename.".php");
	}
$obj_manage_data=new manage_data();
$table="article";
$field="article_name,article_title";
$values="'nong2','title2'";
$obj_manage_data->insert_data($table,$field,$values);
?>