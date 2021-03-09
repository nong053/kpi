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

<select id="selectGroupKpi">
    <option value="All">เลือกกลุ่มตัวอย่างตัวชี้วัด</option>
    <option value="1">ฝ่ายขายและการตลาด</option>
    <option value="2">ฝ่ายผลิต</option>
    <option value="3">ฝ่ายการเงิน</option>
    <option value="4">ฝ่ายบุคคล</option>
    <option value="5">ฝ่ายบริหารลูกค้า</option>
    <option value="6">ฝ่ายขนส่ง</option>
    <option value="7">ฝ่ายบัญชี</option>
    

</select>
<table class="table" id="sale-marketing-kpi">
        <thead>
            <tr>
                <th style="width: 45%;">ตัวชี้วัด</th>
                <th style="width: 15%;">มุมมองธุรกิจ</th>
                <th style="width: 15%;">ประเภทตัว</th>
                <th style="width: 15%;">การคิดคะแนน</th>
                <th style="width: 10%;" class="test-right">เป้า</th>
            </tr>
        </thead>
        <tbody>
            <tr class="cate cate-1">
                <td>มูลค่ายอดขาย</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">1,000,000</td>
            </tr>
            <tr class="cate cate-1">
                <td>จำนวนสินค้า (ชิ้น/ประเภท)</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>
            <tr class="cate cate-1">
                <td>จำนวนรายของลูกค้าใหม่</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">500</td>
            </tr>
            <tr class="cate cate-1">
                <td>จำนวนรายของลูกค้าใหม่ที่เข้าเยี่ยม</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
                
            </tr>
            <tr class="cate cate-1">
                <td>% ลูกค้าใหม่ที่ซื้อสินค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">60%</td>
            </tr>
            <tr class="cate cate-1">
                <td>จำนวนลูกค้าใหม่สะสม</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">2,000</td>
            </tr>
            <tr class="cate cate-1">
                <td>% ที่ลูกค้ารู้จักสินค้า/บริการ/บริษัท(แบบสำรวจ)</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">70%</td>
            </tr>
            <tr class="cate cate-1">
                <td>จำนวนสินค้าที่ขายได้</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">1,000</td>
            </tr>
            <tr class="cate cate-1">
                <td>จำนวนลูกค้าใหม่ที่ได้จากการแนะนำของลูกค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>
            <tr class="cate cate-1">
                <td>จำนวนลูกค้าใหม่ที่ได้จากสื่อโฆษณา</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">300</td>
            </tr>
            <tr class="cate cate-1">
                <td>จำนวนลูกค้าที่ติดต่อเข้ามาเอง</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>
            <tr class="cate cate-1">
                <td>จำนวนลูกค้าใหม่ที่เกิดจากการจัดสัมมนา/แสดงสินค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">200</td>
            </tr>
            <tr class="cate cate-1">
                <td>% ส่วนแบ่งการตลาด</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
            <tr class="cate cate-1">
                <td>ยอดสั่งซื้อเฉลี่ยต่อราย</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3,000</td>
            </tr>


            <tr class="cate cate-1">
                <td> % การประเมินศักยภาพของลูกค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
           
            <tr class="cate cate-1">
                <td>ระยะเวลาในการชำระเงิน</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>
                <tr class="cate cate-1">
                <td>% ส่วนลดต่อยอดขาย</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">20%</td>
            </tr>
                <tr class="cate cate-1">
                <td>สัดส่วนของลูกค้าเกรด A-B-C</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>1-5 คะแนน</td>
                <td class="test-right">5</td>
            </tr>
                <tr class="cate cate-1">
                <td>% การตอบรับจากลูกค้าเทียบกับที่นำเสนอทั้งหมด</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
                <tr class="cate cate-1">
                <td>% ครั้งของการแก้ไขที่เกินกว่ามาตรฐานที่กำหนด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งนอยยิ่งดี</td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
                <tr class="cate cate-1">
                <td>จำนวนครั้งของปัญหาที่เกิดจากการไม่ปฏิบัติตามระบบฯ</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10</td>
            </tr>
                <tr class="cate cate-1">
                <td>% ใบเสนอราคาที่ขายไม่ได้เนื่องจากส่งใบเสนอราคาไม่ทัน</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>
                <tr class="cate cate-1">
                <td>มูลค่ายอดขาย</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10,000,000</td>
            </tr>
                <tr class="cate cate-1">
                <td>ปริมาณยอดขาย</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3,000,000</td>
            </tr>
                
                <tr class="cate cate-1">
                <td>% ส่วนแบ่งการตลาด</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">50%</td>
            </tr>
                
                <tr class="cate cate-1">
                <td>% ลูกค้าที่ซื้อต่อเนื่อง</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
                <tr class="cate cate-1">
                <td>ยอดขายเฉลี่ยต่อบิล</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">4,000</td>
            </tr>
                <tr class="cate cate-1">
                <td>จำนวนลูกค้าที่ไม่มีการสั่งซื้อ</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10</td>
            </tr>
                <tr class="cate cate-1">
                <td>จำนวนครั้งในการเยี่ยมลูกค้า/เดือน</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">400</td>
            </tr>
                <tr class="cate cate-1">
                <td>จำนวนรายในการเยี่ยมลูกค้า/เดือน</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">1,000</td>
            </tr>
                <tr class="cate cate-1">
                <td>% ส่วนลด</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
                <tr class="cate cate-1">
                <td>% ลูกค้าที่ชำระเงินตรงเวลา</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
                <tr class="cate cate-1">
                <td>% มูลค่าที่ชำระเงินตรงเวลา</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
                <tr class="cate cate-1">
                <td>ยอดขายเฉลี่ยต่อการเยี่ยมหนึ่งครั้ง</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3,000</td>
            </tr>
                <tr class="cate cate-1">
                <td>จำนวนข้อร้องเรียน</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10</td>
            </tr>
                <tr class="cate cate-1">
                <td>จำนวนครั้งที่คืนสินค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10</td>
            </tr>
                <tr class="cate cate-1">
                <td>% ลูกค้าที่นำเครืองไปทดลองใช้และไม่ซื้อสินค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">20%</td>
            </tr>
                <tr class="cate cate-1">
                <td>คะแนนแบบสอบถามความพึงพอใจของลูกค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>1-5 คะแนน</td>
                <td class="test-right">5</td>
            </tr>
                <tr class="cate cate-1">
                <td>% ลูกค้าที่สั่งซื้อเพิ่มขึ้น (ปริมาณ/รายการสินค้า)</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
                <tr class="cate cate-1">
                <td>จำนวนลูกค้าที่แนะนำลูกค้าใหม่</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">800</td>
            </tr>
                <tr class="cate cate-1">
                <td>% ที่ส่งของไม่ทันกำหนดเวลา</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
                <tr class="cate cate-1">
                <td>% การออกใบสั่งซื้อทันเวลาที่กำหนด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">90%</td>
            </tr>
                <tr class="cate cate-1">
                <td>มูลค่ายอดขายของเขต</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3,000,000</td>
            </tr>
                <tr class="cate cate-1">
                <td>ปริมาณยอดขายของเขต</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3,500</td>
            </tr>
                <tr class="cate cate-1">
                <td>จำนวนลูกค้ารวมของเขต</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3,000</td>
            </tr>
                <tr class="cate cate-1">
                <td>จำนวนข้อร้องเรียนของลูกค้า</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">50</td>
            </tr>
                <tr class="cate cate-1">
                <td>จำนวนลูกค้าที่ไม่ได้สั่งซือต่อ (Non-Active)</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>


            <tr class="cate cate-2">
                <td>ต้นทุนการผลิตต่อหน่วย</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10,000</td>
            </tr>
            <tr class="cate cate-2">
                <td>Variable overhead</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
            <tr class="cate cate-2">
                <td>% Yield</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">85%</td>
            </tr>
            <tr class="cate cate-2">
                <td>% Combined Yield</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">90%</td>
            </tr>
            <tr class="cate cate-2">
                <td>% Reject</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>
            <tr class="cate cate-2">
                <td>% Rework</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
            <tr class="cate cate-2">
                <td>% Reprocess</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
            <tr class="cate cate-2">
                <td>% OEE</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">90%</td>
            </tr>
            <tr class="cate cate-2">
                <td>% NC</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">5%</td>
            </tr>
            <tr class="cate cate-2">
                <td>% การส่งมอบ</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
            <tr class="cate cate-2">
                <td>% การผลิตได้ตามแผน</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
            <tr class="cate cate-2">
                <td>อัตราผลผลิตต่อคน</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">100</td>
            </tr>
            <tr class="cate cate-2">
                <td>% Rework Cost</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
            <tr class="cate cate-2">
                <td>Scraps</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>1-5 คะแนน</td>
                <td class="test-right">5</td>
            </tr>
            <tr class="cate cate-2">
                <td>Labor Efficiency</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>1-5 คะแนน</td>
                <td class="test-right">5</td>
            </tr>
            <tr class="cate cate-2">
                <td>Packing down time</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10</td>
            </tr>
            <tr class="cate cate-2">
                <td>FG WIP Time</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>1-5 คะแนน</td>
                <td class="test-right">5</td>
            </tr>
            <tr class="cate cate-2">
                <td>% FG Stock accuracy</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
            <tr class="cate cate-2">
                <td>Packing Efficiency</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>1-5 คะแนน</td>
                <td class="test-right">5</td>
            </tr>
            <tr class="cate cate-2">
                <td>% C.F.I</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
            <tr class="cate cate-2">
                <td><tr class="cate cate-1">
                <td>% Material Quality LRR</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
            <tr class="cate cate-2">
                <td>Material Quality Incident</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>1-5 คะแนน</td>
                <td class="test-right">5</td>
            </tr>
            <tr class="cate cate-2">
                <td>% Ship To Stock (STS)</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>

            <tr class="cate cate-2">
                <td>ปริมาณของเสียที่เกิดจากการผลิตลดลง 5% ของปีที่ผ่านมา</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">5%</td>
            </tr>
            <tr class="cate cate-2">
                <td>ผลผลิตเพิ่มขึ้นเทียบปีที่ผ่านมาเพิ่มขึ้น 5% ของปีที่ผ่านมา</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">5%</td>
            </tr>
            <tr class="cate cate-2">
                <td>Pass percentage เพิ่มขึ้น 85% ขึ้นไป</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">85%</td>
            </tr>
            <tr class="cate cate-2">
                <td>% yield เพิ่มขึ้น 90% เมื่อเทียบกับ input ที่ใช้</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">90%</td>
            </tr>
            <tr class="cate cate-2">
                <td>ต้นทุนในการผลิตลดลง (unit cost) เมื่อเทียบกับ base average ลดลง 3% เทียบกับ base average</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3%</td>
            </tr>
            <tr class="cate cate-2">
                <td>Work in process ลงเมื่อเทียบกับ input ที่ใช้ ลดลง 10% เทียบกับ input ที่ใช้</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
            <tr class="cate cate-2">
                <td>จำนวน Defectives ที่จุดตรวจสอบขั้นสุดท้ายน้อยกว่า 3% ของยอดการผลิตทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3%</td>
            </tr>
            <tr class="cate cate-2">
                <td>การ Rework งานเสียน้อยกว่า 3% ของยอดการผลิดทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3%</td>
            </tr>
            <tr class="cate cate-2">
                <td>อัตราการใช้วัตถุดิบในประเทศมูลค่ามากกว่า 80% วัตถุดิบที่ใช้ทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
            <tr class="cate cate-2">
                <td>การส่งมอบให้กับกระบวนการถัดไปตรงเวลาและครบจำนวนมากกว่า 95% ของ Lot การผลิตทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">95%</td>
            </tr>
            <tr class="cate cate-2">
                <td>ชิ้นงานที่ประกอบผิด spec. น้อยกว่า 3% ของชิ้นงานที่ประกอบทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3%</td>
            </tr>
            <tr class="cate cate-2">
                <td>จำนวนครั้งที่ผลิตไม่ทันตามแผนน้อยกว่า 5% ของจำนวนครี้งที่ผลิตทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">5%</td>
            </tr>
            <tr class="cate cate-2">
                <td>ระยะเวลาในการตั้งเครื่องไม่เกิน 30 นาที</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>ผ่าน/ไม่ผ่าน</td>
                <td class="test-right">5</td>
            </tr>
            <tr class="cate cate-2">
                <td>ระยะเวลาในการเผลี่ยนแม่พิมพ์นานไม่เกิน 15 นาทีมากว่า 95%ของจำนวนครั้งที่เปลี่ยนแม่พิมพ์ทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">95%</td>
            </tr>
            <tr class="cate cate-2">
                <td>ต้นทุนการผลิตลดลง 3% เมื่อเทียบกับีที่ผ่านมา</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3%</td>
            </tr>
            <tr class="cate cate-2">
                <td>รอบระยะเวลาในการผลิตลดลง 3% เทียบกับปีที่ผ่านมา</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3%</td>
            </tr>
            <tr class="cate cate-2">
                <td>จำนวนงานเกรด A ที่ต้องถูกลดเกรดลดลง 3% เมื่อเทียบกับเดือนที่ผ่านมา</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3%</td>
            </tr>


            
            <tr class="cate cate-3">
                <td>ยอดขายมากว่า 5% สินทรัพย์รวม</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">5%</td>
            </tr>
            <tr class="cate cate-3">
                <td>กำไรมากกกว่า 60% ของยอดขาย</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">60%</td>
            </tr>
                <tr class="cate cate-3">
                <td>จำนวนเงินปันผลมากกว่า 10% ของกำไร</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
                <tr class="cate cate-3">
                <td>ยอดหนี้เสียน้อยกว่า 5% ของยอดขาย</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">5%</td>
            </tr>



            <tr class="cate cate-4">
                <td>ความสามารถในการรับสมัครพนักงาน เพื่อคัดเลือกเข้าเป็นพนักงานให้ได้ ทันเวลามากว่า 80% ของตำแหน่งว่างทั้งหมด</td>
                <td>มุมมองด้านการเรียนรู้และการเติบโต</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
            <tr class="cate cate-4">
                <td>การฝึกอบรมเพื่อพัฒนาบุคลากรมากว่า 95% ของจำนวนบุคคลากรทั้งหมด</td>
                <td>มุมมองด้านการเรียนรู้และการเติบโต</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">95%</td>
            </tr>
            <tr class="cate cate-4">
                <td>การมีส่วสนร่วมของพนักงานในองค์กรมากว่า 80% บุคคลากรทั้งหมด</td>
                <td>มุมมองด้านการเรียนรู้และการเติบโต</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">80%</td>
            </tr>
            <tr class="cate cate-4">
                <td>อัตราการเกิดอุบัติเหตุในระหว่างการทำงานน้อยกว่า 5% ของวันทำงานทั้งหมด</td>
                <td>มุมมองด้านการเรียนรู้และการเติบโต</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">5%</td>
            </tr>
            <tr class="cate cate-4">
                <td>อัตราในการขาดงานของพนักงานน้อยกว่า 15% ของวันทำงานทั้งหมด</td>
                <td>มุมมองด้านการเรียนรู้และการเติบโต</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">15%</td>
            </tr>
            <tr class="cate cate-4">
                <td>อัตราการทำงานล่วงเวลามากว่า 5 % ของเวลางานทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">5%</td>
            </tr>
            <tr class="cate cate-4">
                <td>อัตราการร้องทุกข์ของพนักงานน้อยกว่า 2 % จำนวนพนักงานทั้งหมด</td>
                <td>มุมมองด้านการเรียนรู้และการเติบโต</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">2%</td>
            </tr>


            <tr class="cate cate-5">
                <td>ความพร้อมของอะไหล่ในการให้บริการ</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>ผ่าน/ไม่ผ่าน</td>
                <td class="test-right">3%</td>
            </tr>
            <tr class="cate cate-5">
                <td>คุณภาพในการบริการการซ่อม </td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>ผ่าน/ไม่ผ่าน</td>
                <td class="test-right">5</td>
            </tr>
            <tr class="cate cate-5">
                <td>ความรวดเร็วในการซ่อมไม่เกิน 3 ชม.มากกว่า 95% ของจำนวนครั้งที่ส่งซ่อมทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">95%</td>
            </tr>
            <tr class="cate cate-5">
                <td>ความประทับใจของลูกค้ามากว่ากว่า 95% ของจำนวนลูกค้าทั้งหมด</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">95%</td>
            </tr>
            <tr class="cate cate-5">
                <td>การให้ข้อมูลที่ลูกค้าต้องการมากว่า 95% ของการสอบถามข้อมูล</td>
                <td>มุมมองทางด้านลูกค้า</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">95%</td>
            </tr>


            
            <tr class="cate cate-6">
                <td>อัตราในการส่งคืนสินค้าจากลูกค้าไม่เกิน 10%</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">10%</td>
            </tr>
            <tr class="cate cate-6">
                <td>การจัดส่งทันเวลาครบทุกชิ้นและดีมากกว่า 95% ของจำนวนครั้งที่ส่งทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">95%</td>
            </tr>
            <tr class="cate cate-6">
                <td>ค่าขนส่งไม่เกิน 5% ของยอดขาย</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">5%</td>
            </tr>
            <tr class="cate cate-6">
                <td>ผลการประเมินผู้รับจ้างขนส่งเกรด A เพื่อขึ้น 10 ราย</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>ผ่าน/ไม่ผ่าน</td>
                <td class="test-right">5</td>
            </tr>


            <tr class="cate cate-7">
                <td>ความถูกต้องของบิลมากว่า 98% ของจำนวนบิลทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">98%</td>
            </tr>
            <tr class="cate cate-7">
                <td>จำนวนของการส่งบิลไม่ทันเวลาน้อยกว่า 3%ของจำนวนบิลทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3%</td>
            </tr>
            <tr class="cate cate-7">
                <td>ภาระหนี้ค้างชำระไม่เกิน 100% ของยอดขาย</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">100%</td>
            </tr>
            <tr class="cate cate-7">
                <td>อัตาส่วนของหนี้เสียไม่เกิน 5%ของยอดขาย</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">5%</td>
            </tr>
            <tr class="cate cate-7">
                <td>จำนวนรายการบัญชีที่มีการแก้ไข หลังปิดบัญชีไม่เกิน 3%ของรายการบัญชีทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3%</td>
            </tr>
            <tr class="cate cate-7">
                <td>ยอดหนี้เสียไม่เกิน 5% ของยอดขายทั้งหมด</td>
                <td>มุมมองทางด้านการเงิน</td>
                <td>ยิ่งน้อยยิ่งดี <i style='color:red;' class='glyphicon glyphicon-arrow-down'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">5%</td>
            </tr>
            <tr class="cate cate-7">
                <td>การใช้งบประมาณเกินที่กำหนดไว้ไม่เกิน 3%ของงบประมาณทั้งหมด</td>
                <td>มุมมองทางด้านกระบวนการ</td>
                <td>ยิ่งมากยิ่งดี <i style='color:green;' class='glyphicon glyphicon-arrow-up'></td>
                <td>กำหนดเอง</td>
                <td class="test-right">3%</td>
            </tr>


            
        </tbody>
</table>
<script src="../examples/exKpi.js"></script>

<?php
}else{
	echo'{"status":"400","error":"not token."}';
}
?>