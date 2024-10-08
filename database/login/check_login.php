<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

</body>

</html>
<?php
session_start();
$serverName = "DESKTOP-19FOJN4\SQLEXPRESS";
$dbName = "login";

$connectionInfo = array(
	"Database" => $dbName,
	"UID" => "woramet",
	"PWD" => "2546"
);

$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
	die(print_r(sqlsrv_errors(), true));
}

// ตรวจสอบการส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// รับค่าจากฟอร์ม
	$username = $_POST["txtUsername"];
	$password = $_POST["txtPassword"];

	// ตรวจสอบว่าค่าที่รับมาไม่ว่าง
	if (!empty($username) && !empty($password)) {
		// เตรียมคำสั่ง SQL พร้อม Parameterized Query
		$strSQL = "SELECT * FROM member WHERE Username = ? AND Password = ?";
		$params = array($username, $password);

		// ส่งคำสั่ง SQL พร้อมพารามิเตอร์
		$objQuery = sqlsrv_query($conn, $strSQL, $params);

		// ตรวจสอบการ query สำเร็จหรือไม่
		if ($objQuery === false) {
			die(print_r(sqlsrv_errors(), true));
		}

		// ดึงผลลัพธ์จากฐานข้อมูล
		$objResult = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC);

		if (!$objResult) {
			
		} else {
			// เก็บข้อมูลผู้ใช้ใน Session
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();

			// ตรวจสอบสิทธิ์ผู้ใช้
			if ($objResult["Status"] == "ADMIN") {
				header( "location: web/index.php" );
				exit(0);
				
			} elseif ($objResult["Status"] == "USER") {
				header( "location: web/index.php" );
				exit(0);
			}
			exit();
		}
	} else {
		echo "";
	}
}

// ปิดการเชื่อมต่อฐานข้อมูล
sqlsrv_close($conn);
