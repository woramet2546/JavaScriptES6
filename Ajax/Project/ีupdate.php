<?php
include "./database/dbconnect.php";
$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];


$sql = "UPDATE employee SET WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();

echo json_encode(['status' => 'success']); // ส่งสถานะกลับ
?>
