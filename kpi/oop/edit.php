<?php
function __autoload($filename){
	require_once($filename.".php");
}
$obj_manage_data=new manage_data();
$table="article";
$setfield="article_name='mamg',article_title='title1'";
$condition="article_id='10'";
$obj_manage_data->edit_data($table,$setfield,$condition);

?>