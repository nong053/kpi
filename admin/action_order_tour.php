<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include("../config.inc.php");

if($_POST['action']=="edit"){
	$id_book=$_POST['id_book'];
	
	$name_book=$_POST['name_book'];
	$email_book=$_POST['email_book'];
	$address_book=$_POST['address_book'];
	$tel_book=$_POST['tel_book'];
	$fax_book=$_POST['fax_book'];
	$date_book=$_POST['date_book'];
	$other_book=$_POST['other_book'];
	
	$strSQL="update tour_book set name_book='$name_book',email_book='$email_book',address_book='$address_book',tel_book='$tel_book',fax_book='$fax_book',other_book='$other_book' where id_book=$id_book";
	
	$result=mysql_query($strSQL);
	if(!$result){
		
	echo"error".mysql_error();
	}else{
				echo"<script>alert(\"แก้ไขข้อมูลเรียบร้อยแล้ว\");</script>";
				echo"<script>window.location=\"index.php?page=tour&select_tour=show_order_tour\";</script>";
				exit();
	}
	
	

}else if($_GET['action']=="del"){
	$id_book=$_GET['id_book'];
	$strSQL="delete from tour_book where id_book='$id_book'";
	$result=mysql_query($strSQL);
	if(!$result){
	echo"error".mysql_error();
	}else{
				echo"<script>alert(\"ลบข้อมูลเรียบร้อยแล้ว\");</script>";
				echo"<script>window.location=\"index.php?page=tour&select_tour=show_order_tour\";</script>";
				exit();
	}
}
?>