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
                <th>มุมมองธุรกิจ</th>
                <th style="text-align: right;">น้ำหนัก</th>
               
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td style="text-align: right;">25%</td>
               
            </tr>
            <tr>
                <td>มุมมองด้านการเรียนรู้และการเติบโต</td>
                <td style="text-align: right;">25%</td>
               
            </tr>
            <tr>
                <td>มุมมองทางด้านการเงิน</td>
                <td style="text-align: right;">25%</td>
                
            </tr>
            <tr>
                <td>มุมมองทางด้านลูกค้า</td>
                <td style="text-align: right;">25%</td>
                
            </tr>
        </tbody>
</table>
<?php
}else{
	echo'{"status":"400","error":"not token."}';
}
?>