<?php 
    // ฟังก์ชันเพื่อเปลี่ยนชื่อแบรนด์น้ำมันเป็นชื่อไทย
function convertBrandName($brand) {
    switch ($brand) {
        case 'gasoline_95':
            return 'แก๊สโซฮอล95';
        case 'gasohol_95':
            return 'แก๊สโซฮอล95';
        case 'gasohol_91':
            return 'แก๊สโซฮอล91';
        case 'gasohol_e20':
            return 'แก๊สโซฮอลE20';
        case 'gasohol_e85':
            return 'แก๊สโซฮอลE85';
        case 'diesel':
            return 'ดีเซล';
        case 'premium_diesel':
            return 'ดีเซลพรีเมี่ยม';
        case 'premium_gasohol_95':
            return 'แก๊สโซฮอล95 พรีเมี่ยม';
        case 'superpower_gasohol_95':
            return 'แก๊สโซฮอล95 ซูเปอร์พาวเวอร์';
        case 'premium_gasohol_97':
            return 'แก๊สโซฮอล97 พรีเมี่ยม';
        case 'vpower_gasohol_95':
            return 'แก๊สโซฮอล95 วีพาวเวอร์';
        case 'vpower_diesel_b7':
            return 'ดีเซล B7 วีพาวเวอร์';
        case 'fuelsafe_diesel_b7':
            return 'ดีเซล B7 ฟูลเซฟ';
        case 'ngv':
            return 'NGV';
        default:
            return $brand; // คืนค่าที่ไม่รู้จักกลับไป
    }
}
// แปลงชื่อแบรนด์ใน $data_array
$converted_data_array = [];
foreach ($data_array as $brand => $companies) {
    $converted_brand = convertBrandName($brand); // แปลงชื่อแบรนด์
    $converted_data_array[$converted_brand] = $companies;
}

?>