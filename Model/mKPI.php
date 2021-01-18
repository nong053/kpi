<? session_start(); ob_start();?>
<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){


$kpiName =$_POST['kpiName'];
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
if($_POST['action']=="checkUsingKpiAssignAndKpiResult"){

	$sqlSQL="select count(*) as countKPIs
	from assign_kpi 
	where kpi_id='$kpiId'
	";

	$result=mysql_query($sqlSQL);
	$rs=mysql_fetch_array($result);
	echo "[\"$rs[countKPIs]\"]";
	mysql_close($conn);
}
//CheckUsingKpiAssignAndKpiResult End


if($_POST['action']=="checkUniqueKPICode"){
	$numrows="0";
	$sqlSQL="SELECT * FROM person_kpi.kpi where kpi_code='$kpiCode' and admin_id='$admin_id'";

	$result=mysql_query($sqlSQL);
	$numrows = mysql_num_rows($result);
	echo "[\"$numrows\"]";
	mysql_close($conn);
}


if($_POST['action']=="add"){
	/*
	$strSQL="INSERT INTO kpi(kpi_name,kpi_better_flag,kpi_detail,admin_id,kpi_code,department_id,kpi_type_score,kpi_data_target)
	VALUES('$kpiName','$kpiBetterFlag','$kpiDetail','$admin_id','$kpiCode','$departmentId','$kpiTypeScore','$kpiDataTarget')";
	*/

	$strSQL="INSERT INTO kpi(kpi_name,kpi_better_flag,kpi_detail,admin_id,kpi_code,kpi_type_score,kpi_data_target)
	VALUES('$kpiName','$kpiBetterFlag','$kpiDetail','$admin_id','$kpiCode','$kpiTypeScore','$kpiDataTarget')";
	$rs=mysql_query($strSQL);
	$id = mysql_insert_id();
	if($rs){

		if($kpiTypeScore==1){

			if($kpiBetterFlag=='Y'){

				$baseline_begin1=0;
				$baseline_end1=(($kpiDataTarget*20/100)-1);

				$strSQL1="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin1','$baseline_end1','0 ','$id','ไม่ผ่าน');
				";
			    mysql_query($strSQL1);


			    $baseline_begin2=$baseline_end1+1;
				$baseline_end2=(($kpiDataTarget*40/100)-1);
			    $strSQL2="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin2','$baseline_end2','1','$id','ต่ำกว่าเกณฑ์');
				";
			    mysql_query($strSQL2);

			    $baseline_begin3=$baseline_end2+1;
				$baseline_end3=(($kpiDataTarget*60/100)-1);
			    $strSQL3="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin3','$baseline_end3','2','$id','ผ่านเกณฑ์ขั้นต่ำ');
				";
			    mysql_query($strSQL3);

			    $baseline_begin4=$baseline_end3+1;
				$baseline_end4=(($kpiDataTarget*80/100)-1);
			    $strSQL4="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin4','$baseline_end4','3','$id','น่าพอใจ');
				";
			    mysql_query($strSQL4);

			    $baseline_begin5=$baseline_end4+1;
				$baseline_end5=(($kpiDataTarget*100/100)-1);
			    $strSQL5="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin5','$baseline_end5','4','$id','ดี');
				";
			    mysql_query($strSQL5);
			
			    $baseline_begin6=$baseline_end5+1;
				$baseline_end6=$kpiDataTarget*100;
				$strSQL6="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin6','$baseline_end6','5 ','$id','ดีมาก');
				";
			    mysql_query($strSQL6);


			}else{


				$baseline_begin1=0;
				$baseline_end1=$kpiDataTarget;

				$strSQL1="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin1','$baseline_end1','5 ','$id','ดีมาก');
				";
			    mysql_query($strSQL1);


			    $baseline_begin2=$baseline_end1+0.01;
				$baseline_end2=$baseline_begin2+(($kpiDataTarget*20/100));
			    $strSQL2="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin2','$baseline_end2','4','$id','ดี');
				";
			    mysql_query($strSQL2);

			    $baseline_begin3=$baseline_end2+0.01;
				$baseline_end3=$baseline_begin3+(($kpiDataTarget*40/100));
			    $strSQL3="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin3','$baseline_end3','3','$id','น่าพอใจ');
				";
			    mysql_query($strSQL3);

			    $baseline_begin4=$baseline_end3+0.01;
				$baseline_end4=$baseline_begin4+(($kpiDataTarget*60/100));
			    $strSQL4="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin4','$baseline_end4','2','$id','ผ่านเกณฑ์ขั้นต่ำ');
				";
			    mysql_query($strSQL4);

			    $baseline_begin5=$baseline_begin4+0.01;
				$baseline_end5=$baseline_begin5+(($kpiDataTarget*80/100));
			    $strSQL5="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin5','$baseline_end5','1','$id','ต่ำกว่าเกณฑ์');
				";
			    mysql_query($strSQL5);
			
			    $baseline_begin6=$baseline_end5+0.01;
				$baseline_end6=$baseline_begin6+$kpiDataTarget*100;
				$strSQL6="
				INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
				VALUES('$baseline_begin6','$baseline_end6','0 ','$id','ไม่ผ่าน');
				";
			    mysql_query($strSQL6);



		}

		}else if($kpiTypeScore==2){

		
			$strSQL1="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('0','0','0 ','$id','ไม่ผ่าน');
			";
		    mysql_query($strSQL1);

		    $strSQL2="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('1','1','1','$id','ต่ำกว่าเกณฑ์');
			";
		    mysql_query($strSQL2);

		    $strSQL3="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('2','2','2','$id','ผ่านเกณฑ์ขั้นต่ำ');
			";
		    mysql_query($strSQL3);

		    $strSQL4="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('3','3','3','$id','น่าพอใจ');
			";
		    mysql_query($strSQL4);

		    $strSQL5="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('4','4','4','$id','ดี');
			";
		    mysql_query($strSQL5);
		

			$strSQL6="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('5','5','5 ','$id','ดีมาก');
			";
		    mysql_query($strSQL6);

		



	}else if($kpiTypeScore==3){
			$strSQL1="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('0','0','0','$id','ไม่ผ่าน');
			";
		    mysql_query($strSQL1);

		    $strSQL2="
			INSERT INTO baseline(baseline_begin,baseline_end,baseline_score,kpi_id,suggestion)
			VALUES('5','5','5 ','$id','ผ่าน');
			";
		    mysql_query($strSQL2);

	}


	
	

	if(!$mysql_error){
		echo'["success"]';
	}

		
	}else{
		//echo'["error"]';
		echo mysql_error();
	}
	mysql_close($conn);
}

if($_POST['action']=="showData"){
	//echo "Show Data";
	$strSQL="SELECT * FROM kpi  
	where kpi.admin_id='$admin_id' 
	-- and department_id='$departmentId' 
			order by kpi_id  desc";
	$result=mysql_query($strSQL);
	$$tableHTML="";
	$i=1;
	$tableHTML.="<table id='Tablekpi' class='grid table-striped'>";
		$tableHTML.="<colgroup>";
			$tableHTML.="<col style='width:8%' />";
			$tableHTML.="<col  style='width:25%'/>";
			$tableHTML.="<col style='width:25%'/>";
			$tableHTML.="<col style='width:9%'/>";
			$tableHTML.="<col style='width:9%'/>";
		
			/*
			$tableHTML.="<col />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
			$tableHTML.="<col />";
			*/
			
		
		$tableHTML.="</colgroup>";
	$tableHTML.="<thead>";
		$tableHTML.="<tr>";
			$tableHTML.="<th data-field=\"kpi_l_tbl_id\"><b>".$_SESSION['kpi_l_tbl_id']." </b></th>";
			$tableHTML.="<th data-field=\"kpi_l_tbl_kpi_name\"><b>".$_SESSION['kpi_l_tbl_kpi_name']."</b></th>";
			$tableHTML.="<th data-field=\"kpi_l_tbl_kpi_detail\"><b>".$_SESSION['kpi_l_tbl_kpi_detail']." </b></th>";
			$tableHTML.="<th data-field=\"kpi_l_tbl_kpi_better_flag\"><b>".$_SESSION['kpi_l_tbl_kpi_better_flag']."</b></th>";
			$tableHTML.="<th data-field=\"kpi_l_tbl_kpi_type_score\"><b>".$_SESSION['kpi_l_tbl_kpi_type_score']."</b></th>";

			/*
			$tableHTML.="<th><b>Department</b></th>";
			$tableHTML.="<th><b>Division </b></th>";
			$tableHTML.="<th><b>Actual by Query</b></th>";
			$tableHTML.="<th><b>Kpi Target</b></th>";
			*/
			$tableHTML.="<th data-field=\"kpi_l_tbl_manage\" style='text-align:center;'><b>".$_SESSION['kpi_l_tbl_manage']."</b></th>";
			
		$tableHTML.="</tr>";
	$tableHTML.="</thead>";
	$tableHTML.="<tbody class=\"contentkpi\">";
	while($rs=mysql_fetch_array($result)){
		
		if($rs['kpi_type_actual']==1){
			$type_target="<i class='glyphicon glyphicon-ok'></i>";
		}else{
			$type_target="<i class='glyphicon glyphicon-remove'></i>";
		}
		
	
	
	$tableHTML.="<tr>";
	$tableHTML.="	<td>".$rs['kpi_code']."</td>";
	
	$tableHTML.="	<td>".$rs['kpi_name']."</td>";
	
	$tableHTML.="	<td>".$rs['kpi_detail']."</td>";
	$tableHTML.="	<td>".$rs['kpi_better_flag']."</td>";

	$tableHTML.="	<td>";
	if($rs['kpi_type_score']==1){

		$tableHTML.="Baseline";
	}else if($rs['kpi_type_score']==2){

		$tableHTML.="5 points";
	}else if($rs['kpi_type_score']==3){

		$tableHTML.="True/False";
	}else{
		$tableHTML.="Baseline";
	}
	$tableHTML.="	</td>";

	
	/*	
	$tableHTML.="	<td>".$rs['department_name']."</td>";
	$tableHTML.="	<td>".$rs['division_name']."</td>";
	$tableHTML.="	<td>".$type_target."</td>";
	$tableHTML.="	<td>".$rs['kpi_target']."</td>";

	*/
	//echo "kpi_type_score=".$rs['kpi_type_score'];
	

		$tableHTML.="	<td>
			<div style='text-align: center;'>
			<button type='button' id='idKPI-".$rs['kpi_id']."-".$rs['kpi_type_score']."' class=' actionBaseline btn btn-primary btn-xs'><i class='glyphicon glyphicon-transfer'></i></button>

			<button type='button' id='idEdit-".$rs['kpi_id']."' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>
			
			<button type='button' id='idDel-".$rs['kpi_id']."' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>
			
				</div>	
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
	
	$strSQL="DELETE FROM kpi WHERE kpi_id='$id'";
	$result=mysql_query($strSQL);
	if($result){

		$strSQL2="delete from  baseline  WHERE kpi_id='$id'";
		$result2=mysql_query($strSQL2);

		echo'["success"]';
	}else{
		echo'["error"]';
	}
	mysql_close($conn);
	
}
if($_POST['action']=="edit"){
	$id=$_POST['id'];

	$strSQL="SELECT * FROM kpi WHERE kpi_id='$id'";
	$result=mysql_query($strSQL);
	if($result){
		$rs=mysql_fetch_array($result);
		
		//echo "[{\"abc\":$rs[kpi_id],\"def\":\"22\"}]";
		
		 echo "[{\"kpi_id\":\"$rs[kpi_id]\",\"kpi_code\":\"$rs[kpi_code]\",\"kpi_name\":\"$rs[kpi_name]\",\"kpi_better_flag\":\"$rs[kpi_better_flag]\",
		 		\"kpi_detail\":\"$rs[kpi_detail]\",\"department_id\":\"$rs[department_id]\",\"division_id\":\"$rs[division_id]\",\"kpi_actual_query\":\"$rs[kpi_actual_query]\",\"kpi_actual_manual\":\"$rs[kpi_actual_manual]\",\"kpi_type_actual\":\"$rs[kpi_type_actual]\",\"kpi_target\":\"$rs[kpi_target]\",\"kpi_type_score\":\"$rs[kpi_type_score]\",\"kpi_data_target\":\"$rs[kpi_data_target]\"}]";
		 
	}else{
		echo'["error"]';
	}
	
	mysql_close($conn);
}
if($_POST['action']=="editAction"){
	


	$strSQL="UPDATE kpi SET kpi_name='$kpiName',kpi_better_flag='$kpiBetterFlag',kpi_detail='$kpiDetail',
	kpi_code='$kpiCode',department_id='$departmentId'
	WHERE kpi_id='$kpiId'";
	$result=mysql_query($strSQL);
	if($result){
		echo'["editSuccess"]';
	}else{
		echo'["error"]'.mysql_error();
	}

	mysql_close($conn);
}

}else{
echo'{"status":"400","error":"not token."}';

}


