
<?php
$webre_url=$_POST['webre_url'];
$webre_detail=$_POST['webre_detail'];
$webre_start=$_POST['webre_start'];
$webre_end=$_POST['webre_end'];
$webre_update=date("d-m-y H:i:s");
$webre_cat_id=$_POST['webre_cat_id'];
$admin_id=$_POST['admin_id'];
/*
echo "webre_url ".$webre_url."<br>";
echo "webre_detail ".$webre_detail."<br>";
echo "webre_start ".$webre_start."<br>";
echo "webre_end ".$webre_end."<br>";
echo "webre_update ".$webre_update."<br>";
echo "webre_cat_id ".$webre_cat_id."<br>";
echo "admin_id ".$admin_id."<br>";
*/
function __autoload($file){
require_once("../oop/".$file.".php");

}
$obj_manage_data=new manage_data();
if($_POST['action']=="add_data"){

		$table="web_register";
		$field="webre_url  ,webre_detail ,webre_start  ,webre_end ,webre_update ,webre_cat_id  ,admin_id";
		$values="'$webre_url' ,'$webre_detail','$webre_start' ,'$webre_end','$webre_update' ,'$webre_cat_id' ,'$admin_id'";
		$result=$obj_manage_data->insert_data($table,$field,$values);
		if($result){
			echo"{\"result\":\"success\"}";
		}

}//if action


if($_POST['action']=="show_data"){


	$field_select="webre_id,webre_url,cat_webre_package ,admin_status";
	$table_condition="web_register,webcat_register,admin
where web_register.webre_cat_id=webcat_register.cat_webre_id 
and web_register.admin_id=admin.admin_id  group by webre_url";
	$result=$obj_manage_data->select_data($table_condition,$field_select);
	

	$i=1;
	while($rs=mysql_fetch_array($result)){
	?>
    <tr>
    	<td>
        <center>
        <?=$i?>
        </center>
        </td>
        <td>
        <?=$rs[webre_url]?>
        </td>
        <td>
        <?=$rs[cat_webre_package]?>
        </td>
        <td>
        <?=$rs[admin_status]?>
        </td>
       	<td>
        <center>
		
    <div class="detail_webRegister" id="webre_id<?=$rs[webre_id]?>">
        รายละเอียด
     </div>
        </center>
        </td>
		
    </tr>
   
    <? $i++;
	} 
}
/*end show data*/
/*start show data del edit*/
if($_POST['action']=="show_data_del_edit"){

	$field_select="webre_id,webre_url,cat_webre_package ,admin_status";
	$table_condition="web_register,webcat_register,admin
where web_register.webre_cat_id=webcat_register.cat_webre_id 
and web_register.admin_id=admin.admin_id   group by webre_url";
	$result=$obj_manage_data->select_data($table_condition,$field_select);
	$i=1;
	while($rs=mysql_fetch_array($result)){
	?>
    <tr>
    	<td>
        <center>
        <?=$i?>
        </center>
        </td>
        <td>
        <?=$rs[webre_url]?>
        </td>
        <td>
        <?=$rs[cat_webre_package]?>
        </td>
        <td>
        <?=$rs[admin_status]?>
        </td>
       	<td>
        <center>
		
    <div class="manage_del manage_data" id="webre_id<?=$rs[webre_id]?>">
        ลบ
     </div>
	 <div class="manage_edit manage_data" id="webre_id<?=$rs[webre_id]?>">
        แก้ไข
     </div>
        </center>
        </td>
		
    </tr>
   
    <? $i++;
	} 
}
//delete
if($_POST['action']=="delete"){
	$webre_id=$_POST['webre_id'];
		$table_condition="web_register where webre_id =$webre_id";
		$field_select="*";
		$result_webregister=$obj_manage_data->select_data($table_condition);
		$rs_webregister=mysql_fetch_array($result_webregister);
		$num=mysql_num_rows($result_webregister);
		$admin_id=$rs_webregister['admin_id'];
		$table="admin";
		$condition="admin_id='$admin_id'";
		$result2=$obj_manage_data->delete_data($table,$condition);
		if($result2==true){
				$table="web_register";
				$condition="webre_id='$webre_id'";
				$resultWeb_register=$obj_manage_data->delete_data($table,$condition);
				if($resultWeb_register){
				echo"{\"result\":\"success\"}";
				}
		}
}



if($_POST['action']=="show_edit_data"){
	$webre_id=$_POST['webre_id'];
	if($webre_id!=""){
	$condition="and webre_id=$webre_id";
	}else{
	$condition="";
	}
	$field_select="webre_id,webre_url,webre_detail,webre_start  ,webre_end   ,cat_webre_package  ,admin_name, admin_surname, admin_username,admin_password, admin_status,admin_email, 	admin_website, 	admin_send_email, admin_address, admin_tel,admin.admin_id";
	$table_condition="web_register,webcat_register,admin
where web_register.webre_cat_id=webcat_register.cat_webre_id 
and web_register.admin_id=admin.admin_id $condition group by webre_url";
	$result=$obj_manage_data->select_data($table_condition,$field_select);
	if($result){
	$rs=mysql_fetch_array($result);
/*
	echo "webre_url".$rs[webre_url]."<br>";
	echo "webre_detail".$rs[webre_detail]."<br>";
	echo "webre_start".$rs[webre_start]."<br>";
	echo "webre_end".$rs[webre_end]."<br>";
	echo "cat_webre_package".$rs[cat_webre_package]."<br>";
	echo"<br>====================<br>";
	echo "admin_name".$rs[admin_name]."<br>";
	echo "admin_surname".$rs[admin_surname]."<br>";
	echo "admin_username".$rs[admin_username]."<br>";
	echo "admin_password".$rs[admin_password]."<br>";
	echo "admin_status".$rs[admin_status]."<br>";
	echo "admin_email".$rs[admin_email]."<br>";
	echo "admin_website".$rs[admin_website]."<br>";
	echo "admin_send_email".$rs[admin_send_email]."<br>";
	echo "admin_address".$rs[admin_address]."<br>";
	echo "admin_tel".$rs[admin_tel]."<br>";
*/
	echo"{\"webre_url\":\"".$rs[webre_url]."\",\"webre_detail\":\"".$rs[webre_detail]."\",\"webre_start\":\"".$rs[webre_start]."\",\"webre_end\":\"".$rs[webre_end]."\",\"cat_webre_package\":\"".$rs[cat_webre_package]."\",\"admin_name\":\"".$rs[admin_name]."\",\"admin_surname\":\"".$rs[admin_surname]."\",\"admin_username\":\"".$rs[admin_username]."\",\"admin_password\":\"".$rs[admin_password]."\",\"admin_status\":\"".$rs[admin_status]."\",\"admin_email\":\"".$rs[admin_email]."\",\"admin_website\":\"".$rs[admin_website]."\",\"admin_send_email\":\"".$rs[admin_send_email]."\",\"admin_address\":\"".$rs[admin_address]."\",\"admin_tel\":\"".$rs[admin_tel]."\",\"admin_id\":\"".$rs[admin_id]."\"}";

	}


}
if($_POST['action']=="edit"){
//relation one:one
$table="web_register";
$setfield="webre_url='$webre_url',webre_detail='$webre_detail',webre_start='$webre_start',webre_end='$webre_end',webre_update='$webre_update'";
$condition="admin_id='$admin_id'";
$obj_manage_data->edit_data($table,$setfield,$condition);
echo"{\"result\":\"success\"}";
}

?>
