<?php
class table{
	var $var_columnd = 4;
	var $var_title_header = "Title1,Title2,Title3,Title4";
	var $var_field="article_id,article_name,article_title,article_detail";
	
	function create_table($title_header){
	//echo"var_column:".$this->var_columnd."<br>";
	if(trim($column)){
	$this->var_columnd = $column;
	}else if(trim($title_header)){
	$this->var_title_header = $title_header;
	}
				
						$array_title_header = explode(",",$this->var_title_header);
						$title_header_length=strlen($array_title_header);
						
						for($i=0;$i<$title_header_length; $i++){
						echo"<th>";
							echo $array_title_header[$i];
						echo"</th>";
						}
	}
	function create_content($field){
		if(trim($field)){
			$this->var_field=$field;
			}
		$array_field = explode(",",$this->var_field);
		$field_length = strlen($array_field);
			
		
		for($i=0;$i<$field_length;$i++){
			echo"<td>";
				echo $array_field[$i];
			echo"</td>";
			}
	}
	function get_table(){
		$obj_test= new table();
		@$obj_test->create_table();
		@$obj_test->create_content();
		//@table::create_table();
	}
}
/*class show_table extends table{
	function show_table_now(){
		echo"hello sow table now";
		@table::create_table();
		}
}*/












//@table::create_table(5);
/*$obj_show_table = new show_table();
$obj_show_table->show_table_now();
*/
$obj_table = new table();
$obj_table->get_table();

/*
$obj_table = new table();
$column=4;
$title_header="Title1,Title2,Title3,Title4";
$field_data = "article_id,article_name,article_title,article_detail,";
@$obj_table->set_table();
*/
?>


