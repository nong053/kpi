<?php
function __autoload($filename){
	require_once($filename.".php");
	}
$obj_manage_data = new manage_data();
$table="article";
$condition="article_id='12'";
$obj_manage_data->delete_data($table,$condition);
?>