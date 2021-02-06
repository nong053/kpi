<? session_start(); ob_start();?>
<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if ($jsonArray["login_status"] == 1) {

    $admin_id = $_SESSION['admin_id'];
    $year = $_POST['year'];
    $appraisal_period_id = $_POST['appraisal_period_id'];
    $department_id = $_POST['department_id'];
    $position_id = $_POST['position_id'];
    $emp_id = $_POST['emp_id'];
    $kpi_id = $_POST['kpi_id'];
    $kpi_weight = $_POST['kpi_weight'];




    $assign_kpi_id = $_POST['assign_kpi_id'];
    $target_data = $_POST['kpi_target_data'];
    $kpi_type_actual = $_POST['kpi_type_actual'];
    $kpi_actual_manual = $_POST['kpi_actual_manual'];
    $kpi_actual_query = $_POST['kpi_actual_query'];
    $target_score = $_POST['target_score'];
    $total_kpi_actual_score = $_POST['total_kpi_actual_score'];
    $kpi_actual_score = $_POST['kpi_actual_score'];
    $performance = $_POST['performance'];
    $score_sum_percentage = $_POST['score_sum_percentage'];
    $assignAll = $_POST['assignAll'];



    

    if($_POST['action'] == "delAllKpiAssignEmp"){
       

        $strSQL = "
        DELETE FROM assign_evaluate_kpi 
        WHERE 
        assign_kpi_year='".$year."' 
            and (appraisal_period_id='".$appraisal_period_id."' or 'All' = '".$appraisal_period_id."')
            and (department_id='".$department_id."' or 'All' = '".$department_id."') 
            and (position_id='".$position_id."' or 'All' = '".$position_id."')
            and (emp_id='".$emp_id."' or 'All' = '".$emp_id."')
        ";

        $result = mysql_query($strSQL);
        if ($result) {
            echo '["success"]';
        }else{
            echo mysql_error();
        }


    }
    if($_POST['action'] == "delByKpiAssignEmp"){
       

        $strSQL = "
        DELETE FROM assign_evaluate_kpi 
        WHERE 
        assign_kpi_year='".$year."' 
            and (appraisal_period_id='".$appraisal_period_id."')
            and (department_id='".$department_id."') 
            and (position_id='".$position_id."')
            and (emp_id='".$emp_id."')
            and (kpi_id='".$kpi_id."')
        ";

        $result = mysql_query($strSQL);
        if ($result) {
            echo '["success"]';
        }else{
            echo mysql_error();
        }


    }


    if ($_POST['action'] == "add") {

        $error_count = "";





        $strSQLUpdate = "
		UPDATE assign_evaluate_kpi SET confirm_flag='N', updated_dt='" . date("Y-m-d H:i:s") . "'
		where (assign_kpi_year='$year' or '$year'='All') 
			and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
			and (department_id='$department_id' or '$department_id'='All')
            and (position_id='$position_id' or '$position_id'='All')
            and (emp_id='$emp_id' or '$emp_id'='All')
			and admin_id='$admin_id'
			";

        $rsResultUpdate = mysql_query($strSQLUpdate);
        if (!$rsResultUpdate) {
            echo mysql_error();
        } 


        $strSQLseleAppraisalPeriod = "

				select appraisal_period_id,appraisal_period_desc
				from appraisal_period 
				where  appraisal_period_year ='$year'
				and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
				and admin_id='$admin_id'
				ORDER BY appraisal_period_id ASC
			
			";
        $resultSelectAppraisalPeriod = mysql_query($strSQLseleAppraisalPeriod);
        while ($rsSelecAppraisalPeriod = mysql_fetch_array($resultSelectAppraisalPeriod)) {

            // echo "<br>loop appraisal_period " . $rsSelecAppraisalPeriod['appraisal_period_id'];
            // echo "<br>";



            $strSQLEmployee = "
                        select e.*,pe.position_name,r.role_name,d.department_name
                        from employee e
                        INNER JOIN position_emp pe on e.position_id=pe.position_id
                        INNER JOIN role r on e.role_id=r.role_id
                        INNER JOIN department d on e.department_id=d.department_id
                        where (e.department_id='$department_id' or '$department_id' ='All')
                        and (e.position_id='$position_id' or '$position_id' ='All')
                        and (e.emp_id='$emp_id' or '$emp_id' ='All')
                        and e.emp_status_work_id='1'
                        and e.admin_id='$admin_id'
                        
                        ";

            $resultEmployee = mysql_query($strSQLEmployee);
            while ($rsEmployee = mysql_fetch_array($resultEmployee)) {


                // echo "<br>--------------------department" . $rsEmployee['department_id'];
                // echo "<br>--------------------position" . $rsEmployee['position_id'];
                // echo "<br>--------------------employee " . $rsEmployee['emp_id'];
                // echo "<br>";


                /*
                $strSQL = " select if(kpi.kpi_better_flag='Y',max(base.baseline_begin),min(base.baseline_end)) as max_baseline_data,
                            max(base.baseline_score)as max_baseline_score 
                            from kpi
                            left JOIN baseline base 
                            on kpi.kpi_id=base.kpi_id
                            where kpi.kpi_id='$kpi_id'
                            GROUP BY kpi.kpi_id";

                $result = mysql_query($strSQL);
                $rs = mysql_fetch_array($result);
                echo "[{\"kpi_target_data\":\"$rs[max_baseline_data]\",\"target_score\":\"$rs[max_baseline_score]\"}]";
                */

                $strSQL = "INSERT INTO assign_evaluate_kpi(
                                                        assign_kpi_year,
                                                        appraisal_period_id,
                                                        department_id,
                                                        position_id,
                                                        emp_id,
                                                        kpi_id,
                                                        kpi_weight,

                                                        -- kpi_type_actual,
                                                        -- target_data,
                                                        -- target_score,
                                                        created_dt,
                                                        admin_id)
									VALUES(

										'$year',
										'" . $rsSelecAppraisalPeriod['appraisal_period_id'] . "',
                                        '" . $rsEmployee['department_id'] . "',
										'" . $rsEmployee['position_id'] . "',
                                        '" . $rsEmployee['emp_id'] . "',
                                        '$kpi_id',
										'$kpi_weight',

										-- '0',
										-- '$target_data',
										-- '$target_score',
                                        '".date('Y-m-d H:i:s')."',
										'$admin_id'
									)";

                $rs = mysql_query($strSQL);
                if (!$rs) {
                    $error_count = 1;
                }
            }
        }

        if ($error_count == 0) {
            echo '["success"]';
        } else {

           
            if(mysql_errno()==1062){
                echo '["key-duplicate"]';
                //echo "{\"error\":\"duplicateKey\"}";
            }else{
                echo mysql_error();
            }
            
        }



        //Loop insert kpi if select All param into assign end



        mysql_close($conn);
    }

    

