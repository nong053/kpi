
<?php
class table{
	var $var_columnd = 5;
	var $var_title_header = "Title1,Title2,Title3,Title4,Title5";
	
	function create_table($column,$title_header){
	//echo"var_column:".$this->var_columnd."<br>";
	if(trim($column)){
	$this->var_columnd = $column;
	}else if(trim($title_header)){
	$this->var_title_header = $title_header;
	}
		echo"<table border=\"1\">";
			echo"<thead>";
				echo"<tr>";
				
						$array_title_header = explode(",",$this->var_title_header);
						for($i=0;$i<$this->var_columnd; $i++){
						echo"<th>";
							echo $array_title_header[$i];
						
						echo"</th>";
						}
					
				echo"</tr>";
			echo"</thead>";
			echo"<tbody>";
				echo"<tr>";
					for($i=0;$i<$this->var_columnd; $i++){
						echo"<td>";
							echo"body";
						echo"</td>";
					}
				echo"</tr>";
			echo"</tbody>";
		echo"</table>";

		
	}
	function set_table(){
		
	}
	function get_table(){
		echo"<table border=\"1\">";
			echo"<thead>";
				echo"<tr>";
				
						$array_title_header = explode(",",$this->var_title_header);
						for($i=0;$i<$this->var_columnd; $i++){
						echo"<th>";
							echo $array_title_header[$i];
						
						echo"</th>";
						}
					
				echo"</tr>";
			echo"</thead>";
			echo"<tbody>";
				echo"<tr>";
					for($i=0;$i<$this->var_columnd; $i++){
						echo"<td>";
							echo"body";
						echo"</td>";
					}
				echo"</tr>";
			echo"</tbody>";
		echo"</table>";
	}
}
//@table::create_table(5);
$obj_table = new table();
//$column=4;
//$title_header="Title1,Title2,Title3,Title4";
//$field_data = "article_id,article_name,article_title,article_detail,";
@$obj_table->create_table();
?>


