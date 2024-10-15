<?php
$serverName = "DESKTOP-19FOJN4\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( 
    "Database"=>"namedatabase", 
    "UID"=>"username", 
    "PWD"=>"password"
);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "เชื่อมต่อสำเร็จแล้ว.<br/>";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>