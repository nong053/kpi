<?php
include 'config.php';
/*$empPicture =$_POST['empPicture'];*/
$empUser = $_POST['empUser'];
$empPass = $_POST['empPass'];
$empFullName = $_POST['empFullName'];
$empPosition = $_POST['empPosition'];
$empAge = $_POST['empAge'];
$empTel = $_POST['empTel'];
$empEmail = $_POST['empEmail'];
$empOther = $_POST['empOther'];
$empId = $_POST['empId'];

if(trim($_FILES["empPicture"]["tmp_name"]) != "")
	{
		$images = $_FILES["empPicture"]["tmp_name"];
		$new_images = "Thumbnails_".$_FILES["empPicture"]["name"];
		copy($_FILES["empPicture"]["tmp_name"],"imageEmp/".$_FILES["empPicture"]["name"]);
		$width=100; //*** Fix Width & Heigh (Autu caculate) ***//
		$size=GetimageSize($images);
		$height=round($width*$size[1]/$size[0]);
		$images_orig = ImageCreateFromJPEG($images);
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		ImageJPEG($images_fin,"imageEmp/".$new_images);
		ImageDestroy($images_orig);
		ImageDestroy($images_fin);
	}

/*


emp_id
emp_user
emp_pass
emp_picture
emp_tel
emp_age
emp_name
emp_email
position_id
emp_other

empPicture
empUser
empPass
empConfirmPass
empFullName
empPosition
empAge
empTel
empEmail
empOther
*/


if($_POST['action']=="add"){
	$strSQL="INSERT INTO employee(emp_user,emp_pass,emp_tel,emp_age,emp_name,emp_email,position_id,emp_other,emp_picture)
	VALUES('$empUser','$empPass','$empTel','$empAge','$empFullName','$empEmail','$empPosition','$empOther','$empPicture')";
	$rs=mysql_query($strSQL);
	if($rs){
		echo'["success"]';
	}else{
		echo'["error"]';
	}
	mysql_close($conn);
}

if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="SELECT * FROM employee ";
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='Tableemployee' class='grid'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:50px' />";
			$tableHTML.="<col  />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th><b> ID</b></th>";
			$tableHTML.="<th><b>Employee Picture</b></th>";
			$tableHTML.="<th><b>Employee Name</b></th>";
			$tableHTML.="<th><b>Position</b></th>";
			$tableHTML.="<th><b>Age</b></th>";
			$tableHTML.="<th><b>Tel</b></th>";
			$tableHTML.="<th><b>Manage</b></th>";
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	
	while($rs=mysql_fetch_array($result)){
		
	
	$tableHTML.="<tbody class=\"contentemployee\">";
	$tableHTML.="<tr>";
	$tableHTML.="	<td>".$i."</td>";
	$tableHTML.="	<td>".$rs['emp_picture']."</td>";
	$tableHTML.="	<td>".$rs['emp_name']."</td>";
	$tableHTML.="	<td>".$rs['position_id']."</td>";
	$tableHTML.="	<td>".$rs['emp_age']."</td>";
	$tableHTML.="	<td>".$rs['emp_tel']."</td>";
	

	$tableHTML.="	<td>
			<button type='button' id='idEdit-".$rs['emp_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>
			<button type='button' id='idDel-".$rs['emp_id']."' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>
			</td>";
	$tableHTML.="</tr>";

	
	$i++;
	}
	$tableHTML.="</tbody>";
	$tableHTML.="</table>";
	echo $tableHTML;
	mysql_close($conn);
}
if($_POST['action']=="del"){
	$id=$_POST['id'];
	
	$strSQL="DELETE FROM employee WHERE emp_id=$id";
	$result=mysql_query($strSQL);
	if($result){
		echo'["success"]';
	}else{
		echo'["error"]';
	}
	mysql_close($conn);
	
}
if($_POST['action']=="edit"){
	$id=$_POST['id'];

	$strSQL="SELECT * FROM employee WHERE emp_id=$id";
	$result=mysql_query($strSQL);
	if($result){
		$rs=mysql_fetch_array($result);
		
		//echo "[{\"abc\":$rs[emp_id],\"def\":\"22\"}]";
		/*
		emp_id
		emp_user
		emp_pass
		emp_picture
		emp_tel
		emp_age
		emp_name
		emp_email
		position_id
		emp_other
		*/
		 echo "[{\"emp_id\":\"$rs[emp_id]\",\"emp_user\":\"$rs[emp_user]\",
		 		\"emp_pass\":\"$rs[emp_pass]\",\"emp_picture\":\"$rs[emp_picture]\",
	\"emp_tel\":\"$rs[emp_tel]\",\"emp_age\":\"$rs[emp_age]\",\"emp_name\":\"$rs[emp_name]\",
	\"emp_email\":\"$rs[emp_email]\",\"position_id\":\"$rs[position_id]\",\"emp_other\":\"$rs[emp_other]\"}]";
		
	}else{
		echo'["error"]';
	}
	
	mysql_close($conn);
}
if($_POST['action']=="editAction"){



	/*
	employee
	############ View ##############
	empPicture
	empUser
	empPass
	empConfirmPass
	empConfirmPass
	empFullName
	empPosition
	empAge
	empTel
	empEmail
	empOther
	############ Database ##############
	emp_id
	emp_user
	emp_pass
	emp_picture
	emp_tel
	emp_age
	emp_name
	emp_email
	*/
	
	$strSQL="UPDATE employee SET emp_user='$employeeName',emp_pass='$empPass',
	 emp_tel='$empTel',emp_age='$empAge',emp_name='$empFullName',emp_email='$empEmail',
	 emp_other='$empOther'
	 
	 WHERE emp_id='$empId'";
	$result=mysql_query($strSQL);
	if($result){
		echo'["editSuccess"]';
	}else{
		echo'["error"]'.mysql_error();
	}

	mysql_close($conn);
}


