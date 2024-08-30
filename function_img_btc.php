<?php
function displayImageBasedOnChange($chang) {
    if ($chang < 0) {
        // แสดงรูปภาพเมื่อ $chang น้อยกว่า 0
        echo '<img src="./img/decrease.png" width="10px" height="10px"> ';
        echo $chang;
    } elseif ($chang > 0) {
        // แสดงรูปภาพเมื่อ $chang มากกว่า 0
        echo '<img src="./img/up-arrow.png" width="10px" height="10px"> ';
        echo $chang;
    } else {
        // ตัวเลือกอื่นๆ หาก $chang เท่ากับ 0 (ถ้าต้องการ)
        echo '<img src="./img/zigzag.png" width="10px" height="10px"> ';
        echo $chang;
        
    }
}
?>