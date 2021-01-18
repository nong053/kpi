<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
class database{
	function tableSQL($table)
	{
			include("config.inc.php");
			$strSQL="select * from $table";
			$result=mysql_query($strSQL);
			
			return $result;
		
	}
}
$fc= new database();
$test=$fc->tableSQL("main_menu");
$num=mysql_num_rows($test);
$rs=mysql_fetch_array($test);
echo $rs[main_menu_id];
?>