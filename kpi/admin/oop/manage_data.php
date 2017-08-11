<meta http-equiv="content-Type" content="text/html; charset=utf-8">
<?php
class connect_mysql{

	var $var_hostname = "localhost";
	var $var_user = "root";
	var $var_pass ="010535546";
	var $var_dbname= "prototype_db";
/*
	var $var_hostname = "localhost";
	var $var_user = "nnit";
	var $var_pass ="010535546";
	var $var_dbname= "nnit_db";
	*/
	function set_host_user_pass_dbname(){
		extract($_REQUEST);
		$result_db=mysql_connect($this->var_hostname,$this->var_user,$this->var_pass);
		if(!$result_db){ echo"error".mysql_error();}else
		{
		//echo"ok connent db<br>";
		mysql_query("SET NAMES utf8");
		
		mysql_select_db($this->var_dbname);
			}
		//echo"count$count";
		}
		
}
class manage_data extends connect_mysql{
	
	function select_data($table_condition,$field_select="*"){
		//using oparator require function
		//@connect_mysql::set_host_user_pass_dbname();
		//using keyword $this require function
		$this->set_host_user_pass_dbname();
		$strSQL="SELECT $field_select FROM $table_condition";
		$result=mysql_query($strSQL);
		return $result;
	}
		
		
	function insert_data($table,$field,$vaules){
		$strSQL="INSERT INTO $table($field)VALUES($vaules)";
		connect_mysql::set_host_user_pass_dbname();
		$result=mysql_query($strSQL);
			if(!$result){echo"error".mysql_error();}else
			{
			//echo"ok for result insert";
			}
		}
	function edit_data($table,$setfield,$condition){
		connect_mysql::set_host_user_pass_dbname();
		$strSQL="UPDATE $table SET $setfield WHERE $condition";
		$result=mysql_query($strSQL);
			if(!$result){echo"error".mysql_error();}else
			{
			//echo"ok for result edit";
			}
		}
	function delete_data($table, $condition){
		//echo"$table<br>";
		//echo"$condition<br>";
		connect_mysql::set_host_user_pass_dbname();
		$strSQL="DELETE FROM $table WHERE $condition";
		$result=mysql_query($strSQL);
			if(!$result){echo"error".mysql_error();}else
			{
			//echo"ok for result delete";	
			}
		}
}

?>