<? session_start(); ob_start();?>
<?php
include './../config.inc.php';

// Convert JSON string to Array
$json = $JWT->decode($token_data, $key);
$jsonArray = json_decode($json, true);
if($jsonArray["login_status"]==1){
?>
<style>
.test-right{
    text-align: right;
}
</style>
<!--
มุมมองทางด้านกระบวนการ
มุมมองด้านการเรียนรู้และการเติบโต
มุมมองทางด้านการเงิน
มุมมองทางด้านลูกค้า
-->

<!-- <select>
    <option>เลือกกลุ่มตัวอย่างตัวชี้วัด</option>
    <option>การขายและการตลาด</option>
</select> -->
<table class="table" id="sale-marketing-kpi">
        <thead>
            <tr>
                <th>ตัวชี้วัด</th>
                <th>มุมมองธุรกิจ</th>
                <th>ประเภทตัวชี้วัด</th>
                <th>การคิดคะแนน</th>
                <th class="test-right">เป้า</th>
            </tr>
        </thead>
        <tbody>
            <tr class="cate-1">
                <td>มูลค่ายอดขาย</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">1,000,000</td>
            </tr>
            <tr class="cate-1">
                <td>จำนวนสินค้า (ชิ้น/ประเภท)</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>
            <tr class="cate-1">
                <td>จำนวนรายของลูกค้าใหม่</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">500</td>
            </tr>
            <tr class="cate-1">
                <td>จำนวนรายของลูกค้าใหม่ที่เข้าเยี่ยม</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
                
            </tr>
            <tr class="cate-1">
                <td>% ลูกค้าใหม่ที่ซื้อสินค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">60%</td>
            </tr>
            <tr class="cate-1">
                <td>จำนวนลูกค้าใหม่สะสม</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">2,000</td>
            </tr>
            <tr class="cate-1">
                <td>% ที่ลูกค้ารู้จักสินค้า/บริการ/บริษัท(แบบสำรวจ)</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">70%</td>
            </tr>
            <tr class="cate-1">
                <td>จำนวนสินค้าที่ขายได้</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">1,000</td>
            </tr>
            <tr class="cate-1">
                <td>จำนวนลูกค้าใหม่ที่ได้จากการแนะนำของลูกค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>
            <tr class="cate-1">
                <td>จำนวนลูกค้าใหม่ที่ได้จากสื่อโฆษณา</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">300</td>
            </tr>
            <tr class="cate-1">
                <td>จำนวนลูกค้าที่ติดต่อเข้ามาเอง</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>
            <tr class="cate-1">
                <td>จำนวนลูกค้าใหม่ที่เกิดจากการจัดสัมมนา/แสดงสินค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">200</td>
            </tr>
            <tr class="cate-1">
                <td>% ส่วนแบ่งการตลาด</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
            <tr class="cate-1">
                <td>ยอดสั่งซื้อเฉลี่ยต่อราย</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">3,000</td>
            </tr>


            <tr class="cate-1">
                <td> % การประเมินศักยภาพของลูกค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
           
            <tr class="cate-1">
                <td>ระยะเวลาในการชำระเงิน</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งน้อยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>
                <tr class="cate-1">
                <td>% ส่วนลดต่อยอดขาย</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งน้อยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">20%</td>
            </tr>
                <tr class="cate-1">
                <td>สัดส่วนของลูกค้าเกรด A-B-C</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>1-5 คะแนน</td>
                <td class="test-right">5</td>
            </tr>
                <tr class="cate-1">
                <td>% การตอบรับจากลูกค้าเทียบกับที่นำเสนอทั้งหมด</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
                <tr class="cate-1">
                <td>% ครั้งของการแก้ไขที่เกินกว่ามาตรฐานที่กำหนด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งนอยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
                <tr class="cate-1">
                <td>จำนวนครั้งของปัญหาที่เกิดจากการไม่ปฏิบัติตามระบบฯ</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">10</td>
            </tr>
                <tr class="cate-1">
                <td>% ใบเสนอราคาที่ขายไม่ได้เนื่องจากส่งใบเสนอราคาไม่ทัน</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>
                <tr class="cate-1">
                <td>มูลค่ายอดขาย</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">10,000,000</td>
            </tr>
                <tr class="cate-1">
                <td>ปริมาณยอดขาย</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">3,000,000</td>
            </tr>
                
                <tr class="cate-1">
                <td>% ส่วนแบ่งการตลาด</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">50%</td>
            </tr>
                
                <tr class="cate-1">
                <td>% ลูกค้าที่ซื้อต่อเนื่อง</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
                <tr class="cate-1">
                <td>ยอดขายเฉลี่ยต่อบิล</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">4,000</td>
            </tr>
                <tr class="cate-1">
                <td>จำนวนลูกค้าที่ไม่มีการสั่งซื้อ</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งน้อยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">10</td>
            </tr>
                <tr class="cate-1">
                <td>จำนวนครั้งในการเยี่ยมลูกค้า/เดือน</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">400</td>
            </tr>
                <tr class="cate-1">
                <td>จำนวนรายในการเยี่ยมลูกค้า/เดือน</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">1,000</td>
            </tr>
                <tr class="cate-1">
                <td>% ส่วนลด</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งน้อยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
                <tr class="cate-1">
                <td>% ลูกค้าที่ชำระเงินตรงเวลา</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
                <tr class="cate-1">
                <td>% มูลค่าที่ชำระเงินตรงเวลา</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
                <tr class="cate-1">
                <td>ยอดขายเฉลี่ยต่อการเยี่ยมหนึ่งครั้ง</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">3,000</td>
            </tr>
                <tr class="cate-1">
                <td>จำนวนข้อร้องเรียน</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">10</td>
            </tr>
                <tr class="cate-1">
                <td>จำนวนครั้งที่คืนสินค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งน้อยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">10</td>
            </tr>
                <tr class="cate-1">
                <td>% ลูกค้าที่นำเครืองไปทดลองใช้และไม่ซื้อสินค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งน้อยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">20%</td>
            </tr>
                <tr class="cate-1">
                <td>คะแนนแบบสอบถามความพึงพอใจของลูกค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>1-5 คะแนน</td>
                <td class="test-right">5</td>
            </tr>
                <tr class="cate-1">
                <td>% ลูกค้าที่สั่งซื้อเพิ่มขึ้น (ปริมาณ/รายการสินค้า)</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
                <tr class="cate-1">
                <td>จำนวนลูกค้าที่แนะนำลูกค้าใหม่</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">800</td>
            </tr>
                <tr class="cate-1">
                <td>% ที่ส่งของไม่ทันกำหนดเวลา</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
                <tr class="cate-1">
                <td>% การออกใบสั่งซื้อทันเวลาที่กำหนด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">90%</td>
            </tr>
                <tr class="cate-1">
                <td>มูลค่ายอดขายของเขต</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">3,000,000</td>
            </tr>
                <tr class="cate-1">
                <td>ปริมาณยอดขายของเขต</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">3,500</td>
            </tr>
                <tr class="cate-1">
                <td>จำนวนลูกค้ารวมของเขต</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">3,000</td>
            </tr>
                <tr class="cate-1">
                <td>จำนวนข้อร้องเรียนของลูกค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งน้อยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">50</td>
            </tr>
                <tr class="cate-1">
                <td>จำนวนลูกค้าที่ไม่ได้สั่งซือต่อ (Non-Active)</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งน้อยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>

            
        </tbody>
</table>
<?php
}else{
	echo'{"status":"400","error":"not token."}';
}
?>