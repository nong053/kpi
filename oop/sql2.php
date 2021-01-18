<?php
class connect_mysql{
	var $var_hostname = "localhost";
	var $var_user = "root";
	var $var_pass ="010535546";
	var $var_dbname= "nnit_db";

	function set_host_user_pass_dbname($hostname,$user,$pass,$dbname){
		extract($_REQUEST);
		if($hostname=="" or $user=="" or $pass=="" or $dbname==""){
		$this->var_hostname;
		$this->var_user;
		$this->var_pass;
		$this->var_dbname;	
		}else{
		echo"hello ";
		
		$this->var_hostname=$hostname;
		$this->var_user=$user;
		$this->var_pass=$pass;
		$this->var_dbname=$dbname;
		}
		echo"var_hostname  $this->var_hostname<br>";
		echo"var_user  $this->var_user<br>";
		echo"var_pass  $this->var_pass<br>";
		echo"var_dbname  $this->var_dbname<br>";
		$result_db=mysql_connect($this->var_hostname,$this->var_user,$this->var_pass);
		if(!$result_db){ echo"error".mysql_error();}else
		{
			echo"ok connent db<br>";
		mysql_query("SET NAMES utf-8");
		
		mysql_select_db($this->var_dbname);
			}
		echo"count$count";
		}
		
}
class manage_data extends connect_mysql{
	
	function select_data($field_select,$table_condition){
		@connect_mysql::set_host_user_pass_dbname();
		$strSQL="SELECT $field_select FROM $table_condition";
		$result=mysql_query($strSQL);
		
		/*$num=mysql_num_rows($result);
		echo"num $num";*/
		return $result;
	}
		
		
	function insert_data($table,$field,$vaule){
		$strSQL="INSERT INTO $table ($field)VALUES($vaule)";
		mysql_query($strSQL);
		//$test = "INSERT INTO member()VALUES()";
		}
	function edit_data($table,$setfield,$condition){
		$strSQL="UPDATE $table SET $setfield $condition";
		mysql_query($strSQL);
		//$test ="UPDATE member set dd='aa' where user_id=100";
		}
	function delete_data($table, $condition){
		$strSQL="DELETE FROM $table $condition";
		mysql_query($strSQL);
		}
}
//$obj_connect_mysql= new connect_mysql();
$obj_manage_data = new manage_data();
//@$obj_manage_data->set_host_user_pass_dbname();
$obj_manage_data->set_host_user_pass_dbname("localhost","root","010535546","nnit_db");


//select data
$result_article=$obj_manage_data->select_data("*","article");
$rs_article=mysql_fetch_array($result_article);
while($rs_article=mysql_fetch_array($result_article)){
	echo "<br>article_title".$rs_article[article_title]."<br>";
	}
//
//insert data

//

?>