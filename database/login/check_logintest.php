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

$response = array('success' => false, 'title' => 'Error', 'message' => 'An error occurred.');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["txtUsername"];
    $password = $_POST["txtPassword"];

    if (!empty($username) && !empty($password)) {
        $strSQL = "SELECT * FROM member WHERE Username = ? AND Password = ?";
        $params = array($username, $password);

        $objQuery = sqlsrv_query($conn, $strSQL, $params);

        if ($objQuery === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $objResult = sqlsrv_fetch_array($objQuery, SQLSRV_FETCH_ASSOC);

        if (!$objResult) {
            $response = array(
                'success' => false,
                'title' => 'Login Failed',
                'message' => 'Username or password is incorrect. Please try again.'
            );
        } else {
            $_SESSION["UserID"] = $objResult["UserID"];
            $_SESSION["Status"] = $objResult["Status"];

            session_write_close();

            if ($objResult["Status"] == "ADMIN" || $objResult["Status"] == "USER") {
                $response = array(
                    'success' => true,
                    'title' => 'Login Successful',
                    'message' => 'You have successfully logged in.'
                );
            }
        }
    } else {
        $response = array(
            'success' => false,
            'title' => 'Missing Information',
            'message' => 'Username and password cannot be empty.'
        );
    }
}

sqlsrv_close($conn);

header('Content-Type: application/json');
echo json_encode($response);
?>