if ($_POST['action'] == "showEmpData") {

    $tableHTML = "";
    $strSQLseleAppraisalPeriod = "

    select appraisal_period_id,appraisal_period_desc
    from appraisal_period 
    where  appraisal_period_year ='$year'
    and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
    and admin_id='$admin_id'
    ORDER BY appraisal_period_id ASC

";
$resultSelectAppraisalPeriod = mysql_query($strSQLseleAppraisalPeriod);
while ($rsSelecAppraisalPeriod = mysql_fetch_array($resultSelectAppraisalPeriod)) 
{

    //$tableHTML .= "<br>loop appraisal_period " . $rsSelecAppraisalPeriod['appraisal_period_id'];
    

    /*
     <div class='object-float-right '>
                            <input type=\"button\" id=\"del_all_kpi_assign\" name=\"del_all_kpi_assign\" value=ยกเลิกมอบหมาย".$rs['']." class=\"btn btn-danger btn-lg\">		
                            <input type=\"button\" id=\"kpi_process\" name=\"kpi_process\" value=".$_SESSION['assign_l_des_btn_confirm']." class=\"btn btn-warning btn-lg\">
                            <button class=\"btn btn-primary btn-lg\" id=\"addAssignKPI\" type=\"button\"><i class=\"glyphicon  glyphicon-plus\"></i>"
                                .$_SESSION['assign_l_des_btn_add']."
                            </button>
                        </div>

    */
    $tableHTML .= "
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">
                        <div class='object-float-left '>
                            <h3>มอบหมายตัวชี้วัดรอบประเมิน".$rsSelecAppraisalPeriod['appraisal_period_desc']."</h3>
                        </div>
                       
                        <br style='clear:both;'>
                    </h3>
                    </div>
                    <div class=\"panel-body\" style='padding:10px;'>        
    ";
    

        $strSQL = "
	select e.*,pe.position_name,r.role_name,d.department_name
	from employee e
	INNER JOIN position_emp pe on e.position_id=pe.position_id
	INNER JOIN role r on e.role_id=r.role_id
	INNER JOIN department d on e.department_id=d.department_id
	where (e.department_id='$department_id' or '$department_id' ='All')
    and (e.position_id='$position_id' or '$position_id' ='All')
    and (e.emp_id='$emp_id' or '$emp_id' ='All')
	and e.emp_status_work_id='1'
	and e.admin_id='$admin_id'
	order by e.emp_id

	";

        $result = mysql_query($strSQL);
       
        $i = 1;
        $tableHTML .= "
        
        <table id='Tableemployee' class='table'>";
        $tableHTML .= "<colgroup>";
        $tableHTML .= "<col style='width:10%' />";
        $tableHTML .= "<col style='width:80%' />";

        $tableHTML .= "</colgroup>";
        // $tableHTML .= "<thead>";
        // $tableHTML .= "<tr>";
        // $tableHTML .= "<th style='text-align:center;' data-field=\"column2\"></th>";
        // $tableHTML .= "<th data-field=\"column3\"></th>";

        // $tableHTML .= "</tr>";
        // $tableHTML .= "</thead>";
        $tableHTML .= "<tbody class='contentemployee'>";
        while ($rs = mysql_fetch_array($result)) {

            $tableHTML .= "<tr>
            <div>
            ";
            $tableHTML .= "<td style='text-align:center;'>";


            $tableHTML .= "<div class='thumbnail' style='width:200px; margin-top:10px;'>";
            if (empty($rs['emp_picture_thum'])) {
                $tableHTML .= "	<img style='opacity:0.1;' src=\"../view/uploads/avatar.jpg\" >";
            } else {
                $tableHTML .= "	<img  src=\"" . $rs['emp_picture_thum'] . "\" >";
            }
            $tableHTML .= " 
					<div class='caption'>";

            $tableHTML .= "<p class='emp-text-left'>";
            $tableHTML .= "<b>" . $rs['emp_first_name'] . " " . $rs['emp_last_name'] . "</b>";
            $tableHTML .= "<br>" . $rs['department_name'];
            $tableHTML .= "<br> ตำแหน่ง" . $rs['position_name'];
            $tableHTML .= "</p>";
            $tableHTML .= " 
					</div>
					</div>";


            $tableHTML .= "</td>";
            $tableHTML .= "<td>";
            $tableHTML .= "
            <div class='alert alert-warning' style='margin-top:10px;'>
            
					 <div class='col-md-6 object-text-left'>
					  <span class='head-box-assign'  id=\"status_confirm_flag-".$year."-".$rsSelecAppraisalPeriod['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."\" >ยังไม่ส่งประเมิน</span>
                     </div>
                     
					 <div class='col-md-6 object-text-right'>
					 <button class='btn btn-warning sendKpiAssignByEmp' id='assignKpiByEmp-".$year."-".$rsSelecAppraisalPeriod['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."'>ส่งประเมิน</button>
					 <button class='btn btn-primary assignKpiByEmp' id='sendKpiAssignByEmp-".$year."-".$rsSelecAppraisalPeriod['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."'>มอบหมายตัวชี้วัด</button>
					 </div>
					 <br style='clear:both'>
			</div>";

            $tableHTML .= "<table class='table' >";
            $tableHTML .= "<thead>";
            $tableHTML .= "<tr>";
            $tableHTML .= "<th style='padding-left:15px;'>";
            $tableHTML .= "ตัวชี้วัด";
            $tableHTML .= "</th>";
            $tableHTML .= "<th style='text-align:right'>";
            $tableHTML .= "น้ำหนักตัวชี้วัด";
            $tableHTML .= "</th>";
            $tableHTML .= "<th style='text-align:right'>";
            $tableHTML .= "จัดการ";
            $tableHTML .= "</th>";

            //$tableHTML.="</th>";
            $tableHTML .= "</thead'>";
            $tableHTML .= "<tbody'>";

            $strKPIByEmpSQL = "
            SELECT ae.kpi_id ,k.kpi_name,ae.kpi_weight,assign_kpi_year,confirm_flag,

            (SELECT sum(ae.kpi_weight) 
            FROM assign_evaluate_kpi ae
            inner join kpi k on ae.kpi_id=k.kpi_id
            where ae.assign_kpi_year=".$year."
            and ae.appraisal_period_id=".$rsSelecAppraisalPeriod['appraisal_period_id']."
            and ae.department_id=".$rs['department_id']."
            and ae.position_id=".$rs['position_id']."
            and ae.emp_id=".$rs['emp_id']."
            group by ae.emp_id
            ) as total_weight_kpi_by_emp

            FROM assign_evaluate_kpi ae
            inner join kpi k on ae.kpi_id=k.kpi_id
            where ae.assign_kpi_year=".$year."
            and ae.appraisal_period_id=".$rsSelecAppraisalPeriod['appraisal_period_id']."
            and ae.department_id=".$rs['department_id']."
            and ae.position_id=".$rs['position_id']."
            and ae.emp_id=".$rs['emp_id']."

            ";

        $resultKPIByEmp = mysql_query($strKPIByEmpSQL);
        $total_weight_kpi_by_emp=0;
        $confirm_flag="";
        while ($rsKPIByEmp = mysql_fetch_array($resultKPIByEmp)) {
            $confirm_flag=$rsKPIByEmp['confirm_flag'];
            $total_weight_kpi_by_emp=$rsKPIByEmp['total_weight_kpi_by_emp'];
            $tableHTML .= "<tr >";
                $tableHTML .= "<td style='padding-left:15px;' id='kpiName-".$rsKPIByEmp['assign_kpi_year']."-".$rsSelecAppraisalPeriod['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."-".$rsKPIByEmp['kpi_id']."'>";
                $tableHTML .= $rsKPIByEmp['kpi_name'];
                $tableHTML .= "</td>";
                $tableHTML .= "<td style='text-align:right'>";
                $tableHTML .= "
                
                <span style='display:none;' class='total_kpi_weight_assign_to_emp_id-".$rs['emp_id']."'>".$rsKPIByEmp['total_weight_kpi_by_emp']."</span>
                <span id='kpi_weight_assign_to_emp_id-".$rs['emp_id']."-".$rsKPIByEmp['kpi_id']."'>
                ".$rsKPIByEmp['kpi_weight']."</span>%";

                $tableHTML .= "</td>";
                $tableHTML .= "<td>";
                $tableHTML .= "<div style=\"text-align: right;\">
                                    <button type=\"button\" id=\"idEdit-".$rsKPIByEmp['assign_kpi_year']."-".$rsSelecAppraisalPeriod['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."-".$rsKPIByEmp['kpi_id']."\" class=\"actionEdit btn btn-primary \"><i class=\"glyphicon glyphicon-pencil\"></i></button>
                                    <button type=\"button\" id=\"idDel-".$rsKPIByEmp['assign_kpi_year']."-".$rsSelecAppraisalPeriod['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."-".$rsKPIByEmp['kpi_id']."\" class=\" actionDel btn btn-danger \"><i class=\"glyphicon glyphicon-trash\"></i></button>
                               </div>";
                $tableHTML .= "</td>";
            $tableHTML .= "</tr>";

        }
            $tableHTML .= "</tbody>";

            $tableHTML .= "<tfoot >";
            if($total_weight_kpi_by_emp==100){
                if($confirm_flag=='Y'){
                    $tableHTML .= "<tr id='check_status-".$year."-".$rsSelecAppraisalPeriod['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='alert-info status_complete confirm_flag_complete' style='font-weight:bold;font-size:20px; '>";
                }else{
                    $tableHTML .= "<tr id='check_status-".$year."-".$rsSelecAppraisalPeriod['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='alert-info status_complete' style='font-weight:bold;font-size:20px; '>";
                }
            }else{
                $tableHTML .= "<tr id='check_status-".$year."-".$rsSelecAppraisalPeriod['appraisal_period_id']."-".$rs['department_id']."-".$rs['position_id']."-".$rs['emp_id']."' class='alert-danger status_not_complete' style='font-weight:bold;font-size:20px; '>";
            }
            $tableHTML .= "       
                        
                            <td style='text-align:right; padding:10px 0 10px 0;'>
                            น้ำหนักตัวชี้วัดรวม
                            </td>
                            <td style='text-align:right; padding:10px 0 10px 0;'>
                            ".$total_weight_kpi_by_emp."%
                            </td>
                            <td></td>

                        </tr>   
            ";

            $tableHTML .= "</tfoot>
               
            ";
            
            $tableHTML .= "</table>";
            $tableHTML .= "</td>";
            $tableHTML .= "</tr>
            ";
        
        }
        $tableHTML .= "</tbody>";
        $tableHTML .= "</table>
           
            </div>
            
        </div>
        
            ";


    }

        echo $tableHTML;
        mysql_close($conn);
    }





    if ($_POST['action'] == "showData") {
        //echo "Show Data";
        $strSQL = "

	select ak.appraisal_period_id,ak.assign_kpi_id,ak.kpi_id,kpi_name,ak.kpi_weight,ak.target_data,ak.target_score,ak.kpi_type_actual,ak.kpi_actual_manual,ak.kpi_actual_query,ak.confirm_flag
	from assign_kpi_master ak
	left JOIN kpi
	on ak.kpi_id=kpi.kpi_id
	where (ak.assign_kpi_year='$year' or '$year'='All')
    and (ak.appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
	and (ak.position_id='$position_id' or '$position_id'='All')
	and (ak.department_id='$department_id' or '$department_id'='All')
	and ak.admin_id='$admin_id' 
	";



        $result = mysql_query($strSQL);
        $tableHTML = "";
        $i = 1;
        $tableHTML .= "<table id='TableassignKpi' class=' table grid table-striped'>";
        $tableHTML .= "<colgroup>";
        $tableHTML .= "<col style='width:5%' />";
        $tableHTML .= "<col  style='width:45%'/>";
        $tableHTML .= "<col />";
        $tableHTML .= "<col />";

        $tableHTML .= "</colgroup>";
        $tableHTML .= "<thead>";
        $tableHTML .= "<tr>";
        $tableHTML .= "<th data-field=\"column1\"><b>" . $_SESSION['assign_l_tbl_id'] . "</b></th>";
        $tableHTML .= "<th data-field=\"column2\"><b>" . $_SESSION['assign_l_tbl_kpi_name'] . "</b></th>";
        $tableHTML .= "<th data-field=\"column3\"><b>" . $_SESSION['assign_l_tbl_weight'] . "</b></th>";
        $tableHTML .= "<th data-field=\"column4\"><b>" . $_SESSION['assign_l_tbl_target'] . " </b></th>";
        //$tableHTML.="<th data-field=\"column5\"><b>Actual</b></th>";
        $tableHTML .= "<th data-field=\"column6\"><b>" . $_SESSION['assign_l_tbl_target_score'] . " </b></th>";
        $tableHTML .= "<th data-field=\"column7\" style='text-align:center;'><b>" . $_SESSION['assign_l_tbl_manage'] . "</b></th>";


        $tableHTML .= "</tr>";
        $tableHTML .= "</thead>";

        while ($rs = mysql_fetch_array($result)) {

            if ($rs['kpi_type_actual'] == "0") {
                $kpi_actual = $rs['kpi_actual_manual'];
            } else {
                $kpi_actual = $rs['kpi_actual_query'];
            }
            $tableHTML .= "<tbody class=\"contentassignKpi\">";
            $tableHTML .= "<tr>";
            $tableHTML .= "	<td>" . $i . "</td>";
            $tableHTML .= "	<td>" . $rs['kpi_name'] . "</td>";
            $tableHTML .= "	<td>" . number_format((float)$rs['kpi_weight'], 2, '.', '') . "</td>";
            $tableHTML .= "	<td>" . number_format((float)$rs['target_data'], 2, '.', '') . "</td>";
            //$tableHTML.="	<td>".number_format((float)$kpi_actual, 2, '.', '')."</td>";
            $tableHTML .= "	<td>" . number_format((float)$rs['target_score'], 2, '.', '') . "</td>";

            $tableHTML .= "	<td>
		<div style='text-align:center;'>";


          
            $tableHTML .= "
			<button type='button' id='idEdit-" . $rs['assign_kpi_id'] . "' class='actionEdit btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></button>";
            $tableHTML .= "

			<button type='button' id='idDel-" . $rs['assign_kpi_id'] . "-" . $rs['kpi_id'] . "' class=' actionDel btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></button>";


            $tableHTML .= "
			
		 </div>
			</td>";
            $tableHTML .= "</tr>";

            $i++;
        }
        $tableHTML .= "</tbody>";
        $tableHTML .= "</table>";
        echo $tableHTML;
        mysql_close($conn);
    }
    if ($_POST['action'] == "del") {
        $id = $_POST['id'];
        $kpi_id = $_POST['kpi_id'];




        $strSQL = "DELETE FROM assign_kpi_master WHERE assign_kpi_id=$id and admin_id='$admin_id'";


        $strSQLAssignKpi = "DELETE FROM assign_kpi WHERE  assign_kpi_year='$year' and department_id='$department_id' and  appraisal_period_id='$appraisal_period_id'  and admin_id='$admin_id'";
        $resultAssignKpi = mysql_query($strSQLAssignKpi);


        $strSQLKpiResult = "DELETE FROM kpi_result WHERE  kpi_year='$year' and department_id='$department_id' and  appraisal_period_id='$appraisal_period_id'  and admin_id='$admin_id'";
        $resultKpiResult = mysql_query($strSQLKpiResult);




        $result = mysql_query($strSQL);
        if ($result) {
            echo '["success"]';

            $strSQLUpdate = "
		UPDATE assign_kpi_master SET confirm_flag='N', updated_dt='" . date("Y-m-d H:i:s") . "'
				where (assign_kpi_year='$year' or '$year'='All')
				and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
				and (department_id='$department_id' or '$department_id'='All')
				and (position_id='$position_id' or '$position_id'='All')
				and admin_id='$admin_id'
			";

            $rsResultUpdate = mysql_query($strSQLUpdate);
            if (!$rsResultUpdate) {
                echo mysql_error();
            }

            // check count rows assign_kpi_master



        } else {
            echo '["error"]';
        }
        mysql_close($conn);
    }
    if ($_POST['action'] == "removeAssignKPIs") {
        /*
	echo "yeaer=".$year;
	echo "appraisal_period_id=".$appraisal_period_id ;
	echo "department_id=".$department_id;
	echo "position_id=".$position_id;
	echo "admin_id=".$admin_id;
	
	action	removeAssignKPIs
	appraisal_period_id	22
	department_id	11
	employee_id	20
	position_id	10
	year	2015


	*/
        $strSQL = "DELETE FROM assign_kpi_master  
			WHERE  assign_kpi_year='$year'
			and appraisal_period_id='$appraisal_period_id'
			and department_id='$department_id'
			and position_id='$position_id'
			and admin_id='$admin_id'
		";
        $result = mysql_query($strSQL);

        if ($result) {

            echo '["success"]';
        }
    }
    if ($_POST['action'] == "edit") {
        $id = $_POST['id'];

        $strSQLAssignKpi = "DELETE FROM assign_kpi WHERE  assign_kpi_year='$year' and department_id='$department_id' and  appraisal_period_id='$appraisal_period_id'  and admin_id='$admin_id'";
        $resultAssignKpi = mysql_query($strSQLAssignKpi);

        $strSQLKpiResult = "DELETE FROM kpi_result WHERE  kpi_year='$year' and department_id='$department_id' and  appraisal_period_id='$appraisal_period_id'  and admin_id='$admin_id'";
        $resultKpiResult = mysql_query($strSQLKpiResult);


        $strSQL = "SELECT * FROM assign_kpi_master WHERE assign_kpi_id=$id and admin_id='$admin_id'";
        $result = mysql_query($strSQL);
        if ($result) {
            $rs = mysql_fetch_array($result);

            /*
		kpi_id
		kpi_weight
		target_data
		kpi_type_actual
		kpi_actual_manual
		kpi_actual_query
		target_score
		*/

            echo "[{\"assign_kpi_id\":\"$rs[assign_kpi_id]\",\"assign_kpi_year\":\"$rs[assign_kpi_year]\",
		 		\"appraisal_period_id\":\"$rs[appraisal_period_id]\",
	\"position_id\":\"$rs[position_id]\",\"kpi_id\":\"$rs[kpi_id]\",
	\"kpi_weight\":\"$rs[kpi_weight]\",\"target_data\":\"$rs[target_data]\",\"kpi_type_actual\":\"$rs[kpi_type_actual]\",
	\"kpi_actual_manual\":\"$rs[kpi_actual_manual]\",\"kpi_actual_query\":\"$rs[kpi_actual_query]\",\"target_score\":\"$rs[target_score]\",
	\"department_id\":\"$rs[department_id]\",\"total_kpi_actual_score\":\"$rs[total_kpi_actual_score]\",
	\"kpi_actual_score\":\"$rs[kpi_actual_score]\",\"performance\":\"$rs[performance]\"
	}]";
        } else {
            echo '["error"]';
        }

        mysql_close($conn);
    }
    if ($_POST['action'] == "editAction") {
        /*
	
	year
	appraisal_period_id
	position1
	employee
	perspective
	
	
	assign_kpi_id
	assign_kpi_year
	appraisal_period_id
	position_id
	
	kpi_id
	kpi_weight
	target_data
	kpi_type_actual
	kpi_actual_manual
	kpi_actual_query
	target_score
	*/

        $strSQL = "UPDATE assign_evaluate_kpi 
        SET 
        
        kpi_weight='$kpi_weight'
	WHERE   assign_kpi_year='$year'
        and appraisal_period_id='$appraisal_period_id'
        and department_id='$department_id'
        and position_id='$position_id'
        and emp_id='$emp_id'
        and kpi_id='$kpi_id'
        and admin_id='$admin_id'";
            
        $result = mysql_query($strSQL);
        
        if ($result) {
            echo '["editSuccess"]';
            /*
            $strSQLUpdate = "
		UPDATE assign_kpi_master SET confirm_flag='N', updated_dt='" . date("Y-m-d H:i:s") . "'
				where (assign_kpi_year='$year' or '$year'='All')
				and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
				and (department_id='$department_id' or '$department_id'='All')
				and (position_id='$position_id' or '$position_id'='All')
				and admin_id='$admin_id'
		";


            $rsResultUpdate = mysql_query($strSQLUpdate);
            if (!$rsResultUpdate) {
                echo mysql_error();
            } else {
            }
        } else {
            echo '["error"]' . mysql_error();
        }
        */

        mysql_close($conn);
    }else{
        echo '["error"]' . mysql_error();
    }
}


    


    if ($_POST['action'] == "confrimKpi") {


        

        $strSQLUpdate = "
		UPDATE assign_evaluate_kpi SET confirm_flag='Y', updated_dt='" . date("Y-m-d H:i:s") . "'
		where (assign_kpi_year='$year' or '$year'='All') 
			and (appraisal_period_id='$appraisal_period_id' or '$appraisal_period_id'='All')
			and (department_id='$department_id' or '$department_id'='All')
            and (position_id='$position_id' or '$position_id'='All')
            and (emp_id='$emp_id' or '$emp_id'='All')
			and admin_id='$admin_id'
			";

        $rsResultUpdate = mysql_query($strSQLUpdate);
        if (!$rsResultUpdate) {
            echo mysql_error();
        } else {
            echo '["success"]';
        }
    }

    




    
} else {
    echo '{"status":"400","error":"not token."}';
}
