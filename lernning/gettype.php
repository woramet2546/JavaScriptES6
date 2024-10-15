<?php
    // การเช็คค่าของตัวแปรด้วย gettype
    // การแปลงชนิดข้อมูลด้วย(integer,float,double,string,)$ตัวแปร
    $x = 19.25;
    $z = 200;

    $total = $x+$z;
    echo "ค่าเริ่มต้น".$total;

    $all =(integer)$total;
    echo "<br>";
    echo gettype($all);
    echo " = ".$all;

    $all =(double)$total;
    echo "<br>";
    echo gettype($all);
    echo " = ".$all;

    $all =(Float)$total;
    echo "<br>";
    echo gettype($all);
    echo " = ".$all;

    $all =(string)$total;
    echo "<br>";
    echo gettype($all);
    echo " = ".$all;


    
?>