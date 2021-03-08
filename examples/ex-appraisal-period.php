<? session_start(); ob_start();?>
<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){
?>
<table class="table">
        <thead>
            <tr>
                <th>ปีประเมิน</th>
                <th>ช่วงประเมิน</th>
                <th>เริ่ม</th>
                <th>ถึง</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2021</td>
                <td>ครั้งที่ 1</td>
                <td>2021-01-01</td>
                <td>2021-03-30</td>
            </tr>
            <tr>
                <td>2021</td>
                <td>ครั้งที่ 2</td>
                <td>2021-06-01</td>
                <td>2021-06-30</td>
            </tr>
            <tr>
                <td>2021</td>
                <td>ครั้งที่ 3</td>
                <td>2021-09-01</td>
                <td>2021-09-30</td>
            </tr>
            <tr>
                <td>2021</td>
                <td>ครั้งที่ 4</td>
                <td>2021-12-01</td>
                <td>2021-12-31</td>
            </tr>
        </tbody>
</table>
<?php
}else{
	echo'{"status":"400","error":"not token."}';
}
?>