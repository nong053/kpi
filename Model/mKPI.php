<?php session_start(); ob_start();?>
<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){


$kpiName =$_POST['kpiName'];
$kpiUnit =$_POST['kpiUnit'];
$perspectiveId =$_POST['perspectiveId'];
$kpiBetterFlag =$_POST['kpiBetterFlag'];
$kpiDetail = $_POST['kpiDetail'];
$kpiActualManual = $_POST['kpiActualManual'];
$kpiActualQuery = $_POST['kpiActualQuery'];
$kpiTypeActual = $_POST['kpiTypeActual'];
$kpiTarget = $_POST['kpiTarget'];
$kpiId = $_POST['kpiId'];
$kpiCode = $_POST['kpiCode'];
$kpiTypeScore = $_POST['kpiTypeScore'];
$kpiDataTarget = $_POST['kpiDataTarget'];

//kpi_data_target



$departmentId=$_POST['departmentId'];
$divisionId=$_POST['divisionId'];
$admin_id=$_SESSION['admin_id'];

//CheckUsingKpiAssignAndKpiResult Start
if($_POST['action']=="checkUsedData"){

	$sqlSQL="select count(*) as countKPIs
	from assign_evaluate_kpi 
	where kpi_id='$kpiId'
	";

	$result=$conn->query($sqlSQL);
	$rs=$result->fetch_assoc();
	echo "[\"$rs[countKPIs]\"]";
	$conn->close();
}
//CheckUsingKpiAssignAndKpiResult End


if($_POST['action']=="checkUniqueKPICode"){
	$numrows="0";
	$sqlSQL="SELECT * FROM person_kpi.kpi where kpi_code='$kpiCode' and admin_id='$admin_id'";

	$result=$conn->query($sqlSQL);
	$numrows = $result->num_rows;;
	echo "[\"$numrows\"]";
	$conn->close();
}


if($_POST['action']=="add"){
	/*
	$strSQL="INSERT INTO kpi(kpi_name,kpi_better_flag,kpi_detail,admin_id,kpi_code,department_id,kpi_type_score,kpi_data_target)
	VALUES('$kpiName','$kpiBetterFlag','$kpiDetail','$admin_id','$kpiCode','$departmentId','$kpiTypeScore','$kpiDataTarget')";
	*/
	
	if($kpiTypeScore==2 || $kpiTypeScore==3){
		$kpiDataTarget=5;
	}
	$strSQL="INSERT INTO kpi(kpi_name,kpi_unit,kpi_better_flag,kpi_detail,admin_id,kpi_code,kpi_type_score,kpi_data_target,perspective_id)
	VALUES('$kpiName','$kpiUnit','$kpiBetterFlag','$kpiDetail','$admin_id','$kpiCode','$kpiTypeScore','$kpiDataTarget','$perspectiveId')";
	$rs=$conn->query($strSQL);
	$id = $conn -> insert_id;
	if($rs){

		if($kpiTypeScore==1){

			if($kpiBetterFlag=='Y'){

				$baseline_begin1=0;
				$baseline_end1=(($kpiDataTarget*20/100)-1);

				$strSQL1="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin1','$baseline_end1','0 ','$id','ไม่ผ่าน');
				";
			    $conn->query($strSQL1);


			    $baseline_begin2=$baseline_end1+1;
				$baseline_end2=(($kpiDataTarget*40/100)-1);
			    $strSQL2="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin2','$baseline_end2','1','$id','ต่ำกว่าเกณฑ์');
				";
			    $conn->query($strSQL2);

			    $baseline_begin3=$baseline_end2+1;
				$baseline_end3=(($kpiDataTarget*60/100)-1);
			    $strSQL3="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin3','$baseline_end3','2','$id','ผ่านเกณฑ์ขั้นต่ำ');
				";
			    $conn->query($strSQL3);

			    $baseline_begin4=$baseline_end3+1;
				$baseline_end4=(($kpiDataTarget*80/100)-1);
			    $strSQL4="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin4','$baseline_end4','3','$id','น่าพอใจ');
				";
			    $conn->query($strSQL4);

			    $baseline_begin5=$baseline_end4+1;
				$baseline_end5=(($kpiDataTarget*100/100)-1);
			    $strSQL5="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin5','$baseline_end5','4','$id','ดี');
				";
			    $conn->query($strSQL5);
			
			    $baseline_begin6=$baseline_end5+1;
				$baseline_end6=$kpiDataTarget*100;
				$strSQL6="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin6','$baseline_end6','5 ','$id','ดีมาก');
				";
			    $conn->query($strSQL6);


			}else{


				$baseline_begin1=0;
				$baseline_end1=$kpiDataTarget;

				$strSQL1="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin1','$baseline_end1','5 ','$id','ดีมาก');
				";
			    $conn->query($strSQL1);


			    $baseline_begin2=$baseline_end1+0.01;
				$baseline_end2=$baseline_begin2+(($kpiDataTarget*20/100));
			    $strSQL2="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin2','$baseline_end2','4','$id','ดี');
				";
			    $conn->query($strSQL2);

			    $baseline_begin3=$baseline_end2+0.01;
				$baseline_end3=$baseline_begin3+(($kpiDataTarget*40/100));
			    $strSQL3="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin3','$baseline_end3','3','$id','น่าพอใจ');
				";
			    $conn->query($strSQL3);

			    $baseline_begin4=$baseline_end3+0.01;
				$baseline_end4=$baseline_begin4+(($kpiDataTarget*60/100));
			    $strSQL4="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin4','$baseline_end4','2','$id','ผ่านเกณฑ์ขั้นต่ำ');
				";
			    $conn->query($strSQL4);

			    $baseline_begin5=$baseline_begin4+0.01;
				$baseline_end5=$baseline_begin5+(($kpiDataTarget*80/100));
			    $strSQL5="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin5','$baseline_end5','1','$id','ต่ำกว่าเกณฑ์');
				";
			    $conn->query($strSQL5);
			
			    $baseline_begin6=$baseline_end5+0.01;
				$baseline_end6=$baseline_begin6+$kpiDataTarget*100;
				$strSQL6="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin6','$baseline_end6','0 ','$id','ไม่ผ่าน');
				";
			    $conn->query($strSQL6);



		}

		}else if($kpiTypeScore==2){

		
			$strSQL1="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('0','0','0 ','$id','ไม่ผ่าน');
			";
		    $conn->query($strSQL1);

		    $strSQL2="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('1','1','1','$id','ต่ำกว่าเกณฑ์');
			";
		    $conn->query($strSQL2);

		    $strSQL3="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('2','2','2','$id','ผ่านเกณฑ์ขั้นต่ำ');
			";
		    $conn->query($strSQL3);

		    $strSQL4="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('3','3','3','$id','น่าพอใจ');
			";
		    $conn->query($strSQL4);

		    $strSQL5="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('4','4','4','$id','ดี');
			";
		    $conn->query($strSQL5);
		

			$strSQL6="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('5','5','5 ','$id','ดีมาก');
			";
		    $conn->query($strSQL6);

		



	}else if($kpiTypeScore==3){
			$strSQL1="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('0','0','0','$id','ไม่ผ่าน');
			";
		    $conn->query($strSQL1);

		    $strSQL2="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('5','5','5 ','$id','ผ่าน');
			";
		    $conn->query($strSQL2);

	}


	
	

	if(!$mysql_error){
		echo'["success"]';
	}

		
	}else{
		//echo'["error"]';
		echo $conn->error;
	}
	$conn->close();
}

if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="SELECT k.*,p.perspective_name FROM kpi k
	left join perspective p on k.perspective_id=p.perspective_id
	where k.admin_id='$admin_id' 
	-- and department_id='$departmentId' 
			order by k.kpi_id  desc";
	$result=$conn->query($strSQL);
	$$tableHTML="";
	

	while($rs=$result->fetch_assoc()){
		
		if($rs['kpi_type_actual']==1){
			$type_target="<i class='glyphicon glyphicon-ok'></i>";
		}else{
			$type_target="<i class='glyphicon glyphicon-remove'></i>";
		}
		
		
		
		$tableHTML.="<div class='col-md-4'>";
			$tableHTML.="<div class='alert alert-success'>";
			//$tableHTML.="	<div style='text-align:center;'>".$i."</div>";

			$tableHTML.="	<div>มุมมองธุรกิจ <b>".$rs['perspective_name']."</b></div>";
			$tableHTML.="	<div >ตัวชี้วัด <b id='kpi-name-".$rs['kpi_id']."'>".$rs['kpi_name']."</b></div>";
			$tableHTML.="	<div  style='display:none;'><b id='kpi-unit-".$rs['kpi_id']."'>".$rs['kpi_unit']."</b></div>";
			$tableHTML.="	<div >เป้าหมาย <b id='kpi-data-target-".$rs['kpi_id']."'>".$rs['kpi_data_target']." ".$rs['kpi_unit']."</b></div>";
			
			
			if($rs['kpi_better_flag']=='Y'){
				$tableHTML.="	<div>ประเภทตัวชี้วัด <b>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></i></b></div>";
			}else if($rs['kpi_better_flag']=='N'){
				$tableHTML.="	<div>ประเภทตัวชี้วัด <b>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></i></b></div>";
			}else{
				$tableHTML.="	<div>-</div>";
			}
			

			$tableHTML.="	<div>ประเภทการคิดคะแนน <b>";
			if($rs['kpi_type_score']==1){

				$tableHTML.="กำหนดเอง";
			}else if($rs['kpi_type_score']==2){

				$tableHTML.="1-5 คะแนน";
			}else if($rs['kpi_type_score']==3){

				$tableHTML.="ผ่าน/ไม่ผ่าน";
			}else{
				$tableHTML.="กำหนดเอง";
			}
			$tableHTML.="	</b></div>";

			
			

			$tableHTML.="	
				<div style='text-align: right;'>
					<button type='button' id='idKPI-".$rs['kpi_id']."-".$rs['kpi_type_score']."-".$rs['kpi_better_flag']."' class=' actionBaseline btn btn-primary '><i class='glyphicon glyphicon-transfer'></i></button>

					<button type='button' id='idEdit-".$rs['kpi_id']."' class='actionEdit btn btn-primary '><i class='glyphicon glyphicon-pencil'></i></button>
					
					<button type='button' id='idDel-".$rs['kpi_id']."' class=' actionDel btn btn-danger '><i class='glyphicon glyphicon-trash'></i></button>
				</div>	
				";
			
		

		$tableHTML.="</div>";
	$tableHTML.="</div>";

	
	
	}

	echo $tableHTML;
	$conn->close();
}
if($_POST['action']=="del"){
	$id=$_POST['id'];
	
	$strSQL="DELETE FROM kpi WHERE kpi_id='$id'";
	$result=$conn->query($strSQL);
	if($result){

		$strSQL2="delete from  baseline  WHERE kpi_id='$id'";
		$result2=$conn->query($strSQL2);

		if($result2){
			$strSQL3="delete from  assign_evaluate_kpi  WHERE kpi_id='$id'";
			$result3=$conn->query($strSQL3);

			if($result3){
				echo'["success"]';
			}else{
				echo'["error"]';
			}
			
		}else{
			echo'["error"]';
		}

		
	}else{
		echo'["error"]';
	}
	$conn->close();
	
}
if($_POST['action']=="edit"){
	$id=$_POST['id'];

	$strSQL="SELECT * FROM kpi WHERE kpi_id='$id'";
	$result=$conn->query($strSQL);
	if($result){
		$rs=$result->fetch_assoc();
		
		//echo "[{\"abc\":$rs[kpi_id],\"def\":\"22\"}]";
		
		 echo "[{\"kpi_id\":\"$rs[kpi_id]\",\"kpi_code\":\"$rs[kpi_code]\",\"kpi_name\":\"$rs[kpi_name]\",\"kpi_unit\":\"$rs[kpi_unit]\",\"kpi_better_flag\":\"$rs[kpi_better_flag]\",
		 		\"kpi_detail\":\"$rs[kpi_detail]\",\"department_id\":\"$rs[department_id]\",\"division_id\":\"$rs[division_id]\",\"kpi_actual_query\":\"$rs[kpi_actual_query]\",\"kpi_actual_manual\":\"$rs[kpi_actual_manual]\",\"kpi_type_actual\":\"$rs[kpi_type_actual]\",\"kpi_target\":\"$rs[kpi_target]\",\"kpi_type_score\":\"$rs[kpi_type_score]\",\"kpi_data_target\":\"$rs[kpi_data_target]\"}]";
		 
	}else{
		echo'["error"]';
	}
	
	$conn->close();
}
if($_POST['action']=="editAction"){
	


	$strSQL="UPDATE kpi SET kpi_name='$kpiName',kpi_unit='$kpiUnit',kpi_better_flag='$kpiBetterFlag',kpi_detail='$kpiDetail',
	kpi_code='$kpiCode',department_id='$departmentId',perspective_id='$perspectiveId'
	WHERE kpi_id='$kpiId'";
	$result=$conn->query($strSQL);
	if($result){
		echo'["editSuccess"]';
	}else{
		echo'["error"]'.$conn->error;
	}

	$conn->close();
}

}else{
echo'{"status":"400","error":"not token."}';

}


